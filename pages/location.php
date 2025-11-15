<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lokasi Klinik Gigi - Seuri Dental Specialist</title>
  <link rel="icon" type="image/png" href="<?= image('favicon.png') ?>">

  <!-- External CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="jadwal-section.css">


  <!-- Internal CSS - LOAD SEKALI DI HEAD -->
  <link rel="stylesheet" href="<?= css('style.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">

  <!-- Components CSS yang DIBUTUHKAN -->
  <link rel="stylesheet" href="<?= component_css('about-seuri-clinic.css') ?>">
  <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
  <link rel="stylesheet" href="<?= page_css('little-seuri.css') ?>">
  <link rel="stylesheet" href="<?= component_css('before-after.css') ?>">
  <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
  <link rel="stylesheet" href="<?= component_css('our-services.css') ?>">
  <link rel="stylesheet" href="<?= component_css('our-partner.css') ?>">
  <link rel="stylesheet" href="<?= component_css('insurance-partner.css') ?>">
  <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
  <link rel="stylesheet" href="<?= component_css('why-love-seuri.css') ?>">
  <link rel="stylesheet" href="<?= page_css('detail-services.css') ?>">

  <!-- Mobile Responsive CSS -->
  <link rel="stylesheet" href="<?= component_css('faq.css') ?>">
  <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">
</head>
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
    font-size: 2.8rem;
  }

  .services-description {
    font-family: 'Gilroy', sans-serif;
    color: #5a6c7d;
    font-size: 1.1rem;
    line-height: 1.6;
    text-align: center;
    margin-bottom: 50px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  .services-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-top: 30px;
  }

  .service-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
  }

  .jadwal-section {

    border-radius: 20px;
  }

  .jadwal-box {
    background-color: rgb(128, 128, 128);
    border-radius: 25px;
  }

  /* === Global glass input style === */
  .input-glass,
  .lokasi-input {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    overflow: hidden;
  }

  .input-icon {
    background: transparent;
    color: #fff;
    border: none;
    font-size: 1.2rem;
  }

  .lokasi-field,
  .glass-field {
    background: transparent;
    border: none;
    color: white;
    font-size: 1rem;
    padding: 0.8rem 1rem;
  }

  .lokasi-field::placeholder,
  .glass-field::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }

  /* === Dropdown === */
  .dropdown-toggletgl {
    background: rgba(255, 255, 255, 0.15) !important;
    border: 2px solid rgba(255, 255, 255, 0.9) !important;
    color: white !important;
    border-radius: 15px !important;
    padding: 0.8rem 1rem;
    backdrop-filter: blur(10px);
    font-weight: 500;
  }

  .dropdown-toggletgl i {
    color: #fff;
  }

  .dropdown-toggle:hover {
    background: rgba(255, 255, 255, 0.25) !important;
  }

  .dropdown-glass {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
    max-height: 250px;
    overflow-y: auto;
  }

  .dropdown-item {
    border-radius: 10px;
    font-weight: 500;
  }

  .dropdown-item:hover {
    background: rgba(240, 240, 240, 0.9);
  }

  /* === Tombol === */
  .btn-check-jadwal {
    background-color: #e2a76f;
    color: white;
    border-radius: 12px;
    font-weight: 600;
    padding: 0.7rem 1.6rem;

  }

  .btn-check-jadwal:hover {
    background-color: #d89452;
  }

  /* === Flatpickr Calendar Custom === */
  .flatpickr-calendar {
    background: rgba(255, 255, 255, 0.9) !important;
    backdrop-filter: blur(15px);
    border-radius: 20px !important;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    border: 2px solid white !important;
    overflow: hidden;
  }

  .flatpickr-months {
    border-bottom: none !important;
  }

  .flatpickr-month {
    color: #333 !important;
  }

  .flatpickr-current-month input.cur-year {
    color: #333 !important;
  }

  .flatpickr-weekday {
    color: #444 !important;
    font-weight: 600;
  }

  .flatpickr-day {
    border-radius: 50% !important;
    color: #333 !important;
  }

  .flatpickr-day.today {
    background: #e2a76f !important;
    color: #fff !important;
  }

  .flatpickr-day.selected {
    background: #d89452 !important;
    color: #fff !important;
  }

  .flatpickr-day:nth-child(7n) {
    color: #e74c3c !important;
    /* Minggu merah */
  }



  .dokter-section h2 {
    color: #1a1a1a;
  }

  .doctor-card {
    background: #fff;
    border-radius: 16px;
    padding: 1.2rem;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .doctor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }

  .doctor-img {
    width: 100%;
    border-radius: 12px;
    object-fit: cover;
  }

  .badge-role {
    display: inline-block;
    background-color: #f4f7fa;
    border: 1px solid #d0d4da;
    color: #495057;
    border-radius: 20px;
    padding: 4px 12px;
    font-size: 0.8rem;
  }

  /* Swipe hint icon */
  .bi-arrow-left-right {
    animation: swipeAnim 1.2s infinite ease-in-out;
  }

  /* SECTION HASIL PENCARIAN — CSS TERPISAH BIAR NGGAK BENTROK */
  .search-result-section {
    padding-bottom: 4rem;
    border-top: 1px solid #ddd;
  }

  .clinic-card {
    text-align: left;
    background: transparent;
  }

  .clinic-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 24px;
  }

  .clinic-info-wrapper {
    width: 100%;
    text-align: left;
  }

  .clinic-name {
    font-weight: 700;
    color: #4d698c;
    font-size: 1.8rem;
  }

  .clinic-address {
    font-size: 1.1rem;
    color: #444;
    line-height: 1.6;
  }

  .clinic-address i,
  .clinic-phone i {
    color: #4d698c;
  }

  .clinic-phone {
    font-size: 1.1rem;
    color: #333;
    font-weight: 500;
  }

  .clinic-buttons {
    display: flex;
    gap: 15px;
  }

  .btn-map,
  .btn-booking {
    padding: 12px 30px;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
  }

  .btn-map {
    background-color: #4d698c;
    color: white;
  }

  .btn-booking {
    background-color: #e2a86d;
    color: white;
  }

  .btn-map:hover {
    background-color: #3c5573;
    color: white;
    transform: translateY(-2px);
  }

  .btn-booking:hover {
    background-color: #d1935d;
    color: white;
    transform: translateY(-2px);
  }


  @keyframes swipeAnim {

    0%,
    100% {
      transform: translateX(0);
      opacity: 0.8;
    }

    50% {
      transform: translateX(6px);
      opacity: 1;
    }
  }


  /* === Responsif === */
  @media (max-width: 767px) {
    .btn-check-jadwal {
      width: 100%;
    }
  }



  @media (max-width: 768px) {
    .services-banner {
      height: 250px;
    }

    .services-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

    .service-image {
      height: 180px;
    }
  }
</style>
</style>

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
      <h2 class="services-heading">Periksa ke Dokter Gigi Terdekat di Seuri Dental Clinic</h2>
      <p class="services-description">
        Klinik gigi Seuri kini hadir di Bogor dengan dokter gigi umum hingga dokter gigi
        spesialis yang lengkap dan tentunya berpengalaman. Kunjungi klinik Seuri
        terdekat dari lokasimu sekarang!
      </p>


    </div>
  </section>



  <section class="search-result-section py-5">
    <div class="container">
      <div class="row align-items-center">

        <!-- Klinik 1 - Foto Kiri -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="clinic-card">
            <img src="<?= image('bogor.jpg') ?>" class="clinic-img" alt="Seuri Dental Clinic Bogor">
          </div>
        </div>

        <!-- Info Kanan -->
        <div class="col-lg-6 d-flex align-items-center">
          <div class="clinic-info-wrapper">
            <h3 class="clinic-name mb-3">Seuri Dental Clinic Bogor</h3>
            <p class="clinic-address mb-3">
              <i class="bi bi-geo-alt-fill me-2"></i>
              Jl. Raya Pajajaran No.28E, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153
            </p>
            <p class="clinic-phone mb-4">
              <i class="bi bi-telephone-fill me-2"></i> 0812-8008-9191
            </p>
            <div class="clinic-buttons">
              <button onclick="window.open('https://maps.app.goo.gl/1zURJxWizbRTEUms8', '_blank')" class="btn btn-map">
                <i class="bi bi-geo-alt-fill me-2"></i> Maps
              </button>
              <button onclick="window.open('https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20mau%20tanya%20tentang%20perawatan%20yang%20di%20Seuri%20Dental.%20-seuri.id', '_blank')" class="btn btn-booking">
                <i class="bi bi-calendar-check me-2"></i> Booking
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <hr>

  <?php
  $doctors = fetchAll("SELECT d.*, ds.name as specialty_name FROM doctors d LEFT JOIN doctor_specialties ds ON d.specialty_id = ds.id WHERE d.is_active=1 ORDER BY d.display_order ASC, d.created_at DESC");
  ?>
  <section class="dokter-section py-5">
    <div class="container">
      <h2 class="text-center fw-semibold mb-5">Profil Dokter Gigi Terdekat Seuri Dental Clinic</h2>

      <div class="row align-items-center">
        <!-- Kiri: Teks -->
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5 class="fw-bold">Lihat Profil Dokter Gigi Kami</h5>
          <p class="text-muted mb-4">Check jadwal dokter gigi lain yang cocok dengan jadwal Anda.</p>
          <div class="d-flex align-items-center gap-2">
            <span class="text-muted">Swipe</span>
            <i class="bi bi-arrow-left-right fs-5 text-secondary"></i>
          </div>
        </div>

        <!-- Kanan: Swiper -->
        <div class="col-lg-8">
          <div class="swiper dokterSwiper">
            <div class="swiper-wrapper">
              <?php foreach ($doctors as $doctor): ?>
                <div class="swiper-slide">
                  <a href="<?= url('profil-dokter/' . $doctor['id']) ?>" style="text-decoration: none;">
                    <div class="doctor-card text-center">
                      <?php if ($doctor['photo']): ?>
                        <img src="<?= BASE_URL ?>/uploads/doctors/<?= htmlspecialchars($doctor['photo']) ?>" alt="<?= htmlspecialchars($doctor['name']) ?>" class="doctor-img mb-3" onerror="this.src='https://placehold.co/300x300?text=<?= urlencode($doctor['name']) ?>'">
                      <?php else: ?>
                        <img src="https://placehold.co/300x300?text=<?= urlencode($doctor['name']) ?>" alt="<?= htmlspecialchars($doctor['name']) ?>" class="doctor-img mb-3">
                      <?php endif; ?>
                      <h6 class="fw-bold text-primary mb-1"><?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?></h6>
                      <small class="badge-role"><?= htmlspecialchars($doctor['specialty_name'] ?? $doctor['specialty'] ?? 'Dokter Gigi') ?></small>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- SwiperJS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="dokter-section.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    const dokterSwiper = new Swiper(".dokterSwiper", {
      slidesPerView: 3,
      spaceBetween: 20,
      grabCursor: true,
      loop: true,
      breakpoints: {
        0: {
          slidesPerView: 1.3
        },
        768: {
          slidesPerView: 2
        },
        992: {
          slidesPerView: 3
        }
      }
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#datepicker", {
      dateFormat: "D, d M Y",
      locale: "id",
      minDate: "today",
      allowInput: true
    });
  </script>



  <?php include __DIR__ . '/../components/why-love-seuri.php'; ?>
  <?php include __DIR__ . '/../components/our-services.php'; ?>

  <section class="before-after-section">
    <div class="container ba-container">

      <div class="text-left mb-5">
        <h2 class="ba-section-title">Before After Scaling Gigi</h2>
        <h4>Lihat Hasil Treatment di Seuri Dental Clinic!</h4>
      </div>

      <!-- SWIPER -->
      <div class="swiper mySwiper-beforeafter">
        <div class="swiper-wrapper">

          <!-- SLIDE 1 -->
          <div class="swiper-slide">
            <div class="ba-set-wrapper">
              <div class="ba-image-wrapper">
                <img src="<?= image('before1.png') ?>" alt="Before Treatment 1" class="img-fluid ba-image">
              </div>
              <div class="ba-image-wrapper">
                <img src="<?= image('after1.png') ?>" alt="After Treatment 1" class="img-fluid ba-image">
              </div>
            </div>
          </div>

          <!-- SLIDE 2 -->
          <div class="swiper-slide">
            <div class="ba-set-wrapper">
              <div class="ba-image-wrapper">
                <img src="<?= image('before2.png') ?>" alt="Before Treatment 2" class="img-fluid ba-image">
              </div>
              <div class="ba-image-wrapper">
                <img src="<?= image('after2.png') ?>" alt="After Treatment 2" class="img-fluid ba-image">
              </div>
            </div>
          </div>

          <!-- SLIDE 3 -->
          <div class="swiper-slide">
            <div class="ba-set-wrapper">
              <div class="ba-image-wrapper">
                <img src="<?= image('before3.png') ?>" alt="Before Treatment 3" class="img-fluid ba-image">
              </div>
              <div class="ba-image-wrapper">
                <img src="<?= image('after3.png') ?>" alt="After Treatment 3" class="img-fluid ba-image">
              </div>
            </div>
          </div>

          <!-- SLIDE 4 -->
          <div class="swiper-slide">
            <div class="ba-set-wrapper">
              <div class="ba-image-wrapper">
                <img src="<?= image('before1.png') ?>" alt="Before Treatment 4" class="img-fluid ba-image">
              </div>
              <div class="ba-image-wrapper">
                <img src="<?= image('after1.png') ?>" alt="After Treatment 4" class="img-fluid ba-image">
              </div>
            </div>
          </div>

          <!-- Tambah slide lain sesuka lo -->
        </div>
      </div>

    </div>
  </section>

  <!-- Swiper.js CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      new Swiper(".mySwiper-beforeafter", {
        slidesPerView: 3,
        spaceBetween: 30,
        grabCursor: true,
        simulateTouch: true,
        navigation: {
          nextEl: ".ba-next",
          prevEl: ".ba-prev",
        },
        breakpoints: {
          0: {
            slidesPerView: 1.1,
            spaceBetween: 15
          },
          768: {
            slidesPerView: 2.2,
            spaceBetween: 20
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 30
          }
        }
      });
    });
  </script>










  <?php include __DIR__ . '/../components/consultation-cta.php'; ?>
  <section style="margin-top: 100px; margin-bottom: 100px;">
    <div class="container text-left">
      <h2 class="fw-bold text-secondary">
        Seuri Dental Clinic Bogor Perawatan Gigi Modern Terbaik di Bogor
      </h2>
      <p id="artikel" class="mt-4">
        Jika Anda mencari layanan kesehatan gigi yang lengkap dan nyaman, Seuri Dental Clinic Bogor adalah pilihan tepat. Klinik ini hadir dengan fasilitas
        modern, tenaga medis berpengalaman, serta suasana ramah yang membuat perawatan gigi terasa lebih menyenangkan.

        <br><br>
        Di Seuri Dental Clinic Bogor, tersedia berbagai layanan mulai dari pemeriksaan rutin, pembersihan karang gigi, tambal gigi berlubang, hingga
        perawatan saluran akar. Untuk kebutuhan estetik, klinik ini juga menyediakan layanan veneer, teeth whitening, serta perawatan ortodonti seperti behel
        dan aligner. Semua prosedur dilakukan dengan teknologi terkini demi keamanan dan hasil optimal.
        <br><br>
        Keunggulan lain dari Seuri Dental Clinic Bogor adalah pendekatan personal dalam melayani pasien. Dokter dan tim selalu mengutamakan
        kenyamanan, sehingga pasien merasa tenang saat menjalani perawatan.
        <br>
        <br>
        Dengan rutin melakukan kontrol di Seuri Dental Clinic, Anda bisa menjaga kesehatan gigi sekaligus meningkatkan kepercayaan diri melalui senyum
        yang sehat dan indah.<br><br>Jangan tunda perawatan gigi Anda. Segera kunjungi Seuri Dental Clinic Bogor dan rasakan pengalaman perawatan gigi yang profesional, modern, dan
        terpercaya.
      </p>
      <p id="selengkapnya" class="gray fw-semibold" style="cursor:pointer;">Selengkapnya...</p>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const paragraf = document.getElementById("artikel");
      const selengkapnya = document.getElementById("selengkapnya");

      const fullText = paragraf.innerHTML;
      const shortText = fullText.substring(0, 300) + "...";

      paragraf.innerHTML = shortText;

      selengkapnya.addEventListener("click", () => {
        if (paragraf.innerHTML === shortText) {
          paragraf.innerHTML = fullText;
          selengkapnya.innerText = "Sembunyikan";
        } else {
          paragraf.innerHTML = shortText;
          selengkapnya.innerText = "Selengkapnya...";
        }
      });
    });
  </script>

  <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>