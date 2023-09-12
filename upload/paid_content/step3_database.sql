-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 08:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociopro`
--

-- --------------------------------------------------------

--
-- Table structure for table `paid_content_creators`
--

CREATE TABLE `paid_content_creators` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `social_accounts` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `config_setting` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_content_packages`
--

CREATE TABLE `paid_content_packages` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_content_payouts`
--

CREATE TABLE `paid_content_payouts` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `requested_amount` int(255) DEFAULT NULL,
  `issue_date` datetime DEFAULT current_timestamp(),
  `received_date` datetime DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paid_content_subscriptions`
--

CREATE TABLE `paid_content_subscriptions` (
  `id` int(255) NOT NULL,
  `subscriber_id` int(255) DEFAULT NULL,
  `creator_id` int(255) DEFAULT NULL,
  `package_id` int(255) DEFAULT NULL,
  `issue_date` int(255) DEFAULT NULL,
  `expire_date` int(255) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `admin_commission` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paid_content_creators`
--
ALTER TABLE `paid_content_creators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_content_packages`
--
ALTER TABLE `paid_content_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_content_payouts`
--
ALTER TABLE `paid_content_payouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_content_subscriptions`
--
ALTER TABLE `paid_content_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paid_content_creators`
--
ALTER TABLE `paid_content_creators`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_content_packages`
--
ALTER TABLE `paid_content_packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_content_payouts`
--
ALTER TABLE `paid_content_payouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_content_subscriptions`
--
ALTER TABLE `paid_content_subscriptions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
