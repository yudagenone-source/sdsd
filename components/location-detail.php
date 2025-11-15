<?php
// Data klinik (ganti sesuai DB jika perlu)
$clinic = [
  'name'    => 'Seuri Dental Clinic Bogor',
  'desc'    => 'Seuri Dental Clinic Bogor, solusi terbaik untuk perawatan gigi Anda. Cek jadwal dokter dan layanan terbaik hari ini.',
  'address' => 'Jl. Raya Pajajaran No.28E, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153',
  'phone'   => '0812-8008-9191',
  'image'   => 'clinic-bogor.webp',
  'maps'    => 'https://maps.google.com/?q=Seuri+Dental+Clinic+Bogor',
  'booking' => '#'
];
?>

<!-- Link stylesheet khusus komponen -->
<link rel="stylesheet" href="<?= component_css('location-detail.css') ?>">

<!-- Flatpickr CSS (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<section class="section-location-detail py-5">
  <div class="container">

    <div class="text-center mb-4">
      <h2 class="title"><?= htmlspecialchars($clinic['name']) ?></h2>
      <p class="subtitle"><?= htmlspecialchars($clinic['desc']) ?></p>
    </div>

    <!-- Removed search form, showing Bogor location only -->

    <!-- DETAIL KLINIK -->
    <div class="row mt-5 align-items-center justify-content-center">
      <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
        <img src="<?= image($clinic['image']) ?>" 
             onerror="this.onerror=null;this.src='https://placehold.co/420x320?text=No+Image';"
             alt="Clinic" class="img-fluid clinic-photo rounded-4 shadow-sm">
      </div>

      <div class="col-md-6">
        <h4 class="clinic-name"><?= htmlspecialchars($clinic['name']) ?></h4>
        <p class="clinic-address"><?= htmlspecialchars($clinic['address']) ?></p>
        <p class="clinic-phone"><i class="fa fa-phone me-2"></i> <?= htmlspecialchars($clinic['phone']) ?></p>

        <div class="mt-3">
          <a href="<?= $clinic['maps'] ?>" target="_blank" class="btn-location-maps">Maps</a>
          <a href="<?= $clinic['booking'] ?>" class="btn-location-book">Booking</a>
        </div>
      </div>
    </div>
  </div>
</section>

