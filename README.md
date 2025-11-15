# Seuri Dental Specialist Website

Website profesional untuk Klinik Gigi Seuri dengan Admin Panel untuk mengelola konten.

## Fitur

### Frontend (Website Utama)
- ✅ Responsive design (Desktop & Mobile)
- ✅ Homepage dengan semua section
- ✅ Services showcase
- ✅ Doctors profile
- ✅ Testimonials
- ✅ News/Blog
- ✅ Facilities
- ✅ Partners & Insurance
- ✅ Contact & WhatsApp integration

### Admin Panel
- ✅ Secure login system
- ✅ Dashboard dengan statistik
- ✅ CRUD untuk Services
- ✅ CRUD untuk Doctors
- ✅ CRUD untuk Testimonials
- ✅ CRUD untuk News/Blog
- ✅ CRUD untuk Promos
- ✅ CRUD untuk Facilities
- ✅ CRUD untuk Partners
- ✅ Website Settings

## Cara Setup di Komputer Lokal

### 1. Requirements
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Apache/Nginx web server (atau XAMPP/WAMP/MAMP)

### 2. Install Database

1. Buka phpMyAdmin atau MySQL client Anda
2. Import file SQL:
   ```
   database/seuri_dental.sql
   ```
3. Database `seuri_dental` akan otomatis terbuat beserta semua tabel dan data awal

### 3. Konfigurasi Database

Edit file `admin/db_config.php` sesuai dengan setting MySQL lokal Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // Sesuaikan username MySQL Anda
define('DB_PASS', '');               // Sesuaikan password MySQL Anda
define('DB_NAME', 'seuri_dental');
```

### 4. Jalankan Website

1. Copy semua file ke folder htdocs (XAMPP) atau www (WAMP)
2. Akses website di browser:
   ```
   http://localhost/seuri-dental/
   ```

### 5. Login ke Admin Panel

1. Akses admin panel:
   ```
   http://localhost/seuri-dental/admin/
   ```

2. Login dengan kredensial default:
   - **Username:** `admin`
   - **Password:** `admin123`

3. **PENTING:** Segera ganti password setelah login pertama!

## Struktur Folder

```
seuri-dental/
├── admin/                    # Admin Panel
│   ├── includes/            # Header & Footer admin
│   ├── db_config.php       # Konfigurasi database
│   ├── index.php           # Login page
│   ├── dashboard.php       # Dashboard admin
│   ├── services.php        # Manage services
│   ├── doctors.php         # Manage doctors
│   ├── testimonials.php    # Manage testimonials
│   ├── news.php            # Manage news/blog
│   ├── promos.php          # Manage promos
│   ├── facilities.php      # Manage facilities
│   ├── partners.php        # Manage partners
│   └── settings.php        # Website settings
├── assets/
│   ├── css/                # Semua file CSS
│   └── image/              # Semua gambar
├── components/             # Component PHP
├── pages/                  # Halaman-halaman
├── partials/               # Header & Footer
├── database/
│   └── seuri_dental.sql   # Database schema
├── config.php              # Konfigurasi utama
├── index.php               # Homepage
└── README.md               # File ini
```

## Database Tables

- **admin_users** - User admin untuk login
- **services** - Layanan yang ditawarkan
- **doctors** - Data dokter dan spesialis
- **testimonials** - Testimoni pasien
- **news** - Artikel dan berita
- **promos** - Promo dan diskon
- **facilities** - Fasilitas klinik
- **partners** - Partner equipment dan asuransi
- **settings** - Pengaturan website

## Cara Menggunakan Admin Panel

### Mengelola Services
1. Login ke admin panel
2. Klik menu "Services"
3. Klik "Add New Service" atau edit service yang ada
4. Upload gambar icon ke folder `assets/image/`
5. Isi nama file gambar (contoh: `tambal.png`)
6. Save

### Mengelola Doctors
1. Klik menu "Doctors"
2. Add/Edit doctor
3. Upload foto dokter ke folder `assets/image/`
4. Isi semua informasi dokter
5. Save

### Mengelola Testimonials
1. Klik menu "Testimonials"
2. Add/Edit testimonial
3. Isi nama pasien, rating, dan review
4. Save

### Mengelola News/Blog
1. Klik menu "News/Blog"
2. Add/Edit artikel
3. Pilih kategori (ORTHODONTIST, TIPS & TRICK, atau LITTLE SEURI)
4. Upload featured image ke folder `assets/image/`
5. Isi konten lengkap
6. Set publish date
7. Save

### Mengelola Gambar
- Semua gambar harus diupload ke folder `assets/image/`
- Format yang didukung: JPG, PNG, WEBP
- Recommended: Compress gambar sebelum upload untuk performa lebih baik

## Mobile Responsive

Website sudah responsive dan mobile-friendly:
- ✅ Hamburger menu untuk mobile
- ✅ Touch-friendly navigation
- ✅ Optimized layout untuk semua ukuran layar
- ✅ Swiper/Carousel sudah mobile-ready

## Keamanan

1. **Ganti Password Default**
   - Login ke admin → Settings
   - Atau update langsung di database table `admin_users`
   - Gunakan `password_hash()` untuk hash password baru

2. **Backup Database Rutin**
   - Export database via phpMyAdmin
   - Simpan file backup di tempat aman

3. **Update Permission Folder**
   - Pastikan folder `assets/image/` writable (755 atau 777)

## Troubleshooting

### Error: Connection failed
- Periksa konfigurasi di `admin/db_config.php`
- Pastikan MySQL service sudah running
- Pastikan database `seuri_dental` sudah diimport

### Error: 404 Not Found
- Periksa file .htaccess jika ada
- Pastikan mod_rewrite enabled di Apache

### Gambar tidak muncul
- Periksa path gambar di database
- Pastikan file gambar ada di folder `assets/image/`
- Periksa case-sensitive nama file (Linux server)

## Support & Contact

Untuk bantuan lebih lanjut, silakan hubungi developer atau tim IT Anda.

## Credits

- Bootstrap 5.3.3
- Font Awesome 6.4.0
- Swiper JS
- PHP & MySQL

---

**Copyright © 2025 Seuri Dental Specialist**
