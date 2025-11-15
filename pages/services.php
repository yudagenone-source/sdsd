<?php
require_once __DIR__ . '/../config.php';

// Fetch active services from database
$services = fetchAll("SELECT * FROM services WHERE is_active = 1 ORDER BY display_order ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Seuri Dental Specialist</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Internal CSS - LOAD SEKALI DI HEAD -->
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
    
    <!-- Components CSS yang DIBUTUHKAN -->
    <link rel="stylesheet" href="<?= component_css('about.css') ?>">
    <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= page_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('before-after.css') ?>">
    <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('our-facilities.css') ?>">
    <link rel="stylesheet" href="<?= component_css('our-partner.css') ?>">
    <link rel="stylesheet" href="<?= component_css('insurance-partner.css') ?>">
    <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
    <link rel="stylesheet" href="<?= component_css('why-love-seuri.css') ?>">
    <link rel="stylesheet" href="<?= page_css('detail-services.css') ?>">
    
    <!-- Mobile Responsive CSS -->
    <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">

    <style>
        /* Styling untuk bagian layanan gigi */
        .services-banner {
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .services-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .services-content {
            padding: 0 0 50px 0;
        }
        
        .services-heading {
            font-family: 'Gilroy', sans-serif;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            font-size: 3.8rem;
        }
        
        .services-description {
            font-family: 'Gilroy', sans-serif;
            color: #5a6c7d;
            font-size: 1.8rem;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .services-grid-photo {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 30px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 15px;
        }
        
        .service-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Detail Services Styling */
        .detail-service {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .service-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .service-header h1 {
            font-size: 3rem;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .service-header p {
            font-size: 1.2rem;
            color: #5a6c7d;
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
           
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .service-header-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .service-icon {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .service-icon img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .service-card h3 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin: 0;
            font-weight: 600;
        }

        .service-card p {
            color: #5a6c7d;
            line-height: 1.6;
            margin: 0;
            font-size: 1rem;
        }

        .highlight-text {
            color: #D1A361;
            font-weight: 600;
        }

        /* Little Seuri Section */
        .about-section .about-content h4 {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .about-section .about-content h4 img {
            margin-right: 10px;
        }

        @media (max-width: 1024px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .services-banner {
                height: 250px;
            }
            
            .services-grid-photo {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            
            .service-image {
                height: 180px;
            }

            .services-heading {
                font-size: 2.5rem;
            }

            .services-description {
                font-size: 1.4rem;
            }

            .service-header h1 {
                font-size: 2.2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 15px;
            }

            .service-card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .services-grid-photo {
                grid-template-columns: 1fr;
            }
            
            .service-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <?php 
    require_once __DIR__ . '/../config.php';
    include __DIR__ . '/../partials/header.php'; 
    ?>
    
    <!-- Banner Image -->
    <section class="services-banner">
        <img src="<?= image('service-banner.webp') ?>" alt="Layanan Gigi Seuri Dental Clinic">
    </section>

    <!-- Konten Layanan -->
    <section class="services-content">
        <div class="container">
            <h2 class="services-heading">Layanan Gigi di Seuri Dental Clinic</h2>
            <p class="services-description">
                Cek layanan gigi dari Seuri Dental Clinic yang sesuai dengan kebutuhan Anda
            </p>
        </div>
        
        <!-- Grid Foto Kotak -->
        <div class="services-grid-photo">
            <img src="<?= image('service1.webp') ?>" alt="Perawatan Gigi" class="service-image">
            <img src="<?= image('service2.webp') ?>" alt="Konsultasi Gigi" class="service-image">
            <img src="<?= image('service3.webp') ?>" alt="Pemeriksaan Gigi" class="service-image">
            <img src="<?= image('service4.webp') ?>" alt="Perawatan Ortodonti" class="service-image">
        </div>
    </section>

    <!-- Detail Services Section -->
    <section class="detail-service">
        <div class="container">
            <div class="service-header">
                <h1>Layanan Lengkap Seuri Dental Clinic</h1>
                <p>Berbagai perawatan gigi komprehensif dengan teknologi terkini dan tim dokter spesialis berpengalaman</p>
            </div>
            
            <div class="services-grid">
                <?php if (empty($services)): ?>
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-tooth fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada layanan yang tersedia.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($services as $service): ?>
                        <div class="service-card">
                            <div class="service-header-row">
                                <div class="service-icon">
                                    <img src="<?= image($service['icon_image']) ?>" 
                                         alt="<?= htmlspecialchars($service['title']) ?> Icon"
                                         onerror="this.src='<?= icon('icon1.png') ?>'">
                                </div>
                                <h3><?= htmlspecialchars($service['title']) ?></h3>
                            </div>
                            <p><?= nl2br(htmlspecialchars($service['description'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Little Seuri Section -->
    <section class="about-section">
        <div class="container about-container">
            <div class="row align-items-center">
                <div class="col-lg-8 about-content">
                    <div class="little-seuri-logo-wrapper">
                        <img src="<?= image('little-seuri.png') ?>" style="width: 350px;" alt="Little Seuri Logo" class="little-seuri-logo">
                    </div>
                    <h4><img style="width:28px;" src="<?= image('blink.png') ?>"> Ditangani oleh dokter gigi anak berpengalaman</h4>
                    <h4><img style="width:28px;" src="<?= image('blink.png') ?>"> Suasana nyaman yang ramah anak</h4>
                    <h4><img style="width:28px;" src="<?= image('blink.png') ?>"> Menggunakan alat modern dan teknologi canggih</h4>
                    <h4><img style="width:28px;" src="<?= image('blink.png') ?>"> Telah menangani 100+ kasus</h4>
                    <h4><img style="width:28px;" src="<?= image('blink.png') ?>"> Perawatan gentle care menghindari trauma</h4>
                </div>
                
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="<?= image('promo-little-seuri.png') ?>" alt="Dokter gigi sedang melayani pasien" class="img-fluid about-image shadow-lg">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Include Components -->
    <?php include __DIR__ . '/../components/before-after.php'; ?>
    <?php include __DIR__ . '/../components/why-love-seuri.php'; ?>
    <?php include __DIR__ . '/../components/consultation-cta.php'; ?>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carousels = document.querySelectorAll('.carousel');
            carousels.forEach(function(carousel) {
                var carouselInstance = new bootstrap.Carousel(carousel, {
                    interval: 5000,
                    wrap: true,
                    touch: true
                });
            });
        });
    </script>
</body>
</html>