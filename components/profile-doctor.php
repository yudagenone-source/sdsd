<?php
// Contoh data dokter (nanti bisa diganti dari DB)
$dokter = [
    'nama' => 'drg. Marcella Harlan Sp.Ort',
    'spesialis' => 'Dokter Gigi Spesialis',
    'pengalaman' => '12 Tahun',
    'bidang' => ['Install Behel Metal', 'Install Behel Self Ligating', 'Invisalign Provider'],
    'pendidikan' => [
        'Pendidikan Spesialis Ortodonsia – Universitas Trisakti',
        'Pendidikan Spesialis Ortodonsia – Universitas Padjadjaran'
    ],
    'gambar' => 'doctor-marcella.webp',
];

// Jadwal praktik
$jadwal = [
    ['hari' => 'Selasa', 'jam' => '15:00 - 19:00', 'praktik' => 'Bogor'],
    ['hari' => 'Rabu', 'jam' => '15:00 - 19:00', 'praktik' => 'Bogor'],
    ['hari' => 'Kamis', 'jam' => '15:00 - 19:00', 'praktik' => 'Bogor'],
    ['hari' => 'Jumat', 'jam' => '15:00 - 19:00', 'praktik' => 'Bogor'],
];

// Dokter lain
$dokter_lain = [
    [
        'nama' => 'drg. Amanda Sp.KG',
        'spesialis' => 'Dokter Konservasi Gigi',
        'gambar' => 'doctor-amanda.webp',
    ],
    [
        'nama' => 'drg. Stanley Sp.KG',
        'spesialis' => 'Dokter Spesialis Anak',
        'gambar' => 'doctor-stanley.webp',
    ],
    [
        'nama' => 'drg. Daniel Sp.Pros',
        'spesialis' => 'Dokter Prostodonsia',
        'gambar' => 'doctor-daniel.webp',
    ],
];
?>

<section class="doctor-profile-section">
    <div class="container">
        <div class="row align-items-start g-4">
            <!-- Foto Dokter -->
            <div class="col-lg-4 col-md-5">
                <div class="doctor-photo text-center">
                    <img src="<?= image($dokter['gambar']) ?>" 
                         onerror="this.onerror=null;this.src='https://placehold.co/400x400?text=No+Image';" 
                         alt="<?= htmlspecialchars($dokter['nama']) ?>" 
                         class="img-fluid rounded-4 shadow-sm">
                </div>
            </div>

            <!-- Detail Dokter -->
            <div class="col-lg-8 col-md-7">
                <div class="doctor-info">
                    <h2 class="doctor-name"><?= htmlspecialchars($dokter['nama']) ?></h2>
                    <p class="doctor-specialist"><?= htmlspecialchars($dokter['spesialis']) ?></p>

                    <div class="doctor-meta mb-3">
                        <span class="meta-item"><i class="fa fa-briefcase"></i> <?= $dokter['pengalaman'] ?></span>
                    </div>

                    <div class="doctor-section">
                        <h5>Bidang Keahlian</h5>
                        <?php foreach ($dokter['bidang'] as $b): ?>
                            <span class="badge-skill"><?= htmlspecialchars($b) ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="doctor-section">
                        <h5>Education</h5>
                        <ul class="doctor-edu-list">
                            <?php foreach ($dokter['pendidikan'] as $p): ?>
                                <li><?= htmlspecialchars($p) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <button class="book-btn">BOOK NOW</button>
                </div>
            </div>
        </div>

        <!-- Jadwal Praktik -->
        <div class="schedule-section mt-5">
            <h4 class="schedule-title"><i class="fa fa-calendar-days"></i> Jadwal Praktik</h4>
            <p class="schedule-sub">Cek jadwal praktik dokter gigi <?= htmlspecialchars($dokter['nama']) ?> di Seuri Dental Clinic Bogor.</p>

            <div class="table-responsive">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Praktik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $j): ?>
                            <tr>
                                <td><?= htmlspecialchars($j['hari']) ?></td>
                                <td><?= htmlspecialchars($j['jam']) ?></td>
                                <td><?= htmlspecialchars($j['praktik']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dokter Lainnya -->
        <div class="other-doctor-section mt-5">
            <h4>Lihat Profil Dokter Gigi Kami</h4>
            <p>Check jadwal dokter gigi lainnya yang cocok dengan jadwal Anda.</p>

            <div class="row g-4 mt-3">
                <?php foreach ($dokter_lain as $d): ?>
                    <div class="col-md-4">
                        <div class="other-doctor-card text-center">
                            <img src="<?= image($d['gambar']) ?>" 
                                 onerror="this.onerror=null;this.src='https://placehold.co/300x300?text=No+Image';" 
                                 class="other-doctor-photo rounded-4 mb-3" 
                                 alt="<?= htmlspecialchars($d['nama']) ?>">
                            <h6 class="other-doctor-name"><?= htmlspecialchars($d['nama']) ?></h6>
                            <p class="other-doctor-spec"><?= htmlspecialchars($d['spesialis']) ?></p>
                            <a href="#" class="view-profile">Lihat profil &gt;</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
