-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2019 at 02:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
 

 
--
-- Database: `wajad`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--
 
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `corporate_id`, `limitation_of_posts`, `default_group`, `auto_approve`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'super admin', NULL, 0, 0, 0, NULL, '2019-12-26 16:03:11', '2019-12-26 16:03:11'),
(2, 'corporate-admin', 'corporate admin', 1, 0, 0, 0, NULL, '2019-12-29 09:23:47', '2019-12-29 09:23:47'),
(3, 'default-group', 'Default Group', NULL, 10, 1, 0, NULL, '2019-12-29 09:23:47', '2019-12-29 09:23:47');
 