<?php
require_once 'auth_check.php';
require_once 'db_config.php';
require_once 'upload_helper.php';

$conn = getDBConnection();
$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle PDF upload
    if (isset($_FILES['pricelist_pdf']) && $_FILES['pricelist_pdf']['error'] === 0) {
        $upload_dir = __DIR__ . '/../uploads/pricelist/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file = $_FILES['pricelist_pdf'];
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if ($file_ext === 'pdf') {
            $new_filename = 'pricelist_' . time() . '.pdf';
            $target = $upload_dir . $new_filename;
            
            if (move_uploaded_file($file['tmp_name'], $target)) {
                // Delete old PDF if exists
                $old_pdf = fetchOne("SELECT setting_value FROM settings WHERE setting_key = 'pricelist_pdf'");
                if ($old_pdf && !empty($old_pdf['setting_value'])) {
                    $old_file = $upload_dir . $old_pdf['setting_value'];
                    if (file_exists($old_file)) {
                        unlink($old_file);
                    }
                }
                
                // Update database
                $sql = "INSERT INTO settings (setting_key, setting_value) VALUES ('pricelist_pdf', '$new_filename') 
                        ON DUPLICATE KEY UPDATE setting_value='$new_filename'";
                $conn->query($sql);
                
                $message = 'Pricelist PDF berhasil diupload!';
                $message_type = 'success';
            }
        } else {
            $message = 'File harus berformat PDF!';
            $message_type = 'danger';
        }
    }
    
    // Handle text settings
    foreach ($_POST as $key => $value) {
        if ($key !== 'submit') {
            $key_escaped = escapeString($conn, $key);
            $value_escaped = escapeString($conn, $value);
            
            $sql = "INSERT INTO settings (setting_key, setting_value) VALUES ('$key_escaped', '$value_escaped')
                    ON DUPLICATE KEY UPDATE setting_value='$value_escaped'";
            $conn->query($sql);
        }
    }
    
    if (empty($message)) {
        $message = 'Settings berhasil diupdate!';
        $message_type = 'success';
    }
}

$settings = fetchAll("SELECT * FROM settings ORDER BY id ASC");
$settings_array = [];
foreach ($settings as $setting) {
    $settings_array[$setting['setting_key']] = $setting['setting_value'];
}

$conn->close();

$page_title = 'Settings';
include 'includes/header.php';
?>

<?php if ($message): ?>
    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show">
        <?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5>Website Settings</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Site Name</label>
                        <input type="text" name="site_name" class="form-control" 
                               value="<?= htmlspecialchars($settings_array['site_name'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Site Tagline</label>
                        <input type="text" name="site_tagline" class="form-control" 
                               value="<?= htmlspecialchars($settings_array['site_tagline'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Contact Phone</label>
                        <input type="text" name="contact_phone" class="form-control" 
                               value="<?= htmlspecialchars($settings_array['contact_phone'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" 
                               value="<?= htmlspecialchars($settings_array['contact_email'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Contact Address</label>
                        <textarea name="contact_address" class="form-control" rows="2"><?= htmlspecialchars($settings_array['contact_address'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">WhatsApp Number</label>
                        <input type="text" name="whatsapp_number" class="form-control" 
                               value="<?= htmlspecialchars($settings_array['whatsapp_number'] ?? '') ?>"
                               placeholder="628123456789">
                        <small class="text-muted">Tanpa tanda + atau -</small>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="mb-3">
                        <label class="form-label">Pricelist PDF</label>
                        <input type="file" name="pricelist_pdf" class="form-control" accept=".pdf">
                        <?php if (!empty($settings_array['pricelist_pdf'])): ?>
                            <small class="text-success d-block mt-2">
                                <i class="fas fa-check-circle"></i> Current: <?= htmlspecialchars($settings_array['pricelist_pdf']) ?>
                            </small>
                        <?php endif; ?>
                        <small class="text-muted">Upload file PDF untuk pricelist yang bisa didownload</small>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
