<?php
// header.php - Untuk file di partials/
require_once __DIR__ . '/../config.php';
?>
<nav class="navbar navbar-expand-lg header-bg fixed-top">
    <div class="container-fluid container-header">
        
        <!-- Logo -->
        <a class="navbar-brand" href="<?= url() ?>">
            <img src="<?= image('seuri-logo.png') ?>" alt="Seuri Dental Specialist Logo" class="logo-img">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                <li class="nav-item" hidden>
                    <a class="nav-link nav-link-seuri" href="<?= url('littleseuri') ?>">Little Seuri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-seuri" href="<?= url('promo-klinik-gigi') ?>">Promo</a>
                </li>
                
                <!-- Services dengan Dropdown - BISA DIKLIK & DROPDOWN -->
                <li class="nav-item dropdown services-dropdown-wrapper" onmouseenter="showDropdownHover(this)" onmouseleave="hideDropdownHover(this)">
                    <a class="nav-link nav-link-seuri dropdown-toggle" href="<?= url('layanan-gigi') ?>" id="servicesDropdown" role="button" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="<?= url('orthodontis-terdekat') ?>">Orthodontics</a></li>
                        <li><a class="dropdown-item" href="<?= url('bleaching-gigi-terdekat') ?>">Bleaching gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('endodontist-terdekat') ?>">PSA</a></li>
                        <li><a class="dropdown-item" href="<?= url('dokter-gigi-anak-terdekat') ?>">Perawatan Gigi Anak</a></li>
                        <li><a class="dropdown-item" href="<?= url('implan-gigi-terdekat') ?>">Implan gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('gigi-tiruan-terdekat') ?>">Gigi Tiruan</a></li>
                        <li><a class="dropdown-item" href="<?= url('scaling-gigi-terdekat') ?>">Scaling gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('dokter-spesialis-bedah-mulut') ?>">Odontectomy</a></li>
                        <li><a class="dropdown-item" href="<?= url('veneer-gigi-terdekat') ?>">Veneer Gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('tambal-gigi-terdekat') ?>">Tambal gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('cabut-gigi-terdekat') ?>">Cabut gigi</a></li>
                        <li><a class="dropdown-item" href="<?= url('crown-gigi-terdekat') ?>">Crown Gigi</a></li>
                    </ul>
                </li>
                
                <script>
                let dropdownTimer;
                let servicesClicked = false;
                
                // Hover functionality untuk desktop
                function showDropdownHover(liElem) {
                    if (window.innerWidth > 992) {
                        clearTimeout(dropdownTimer);
                        const menu = liElem.querySelector('.dropdown-menu');
                        menu.classList.add('show');
                        liElem.classList.add('show');
                    }
                }
                
                function hideDropdownHover(liElem) {
                    if (window.innerWidth > 992) {
                        dropdownTimer = setTimeout(() => {
                            const menu = liElem.querySelector('.dropdown-menu');
                            menu.classList.remove('show');
                            liElem.classList.remove('show');
                        }, 200);
                    }
                }
                
                // Click handling untuk mobile dan desktop
                document.addEventListener('DOMContentLoaded', function() {
                    const servicesLink = document.querySelector('#servicesDropdown');
                    const servicesDropdown = document.querySelector('.services-dropdown-wrapper');
                    const dropdownMenu = servicesDropdown.querySelector('.dropdown-menu');
                    
                    servicesLink.addEventListener('click', function(e) {
                        const isOpen = dropdownMenu.classList.contains('show');
                        
                        // Mobile: first click opens dropdown, user can then tap submenu items
                        if (window.innerWidth <= 992) {
                            if (!isOpen) {
                                e.preventDefault();
                                dropdownMenu.classList.add('show');
                                servicesDropdown.classList.add('show');
                                return false;
                            } else {
                                // Dropdown already open, allow navigation to services page
                                return true;
                            }
                        } 
                        // Desktop: click navigates (hover already shows dropdown)
                        else {
                            return true;
                        }
                    });
                    
                    // Close dropdown when clicking outside (but not when clicking submenu items)
                    document.addEventListener('click', function(e) {
                        if (!servicesDropdown.contains(e.target)) {
                            dropdownMenu.classList.remove('show');
                            servicesDropdown.classList.remove('show');
                        }
                    });
                    
                    // Prevent dropdown from closing when clicking submenu items
                    const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');
                    dropdownItems.forEach(function(item) {
                        item.addEventListener('click', function(e) {
                            // Allow navigation to submenu item
                            e.stopPropagation();
                        });
                    });
                });
                </script>
                
                <li class="nav-item">
                           <a class="nav-link nav-link-seuri" href="<?= url('dentist-terdekat') ?>">Doctor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-seuri" href="<?= url('location') ?>">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-seuri" href="<?= url('artikel') ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-seuri" href="<?= url('pricelist') ?>" id="downloadPricelistBtn">Download Pricelist</a>
                </li>
            </ul>

            <!-- CTA Button -->
            <div class="navbar-nav-end">
                <a class="btn btn-seuri" href="https://wa.me/6281280089191?text=Halo%20Seuri%20Dental%20Specialist%2C%20aku%20mau%20tanya%20tentang%20perawatan%20yang%20di%20Seuri%20Dental.%20-seuri.id" role="button">
                    <i class="fab fa-whatsapp me-2"></i>MAKE APPOINTMENT
                </a>
            </div>
        </div>
    </div>
</nav>
