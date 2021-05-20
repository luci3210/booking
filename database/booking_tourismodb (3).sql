-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 08:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_tourismodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jayson claros', 'jayson.claros@gmail.com', NULL, '$2y$10$0kSuBQ0KaP2D35Pcgeb8eeXWVLW.AT540unwPMWs/Wx4aS2qXxcLO', NULL, '2021-02-10 20:26:43', '2021-02-10 20:26:43'),
(2, 'lia', 'liaadmin@gmail.com', NULL, '$2y$10$w3WAaNf5iCJGyPnuAg/mQuRgKfi5zxH16C81VXghCEjoElhCl2P2u', NULL, '2021-04-29 06:13:11', '2021-04-29 06:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `user_id`, `page_id`, `action`, `created_at`, `updated_at`, `page_name`) VALUES
(1, '1', 'product', 'edit', '2021-02-15 19:36:09', '2021-02-15 19:36:09', ''),
(2, '1', 'product', 'edit', '2021-02-15 19:36:58', '2021-02-15 19:36:58', ''),
(3, '1', '3', 'edit', '2021-02-15 19:39:29', '2021-02-15 19:39:29', ''),
(4, '1', '1', 'edit', '2021-02-15 21:22:43', '2021-02-15 21:22:43', ''),
(5, '1', '2', 'edit', '2021-02-15 21:23:06', '2021-02-15 21:23:06', ''),
(6, '1', '1', 'delete', '2021-02-15 21:52:29', '2021-02-15 21:52:29', ''),
(7, '1', '25', 'delete', '2021-02-15 22:34:39', '2021-02-15 22:34:39', ''),
(8, '1', '25', 'delete', '2021-02-15 22:34:45', '2021-02-15 22:34:45', ''),
(9, '1', '25', 'delete', '2021-02-15 22:34:52', '2021-02-15 22:34:52', ''),
(10, '1', '25', 'delete', '2021-02-15 22:35:05', '2021-02-15 22:35:05', ''),
(11, '1', '4', 'delete', '2021-02-15 22:59:35', '2021-02-15 22:59:35', ''),
(12, '1', '23', 'delete', '2021-02-15 22:59:58', '2021-02-15 22:59:58', ''),
(13, '1', '22', 'delete', '2021-02-15 23:00:21', '2021-02-15 23:00:21', ''),
(14, '1', '21', 'delete', '2021-02-15 23:00:29', '2021-02-15 23:00:29', ''),
(15, '1', '19', 'delete', '2021-02-15 23:00:36', '2021-02-15 23:00:36', ''),
(16, '1', '20', 'delete', '2021-02-15 23:00:42', '2021-02-15 23:00:42', ''),
(17, '1', '17', 'delete', '2021-02-15 23:00:50', '2021-02-15 23:00:50', ''),
(18, '1', '18', 'delete', '2021-02-15 23:00:57', '2021-02-15 23:00:57', ''),
(19, '1', '16', 'delete', '2021-02-15 23:01:06', '2021-02-15 23:01:06', ''),
(20, '1', '15', 'delete', '2021-02-15 23:01:12', '2021-02-15 23:01:12', ''),
(21, '1', '14', 'delete', '2021-02-15 23:01:19', '2021-02-15 23:01:19', ''),
(22, '1', '13', 'delete', '2021-02-15 23:01:25', '2021-02-15 23:01:25', ''),
(23, '1', '12', 'delete', '2021-02-15 23:40:56', '2021-02-15 23:40:56', ''),
(24, '1', '10', 'delete', '2021-02-15 23:41:14', '2021-02-15 23:41:14', ''),
(25, '1', '11', 'edit', '2021-02-15 23:42:43', '2021-02-15 23:42:43', ''),
(26, '1', '6', 'edit', '2021-02-16 08:30:53', '2021-02-16 08:30:53', ''),
(27, '1', '2', 'delete', '2021-02-16 08:37:40', '2021-02-16 08:37:40', ''),
(28, '1', '4', 'delete', '2021-02-16 08:38:45', '2021-02-16 08:38:45', ''),
(29, '1', '10', 'edit', '2021-02-20 07:10:43', '2021-02-20 07:10:43', 'plan'),
(30, '1', '12', 'edit', '2021-02-20 07:13:10', '2021-02-20 07:13:10', 'plan'),
(31, '1', '12', 'edit', '2021-02-20 07:14:06', '2021-02-20 07:14:06', 'plan'),
(32, '1', '12', 'edit', '2021-02-20 07:14:19', '2021-02-20 07:14:19', 'plan'),
(33, '1', '12', 'edit', '2021-02-20 07:14:41', '2021-02-20 07:14:41', 'plan'),
(34, '1', '11', 'delete', '2021-02-20 07:21:28', '2021-02-20 07:21:28', 'plan'),
(35, '1', '9', 'delete', '2021-02-20 07:21:56', '2021-02-20 07:21:56', 'plan'),
(36, '1', '8', 'delete', '2021-02-20 07:22:03', '2021-02-20 07:22:03', 'plan'),
(37, '1', '7', 'delete', '2021-02-20 07:22:10', '2021-02-20 07:22:10', 'plan'),
(38, '1', '6', 'delete', '2021-02-20 07:22:18', '2021-02-20 07:22:18', 'plan'),
(39, '1', '1', 'delete', '2021-02-20 07:22:25', '2021-02-20 07:22:25', 'plan'),
(40, '1', '3', 'delete', '2021-02-20 07:22:32', '2021-02-20 07:22:32', 'plan'),
(41, '1', '2', 'delete', '2021-02-20 07:51:39', '2021-02-20 07:51:39', 'plan'),
(42, '1', '5', 'delete', '2021-02-20 07:51:47', '2021-02-20 07:51:47', 'plan'),
(43, '1', '4', 'delete', '2021-02-20 07:51:54', '2021-02-20 07:51:54', 'plan'),
(44, '1', '9', 'edit', '2021-02-20 07:59:26', '2021-02-20 07:59:26', 'product'),
(45, '1', '8', 'edit', '2021-02-20 07:59:49', '2021-02-20 07:59:49', 'product'),
(46, '1', '7', 'edit', '2021-02-20 08:00:28', '2021-02-20 08:00:28', 'product'),
(47, '1', '6', 'edit', '2021-02-20 08:00:44', '2021-02-20 08:00:44', 'product'),
(48, '1', '11', 'edit', '2021-02-20 08:01:12', '2021-02-20 08:01:12', 'product'),
(49, '1', '5', 'edit', '2021-02-20 08:02:55', '2021-02-20 08:02:55', 'product'),
(50, '1', '3', 'edit', '2021-02-20 08:03:49', '2021-02-20 08:03:49', 'product'),
(51, '1', '10', 'edit', '2021-02-22 00:01:24', '2021-02-22 00:01:24', 'plan'),
(52, '1', '12', 'edit', '2021-02-22 00:02:56', '2021-02-22 00:02:56', 'plan'),
(53, '1', '11', 'edit', '2021-02-22 00:05:24', '2021-02-22 00:05:24', 'plan'),
(54, '1', '100111', 'edit', '2021-03-02 23:19:36', '2021-03-02 23:19:36', 'product'),
(55, '1', '10018', 'edit', '2021-03-14 19:41:21', '2021-03-14 19:41:21', 'product'),
(56, '1', '10019', 'edit', '2021-03-15 06:43:40', '2021-03-15 06:43:40', 'product'),
(57, '1', '10018', 'edit', '2021-03-15 06:43:51', '2021-03-15 06:43:51', 'product'),
(58, '1', '10019', 'edit', '2021-05-06 08:37:44', '2021-05-06 08:37:44', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `building_dacilities`
--

CREATE TABLE `building_dacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_dacilities`
--

INSERT INTO `building_dacilities` (`id`, `name`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 'Free Parking', 1, '2021-03-15 23:21:29', '2021-03-15 23:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` int(11) NOT NULL,
  `destination_info` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_desc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `destination_id`, `destination_info`, `destination_desc`, `destination_image`, `temp_status`, `created_at`, `updated_at`) VALUES
(3, 6, 'Ilocos Norte', 'a province in the northern Philippines. In the capital Laoag City, grand Paoay Church is a fusion of local and baroque architecture. Farther north, Cape Bojeador Lighthouse and the dramatic Kapurpurwan Rock Formation offer panoramic ocean views. At the province’s northern tip, the town of Pagudpud i', 'DESTI2021050660935c8977c4b.jpg', 1, '2021-05-05 19:03:37', '2021-05-05 19:03:37'),
(4, 7, 'Ilocos Sur', 'a province in the Philippines located in the Ilocos Region in Luzon. Its capital is the city of Vigan, located on the mouth of the Mestizo River. Ilocos Sur is bordered by Ilocos Norte and Abra to the north, Mountain Province to the east, La Union and Benguet to the south and the South China Sea to ', 'DESTI2021050660935e657b528.jpg', 2, '2021-05-05 19:11:33', '2021-05-05 19:11:33'),
(5, 8, 'La Union', 'La Union, officially the Province of La Union, is a province in the Philippines located in the Ilocos Region in the island of Luzon. Its capital is the city of San Fernando, which also serves as the regional center of the whole Ilocos Region.', 'DESTI2021050660935f73c54ac.jpg', 1, '2021-05-05 19:16:03', '2021-05-05 19:16:03'),
(6, 9, 'Pangasinan', 'officially the Province of Pangasinan is a province in the Philippines located in the Ilocos Region of Luzon. Its capital is Lingayen. Pangasinan is on the western area of the island of Luzon along Lingayen Gulf and the South China Sea. It has a total land area of 5,451.01 square kilometres.', 'DESTI202105066093605cddf57.jpg', 1, '2021-05-05 19:19:56', '2021-05-05 19:19:56'),
(7, 10, 'Bukidnon', 'a landlocked province in the Philippines located in the Northern Mindanao region. Its capital is the city of Malaybalay. The province borders, clockwise from the north, Misamis Oriental, Agusan del Sur, Davao del Norte, Cotabato, Lanao del Sur, and Lanao del Norte.', 'DESTI202105066093619d4fc0d.jpg', 1, '2021-05-05 19:25:17', '2021-05-05 19:25:17'),
(8, 13, 'Camiguin', 'Camiguin is an island province in the Philippines located in the Bohol Sea, about 10 kilometres off the northern coast of Mindanao. It is geographically part of Region X, the Northern Mindanao Region of the country and formerly a part of Misamis Oriental province.', 'DESTI20210511609a35ad6a28f.jpg', 1, '2021-05-10 23:43:41', '2021-05-10 23:43:41'),
(9, 11, 'Misamis Occidental', 'Misamis Occidental is a province located in the region of Northern Mindanao in the Philippines. Its capital is the city of Oroquieta. The province borders Zamboanga del Norte and Zamboanga del Sur to the west and is separated from Lanao del Norte by Panguil Bay to the south and Iligan Bay to the eas', 'DESTI20210511609a387d4bc89.jpg', 1, '2021-05-10 23:55:41', '2021-05-10 23:55:41');

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomdesc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomsize` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewdeck` int(11) NOT NULL,
  `noguest` int(11) NOT NULL,
  `nobed` int(11) NOT NULL,
  `profid` int(11) NOT NULL DEFAULT 1,
  `serviceid` int(11) NOT NULL DEFAULT 1,
  `temp_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picimages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` tinyint(4) DEFAULT NULL,
  `region` tinyint(4) DEFAULT NULL,
  `district` tinyint(4) DEFAULT NULL,
  `city` tinyint(4) DEFAULT NULL,
  `municipality` tinyint(4) DEFAULT NULL,
  `barangay` tinyint(4) DEFAULT NULL,
  `address_id` tinyint(4) DEFAULT NULL,
  `pay_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `price`, `nonight`, `roomname`, `roomdesc`, `roomsize`, `viewdeck`, `noguest`, `nobed`, `profid`, `serviceid`, `temp_status`, `created_at`, `updated_at`, `picimages`, `room_facilities`, `building_facilities`, `booking_package`, `country`, `region`, `district`, `city`, `municipality`, `barangay`, `address_id`, `pay_method`) VALUES
(26, '', '', '', '', '', 0, 0, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '1,500.00', '3', 'Seda Vertis North', 'Seda Vertis North', '19.1', 1, 2, 1, 1, 1, 2, '2021-04-15 07:56:11', NULL, NULL, 'Air conditioning,Bathroom,Free bottled water,Hairdryer', 'Free Parking', 'Free Breakfast', 1, 4, 6, 1, 3, 1, 1, NULL),
(28, '1,0510.00', '1', 'Eurotel North Edsa', 'Eurotel North Edsa', '19.1', 1, 2, 1, 1, 1, 1, '2021-04-15 07:59:04', NULL, NULL, 'Air conditioning,Bathroom,Free bottled water,Hairdryer,LED TV 32\",Shower', 'Free Parking', 'Free Breakfast', 1, 4, 8, 1, 3, 1, 44, NULL),
(29, '25,001.00', '2', 'BSA Twin Towers', 'BSA Twin Towers', '44', 1, 4, 2, 1, 1, 1, '2021-04-16 17:56:18', NULL, NULL, 'Air conditioning,Bathroom,Free bottled water,LED TV 32\",Shower', 'Free Parking', 'Free Breakfast', 1, 4, 8, 1, 3, 1, 1, NULL),
(30, '1,5200.00', '1', '2 single beds or 1 queen bed', '2 single beds or 1 queen bed', '10', 2, 3, 1, 1, 1, 1, '2021-04-16 18:01:03', NULL, NULL, 'Air conditioning,Bathroom,Housekeeping,LED TV 32\",Shower,Toiletries', 'Free Parking', 'Free Breakfast', 1, 4, 8, 1, 3, 1, 44, NULL),
(31, '1,5040.00', '1', '2 single beds or 1 queen bed', '2 single beds or 1 queen bed', '250', 1, 3, 1, 1, 1, 1, '2021-04-16 18:02:55', NULL, NULL, 'Air conditioning,Bathroom,Hairdryer,Housekeeping,LED TV 32\"', 'Free Parking', 'Free Breakfast', 1, 4, 8, 1, 3, 1, 44, NULL),
(32, '3,500.00', '1', '2 Bedroom Executive Suite', '2 Bedroom Executive Suite', '25', 1, 2, 1, 1, 1, 1, '2021-04-16 18:09:40', NULL, NULL, 'Air conditioning,Bathroom,LED TV 32\",Safety deposit box,Shower', 'Free Parking', 'Free Breakfast', 1, 4, 8, 1, 3, 1, 44, NULL),
(33, '', '', '', '', '', 0, 0, 0, 1, 1, 1, '2021-05-08 09:13:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '', '', '', '', '', 0, 0, 0, 1, 1, 1, '2021-05-08 09:13:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '', '', '', '', '', 0, 0, 0, 6, 1, 1, '2021-05-08 10:37:04', '2021-05-08 10:37:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '1,500.00', '1', 'Bed in 6-Bed Female Dormitory Room', 'This bed in dormitory features air conditioning. This room type cannot accommodate any children.', '24', 1, 6, 2, 6, 1, 1, '2021-05-08 10:40:22', NULL, NULL, 'Bathroom,Hairdryer', 'Free Parking', 'Free Breakfast', 1, 3, 8, NULL, NULL, NULL, NULL, NULL),
(37, '1', '1', 'asa', 'asasas', '1', 1, 1, 1, 6, 1, 1, '2021-05-10 08:48:26', NULL, NULL, 'Hairdryer', 'Free Parking', 'Free Breakfast', 1, 3, 10, NULL, NULL, NULL, NULL, NULL),
(38, '23', '1232', 'asas', 'asas', '19.1', 1, 1, 1, 1, 1, 1, '2021-05-10 19:21:08', NULL, NULL, 'Bathroom', 'Free Parking', 'Free Breakfast', 1, 3, 8, NULL, NULL, NULL, 44, NULL),
(39, '1', '1', 'wewewewe', 'ewewewe', '1', 1, 1, 11, 1, 1, 1, '2021-05-14 07:49:08', NULL, NULL, 'Bathroom', 'Free Parking', 'Free Breakfast', 1, 3, 13, NULL, NULL, NULL, 1, NULL),
(40, '1', '1', 'wewe', 'ewe', '1', 1, 1, 1, 1, 1, 1, '2021-05-14 07:57:36', NULL, NULL, 'Free bottled water', 'Free Parking', 'Free Breakfast', 1, 18, 9, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_photos`
--

CREATE TABLE `hotel_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `upload_id` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_photos`
--

INSERT INTO `hotel_photos` (`id`, `merchant_id`, `upload_id`, `photo`, `temp_status`, `created_at`, `updated_at`) VALUES
(260, 1, '27', 'MER202104156078620ff1c96.jpg', 1, '2021-04-15 07:55:59', '2021-04-15 07:55:59'),
(261, 1, '27', 'MER2021041560786215bce59.jpg', 1, '2021-04-15 07:56:05', '2021-04-15 07:56:05'),
(262, 1, '27', 'MER202104156078621764b2a.jpg', 1, '2021-04-15 07:56:07', '2021-04-15 07:56:07'),
(263, 1, '28', 'MER20210415607862c267bea.jpg', 1, '2021-04-15 07:58:58', '2021-04-15 07:58:58'),
(264, 1, '28', 'MER20210415607862c2c10f7.jpg', 1, '2021-04-15 07:58:58', '2021-04-15 07:58:58'),
(265, 1, '28', 'MER20210415607862c326ba3.jpg', 1, '2021-04-15 07:58:59', '2021-04-15 07:58:59'),
(266, 1, '28', 'MER20210415607862c37dbcd.jpg', 1, '2021-04-15 07:58:59', '2021-04-15 07:58:59'),
(267, 1, '28', 'MER20210415607862c3d3543.jpg', 1, '2021-04-15 07:58:59', '2021-04-15 07:58:59'),
(268, 1, '29', 'MER20210417607a403e7bff6.jpg', 1, '2021-04-16 17:56:14', '2021-04-16 17:56:14'),
(269, 1, '29', 'MER20210417607a403f1fc06.jpg', 1, '2021-04-16 17:56:15', '2021-04-16 17:56:15'),
(270, 1, '29', 'MER20210417607a403f71094.jpg', 1, '2021-04-16 17:56:15', '2021-04-16 17:56:15'),
(271, 1, '29', 'MER20210417607a403fc0126.jpg', 1, '2021-04-16 17:56:15', '2021-04-16 17:56:15'),
(272, 1, '31', 'MER20210417607a41cc50861.jpg', 1, '2021-04-16 18:02:52', '2021-04-16 18:02:52'),
(273, 1, '31', 'MER20210417607a41ccab8bc.jpg', 1, '2021-04-16 18:02:52', '2021-04-16 18:02:52'),
(274, 1, '31', 'MER20210417607a41cd18960.jpg', 1, '2021-04-16 18:02:53', '2021-04-16 18:02:53'),
(275, 1, '31', 'MER20210417607a41cd779cf.jpg', 1, '2021-04-16 18:02:53', '2021-04-16 18:02:53'),
(276, 1, '31', 'MER20210417607a41cdc7f2d.jpg', 1, '2021-04-16 18:02:53', '2021-04-16 18:02:53'),
(277, 1, '32', 'MER20210417607a435d38b64.jpg', 1, '2021-04-16 18:09:33', '2021-04-16 18:09:33'),
(278, 1, '32', 'MER20210417607a435d93ac1.jpg', 1, '2021-04-16 18:09:33', '2021-04-16 18:09:33'),
(279, 1, '32', 'MER20210417607a435def991.jpg', 1, '2021-04-16 18:09:33', '2021-04-16 18:09:33'),
(280, 1, '32', 'MER20210417607a435e5af80.jpg', 1, '2021-04-16 18:09:34', '2021-04-16 18:09:34'),
(281, 1, '32', 'MER20210417607a435ead5a4.jpg', 1, '2021-04-16 18:09:34', '2021-04-16 18:09:34'),
(282, 1, '32', 'MER20210417607a435f07ffc.jpg', 1, '2021-04-16 18:09:35', '2021-04-16 18:09:35'),
(283, 1, '32', 'MER20210417607a435f56e86.jpg', 1, '2021-04-16 18:09:35', '2021-04-16 18:09:35'),
(284, 1, '27', 'MER202105086096519c1b5ef.jpg', 1, '2021-05-08 00:53:48', '2021-05-08 00:53:48'),
(285, 1, '27', 'MER202105086096519c910b5.jpg', 1, '2021-05-08 00:53:48', '2021-05-08 00:53:48'),
(286, 1, '27', 'MER202105086096519d0692d.jpg', 1, '2021-05-08 00:53:49', '2021-05-08 00:53:49'),
(287, 1, '27', 'MER202105086096519d81d32.jpg', 1, '2021-05-08 00:53:49', '2021-05-08 00:53:49'),
(288, 1, '33', 'room-photo202105086096c6a46a2c3.jpg', 1, '2021-05-08 09:13:08', '2021-05-08 09:13:08'),
(289, 1, '34', 'room-photo202105086096c6a4e7a51.jpg', 1, '2021-05-08 09:13:08', '2021-05-08 09:13:08'),
(290, 1, '34', 'room-photo202105086096c6a54c33b.jpg', 1, '2021-05-08 09:13:09', '2021-05-08 09:13:09'),
(291, 1, '36', 'room-photo202105086096da97dcbd8.jpg', 1, '2021-05-08 10:38:15', '2021-05-08 10:38:15'),
(292, 1, '36', 'room-photo202105086096da985c57c.jpg', 1, '2021-05-08 10:38:16', '2021-05-08 10:38:16'),
(293, 1, '36', 'room-photo202105086096da98d9175.jpg', 1, '2021-05-08 10:38:16', '2021-05-08 10:38:16'),
(294, 1, '36', 'room-photo202105086096da9958ec2.jpg', 1, '2021-05-08 10:38:17', '2021-05-08 10:38:17'),
(295, 6, '37', 'room-photo20210510609963d613c89.jpg', 1, '2021-05-10 08:48:22', '2021-05-10 08:48:22'),
(296, 6, '37', 'room-photo20210510609963d674013.jpg', 1, '2021-05-10 08:48:22', '2021-05-10 08:48:22'),
(297, 6, '37', 'room-photo20210510609963d6be8fd.jpg', 1, '2021-05-10 08:48:22', '2021-05-10 08:48:22'),
(298, 1, '35', 'room-photo202105116099f820a33dd.jpg', 1, '2021-05-10 19:21:04', '2021-05-10 19:21:04'),
(299, 1, '35', 'room-photo202105116099f8211a24d.jpg', 1, '2021-05-10 19:21:05', '2021-05-10 19:21:05'),
(300, 1, '35', 'room-photo202105116099f821a384c.jpg', 1, '2021-05-10 19:21:05', '2021-05-10 19:21:05'),
(301, 1, '35', 'room-photo202105116099f8223a475.jpg', 1, '2021-05-10 19:21:06', '2021-05-10 19:21:06'),
(302, 1, '39', 'room-photo202105116099f94d51967.jpg', 1, '2021-05-10 19:26:05', '2021-05-10 19:26:05'),
(303, 1, '39', 'room-photo202105116099f94db3722.jpg', 1, '2021-05-10 19:26:05', '2021-05-10 19:26:05'),
(304, 1, '39', 'room-photo202105116099f94e26abe.jpg', 1, '2021-05-10 19:26:06', '2021-05-10 19:26:06'),
(305, 1, '39', 'room-photo20210514609e9bf05e62c.jpg', 1, '2021-05-14 07:49:04', '2021-05-14 07:49:04'),
(306, 1, '39', 'room-photo20210514609e9bf0be4ba.jpg', 1, '2021-05-14 07:49:04', '2021-05-14 07:49:04'),
(307, 1, '39', 'room-photo20210514609e9bf127c3e.jpg', 1, '2021-05-14 07:49:05', '2021-05-14 07:49:05'),
(308, 1, '40', 'room-photo20210514609e9da3a2ba1.jpg', 1, '2021-05-14 07:56:19', '2021-05-14 07:56:19'),
(309, 1, '40', 'room-photo20210514609e9da401ca9.jpg', 1, '2021-05-14 07:56:20', '2021-05-14 07:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `kiticons`
--

CREATE TABLE `kiticons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kiticons`
--

INSERT INTO `kiticons` (`id`, `icon_id`, `icon_code`, `created_at`, `updated_at`) VALUES
(1, '1000', '<span uk-icon=\"heart\"></span>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 'Country/State', 1, '2021-03-26 09:41:22', NULL),
(2, 'Region', 1, '2021-03-26 09:41:22', NULL),
(3, 'District', 1, '2021-03-26 09:41:22', NULL),
(4, 'City', 1, '2021-03-26 09:41:22', NULL),
(5, 'Municipality', 1, '2021-03-26 09:41:22', NULL),
(6, 'Barangay', 1, '2021-03-26 09:41:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_barangay`
--

CREATE TABLE `locations_barangay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `region_id` tinyint(4) NOT NULL,
  `district_id` tinyint(4) NOT NULL,
  `city_id` tinyint(4) NOT NULL,
  `municipality_id` tinyint(4) NOT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations_barangay`
--

INSERT INTO `locations_barangay` (`id`, `location_id`, `country_id`, `region_id`, `district_id`, `city_id`, `municipality_id`, `barangay`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 4, 3, 1, 3, 'Tandang Sora', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_city`
--

CREATE TABLE `locations_city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `region_id` tinyint(4) NOT NULL,
  `district_id` tinyint(4) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations_city`
--

INSERT INTO `locations_city` (`id`, `location_id`, `country_id`, `region_id`, `district_id`, `city`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 4, 3, 'Quezon City', 1, NULL, NULL),
(2, 4, 1, 5, 5, 'Davao City', 1, NULL, NULL),
(3, 4, 1, 4, 3, 'Cagayan City', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_district`
--

CREATE TABLE `locations_district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `region_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations_district`
--

INSERT INTO `locations_district` (`id`, `location_id`, `country_id`, `region_id`, `district`, `temp_status`, `created_at`, `updated_at`) VALUES
(6, 3, 1, '18', 'Ilocos Norte', 1, NULL, NULL),
(7, 3, 1, '18', 'Ilocos Sur', 1, NULL, NULL),
(8, 3, 1, '18', 'La Union', 1, NULL, NULL),
(9, 3, 1, '18', 'Pangasinan', 1, NULL, NULL),
(10, 3, 1, '3', 'Bukidnon', 1, NULL, NULL),
(11, 3, 1, '3', 'Misamis Occidental', 1, NULL, NULL),
(12, 3, 1, '3', 'Misamis Oriental', 1, NULL, NULL),
(13, 3, 1, '3', 'Camiguin', 1, NULL, NULL),
(14, 3, 1, '3', 'Lanao del Norte', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_municipalities`
--

CREATE TABLE `locations_municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `region_id` tinyint(4) NOT NULL,
  `district_id` tinyint(4) NOT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations_municipalities`
--

INSERT INTO `locations_municipalities` (`id`, `location_id`, `country_id`, `region_id`, `district_id`, `city_id`, `municipality`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 4, 3, '1', 'Tandang Sora', 1, NULL, NULL),
(2, 5, 1, 4, 3, '1', 'Cubao', 1, NULL, NULL),
(3, 5, 1, 4, 3, '1', 'Quezon City', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations_region`
--

CREATE TABLE `locations_region` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations_region`
--

INSERT INTO `locations_region` (`id`, `location_id`, `country_id`, `region`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Caraga', 1, '2021-03-30 07:57:35', '2021-03-30 07:57:35'),
(2, 2, 2, 'NCR', 1, '2021-03-30 07:57:35', '2021-03-30 07:57:35'),
(3, 2, 1, 'Region 10', 1, NULL, NULL),
(18, 2, 1, 'Region 1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_barangay_models`
--

CREATE TABLE `location_barangay_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location_country`
--

CREATE TABLE `location_country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_country`
--

INSERT INTO `location_country` (`id`, `location_id`, `country`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Philippines', 1, '2021-03-29 20:07:27', '2021-03-29 20:07:27'),
(2, 1, 'Canada', 1, '2021-03-29 20:32:13', '2021-03-29 20:32:13'),
(3, 1, 'Singapore', 1, '2021-03-29 20:32:49', '2021-03-29 20:32:49'),
(4, 1, 'Japan', 1, '2021-03-29 20:32:59', '2021-03-29 20:32:59'),
(5, 1, 'Taiwan', 1, '2021-03-29 20:33:14', '2021-03-29 20:33:14'),
(6, 1, 'Russia', 1, '2021-03-29 20:34:14', '2021-03-29 20:34:14'),
(7, 1, 'China', 1, '2021-03-29 20:34:27', '2021-03-29 20:34:27'),
(8, 1, 'India', 1, '2021-03-29 20:34:38', '2021-03-29 20:34:38'),
(9, 1, 'Vietnam', 1, '2021-03-29 20:35:08', '2021-03-29 20:35:08'),
(10, 1, 'Malaysia', 1, '2021-03-29 20:35:20', '2021-03-29 20:35:20'),
(11, 1, 'North Korea', 1, '2021-03-29 20:35:36', '2021-03-29 20:35:36'),
(12, 1, 'South Korea', 1, '2021-03-29 20:35:47', '2021-03-29 20:35:47'),
(13, 1, 'Maldives', 1, '2021-03-29 20:36:14', '2021-03-29 20:36:14'),
(14, 1, 'Israel', 1, '2021-03-29 20:36:34', '2021-03-29 20:36:34'),
(15, 1, 'Italy', 1, NULL, NULL),
(16, 1, 'sdsd', 2, NULL, NULL),
(17, 1, '1', 2, NULL, NULL),
(18, 1, '2', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `temp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `merchant_key`, `user_id`, `plan_id`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, '12544152554', 1, 1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_address`
--

CREATE TABLE `merchant_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prof_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_address`
--

INSERT INTO `merchant_address` (`id`, `prof_id`, `address`, `longt`, `latt`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, '6', '331 Eulogio Rodriguez Jr. Ave, Bagumbayan, Quezon City, 1800 Metro Manila', '121.0608712443769', '14.644150517179511', '1', '2021-03-02 03:22:56', '2021-03-03 00:23:05'),
(2, '6', '200 Eulogio Rodriguez Jr. Ave, Bagumbayan, Quezon City, 1800 Metro Manila', '121.0608712443769', '14.644150517179511', '4', '2021-03-02 09:03:14', '2021-03-03 00:28:51'),
(44, '6', '172 Eulogio Rodriguez Jr. Ave, Bagumbayan, Quezon City, 1800 Metro Manila', '121.0608712443769', '14.644150517179511', '1', '2021-03-02 18:09:19', '2021-03-02 18:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_contact`
--

CREATE TABLE `merchant_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prof_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchant_contact`
--

INSERT INTO `merchant_contact` (`id`, `prof_id`, `fname`, `lname`, `email`, `phonno`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, '6', 'Jayson', 'Claros', 'jayson.claros@gmail.coms', '09454817559', '4', NULL, '2021-03-02 23:43:15'),
(3, '6', 'Jerome', 'Curada', 'jerome@gmail.coom', '09112523456', '1', '2021-03-02 19:05:50', '2021-03-02 19:05:50'),
(22, '6', 'asasas', 'a', 'jayson.claros@gmail.com', '09458212485', '4', '2021-03-02 02:56:36', '2021-03-02 23:43:01'),
(23, '6', 'sds', 'sdsd', 'sds@sds.com', '21112544555', '4', '2021-03-02 23:16:48', '2021-03-02 23:42:31'),
(24, '6', 'Lia', 'Magallano', 'magallano@gmail.com', '09411258780', '4', '2021-03-02 23:33:44', '2021-03-02 23:52:28'),
(25, '6', 'Chel', 'Cruz', 'chel@yahoo.com', '09172525633', '4', '2021-03-07 20:54:24', '2021-03-10 01:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_26_103652_create_admins_table', 2),
(5, '2021_02_12_084008_create_product_table', 3),
(6, '2021_02_15_082005_create_producs_table', 4),
(7, '2021_02_15_085723_create_products_table', 5),
(8, '2021_02_15_162937_create_temp_status_table', 6),
(9, '2021_02_16_030913_create_logs_table', 7),
(10, '2021_02_16_031002_create_admin_logs_table', 7),
(11, '2021_02_16_085053_create_plan_table', 8),
(12, '2021_02_16_085107_create_plan_package_table', 8),
(13, '2021_02_16_091322_create_plan_package_table', 9),
(14, '2021_02_16_091517_create_plan_package_table', 10),
(15, '2021_02_16_170621_create_plans_table', 11),
(16, '2021_02_18_072515_create_plans_table', 12),
(17, '2021_02_20_073100_add_page_name_to_admin_logs_table', 13),
(18, '2021_02_23_061949_create_myplans_table', 14),
(19, '2021_02_27_045933_create_merchant_table', 15),
(20, '2021_02_27_181143_create_profiles_table', 16),
(21, '2021_02_27_182648_create_profiles_table', 17),
(22, '2021_03_01_111128_create_merchant_contact_table', 18),
(23, '2021_03_01_111216_create_merchant_address_table', 18),
(24, '2021_03_03_033721_add_temp_status_to_profiles_table', 19),
(25, '2021_03_09_113539_add_profilepic_to_profiles_table', 20),
(26, '2021_03_15_025435_create_hotels_table', 21),
(27, '2021_03_15_154923_create_room_facilities_table', 22),
(28, '2021_03_16_070939_create_building_facilities_table', 23),
(29, '2021_03_16_091716_create_package_inclusion_table', 24),
(30, '2021_03_20_042555_add_picimages_to_hotels_table', 25),
(31, '2021_03_20_061346_create_hotel_photos_table', 26),
(32, '2021_03_26_075233_create_locations_table', 27),
(33, '2021_03_30_031407_create_locations_country_table', 28),
(34, '2021_03_30_070158_create_locations_region_table', 29),
(35, '2021_04_05_084353_create_locations_district_table', 30),
(36, '2021_04_08_071538_create_locations_city_table', 31),
(37, '2021_04_09_105333_create_locations_municipalities_table', 32),
(38, '2021_04_09_110132_create_locations_municipalities_table', 33),
(39, '2021_04_10_015529_create_locations_barangay_table', 34),
(40, '2021_04_10_015745_create_location_barangay_models_table', 35),
(41, '2021_04_15_065611_add_multiple_column_to_hotels', 35),
(42, '2021_04_21_132126_create_kiticons_table', 36),
(43, '2021_04_21_133129_add_icon_code_to_producs_table', 37),
(44, '2021_04_21_133917_add_icon_id_to_products_table', 38),
(45, '2021_04_28_063318_rename_mname_column', 39),
(46, '2021_04_29_154535_add_fname_and_lname_and_mname_and_gender_and_bdate_and_country_and_pnumber_and_address1_and_address2_to_users', 40),
(47, '2021_04_30_034249_add_bdate_to_users', 41),
(48, '2021_05_03_083005_create_payment_creds_table', 42),
(49, '2021_05_05_134644_create_destinations_table', 43),
(50, '2021_05_07_075943_add_term_to_myplans_table', 44),
(51, '2021_05_10_094757_create_service_tour_table', 45),
(52, '2021_05_10_095257_create_service_tour_photos_table', 46),
(53, '2021_05_11_025834_add_newcoulumn_to_service_tour_table', 47),
(54, '2021_05_12_162206_rename_fname_column', 48),
(55, '2021_05_15_092129_add_qty_to_service_tour_table', 49),
(56, '2021_05_17_084430_add_tour_desc_to_service_tour_table', 50),
(57, '2021_05_17_091726_add_service_id_to_service_tour_table', 51);

-- --------------------------------------------------------

--
-- Table structure for table `myplans`
--

CREATE TABLE `myplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_auth` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_list` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_curency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms` tinyint(4) NOT NULL,
  `validity` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `myplans`
--

INSERT INTO `myplans` (`id`, `user_id`, `plan_auth`, `plan_key`, `plan_name`, `plan_price`, `plan_list`, `paid_curency`, `expired`, `temp_status`, `created_at`, `updated_at`, `terms`, `validity`) VALUES
(1, 1, '1', '74888', 'PHTourismo', '450', '24/7 Support,Unlimited Listings,Featured In Search Results,Lifetime Availability', 'php', '2023-02-16', 1, '2021-02-15 16:33:22', NULL, 0, ''),
(3, 3, '192', '', 'DOTPlan', '1,500.00', 'Featured In Search Results,24/7 Support,Unlimited Posting,Lifetime Availability', '', '1322', 0, '2021-05-07 00:23:40', '2021-05-07 00:23:40', 0, 'For 1 Year'),
(4, 3, '192', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', 'asasas', 1, '2021-05-07 00:25:55', '2021-05-07 00:25:55', 1, 'For 2 Years'),
(5, 2, '6094', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', '1322', 1, '2021-05-07 00:39:17', '2021-05-07 00:39:17', 1, 'For 2 Years'),
(6, 2, '6094fdaf46c001b04c54574d18c28d46e', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', 'qwqwqw', 1, '2021-05-07 00:43:27', '2021-05-07 00:43:27', 1, 'For 2 Years'),
(7, 2, '60955a20935711b04c54574d18c28d46e', '74888', 'DOTPlan', '1,500.00', 'Featured In Search Results,24/7 Support,Unlimited Posting,Lifetime Availability', '', '', 1, '2021-05-07 07:17:52', '2021-05-07 07:17:52', 1, 'For 1 Year'),
(8, 6, '6095fadbe7cbb6c2b62785275bca38ac2', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', '', 1, '2021-05-07 18:43:39', '2021-05-07 18:43:39', 1, 'For 2 Years'),
(9, 6, '609613737718e6c2b62785275bca38ac2', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', '', 1, '2021-05-07 20:28:35', '2021-05-07 20:28:35', 1, 'For 2 Years'),
(10, 6, '609613aec75e16c2b62785275bca38ac2', '', 'PHTourismo', '0.00', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', '', '', 1, '2021-05-07 20:29:34', '2021-05-07 20:29:34', 1, 'For 2 Years');

-- --------------------------------------------------------

--
-- Table structure for table `package_inclusion`
--

CREATE TABLE `package_inclusion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_inclusion`
--

INSERT INTO `package_inclusion` (`id`, `name`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 'Free Breakfast', 1, '2021-03-16 01:39:13', '2021-03-16 01:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_creds`
--

CREATE TABLE `payment_creds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_key` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_key` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_id` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_creds`
--

INSERT INTO `payment_creds` (`id`, `api_name`, `private_key`, `public_key`, `merchant_id`, `merchant_name`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 'TraxionPay Testing', '0nwi%7buga7g57bant=*y54rl7)u_$hw!*wmtzjypyu=#ta8%r', '@ik2-#n)3yyxqa_g5t-sy)qbsl0)eu(_6-weu=v^aa)%$x!ll5', '8529', 'TourismoPH', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_scope` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_package` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `plan_price`, `plan_scope`, `plan_package`, `temp_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'aasasa', '111', 'For 6 Months', '1', 4, 1, '2021-02-17 23:26:42', '2021-02-20 07:22:25'),
(2, 'aasasa', '111', 'For 6 Months', '3', 4, 1, '2021-02-17 23:26:42', '2021-02-20 07:51:39'),
(3, 'aasasa', '111', 'For 6 Months', '6', 4, 1, '2021-02-17 23:26:42', '2021-02-20 07:22:32'),
(4, 'PHILTOA Plan', '1500', 'For 1 Year', '2', 4, 1, '2021-02-17 23:45:41', '2021-02-20 07:51:53'),
(5, 'PHILTOA Plan', '1500', 'For 1 Year', '3', 4, 1, '2021-02-17 23:45:41', '2021-02-20 07:51:47'),
(6, 'PHILTOA Plan', '1500', 'For 1 Year', '4', 4, 1, '2021-02-17 23:45:41', '2021-02-20 07:22:18'),
(7, 'PHILTOA Plan', '1500', 'For 1 Year', '6', 4, 1, '2021-02-17 23:45:41', '2021-02-20 07:22:10'),
(8, 'asaasasasxx', '222', 'Per Month', '2, 3', 4, 1, '2021-02-18 19:16:54', '2021-02-20 07:22:03'),
(9, 'ssss', '2500', 'Per Month', '3,6,2', 4, 1, '2021-02-19 00:14:31', '2021-02-20 07:21:56'),
(10, 'PHILTOA Plan', '700.00', 'For 1 Year', 'Lifetime Availability,24/7 Support,Unlimited Listings,Featured In Search Results', 1, 1, '2021-02-19 10:39:48', '2021-02-22 00:01:24'),
(11, 'DOTPlan', '1,500.00', 'For 1 Year', 'Featured In Search Results,24/7 Support,Unlimited Posting,Lifetime Availability', 1, 1, '2021-02-19 10:42:24', '2021-02-22 00:05:24'),
(12, 'PHTourismo', '0.00', 'For 2 Years', '24/7 Support,15 Posting,Featured In Search Results,Lifetime Availability', 1, 1, '2021-02-19 11:44:00', '2021-02-22 00:02:56'),
(14, 'PHTourismoz', '4500', 'For 2 Years', '24/7 Support,Unlimited Posting,Featured In Search Results,Lifetime Availability', 5, 1, '2021-02-19 11:44:00', '2021-02-22 00:02:56'),
(15, 'PHTourismoz', '4500', 'For 2 Years', '24/7 Support,Unlimited Listings,Featured In Search Results,Lifetime Availability', 5, 1, '2021-02-19 11:44:00', '2021-02-22 00:02:56'),
(16, 'PHTourismo', '0.00', '', '', 0, 1, '2021-05-07 00:19:53', '2021-05-07 00:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `plan_package`
--

CREATE TABLE `plan_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_package`
--

INSERT INTO `plan_package` (`id`, `package`, `temp_status`, `created_at`, `updated_at`) VALUES
(1, 'Ten Listingsz', 1, '2021-02-16 07:27:23', '2021-02-16 08:14:46'),
(2, 'Lifetime Availability', 1, '2021-02-16 07:28:07', '2021-02-16 08:37:40'),
(3, 'Featured In Search Results', 1, '2021-02-16 07:28:32', '2021-02-16 08:15:30'),
(4, '24/7 Support', 1, '2021-02-16 07:28:50', '2021-02-16 08:38:45'),
(6, 'Unlimited Listings', 1, '2021-02-16 07:31:01', '2021-02-16 08:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `producs`
--

CREATE TABLE `producs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'TourismoPH', 'TourismoPH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `temp_status`, `user_id`, `created_at`, `updated_at`, `icon_id`) VALUES
(10011, 'Tour Packages', 'Tour Operator', 1, 1, '2021-02-15 07:48:47', '2021-03-02 23:19:36', 'fas fa-directions'),
(10013, 'Tourist Stop', 'Tourist Stop', 5, 1, '2021-02-15 03:34:02', '2021-02-20 08:03:49', 'fas fa-box-open'),
(10015, 'MICE Events', 'MICE Events', 5, 1, '2021-02-15 03:35:36', '2021-02-20 08:02:55', 'far fa-calendar-check'),
(10016, 'Hotel', 'Hotel and Resort', 1, 1, '2021-02-15 03:36:17', '2021-02-20 08:00:44', 'fas fa-city'),
(10017, 'Language Translator', 'Language Translator', 5, 1, '2021-02-15 07:37:08', '2021-02-20 08:00:28', 'fas fa-sign-language'),
(10018, 'Flight', 'Flight', 5, 1, '2021-02-15 07:38:43', '2021-03-15 06:43:51', 'fas fa-helicopter'),
(10019, 'Cruise', 'Cruise', 2, 1, '2021-02-15 07:39:20', '2021-05-06 08:37:44', 'fas fa-ship');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businesspermit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_status` int(11) NOT NULL,
  `profilepic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `plan_id`, `company`, `address`, `email`, `telno`, `phonno`, `website`, `businesspermit`, `type`, `lname`, `about`, `id1`, `id2`, `user_id`, `created_at`, `updated_at`, `temp_status`, `profilepic`) VALUES
(6, '1', 'Gateway Hotel', 'AH26, Surigao City, Surigao del Norte', 'gatewayhotel@gmail.com', '(086) 232 4880', '09466869223', 'www.gw.ph', NULL, '10016', NULL, 'This relaxed hotel is 2 km from Surigao Airport and Luneta Park, and 9 km from Mabua Pebble Beach. Laid-back rooms with simple wood furnishings feature Wi-Fi access and cable TV. Upgraded', NULL, NULL, '1', '2021-03-01 01:50:13', '2021-05-12 17:40:40', 1, 'UIMG20210512609bf3b3ded29.jpg'),
(19, '1', 'Lera Hotel Inc', 'Unit 5006, 88 Crowne, 88 Panay Avenue', 'jayson.claros@gmail.com', '12555669', '12522232225', 'www.iman.com.ph', NULL, '10011', NULL, 'This contemporary business hotel is 5 km from Eastwood City park, and 11 km from both Embassy of the United States and Manila Ocean Park.  The modern, stylish rooms come with free Wi-Fi and 42-inch flat-screens, plus minibars, and tea and coffeemaking facilities. Upgraded rooms offer upper-floor views and access to a club lounge. Suites add floor-to-ceiling windows, living rooms and iPod docks.', NULL, NULL, '4', '2021-05-07 21:12:25', '2021-05-09 22:50:48', 1, 'UIMG202105106098d7c82ade6.jpg'),
(20, '8', 'Lla Hotel a', 'asasasas as as', 'jayson.claaaros@gmail.com', '12514445', '12345678991', 'asaasss', NULL, '10011', NULL, 'sdsdsd', NULL, NULL, '6', '2021-05-08 10:37:04', '2021-05-13 00:19:42', 1, 'UIMG20210513609ce11df111b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`id`, `name`, `temp_status`, `created_at`, `updated_at`) VALUES
(5, 'Shower', 1, '2021-03-15 08:14:37', '2021-03-15 08:14:37'),
(6, 'Toiletries', 1, '2021-03-15 08:14:57', '2021-03-15 08:14:57'),
(7, 'Shower', 1, '2021-03-15 19:35:14', '2021-03-15 19:35:14'),
(8, 'Housekeeping', 1, '2021-03-15 20:06:33', '2021-03-15 20:06:33'),
(9, 'Safety deposit box', 1, '2021-03-15 20:07:12', '2021-03-15 20:07:12'),
(10, 'Free bottled water', 1, '2021-03-15 20:07:19', '2021-03-15 20:07:19'),
(11, 'Bathroom', 1, '2021-03-15 20:07:37', '2021-03-15 20:07:37'),
(12, 'Air conditioning', 1, '2021-03-15 20:07:57', '2021-03-15 20:07:57'),
(13, 'Hairdryer', 1, '2021-03-15 20:08:16', '2021-03-15 20:08:16'),
(14, 'TV', 1, '2021-03-15 20:08:25', '2021-03-15 20:08:25'),
(15, 'LED TV 32\"', 1, '2021-03-15 22:35:34', '2021-03-15 22:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `service_tour`
--

CREATE TABLE `service_tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomdesc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomsize` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewdeck` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noguest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nobed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` tinyint(4) DEFAULT NULL,
  `region` tinyint(4) DEFAULT NULL,
  `district` tinyint(4) DEFAULT NULL,
  `city` tinyint(4) DEFAULT NULL,
  `municipality` tinyint(4) DEFAULT NULL,
  `barangay` tinyint(4) DEFAULT NULL,
  `address_id` tinyint(4) DEFAULT NULL,
  `pay_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_expect` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_home` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_tour`
--

INSERT INTO `service_tour` (`id`, `price`, `nonight`, `tour_name`, `roomdesc`, `roomsize`, `viewdeck`, `noguest`, `nobed`, `profid`, `serviceid`, `temp_status`, `created_at`, `updated_at`, `room_facilities`, `building_facilities`, `booking_package`, `country`, `region`, `district`, `city`, `municipality`, `barangay`, `address_id`, `pay_method`, `qty`, `tour_expect`, `tour_desc`, `on_home`, `service_id`) VALUES
(13, '', '', '', '', '', '', '', '', '1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '₱ 2,500.00', '2', 'Camayan Beach Resort Day Pass', '', '', '', '2', '', '1', '', '1', '2021-05-17 07:50:22', NULL, NULL, 'Free Parking', 'Free Breakfast', 1, 3, 10, NULL, NULL, NULL, NULL, NULL, '35', 'sample expect', 'sample desc', '1', 10011);

-- --------------------------------------------------------

--
-- Table structure for table `service_tour_photos`
--

CREATE TABLE `service_tour_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_tour_photos`
--

INSERT INTO `service_tour_photos` (`id`, `merchant_id`, `upload_id`, `photo`, `temp_status`, `created_at`, `updated_at`) VALUES
(49, 1, 14, 'tour-photo2021051760a29077dd6b5.jpg', 1, '2021-05-17 07:49:11', '2021-05-17 07:49:11'),
(50, 1, 14, 'tour-photo2021051760a2907857bed.jpg', 1, '2021-05-17 07:49:12', '2021-05-17 07:49:12'),
(51, 1, 14, 'tour-photo2021051760a29078ca6cb.jpg', 1, '2021-05-17 07:49:12', '2021-05-17 07:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `temp_status`
--

CREATE TABLE `temp_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_status`
--

INSERT INTO `temp_status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'active', '2021-02-15 16:33:22', NULL),
(2, 'inactive', '2021-02-15 16:33:38', NULL),
(3, 'cancelled', '2021-02-15 16:33:38', NULL),
(4, 'deleted', '2021-02-15 16:34:31', NULL),
(5, 'disable', '2021-02-15 16:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` tinyint(4) DEFAULT NULL,
  `pnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profpic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accnt_nu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `fname`, `lname`, `mname`, `gender`, `country`, `pnumber`, `address`, `profpic`, `accnt_nu`, `bdate`) VALUES
(1, 'Jayson', 'jayson.claros@gmail.com', NULL, '$2y$10$wyXbTnmLlN7n3SLF2SqR4Ot6Jhe/XAWncl8JMQX2EV9/iKVD8w1E.', NULL, '2021-02-10 18:34:06', '2021-05-01 10:39:55', 'jaysona', 'claros', 'c', 'male', 11, '09466829453', 'Unit 5006, 88 Crowne, 88 Panay Avenue', NULL, NULL, '03/07/2000'),
(4, 'Jose', 'Jose.claros@gmail.com', NULL, '$2y$10$wyXbTnmLlN7n3SLF2SqR4Ot6Jhe/XAWncl8JMQX2EV9/iKVD8w1E.', NULL, '2021-02-10 18:34:06', '2021-02-10 18:34:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Lis', 'lis@gmail.com', NULL, '$2y$10$8mdaGRSZNQLUMz/M2tj9HOsSvwuD3F9Q9JsAIZMcGNM9mrFTpnMbm', NULL, '2021-04-29 06:06:42', '2021-04-29 06:06:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Jerome', 'je@gmail.com', NULL, '$2y$10$Pw7wBxMrLkgDNy6YZb0PFu1tx92qC5L55BGWcHUImXFIfdHyf1Dxy', NULL, '2021-05-07 18:42:48', '2021-05-07 18:42:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_dacilities`
--
ALTER TABLE `building_dacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_photos`
--
ALTER TABLE `hotel_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_id` (`upload_id`);

--
-- Indexes for table `kiticons`
--
ALTER TABLE `kiticons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_name_index` (`name`);

--
-- Indexes for table `locations_barangay`
--
ALTER TABLE `locations_barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_city`
--
ALTER TABLE `locations_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_district`
--
ALTER TABLE `locations_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_municipalities`
--
ALTER TABLE `locations_municipalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations_region`
--
ALTER TABLE `locations_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_barangay_models`
--
ALTER TABLE `location_barangay_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_country`
--
ALTER TABLE `location_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_address`
--
ALTER TABLE `merchant_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_contact`
--
ALTER TABLE `merchant_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myplans`
--
ALTER TABLE `myplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_inclusion`
--
ALTER TABLE `package_inclusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_creds`
--
ALTER TABLE `payment_creds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_package`
--
ALTER TABLE `plan_package`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plan_package_package_unique` (`package`);

--
-- Indexes for table `producs`
--
ALTER TABLE `producs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tour`
--
ALTER TABLE `service_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tour_photos`
--
ALTER TABLE `service_tour_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_status`
--
ALTER TABLE `temp_status`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `building_dacilities`
--
ALTER TABLE `building_dacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hotel_photos`
--
ALTER TABLE `hotel_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `kiticons`
--
ALTER TABLE `kiticons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations_barangay`
--
ALTER TABLE `locations_barangay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations_city`
--
ALTER TABLE `locations_city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations_district`
--
ALTER TABLE `locations_district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locations_municipalities`
--
ALTER TABLE `locations_municipalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations_region`
--
ALTER TABLE `locations_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `location_barangay_models`
--
ALTER TABLE `location_barangay_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_country`
--
ALTER TABLE `location_country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchant_address`
--
ALTER TABLE `merchant_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `merchant_contact`
--
ALTER TABLE `merchant_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `myplans`
--
ALTER TABLE `myplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package_inclusion`
--
ALTER TABLE `package_inclusion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_creds`
--
ALTER TABLE `payment_creds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `plan_package`
--
ALTER TABLE `plan_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `producs`
--
ALTER TABLE `producs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100113;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_tour`
--
ALTER TABLE `service_tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_tour_photos`
--
ALTER TABLE `service_tour_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `temp_status`
--
ALTER TABLE `temp_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
