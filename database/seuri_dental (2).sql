-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 11:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seuri_dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$nnHlx52aC/D8B/QaG6/HBejRNzGJEzAuTA/gK/NSx24ccUpg6cJ1m', 'admin@seuridental.com', '2025-10-27 01:20:03', '2025-10-27 01:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `treatment` varchar(100) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `experience_years` int(11) DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `services_offered` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `title`, `specialty`, `specialty_id`, `experience_years`, `photo`, `bio`, `services_offered`, `education`, `schedule`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(4, 'drg. Khalisha Salsabila', '', 'Dokter Gigi Spesialis', 1, 3, '6918ce3918e0b_1763233337.jpg', 'drg. Khalisha Salsabila', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 3, '2025-11-15 19:02:17', '2025-11-15 19:11:40'),
(5, 'drg. Marcella Harlan', 'MM, Sp.Ort', 'Dokter Gigi Spesialis', 1, 8, '6918cf2031874_1763233568.jpg', 'drg. Marcella Harlan', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 1, '2025-11-15 19:06:08', '2025-11-15 19:06:08'),
(6, 'drg. Miranti Kusuma Wardani', 'MARS', 'Dokter Gigi Spesialis', 8, 5, '6918cfb0b8843_1763233712.jpg', 'drg. Miranti Kusuma Wardani', 'SA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 4, '2025-11-15 19:08:32', '2025-11-15 19:08:32'),
(7, 'drg. Audrey Anggun Unique', '', 'Dokter Gigi Spesialis', 1, 5, '6918d062a0340_1763233890.jpg', 'drg. Audrey Anggun Unique', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 5, '2025-11-15 19:11:30', '2025-11-15 19:11:30'),
(8, 'drg. Josephine Amanda Karnady  ', 'Sp.KG', 'Dokter Gigi Spesialis', 1, 5, '6918d0daca635_1763234010.jpg', 'drg. Josephine Amanda Karnady  ', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 6, '2025-11-15 19:13:30', '2025-11-15 19:13:30'),
(9, 'drg. Vannya Guna Wijaya', '', 'Dokter Gigi Spesialis', 1, 5, '6918d14b69c26_1763234123.jpg', 'drg. Vannya Guna Wijaya', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 7, '2025-11-15 19:15:23', '2025-11-15 19:15:23'),
(10, 'drg. Stanley Liman', 'Sp. KG', 'Dokter Gigi Spesialis', 1, 5, '6918d18b2a243_1763234187.jpg', 'drg. Stanley Liman', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 2, '2025-11-15 19:16:27', '2025-11-15 19:16:27'),
(11, 'drg. Agnes Angelia Siregar', '', 'Dokter Gigi Spesialis', 8, 5, '6918d1f8636f0_1763234296.jpg', 'drg. Agnes Angelia Siregar', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00\r\n', 1, 8, '2025-11-15 19:18:16', '2025-11-15 19:18:16'),
(12, 'drg.Levina Mulya', 'Sp.Perio ', 'Dokter Gigi Spesialis', 8, 6, '6918d246ccd58_1763234374.jpg', 'drg.Levina Mulya, Sp.Perio ', 'PSA, Veneer, Bleaching', '', 'Senin-Jumat: 09:00-17:00', 1, 9, '2025-11-15 19:19:34', '2025-11-15 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `day_of_week`, `start_time`, `end_time`, `is_active`, `notes`, `created_at`, `updated_at`) VALUES
(1, 6, 'Monday', '02:58:00', '04:56:00', 1, '', '2025-11-15 19:56:55', '2025-11-15 19:56:55'),
(2, 5, 'Monday', '06:52:00', '10:52:00', 1, '', '2025-11-15 21:52:56', '2025-11-15 21:52:56'),
(3, 5, 'Tuesday', '06:52:00', '10:52:00', 1, '', '2025-11-15 21:52:56', '2025-11-15 21:52:56'),
(4, 5, 'Wednesday', '06:52:00', '10:52:00', 1, '', '2025-11-15 21:52:56', '2025-11-15 21:52:56'),
(5, 5, 'Friday', '06:52:00', '10:52:00', 1, '', '2025-11-15 21:52:56', '2025-11-15 21:52:56'),
(6, 5, 'Sunday', '06:52:00', '10:52:00', 1, '', '2025-11-15 21:52:56', '2025-11-15 21:52:56'),
(7, 10, 'Monday', '07:53:00', '09:53:00', 1, '', '2025-11-15 21:53:09', '2025-11-15 21:53:09'),
(8, 10, 'Thursday', '07:53:00', '09:53:00', 1, '', '2025-11-15 21:53:09', '2025-11-15 21:53:09'),
(9, 10, 'Saturday', '07:53:00', '09:53:00', 1, '', '2025-11-15 21:53:09', '2025-11-15 21:53:09'),
(10, 10, 'Sunday', '07:53:00', '09:53:00', 1, '', '2025-11-15 21:53:09', '2025-11-15 21:53:09'),
(11, 10, 'Monday', '04:57:00', '04:58:00', 1, '', '2025-11-15 21:53:23', '2025-11-15 21:53:23'),
(12, 10, 'Wednesday', '04:57:00', '04:58:00', 1, '', '2025-11-15 21:53:23', '2025-11-15 21:53:23'),
(13, 10, 'Thursday', '04:57:00', '04:58:00', 1, '', '2025-11-15 21:53:23', '2025-11-15 21:53:23'),
(14, 10, 'Friday', '04:57:00', '04:58:00', 1, '', '2025-11-15 21:53:23', '2025-11-15 21:53:23'),
(15, 10, 'Sunday', '04:57:00', '04:58:00', 1, '', '2025-11-15 21:53:23', '2025-11-15 21:53:23'),
(16, 4, 'Monday', '04:56:00', '08:56:00', 1, '', '2025-11-15 21:53:56', '2025-11-15 21:53:56'),
(17, 4, 'Thursday', '04:56:00', '08:56:00', 1, '', '2025-11-15 21:53:56', '2025-11-15 21:53:56'),
(18, 4, 'Sunday', '04:56:00', '08:56:00', 1, '', '2025-11-15 21:53:56', '2025-11-15 21:53:56'),
(19, 7, 'Monday', '04:59:00', '08:54:00', 1, '', '2025-11-15 21:54:11', '2025-11-15 21:54:11'),
(20, 7, 'Friday', '04:59:00', '08:54:00', 1, '', '2025-11-15 21:54:11', '2025-11-15 21:54:11'),
(21, 7, 'Sunday', '04:59:00', '08:54:00', 1, '', '2025-11-15 21:54:11', '2025-11-15 21:54:11'),
(22, 8, 'Tuesday', '04:57:00', '00:54:00', 1, '', '2025-11-15 21:54:28', '2025-11-15 21:54:28'),
(23, 8, 'Thursday', '04:57:00', '00:54:00', 1, '', '2025-11-15 21:54:28', '2025-11-15 21:54:28'),
(24, 8, 'Friday', '04:57:00', '00:54:00', 1, '', '2025-11-15 21:54:28', '2025-11-15 21:54:28'),
(25, 8, 'Saturday', '04:57:00', '00:54:00', 1, '', '2025-11-15 21:54:28', '2025-11-15 21:54:28'),
(26, 8, 'Sunday', '04:57:00', '00:54:00', 1, '', '2025-11-15 21:54:28', '2025-11-15 21:54:28'),
(27, 9, 'Tuesday', '09:54:00', '00:54:00', 1, '', '2025-11-15 21:54:46', '2025-11-15 21:54:46'),
(28, 9, 'Saturday', '09:54:00', '00:54:00', 1, '', '2025-11-15 21:54:46', '2025-11-15 21:54:46'),
(29, 11, 'Wednesday', '08:54:00', '23:54:00', 1, '', '2025-11-15 21:54:59', '2025-11-15 21:54:59'),
(30, 11, 'Friday', '08:54:00', '23:54:00', 1, '', '2025-11-15 21:54:59', '2025-11-15 21:54:59'),
(31, 11, 'Sunday', '08:54:00', '23:54:00', 1, '', '2025-11-15 21:54:59', '2025-11-15 21:54:59'),
(32, 12, 'Wednesday', '06:55:00', '00:55:00', 1, '', '2025-11-15 21:55:13', '2025-11-15 21:55:13'),
(33, 12, 'Saturday', '06:55:00', '00:55:00', 1, '', '2025-11-15 21:55:13', '2025-11-15 21:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialties`
--

CREATE TABLE `doctor_specialties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specialties`
--

INSERT INTO `doctor_specialties` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dokter Gigi Umum', 'Dokter gigi umum untuk perawatan dasar', 1, '2025-11-15 18:23:42', '2025-11-15 18:23:42'),
(8, 'Dokter Gigi Anak', NULL, 1, '2025-11-15 18:51:16', '2025-11-15 18:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title`, `description`, `image`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Perawatan Modern', 'Ruang perawatan dengan peralatan terkini', 'fasilitas1.jpg', 1, 1, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(2, 'Ruang Tunggu Nyaman', 'Area tunggu yang nyaman dan bersih', 'fasilitas2.jpg', 1, 2, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(3, 'Sterilisasi Lengkap', 'Alat sterilisasi untuk keamanan pasien', 'fasilitas3.jpg', 1, 3, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(4, 'Peralatan Canggih', 'Teknologi dental terkini', 'fasilitas4.jpg', 1, 4, '2025-10-27 01:20:03', '2025-10-27 01:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 1,
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `category`, `excerpt`, `content`, `featured_image`, `author`, `publish_date`, `is_published`, `views`, `created_at`, `updated_at`) VALUES
(2, 'Cara Merawat Gigi Anak dengan Benar', 'cara-merawat-gigi-anak', 'TIPS & TRICK', 'Tips merawat gigi anak sejak dini', '<p data-start=\"202\" data-end=\"535\">Merawat kesehatan gigi anak sejak dini sangat penting untuk mendukung tumbuh kembang mereka. Gigi yang sehat bukan hanya membantu anak mengunyah makanan dengan baik, tetapi juga berpengaruh pada kemampuan bicara, kepercayaan diri, serta kesehatan tubuh secara keseluruhan. Berikut panduan lengkap cara merawat gigi anak dengan benar.</p>\r\n<hr data-start=\"537\" data-end=\"540\">\r\n<h2 data-start=\"542\" data-end=\"583\"><strong data-start=\"545\" data-end=\"583\">1. Mulai Sejak Gigi Pertama Tumbuh</strong></h2>\r\n<p data-start=\"584\" data-end=\"683\">Perawatan gigi anak sebaiknya dimulai sejak gigi susu pertama muncul, biasanya pada usia 6 bulan.</p>\r\n<ul data-start=\"684\" data-end=\"826\">\r\n<li data-start=\"684\" data-end=\"760\">\r\n<p data-start=\"686\" data-end=\"760\">Bersihkan gigi menggunakan kain kasa lembut atau sikat gigi khusus bayi.</p>\r\n</li>\r\n<li data-start=\"761\" data-end=\"826\">\r\n<p data-start=\"763\" data-end=\"826\">Gunakan air matang tanpa pasta gigi pada usia di bawah 1 tahun.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"828\" data-end=\"831\">\r\n<h2 data-start=\"833\" data-end=\"873\"><strong data-start=\"836\" data-end=\"873\">2. Gunakan Pasta Gigi Berfluoride</strong></h2>\r\n<p data-start=\"874\" data-end=\"944\">Fluoride membantu mencegah gigi berlubang. Cara penggunaan yang tepat:</p>\r\n<ul data-start=\"945\" data-end=\"1139\">\r\n<li data-start=\"945\" data-end=\"1015\">\r\n<p data-start=\"947\" data-end=\"1015\">Anak usia &lt; 3 tahun: gunakan pasta gigi sebesar <strong data-start=\"995\" data-end=\"1012\">sebutir beras</strong>.</p>\r\n</li>\r\n<li data-start=\"1016\" data-end=\"1086\">\r\n<p data-start=\"1018\" data-end=\"1086\">Anak usia 3–6 tahun: gunakan sebesar <strong data-start=\"1055\" data-end=\"1083\">kacang polong (pea-size)</strong>.</p>\r\n</li>\r\n<li data-start=\"1087\" data-end=\"1139\">\r\n<p data-start=\"1089\" data-end=\"1139\">Pastikan anak tidak menelan pasta gigi berlebihan.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1141\" data-end=\"1144\">\r\n<h2 data-start=\"1146\" data-end=\"1191\"><strong data-start=\"1149\" data-end=\"1191\">3. Ajarkan Teknik Sikat Gigi yang Baik</strong></h2>\r\n<p data-start=\"1192\" data-end=\"1305\">Biasakan anak menyikat gigi <strong data-start=\"1220\" data-end=\"1239\">dua kali sehari</strong>, pagi dan malam sebelum tidur.<br>\r\nTeknik menyikat yang dianjurkan:</p>\r\n<ul data-start=\"1306\" data-end=\"1464\">\r\n<li data-start=\"1306\" data-end=\"1344\">\r\n<p data-start=\"1308\" data-end=\"1344\">Gerakan melingkar secara perlahan.</p>\r\n</li>\r\n<li data-start=\"1345\" data-end=\"1400\">\r\n<p data-start=\"1347\" data-end=\"1400\">Sikat bagian depan, belakang, dan permukaan kunyah.</p>\r\n</li>\r\n<li data-start=\"1401\" data-end=\"1464\">\r\n<p data-start=\"1403\" data-end=\"1464\">Sikat lidah untuk menghilangkan bakteri penyebab bau mulut.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1466\" data-end=\"1565\">Orang tua tetap perlu membantu hingga anak berusia ±8 tahun untuk memastikan kebersihannya optimal.</p>\r\n<hr data-start=\"1567\" data-end=\"1570\">\r\n<h2 data-start=\"1572\" data-end=\"1614\"><strong data-start=\"1575\" data-end=\"1614\">4. Batasi Makanan dan Minuman Manis</strong></h2>\r\n<p data-start=\"1615\" data-end=\"1683\">Gula adalah penyebab utama gigi berlubang pada anak.<br data-start=\"1667\" data-end=\"1670\">\r\nTips penting:</p>\r\n<ul data-start=\"1684\" data-end=\"1875\">\r\n<li data-start=\"1684\" data-end=\"1744\">\r\n<p data-start=\"1686\" data-end=\"1744\">Batasi konsumsi permen, cokelat, kue, dan minuman manis.</p>\r\n</li>\r\n<li data-start=\"1745\" data-end=\"1832\">\r\n<p data-start=\"1747\" data-end=\"1832\">Hindari kebiasaan <strong data-start=\"1765\" data-end=\"1788\">ngedot sambil tidur</strong>, terutama dengan susu atau minuman manis.</p>\r\n</li>\r\n<li data-start=\"1833\" data-end=\"1875\">\r\n<p data-start=\"1835\" data-end=\"1875\">Berikan air putih sebagai minuman utama.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1877\" data-end=\"1880\">\r\n<h2 data-start=\"1882\" data-end=\"1931\"><strong data-start=\"1885\" data-end=\"1931\">5. Pilih Camilan Sehat dan Aman untuk Gigi</strong></h2>\r\n<p data-start=\"1932\" data-end=\"1992\">Beberapa makanan baik untuk menjaga kesehatan gigi, seperti:</p>\r\n<ul data-start=\"1993\" data-end=\"2133\">\r\n<li data-start=\"1993\" data-end=\"2034\">\r\n<p data-start=\"1995\" data-end=\"2034\">Buah dan sayur renyah (apel, wortel).</p>\r\n</li>\r\n<li data-start=\"2035\" data-end=\"2076\">\r\n<p data-start=\"2037\" data-end=\"2076\">Keju dan yoghurt tanpa gula tambahan.</p>\r\n</li>\r\n<li data-start=\"2077\" data-end=\"2133\">\r\n<p data-start=\"2079\" data-end=\"2133\">Kacang-kacangan (untuk anak usia yang aman mengunyah).</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2135\" data-end=\"2223\">Camilan sehat membantu merangsang produksi air liur yang membersihkan gigi secara alami.</p>\r\n<hr data-start=\"2225\" data-end=\"2228\">\r\n<h2 data-start=\"2230\" data-end=\"2268\"><strong data-start=\"2233\" data-end=\"2268\">6. Rutin Periksa ke Dokter Gigi</strong></h2>\r\n<p data-start=\"2269\" data-end=\"2404\">Bawa anak ke dokter gigi setiap <strong data-start=\"2301\" data-end=\"2319\">6 bulan sekali</strong> untuk pemeriksaan rutin, bahkan bila tidak ada keluhan.<br data-start=\"2375\" data-end=\"2378\">\r\nPemeriksaan dini membantu:</p>\r\n<ul data-start=\"2405\" data-end=\"2580\">\r\n<li data-start=\"2405\" data-end=\"2433\">\r\n<p data-start=\"2407\" data-end=\"2433\">Mencegah gigi berlubang.</p>\r\n</li>\r\n<li data-start=\"2434\" data-end=\"2489\">\r\n<p data-start=\"2436\" data-end=\"2489\">Memastikan pertumbuhan gigi dan rahang yang normal.</p>\r\n</li>\r\n<li data-start=\"2490\" data-end=\"2580\">\r\n<p data-start=\"2492\" data-end=\"2580\">Membantu anak terbiasa dengan suasana klinik gigi sehingga tidak takut di kemudian hari.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"2582\" data-end=\"2585\">\r\n<h2 data-start=\"2587\" data-end=\"2649\"><strong data-start=\"2590\" data-end=\"2649\">7. Jadikan Menyikat Gigi sebagai Aktivitas Menyenangkan</strong></h2>\r\n<p data-start=\"2650\" data-end=\"2716\">Anak biasanya lebih semangat bila kegiatan dirancang menyenangkan:</p>\r\n<ul data-start=\"2717\" data-end=\"2865\">\r\n<li data-start=\"2717\" data-end=\"2767\">\r\n<p data-start=\"2719\" data-end=\"2767\">Gunakan sikat gigi bergambar karakter favorit.</p>\r\n</li>\r\n<li data-start=\"2768\" data-end=\"2812\">\r\n<p data-start=\"2770\" data-end=\"2812\">Putar lagu selama 2 menit sebagai timer.</p>\r\n</li>\r\n<li data-start=\"2813\" data-end=\"2865\">\r\n<p data-start=\"2815\" data-end=\"2865\">Berikan pujian setelah anak selesai menyikat gigi.</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"2867\" data-end=\"2870\">\r\n<h2 data-start=\"2872\" data-end=\"2903\"><strong data-start=\"2875\" data-end=\"2903\">8. Beri Contoh yang Baik</strong></h2>\r\n<p data-start=\"2904\" data-end=\"3031\">Anak belajar dari kebiasaan orang tua. Jika orang tua rajin merawat kesehatan gigi, anak akan meniru dan lebih mudah mengikuti.</p>\r\n<hr data-start=\"3033\" data-end=\"3036\">\r\n<h1 data-start=\"3038\" data-end=\"3054\"><strong data-start=\"3040\" data-end=\"3054\">Kesimpulan</strong></h1>\r\n<p data-start=\"3055\" data-end=\"3354\">Merawat gigi anak tidak sulit jika dilakukan sejak dini dan dengan cara yang benar. Dengan menyikat gigi secara teratur, mengontrol konsumsi gula, dan rutin memeriksakan gigi ke dokter, kesehatan gigi anak dapat terjaga hingga dewasa. Kesehatan gigi adalah investasi penting untuk masa depan mereka.</p>', '6918ddb5d7796_1763237301.jpg', '', '2025-05-14', 1, 0, '2025-10-27 01:20:03', '2025-11-15 20:08:21'),
(3, 'Little Seuri – Perawatan Gigi Ramah Anak', 'little-seuri-perawatan-ramah-anak', 'LITTLE SEURI', 'Program khusus perawatan gigi untuk anak-anak', '<p data-start=\"184\" data-end=\"527\">Bagi banyak anak, pergi ke dokter gigi bisa menjadi pengalaman yang menegangkan. Namun, dengan pendekatan yang tepat, perawatan gigi dapat menjadi kegiatan yang menyenangkan dan bebas rasa takut. Konsep <strong data-start=\"387\" data-end=\"416\">perawatan gigi ramah anak</strong> hadir untuk menciptakan suasana yang nyaman, aman, dan menyenangkan selama anak menjalani perawatan di klinik.</p>\r\n<hr data-start=\"529\" data-end=\"532\">\r\n<h2 data-start=\"534\" data-end=\"575\"><strong data-start=\"537\" data-end=\"575\">Apa Itu Perawatan Gigi Ramah Anak?</strong></h2>\r\n<p data-start=\"576\" data-end=\"866\">Perawatan gigi ramah anak adalah pendekatan khusus yang dirancang untuk membuat anak merasa tenang dan percaya diri saat berada di klinik gigi. Dokter dan staf menggunakan metode komunikasi yang lembut, lingkungan yang menarik, serta teknik perawatan yang disesuaikan dengan kebutuhan anak.</p>\r\n<hr data-start=\"868\" data-end=\"871\">\r\n<h2 data-start=\"873\" data-end=\"929\"><strong data-start=\"876\" data-end=\"929\">1. Lingkungan Klinik yang Nyaman dan Menyenangkan</strong></h2>\r\n<p data-start=\"930\" data-end=\"971\">Klinik gigi ramah anak biasanya memiliki:</p>\r\n<ul data-start=\"972\" data-end=\"1197\">\r\n<li data-start=\"972\" data-end=\"1030\">\r\n<p data-start=\"974\" data-end=\"1030\">Ruang tunggu berwarna cerah dan dekorasi bertema anak.</p>\r\n</li>\r\n<li data-start=\"1031\" data-end=\"1103\">\r\n<p data-start=\"1033\" data-end=\"1103\">Mainan, buku cerita, atau layar animasi untuk mengalihkan perhatian.</p>\r\n</li>\r\n<li data-start=\"1104\" data-end=\"1197\">\r\n<p data-start=\"1106\" data-end=\"1197\">Suasana yang tidak menyeramkan, sehingga anak merasa seperti sedang bermain, bukan berobat.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1199\" data-end=\"1282\">Lingkungan yang tepat dapat mengurangi kecemasan dan membuat anak lebih kooperatif.</p>\r\n<hr data-start=\"1284\" data-end=\"1287\">\r\n<h2 data-start=\"1289\" data-end=\"1345\"><strong data-start=\"1292\" data-end=\"1345\">2. Dokter Gigi yang Terlatih dalam Perawatan Anak</strong></h2>\r\n<p data-start=\"1346\" data-end=\"1436\">Dokter gigi anak (pedodontist) atau dokter gigi dengan pengalaman menangani anak memahami:</p>\r\n<ul data-start=\"1437\" data-end=\"1597\">\r\n<li data-start=\"1437\" data-end=\"1487\">\r\n<p data-start=\"1439\" data-end=\"1487\">Cara berkomunikasi yang lembut dan meyakinkan.</p>\r\n</li>\r\n<li data-start=\"1488\" data-end=\"1531\">\r\n<p data-start=\"1490\" data-end=\"1531\">Teknik perawatan yang minim rasa sakit.</p>\r\n</li>\r\n<li data-start=\"1532\" data-end=\"1597\">\r\n<p data-start=\"1534\" data-end=\"1597\">Metode pendekatan psikologis untuk anak yang pemalu atau takut.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1599\" data-end=\"1753\">Dokter biasanya memperlihatkan alat, menjelaskan fungsinya dengan bahasa sederhana, bahkan mengizinkan anak menyentuh alat untuk menghilangkan rasa takut.</p>\r\n<hr data-start=\"1755\" data-end=\"1758\">\r\n<h2 data-start=\"1760\" data-end=\"1795\"><strong data-start=\"1763\" data-end=\"1795\">3. Pendekatan “Tell–Show–Do”</strong></h2>\r\n<p data-start=\"1796\" data-end=\"1850\">Metode ini terbukti efektif untuk membuat anak nyaman:</p>\r\n<ul data-start=\"1851\" data-end=\"2142\">\r\n<li data-start=\"1851\" data-end=\"1961\">\r\n<p data-start=\"1853\" data-end=\"1961\"><strong data-start=\"1853\" data-end=\"1874\">Tell (beri tahu):</strong> Dokter menjelaskan tindakan yang akan dilakukan dengan bahasa yang mudah dimengerti.</p>\r\n</li>\r\n<li data-start=\"1962\" data-end=\"2070\">\r\n<p data-start=\"1964\" data-end=\"2070\"><strong data-start=\"1964\" data-end=\"1987\">Show (perlihatkan):</strong> Anak diperlihatkan cara alat bekerja, misalnya suara mesin atau air yang keluar.</p>\r\n</li>\r\n<li data-start=\"2071\" data-end=\"2142\">\r\n<p data-start=\"2073\" data-end=\"2142\"><strong data-start=\"2073\" data-end=\"2090\">Do (lakukan):</strong> Tindakan dilakukan dengan tenang setelah anak siap.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2144\" data-end=\"2224\">Pendekatan ini membantu anak merasa dilibatkan dan tidak kaget selama perawatan.</p>\r\n<hr data-start=\"2226\" data-end=\"2229\">\r\n<h2 data-start=\"2231\" data-end=\"2272\"><strong data-start=\"2234\" data-end=\"2272\">4. Perawatan yang Minim Rasa Sakit</strong></h2>\r\n<p data-start=\"2273\" data-end=\"2346\">Teknik modern memungkinkan perawatan gigi dilakukan dengan sangat nyaman:</p>\r\n<ul data-start=\"2347\" data-end=\"2533\">\r\n<li data-start=\"2347\" data-end=\"2398\">\r\n<p data-start=\"2349\" data-end=\"2398\">Anestesi lokal yang lembut dan aman untuk anak.</p>\r\n</li>\r\n<li data-start=\"2399\" data-end=\"2451\">\r\n<p data-start=\"2401\" data-end=\"2451\">Peralatan khusus anak dengan ukuran lebih kecil.</p>\r\n</li>\r\n<li data-start=\"2452\" data-end=\"2533\">\r\n<p data-start=\"2454\" data-end=\"2533\">Teknologi terbaru seperti laser atau air abrasion (pembersihan gigi tanpa bor).</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2535\" data-end=\"2613\">Semakin minim rasa sakit, semakin besar kepercayaan anak untuk datang kembali.</p>\r\n<hr data-start=\"2615\" data-end=\"2618\">\r\n<h2 data-start=\"2620\" data-end=\"2663\"><strong data-start=\"2623\" data-end=\"2663\">5. Melibatkan Orang Tua dalam Proses</strong></h2>\r\n<p data-start=\"2664\" data-end=\"2760\">Klinik ramah anak memahami bahwa kehadiran orang tua memberikan rasa aman.<br data-start=\"2738\" data-end=\"2741\">\r\nBiasanya orang tua:</p>\r\n<ul data-start=\"2761\" data-end=\"2922\">\r\n<li data-start=\"2761\" data-end=\"2811\">\r\n<p data-start=\"2763\" data-end=\"2811\">Diizinkan mendampingi anak di ruang perawatan.</p>\r\n</li>\r\n<li data-start=\"2812\" data-end=\"2868\">\r\n<p data-start=\"2814\" data-end=\"2868\">Diberi penjelasan lengkap tentang kondisi gigi anak.</p>\r\n</li>\r\n<li data-start=\"2869\" data-end=\"2922\">\r\n<p data-start=\"2871\" data-end=\"2922\">Mendapat tips untuk melanjutkan perawatan di rumah.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2924\" data-end=\"2991\">Keterlibatan ini penting untuk membangun kepercayaan dan kerjasama.</p>\r\n<hr data-start=\"2993\" data-end=\"2996\">\r\n<h2 data-start=\"2998\" data-end=\"3036\"><strong data-start=\"3001\" data-end=\"3036\">6. Memberikan Reward untuk Anak</strong></h2>\r\n<p data-start=\"3037\" data-end=\"3088\">Setelah selesai perawatan, anak biasanya diberikan:</p>\r\n<ul data-start=\"3089\" data-end=\"3147\">\r\n<li data-start=\"3089\" data-end=\"3104\">\r\n<p data-start=\"3091\" data-end=\"3104\">Stiker lucu</p>\r\n</li>\r\n<li data-start=\"3105\" data-end=\"3130\">\r\n<p data-start=\"3107\" data-end=\"3130\">Sertifikat keberanian</p>\r\n</li>\r\n<li data-start=\"3131\" data-end=\"3147\">\r\n<p data-start=\"3133\" data-end=\"3147\">Hadiah kecil</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"3149\" data-end=\"3235\">Reward kecil seperti ini membuat anak merasa bangga dan ingin kembali dengan semangat.</p>\r\n<hr data-start=\"3237\" data-end=\"3240\">\r\n<h2 data-start=\"3242\" data-end=\"3283\"><strong data-start=\"3245\" data-end=\"3283\">7. Edukasi Perawatan Gigi di Rumah</strong></h2>\r\n<p data-start=\"3284\" data-end=\"3376\">Perawatan ramah anak tidak berhenti di klinik saja. Dokter juga memberikan edukasi mengenai:</p>\r\n<ul data-start=\"3377\" data-end=\"3497\">\r\n<li data-start=\"3377\" data-end=\"3412\">\r\n<p data-start=\"3379\" data-end=\"3412\">Teknik menyikat gigi yang benar</p>\r\n</li>\r\n<li data-start=\"3413\" data-end=\"3453\">\r\n<p data-start=\"3415\" data-end=\"3453\">Kebiasaan makan yang baik untuk gigi</p>\r\n</li>\r\n<li data-start=\"3454\" data-end=\"3497\">\r\n<p data-start=\"3456\" data-end=\"3497\">Cara mencegah gigi berlubang sejak dini</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"3499\" data-end=\"3584\">Dengan edukasi yang mudah dipahami, anak bisa belajar menjaga kesehatan gigi sendiri.</p>\r\n<hr data-start=\"3586\" data-end=\"3589\">\r\n<h1 data-start=\"3591\" data-end=\"3607\"><strong data-start=\"3593\" data-end=\"3607\">Kesimpulan</strong></h1>\r\n<p data-start=\"3608\" data-end=\"3960\">Perawatan gigi ramah anak merupakan kombinasi dari lingkungan yang menyenangkan, pendekatan komunikasi yang tepat, serta teknik perawatan modern yang membuat anak merasa aman dan nyaman. Dengan pengalaman positif sejak dini, anak akan tumbuh sebagai individu yang tidak takut ke dokter gigi dan memiliki kebiasaan menjaga kesehatan gigi secara mandiri.</p>', '6918de2563c59_1763237413.jpg', '', '2025-04-02', 1, 0, '2025-10-27 01:20:03', '2025-11-15 20:10:13'),
(4, 'Peran Orthodontist dalam Senyum Sehat', 'peran-orthodontist', 'ORTHODONTIST', 'Bagaimana orthodontist membantu senyum Anda', '<p data-start=\"226\" data-end=\"576\">Memiliki senyum yang indah bukan hanya soal estetika, tetapi juga berkaitan erat dengan kesehatan gigi, fungsi pengunyahan, dan kenyamanan sehari-hari. Salah satu profesional yang berperan besar dalam menciptakan senyum sehat adalah <strong data-start=\"459\" data-end=\"475\">orthodontist</strong>. Mereka adalah dokter gigi yang memiliki pelatihan khusus dalam memperbaiki susunan gigi dan rahang.</p>\r\n<p data-start=\"578\" data-end=\"707\">Artikel ini membahas mengapa peran orthodontist begitu penting dan kapan seseorang perlu berkonsultasi dengan spesialis tersebut.</p>\r\n<hr data-start=\"709\" data-end=\"712\">\r\n<h2 data-start=\"714\" data-end=\"742\"><strong data-start=\"717\" data-end=\"742\">Apa Itu Orthodontist?</strong></h2>\r\n<p data-start=\"744\" data-end=\"976\">Orthodontist adalah dokter gigi spesialis yang fokus pada diagnosis, pencegahan, dan perawatan masalah posisi gigi dan rahang. Mereka menjalani pendidikan lanjutan 2–3 tahun setelah dokter gigi umum untuk mendalami bidang ortodonti.</p>\r\n<p data-start=\"978\" data-end=\"1017\">Masalah yang sering ditangani termasuk:</p>\r\n<ul data-start=\"1018\" data-end=\"1193\">\r\n<li data-start=\"1018\" data-end=\"1057\">\r\n<p data-start=\"1020\" data-end=\"1057\">Gigi berjejal atau terlalu renggang</p>\r\n</li>\r\n<li data-start=\"1058\" data-end=\"1113\">\r\n<p data-start=\"1060\" data-end=\"1113\">Gigitan tidak rata (overbite, underbite, crossbite)</p>\r\n</li>\r\n<li data-start=\"1114\" data-end=\"1138\">\r\n<p data-start=\"1116\" data-end=\"1138\">Rahang tidak sejajar</p>\r\n</li>\r\n<li data-start=\"1139\" data-end=\"1193\">\r\n<p data-start=\"1141\" data-end=\"1193\">Kebiasaan buruk pada anak, seperti mengisap jempol</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"1195\" data-end=\"1198\">\r\n<h2 data-start=\"1200\" data-end=\"1245\"><strong data-start=\"1203\" data-end=\"1245\">1. Menyusun Gigi agar Rapi dan Sejajar</strong></h2>\r\n<p data-start=\"1247\" data-end=\"1339\">Salah satu peran utama orthodontist adalah membantu merapikan gigi menggunakan alat seperti:</p>\r\n<ul data-start=\"1340\" data-end=\"1431\">\r\n<li data-start=\"1340\" data-end=\"1366\">\r\n<p data-start=\"1342\" data-end=\"1366\"><strong data-start=\"1342\" data-end=\"1364\">Behel konvensional</strong></p>\r\n</li>\r\n<li data-start=\"1367\" data-end=\"1388\">\r\n<p data-start=\"1369\" data-end=\"1388\"><strong data-start=\"1369\" data-end=\"1386\">Behel ceramic</strong></p>\r\n</li>\r\n<li data-start=\"1389\" data-end=\"1431\">\r\n<p data-start=\"1391\" data-end=\"1431\"><strong data-start=\"1391\" data-end=\"1429\">Clear aligner / aligner transparan</strong></p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1433\" data-end=\"1593\">Gigi yang tersusun rapi tidak hanya membuat senyum lebih indah, tetapi juga lebih mudah dibersihkan sehingga mengurangi risiko gigi berlubang dan penyakit gusi.</p>\r\n<hr data-start=\"1595\" data-end=\"1598\">\r\n<h2 data-start=\"1600\" data-end=\"1636\"><strong data-start=\"1603\" data-end=\"1636\">2. Memperbaiki Fungsi Gigitan</strong></h2>\r\n<p data-start=\"1638\" data-end=\"1681\">Gigitan yang tidak ideal dapat menyebabkan:</p>\r\n<ul data-start=\"1682\" data-end=\"1785\">\r\n<li data-start=\"1682\" data-end=\"1701\">\r\n<p data-start=\"1684\" data-end=\"1701\">Susah mengunyah</p>\r\n</li>\r\n<li data-start=\"1702\" data-end=\"1718\">\r\n<p data-start=\"1704\" data-end=\"1718\">Nyeri rahang</p>\r\n</li>\r\n<li data-start=\"1719\" data-end=\"1737\">\r\n<p data-start=\"1721\" data-end=\"1737\">Gigi cepat aus</p>\r\n</li>\r\n<li data-start=\"1738\" data-end=\"1785\">\r\n<p data-start=\"1740\" data-end=\"1785\">Sakit kepala atau TMJ (gangguan sendi rahang)</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1787\" data-end=\"1897\">Orthodontist memastikan gigitan kembali seimbang sehingga fungsi mulut menjadi optimal sekaligus lebih nyaman.</p>\r\n<hr data-start=\"1899\" data-end=\"1902\">\r\n<h2 data-start=\"1904\" data-end=\"1943\"><strong data-start=\"1907\" data-end=\"1943\">3. Menunjang Tumbuh Kembang Anak</strong></h2>\r\n<p data-start=\"1945\" data-end=\"1997\">Pada anak-anak, orthodontist berperan penting dalam:</p>\r\n<ul data-start=\"1998\" data-end=\"2146\">\r\n<li data-start=\"1998\" data-end=\"2032\">\r\n<p data-start=\"2000\" data-end=\"2032\">Mengarahkan pertumbuhan rahang</p>\r\n</li>\r\n<li data-start=\"2033\" data-end=\"2107\">\r\n<p data-start=\"2035\" data-end=\"2107\">Mengoreksi kebiasaan buruk seperti thumb sucking atau tongue thrusting</p>\r\n</li>\r\n<li data-start=\"2108\" data-end=\"2146\">\r\n<p data-start=\"2110\" data-end=\"2146\">Mencegah masalah besar di masa depan</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2148\" data-end=\"2232\">Perawatan sejak dini dapat mengurangi kebutuhan perawatan kompleks saat anak dewasa.</p>\r\n<hr data-start=\"2234\" data-end=\"2237\">\r\n<h2 data-start=\"2239\" data-end=\"2278\"><strong data-start=\"2242\" data-end=\"2278\">4. Meningkatkan Kepercayaan Diri</strong></h2>\r\n<p data-start=\"2280\" data-end=\"2341\">Senyuman yang rapi dan harmonis dapat berdampak positif pada:</p>\r\n<ul data-start=\"2342\" data-end=\"2418\">\r\n<li data-start=\"2342\" data-end=\"2363\">\r\n<p data-start=\"2344\" data-end=\"2363\">Rasa percaya diri</p>\r\n</li>\r\n<li data-start=\"2364\" data-end=\"2384\">\r\n<p data-start=\"2366\" data-end=\"2384\">Interaksi sosial</p>\r\n</li>\r\n<li data-start=\"2385\" data-end=\"2418\">\r\n<p data-start=\"2387\" data-end=\"2418\">Penampilan dan ekspresi wajah</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2420\" data-end=\"2510\">Banyak pasien merasa lebih bahagia dan percaya diri setelah menjalani perawatan ortodonti.</p>\r\n<hr data-start=\"2512\" data-end=\"2515\">\r\n<h2 data-start=\"2517\" data-end=\"2565\"><strong data-start=\"2520\" data-end=\"2565\">5. Membantu Kesehatan Gigi Jangka Panjang</strong></h2>\r\n<p data-start=\"2567\" data-end=\"2641\">Perawatan ortodonti bukan hanya soal estetika. Gigi yang sejajar membantu:</p>\r\n<ul data-start=\"2642\" data-end=\"2790\">\r\n<li data-start=\"2642\" data-end=\"2685\">\r\n<p data-start=\"2644\" data-end=\"2685\">Mengurangi risiko sisa makanan terselip</p>\r\n</li>\r\n<li data-start=\"2686\" data-end=\"2705\">\r\n<p data-start=\"2688\" data-end=\"2705\">Mencegah karies</p>\r\n</li>\r\n<li data-start=\"2706\" data-end=\"2739\">\r\n<p data-start=\"2708\" data-end=\"2739\">Mencegah penyakit periodontal</p>\r\n</li>\r\n<li data-start=\"2740\" data-end=\"2790\">\r\n<p data-start=\"2742\" data-end=\"2790\">Mengurangi tekanan berlebih pada gigi tertentu</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2792\" data-end=\"2877\">Dengan demikian, hasilnya adalah kesehatan gigi yang lebih baik untuk jangka panjang.</p>\r\n<hr data-start=\"2879\" data-end=\"2882\">\r\n<h2 data-start=\"2884\" data-end=\"2919\"><strong data-start=\"2887\" data-end=\"2919\">Kapan Harus ke Orthodontist?</strong></h2>\r\n<p data-start=\"2921\" data-end=\"2983\">Beberapa tanda Anda atau anak Anda perlu konsultasi ortodonti:</p>\r\n<ul data-start=\"2984\" data-end=\"3251\">\r\n<li data-start=\"2984\" data-end=\"3024\">\r\n<p data-start=\"2986\" data-end=\"3024\">Gigi terlihat berjejal atau menumpuk</p>\r\n</li>\r\n<li data-start=\"3025\" data-end=\"3048\">\r\n<p data-start=\"3027\" data-end=\"3048\">Gigi depan menonjol</p>\r\n</li>\r\n<li data-start=\"3049\" data-end=\"3091\">\r\n<p data-start=\"3051\" data-end=\"3091\">Rahang bawah terlihat maju (underbite)</p>\r\n</li>\r\n<li data-start=\"3092\" data-end=\"3159\">\r\n<p data-start=\"3094\" data-end=\"3159\">Saat menggigit, gigi atas dan bawah tidak menyentuh dengan baik</p>\r\n</li>\r\n<li data-start=\"3160\" data-end=\"3211\">\r\n<p data-start=\"3162\" data-end=\"3211\">Anak masih mengisap jempol di atas usia 4 tahun</p>\r\n</li>\r\n<li data-start=\"3212\" data-end=\"3251\">\r\n<p data-start=\"3214\" data-end=\"3251\">Ada kesulitan bicara atau mengunyah</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"3253\" data-end=\"3356\">American Association of Orthodontists merekomendasikan anak <strong data-start=\"3313\" data-end=\"3355\">periksa pertama kali pada usia 7 tahun</strong>.</p>\r\n<hr data-start=\"3358\" data-end=\"3361\">\r\n<h2 data-start=\"3363\" data-end=\"3380\"><strong data-start=\"3366\" data-end=\"3380\">Kesimpulan</strong></h2>\r\n<p data-start=\"3382\" data-end=\"3665\">Orthodontist memegang peran penting dalam menciptakan senyum yang sehat, indah, dan berfungsi dengan baik. Dengan perawatan profesional, baik anak maupun dewasa dapat mendapatkan susunan gigi yang rapi, gigitan yang nyaman, serta kesehatan mulut yang lebih baik dalam jangka panjang.</p>\r\n<p data-start=\"3667\" data-end=\"3795\">Jika Anda ingin memiliki senyum yang harmonis dan sehat, konsultasi dengan orthodontist adalah langkah terbaik untuk memulainya.</p>', '6918de760ce8c_1763237494.jpg', '', '2025-03-10', 1, 0, '2025-10-27 01:20:03', '2025-11-15 20:11:34'),
(5, 'Tips Pilih Sikat Gigi yang Tepat', 'tips-pilih-sikat-gigi', 'TIPS & TRICK', 'Panduan memilih sikat gigi yang sesuai kebutuhan', '<p data-start=\"200\" data-end=\"594\">Memilih sikat gigi yang tepat merupakan langkah sederhana namun sangat penting untuk menjaga kesehatan gigi dan gusi. Sikat gigi yang baik membantu membersihkan plak dengan efektif, mencegah gigi berlubang, serta menjaga kebersihan mulut secara keseluruhan. Dengan berbagai bentuk, ukuran, dan jenis bulu sikat di pasaran, berikut panduan memilih sikat gigi yang sesuai untuk Anda dan keluarga.</p>\r\n<hr data-start=\"596\" data-end=\"599\">\r\n<h2 data-start=\"601\" data-end=\"655\"><strong data-start=\"604\" data-end=\"655\">1. Pilih Bulu Sikat yang Lembut (Soft Bristles)</strong></h2>\r\n<p data-start=\"657\" data-end=\"822\">Banyak orang mengira bulu sikat yang keras akan membersihkan lebih efektif. Padahal, bulu sikat yang terlalu keras justru dapat merusak enamel gigi dan melukai gusi.</p>\r\n<p data-start=\"824\" data-end=\"846\"><strong data-start=\"824\" data-end=\"846\">Kenapa harus soft?</strong></p>\r\n<ul data-start=\"847\" data-end=\"958\">\r\n<li data-start=\"847\" data-end=\"874\">\r\n<p data-start=\"849\" data-end=\"874\">Lebih aman untuk enamel</p>\r\n</li>\r\n<li data-start=\"875\" data-end=\"895\">\r\n<p data-start=\"877\" data-end=\"895\">Nyaman digunakan</p>\r\n</li>\r\n<li data-start=\"896\" data-end=\"958\">\r\n<p data-start=\"898\" data-end=\"958\">Bisa menjangkau sela-sela gigi tanpa melukai jaringan gusi</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"960\" data-end=\"1011\">Untuk anak-anak, gunakan sikat gigi <strong data-start=\"996\" data-end=\"1010\">extra soft</strong>.</p>\r\n<hr data-start=\"1013\" data-end=\"1016\">\r\n<h2 data-start=\"1018\" data-end=\"1065\"><strong data-start=\"1021\" data-end=\"1065\">2. Pilih Ukuran Kepala Sikat yang Sesuai</strong></h2>\r\n<p data-start=\"1067\" data-end=\"1162\">Kepala sikat yang terlalu besar akan sulit menjangkau area belakang mulut.<br data-start=\"1141\" data-end=\"1144\">\r\nPilih ukuran yang:</p>\r\n<ul data-start=\"1163\" data-end=\"1269\">\r\n<li data-start=\"1163\" data-end=\"1178\">\r\n<p data-start=\"1165\" data-end=\"1178\">Cukup kecil</p>\r\n</li>\r\n<li data-start=\"1179\" data-end=\"1218\">\r\n<p data-start=\"1181\" data-end=\"1218\">Mudah masuk ke seluruh bagian mulut</p>\r\n</li>\r\n<li data-start=\"1219\" data-end=\"1269\">\r\n<p data-start=\"1221\" data-end=\"1269\">Lebih fleksibel untuk membersihkan area sempit</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1271\" data-end=\"1335\">Untuk anak, gunakan kepala sikat yang lebih kecil dan ergonomis.</p>\r\n<hr data-start=\"1337\" data-end=\"1340\">\r\n<h2 data-start=\"1342\" data-end=\"1379\"><strong data-start=\"1345\" data-end=\"1379\">3. Pegangan Sikat Harus Nyaman</strong></h2>\r\n<p data-start=\"1381\" data-end=\"1476\">Handle atau pegangan sikat sangat berpengaruh pada kenyamanan saat menyikat gigi.<br data-start=\"1462\" data-end=\"1465\">\r\nPilih yang:</p>\r\n<ul data-start=\"1477\" data-end=\"1552\">\r\n<li data-start=\"1477\" data-end=\"1492\">\r\n<p data-start=\"1479\" data-end=\"1492\">Tidak licin</p>\r\n</li>\r\n<li data-start=\"1493\" data-end=\"1512\">\r\n<p data-start=\"1495\" data-end=\"1512\">Mudah digenggam</p>\r\n</li>\r\n<li data-start=\"1513\" data-end=\"1552\">\r\n<p data-start=\"1515\" data-end=\"1552\">Cocok dengan ukuran tangan pengguna</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1554\" data-end=\"1616\">Untuk anak, pegangan biasanya lebih tebal agar mudah dipegang.</p>\r\n<hr data-start=\"1618\" data-end=\"1621\">\r\n<h2 data-start=\"1623\" data-end=\"1677\"><strong data-start=\"1626\" data-end=\"1677\">4. Pertimbangkan Sikat Gigi Manual vs. Elektrik</strong></h2>\r\n<p data-start=\"1679\" data-end=\"1772\">Keduanya sama-sama efektif jika digunakan dengan benar, tetapi masing-masing punya kelebihan.</p>\r\n<h3 data-start=\"1774\" data-end=\"1799\"><strong data-start=\"1778\" data-end=\"1799\">Sikat Gigi Manual</strong></h3>\r\n<ul data-start=\"1800\" data-end=\"1858\">\r\n<li data-start=\"1800\" data-end=\"1815\">\r\n<p data-start=\"1802\" data-end=\"1815\">Lebih murah</p>\r\n</li>\r\n<li data-start=\"1816\" data-end=\"1835\">\r\n<p data-start=\"1818\" data-end=\"1835\">Mudah ditemukan</p>\r\n</li>\r\n<li data-start=\"1836\" data-end=\"1858\">\r\n<p data-start=\"1838\" data-end=\"1858\">Ringan dan praktis</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"1860\" data-end=\"1887\"><strong data-start=\"1864\" data-end=\"1887\">Sikat Gigi Elektrik</strong></h3>\r\n<ul data-start=\"1888\" data-end=\"2046\">\r\n<li data-start=\"1888\" data-end=\"1917\">\r\n<p data-start=\"1890\" data-end=\"1917\">Membersihkan lebih merata</p>\r\n</li>\r\n<li data-start=\"1918\" data-end=\"1990\">\r\n<p data-start=\"1920\" data-end=\"1990\">Baik untuk pengguna yang kesulitan menyikat gigi dengan teknik benar</p>\r\n</li>\r\n<li data-start=\"1991\" data-end=\"2046\">\r\n<p data-start=\"1993\" data-end=\"2046\">Cocok untuk anak (beberapa model lebih fun digunakan)</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2048\" data-end=\"2127\">Jika memilih sikat elektrik, pastikan kepala sikat bisa diganti secara berkala.</p>\r\n<hr data-start=\"2129\" data-end=\"2132\">\r\n<h2 data-start=\"2134\" data-end=\"2200\"><strong data-start=\"2137\" data-end=\"2200\">5. Cari Bulu Sikat dengan Ujung Membulat (Rounded Bristles)</strong></h2>\r\n<p data-start=\"2202\" data-end=\"2266\">Sikat gigi berkualitas memiliki ujung bulu yang dibulatkan agar:</p>\r\n<ul data-start=\"2267\" data-end=\"2349\">\r\n<li data-start=\"2267\" data-end=\"2291\">\r\n<p data-start=\"2269\" data-end=\"2291\">Tidak menggores gusi</p>\r\n</li>\r\n<li data-start=\"2292\" data-end=\"2319\">\r\n<p data-start=\"2294\" data-end=\"2319\">Lebih aman untuk enamel</p>\r\n</li>\r\n<li data-start=\"2320\" data-end=\"2349\">\r\n<p data-start=\"2322\" data-end=\"2349\">Mengurangi risiko iritasi</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2351\" data-end=\"2450\">Produk murah sering memiliki ujung bulu yang kasar — pastikan Anda memilih yang teruji kualitasnya.</p>\r\n<hr data-start=\"2452\" data-end=\"2455\">\r\n<h2 data-start=\"2457\" data-end=\"2498\"><strong data-start=\"2460\" data-end=\"2498\">6. Ganti Sikat Gigi Setiap 3 Bulan</strong></h2>\r\n<p data-start=\"2500\" data-end=\"2610\">Sikat gigi yang sudah mekar atau aus tidak efektif lagi dalam membersihkan plak.<br data-start=\"2580\" data-end=\"2583\">\r\nGantilah sikat gigi ketika:</p>\r\n<ul data-start=\"2611\" data-end=\"2720\">\r\n<li data-start=\"2611\" data-end=\"2649\">\r\n<p data-start=\"2613\" data-end=\"2649\">Sudah digunakan lebih dari 3 bulan</p>\r\n</li>\r\n<li data-start=\"2650\" data-end=\"2676\">\r\n<p data-start=\"2652\" data-end=\"2676\">Bulu sikat mulai mekar</p>\r\n</li>\r\n<li data-start=\"2677\" data-end=\"2720\">\r\n<p data-start=\"2679\" data-end=\"2720\">Setelah sakit (flu, batuk, infeksi mulut)</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"2722\" data-end=\"2725\">\r\n<h2 data-start=\"2727\" data-end=\"2770\"><strong data-start=\"2730\" data-end=\"2770\">7. Sesuaikan dengan Kebutuhan Khusus</strong></h2>\r\n<p data-start=\"2772\" data-end=\"2838\">Jika Anda memiliki kondisi tertentu, pilih sikat gigi yang sesuai:</p>\r\n<ul data-start=\"2839\" data-end=\"3052\">\r\n<li data-start=\"2839\" data-end=\"2886\">\r\n<p data-start=\"2841\" data-end=\"2886\"><strong data-start=\"2841\" data-end=\"2859\">Gusi sensitif:</strong> gunakan sikat extra soft</p>\r\n</li>\r\n<li data-start=\"2887\" data-end=\"2932\">\r\n<p data-start=\"2889\" data-end=\"2932\"><strong data-start=\"2889\" data-end=\"2899\">Behel:</strong> gunakan sikat ortodonti khusus</p>\r\n</li>\r\n<li data-start=\"2933\" data-end=\"2979\">\r\n<p data-start=\"2935\" data-end=\"2979\"><strong data-start=\"2935\" data-end=\"2951\">Gigi implan:</strong> gunakan sikat interdental</p>\r\n</li>\r\n<li data-start=\"2980\" data-end=\"3052\">\r\n<p data-start=\"2982\" data-end=\"3052\"><strong data-start=\"2982\" data-end=\"3000\">Bayi &amp; balita:</strong> gunakan sikat gigi silikon atau sikat khusus anak</p>\r\n</li>\r\n</ul>\r\n<hr data-start=\"3054\" data-end=\"3057\">\r\n<h1 data-start=\"3059\" data-end=\"3075\"><strong data-start=\"3061\" data-end=\"3075\">Kesimpulan</strong></h1>\r\n<p data-start=\"3077\" data-end=\"3440\">Memilih sikat gigi yang tepat adalah langkah sederhana namun penting untuk menjaga kesehatan mulut jangka panjang. Perhatikan jenis bulu sikat, ukuran kepala sikat, kenyamanan pegangan, serta kebutuhan khusus pengguna. Dengan sikat gigi yang sesuai, proses menyikat gigi menjadi lebih efektif, nyaman, dan membantu mencegah berbagai masalah gigi di kemudian hari.</p>', '6918dec9afe38_1763237577.jpg', '', '2025-02-25', 1, 0, '2025-10-27 01:20:03', '2025-11-15 20:12:57'),
(6, 'Pentingnya Pemeriksaan Rutin ke Dokter Gigi', 'pemeriksaan-rutin-dokter-gigi', 'ORTHODONTIST', 'Mengapa rutin check-up itu penting', '<p data-start=\"219\" data-end=\"533\">Banyak orang hanya pergi ke dokter gigi ketika merasakan sakit, padahal pemeriksaan gigi secara rutin justru dapat mencegah berbagai masalah sejak dini. Pemeriksaan gigi setiap enam bulan sekali sangat penting untuk menjaga kesehatan mulut, mencegah penyakit, dan mempertahankan senyum yang sehat dan percaya diri.</p>\r\n<hr data-start=\"535\" data-end=\"538\">\r\n<h2 data-start=\"540\" data-end=\"584\"><strong data-start=\"543\" data-end=\"584\">1. Mendeteksi Masalah Gigi Sejak Dini</strong></h2>\r\n<p data-start=\"586\" data-end=\"670\">Pemeriksaan rutin membantu dokter gigi menemukan masalah yang belum terasa, seperti:</p>\r\n<ul data-start=\"671\" data-end=\"794\">\r\n<li data-start=\"671\" data-end=\"695\">\r\n<p data-start=\"673\" data-end=\"695\">Gigi berlubang kecil</p>\r\n</li>\r\n<li data-start=\"696\" data-end=\"716\">\r\n<p data-start=\"698\" data-end=\"716\">Kerusakan enamel</p>\r\n</li>\r\n<li data-start=\"717\" data-end=\"732\">\r\n<p data-start=\"719\" data-end=\"732\">Radang gusi</p>\r\n</li>\r\n<li data-start=\"733\" data-end=\"757\">\r\n<p data-start=\"735\" data-end=\"757\">Karang gigi berlebih</p>\r\n</li>\r\n<li data-start=\"758\" data-end=\"794\">\r\n<p data-start=\"760\" data-end=\"794\">Masalah gigitan atau posisi gigi</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"796\" data-end=\"866\">Semakin cepat masalah ditemukan, semakin mudah dan murah perawatannya.</p>\r\n<hr data-start=\"868\" data-end=\"871\">\r\n<h2 data-start=\"873\" data-end=\"916\"><strong data-start=\"876\" data-end=\"916\">2. Membersihkan Plak dan Karang Gigi</strong></h2>\r\n<p data-start=\"918\" data-end=\"1052\">Meski sudah rajin menyikat gigi, plak tetap dapat menumpuk dan mengeras menjadi karang gigi.<br data-start=\"1010\" data-end=\"1013\">\r\nPembersihan (scaling) diperlukan untuk:</p>\r\n<ul data-start=\"1053\" data-end=\"1192\">\r\n<li data-start=\"1053\" data-end=\"1082\">\r\n<p data-start=\"1055\" data-end=\"1082\">Menghilangkan karang gigi</p>\r\n</li>\r\n<li data-start=\"1083\" data-end=\"1119\">\r\n<p data-start=\"1085\" data-end=\"1119\">Mengurangi risiko gigi berlubang</p>\r\n</li>\r\n<li data-start=\"1120\" data-end=\"1144\">\r\n<p data-start=\"1122\" data-end=\"1144\">Mencegah radang gusi</p>\r\n</li>\r\n<li data-start=\"1145\" data-end=\"1192\">\r\n<p data-start=\"1147\" data-end=\"1192\">Membuat mulut terasa lebih bersih dan segar</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1194\" data-end=\"1279\">Karang gigi tidak bisa hilang hanya dengan menyikat gigi — perlu bantuan dokter gigi.</p>\r\n<hr data-start=\"1281\" data-end=\"1284\">\r\n<h2 data-start=\"1286\" data-end=\"1318\"><strong data-start=\"1289\" data-end=\"1318\">3. Mencegah Penyakit Gusi</strong></h2>\r\n<p data-start=\"1320\" data-end=\"1414\">Penyakit gusi sering terjadi tanpa gejala awal yang jelas.<br data-start=\"1378\" data-end=\"1381\">\r\nPemeriksaan rutin dapat mencegah:</p>\r\n<ul data-start=\"1415\" data-end=\"1532\">\r\n<li data-start=\"1415\" data-end=\"1431\">\r\n<p data-start=\"1417\" data-end=\"1431\">Gusi bengkak</p>\r\n</li>\r\n<li data-start=\"1432\" data-end=\"1449\">\r\n<p data-start=\"1434\" data-end=\"1449\">Gusi berdarah</p>\r\n</li>\r\n<li data-start=\"1450\" data-end=\"1479\">\r\n<p data-start=\"1452\" data-end=\"1479\">Infeksi gusi (gingivitis)</p>\r\n</li>\r\n<li data-start=\"1480\" data-end=\"1532\">\r\n<p data-start=\"1482\" data-end=\"1532\">Periodontitis yang dapat menyebabkan gigi goyang</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1534\" data-end=\"1617\">Jika dibiarkan, penyakit gusi dapat memengaruhi kesehatan tubuh secara keseluruhan.</p>\r\n<hr data-start=\"1619\" data-end=\"1622\">\r\n<h2 data-start=\"1624\" data-end=\"1661\"><strong data-start=\"1627\" data-end=\"1661\">4. Menjaga Kesehatan Gigi Anak</strong></h2>\r\n<p data-start=\"1663\" data-end=\"1719\">Untuk anak-anak, pemeriksaan rutin sangat penting untuk:</p>\r\n<ul data-start=\"1720\" data-end=\"1905\">\r\n<li data-start=\"1720\" data-end=\"1760\">\r\n<p data-start=\"1722\" data-end=\"1760\">Memantau pertumbuhan gigi dan rahang</p>\r\n</li>\r\n<li data-start=\"1761\" data-end=\"1788\">\r\n<p data-start=\"1763\" data-end=\"1788\">Mencegah gigi berlubang</p>\r\n</li>\r\n<li data-start=\"1789\" data-end=\"1851\">\r\n<p data-start=\"1791\" data-end=\"1851\">Mengatasi kebiasaan buruk (thumb sucking, mouth breathing)</p>\r\n</li>\r\n<li data-start=\"1852\" data-end=\"1905\">\r\n<p data-start=\"1854\" data-end=\"1905\">Mengetahui kapan perlu konsultasi ke orthodontist</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1907\" data-end=\"1978\">Pemeriksaan rutin membuat anak terbiasa dan tidak takut ke dokter gigi.</p>\r\n<hr data-start=\"1980\" data-end=\"1983\">\r\n<h2 data-start=\"1985\" data-end=\"2039\"><strong data-start=\"1988\" data-end=\"2039\">5. Mengurangi Risiko Perawatan yang Lebih Besar</strong></h2>\r\n<p data-start=\"2041\" data-end=\"2092\">Dengan pemeriksaan teratur, Anda dapat menghindari:</p>\r\n<ul data-start=\"2093\" data-end=\"2186\">\r\n<li data-start=\"2093\" data-end=\"2119\">\r\n<p data-start=\"2095\" data-end=\"2119\">Perawatan saluran akar</p>\r\n</li>\r\n<li data-start=\"2120\" data-end=\"2139\">\r\n<p data-start=\"2122\" data-end=\"2139\">Pencabutan gigi</p>\r\n</li>\r\n<li data-start=\"2140\" data-end=\"2158\">\r\n<p data-start=\"2142\" data-end=\"2158\">Tambalan besar</p>\r\n</li>\r\n<li data-start=\"2159\" data-end=\"2186\">\r\n<p data-start=\"2161\" data-end=\"2186\">Biaya yang lebih tinggi</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2188\" data-end=\"2296\">Perawatan pencegahan selalu lebih sederhana dan lebih ekonomis dibanding perawatan saat kondisi sudah parah.</p>\r\n<hr data-start=\"2298\" data-end=\"2301\">\r\n<h2 data-start=\"2303\" data-end=\"2356\"><strong data-start=\"2306\" data-end=\"2356\">6. Menjaga Senyum Tetap Sehat dan Percaya Diri</strong></h2>\r\n<p data-start=\"2358\" data-end=\"2415\">Mulut yang sehat meningkatkan kualitas hidup sehari-hari:</p>\r\n<ul data-start=\"2416\" data-end=\"2538\">\r\n<li data-start=\"2416\" data-end=\"2437\">\r\n<p data-start=\"2418\" data-end=\"2437\">Nafas lebih segar</p>\r\n</li>\r\n<li data-start=\"2438\" data-end=\"2467\">\r\n<p data-start=\"2440\" data-end=\"2467\">Senyum lebih percaya diri</p>\r\n</li>\r\n<li data-start=\"2468\" data-end=\"2498\">\r\n<p data-start=\"2470\" data-end=\"2498\">Gigi lebih kuat dan bersih</p>\r\n</li>\r\n<li data-start=\"2499\" data-end=\"2538\">\r\n<p data-start=\"2501\" data-end=\"2538\">Kenyamanan saat makan dan berbicara</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2540\" data-end=\"2626\">Pemeriksaan rutin adalah langkah penting untuk menjaga kesehatan mulut jangka panjang.</p>\r\n<hr data-start=\"2628\" data-end=\"2631\">\r\n<h2 data-start=\"2633\" data-end=\"2686\"><strong data-start=\"2636\" data-end=\"2686\">7. Pemeriksaan Menyeluruh untuk Kesehatan Umum</strong></h2>\r\n<p data-start=\"2688\" data-end=\"2781\">Dokter gigi juga dapat mendeteksi tanda awal penyakit sistemik yang muncul di mulut, seperti:</p>\r\n<ul data-start=\"2782\" data-end=\"2857\">\r\n<li data-start=\"2782\" data-end=\"2794\">\r\n<p data-start=\"2784\" data-end=\"2794\">Diabetes</p>\r\n</li>\r\n<li data-start=\"2795\" data-end=\"2817\">\r\n<p data-start=\"2797\" data-end=\"2817\">Kekurangan vitamin</p>\r\n</li>\r\n<li data-start=\"2818\" data-end=\"2835\">\r\n<p data-start=\"2820\" data-end=\"2835\">Infeksi mulut</p>\r\n</li>\r\n<li data-start=\"2836\" data-end=\"2857\">\r\n<p data-start=\"2838\" data-end=\"2857\">Gangguan autoimun</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"2859\" data-end=\"2962\">Mulut adalah jendela kesehatan tubuh — pemeriksaan rutin membantu menjaga kesehatan secara keseluruhan.</p>\r\n<hr data-start=\"2964\" data-end=\"2967\">\r\n<h1 data-start=\"2969\" data-end=\"2985\"><strong data-start=\"2971\" data-end=\"2985\">Kesimpulan</strong></h1>\r\n<p data-start=\"2987\" data-end=\"3329\">Pemeriksaan rutin ke dokter gigi adalah investasi penting untuk menjaga kesehatan mulut dan gigi seumur hidup. Dengan memeriksa setiap enam bulan sekali, Anda dapat mencegah masalah, menjaga kebersihan gigi, dan mempertahankan senyum sehat yang indah. Mulailah rutin kontrol dari sekarang agar kesehatan gigi tetap terjaga hingga usia lanjut.</p>', '6918df15e8505_1763237653.jpg', '', '2025-01-05', 1, 0, '2025-10-27 01:20:03', '2025-11-15 20:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` enum('equipment','insurance') DEFAULT 'equipment',
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `type`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Osstem', '691900498ca9a_1763246153.png', 'equipment', 1, 1, '2025-10-27 01:20:03', '2025-11-15 22:35:53'),
(2, 'Belmont', 'logo_belmont.png', 'equipment', 1, 2, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(3, 'Dr. Kim', 'logo_drkim.png', 'equipment', 1, 3, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(4, 'Morita', 'logo_morita.png', 'equipment', 1, 4, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(5, 'Admedika', 'logo_admedika.png', 'insurance', 1, 5, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(6, 'Inova', 'logo_inova.png', 'insurance', 1, 6, '2025-10-27 01:20:03', '2025-10-27 01:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `title`, `description`, `image`, `discount_percentage`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tambal Gigi', '', '6918f7b45ebe7_1763243956.png', 0, '2025-11-28', '2025-11-27', 1, '2025-11-15 21:59:16', '2025-11-15 21:59:16'),
(2, 'Veener Gigi', '', '6918f7eced1a7_1763244012.png', 0, '2025-11-16', '2025-11-30', 1, '2025-11-15 22:00:12', '2025-11-15 22:00:33'),
(3, 'Perawatan Saluran Akar', '', '6918f9b58c54b_1763244469.png', 0, '2025-11-16', '2025-12-10', 1, '2025-11-15 22:07:49', '2025-11-15 22:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon_image`, `slug`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Tambal Gigi', 'Perawatan tambal gigi dengan bahan berkualitas tinggi.', 'tambal.png', 'tambal-gigi', 1, 1, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(2, 'Pemasangan Behel', 'Perawatan ortodontik modern untuk senyum lebih rapi.', 'orthodontic.png', 'pemasangan-behel', 1, 2, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(3, 'Scaling Gigi', 'Membersihkan karang gigi dan menjaga kesehatan mulut.', 'scaling.png', 'scaling-gigi', 1, 3, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(4, 'Whitening', 'Pemutihan gigi agar tampak lebih cerah alami.', 'bleaching.jpg', 'whitening', 1, 4, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(5, 'Implan Gigi', 'Ganti gigi yang hilang dengan implan kuat dan alami.', 'implanhero.png', 'implan-gigi', 1, 5, '2025-10-27 01:20:03', '2025-10-27 01:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `description`, `updated_at`) VALUES
(1, 'site_name', 'Seuri Dental Specialist', 'Nama Website', '2025-10-27 01:20:03'),
(2, 'site_tagline', 'Klinik Gigi Terpercaya', 'Tagline Website', '2025-10-27 01:20:03'),
(3, 'contact_phone', '(62)812-80808-9191', 'Nomor Telepon', '2025-11-15 22:14:19'),
(4, 'contact_email', 'info@seuridental.com', 'Email Kontak', '2025-10-27 01:20:03'),
(5, 'contact_address', 'Jl. Raya Pajajaran No. 28E', 'Alamat Klinik', '2025-11-15 22:14:19'),
(6, 'whatsapp_number', '(62)812-80808-9191', 'Nomor WhatsApp', '2025-11-15 22:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT 5,
  `review_text` text NOT NULL,
  `source` varchar(50) DEFAULT 'Google',
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `patient_name`, `rating`, `review_text`, `source`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Rara Sekar', 5, 'Kliniknya nyaman, premium dan dokter gigi spesialisnya lengkap.', 'Google', 1, 1, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(2, 'Budiman', 5, 'Akhirnya ga perlu jauh-jauh ke Jakarta buat perawatan orto. Cukup ke Seuri Bogor aja!', 'Google', 1, 2, '2025-10-27 01:20:03', '2025-10-27 01:20:03'),
(3, 'Anya Geraldine', 5, 'Nemu klinik dengan kualitas sebagus ini di Bogor. Top ortodontisnya. Bakal sering kontrol behel di Seuri Bogor.', 'Google', 1, 3, '2025-10-27 01:20:03', '2025-10-27 01:20:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty_id` (`specialty_id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctor_specialties`
--
ALTER TABLE `doctor_specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctor_specialties`
--
ALTER TABLE `doctor_specialties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specialty_id`) REFERENCES `doctor_specialties` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD CONSTRAINT `doctor_schedules_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
