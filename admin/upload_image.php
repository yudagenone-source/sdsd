<?php
require_once 'upload_helper.php';

header('Content-Type: application/json');

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $upload = handleFileUpload($_FILES['file'], '../uploads/news');
    
    if ($upload['success']) {
        // Return URL gambar yang sudah diupload
        $image_url = '../uploads/news/' . $upload['filename'];
        echo $image_url;
    } else {
        http_response_code(500);
        echo json_encode(['error' => $upload['message']]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'No file uploaded']);
}
?>
