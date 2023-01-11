-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2022 at 01:51 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `root`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `categoryName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`, `description`) VALUES
(6005, 'Drink', 'Drink'),
(6002, 'Side Dishes 1', 'Particular food that is served at the same  time as the main dish. 1'),
(6003, 'new12', 'new12'),
(6004, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `custName` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custEmail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custTel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custPassword` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `custName`, `custEmail`, `custTel`, `address`, `custPassword`) VALUES
(1000, 'Aisyah Kamilah', 'aisya01@gmail.com', '0132154999', 'N0 30, Jalan 6/7D Seksyen 6 Bandar Rinching', 'aisya011'),
(1001, 'Kamarul', 'Kamaruloo@gmail.com', '0192228383', 'No 45, Jalan Sarjana Impian ', 'kamarulasmil099'),
(1002, 'Qutrin Auni', 'QutrinZarowi@gmail.com', '0133556688', ' Lot A, Subang Light Industrial Park, 47500 Subang Jaya ', 'qtrn099'),
(1003, 'Muhammad Arif Danial', 'ArrifDanial022@gmail.com', '0162348977', '3B 20 Jln Pandan 2/1 Taman Pandan Jaya', 'arifgemok099'),
(1004, 'Tan Yuee Nee', 'YueeNee@gmail.com', '0177895454', '42 Jalan Ss21/39 Damansara Utama', 'yuunee0909'),
(1005, 'Raju A/L Siva', 'rajuuuRJ@gmail.com', '0134224355', ' Jalan Mutiara Emas 7/5, Taman Mount Austin', 'rajusivaaa?1'),
(1006, 'tines1', 'tineskumar.p@gmail.com', '0103734062', '21321312322', '25d55ad283aa400af464c76d713c07ad'),
(1010, 'tines', 'tineskumar1.p@gmail.com', '0103734067', '2132131233', '25d55ad283aa400af464c76d713c07ad'),
(1011, 'tines', 'tineskumar2.p@gmail.com', '0103734067', '2132131233', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(5) NOT NULL,
  `deliveryStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateTime` datetime DEFAULT NULL,
  `staff_id` int(5) DEFAULT NULL,
  `order_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `deliveryStatus`, `dateTime`, `staff_id`, `order_id`) VALUES
(7000, 'delivered', '2022-10-09 13:45:02', 11001, 3000),
(7001, 'delivered', '2022-11-08 11:50:19', 11001, 3001),
(7002, 'delivered', '2022-11-04 15:00:00', 11002, 3002),
(7003, 'delivered', '2022-11-28 13:00:00', 11002, 3003),
(7004, 'pending', '2022-12-07 10:30:00', 11002, 3004),
(7005, 'pending', '2022-12-10 11:00:00', 11002, 3005);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(5) NOT NULL,
  `departmentName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `departmentName`, `location`, `restaurant_id`) VALUES
(8000, 'Management', 'Bangi', 13000),
(8001, 'Rider', 'Petaling Jaya', 13003),
(8002, 'Superviser', 'Putrajaya', 13002);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(5) NOT NULL,
  `itemName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitPrice` double NOT NULL,
  `itemStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `itemName`, `unitPrice`, `itemStatus`, `image`, `category_id`, `staff_id`) VALUES
(4001, 'Chicken Grill', 11, 'Available', '/images/cg.jpg', 6000, 11001),
(4002, 'Orange Juice', 7, 'Available', '/images/orange juice.jpg', 6001, 11000),
(4003, 'Iced Latte1', 15, 'Available', '', 6005, 11000),
(4004, 'Garlic Bread', 3, 'Available', '/images/gb.jpg', 6002, 11000),
(4005, 'French Fries', 7, 'Available', '/images/herbal extract capsule copy-1920x900.jpg', 6002, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `orderDate` datetime NOT NULL,
  `amount` decimal(4,2) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `total` decimal(4,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `orderStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `orderDate`, `amount`, `discount`, `total`, `qty`, `orderStatus`, `customer_id`) VALUES
(3000, '2022-11-09 00:00:00', '22.00', '0.00', '0.00', 0, 'successful', 1000),
(3001, '2022-11-08 00:00:00', '11.00', '0.00', '0.00', 0, 'successful', 1002),
(3002, '2022-11-04 00:00:00', '22.00', '0.00', '0.00', 0, 'successful', 1005),
(3003, '2022-10-28 00:00:00', '11.00', '0.00', '0.00', 0, 'successful', 1003),
(3004, '2022-11-07 00:00:00', '6.00', '0.00', '0.00', 0, 'successful', 1004),
(3005, '2022-11-07 00:00:00', '12.00', '0.00', '0.00', 0, 'successful', 1001),
(3006, '2022-12-21 19:08:51', '54.00', '0.00', '0.00', 5, 'Pandding', 1006),
(3007, '2022-12-21 19:14:10', '54.00', '0.00', '0.00', 5, 'Pandding', 1006),
(3008, '2022-12-21 19:15:08', '54.00', '0.00', '0.00', 5, 'Pandding', 1006),
(3009, '2022-12-21 20:16:39', '65.00', '0.00', '0.00', 6, 'Pandding', 1006),
(3010, '2022-12-21 20:24:13', '65.00', '0.00', '0.00', 6, 'Pandding', 1006),
(3011, '2022-12-22 20:43:49', '64.00', '0.00', '0.00', 11, 'Pandding', 0),
(3012, '2022-12-22 20:44:17', '64.00', '0.00', '0.00', 11, 'Pandding', 0),
(3013, '2022-12-22 20:44:53', '64.00', '0.00', '0.00', 11, 'Pandding', 0),
(3014, '2022-12-22 20:45:21', '64.00', '0.00', '0.00', 11, 'Pandding', 0),
(3015, '2022-12-23 18:00:25', '14.00', '0.00', '0.00', 1, 'Pandding', 1006),
(3016, '2022-12-26 21:15:44', '14.00', '0.00', '0.00', 2, 'Pandding', 1006),
(3017, '2022-12-26 21:16:41', '14.00', '0.00', '0.00', 1, 'Pandding', 1006),
(3018, '2022-12-26 21:23:30', '18.00', '0.00', '0.00', 2, 'Pandding', 1006),
(3019, '2022-12-26 21:31:46', '24.00', '0.00', '0.00', 4, 'Pandding', 1006),
(3020, '2022-12-26 21:32:50', '24.00', '0.00', '0.00', 4, 'Pandding', 1006),
(3021, '2022-12-26 21:33:34', '43.00', '0.00', '0.00', 4, 'Pandding', 1006),
(3022, '2022-12-26 21:34:27', '43.00', '0.00', '0.00', 4, 'Pandding', 1006),
(3023, '2022-12-27 08:28:29', '25.00', '0.00', '0.00', 3, 'Pandding', 1006),
(3024, '2022-12-27 10:32:46', '41.00', '0.00', '0.00', 6, 'Pandding', 1006),
(3025, '2022-12-27 13:43:36', '18.00', '1.80', '16.20', 2, 'Pandding', 1006),
(3026, '2022-12-27 13:45:09', '18.00', '1.80', '16.20', 2, 'Pandding', 1006),
(3027, '2022-12-27 13:45:30', '18.00', '1.80', '16.20', 2, 'Pandding', 1006),
(3028, '2022-12-27 13:46:17', '18.00', '1.80', '16.20', 2, 'Pandding', 1006),
(3029, '2022-12-27 13:47:22', '62.00', '6.20', '55.80', 6, 'Pandding', 1006),
(3030, '2022-12-27 13:47:49', '62.00', '6.20', '55.80', 6, 'Pandding', 1006),
(3031, '2022-12-27 13:48:21', '62.00', '6.20', '55.80', 6, 'Pandding', 1006),
(3032, '2022-12-27 13:48:40', '33.00', '3.30', '29.70', 3, 'Pandding', 1006);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(5) NOT NULL,
  `item_id` int(5) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `O_Remark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `item_id`, `name`, `quantity`, `price`, `O_Remark`) VALUES
(3000, 4000, '', 2, '0.00', '-'),
(3020, 4002, 'Orange Juice', 1, '0.00', ''),
(3002, 4002, '', 2, '0.00', '-'),
(3003, 4003, '', 1, '0.00', '-'),
(3004, 4004, '', 2, '0.00', '-'),
(3005, 4005, '', 3, '0.00', '-'),
(3008, 4002, '', 1, '0.00', ''),
(3008, 4001, '', 2, '0.00', ''),
(3008, 4000, '', 1, '0.00', ''),
(3008, 4003, '', 1, '0.00', ''),
(3009, 4000, '', 3, '0.00', ''),
(3009, 4001, '', 1, '0.00', ''),
(3009, 4002, '', 1, '0.00', ''),
(3009, 4003, '', 1, '0.00', ''),
(3010, 4000, '', 3, '0.00', ''),
(3010, 4001, '', 1, '0.00', ''),
(3010, 4002, '', 1, '0.00', ''),
(3010, 4003, '', 1, '0.00', ''),
(3011, 4001, '', 2, '0.00', ''),
(3011, 4000, '', 1, '0.00', ''),
(3011, 4002, '', 1, '0.00', ''),
(3011, 4004, '', 4, '0.00', ''),
(3011, 4005, '', 3, '0.00', ''),
(3012, 4001, '', 2, '0.00', ''),
(3012, 4000, '', 1, '0.00', ''),
(3012, 4002, '', 1, '0.00', ''),
(3012, 4004, '', 4, '0.00', ''),
(3012, 4005, '', 3, '0.00', ''),
(3013, 4001, '', 2, '0.00', ''),
(3013, 4000, '', 1, '0.00', ''),
(3013, 4002, '', 1, '0.00', ''),
(3013, 4004, '', 4, '0.00', ''),
(3013, 4005, '', 3, '0.00', ''),
(3014, 4001, '', 2, '0.00', ''),
(3014, 4000, '', 1, '0.00', ''),
(3014, 4002, '', 1, '0.00', ''),
(3014, 4004, '', 4, '0.00', ''),
(3014, 4005, '', 3, '0.00', ''),
(3015, 4003, '', 1, '0.00', ''),
(3016, 4004, '', 1, '0.00', ''),
(3016, 4001, '', 1, '0.00', ''),
(3017, 4003, '', 1, '0.00', ''),
(3018, 4003, 'Iced Latte', 1, '0.00', ''),
(3018, 4005, 'French Fries', 1, '0.00', ''),
(3020, 4001, 'Chicken Grill', 1, '0.00', ''),
(3020, 4004, 'Garlic Bread', 2, '0.00', ''),
(3021, 4003, 'Iced Latte', 1, '0.00', ''),
(3021, 4002, 'Orange Juice', 1, '0.00', ''),
(3021, 4001, 'Chicken Grill', 2, '0.00', ''),
(3022, 4002, 'Orange Juice', 1, '7.00', ''),
(3022, 4003, 'Iced Latte', 1, '14.00', ''),
(3022, 4001, 'Chicken Grill', 2, '11.00', ''),
(3023, 4002, 'Orange Juice', 1, '7.00', ''),
(3023, 4003, 'Iced Latte', 1, '14.00', ''),
(3023, 4005, 'French Fries', 1, '4.00', ''),
(3024, 4001, 'Chicken Grill', 2, '11.00', ''),
(3024, 4002, 'Orange Juice', 1, '7.00', ''),
(3024, 4005, 'French Fries', 3, '4.00', ''),
(3025, 4001, 'Chicken Grill', 1, '11.00', ''),
(3025, 4002, 'Orange Juice', 1, '7.00', ''),
(3026, 4001, 'Chicken Grill', 1, '11.00', ''),
(3026, 4002, 'Orange Juice', 1, '7.00', ''),
(3027, 4001, 'Chicken Grill', 1, '11.00', ''),
(3027, 4002, 'Orange Juice', 1, '7.00', ''),
(3028, 4001, 'Chicken Grill', 1, '11.00', ''),
(3028, 4002, 'Orange Juice', 1, '7.00', ''),
(3029, 4001, 'Chicken Grill', 3, '11.00', ''),
(3029, 4002, 'Orange Juice', 2, '7.00', ''),
(3030, 4001, 'Chicken Grill', 3, '11.00', ''),
(3030, 4002, 'Orange Juice', 2, '7.00', ''),
(3032, 4001, 'Chicken Grill', 1, '11.00', ''),
(3032, 4002, 'Orange Juice', 1, '7.00', ''),
(3032, 4003, 'Iced Latte1', 1, '15.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(5) NOT NULL,
  `totalAmount` double NOT NULL,
  `paymentDate` date NOT NULL,
  `payMethod` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_no` int(5) NOT NULL,
  `order_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `totalAmount`, `paymentDate`, `payMethod`, `voucher_no`, `order_id`) VALUES
(5000, 22, '2022-11-09', 'cash', 15000, 3000),
(5001, 11, '2022-11-08', 'cash', 15000, 3002),
(5002, 22, '2022-11-04', 'online banking', 15000, 3001),
(5003, 11, '2022-10-28', 'online banking', 15000, 3003),
(5004, 6, '2022-11-07', 'online banking', 15000, 3004),
(5005, 12, '2022-11-07', 'cash', 15000, 3005);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(5) NOT NULL,
  `score` double NOT NULL,
  `R_remark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `score`, `R_remark`, `order_id`) VALUES
(14000, 50, 'NO SAUCE', 3002),
(14001, 60, 'More beef', 3003),
(14002, 1, '', 3023),
(14003, 5, 'adasdasdasdasd', 3023),
(14004, 5, 'weqweqwewqeqwe', 3023),
(14005, 5, 'asdasdada', 3023),
(14006, 5, 'asdasdada', 3023),
(14007, 5, 'asdasdada', 3023),
(14008, 5, 'asdasdada', 3023),
(14009, 5, 'asdasdada', 3023),
(14010, 5, 'asdasdada', 3023),
(14011, 3, ' testngtestngtestngtestngtestngtestng', 3024);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(5) NOT NULL,
  `restaurantName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurantLocation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurantEmail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurantTel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurantName`, `restaurantLocation`, `restaurantEmail`, `restaurantTel`) VALUES
(13000, 'Restaurant FK Bangi', 'Bangi', 'RestaurantFKBangi@gmail.com', '03-37899876'),
(13001, 'Restaurant FK Delici', 'Shah Alam', 'RestaurantFKDel@gmail.com', '03-37899875'),
(13002, 'Restaurant FK Putraj', 'Putrajaya', 'RestaurantFKPutrajaya@gmail.co', '03-37899873'),
(13003, 'Restaurant FK Petali', 'Petaling Jaya', 'RestaurantFKPetaling@gmail.com', '03-37899872');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(5) NOT NULL,
  `staffName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffEmail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffPassword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(5) DEFAULT NULL,
  `department_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staffName`, `staffEmail`, `staffType`, `staffPassword`, `admin_id`, `department_id`) VALUES
(11000, 'Syazwina Ali', 'syazwinaAli@gmail.com', 'Admin', 'syawina01', NULL, 8000),
(11001, 'Amirul Frirdaus', 'AmirulFIR@gmail.com', 'Rider', 'amirulpoo23', 11000, 8001),
(11002, 'Osama Hakim', 'osama0191@gmail.com', 'Rider', 'osama019111', 11000, 8001),
(11003, 'NorLaila Binti Affen', 'norlaila902@gmail.com', 'Manager', 'Laila800lai', 11000, 8000),
(11004, 'Aleea Aleesya Qistin', 'qisss98@gmail.com', 'Manager', 'qissyuuuii', 11000, 8000),
(11005, 'Aniq Mirza', 'aniqqq34@gmail.com', 'Manager', 'AniqqMirza344', 11000, 8000),
(11007, 'tines', 'tineskumar.p@gmail.com', 'Manager', '25d55ad283aa400af464c76d713c07ad', 11000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_no` int(5) NOT NULL,
  `v_Description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_no`, `v_Description`, `discount`, `code`) VALUES
(15000, 'BIGDEAL', 10, 'DIS2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `DELIVREY_STAFF_FK` (`staff_id`),
  ADD KEY `DELIVREY_ORDER_FK` (`order_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `DEPARTMENT_FK` (`restaurant_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `ITEM_CATEGORY_FK` (`category_id`),
  ADD KEY `ITEM_STAFF_FK` (`staff_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ORDER_FK` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `ORDER_DETAIL_ITEM_FK` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PAYMENT_VOUCHER_FK` (`voucher_no`),
  ADD KEY `PAYMENT_ORDER_FK` (`order_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `RATING_FK` (`order_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `STAFF_ADMIN_FK` (`admin_id`),
  ADD KEY `STAFF_DEPARTMENT_FK` (`department_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6006;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7006;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8003;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4012;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3033;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5006;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14012;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13004;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11008;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
