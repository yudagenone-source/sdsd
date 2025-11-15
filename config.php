<?php
// config.php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script_dir = dirname($_SERVER['SCRIPT_NAME']);

// Untuk menghindari /pages/ di BASE_URL
if (strpos($script_dir, '/pages') !== false) {
    $script_dir = str_replace('/pages', '', $script_dir);
}

$base_url = $protocol . '://' . $host . $script_dir;
$base_url = rtrim($base_url, '/');

define('BASE_URL', $base_url);
define('ASSETS_URL', BASE_URL . '/assets');
define('IMAGES_URL', ASSETS_URL . '/image');
define('ICON_URL', ASSETS_URL . '/icon');
define('CSS_URL', ASSETS_URL . '/css');

// Function untuk generate URL yang clean
function url($path = '') {
    if (empty($path)) {
        return BASE_URL;
    }
    return BASE_URL . '/' . ltrim($path, '/');
}

// Function untuk CSS
function css($path) {
    return CSS_URL . '/' . ltrim($path, '/');
}

// Function untuk CSS components
function component_css($filename) {
    return css('components/' . $filename);
}

// Function untuk CSS partials
function partial_css($filename) {
    return css('partials/' . $filename);
}

// Function untuk CSS pages
function page_css($filename) {
    return css('pages/' . $filename);
}

// Function untuk images
function image($filename) {
    return IMAGES_URL . '/' . ltrim($filename, '/');
}

function icon($filename) {
    return ICON_URL . '/' . ltrim($filename, '/');
}

// Function untuk uploaded images (dari admin panel)
function uploaded_image($filename, $folder = '') {
    if (empty($filename)) {
        return 'https://placehold.co/400x300?text=No+Image';
    }
    
    $uploads_url = BASE_URL . '/uploads';
    
    if (!empty($folder)) {
        return $uploads_url . '/' . ltrim($folder, '/') . '/' . ltrim($filename, '/');
    }
    
    return $uploads_url . '/' . ltrim($filename, '/');
}

// Function untuk CSS background (optional)
function css_background($filename) {
    return 'url("' . IMAGES_URL . '/' . $filename . '")';
}

// Include database configuration
require_once __DIR__ . '/admin/db_config.php';
?>