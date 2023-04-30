-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 08:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `image`, `body`, `publish_date`, `user_id`) VALUES
(1, 'Programming', 'This article explain how to start programming', '1.jpg', 'LLLLLLLLLLLLLlThis article explain how to start programmingThis article explain how to start programmingThis article explain how to start programmingThis article explain how to start programmingThis article explain how to start programmingThis article explain how to start programmingThis article explain how to start programming', '2023-04-13 00:11:59', 1),
(2, 'Php', 'this article explains how to start php', '2.jpg', 'phphphphpthis article explains how to start phpthis article explains how to start phpthis article explains how to start phpthis article explains how to start phpthis article explains how to start phpthis article explains how to start php', '2023-04-13 00:12:19', 2),
(3, 'Java', 'This article explains how to be a master in java', '3.jpg', 'HEllooooThis article explains how to be a master in javaThis article explains how to be a master in javaThis article explains how to be a master in javaThis article explains how to be a master in javaThis article explains how to be a master in javaThis article explains how to be a master in java', '2023-04-13 00:12:25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `icon`, `name`, `description`) VALUES
(1, '4.jpg', 'Admins', 'This is a group form admins only'),
(2, '5.jpg', 'Editors', 'This is a group for editors only'),
(3, '6.jpg', 'Group3', 'This is Group3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `type` enum('user','admin','editor') NOT NULL DEFAULT 'user',
  `group_subscription_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_visit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_number`, `password`, `username`, `group_id`, `type`, `group_subscription_date`, `last_visit`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', '0123456789', '123456', 'Ahmed99', 1, 'admin', '2023-04-25 16:36:12', NULL),
(2, 'Samar', 'samar@gmail.com', '0123456788', '123456', 'Samar99', 2, 'editor', '2023-04-25 16:36:12', NULL),
(3, 'Raneen', 'raneen@gmail.com', '0123456787', '123456', '123456', 3, 'user', '2023-04-28 15:51:01', 'April 28, 2023, 5:51 pm'),
(5, 'samir', 'samir@samir.com', '0123456789', '123456', 'samir99', 1, 'admin', '2023-04-25 16:39:23', NULL),
(6, 'AhmedSamir', 'ahmeed1999@yahoo.com', '0123456789', '123456', 'AhmedSamir99', 1, 'admin', '2023-04-25 18:16:00', NULL),
(11, 'wafaa', 'wafaa@gmail.com', '0123456789', '123456', 'wafaa2000', 3, 'user', '2023-04-28 18:57:00', 'April 28, 2023, 8:57 pm'),
(12, 'laylaaa', 'layla@gmail.com', '0123456789', '123456', 'layla99', 3, 'user', '2023-04-28 16:09:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
