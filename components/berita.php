<?php
$conn = getDBConnection();

// Get parameters from URL
$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$items_per_page = 6;
$offset = ($current_page - 1) * $items_per_page;

// Build query based on filter
$where_clause = "is_published = 1";
if (!empty($category_filter) && $category_filter !== 'ALL') {
    $category_safe = $conn->real_escape_string($category_filter);
    $where_clause .= " AND category = '$category_safe'";
}

// Get total count for pagination
$count_query = "SELECT COUNT(*) as total FROM news WHERE $where_clause";
$count_result = $conn->query($count_query);
$total_items = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_items / $items_per_page);

// Get paginated data
$query = "SELECT * FROM news WHERE $where_clause ORDER BY publish_date DESC LIMIT $items_per_page OFFSET $offset";
$berita_list = fetchAll($query);

// Get all unique categories for filter buttons
$categories_query = "SELECT DISTINCT category FROM news WHERE is_published = 1 AND category != '' ORDER BY category ASC";
$categories_result = $conn->query($categories_query);
$categories = [];
while ($row = $categories_result->fetch_assoc()) {
    $categories[] = $row['category'];
}

$conn->close();
?>

<section class="berita-section">
    <div class="container">
        <!-- Search Bar -->
        <div class="berita-search-wrapper">
            <div class="search-box">
                <input type="text" placeholder="search" class="search-input">
                <button class="search-btn"><i class="fa fa-search"></i></button>
            </div>
        </div>

        <!-- Filter Buttons -->
        <div class="berita-filters">
            <button class="filter-btn <?= empty($category_filter) || $category_filter === 'ALL' ? 'active' : '' ?>" 
                    onclick="window.location.href='<?= url('pages/blog.php') ?>'">
                ALL
            </button>
            <?php foreach ($categories as $cat): ?>
                <button class="filter-btn <?= $category_filter === $cat ? 'active' : '' ?>" 
                        onclick="window.location.href='<?= url('pages/blog.php?category=' . urlencode($cat)) ?>'">
                    <?= strtoupper(htmlspecialchars($cat)) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- News Grid -->
        <div class="berita-grid">
            <?php if (empty($berita_list)): ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada artikel untuk kategori ini.</p>
                    <a href="<?= url('pages/blog.php') ?>" class="btn btn-primary mt-3">Lihat Semua Artikel</a>
                </div>
            <?php else: ?>
                <?php foreach ($berita_list as $berita): ?>
                    <?php 
                        $imgPath = !empty($berita['featured_image']) 
                            ? uploaded_image($berita['featured_image'], 'news') 
                            : 'https://placehold.co/400x300?text=No+Image';
                        $formattedDate = date('F, d Y', strtotime($berita['publish_date']));
                        $slug = !empty($berita['slug']) ? $berita['slug'] : $berita['id'];
                    ?>
                    <a href="<?= url('pages/blog-detail.php?slug=' . urlencode($slug)) ?>" class="berita-card-link">
                        <div class="berita-card">
                            <div class="berita-image">
                                <img src="<?= $imgPath ?>" 
                                     onerror="this.onerror=null;this.src='https://placehold.co/400x300?text=No+Image';" 
                                     alt="thumbnail">
                            </div>
                            <div class="berita-content">
                                <h5 class="berita-title"><?= htmlspecialchars($berita['title']) ?></h5>
                                <div class="berita-meta">
                                    <span class="berita-category"><?= htmlspecialchars($berita['category']) ?></span>
                                    <span class="berita-date"><?= htmlspecialchars($formattedDate) ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
            <div class="berita-pagination">
                <?php
                $category_param = !empty($category_filter) ? '&category=' . urlencode($category_filter) : '';
                
                // Previous button
                if ($current_page > 1): ?>
                    <button class="page-btn" 
                            onclick="window.location.href='<?= url('pages/blog.php?page=' . ($current_page - 1) . $category_param) ?>'">
                        <i class="fa fa-angles-left"></i>
                    </button>
                <?php endif;
                
                // Page numbers
                $start_page = max(1, $current_page - 2);
                $end_page = min($total_pages, $current_page + 2);
                
                if ($start_page > 1): ?>
                    <button class="page-btn" 
                            onclick="window.location.href='<?= url('pages/blog.php?page=1' . $category_param) ?>'">
                        1
                    </button>
                    <?php if ($start_page > 2): ?>
                        <span class="pagination-dots">...</span>
                    <?php endif;
                endif;
                
                for ($i = $start_page; $i <= $end_page; $i++): ?>
                    <button class="page-btn <?= $i === $current_page ? 'active' : '' ?>" 
                            onclick="window.location.href='<?= url('pages/blog.php?page=' . $i . $category_param) ?>'">
                        <?= $i ?>
                    </button>
                <?php endfor;
                
                if ($end_page < $total_pages): 
                    if ($end_page < $total_pages - 1): ?>
                        <span class="pagination-dots">...</span>
                    <?php endif; ?>
                    <button class="page-btn" 
                            onclick="window.location.href='<?= url('pages/blog.php?page=' . $total_pages . $category_param) ?>'">
                        <?= $total_pages ?>
                    </button>
                <?php endif;
                
                // Next button
                if ($current_page < $total_pages): ?>
                    <button class="page-btn next" 
                            onclick="window.location.href='<?= url('pages/blog.php?page=' . ($current_page + 1) . $category_param) ?>'">
                        <i class="fa fa-angles-right"></i>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <style>
        .pagination-dots {
            padding: 0 10px;
            color: #999;
            display: inline-block;
        }
        .page-btn {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        </style>
    </div>
</section>
