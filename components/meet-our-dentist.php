<section class="dentist-section">
    <div class="dentist-background-wrapper">
        <div class="container dentist-container">
            
            <div class="text-center mb-5">
                <h2 class="dentist-section-title">Meet Our Dentist</h2>
                <p class="dentist-section-subtitle">Lihat Profil Dokter Gigi Kami dan Check Jadwal Mereka Sekarang!</p>
            </div>

<?php
$doctors = fetchAll("SELECT * FROM doctors WHERE is_active = 1 ORDER BY display_order ASC LIMIT 3");
?>
            <div class="row justify-content-center dentist-row">
                
                <?php foreach ($doctors as $doctor): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="dentist-card">
                        <div class="dentist-photo-wrapper">
                            <?php if (!empty($doctor['photo'])): ?>
                                <img src="<?= uploaded_image($doctor['photo'], 'doctors')?>" 
                                     alt="<?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?>" 
                                     class="img-fluid dentist-photo"
                                     onerror="this.src='https://placehold.co/300x400?text=<?= urlencode($doctor['name']) ?>'">
                            <?php else: ?>
                                <img src="https://placehold.co/300x400?text=<?= urlencode($doctor['name']) ?>" 
                                     alt="<?= htmlspecialchars($doctor['name']) ?> <?= htmlspecialchars($doctor['title']) ?>" 
                                     class="img-fluid dentist-photo">
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="dentist-name"><?= htmlspecialchars($doctor['name']) ?><?php if($doctor['title']): ?><br><?= htmlspecialchars($doctor['title']) ?><?php endif; ?></h3>
                        
                        <span class="specialty-tag"><?= htmlspecialchars($doctor['specialty']) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
            
            <div class="check-more-wrapper">
                <a href="<?= url('pages/doctor.php') ?>" class="check-more-link">
                    Check Selengkapnya
                    <span class="check-more-arrow">&rarr;</span>
                </a>
            </div>
            
        </div>
    </div>
</section>