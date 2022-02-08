-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 07:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigntasks`
--

CREATE TABLE `assigntasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigntasks`
--

INSERT INTO `assigntasks` (`id`, `user_id`, `project_id`, `task_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, '2', '4', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(3, 2, '2', '5', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(4, 2, '2', '6', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(5, 2, '2', '7', '1', '2022-01-24 14:49:46', '2022-02-03 10:48:46'),
(6, 2, '2', '8', '1', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(7, 2, '2', '9', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(8, 2, '2', '10', '0', '2022-01-24 14:49:46', '2022-02-03 10:46:33'),
(9, 2, '2', '11', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(10, 2, '2', '12', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(11, 2, '2', '13', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(12, 2, '2', '14', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(15, 2, '2', '17', '0', '2022-01-24 14:49:46', '2022-01-24 14:49:46'),
(17, 4, '7', '2', '1', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(18, 4, '7', '4', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(19, 4, '7', '5', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(20, 4, '7', '6', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(21, 4, '7', '7', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(22, 4, '7', '8', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(23, 4, '7', '9', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(24, 4, '7', '10', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(25, 4, '7', '11', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(26, 4, '7', '12', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(27, 4, '7', '13', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(28, 4, '7', '14', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(29, 4, '7', '15', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(31, 4, '7', '17', '0', '2022-01-24 14:50:19', '2022-01-24 14:50:19'),
(33, 3, '2', '2', '0', '2022-02-02 19:48:24', '2022-02-02 19:48:24'),
(34, 3, '2', '4', '0', '2022-02-02 19:48:24', '2022-02-02 19:48:24'),
(35, 3, '2', '5', '1', '2022-02-02 19:48:24', '2022-02-02 19:48:24'),
(36, 3, '2', '7', '0', '2022-02-02 19:48:24', '2022-02-02 19:48:24'),
(37, 3, '2', '14', '0', '2022-02-02 19:48:24', '2022-02-02 19:48:24'),
(39, 2, '7', '2', '0', '2022-02-02 20:54:17', '2022-02-02 20:54:17'),
(40, 2, '7', '4', '0', '2022-02-02 20:54:17', '2022-02-02 20:54:17'),
(41, 2, '7', '5', '1', '2022-02-02 20:54:17', '2022-02-03 10:49:39'),
(42, 2, '7', '8', '1', '2022-02-02 20:54:17', '2022-02-03 10:49:37'),
(43, 2, '7', '9', '0', '2022-02-02 20:54:17', '2022-02-02 20:54:17'),
(44, 2, '6', '2', '0', '2022-02-02 21:01:52', '2022-02-02 21:01:52'),
(45, 2, '6', '4', '0', '2022-02-02 21:01:52', '2022-02-02 21:01:52'),
(46, 2, '6', '5', '0', '2022-02-02 21:01:52', '2022-02-02 21:01:52'),
(47, 2, '6', '8', '0', '2022-02-02 21:01:52', '2022-02-02 21:01:52'),
(48, 2, '6', '9', '1', '2022-02-02 21:01:52', '2022-02-02 21:01:52'),
(49, 2, '2', '17', '1', '2022-02-03 10:48:27', '2022-02-05 18:34:14'),
(53, 4, '11', '5', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(54, 4, '11', '6', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(55, 4, '11', '7', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(56, 4, '11', '8', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(57, 4, '11', '9', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(58, 4, '11', '10', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(59, 4, '11', '11', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(60, 4, '11', '12', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(61, 4, '11', '13', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(62, 4, '11', '14', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(63, 4, '11', '15', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(64, 4, '11', '16', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(65, 4, '11', '17', '0', '2022-02-05 18:22:42', '2022-02-05 18:22:42'),
(66, 4, '11', '2', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(67, 4, '11', '4', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(68, 4, '11', '5', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(69, 4, '11', '6', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(70, 4, '11', '7', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(71, 4, '11', '8', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(72, 4, '11', '9', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(73, 4, '11', '10', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(76, 4, '11', '13', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(77, 4, '11', '14', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(78, 4, '11', '15', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(79, 4, '11', '16', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(80, 4, '11', '17', '0', '2022-02-05 18:52:44', '2022-02-05 18:52:44'),
(81, 2, '14', '2', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(82, 2, '14', '4', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(83, 2, '14', '5', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(84, 2, '14', '6', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(85, 2, '14', '7', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(86, 2, '14', '8', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(87, 2, '14', '9', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(88, 2, '14', '10', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(89, 2, '14', '11', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(90, 2, '14', '12', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(91, 2, '14', '13', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(92, 2, '14', '14', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(93, 2, '14', '15', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(94, 2, '14', '16', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40'),
(95, 2, '14', '17', '0', '2022-02-05 18:53:40', '2022-02-05 18:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `project_id`, `location`, `pic_name`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 'storage/workpic/1644067599917.jpg', '1644067599917.jpg', '2022-02-05 13:26:39', '2022-02-05 13:26:39'),
(7, 2, 2, 'storage/workpic/1644067599457.jpg', '1644067599457.jpg', '2022-02-06 13:26:39', '2022-02-05 13:26:39'),
(8, 2, 6, 'storage/workpic/1644067623444.jpg', '1644067623444.jpg', '2022-02-05 13:27:03', '2022-02-05 13:27:03'),
(9, 2, 6, 'storage/workpic/1644067635377.jpg', '1644067635377.jpg', '2022-02-05 13:27:15', '2022-02-05 13:27:15'),
(10, 2, 6, 'storage/workpic/164406763528.png', '164406763528.png', '2022-02-05 13:27:15', '2022-02-05 13:27:15'),
(11, 1, 2, 'storage/workpic/1644069098843.jpg', '1644069098843.jpg', '2022-02-05 13:51:38', '2022-02-05 13:51:38'),
(12, 1, 2, 'storage/workpic/1644069098498.jpg', '1644069098498.jpg', '2022-02-05 13:51:38', '2022-02-05 13:51:38'),
(13, 1, 2, 'storage/workpic/1644069098539.jpg', '1644069098539.jpg', '2022-02-05 13:51:38', '2022-02-05 13:51:38'),
(15, 2, 2, 'storage/workpic/1644086805164.jpg', '1644086805164.jpg', '2022-02-05 18:46:45', '2022-02-05 18:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenus`
--

CREATE TABLE `mainmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_05_210655_create_profiles_table', 1),
(5, '2021_06_06_024051_create_mainmenus_table', 1),
(6, '2021_06_06_024415_create_submenus_table', 1),
(7, '2022_01_23_183643_create_tasks_table', 2),
(8, '2022_01_23_183704_create_projects_table', 2),
(11, '2022_01_24_193323_create_assigntasks_table', 3),
(12, '2022_02_03_165725_create_images_table', 4);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'ঘর 2', '2022-01-23 14:35:12', '2022-02-05 17:41:38'),
(4, 'ঘর  3', '2022-01-24 13:15:48', '2022-02-05 17:41:31'),
(5, 'ঘর  4', '2022-01-24 13:15:52', '2022-02-05 17:41:25'),
(6, 'ঘর  5', '2022-01-24 13:15:57', '2022-02-05 17:41:19'),
(7, 'ঘর  6', '2022-01-24 13:16:01', '2022-02-05 17:41:13'),
(8, 'ঘর  7', '2022-01-24 13:16:04', '2022-02-05 17:41:07'),
(9, 'ঘর  8', '2022-01-24 13:16:07', '2022-02-05 17:40:59'),
(10, 'ঘর  9', '2022-01-24 13:16:11', '2022-02-05 17:40:53'),
(11, 'ঘর  10', '2022-01-24 13:16:15', '2022-02-05 17:40:48'),
(12, 'ঘর  11', '2022-01-24 13:16:20', '2022-02-05 17:40:41'),
(13, 'ঘর  12', '2022-01-24 13:16:24', '2022-02-05 17:40:35'),
(14, 'ঘর 13', '2022-01-24 13:16:28', '2022-02-05 17:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mainmenu_id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `detail`, `created_at`, `updated_at`) VALUES
(2, 'সাইট সিলেকশন', '2022-01-23 14:50:38', '2022-02-05 17:58:28'),
(4, 'ভিত্তি স্থাপন ( আর্থ ওয়ার্ক ও সিসি ঢালাই)', '2022-01-24 13:12:10', '2022-02-05 17:59:06'),
(5, 'ভিত্তি পর্যন্ত গাঁথুনি (GL to PL)', '2022-01-24 13:12:28', '2022-02-05 17:59:30'),
(6, 'মাটি ভরাট', '2022-01-24 13:12:43', '2022-02-05 18:01:39'),
(7, 'গ্রেড বিম ঢালাই', '2022-01-24 13:12:47', '2022-02-05 18:01:52'),
(8, 'জালানা পর্যন্ত গাঁথুনি', '2022-01-24 13:12:55', '2022-02-05 18:02:08'),
(9, 'বারান্দার পিলার তৈরি', '2022-01-24 13:13:03', '2022-02-05 18:02:27'),
(10, 'লিন্টেল পর্যন্ত গাঁথুনি', '2022-01-24 13:13:10', '2022-02-05 18:02:41'),
(11, 'লিন্টেল সম্পন্ন', '2022-01-24 13:13:16', '2022-02-05 18:02:56'),
(12, 'সম্পন্ন সাইট দেয়াল', '2022-01-24 13:13:20', '2022-02-05 18:03:29'),
(13, 'আলকাতরাসহ টিন লাগানো', '2022-01-24 13:13:26', '2022-02-05 18:03:42'),
(14, 'দরজা ও জানালা সেটিং', '2022-01-24 13:13:37', '2022-02-05 18:03:57'),
(15, 'প্লাস্টার', '2022-01-24 13:13:41', '2022-02-05 18:04:22'),
(16, 'নেট সিমেন্ট ফিনিশিং', '2022-01-24 13:13:44', '2022-02-05 18:04:32'),
(17, 'রং করণ', '2022-01-24 13:13:48', '2022-02-05 18:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resetcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `location`, `resetcode`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joker', 'shakib46@gmail.com', NULL, '01740303508', '$2y$10$fDmxVMOyZZL/sQ4WkZCEYusTWpIoTp9ivhI15fpYAhFQNBFC1v/Iq', NULL, NULL, 'superadmin', 'active', NULL, '2022-01-23 14:14:15', '2022-01-23 14:14:15'),
(2, 'User1', 'u@u1.com', NULL, '11111111111', '$2y$10$2KiAwVxg004ckXp8RjIAS.bXhMVx0QatWL4csKerhbO23j/dXBHZ.', NULL, NULL, 'subadmin', 'active', NULL, '2022-01-24 13:21:14', '2022-01-24 13:21:14'),
(3, 'User2', 'u@u2.com', NULL, '22222222222', '$2y$10$SRwUc3dw58HmY6mE3DxTEubBwxvrGxcS3gS.oqtCt5lNNF8zXDFTC', NULL, NULL, 'subadmin', 'active', NULL, '2022-01-24 13:21:50', '2022-01-24 13:21:50'),
(4, 'User3', 'u@u3.com', NULL, '33333333333', '$2y$10$U6PHoUwKU53Mz6.iZhGnc.3zpg3g59zroRM4EpIUao2lT3GDcyBSS', NULL, NULL, 'subadmin', 'active', NULL, '2022-01-24 13:22:30', '2022-01-24 13:22:30'),
(5, 'Admin', 'a@a.com', NULL, '99999999999', '$2y$10$SO1W1vdDNNLUK.N0kAbb2ejfgxqisfzgCJUzP6AVhoPoaE/Tx2M7W', NULL, NULL, 'admin', 'active', NULL, '2022-02-05 18:49:05', '2022-02-05 18:49:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigntasks`
--
ALTER TABLE `assigntasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigntasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`),
  ADD KEY `images_project_id_foreign` (`project_id`);

--
-- Indexes for table `mainmenus`
--
ALTER TABLE `mainmenus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_mainmenu_id_foreign` (`mainmenu_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigntasks`
--
ALTER TABLE `assigntasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mainmenus`
--
ALTER TABLE `mainmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntasks`
--
ALTER TABLE `assigntasks`
  ADD CONSTRAINT `assigntasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_mainmenu_id_foreign` FOREIGN KEY (`mainmenu_id`) REFERENCES `mainmenus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
