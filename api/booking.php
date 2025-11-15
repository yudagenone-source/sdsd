<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../admin/db_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$doctor_id = isset($_POST['doctor_id']) ? intval($_POST['doctor_id']) : 0;
$booking_date = isset($_POST['booking_date']) ? $_POST['booking_date'] : '';
$treatment = isset($_POST['treatment']) ? $_POST['treatment'] : '';
$patient_name = isset($_POST['patient_name']) ? trim($_POST['patient_name']) : '';
$patient_phone = isset($_POST['patient_phone']) ? trim($_POST['patient_phone']) : '';

if ($doctor_id <= 0 || empty($booking_date) || empty($treatment) || empty($patient_name) || empty($patient_phone)) {
    echo json_encode(['success' => false, 'message' => 'Semua field harus diisi']);
    exit;
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $booking_date)) {
    echo json_encode(['success' => false, 'message' => 'Format tanggal tidak valid']);
    exit;
}

try {
    $conn = getDBConnection();
    
    $day_of_week = date('l', strtotime($booking_date));
    
    $check_schedule = $conn->prepare(
        "SELECT COUNT(*) as count FROM doctor_schedules 
         WHERE doctor_id = ? AND day_of_week = ? AND is_active = 1"
    );
    $check_schedule->bind_param('is', $doctor_id, $day_of_week);
    $check_schedule->execute();
    $result = $check_schedule->get_result();
    $schedule_check = $result->fetch_assoc();
    $check_schedule->close();
    
    if ($schedule_check['count'] == 0) {
        echo json_encode(['success' => false, 'message' => 'Dokter tidak tersedia pada tanggal yang dipilih']);
        $conn->close();
        exit;
    }
    
    $check_doctor_treatment = $conn->prepare(
        "SELECT d.*, ds.name as specialty_name 
         FROM doctors d 
         LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id 
         WHERE d.id = ? AND d.is_active = 1 
         AND (ds.name LIKE ? OR d.services_offered LIKE ?)"
    );
    $search_term = '%' . $treatment . '%';
    $check_doctor_treatment->bind_param('iss', $doctor_id, $search_term, $search_term);
    $check_doctor_treatment->execute();
    $treatment_result = $check_doctor_treatment->get_result();
    $check_doctor_treatment->close();
    
    if ($treatment_result->num_rows == 0) {
        echo json_encode(['success' => false, 'message' => 'Dokter tidak melayani treatment yang dipilih']);
        $conn->close();
        exit;
    }
    
    $stmt = $conn->prepare("INSERT INTO bookings (doctor_id, patient_name, patient_phone, booking_date, treatment, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param('issss', $doctor_id, $patient_name, $patient_phone, $booking_date, $treatment);
    
    if ($stmt->execute()) {
        $booking_id = $stmt->insert_id;
        echo json_encode([
            'success' => true, 
            'message' => 'Booking berhasil',
            'booking_id' => $booking_id
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menyimpan booking']);
    }
    
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}
