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
        $slug = escapeString($conn, $_POST['slug'] ?? '');
        $category = escapeString($conn, $_POST['category'] ?? '');
        $excerpt = escapeString($conn, $_POST['excerpt'] ?? '');
        $content = escapeString($conn, $_POST['content'] ?? '');
        $author = escapeString($conn, $_POST['author'] ?? '');
        $publish_date = escapeString($conn, $_POST['publish_date'] ?? date('Y-m-d'));
        $is_published = isset($_POST['is_published']) ? 1 : 0;
        
        $featured_image = escapeString($conn, $_POST['existing_featured_image'] ?? '');
        
        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = handleFileUpload($_FILES['featured_image'], '../uploads/news');
            if ($upload['success']) {
                if ($featured_image && file_exists('../uploads/news/' . $featured_image)) {
                    deleteFile('../uploads/news/' . $featured_image);
                }
                $featured_image = $upload['filename'];
            } else {
                $message = $upload['message'];
                $message_type = 'danger';
            }
        }
        
        if ($message_type !== 'danger') {
            if ($action === 'add') {
                $sql = "INSERT INTO news (title, slug, category, excerpt, content, featured_image, author, publish_date, is_published) 
                        VALUES ('$title', '$slug', '$category', '$excerpt', '$content', '$featured_image', '$author', '$publish_date', $is_published)";
                if ($conn->query($sql)) {
                    $message = 'News berhasil ditambahkan!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            } else {
                $id = intval($_POST['id']);
                $sql = "UPDATE news SET title='$title', slug='$slug', category='$category', excerpt='$excerpt', 
                        content='$content', featured_image='$featured_image', author='$author', 
                        publish_date='$publish_date', is_published=$is_published WHERE id=$id";
                if ($conn->query($sql)) {
                    $message = 'News berhasil diupdate!';
                    $message_type = 'success';
                } else {
                    $message = 'Error: ' . $conn->error;
                    $message_type = 'danger';
                }
            }
        }
    } elseif ($action === 'delete') {
        $id = intval($_POST['id']);
        $news = fetchOne("SELECT featured_image FROM news WHERE id=$id");
        if ($news && $news['featured_image']) {
            deleteFile('../uploads/news/' . $news['featured_image']);
        }
        
        if ($conn->query("DELETE FROM news WHERE id=$id")) {
            $message = 'News berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . $conn->error;
            $message_type = 'danger';
        }
    }
}

$news_list = fetchAll("SELECT * FROM news ORDER BY publish_date DESC, id DESC");
$edit_data = isset($_GET['edit']) ? fetchOne("SELECT * FROM news WHERE id=" . intval($_GET['edit'])) : null;
$conn->close();

$page_title = 'Manage News/Blog';
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
                <h5><?= $edit_data ? 'Edit News' : 'Add New News' ?></h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_data ? 'edit' : 'add' ?>">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
                        <input type="hidden" name="existing_featured_image" value="<?= htmlspecialchars($edit_data['featured_image'] ?? '') ?>">
                    <?php endif; ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['title'] ?? '') ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['slug'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="ORTHODONTIST" <?= ($edit_data && $edit_data['category'] == 'ORTHODONTIST') ? 'selected' : '' ?>>ORTHODONTIST</option>
                            <option value="TIPS & TRICK" <?= ($edit_data && $edit_data['category'] == 'TIPS & TRICK') ? 'selected' : '' ?>>TIPS & TRICK</option>
                            <option value="LITTLE SEURI" <?= ($edit_data && $edit_data['category'] == 'LITTLE SEURI') ? 'selected' : '' ?>>LITTLE SEURI</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-control" rows="2"><?= htmlspecialchars($edit_data['excerpt'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" id="summernote"><?= htmlspecialchars($edit_data['content'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Featured Image</label>
                        <?php if ($edit_data && $edit_data['featured_image']): ?>
                            <div class="mb-2">
                                <img src="../uploads/news/<?= htmlspecialchars($edit_data['featured_image']) ?>" 
                                     alt="Current" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">
                                <small class="d-block text-muted">Current image</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload gambar featured (JPG, PNG, GIF, WEBP - Max 5MB)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['author'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Publish Date</label>
                        <input type="date" name="publish_date" class="form-control" 
                               value="<?= htmlspecialchars($edit_data['publish_date'] ?? date('Y-m-d')) ?>">
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="is_published" class="form-check-input" id="is_published"
                               <?= ($edit_data && $edit_data['is_published']) || !$edit_data ? 'checked' : '' ?>>
                        <label class="form-check-label" for="is_published">Published</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <?= $edit_data ? 'Update' : 'Add' ?> News
                    </button>
                    
                    <?php if ($edit_data): ?>
                        <a href="news.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>All News</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news_list as $news_item): ?>
                            <tr>
                                <td><?= htmlspecialchars($news_item['title']) ?></td>
                                <td><span class="badge bg-info"><?= htmlspecialchars($news_item['category']) ?></span></td>
                                <td>
                                    <?php if ($news_item['featured_image']): ?>
                                        <img src="../uploads/news/<?= htmlspecialchars($news_item['featured_image']) ?>" 
                                             alt="Image" style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('M d, Y', strtotime($news_item['publish_date'])) ?></td>
                                <td>
                                    <span class="badge bg-<?= $news_item['is_published'] ? 'success' : 'secondary' ?>">
                                        <?= $news_item['is_published'] ? 'Published' : 'Draft' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?edit=<?= $news_item['id'] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?= $news_item['id'] ?>">
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

<!-- Summernote CSS & JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        placeholder: 'Tulis konten artikel di sini...',
        tabsize: 2,
        callbacks: {
            onImageUpload: function(files) {
                // Upload image ke server
                for (let i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            }
        }
    });
    
    function uploadImage(file) {
        let data = new FormData();
        data.append("file", file);
        
        $.ajax({
            url: 'upload_image.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#summernote').summernote('insertImage', url);
            },
            error: function(data) {
                console.error('Image upload failed');
            }
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>
