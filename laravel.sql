-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 06:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
(1, '2017_11_08_231046_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1', 'App\\Notifications\\OrderNotification', 133, 'App\\User', '{"OrderId":1,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01752458644\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-15 17:39:49', '2017-11-10 22:00:23', '2017-11-15 17:39:49'),
('1', 'App\\Notifications\\OrderNotification', 6969, 'App\\User', '{"OrderId":1,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01752458644\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-15 17:39:49', '2017-11-10 22:00:23', '2017-11-15 17:39:49'),
('2', 'App\\Notifications\\OrderNotification', 133, 'App\\User', '{"OrderId":2,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01752458644\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-15 17:39:58', '2017-11-10 22:03:32', '2017-11-15 17:39:58'),
('2', 'App\\Notifications\\OrderNotification', 6969, 'App\\User', '{"OrderId":2,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01752458644\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-15 17:39:58', '2017-11-10 22:03:32', '2017-11-15 17:39:58'),
('3', 'App\\Notifications\\OrderNotification', 133, 'App\\User', '{"OrderId":3,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-11 00:27:33', '2017-11-11 00:17:17', '2017-11-11 00:27:33'),
('3', 'App\\Notifications\\OrderNotification', 6969, 'App\\User', '{"OrderId":3,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-11 00:27:33', '2017-11-11 00:17:17', '2017-11-11 00:27:33'),
('4', 'App\\Notifications\\OrderNotification', 133, 'App\\User', '{"OrderId":4,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-11 00:31:57', '2017-11-11 00:28:08', '2017-11-11 00:31:57'),
('4', 'App\\Notifications\\OrderNotification', 6969, 'App\\User', '{"OrderId":4,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:4:\\"1, 1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-11 00:31:57', '2017-11-11 00:28:08', '2017-11-11 00:31:57'),
('5', 'App\\Notifications\\OrderNotification', 1, 'App\\User', '{"OrderId":5,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:1:\\"1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-16 15:06:58', '2017-11-11 03:47:48', '2017-11-16 15:06:58'),
('6', 'App\\Notifications\\OrderNotification', 1, 'App\\User', '{"OrderId":6,"customer":"a:4:{s:4:\\"name\\";s:5:\\"Osman\\";s:5:\\"phone\\";s:11:\\"01716188429\\";s:7:\\"address\\";s:1:\\"1\\";s:5:\\"bkash\\";s:11:\\"01752458644\\";}"}', '2017-11-11 03:55:17', '2017-11-11 03:52:41', '2017-11-11 03:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `customer` text COLLATE utf8_unicode_ci NOT NULL,
  `orders` text COLLATE utf8_unicode_ci NOT NULL,
  `revenue` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not Delivered',
  `delivered_by` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `orders`, `revenue`, `status`, `delivered_by`, `date`, `delivery_date`) VALUES
(1, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01752458644";s:7:"address";s:4:"1, 1";s:5:"bkash";s:11:"01752458644";}', 'a:1:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}}', '380000', 'Delivered', NULL, '2017-11-11', '2017-11-11'),
(2, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01752458644";s:7:"address";s:4:"1, 1";s:5:"bkash";s:11:"01752458644";}', 'a:2:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}i:1;a:3:{s:2:"id";s:2:"12";s:4:"name";s:6:"yamaha";s:5:"price";s:6:"150000";}}', '330000', 'Delivered', NULL, '2017-11-11', '2017-11-11'),
(3, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01716188429";s:7:"address";s:4:"1, 1";s:5:"bkash";s:11:"01752458644";}', 'a:1:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}}', '380000', 'Delivered', NULL, '2017-11-11', '2017-11-11'),
(4, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01716188429";s:7:"address";s:4:"1, 1";s:5:"bkash";s:11:"01752458644";}', 'a:1:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}}', '380000', 'Delivered', 'osman', '2017-11-11', '2017-11-11'),
(5, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01716188429";s:7:"address";s:1:"1";s:5:"bkash";s:11:"01752458644";}', 'a:3:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}i:1;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}i:2;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}}', '1140000', 'Delivered', 'osman', '2017-11-11', '2017-11-16'),
(6, 'a:4:{s:4:"name";s:5:"Osman";s:5:"phone";s:11:"01716188429";s:7:"address";s:1:"1";s:5:"bkash";s:11:"01752458644";}', 'a:1:{i:0;a:3:{s:2:"id";s:2:"11";s:4:"name";s:3:"xyz";s:5:"price";s:6:"400000";}}', '380000', 'Delivered', 'osman', '2017-11-11', '2017-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bprice` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `catagory` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `bprice`, `price`, `model`, `catagory`, `quantity`) VALUES
(11, 'xyz', '20000', '400000', 'jmhg', 'guitar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `email`) VALUES
(1, 'osman', 'Aa*111', 'hassanmdosman@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
