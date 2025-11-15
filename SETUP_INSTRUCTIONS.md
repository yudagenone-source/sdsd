# Setup Instructions - Seuri Dental Clinic Website

## Untuk User (Menjalankan di Local)

### 1. Setup Database
1. Buat database MySQL baru dengan nama `seuri_dental`
2. Import file SQL secara berurutan:
   ```sql
   mysql -u root -p seuri_dental < database/seuri_dental.sql
   mysql -u root -p seuri_dental < database/update_schema.sql
   mysql -u root -p seuri_dental < database/create_bookings_table.sql
   ```

### 2. Konfigurasi Database
Edit file `admin/db_config.php` sesuaikan dengan setting MySQL lokal Anda:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // sesuaikan
define('DB_PASS', '');      // sesuaikan
define('DB_NAME', 'seuri_dental');
```

### 3. Setup .htaccess
Pastikan Apache mod_rewrite aktif untuk clean URLs

### 4. Jalankan di Local Server
- XAMPP: Copy project ke folder `htdocs/seuri-dental`
- WAMP: Copy project ke folder `www/seuri-dental`
- Akses: `http://localhost/seuri-dental`

### 5. Login Admin
- URL: `http://localhost/seuri-dental/admin`
- Username: `admin`
- Password: `admin123`

### 6. Setup Data Dokter
1. Login ke admin panel
2. Masuk ke menu "Doctor Specialties" - sudah ada data default
3. Masuk ke menu "Doctors" - tambah/edit dokter:
   - Upload foto dokter
   - Pilih specialty dari dropdown
   - Isi services offered (treatment yang dilayani)
4. Masuk ke menu "Doctor Schedules" - tambah jadwal dokter:
   - **PENTING**: Gunakan nama hari dalam English (Monday, Tuesday, dst)
   - Pilih doctor
   - Pilih day of week
   - Set waktu mulai dan selesai

### 7. Fitur Booking
Setelah ada doctor dengan schedule:
1. User buka halaman `/dentist-terdekat`
2. Pilih tanggal booking (akan otomatis detect hari dalam minggu)
3. Pilih treatment (dari specialty/services yang tersedia)
4. Klik "Check Jadwal"
5. Sistem akan tampilkan dokter yang:
   - Punya jadwal aktif di hari tersebut
   - Melayani treatment yang dipilih
6. Klik "Booking" untuk submit booking
7. Booking akan muncul di menu "Bookings" di admin panel

### 8. Halaman Location
- URL: `/dental-clinic-bogor`
- Hanya menampilkan 1 lokasi (Bogor) tanpa form pencarian

---

## Perubahan yang Telah Dilakukan

### 1. Perbaikan Navigasi Profil Dokter
- **File**: `.htaccess`, `pages/doctor.php`
- Link dari halaman doctor ke profil doctor sudah berfungsi
- URL pattern: `/profil-dokter/{id}`

### 2. Form Pencarian Dokter (Seperti Location)
- **File**: `pages/doctor.php`
- Form dengan pilihan:
  - Tanggal (dengan Flatpickr calendar)
  - Treatment (dari database doctor_specialties)
- Filter dokter berdasarkan:
  - Jadwal aktif di hari yang dipilih
  - Specialty/services yang match dengan treatment

### 3. Sistem Booking
- **File**: `pages/doctor.php`, `api/booking.php`, `database/create_bookings_table.sql`
- Modal form untuk booking dengan validasi:
  - Nama pasien (required)
  - Nomor telepon (required, 10-13 digit)
- API validation:
  - Cek dokter punya jadwal di hari tersebut
  - Cek dokter melayani treatment yang dipilih
- Data booking tersimpan ke database

### 4. Admin Panel untuk Bookings
- **File**: `admin/bookings.php`
- Menampilkan semua booking dengan informasi:
  - Data pasien
  - Dokter yang dipilih
  - Tanggal booking
  - Treatment
  - Status (pending/confirmed/cancelled)
- Fitur:
  - Update status booking
  - Hapus booking

### 5. Location Page Simplified
- **File**: `components/location-detail.php`
- Removed form pencarian
- Hanya menampilkan informasi 1 lokasi Bogor

---

## Troubleshooting

### Booking tidak muncul?
- Pastikan ada doctor dengan schedule yang aktif
- Pastikan day_of_week di database menggunakan English names (Monday-Sunday)
- Cek doctor's specialty atau services_offered match dengan treatment yang dipilih

### Error koneksi database?
- Cek konfigurasi di `admin/db_config.php`
- Pastikan MySQL service running
- Pastikan database `seuri_dental` sudah dibuat

### Halaman profil dokter error 404?
- Pastikan mod_rewrite aktif di Apache
- Cek file `.htaccess` ada di root folder
- Cek AllowOverride di Apache config
