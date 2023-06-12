-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2023 at 02:51 PM
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

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_login_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_phone_number`) VALUES
(1, 5, 'Martin ', 'Mbithi', 'syadmin@gmail.com', '070504238923');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_login_id`, `customer_first_name`, `customer_last_name`, `customer_email`, `customer_phone_number`, `customer_address`) VALUES
(2, 2, 'James', 'Doe', 'jamesdoe12@gmail.com', '0704031263', '120 - 001 Localhost'),
(3, 8, 'James', 'Hillson', 'jameshill90@gmail.com', '070403126356', '78 NYC - Lakeview');

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

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`furniture_id`, `furniture_seller_id`, `furniture_category_id`, `furniture_sku_code`, `furniture_name`, `furniture_description`, `furniture_status`, `furniture_price`) VALUES
(11, 2, 1, '5R8B7', 'Coffee Table', 'File upload in PHP is the most used functionality for the web application. A single file or multiple files can be easily uploaded using PHP. PHP provides a quick and simple way to implement server-side file upload functionality. Generally, in the web application, the file is uploaded to the server and the file name is stored in the database. Later the files are retrieved from the server based on the file name stored in the database.', 'Available', '4500'),
(13, 2, 1, '0S2FY', 'Dinner Table', 'File upload in PHP is the most used functionality for the web application. A single file or multiple files can be easily uploaded using PHP. PHP provides a quick and simple way to implement server-side file upload functionality. Generally, in the web application, the file is uploaded to the server and the file name is stored in the database. Later the files are retrieved from the server based on the file name stored in the database.', 'Out of stock', '15000'),
(14, 4, 1, '1R7S9', 'Custom Table', 'File upload in PHP is the most used functionality for the web application. A single file or multiple files can be easily uploaded using PHP. PHP provides a quick and simple way to implement server-side file upload functionality. Generally, in the web application, the file is uploaded to the server and the file name is stored in the database. Later the files are retrieved from the server based on the file name stored in the database.', 'Available', '5500');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_category`
--

CREATE TABLE `furniture_category` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `furniture_category`
--

INSERT INTO `furniture_category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Tables', 'Tables - Custom, refurbished tables.'),
(3, 'Sofas', 'Sofas - Custom refurbished chairs.');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_images`
--

CREATE TABLE `furniture_images` (
  `furniture_image_id` int(200) NOT NULL,
  `furniture_image_furniture_id` int(200) NOT NULL,
  `furniture_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `furniture_images`
--

INSERT INTO `furniture_images` (`furniture_image_id`, `furniture_image_furniture_id`, `furniture_image`) VALUES
(31, 11, '5R8B7Devlan 007.jpg'),
(32, 11, '5R8B7Devlan 007 (copy).jpg'),
(33, 11, '5R8B7Devlan 008.jpg'),
(34, 11, '5R8B7Devlan 008 (copy).jpg'),
(35, 11, '5R8B7Devlan 009.jpg'),
(36, 11, '5R8B7Firefox_wallpaper (copy).png'),
(43, 13, '0S2FY Firefox_wallpaper (copy).png'),
(44, 14, '1R7S9 about-us-gallery-4.jpg'),
(45, 14, '1R7S9 about-us-gallery-5.jpg');

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

--
-- Dumping data for table `furniture_seller`
--

INSERT INTO `furniture_seller` (`seller_id`, `seller_login_id`, `seller_first_name`, `seller_last_name`, `seller_email`, `seller_phone_number`, `seller_address`) VALUES
(2, 4, 'Jane', 'Doe', 'janedoe@gmail.com', '068832732', '209 Localhost drive'),
(4, 10, 'Hillary G', 'Monroe', 'monroehill90@gmail.com', '8877842399', '129 Localhost Drive');

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

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`) VALUES
(2, 'jamesdoe12@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Customer'),
(4, 'janedoe@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Seller'),
(5, 'systemadmin@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Admin'),
(8, 'jameshill90@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Customer'),
(10, 'monroehill90@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Seller');

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
  `order_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `order_date` varchar(200) NOT NULL,
  `order_delivery_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `order_estimated_delivery_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_customer_id`, `order_furniture_id`, `order_ref_code`, `order_qty`, `order_amount`, `order_status`, `order_date`, `order_delivery_status`, `order_estimated_delivery_date`) VALUES
(1, 2, 11, 'ORD-QYLEKU', '3', '13500', 'Paid', '10 Jun 2023', 'On Transit', '2023-06-24'),
(2, 3, 11, 'ORD-3K2EIN', '4', '18000', 'Paid', '10 Jun 2023', 'On Transit', '2023-07-08'),
(3, 3, 11, 'ORD-0EO5HP', '3', '13500', 'Paid', '11 Jun 2023', 'Pending', '18 Jun 2023');

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
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_order_id`, `payment_means`, `payment_amount`, `payment_date`, `payment_ref_code`) VALUES
(5, 2, 'Cash on delivery', '18000', '10 Jun 2023', '0AP21SOWQI'),
(6, 1, 'Debit / Credit card', '13500', '10 Jun 2023', 'HLU0BVC721'),
(7, 3, 'Cash on delivery', '13500', '11 Jun 2023', 'VZ184GKL26');

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
  ADD KEY `FurnitureCategory` (`furniture_category_id`),
  ADD KEY `FurnitureSellerID` (`furniture_seller_id`);

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
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `furniture_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `furniture_category`
--
ALTER TABLE `furniture_category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `furniture_images`
--
ALTER TABLE `furniture_images`
  MODIFY `furniture_image_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `furniture_seller`
--
ALTER TABLE `furniture_seller`
  MODIFY `seller_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `FurnitureSellerID` FOREIGN KEY (`furniture_seller_id`) REFERENCES `furniture_seller` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture_images`
--
ALTER TABLE `furniture_images`
  ADD CONSTRAINT `FurnitureImage` FOREIGN KEY (`furniture_image_furniture_id`) REFERENCES `furniture` (`furniture_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `furniture_seller`
--
ALTER TABLE `furniture_seller`
  ADD CONSTRAINT `SellerLoginID` FOREIGN KEY (`seller_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
