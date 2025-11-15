<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../admin/db_config.php';

$search_date = isset($_GET['date']) ? $_GET['date'] : '';
$search_treatment = isset($_GET['treatment']) ? $_GET['treatment'] : '';

$conn = getDBConnection();

if (!empty($search_date) && !empty($search_treatment)) {
    $day_of_week = date('l', strtotime($search_date));

    $query = "SELECT DISTINCT d.*, ds.name as specialty_name 
              FROM doctors d 
              LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id 
              INNER JOIN doctor_schedules dsch ON d.id = dsch.doctor_id AND dsch.is_active=1 AND dsch.day_of_week = ?
              WHERE d.is_active=1 
              AND (ds.name LIKE ? OR d.services_offered LIKE ?)
              ORDER BY d.display_order ASC, d.id DESC";
    $search_term = '%' . $search_treatment . '%';
    $doctors = fetchAllPrepared($query, 'sss', [$day_of_week, $search_term, $search_term]);
} else {
    $query = "SELECT d.*, ds.name as specialty_name FROM doctors d 
              LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id 
              WHERE d.is_active=1 
              ORDER BY d.display_order ASC, d.id DESC";
    $doctors = fetchAllPrepared($query);
}

$specialties = fetchAllPrepared("SELECT * FROM doctor_specialties WHERE is_active=1 ORDER BY name ASC");

$featured_doctor = !empty($doctors) ? $doctors[0] : null;

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentist Terdekat - Seuri Dental Specialist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
    <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('why-love-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
    <style>
        .doctor-page-wrapper {
            background: #f8f9fa;
            padding: 60px 0;
        }

        .page-title {
            text-align: center;
            color: #7B93B0;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 40px;
        }

        .featured-doctor-section {
            background: #f8f9fa;
            border-radius: 0;
            padding: 50px 0;
            margin-bottom: 30px;
            box-shadow: none;
        }

        .featured-doctor-img {
            width: 100%;
            max-width: 280px;
            border-radius: 30px;
            object-fit: cover;
            aspect-ratio: 1 / 1;
        }

        .featured-doctor-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 40px;
        }

        .featured-doctor-quote {
            font-style: italic;
            color: #3c3c3c;
            font-size: 1.5rem;
            margin-bottom: 30px;
            line-height: 1.5;
            font-weight: 500;
        }

        .featured-doctor-name {
            font-weight: 500;
            color: #5a6c7d;
            font-size: 1rem;
            margin-bottom: 3px;
        }

        .featured-doctor-specialty {
            color: #5a6c7d;
            font-size: 0.95rem;
            font-style: italic;
        }

        .search-box {
            background: white;
            border-radius: 50px;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 0.95rem;
            width: 100%;
            padding: 5px 15px;
        }

        .search-box input::placeholder {
            color: #999;
        }

        .two-column-section {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .left-column {
            flex: 0 0 35%;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            max-height: 600px;
            overflow-y: auto;
        }

        .left-column::-webkit-scrollbar {
            width: 8px;
        }

        .left-column::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .left-column::-webkit-scrollbar-thumb {
            background: #c9a55d;
            border-radius: 10px;
        }

        .left-column h3 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .left-column p {
            color: #5a6c7d;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .book-now-btn {
            background: #d4a574;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            width: auto;
            display: inline-block;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .book-now-btn:hover {
            background: #c49563;
            transform: translateY(-2px);
        }

        .left-column .why-section {
            margin-top: 40px;
        }

        .left-column .why-section h4 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .left-column .why-list {
            list-style: none;
            padding: 0;
        }

        .left-column .why-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #2c3e50;
            font-size: 1rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .left-column .why-list li .icon-plus {
            color: #d4a574;
            font-size: 1.2rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .right-column {
            flex: 1;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            max-height: 600px;
            overflow-y: auto;
        }

        .right-column::-webkit-scrollbar {
            width: 8px;
        }

        .right-column::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .right-column::-webkit-scrollbar-thumb {
            background: #c9a55d;
            border-radius: 10px;
        }

        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .doctor-card {
            background: #f8f9fa;
            border: none;
            border-radius: 20px;
            padding: 0;
            transition: all 0.3s;
            overflow: hidden;
        }

        .doctor-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }

        .doctor-card-img-wrapper {
            width: 100%;
            height: 220px;
            background: #f8f9fa;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .doctor-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        .doctor-card-body {
            padding: 0 15px 15px 15px;
        }

        .doctor-card-name {
            font-weight: 600;
            color: #6B8CAE;
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .doctor-card-specialty {
            display: inline-block;
            background: transparent;
            color: #5a6c7d;
            padding: 5px 15px;
            border: 1px solid #d0d5dd;
            border-radius: 20px;
            font-size: 0.75rem;
            margin-bottom: 12px;
        }

        .doctor-card-info {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            color: #5a6c7d;
            font-size: 0.85rem;
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .doctor-card-info i {
            color: #5a6c7d;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .doctor-card-info .more-link {
            color: #6B8CAE;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .doctor-card-info .more-link:hover {
            text-decoration: underline;
        }

        .search-form-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .search-form-section h4 {
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-label-custom {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control-custom,
        .form-select-custom {
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .form-control-custom:focus,
        .form-select-custom:focus {
            border-color: #c9a55d;
            box-shadow: 0 0 0 0.2rem rgba(201, 165, 93, 0.25);
        }

        .btn-search {
            background: #7B93B0;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-search:hover {
            background: #6a7f96;
        }

        /* Styles untuk artikel expandable */
        .artikel-container {
            position: relative;
        }
        
        .artikel {
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .artikel.collapsed {
            max-height: 150px;
            mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
        }
        
        .artikel.expanded {
            max-height: none;
            mask-image: none;
            -webkit-mask-image: none;
        }
        
        .selengkapnya-btn {
            cursor: pointer;
            color: #6c757d;
            font-weight: 600;
            margin-top: 10px;
            display: inline-block;
            transition: color 0.3s;
        }
        
        .selengkapnya-btn:hover {
            color: #495057;
        }

        @media (max-width: 992px) {
            .two-column-section {
                flex-direction: column;
            }

            .left-column {
                flex: 1;
                max-height: none;
            }

            .right-column {
                max-height: 500px;
            }

            .doctors-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.5rem;
            }

            .featured-doctor-img {
                max-width: 200px;
                margin: 0 auto 20px;
                display: block;
            }

            .featured-doctor-content {
                padding-left: 0;
                text-align: center;
            }

            .featured-doctor-quote {
                font-size: 1.2rem;
            }

            .doctor-page-wrapper {
                padding: 30px 0;
            }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <div class="doctor-page-wrapper">
        <div class="container">
            <h1 class="page-title">Dentist Terdekat, di Kota Bogor</h1>

            <!-- Featured Doctor Section -->
            <div class="featured-doctor-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="https://placehold.co/300x300?text=Dr.+Marcella+Harlan"
                                alt="Dr. Marcella Harlan"
                                class="featured-doctor-img">
                        </div>
                        <div class="col-md-8">
                            <div class="featured-doctor-content">
                                <p class="featured-doctor-quote">"Exceptional dentistry begins with skilled hands and a heart that listens."</p>
                                <div class="featured-doctor-info">
                                    <p class="featured-doctor-name">drg. Marcella Harlan, Sp. Ort</p>
                                    <p class="featured-doctor-specialty">Orthodontist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-form-section" id="searchFormToggle">
                <h4>Check Jadwal Dokter Gigi Seuri Bogor</h4>
                <form method="GET" action="">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label-custom">Hari dan Tanggal:</label>
                            <input type="text" id="dateInput" name="date" class="form-control-custom" placeholder="Pilih tanggal" readonly value="<?= htmlspecialchars($search_date) ?>">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label-custom">Treatment:</label>
                            <select name="treatment" class="form-select-custom">
                                <option value="">Pilih Treatment</option>
                                <?php foreach ($specialties as $specialty): ?>
                                    <option value="<?= htmlspecialchars($specialty['name']) ?>" <?= $search_treatment == $specialty['name'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($specialty['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn-search w-100">Check Jadwal</button>
                        </div>
                    </div>
                    <?php if (!empty($search_date) && !empty($search_treatment)): ?>
                        <div class="mt-3 text-center">
                            <small class="text-muted">Menampilkan dokter untuk <strong><?= date('l, d F Y', strtotime($search_date)) ?></strong> - <strong><?= htmlspecialchars($search_treatment) ?></strong></small>
                            <a href="?" class="btn btn-sm btn-outline-secondary ms-2">Reset</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>

            <div class="two-column-section">
                <div class="left-column">
                    <h3>Check Jadwal Dokter Gigi Seuri Bogor</h3>
                    <p>Dokter gigi spesialis dan dokter gigi umum terpercaya untuk kesehatan gigimu.</p>
                   <button type="button" class="book-now-btn" 
    onclick="window.open('https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20mau%20tanya%20tentang%20perawatan%20yang%20di%20Seuri%20Dental.%20-seuri.id', '_blank')">
    BOOK NOW
</button>
                    <div class="why-section">
                        <h4>Mengapa Pilih Dokter Gigi di Seuri Dental?</h4>
                        <ul class="why-list">
                            <li>
                                <span class="icon-plus">✚</span>
                                <span>Dokter gigi spesialis terlengkap</span>
                            </li>
                            <li>
                                <span class="icon-plus">✚</span>
                                <span>Profesional dan <em>Experienced</em></span>
                            </li>
                            <li>
                                <span class="icon-plus">✚</span>
                                <span>Handled more than 100+ cases</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="right-column">
                    <div class="doctors-grid">
                        <?php if (count($doctors) > 0): ?>
                            <?php foreach ($doctors as $doctor): ?>
                                <div class="doctor-card">
                                    <a href="<?= url('pages/profile-doctor.php?id=' . $doctor['id']) ?>" style="text-decoration: none; color: inherit;">
                                        <div class="doctor-card-img-wrapper">
                                            <?php if ($doctor['photo']): ?>
                                                <img src="<?= BASE_URL ?>/uploads/doctors/<?= htmlspecialchars($doctor['photo']) ?>"
                                                    alt="<?= htmlspecialchars($doctor['name']) ?>"
                                                    class="doctor-card-img"
                                                    onerror="this.src='https://placehold.co/300x300?text=No+Photo'">
                                            <?php else: ?>
                                                <img src="https://placehold.co/300x300?text=<?= urlencode($doctor['name']) ?>"
                                                    alt="<?= htmlspecialchars($doctor['name']) ?>"
                                                    class="doctor-card-img">
                                            <?php endif; ?>
                                        </div>

                                        <div class="doctor-card-body">
                                            <p class="doctor-card-name"><?= htmlspecialchars($doctor['name']) ?><?= $doctor['title'] ? ', ' . htmlspecialchars($doctor['title']) : '' ?></p>

                                            <span class="doctor-card-specialty"><?= htmlspecialchars($doctor['specialty_name'] ?? $doctor['specialty'] ?? 'Dokter Gigi Umum') ?></span>

                                            <?php if (!empty($doctor['experience_years']) && $doctor['experience_years'] > 0): ?>
                                                <div class="doctor-card-info">
                                                    <i class="fas fa-briefcase"></i>
                                                    <span><?= intval($doctor['experience_years']) ?> Tahun</span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($doctor['services_offered'])): ?>
                                                <div class="doctor-card-info">
                                                    <i class="fas fa-check-circle"></i>
                                                    <span>
                                                        <?php
                                                        $services = htmlspecialchars($doctor['services_offered']);
                                                        $services_arr = explode(',', $services);
                                                        $first_services = array_slice($services_arr, 0, 2);
                                                        echo implode(', ', $first_services);
                                                        if (count($services_arr) > 2) {
                                                            echo '... <span class="more-link">+ more</span>';
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center py-4">
                                <p class="text-muted">Tidak ada dokter yang tersedia</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include __DIR__ . '/../components/testimoni-seuri.php'; ?>
    <?php include __DIR__ . '/../components/why-love-seuri.php'; ?>
    <?php include __DIR__ . '/../components/consultation-cta.php'; ?>

    <section style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container text-left">
            <h2 class="fw-bold text-secondary">
                Dentist Terdekat di Bogor yang Profesional dan Terpercaya
            </h2>
            <div class="artikel-container">
                <div class="artikel collapsed mt-4">
                    Saat mengalami sakit gigi atau ingin menjaga kesehatan mulut tetap optimal, menemukan dentist terdekat di Bogor adalah pilihan yang tepat.
                    Dengan lokasi yang mudah dijangkau, Anda bisa mendapatkan perawatan lebih cepat tanpa perlu menunggu terlalu lama.
                    <br><br>
                    Layanan yang biasanya tersedia di dentist terdekat di Bogor meliputi pemeriksaan rutin, pembersihan karang gigi, tambal gigi berlubang, perawatan
                    saluran akar, hingga pencabutan gigi. Tidak hanya itu, banyak klinik juga menyediakan layanan estetik seperti veneer, teeth whitening, serta
                    perawatan ortodonti seperti behel dan aligner untuk memperbaiki susunan gigi.
                    <br><br>

                    Tips memilih dentist terdekat di Bogor: pastikan klinik memiliki izin resmi, dokter berpengalaman, fasilitas higienis, dan ulasan positif dari pasien. Dengan
                    begitu, Anda bisa merasa lebih tenang saat menjalani perawatan.

                    <br><br>
                    Jangan tunggu sampai sakit gigi mengganggu aktivitas. Segera kunjungi dentist terdekat di Bogor dan dapatkan perawatan profesional untuk
                    menjaga senyum tetap sehat dan percaya diri.
                </div>
                <p class="selengkapnya-btn gray fw-semibold mt-2">Selengkapnya...</p>
            </div>
        </div>
    </section>

    <section style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container text-left">
            <h2 class="fw-bold text-secondary">
                Dokter Gigi Spesialis Hingga Umum di Seuri Dental Bogor
            </h2>

            <div class="artikel-container">
                <div class="artikel collapsed mt-4">
                    Ada 7 spesialisasi dokter gigi spesialis di Seuri Dental Bogor yakni:
                </div>

                <ul style="margin-left: 20px;">
                    <li>Spesialis Konservasi Gigi: Ahli merawat gigi berlubang atau retak.</li>
                    <li>Spesialis Anak (Pedodontist): Fokus pada perawatan gigi anak.</li>
                    <li>Spesialis Periodonsia: Menangani penyakit gusi dan jaringan penyangga gigi.</li>
                    <li>Spesialis Prostodonsia: Membuat gigi tiruan untuk menggantikan gigi yang hilang.</li>
                    <li>Spesialis Bedah Mulut: Mengatasi kasus kompleks seperti operasi gigi bungsu, abses, atau patah rahang.</li>
                    <li>Spesialis Ortodonsia: Memperbaiki susunan gigi dan rahang dengan kawat gigi atau aligner.</li>
                    <li>Dokter Gigi Umum: Menangani perawatan dasar seperti tambal, scaling, dan pencabutan.</li>
                </ul>

                <div class="artikel-container">
                    <div class="artikel collapsed mt-3">
                       Jika Anda membutuhkan perawatan khusus, pastikan untuk memilih dokter gigi spesialis terdekat yang sesuai dengan kebutuhan Anda.
                    </div>
                    <p class="selengkapnya-btn gray fw-semibold mt-2">Selengkapnya...</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk artikel expandable
            function initExpandableArticles() {
                const selengkapnyaButtons = document.querySelectorAll('.selengkapnya-btn');
                
                selengkapnyaButtons.forEach((button) => {
                    const container = button.closest('.artikel-container');
                    const artikel = container.querySelector('.artikel');
                    
                    // Cek apakah artikel perlu tombol selengkapnya
                    if (artikel.scrollHeight > 150) {
                        artikel.classList.add('collapsed');
                        button.style.display = 'block';
                        
                        button.addEventListener("click", () => {
                            if (artikel.classList.contains('collapsed')) {
                                artikel.classList.remove('collapsed');
                                artikel.classList.add('expanded');
                                button.innerText = "Sembunyikan";
                            } else {
                                artikel.classList.remove('expanded');
                                artikel.classList.add('collapsed');
                                button.innerText = "Selengkapnya...";
                                
                                // Scroll ke atas artikel
                                artikel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            }
                        });
                    } else {
                        button.style.display = 'none';
                    }
                });
            }

            initExpandableArticles();
        });
    </script>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#dateInput", {
                locale: "id",
                altInput: true,
                altFormat: "D, d M Y",
                dateFormat: "Y-m-d",
                minDate: "today",
                allowInput: false
            });
        });
    </script>
</body>

</html>