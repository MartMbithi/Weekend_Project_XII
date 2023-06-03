-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2023 at 02:28 PM
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
-- Database: `efurniture_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(200) NOT NULL,
  `admin_login_id` int(200) NOT NULL,
  `admin_first_name` varchar(200) NOT NULL,
  `admin_last_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_phone_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(200) NOT NULL,
  `customer_login_id` int(200) NOT NULL,
  `customer_first_name` varchar(200) NOT NULL,
  `customer_last_name` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_phone_number` varchar(200) NOT NULL,
  `customer_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `furniture_id` int(200) NOT NULL,
  `furniture_seller_id` int(200) NOT NULL,
  `furniture_category_id` int(200) NOT NULL,
  `furniture_sku_code` varchar(200) NOT NULL,
  `furniture_name` varchar(200) NOT NULL,
  `furniture_description` longtext NOT NULL,
  `furniture_status` varchar(200) NOT NULL,
  `furniture_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `furniture_category`
--

CREATE TABLE `furniture_category` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `furniture_images`
--

CREATE TABLE `furniture_images` (
  `furniture_image_id` int(200) NOT NULL,
  `furniture_image_furniture_id` int(200) NOT NULL,
  `furniture_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `furniture_seller`
--

CREATE TABLE `furniture_seller` (
  `seller_id` int(200) NOT NULL,
  `seller_login_id` int(200) NOT NULL,
  `seller_first_name` varchar(200) NOT NULL,
  `seller_last_name` varchar(200) NOT NULL,
  `seller_email` varchar(200) NOT NULL,
  `seller_phone_number` varchar(200) NOT NULL,
  `seller_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(200) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(200) NOT NULL,
  `order_customer_id` int(200) NOT NULL,
  `order_furniture_id` int(200) NOT NULL,
  `order_ref_code` varchar(200) NOT NULL,
  `order_qty` varchar(200) NOT NULL,
  `order_amount` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `order_delivery_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `order_estimated_delivery_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(200) NOT NULL,
  `payment_order_id` int(200) NOT NULL,
  `payment_means` varchar(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `payment_ref_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `AdminLogin` (`admin_login_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `CustomerLoginID` (`customer_login_id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`furniture_id`),
  ADD KEY `FurnitureSellerID` (`furniture_seller_id`),
  ADD KEY `FurnitureCategory` (`furniture_category_id`);

--
-- Indexes for table `furniture_category`
--
ALTER TABLE `furniture_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `furniture_images`
--
ALTER TABLE `furniture_images`
  ADD PRIMARY KEY (`furniture_image_id`),
  ADD KEY `FurnitureImage` (`furniture_image_furniture_id`);

--
-- Indexes for table `furniture_seller`
--
ALTER TABLE `furniture_seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `SellerLoginID` (`seller_login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `OrderCustomerID` (`order_customer_id`),
  ADD KEY `OrderFurnitureID` (`order_furniture_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PaymentOrderID` (`payment_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `furniture_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture_category`
--
ALTER TABLE `furniture_category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture_images`
--
ALTER TABLE `furniture_images`
  MODIFY `furniture_image_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `furniture_seller`
--
ALTER TABLE `furniture_seller`
  MODIFY `seller_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `AdminLogin` FOREIGN KEY (`admin_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `CustomerLoginID` FOREIGN KEY (`customer_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `FurnitureCategory` FOREIGN KEY (`furniture_category_id`) REFERENCES `furniture_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FurnitureSellerID` FOREIGN KEY (`furniture_seller_id`) REFERENCES `furniture` (`furniture_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture_images`
--
ALTER TABLE `furniture_images`
  ADD CONSTRAINT `FurnitureImage` FOREIGN KEY (`furniture_image_furniture_id`) REFERENCES `furniture` (`furniture_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture_seller`
--
ALTER TABLE `furniture_seller`
  ADD CONSTRAINT `SellerLoginID` FOREIGN KEY (`seller_login_id`) REFERENCES `furniture_seller` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `OrderCustomerID` FOREIGN KEY (`order_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OrderFurnitureID` FOREIGN KEY (`order_furniture_id`) REFERENCES `furniture` (`furniture_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PaymentOrderID` FOREIGN KEY (`payment_order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
