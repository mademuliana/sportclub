-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 05:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sport_club_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` int(11) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_sportclub` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `id_user`, `id_sportclub`, `id_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 11, 1, 1, '2020-05-29 14:00:15', '2020-06-19 01:39:41', NULL),
(23, 11, 2, 2, '2020-05-29 14:00:15', '2020-06-14 19:38:57', NULL),
(24, 11, 3, 1, '2020-05-29 14:00:15', '2020-06-21 20:27:31', NULL),
(27, 12, 3, 2, '2020-05-29 14:00:15', '2020-07-07 20:43:07', NULL),
(28, 21, 1, 2, '2020-05-29 14:00:15', '2020-06-19 01:39:41', NULL),
(29, 12, 5, 2, '2020-05-29 14:00:15', '2020-05-30 03:50:13', NULL),
(30, 12, 8, 1, '2020-05-29 14:00:15', '2020-06-19 01:46:54', NULL),
(32, 12, 1, 1, '2020-05-30 02:46:07', '2020-06-24 04:49:57', NULL),
(33, 12, 2, 1, '2020-05-30 02:48:44', '2020-06-19 01:46:37', NULL),
(36, 22, 1, 1, '2020-05-30 09:36:32', '2020-06-19 01:39:41', NULL),
(37, 22, 2, 2, '2020-05-31 01:47:53', '2020-05-31 01:51:02', NULL),
(40, 23, 1, 2, '2020-06-02 18:27:53', '2020-06-19 01:39:41', NULL),
(41, 12, 9, 1, '2020-06-14 06:12:31', '2020-06-19 01:47:04', NULL),
(42, 27, 11, 2, '2020-06-19 21:02:31', '2020-06-19 21:23:00', '2020-06-20 04:45:31'),
(43, 27, 9, 1, '2020-06-19 21:02:46', '2020-06-19 21:23:00', NULL),
(44, 23, 2, 1, '2020-06-24 04:41:33', '2020-06-24 04:41:33', NULL),
(45, 27, 15, 1, '2020-07-07 01:48:57', '2020-07-06 18:51:51', '2020-07-06 18:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_club` int(11) NOT NULL,
  `condition` tinyint(1) NOT NULL,
  `price` varchar(255) NOT NULL,
  `time_purchased` date NOT NULL,
  `information` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `name`, `id_club`, `condition`, `price`, `time_purchased`, `information`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'inventaris A', 1, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-06-19 01:39:41', NULL),
(4, 'inventaris B', 1, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-06-19 01:39:41', NULL),
(5, 'inventaris C', 1, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-06-19 01:39:41', NULL),
(6, 'inventaris A', 2, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', NULL, NULL),
(7, 'inventaris B', 2, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', NULL, NULL),
(8, 'inventaris D', 1, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-06-19 01:39:41', NULL),
(9, 'inventaris B', 3, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:43:07', NULL),
(10, 'inventaris C', 3, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:43:07', NULL),
(11, 'inventaris D', 3, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:43:07', NULL),
(12, 'inventaris A', 4, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:42:18', NULL),
(13, 'inventaris C', 5, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', NULL, NULL),
(14, 'inventaris D', 5, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', NULL, NULL),
(15, 'inventaris C', 6, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', NULL, NULL),
(16, 'inventaris D', 7, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:50:07', NULL),
(17, 'inventaris C', 7, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:50:07', NULL),
(18, 'inventaris A', 8, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:49:54', NULL),
(19, 'inventaris D', 8, 2, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:49:54', NULL),
(20, 'inventaris A', 9, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:42:34', NULL),
(21, 'inventaris B', 9, 1, '1000', '2019-10-10', 'information', '2020-05-29 13:57:01', '2020-07-07 20:42:34', NULL),
(22, 'inventaris D', 9, 2, '1000', '1990-11-01', 'information', '2020-05-29 13:57:01', '2020-07-07 20:42:34', NULL),
(23, 'Inventaris 1', 1, 1, '50000', '2019-10-10', 'bagus', '2020-05-30 09:32:22', '2020-06-19 01:39:41', NULL),
(24, 'inventaris 2', 1, 2, '100000', '1010-09-09', 'bagus', '2020-05-30 09:32:44', '2020-06-19 01:39:41', NULL),
(25, 'asdads', 1, 1, '1212', '1212-12-12', '1212', '2020-05-30 09:32:58', '2020-05-31 01:57:14', NULL),
(26, 'inventaris 1 edit', 1, 1, '5000', '2019-10-10', 'KeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeteranganKeterangan', '2020-05-31 01:53:44', '2020-05-31 01:56:11', NULL),
(27, 'adsadasdasdasdasd', 1, 2, '121221', '2019-10-10', 'sdsdds', '2020-05-31 01:56:53', '2020-05-31 01:57:05', NULL),
(28, 'nur', 11, 1, '500000', '2020-02-20', 'nur', '2020-06-19 21:03:10', '2020-06-19 21:23:00', '2020-06-20 04:45:50'),
(29, 'aa', 15, 1, '12121', '2020-07-01', 'aaaaa', '2020-07-07 01:51:22', '2020-07-06 18:51:51', '2020-07-06 18:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(2) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `place` text NOT NULL,
  `activity_status` int(1) NOT NULL,
  `budget` int(15) NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `budget_approved` int(20) NOT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  `poster` varchar(255) NOT NULL,
  `information` text DEFAULT NULL,
  `data_absen` varchar(255) DEFAULT NULL,
  `kwitansi` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `id_club`, `name`, `type`, `date`, `start_time`, `finish_time`, `place`, `activity_status`, `budget`, `is_approved`, `budget_approved`, `proposal`, `poster`, `information`, `data_absen`, `kwitansi`, `reason`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(49, 1, 'event badminton 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:01', '2020-06-19 01:39:41', NULL),
(50, 1, 'event badminton 2', 2, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:02', '2020-06-19 01:39:41', NULL),
(51, 2, 'event volly 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:04', NULL, NULL),
(53, 2, 'event volly 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:06', NULL, NULL),
(54, 3, 'event futsal 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:08', '2020-07-07 20:43:07', NULL),
(55, 3, 'event futsal 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:10', '2020-07-07 20:43:07', NULL),
(56, 4, 'event tenis lapangan 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:13', '2020-07-07 20:42:18', NULL),
(57, 4, 'event tenis lapangan 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:14', '2020-07-07 20:42:18', NULL),
(58, 5, 'event senam 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:16', NULL, NULL),
(59, 5, 'event senam 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:18', NULL, NULL),
(60, 6, 'event tenis meja 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:20', NULL, NULL),
(61, 6, 'event tenis meja 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:24', NULL, NULL),
(62, 7, 'event lari 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:26', '2020-07-07 20:50:07', NULL),
(63, 7, 'event lari 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:28', '2020-07-07 20:50:07', NULL),
(64, 8, 'event panahan 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:30', '2020-07-07 20:49:54', NULL),
(65, 8, 'event panahan 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:34', '2020-07-07 20:49:54', NULL),
(66, 9, 'event gowes 1', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 2, 0, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:35', '2020-07-07 20:42:34', NULL),
(67, 9, 'event gowes 2', 1, '2020-06-30', '20:47:27', '22:47:27', 'tempat A', 0, 50000, 1, 1211212, NULL, 'sport_banner.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:37', '2020-07-07 20:42:34', NULL),
(68, 1, 'assa', 2, '2020-12-12', '09:00:00', '10:10:00', 'asasas', 1, 50000, 1, 0, NULL, '7130rutin5896cfbb480411.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:40', '2020-05-30 09:22:50', NULL),
(69, 1, 'asas12112', 2, '2020-12-05', '10:00:00', '10:10:00', 'asaswdaawdawdawd', 1, 0, 1, 0, NULL, '8781poster_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:42', '2020-06-19 01:39:41', NULL),
(70, 1, 'ini judul', 1, '2020-06-21', '09:00:00', '10:10:00', 'tempat', 1, 50000, 1, 0, '8666insiden[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '5201insidenposter_sport_club.jpg', 'keterangan', '2997[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '703[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', 'asas', 1, '2020-07-21 02:33:44', '2020-06-19 01:39:41', NULL),
(71, 1, 'judul edit', 2, '2020-10-10', '09:00:00', '10:10:00', 'tempat edit', 1, 0, 1, 0, NULL, '8952rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:47', '2020-05-31 01:41:54', NULL),
(72, 1, 'judul edit', 1, '2020-10-09', '09:00:00', '10:10:00', 'tempat edit', 1, 500000, 0, 0, '8331insiden01ProjectDefinition_RandomParaTeam_D3RPLA-41-02.pdf', '1585insidenposter_sport_club.jpg', 'keterangan', NULL, NULL, NULL, 1, '2020-07-21 02:33:49', '2020-05-31 01:42:01', NULL),
(73, 1, 'judul 1', 2, '2020-10-09', '09:10:00', '10:10:00', 'judul 1', 1, 0, 1, 0, NULL, '8667rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:33:50', '2020-05-31 01:42:40', NULL),
(74, 1, 'judul 1', 1, '2020-10-09', '09:00:00', '10:10:00', 'tempat', 1, 5000, 0, 0, '9624insiden[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '9049insidenposter_sport_club.jpg', 'ket', NULL, NULL, NULL, 1, '2020-07-21 02:33:52', '2020-05-31 01:42:32', NULL),
(75, 9, 'judul', 2, '2020-12-12', '09:00:00', '10:10:00', 'tempat', 1, 0, 1, 0, NULL, '769rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:34:01', '2020-07-07 20:42:34', NULL),
(76, 3, 'asas', 2, '2020-10-10', '09:00:00', '10:10:00', 'asas', 1, 0, 1, 0, NULL, '7911rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:34:02', '2020-07-07 20:43:07', NULL),
(77, 2, 'asas', 1, '2020-10-10', '09:10:00', '10:10:00', 'asasas', 1, 121212, 1, 50000, '187insiden[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '1953insidenposter_sport_club.jpg', '1212', NULL, NULL, NULL, 1, '2020-07-21 02:34:04', '2020-06-24 18:35:48', NULL),
(78, 11, 'nur', 2, '2020-06-19', '09:00:00', '10:10:00', 'nur', 1, 0, 1, 0, NULL, '381rutinposter_sport_club.jpg', NULL, '832[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '3016[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', NULL, 1, '2020-07-21 02:34:07', '2020-06-19 21:35:51', '2020-06-20 04:48:55'),
(79, 11, 'nur', 1, '2020-06-19', '09:00:00', '10:10:00', 'nur', 1, 50000, 0, 0, '7378insiden[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '9666insidenposter_sport_club.jpg', 'nur', NULL, NULL, NULL, 1, '2020-07-21 02:34:09', '2020-06-19 21:23:00', '2020-06-20 04:49:01'),
(80, 2, 'Rutin volly #1', 2, '2020-07-20', '09:00:00', '10:00:00', 'Lap. Volly', 1, 0, 1, 0, NULL, '2276rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:34:11', '2020-06-24 18:34:13', NULL),
(81, 2, 'Volly #2', 1, '2020-07-01', '09:00:00', '10:10:00', 'Lap. Volly', 1, 500000, 1, 50000, '7557insiden[REVISI]_Pembahasan_Responsi_Analisis_Perancangan_Sistem_dan_Informasi.pdf', '5804insidenposter_sport_club.jpg', 'Keterangan', NULL, NULL, NULL, 1, '2020-07-21 02:34:12', '2020-06-24 18:38:31', NULL),
(82, 14, 'asas', 2, '2020-10-10', '09:00:00', '10:10:00', 'asas', 1, 0, 1, 0, NULL, '2369rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:34:15', '2020-07-06 18:41:56', '2020-07-06 18:41:56'),
(83, 15, 'asas', 2, '2020-06-02', '09:00:00', '10:10:00', 'asas', 1, 0, 1, 0, NULL, '2277rutinposter_sport_club.jpg', NULL, NULL, NULL, NULL, 1, '2020-07-21 02:34:16', '2020-07-06 18:51:51', '2020-07-06 18:51:51');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `presensis`
--

CREATE TABLE `presensis` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensis`
--

INSERT INTO `presensis` (`id`, `id_anggota`, `id_kegiatan`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 22, 70, 2, '2020-05-29 14:04:14', NULL, NULL),
(14, 28, 70, 2, '2020-05-29 14:04:14', '2020-05-31 01:59:37', NULL),
(16, 23, 70, 2, '2020-05-29 14:04:14', '2020-05-31 01:59:37', NULL),
(18, 27, 50, 1, '2020-05-29 14:04:14', NULL, NULL),
(19, 24, 55, 1, '2020-05-29 13:18:34', '2020-06-14 06:45:31', NULL),
(20, 29, 59, 1, '2020-05-30 02:46:40', '2020-06-24 03:57:42', NULL),
(21, 22, 69, 1, '2020-05-30 08:11:49', '2020-06-14 19:54:39', NULL),
(22, 36, 69, 1, '2020-05-31 01:50:04', '2020-05-31 01:50:24', NULL),
(23, 43, 78, 2, '2020-06-19 21:05:53', '2020-06-19 21:35:51', NULL),
(25, 27, 76, 1, '2020-06-24 03:57:05', '2020-06-24 04:40:56', NULL),
(26, 29, 58, 1, '2020-06-24 03:57:47', '2020-06-24 03:57:47', NULL),
(27, 27, 55, 1, '2020-06-24 03:58:01', '2020-06-24 03:58:01', NULL),
(28, 27, 54, 1, '2020-06-24 03:58:06', '2020-07-07 20:43:07', NULL),
(29, 22, 73, 1, '2020-06-24 03:59:36', '2020-06-24 03:59:36', NULL),
(30, 22, 68, 1, '2020-06-24 03:59:46', '2020-06-24 03:59:46', NULL),
(31, 40, 73, 1, '2020-06-24 18:42:04', '2020-06-24 18:42:04', NULL),
(32, 40, 71, 1, '2020-06-24 18:42:11', '2020-06-24 18:42:11', NULL),
(33, 45, 83, 2, '2020-07-07 01:50:44', '2020-07-06 18:51:51', '2020-07-06 18:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `sport__clubs`
--

CREATE TABLE `sport__clubs` (
  `id` int(11) NOT NULL,
  `pic` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport__clubs`
--

INSERT INTO `sport__clubs` (`id`, `pic`, `name`, `description`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 23, 'Badminton', 'Badminton Adalah', 1, '2020-07-21 02:36:49', '2020-06-19 01:39:41', NULL),
(2, 14, 'Bola Volly', 'Bola Volly adalah', 1, '2020-07-21 02:36:51', '2020-05-29 06:42:58', NULL),
(3, 24, 'Futsal', 'Futsal adalah', 1, '2020-07-21 02:36:53', '2020-07-07 20:43:07', NULL),
(4, 16, 'Tenis Lapangan', 'Tenis Lapangan Adalah', 1, '2020-07-21 02:36:54', '2020-07-07 20:42:18', NULL),
(5, 17, 'Senam ', 'Senam Adalah', 1, '2020-07-21 02:36:56', '2020-05-29 06:44:16', NULL),
(6, 18, 'Tenis Meja', 'Tenis Meja Adalah', 1, '2020-07-21 02:36:58', '2020-05-29 06:44:42', NULL),
(7, 19, 'Lari', 'Lari Adalah', 1, '2020-07-21 02:37:00', '2020-07-07 20:50:07', NULL),
(8, 20, 'Panahan', 'Panahan adalah', 1, '2020-07-21 02:37:02', '2020-07-07 20:49:54', NULL),
(9, 21, 'Gowes', 'Gowes adalah', 1, '2020-07-21 02:37:03', '2020-07-07 20:42:34', NULL),
(10, 22, 'sport club 3', 'sport club 3', 1, '2020-07-21 02:37:05', '2020-07-06 18:40:40', '2020-07-06 18:40:40'),
(11, 27, 'nur', 'nur', 0, '2020-06-20 04:45:38', '2020-06-19 21:23:00', '2020-06-20 04:45:39'),
(13, 27, 'aa', 'aaa', 0, '2020-07-07 01:40:24', '2020-07-06 18:40:24', '2020-07-06 18:40:24'),
(14, 27, 'aa', 'aa', 0, '2020-07-07 01:41:56', '2020-07-06 18:41:56', '2020-07-06 18:41:56'),
(15, 27, 'aa', 'aaa', 0, '2020-07-07 01:51:51', '2020-07-06 18:51:51', '2020-07-06 18:51:51'),
(16, 27, 'asas', 'asas', 0, '2020-07-08 07:23:13', '2020-07-08 00:17:11', '2020-07-01 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `personal_contact` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `unit`, `nip`, `address`, `role`, `personal_contact`, `place_of_birth`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(11, 'member', 'member', 'member@member.com', NULL, '$2y$10$V0C3bJS5nuOxmy30tPmUZuG3BRSkgPkjDGGArFoMJK/TOeZm6QhgK', NULL, 'LAC', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:40:40', '2020-05-29 06:40:40'),
(12, 'super', 'super', 'super@super.com', NULL, '$2y$10$tu7OGIIOt4/m5f9G5FTgTOQe1bcIz8wamy1OUeZ1oQxY7uWtjvZ4m', NULL, 'SDM', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 1, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:41:50', '2020-05-29 06:41:50'),
(14, 'volly', 'volly', 'volly@volly.com', NULL, '$2y$10$D4nX9rhk4/E5zI9K29llkucmTzRGay.FeV2LeSprp7BwAI/mO1wQq', NULL, 'FTE', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 2, '08159553311', 'Jakarta', '1990-11-01', '2020-05-29 06:42:58', '2020-05-29 06:42:58'),
(16, 'tenis_l', 'tenis_l', 'tenis_l@tenisl.com', NULL, '$2y$10$Un3FE8HziLOeT/k35xOin.divKAhXU.yNBhJb.stwjFgg5GRkeHWC', NULL, 'FEB', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:43:58', '2020-07-07 20:42:18'),
(17, 'senam', 'senam', 'senam@senam', NULL, '$2y$10$ZpkXr2zzUgdoEvWvjV96LeLPxaz/jblV3qH3A4.kMZtOuH6yrUBEq', NULL, 'FKB', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 2, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:44:16', '2020-05-29 06:44:16'),
(18, 'tenis_m', 'tenis_m', 'tenis_m@tenism.com', NULL, '$2y$10$QlYjAEvuUEb4aWFyG81TbOkzbUkqOFsvM32sTG/CeRGBhj2OIojsi', NULL, 'FRI', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 2, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:44:42', '2020-05-29 06:44:42'),
(19, 'lari', 'lari', 'lari@lari.com', NULL, '$2y$10$U4rxbW49H/Bzl1CMZJOcW.Aa5rUCZDMpul39MyfmObFY.W6tut3ue', NULL, 'FIT', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:45:02', '2020-07-07 20:50:07'),
(20, 'panahan', 'panahan', 'panahan@panahan.com', NULL, '$2y$10$VxnBU5mg2vnGO9EDQQNK6uD86TbWUb2s/0p.ooyCO4G/MBGai58Za', NULL, 'FIK', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:45:20', '2020-07-07 20:49:54'),
(21, 'gowes', 'gowes', 'gowes@gowes.com', NULL, '$2y$10$0ZpmCjTZkUdn6fwMhxRMA.GomzcH2BjMX8oLK6uE3.uUhLIbMQPhe', NULL, 'FTE', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-29 06:45:44', '2020-07-07 20:42:34'),
(22, 'luthfi', 'luthfi', 'luthfi@gmail.com', NULL, '$2y$10$nMgEfwc.FoFPdJo8M.Y48.1JLv80yCQvIqdUGcB.sqFt20zAfI7Ia', NULL, 'FIF', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 3, '081595533111', 'Jakarta', '1990-11-01', '2020-05-30 02:45:34', '2020-07-06 18:40:40'),
(23, 'pic badminton', 'badminton', 'badminton@gmail.com', NULL, '$2y$10$uA1.iVpxCdDjrhiaqSm4gOc/xTF9KPkqp/5g5c.IxLw78wWdWhZam', NULL, 'FIF', '6706170054', 'Jalan Marzuki 19 Gang Kesadaran 20 RT 08/01 No. 60 13940', 2, '081595533111\r\n', 'Jakarta', '1990-11-01', '2020-05-30 10:36:46', '2020-05-30 10:36:46'),
(24, 'pic futsal', 'futsal', 'futsal@gmail.com', NULL, '$2y$10$NbbRrE4nvdDkaPgSOKLF1ubXUoAKlA38TbYaky/fOEJVJyNEvurP2', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '2020-05-30 10:37:50', '2020-07-07 20:43:07'),
(25, 'asddas', 'username', 'a@gmail.com', NULL, '$2y$10$v9IU4ux86eSk9EygNjpjHu78/n95ENEuMrMa5E/RVql82Ctel7Wje', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-31 05:01:58', '2020-05-31 05:01:58'),
(27, 'nur', 'nur', 'nur@gmail.com', NULL, '$2y$10$dFKe/F5hs2t6xYmyN/vLRuhwXGQT6GAs1B43xb1N5tW5yk2EzQn8K', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2020-06-19 20:59:01', '2020-07-08 00:17:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sportclub` (`id_sportclub`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_user_3` (`id_user`),
  ADD KEY `id_sportclub_2` (`id_sportclub`),
  ADD KEY `id_user_4` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_club` (`id_club`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_club` (`id_club`);

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
-- Indexes for table `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `sport__clubs`
--
ALTER TABLE `sport__clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`pic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sport__clubs`
--
ALTER TABLE `sport__clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_ibfk_2` FOREIGN KEY (`id_sportclub`) REFERENCES `sport__clubs` (`id`),
  ADD CONSTRAINT `anggotas_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `sport__clubs` (`id`);

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `sport__clubs` (`id`);

--
-- Constraints for table `presensis`
--
ALTER TABLE `presensis`
  ADD CONSTRAINT `presensis_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatans` (`id`),
  ADD CONSTRAINT `presensis_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
