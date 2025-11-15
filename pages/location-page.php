<?php
require_once __DIR__ . '/../config.php';
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
    <link rel="stylesheet" href="<?= page_css('location-detail.css') ?>">
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
    background-color:rgb(128, 128, 128);
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
  color: #e74c3c !important; /* Minggu merah */
}



.dokter-section h2 {
  color: #1a1a1a;
}

.doctor-card {
  background: #fff;
  border-radius: 16px;
  padding: 1.2rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}

.doctor-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
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
  height: 300px;
  object-fit: cover;
  border-radius: 24px;
}

.clinic-name {
  font-weight: 600;
  color: #4d698c;
}

.clinic-address {
  font-size: 0.95rem;
  color: #444;
}

.clinic-phone {
  font-size: 0.95rem;
  color: #333;
}

.clinic-phone i {
  color: #4d698c;
  margin-right: 5px;
}

.clinic-buttons {
  margin-top: 10px;
  display: flex;
  gap: 10px;
}

.btn-map {
  background-color: #4d698c;
  color: white;
  border-radius: 10px;
  font-size: 0.9rem;
}

.btn-booking {
  background-color: #e2a86d;
  color: white;
  border-radius: 10px;
  font-size: 0.9rem;
}

.btn-map:hover {
  background-color: #3c5573;
  color: white;
}

.btn-booking:hover {
  background-color: #d1935d;
  color: white;
}


@keyframes swipeAnim {
  0%, 100% {
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


<?php include __DIR__ . '/../components/location-detail.php'; ?>


    <section class="before-after-section">
        <div class="container ba-container">

            <div class="text-left mb-5">
                <h2 class="ba-section-title">Before After</h2>
                <h4>Lihat Hasil Treatment Bleaching di Seuri Dental Clinic!</h4>
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


   

<?php include __DIR__ . '/../components/faq.php'; ?>


    <?php include __DIR__ . '/../components/consultation-cta.php'; ?>
    <section style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container text-left">
            <h2 class="fw-bold text-secondary">
                Bleaching Gigi Bogor: Senyum Cerah dan Percaya Diri
            </h2>
            <p id="artikel" class="mt-4">
                Memiliki gigi putih dan sehat adalah impian banyak orang. Kini, Anda bisa mewujudkannya dengan perawatan bleaching gigi Bogor di klinik gigi
                terpercaya. Bleaching gigi merupakan prosedur pemutihan gigi yang aman dan efektif untuk mengatasi noda atau perubahan warna pada gigi akibat
                kopi, teh, rokok, maupun faktor usia.
                <br><br>

                Di klinik bleaching gigi Bogor, perawatan dilakukan langsung oleh dokter gigi profesional dengan teknologi modern, sehingga hasilnya lebih cepat
                terlihat dan tahan lama. Selain itu, kenyamanan pasien juga menjadi prioritas utama, sehingga proses perawatan berlangsung aman tanpa rasa
                khawatir.

                <br><br>
                Ada beberapa pilihan perawatan bleaching gigi Bogor, mulai dari in-office bleaching yang hasilnya instan, hingga home bleaching yang lebih fleksibel
                dilakukan di rumah. Dokter akan menyesuaikan jenis perawatan sesuai kondisi gigi dan kebutuhan pasien.

                <br><br>
                Dengan melakukan bleaching gigi Bogor, Anda tidak hanya mendapatkan senyum lebih putih dan cerah, tetapi juga kepercayaan diri yang meningkat
                dalam aktivitas sehari-hari. Jadi, jika Anda mencari solusi untuk senyum menawan, percayakan pada layanan bleaching gigi Bogor yang profesional
                dan berkualitas
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