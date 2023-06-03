-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 05:12 AM
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
-- Database: `blood_donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `bank_id` int(200) NOT NULL,
  `bank_officer_id` int(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_location` longtext NOT NULL,
  `bank_blood_qty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`bank_id`, `bank_officer_id`, `bank_name`, `bank_location`, `bank_blood_qty`) VALUES
(1, 3, 'Red Cross Machakos', 'Machakos Level 5 Hospital', '45000'),
(2, 1, 'Red Cross Makueni', 'Wote Level 4 Hospital', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation`
--

CREATE TABLE `blood_donation` (
  `donation_id` int(200) NOT NULL,
  `donation_blood_donor_id` int(200) NOT NULL,
  `donation_ref` varchar(200) NOT NULL,
  `donation_bank_id` int(200) NOT NULL,
  `donation_date_time` varchar(200) NOT NULL,
  `donation_blood_amount` varchar(200) NOT NULL,
  `donation_blood_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donation`
--

INSERT INTO `blood_donation` (`donation_id`, `donation_blood_donor_id`, `donation_ref`, `donation_bank_id`, `donation_date_time`, `donation_blood_amount`, `donation_blood_status`) VALUES
(3, 1, '2CFH8', 1, '2023-05-22', '2000', 'Healthy');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `blood_donor_id` int(200) NOT NULL,
  `blood_donor_login_id` int(200) NOT NULL,
  `blood_donor_names` varchar(200) NOT NULL,
  `blood_donor_email` varchar(200) NOT NULL,
  `blood_donor_contacts` varchar(200) NOT NULL,
  `blood_donor_address` longtext NOT NULL,
  `blood_donor_blood_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`blood_donor_id`, `blood_donor_login_id`, `blood_donor_names`, `blood_donor_email`, `blood_donor_contacts`, `blood_donor_address`, `blood_donor_blood_group`) VALUES
(1, 1, 'Martin Mbithi', 'martinezmbithi@gmail.com', '0704031263', '120 Kikima', 'A+'),
(2, 5, 'Moses Kyove', 'moseskyove@gmail.com', '071239042323', 'Syokimau', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `blood_transfusion`
--

CREATE TABLE `blood_transfusion` (
  `transfusion_id` int(200) NOT NULL,
  `transfusion_donation_id` int(200) NOT NULL,
  `transfusion_patient_id` int(200) NOT NULL,
  `transfusion_officer_id` int(200) NOT NULL,
  `transfusion_date_time` varchar(200) NOT NULL,
  `transfusion_blood_qty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_transfusion`
--

INSERT INTO `blood_transfusion` (`transfusion_id`, `transfusion_donation_id`, `transfusion_patient_id`, `transfusion_officer_id`, `transfusion_date_time`, `transfusion_blood_qty`) VALUES
(2, 3, 3, 1, '2023-05-28', '200'),
(3, 3, 1, 1, '2023-05-15', '100');

-- --------------------------------------------------------

--
-- Table structure for table `clinical_officer`
--

CREATE TABLE `clinical_officer` (
  `officer_id` int(200) NOT NULL,
  `officer_login_id` int(200) NOT NULL,
  `officer_number` varchar(200) NOT NULL,
  `officer_names` varchar(200) NOT NULL,
  `officer_email` varchar(200) NOT NULL,
  `officer_contacts` varchar(200) NOT NULL,
  `officer_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinical_officer`
--

INSERT INTO `clinical_officer` (`officer_id`, `officer_login_id`, `officer_number`, `officer_names`, `officer_email`, `officer_contacts`, `officer_address`) VALUES
(1, 2, '90012567', 'Martin Mbithi', 'admin@blooddonoris.com', '0712345678', '127.0.0.1 Localhost'),
(3, 4, 'SFT-2023-738-ETH', 'James Doe', 'james@gmail.com', '9993203212', '120 Localhost');

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
(1, 'martinezmbithi@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Donor'),
(2, 'admin@blooddonoris.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'System Admin'),
(4, 'james@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Clinical Officer'),
(5, 'moseskyove@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Donor'),
(7, 'mart@hotmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient'),
(9, 'hiillary90@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(200) NOT NULL,
  `patient_login_id` int(200) NOT NULL,
  `patient_names` varchar(200) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_contacts` varchar(200) NOT NULL,
  `patient_address` longtext NOT NULL,
  `patient_blood_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_login_id`, `patient_names`, `patient_email`, `patient_contacts`, `patient_address`, `patient_blood_group`) VALUES
(1, 7, 'Martin', 'mart@hotmail.com', '06543212', '130 Localhost', 'O-'),
(3, 9, 'Hillary', 'hiillary90@gmail.com', '32121243', '120 LOcalhost', 'O+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `BankOfficerID` (`bank_officer_id`);

--
-- Indexes for table `blood_donation`
--
ALTER TABLE `blood_donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `BloodDonorID` (`donation_blood_donor_id`),
  ADD KEY `BloodBankID` (`donation_bank_id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`blood_donor_id`),
  ADD KEY `BloodDonorLoginID` (`blood_donor_login_id`);

--
-- Indexes for table `blood_transfusion`
--
ALTER TABLE `blood_transfusion`
  ADD PRIMARY KEY (`transfusion_id`),
  ADD KEY `DonationID` (`transfusion_donation_id`),
  ADD KEY `OfficerID` (`transfusion_officer_id`),
  ADD KEY `PatientID` (`transfusion_patient_id`);

--
-- Indexes for table `clinical_officer`
--
ALTER TABLE `clinical_officer`
  ADD PRIMARY KEY (`officer_id`),
  ADD KEY `OfficerLoginID` (`officer_login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `PatientLoginID` (`patient_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `bank_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_donation`
--
ALTER TABLE `blood_donation`
  MODIFY `donation_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `blood_donor_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_transfusion`
--
ALTER TABLE `blood_transfusion`
  MODIFY `transfusion_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clinical_officer`
--
ALTER TABLE `clinical_officer`
  MODIFY `officer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD CONSTRAINT `BankOfficerID` FOREIGN KEY (`bank_officer_id`) REFERENCES `clinical_officer` (`officer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_donation`
--
ALTER TABLE `blood_donation`
  ADD CONSTRAINT `BloodBankID` FOREIGN KEY (`donation_bank_id`) REFERENCES `blood_bank` (`bank_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BloodDonorID` FOREIGN KEY (`donation_blood_donor_id`) REFERENCES `blood_donor` (`blood_donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD CONSTRAINT `BloodDonorLoginID` FOREIGN KEY (`blood_donor_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_transfusion`
--
ALTER TABLE `blood_transfusion`
  ADD CONSTRAINT `DonationID` FOREIGN KEY (`transfusion_donation_id`) REFERENCES `blood_donation` (`donation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OfficerID` FOREIGN KEY (`transfusion_officer_id`) REFERENCES `clinical_officer` (`officer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PatientID` FOREIGN KEY (`transfusion_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinical_officer`
--
ALTER TABLE `clinical_officer`
  ADD CONSTRAINT `OfficerLoginID` FOREIGN KEY (`officer_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `PatientLoginID` FOREIGN KEY (`patient_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
