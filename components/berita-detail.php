<?php
// Data sudah divalidasi di blog-detail.php, kita bisa ambil ulang atau gunakan data yang sudah ada
$slug = $_GET['slug'] ?? '';
$conn = getDBConnection();

// Cek apakah slug adalah numeric (ID) atau string (actual slug)
if (is_numeric($slug)) {
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ? AND is_published = 1 LIMIT 1");
    $stmt->bind_param("i", $slug);
} else {
    $stmt = $conn->prepare("SELECT * FROM news WHERE slug = ? AND is_published = 1 LIMIT 1");
    $stmt->bind_param("s", $slug);
}

$stmt->execute();
$result = $stmt->get_result();
$berita_data = $result->fetch_assoc();
$stmt->close();

// Data pasti ada karena sudah di-check di blog-detail.php

// Format data berita untuk tampilan (content dari WYSIWYG editor sudah aman untuk di-render)
$berita = [
    'judul' => $berita_data['title'],
    'tanggal' => date('F, d Y', strtotime($berita_data['publish_date'])),
    'kategori' => $berita_data['category'],
    'gambar' => !empty($berita_data['featured_image']) ? uploaded_image($berita_data['featured_image'], 'news') : 'https://placehold.co/400x300?text=No+Image',
    'isi' => $berita_data['content']
];

// Ambil berita terkait (3 artikel terbaru, exclude artikel saat ini)
$related_query = "SELECT * FROM news WHERE is_published = 1 AND id != ? ORDER BY publish_date DESC LIMIT 3";
$stmt = $conn->prepare($related_query);
$stmt->bind_param("i", $berita_data['id']);
$stmt->execute();
$result = $stmt->get_result();
$related = [];
while ($row = $result->fetch_assoc()) {
    $related[] = [
        'judul' => $row['title'],
        'tanggal' => date('F, d Y', strtotime($row['publish_date'])),
        'gambar' => !empty($row['featured_image']) ? uploaded_image($row['featured_image'], 'news') : 'https://placehold.co/400x300?text=No+Image',
        'slug' => $row['slug'] ?? $row['id']
    ];
}
$stmt->close();
$conn->close();
?>

<section class="berita-detail-section">
    <div class="container">
        <div class="row g-5">
            <!-- Artikel Utama -->
            <div class="col-lg-8">
                <div class="berita-detail-image">
                    <img src="<?= $berita['gambar'] ?>" 
                         onerror="this.onerror=null;this.src='https://placehold.co/800x400?text=No+Image';" 
                         alt="gambar artikel" class="img-fluid rounded-4">
                </div>
                <h2 class="berita-detail-title"><?= htmlspecialchars($berita['judul']) ?></h2>
                <p class="berita-detail-meta"><?= htmlspecialchars($berita['kategori']) ?> | <?= htmlspecialchars($berita['tanggal']) ?></p>
                <div class="berita-detail-content">
                    <?= $berita['isi'] ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="berita-sidebar">
                    <div class="sidebar-search">
                        <input type="text" placeholder="Cari artikel..." class="sidebar-input">
                        <button class="sidebar-btn"><i class="fa fa-search"></i></button>
                    </div>

                    <h5 class="sidebar-title">Artikel Lainnya</h5>

                    <?php foreach ($related as $item): ?>
                        <a href="<?= url('pages/blog-detail.php?slug=' . urlencode($item['slug'])) ?>" class="related-item-link">
                            <div class="related-item d-flex align-items-center mb-3">
                                <img src="<?= $item['gambar'] ?>" 
                                     onerror="this.onerror=null;this.src='https://placehold.co/120x80?text=No+Image';" 
                                     class="related-thumb rounded-3 me-3" alt="thumbnail">
                                <div>
                                    <h6 class="related-title mb-1"><?= htmlspecialchars($item['judul']) ?></h6>
                                    <p class="related-date mb-0"><?= htmlspecialchars($item['tanggal']) ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

       
    </div>
</section>
