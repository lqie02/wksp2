-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 03:00 PM
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
-- Database: `sample wksp`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(5) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `unitPrice` double NOT NULL,
  `itemStatus` varchar(20) NOT NULL,
  `image` text DEFAULT NULL,
  `category_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `itemName`, `unitPrice`, `itemStatus`, `image`, `category_id`, `staff_id`) VALUES
(4001, 'Grill Chicken Chop', 11, 'Available', '/images/chg.png', 6000, 11001),
(4002, 'Orange Juice', 7, 'Available', '/images/orange.jpg', 6005, 11000),
(4003, 'Iced Latte', 9, 'Available', '/images/icedlatte.jpg', 6005, 11000),
(4004, 'Garlic Bread', 3, 'Available', '/images/gb.jpg', 6002, 11000),
(4005, 'French Fries', 7, 'Available', '/images/frieslo.png\r\n', 6002, 11000),
(4006, 'Iced Choclate', 7.8, 'Available', '/images/ichoclate.jpg', 6005, 11000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `ITEM_CATEGORY_FK` (`category_id`),
  ADD KEY `ITEM_STAFF_FK` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
