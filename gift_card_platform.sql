-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 09:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift_card_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `business_name`, `business_logo`, `business_email`, `business_phone`, `business_address`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(2, 2, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(3, 3, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(4, 4, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(5, 5, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(6, 6, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(7, 7, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(8, 8, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(9, 9, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(10, 10, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(11, 11, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(12, 12, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(13, 13, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(14, 14, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(15, 15, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(16, 16, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(17, 17, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(18, 18, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(19, 19, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(20, 20, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(21, 21, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(22, 22, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(23, 23, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(24, 24, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(25, 25, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(26, 26, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(27, 27, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(28, 28, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(29, 29, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(30, 30, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(31, 31, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(32, 32, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(33, 33, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(34, 34, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(35, 35, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(36, 36, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(37, 37, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(38, 38, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(39, 39, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(40, 40, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(41, 41, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(42, 42, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(43, 43, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(44, 44, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(45, 45, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(46, 46, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(47, 47, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(48, 48, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(49, 49, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(50, 50, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(51, 51, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(52, 52, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(53, 53, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(54, 54, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(55, 55, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(56, 56, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(57, 57, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(58, 58, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(59, 59, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(60, 60, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(61, 61, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(62, 62, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(63, 63, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(64, 64, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(65, 65, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(66, 66, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(67, 67, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(68, 68, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(69, 69, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(70, 70, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(71, 71, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(72, 72, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(73, 73, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(74, 74, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(75, 75, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(76, 76, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(77, 77, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(78, 78, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(79, 79, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(80, 80, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(81, 81, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(82, 82, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(83, 83, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(84, 84, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(85, 85, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(86, 86, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(87, 87, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(88, 88, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(89, 89, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(90, 90, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(91, 91, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(92, 92, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(93, 93, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(94, 94, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(95, 95, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(96, 96, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(97, 97, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(98, 98, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(99, 99, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-02 11:21:06', '2022-05-02 11:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `business_stores`
--

CREATE TABLE `business_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_name` varchar(255)  COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_cards` tinyint(1) DEFAULT NULL,
  `display_store_name` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_stores`
--

INSERT INTO `business_stores` (`id`, `user_id`, `store_name`, `store_description`, `slug`, `display_cards`, `display_store_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Store2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'VMAZ0R0KMZOKA0WNLUQK', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:36:50'),
(2, 3, 'Store3', 'Store Description', 'WPS8PAXEVMZETNKVYOIC', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(3, 4, 'Store4', 'Store Description', '0NOPC1G7PW4CEL7JJJD4', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(4, 5, 'Store5', 'Store Description', 'GRVNNEDOIGNBQRKVUKLZ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(5, 6, 'Store6', 'Store Description', 'R0TUHZQHRA9YN1JNUZ5Z', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(6, 7, 'Store7', 'Store Description', 'ICYN1NRBBDF2K8QTHKWS', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(7, 8, 'Store8', 'Store Description', 'IN0AZFPGMXU31DIYYKLQ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(8, 9, 'Store9', 'Store Description', '8GEGA3QU41BQSC6RLABQ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(9, 10, 'Store10', 'Store Description', 'BOOEBWJUOHLVAJSDFGZ7', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(10, 11, 'Store11', 'Store Description', 'YSTR3EVDJPJ8MAILHOV3', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(11, 12, 'Store12', 'Store Description', 'V4WDG4IGTIDMX3AZOUYO', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(12, 13, 'Store13', 'Store Description', 'VNNFTD2IIX5AIYOKFNRC', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(13, 14, 'Store14', 'Store Description', 'JUAJ2MDEGCEGPKGJU4NF', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(14, 15, 'Store15', 'Store Description', 'ELC280KGU9GEJUCHQIFA', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(15, 16, 'Store16', 'Store Description', 'DZLLNFPO1IENQT8UDPLS', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(16, 17, 'Store17', 'Store Description', 'ILNPPIEGRW2I2K4WASRZ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(17, 18, 'Store18', 'Store Description', 'LSZJ6USZLF0DOQBEDITH', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(18, 19, 'Store19', 'Store Description', 'IP3DX6Y37J6ZNKHZKCVM', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(19, 20, 'Store20', 'Store Description', '9UF2SENYD1HYJCNWMJ1S', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(20, 21, 'Store21', 'Store Description', 'VJWBCDNRE4PT0SJEXBQ7', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(21, 22, 'Store22', 'Store Description', 'MKAWTXFBOSURAZYNDLDZ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(22, 23, 'Store23', 'Store Description', 'JWB2MSVAOJ1WTLSIBKLA', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(23, 24, 'Store24', 'Store Description', 'PHSCJPSH3LMUD87DWKXM', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(24, 25, 'Store25', 'Store Description', 'KP3WQMHC2LJWCQNVSYKX', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(25, 26, 'Store26', 'Store Description', 'WOG327EZLSBAOOE8WHEO', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(26, 27, 'Store27', 'Store Description', 'TXM4FNZSTF17NZTJXOVF', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(27, 28, 'Store28', 'Store Description', 'TKEU2RGYV9J2GI2YEIEP', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(28, 29, 'Store29', 'Store Description', 'XSVJX3UPM5K5QS5QLTYP', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(29, 30, 'Store30', 'Store Description', 'AONKL0UNAZWLBE14T6UB', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(30, 31, 'Store31', 'Store Description', 'VEFLTNMDCAPKMV2DBKNA', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(31, 32, 'Store32', 'Store Description', 'FPXUKCGC2ZPP7QL8WMFK', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(32, 33, 'Store33', 'Store Description', 'KX9K8XBZE9NSJ6RBCZHR', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(33, 34, 'Store34', 'Store Description', 'CDF2BJUP5UAZNUSXGXH0', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(34, 35, 'Store35', 'Store Description', 'SVN4A8MIQMVHSXERLFVX', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(35, 36, 'Store36', 'Store Description', '7I7V8IFLVEGF4KIVYNXB', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(36, 37, 'Store37', 'Store Description', '82NO4EQBMBFMTAV2NZYV', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(37, 38, 'Store38', 'Store Description', 'PLAUFJWHRKJEUWATSSRZ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(38, 39, 'Store39', 'Store Description', 'PJRKRLWWEINU7QRKULIY', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(39, 40, 'Store40', 'Store Description', 'MZKHORXUI4LVC8GPGDHT', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(40, 41, 'Store41', 'Store Description', 'ICEB0DWOQGB2JX50P1SP', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(41, 42, 'Store42', 'Store Description', 'SYO72JVZ9J3PCIMPUGFO', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(42, 43, 'Store43', 'Store Description', 'VYAJZJMSWUAGTYKS3EVE', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(43, 44, 'Store44', 'Store Description', 'FZNHAZR8INAYQHX0DDQQ', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(44, 45, 'Store45', 'Store Description', '9G2YFZBERR8IB6KMOZM4', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(45, 46, 'Store46', 'Store Description', 'CGLFLFIG4OYIKQTGZSOK', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(46, 47, 'Store47', 'Store Description', 'RVJEAINIEIWWMXXSDLNG', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(47, 48, 'Store48', 'Store Description', 'WCUZCI3UCAOOO84DVQXB', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(48, 49, 'Store49', 'Store Description', 'RK1VSFGNI0TRETTEC7KA', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(49, 50, 'Store50', 'Store Description', 'H8YPDAKBRNBMWEJGAXRP', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07'),
(50, 51, 'Store51', 'Store Description', 'QM9HZ2W5FX3K0R9MWKAA', 1, 1, '2022-05-02 11:21:07', '2022-05-02 11:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `client_vouchers`
--

CREATE TABLE `client_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_vouchers`
--

INSERT INTO `client_vouchers` (`id`, `stripe_id`, `voucher_id`, `user_id`, `price`, `currency`, `comission_percentage`, `final_amount`, `created_at`, `updated_at`) VALUES
(1, 'free_card', 1, 102, '0', 'usd', '0', '0', '2022-05-02 11:31:56', '2022-05-02 11:31:56'),
(2, 'ch_3Kv2DDRYVF7b7SlI18V8uOOf', 2, 102, '10', 'usd', '10', '9', '2022-05-02 11:35:05', '2022-05-02 11:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'usd', 'usd', 'fLbJsHykhG', '2022-05-02 11:21:06', '2022-05-02 11:21:06'),
(2, 'euro', 'euro', 'wg8G74iWaM', '2022-05-02 11:21:06', '2022-05-02 11:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_06_12_000000_create_voucher_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_24_201631_create_stripe_configurations_table', 1),
(7, '2022_04_13_041510_create_currencies_table', 1),
(8, '2022_04_17_185829_create_settings_table', 1),
(9, '2022_04_22_231511_create_business_details_table', 1),
(10, '2022_05_01_133005_create_business_stores_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeemers`
--

CREATE TABLE `redeemers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redeemer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeemer_id` bigint(20) UNSIGNED NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_logo`, `company_email`, `company_phone`, `company_address`, `comission_percentage`, `created_at`, `updated_at`) VALUES
(1, 'Gift Card', NULL, 'company@email.com', '+00000000000', 'This is the Address', '10', '2022-05-02 11:21:06', '2022-05-02 11:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_configurations`
--

CREATE TABLE `stripe_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_key` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` enum('test','live') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_configurations`
--

INSERT INTO `stripe_configurations` (`id`, `public_key`, `secret_key`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'pk_test_yKF28OfsGchVLbr4FmAH8x61002zuh3083', 'sk_test_sQJFDUoOy3WAqtUupBH9V5aM00zebNYJaP', 'test', '2022-05-02 11:21:06', '2022-05-02 11:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `user_name`, `email`, `email_verified_at`, `number`, `password`, `role`, `role_id`, `slug`, `account_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', 'admin@email.com', NULL, '451470975074', '$2y$10$rrdasTaOv3VAOCIhxG8zgucXyOD03376FpCHVj3gUbHYFw.d5RSMq', 'admin', '1', 'SG7ZJ6TZI8CMNKTKJZCS', NULL, NULL, '2022-05-02 11:20:51', '2022-05-02 11:20:51'),
(2, NULL, 'business1', 'business1', 'business1@email.com', NULL, '124213849352', '$2y$10$Dn4NR.KCmtvVIBi9eQpVruWs1XoeFJDbUKnt2YNnRCSVLpAANdDAi', 'business', '2', 'I1VXELDKQDYR4GCIT1QD', 'acct_1KVjQIRYVF7b7SlI', NULL, '2022-05-02 11:20:51', '2022-05-02 13:51:40'),
(3, NULL, 'business2', 'business2', 'business2@email.com', NULL, '459177230652', '$2y$10$9mXQ4VoyWfhZSCspX9beHuSNVqccq6TOmpwTZekQxIbiBrh3FXIM.', 'business', '2', 'S2YK6UHODE3TDKQ3FMRI', NULL, NULL, '2022-05-02 11:20:51', '2022-05-02 11:20:51'),
(4, NULL, 'business3', 'business3', 'business3@email.com', NULL, '531448001592', '$2y$10$wjhvGZRWqjlj1ZbWCB9Y0ecaKNCv.PVZWUKbqqsMCx119avFNMuk6', 'business', '2', 'VBTI6BEP2B3YCJNAOVQW', NULL, NULL, '2022-05-02 11:20:51', '2022-05-02 11:20:51'),
(5, NULL, 'business4', 'business4', 'business4@email.com', NULL, '995797471838', '$2y$10$QJuGDAeJMfKY8GB6DtPbP.kUCAUtwnb4H18mZfbU7IE9RtPAOe9w.', 'business', '2', 'QIFJONCKI7A8LX3YRU1A', NULL, NULL, '2022-05-02 11:20:51', '2022-05-02 11:20:51'),
(6, NULL, 'business5', 'business5', 'business5@email.com', NULL, '472322267566', '$2y$10$cnS9BQ52YquQiwgOZQIXiOncva6oLklCMRYuPYJapP7hZimFzONVG', 'business', '2', 'AUDHB09Z063FHWFK4F3C', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(7, NULL, 'business6', 'business6', 'business6@email.com', NULL, '676374037707', '$2y$10$wVYtB6m69iGoyuFXBkJydONLZnZqGnOXCxeR6WtG7LNtRVSDdQjca', 'business', '2', 'CNHWGFLWGGP6ZFRPE4EV', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(8, NULL, 'business7', 'business7', 'business7@email.com', NULL, '935800167089', '$2y$10$dMgvoEBSmQt1N5mwPMMCPOvXTaEdbrc9Cfgsej4Ds15hMc669c/fS', 'business', '2', 'WXY3HUA2T3ADSXZQ2XAS', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(9, NULL, 'business8', 'business8', 'business8@email.com', NULL, '444319816278', '$2y$10$yMA7V2PJQCRzeElhwpus5eyybSaX1CcGBB9D8uMfEMNyc4MAoT0Xm', 'business', '2', '439KPBR9FLVI7FZQAMBN', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(10, NULL, 'business9', 'business9', 'business9@email.com', NULL, '659291860291', '$2y$10$SOBX3S3oMzIFq2dseKldhOJpspiFJtLVDtxoz60BHavii1SNZDbwW', 'business', '2', '080JPWXOCCVMZCEXFDF3', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(11, NULL, 'business10', 'business10', 'business10@email.com', NULL, '802550799593', '$2y$10$iK2fHq2AiZ7Z/9Od2XSGCOZuF.kp2itZZ8RDTwbnnjct8CbRJa2si', 'business', '2', '39ZFVBNRABHOHBHGI9BF', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(12, NULL, 'business11', 'business11', 'business11@email.com', NULL, '369516735439', '$2y$10$wKw3uAjNHIRq.H1RHsMM3.n9K5laq83Vng0MeUrAa16TyRznOmMOa', 'business', '2', 'F7QRKG2J8FW9RHBZVF1X', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(13, NULL, 'business12', 'business12', 'business12@email.com', NULL, '410642439448', '$2y$10$trrkH1028sNVYOZ4GxGwcOElQbjS2j8YAmbHOz0HifXB1ugFUvNey', 'business', '2', 'XHPUSVB78LHKKJNCDTOI', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(14, NULL, 'business13', 'business13', 'business13@email.com', NULL, '847107894702', '$2y$10$4RNkfm8ijHAQ7mMu5seO0Ow7wW3u9dXOKK30rTTo3k03mMDETxx7O', 'business', '2', '0UQXAESHBVG5MWW04ZIW', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(15, NULL, 'business14', 'business14', 'business14@email.com', NULL, '562092034364', '$2y$10$c8oVGd1QMMwfqXmGijRnrebewvkNSAuoRzr/J08KfgAWzhGylIKDi', 'business', '2', 'YMXGCDAFA1S7913XCVSO', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(16, NULL, 'business15', 'business15', 'business15@email.com', NULL, '939187983671', '$2y$10$IeMLAcpzmA6tdMPzCGSxN.ZOMtCqhqrHHX6L3yBIJAyr2N/SAFhma', 'business', '2', 'M9ZUHWDME8ATXNO7TTAS', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(17, NULL, 'business16', 'business16', 'business16@email.com', NULL, '785090074515', '$2y$10$mtetX9JD5.X5dh0mEQuu8.HImfr7aFSSlwnNutZ6r1Y53vTQ3BXfi', 'business', '2', 'KP2NK01DA0YZFGUBNYHW', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(18, NULL, 'business17', 'business17', 'business17@email.com', NULL, '876750517179', '$2y$10$hcUfCUIOJG3YANWF6pjbreoAu1OMb3j6BOhWighWMA2hmfCptWWwi', 'business', '2', 'WHA6DHDDFXK1RP1D1JPB', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(19, NULL, 'business18', 'business18', 'business18@email.com', NULL, '919966286598', '$2y$10$uL0Whb4/hObYEHFYp4bafOohOzzEBiZKJVMnO1JJCAI87X8QPzMQm', 'business', '2', 'YU1DMGMQOPMIICRZEJLO', NULL, NULL, '2022-05-02 11:20:52', '2022-05-02 11:20:52'),
(20, NULL, 'business19', 'business19', 'business19@email.com', NULL, '805420735126', '$2y$10$iGLj7CPa14o0Ce5zeWPE9eOMNs34xEDZzioUlh8als8IGVRGzIDXG', 'business', '2', 'U8HVI5EXM2FDQP6A2NWY', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(21, NULL, 'business20', 'business20', 'business20@email.com', NULL, '361412552007', '$2y$10$CwFKlEM.tpdFVJ4HOt0ZPeirK2XyXiniwWjGP.hHXABE6nAM1yoge', 'business', '2', '1U0MGQHTT8EINMDPSTAI', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(22, NULL, 'business21', 'business21', 'business21@email.com', NULL, '686523065395', '$2y$10$kfh15a/WwnAOJUrMqx0Sj.9soR8tdVYpLTnPGHK7MPWZz0nwgeJEO', 'business', '2', '2HYLUTKGTWMHIGZSX4SF', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(23, NULL, 'business22', 'business22', 'business22@email.com', NULL, '677006759468', '$2y$10$l2EgTg/dU9i1itW5LpYco.yrJyLiy2KAM.W2WJTwFPeqQImmA0LA6', 'business', '2', '52EGYY7JOKMXM7GZJRVL', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(24, NULL, 'business23', 'business23', 'business23@email.com', NULL, '840725317840', '$2y$10$DIDKA6pRI3rIcSqtZjVQAORV4n.YWjzt7y59vJ2FvomhoVxH4WJOS', 'business', '2', 'YC5DGRSSHVDF3MJVVWLF', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(25, NULL, 'business24', 'business24', 'business24@email.com', NULL, '218267622909', '$2y$10$GaKNnQUPoqIBTHJ3gWr6d.F0L/o3ub9Y3cstewKkk15VgE70LeLfi', 'business', '2', 'JRFNT1PNEKHBFO1CKYZ2', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(26, NULL, 'business25', 'business25', 'business25@email.com', NULL, '661219464905', '$2y$10$ZX8YmjNJZZW8Whauk6EVcOdyImbR3Mvdwi0Gsw3233Q/hk7bN.WHW', 'business', '2', 'LINRKYVCUW5WKWXEM3SF', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(27, NULL, 'business26', 'business26', 'business26@email.com', NULL, '501445593796', '$2y$10$5CM5Qx4mfdZlbzfnVdt2aufNSMt437ID/JGOoXeJ2sODIFY2JUcQi', 'business', '2', 'VFKHW5X1CTFQUPVTIIZB', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(28, NULL, 'business27', 'business27', 'business27@email.com', NULL, '770818484365', '$2y$10$I4Rc3Nhlu4iqxyaeNE791OY1nx1OcdsKnlKM8fNGDkGmG4T937.iC', 'business', '2', '5TDPSHU3RELNEMP4KBMU', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(29, NULL, 'business28', 'business28', 'business28@email.com', NULL, '357716256809', '$2y$10$JEG2PvD9SY6pWP3lrmzBv.ZK9im/iAkDlGJ.QsNo6K3kJuwObCvtW', 'business', '2', 'LVX0QUGC27ENPP1DV3AM', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(30, NULL, 'business29', 'business29', 'business29@email.com', NULL, '105066521877', '$2y$10$PbTnmmeOY./1EsVZNE/DeucXJ40U3ARZScX.lKaeJYM5SiNq7hyPC', 'business', '2', 'H5KSA7YDN9OAOPU39JXB', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(31, NULL, 'business30', 'business30', 'business30@email.com', NULL, '956634681681', '$2y$10$4/vJV84koidZ1yVm254bhuUUDmNMX6QTblFBGmuB1bV6cYVuw4V6m', 'business', '2', 'UBYZTJYCKT2ZR0GGCVYN', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(32, NULL, 'business31', 'business31', 'business31@email.com', NULL, '463109869627', '$2y$10$2XvzNnfecZsri60lDrvQXu1IYWIBDHTFRvROQXy7TjiBo7Yth1W.2', 'business', '2', 'RPYH4B27TTRWIMMGEOSF', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(33, NULL, 'business32', 'business32', 'business32@email.com', NULL, '445926137431', '$2y$10$qFM9ppPofxdoKd4bk.IMDey8C5Zjxe54oLRYX.z/aAUK8rMmESh6S', 'business', '2', 'OMYEX7PFAGHTHHG0MAMG', NULL, NULL, '2022-05-02 11:20:53', '2022-05-02 11:20:53'),
(34, NULL, 'business33', 'business33', 'business33@email.com', NULL, '390504671770', '$2y$10$RBxLtxMjSey.vJNOZo/jVuvt3rOQJzyLMp04xnfHNUiX/FSYaUkuG', 'business', '2', 'ZJXCTL7IX1M9C2OVG8HS', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(35, NULL, 'business34', 'business34', 'business34@email.com', NULL, '113650321594', '$2y$10$zoDfFbJMZBHy1OTcjSod7OUPu4yXk9cP2b/MmXTrVJ3Rl7ZJ8YUn.', 'business', '2', 'POXMTQB7HABIMYGSY2DD', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(36, NULL, 'business35', 'business35', 'business35@email.com', NULL, '628343217407', '$2y$10$pTWUOabP7EI7wwdTCBLQfeteB3QHvoJTrCX7N2rB2YZqCHmAK3Qda', 'business', '2', 'A2ZYAWOHLYJOU8EXUL8T', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(37, NULL, 'business36', 'business36', 'business36@email.com', NULL, '649300260078', '$2y$10$ZD0xclHC9tAcPS3deMVfX.Kze7RoY7bGKbc9bdUL3pUJfRsZedC0e', 'business', '2', 'YNIK6NXAQG2JPE3KOGKD', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(38, NULL, 'business37', 'business37', 'business37@email.com', NULL, '953532360790', '$2y$10$OrjreAjm7XDyuL195GNyROfxiVUovmx0KJSv5ugEIYcp44R/5qFj6', 'business', '2', 'NPF4Q3PMOKCTWZWGH7W2', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(39, NULL, 'business38', 'business38', 'business38@email.com', NULL, '575470489634', '$2y$10$v5fj9Sr4daz64OIvDLZyNuK0wSSqYRbXt/6smgkKUgUg.gozyLyDq', 'business', '2', '6HJO44QVHGTHJ0EORGZT', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(40, NULL, 'business39', 'business39', 'business39@email.com', NULL, '201595422201', '$2y$10$ymsu/MTlHmQkWKIppBP9BO6aEdBKOhhYJkpTSpzci38oUN/OUZV9C', 'business', '2', 'OEHXLVQESOIE7O0HHL3H', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(41, NULL, 'business40', 'business40', 'business40@email.com', NULL, '198842850228', '$2y$10$cN2uYK.MFMKwYPBgXUwOF.iOrq8kZncmGyHZm2DjYMzBQ8rLNeBGG', 'business', '2', '1CAC0VAMS1CLFYIBDTDQ', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(42, NULL, 'business41', 'business41', 'business41@email.com', NULL, '959299208841', '$2y$10$RDqq3xrH6zir4jqz/N5Nbu8ti6.mnj4veqwYawZG92IgSOxu/zS42', 'business', '2', 'VJ6TIRMLSR1WIZYHM86C', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(43, NULL, 'business42', 'business42', 'business42@email.com', NULL, '282172450165', '$2y$10$pv3fvsXbjwHypIVnhX0NseiDbYh02Gnr/VkvLS0OCCdxWbx3hD2ye', 'business', '2', 'ZPAMY4ES15GWM4SZXDF3', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(44, NULL, 'business43', 'business43', 'business43@email.com', NULL, '904965866530', '$2y$10$hoQ2.l6Uibie1V6Qki6L1eGZCDHSjMIuNyiOEzwT3uh8b9AEaggIW', 'business', '2', 'KYFNKQFRUA7P4BZ7MMWW', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(45, NULL, 'business44', 'business44', 'business44@email.com', NULL, '907392013061', '$2y$10$vCLnu8yY6oiFtrVevqyyeu9r3SXgudQC.Rtnv1bIdBm2cKI/Vs3pG', 'business', '2', 'E9BFQUXZDJU2UUYC0A1K', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(46, NULL, 'business45', 'business45', 'business45@email.com', NULL, '806349038139', '$2y$10$5hnX82vfAr.fiA2cGUtxAuKgfb/kLXcfxuYg3xnOIWV/j1HbD16ze', 'business', '2', 'AON66TENB4YHDUBAA7H9', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(47, NULL, 'business46', 'business46', 'business46@email.com', NULL, '148752342421', '$2y$10$gD0XgGLonkuWQ0GbRiOXEOd9yR4yaHOj8XwW8ewxw1VAEDt0wpQ7K', 'business', '2', 'UTWQJGYUXE5ZNVFHPUDN', NULL, NULL, '2022-05-02 11:20:54', '2022-05-02 11:20:54'),
(48, NULL, 'business47', 'business47', 'business47@email.com', NULL, '683413862779', '$2y$10$RaF21DjTtTjtzMMq918AOujeTHJoNKrEPhe2FZrrxUBJTQKRNmLgy', 'business', '2', 'WMP1XEN5RYXMILKKIXVG', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(49, NULL, 'business48', 'business48', 'business48@email.com', NULL, '217328733482', '$2y$10$0V49vdgOseTilrgYF5KbvuXV6MvIkSIrg.Op726jPTND8rVpFOUVi', 'business', '2', 'JMHZEYAQ3VFMF9USXQQF', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(50, NULL, 'business49', 'business49', 'business49@email.com', NULL, '468324230923', '$2y$10$UwwOKrnEIHzV/0ANCkYDoOAHqetVYcvGramGZoqaNjV7687oqcdfG', 'business', '2', '655TGO6IBLLAXOIERSUY', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(51, NULL, 'business50', 'business50', 'business50@email.com', NULL, '905047088822', '$2y$10$mn6ACJx/skfXtmmpMvbtieGF26ZCfJjPswF9YQaNdRxBLZ4t6FaO6', 'business', '2', 'ASYG8M3EBGUMNP0RREOW', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(52, NULL, 'business51', 'business51', 'business51@email.com', NULL, '716752308754', '$2y$10$ItY2gFcsea3nmHdHYesz1e9XbGp9HzzZt0z8EiVDwEJ.7BCvlWXFe', 'business', '2', 'E1N08PKYVZX5WXX5NAMK', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(53, NULL, 'business52', 'business52', 'business52@email.com', NULL, '181497966003', '$2y$10$JKoswQIm7vLPAbltbfGawu4rT5rtzBN18pjnOI0.dJWwts45x8NBu', 'business', '2', 'WNKIWRKROB12N1CKRHK4', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(54, NULL, 'business53', 'business53', 'business53@email.com', NULL, '428723983800', '$2y$10$KVQRiUS6GCLYBOpR8bpwvueCS/iWuc7377tE/aifZCXSfZtjfRskK', 'business', '2', 'XM08AQMBU2VXKSRXKGGY', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(55, NULL, 'business54', 'business54', 'business54@email.com', NULL, '868640271958', '$2y$10$bemak4GAnp8OLBYr9aS63.GRtXIxOYS51yZoL6RebMcmYJ1an6aty', 'business', '2', 'OV9YD2MKMDQCOBBBQA7E', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(56, NULL, 'business55', 'business55', 'business55@email.com', NULL, '190492125178', '$2y$10$OnAZidY/2zaaDsQPNTMZruZpirP1KfiJwr3Q0ZVP0efDNrXHzrHN.', 'business', '2', 'XVJWDS9XMUJUASNAEY4T', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(57, NULL, 'business56', 'business56', 'business56@email.com', NULL, '193247443959', '$2y$10$CiadirPZMyxupV07lpgqauHiIOkG5X482.tYbubCBzL86UgRVMsVu', 'business', '2', 'UX9L5V32GZFCFFCJQWNW', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(58, NULL, 'business57', 'business57', 'business57@email.com', NULL, '456725368679', '$2y$10$/7uYdZ1ZZyDdkpHwO4e6Oumub/IcAkx7sLix2QFVpCNBozP.MUhsi', 'business', '2', 'X7YTCG3XMLJV2GZUN1AB', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(59, NULL, 'business58', 'business58', 'business58@email.com', NULL, '856888784664', '$2y$10$OnLCPQOkb9XR0Wo6HhA4uehd0Hf3fEJ6G.iLD3q8DlXMfVpG3DnwK', 'business', '2', 'EGBK1KE9ALINXEYP5W3R', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(60, NULL, 'business59', 'business59', 'business59@email.com', NULL, '824283983444', '$2y$10$xNg3lp5zEULTqUb2N19zSeYL2qi.CcMkJLagSw2rBD42BzYA2rggC', 'business', '2', 'PJ57S4NARCAQRYPJMFUN', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(61, NULL, 'business60', 'business60', 'business60@email.com', NULL, '307171164081', '$2y$10$fiKPh06oqewZOY8EQn/btOF/mTNTo14iEbeHvpL12hhaXVT4NPBSm', 'business', '2', 'S3HXVRNAG2LKEI3GQ8US', NULL, NULL, '2022-05-02 11:20:55', '2022-05-02 11:20:55'),
(62, NULL, 'business61', 'business61', 'business61@email.com', NULL, '825359298127', '$2y$10$uJ7BWW27zp.vr4kh26IYUumA699RH4jaKlhEf5/D51U9qGU3OUDZy', 'business', '2', 'ONGQCCOLKZYM7ZJ9ZBCX', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(63, NULL, 'business62', 'business62', 'business62@email.com', NULL, '411722967542', '$2y$10$1MNc1gBfng/WJIP/MQZ83uSdN7HFJx16geKN1HThhXOenpaB3jaMa', 'business', '2', 'AEH0YHDAL9MYJCICXIVK', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(64, NULL, 'business63', 'business63', 'business63@email.com', NULL, '805321506068', '$2y$10$UiE6Q2GJR1m9xmV0HF3hlOWJYQ6gVRjaxKEZphGzjFK4sqYk8qbS6', 'business', '2', 'AVFS4VJ6HZFJVIJ5T4JT', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(65, NULL, 'business64', 'business64', 'business64@email.com', NULL, '267935703733', '$2y$10$ImY95f3ctgO2PyM2uFf9W.ZY3SVwwZw1QZmxaPpq0rVJ2F8ksQGOS', 'business', '2', 'IJ7BWPLK5YTYJUDEBBKS', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(66, NULL, 'business65', 'business65', 'business65@email.com', NULL, '432448677522', '$2y$10$.GKMg3wgTJIIcKZ.2mPW1eZGHi1.qEODSYWqevJCpMDvrIZmJQ7AG', 'business', '2', '1CSADLU0QXUYTMHL6YEN', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(67, NULL, 'business66', 'business66', 'business66@email.com', NULL, '625508331630', '$2y$10$gg3QqMcIn2bZwqMpLdhUl.qdm80WVBMgjjODjGo.wcLf3/E1l5p12', 'business', '2', '91EPZPYZFZ6FLKW8CCFW', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(68, NULL, 'business67', 'business67', 'business67@email.com', NULL, '602435442734', '$2y$10$aP702UpD14pzwfM78YJpIeWgehxj1d3YBp1GfsntomAH0F31e7fyS', 'business', '2', 'XFYTI7NGLFJ4ZVIVOYRN', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(69, NULL, 'business68', 'business68', 'business68@email.com', NULL, '651737081509', '$2y$10$d2EmOLtSNOIKW4wGx5uSveburifyLtwawGCI5YedhLTa.6ZS1CVNK', 'business', '2', 'ECWCDCSJ8QGFTJKVUGAY', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(70, NULL, 'business69', 'business69', 'business69@email.com', NULL, '808088272557', '$2y$10$1lOTg08ET0uRB56pjXTlOeZcjDujDYJK.pKwKkQXwkrQsQBfdgjwq', 'business', '2', 'ID7UW22AABVMVW0TN6XY', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(71, NULL, 'business70', 'business70', 'business70@email.com', NULL, '706224325143', '$2y$10$BYetNVSGUnQGE/W8IK1sQuhHA7kJEea4dlZ5J10dFmvdIuFInoh66', 'business', '2', 'CRFHBHQENICXLADMIA4F', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(72, NULL, 'business71', 'business71', 'business71@email.com', NULL, '227006524232', '$2y$10$Xe9YTZroPJsMZAtV3joTbu842I6yd/eLHTX3LtGIsEnXX2xel31b6', 'business', '2', 'ZQPLTULLRXAY37FZN1MZ', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(73, NULL, 'business72', 'business72', 'business72@email.com', NULL, '284628435649', '$2y$10$ZjKAWUarjBZ9Uwc1xJERj.mPNM7Qn8KygVqVCJEuTgpDso/GbD8CK', 'business', '2', 'KWRYSXTB7RWFSH9BQXAR', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(74, NULL, 'business73', 'business73', 'business73@email.com', NULL, '354193925242', '$2y$10$bicAjWZ1My5n1mJEvVHWLOZf8q9klUo1j01O49Y73dSz2XUfXJFOq', 'business', '2', '1EWZENOAH1PSZWBIWUPO', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(75, NULL, 'business74', 'business74', 'business74@email.com', NULL, '364420306838', '$2y$10$88sIfghMHOEZhptTKB3j4.i5apvZjlwAvUWHF3B/IKjUb/yg6jORG', 'business', '2', 'TMOQMBLOV6AVEVYGP8B8', NULL, NULL, '2022-05-02 11:20:56', '2022-05-02 11:20:56'),
(76, NULL, 'business75', 'business75', 'business75@email.com', NULL, '313058201716', '$2y$10$ZbxIa9dmOgMZsie3QL2Vh.8pTjBfonjGAKGQRUXTTJDp0YCyTfF76', 'business', '2', 'UFOCEGZB5YWZVJLZCJFH', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(77, NULL, 'business76', 'business76', 'business76@email.com', NULL, '402897857082', '$2y$10$SsrYkKiNHAQYEkuKcrXe8OL9G1cifzh3tmi3fwFXcUdG4HO9GG3La', 'business', '2', 'ZH1QCJLUZH6BJXXZ6GWX', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(78, NULL, 'business77', 'business77', 'business77@email.com', NULL, '758538838653', '$2y$10$5d30bKNnRsD20An1Jweu7uewojCjPS/1e3WSlKGTzQx3MpSRzcrL.', 'business', '2', 'NJBRZMQ4WWOBWSLK9K4D', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(79, NULL, 'business78', 'business78', 'business78@email.com', NULL, '397375634361', '$2y$10$wJMp61htvhJwAN6EYk36C.4V/Z6h8vV6dP6u7x6sg/g92a9r5RPK.', 'business', '2', 'BFNB3J04X25IH28TYWAD', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(80, NULL, 'business79', 'business79', 'business79@email.com', NULL, '317345614034', '$2y$10$RtzuXb.a/reufesS8.6ZxeI5TBO4WToDdc9XrBJmFa7Id/V0jJLgC', 'business', '2', 'WAM2Y4DNFEG9A4QMVIYG', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(81, NULL, 'business80', 'business80', 'business80@email.com', NULL, '637566506908', '$2y$10$uTjW0UCIqDM1FZL4qb4Iq.ycBiu473rzaqid1cCCJAkvulEpJNRWq', 'business', '2', 'YZYS9DKIHTROPNWPDDMQ', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(82, NULL, 'business81', 'business81', 'business81@email.com', NULL, '106767396808', '$2y$10$eNBbnHQd.M64HHu7gpLVdeykRGP41jaWdfnqys9b3tEFynLMSMDbu', 'business', '2', 'L2FDP6C0IXNQNNYNH4RX', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(83, NULL, 'business82', 'business82', 'business82@email.com', NULL, '349916568162', '$2y$10$95KYrIJzYSSFJFazOlD0C.R.LF6b1G.1IqVGdoocy09PhnU2TQgp6', 'business', '2', 'P4T7545651HH1ML608S1', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(84, NULL, 'business83', 'business83', 'business83@email.com', NULL, '100980690479', '$2y$10$GrZDMCid923CsI87qyBQvuMbfhxSnkgL7IGi6Kfzokkhgogv1jx52', 'business', '2', 'RDESDJD79QEAIONYZGNL', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(85, NULL, 'business84', 'business84', 'business84@email.com', NULL, '615087155228', '$2y$10$eL/QxQlIrBYdKwWZAWetd.Hj2fL8brR08O.MdyljXU0GgZMNZzbp6', 'business', '2', 'WEEKC1BIEPVGTAFZAOHS', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(86, NULL, 'business85', 'business85', 'business85@email.com', NULL, '880315184524', '$2y$10$bOdvDhDQB8uUfe8qdm6OdeoImT2dvXyqgmTda8bsIaPFjuA0NnyXW', 'business', '2', 'IU8P3QXVHOFIKSDYRBZW', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(87, NULL, 'business86', 'business86', 'business86@email.com', NULL, '382391105382', '$2y$10$TZkchz2ERnWrhRZvO6tsK.tx6oydzbakV5AAiLVCDYePerPgevKO6', 'business', '2', '0UR5UFEWSKPXRY2VZNFV', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(88, NULL, 'business87', 'business87', 'business87@email.com', NULL, '111041136256', '$2y$10$DVJh8LFlFRFY9c.E7b1idePf.ABvw09eSCZ1a1qX24hjrZvEO480i', 'business', '2', 'ITNO1PKNRQJSHBUMDQTT', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(89, NULL, 'business88', 'business88', 'business88@email.com', NULL, '892730022971', '$2y$10$/p27MflJ2Qa3SH71bXnh/OoSK319re0DsiRjp2xJDBFHU8UnPA9kO', 'business', '2', 'APPUBMZAJJUW2MUJVF0H', NULL, NULL, '2022-05-02 11:20:57', '2022-05-02 11:20:57'),
(90, NULL, 'business89', 'business89', 'business89@email.com', NULL, '863928175718', '$2y$10$AtKWq0ccLqh9BjPU9dAMdu9EUhC.5cQGew0A2cC.6Q0NQilLCVLDi', 'business', '2', 'G78OPLIIREGQ7ONJ8L2H', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(91, NULL, 'business90', 'business90', 'business90@email.com', NULL, '500491127272', '$2y$10$b8Tu2XOKG3hw/xkejxHjcu.udL81OKbHYNUn/bZibGTMtR0CU1OTi', 'business', '2', '4TXUVTVOIXKULVSEIOGC', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(92, NULL, 'business91', 'business91', 'business91@email.com', NULL, '202779979949', '$2y$10$wzBYWaIazM8bG2bpZvlnmedjsTdEKGs/7mcKoWgqb1qe0LlOnXETq', 'business', '2', 'PZ7N1KAEASOWLSXCAB75', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(93, NULL, 'business92', 'business92', 'business92@email.com', NULL, '914012727316', '$2y$10$sp7JkGW31GQdepziguHTu.kfQbFWdyYPCo1hyHg8fZcZbgrS0OSQK', 'business', '2', 'PF87DVJ0H9DBLLSWQ3Y3', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(94, NULL, 'business93', 'business93', 'business93@email.com', NULL, '679116184955', '$2y$10$/MwLmTEKjV7lNWm9fPdySO1XGrFOYf9rTrVIGjii/dLfiezz5m17W', 'business', '2', 'SSVKAE980FJFKREENJXJ', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(95, NULL, 'business94', 'business94', 'business94@email.com', NULL, '385916838940', '$2y$10$u9W34gthPpJfYjPQ5DbZl.5RA4SE1je7ZQSRcivtp8kLF2hqZTlSC', 'business', '2', 'NWZDWJ9N3SPFMVBISOQH', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(96, NULL, 'business95', 'business95', 'business95@email.com', NULL, '522857566148', '$2y$10$RyiUyJ7c9w5ni8lq/HC8sOkpr0dBCVhGUfQau5g/glQ9rF29Tqdea', 'business', '2', 'JTETIQJVLQFAHWHUZNKY', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(97, NULL, 'business96', 'business96', 'business96@email.com', NULL, '237695864999', '$2y$10$glVZUtvKL/l30beb2g79qufjicW76dw0fCJ9judv9gwQo/SNTwn22', 'business', '2', 'NXSDGWXXTWTQ3OMRF9DH', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(98, NULL, 'business97', 'business97', 'business97@email.com', NULL, '656102669599', '$2y$10$DShMBY1r0UraIS8/w.7/Cucimx930FUZ1v.LM85a4LFEXUIy/k50a', 'business', '2', '84IMHCB5XXLLLGY5J7SC', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(99, NULL, 'business98', 'business98', 'business98@email.com', NULL, '208477803214', '$2y$10$gof0ddFE1CnFSkFQmew88uhxI5faWGeMiVsRoLY6jWcxssQrMBIAu', 'business', '2', 'BLRANXORM3TLK2EXYT3X', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(100, NULL, 'business99', 'business99', 'business99@email.com', NULL, '719253285980', '$2y$10$VGCuQ73kN5xr.OSMkkSp9.Jj0A8aVJ9KW.ibC5QrKWan2YUK1nrFO', 'business', '2', 'Y0ICSLBPY7EKLY8779FJ', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(101, NULL, 'business100', 'business100', 'business100@email.com', NULL, '592211155492', '$2y$10$WF1U0WPAy.xc74fAKzZJGuJi011UU4qpk5OkGF0QQ62ME.cVJudXu', 'business', '2', 'AWXMJCOYPONAVTMZKSVT', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(102, NULL, 'client1', 'client1', 'client1@email.com', NULL, '858585091616', '$2y$10$cH5UBIHXmead8KeQWPnIAeJHxQWo1GmruOhG2mVwmeIb6HvrdnxKW', 'client', '3', '6GQ6GFD2S1SPPV5PLBPK', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(103, NULL, 'client2', 'client2', 'client2@email.com', NULL, '970035227269', '$2y$10$MjVdouogwvp7lS6PHbwvz.LSC/qVTengL91hMo3KRd7DjhPOU4oPi', 'client', '3', 'VOUUDMS5GGADB4JAZ6HG', NULL, NULL, '2022-05-02 11:20:58', '2022-05-02 11:20:58'),
(104, NULL, 'client3', 'client3', 'client3@email.com', NULL, '955880888498', '$2y$10$/Ao/IBr3stT1jEHg8214XefMMMxVHGhyMwj4IVtKU7Tg6/fcCAnfG', 'client', '3', '6FFDMGU58ZKJHBCFIWL6', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(105, NULL, 'client4', 'client4', 'client4@email.com', NULL, '903636040659', '$2y$10$SOB.1rYM4RGG/NMvBz0leupAoVz3WyokjPsB91f/wliAFBLIHrS4e', 'client', '3', 'QKEWEVXPSIOEMYHMKYLK', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(106, NULL, 'client5', 'client5', 'client5@email.com', NULL, '215189140609', '$2y$10$a3/SECSGUGDs79WDfDbsvueYE13wXLnfRy/y4aO40YL5FOAiFLhbW', 'client', '3', 'JTFLK7UL2UMBPEHXORNP', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(107, NULL, 'client6', 'client6', 'client6@email.com', NULL, '995639673036', '$2y$10$md/SidDooUb05VEWgXd7Fu0/AtE7UBBzEWnFl94sIUtx8L2qkwUOC', 'client', '3', 'JPYLAUZ408XNXDSEEFIW', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(108, NULL, 'client7', 'client7', 'client7@email.com', NULL, '820847873772', '$2y$10$5SlMWjVVSfc8IHhVQe62LOZSgrMNgPZJlN/NwiOnQliNksvp.4AKK', 'client', '3', 'GXFU9MPORYMODMI0VO7V', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(109, NULL, 'client8', 'client8', 'client8@email.com', NULL, '114549597839', '$2y$10$JsEpg/kfOEqW8R1/SZnwX.6F6v5T5KuWzxaIFDwWPQ3RcsAlemL/.', 'client', '3', 'KNUDBGGIUI6ONBEOTN9Y', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(110, NULL, 'client9', 'client9', 'client9@email.com', NULL, '582547123913', '$2y$10$16/V5PldSzm92qJacGTbBetZEsBTmfU2XEc.AbLSKzE6H1aAREdHW', 'client', '3', 'SE97JLJGTJDSBU6IQ1LP', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(111, NULL, 'client10', 'client10', 'client10@email.com', NULL, '551460001680', '$2y$10$Z9XrgNwT8Xd0XmoEavU/Gu19KkvaBRkgQc4coJbUFGISYSIMOFhre', 'client', '3', 'D1Y3V3AYKKNE6SQ91WW0', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(112, NULL, 'client11', 'client11', 'client11@email.com', NULL, '329238291948', '$2y$10$T8MMJgDAkiv36H82TSHw8.bEBZL5K5ZzV9Mj9tBPfNafb58wIEOfK', 'client', '3', 'WXDKYXM395QNEQXPV9FQ', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(113, NULL, 'client12', 'client12', 'client12@email.com', NULL, '110431202767', '$2y$10$1XjnbeJUfwgDIy2KRFP4U.2qa4UWnSAudf122.rvZGU6ODjnBv6xK', 'client', '3', 'EM0ULGOWNSWBUQDBFFSE', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(114, NULL, 'client13', 'client13', 'client13@email.com', NULL, '758107196638', '$2y$10$U1h9WkelHu5lzbj1Jcy9ueieExwn6b0KXc0RQ2uTllANVvqEfH6dC', 'client', '3', 'IY9TLFGUTM87VINYEB5T', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(115, NULL, 'client14', 'client14', 'client14@email.com', NULL, '986597482384', '$2y$10$.E29xEqqMsX/qyuktJrBVOJ1K1GvhNxWvIoU6EVOLXGDTVzXhceT.', 'client', '3', 'LRHFRFF65FROZIH2O2AH', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(116, NULL, 'client15', 'client15', 'client15@email.com', NULL, '367163437470', '$2y$10$0e1qezZA1G3k9D/q3430XeH8Jd8fdOvDNQP0Xg3KMPBA/U9YuS45.', 'client', '3', '05FH5UB1NQMG4C6QVIRM', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(117, NULL, 'client16', 'client16', 'client16@email.com', NULL, '756458939226', '$2y$10$7gRdrP81r4ceKiQQtpH8C.zu5gZubJ5575eHnE.NJEvM0pq0LpJAy', 'client', '3', 'TTBCTCU1O91KHM523EF5', NULL, NULL, '2022-05-02 11:20:59', '2022-05-02 11:20:59'),
(118, NULL, 'client17', 'client17', 'client17@email.com', NULL, '488828129241', '$2y$10$0GwP8vbiaTbUywBkcZznQujepfHT7oO5157vBpdB.yW1lFdQU2Rsu', 'client', '3', 'BWACVQZZTVPC0IIC6UK6', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(119, NULL, 'client18', 'client18', 'client18@email.com', NULL, '738005967877', '$2y$10$y3rZn1G/bcnKUwOO3NDz7.vEtnw3DUq.nmI1ThKQ.DNNz.zleAg4u', 'client', '3', 'RPGG7BBNMNFL9OARIABD', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(120, NULL, 'client19', 'client19', 'client19@email.com', NULL, '192580774188', '$2y$10$PVYnI/9ER/KLiM.OX6MyGOec9spJ51qdD5d48kliSP2R6TCn53rRq', 'client', '3', '4AUZYC12N0ROJJXAKIWY', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(121, NULL, 'client20', 'client20', 'client20@email.com', NULL, '947604384093', '$2y$10$EisrErSdn1FuuPslBNdE.Okh.GSrwDvDEX4VuKPlUjhvzypEgun1K', 'client', '3', 'MHDK9OBQOENP1IEP6YW9', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(122, NULL, 'client21', 'client21', 'client21@email.com', NULL, '789763435175', '$2y$10$gZ4YYrElkBHCtlLIiJo/zOBIRLejaAXNLL7WxQdITGJTe3IHoTohK', 'client', '3', 'BC2KYGMLPKJMBE2XMGT3', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(123, NULL, 'client22', 'client22', 'client22@email.com', NULL, '537463969017', '$2y$10$ICkkMsj5493sEsDqgoTj5OJ9iLUJr1JWDgmtI9FRaF6n53qRSQiwW', 'client', '3', '2W0LYM5EDRKJGBDCYMWS', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(124, NULL, 'client23', 'client23', 'client23@email.com', NULL, '887862967543', '$2y$10$PhGjzsrdZySu5d2sUWtaLuV8M89Y1CSqU.tBUdxmVbfu2BossQgjO', 'client', '3', 'HIHLNNSSXFGNJNPXVMDW', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(125, NULL, 'client24', 'client24', 'client24@email.com', NULL, '945293101403', '$2y$10$ykMcvVvdJPsZVA68QBdzoOBxYV5ChvrE1uhx/FE4W7m8tGBTPaUYe', 'client', '3', 'Y0MYEBWEXDJLJJGHZRME', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(126, NULL, 'client25', 'client25', 'client25@email.com', NULL, '674731842760', '$2y$10$5SJm80qgo0R1HU5fqKDjQeYFtfiuigBxTxxhOCKqyEzeLU1IiY4JK', 'client', '3', 'TTIBOINUZ2JR93BEMLDW', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(127, NULL, 'client26', 'client26', 'client26@email.com', NULL, '510535233968', '$2y$10$VUpsSFsVX4zM.D7cf0whgO0NVSPaB5w1vsAYuxkpqHiFazLUrBaMG', 'client', '3', 'PGM8HHRVCIS1NQNDXC0Y', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(128, NULL, 'client27', 'client27', 'client27@email.com', NULL, '641754673551', '$2y$10$ghncxMMeSBRsJ6anJPWUduLJvcPQpHytkOfix59/vIAHy/A..Nk3m', 'client', '3', 'AHTNARO0DAJEJNDTACNE', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(129, NULL, 'client28', 'client28', 'client28@email.com', NULL, '913880438867', '$2y$10$rg/p53CjWrWXBf8H.2Z8u.eNeiyTdXLUTzrcQ9YJ4CpETP26aeFC6', 'client', '3', '628ZZNYWHCA5DNGWGRMU', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(130, NULL, 'client29', 'client29', 'client29@email.com', NULL, '707104662430', '$2y$10$7ZMZq9QpVUfpY9T/V8LJuuEyuLRE34itoNAIPIKR9dfsZc1HXQEJ2', 'client', '3', 'B7DXUWEC5SLUHLRS5SX7', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(131, NULL, 'client30', 'client30', 'client30@email.com', NULL, '624207900908', '$2y$10$.oDghPYc02L3FjOqOm4CnOZwcf//nRRlIg.7vApUyzw4.4/jTem7i', 'client', '3', 'WURAANF6IFOQ3E5X0N86', NULL, NULL, '2022-05-02 11:21:00', '2022-05-02 11:21:00'),
(132, NULL, 'client31', 'client31', 'client31@email.com', NULL, '815523800433', '$2y$10$MvvhSKZlOXO/P9lK0LtsEeArqWPpKzSVJMS68NOtMK1CpM5EtZWW2', 'client', '3', 'HKAUIX8PCPLEMBC62BXY', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(133, NULL, 'client32', 'client32', 'client32@email.com', NULL, '835771914576', '$2y$10$FBqa2RSRcSFqng7/fvxJ6u5f/CtsE6gfJcKp74OrRItyAaTb0EDdy', 'client', '3', 'DRPRSU0V527MC4HB9MDV', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(134, NULL, 'client33', 'client33', 'client33@email.com', NULL, '619052968573', '$2y$10$cfGTK38qigiDRcc9.g8O0uiCZf0mZKNXh0dhwWdjCjKJ8LZ3xaK1e', 'client', '3', '0GWL0UBHODPITG6K8TBP', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(135, NULL, 'client34', 'client34', 'client34@email.com', NULL, '150099129179', '$2y$10$Hg6hEOOUsw9dFnauxC5FJebm07fBzSOScYm5RX7K4XxhJ0h37rUcm', 'client', '3', 'OMNNEMUUEF2Z90VXXDT0', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(136, NULL, 'client35', 'client35', 'client35@email.com', NULL, '447223964371', '$2y$10$ZaDlRLDUmkkYUSncmRn3sua60Lc5e3Zh0ti0VGlw91HHNJLkNKuJ.', 'client', '3', 'OSISRL03NQE8NL9CKK2X', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(137, NULL, 'client36', 'client36', 'client36@email.com', NULL, '608665427515', '$2y$10$wrQAnspjiuUVL9he/IEd/uiPwv8dOqEvV0La4QdkDVwU8.C8ySrfq', 'client', '3', '8YBGT8ISZIDRRYOXVOOT', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(138, NULL, 'client37', 'client37', 'client37@email.com', NULL, '136178647030', '$2y$10$VFmnEPV0vocYLyJ6zDfnJeNgDp0ltEdF3O7tyDW6lu0HfO5c2qJ/e', 'client', '3', 'BITB7RJLNKTJLCPJJZVV', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(139, NULL, 'client38', 'client38', 'client38@email.com', NULL, '780157184240', '$2y$10$.AiO1vg7n1NjtqwBRQWz8OqyT0aSaqNLyh.V3gL7y9ebCyx6XtvP6', 'client', '3', 'UMAYMIPFZGF7DXX17MUE', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(140, NULL, 'client39', 'client39', 'client39@email.com', NULL, '946284213718', '$2y$10$BOPLxMyaTHdaagKwGPoyGO9CZfB056GYI8l8n9WSzpRmXwW9T4oke', 'client', '3', 'NR94IVE1FXDVY4ZNP96J', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(141, NULL, 'client40', 'client40', 'client40@email.com', NULL, '212647978846', '$2y$10$VPEfVU.OKgmdsq1HgsVqY.Y8actdDxzPa8wNj4wvo7webAZH0y.UK', 'client', '3', 'WWF6DMDVRPQQMOZWAQIM', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(142, NULL, 'client41', 'client41', 'client41@email.com', NULL, '973588580553', '$2y$10$GvkBYhRPrnUNbhfxgTMDzuua13MOA4wnhBFSPwlFtNbwiG57aUl/e', 'client', '3', 'QQQRZEOKKB9KG9C5OGSX', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(143, NULL, 'client42', 'client42', 'client42@email.com', NULL, '685947667988', '$2y$10$Pzu2IIO7fNMEZ5L1kRE8QeWk6wyE0tHQidEbWQK5p2tVnlMY4iHpq', 'client', '3', 'D1FT88SOMNQN5BSI6KCU', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(144, NULL, 'client43', 'client43', 'client43@email.com', NULL, '957067168569', '$2y$10$gA4xSuEpaorEsrAKw0BANeg.1/zyxHBYjzdFVO5OQry4SgdM2IlNu', 'client', '3', 'ZTQT2682UJNX9M71FDIH', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(145, NULL, 'client44', 'client44', 'client44@email.com', NULL, '401938033296', '$2y$10$TshtwYbZ4xUBtJof9rT4teXGlMDZbBH1oWRXAiL68NmRASbUOw5hG', 'client', '3', '2F6WKNWQKTVXJUUGOEFL', NULL, NULL, '2022-05-02 11:21:01', '2022-05-02 11:21:01'),
(146, NULL, 'client45', 'client45', 'client45@email.com', NULL, '113198652122', '$2y$10$Z3IGpBf/aF96.taTQlPghur17gyadhFyUFQPPLpsTCaabvvu.XQUm', 'client', '3', 'RSQJKSVHCKTW63HAOMY8', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(147, NULL, 'client46', 'client46', 'client46@email.com', NULL, '180068043487', '$2y$10$qVG.EiwVd4x6J50vlkiC2.B.ARyFNS9vdS0xip/ch4jwMD9TEe8UO', 'client', '3', 'F5SALEGBWOEGH6ZP4N5I', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(148, NULL, 'client47', 'client47', 'client47@email.com', NULL, '821547138239', '$2y$10$UO9OoVdjtKfbYArOixQZBOytP58qIEZ0vQ6JahWCrPkkFs6oggQoq', 'client', '3', 'JIGZXSPI426NVBZJPBZO', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(149, NULL, 'client48', 'client48', 'client48@email.com', NULL, '987804148306', '$2y$10$RjFXHBbdLn2A8rjGPe.B4eiKrKcStqL206EPxCFuXlxWecNDFQrsm', 'client', '3', 'JZICFLEE9J9CSXYUHRKB', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(150, NULL, 'client49', 'client49', 'client49@email.com', NULL, '562517973325', '$2y$10$wi4W7hNyQicf8B3Ao7nNuO6a5NFu7cXQIdXei1GyuGS8g/4M8wKD6', 'client', '3', 'QEGO96MJMCZ80XJZQOY5', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(151, NULL, 'client50', 'client50', 'client50@email.com', NULL, '810467810870', '$2y$10$h0aDBiE079frfPFSvmJJQ.q0vB9fDlsLl7OhtCYFabR.q/TSuWWAa', 'client', '3', 'O6XGB0XP1NVC6NNYPQLP', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(152, NULL, 'client51', 'client51', 'client51@email.com', NULL, '547008967819', '$2y$10$SJwkxxukQDh1ve7SV/.nU.2/bRr65UcqseNQHnFnZs1.HjRQSUsKS', 'client', '3', 'VSNKNBBXUOMH4RZAC5ED', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(153, NULL, 'client52', 'client52', 'client52@email.com', NULL, '617919010899', '$2y$10$Hij.5ZfDNt8HsJwHZdmvVe3S0QmVgcsNrUaMLXfQEJEa7tFx4drPy', 'client', '3', 'KNLI6PZD7BJMJVJJCTZG', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(154, NULL, 'client53', 'client53', 'client53@email.com', NULL, '976071860718', '$2y$10$O2XAYTWQKG8m3Vy62o6CQuKVKfOTUYl93PMo2yh/9./tVbOmFzA62', 'client', '3', '2P2UXEDWBMYKSE7FWD29', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(155, NULL, 'client54', 'client54', 'client54@email.com', NULL, '263165786300', '$2y$10$QRhoU4rkM.RGUbFQc5S9ReOvdSFzXWmDdRq54.d2BUx6ZeKRWEeVu', 'client', '3', 'HLI9P6QBTMXILLAO0PCS', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(156, NULL, 'client55', 'client55', 'client55@email.com', NULL, '402782329934', '$2y$10$.K0fzxEsDfIAQd8SrLjlaeEIkm/im0xnq/Q4X7VqsTG/qYY/xM.qC', 'client', '3', 'RUOLRT31XG5KOD8XQ5OB', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(157, NULL, 'client56', 'client56', 'client56@email.com', NULL, '940694309378', '$2y$10$G8bZFIeMWZFjvlItTqIkHOruPFu8.DFoSFUrNhDZXdYo7c7Xz9d6u', 'client', '3', 'PLP52VZLUQRKNEBVUFZ5', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(158, NULL, 'client57', 'client57', 'client57@email.com', NULL, '692789376216', '$2y$10$4LCv/Tna0tqVDlSaaDqZ7eU6u4H5W7ropSF43wgbJLb2xzBcyIknu', 'client', '3', 'AL4F3C52LPFQKKOIGTUU', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(159, NULL, 'client58', 'client58', 'client58@email.com', NULL, '529666353627', '$2y$10$gEFJ2ks7FHaNoWGLzA3iY.GfKJxAzEKu1u9wkwujz.x/8.E8WSn1.', 'client', '3', 'FDE1GDEVPLJIGKFLLXDK', NULL, NULL, '2022-05-02 11:21:02', '2022-05-02 11:21:02'),
(160, NULL, 'client59', 'client59', 'client59@email.com', NULL, '412790287793', '$2y$10$Rj4dDv1t.KU3gmdHUDdJQOiTbprXQ.3/n/BKuW8EuD1pZw0zLLDLW', 'client', '3', 'EFDXOXSTID5V7PJZI7ST', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(161, NULL, 'client60', 'client60', 'client60@email.com', NULL, '262484831650', '$2y$10$pQ9DVqiAKm3w0ZolNL3M7OAgIwsMbM6iszuP.c45tS7taRdOs.yOG', 'client', '3', 'GZZH8NXBAEZXEC0TCOAU', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(162, NULL, 'client61', 'client61', 'client61@email.com', NULL, '763950231539', '$2y$10$a3bFLli9kIksl5hdJ.i3MuPjUBJbq7KaADrNQgDgJDvkzJrTe1a6C', 'client', '3', 'WRCYNVMPAIBOAZWEIJTK', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(163, NULL, 'client62', 'client62', 'client62@email.com', NULL, '334518932146', '$2y$10$CWUwHeGLrW1/DB0zT3BVgu0uStdEkOfK6nBjZgpxJD/oa7HkiHtj6', 'client', '3', 'YSB7JC4RD1LSEBUOPGXB', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(164, NULL, 'client63', 'client63', 'client63@email.com', NULL, '469854668417', '$2y$10$X824vPAC4xOPu3D.84kxf.1bs8qHy.0cFepshItKm0/YGIlelfz0K', 'client', '3', 'YMXBSGUMZEMCAAYAORXZ', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(165, NULL, 'client64', 'client64', 'client64@email.com', NULL, '905488183940', '$2y$10$PW1qvaijxNG22yesJ5cPGuxASBv0O37B37UAU/zogcHs0CQUQ8hoy', 'client', '3', 'M2HFPAMASUWJD5524LZC', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(166, NULL, 'client65', 'client65', 'client65@email.com', NULL, '575379648023', '$2y$10$zQAoEeJuwG3PaA0VgNWwW.IHx1iTfC02kykAU2Lj1KOBQniNW3gtO', 'client', '3', 'JWITBAVUNOHUGAWBFKRS', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(167, NULL, 'client66', 'client66', 'client66@email.com', NULL, '916482166687', '$2y$10$MhHKIy8fVuLejLiiZLjKEO2O.fnYk/Wc66SU.ObKBjV1XZKtC1ozu', 'client', '3', 'M93OK1QXQO1TAWT6BAAC', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(168, NULL, 'client67', 'client67', 'client67@email.com', NULL, '320017129183', '$2y$10$TyasSDt3bt7BpVkLn4TBVu/gv1gAv8/5cJIJbgKh2McEKKIL1Sk1O', 'client', '3', 'LJUI8ZK5T4BGBC8USPQ2', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(169, NULL, 'client68', 'client68', 'client68@email.com', NULL, '972281221931', '$2y$10$jBOj28dHeNTFatLGzyn7hen51Bja/SE0ykAsrd1R7dUmS5NP47DDi', 'client', '3', 'EVPXNIRPHNEDBFHNG4JV', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(170, NULL, 'client69', 'client69', 'client69@email.com', NULL, '194776376597', '$2y$10$fBDo4D0XpmhwZquwFogkAOSTiatl76zytW6AnGZOlRa5l0QxHUAEe', 'client', '3', 'PQ0TNOCEPQYSAVFQQHIF', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(171, NULL, 'client70', 'client70', 'client70@email.com', NULL, '785862493482', '$2y$10$1bOlXb4g1Uft0fUWbArE5OFzWJch5jB7ksE.wuWElMLo9Q2SleyyS', 'client', '3', 'QDKJH1ALBLPFLS9THJNE', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(172, NULL, 'client71', 'client71', 'client71@email.com', NULL, '744430126679', '$2y$10$FPMaTELuEpdEn6.gIiF38uu58hd4CyeesYJmbAfDo2rgcSBuhRxBK', 'client', '3', '1WDVBJF0KORA3B1RDR4O', NULL, NULL, '2022-05-02 11:21:03', '2022-05-02 11:21:03'),
(173, NULL, 'client72', 'client72', 'client72@email.com', NULL, '561669718113', '$2y$10$xsyTLirEltgDYSsVpw8jQeQwlk.7grTPeoKfo2qLGZRrJInzChNBK', 'client', '3', 'ESR4D98LBFBLD8NOMK8P', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(174, NULL, 'client73', 'client73', 'client73@email.com', NULL, '546317242468', '$2y$10$iW7.tB.6XMA2BNXTDvmOHuxVO7kz2RfbtdJTCaCvxZFEbaxYAgsyu', 'client', '3', 'FRCONWQ7GOW3CKR4DVQ9', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(175, NULL, 'client74', 'client74', 'client74@email.com', NULL, '354073039130', '$2y$10$TxdKCkYG4GBntm/kaffO4.zOlTNzdzmGNwHDIqm57VnH8VaSSYCym', 'client', '3', '6YHCIHAZX80ETQOQPIDT', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(176, NULL, 'client75', 'client75', 'client75@email.com', NULL, '849604112435', '$2y$10$uq48iBaRhUUqpyYEOIK7TO4CwnPO2uuNF8qEnzqNwj.Y8kTVW2lDe', 'client', '3', 'RYBBVGOASB9LDFNWFCAT', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(177, NULL, 'client76', 'client76', 'client76@email.com', NULL, '972848508497', '$2y$10$aGWxdBpPU3dPzN1AY/AYF.AZqKa5sEkHhkn5/iGwSln91r5SzmoEe', 'client', '3', 'CHLQX4BPPQJZHC6VIPQT', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(178, NULL, 'client77', 'client77', 'client77@email.com', NULL, '161851645998', '$2y$10$iA3Zh0ThysrUGkMY1GA4pO9Z/f.X.ta.6xEk4SYV/zMzUYU5vKIXa', 'client', '3', 'TNP0KOEWRKRERVGOTDBA', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(179, NULL, 'client78', 'client78', 'client78@email.com', NULL, '586889856408', '$2y$10$DJimSSn.9eu18NSaa2msN.70WbcS6xeB.cruEGrBqWsPrXndz7/eS', 'client', '3', '2VUTFCJADRSFZ8OMI5AY', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(180, NULL, 'client79', 'client79', 'client79@email.com', NULL, '569076436928', '$2y$10$6Ss8hJHLGpHznbyxosAGlug7E9omMJ2QHkrbt670fJr2dztGNOFIW', 'client', '3', '9IUNC4EQ4CONNI5GHTBE', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(181, NULL, 'client80', 'client80', 'client80@email.com', NULL, '256374797983', '$2y$10$lbUdGFM35M8f3RGoI3oDBeigogcVMz4LYwyGvQyE9ywWf.JeYjnJu', 'client', '3', 'BZ2HGJ8IKJHLX7MIC3NC', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(182, NULL, 'client81', 'client81', 'client81@email.com', NULL, '650727213222', '$2y$10$dQrKTDcOjNIYxR4iLK0Hq.vTgaY18ruMVmX9TJXGINQ8VpdYuHvXS', 'client', '3', 'T290NQP7I7LIBWRQOCVO', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(183, NULL, 'client82', 'client82', 'client82@email.com', NULL, '850888719698', '$2y$10$3XujCTSXeh51u58eA9yZ7ejyO7BA.GKI03iRHkfpwzQT6FRURKztu', 'client', '3', 'YLPPQJ6A5IBJUAOH7DSL', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(184, NULL, 'client83', 'client83', 'client83@email.com', NULL, '375126064812', '$2y$10$OuxJyTUg2EdGpogroAy4fOao0Uu0Hh4ks5fPMod.9CDUZ0Na3hHz6', 'client', '3', 'SIRSXEYHULDKQ5CWPUO9', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(185, NULL, 'client84', 'client84', 'client84@email.com', NULL, '252755305478', '$2y$10$3DGEsdTBTzIn8.c7hOSrEei.UbHFy3bLSCmoPj0RJyLdJqqUNHRSq', 'client', '3', 'LZFZAIS2NABI8LZPBNWV', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(186, NULL, 'client85', 'client85', 'client85@email.com', NULL, '375564871987', '$2y$10$KfRwZjEKjH0YQhwbI6iN6O7We9kXtHJbpQPH2NDungLu47G6KPP5a', 'client', '3', 'RJGXVPCJ348PEFDNIVCW', NULL, NULL, '2022-05-02 11:21:04', '2022-05-02 11:21:04'),
(187, NULL, 'client86', 'client86', 'client86@email.com', NULL, '724645722498', '$2y$10$XL11qjjaGz33QzsTyeiKjeCKflZT3oKGwRgAQtA9DlIZ7GCTlJC9O', 'client', '3', 'TAQZVBSLGJL4FABN0MPG', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(188, NULL, 'client87', 'client87', 'client87@email.com', NULL, '111909150139', '$2y$10$7Lgyr7iK7/tQ.sFkTpfDnuv4e2rlqIH3Y6sWMZFCAeBMaiXKSaYZW', 'client', '3', 'TFHQSRLAMZ7T8MIAUPP0', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(189, NULL, 'client88', 'client88', 'client88@email.com', NULL, '356749055485', '$2y$10$4/wR/LEpRSz7vhLXp14LjOlVaVUHIVDwZi4PxX33.b3.rFOHBbBSC', 'client', '3', 'FKMWEQIKQ0127KN0KIKQ', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(190, NULL, 'client89', 'client89', 'client89@email.com', NULL, '263637976493', '$2y$10$o.yVPEyG7mDMMLa28/HjhepAQCCXjhBwKI4S0qOiiHFtaCEyKZLLO', 'client', '3', 'JKLSLSI050UMSZFEBDHD', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(191, NULL, 'client90', 'client90', 'client90@email.com', NULL, '939337634877', '$2y$10$wkiLilAj6WHRtBUAMP/2KOcp5.f.z64Pc9mD2cBeEf9IIdOshs2Au', 'client', '3', 'ZIVXQKVZRXRKIPPGTTH6', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(192, NULL, 'client91', 'client91', 'client91@email.com', NULL, '856917874607', '$2y$10$Ih7QfuWrt/zPNykrrwVnwOFWY6pVWzNlX6C9LFcMP2e0jeFTtL26S', 'client', '3', 'KZ3MTM7ISH9XD0B7OY6E', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(193, NULL, 'client92', 'client92', 'client92@email.com', NULL, '750012706961', '$2y$10$oZ/G4JLlIpAtFi0PO0ZolurzzkhYEv.TF7c2daoWm2RgfcmdKFHoW', 'client', '3', '1PXVJ4KIV30WOQOJBRGW', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(194, NULL, 'client93', 'client93', 'client93@email.com', NULL, '802549523755', '$2y$10$0Be6FO5GSoT3nzSlpjt63eMLNEzIcFBP1uMoaFPYJNshQ8S.C2GOu', 'client', '3', 'NOMVYZTAEMHR4OBGFDFB', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(195, NULL, 'client94', 'client94', 'client94@email.com', NULL, '600115749248', '$2y$10$DTmBv6ZbLf6UCHEtLFLvK.JWX2cEhfM2JHiYvRYNPaWeGaPeG/06K', 'client', '3', 'LESZAE9GLGYOESNGRNSR', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(196, NULL, 'client95', 'client95', 'client95@email.com', NULL, '876457996265', '$2y$10$FxSKgvBxK38TdugcfF1wYO2mqI/WECKSisklVRF/RB/CDNK3y23zG', 'client', '3', 'WFG3HAHS1TC8TR46JXND', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(197, NULL, 'client96', 'client96', 'client96@email.com', NULL, '290560734389', '$2y$10$zssOPd3MO4O/gSXe2DQzBexUZb7PXTofZctBFUz.w5BUvleAMFCxq', 'client', '3', 'JEW8IQ8ZLUO2DNQDNND0', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(198, NULL, 'client97', 'client97', 'client97@email.com', NULL, '922275045339', '$2y$10$v8m1x2wLUDEr8M15u2/2/OTtTzgh7hXFZnueDrwSC4Kai30aNZoaC', 'client', '3', 'PJXYK43MTNNSBQGEE0UQ', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(199, NULL, 'client98', 'client98', 'client98@email.com', NULL, '363831903139', '$2y$10$YmsnEBvn1sMZilALFPSz9.zYxIkf6px2c.ZFXKQ6G1C5ViKZbmrq.', 'client', '3', '2MP7YEECLTVAELJOIRHX', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(200, NULL, 'client99', 'client99', 'client99@email.com', NULL, '643388422483', '$2y$10$uewPSQR/QRsmHml95mHkYOJ9gar.1GIjNlA5NHscqzNW9AoRF.2xC', 'client', '3', 'BHLIVTCR517NGXC7XEBN', NULL, NULL, '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(201, NULL, 'client100', 'client100', 'client100@email.com', NULL, '727302304166', '$2y$10$czUpxWcOfzdUNkK7/7mUqOXcDK8CzQcQJNgrNkNlHO452t0Ky0HHK', 'client', '3', 'KMPNZJP0CFN4DWF7GAO1', NULL, NULL, '2022-05-02 11:21:06', '2022-05-02 11:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `redeemed_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `owner_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recharge` double DEFAULT NULL,
  `sold` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `metadata`, `starts_at`, `redeemed_at`, `expires_at`, `price`, `balance`, `owner_type`, `owner_id`, `recharge`, `sold`, `created_at`, `updated_at`) VALUES
(1, '3925-6003-1944-4328', NULL, NULL, NULL, '2022-07-02 23:59:59', 0, 100, 'App\\Models\\User', 2, 0, 1, '2022-05-02 11:21:40', '2022-05-02 11:31:56'),
(2, '5746-3744-4788-5733', NULL, NULL, NULL, '2022-07-02 23:59:59', 10, 200, 'App\\Models\\User', 2, 0, 1, '2022-05-02 11:21:52', '2022-05-02 13:56:17'),
(3, '5693-2039-9609-6627', NULL, NULL, NULL, '2022-09-02 00:00:00', 20, 100, 'App\\Models\\User', 2, 0, NULL, '2022-05-02 13:58:28', '2022-05-02 13:58:54'),
(4, '0776-2177-3363-7379', NULL, NULL, NULL, '2022-09-02 23:59:59', 20, 100, 'App\\Models\\User', 2, 0, NULL, '2022-05-02 13:58:28', '2022-05-02 13:58:28'),
(5, '2156-1765-5124-6778', NULL, NULL, NULL, '2022-09-02 23:59:59', 20, 100, 'App\\Models\\User', 2, 0, NULL, '2022-05-02 13:58:28', '2022-05-02 13:58:28'),
(6, '9631-4789-3744-4608', NULL, NULL, NULL, '2022-09-02 23:59:59', 20, 100, 'App\\Models\\User', 2, 0, NULL, '2022-05-02 13:58:28', '2022-05-02 13:58:28'),
(7, '6397-1821-0034-4884', NULL, NULL, NULL, '2022-09-02 23:59:59', 20, 100, 'App\\Models\\User', 2, 0, NULL, '2022-05-02 13:58:28', '2022-05-02 13:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_entity`
--

CREATE TABLE `voucher_entity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_recharge`
--

CREATE TABLE `voucher_recharge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_recharge`
--

INSERT INTO `voucher_recharge` (`id`, `stripe_id`, `voucher_id`, `user_id`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'business1And ID2', 2, 2, '100', NULL, '2022-05-02 13:56:17', '2022-05-02 13:56:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_details_user_id_foreign` (`user_id`),
  ADD KEY `business_details_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `business_stores`
--
ALTER TABLE `business_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_stores_slug_unique` (`slug`),
  ADD UNIQUE KEY `business_stores_store_name_unique` (`store_name`) USING HASH,
  ADD KEY `business_stores_user_id_foreign` (`user_id`);

--
-- Indexes for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_vouchers_voucher_id_foreign` (`voucher_id`),
  ADD KEY `client_vouchers_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `redeemers`
--
ALTER TABLE `redeemers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redeemers_voucher_id_foreign` (`voucher_id`),
  ADD KEY `redeemers_redeemer_type_redeemer_id_index` (`redeemer_type`,`redeemer_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_configurations`
--
ALTER TABLE `stripe_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_owner_type_owner_id_index` (`owner_type`,`owner_id`),
  ADD KEY `vouchers_starts_at_index` (`starts_at`),
  ADD KEY `vouchers_redeemed_at_index` (`redeemed_at`),
  ADD KEY `vouchers_expires_at_index` (`expires_at`);

--
-- Indexes for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entity` (`voucher_id`,`entity_type`,`entity_id`),
  ADD KEY `voucher_entity_entity_type_entity_id_index` (`entity_type`,`entity_id`);

--
-- Indexes for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_recharge_voucher_id_foreign` (`voucher_id`),
  ADD KEY `voucher_recharge_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `business_stores`
--
ALTER TABLE `business_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemers`
--
ALTER TABLE `redeemers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_configurations`
--
ALTER TABLE `stripe_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_details`
--
ALTER TABLE `business_details`
  ADD CONSTRAINT `business_details_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_stores`
--
ALTER TABLE `business_stores`
  ADD CONSTRAINT `business_stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  ADD CONSTRAINT `client_vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_vouchers_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redeemers`
--
ALTER TABLE `redeemers`
  ADD CONSTRAINT `redeemers_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  ADD CONSTRAINT `voucher_entity_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  ADD CONSTRAINT `voucher_recharge_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_recharge_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
