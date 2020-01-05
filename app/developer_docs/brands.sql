-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2020 at 09:54 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.3.8-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wajad`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.png',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `description_en`, `description_ar`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'LCWIKIKI', 'ال سي واى كي كي', NULL, NULL, 'images/posts/post7.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(2, 'H&M', 'اتش اند ام', NULL, NULL, 'images/posts/post7.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(3, 'Others', 'اخرى', NULL, NULL, 'images/default.png', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(4, 'lacoste', 'لاكوست', NULL, NULL, 'images/posts/post7.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(5, 'corocs', 'كروكس', NULL, NULL, 'images/posts/post7.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(6, 'Others', 'اخرى', NULL, NULL, 'images/default.png', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(7, 'gohnson', 'جونسون', NULL, NULL, 'images/posts/post7.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(8, 'panten', 'بانتين', NULL, NULL, 'images/posts/post1.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(9, 'sherosa', 'شيروسا', NULL, NULL, 'images/posts/post1.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(10, 'Toshiba', 'توشيبا', NULL, NULL, 'images/posts/post2.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(11, 'Hp', 'إتش بي', NULL, NULL, 'images/posts/post2.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(12, 'Dell', 'ديل', NULL, NULL, 'images/posts/post3.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(13, 'Nicon', 'نيكون', NULL, NULL, 'images/posts/post5.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(14, 'Canon', 'كانون', NULL, NULL, 'images/posts/post5.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30'),
(15, 'Sony', 'سوني', NULL, NULL, 'images/posts/post6.jpg', NULL, '2020-01-05 12:47:30', '2020-01-05 12:47:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
