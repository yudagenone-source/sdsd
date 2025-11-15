<?php
$current_page = basename($_SERVER['PHP_SELF']);
$is_index = ($current_page === 'index.php');
$center_class = $is_index ? '' : 'mobile-centered';
?>
<section class="consultation-cta-section <?= $center_class ?>">
    <div class="container-fluid p-0">
        <div class="row align-items-center consultation-row">
            <!-- GAMBAR DI KIRI - DESKTOP, DI BAWAH - MOBILE -->
            <div class="col-lg-7 col-md-6 p-0 consultation-image-wrapper align-bottom">
                <img src="<?= image('dentist.png')?>" alt="Tim Dokter Seuri Dental Specialist" class="consultation-team-img bottom-aligned">
            </div>

            <!-- KONTEN DI KANAN - DESKTOP, DI ATAS - MOBILE -->
            <div class="col-lg-5 col-md-6 consultation-content-wrapper">
                <div class="consultation-content-box">
                    <h2 class="consultation-title">Yuk, Seuri Chingu!</h2>
                    <p class="consultation-subtitle">
                        Rawat Kesehatan Gigimu di Seuri Dental
                    </p>
                    <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20mau%20tanya%20tentang%20perawatan%20yang%20di%20Seuri%20Dental.%20-seuri.id" class="btn btn-consultation-cta" role="button">
                        <i class="fab fa-whatsapp me-2"></i>Konsultasi Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>