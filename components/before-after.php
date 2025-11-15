<section class="before-after-section">
  <div class="container ba-container">

    <div class="text-center mb-5">
      <h2 class="ba-section-title">Before After Treatment</h2>
      <p class="ba-section-subtitle">Lihat Hasil Treatment di Seuri Dental Clinic!</p>
    </div>

    <!-- SWIPER -->
    <div class="swiper mySwiper-beforeafter">
      <div class="swiper-wrapper">

        <!-- SLIDE 1 -->
        <div class="swiper-slide">
          <div class="ba-set-wrapper">
            <div class="ba-image-wrapper">
              <img src="<?= image('before1.png')?>" alt="Before Treatment 1" class="img-fluid ba-image">
            </div>
            <div class="ba-image-wrapper">
              <img src="<?= image('after1.png')?>" alt="After Treatment 1" class="img-fluid ba-image">
            </div>
          </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="swiper-slide">
          <div class="ba-set-wrapper">
            <div class="ba-image-wrapper">
              <img src="<?= image('before2.png')?>" alt="Before Treatment 2" class="img-fluid ba-image">
            </div>
            <div class="ba-image-wrapper">
              <img src="<?= image('after2.png')?>" alt="After Treatment 2" class="img-fluid ba-image">
            </div>
          </div>
        </div>

        <!-- SLIDE 3 -->
        <div class="swiper-slide">
          <div class="ba-set-wrapper">
            <div class="ba-image-wrapper">
              <img src="<?= image('before3.png')?>" alt="Before Treatment 3" class="img-fluid ba-image">
            </div>
            <div class="ba-image-wrapper">
              <img src="<?= image('after3.png')?>" alt="After Treatment 3" class="img-fluid ba-image">
            </div>
          </div>
        </div>

        <!-- SLIDE 4 -->
        <div class="swiper-slide">
          <div class="ba-set-wrapper">
            <div class="ba-image-wrapper">
              <img src="<?= image('before1.png')?>" alt="Before Treatment 4" class="img-fluid ba-image">
            </div>
            <div class="ba-image-wrapper">
              <img src="<?= image('after1.png')?>" alt="After Treatment 4" class="img-fluid ba-image">
            </div>
          </div>
        </div>

      </div>
      
   
    </div>
   
  </div>
</section>

<!-- Swiper.js CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".mySwiper-beforeafter", {
    slidesPerView: 3,
    spaceBetween: 30,
    grabCursor: true,
    simulateTouch: true,
    navigation: {
      nextEl: ".ba-button-next",
      prevEl: ".ba-button-prev",
    },
    breakpoints: {
      0:   { slidesPerView: 1.1, spaceBetween: 15 },
      768: { slidesPerView: 2.2, spaceBetween: 20 },
      992: { slidesPerView: 3, spaceBetween: 30 }
    }
  });
});
</script>
