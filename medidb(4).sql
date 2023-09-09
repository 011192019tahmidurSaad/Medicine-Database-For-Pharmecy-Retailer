-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 06:30 AM
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
-- Database: `medidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_category`
--

CREATE TABLE `company_category` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `company_certification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_category`
--

INSERT INTO `company_category` (`company_id`, `company_name`, `company_certification`) VALUES
(1, 'Incepta', 'yes'),
(2, 'ACME', 'yes'),
(3, 'Renata', 'No'),
(4, 'Square', 'yes'),
(5, 'Beximco', 'yes'),
(6, 'AristroPharma', 'yes'),
(10, 'Radiant', 'yes'),
(11, 'LabAid', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `disease_category`
--

CREATE TABLE `disease_category` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(30) NOT NULL,
  `disease_entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disease_category`
--

INSERT INTO `disease_category` (`disease_id`, `disease_name`, `disease_entry_date`) VALUES
(6, 'Fever', '2001-08-15'),
(7, 'Ebola', '2001-08-15'),
(8, 'Covid', '2023-08-01'),
(9, 'Influenza', '2023-08-28'),
(10, 'Nipah', '2023-09-09'),
(11, 'Dengu', '2023-08-10'),
(12, 'Cancer', '2023-08-02'),
(13, 'Plague', '2021-08-24'),
(14, 'Rubella', '2023-06-06'),
(15, 'Tetanus', '2025-06-24'),
(16, 'Whooping cough', '2023-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(20) NOT NULL,
  `disease` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `medicine_code` varchar(20) NOT NULL,
  `medicine_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `disease`, `company`, `medicine_code`, `medicine_type`) VALUES
(1, 'Napa', 6, 1, 'NP01', 'Tablet'),
(2, 'Dextrim', 6, 1, 'DC11', 'Liquid'),
(3, 'Sergel', 6, 6, 'SG12', NULL),
(4, 'Abdorin', 11, 1, 'AB44', NULL),
(5, 'Azyme', 15, 6, 'AZ98', NULL),
(6, 'ACE', 6, 4, 'AC45', NULL),
(7, 'Afrin', 13, 6, 'AF21', NULL),
(9, 'Amodis', 13, 4, 'AM67', NULL),
(11, 'Bisopro', 14, 1, 'BI41', NULL),
(12, 'Ceclofen', 12, 3, 'CE89', NULL),
(13, 'Daomin', 10, 2, 'DA55', NULL),
(14, 'Enteca', 16, 3, 'EN21', NULL),
(15, 'Fourgen', 12, 1, 'FO98', NULL),
(16, 'Zorate', 13, 1, 'ZO44', NULL),
(17, 'Xcel', 6, 2, 'XC11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spend_medicine`
--

CREATE TABLE `spend_medicine` (
  `spend_medicine_id` int(11) NOT NULL,
  `spend_medicine_name` int(11) NOT NULL,
  `spend_medicine_quantity` int(11) NOT NULL,
  `spend_medicine_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spend_medicine`
--

INSERT INTO `spend_medicine` (`spend_medicine_id`, `spend_medicine_name`, `spend_medicine_quantity`, `spend_medicine_entry_date`) VALUES
(1, 1, 50, '2023-08-22'),
(2, 1, 40, '2023-08-15'),
(3, 2, 20, '2023-08-21'),
(4, 1, 10, '2023-08-21'),
(7, 1, 12, '2023-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `store_medicine`
--

CREATE TABLE `store_medicine` (
  `store_medicine_id` int(11) NOT NULL,
  `store_medicine_name` varchar(20) NOT NULL,
  `store_medicine_quantity` int(11) NOT NULL,
  `store_medicine_entry_date` varchar(10) NOT NULL,
  `store_medicine_expire_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_medicine`
--

INSERT INTO `store_medicine` (`store_medicine_id`, `store_medicine_name`, `store_medicine_quantity`, `store_medicine_entry_date`, `store_medicine_expire_date`) VALUES
(1, '1', 100, '2023-08-20', '2023-08-25'),
(2, '1', 200, '2023-08-20', '2023-08-24'),
(3, '2', 22, '2023-08-22', '2023-08-25'),
(4, '3', 100, '2023-08-20', '2023-08-30'),
(6, '9', 25, '2023-08-09', '2023-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(1, 'Tahmidur ', 'Saad', 'tahmidursaad@gmail.com', '1234'),
(2, 'Fokhrul', 'Islam', 'fakhrul@gmail.com', '1234'),
(3, 'Nazmus', 'Sakib', 'nazmus@gmail.com', '1234'),
(4, 'Fahim', 'Shahriar', 'fahim@gmail.com', '1234'),
(5, 'Fatema', 'Shami', 'fatema@gmail.com', '1234'),
(6, 'Shihab', 'Sakib', 'sakib@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_category`
--
ALTER TABLE `company_category`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `disease_category`
--
ALTER TABLE `disease_category`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `spend_medicine`
--
ALTER TABLE `spend_medicine`
  ADD PRIMARY KEY (`spend_medicine_id`);

--
-- Indexes for table `store_medicine`
--
ALTER TABLE `store_medicine`
  ADD PRIMARY KEY (`store_medicine_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_category`
--
ALTER TABLE `company_category`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `disease_category`
--
ALTER TABLE `disease_category`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spend_medicine`
--
ALTER TABLE `spend_medicine`
  MODIFY `spend_medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_medicine`
--
ALTER TABLE `store_medicine`
  MODIFY `store_medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
