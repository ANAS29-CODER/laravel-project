-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 10:19 AM
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
-- Database: `gsg_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cookie_id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
('2838b372-2e3f-43a0-884d-8e04287589d9', '13894355-5162-4139-9277-6177ce4f37b6', 70, 1, 31, '2022-06-29 21:17:01', '2022-07-04 03:02:47'),
('3fca818c-f9ee-43b6-91ca-4f46fbb97999', '13894355-5162-4139-9277-6177ce4f37b6', 74, 1, 4, '2022-06-30 09:20:27', '2022-06-30 09:27:43'),
('4cc23d53-9a54-4e5f-8bba-9276065589e2', '13894355-5162-4139-9277-6177ce4f37b6', 75, NULL, 3, '2022-06-30 20:53:47', '2022-06-30 20:53:47'),
('f36f6e84-e8d4-4a56-aa6a-cae4ec0e3c49', '13894355-5162-4139-9277-6177ce4f37b6', 73, 1, 8, '2022-06-30 09:21:42', '2022-06-30 09:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `description`, `img`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Toys', 'toys', NULL, 'Toys store', NULL, 'active', '2022-06-21 11:21:17', '2022-06-24 16:33:22', '2022-06-24 16:33:22'),
(9, 'Phones', 'phones', NULL, 'The phone collection', NULL, 'active', '2022-06-24 16:14:17', '2022-06-24 16:14:17', NULL),
(10, 'hngfj', 'hngfj', NULL, 'hgjhgcv ccbvd', NULL, 'active', '2022-06-24 18:58:57', '2022-06-24 18:58:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_30_101949_create_categories_table', 1),
(6, '2022_06_04_190004_create_products_table', 2),
(7, '2022_06_24_192811_add_soft_delete', 3),
(8, '2022_06_24_192904_add_soft_delete', 3),
(9, '2022_06_25_113302_create_roles_table', 4),
(10, '2022_06_25_114135_create_role_user_table', 4),
(11, '2022_06_25_235631_create_profiles_table', 5),
(12, '2022_06_26_140455_create_countries_table', 6),
(13, '2022_06_26_140931_add_country_id_to_user', 7),
(14, '2022_06_26_163053_add_user_id_to_products_table', 8),
(15, '2022_06_26_170226_create_ratings_table', 9),
(18, '2022_06_29_131252_create_carts_table', 10),
(21, '2022_07_01_001831_create_orders_table', 11),
(22, '2022_07_01_091232_create_order_items_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `discount` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `tax` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `total` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `status` enum('pending','cancelled','processing','shipped','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('unpaid','paid','refund') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `number`, `user_id`, `shipping`, `discount`, `tax`, `total`, `status`, `payment_status`, `billing_name`, `billing_email`, `billing_phone`, `billing_address`, `billing_city`, `billing_country`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_city`, `shipping_country`, `notes`, `created_at`, `updated_at`) VALUES
(1, '20220001', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'fggnffcv', '2022-07-02 06:17:04', '2022-07-02 06:17:04'),
(2, '20220002', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'fggnffcv', '2022-07-02 06:17:28', '2022-07-02 06:17:28'),
(3, '20220003', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'Anas Ouda', 'anasd@gmail.com', '0592970150', 'Al-Nasser st', 'Gaza', 'AT', 'fggnffcv', '2022-07-02 07:38:20', '2022-07-02 07:38:20'),
(4, '20220004', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'gfdsz gb', '2022-07-02 13:25:34', '2022-07-02 13:25:34'),
(5, '20220005', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'gfdsz gb', '2022-07-02 13:26:32', '2022-07-02 13:26:32'),
(6, '20220006', NULL, 0.00, 0.00, 0.00, 2396.00, 'pending', 'unpaid', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'anasd', 'anasd@gmail.com', 'anasd', 'anasd', 'anasd', 'AM', 'gfdsz gb', '2022-07-02 13:28:23', '2022-07-02 13:28:23'),
(7, '20220007', NULL, 0.00, 0.00, 0.00, 2501.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'mmmm', '2022-07-04 03:04:18', '2022-07-04 03:04:18'),
(8, '20220008', NULL, 0.00, 0.00, 0.00, 2501.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'mmmm', '2022-07-04 03:05:01', '2022-07-04 03:05:01'),
(9, '20220009', NULL, 0.00, 0.00, 0.00, 2501.00, 'pending', 'unpaid', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'Anas Ouda', 'anasd@gmail.com', 'anasd', 'anasd', 'Gaza', 'AW', 'mmmm', '2022-07-04 03:28:52', '2022-07-04 03:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `price` double(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 70, 24, 15.00),
(2, 70, 24, 15.00),
(3, 70, 24, 15.00),
(4, 70, 24, 15.00),
(5, 70, 24, 15.00),
(6, 70, 24, 15.00),
(7, 70, 31, 15.00),
(8, 70, 31, 15.00),
(9, 70, 31, 15.00),
(1, 73, 8, 4.50),
(2, 73, 8, 4.50),
(3, 73, 8, 4.50),
(4, 73, 8, 4.50),
(5, 73, 8, 4.50),
(6, 73, 8, 4.50),
(7, 73, 8, 4.50),
(8, 73, 8, 4.50),
(9, 73, 8, 4.50),
(1, 74, 4, 500.00),
(2, 74, 4, 500.00),
(3, 74, 4, 500.00),
(4, 74, 4, 500.00),
(5, 74, 4, 500.00),
(6, 74, 4, 500.00),
(7, 74, 4, 500.00),
(8, 74, 4, 500.00),
(9, 74, 4, 500.00),
(1, 75, 3, 0.00),
(2, 75, 3, 0.00),
(3, 75, 3, 0.00),
(4, 75, 3, 0.00),
(5, 75, 3, 0.00),
(6, 75, 3, 0.00),
(7, 75, 3, 0.00),
(8, 75, 3, 0.00),
(9, 75, 3, 0.00);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''''',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `sale_price` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double(8,2) UNSIGNED DEFAULT NULL,
  `width` double(8,2) UNSIGNED DEFAULT NULL,
  `height` double(8,2) UNSIGNED DEFAULT NULL,
  `length` double(8,2) UNSIGNED DEFAULT NULL,
  `status` enum('active','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `user_id`, `category_id`, `description`, `img_path`, `price`, `sale_price`, `quantity`, `sku`, `weight`, `width`, `height`, `length`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(70, 'gggggggggggg', 'gggggggggggg', NULL, 9, 'gggggggg', NULL, 15.00, 0.00, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2022-06-24 17:47:11', '2022-06-24 17:47:11', NULL),
(71, 'last one', 'last-one', NULL, 10, 'this is the lst one', 'uploads/Ei68RozvqN3vzAflr2fYD2TXTxjkAQJLsV6YBYtu.jpg', 556.00, 0.00, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2022-06-24 19:04:15', '2022-06-24 19:04:22', '2022-06-24 19:04:22'),
(72, 'ashiasj', 'ashiasj', NULL, 10, 'skaaaskasakn', NULL, 100.00, 0.00, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2022-06-26 06:30:03', '2022-06-26 06:30:03', NULL),
(73, 'nkams[lepm', 'nkamslepm', NULL, 10, 'kcmkmac', NULL, 4.50, 0.00, 0, NULL, NULL, NULL, NULL, NULL, 'active', '2022-06-26 06:30:15', '2022-06-26 06:30:15', NULL),
(74, 'anas ouda', 'anasouda', 1, 9, 'asdsc cxacs', 'uploads/Ei68RozvqN3vzAflr2fYD2TXTxjkAQJLsV6YBYtu.jpg', 500.00, 0.00, 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(75, 'test', 'test', 1, 9, 'test', 'uploads/Ei68RozvqN3vzAflr2fYD2TXTxjkAQJLsV6YBYtu.jpg', 0.00, 0.00, 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `rating` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`abilities`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `abilities`, `created_at`, `updated_at`) VALUES
(11, 'dsfsdfdsfs', '[\"products.update\",\"products.create\",\"products.delete\",\"roles.view-any\",\"roles.view\",\"roles.create\",\"roles.delete\"]', '2022-06-25 13:39:39', '2022-06-25 13:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(11, 1);

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
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'anas', 'anasouda43@gmail.com', NULL, '$2y$10$SeGcEJrVJTIxE0b23Je4ueTufOVokRWbyymSpJUo/CB/2GRn7VPsC', NULL, NULL, '2022-06-23 06:01:58', '2022-06-23 06:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_cookie_id_product_id_user_id_unique` (`cookie_id`,`product_id`,`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
