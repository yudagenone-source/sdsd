<section class="testimoni-section">
  <div class="container testimoni-container">

    <div class="testimoni-header">
      <h2 class="testimoni-title">Testimoni Pasien Seuri</h2>
      <p class="testimoni-subtitle">
        Check review pasien setelah perawatan gigi di Klinik Gigi Seuri
      </p>
    </div>

<?php
$testimonials = fetchAll("SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order ASC");
?>
    <div class="swiper mySwiper-testimoni">
      <div class="swiper-wrapper">

        <?php foreach ($testimonials as $testi): ?>
        <div class="swiper-slide">
          <div class="testimoni-card">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <!-- Kiri -->
              <div class="d-flex align-items-center">
                <i class="fas fa-user-circle user-icon me-2"></i>
                <span class="pasien-name"><?= htmlspecialchars($testi['patient_name']) ?></span>
              </div>

              <!-- Kanan (Google + Bintang Vertikal) -->
              <div class="d-flex flex-column align-items-end">
                <i class="fa-brands fa-google google-icon mb-1"></i>
                <div class="rating-stars d-flex justify-content-end">
                  <?php for ($i = 0; $i < $testi['rating']; $i++): ?>
                  <i class="fas fa-star gold-star"></i>
                  <?php endfor; ?>
                </div>
              </div>
            </div>

            <p class="review-text">
              <?= htmlspecialchars($testi['review_text']) ?>
            </p>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <!-- Navigasi -->
    <div class="testimoni-navigation-controls">
      <button class="testimoni-btn testimoni-prev"><span class="testimoni-arrow prev-arrow"></span></button>
      <button class="testimoni-btn testimoni-next"><span class="testimoni-arrow next-arrow"></span></button>
    </div>

  </div>
  <div class="testimoni-bottom-curve"></div>
</section>

<!-- Swiper + FontAwesome -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".mySwiper-testimoni", {
    slidesPerView: 3,
    spaceBetween: 30,
    grabCursor: true,
    navigation: {
      nextEl: ".testimoni-next",
      prevEl: ".testimoni-prev",
    },
    breakpoints: {
      0: { slidesPerView: 1.1, spaceBetween: 15 },
      768: { slidesPerView: 2.2, spaceBetween: 20 },
      992: { slidesPerView: 3, spaceBetween: 30 },
    },
  });
});
</script>
