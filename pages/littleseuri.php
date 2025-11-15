<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promo Spesial Little Seuri - Seuri Dental Specialist</title>

  <!-- Bootstrap & Font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- File CSS -->
  <link rel="stylesheet" href="<?= css('style.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
  <link rel="stylesheet" href="<?= component_css('about.css') ?>">
  <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
  <link rel="stylesheet" href="<?= page_css('little-seuri.css') ?>">
  <link rel="stylesheet" href="<?= component_css('before-after.css') ?>">
  <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
  <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
  
  <!-- Mobile Responsive CSS -->
  <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">

  <style>
    /* === SECTION DENTALSEURI2 === */
    .dentalseuri2-section {
      position: relative;
      background-color:rgb(160, 193, 236);
      border-radius: 20px;
      padding: 4rem 0 0;
      margin-top: 3rem;
      overflow: visible;
      z-index: 1;
    }

    /* Gambar utama */
    .dentalseuri2-main-image {
      position: relative;
      width: 420px;
      margin-top: -180px; /* nongol ke atas */
      margin-bottom: 0px; /* nempel ke bawah background */
      transform: translateX(14px); /* geser ke kiri */
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
      transform: translateX(100px);
    }

    .dentalseuri2-ornament-grey {
      width: 140px;
      bottom: 10%;
      right: 15px;
      z-index: 6; 
      transform: translateX(70px);
    }

    /* Teks dan tombol */
    .dentalseuri2-title {
      color: #2b4c7e;
      font-weight: 700;
      line-height: 1.3;
      margin-bottom: 1rem;
      font-size: 50px;
    }

    .dentalseuri2-desc {
      color: white;
      margin-bottom: 1.5rem;
      font-weight: 500;
      font-size: 20px;
    }

    .dentalseuri2-btn {
      background-color: #D1A361;
      border: none;
      color: #fff;
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
      max-width: 1140px;
    }

    .dentalseuri2-info-row {
      padding: 2rem;
    }

    /* Responsif */
    @media (max-width: 768px) {
      .dentalseuri2-main-image {
        max-width: 360px;
        margin-top: -60px;
        transform: translateX(0); /* reset di mobile biar gak ketarik */
      }
      .dentalseuri2-ornament-brown {
        left: 0;
        top: 10%;
        width: 90px;
      }
      .dentalseuri2-ornament-grey {
        width: 90px;
        right: 0;
      }
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/../partials/header.php'; ?>

  <!-- === SECTION DENTALSEURI2 === -->
  <section id="section-dentalseuri2" class="dentalseuri2-section">
    <div class="container dentalseuri2-container">
      <div class="row align-items-center justify-content-between">

        <!-- Kolom Kiri -->
        <div class="col-md-5 position-relative text-center">
          <img src="<?= image('width_200.webp') ?>" alt="ornamen coklat" class="dentalseuri2-ornament dentalseuri2-ornament-brown">
          <img src="<?= image('width_200 (1).webp') ?>" alt="ornamen abu" class="dentalseuri2-ornament dentalseuri2-ornament-grey">
          <img src="<?= image('servicehero.webp') ?>" alt="senyum" class="dentalseuri2-main-image">
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">
          <h2 class="dentalseuri2-title">
            Gentle Dental Care<br>
            Your Little Ones<br>

          </h2>
          <p class="dentalseuri2-desc">
          Di Little Seuri, kami memberikan perawatan gigi anak yang profesional dalam suasana hangat dan ramah, membantu anak merasa aman, percaya diri, dan gembira setiap kali berkunjung.
         
          </p>
          <a href="#" class="btn dentalseuri2-btn">
            <i class="bi bi-chat-text me-2"></i>Konsultasi Sekarang
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- Section Informasi -->
  <section class="container dentalseuri2-info-section mt-5">
    <div class="row dentalseuri2-info-row bg-light rounded-4 align-items-center justify-content-between">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="fw-semibold text-secondary mb-1">Operational Hours:</h6>
        <ul class="list-unstyled mb-0 small">
          <li>Monday - Sunday | 10 AM - 8 PM</li>
          <li>0812 8008 9191</li>
        </ul>
      </div>
      <div class="col-md-5 mb-3 mb-md-0">
        <h6 class="fw-semibold text-secondary mb-1">Our Location:</h6>
        <p class="mb-0 small">
          Jl. Raya Pajajaran No.28E, Bantarjati, Kec. Bogor Utara,<br>
          Kota Bogor, Jawa Barat 16153
        </p>
      </div>
      <div class="col-md-3 text-md-end text-center">
        <a href="https://maps.app.goo.gl/1zURJxWizbRTEUms8" class="btn btn-dark px-4 py-2 rounded-3">
          <i class="bi bi-geo-alt me-1"></i> Check Maps
        </a>
      </div>
    </div>
  </section>

  <!-- === KONTEN SELANJUTNYA === -->
  <?php include __DIR__ . '/../components/before-after.php'; ?>
  <?php include __DIR__ . '/../components/testimoni-seuri.php'; ?>
  <?php include __DIR__ . '/../components/consultation-cta.php'; ?>
  <?php include __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
