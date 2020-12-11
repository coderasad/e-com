-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 08:39 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(30, 'Samsung', '.jpg', '2020-07-14 05:13:10', '2020-08-08 05:15:51'),
(31, 'Xiaomi', '.jpg', '2020-07-14 05:14:22', '2020-08-15 01:31:59'),
(32, 'Sony', '.jpg', '2020-07-14 05:16:09', '2020-09-06 12:53:36'),
(33, 'apple', '.jpg', '2020-07-14 05:17:06', '2020-09-06 12:54:17'),
(34, 'One Plus', '.jpg', '2020-07-14 05:17:42', '2020-09-06 12:54:47'),
(38, 'Nokia', '.jpg', '2020-07-14 19:09:37', '2020-09-06 12:56:07'),
(39, 'MacBook', '.jpg', '2020-07-31 12:44:53', '2020-07-31 12:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `img`, `created_at`, `updated_at`) VALUES
(65, 'Laptop', 'category_image_358.png', '2020-07-31 12:43:09', '2020-07-31 12:43:09'),
(66, 'Mobile', 'category_image_630.png', '2020-08-08 05:36:21', '2020-08-08 05:36:21'),
(67, 'Headphone', 'category_image_699.png', '2020-08-08 05:36:47', '2020-08-08 05:36:47'),
(68, 'TV', 'category_image_964.png', '2020-08-08 05:37:06', '2020-08-08 05:37:06'),
(69, 'Desktop', 'category_image_527.png', '2020-08-08 06:06:54', '2020-08-08 06:06:54'),
(70, 'Camera', 'category_image_404.png', '2020-08-09 05:28:19', '2020-08-09 05:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `chat`) VALUES
(87, 'dsfsad'),
(88, 'dsf'),
(89, 'asdsad'),
(90, 'rew we'),
(91, 'df'),
(92, 'dfs'),
(93, 'dfsfsfd'),
(94, 'dfsd'),
(95, 'dsfa'),
(96, 'fgdfd'),
(97, 'dfgsdfsd'),
(98, 'erwvrerv rrt'),
(99, 'hhh'),
(100, 'Your aname');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Gift-50', 50, '2020-07-18 00:22:41', '2020-07-18 00:22:41'),
(3, 'Gift-100', 100, '2020-07-18 00:32:12', '2020-07-18 00:32:12'),
(4, 'Eid-Offer', 200, '2020-07-18 00:32:35', '2020-07-18 00:32:35'),
(5, 'Black-Friday', 300, '2020-11-10 11:30:05', '2020-11-10 11:30:05');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_02_051937_create_roles_table', 1),
(5, '2020_07_05_123929_create_categories_table', 2),
(6, '2020_07_05_125241_create_subcategories_table', 3),
(7, '2020_07_05_125310_create_brands_table', 3),
(8, '2020_07_08_053006_create_brands_table', 4),
(9, '2020_07_18_055348_create_coupons_table', 5),
(10, '2020_07_18_064807_create_subscribers_table', 6),
(11, '2020_07_20_231538_create_products_table', 7),
(12, '2020_08_15_122703_create_wishlists_table', 8),
(13, '2018_12_23_120000_create_shoppingcart_table', 9),
(14, '2020_11_12_101319_create_shipping_cost_table', 10),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(18, '2016_06_01_000004_create_oauth_clients_table', 11),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11),
(20, '2020_11_12_102722_create_shipping_costs_table', 11),
(21, '2020_11_19_210119_create_orders_table', 12),
(22, '2020_11_19_210528_create_order_details_table', 12),
(23, '2020_11_19_210600_create_shippings_table', 12),
(24, '2020_11_21_092331_create_seo_table', 13),
(25, '2020_11_21_235452_create_sitesetting_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'EYxthRzy9od1hzwxJLbtMh4SVPp4ysAaLv3T9bWR', NULL, 'http://localhost', 1, 0, 0, '2020-11-19 07:00:45', '2020-11-19 07:00:45'),
(2, NULL, 'Laravel Password Grant Client', 'fBq63mEj5Nl8RP3qatn8bs1JIm2EOGaqr9dqBNG1', 'users', 'http://localhost', 0, 1, 0, '2020-11-19 07:00:45', '2020-11-19 07:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-19 07:00:45', '2020-11-19 07:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bln_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `paying_amount`, `bln_transection`, `stripe_order_id`, `discount`, `shipping`, `vat`, `total`, `status`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(9, '8', 'stripe', 'card_1HpYmJDHXnolxYEmbucChhVG', '700', 'txn_1HpYmKDHXnolxYEmN9ptQT8a', '5fb7b737529d3', '300', '50', '0', '700.00', '3', 'Nov', '20-11-20', '2020', NULL, NULL),
(10, '8', 'stripe', 'card_1HpYs2DHXnolxYEm1NtYjX7E', '100', 'txn_1HpYs3DHXnolxYEmWSk59kIz', '5fb7b89a9ed3a', '0', '50', '0', '100.00', '3', 'Nov', '20-11-20', '2020', NULL, NULL),
(11, '8', 'stripe', 'card_1HpZ1WDHXnolxYEmCmnQGcaW', '450', 'txn_1HpZ1XDHXnolxYEmsOSf0OxS', '5fb7bae663c63', '0', '50', '0', '450', '4', 'Nov', '20-11-20', '2020', NULL, NULL),
(12, '8', 'stripe', 'card_1HpZGODHXnolxYEmNO7iw2SF', '272', 'txn_1HpZGQDHXnolxYEmalcs49x9', '5fb7be8123e5a', '300', '50', '0', '272', '3', 'Nov', '20-11-20', '2020', NULL, NULL),
(13, '8', 'stripe', 'card_1HpmaPDHXnolxYEmjGw2c09c', '282', 'txn_1HpmaRDHXnolxYEmqQu0EkQ3', '5fb8868dc070a', '0', '50', '0', '282', '3', 'Nov', '21-11-20', '2020', NULL, NULL),
(14, '8', 'stripe', 'card_1HpyA5DHXnolxYEmvYiagA27', '514', 'txn_1HpyA8DHXnolxYEmsV8sAwRR', '5fb9345d05f4b', '50', '50', '0', '514', '3', 'Nov', '21-11-20', '2020', NULL, NULL),
(15, '1', 'stripe', 'card_1Hq23QDHXnolxYEm3Bf0IrbK', '2272', 'txn_1Hq23SDHXnolxYEmCgV2Ec7z', '5fb96ed0ec469', '0', '50', '0', '2272', '3', 'Nov', '22-11-20', '2020', NULL, NULL),
(16, '8', 'stripe', 'card_1HqA9NDHXnolxYEm6bBRIDU4', '994', 'txn_1HqA9PDHXnolxYEm7M5aTUkU', '5fb9e8623521a', '0', '50', '0', '994', '3', 'Nov', '22-11-20', '2020', NULL, NULL),
(17, '1', 'stripe', 'card_1HqBOsDHXnolxYEmHxZoI0Sv', '494', 'txn_1HqBOvDHXnolxYEmSxW6Rwyt', '5fb9fb276dedc', '300', '50', '0', '494', '3', 'Nov', '22-11-20', '2020', NULL, NULL),
(18, '8', 'stripe', 'card_1HqBVdDHXnolxYEmkAkM8cn4', '500', 'txn_1HqBVeDHXnolxYEmlhuBCjgA', '5fb9fcc9cea3d', '50', '50', '0', '500', '3', 'Nov', '22-11-20', '2020', NULL, NULL),
(19, '8', 'stripe', 'card_1HqHOxDHXnolxYEmCw6aFiEP', '8050', 'txn_1HqHP0DHXnolxYEmqI54K9cG', '5fba5544cebc4', '300', '50', '0', '8050', '3', 'Nov', '22-11-20', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(8, '9', '20', NULL, NULL, '2', '100', '200', NULL, NULL),
(9, '9', '24', NULL, NULL, '1', '500', '500', NULL, NULL),
(10, '10', '20', NULL, NULL, '1', '100', '100', NULL, NULL),
(11, '11', '23', NULL, NULL, '1', '400', '400', NULL, NULL),
(12, '12', '28', NULL, NULL, '1', '222', '222', NULL, NULL),
(13, '13', '26', NULL, NULL, '1', '232', '232', NULL, NULL),
(14, '14', '26', NULL, NULL, '2', '232', '464', NULL, NULL),
(15, '15', '25', NULL, NULL, '1', '2222', '2222', NULL, NULL),
(16, '16', '28', NULL, NULL, '2', '222', '444', NULL, NULL),
(17, '16', '24', NULL, NULL, '1', '500', '500', NULL, NULL),
(18, '17', '28', NULL, NULL, '2', '222', '444', NULL, NULL),
(19, '18', '24', NULL, NULL, '1', '500', '500', NULL, NULL),
(20, '19', '35', NULL, NULL, '1', '7800', '7800', NULL, NULL),
(21, '19', '33', 'pink,red,blue,orange,yellow', NULL, '2', '250', '500', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_shippings`
--

CREATE TABLE `order_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_shippings`
--

INSERT INTO `order_shippings` (`id`, `order_id`, `ship_name`, `ship_email`, `ship_phone`, `ship_address`, `ship_city`, `delivery_date`, `created_at`, `updated_at`) VALUES
(6, '9', 'Momin', 'momin@gmail.com', '01616859674', 'Mirpur', 'Dhaka', NULL, NULL, NULL),
(7, '10', 'coder', 'asad@gmail.com', '01616859674', 'Mirpur', 'Dhaka', NULL, NULL, NULL),
(8, '11', 'Momin', 'asad@gmail.com', '01616859674', 'Mirpur', 'Dhaka', NULL, NULL, NULL),
(9, '12', 'Momin', 'asad@gmail.com', '01616859674', 'Mirpur', 'Dhaka', '2022-11-19 18:00:00', NULL, NULL),
(10, '13', 'Momin', 'momin@gmail.com', '01616859674', 'Mirpur', 'Dhaka', '2022-11-19 18:00:00', NULL, NULL),
(11, '14', 'sdfsd', 'asad@gmail.com', '01616859674', 'Mirpur', 'Dhaka', '2021-11-19 18:00:00', NULL, NULL),
(12, '15', 'Momin', 'momin@gmail.com', '01616859674', 'Mirpur', 'Dhaka', '2022-11-19 18:00:00', NULL, NULL),
(13, '16', 'Alamgir', 'alamgirkebir953@gmail.com', '০১৭১৭৯৭১৯০৪', 'Jessore Khulna', 'Jessore', '2022-11-19 18:00:00', NULL, NULL),
(14, '17', 'Momin', '247247ar@gmail.com', '01616859674', 'dsfsd', 'dfsdf', '2022-11-19 18:00:00', NULL, NULL),
(15, '18', 'Alamgir', 'info.asadrahman@gmail.com', '০১৭১৭৯৭১৯০৪', 'Jessore Khulna', 'Jessore', '2022-11-19 18:00:00', NULL, NULL),
(16, '19', 'Alamgir', 'info.asadrahman@gmail.com', '০১৭১৭৯৭১৯০৪', 'Jessore Khulna', 'Jessore', '2022-11-19 18:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_rated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mid_slider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_new` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_slug`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(7, 65, 24, 39, 'MacBook Air 13', 'macbook-air-13', 'Mac_01', '10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus vitae nulla corporis libero. Dolore, repudiandae. Cumque atque ut natus itaque enim nobis, dolore molestias id repellat dignissimos. Voluptatum dolorum harum similique tempore doloribus quaerat totam atque porro at aspernatur architecto hic, dolorem adipisci reprehenderit laboriosam ullam distinctio sunt placeat.', 'White,black', '21\"', '150000', '120000', 'Video Link *', '1', '1', '1', '1', '1', NULL, '.png', '.png', '.jpg', 1, '2020-08-07 11:16:33', '2020-09-06 12:11:52'),
(11, 66, 26, 30, 'Samsung M21', 'samsung-m21', 'sam_01', '20', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus vitae nulla corporis libero. Dolore, repudiandae. Cumque atque ut natus itaque enim nobis, dolore molestias id repellat dignissimos. Voluptatum dolorum harum similique tempore doloribus quaerat totam atque porro at aspernatur architecto hic, dolorem adipisci reprehenderit laboriosam ullam distinctio sunt placeat.<br></p>', 'black', '6.4\"', '20000', NULL, 'Video Link *', NULL, NULL, NULL, '1', NULL, '1', '.png', '.jpg', '.jpg', 0, '2020-08-08 02:14:11', '2020-08-20 17:23:58'),
(12, 66, 26, 30, 'Samsung M30', 'samsung-m30', 'sam_02', '10', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate officia et impedit repudiandae sequi, repellendus harum, laborum illum sunt neque similique? Libero, deserunt modi. Aperiam illum delectus nemo numquam expedita maiores rerum eaque, debitis nam doloribus inventore eligendi ut facere quae odit ea sint qui culpa, incidunt voluptas nisi veniam.<br></p>', 'Black', '6\"', '21000', NULL, 'Video Link *', '1', '1', NULL, NULL, NULL, NULL, '.png', '.png', '.png', 1, '2020-08-09 02:45:42', '2020-08-20 17:24:09'),
(13, 66, 29, 38, 'Huawei MediaPad', 'huawei-mediapad', 'RG-01', '90', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!<br></p>', 'black', NULL, '300', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '.png', '.jpg', '.jpg', 1, '2020-08-09 05:16:48', '2020-08-20 17:24:20'),
(14, 67, 27, 38, 'Sony MDRZX310W', 'sony-mdrzx310w', 'RG-02', '80', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!<br></p>', NULL, NULL, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '.png', '.png', '.png', 1, '2020-08-09 05:24:49', '2020-08-20 17:24:48'),
(16, 70, 30, 39, 'Canon STM Kit957', 'canon-stm-kit957', 'RG-03', '10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!', 'Black', NULL, '50000', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '.png', '.png', '.png', 1, '2020-08-09 05:33:17', '2020-08-20 17:25:01'),
(17, 65, 31, 39, 'Lenovo IdeaPad', 'lenovo-ideapad', 'RG-04', '50', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!<br></p>', 'white', NULL, '75000', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '.png', '.png', '.png', 1, '2020-08-09 05:35:04', '2020-08-20 17:25:11'),
(18, 66, 26, 39, 'Apple iPod shuffle', 'apple-ipod-shuffle', 'RG-05', '40', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!<br></p>', NULL, NULL, '28000', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', '.png', '.png', '.png', 1, '2020-08-09 05:38:07', '2020-08-20 17:25:21'),
(19, 66, 29, 33, 'LUNA Smartphone', 'luna-smartphone', 'RG-06', '30', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!<br></p>', 'blue', NULL, '21000', NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', '.png', '.png', '.png', 1, '2020-08-09 05:39:46', '2020-08-20 17:23:17'),
(20, 70, 30, 39, 'Hot New_1', 'hot-new-1', 'Product Code *', '30', '<p><span style=\"color: rgb(134, 139, 161);\">Product Details&nbsp;</span><span class=\"tx-danger\">*</span><br></p>', NULL, NULL, '100', NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, '.jpg', '.jpg', '.jpg', 1, '2020-08-16 00:45:56', '2020-11-11 10:29:14'),
(21, 67, 27, 33, 'Hot New_2', 'hot-new-2', 'Product Code *', '20', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!</p>', NULL, NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '.jpg', '.jpg', '.jpg', 1, '2020-08-16 00:47:56', '2020-09-07 05:46:45'),
(23, 65, 31, 34, 'Hot New_3', 'hot-new-3', 'Product Code *', '30', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '400', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '.jpg', '.jpg', '.jpg', 1, '2020-08-16 00:49:19', '2020-11-11 10:18:00'),
(24, 65, 31, 34, 'Hot New_4', 'hot-new-4', 'Product Code *', '11', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '500', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '.jpg', '.jpg', '.jpg', 1, '2020-08-16 00:52:01', '2020-08-20 17:26:05'),
(25, 65, 31, 39, 'Hot New_6', 'hot-new-6', 'Product Code *', '19', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '2222', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '.jpg', '.jpg', '.jpg', 1, '2020-08-16 01:27:41', '2020-08-20 17:26:16'),
(26, 68, 28, 30, 'Hot New_7', 'hot-new-7', 'Product Code *', '30', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '232', NULL, NULL, NULL, NULL, '1', NULL, '1', NULL, '.jpg', '.jpg', '.jpg', 1, '2020-08-16 01:28:33', '2020-08-20 17:26:28'),
(27, 70, 30, 39, 'Hot New_8', 'hot-new-8', 'Product Code *', '40', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '499', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '.jpg', '.jpg', '.jpg', 1, '2020-08-16 01:29:39', '2020-08-20 17:26:36'),
(28, 66, 26, 38, 'Hot New_9', 'hot-new-9', 'Product Code *', '7', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', NULL, NULL, '222', NULL, NULL, NULL, NULL, '1', NULL, '1', NULL, '.jpg', '.png', '.png', 1, '2020-08-16 01:30:28', '2020-11-11 04:02:08'),
(33, 70, 30, 39, 'Hot New_10', 'hot-new-10', 'Product Code *', '28', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis ipsum nam dignissimos voluptate. Impedit dolorem cupiditate illo. Sint excepturi magni delectus id nostrum aliquam, illo blanditiis laboriosam sequi explicabo. Expedita, doloribus quis illum, maiores dignissimos suscipit provident porro sequi repellat officiis consequuntur labore natus magnam consequatur voluptatum vel commodi esse!<br></p>', 'pink,red,blue,orange,yellow', 'sm,big', '250', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '.jpg', '.png', '.jpg', 1, '2020-08-20 17:20:31', '2020-11-11 04:00:47'),
(35, 68, 28, 32, 'Watch Tv', 'watch-tv', 'TV-14', '29', '<p>&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum porro doloremque suscipit quidem! Velit quae et amet porro quasi illo quaerat recusandae asperiores reprehenderit fuga natus ipsa quo vel qui, esse dolor itaque repellat, beatae architecto est deleniti ratione ab? Rerum ab aut reprehenderit beatae a placeat aspernatur optio!&lt;br&gt;&lt;/p&gt;<br></p>', NULL, NULL, '7800', NULL, NULL, '1', '1', NULL, '1', NULL, NULL, '.jpg', '.png', '.jpg', 1, '2020-11-11 03:56:22', '2020-11-11 10:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(2, 'Big Online Ship', 'Coder Asad', 'online, shop', 'So how did the classical Latin become so incoherent? According to McClintock, a 15th century typesetter likely scrambled part of Cicero\'s De Finibus in order to provide placeholder text to mockup various fonts for a type specimen book.', '122354', '542165', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_cost`
--

CREATE TABLE `shipping_cost` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_cost`
--

INSERT INTO `shipping_cost` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(2, '0', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_costs`
--

CREATE TABLE `shipping_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `instragram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '01717 971904', '01717 987456', 'asad@gmail.com', 'shopcoder', 'House # 10, Roade # 2 Mirpur - 10,', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(24, 65, 'MacBook', '2020-07-31 12:43:33', '2020-07-31 12:43:33'),
(26, 66, 'Samsung', '2020-08-08 05:37:45', '2020-08-08 05:37:45'),
(27, 67, 'Bluetooth Headphone', '2020-08-08 05:40:06', '2020-08-08 05:40:06'),
(28, 68, 'LG', '2020-08-08 05:40:26', '2020-08-08 05:40:26'),
(29, 66, 'Walton', '2020-08-08 16:01:52', '2020-08-08 16:01:52'),
(30, 70, 'Canon', '2020-08-09 05:29:43', '2020-08-09 05:29:43'),
(31, 65, 'HP', '2020-08-09 05:30:23', '2020-08-09 05:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(21, 'asad@gmail.com', '2020-08-14 02:58:37', NULL),
(22, '247247ar@gmail.com', '2020-08-14 02:58:52', NULL),
(23, 'admin@gmail.com', '2020-08-14 02:58:59', NULL),
(24, 'author@gmail.com', '2020-10-05 05:48:08', NULL),
(25, 'asadidb43@gmail.com', '2020-11-19 09:09:13', NULL),
(26, 'momin@gmail.com', '2020-11-21 15:34:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `google_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `google_id`, `name`, `username`, `phone`, `email`, `email_verified_at`, `password`, `img`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Md. Admin', 'admin', '', 'admin@gmail.com', NULL, '$2y$10$5BikXOs6wlN8HzQBwxn0SutcEYAZQwtCbVxOy9dPvDGOoZ/qnMjPa', NULL, NULL, NULL, NULL, '2020-08-12 00:40:19'),
(8, 2, NULL, 'Asad Rahman', NULL, '01717971904', 'asad@gmail.com', NULL, '$2y$10$nMbu60kPeXqVf/5QJNp3p.Fx87RXAk39n7/Q4iQFN6YvqEyHtsMtS', '.jpg', NULL, NULL, '2020-08-11 13:53:49', '2020-08-15 02:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_shippings`
--
ALTER TABLE `order_shippings`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_shippings`
--
ALTER TABLE `order_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
