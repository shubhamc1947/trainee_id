-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 08:32 AM
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
-- Database: `weknow`
--

-- --------------------------------------------------------

--
-- Table structure for table `trainee_id`
--

CREATE TABLE `trainee_id` (
  `sno` int(11) NOT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `course_enrolled` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `admission_date` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `valid_date` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `creation_time` varchar(100) DEFAULT NULL,
  `edited_by` varchar(100) DEFAULT NULL,
  `edition_time` varchar(100) DEFAULT NULL,
  `admin_remarks` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee_id`
--

INSERT INTO `trainee_id` (`sno`, `profile`, `name`, `course_enrolled`, `contact_no`, `admission_date`, `dob`, `valid_date`, `created_by`, `creation_time`, `edited_by`, `edition_time`, `admin_remarks`) VALUES
(13, 'Shubham Chaturvedi.jpg', 'Shubham Chaturvedi', 'Web Development', '9876544000', '2023-07-20', '2023-07-19', '2023-07-18', NULL, NULL, NULL, NULL, NULL),
(24, 'Hello Singh.jpg', 'Hello Singh', 'Accounts', '98788888888', '2023-07-04', '2023-07-05', '2023-07-06', NULL, NULL, NULL, NULL, NULL),
(25, 'Shubham Chaturvedi.jpg', 'Shubham Chaturvedi', 'Web Development', '9876543210', '2023-07-06', '2023-07-13', '2023-07-26', NULL, NULL, NULL, NULL, NULL),
(26, 'Shubham Chaturvedi.jpg', 'Shubham Chaturvedi', 'Web Development', '9876543210', '2023-07-06', '2023-07-13', '2023-07-26', NULL, NULL, NULL, NULL, NULL),
(27, 'Shubham Chaturvedi.jpg', 'Shubham Chaturvedi', 'Web Development', '9876543210', '2023-07-06', '2023-07-13', '2023-07-26', NULL, NULL, NULL, NULL, NULL),
(28, 'Shubham Chaturvedi.jpg', 'Shubham Chaturvedi', 'Web Development', '9876543210', '2023-07-05', '2023-07-12', '2023-07-12', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trainee_id`
--
ALTER TABLE `trainee_id`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trainee_id`
--
ALTER TABLE `trainee_id`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
