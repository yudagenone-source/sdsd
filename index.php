<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seuri Dental Specialist - Klinik Gigi Terpercaya</title>
    <link rel="icon" type="image/png" href="<?= image('favicon.png') ?>">

    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Internal CSS -->
    <link rel="stylesheet" href="<?= css('style.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
    <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">

    <!-- Components CSS -->
    <link rel="stylesheet" href="<?= component_css('hero.css') ?>">
    <link rel="stylesheet" href="<?= component_css('about.css') ?>">
    <link rel="stylesheet" href="<?= component_css('little-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('why-love-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('our-services.css') ?>">
    <link rel="stylesheet" href="<?= component_css('meet-our-dentist.css') ?>">
    <link rel="stylesheet" href="<?= component_css('before-after.css') ?>">
    <link rel="stylesheet" href="<?= component_css('testimoni-seuri.css') ?>">
    <link rel="stylesheet" href="<?= component_css('our-facilities.css') ?>">
    <link rel="stylesheet" href="<?= component_css('our-partner.css') ?>">
    <link rel="stylesheet" href="<?= component_css('insurance-partner.css') ?>">
    <link rel="stylesheet" href="<?= component_css('consultation-cta.css') ?>">
    <link rel="stylesheet" href="<?= component_css('about-seuri-clinic.css') ?>">

    <!-- Mobile Responsive CSS -->
    <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">
</head>

<body>
    <!-- Header -->
    <?php include 'partials/header.php'; ?>

    <!-- Main Content -->
    <?php include 'components/hero.php'; ?>
    <?php include 'components/about.php'; ?>
    <?php include 'components/little-seuri.php'; ?>
    <?php include 'components/why-love-seuri.php'; ?>
    <?php include 'components/our-services.php'; ?>
    <?php include 'components/meet-our-dentist.php'; ?>
    <?php include 'components/before-after.php'; ?>
    <?php include 'components/testimoni-seuri.php'; ?>
    <?php include 'components/our-facilities.php'; ?>
<br><br><br>

    <?php include 'components/insurance-partner.php'; ?>
    <br><br><br>
    <?php include 'components/consultation-cta.php'; ?>



    <section style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container text-left">
            <h2 class="fw-bold text-secondary">
                Lebih Lanjut Tentang Seuri Dental Clinic, Perawatan Gigi Profesional untuk Senyum Anda
            </h2>
            <p id="artikel" class="mt-4">
                Menjaga kesehatan gigi tidak hanya soal estetika, tetapi juga bagian penting dari kesehatan tubuh secara keseluruhan. Salah satu langkah terbaik adalah rutin melakukan pemeriksaan di dental clinic terpercaya.
                <br><br>

                Di Seuri dental clinic, tersedia berbagai layanan mulai dari pemeriksaan gigi, pembersihan karang gigi, tambal gigi berlubang, hingga perawatan saluran akar. Selain itu, banyak dental clinic modern juga menawarkan layanan estetik seperti veneer, bleaching, dan pemasangan behel atau aligner untuk memperbaiki posisi gigi.
                <br><br>

                Keunggulan dental clinic ini adalah fasilitas nyaman, teknologi terkini, serta tenaga medis berpengalaman. Dengan kombinasi tersebut, pasien dapat merasa lebih aman dan tenang saat menjalani perawatan.
                <br><br>
                Pemeriksaan rutin di Seuri dental clinic sebaiknya dilakukan setiap enam bulan sekali. Tujuannya untuk mendeteksi masalah sejak dini agar tidak berkembang menjadi lebih serius. Perawatan pencegahan ini juga membantu menjaga senyum tetap cerah dan sehat.
                <br><br>

                Memilih dental clinic yang tepat adalah investasi jangka panjang. Dengan perawatan berkala, gigi tetap kuat, sehat, dan menunjang rasa percaya diri dalam setiap aktivitas.

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
    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize all carousels
        document.addEventListener('DOMContentLoaded', function() {
            var carousels = document.querySelectorAll('.carousel');
            carousels.forEach(function(carousel) {
                var carouselInstance = new bootstrap.Carousel(carousel, {
                    interval: 5000,
                    wrap: true,
                    touch: true
                });
            });

            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }

                    const mobileNav = document.querySelector('.main-nav');
                    if (mobileNav && mobileNav.classList.contains('active')) {
                        mobileNav.classList.remove('active');
                    }
                });
            });

            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            const mainNav = document.querySelector('.main-nav');

            if (mobileToggle && mainNav) {
                mobileToggle.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                });

                mainNav.addEventListener('click', function(e) {
                    if (e.target.tagName === 'A') {
                        mainNav.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>

</html>