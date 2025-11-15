# Setup Lokal - Seuri Dental Specialist

Proyek ini menggunakan PHP dan MySQL dan dirancang untuk dijalankan di environment lokal Anda.

## Persyaratan Sistem

- PHP 8.0 atau lebih baru
- MySQL 5.7 atau lebih baru (atau MariaDB 10.4+)
- Apache atau Nginx (atau gunakan PHP built-in server untuk development)

## Langkah-langkah Setup

### 1. Setup Database MySQL

```bash
# Login ke MySQL
mysql -u root -p

# Buat database baru
CREATE DATABASE seuri_dental;

# Import schema dan data
mysql -u root -p seuri_dental < database/seuri_dental\ (1).sql
```

### 2. Konfigurasi Database

Edit file `admin/db_config.php` dan sesuaikan kredensial database Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // Ganti dengan username MySQL Anda
define('DB_PASS', '');      // Ganti dengan password MySQL Anda
define('DB_NAME', 'seuri_dental');
```

### 3. Setup Folder Upload

Pastikan folder `uploads/` memiliki permission yang benar:

```bash
chmod -R 755 uploads/
```

### 4. Menjalankan Project

#### Opsi A: Menggunakan PHP Built-in Server (Untuk Development)

```bash
php -S localhost:8000
```

Kemudian buka browser ke: `http://localhost:8000`

#### Opsi B: Menggunakan XAMPP/WAMP

1. Copy seluruh folder project ke `htdocs` (XAMPP) atau `www` (WAMP)
2. Akses melalui: `http://localhost/seuri-dental/`

#### Opsi C: Menggunakan Apache/Nginx

Configure virtual host Anda untuk mengarah ke root folder project ini.

### 5. Login Admin Panel

URL: `http://localhost:8000/admin/`

Default kredensial:
- Username: `admin`
- Password: `admin123` (atau lihat di database dump)

## Fitur yang Sudah Diperbaiki

✅ **Rich Text Editor untuk Blog/Artikel (Summernote)**
- Admin panel menggunakan Summernote editor (ringan, pakai CDN gratis)
- Fitur: Bold, Italic, Underline, List, Table, Link, Insert Image
- Bisa insert gambar langsung di dalam artikel
- Konten blog akan ditampilkan dengan format HTML yang benar di halaman detail
- Perlu koneksi internet untuk load CDN (cdnjs.cloudflare.com)

✅ **Link ke Profile Doctor**
- Tombol "Check Selengkapnya" di halaman index sekarang mengarah ke halaman doctor
- Setiap card dokter di halaman doctor dapat diklik untuk melihat profile lengkap

✅ **Pencarian Jadwal dan Treatment**
- Query pencarian sudah diperbaiki untuk hasil yang lebih akurat
- Pastikan data jadwal dokter diisi dengan benar di admin panel

✅ **Foto Dokter di Index**
- Foto dokter sekarang ditampilkan dengan benar menggunakan fungsi `uploaded_image()`
- Foto diambil dari folder `uploads/doctors/`

## Troubleshooting

### Database Connection Error
- Pastikan MySQL service sudah running
- Periksa kredensial di `admin/db_config.php`
- Pastikan database `seuri_dental` sudah di-import

### Foto Tidak Muncul
- Pastikan folder `uploads/doctors/` dan `uploads/news/` ada
- Periksa permission folder (755)
- Pastikan path foto di database benar (hanya nama file, bukan full path)

### Content Blog Tidak Muncul dengan Format
- Pastikan HTML ditulis dengan benar di textarea
- Gunakan tag HTML standar: `<p>`, `<strong>`, `<em>`, `<ul>`, `<li>`, `<br>`, dll
- Untuk paragraf baru, gunakan tag `<p>...</p>`

## Struktur Folder

```
seuri-dental/
├── admin/              # Admin panel
├── assets/             # CSS, images, icons
├── components/         # Reusable PHP components
├── database/           # SQL dump
├── pages/              # Public pages
├── partials/           # Header, footer
├── uploads/            # User uploaded files
│   ├── doctors/        # Doctor photos
│   └── news/           # News/blog images
├── config.php          # Main configuration
└── index.php           # Homepage
```

## Catatan Penting

- Proyek ini menggunakan **MySQL**, bukan PostgreSQL
- Admin panel memerlukan **koneksi internet** untuk load rich text editor (Summernote CDN)
- Rich text editor menggunakan **Summernote** - lebih ringan dari TinyMCE, gratis tanpa API key
- Jadwal dokter sekarang bisa diinput **multiple days sekaligus** (centang beberapa checkbox)
- Upload gambar di dalam artikel akan tersimpan di folder `uploads/news/`
- Pastikan selalu backup database sebelum melakukan perubahan besar
