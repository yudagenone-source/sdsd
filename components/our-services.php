<?php
$services = fetchAll("SELECT * FROM services WHERE is_active = 1 ORDER BY display_order ASC");
?>
<section class="services-section">
  <div class="services-container">
    <h2 class="section-title">Our Services</h2>

    <!-- Swiper Container unik untuk Our Services -->
    <div class="swiper mySwiper-services">
      <div class="swiper-wrapper">

        <?php foreach ($services as $service): ?>
        <div class="swiper-slide">
          <div class="service-card">
            <div class="icon-text-group">
              <img src="<?= image($service['icon_image']) ?>" alt="<?= htmlspecialchars($service['title']) ?> Icon" class="service-icon">
              <h3 class="service-title"><?= htmlspecialchars($service['title']) ?></h3>
            </div>
            <p class="service-text"><?= htmlspecialchars($service['description']) ?></p>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <!-- Tombol Navigasi -->
    <div class="service-navigation-controls">
      <button class="static-btn service-control-prev">
        <span class="control-icon-prev"></span>
      </button>
      <button class="static-btn service-control-next">
        <span class="control-icon-next"></span>
      </button>
    </div>
  </div>
</section>

<!-- Swiper.js CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
/* CSS tambahan hanya untuk perbaikan icon */
.service-icon {
  max-width: 100%;
  max-height: 80px; /* Batasi tinggi maksimal biar gak terlalu besar */
  width: auto;
  height: auto;
  object-fit: contain; /* Ini yang bikin gak crop */
}

/* Biar text wrap ke bawah */
.service-title {
  word-wrap: break-word;
  overflow-wrap: break-word;
  white-space: normal;
}

.service-text {
  word-wrap: break-word;
  overflow-wrap: break-word;
  white-space: normal;
}

/* Untuk mobile */
@media (max-width: 767px) {
  .service-icon {
    max-height: 60px; /* Sedikit lebih kecil di mobile */
  }
  
  .service-title,
  .service-text {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  // Swiper khusus untuk Our Services
  new Swiper(".mySwiper-services", {
    slidesPerView: 3,
    spaceBetween: 30,
    grabCursor: true,
    navigation: {
      nextEl: ".service-control-next",
      prevEl: ".service-control-prev",
    },
    breakpoints: {
      0: { slidesPerView: 1.1, spaceBetween: 15 },
      768: { slidesPerView: 2.2, spaceBetween: 20 },
      992: { slidesPerView: 3, spaceBetween: 30 }
    }
  });
});
</script>