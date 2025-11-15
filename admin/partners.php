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
        $type = escapeString($conn, $_POST['type'] ?? 'equipment');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);
        
        $logo = escapeString($conn, $_POST['existing_logo'] ?? '');
        
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = handleFileUpload($_FILES['logo'], '../uploads/partners');
            if ($upload['success']) {
                if ($logo && file_exists('../uploads/partners/' . $logo)) {
                    deleteFile('../uploads/partners/' . $logo);
                }
                $logo = $upload['filename'];
            } else {
                $message = $upload['message'];
                $message_type = 'danger';
            }
        }
        
        if ($message_type !== 'danger') {
            if ($action === 'add') {
                $sql = "INSERT INTO partners (name, logo, type, is_active, display_order) 
                        VALUES ('$name', '$logo', '$type', $is_active, $display_order)";
                if ($conn->query($sql)) {
                    $message = 'Partner berhasil ditambahkan!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            } else {
                $id = intval($_POST['id']);
                $sql = "UPDATE partners SET name='$name', logo='$logo', type='$type', 
                        is_active=$is_active, display_order=$display_order WHERE id=$id";
                if ($conn->query($sql)) {
                    $message = 'Partner berhasil diupdate!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $partner = fetchOne("SELECT logo FROM partners WHERE id=$id");
        if ($partner && $partner['logo']) {
            deleteFile('../uploads/partners/' . $partner['logo']);
        }
        
        if ($conn->query("DELETE FROM partners WHERE id=$id")) {
            $message = 'Partner berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$partners = fetchAll("SELECT * FROM partners ORDER BY display_order ASC, id DESC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM partners WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Partners';
include 'includes/header.php';
?>

<?php if ($message): ?>
    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show">
        <?= $message ?>
        <button type="hidden" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><?= $edit_data ? 'Edit Partner' : 'Add New Partner' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        <input type="hidden" name="existing_logo" value="<?= htmlspecialchars($edit_data['logo'] ?? '') ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['name'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <?php if ($edit_data && $edit_data['logo']): ?>
                            <div class="mb-2">
                                <img src="../uploads/partners/<?= htmlspecialchars($edit_data['logo']) ?>" 
                                     alt="Current" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current logo</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="logo" class="form-control" accept="image/*">
                        <small class="text-muted">Upload logo partner (JPG, PNG, GIF, WEBP - Max 5MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="equipment" <?= ($edit_data && $edit_data['type'] == 'equipment') || !$edit_data ? 'selected' : '' ?>>Equipment</option>
                            <option value="insurance" <?= ($edit_data && $edit_data['type'] == 'insurance') ? 'selected' : '' ?>>Insurance</option>
                        </select>
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
                        <?= $edit_data ? 'Update' : 'Add' ?> Partner
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="partners.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Partners</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($partners as $partner): ?>
                            <tr>
                                <td><?= $partner['display_order'] ?></td>
                                <td><?= htmlspecialchars($partner['name']) ?></td>
                                <td>
                                    <?php if ($partner['logo']): ?>
                                        <img src="../uploads/partners/<?= htmlspecialchars($partner['logo']) ?>" 
                                             alt="Logo" style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="text-muted">No logo</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge bg-primary"><?= ucfirst($partner['type']) ?></span></td>
                                <td>
                                    <span class="badge bg-<?= $partner['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $partner['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $partner['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $partner['id'] ?>">
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
