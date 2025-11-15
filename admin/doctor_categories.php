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
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        
        if ($action === 'add') {
            $sql = "INSERT INTO doctor_specialties (name, is_active) 
                    VALUES ('$name', $is_active)";
            if ($conn->query($sql)) {
                $message = 'Kategori dokter berhasil ditambahkan!';
                $message_type = 'success';
            } else {
                $message = 'Error: ' . $conn->error;
                $message_type = 'danger';
            }
        } else {
            $id = intval($_POST['id']);
            $sql = "UPDATE doctor_specialties SET name='$name', is_active=$is_active WHERE id=$id";
            if ($conn->query($sql)) {
                $message = 'Kategori dokter berhasil diupdate!';
                $message_type = 'success';
            } else {
                $message = 'Error: ' . $conn->error;
                $message_type = 'danger';
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        
        $check_usage = fetchOne("SELECT COUNT(*) as count FROM doctors WHERE specialty_id=$id");
        if ($check_usage && $check_usage['count'] > 0) {
            $message = 'Tidak dapat menghapus! Kategori ini masih digunakan oleh ' . $check_usage['count'] . ' dokter.';
            $message_type = 'warning';
        } else {
            if ($conn->query("DELETE FROM doctor_specialties WHERE id=$id")) {
                $message = 'Kategori dokter berhasil dihapus!';
                $message_type = 'success';
            } else {
                $message = 'Error: ' . $conn->error;
                $message_type = 'danger';
            }
        }
    }
}

$categories = fetchAll("SELECT ds.*, COUNT(d.id) as doctor_count 
                        FROM doctor_specialties ds 
                        LEFT JOIN doctors d ON ds.id = d.specialty_id 
                        GROUP BY ds.id 
                        ORDER BY ds.name ASC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM doctor_specialties WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage Doctor Categories';
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
                <h5><?= $edit_data ? 'Edit Kategori' : 'Add New Kategori' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori *</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['name'] ?? '') ?>" 
                               placeholder="e.g. Orthodontist, Periodontist, Endodontist" required>
                        <small class="text-muted">Nama spesialisasi dokter gigi</small>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                               <?= ($edit_data && $edit_data['is_active']) || !$edit_data ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save"></i> <?= $edit_data ? 'Update' : 'Add' ?> Kategori
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="doctor_categories.php" class="btn btn-secondary w-100 mt-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All Doctor Categories</h5>
            </div>
            <div class="card-body">
                <?php if (empty($categories)): ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Belum ada kategori dokter. Silakan tambahkan kategori baru.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="40%">Nama Kategori</th>
                                    <th width="15%">Jumlah Dokter</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><strong><?= htmlspecialchars($category['name']) ?></strong></td>
                                    <td>
                                        <span class="badge bg-info">
                                            <?= $category['doctor_count'] ?> dokter
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?= $category['is_active'] ? 'success' : 'secondary' ?>">
                                            <?= $category['is_active'] ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="?edit=<?= $category['id'] ?>" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <?php if ($category['doctor_count'] == 0): ?>
                                            <form method="POST" style="display:inline;" 
                                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-secondary" disabled title="Kategori masih digunakan">
                                                <i class="fas fa-lock"></i>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this category?');
}
</script>

<?php include 'includes/footer.php'; ?>
