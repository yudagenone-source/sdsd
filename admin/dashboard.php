<?php
require_once 'auth_check.php';
require_once 'db_config.php';

$stats = [
    'services' => 0,
    'doctors' => 0,
    'testimonials' => 0,
    'news' => 0
];

$conn = getDBConnection();

$result = $conn->query("SELECT COUNT(*) as count FROM services WHERE is_active = 1");
if ($row = $result->fetch_assoc()) $stats['services'] = $row['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM doctors WHERE is_active = 1");
if ($row = $result->fetch_assoc()) $stats['doctors'] = $row['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM testimonials WHERE is_active = 1");
if ($row = $result->fetch_assoc()) $stats['testimonials'] = $row['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM news WHERE is_published = 1");
if ($row = $result->fetch_assoc()) $stats['news'] = $row['count'];

$conn->close();

$page_title = 'Dashboard';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Services</h5>
                <h2 class="mb-0"><?= $stats['services'] ?></h2>
                <small>Total Layanan Aktif</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Doctors</h5>
                <h2 class="mb-0"><?= $stats['doctors'] ?></h2>
                <small>Total Dokter Aktif</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Testimonials</h5>
                <h2 class="mb-0"><?= $stats['testimonials'] ?></h2>
                <small>Total Testimoni Aktif</small>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">News</h5>
                <h2 class="mb-0"><?= $stats['news'] ?></h2>
                <small>Total Berita Published</small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Selamat Datang di Admin Panel</h5>
            </div>
            <div class="card-body">
                <p>Gunakan menu di sebelah kiri untuk mengelola konten website Seuri Dental Specialist.</p>
                <ul>
                    <li><strong>Services:</strong> Kelola layanan yang ditawarkan</li>
                    <li><strong>Doctors:</strong> Kelola data dokter dan jadwal</li>
                    <li><strong>Testimonials:</strong> Kelola testimoni pasien</li>
                    <li><strong>News/Blog:</strong> Kelola artikel dan berita</li>
                    <li><strong>Promos:</strong> Kelola promo dan diskon</li>
                    <li><strong>Facilities:</strong> Kelola fasilitas klinik</li>
                    <li><strong>Partners:</strong> Kelola partner dan asuransi</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
