-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2018 at 05:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boozeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `booze_types`
--

CREATE TABLE `booze_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booze_types`
--

INSERT INTO `booze_types` (`id`, `type`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Beer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at, commodi dicta fugit laudantium nesciunt nostrum odit perspiciatis, quas ratione saepe tenetur vel. Eum harum maiores tenetur velit. Incidunt, perferendis.', 'public/booze-types/udZtOfz2oy4ueBGHriRbCZIJ97zivLjQ7HKdBoEH.png', '2017-12-11 07:30:56', '2017-12-11 07:30:56'),
(2, 'Wine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at.', 'public/booze-types/12DJNplHNxb6no3MfVkpqqfVEHUB71x4PlShsqLv.png', '2017-12-12 06:02:41', '2017-12-12 06:02:41'),
(3, 'Champagne', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at.', 'public/booze-types/XmVHxvACMjkDh5Mow75iOhVKQZveAGyI8QLss3p7.png', '2017-12-12 06:02:53', '2017-12-12 06:02:54'),
(4, 'Rum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at.', 'public/booze-types/b5Och19fwU7xArRIuZDlM8lJ6kOQGaOXoFdRuYm8.png', '2017-12-12 06:03:04', '2017-12-12 06:03:04'),
(5, 'Tequilla', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at.', 'public/booze-types/ONvplmJPy1na73vvEB3E1R4uRyqhDRbrGzqXrJO1.png', '2017-12-12 06:03:17', '2017-12-12 06:03:17'),
(6, 'Vodka', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at.', 'public/booze-types/Kfh2BNmWIvp5BPcBgf2icrPQOgTPfnNk5vrEIVvM.png', '2017-12-12 06:03:28', '2017-12-12 06:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `bought` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `products_id`, `users_id`, `quantity`, `price`, `transaction_id`, `bought`, `created_at`, `updated_at`) VALUES
(22, 13, 5, 3, 666.00, NULL, 0, '2018-06-11 20:39:25', '2018-06-11 20:39:25'),
(24, 4, 5, 2, 200.00, NULL, 0, '2018-06-11 20:54:01', '2018-06-11 20:54:01'),
(26, 13, 5, 3, 666.00, NULL, 0, '2018-06-11 20:55:02', '2018-06-11 20:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'dasd', 'a@c.om', '32156497320', 'asd', '2017-11-21 09:09:17', '2017-11-21 09:09:17'),
(2, 'asd', 'as@asd.com', '32165498787', 'df', '2017-11-21 09:09:52', '2017-11-21 09:09:52'),
(3, 'asd', 'asd@cc.cc', '32165498798', 'sdsfd', '2017-11-21 09:10:53', '2017-11-21 09:10:53'),
(4, 'asd', 'asd@asd.com', '32165498787', 'asd', '2017-11-21 09:13:20', '2017-11-21 09:13:20'),
(5, 'test', 'asd@asc.com', '32165497122', 'asdasd', '2017-11-25 22:00:24', '2017-11-25 22:00:24'),
(6, 'asda', 'asda@asd.com', '12345678933', 'sdasd', '2017-11-25 22:02:11', '2017-11-25 22:02:11'),
(7, 'asda', 'asd@asdc.com', '12345678912', 'asdasd', '2017-11-25 22:03:18', '2017-11-25 22:03:18'),
(8, 'asdas', 'asd@asc.com', '32165498732', 'asdas', '2017-11-25 22:06:22', '2017-11-25 22:06:22'),
(9, 'asd', 'asd@asdc.com', '32165497121', 'ASDFG', '2017-11-25 22:07:53', '2017-11-25 22:07:53'),
(10, 'asd', 'asd@asdc.com', '32165497121', 'asd', '2017-11-25 22:08:44', '2017-11-25 22:08:44'),
(11, 'asd', 'asd@asdc.com', '32165497121', 'asd', '2017-11-25 22:09:04', '2017-11-25 22:09:04');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2017_11_19_085139_create_roles_table', 1),
(11, '2017_11_21_133959_create_contact_us_table', 2),
(29, '2017_12_09_070705_create_booze_types_table', 3),
(31, '2017_12_12_140642_create_news_table', 4),
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2017_11_19_085139_create_roles_table', 1),
(35, '2017_11_21_133959_create_contact_us_table', 1),
(37, '2017_12_09_070705_create_booze_types_table', 1),
(38, '2017_12_12_140642_create_news_table', 1),
(40, '2017_12_09_070420_create_products_table', 5),
(41, '2018_04_22_101507_create_product_ratings_table', 6),
(43, '2018_05_13_085804_create_carts_table', 7),
(45, '2018_06_07_132357_create_wishlists_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `booze_type_id` int(10) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `booze_type_id`, `title`, `subject`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(2, 1, 'test', 'testing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/NIONo2voDBx3Rvqa2xzFTD58FWRawPXmOnyzFb80.png', '2017-12-13 05:39:06', '2017-12-13 05:39:06'),
(3, 3, 'sdasdd', 'testsing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/pOOd6ascmEv8IDWbJj9xljDPzRSEEJw2IuOxTIzw.png', '2017-12-13 05:39:44', '2017-12-13 05:39:44'),
(4, 1, 'tesing', 'sdsdfasdfasd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/jJblCEhWYQv0qRITTUkCIH8CS48s6xTM7AJflD0S.png', '2017-12-13 05:40:07', '2017-12-13 05:40:07'),
(5, 1, 'asdf', 'fsdfasdfa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/kTWcyGY71uCPhKAHveR8vwoHAboA7gTMuiYOLkKK.png', '2017-12-13 05:40:24', '2017-12-13 05:40:24'),
(6, 1, 'test', 'testing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/NIONo2voDBx3Rvqa2xzFTD58FWRawPXmOnyzFb80.png', '2017-12-13 05:39:06', '2017-12-13 05:39:06'),
(7, 3, 'sdasdd', 'testsing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/pOOd6ascmEv8IDWbJj9xljDPzRSEEJw2IuOxTIzw.png', '2017-12-13 05:39:44', '2017-12-13 05:39:44'),
(8, 1, 'tesing', 'sdsdfasdfasd', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/jJblCEhWYQv0qRITTUkCIH8CS48s6xTM7AJflD0S.png', '2017-12-13 05:40:07', '2017-12-13 05:40:07'),
(9, 1, 'asdf', 'fsdfasdfa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis excepturi explicabo minus rem similique. Aperiam, asperiores, autem cupiditate magnam molestiae mollitia natus nemo nostrum provident quo saepe sapiente ullam unde.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias aspernatur assumenda beatae debitis deleniti dolor earum harum ipsa iste magni natus nemo praesentium quo sapiente, sequi vitae voluptate voluptates?', 'public/booze-types/kTWcyGY71uCPhKAHveR8vwoHAboA7gTMuiYOLkKK.png', '2017-12-13 05:40:24', '2017-12-13 05:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@boozeup.com', '$2y$10$gJ6Tm.nOTTJ9rqgfhsm0oOf/EcuFuKy2Z7TXOI7HTZk9GWorueFNC', '2017-11-23 07:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_name_id` int(10) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `booze_type_id` int(10) DEFAULT NULL,
  `photos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand_name`, `seller_name_id`, `price`, `description`, `booze_type_id`, `photos`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 'test item', 'test item', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 5, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(4, 'Item test 2', 'Item test 2', 5, 100.00, 'Item test 2\r\nItem test 2\r\nItem test 2\r\nItem test 2', 2, 'public/products/9lWblRwMd5weeIe6Z15jJOO2bu5P5oWRAf86yuyr.png', 3, '2018-04-22 02:08:18', '2018-04-22 02:08:18'),
(5, 'test item 3', 'test item 3', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 4, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(6, 'test item 4 ', 'test item 4 ', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 5, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(7, 'test item 5 ', 'test item 5', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 2, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(8, 'test item 6', 'test item 6', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 4, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(9, 'test item 7', 'test item 7', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 2, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(10, 'test item 8', 'test item 8', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 4, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(11, 'test item 9', 'test item 9', 5, 100.00, 'test item\r\ntest item\r\ntest item\r\ntest item', 1, 'public/products/RWt6goaPjfAsz19SqgULOpxXr9JlgEFZsPoJEmcQ.jpeg', 2, '2018-04-22 01:24:55', '2018-04-22 01:24:55'),
(13, 'testing', 'testing', 5, 222.00, 'testingtesting', 5, 'public/products/oOgQbilLcn9UGPgMFGGTsxLTdE1ogV4RmrJj7eBH.jpeg', 5, '2018-06-02 01:07:19', '2018-06-02 04:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_ratings`
--

INSERT INTO `product_ratings` (`id`, `products_id`, `user_id`, `rating`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 2.00, 'testing', 'testing rating relationship', NULL, NULL),
(2, 2, 5, 2.00, 'testing', 'testing rating relationship', NULL, NULL),
(3, 4, 5, 2.50, 'test', 'test', '2018-05-06 05:02:16', '2018-05-06 05:02:16'),
(4, 4, 5, 5.00, 'test2', 'test2', '2018-05-06 05:06:34', '2018-05-06 05:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL),
(3, 'seller', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subdivision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_recipient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_profile_complete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `shop_name`, `first_name`, `last_name`, `mobile_number`, `birth_date`, `gender`, `unit_floor`, `building`, `street`, `subdivision`, `barangay`, `city`, `province`, `zip`, `company_name`, `landmarks`, `authorized_recipient`, `is_profile_complete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@boozeup.com', '$2y$12$Nc5Fo1zrXvZpE3nVe4HTdOd4osS3FIng/k5e8TOB5TXJ2oJqtMSP6', 1, NULL, 'admin', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '033aDBriD2w6OL7TlFgdMVletbU5nOFdYdNOKPl1frUmemWgk2AgFetjUkL9', '2017-11-20 05:48:40', '2017-11-23 07:45:14'),
(4, 'user@boozeup.com', '$2y$12$Nc5Fo1zrXvZpE3nVe4HTdOd4osS3FIng/k5e8TOB5TXJ2oJqtMSP6', 2, NULL, 'user', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'E0YI1H7p8nlQgt0wzjar9ERpKR1odb7x0GiWWyXAd2PuOFITS01PW0t1eDYk', '2017-11-29 06:58:22', '2017-11-29 06:58:22'),
(5, 'seller@boozeup.com', '$2y$10$wKs169PaJcJ4ax.oKuHcleaMod3CrkT8ihV8kS223n/YAkfcDW/DW', 3, 'test shop', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', 1, '1', '1', '1', 0, 'RXbMBeQIEWcXmxufol191VpQL3KDm7etVcisX7JhYxK0tB3eFE0tNzLVZ5pZ', '2017-11-29 06:58:43', '2018-05-19 23:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `products_id`, `users_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(10, 5, 5, 3, 300.00, '2018-06-09 01:35:17', '2018-06-09 01:35:17'),
(11, 4, 5, 2, 200.00, '2018-06-09 02:08:27', '2018-06-09 02:08:27'),
(12, 13, 5, 3, 666.00, '2018-06-11 19:17:20', '2018-06-11 19:17:20'),
(13, 13, 5, 1, 222.00, '2018-06-11 20:54:54', '2018-06-11 20:54:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booze_types`
--
ALTER TABLE `booze_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booze_types_type_unique` (`type`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `booze_types`
--
ALTER TABLE `booze_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
