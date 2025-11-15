<?php
session_start();
require_once 'auth_check.php';
require_once 'db_config.php';

$conn = getDBConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = intval($_POST['booking_id']);
    $new_status = $_POST['status'];
    
    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param('si', $new_status, $booking_id);
    $stmt->execute();
    $stmt->close();
    
    header('Location: bookings.php?success=1');
    exit;
}

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header('Location: bookings.php?deleted=1');
    exit;
}

$query = "SELECT b.*, d.name as doctor_name, d.title as doctor_title 
          FROM bookings b 
          LEFT JOIN doctors d ON b.doctor_id = d.id 
          ORDER BY b.created_at DESC";
$bookings = fetchAllPrepared($query);

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Seuri Dental Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                <!-- Sidebar would go here if you have one -->
            </div>
            <div class="col-md-10 p-4">
                <h2>Manage Bookings</h2>
                
                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">Status booking berhasil diupdate!</div>
                <?php endif; ?>
                
                <?php if (isset($_GET['deleted'])): ?>
                    <div class="alert alert-info">Booking berhasil dihapus!</div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pasien</th>
                                        <th>Telepon</th>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Treatment</th>
                                        <th>Status</th>
                                        <th>Dibuat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($bookings) > 0): ?>
                                        <?php foreach ($bookings as $booking): ?>
                                        <tr>
                                            <td><?= $booking['id'] ?></td>
                                            <td><?= htmlspecialchars($booking['patient_name']) ?></td>
                                            <td><?= htmlspecialchars($booking['patient_phone']) ?></td>
                                            <td><?= htmlspecialchars($booking['doctor_name'] . ' ' . $booking['doctor_title']) ?></td>
                                            <td><?= date('d/m/Y', strtotime($booking['booking_date'])) ?></td>
                                            <td><?= htmlspecialchars($booking['treatment']) ?></td>
                                            <td>
                                                <form method="POST" style="display: inline;">
                                                    <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="pending" <?= $booking['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                        <option value="confirmed" <?= $booking['status'] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                                        <option value="cancelled" <?= $booking['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                    </select>
                                                    <input type="hidden" name="update_status" value="1">
                                                </form>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($booking['created_at'])) ?></td>
                                            <td>
                                                <a href="?delete=<?= $booking['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus booking ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada booking</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
