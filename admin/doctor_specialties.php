<?php
require_once 'auth_check.php';
require_once 'db_config.php';

$conn = getDBConnection();
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $name = escapeString($conn, $_POST['name'] ?? '');
        $description = escapeString($conn, $_POST['description'] ?? '');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        
        if (empty(trim($name))) {
            $message = 'Error: Nama specialty tidak boleh kosong!';
            $message_type = 'danger';
        } else {
            if ($action === 'add') {
                $exists = fetchOnePrepared("SELECT id FROM doctor_specialties WHERE name=?", 's', [$name]);
                if ($exists) {
                    $message = 'Error: Specialty dengan nama ini sudah ada!';
                    $message_type = 'danger';
                } else {
                    $stmt = $conn->prepare("INSERT INTO doctor_specialties (name, description, is_active) VALUES (?, ?, ?)");
                    $stmt->bind_param('ssi', $name, $description, $is_active);
                    if ($stmt->execute()) {
                        $message = 'Specialty berhasil ditambahkan!';
                        $message_type = 'success';
                    } else {
                        $message = 'Error: ' . $stmt->error;
                        $message_type = 'danger';
                    }
                    $stmt->close();
                }
            } else {
                $id = intval($_POST['id']);
                $exists = fetchOnePrepared("SELECT id FROM doctor_specialties WHERE name=? AND id!=?", 'si', [$name, $id]);
                if ($exists) {
                    $message = 'Error: Specialty dengan nama ini sudah ada!';
                    $message_type = 'danger';
                } else {
                    $stmt = $conn->prepare("UPDATE doctor_specialties SET name=?, description=?, is_active=? WHERE id=?");
                    $stmt->bind_param('ssii', $name, $description, $is_active, $id);
                    if ($stmt->execute()) {
                        $message = 'Specialty berhasil diupdate!';
                        $message_type = 'success';
                    } else {
                        $message = 'Error: ' . $stmt->error;
                        $message_type = 'danger';
                    }
                    $stmt->close();
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        if ($conn->query("DELETE FROM doctor_specialties WHERE id=$id")) {
            $message = 'Specialty berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$specialties = fetchAll("SELECT * FROM doctor_specialties ORDER BY name ASC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM doctor_specialties WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Doctor Specialties';
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
                <h5><?= $edit_data ? 'Edit Specialty' : 'Add New Specialty' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['name'] ?? '') ?>" required>
                        <small class="text-muted">e.g., Sp.Ort (Orthodontist)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($edit_data['description'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                               <?= ($edit_data && $edit_data['is_active']) || !$edit_data ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <?= $edit_data ? 'Update' : 'Add' ?> Specialty
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="doctor_specialties.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Specialties</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($specialties as $specialty): ?>
                            <tr>
                                <td><?= htmlspecialchars($specialty['name']) ?></td>
                                <td><?= htmlspecialchars($specialty['description']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $specialty['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $specialty['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $specialty['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $specialty['id'] ?>">
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
