-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 10:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Baby Stroller', 'Baby Stroller Cat', 'Babycarriage.jpg', '2019-12-12 10:17:58', '2019-12-12 10:17:58'),
(2, 'Pacifier', 'Pacifier Cat', 'pacifier.jpg', '2019-12-12 10:17:58', '2020-02-05 13:04:23'),
(3, 'Baby Mobile', 'Baby Mobile cat', 'V_TEC.jpg', '2019-12-12 10:27:16', '2020-02-05 13:06:45'),
(4, 'Trampoline', 'trampoline for little', 'Trampoline.jpg', '2020-02-05 10:12:41', '2020-02-18 11:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `content`, `subtotal`, `created_at`, `updated_at`) VALUES
(302, 1, '{\"1\":{\"id\":1,\"name\":\"Baby_stroller1\",\"price\":4500,\"quantity\":2,\"attributes\":[],\"conditions\":[]}}', '9000', '2020-04-28 13:15:25', '2020-04-28 13:15:25'),
(305, 1, '{\"1\":{\"id\":1,\"name\":\"Baby_stroller1\",\"price\":4500,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"2\":{\"id\":2,\"name\":\"cybex1\",\"price\":2000,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"3\":{\"id\":3,\"name\":\"yoyo1\",\"price\":2500,\"quantity\":1,\"attributes\":[],\"conditions\":[]}}', '9000', '2020-04-28 14:40:20', '2020-04-28 14:40:20'),
(306, 1, '{\"4\":{\"id\":4,\"name\":\"physio1\",\"price\":30,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"5\":{\"id\":5,\"name\":\"Orthodontic_2\",\"price\":25,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"14\":{\"id\":14,\"name\":\"physio1\",\"price\":30,\"quantity\":1,\"attributes\":[],\"conditions\":[]}}', '85', '2020-04-28 20:21:34', '2020-04-28 20:21:34'),
(307, 1, '{\"14\":{\"id\":14,\"name\":\"physio1\",\"price\":30,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"5\":{\"id\":5,\"name\":\"Orthodontic_2\",\"price\":25,\"quantity\":1,\"attributes\":[],\"conditions\":[]}}', '55', '2020-04-28 20:22:53', '2020-04-28 20:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Baby_stroller1', 'Baby_stroller1 Description', 'Baby_stroller1.jpg', 4500, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(2, 1, 'cybex1', 'cybex1 description', 'cybex1.jpg', 2000, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(3, 1, 'yoyo1', 'yoyo1 description', 'yoyo1.jpg', 2500, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(4, 2, 'physio1', 'physio1 description', 'physio1.jpg', 30, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(5, 2, 'Orthodontic_2', 'Orthodontic_2 description', 'Orthodontic_2.jpg', 25, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(6, 3, 'mobile1', 'mobile1 description', 'mobile1.jpg', 250, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(7, 3, 'V_TEC', 'V_TEC descritpion', 'V_TEC.jpg', 200, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(10, 3, 'www', 'eeee', 'default.jpg', 12, '2020-02-23 13:15:01', '2020-02-23 13:15:01'),
(11, 1, 'Baby_stroller1', 'Baby_stroller1 Description', 'Baby_stroller1.jpg', 4500, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(12, 1, 'cybex1', 'cybex1 description', 'cybex1.jpg', 2000, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(13, 1, 'yoyo1', 'yoyo1 description', 'yoyo1.jpg', 2500, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(14, 2, 'physio1', 'physio1 description', 'physio1.jpg', 30, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(15, 2, 'Orthodontic_2', 'Orthodontic_2 description', 'Orthodontic_2.jpg', 25, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(16, 3, 'mobile1', 'mobile1 description', 'mobile1.jpg', 250, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(17, 3, 'V_TEC', 'V_TEC descritpion', 'V_TEC.jpg', 200, '2019-12-16 11:40:27', '2019-12-16 11:40:27'),
(18, 3, 'www', 'eeee', 'default.jpg', 12, '2020-02-23 13:15:01', '2020-02-23 13:15:01'),
(19, 4, 'Trampoline', 'trampoline swing', 'Trampoline Swing.jpg', 450, '2020-04-28 19:04:11', '2020-04-28 19:04:11'),
(20, 4, 'Trampoline circus', 'trampoline circus', 'trampoline circus.jpeg', 250, '2020-04-28 19:06:14', '2020-04-28 19:06:14'),
(21, 4, 'Trampoline sansa.jpg', 'trampoline sansa', 'Trampoline sansa.jpg', 650, '2020-04-28 19:22:21', '2020-04-28 19:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `publishes`
--

CREATE TABLE `publishes` (
  `id` int(11) NOT NULL,
  `WebPageName` varchar(255) NOT NULL,
  `AdvertisingName` varchar(255) NOT NULL,
  `AdvertisingFile` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishes`
--

INSERT INTO `publishes` (`id`, `WebPageName`, `AdvertisingName`, `AdvertisingFile`, `created_at`, `Updated_at`) VALUES
(1, 'aaa', 'ssss', '1584314458V_TEC.jpg', '2020-03-15 23:20:58', '2020-03-15 23:20:58'),
(2, 'sssss', 'aaaaaaa', '1584464301pacifier.jpg', '2020-03-17 16:58:21', '2020-03-17 16:58:21'),
(3, 'aaa', 'sss', '1584464318pacifier.jpg', '2020-03-17 16:58:38', '2020-03-17 16:58:38'),
(4, 'eee', 'aaaa', '1584464399V_TEC.jpg', '2020-03-17 16:59:59', '2020-03-17 16:59:59'),
(5, 'eee', 'aaaa', '1584464435V_TEC.jpg', '2020-03-17 17:00:35', '2020-03-17 17:00:35'),
(6, 'eee', 'aaaa', '1584464483V_TEC.jpg', '2020-03-17 17:01:23', '2020-03-17 17:01:23'),
(7, 'qqqq', 'sssss', '1584464589V_TEC.jpg', '2020-03-17 17:03:09', '2020-03-17 17:03:09'),
(8, 'qqqq', 'sssss', '1584464625V_TEC.jpg', '2020-03-17 17:03:45', '2020-03-17 17:03:45'),
(9, 'yyy', 'ssss', '1584464639V_TEC.jpg', '2020-03-17 17:03:59', '2020-03-17 17:03:59'),
(10, 'ooo', 'cccc', '1584464782pacifier.jpg', '2020-03-17 17:06:23', '2020-03-17 17:06:23'),
(11, 'ooo', 'cccc', '1584464793pacifier.jpg', '2020-03-17 17:06:33', '2020-03-17 17:06:33'),
(12, 'ccc', 'bbb', '1584464819pacifier.jpg', '2020-03-17 17:06:59', '2020-03-17 17:06:59'),
(13, 'ccc', 'bbb', '1584464840pacifier.jpg', '2020-03-17 17:07:20', '2020-03-17 17:07:20'),
(14, 'dd', 'ssss', '1584465124pacifier.jpg', '2020-03-17 17:12:04', '2020-03-17 17:12:04'),
(15, 'dd', 'ssss', '1584465196pacifier.jpg', '2020-03-17 17:13:16', '2020-03-17 17:13:16'),
(16, 'dd', 'ssss', '1584465622pacifier.jpg', '2020-03-17 17:20:22', '2020-03-17 17:20:22'),
(17, 'ttttt', 'eeee', '1584465667V_TEC.jpg', '2020-03-17 17:21:07', '2020-03-17 17:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `provider` varchar(191) DEFAULT NULL,
  `provider_id` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(1, 'asher matalon', 'asher@gmail.com', '$2y$10$GQGeaGPhA/bNdDXL/lWSrufFY0iKfGWQ3TNiMRmnSPyfRWbLiNwW2', 7, '2020-01-07 15:08:09', '2020-01-07 15:08:09', NULL, NULL),
(2, 'yair', 'yair@gmail.com', '$2y$10$RJUEd6bXeZeL0o4JZrSoDeh2eyj91PblO6bv2NGfMUM0QR4uv6EtC', 5, '2020-01-19 13:58:00', '2020-01-19 13:58:00', NULL, NULL),
(3, 'moshe', 'moshe@gmail.com', '$2y$10$rUvtJeD.z0/pY70dKbB5FuTXT7Y7wywk4PPpjwlmGuN12DRfpsFOe', 5, '2020-01-19 14:27:27', '2020-01-19 14:27:27', NULL, NULL),
(4, 'beni', 'beni@gmail.com', '$2y$10$tbqGaXpbVppOeYBqeQE9dubR2oe5/6e3KoP/7PrTXt2t6V/DphMhu', 5, '2020-01-19 14:30:15', '2020-01-19 14:30:15', NULL, NULL),
(7, 'david', 'david@gmail.com', '$2y$10$unbTz6o8gWNv1PPJuFsWueEs2dKLbbV8bl7rqrG.3PD/gJQGTMQYm', 5, '2020-03-09 20:01:22', '2020-03-09 20:01:22', NULL, NULL),
(15, 'Asher Matalon', 'asherm84@yahoo.com', '$2y$10$Z07ZCWIBL3NDE42PjfTmqupl.zt/k2pyqA3S/d7nRrAGkJXN/AG/K', 5, '2020-03-15 15:09:42', '2020-03-15 15:09:42', 'facebook', '10158037683043050');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishes`
--
ALTER TABLE `publishes`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `publishes`
--
ALTER TABLE `publishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
