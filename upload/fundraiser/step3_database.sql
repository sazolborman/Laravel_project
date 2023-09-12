-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 08:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sociopro1.5`
--

-- --------------------------------------------------------

--
-- Table structure for table `fundraisers`
--

CREATE TABLE `fundraisers` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `goal_amount` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `timestamp_end` timestamp NULL DEFAULT NULL,
  `raised_amount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `share` int(11) DEFAULT NULL,
  `invited` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser_categories`
--

CREATE TABLE `fundraiser_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundraiser_categories`
--

INSERT INTO `fundraiser_categories` (`id`, `name`, `image`, `create_at`) VALUES
(1, 'Popular', '', '2023-08-03 07:11:07'),
(2, 'Animals', '', '2023-08-03 07:11:32'),
(3, 'Arts and Culture', '', '2023-08-03 07:11:54'),
(4, 'Business', '', '2023-08-03 07:12:11'),
(5, 'Community & social action', '', '2023-08-03 07:12:32'),
(6, 'Crisis relief', '', '2023-08-03 07:12:50'),
(7, 'Education', '', '2023-08-03 07:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser_donations`
--

CREATE TABLE `fundraiser_donations` (
  `id` int(11) NOT NULL,
  `fundraiser_id` int(11) DEFAULT NULL,
  `doner_id` int(11) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_getway` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser_payouts`
--

CREATE TABLE `fundraiser_payouts` (
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fundraisers`
--
ALTER TABLE `fundraisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraiser_categories`
--
ALTER TABLE `fundraiser_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraiser_donations`
--
ALTER TABLE `fundraiser_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraiser_payouts`
--
ALTER TABLE `fundraiser_payouts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fundraisers`
--
ALTER TABLE `fundraisers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundraiser_categories`
--
ALTER TABLE `fundraiser_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fundraiser_donations`
--
ALTER TABLE `fundraiser_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundraiser_payouts`
--
ALTER TABLE `fundraiser_payouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
