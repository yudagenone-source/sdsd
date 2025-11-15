<?php
require_once 'auth_check.php';
require_once 'db_config.php';

$conn = getDBConnection();
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $patient_name = escapeString($conn, $_POST['patient_name'] ?? '');
        $rating = intval($_POST['rating'] ?? 5);
        $review_text = escapeString($conn, $_POST['review_text'] ?? '');
        $source = escapeString($conn, $_POST['source'] ?? 'Google');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);
        
        if ($action === 'add') {
            $sql = "INSERT INTO testimonials (patient_name, rating, review_text, source, is_active, display_order) 
                    VALUES ('$patient_name', $rating, '$review_text', '$source', $is_active, $display_order)";
            $message = $conn->query($sql) ? 'Testimonial berhasil ditambahkan!' : 'Error: ' . $conn->error;
            $message_type = $conn->query($sql) ? 'success' : 'danger';
        } else {
            $id = intval($_POST['id']);
            $sql = "UPDATE testimonials SET patient_name='$patient_name', rating=$rating, 
                    review_text='$review_text', source='$source', is_active=$is_active, 
                    display_order=$display_order WHERE id=$id";
            $message = $conn->query($sql) ? 'Testimonial berhasil diupdate!' : 'Error: ' . $conn->error;
            $message_type = $conn->query($sql) ? 'success' : 'danger';
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $message = $conn->query("DELETE FROM testimonials WHERE id=$id") ? 'Testimonial berhasil dihapus!' : 'Error: ' . $conn->error;
        $message_type = $conn->query("DELETE FROM testimonials WHERE id=$id") ? 'success' : 'danger';
    }
}

$testimonials = fetchAll("SELECT * FROM testimonials ORDER BY display_order ASC, id DESC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM testimonials WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Testimonials';
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
                <h5><?= $edit_data ? 'Edit Testimonial' : 'Add New Testimonial' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Patient Name *</label>
                        <input type="text" name="patient_name" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['patient_name'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Rating *</label>
                        <select name="rating" class="form-select" required>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?= $i ?>" <?= ($edit_data && $edit_data['rating'] == $i) || (!$edit_data && $i == 5) ? 'selected' : '' ?>>
                                    <?= $i ?> Star<?= $i > 1 ? 's' : '' ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Review Text *</label>
                        <textarea name="review_text" class="form-control" rows="4" required><?= htmlspecialchars($edit_data['review_text'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Source</label>
                        <input type="text" name="source" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['source'] ?? 'Google') ?>">
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
                        <?= $edit_data ? 'Update' : 'Add' ?> Testimonial
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="testimonials.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Testimonials</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Patient</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Source</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($testimonials as $testimonial): ?>
                            <tr>
                                <td><?= $testimonial['display_order'] ?></td>
                                <td><?= htmlspecialchars($testimonial['patient_name']) ?></td>
                                <td>
                                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                                        <i class="fas fa-star text-warning"></i>
                                    <?php endfor; ?>
                                </td>
                                <td><?= htmlspecialchars(substr($testimonial['review_text'], 0, 50)) ?>...</td>
                                <td><?= htmlspecialchars($testimonial['source']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $testimonial['is_active'] ? 'success' : 'secondary' ?>">
                                        <?= $testimonial['is_active'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $testimonial['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $testimonial['id'] ?>">
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
