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
        $title = escapeString($conn, $_POST['title'] ?? '');
        $description = escapeString($conn, $_POST['description'] ?? '');
        $slug = escapeString($conn, $_POST['slug'] ?? '');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);
        
        $icon_image = escapeString($conn, $_POST['existing_icon_image'] ?? '');
        
        if (isset($_FILES['icon_image']) && $_FILES['icon_image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = handleFileUpload($_FILES['icon_image'], '../uploads/services');
            if ($upload['success']) {
                if ($icon_image && file_exists('../uploads/services/' . $icon_image)) {
                    deleteFile('../uploads/services/' . $icon_image);
                }
                $icon_image = $upload['filename'];
            } else {
                $message = $upload['message'];
                $message_type = 'danger';
            }
        }
        
        if ($message_type !== 'danger') {
            if ($action === 'add') {
                $sql = "INSERT INTO services (title, description, icon_image, slug, is_active, display_order) 
                        VALUES ('$title', '$description', '$icon_image', '$slug', $is_active, $display_order)";
                
                if ($conn->query($sql)) {
                    $message = 'Service berhasil ditambahkan!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            } else {
                $id = intval($_POST['id']);
                $sql = "UPDATE services SET title='$title', description='$description', 
                        icon_image='$icon_image', slug='$slug', is_active=$is_active, 
                        display_order=$display_order WHERE id=$id";
                
                if ($conn->query($sql)) {
                    $message = 'Service berhasil diupdate!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $service = fetchOne("SELECT icon_image FROM services WHERE id=$id");
        if ($service && $service['icon_image']) {
            deleteFile('../uploads/services/' . $service['icon_image']);
        }
        
        $sql = "DELETE FROM services WHERE id=$id";
        
        if ($conn->query($sql)) {
            $message = 'Service berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$services = fetchAll("SELECT * FROM services ORDER BY display_order ASC, id DESC");

$edit_data = null;
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_data = fetchOne("SELECT * FROM services WHERE id=$edit_id");
}

$conn->close();

$page_title = 'Manage Services';
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
                <h5><?= $edit_data ? 'Edit Service' : 'Add New Service' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        <input type="hidden" name="existing_icon_image" value="<?= htmlspecialchars($edit_data['icon_image'] ?? '') ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['title'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($edit_data['description'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Icon Image</label>
                        <?php if ($edit_data && $edit_data['icon_image']): ?>
                            <div class="mb-2">
                                <img src="../uploads/services/<?= htmlspecialchars($edit_data['icon_image']) ?>" 
                                     alt="Current" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="icon_image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload gambar baru (JPG, PNG, GIF, WEBP - Max 5MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['slug'] ?? '') ?>"
                               placeholder="e.g., tambal-gigi">
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
                        <?= $edit_data ? 'Update' : 'Add' ?> Service
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="services.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Services</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?= $service['display_order'] ?></td>
                                <td><?= htmlspecialchars($service['title']) ?></td>
                                <td>
                                    <?php if ($service['icon_image']): ?>
                                        <img src="../uploads/services/<?= htmlspecialchars($service['icon_image']) ?>" 
                                             alt="Icon" style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($service['slug']) ?></td>
                                <td>
                                    <?php if ($service['is_active']): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="?edit=<?= $service['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $service['id'] ?>">
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
