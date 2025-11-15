<section class="facilities-section">
    <div class="container-fluid facilities-container-fluid">
        
        <div class="row facilities-row">
            
            <div class="col-lg-6 col-md-6 col-sm-12 facilities-content-wrapper order-md-1 order-2">
                <div class="facilities-content-box">
                    
                    <h2 class="facilities-title">Our Facilities</h2>
                    <p class="facilities-subtitle">
                        Fasilitas yang nyaman untuk kamu mulai perawatan.
                    </p>
                    
                    <a href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20mau%20tanya%20tentang%20perawatan%20yang%20di%20Seuri%20Dental.%20-seuri.id" class="btn btn-facilities-appointment" role="button">
                        MAKE APPOINTMENT
                    </a>

                </div>
            </div>

<?php
$facilities = fetchAll("SELECT * FROM facilities WHERE is_active = 1 ORDER BY display_order ASC");
?>
            <div class="col-lg-6 col-md-6 col-sm-12 facilities-slider-wrapper order-md-2 order-1">
                
                <div id="facilitiesCarousel" class="carousel slide facilities-carousel" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-inner">
                        
                        <?php 
                        $first = true;
                        foreach ($facilities as $facility): 
                        ?>
                        <div class="carousel-item <?= $first ? 'active' : '' ?>">
                            <img src="<?= image($facility['image'])?>" class="d-block w-100 facility-img" alt="<?= htmlspecialchars($facility['title']) ?>">
                            <div class="facility-caption"><?= htmlspecialchars($facility['title']) ?></div>
                        </div>
                        <?php 
                        $first = false;
                        endforeach; 
                        ?>

                    </div>
                    
                    <button class="carousel-control-prev facility-control" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="prev">
                        <span class="facility-arrow-icon" aria-hidden="true">&lt;</span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next facility-control" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="next">
                        <span class="facility-arrow-icon" aria-hidden="true">&gt;</span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</section>