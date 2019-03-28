-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 03:40 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tims`
--

CREATE TABLE `anggota_tims` (
  `anggota_tim_id` int(10) UNSIGNED NOT NULL,
  `nip` int(11) NOT NULL,
  `tim_id` int(11) NOT NULL,
  `status_anggota_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota_tims`
--

INSERT INTO `anggota_tims` (`anggota_tim_id`, `nip`, `tim_id`, `status_anggota_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 123, 12, 1, '2019-03-10 23:47:20', '2019-03-10 23:47:20', NULL),
(4, 23424, 12, 3, '2019-03-11 01:16:18', '2019-03-11 01:16:18', NULL),
(5, 123, 13, 1, '2019-03-16 18:04:41', '2019-03-16 18:04:41', NULL),
(6, 123, 14, 1, '2019-03-17 20:01:28', '2019-03-17 20:01:28', NULL),
(7, 123, 15, 1, '2019-03-24 21:44:07', '2019-03-24 21:44:07', NULL),
(8, 1234, 15, 3, '2019-03-25 01:47:21', '2019-03-25 01:47:21', NULL),
(9, 23424, 15, 2, '2019-03-25 01:47:21', '2019-03-25 01:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `departemen_id` int(11) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`departemen_id`, `departemen`) VALUES
(1, 'Komunikasi $ Hukum Peusahaan'),
(2, 'Perencanaan & Pengendalian Produksi'),
(3, 'Tambang & Pengelolaan Bahan Baku');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `id` int(10) UNSIGNED NOT NULL,
  `penilaian_inovasi_id` int(10) NOT NULL,
  `krikat_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penilaian`
--

INSERT INTO `detail_penilaian` (`id`, `penilaian_inovasi_id`, `krikat_id`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 9, 1, '2019-03-21 01:17:06', '2019-03-21 01:17:06', NULL),
(2, 1, 10, 1, '2019-03-21 01:17:06', '2019-03-21 01:17:06', NULL),
(3, 1, 11, 2, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(4, 1, 12, 1, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(5, 1, 13, 3, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(6, 1, 14, 5, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(7, 1, 15, 9, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(8, 1, 16, 4, '2019-03-21 01:17:06', '2019-03-21 01:25:49', NULL),
(9, 3, 1, 2, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(10, 3, 2, 8, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(11, 3, 3, 9, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(12, 3, 4, 7, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(13, 3, 5, 8, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(14, 3, 6, 8, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(15, 3, 7, 8, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(16, 3, 8, 7, '2019-03-21 01:44:23', '2019-03-21 01:44:23', NULL),
(17, 4, 9, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(18, 4, 10, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(19, 4, 11, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(20, 4, 12, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(21, 4, 13, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(22, 4, 14, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(23, 4, 15, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(24, 4, 16, 0, '2019-03-21 02:02:16', '2019-03-21 02:02:16', NULL),
(25, 5, 42, 1, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(26, 5, 43, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(27, 5, 44, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(28, 5, 45, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(29, 5, 46, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(30, 5, 47, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(31, 5, 48, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(32, 5, 49, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(33, 5, 50, 2, '2019-03-21 03:06:18', '2019-03-21 03:06:18', NULL),
(34, 6, 9, 1, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(35, 6, 10, 2, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(36, 6, 11, 3, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(37, 6, 12, 4, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(38, 6, 13, 5, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(39, 6, 14, 6, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(40, 6, 15, 1, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(41, 6, 16, 1, '2019-03-26 13:35:03', '2019-03-26 13:35:03', NULL),
(72, 7, 9, 1, '2019-03-26 19:55:38', '2019-03-26 19:55:38', NULL),
(73, 7, 10, 1, '2019-03-26 19:55:38', '2019-03-26 19:55:38', NULL),
(74, 7, 11, 1, '2019-03-26 19:55:38', '2019-03-26 19:59:51', NULL),
(75, 7, 12, 1, '2019-03-26 19:55:38', '2019-03-26 19:59:51', NULL),
(76, 7, 13, 1, '2019-03-26 19:55:38', '2019-03-26 19:59:51', NULL),
(77, 7, 14, 13, '2019-03-26 19:55:38', '2019-03-26 20:00:38', NULL),
(78, 7, 15, 12, '2019-03-26 19:55:39', '2019-03-26 19:59:51', NULL),
(79, 7, 16, 6, '2019-03-26 19:55:39', '2019-03-26 20:00:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inovasis`
--

CREATE TABLE `inovasis` (
  `inovasi_id` int(10) UNSIGNED NOT NULL,
  `tim_id` int(10) UNSIGNED NOT NULL,
  `area_implementasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_inisiator` int(11) DEFAULT NULL,
  `sub_kategori_id` int(10) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci,
  `latar_belakang` text COLLATE utf8mb4_unicode_ci,
  `tujuan_inovasi` text COLLATE utf8mb4_unicode_ci,
  `saving` int(11) DEFAULT NULL,
  `opp_lost` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `status_implementasi` int(11) NOT NULL DEFAULT '0',
  `tgl_pelaksanaan` date DEFAULT NULL,
  `dokumen_tim` text COLLATE utf8mb4_unicode_ci,
  `dokumen_pendukung` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `status_registrasi` int(11) NOT NULL DEFAULT '0',
  `status_penilaian` int(11) DEFAULT '0',
  `stream_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inovasis`
--

INSERT INTO `inovasis` (`inovasi_id`, `tim_id`, `area_implementasi`, `nip_inisiator`, `sub_kategori_id`, `judul`, `latar_belakang`, `tujuan_inovasi`, `saving`, `opp_lost`, `revenue`, `status_implementasi`, `tgl_pelaksanaan`, `dokumen_tim`, `dokumen_pendukung`, `status`, `status_registrasi`, `status_penilaian`, `stream_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 'are', 123, 1, 'How to exclude certains columns while using eloquent', 'Transportasi memegang peranan penting dalam mendukung kegiatan sehari - hari masyarakat.  Transportasi dapat mendukung kegiatan produksi, konsumsi dan distribusi yang dapat meningkatkan perekonomian, pariwisata, pembangunan dan sebagainya. Transportasi harus didukung dengan kualitas dan pelayanan yang baik. Sistem transportasi yang tertib, aman, selamat, nyaman, cepat, teratur, lancar dan dengan biaya yang terjangkau diperlukan masyarakat dalam mendukung aktifitasnya (UU No. 22 tahun 2009 pasal 138). Oleh sebab itu, penyelenggara sistem transportasi harus mengelola transportasi terutama transportasi publik secara efektif dan efisien serta memberikan kenyamanan kepada masyarakat. Pemerintah telah berupaya menyediakan sarana transportasi publik yang murah, aman, serta nyaman bagi masyarakat. Transportasi tersebut lebih dikenal dengan sarana angkutan umum massal (SAUM) Trans Metro. Trans Metro telah diterapkan di berbagai kota besar di Indonesia, termasuk Kota Padang yang dikenal dengan Trans Padang. Trans Padang adalah layanan angkutan massal Bus Rapid Transit (BRT) di Kota Padang yang mulai beroperasi pada Februari 2014. (UPT Trans Padang, 2018)', 'Adapun tujuan penelitian yang ingin dicapai adalah:\r\n1)	Mengidentifikasi dan menganalisa kebutuhan – kebutuhan dalam membangun Aplikasi monitoring dan tracking pada BRT Trans Padang. \r\n2)	Melakukan perancangan, analisis dan pembangunan Aplikasi monitoring dan tracking pada BRT Trans Padang\r\n3)	Melakukan pengujian terhadap aplikasi yang telah dibangun\r\n', 100000, 342, 100, 1, '2019-02-18', '2019_12_1_How to exclude certains columns while using eloquent.pdf', NULL, 4, 2, 1, 2, '2019-04-11 19:19:54', '2019-03-26 21:16:52', NULL),
(5, 12, 'a', 23424, 4, 'a', 'Transportasi memegang peranan penting dalam mendukung kegiatan sehari - hari masyarakat.  Transportasi dapat mendukung kegiatan produksi, konsumsi dan distribusi yang dapat meningkatkan perekonomian, pariwisata, pembangunan dan sebagainya. Transportasi harus didukung dengan kualitas dan pelayanan yang baik. Sistem transportasi yang tertib, aman, selamat, nyaman, cepat, teratur, lancar dan dengan biaya yang terjangkau diperlukan masyarakat dalam mendukung aktifitasnya (UU No. 22 tahun 2009 pasal 138). Oleh sebab itu, penyelenggara sistem transportasi harus mengelola transportasi terutama transportasi publik secara efektif dan efisien serta memberikan kenyamanan kepada masyarakat. Pemerintah telah berupaya menyediakan sarana transportasi publik yang murah, aman, serta nyaman bagi masyarakat. Transportasi tersebut lebih dikenal dengan sarana angkutan umum massal (SAUM) Trans Metro. Trans Metro telah diterapkan di berbagai kota besar di Indonesia, termasuk Kota Padang yang dikenal dengan Trans Padang. Trans Padang adalah layanan angkutan massal Bus Rapid Transit (BRT) di Kota Padang yang mulai beroperasi pada Februari 2014. (UPT Trans Padang, 2018)', 'Adapun tujuan penelitian yang ingin dicapai adalah:\r\n1)	Mengidentifikasi dan menganalisa kebutuhan – kebutuhan dalam membangun Aplikasi monitoring dan tracking pada BRT Trans Padang. \r\n2)	Melakukan perancangan, analisis dan pembangunan Aplikasi monitoring dan tracking pada BRT Trans Padang\r\n3)	Melakukan pengujian terhadap aplikasi yang telah dibangun', 100000, 34299, 100, 1, NULL, '2019_12_1_How to exclude certains columns while using eloquent.pdf', NULL, 0, 0, 0, 2, '2019-03-11 21:56:39', '2019-03-27 02:56:40', NULL),
(8, 12, 'asdas', 23424, 9, 'Membangun Ekosistem Transaksi Keuangan (Transaction)  Membangun ekosistem transaksi keuangan digital untuk menjamin kelancaran', 'Transportasi memegang peranan penting dalam mendukung kegiatan sehari - hari masyarakat.  Transportasi dapat mendukung kegiatan produksi, konsumsi dan distribusi yang dapat meningkatkan perekonomian, pariwisata, pembangunan dan sebagainya. Transportasi harus didukung dengan kualitas dan pelayanan yang baik. Sistem transportasi yang tertib, aman, selamat, nyaman, cepat, teratur, lancar dan dengan biaya yang terjangkau diperlukan masyarakat dalam mendukung aktifitasnya (UU No. 22 tahun 2009 pasal 138). Oleh sebab itu, penyelenggara sistem transportasi harus mengelola transportasi terutama transportasi publik secara efektif dan efisien serta memberikan kenyamanan kepada masyarakat. Pemerintah telah berupaya menyediakan sarana transportasi publik yang murah, aman, serta nyaman bagi masyarakat. Transportasi tersebut lebih dikenal dengan sarana angkutan umum massal (SAUM) Trans Metro. Trans Metro telah diterapkan di berbagai kota besar di Indonesia, termasuk Kota Padang yang dikenal dengan Trans Padang. Trans Padang adalah layanan angkutan massal Bus Rapid Transit (BRT) di Kota Padang yang mulai beroperasi pada Februari 2014. (UPT Trans Padang, 2018)', 'Adapun tujuan penelitian yang ingin dicapai adalah:\r\n1)	Mengidentifikasi dan menganalisa kebutuhan – kebutuhan dalam membangun Aplikasi monitoring dan tracking pada BRT Trans Padang. \r\n2)	Melakukan perancangan, analisis dan pembangunan Aplikasi monitoring dan tracking pada BRT Trans Padang\r\n3)	Melakukan pengujian terhadap aplikasi yang telah dibangun', 100000, 342, 100, 1, NULL, '2019_12_1_How to exclude certains columns while using eloquent.pdf', NULL, 2, 0, 0, NULL, '2019-03-13 20:35:21', '2019-03-27 03:02:59', NULL),
(10, 12, 'asas', 123, 1, 'PEMBANGUNAN APLIKASI MONITORING DAN TRACKING SYSTEM MENGGUNAKAN FIREBASE REALTIME DATABASE BERBASIS WEB DAN MOBILE STUDI KASUS: BUS RAPID TRANSIT (BRT) TRANS PADANG', 'Transportasi memegang peranan penting dalam mendukung kegiatan sehari - hari masyarakat.  Transportasi dapat mendukung kegiatan produksi, konsumsi dan distribusi yang dapat meningkatkan perekonomian, pariwisata, pembangunan dan sebagainya. Transportasi harus didukung dengan kualitas dan pelayanan yang baik. Sistem transportasi yang tertib, aman, selamat, nyaman, cepat, teratur, lancar dan dengan biaya yang terjangkau diperlukan masyarakat dalam mendukung aktifitasnya (UU No. 22 tahun 2009 pasal 138). Oleh sebab itu, penyelenggara sistem transportasi harus mengelola transportasi terutama transportasi publik secara efektif dan efisien serta memberikan kenyamanan kepada masyarakat. Pemerintah telah berupaya menyediakan sarana transportasi publik yang murah, aman, serta nyaman bagi masyarakat. Transportasi tersebut lebih dikenal dengan sarana angkutan umum massal (SAUM) Trans Metro. Trans Metro telah diterapkan di berbagai kota besar di Indonesia, termasuk Kota Padang yang dikenal dengan Trans Padang. Trans Padang adalah layanan angkutan massal Bus Rapid Transit (BRT) di Kota Padang yang mulai beroperasi pada Februari 2014. (UPT Trans Padang, 2018)', 'Adapun tujuan penelitian yang ingin dicapai adalah:\r\n1)	Mengidentifikasi dan menganalisa kebutuhan – kebutuhan dalam membangun Aplikasi monitoring dan tracking pada BRT Trans Padang. \r\n2)	Melakukan perancangan, analisis dan pembangunan Aplikasi monitoring dan tracking pada BRT Trans Padang\r\n3)	Melakukan pengujian terhadap aplikasi yang telah dibangun', 100000, 342, 100, 1, NULL, '2019_12_1_How to exclude certains columns while using eloquent.pdf', NULL, 3, 0, 0, 2, '2019-03-18 21:32:56', '2019-03-27 03:03:09', NULL),
(11, 12, 'tes', 123, 9, 'Memahami Fungsi Perulangan Foreach Pada PHP', 'Transportasi memegang peranan penting dalam mendukung kegiatan sehari - hari masyarakat.  Transportasi dapat mendukung kegiatan produksi, konsumsi dan distribusi yang dapat meningkatkan perekonomian, pariwisata, pembangunan dan sebagainya. Transportasi harus didukung dengan kualitas dan pelayanan yang baik. Sistem transportasi yang tertib, aman, selamat, nyaman, cepat, teratur, lancar dan dengan biaya yang terjangkau diperlukan masyarakat dalam mendukung aktifitasnya (UU No. 22 tahun 2009 pasal 138). Oleh sebab itu, penyelenggara sistem transportasi harus mengelola transportasi terutama transportasi publik secara efektif dan efisien serta memberikan kenyamanan kepada masyarakat. Pemerintah telah berupaya menyediakan sarana transportasi publik yang murah, aman, serta nyaman bagi masyarakat. Transportasi tersebut lebih dikenal dengan sarana angkutan umum massal (SAUM) Trans Metro. Trans Metro telah diterapkan di berbagai kota besar di Indonesia, termasuk Kota Padang yang dikenal dengan Trans Padang. Trans Padang adalah layanan angkutan massal Bus Rapid Transit (BRT) di Kota Padang yang mulai beroperasi pada Februari 2014. (UPT Trans Padang, 2018)', 'Adapun tujuan penelitian yang ingin dicapai adalah:\r\n1)	Mengidentifikasi dan menganalisa kebutuhan – kebutuhan dalam membangun Aplikasi monitoring dan tracking pada BRT Trans Padang. \r\n2)	Melakukan perancangan, analisis dan pembangunan Aplikasi monitoring dan tracking pada BRT Trans Padang\r\n3)	Melakukan pengujian terhadap aplikasi yang telah dibangun\r\n', 100000, 342, 100, 1, NULL, '2019_12_1_How to exclude certains columns while using eloquent.pdf', NULL, 3, 2, 0, 2, '2019-03-18 23:36:00', '2019-03-20 19:03:07', NULL),
(12, 15, 'wmather', 1234, 7, 'Collection sortBy() on multiple fields #11', 'ommonly find that there is no shorthand way of sorting collections by multiple fields. A large amount of extra code is required just by adding in an extra field. What I really want to do is this:\r\n\r\n$collection->sortBy([\'Surname\', \'Forename\']);\r\nInstead you need to pass a callback concatenating all of the fields you want:\r\n\r\n$collection->sortBy(function($item) {\r\n  return $item->Surname.\'-\'.$item->Forename;\r\n});\r\nYou have to do something similar if you want to groupBy() on multiple fields.\r\n\r\nThere have been several SO questions on the topic, but there\'s never been a clean solution', '@themsaid Unfortunately as above, that would sort by Surname then re-sort by Forename, unlike the query builder where chaining orderBy() creates a SQL query with a delimited list of order by fields.\r\n\r\nWhere that type of syntax would be good is to allow you to do different directions for different fields:', 1090000, 1200, 12000000, 1, NULL, '2019_15_12_Collection sortBy() on multiple fields #11.pdf', NULL, 1, 1, 0, NULL, '2019-03-25 02:11:53', '2019-03-25 03:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `juris`
--

CREATE TABLE `juris` (
  `nip` int(11) NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `status_aktif` int(11) NOT NULL DEFAULT '1',
  `stream_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juris`
--

INSERT INTO `juris` (`nip`, `kategori_id`, `status_aktif`, `stream_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(123, 1, 1, 2, NULL, '2019-03-21 00:44:04', NULL),
(1234, 1, 1, 2, '2019-03-24 05:29:37', '2019-03-24 05:30:58', NULL),
(123419, 2, 1, NULL, NULL, '2019-03-27 01:55:34', '2019-03-27 01:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`kategori_id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BREAKTHROUGH', '2019-03-08 01:39:28', '2019-03-08 01:39:28', NULL),
(2, 'INCREAMENTAL', '2019-03-08 01:39:42', '2019-03-08 01:39:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendalas`
--

CREATE TABLE `kendalas` (
  `id` int(10) UNSIGNED NOT NULL,
  `inovasi_id` int(10) UNSIGNED NOT NULL,
  `isi_kendala` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendalas`
--

INSERT INTO `kendalas` (`id`, `inovasi_id`, `isi_kendala`, `solusi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'asa', 'asdsa', '2019-03-18 23:45:06', '2019-03-19 20:27:37', NULL),
(2, 5, 'asaasda', 'panan data yang fleksibel , Cassandra mengakomodasi semua format data yang ada, termasuk: terstruktur, semi-terstruktur, dan tidak terstruktur. Secara dinamis dapat mengakomodasi perubahan struktur data anda sesuai dengan kebutuhan Anda.\r\nDistribusi data yang mudah ,Cassandra memberikan fleksibilitas untuk mendistribusikan data mana yang Anda butuhkan dengan mereplikasi data di beberapa pusat data.', '2019-03-18 23:46:31', '2019-03-19 20:29:37', NULL),
(3, 5, 'eas', NULL, '2019-03-18 23:55:56', '2019-03-18 23:55:56', NULL),
(4, 8, 's', NULL, '2019-03-18 23:56:22', '2019-03-18 23:56:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteraia_kategori_penilaians`
--

CREATE TABLE `kriteraia_kategori_penilaians` (
  `kriteria_katategori_id` int(10) UNSIGNED NOT NULL,
  `sub_kriteria_id` int(10) UNSIGNED NOT NULL,
  `sub_kategori_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteraia_kategori_penilaians`
--

INSERT INTO `kriteraia_kategori_penilaians` (`kriteria_katategori_id`, `sub_kriteria_id`, `sub_kategori_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, '2019-03-08 19:50:22', NULL, NULL),
(2, 2, 4, '2019-03-08 19:50:22', NULL, NULL),
(3, 3, 4, '2019-03-08 19:50:22', NULL, NULL),
(4, 4, 4, '2019-03-08 19:50:22', NULL, NULL),
(5, 5, 4, '2019-03-08 19:50:22', NULL, NULL),
(6, 6, 4, '2019-03-08 19:50:22', NULL, NULL),
(7, 7, 4, '2019-03-08 19:50:22', NULL, NULL),
(8, 8, 4, '2019-03-08 19:50:22', NULL, NULL),
(9, 1, 1, '2019-03-08 19:50:22', NULL, NULL),
(10, 2, 1, '2019-03-08 19:50:22', NULL, NULL),
(11, 3, 1, '2019-03-08 19:50:22', NULL, NULL),
(12, 4, 1, '2019-03-08 19:50:22', NULL, NULL),
(13, 5, 1, '2019-03-08 19:50:22', NULL, NULL),
(14, 6, 1, '2019-03-08 19:50:22', NULL, NULL),
(15, 7, 1, '2019-03-08 19:50:22', NULL, NULL),
(16, 8, 1, '2019-03-08 19:50:22', NULL, NULL),
(17, 1, 2, '2019-03-08 19:50:22', NULL, NULL),
(18, 2, 2, '2019-03-08 19:50:22', NULL, NULL),
(19, 3, 2, '2019-03-08 19:50:22', NULL, NULL),
(20, 4, 2, '2019-03-08 19:50:22', NULL, NULL),
(21, 5, 2, '2019-03-08 19:50:22', NULL, NULL),
(22, 6, 2, '2019-03-08 19:50:22', NULL, NULL),
(23, 7, 2, '2019-03-08 19:50:22', NULL, NULL),
(24, 8, 2, '2019-03-08 19:50:22', NULL, NULL),
(25, 1, 3, '2019-03-08 19:50:22', NULL, NULL),
(26, 2, 3, '2019-03-08 19:50:22', NULL, NULL),
(27, 3, 3, '2019-03-08 19:50:22', NULL, NULL),
(28, 4, 3, '2019-03-08 19:50:22', NULL, NULL),
(29, 5, 3, '2019-03-08 19:50:22', NULL, NULL),
(30, 6, 3, '2019-03-08 19:50:22', NULL, NULL),
(31, 7, 3, '2019-03-08 19:50:22', NULL, NULL),
(32, 8, 3, '2019-03-08 19:50:22', NULL, NULL),
(33, 9, 8, '2019-03-08 19:50:22', NULL, NULL),
(34, 10, 8, '2019-03-08 19:50:22', NULL, NULL),
(35, 11, 8, '2019-03-08 19:50:22', NULL, NULL),
(36, 12, 8, '2019-03-08 19:50:22', NULL, NULL),
(37, 13, 8, '2019-03-08 19:50:22', NULL, NULL),
(38, 14, 8, '2019-03-08 19:50:22', NULL, NULL),
(39, 15, 8, '2019-03-08 19:50:22', NULL, NULL),
(40, 16, 8, '2019-03-08 19:50:22', NULL, NULL),
(41, 17, 8, '2019-03-08 19:50:22', NULL, NULL),
(42, 18, 9, '2019-03-08 19:50:22', NULL, NULL),
(43, 19, 9, '2019-03-08 19:50:22', NULL, NULL),
(44, 20, 9, '2019-03-08 19:50:22', NULL, NULL),
(45, 21, 9, '2019-03-08 19:50:22', NULL, NULL),
(46, 22, 9, '2019-03-08 19:50:22', NULL, NULL),
(47, 23, 9, '2019-03-08 19:50:22', NULL, NULL),
(48, 24, 9, '2019-03-08 19:50:22', NULL, NULL),
(49, 25, 9, '2019-03-08 19:50:22', NULL, NULL),
(50, 26, 9, '2019-03-08 19:50:22', NULL, NULL),
(51, 18, 6, '2019-03-08 19:50:22', NULL, NULL),
(52, 19, 6, '2019-03-08 19:50:22', NULL, NULL),
(53, 27, 6, '2019-03-08 19:50:22', NULL, NULL),
(54, 20, 6, '2019-03-08 19:50:22', NULL, NULL),
(55, 21, 6, '2019-03-08 19:50:22', NULL, NULL),
(56, 22, 6, '2019-03-08 19:50:22', NULL, NULL),
(57, 23, 6, '2019-03-08 19:50:22', NULL, NULL),
(58, 24, 6, '2019-03-08 19:50:22', NULL, NULL),
(59, 25, 6, '2019-03-08 19:50:22', NULL, NULL),
(60, 28, 6, '2019-03-08 19:50:22', NULL, NULL),
(81, 26, 6, '2019-03-08 19:50:22', NULL, NULL),
(82, 18, 7, '2019-03-08 19:50:22', NULL, NULL),
(83, 19, 7, '2019-03-08 19:50:22', NULL, NULL),
(84, 27, 7, '2019-03-08 19:50:22', NULL, NULL),
(85, 20, 7, '2019-03-08 19:50:22', NULL, NULL),
(86, 21, 7, '2019-03-08 19:50:22', NULL, NULL),
(87, 22, 7, '2019-03-08 19:50:22', NULL, NULL),
(88, 23, 7, '2019-03-08 19:50:22', NULL, NULL),
(89, 24, 7, '2019-03-08 19:50:22', NULL, NULL),
(90, 25, 7, '2019-03-08 19:50:22', NULL, NULL),
(91, 26, 7, '2019-03-08 19:50:22', NULL, NULL),
(92, 28, 7, '2019-03-08 19:50:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`kriteria_id`, `kategori_id`, `nama_kriteria`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ORIGINALITAS', '2019-03-08 19:25:54', NULL, NULL),
(2, 1, 'MEKANISME IMPLEMENTASI', '2019-03-08 19:25:54', NULL, NULL),
(3, 1, 'BENEFIT & DAMPAK IMPLEMENTASI', '2019-03-08 19:25:54', NULL, NULL),
(4, 2, 'PLAN', '2019-03-08 19:25:54', NULL, NULL),
(5, 2, 'DO', '2019-03-08 19:25:54', NULL, NULL),
(6, 2, 'CHECK', '2019-03-08 19:25:54', NULL, NULL),
(7, 2, 'ACTION', '2019-03-08 19:25:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_06_090152_create_roles_table', 1),
(4, '2019_03_08_034917_create_kategoris_table', 1),
(5, '2019_03_08_035241_create_sub_kategoris_table', 1),
(6, '2019_03_08_040521_create_kriterias_table', 1),
(7, '2019_03_08_042200_create_sub_kriterias_table', 1),
(8, '2019_03_08_042534_create_kriteraia_kategori_penilaians_table', 1),
(9, '2019_03_08_064723_create_juris_table', 2),
(13, '2019_03_08_070114_create_tims_table', 3),
(14, '2019_03_08_070948_create_status_anggotas_table', 3),
(15, '2019_03_08_070949_create_anggota_tims_table', 4),
(16, '2019_03_08_073214_create_inovasis_table', 5),
(18, '2019_03_08_075059_create_streams_table', 6),
(19, '2019_03_08_080315_create_penilaian_tims_table', 6),
(20, '2019_03_15_090725_create_stream_juris_table', 7),
(21, '2019_03_15_090853_create_stream_inovasis_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_inovasi`
--

CREATE TABLE `penilaian_inovasi` (
  `penilaian_inovasi_id` int(11) NOT NULL,
  `inovasi_id` int(10) UNSIGNED NOT NULL,
  `nip_juri` int(11) NOT NULL,
  `status_penilaian` int(11) NOT NULL DEFAULT '0',
  `saran` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_inovasi`
--

INSERT INTO `penilaian_inovasi` (`penilaian_inovasi_id`, `inovasi_id`, `nip_juri`, `status_penilaian`, `saran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 123419, 1, 'Seperti pada model pertama, $value adalah nama variabel yang mewakili data value yang ada di dalam variabel $array. Kita juga bebas memberi nama variabel ini, umumnya nama yang digunakan adalah $value, $val, atau cukup $v', '2019-03-21 07:34:40', '2019-03-21 08:29:55', NULL),
(2, 8, 123419, 0, NULL, '2019-03-21 07:35:07', '2019-03-21 07:35:07', NULL),
(3, 5, 123419, 1, '2eeas1', '2019-03-21 08:00:04', '2019-03-21 08:44:30', NULL),
(4, 10, 123419, 1, NULL, '2019-03-21 08:00:04', '2019-03-27 07:52:12', NULL),
(5, 11, 123419, 1, NULL, '2019-03-21 08:00:04', '2019-03-21 10:07:18', NULL),
(6, 10, 1234, 1, NULL, '2019-03-24 12:31:15', '2019-03-26 20:42:48', NULL),
(7, 1, 1234, 1, NULL, '2019-03-26 20:28:59', '2019-03-27 03:27:45', NULL),
(8, 11, 1234, 0, NULL, '2019-03-26 20:28:59', '2019-03-26 20:28:59', NULL),
(9, 10, 123, 0, NULL, '2019-03-27 08:14:24', '2019-03-27 08:14:24', NULL),
(10, 11, 123, 0, NULL, '2019-03-27 08:14:25', '2019-03-27 08:14:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_anggotas`
--

CREATE TABLE `status_anggotas` (
  `status_anggota_id` int(10) UNSIGNED NOT NULL,
  `status_anggota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_anggotas`
--

INSERT INTO `status_anggotas` (`status_anggota_id`, `status_anggota`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ketua', '2019-03-10 22:43:34', '2019-03-10 22:43:34', NULL),
(2, 'Fasilitator', '2019-03-10 22:43:43', '2019-03-10 22:43:43', NULL),
(3, 'Anggota', '2019-03-10 22:43:50', '2019-03-10 22:43:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `stream_id` int(10) UNSIGNED NOT NULL,
  `nama_stream` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`stream_id`, `nama_stream`, `kategori_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tesStream', 0, '2019-03-17 20:57:05', '2019-03-18 19:02:47', '2019-03-18 19:02:47'),
(2, 'A', 1, '2019-03-18 19:19:30', '2019-03-18 19:19:30', NULL),
(3, 'B', 2, '2019-03-18 19:22:25', '2019-03-19 20:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategoris`
--

CREATE TABLE `sub_kategoris` (
  `sub_kategori_id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `nama_sub_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kategoris`
--

INSERT INTO `sub_kategoris` (`sub_kategori_id`, `kategori_id`, `nama_sub_kategori`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TPP TBG-RAW MILL', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(2, 1, 'TPP Kiln-packer', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(3, 1, 'MANAGEMENT', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(4, 1, 'PBB', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(5, 1, 'APA', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(6, 2, 'GKM', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(7, 2, 'PKM', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(8, 2, '5R/5P', 'Ceritanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya gratis).', '2019-03-08 19:31:00', NULL, NULL),
(9, 2, 'SS', 'itanya saat ini saya sendiri secara perlahan mulai meninggalkan penggunaan software bajakan (kalau tidak kepepet dan semoga istiqomah). Sejauh pengamatan saya, seringnya seorang programmer (superman yang bikin aplikasi web from zero to hero seorang diri) suka comot-comot template admin berbayar yang sudah di crack atau nulled (intinya', '2019-03-08 19:31:00', '2019-03-09 01:30:35', NULL),
(10, 1, 'tre', 'w', '2019-03-09 01:05:49', '2019-03-09 01:30:25', '2019-03-09 01:30:25'),
(11, 2, 'ini increa', 'sasfaaasasa', '2019-03-09 01:14:39', '2019-03-09 01:30:20', '2019-03-09 01:30:20'),
(12, 3, 'tea12', 'tes12', '2019-03-09 01:34:18', '2019-03-09 01:34:30', '2019-03-09 01:34:30'),
(13, 3, 'sd', 'asdadasasd', '2019-03-09 01:41:48', '2019-03-09 01:42:03', '2019-03-09 01:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `sub_kriteria_id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `sub_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`sub_kriteria_id`, `kriteria_id`, `sub_kriteria`, `rentang1`, `keterangan1`, `rentang2`, `keterangan2`, `rentang3`, `keterangan3`, `rentang4`, `keterangan4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'KREATIVITAS', '0 - 25', 'Belum ada penjelasan mengenai cara penggalian ide inovasi', '26 - 50', 'Telah menunjukkan penjelasan penggalian ide inovasi tetapi tidak ada kontribusi dari inovator dan tidak ada data pendukung yang meyakinkan', '51 - 75', 'Telah menunjukkan penjelasan  penggalian ide inovasi dengan minor kontribusi dari inovator dan dilengkapi dengan data pendukung yang meyakinkan', '76 - 100', 'Telah menunjukkan penjelasan penggalian ide inovasi dengan major kontribusi dari inovator dan dilengkapi dengan data pendukung yang meyakinkan', NULL, NULL, NULL),
(2, 1, 'KEBAHARUAN', '0 - 25', 'Ide inovasi yang diajukan sudah pernah diimplementasikan pada Semen Indonesia Group', '26 - 50', 'Ide inovasi yang diajukan sudah pernah diimplementasikan pada industri semen diluar SMIG', '51 - 75', 'Ide inovasi yang diajukan sudah pernah diimplementasikan pada industri diluar semen dan telah dimodifikasi', '76 - 100', 'Ide inovasi yang diajukan belum/sudah pernah diimplementasikan pada industri diluar semen dan telah dimodifikasi serta berpotensi untuk dipatenkan', NULL, NULL, NULL),
(3, 2, 'PERENCANAAN & IMPLEMENTASI', '0 - 25', 'Terdapat jadwal rencana implementasi secara umum', '26 - 50', 'Terdapat jadwal rencana implementasi dilengkapi:\r\ntimeline yang rinci (detail aktifitas)', '51 - 75', 'Terdapat jadwal rencana implementasi dilengkapi:\r\ntimeline & target milestone yang rinci', '76 - 100', 'Terdapat jadwal rencana implementasi dilengkapi:\r\ntimeline & target milestone secara rinci disertai rencana proses evaluasi tiap tahap', NULL, NULL, NULL),
(4, 2, 'RISIKO IMPLEMENTASI', '0 - 25', 'Belum ada identifikasi potensi risiko', '26 - 50', 'Identifikasi potensi risiko kurang tepat & lengkap sesuai rencana implementasi inovasi', '51 - 75', 'Identifikasi potensi risiko dilengkapi analisa risiko tetapi belum ada rencana mitigasi risiko', '76 - 100', 'Identifikasi potensi resiko dilengkapi analisa risiko secara rinci disertai  rencana mitigasi risiko', NULL, NULL, NULL),
(5, 2, 'KEMUDAHAN IMPLEMENTASI & REPLIKASI', '0 - 37', 'Ide inovasi tidak mudah diimplementasikan pada unit/obyek inovasi dan tidak dapat diadopsi di tempat lain', '38 - 75', 'Ide inovasi dapat diimplementasikan pada unit/obyek inovasi tetapi tidak dapat diadopsi di tempat lain', '76 - 113', 'Ide inovasi dapat diimplementasikan pada unit/obyek inovasi dan dapat diadopsi di tempat lain dengan membutuhkan penyesuaian major', '114 - 150', 'Ide inovasi dapat diimplementasikan pada unit/obyek inovasi dan dapat diadopsi di tempat lain dengan membutuhkan penyesuaian minor', NULL, NULL, NULL),
(6, 3, 'BENEFIT FINANSIAL PER TAHUN', '0 - 50', 'Benefit Finansial  sesuai tujuan kunci inovasi  dengan dilengkapi  Fairness Opinion yang memadai\r\nPotensi Benefit < 1 M\r\nReal Benefit 1 - 100 Jt', '51 - 100', 'Benefit Finansial  sesuai tujuan kunci inovasi  dengan dilengkapi  Fairness Opinion yang memadai\r\nPotensi Benefit > 1 M \r\nReal Benefit > 100 - 500 Jt ', '101 - 150', 'Benefit Finansial  sesuai tujuan kunci inovasi  dengan dilengkapi  Fairness Opinion yang memadai\r\nReal Benefit > 500 Jt - 1 M', '151 - 200', 'Benefit Finansial  sesuai tujuan kunci inovasi  dengan dilengkapi  Fairness Opinion yang memadai\r\nReal Benefit > 1 M', NULL, NULL, NULL),
(7, 3, 'BENEFIT NON FINANSIAL PER TAHUN', '0 - 25', 'Benefit Non Finansial tidak disebutkan', '26 - 50', 'Benefit Non Finansial telah disebutkan tetapi tidak eksplorasi dengan baik', '51 - 75', 'Benefit Non Finansial telah dieksplorasi dengan baik tetapi tidak dilengkapi dengan Fairness Opinion yang memadai', '76 - 100', 'Benefit Non Finansial telah dieksplorasi dengan baik dan dilengkapi dengan  Fairness Opinion yang memadai', NULL, NULL, NULL),
(8, 3, 'DAMPAK IMPLEMENTASI', '0 - 35', 'Dampak positif yang ditimbulkan oleh program inovasi hanya pada 1 Biro dalam 1 Divisi pada 1 SBU', '36 - 70', 'Dampak positif yang ditimbulkan oleh program inovasi terjadi pada beberapa Biro dalam 1 Departemen pada 1 SBU', '71 - 110', 'Dampak positif yang ditimbulkan oleh program inovasi terjadi pada beberapa Biro dalam beberapa Departemen pada 1 SBU', '111 - 150', 'Dampak positif yang ditimbulkan oleh program inovasi terjadi pada beberapa Biro dalam beberapa Departemen pada > 1 SBU', NULL, NULL, NULL),
(9, 4, 'KOMITMEN', '0 - 25', 'Belum ada komitmen di unit kerja', '26 - 50', 'Sudah ada komitmen di unit kerja melalui pembentukan struktur organisasi ', '51 - 75', 'Sudah  ada komitmen di unit kerja melalui pembentukan struktur organisasi dan membuat program kerja', '76 - 100', 'Sudah  ada komitmen di unit kerja melalui pembentukan struktur organisasi, membuat program kerja dan rancangan anggaran', NULL, NULL, NULL),
(10, 4, 'SOSIALISASI', '0 - 15', 'Tidak ada kegiatan sosialisasi 5R ', '16 - 30', 'Kegiatan sosialisasi telah dilaksanakan tetapi tidak secara periodik ', '31 - 45', 'Kegiatan sosialisasi telah dilaksanakan  secara periodik sesuai program kerja dan melibatkan seluruh personil kelompok kerja', '46 - 60', 'Kegiatan sosialisasi telah dilaksanakan  secara periodik sesuai program kerja dengan melibatkan seluruh personil kelompok kerja dan tercermin dalam sikap kerja', NULL, NULL, NULL),
(11, 4, ' PROGRAM KERJA', '0 - 22', 'Program kerja tidak disusun dalam sebuah jadwal ', '23 - 45', 'Program kerja telah disusun dalam sebuah jadwal dan melibatkan seluruh personil kelompok kerja ', '46 - 68', 'Program kerja telah disusun dalam sebuah jadwal dengan melibatkan seluruh personil kelompok kerja dan dilaksanakan secara efektif dan efisien', '69 - 90', 'Program kerja telah disusun dalam sebuah jadwal dengan melibatkan seluruh personil kelompok kerja dan dilaksanakan secara efektif dan efisien serta dilakukan evaluasi ', NULL, NULL, NULL),
(12, 5, 'R1 (RINGKAS)', '0 - 18', 'Belum ada aktifitas pemilahan', '19 - 37', 'Aktifitas pemilahan telah dilakukan di sebagian area', '38 - 56', 'Aktifitas pemilahan telah dilakukan di seluruh area ', '57 - 75', 'Aktifitas pemilahan telah dilakukan di seluruh area dan terdokumentasi ', NULL, NULL, NULL),
(13, 5, 'R2 (RAPI)', '0 - 18', 'Belum ada aktifitas labelisasi dan pemberian marka', '19 - 37', 'Telah dilaksanakan labelisasi dan pemberian marka ', '38 - 56', 'Telah dilaksanakan labelisasi, pemberian marka dan pengelolaan tata letak barang berdasarkan sifat maupun jenisnya', '57 - 75', 'Telah dilaksanakan labelisasi, pemberian marka dan pengelolaan tata letak barang berdasarkan sifat maupun jenisnya dan menerapkan prinsip efisiensi ', NULL, NULL, NULL),
(14, 5, 'R3 (RESIK)', '0 - 37', 'Aktifitas pembersihan hanya dilaksanakan di sebagian area kerja', '38 - 75', 'Aktifitas pembersihan  dilaksanakan di seluruh area kerja', '76 - 137', 'Aktifitas pembersihan  dilaksanakan secara periodik di seluruh area kerja ', '138 - 150', 'Aktifitas pembersihan  dilaksanakan secara periodik di seluruh area kerja dan melakukan upaya menghilangkan gangguan yang menghambat produktifitas ', NULL, NULL, NULL),
(15, 6, 'R4 (RAWAT)', '0 - 65', 'Belum ada aktifitas evaluasi pelaksanakan R1 - R3', '66 - 130', 'Evaluasi pelaksanakan R1 - R3 dilaksanakan secara periodik melalui kontrol manajemen', '131 - 195', 'Evaluasi pelaksanakan R1 - R3 dilaksanakan secara periodik  melalui kontrol manajemen dan pengecekan kondisi  dan terdokumentasi dalam bentuk nilai HKR & pencapaian kinerja unit kerja', '196 - 250', 'Evaluasi pelaksanakan R1 - R3 dilaksanakan melalui kontrol manajemen dan pengecekan kondisi secara periodik serta terdokumentasi dalam bentuk nilai HKR, pencapaian kinerja unit kerja dan bene', NULL, NULL, NULL),
(16, 6, 'Pencapaian Benefit Per Cycle', '0 - 25', 'Pencapaian Benefit : 1 - 19 juta', '26 - 50', 'Pencapaian Benefit : 20 - 34 juta', '51 - 75', 'Pencapaian Benefit : 35 - 50 juta', '76 - 100', 'Pencapaian Benefit : > 50 juta', NULL, NULL, NULL),
(17, 7, 'R5 (RAJIN)', '0 - 25', 'Belum ada standarisasi pelaksanaan R1 - R4 ', '26 -  50', 'Telah dibuat standarisasi pelaksanaan R1 - R4', '51 - 75', 'Telah dibuat standarisasi pelaksanaan R1 - R4 dan upaya menghilangkan unsafe condition & unsafe action', '76 - 100', 'Telah dibuat standarisasi pelaksanaan R1 - R4 dan upaya menghilangkan unsafe condition, unsafe action & kesalahan proses kerja', NULL, NULL, NULL),
(18, 4, 'LATAR BELAKANG MASALAH', '0 - 18', 'Belum ada penjelasan mengenai latar belakang masalah ', '19 - 37', 'Telah menunjukkan penjelasan latar belakang masalah yang dilengkapi dengan fakta  yang jelas', '38 - 56', 'Telah menunjukkan penjelasan  latar belakang masalah yang dilengkapi dengan fakta dan data valid yang jelas', '57 - 75', 'Telah menunjukkan penjelasan latar belakang masalah yang  dilengkapi dengan fakta dan data valid yang jelas serta  terklasifikasi', NULL, NULL, NULL),
(19, 4, 'TARGET PERBAIKAN', '0 - 18', 'Telah menetapkan target hasil dan waktu', '19 - 37', 'Telah menetapkan target hasil dan waktu tetapi Belum ada penjelasan mengenai  target yang telah ditetapkan', '38 - 56', 'Telah menetapkan target hasil dan waktu dan dilengkapi penjelasan  tetapi tidak memenuhi ketentuan SMART', '57 - 75', 'Telah menetapkan target hasil dan waktu dan dilengkapi penjelasan  serta memenuhi ketentuan SMART', NULL, NULL, NULL),
(20, 4, 'RENCANA PERBAIKAN', '0 - 25', 'Belum ada penjelasan mengenai penetapan rencana perbaikan ', '26 - 50', 'Telah menunjukkan penjelasan mengenai penetapan rencana perbaikan berdasarkan tingkat risiko ', '51 - 75', 'Telah menunjukkan penjelasan mengenai penetapan rencana perbaikan berdasarkan tingkat risiko & ketersediaan sumber daya', '76 - 100', 'Telah menunjukkan penjelasan mengenai penetapan rencana perbaikan berdasarkan tingkat risiko & ketersediaan sumber daya serta  mengutamakan efektifitas dan efisiensi', NULL, NULL, NULL),
(21, 5, 'UPAYA PELASANAAN PERBAIKAN', '0 - 56', 'Upaya perbaikan yang dilakukan tunggal dan dapat dilakukan secara mandiri', '57 - 113', 'Upaya perbaikan yang dilakukan > 1 dan membutuhkan bantuan pihak lain', '114 - 170', 'Upaya perbaikan yang dilakukan > 1 dan dapat dilakukan secara mandiri', '171 - 225', 'Upaya perbaikan yang dilakukan > 1 dan dapat dilakukan secara mandiri serta menambah  kompetensi personil', NULL, NULL, NULL),
(22, 5, 'PEMANTAUAN PROGRESS PERBAIKAN', '0 - 18', 'Pemantauan progress perbaikan tidak dilakukan', '19 - 37', 'Telah dilakukan pemantauan progress perbaikan dengan pencapaian hasil ? 50 %', '38 - 56', 'Telah dilakukan pemantauan progress perbaikan dengan hasil 51 - 95%', '57 - 75', 'Telah dilakukan pemantauan progress perbaikan dengan hasil  96 - 100 %', NULL, NULL, NULL),
(23, 6, 'PENCAPAIAN TARGET', '0 - 25', 'Pencapaian target hasil < 50 % dan tidak tepat waktu.', '26 - 50', 'Pencapaian target hasil antara  50 - 75 % dan tepat waktu', '51 - 75', 'Pencapaian target hasil  100 % dan tepat waktu', '76 - 100', 'Pencapaian target hasil >  100 % dan tepat waktu', NULL, NULL, NULL),
(24, 6, 'PENCAPAIAN BENEFIT', '0 - 25', 'Pencapaian benefit :  1 - 25 juta', '26 - 50', '\r\nPencapaian benefit : 26  - 50 juta', '51 - 75', 'Pencapaian benefit : 51 - 100 juta', '76 - 100', 'Pencapaian benefit : > 100 juta', NULL, NULL, NULL),
(25, 6, 'DAMPAK & PENANGGULANGANNYA', '0 - 37', 'Tidak mampu mengidentifikasi & tidak ada upaya untuk mengurangi dampak negatif ', '38 - 75', 'Mampu mengidentifikasi & tidak ada upaya untuk mengurangi dampak negatif ', '76 - 113', 'Mampu mengidentifikasi & ada upaya untuk mengurangi dampak negatif ', '114 - 150', 'Mampu mengidentifikasi & ada upaya untuk menghilangkan dampak negatif ', NULL, NULL, NULL),
(26, 7, 'STANDARISASI', '0 - 25', 'Hanya memiliki 1 dari 4 standar (input, proses, output & pemeliharaan), sudah dibakukan dan mampu menunjukkan pelaksanaan standar secara konsisten', '26 - 50', 'Hanya memiliki 2 dari 4 standar (input, proses, output & pemeliharaan), sudah dibakukan dan mampu menunjukkan pelaksanaan standar secara konsisten', '51 - 75', 'Hanya memiliki 3 dari 4 standar (input, proses, output & pemeliharaan), sudah dibakukan dan mampu menunjukkan pelaksanaan standar secara konsisten', '76 - 100', 'Memiliki  4 standar (input, proses, output & pemeliharaan), sudah dibakukan dan mampu menunjukkan pelaksanaan standar secara konsisten', NULL, NULL, NULL),
(27, 4, 'ANALISA PENYEBAB', '0 - 18 ', 'Proses & hasil analisa penyebab belum  tepat', '19 - 37', 'Hasil analisa penyebab sudah tepat namun proses analisa kurang benar', '38 - 56', 'Hasil & proses analisa penyebab sudah tepat dan benar tetapi kurang lengkap', '57 - 75', 'Hasil & proses analisa penyebab sudah tepat, benar dan lengkap', NULL, NULL, NULL),
(28, 7, 'MENETAPKAN MASALAH DAN TEMA BERIKUTNYA', '0 - 12', 'Belum ada penjelasan mengenai latar belakang masalah ', '13 - 25', 'Telah menunjukkan penjelasan latar belakang masalah yang dilengkapi dengan fakta yang jelas', '26 - 38 ', 'Telah menunjukkan penjelasan  latar belakang masalah yang dilengkapi dengan fakta dan data valid yang jelas', '39 - 50', 'Telah menunjukkan penjelasan latar belakang masalah yang  dilengkapi dengan fakta dan data valid yang jelas serta  terklasifikasi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tims`
--

CREATE TABLE `tims` (
  `tim_id` int(10) UNSIGNED NOT NULL,
  `nama_tim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` int(11) DEFAULT NULL,
  `nip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tims`
--

INSERT INTO `tims` (`tim_id`, `nama_tim`, `departemen`, `nip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'anie', 1, 123, '2019-03-10 21:26:52', '2019-03-10 21:26:52', NULL),
(2, 'tes tim', 1, 123, '2019-03-10 22:31:09', '2019-03-10 22:31:09', NULL),
(12, 'ini nama timedited', 1, 123, '2019-03-11 00:35:14', '2019-03-27 02:51:40', NULL),
(13, 'Tim3', 1, 123, '2019-03-16 18:04:41', '2019-03-16 18:04:41', NULL),
(14, 'tim4', 1, 123, '2019-03-17 20:01:28', '2019-03-17 20:01:28', NULL),
(15, 'F1', 1, 123, '2019-03-24 21:44:07', '2019-03-24 21:44:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_biro`
--

CREATE TABLE `unit_biro` (
  `unit_biro_id` int(10) NOT NULL,
  `departemen_id` int(11) NOT NULL,
  `unit_biro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_biro`
--

INSERT INTO `unit_biro` (`unit_biro_id`, `departemen_id`, `unit_biro`) VALUES
(1, 1, 'Humas & Kesekretariatan'),
(2, 1, 'CSR'),
(3, 1, 'Hukum $ GRC'),
(4, 1, 'Keamanan'),
(5, 2, 'Perencanaan & Evaluasi Produksi'),
(6, 2, 'Penunjang Produksi '),
(7, 2, 'Quality Control'),
(8, 3, 'Operasi Tambang'),
(9, 3, 'Produksi Bahan Baku'),
(10, 3, 'Perencanaan & Pengawasan Tambang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` int(50) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `jekel` int(11) NOT NULL,
  `unit_biro` int(11) NOT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `nama`, `email`, `password`, `role_id`, `jekel`, `unit_biro`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(123, 'dara', 'dara@email.com', '$2y$10$KSjILVqNo4qzd8Mb2kaRV.0zejwHc6EYq/y5DJaylBErwtw1G7S8K', 1, 1, 1, 1, 'O0VpSov1FTXr2ZTPfTiCkIYV5GVFUmyPCbJqDrqoYe8PKVurIVqAApHywf5c', '2019-03-08 01:32:28', '2019-03-08 01:32:28'),
(1234, 'juri2@a.com', 'juri2@a.com', '$2y$10$M9XInLmM6Sq2WuWvjY1XD.fkuV.AzBgwp2/Jo0otaipRiZ2z2QoKe', 1, 2, 1, 123, '84kT4EjE9WHJZrMRUy41nH7McK9Wlbj3p2Xdteknd2sAU192COtYSpb4FAcp', '2019-03-24 05:26:47', '2019-03-24 05:26:47'),
(23424, 'anie', 'dara@example.com', '$2y$10$0xvEFXeEpyi7Vf4KE.Ikg.XKBuAcnK71LECaJzsFLV93Lmq5M.ndW', 0, 1, 1, 1, 'I07pyvsxvhFS7hpbiA4CXqiTxumcrBCK2uwHrq9AiUNjz5eOiPOoaNYunR6K', '2019-03-11 00:34:49', '2019-03-11 00:34:49'),
(81879, 'Gary Vaynerchuk', 'gary@email.com', '$2y$10$LHk/N59YRTsWAKcfsNR4VeRx6yqPwvvdbaiQSexHEpheDFdNjo6tO', 1, 0, 2, NULL, NULL, '2019-03-27 19:26:16', '2019-03-27 19:26:16'),
(123419, 'juri', 'juri@a.com', '$2y$10$qTWbu2NaJ.dJOdymeTpOz.87//n1KXnSKqUD1hh93WmK3lqQSZ.7C', 1, 2, 1, 1, 'jT8GBq4wbgGvVesGCK2pvuSbVuyIDwrFm4eKgX9n5DKOTGDSx1JgAqTRsjyn', '2019-03-14 18:18:14', '2019-03-14 18:18:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tims`
--
ALTER TABLE `anggota_tims`
  ADD PRIMARY KEY (`anggota_tim_id`),
  ADD KEY `anggota_tims_status_anggota_id_foreign` (`status_anggota_id`),
  ADD KEY `anggota_tims_nip_index` (`nip`),
  ADD KEY `anggota_tims_tim_id_index` (`tim_id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indexes for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inovasi_id` (`penilaian_inovasi_id`),
  ADD KEY `krikat_id` (`krikat_id`);

--
-- Indexes for table `inovasis`
--
ALTER TABLE `inovasis`
  ADD PRIMARY KEY (`inovasi_id`),
  ADD KEY `inovasis_tim_id_foreign` (`tim_id`),
  ADD KEY `inovasis_sub_kategori_id_foreign` (`sub_kategori_id`),
  ADD KEY `inovasis_nip_inisiator_index` (`nip_inisiator`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `juris`
--
ALTER TABLE `juris`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `juris_kategori_id_foreign` (`kategori_id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kendalas`
--
ALTER TABLE `kendalas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteraia_kategori_penilaians`
--
ALTER TABLE `kriteraia_kategori_penilaians`
  ADD PRIMARY KEY (`kriteria_katategori_id`),
  ADD KEY `kriteraia_kategori_penilaians_sub_kriteria_id_foreign` (`sub_kriteria_id`),
  ADD KEY `kriteraia_kategori_penilaians_sub_kategori_id_foreign` (`sub_kategori_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`kriteria_id`),
  ADD KEY `kriterias_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaian_inovasi`
--
ALTER TABLE `penilaian_inovasi`
  ADD PRIMARY KEY (`penilaian_inovasi_id`),
  ADD KEY `nip_juri` (`nip_juri`),
  ADD KEY `inovasi_id` (`inovasi_id`);

--
-- Indexes for table `status_anggotas`
--
ALTER TABLE `status_anggotas`
  ADD PRIMARY KEY (`status_anggota_id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`stream_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `sub_kategoris`
--
ALTER TABLE `sub_kategoris`
  ADD PRIMARY KEY (`sub_kategori_id`),
  ADD KEY `sub_kategoris_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`sub_kriteria_id`),
  ADD KEY `sub_kriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `tims`
--
ALTER TABLE `tims`
  ADD PRIMARY KEY (`tim_id`),
  ADD KEY `tims_nip_index` (`nip`),
  ADD KEY `departemen` (`departemen`);

--
-- Indexes for table `unit_biro`
--
ALTER TABLE `unit_biro`
  ADD PRIMARY KEY (`unit_biro_id`),
  ADD KEY `departemen_id` (`departemen_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `unit_biro` (`unit_biro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tims`
--
ALTER TABLE `anggota_tims`
  MODIFY `anggota_tim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `inovasis`
--
ALTER TABLE `inovasis`
  MODIFY `inovasi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `kategori_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kendalas`
--
ALTER TABLE `kendalas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteraia_kategori_penilaians`
--
ALTER TABLE `kriteraia_kategori_penilaians`
  MODIFY `kriteria_katategori_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `kriteria_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penilaian_inovasi`
--
ALTER TABLE `penilaian_inovasi`
  MODIFY `penilaian_inovasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_anggotas`
--
ALTER TABLE `status_anggotas`
  MODIFY `status_anggota_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `stream_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_kategoris`
--
ALTER TABLE `sub_kategoris`
  MODIFY `sub_kategori_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `sub_kriteria_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tims`
--
ALTER TABLE `tims`
  MODIFY `tim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unit_biro`
--
ALTER TABLE `unit_biro`
  MODIFY `unit_biro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_tims`
--
ALTER TABLE `anggota_tims`
  ADD CONSTRAINT `anggota_tims_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`),
  ADD CONSTRAINT `anggota_tims_status_anggota_id_foreign` FOREIGN KEY (`status_anggota_id`) REFERENCES `status_anggotas` (`status_anggota_id`);

--
-- Constraints for table `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD CONSTRAINT `detail_penilaian_ibfk_3` FOREIGN KEY (`krikat_id`) REFERENCES `kriteraia_kategori_penilaians` (`kriteria_katategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_ibfk_4` FOREIGN KEY (`penilaian_inovasi_id`) REFERENCES `penilaian_inovasi` (`penilaian_inovasi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inovasis`
--
ALTER TABLE `inovasis`
  ADD CONSTRAINT `inovasis_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inovasis_nip_inisiator_foreign` FOREIGN KEY (`nip_inisiator`) REFERENCES `users` (`nip`),
  ADD CONSTRAINT `inovasis_sub_kategori_id_foreign` FOREIGN KEY (`sub_kategori_id`) REFERENCES `sub_kategoris` (`sub_kategori_id`),
  ADD CONSTRAINT `inovasis_tim_id_foreign` FOREIGN KEY (`tim_id`) REFERENCES `tims` (`tim_id`);

--
-- Constraints for table `juris`
--
ALTER TABLE `juris`
  ADD CONSTRAINT `juris_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `juris_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`),
  ADD CONSTRAINT `juris_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`);

--
-- Constraints for table `kriteraia_kategori_penilaians`
--
ALTER TABLE `kriteraia_kategori_penilaians`
  ADD CONSTRAINT `kriteraia_kategori_penilaians_sub_kategori_id_foreign` FOREIGN KEY (`sub_kategori_id`) REFERENCES `sub_kategoris` (`sub_kategori_id`),
  ADD CONSTRAINT `kriteraia_kategori_penilaians_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriterias` (`sub_kriteria_id`);

--
-- Constraints for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD CONSTRAINT `kriterias_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`);

--
-- Constraints for table `penilaian_inovasi`
--
ALTER TABLE `penilaian_inovasi`
  ADD CONSTRAINT `penilaian_inovasi_ibfk_1` FOREIGN KEY (`inovasi_id`) REFERENCES `inovasis` (`inovasi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_inovasi_ibfk_2` FOREIGN KEY (`nip_juri`) REFERENCES `juris` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kategoris`
--
ALTER TABLE `sub_kategoris`
  ADD CONSTRAINT `sub_kategoris_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`kategori_id`);

--
-- Constraints for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`kriteria_id`);

--
-- Constraints for table `tims`
--
ALTER TABLE `tims`
  ADD CONSTRAINT `tims_ibfk_1` FOREIGN KEY (`departemen`) REFERENCES `departemen` (`departemen_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tims_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`);

--
-- Constraints for table `unit_biro`
--
ALTER TABLE `unit_biro`
  ADD CONSTRAINT `unit_biro_ibfk_1` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`departemen_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`unit_biro`) REFERENCES `unit_biro` (`unit_biro_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
