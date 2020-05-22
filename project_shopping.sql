-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 15, 2020 lúc 09:17 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 't-shirts', NULL, NULL),
(2, 'training-shirts', NULL, NULL),
(3, 'pants', NULL, NULL),
(4, 'hoodies', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(100) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Le Ngoc Thang', 12345667891, 'abc', '2020-05-15 02:02:28', '2020-05-15 02:02:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_04_07_035244_create_categories_table', 1),
(3, '2020_04_07_035542_create_products_table', 1),
(4, '2020_04_07_040534_create_orders_table', 1),
(5, '2020_04_07_040820_create_orderproducts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanlity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total_quality` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categories_id`, `name`, `description`, `thumbnail_path`, `unit_price`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Warrior Black', '100% Cottom\r\nMade in Viet Nam', '1', 120, 't-shirts', NULL, NULL),
(2, 1, 'Lakers Black', '100% Cottom\r\nMade in Viet Nam', '2', 120, 't-shirts', NULL, NULL),
(3, 1, 'Lakers White', '100% Cottom\r\nMade in Viet Nam', '3', 150, 't-shirts', NULL, NULL),
(4, 1, 'Celtics White', '100% Cottom\r\nMade in Viet Nam', '4', 150, 't-shirts', NULL, NULL),
(5, 1, 'Rockets Black', '100% Cottom\r\nMade in Viet Nam', '5', 180, 't-shirts', NULL, NULL),
(6, 1, 'Shirt Black', '100% Cottom\r\nMade in Viet Nam', '6', 200, 't-shirts', NULL, NULL),
(7, 1, 'Shirt White', '100% Cottom\r\nMade in Viet Nam', '7', 200, 't-shirts', NULL, NULL),
(8, 1, 'Shirt Love White', '100% Cottom\r\nMade in Viet Nam', '8', 200, 't-shirts', NULL, NULL),
(9, 1, 'Shirt Love Black', '100% Cottom\r\nMade in Viet Nam', '9', 180, 't-shirts', NULL, NULL),
(11, 2, 'Warrior Blue Training', '100% Cottom\r\nMade in Viet Nam', '1', 150, 'training-shirts', NULL, NULL),
(12, 2, 'Warrior Black Training', '100% Cottom\r\nMade in Viet Nam', '2', 150, 'training-shirts', NULL, NULL),
(13, 2, 'Rocket Black Training', '100% Cottom\r\nMade in Viet Nam', '3', 150, 'training-shirts', NULL, NULL),
(14, 2, 'Celtics Black Training', '100% Cottom\r\nMade in Viet Nam', '4', 150, 'training-shirts', NULL, NULL),
(15, 2, 'Lakers Violet Training', '100% Cottom\r\nMade in Viet Nam', '5', 150, 'training-shirts', NULL, NULL),
(16, 2, 'Lakers Black Training', '100% Cottom\r\nMade in Viet Nam', '6', 150, 'training-shirts', NULL, NULL),
(17, 2, 'Jordan Red Training', '100% Cottom\r\nMade in Viet Nam', '7', 150, 'training-shirts', NULL, NULL),
(18, 2, 'Jordan Black Training', '100% Cottom\r\nMade in Viet Nam', '8', 150, 'training-shirts', NULL, NULL),
(19, 2, 'Jordan White Training', '100% Cottom\r\nMade in Viet Nam', '9', 150, 'training-shirts', NULL, NULL),
(21, 3, 'Training Pants 1', '100% Cottom\r\nMade in Viet Nam', '1', 150, 'pants', NULL, NULL),
(22, 3, 'Training Pants 2', '100% Cottom\r\nMade in Viet Nam', '2', 150, 'pants', NULL, NULL),
(23, 3, 'Training Pants 3', '100% Cottom\r\nMade in Viet Nam', '3', 150, 'pants', NULL, NULL),
(24, 3, 'Training Pants 4', '100% Cottom\r\nMade in Viet Nam', '4', 150, 'pants', NULL, NULL),
(25, 3, 'Training Pants 5', '100% Cottom\r\nMade in Viet Nam', '5', 200, 'pants', NULL, NULL),
(26, 3, 'Training Pants 6', 'Cool\r\n100% Cottom\r\nMade in Viet Nam', '6', 120, 'pants', NULL, NULL),
(27, 3, 'Training Pants 7', 'Cool\r\n100% Cottom\r\nMade in Viet Nam', '7', 150, 'pants', NULL, NULL),
(28, 3, 'Training Pants 8', 'Cool\r\n100% Cottom\r\nMade in Viet Nam', '8', 180, 'pants', NULL, NULL),
(29, 3, 'Training Pants 9', 'Cool\r\n100% Cottom\r\nMade in Viet Nam', '9', 150, 'pants', NULL, NULL),
(31, 4, 'Hoodie Kyrie 1', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '1', 150, 'hoodies', NULL, NULL),
(32, 4, 'Hoodie Kyrie 2', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '2', 150, 'hoodies', NULL, NULL),
(33, 4, 'Hoodie Kyrie 3', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '3', 120, 'hoodies', NULL, NULL),
(34, 4, 'Hoodie Kyrie 4', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '4', 150, 'hoodies', NULL, NULL),
(35, 4, 'Hoodie Kyrie 5', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '5', 200, 'hoodies', NULL, NULL),
(36, 4, 'Hoodie Kyrie 6', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '6', 200, 'hoodies', NULL, NULL),
(37, 4, 'Hoodie Kyrie 7', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '7', 150, 'hoodies', NULL, NULL),
(38, 4, 'Hoodie Kyrie 8', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '8', 180, 'hoodies', NULL, NULL),
(39, 4, 'Hoodie Kyrie 9', 'Cool\r\n100% Cottom\r\nMade in Viet Nam\r\n', '9', 150, 'hoodies', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Van A', 'nguyenvana@gmail.com', '$2y$10$ue/wLUKmfF69fibO.juogeRB3nEuj5nW2t38Ub195wFCQ3LQffO2m', NULL, NULL, NULL, '2020-05-15 00:07:13', '2020-05-15 00:07:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
