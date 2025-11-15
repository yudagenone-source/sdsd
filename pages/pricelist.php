<?php
require_once __DIR__ . '/../config.php';

$pricelist = fetchOne("SELECT * FROM settings WHERE setting_key = 'pricelist_pdf'");
$pdf_file = $pricelist['setting_value'] ?? '';

if (!empty($pdf_file) && file_exists(__DIR__ . '/../uploads/pricelist/' . $pdf_file)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Seuri-Dental-Pricelist.pdf"');
    header('Content-Length: ' . filesize(__DIR__ . '/../uploads/pricelist/' . $pdf_file));
    readfile(__DIR__ . '/../uploads/pricelist/' . $pdf_file);
    exit;
} else {
    header('Location: ' . BASE_URL);
    exit;
}
?>
