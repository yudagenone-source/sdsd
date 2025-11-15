<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odontectomy - Seuri Dental Specialist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
    <link rel="stylesheet" href="<?= component_css('about.css') ?>">
    <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= page_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('before-after.css') ?>">
    <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
    <link rel="stylesheet" href="<?= component_css('faq.css') ?>">

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
            width: 580px;
            margin-top: -120px;
            /* nongol ke atas */
            margin-bottom: 0px;
            /* nempel ke bawah background */
            transform: translateX(-120px);
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
.why-trust-section {
    position: relative;
    overflow: hidden;
    min-height: 500px;
    padding: 4rem 0;
}

.why-trust-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 400px;
    height: 100%;
    background: transparent url('<?= image('bg_kanan.png') ?>') no-repeat right center;
    background-size: contain;
    opacity: 0.3;
    z-index: 0;
}

/* Responsif */
@media (max-width: 768px) {
    .why-trust-bg {
        width: 200px;
        opacity: 0.2;
    }
    
    .why-trust-section {
        min-height: 400px;
        padding: 2rem 0;
    }
}

        /* Responsif */
        @media (max-width: 768px) {}
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
                    <img src="<?= image('odon.png') ?>" alt="senyum" class="dentalseuri2-main-image">
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <h2 class="dentalseuri2-title">
                        Removing the pain with
                        Odontectomy
                    </h2>
                    <p class="dentalseuri2-desc">
                        Dokter gigi spesialis bedah mulut di Seuri siap memberikan perawatan presisi dengan teknik modern serta pendampingan pasca tindakan untuk penyembuhan optimal dan pemulihan nyaman </p>
                    <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20ingin%20tanya%20mengenai%20perawatan%20odontectomy%20(pencabutan%20gigi%20bungsu/operasi%20gigi)%20di%20Seuri%20Dental.%20-seuri.id" class="btn dentalseuri2-btn">
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
                    <li> <span class="me-2 mb-1 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"> </span>Monday - Sunday | 10 AM - 8 PM</li>
                    <li> <span class="me-2 mb-1 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>0812 8008 9191</li>
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





    <section class="about-section">
        <div class="container about-container">
            <div class="row" style="--bs-gutter-x: 4rem;">
                <!-- FOTO KIRI -->
                <div class="col-lg-6 mb-5 mb-lg-0 d-flex justify-content-end" style="margin-bottom: 0 !important;">
                    <img
                        src="<?= image('ourodon.webp') ?>"
                        alt="Dokter gigi sedang melayani pasien"
                        style="height: 500px; width: 500px; object-fit: cover; border-radius: 10px; overflow: hidden;"
                        class="img-fluid about-image shadow-lg">
                </div>

                <!-- PENJELASAN KANAN -->
                <div class="col-lg-6 about-content d-flex justify-content-start align-self-start" style="padding-left: 1rem;">
                    <div>
                        <h1 class="fw-bold mb-4" style="color: #5880a4; font-size: 50px;">Our Odontectomy Services</h1>
                        <h3 style="font-weight: 400;">Seuri Dental Clinic menyediakan berbagai pilihan perawatan odontectomy oleh dokter gigi spesialis bedah mulut profesional:</h3>
                        <br>
                        <ul class="list-unstyled ms-3">
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">Odontectomy Gigi Impaksi</h3>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <section class="why-trust-section">
    <!-- Background kanan transparent -->
    <div class="why-trust-bg"></div>
    
    <div class="container mt-5 text-center">
        <h1 class="fw-bold" style="color: #5880a4; font-size: 50px;">
            Why Patients Trust Odontectomy at Seuri
        </h1>
    </div>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="text-start">
            <h4 style="font-weight: 400; font-size: 25px;">
                <img style="width:48px;" src="<?= image('blink.png') ?>"> Menggunakan teknik dan teknologi yang canggih
            </h4>
            <h4 style="font-weight: 400; font-size: 25px;">
                <img style="width:48px;" src="<?= image('blink.png') ?>"> Ditangani dokter gigi spesialis bedah mulut yang berpengalaman
            </h4>
            <h4 style="font-weight: 400; font-size: 25px;">
                <img style="width:48px;" src="<?= image('blink.png') ?>"> Area operasi yang bersih dan steril
            </h4>
            <h4 style="font-weight: 400; font-size: 25px;">
                <img style="width:48px;" src="<?= image('blink.png') ?>"> Perawatan pasca tindakan yang komprehensif
            </h4>
            <h4 style="font-weight: 400; font-size: 25px;">
                <img style="width:48px;" src="<?= image('blink.png') ?>"> Pendekatan yang mengutamakan kenyamanan dengan teknik invasif minimal
            </h4>
        </div>
    </div>
</section>


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



    <?php include __DIR__ . '/../components/testimoni-seuri.php'; ?>


    <section class="about-section">
        <div class="container about-container">
            <div class="row align-items-center" style="--bs-gutter-x: 4rem;">
                <!-- FOTO KIRI -->
                <div class="col-lg-6 mb-5 mb-lg-0 d-flex justify-content-end" style="margin-bottom: 0 !important;">
                    <img
                        src="<?= image('conditions-orto.png') ?>"
                        alt="Dokter gigi sedang melayani pasien"
                        style=" object-fit: cover; border-radius: 35px; overflow: hidden;"
                        class="img-fluid about-image shadow-lg">
                </div>

                <!-- PENJELASAN KANAN -->
                <div class="col-lg-6 about-content d-flex justify-content-start" style="padding-left: 1rem;">
                    <div>
                        <h1 class="fw-bold mb-4" style="color: #6381a8; font-size: 40px;">Conditions Treated by Our
                            Surgical Dentistry</h1>

                        <ul class="list-unstyled ms-3">
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0">Gigi bungsu impaksi</h3>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0">Infeksi gigi dan rahang</h3>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">Gigi impaksi yang rusak parah</h3>
                            </li>
                        </ul><br>
                        <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20ingin%20tanya%20mengenai%20perawatan%20odontectomy%20(pencabutan%20gigi%20bungsu/operasi%20gigi)%20di%20Seuri%20Dental.%20-seuri.id" class="btn dentalseuri2-btn">
                            <i class="fab fa-whatsapp me-2 fw-bold"></i>Schedule Your Smile Assessment
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- SECTION FAQ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <section class="faq-section py-y" style="margin-top: 200px; margin-bottom: 200px;">
        <div class="container">
            <h1 class="text-center mb-5" style="color:#6381a8;">
                Frequently Asked Questions (FAQ)
            </h1>

            <div class="accordion" id="faqAccordion">

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                            Apakah perawatan odontectomy bisa menggunakan asuransi?

                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Perawatan pencabutan gigi bungsu (implan gigi) secara umum tidak termasuk dalam tanggungan asuransi kesehatan standar. Namun, beberapa asuransi menanggung biaya implan gigi.
                            <br> <br>
                            SeuriChingu bisa periksa kembali polis asuransi yang dimiliki atau konsultasikan langsung dengan pihak asuransi dan Seuri Dental Specialist untuk mendapatkan penjelasan lebih detail mengenai cakupan biaya dan opsi pembayaran yang tersedia.

                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                          Berapa lama perawatan odontectomy di Seuri dental specialist?



                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                      Durasi pencabutan gigi bungsu (odontectomy) di Seuri Dental Specialist berlangsung kurang lebih 45-60 menit bergantung pada tingkat kesulitan posisi dari gigi bungsu. Seuri Dental Specialist menyediakan layanan perawatan odontectomy gigi dengan dokter gigi spesialis berpengalaman dan profesional untuk memastikan hasil yang minim nyeri dan maksimal dengan alat canggih dan modern.

                     
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                            Apakah di Seuri Dental menerima cicilan?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4">
                         Layanan apa saja di seuri dental?


                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Seuri Dental Specialist menyediakan berbagai layanan dari dokter gigi umum dan spesialis,
                            termasuk:
                            Pemeriksaan dan konsultasi gigi<br>
                            Pembersihan karang gigi (scaling & polishing)<br>
                            Pemasangan behel / ortodonti<br>
                            Tambal gigi dan perawatan saluran akar<br>
                            Perawatan gigi anak<br>
                            Pencabutan & bedah gigi bungsu<br>
                            Estetika gigi (bleaching, veneer, crown)<br>
                            Pembuatan gigi tiruan dan implan gigi<br>
                            Setiap layanan di Seuri Dental Specialist dilakukan oleh tim dokter profesional dengan alat
                            canggih dan modern.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq5">
                         Berapa biaya odontectomy di Seuri Dental Specialist?


                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                    Biaya pencabutan gigi bungsu (odontectomy) dengan dokter gigi spesialis di Seuri Dental Specialist mulai dari harga Rp. 4.000.000 bergantung pada posisi gigi dan tingkat kesulitan kasus.         <br><br>
                         Jadwalkan konsultasi di Seuri untuk mendapatkan rencana perawatan & estimasi biaya yang spesifik sesuai kondisi SeuriChingu.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <?php include __DIR__ . '/../components/consultation-cta.php'; ?>
    <section style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container text-left">
            <h2 class="fw-bold text-secondary">
                Dokter Spesialis Bedah Mulut Terdekat: Solusi Tepat untuk Masalah Gigi
            </h2>
            <p id="artikel" class="mt-4">
                Tidak semua masalah gigi bisa ditangani dengan perawatan dasar. Beberapa kondisi membutuhkan tindakan medis lanjutan dari dokter
                spesialis bedah mulut terdekat. Spesialis ini berfokus pada diagnosis dan perawatan penyakit, cedera, maupun kelainan di area gigi, mulut,
                rahang, hingga wajah.

                <br><br>
                Layanan yang biasanya ditangani dokter spesialis bedah mulut antara lain:
                <br>
                Pencabutan gigi bungsu (wisdom tooth) yang tumbuh miring atau impaksi.
                <br>
                Operasi gigi yang sulit dicabut.
                <br>
                Penanganan infeksi gigi dan rahang.
                <br>
                Implan gigi untuk mengganti gigi yang hilang.
                <br>
                Operasi koreksi rahang (orthognathic surgery).
                <br>
                Penanganan cedera atau trauma pada wajah dan mulut.

                <br><br>
                Mencari dokter spesialis bedah mulut terdekat memberikan banyak keuntungan, terutama akses yang lebih cepat saat darurat, serta
                kemudahan kontrol pasca-tindakan. Pastikan Anda memilih klinik atau rumah sakit dengan dokter berpengalaman, fasilitas lengkap, serta
                standar kebersihan tinggi.

                <br><br>
                Jangan abaikan masalah gigi atau rahang yang serius. Segera temukan dokter spesialis bedah mulut terdekat agar mendapatkan
                perawatan profesional, aman, dan tepat sesuai kebutuhan. Dengan penanganan yang tepat, kesehatan gigi, mulut, dan rahang Anda bisa
                terjaga optimal.
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