<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSA - Seuri Dental Specialist</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- File CSS --><!-- Bootstrap JS (WAJIB ADA biar accordion bisa diklik) -->


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
            width: 800px;
            margin-top: -138px;
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
            transform: translateX(80px);
        }

        .dentalseuri2-ornament-grey {
            width: 140px;
            bottom: 10%;
            right: 15px;
            z-index: 6;
            transform: translateX(-30px);
        }

        /* Teks dan tombol */
        .dentalseuri2-title {
            color: #0d1e3d;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 1rem;
            font-size: 50px;
        }

        .dentalseuri2-desc {
            color: white;
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 25px;
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

/* SECTION WHY TRUST - BACKGROUND KANAN YANG DIPERBAIKI */
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
    opacity: 0.3; /* Transparan */
    z-index: 0;
}

.why-trust-content {
    position: relative;
    z-index: 2;
}

/* Responsif */
@media (max-width: 768px) {
    .why-trust-bg {
        width: 200px;
        opacity: 0.2;
        background-size: cover;
    }
    
    .why-trust-section {
        min-height: 400px;
        padding: 2rem 0;
    }
    
    .why-trust-content h1 {
        font-size: 2rem !important;
    }
    
    .why-trust-content h4 {
        font-size: 1.1rem !important;
    }
}

@media (max-width: 576px) {
    .why-trust-bg {
        width: 150px;
        opacity: 0.15;
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
                    <img src="<?= image('psa.webp') ?>" alt="senyum" class="dentalseuri2-main-image">
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <h2 class="dentalseuri2-title">
                        Save your tooth,
                        <br>
                        Save your smile<br>

                    </h2>
                    <p class="dentalseuri2-desc">
                        Kamu tidak perlu cabut gigi untuk gigi berlubang yang sakit. Perawatan saluran skar menjaga gigi asli tetap sehat bebas infeksi.
                    </p>
                    <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20ingin%20tanya%20mengenai%20perawatan%20Root%20Canal%20Treatment%20(di%20Seuri%20Dental).%20-seuri.id" class="btn dentalseuri2-btn">
                        <i class="fab fa-whatsapp me-2 fw-bold"></i>More Info
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
            <div class="row align-items-center" style="--bs-gutter-x: 4rem;">
                <!-- FOTO KIRI -->
                <div class="col-lg-6 mb-5 mb-lg-0 d-flex justify-content-end" style="margin-bottom: 0 !important;">
                    <img
                        src="<?= image('rootcanal.webp') ?>"
                        alt="Dokter gigi sedang melayani pasien"
                        style="height: 500px; width: 500px; object-fit: cover; border-radius: 10px; overflow: hidden;"
                        class="img-fluid about-image shadow-lg">
                </div>

                <!-- PENJELASAN KANAN -->
                <div class="col-lg-6 about-content d-flex justify-content-start" style="padding-left: 1rem;">
                    <div>
                        <h1 class="fw-bold mb-4" style="color: #5880a4; font-size: 50px;">Our Root Canal Services</h1>
                        <h3 style="font-weight: 400;">Dokter gigi spesialis Seuri Dental siap melakukan perawatan saluran akar diantaranya;</h3>

                        <ul class="list-unstyled ms-3">
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">Microscopic Endodontics</h3>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">Retreatment</h3>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">PSA Anak</h3>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h3 style="font-weight: 400;" class="mb-0 ">Apicoectomy (Bedah Akar Gigi)</h3>
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
    
    <div class="container why-trust-content">
        <div class="text-center">
            <h1 class="fw-bold" style="color: #5880a4; font-size: 50px;">
                Why Choose Root Canal Treatment at Seuri?
            </h1>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="feature-item d-flex align-items-center mb-3">
                        <img style="width:48px;" src="<?= image('blink.png') ?>" class="me-3">
                        <h4 style="font-weight: 400; font-size: 25px; margin: 0;">Ditangani oleh dokter gigi spesialis endodontis berpengalaman</h4>
                    </div>
                    <div class="feature-item d-flex align-items-center mb-3">
                        <img style="width:48px;" src="<?= image('blink.png') ?>" class="me-3">
                        <h4 style="font-weight: 400; font-size: 25px; margin: 0;">Menggunakan alat modern dan teknologi yang canggih</h4>
                    </div>
                    <div class="feature-item d-flex align-items-center mb-3">
                        <img style="width:48px;" src="<?= image('blink.png') ?>" class="me-3">
                        <h4 style="font-weight: 400; font-size: 25px; margin: 0;">Pilihan perawatan saluran akar dalam satu kali kunjungan</h4>
                    </div>
                    <div class="feature-item d-flex align-items-center mb-3">
                        <img style="width:48px;" src="<?= image('blink.png') ?>" class="me-3">
                        <h4 style="font-weight: 400; font-size: 25px; margin: 0;">Menangani lebih dari 100++ kasus perawatan saluran akar</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="before-after-section">
        <div class="container ba-container">

            <div class="text-left mb-5">
                <h2 class="ba-section-title">Before After Treatment Root Canal Treatment</h2>
                <h4>Lihat Hasil Root Canal Treatment di Seuri Dental Clinic!</h4>
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
                        src="<?= image('ourendodo.png') ?>"
                        alt="Dokter gigi sedang melayani pasien"
                        style=" object-fit: cover; border-radius: 35px; overflow: hidden;"
                        class="img-fluid about-image shadow-lg">
                </div>

                <!-- PENJELASAN KANAN -->
                <div class="col-lg-6 about-content d-flex justify-content-start" style="padding-left: 1rem;">
                    <div>
                        <h1 class="fw-bold" style="color: #6381a8;">Conditions Treated by Our Endodontist</h1>
                        <h5>Dokter gigi spesialis Seuri Dental siap melakukan perawatan saluran akar diantaranya;</h5>

                        <ul class="list-unstyled ms-3">
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h5 class="mb-0 ">Gigi sakit terus menerus</h5>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h5 class="mb-0">Perubahan warna keabuan pada gigi</h5>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h5 class="mb-0 ">Bengkak pada area gig</h5>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <span class="me-2 rounded-circle d-inline-block" style="width:8px; height:8px; background-color:#000;"></span>
                                <h5 class="mb-0 ">Gigi patah atau trauma</h5>
                            </li>
                        </ul><br>
                        <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20ingin%20tanya%20mengenai%20perawatan%20Root%20Canal%20Treatment%20(di%20Seuri%20Dental).%20-seuri.id" class="btn dentalseuri2-btn">
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
                        <button class="accordion-button collapsed " type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq1">
                            Apakah perawatan Perawatan Saluran Akar bisa menggunakan asuransi
                            ?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Perawatan saluran akar atau perawatan saraf gigi secara umum termasuk dalam tanggungan asuransi kesehatan standar, karena dianggap sebagai perawatan kuratif untuk mengobati pasien.
                            <br>
                            SeuriChingu bisa periksa kembali polis asuransi yang dimiliki atau konsultasikan langsung dengan pihak asuransi dan Seuri Dental Specialist untuk mendapatkan penjelasan lebih detail mengenai cakupan biaya dan opsi pembayaran yang tersedia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq2">
                            Berapa lama perawatan saluran akar gigi di Seuri dental specialist?

                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Durasi perawatan saraf gigi atau saluran akar di Seuri Dental Specialist berlangsung kurang lebih 45-60 menit. Seuri Dental Specialist menyediakan layanan perawatan saluran akar gigi dengan dokter gigi spesialis konservasi gigi berpengalaman dan profesional untuk memastikan hasil yang maksimal dan minim nyeri.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq3">
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
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq4">
                            Layanan apa saja di seuri dental?

                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Seuri Dental Specialist menyediakan berbagai layanan dari dokter gigi umum dan spesialis, termasuk:
                            Pemeriksaan dan konsultasi gigi<br>
                            Pembersihan karang gigi (scaling & polishing)<br>
                            Pemasangan behel / ortodonti<br>
                            Tambal gigi dan perawatan saluran akar<br>
                            Perawatan gigi anak<br>
                            Pencabutan & bedah gigi bungsu<br>
                            Estetika gigi (bleaching, veneer, crown)<br>
                            Pembuatan gigi tiruan dan implan gigi<br>
                            Setiap layanan di Seuri Dental Specialust dilakukan oleh tim dokter profesional dengan alat canggih dan modern.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq5">
                            Berapa biaya perawatan saluran akar di Seuri Dental Specialist?

                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-secondary">
                            Biaya perawatan saluran akar (saraf gigi) dengan doktre gigi spesialis konservasi gigi di Seuri Dental Specialist mulai dari harga Rp. 2.500.000 dari awal perawatan hingga akhir bergantung pada jumlah saluran akar dan tingkat kesulitan kasus.
                            <br>Jadwalkan konsultasi di Seuri untuk mendapatkan rencana perawatan & estimasi biaya yang spesifik sesuai kondisi SeuriChingu.

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
                Perawatan Saluran Akar oleh Endodontist: Solusi Menjaga Gigi Tetap Sehat
            </h2>
            <p id="artikel" class="mt-4">
                Banyak orang berpikir bahwa gigi yang sakit parah harus dicabut. Padahal, dengan perawatan saluran akar, gigi yang terinfeksi masih bisa diselamatkan. Prosedur ini dilakukan untuk membersihkan bagian dalam gigi yang terinfeksi, kemudian menutupnya agar tidak terjadi infeksi berulang.
                Perawatan saluran akar merupakan salah satu tindakan kedokteran gigi yang membutuhkan ketelitian tinggi. Oleh karena itu, perawatan ini idealnya ditangani oleh seorang endodontist, yaitu dokter gigi spesialis yang berfokus pada kesehatan pulpa dan jaringan akar gigi. Dengan bantuan endodontist, prosedur menjadi lebih aman, efektif, dan hasilnya dapat bertahan lama.<br><br>
                Keunggulan melakukan perawatan saluran akar dengan endodontist adalah diagnosis yang lebih akurat, penggunaan teknologi modern, serta teknik perawatan yang lebih canggih. Hal ini sangat penting terutama pada kasus gigi dengan akar yang kompleks atau infeksi berulang.<br><br>
                Dengan memilih endodontist untuk melakukan perawatan saluran akar, Anda tidak hanya terhindar dari pencabutan gigi, tetapi juga bisa mempertahankan gigi asli agar tetap berfungsi dengan baik. Jadi, jika mengalami sakit gigi yang parah, segera konsultasikan dengan klinik gigi terpercaya yang menyediakan layanan perawatan saluran akar bersama endodontist profesional.
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