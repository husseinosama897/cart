-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 06:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `supplier_id`, `total`, `price`, `quantity`, `type`, `created_at`, `updated_at`, `image`, `dis`) VALUES
(1, 'HyJm8h6WgPuknl1WkIAriNmRYZtiUcLYA6NEcMdI', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-06 05:45:48', '2022-05-06 05:45:48', NULL, NULL),
(2, 'TAmCPxwquhMrkqiyP14Dxydn3pcBNJYSGUeJepNF', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-06 05:45:54', '2022-05-06 05:45:54', NULL, NULL),
(3, 'RZQL4CbdX2PdvBFHAOeLSupxDZ2w3abSXKYTJhw3', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-06 18:25:48', '2022-05-06 18:25:48', NULL, NULL),
(4, 'RZQL4CbdX2PdvBFHAOeLSupxDZ2w3abSXKYTJhw3', NULL, 2, 16, 0.00, NULL, 1, 0, '2022-05-06 18:28:57', '2022-05-06 18:28:57', NULL, NULL),
(5, 'TQBWHZn6jlxb0keYEUcdnkQnos4yxYfMFMzycbyU', NULL, 2, 16, 0.00, NULL, 1, 0, '2022-05-07 08:51:26', '2022-05-07 08:51:26', NULL, NULL),
(6, 'JQvBFTwXF9eCnsXeuDNpQUMRhup1xo2CDbS6viZ7', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-09 03:46:20', '2022-05-09 03:46:20', NULL, NULL),
(7, 'm7iqIaFfbbMA56wkYgyrX0CqJyT7iQhNvI8K698i', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-09 08:11:12', '2022-05-09 08:11:12', NULL, NULL),
(9, 'JbZljw2C5q3PTuHyckSkpWYGXsrcbH3YJ39xjNhm', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-11 04:49:29', '2022-05-11 04:49:29', NULL, NULL),
(10, 'PGBprN3jnuuBrbLNr2FsMDeRv6wPzFQZXjzPPZq5', NULL, 1, 16, 0.00, NULL, 1, 0, '2022-05-11 07:50:57', '2022-05-11 07:50:57', NULL, NULL),
(11, 'PGBprN3jnuuBrbLNr2FsMDeRv6wPzFQZXjzPPZq5', NULL, 2, 16, 0.00, NULL, 1, 0, '2022-05-11 07:51:21', '2022-05-11 07:51:21', NULL, NULL),
(13, 'sCJLGB6T5ZQpUOCAnaGbwhKg9208dbNTvHN91Iqy', NULL, 1, 16, 100.00, 100.00, 1, 0, '2022-05-15 09:29:30', '2022-05-15 09:29:30', NULL, NULL),
(14, 'p9BQFvAkTk3gXc69KUi1h9k1dDyD2cDB9ipualTk', NULL, 1, 16, 100.00, 100.00, 1, NULL, '2022-05-15 19:45:25', '2022-05-15 19:45:25', NULL, NULL),
(15, NULL, 1, 1, 16, 1800.00, 100.00, 7, NULL, '2022-05-15 19:47:13', '2022-05-15 22:50:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `slug`, `image`) VALUES
(1, 'Detergents', NULL, NULL, 'Detergents', '4.jpg'),
(2, 'food', NULL, NULL, 'food', '1.jpg'),
(3, 'canned food', NULL, NULL, 'canned-food', '3.jpg'),
(4, 'drinks', NULL, NULL, 'drinks', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) DEFAULT NULL,
  `percent_off` double(8,2) DEFAULT NULL,
  `expire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `percent_off`, `expire`, `created_at`, `updated_at`) VALUES
(1, 'h@565', 'voucher', 1000.00, 0.00, '7/16/2022', NULL, NULL),
(2, 'MO@15', 'percent', NULL, 70.00, '7/16/2022', NULL, NULL);

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
(4, '2022_04_16_134912_create_categories_table', 1),
(5, '2022_04_16_135736_create_suppliers_table', 1),
(6, '2022_04_16_135939_create_products_table', 1),
(7, '2022_04_24_061312_create_countries_table', 1),
(8, '2022_04_24_072854_create_carts_table', 2),
(9, '2022_04_24_073506_create_wishlists_table', 3),
(10, '2022_04_24_073613_create_coupons_table', 3),
(11, '2022_04_24_074023_create_orders_table', 4),
(12, '2022_04_24_074208_create_orderitems_table', 4),
(13, '2022_05_11_104254_create_seller_orders_table', 5),
(14, '2022_05_12_074208_create_orderitems_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `seller_order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_discount_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed` int(1) NOT NULL DEFAULT 0,
  `confirmation_date` date DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `track_order` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_name`, `billing_email`, `billing_number`, `type`, `billing_discount_code`, `billing_subtotal`, `billing_total`, `billing_tax`, `created_at`, `updated_at`, `confirmed`, `confirmation_date`, `receive_date`, `delivery_date`, `track_order`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, '100', '100.15', '0.15', '2022-05-15 10:05:32', '2022-05-15 10:05:32', 0, NULL, NULL, NULL, 0);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `qty_type` int(11) DEFAULT NULL,
  `qty` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `offer` double(8,2) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `qty_type`, `qty`, `discount`, `offer`, `img`, `category_id`, `supplier_id`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'french fries', 100.00, 1, 100.00, 0.00, 0.00, '1.jpg', 1, 16, NULL, NULL, 'french-fries'),
(2, 'beef burger americana', 100.00, 1, 100.00, 0.00, 0.00, '2.png\r\n', 1, 16, NULL, NULL, 'beef-burger- americana'),
(3, 'danone strawberry', 100.00, 1, 100.00, 0.00, 0.00, '3.jpg', 3, 25, NULL, NULL, 'danone-strawberry'),
(4, 'greek yoghurt', 100.00, 1, 100.00, 0.00, 0.00, '4.jpg', 3, 25, NULL, NULL, 'greek-yoghurt'),
(5, 'monester energy', 100.00, 1, 100.00, 0.00, 0.00, '5.png', 4, 19, NULL, NULL, 'monester-energy'),
(6, 'coca cola', 100.00, 1, 100.00, 0.00, 0.00, '7.jpg', 4, 14, NULL, NULL, 'coca-cola');

-- --------------------------------------------------------

--
-- Table structure for table `seller_orders`
--

CREATE TABLE `seller_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `neighborhood` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `tax_number`, `phone`, `location`, `city`, `email`, `created_at`, `updated_at`, `neighborhood`, `postal_code`, `building_num`, `street_name`, `comp`, `country`, `slug`, `img`, `dis`) VALUES
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'coca cola', '', 'coca-cola', '1.png\r\n', 'وصف وصف وصف'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'McDonal\'s', '', 'McDonals', '2.png', 'وصف وصف وصف'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'burger king', NULL, 'burger-king', '3.png', 'وصف وصف وصف'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'monester', NULL, 'monester', '5.png', 'وصف وصف وصف'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'halal', NULL, 'halal', '6.png', 'وصف وصف وصف'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oreo', NULL, 'oreo', '7.png\r\n', 'وصف وصف وصف'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nestle', NULL, 'nestle', '8.png', 'وصف وصف وصف'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'danone', NULL, 'danone', '9.png', 'وصف وصف وصف'),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'domino\'s pizza', NULL, 'dominos-pizza', '10.png\r\n', 'وصف وصف وصف');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'g', 'bondbond796@yahoo.com', NULL, '$2y$10$aMIVcJVuDMHFV.IQQWAs/e01jK2dqx9Fluo3mjmcNbQHX.BnkhKYy', NULL, '2022-05-15 19:46:57', '2022-05-15 19:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

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
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_orders`
--
ALTER TABLE `seller_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seller_orders`
--
ALTER TABLE `seller_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
