<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Admin' ?> - Seuri Dental Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #667eea;
            --secondary-color: #764ba2;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 0;
            overflow-y: auto;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu li a:hover,
        .sidebar-menu li a.active {
            background: rgba(255,255,255,0.1);
            padding-left: 30px;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
            background: #f8f9fa;
        }
        
        .topbar {
            background: white;
            padding: 15px 20px;
            margin: -20px -20px 20px -20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-toggle {
                display: block !important;
            }
        }
        
        .mobile-toggle {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--primary-color);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4>Seuri Dental</h4>
            <small>Admin Panel</small>
        </div>
        <ul class="sidebar-menu">
            <li><a href="dashboard.php" <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-home"></i> Dashboard
            </a></li>
            <li><a href="services.php" <?= basename($_SERVER['PHP_SELF']) == 'services.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-tooth"></i> Services
            </a></li>
            <li><a href="doctors.php" <?= basename($_SERVER['PHP_SELF']) == 'doctors.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-user-md"></i> Doctors
            </a></li>
            <li><a href="doctor_categories.php" <?= basename($_SERVER['PHP_SELF']) == 'doctor_categories.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-list"></i> Doctor Categories
            </a></li>
            <li><a href="testimonials.php" <?= basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-star"></i> Testimonials
            </a></li>
            <li><a href="news.php" <?= basename($_SERVER['PHP_SELF']) == 'news.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-newspaper"></i> News/Blog
            </a></li>
            <li><a href="promos.php" <?= basename($_SERVER['PHP_SELF']) == 'promos.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-tag"></i> Promos
            </a></li>
            <li><a href="facilities.php" <?= basename($_SERVER['PHP_SELF']) == 'facilities.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-building"></i> Facilities
            </a></li>
            <li><a href="partners.php" <?= basename($_SERVER['PHP_SELF']) == 'partners.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-handshake"></i> Partners
            </a></li>
            <li><a href="settings.php" <?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'class="active"' : '' ?>>
                <i class="fas fa-cog"></i> Settings
            </a></li>
            <li><a href="logout.php">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a></li>
        </ul>
    </div>
    
    <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
        <i class="fas fa-bars"></i>
    </button>
    
    <div class="main-content">
        <div class="topbar">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><?= $page_title ?? 'Admin Panel' ?></h4>
                <div>
                    <span class="text-muted">Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?></span>
                </div>
            </div>
        </div>
        
        <div class="content-wrapper">
