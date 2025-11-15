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
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);
        
        $image = escapeString($conn, $_POST['existing_image'] ?? '');
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = handleFileUpload($_FILES['image'], '../uploads/facilities');
            if ($upload['success']) {
                if ($image && file_exists('../uploads/facilities/' . $image)) {
                    deleteFile('../uploads/facilities/' . $image);
                }
                $image = $upload['filename'];
            } else {
                $message = $upload['message'];
                $message_type = 'danger';
            }
        }
        
        if ($message_type !== 'danger') {
            if ($action === 'add') {
                $sql = "INSERT INTO facilities (title, description, image, is_active, display_order) 
                        VALUES ('$title', '$description', '$image', $is_active, $display_order)";
                if ($conn->query($sql)) {
                    $message = 'Facility berhasil ditambahkan!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            } else {
                $id = intval($_POST['id']);
                $sql = "UPDATE facilities SET title='$title', description='$description', image='$image', 
                        is_active=$is_active, display_order=$display_order WHERE id=$id";
                if ($conn->query($sql)) {
                    $message = 'Facility berhasil diupdate!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $facility = fetchOne("SELECT image FROM facilities WHERE id=$id");
        if ($facility && $facility['image']) {
            deleteFile('../uploads/facilities/' . $facility['image']);
        }
        
        if ($conn->query("DELETE FROM facilities WHERE id=$id")) {
            $message = 'Facility berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$facilities = fetchAll("SELECT * FROM facilities ORDER BY display_order ASC, id DESC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM facilities WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Facilities';
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
                <h5><?= $edit_data ? 'Edit Facility' : 'Add New Facility' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        <input type="hidden" name="existing_image" value="<?= htmlspecialchars($edit_data['image'] ?? '') ?>">
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
                        <label class="form-label">Image</label>
                        <?php if ($edit_data && $edit_data['image']): ?>
                            <div class="mb-2">
                                <img src="../uploads/facilities/<?= htmlspecialchars($edit_data['image']) ?>" 
                                     alt="Current" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload gambar fasilitas (JPG, PNG, GIF, WEBP - Max 5MB)</small>
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
                        <?= $edit_data ? 'Update' : 'Add' ?> Facility
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="facilities.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Facilities</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($facilities as $facility): ?>
                            <tr>
                                <td><?= $facility['display_order'] ?></td>
                                <td><?= htmlspecialchars($facility['title']) ?></td>
                                <td>
                                    <?php if ($facility['image']): ?>
                                        <img src="../uploads/facilities/<?= htmlspecialchars($facility['image']) ?>" 
                                             alt="Image" style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?= $facility['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $facility['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $facility['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $facility['id'] ?>">
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
