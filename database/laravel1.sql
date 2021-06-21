-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2021 at 04:07 PM
-- Server version: 8.0.18
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `loanapproved`
--

CREATE DATABASE laravelone;


CREATE TABLE `loanapproved` (
  `id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `paymentmode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'weekly',
  `paymentdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loanapproved`
--

INSERT INTO `loanapproved` (`id`, `confirmed`, `payment`, `paymentmode`, `paymentdate`) VALUES
(0, 1, NULL, 'weekly', NULL),
(1, 1, 105, 'Weekly', '2021-06-21'),
(2, 1, NULL, 'weekly', NULL),
(4, 1, 143, 'weekly', '2021-06-21'),
(5, 1, 123, 'weekly', '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `loantrackers`
--

CREATE TABLE `loantrackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `customername` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amountrequired` int(11) NOT NULL,
  `loanterm` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loantrackers`
--

INSERT INTO `loantrackers` (`id`, `uid`, `customername`, `amountrequired`, `loanterm`, `created_at`, `updated_at`) VALUES
(1, 1, 'harish', 100000, 1, '2021-06-20 13:11:07', NULL),
(69, 0, 'shiva', 100000, 1, '2021-06-21 09:54:41', NULL),
(71, 2, 'rajesh', 100000, 1, '2021-06-21 09:57:16', NULL),
(72, 4, 'lakshi', 100000, 1, '2021-06-21 10:03:39', NULL),
(76, 5, 'lakshi', 100000, 1, '2021-06-21 10:29:14', NULL);

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
(1, '2021_06_20_084616_create_loantrackers_table', 1),
(2, '2021_06_21_064817_loanapproved', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'harish', 'welcome', 'Harish@gmail.com'),
(2, 'rajesh', 'welcome', ''),
(3, 'hello', 'welcome', ''),
(4, 'lakshi', 'welcome', 'lakshi@gmail.com'),
(5, 'shiva', 'welcome', 'shiva@gmail.com'),
(6, 'maruti', 'welcome', 'maruti@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loanapproved`
--
ALTER TABLE `loanapproved`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `loantrackers`
--
ALTER TABLE `loantrackers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `loantrackers`
--
ALTER TABLE `loantrackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loanapproved`
--
ALTER TABLE `loanapproved`
  ADD CONSTRAINT `loanapproved_id_foreign` FOREIGN KEY (`id`) REFERENCES `loantrackers` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
