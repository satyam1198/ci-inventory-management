-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 10:07 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_upload`
--

DROP TABLE IF EXISTS `image_upload`;
CREATE TABLE IF NOT EXISTS `image_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image_url` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_upload`
--

INSERT INTO `image_upload` (`id`, `product_id`, `image_url`, `alt`) VALUES
(1, 2, 'Paracetamol.jpg', ''),
(2, 3, 'Paracetamol1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'user_can_see_dashboard', 'user can see dashboard', '2023-11-08 10:16:29', '2023-11-08 10:16:29', NULL),
(3, 'user_can_see_user', 'user can see user\r\n', '2023-11-08 09:51:55', '2023-11-08 09:51:55', NULL),
(6, 'user_can_see_roles', 'user can see roles', '2023-11-08 12:47:44', '2023-11-08 12:47:44', NULL),
(11, 'user_can_see_product_list', 'User can see product list\r\n', '2023-11-13 12:41:25', '2023-11-13 12:41:25', NULL),
(10, 'user_can_see_permission', 'User can see permission', '2023-11-13 12:40:25', '2023-11-13 12:40:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `category_id` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `category_id`, `is_active`, `date_upd`, `date_add`) VALUES
(3, 'Paracetamol', 'Medicart medicines are fine in pharmaceutical ', 30.00, 1, 1, '2023-11-22 09:52:56', '2023-11-22 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `prod_categories`
--

DROP TABLE IF EXISTS `prod_categories`;
CREATE TABLE IF NOT EXISTS `prod_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `prod_categories`
--

INSERT INTO `prod_categories` (`id`, `category`) VALUES
(1, 'Pills'),
(2, 'Cyrup'),
(3, 'Equipment'),
(4, 'Drops'),
(5, 'Cream & Paste'),
(6, 'Bandage tape'),
(7, 'Spray');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `display_name` varchar(65) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `updated_at`, `created_at`) VALUES
(6, 'user', 'User', '2023-11-16 07:23:42', '2023-11-17 05:13:35'),
(2, 'admin', 'Admin', '2023-10-31 08:41:44', '2023-11-22 09:55:09'),
(4, 'superadmin', 'Superadmin', '2023-10-31 09:10:13', '2023-11-16 10:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permission`
--

DROP TABLE IF EXISTS `role_has_permission`;
CREATE TABLE IF NOT EXISTS `role_has_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`id`, `role_id`, `permission_id`) VALUES
(113, 2, 6),
(112, 2, 3),
(86, 4, 5),
(85, 4, 10),
(84, 4, 11),
(83, 4, 6),
(116, 2, 5),
(115, 2, 10),
(114, 2, 11),
(82, 4, 3),
(110, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing id of each user, unique index',
  `session_id` varchar(48) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `email` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `role_id` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s account type (basic, premium, etc)',
  `remember_me_token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `creation_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `last_login_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `last_failed_login` int DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `activation_hash` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `password_reset_hash` char(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `password_reset_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `provider_type` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `password_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `session_id`, `name`, `password_hash`, `email`, `active`, `deleted`, `role_id`, `remember_me_token`, `creation_timestamp`, `last_login_timestamp`, `last_failed_login`, `activation_hash`, `password_reset_hash`, `password_reset_timestamp`, `provider_type`, `password_token`) VALUES
(65, '1698229158', 'newUser', NULL, 'newUser@gmail.com', 1, 0, '4', NULL, '2023-10-25 04:49:18.000000', '2023-10-25 04:49:18.000000', 2023, NULL, NULL, '2023-10-25 04:49:18.000000', '', NULL),
(67, '1698229903', 'Pratik Patel', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'pratik.patel@yopmail.com', 1, 0, '2', NULL, '2023-10-25 05:04:38.000000', '2023-10-25 05:04:38.000000', 2023, NULL, NULL, '2023-10-25 05:04:38.000000', '', NULL),
(69, '1700132838', 'Rocky', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'rocky1@gmail.com', 1, 0, '6', NULL, '2023-11-16 05:39:48.000000', '2023-11-16 05:39:48.000000', 2023, NULL, NULL, '2023-11-16 05:39:48.000000', '', 'MTcwMDEzMjk4OQ=='),
(70, '1698314955', 'Yogesh', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'yogesg@gmail.com', 1, 0, '2', NULL, '2023-10-26 04:43:16.000000', '2023-10-26 04:43:16.000000', 2023, NULL, NULL, '2023-10-26 04:43:16.000000', '', 'MTY5ODMxNTE5Ng=='),
(74, '1698315344', 'Yogendra ', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'ndanf@gmail.com', 1, 0, '4', NULL, '2023-10-26 04:49:13.000000', '2023-10-26 04:49:13.000000', 2023, NULL, NULL, '2023-10-26 04:49:13.000000', '', 'MTY5ODMxNTU1Mw=='),
(91, '1698324269', 'Yogendra', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'yog.dra@gmail.com', 1, 0, '2', NULL, '2023-10-26 07:16:08.000000', '2023-10-26 07:16:08.000000', 2023, NULL, NULL, '2023-10-26 07:16:08.000000', '', 'MTY5ODMyNDM2OA=='),
(95, '1700119457', 'satyam ', '$2y$10$mYjdblbto2KhB/u256pQf.hAEHGIT8WCwh8PLoMQYtONMCppe8V6G', 'satyam@gmail.com', 1, 0, '4', NULL, '2023-11-16 01:55:09.000000', '2023-11-16 01:55:09.000000', 2023, NULL, NULL, '2023-11-16 01:55:09.000000', '', 'MTcwMDExOTUwOQ=='),
(97, '1699882441', 'Keshri Nanadan', NULL, 'keshri.nandan@gmail.com', 1, 0, '4', NULL, '2023-11-13 08:08:38.000000', '2023-11-13 08:08:38.000000', 2023, NULL, NULL, '2023-11-13 08:08:38.000000', 'Supplier', 'MTY5OTg4MjcxOA==');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permission`
--

DROP TABLE IF EXISTS `user_has_permission`;
CREATE TABLE IF NOT EXISTS `user_has_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_has_permission`
--

INSERT INTO `user_has_permission` (`id`, `user_id`, `permission_id`) VALUES
(2, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_role`
--

DROP TABLE IF EXISTS `user_has_role`;
CREATE TABLE IF NOT EXISTS `user_has_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_has_role`
--

INSERT INTO `user_has_role` (`id`, `user_id`, `role_id`) VALUES
(1, 0, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
