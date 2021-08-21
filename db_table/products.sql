-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 03:39 AM
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
  `icon_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asc` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `temp_status`, `user_id`, `created_at`, `updated_at`, `icon_id`, `img`, `asc`) VALUES
(10011, 'Tour Package', 'tour_operator', 1, 1, '2021-02-15 07:48:47', '2021-08-20 00:22:14', 'fas fa-map-marked-alt', 'tour-icon.png', 2),
(10013, 'Tourist Stop', 'tourist_stop', 5, 1, '2021-02-15 03:34:02', '2021-02-20 08:03:49', 'fas fa-box-open', 'launchpad-icon-tourist-stop.png', 6),
(10015, 'MICE Events', 'mice_events', 5, 1, '2021-02-15 03:35:36', '2021-02-20 08:02:55', 'far fa-calendar-check', 'events-icon.png', 5),
(10016, 'Hotel', 'hotel_and_resort', 1, 1, '2021-02-15 03:36:17', '2021-02-20 08:00:44', 'fas fa-city', 'hotel-icon.png', 1),
(10017, 'Language Translator', 'language_translator', 5, 1, '2021-02-15 07:37:08', '2021-02-20 08:00:28', 'fas fa-sign-language', 'launchpad-icon-translator.png', 8),
(10018, 'Flight', 'flight', 4, 1, '2021-02-15 07:38:43', '2021-08-20 00:26:55', 'fas fa-plane-departure', 'launchpad-icon-flight.png', 3),
(10019, 'Cruise', 'cruise', 4, 1, '2021-02-15 07:39:20', '2021-06-02 02:11:34', 'fas fa-ship', 'launchpad-icon-flight.png', 4),
(100113, 'Exclusive', 'exclusive', 1, 1, '2021-06-23 23:00:27', '2021-08-20 08:02:17', 'fas fa-gift', NULL, 0),
(100114, 'Tour Guide', 'tour_guide', 5, 1, '2021-05-30 17:59:03', '2021-03-30 07:57:35', 'fas fa-box-open', 'launchpad-icon-tour-guide.png', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
