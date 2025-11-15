# Panduan Update Styling Website Seuri Dental

## Perubahan yang Telah Dilakukan

### 1. ✅ Font Size yang Konsisten
- Semua teks non-title sekarang menggunakan ukuran font yang sama (1.125rem / ~18px)
- Responsif otomatis di semua device

### 2. ✅ Alignment Mobile ke Kiri
- Semua teks di tampilan mobile (≤768px) sekarang align left
- Lebih rapi dan mudah dibaca

### 3. ✅ Meet Our Dentist - Foto Berfungsi
- Foto dokter sudah ditampilkan dari database dengan baik
- Ditambahkan min-height untuk memastikan foto konsisten

### 4. ✅ CSS Class Baru untuk "Why Choose" Section
File baru: `assets/css/components/why-choose-section.css`

### 5. ✅ Spacing Service Card Diperbaiki
- Jarak antar elemen di card service sudah lebih rapi di mobile

### 6. ✅ Consultation CTA Photo Fix
- Foto sekarang nempel ke background bawah di tampilan 768px-1199px

---

## Cara Menggunakan Class "Why Choose" Baru

### Step 1: Tambahkan CSS ke Halaman Service
Pada setiap halaman service (tambal.php, crown.php, orthodontics.php, dll), tambahkan link CSS ini di dalam `<head>`:

```php
<link rel="stylesheet" href="<?= component_css('why-choose-section.css') ?>">
```

### Step 2: Update HTML Structure
Ganti section "Why Choose/Why Must/Why Patients" yang lama dengan struktur baru:

**SEBELUM (contoh dari orthodontics.php):**
```html
<section>
    <div class="container mt-5">
        <h1 class="fw-bold align-items-center text-center" style="color: #5880a4; font-size: 50px;">
            Why Patients Trust Our Orthodontist
        </h1>
    </div>
    <div class="container about-container mt-5">
        <!-- konten -->
    </div>
</section>
```

**SESUDAH:**
```html
<section class="why-choose-section">
    <div class="container">
        <h1 class="why-choose-title">
            Why Patients Trust Our Orthodontist
        </h1>
        
        <div class="why-choose-content">
            <h4><img src="<?= image('blink.png') ?>"> Ditangani langsung oleh dokter spesialis ortodonti berpengalaman</h4>
            <h4><img src="<?= image('blink.png') ?>"> Menggunakan alat modern dan teknologi canggih</h4>
            <h4><img src="<?= image('blink.png') ?>"> Telah berhasil menangani 100+ kasus ortodonti</h4>
            <h4><img src="<?= image('blink.png') ?>"> Lokasi strategis dengan ruang perawatan nyaman</h4>
        </div>
    </div>
</section>
```

### Halaman yang Perlu Diupdate:
1. ✅ **tambal.php** - sudah ada bg_kanan.png
2. ✅ **crown.php** - sudah ada bg_kanan.png
3. ❌ **orthodontics.php** - PERLU UPDATE dengan class baru
4. ❌ **implan.php** - PERLU UPDATE dengan class baru
5. ❌ **cabut.php** - PERLU UPDATE dengan class baru
6. ❌ **scaling.php** - PERLU UPDATE dengan class baru
7. ❌ **veneer.php** - PERLU UPDATE dengan class baru
8. ❌ **bleaching-gigi-terdekat.php** - PERLU UPDATE dengan class baru
9. ❌ **gigitiruan.php** - PERLU UPDATE dengan class baru
10. ❌ **odontectomy.php** - PERLU UPDATE dengan class baru
11. ❌ **pedodontia.php** - PERLU UPDATE dengan class baru
12. ❌ **psa.php** - PERLU UPDATE dengan class baru

---

## Fitur CSS Class "Why Choose" yang Baru

✅ Background `bg_kanan.png` dengan opacity 0.24 (24%)
✅ Responsive untuk semua device
✅ Font size konsisten menggunakan CSS variables
✅ Mobile friendly dengan alignment left
✅ Background auto-hide di mobile untuk tampilan lebih bersih

---

## Testing Checklist

Setelah update, pastikan untuk test:
- [ ] Desktop view (>1200px) - background terlihat dengan opacity 24%
- [ ] Tablet view (768px-1199px) - background terlihat dan responsive
- [ ] Mobile view (<768px) - background hidden, text align left
- [ ] Font size konsisten di semua halaman
- [ ] Consultation CTA photo nempel di bottom (768-1199px)
- [ ] Service cards spacing rapi di mobile
- [ ] Meet our dentist photos muncul dengan baik

---

## File yang Sudah Dimodifikasi

1. `assets/css/style.css` - Font variables updated
2. `assets/css/components/mobile-responsive.css` - Alignment mobile ke kiri
3. `assets/css/components/why-choose-section.css` - **BARU** untuk Why Choose sections
4. `assets/css/components/consultation-cta.css` - Fix untuk 768-1199px
5. `assets/css/components/our-services.css` - Fix spacing cards di mobile
6. `assets/css/components/meet-our-dentist.css` - Fix foto display

---

## Catatan Penting

⚠️ **JANGAN** hapus inline styles yang sudah ada kecuali Anda yakin tidak merusak tampilan
⚠️ Pastikan `bg_kanan.png` ada di folder `assets/image/`
⚠️ Test di semua browser (Chrome, Firefox, Safari, Edge)
⚠️ Test di mobile real device, bukan hanya browser inspector

---

**Update selesai! Website siap di-run di local environment Anda.**
