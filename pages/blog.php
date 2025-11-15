<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crown - Seuri Dental Specialist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
    <link rel="stylesheet" href="<?= component_css('about.css') ?>">
    <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= page_css('little-seuri.css') ?>">

    <link rel="stylesheet" href="<?= component_css('berita.css') ?>">
    <link rel="stylesheet" href="<?= component_css('berita-detail.css') ?>">
    
    <!-- Mobile Responsive CSS -->
    <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">
    
    <style>
        /* === SECTION DENTALSEURI2 === */
        .dentalseuri2-section {
            position: relative;
            background-color: #99bdde;
            border-radius: 20px;
            padding: 5rem 0 0;
            margin-top: 8.3rem;
            overflow: visible;
            z-index: 1;
        }

        /* Gambar utama */
        .dentalseuri2-main-image {
            position: relative;
            width: 880px;
            margin-top: 0px;
            /* nongol ke atas */
            margin-bottom: -20px;
            /* nempel ke bawah background */
            transform: translateX(-230px);
            /* geser ke kiri */
            z-index: 4;
        }

        /* Ornamen */
        .dentalseuri2-ornament {
            position: absolute;
            opacity: 0.9;
            z-index: 2;
        }

        .dentalseuri2-ornament-brown {
            width: 140px;
            top: 25%;
            left: -40px;
            transform: translateX(-20px);
        }

        .dentalseuri2-ornament-grey {
            width: 140px;
            bottom: 10%;
            right: 15px;
            z-index: 6;
            transform: translateX(-40px);
        }

        /* Teks dan tombol */
        .dentalseuri2-title {
            color: #2e4368;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 1rem;
            font-size: 50px;
        }

        .dentalseuri2-desc {
            color: white;
            margin-bottom: 2rem;
            font-weight: 400;
            font-size: 25px;
            line-height: normal;
        }

        .dentalseuri2-btn {
            background-color: #D1A361;
            border: none;
            color: #fff;
            font-size: 30px;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        .dentalseuri2-btn:hover {
            background-color: #d89441;
            color: #fff;
        }

        /* Section Informasi */
        .dentalseuri2-info-section {
            max-width: 100%;
            transform: translateY(-80px);
            background-color: #cdcdcf;
            height: 220px;
            border-radius: 30px;
        }

        .dentalseuri2-info-row {
            padding: 2rem;
            padding-top: 80px;
        }


        /* Responsif */
        @media (max-width: 768px) {}
    </style>
</head>

<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>

    <!-- === SECTION DENTALSEURI2 === -->
    <section id="section-dentalseuri2" class="dentalseuri2-section" style="background-color: white;">
        <div class="container dentalseuri2-container">
            <div class="row align-items-center justify-content-between">

                <!-- Kolom Kiri -->
                <div class="col-md-5 position-relative text-center">
                    <img src="<?= image('width_200.webp') ?>" alt="ornamen coklat"
                        class="dentalseuri2-ornament dentalseuri2-ornament-brown">
                    <img src="<?= image('width_200 (1).webp') ?>" alt="ornamen abu"
                        class="dentalseuri2-ornament dentalseuri2-ornament-grey">
                    <img src="<?= image('beritasection.png') ?>" alt="senyum" class="dentalseuri2-main-image">
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <h2 class="dentalseuri2-title"  style="color: #2C5D7F;">
                    Dental Insight 

That Make You Smile
                    </h2>
                    <p class="dentalseuri2-desc" style="color: #2C5D7F;">
                    Professional teeth whitening treatments in a comfortable and aesthetic, helping you achieve a brighter more confident smile in just one visit. </p>
                    <a href="#" class="btn dentalseuri2-btn">
                        <i class="fab fa-whatsapp me-2 fw-bold"></i>Konsultasi Sekarang
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Informasi -->
    <section class="container dentalseuri2-info-section mt-5">
        <div class="row dentalseuri2-info-row  rounded-4 align-items-center justify-content-between">
            <div class="col-md-5 mb-3 mb-md-0">
                <h3 class="mb-1" style="color: #6381a8;">Operational Hours:</h3>
                <ul class="list-unstyled mb-0 small" style="font-size: 18px;">
                    <li> <span class="me-2 mb-1 rounded-circle d-inline-block"
                            style="width:8px; height:8px; background-color:#000;"> </span>Monday - Sunday | 10 AM - 8 PM
                    </li>
                    <li> <span class="me-2 mb-1 rounded-circle d-inline-block"
                            style="width:8px; height:8px; background-color:#000;"></span>0812 8008 9191</li>
                </ul>
            </div>
            <div class="col-md-5 mb-3 mb-md-0">
                <h3 class="mb-1" style="color: #6381a8;">Our Location:</h3>
                <p class="mb-0 small" style="font-size: 18px;">
                    Jl. Raya Pajajaran No.28E, Bantarjati, Kec. Bogor Utara,<br>
                    Kota Bogor, Jawa Barat 16153
                </p>
            </div>

            <div class="col-md-2 text-md-start text-start">
                <h3 class="mb-1" style="color: #6381a8;">Maps:</h3>
                <a href="https://maps.app.goo.gl/1zURJxWizbRTEUms8" class="btn px-4 py-2 rounded-3 text-white" style="background-color: #797a7b;">
                    <i class="fa-solid fa-location-dot me-1"></i> Check Maps
                </a>
            </div>



        </div>
    </section>





    <?php include __DIR__ . '/../components/berita.php'; ?>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

</body>

</html>