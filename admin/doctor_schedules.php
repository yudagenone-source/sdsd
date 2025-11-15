<?php
require_once 'auth_check.php';
require_once 'db_config.php';

$conn = getDBConnection();
$message = '';
$message_type = '';

$doctor_id = isset($_GET['doctor_id']) ? intval($_GET['doctor_id']) : 0;
$doctor = null;

if ($doctor_id > 0) {
    $doctor = fetchOne("SELECT * FROM doctors WHERE id=$doctor_id");
    if (!$doctor) {
        header('Location: doctors.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $doctor_id_post = intval($_POST['doctor_id'] ?? 0);
        $start_time = escapeString($conn, $_POST['start_time'] ?? '');
        $end_time = escapeString($conn, $_POST['end_time'] ?? '');
        $notes = escapeString($conn, $_POST['notes'] ?? '');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        
        $doctor_exists = fetchOnePrepared("SELECT id FROM doctors WHERE id=?", 'i', [$doctor_id_post]);
        if (!$doctor_exists) {
            $message = 'Error: Doctor tidak ditemukan!';
            $message_type = 'danger';
        } elseif ($action === 'add') {
            // Support multiple days untuk add
            $days_of_week = isset($_POST['day_of_week']) && is_array($_POST['day_of_week']) 
                ? $_POST['day_of_week'] 
                : [escapeString($conn, $_POST['day_of_week'] ?? '')];
            
            $added_count = 0;
            $stmt = $conn->prepare("INSERT INTO doctor_schedules (doctor_id, day_of_week, start_time, end_time, notes, is_active) VALUES (?, ?, ?, ?, ?, ?)");
            
            foreach ($days_of_week as $day_of_week) {
                $day_of_week = escapeString($conn, $day_of_week);
                $stmt->bind_param('issssi', $doctor_id_post, $day_of_week, $start_time, $end_time, $notes, $is_active);
                if ($stmt->execute()) {
                    $added_count++;
                }
            }
            $stmt->close();
            
            if ($added_count > 0) {
                $message = "Berhasil menambahkan $added_count jadwal!";
                $message_type = 'success';
            } else {
                $message = 'Error: Gagal menambahkan jadwal!';
                $message_type = 'danger';
            }
        } else {
            // Edit tetap single day
            $day_of_week = escapeString($conn, $_POST['day_of_week'] ?? '');
            $id = intval($_POST['id']);
            $stmt = $conn->prepare("UPDATE doctor_schedules SET doctor_id=?, day_of_week=?, start_time=?, end_time=?, notes=?, is_active=? WHERE id=?");
            $stmt->bind_param('issssii', $doctor_id_post, $day_of_week, $start_time, $end_time, $notes, $is_active, $id);
            if ($stmt->execute()) {
                $message = 'Schedule berhasil diupdate!';
                $message_type = 'success';
            } else {
                $message = 'Error: ' . $stmt->error;
                $message_type = 'danger';
            }
            $stmt->close();
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        if ($conn->query("DELETE FROM doctor_schedules WHERE id=$id")) {
            $message = 'Schedule berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

if ($doctor_id > 0) {
    $schedules = fetchAll("SELECT * FROM doctor_schedules WHERE doctor_id=$doctor_id ORDER BY 
                           FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), 
                           start_time ASC");
} else {
    $schedules = fetchAll("SELECT ds.*, d.name as doctor_name FROM doctor_schedules ds 
                           JOIN doctors d ON ds.doctor_id = d.id 
                           ORDER BY d.name ASC, 
                           FIELD(ds.day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                           ds.start_time ASC");
}

$doctors = fetchAll("SELECT id, name, title FROM doctors WHERE is_active=1 ORDER BY name ASC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM doctor_schedules WHERE id=" . intval($_GET['edit'])) : null;

$conn->close();

$page_title = 'Manage Doctor Schedules';
include 'includes/header.php';
?>

<?php if ($doctor): ?>
    <div class="mb-3">
        <a href="doctors.php" class="btn btn-secondary">← Back to Doctors</a>
        <span class="ms-3"><strong>Managing schedules for:</strong> <?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?></span>
    </div>
<?php endif; ?>

<?php if ($message): ?>
    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show">
        <?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><?= $edit_data ? 'Edit Schedule' : 'Add New Schedule' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Doctor *</label>
                        <select name="doctor_id" class="form-select" required <?= $doctor_id > 0 ? '' : '' ?>>
                            <?php if ($doctor_id > 0): ?>
                                <option value="<?= $doctor_id ?>" selected><?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?></option>
                            <?php else: ?>
                                <option value="">-- Select Doctor --</option>
                                <?php foreach ($doctors as $doc): ?>
                                    <option value="<?= $doc['id'] ?>" <?= ($edit_data && $edit_data['doctor_id'] == $doc['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($doc['name']) ?> <?= htmlspecialchars($doc['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Day of Week *</label>
                        <?php if (!$edit_data): ?>
                            <small class="text-muted d-block mb-2">Pilih satu atau lebih hari. Untuk jadwal yang sama di beberapa hari, centang multiple checkbox.</small>
                            <?php 
                            $days = [
                                'Monday' => 'Senin',
                                'Tuesday' => 'Selasa', 
                                'Wednesday' => 'Rabu',
                                'Thursday' => 'Kamis',
                                'Friday' => 'Jumat',
                                'Saturday' => 'Sabtu',
                                'Sunday' => 'Minggu'
                            ];
                            foreach ($days as $day_en => $day_id): 
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="day_of_week[]" value="<?= $day_en ?>" id="day_<?= $day_en ?>">
                                    <label class="form-check-label" for="day_<?= $day_en ?>">
                                        <?= $day_id ?> (<?= $day_en ?>)
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <select name="day_of_week" class="form-select" required>
                                <option value="">-- Select Day --</option>
                                <?php 
                                $days = [
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa', 
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jumat',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Minggu'
                                ];
                                foreach ($days as $day_en => $day_id): 
                                ?>
                                    <option value="<?= $day_en ?>" <?= ($edit_data && $edit_data['day_of_week'] == $day_en) ? 'selected' : '' ?>>
                                        <?= $day_id ?> (<?= $day_en ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Start Time *</label>
                        <input type="time" name="start_time" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['start_time'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">End Time *</label>
                        <input type="time" name="end_time" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['end_time'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="2"><?= htmlspecialchars($edit_data['notes'] ?? '') ?></textarea>
                        <small class="text-muted">e.g., Break 12:00-13:00</small>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                               <?= ($edit_data && $edit_data['is_active']) || !$edit_data ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <?= $edit_data ? 'Update' : 'Add' ?> Schedule
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="<?= $doctor_id > 0 ? "doctor_schedules.php?doctor_id=$doctor_id" : "doctor_schedules.php" ?>" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Schedules <?= $doctor ? 'for ' . htmlspecialchars($doctor['name']) : '' ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <?php if (!$doctor_id): ?>
                                    <th>Doctor</th>
                                <?php endif; ?>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($schedules as $schedule): ?>
                            <tr>
                                <?php if (!$doctor_id): ?>
                                    <td><?= htmlspecialchars($schedule['doctor_name']) ?></td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($schedule['day_of_week']) ?></td>
                                <td><?= date('H:i', strtotime($schedule['start_time'])) ?> - <?= date('H:i', strtotime($schedule['end_time'])) ?></td>
                                <td><?= htmlspecialchars($schedule['notes']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $schedule['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $schedule['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?<?= $doctor_id > 0 ? "doctor_id=$doctor_id&" : "" ?>edit=<?= $schedule['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $schedule['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
