-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 02:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `title`, `lat`, `lng`, `type`, `status`, `created_at`) VALUES
(19, 1, 'مسجد آزادی', 35.7191, 51.3312, 8, 1, '2025-06-10 21:59:16'),
(74, 1, 'بین المللی مهر آباد', 35.6863, 51.3092, 15, 0, '2025-06-11 21:53:35'),
(77, 1, 'موزه عبرت ادمین', 35.7223, 51.3384, 14, 0, '2025-06-12 00:44:38'),
(81, 1, 'تست ادمین', 35.7189, 51.371, 12, 0, '2025-06-12 00:59:12'),
(83, 4, 'تست رضا ک ادمنیه', 35.7173, 51.3604, 5, 1, '2025-06-12 01:07:45'),
(86, 4, 'تست دوباره رضا', 35.7108, 51.3364, 7, 1, '2025-06-12 01:11:18'),
(89, 0, 'تست تهران', 35.6888, 51.3889, 1, 0, '2025-06-12 12:39:10'),
(90, 3, 'پارک لویزان', 35.768, 51.5194, 3, 1, '2025-06-12 14:35:02'),
(91, 0, 'خونه عباس', 35.6949, 51.4751, 1, 1, '2025-06-13 00:41:05'),
(92, 0, 'خونه', 35.7283, 51.3034, 2, 1, '2025-06-13 03:00:51'),
(93, 0, 'خونه', 35.7283, 51.3034, 4, 1, '2025-06-13 03:01:04'),
(94, 0, 'خونه', 35.7283, 51.3034, 6, 1, '2025-06-13 03:01:14'),
(95, 0, 'خونه', 35.7283, 51.3034, 9, 1, '2025-06-13 03:01:24'),
(96, 0, 'خونه', 35.7283, 51.3034, 10, 1, '2025-06-13 03:01:34'),
(97, 0, 'عبرت', 35.7283, 51.3034, 14, 1, '2025-06-13 03:01:44'),
(98, 0, 'ماه نو', 35.7283, 51.3034, 17, 1, '2025-06-13 03:01:56'),
(99, 0, 'اپارک', 35.7283, 51.3034, 28, 1, '2025-06-13 03:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(256) NOT NULL,
  `is_verified` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_verified`, `created_at`) VALUES
(3, 'abbas', 'chitsazi3@gmail.com', b'0', '2025-06-12 00:17:37'),
(4, 'reza', 'reza@123.com', b'1', '2025-06-12 01:02:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
