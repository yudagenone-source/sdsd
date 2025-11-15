<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promo Spesial - Seuri Dental Specialist</title>
  <link rel="icon" type="image/png" href="<?= image('favicon.png') ?>">

  <!-- Bootstrap & Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@qpokychuk/gilroy@1.0.2/index.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- SwiperJS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <!-- Internal CSS -->
  <link rel="stylesheet" href="<?= css('style.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('header.css') ?>">
  <link rel="stylesheet" href="<?= partial_css('footer.css') ?>">
  <link rel="stylesheet" href="<?= component_css('promo.css') ?>">
  
  <!-- Mobile Responsive CSS -->
  <link rel="stylesheet" href="<?= component_css('mobile-responsive.css') ?>">
</head>

<body>
<?php include __DIR__ . '/../partials/header.php'; ?>

<?php
$promos = fetchAll("SELECT * FROM promos WHERE is_active = 1 AND (end_date IS NULL OR end_date >= CURDATE()) ORDER BY created_at DESC");
?>
<section class="promo-section py-5">
  <div class="container">
    <h2 class="promo-title mb-2">Promo Spesial untuk Anda</h2>
    <div class="divider mb-4"></div>

    <!-- Swiper -->
    <div class="swiper promo-swiper">
      <div class="swiper-wrapper">
        <?php foreach ($promos as $promo): ?>
          <div class="swiper-slide">
            <div class="promo-card">
              <img src="<?= uploaded_image($promo['image'], 'promos') ?>" alt="<?= htmlspecialchars($promo['title']) ?>">
              <a href="https://wa.me/6281280089191?text=Halo%20saya%20ingin%20klaim%20promo%20<?= urlencode($promo['title']) ?>" 
                 target="_blank" class="btn btn-claim mt-3" style="background-color: #929292ff;">
                <i class="fab fa-whatsapp me-2"></i> Claim Now
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper('.promo-swiper', {
    slidesPerView: 3,
    spaceBetween: 24,
    grabCursor: true,
    freeMode: true,
    breakpoints: {
      0:   { slidesPerView: 1.2, spaceBetween: 16 },
      576: { slidesPerView: 2, spaceBetween: 20 },
      992: { slidesPerView: 3, spaceBetween: 24 }
    }
  });
</script>

</body>
</html>
