-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2024 at 04:19 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_can_see_dashboard', 'User Can See Dashboard', '2024-03-02 13:51:40', '2024-03-02 08:21:40', NULL),
(2, 'user_can_see_user', 'User Can See User', '2024-03-02 13:51:40', '2024-03-02 08:21:40', NULL),
(3, 'user_can_see_roles', 'User Can See Roles', '2024-03-02 13:51:40', '2024-03-02 08:21:40', NULL),
(4, 'user_can_see_permission', 'User Can See Permission', '2024-03-02 13:51:41', '2024-03-02 08:21:41', NULL),
(5, 'user_can_see_product_list', 'User Can See Product List', '2024-03-02 13:51:41', '2024-03-02 08:21:41', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `name` varchar(65) COLLATE utf8mb4_general_ci NOT NULL,
  `display_name` varchar(65) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `updated_at`, `created_at`) VALUES
(1, 'users', 'Users', '2024-03-02 08:11:31', '0000-00-00 00:00:00'),
(2, 'admin', 'Admin', '2024-03-02 08:11:47', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_permission`
--

INSERT INTO `role_has_permission` (`id`, `role_id`, `permission_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing id of each user, unique index',
  `session_id` varchar(48) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `email` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `role_id` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'user''s account type (basic, premium, etc)',
  `remember_me_token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `creation_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `last_login_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `last_failed_login` int DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `activation_hash` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `password_reset_hash` char(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `password_reset_timestamp` timestamp(6) NULL DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `provider_type` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `password_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `session_id`, `name`, `password_hash`, `email`, `active`, `deleted`, `role_id`, `remember_me_token`, `creation_timestamp`, `last_login_timestamp`, `last_failed_login`, `activation_hash`, `password_reset_hash`, `password_reset_timestamp`, `provider_type`, `password_token`) VALUES
(1, '1724859684', 'aditya', '$2y$10$zrrJ8Rz16y/WiCze7MdRF.jdyxwrLmNxbZGVu52bmzGAvBvnE.XNS', 'abc@gmail.com', 1, 0, '2', NULL, '2024-08-28 10:12:04.000000', '2024-08-28 10:12:04.000000', 2024, NULL, NULL, '2024-08-28 10:12:04.000000', '', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_has_permission`
--

INSERT INTO `user_has_permission` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_has_role`
--

INSERT INTO `user_has_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
