<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seuri Dental Specialist - Homepage</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <link rel="stylesheet" href="style.css"> 
</head>

<body>
    
    <header class="main-header">
        <div class="container-fluid header-container">
            <a class="logo-link" href="#"><img src="logo_seuri.png" alt="Seuri Logo" class="header-logo"></a>
            <nav class="main-nav">
                <a href="#services">Layanan</a>
                <a href="#facilities">Fasilitas</a>
                <a href="#dentist">Dokter</a>
                <a href="#testimoni">Testimoni</a>
            </nav>
            <a href="https://wa.me/yourwhatsappnumber" class="btn btn-header-cta" role="button">Konsultasi Sekarang</a>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="container-fluid p-0">
                <div class="row hero-row">
                    <div class="col-lg-12 hero-banner-top">
                        <img src="hero_banner_promo.jpg" alt="Bleaching Gigi 15% Off" class="img-fluid">
                    </div>

                    <div class="col-lg-6 col-md-6 p-0 hero-image-wrapper">
                        <div class="hero-image-box">
                            <img src="hero_consultation.jpg" alt="Konsultasi Klinik" class="hero-img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 hero-content-wrapper">
                        <div class="hero-content-box">
                            <h1 class="hero-title">Creating Beautiful Smiles at the Best Dental Clinic Near You</h1>
                            <p class="hero-subtitle">Dental clinic terdekat dengan pengalaman profesional dan teknologi modern.</p>
                            <a href="https://wa.me/yourwhatsappnumber" class="btn btn-hero-cta" role="button">MAKE APPOINTMENT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="little-seuri-section">
            <div class="container-fluid little-seuri-container-fluid">
                <div class="row little-seuri-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 little-seuri-content-wrapper">
                        <div class="little-seuri-content-box">
                            <img src="little_seuri_logo.png" alt="Little Seuri Logo" class="little-seuri-logo">
                            <div class="divider-line"></div>
                            <p class="little-seuri-text">Seuri Dental Clinic memberikan suasana ramah anak dengan perawatan gigi anak yang profesional, membantu si Kecil merasa aman dan nyaman selama perawatan.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 little-seuri-image-wrapper">
                        <img src="little_seuri_kids.jpg" alt="Perawatan Anak" class="little-seuri-image">
                    </div>
                </div>
            </div>
        </section>

        <section class="why-choose-us-section">
            <div class="container why-choose-us-container">
                <h2 class="why-choose-us-title">Why Do People Love Seuri?</h2>
                <div class="row justify-content-center">
                    
                    <div class="col-lg-4 col-md-6 col-sm-10 text-center feature-item mb-5 mb-lg-0">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-hand-holding-heart feature-icon"></i>
                        </div>
                        <h3 class="feature-heading">Compassionate</h3>
                        <p class="feature-text">Tempat di mana Anda bisa mendapatkan perawatan gigi terbaik dengan kenyamanan maksimal.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 text-center feature-item mb-5 mb-lg-0">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-tooth feature-icon"></i>
                        </div>
                        <h3 class="feature-heading">Experienced Dentist</h3>
                        <p class="feature-text">Pelayanan gigi dengan dokter gigi spesialis yang berpengalaman.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 text-center feature-item">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-users feature-icon"></i>
                        </div>
                        <h3 class="feature-heading">Accessible</h3>
                        <p class="feature-text">Perawatan gigi yang berkualitas sebanding dengan investasi yang dibayarkan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-section" id="services">
            <div class="container services-container">
                <h2 class="services-title">Our Services</h2>
                
                <div id="servicesCarousel" class="carousel slide services-carousel" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                            <div class="service-cards-group">
                                <div class="service-card">
                                    <div class="service-icon-box"><i class="fas fa-tooth service-icon"></i></div>
                                    <h3 class="service-name">Orthodontic</h3>
                                    <p class="service-desc">Wujudkan gigi rapi dan senyum percaya diri dengan perawatan behel yang nyaman oleh orthodontist.</p>
                                </div>
                                <div class="service-card">
                                    <div class="service-icon-box"><i class="fas fa-star service-icon"></i></div>
                                    <h3 class="service-name">Scaling Gigi</h3>
                                    <p class="service-desc">Bersihkan plak dan karang gigi agar napas segar dan gusi sehat.</p>
                                </div>
                                <div class="service-card">
                                    <div class="service-icon-box"><i class="fas fa-fill-drip service-icon"></i></div>
                                    <h3 class="service-name">Tambal Gigi</h3>
                                    <p class="service-desc">Atasi gigi berlubang dengan dental filling oleh dokter gigi profesional dengan hasil awet dan natural.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev service-control" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                        <span class="service-arrow-icon" aria-hidden="true">&lt;</span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next service-control" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                        <span class="service-arrow-icon" aria-hidden="true">&gt;</span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="dentist-section" id="dentist">
            <div class="container dentist-container">
                
                <div class="dentist-heading-box">
                    <h2 class="dentist-title">Meet Our Dentist</h2>
                    <p class="dentist-subtitle">Lihat Profil Dokter Gigi Kami dan Check Jadwal Mereka Sekarang!</p>
                </div>
                
                <div class="row justify-content-center">
                    
                    <div class="col-lg-4 col-md-4 col-sm-6 text-center dentist-item">
                        <div class="dentist-card">
                            <div class="dentist-photo-wrapper">
                                <img src="dentist_marcella.jpg" alt="drg. Marcella Harlan Sp.Ort" class="dentist-photo">
                            </div>
                            <h3 class="dentist-name">drg. Marcella Harlan<br>Sp.Ort</h3>
                            <span class="dentist-specialty">Dokter Gigi Spesialis</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-6 text-center dentist-item">
                        <div class="dentist-card">
                            <div class="dentist-photo-wrapper">
                                <img src="dentist_stanley.jpg" alt="drg. Stanley Sp.KG" class="dentist-photo">
                            </div>
                            <h3 class="dentist-name">drg. Stanley Sp.KG</h3>
                            <span class="dentist-specialty">Dokter Gigi Spesialis</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-6 text-center dentist-item">
                        <div class="dentist-card">
                            <div class="dentist-photo-wrapper">
                                <img src="dentist_khalisa.jpg" alt="drg. Khalisa Salsabila" class="dentist-photo">
                            </div>
                            <h3 class="dentist-name">drg. Khalisa Salsabila</h3>
                            <span class="dentist-specialty">Dokter Gigi Umum</span>
                            <a href="#" class="btn btn-check-more">Check Selengkapnya</a>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </section>

        <section class="before-after-section">
            <div class="container before-after-container">
                <h2 class="before-after-title">Before After Treatment</h2>
                <p class="before-after-subtitle">Lihat Hasil Treatment di Seuri Dental Clinic!</p>
                
                <div id="beforeAfterCarousel" class="carousel slide before-after-carousel" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        
                        <div class="carousel-item active">
                            <div class="row before-after-group">
                                <div class="col-lg-4 col-md-4 col-sm-12 before-after-item">
                                    <img src="before_after_1_before.jpg" alt="Before Treatment 1" class="before-img labeled-before">
                                    <img src="before_after_1_after.jpg" alt="After Treatment 1" class="after-img labeled-after">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 before-after-item">
                                    <img src="before_after_2_before.jpg" alt="Before Treatment 2" class="before-img labeled-before">
                                    <img src="before_after_2_after.jpg" alt="After Treatment 2" class="after-img labeled-after">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 before-after-item">
                                    <img src="before_after_3_before.jpg" alt="Before Treatment 3" class="before-img labeled-before">
                                    <img src="before_after_3_after.jpg" alt="After Treatment 3" class="after-img labeled-after">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <button class="carousel-control-prev ba-control" type="button" data-bs-target="#beforeAfterCarousel" data-bs-slide="prev">
                        <span class="ba-arrow-icon" aria-hidden="true">&lt;</span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next ba-control" type="button" data-bs-target="#beforeAfterCarousel" data-bs-slide="next">
                        <span class="ba-arrow-icon" aria-hidden="true">&gt;</span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="facilities-section" id="facilities">
            <div class="container-fluid facilities-container-fluid">
                <div class="row facilities-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 facilities-content-wrapper order-md-1 order-2">
                        <div class="facilities-content-box">
                            <h2 class="facilities-title">Our Facilities</h2>
                            <p class="facilities-subtitle">Fasilitas yang nyaman untuk kamu mulai perawatan.</p>
                            <a href="https://wa.me/yourwhatsappnumber" class="btn btn-facilities-appointment" role="button">MAKE APPOINTMENT</a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 facilities-slider-wrapper order-md-2 order-1">
                        <div id="facilitiesCarousel" class="carousel slide facilities-carousel" data-bs-ride="carousel" data-bs-interval="4000">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img src="facility_1_waiting_room.jpg" class="d-block w-100 facility-img" alt="Ruang Tunggu yang Nyaman"><div class="facility-caption">Ruang Tunggu yang Nyaman</div></div>
                                <div class="carousel-item"><img src="facility_2_treatment_room.jpg" class="d-block w-100 facility-img" alt="Ruang Treatment Private"><div class="facility-caption">Ruang Treatment Private</div></div>
                            </div>
                            <button class="carousel-control-prev facility-control" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="prev"><span class="facility-arrow-icon" aria-hidden="true">&lt;</span><span class="visually-hidden">Previous</span></button>
                            <button class="carousel-control-next facility-control" type="button" data-bs-target="#facilitiesCarousel" data-bs-slide="next"><span class="facility-arrow-icon" aria-hidden="true">&gt;</span><span class="visually-hidden">Next</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimoni-section" id="testimoni">
            <div class="container testimoni-container">
                <div id="testimoniCarousel" class="carousel slide testimoni-carousel" data-bs-ride="carousel" data-bs-interval="false">
                    
                    <div class="testimoni-header-wrapper">
                        <h2 class="testimoni-title">Testimoni Pasien Seuri</h2>
                        <p class="testimoni-subtitle">Check review pasien setelah perawatan gigi di Klinik Gigi Seuri</p>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row testimoni-cards-group">
                                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center">
                                    <div class="testimoni-card">
                                        <div class="user-info">
                                            <i class="fas fa-user-circle user-icon"></i>
                                            <span class="user-name">Rara Sekar</span>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                                        <p class="review-text">Kliniknya nyaman, premium dan dokter gigi spesialisnya lengkap.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center">
                                    <div class="testimoni-card">
                                        <div class="user-info">
                                            <i class="fas fa-user-circle user-icon"></i>
                                            <span class="user-name">Budiman</span>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                                        <p class="review-text">Akhirnya ga perlu jauh-jauh ke Jakarta buat perawatan orto. Cukup ke Seuri Bogor aja!</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center">
                                    <div class="testimoni-card">
                                        <div class="user-info">
                                            <i class="fas fa-user-circle user-icon"></i>
                                            <span class="user-name">Anya Geraldine</span>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </div>
                                        <p class="review-text">Nemu klinik dengan kualitas sebagus ini di Bogor. Top ortodontisnya. Bakal sering kontrol behel di Seuri Bogor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev testimoni-control" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
                        <span class="testimoni-arrow-icon" aria-hidden="true">&lt;</span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next testimoni-control" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
                        <span class="testimoni-arrow-icon" aria-hidden="true">&gt;</span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="partner-section">
            <div class="container partner-container">
                <h2 class="partner-title">Our Partner</h2>
                
                <div id="partnerCarousel" class="carousel slide partner-carousel" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="partner-logo-group">
                                <div class="partner-logo-item"><img src="logo_osstem.png" alt="OSSTEM IMPLANT Logo" class="partner-logo"></div>
                                <div class="partner-logo-item"><img src="logo_belmont.png" alt="Belmont Logo" class="partner-logo"></div>
                                <div class="partner-logo-item"><img src="logo_drkim.png" alt="Dr-kim Logo" class="partner-logo"></div>
                                <div class="partner-logo-item"><img src="logo_morita.png" alt="MORITA Logo" class="partner-logo"></div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev partner-control" type="button" data-bs-target="#partnerCarousel" data-bs-slide="prev"><span class="partner-arrow-icon" aria-hidden="true">&lt;</span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next partner-control" type="button" data-bs-target="#partnerCarousel" data-bs-slide="next"><span class="partner-arrow-icon" aria-hidden="true">&gt;</span><span class="visually-hidden">Next</span></button>
                </div>
            </div>
        </section>

        <section class="insurance-partner-section">
            <div class="container insurance-partner-container">
                <h2 class="insurance-partner-title">Our Insurance Partner</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-6 insurance-logo-item"><img src="logo_admedika.png" alt="AdMedika Logo" class="insurance-logo"></div>
                    <div class="col-lg-3 col-md-4 col-6 insurance-logo-item"><img src="logo_inova.png" alt="Inova Care Asia Logo" class="insurance-logo"></div>
                </div>
            </div>
        </section>

        <section class="consultation-cta-section">
            <div class="container-fluid p-0">
                <div class="row align-items-center consultation-row">
                    <div class="col-lg-7 col-md-6 p-0 consultation-image-wrapper">
                        <img src="consultation_team_img.jpg" alt="Tim Dokter Seuri Dental Specialist" class="consultation-team-img">
                    </div>
                    <div class="col-lg-5 col-md-6 consultation-content-wrapper">
                        <div class="consultation-content-box">
                            <h2 class="consultation-title">Yuk, Seuri Chingu!</h2>
                            <p class="consultation-subtitle">Rawat Kesehatan Gigimu di Seuri Dental</p>
                            <a href="https://wa.me/yourwhatsappnumber" class="btn btn-consultation-cta" role="button">Konsultasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-seuri-section">
            <div class="container about-seuri-container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11 about-content-wrapper">
                        <h2 class="about-title">Lebih Lanjut Tentang Seuri Dental Clinic, Perawatan Gigi Profesional untuk Senyum Anda</h2>
                        <p>Menjaga kesehatan gigi tidak hanya soal estetika, tetapi juga bagian penting dari kesehatan tubuh secara keseluruhan. Salah satu langkah terbaik adalah rutin melakukan pemeriksaan di dental clinic terpercaya.</p>
                        <p>Di Seuri dental clinic, tersedia berbagai layanan mulai dari pemeriksaan gigi, pembersihan karang gigi, tambal gigi berlubang, hingga perawatan saluran akar. Selain itu, banyak dental clinic modern juga menawarkan layanan estetik seperti veneer, bleaching, dan pemasangan behel atau aligner untuk memperbaiki posisi gigi.</p>
                        <p>Keunggulan dental clinic ini adalah fasilitas nyaman, teknologi terkini, serta tenaga medis berpengalaman. Dengan kombinasi tersebut, pasien dapat merasa lebih aman dan tenang saat menjalani perawatan.</p>
                        <p>Pemeriksaan rutin di Seuri dental clinic sebaiknya dilakukan setiap enam bulan sekali. Tujuannya untuk mendeteksi masalah sejak dini agar tidak berkembang menjadi lebih serius. Perawatan pencegahan ini juga membantu menjaga senyum tetap cerah dan sehat.</p>
                        <p>Memilih dental clinic yang tepat adalah investasi jangka panjang. Dengan perawatan berkala, gigi tetap kuat, sehat, dan menunjang rasa percaya diri dalam setiap aktivitas.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <footer class="main-footer">
        <div class="container footer-container">
            <div class="row">
                <div class="col-lg-4 footer-col">
                    <h5 class="footer-heading">Contact Us</h5>
                    <p>Jl. Raya Bogor No. 123, Bogor</p>
                    <p>+62 812-XXXX-XXXX</p>
                </div>
                <div class="col-lg-4 footer-col">
                    <h5 class="footer-heading">Quick Links</h5>
                    <a href="#services">Layanan</a>
                    <a href="#dentist">Dokter</a>
                    <a href="#testimoni">Testimoni</a>
                </div>
                <div class="col-lg-4 footer-col">
                    <h5 class="footer-heading">Social Media</h5>
                    <i class="fab fa-instagram footer-icon"></i>
                    <i class="fab fa-facebook-f footer-icon"></i>
                </div>
            </div>
            <div class="footer-copyright">
                &copy; <?php echo date("Y"); ?> Seuri Dental Clinic. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>