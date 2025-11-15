<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../admin/db_config.php';

$doctor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($doctor_id <= 0) {
    header('Location: doctor.php');
    exit;
}

$doctor = fetchOnePrepared(
    "SELECT d.*, ds.name as specialty_name FROM doctors d 
     LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id 
     WHERE d.id=? AND d.is_active=1",
    'i',
    [$doctor_id]
);

if (!$doctor) {
    header('Location: doctor.php');
    exit;
}

$schedules = fetchAllPrepared(
    "SELECT * FROM doctor_schedules WHERE doctor_id=? AND is_active=1 
     ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), 
     start_time ASC",
    'i',
    [$doctor_id]
);

$other_doctors = fetchAllPrepared(
    "SELECT d.*, ds.name as specialty_name FROM doctors d 
     LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id 
     WHERE d.id != ? AND d.is_active=1 
     ORDER BY RAND() LIMIT 3",
    'i',
    [$doctor_id]
);

$bidang = !empty($doctor['services_offered']) ? explode(',', $doctor['services_offered']) : [];
$pendidikan = !empty($doctor['education']) ? explode("\n", $doctor['education']) : [];

// Buat pesan WhatsApp yang lebih informatif
$wa_message = "Halo Seuri Dental Specialist,%0A%0A";
$wa_message .= "Saya ingin booking jadwal konsultasi dengan:%0A";
$wa_message .= "• Dokter: " . $doctor['name'] . " " . ($doctor['title'] ?? '') . "%0A";
$wa_message .= "• Spesialisasi: " . ($doctor['specialty_name'] ?? $doctor['specialty'] ?? 'Dokter Gigi') . "%0A%0A";
$wa_message .= "Bisa dibantu untuk informasi jadwal praktik dan cara reservasinya?%0A%0A";
$wa_message .= "Terima kasih%0A";
$wa_message .= "- dari website seuri.id";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($doctor['name']) ?> - Seuri Dental Specialist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
    <link rel="stylesheet" href="<?= component_css('about-seuri-clinic.css') ?>">
    <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
    <link rel="stylesheet" href="<?= component_css('why-love-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('profile-doctor.css') ?>">
    <style>
        .book-btn {
            display: inline-block;
            text-decoration: none;
            text-align: center;
            background: #d4a574;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            width: auto;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .book-btn:hover {
            background: #c49563;
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .other-doctor-card {
      
            border-radius: 16px;
            padding: 1.2rem;
        
            transition: all 0.3s ease;
        }
        .other-doctor-card:hover {
            transform: translateY(-5px);
        
        }
        .other-doctor-photo {
            width: 100%;
            object-fit: cover;
        }
        .other-doctor-name {
            color: #1a1a1a;
            font-weight: 600;
        }
        .other-doctor-spec {
   
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    <section class="doctor-profile-section">
        <div class="container">
            <div class="mb-3">
                <a href="doctor.php" class="btn ">← </a>
            </div>
            <div class="row align-items-start g-4">
                <div class="col-lg-4 col-md-5">
                    <div class="doctor-photo text-center">
                        <?php if ($doctor['photo']): ?>
                            <img src="<?= BASE_URL ?>/uploads/doctors/<?= htmlspecialchars($doctor['photo']) ?>" 
                                 alt="<?= htmlspecialchars($doctor['name']) ?>" 
                                 class="img-fluid rounded-4 shadow-sm"
                                 onerror="this.src='https://placehold.co/400x400?text=No+Image'">
                        <?php else: ?>
                            <img src="https://placehold.co/400x400?text=<?= urlencode($doctor['name']) ?>" 
                                 alt="<?= htmlspecialchars($doctor['name']) ?>" 
                                 class="img-fluid rounded-4 shadow-sm">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="doctor-info">
                        <h2 class="doctor-name"><?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?></h2>
                        <p class="doctor-specialist"><?= htmlspecialchars($doctor['specialty_name'] ?? $doctor['specialty']) ?></p>
                        <?php if ($doctor['experience_years'] > 0): ?>
                        <div class="doctor-meta mb-3">
                            <span class="meta-item"><i class="fa fa-briefcase"></i> <?= intval($doctor['experience_years']) ?> Tahun Pengalaman</span>
                        </div>
                        <?php endif; ?>
                        <?php if ($doctor['bio']): ?>
                        <div class="doctor-section">
                            <h5>Tentang</h5>
                            <p><?= nl2br(htmlspecialchars($doctor['bio'])) ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($bidang)): ?>
                        <div class="doctor-section">
                            <h5>Bidang Keahlian</h5>
                            <?php foreach ($bidang as $b): ?>
                                <span class="badge-skill"><?= htmlspecialchars(trim($b)) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($pendidikan)): ?>
                        <div class="doctor-section">
                            <h5>Education</h5>
                            <ul class="doctor-edu-list">
                                <?php foreach ($pendidikan as $p): 
                                    $p = trim($p);
                                    if (!empty($p)):
                                ?>
                                    <li><?= htmlspecialchars($p) ?></li>
                                <?php endif; endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Tombol BOOK NOW yang sudah diperbaiki -->
                        <a href="https://wa.me/6281280089191?text=<?= $wa_message ?>" 
                           target="_blank" 
                           class="book-btn">
                            BOOK NOW
                        </a>
                    </div>
                </div>
            </div>
            <?php if (!empty($schedules)): ?>
            <div class="schedule-section mt-5">
                <h4 class="schedule-title"><i class="fa fa-calendar-days"></i> Jadwal Praktik</h4>
                <p class="schedule-sub">Cek jadwal praktik dokter gigi <?= htmlspecialchars($doctor['name']) ?> di Seuri Dental Clinic Bogor.</p>
                <div class="table-responsive">
                    <table class="schedule-table">
                        <thead>
                            <tr><th>Hari</th><th>Jam</th><th>Praktik</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($schedules as $schedule): ?>
                                <tr>
                                    <td><?= htmlspecialchars($schedule['day_of_week']) ?></td>
                                    <td><?= date('H:i', strtotime($schedule['start_time'])) ?> - <?= date('H:i', strtotime($schedule['end_time'])) ?></td>
                                    <td><?= htmlspecialchars($schedule['notes'] ?: 'Seuri Dental Bogor') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            <?php if (!empty($other_doctors)): ?>
            <div class="other-doctor-section mt-5">
                <div class="row align-items-center">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h4 class="fw-bold">Lihat Profil Dokter Gigi Kami</h4>
                        <p class="text-muted mb-4">Check jadwal dokter gigi lainnya yang cocok dengan jadwal Anda.</p>
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted">Swipe</span>
                            <i class="bi bi-arrow-left-right fs-5 text-secondary"></i>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="swiper otherDoctorSwiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($other_doctors as $d): ?>
                                    <div class="swiper-slide">
                                        <div class="other-doctor-card text-center" onclick="window.location.href='<?= url('profil-dokter/' . $d['id']) ?>'" style="cursor: pointer;">
                                            <?php if ($d['photo']): ?>
                                                <img src="<?= BASE_URL ?>/uploads/doctors/<?= htmlspecialchars($d['photo']) ?>" 
                                                     class="other-doctor-photo rounded-4 mb-3" 
                                                     alt="<?= htmlspecialchars($d['name']) ?>"
                                                     onerror="this.src='https://placehold.co/300x300?text=No+Image'">
                                            <?php else: ?>
                                                <img src="https://placehold.co/300x300?text=<?= urlencode($d['name']) ?>" 
                                                     class="other-doctor-photo rounded-4 mb-3" 
                                                     alt="<?= htmlspecialchars($d['name']) ?>">
                                            <?php endif; ?>
                                            <h6 class="other-doctor-name"><?= htmlspecialchars($d['name']) ?> <?= htmlspecialchars($d['title']) ?></h6>
                                            <p class="other-doctor-spec"><?= htmlspecialchars($d['specialty_name'] ?? $d['specialty']) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php include __DIR__ . '/../components/consultation-cta.php'; ?><br><br><br>
    <?php include __DIR__ . '/../partials/footer.php'; ?>
    
    <!-- Bootstrap Icons & SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const otherDoctorSwiper = new Swiper(".otherDoctorSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            grabCursor: true,
            loop: true,
            breakpoints: {
                0: { slidesPerView: 1.3 },
                768: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    </script>
</body>
</html>