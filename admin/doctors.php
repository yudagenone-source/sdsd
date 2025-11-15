<?php
require_once 'auth_check.php';
require_once 'db_config.php';
require_once 'upload_helper.php';

$conn = getDBConnection();
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $name = escapeString($conn, $_POST['name'] ?? '');
        $title = escapeString($conn, $_POST['title'] ?? '');
        $specialty = escapeString($conn, $_POST['specialty'] ?? '');
        $specialty_id = intval($_POST['specialty_id'] ?? 0);
        $specialty_id = $specialty_id > 0 ? $specialty_id : null;
        $experience_years = intval($_POST['experience_years'] ?? 0);
        $bio = escapeString($conn, $_POST['bio'] ?? '');
        $services_offered = escapeString($conn, $_POST['services_offered'] ?? '');
        $education = escapeString($conn, $_POST['education'] ?? '');
        $schedule = escapeString($conn, $_POST['schedule'] ?? '');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);
        
        $photo = escapeString($conn, $_POST['existing_photo'] ?? '');
        
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = handleFileUpload($_FILES['photo'], '../uploads/doctors');
            if ($upload['success']) {
                if ($photo && file_exists('../uploads/doctors/' . $photo)) {
                    deleteFile('../uploads/doctors/' . $photo);
                }
                $photo = $upload['filename'];
            } else {
                $message = $upload['message'];
                $message_type = 'danger';
            }
        }
        
        if ($message_type !== 'danger') {
            if ($action === 'add') {
                $sql = "INSERT INTO doctors (name, title, specialty, specialty_id, experience_years, photo, bio, services_offered, education, schedule, is_active, display_order) 
                        VALUES ('$name', '$title', '$specialty', " . ($specialty_id ? $specialty_id : "NULL") . ", $experience_years, '$photo', '$bio', '$services_offered', '$education', '$schedule', $is_active, $display_order)";
                if ($conn->query($sql)) {
                    $message = 'Doctor berhasil ditambahkan!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            } else {
                $id = intval($_POST['id']);
                $sql = "UPDATE doctors SET name='$name', title='$title', specialty='$specialty', specialty_id=" . ($specialty_id ? $specialty_id : "NULL") . ", 
                        experience_years=$experience_years, photo='$photo', bio='$bio', services_offered='$services_offered', 
                        education='$education', schedule='$schedule', is_active=$is_active, 
                        display_order=$display_order WHERE id=$id";
                if ($conn->query($sql)) {
                    $message = 'Doctor berhasil diupdate!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $doctor = fetchOne("SELECT photo FROM doctors WHERE id=$id");
        if ($doctor && $doctor['photo']) {
            deleteFile('../uploads/doctors/' . $doctor['photo']);
        }
        
        if ($conn->query("DELETE FROM doctors WHERE id=$id")) {
            $message = 'Doctor berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$doctors = fetchAll("SELECT d.*, ds.name as specialty_name FROM doctors d LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id ORDER BY d.display_order ASC, d.id DESC");
$specialties = fetchAll("SELECT * FROM doctor_specialties WHERE is_active=1 ORDER BY name ASC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM doctors WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Doctors';
include 'includes/header.php';
?>

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
                <h5><?= $edit_data ? 'Edit Doctor' : 'Add New Doctor' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        <input type="hidden" name="existing_photo" value="<?= htmlspecialchars($edit_data['photo'] ?? '') ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['name'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Title (e.g., Sp.Ort)</label>
                        <input type="text" name="title" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['title'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Specialty Category</label>
                        <select name="specialty_id" class="form-select">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($specialties as $spec): ?>
                                <option value="<?= $spec['id'] ?>" <?= ($edit_data && $edit_data['specialty_id'] == $spec['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($spec['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Specialty (Custom Text)</label>
                        <input type="text" name="specialty" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['specialty'] ?? '') ?>"
                               placeholder="e.g., Dokter Gigi Spesialis">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Experience (Years)</label>
                        <input type="number" name="experience_years" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['experience_years'] ?? '0') ?>" min="0">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <?php if ($edit_data && $edit_data['photo']): ?>
                            <div class="mb-2">
                                <img src="../uploads/doctors/<?= htmlspecialchars($edit_data['photo']) ?>" 
                                     alt="Current" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current photo</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        <small class="text-muted">Upload foto dokter (JPG, PNG, GIF, WEBP - Max 5MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="3"><?= htmlspecialchars($edit_data['bio'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Services Offered</label>
                        <textarea name="services_offered" class="form-control" rows="2"><?= htmlspecialchars($edit_data['services_offered'] ?? '') ?></textarea>
                        <small class="text-muted">e.g., PSA, Veneer, Bleaching</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Education</label>
                        <textarea name="education" class="form-control" rows="2"><?= htmlspecialchars($edit_data['education'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Schedule (Legacy)</label>
                        <textarea name="schedule" class="form-control" rows="2"><?= htmlspecialchars($edit_data['schedule'] ?? '') ?></textarea>
                        <small class="text-muted">e.g., Senin-Jumat: 09:00-17:00</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['display_order'] ?? '0') ?>">
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                               <?= ($edit_data && $edit_data['is_active']) || !$edit_data ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <?= $edit_data ? 'Update' : 'Add' ?> Doctor
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="doctors.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Doctors</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Name</th>
                                <th>Specialty</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($doctors as $doctor): ?>
                            <tr>
                                <td><?= $doctor['display_order'] ?></td>
                                <td>
                                    <?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?>
                                    <?php if ($doctor['specialty_name']): ?>
                                        <br><small class="text-muted"><?= htmlspecialchars($doctor['specialty_name']) ?></small>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($doctor['specialty']) ?></td>
                                <td>
                                    <?php if ($doctor['photo']): ?>
                                        <img src="../uploads/doctors/<?= htmlspecialchars($doctor['photo']) ?>" 
                                             alt="Photo" style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="text-muted">No photo</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?= $doctor['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $doctor['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $doctor['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="doctor_schedules.php?doctor_id=<?= $doctor['id'] ?>" class="btn btn-sm btn-info" title="Manage Schedules">
                                        <i class="fas fa-calendar"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $doctor['id'] ?>">
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
