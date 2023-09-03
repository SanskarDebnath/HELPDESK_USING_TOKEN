-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2023 at 02:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_perform`
--

CREATE TABLE `action_perform` (
  `describe_issue` varchar(70) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `id` varchar(40) DEFAULT NULL,
  `snum_client` int DEFAULT NULL,
  `data_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `serial_server` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `action_perform`
--

INSERT INTO `action_perform` (`describe_issue`, `full_name`, `id`, `snum_client`, `data_date`, `serial_server`) VALUES
('i see your issue it will be resolved soon', 'Sanskar Debnath', 'sans@2023-wm', 59, '2023-08-27 22:27:01', 23);

-- --------------------------------------------------------

--
-- Table structure for table `admin_page`
--

CREATE TABLE `admin_page` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `id` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `post` varchar(40) DEFAULT NULL,
  `serial_number` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_page`
--

INSERT INTO `admin_page` (`name`, `email`, `id`, `password`, `department`, `post`, `serial_number`, `date`) VALUES
('admin', 'admin@gmail.com', 'TCEA_HELPDESK_CSE_ADMIN', 'ADMIN_CSE_2023', 'cse', 'assistant prof', 1, '2023-07-26 11:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `fname` varchar(30) DEFAULT NULL,
  `mname` varchar(11) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `comments` varchar(1000) NOT NULL,
  `id` varchar(40) DEFAULT NULL,
  `priority` int DEFAULT '0',
  `comments_date` date DEFAULT NULL,
  `serial` int NOT NULL,
  `token_no` varchar(60) DEFAULT NULL,
  `comment_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`fname`, `mname`, `lname`, `subject`, `comments`, `id`, `priority`, `comments_date`, `serial`, `token_no`, `comment_date`) VALUES
('Sanskar', '', 'Debnath', 'issue about computer in lab 02', 'Yesterday, I tried to use the computer in CSE lab 02, but it would not turn on. I tried restarting it, but that did not work either. I also checked the power cord and outlet, but they were both working properly.', 'sans@2023-y3', 3, '2023-08-07', 58, 'TCEA-XkdrbX4S2MQ-20230827', '2023-08-27 22:23:19'),
('Aditya', '', 'Debnath', 'abc', 'abc', 'adit@2023-c6', 3, '2020-01-23', 60, 'TCEA-dU49Ssi2GHW-20230830', '2023-08-30 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `log_sign`
--

CREATE TABLE `log_sign` (
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `id` varchar(40) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` bigint NOT NULL,
  `acc_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch` varchar(40) DEFAULT NULL,
  `mname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_sign`
--

INSERT INTO `log_sign` (`fname`, `lname`, `email`, `id`, `password`, `phone_number`, `acc_created_date`, `branch`, `mname`) VALUES
('Aditya', 'Debnath', 'debnathaditya2808@gmail.com', 'adit@2023-c6', 'Punkhez@rd1000', 8837418457, '2023-08-30 13:07:21', 'Computer Science and Engineering', ''),
('Sanskar', 'Debnath', 'Sanskar@gmail.com', 'sans@2023-wm', 'Sanskar@0381', 123456789, '2023-08-27 22:25:18', 'Computer Science and Engineering', ''),
('Sanskar', 'Debnath', 'sanskar@gmail.com', 'sans@2023-d2', 'Sanskar@0381', 6909072118, '2023-08-27 22:13:56', 'Computer Science and Engineering', ''),
('Sanskar', 'Debnath', 'sanskardebnath2019@gmail.com', 'sans@2023-y3', 'Sanskar@0381', 9863708559, '2023-08-27 22:22:21', 'Computer Science and Engineering', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_perform`
--
ALTER TABLE `action_perform`
  ADD PRIMARY KEY (`serial_server`);

--
-- Indexes for table `admin_page`
--
ALTER TABLE `admin_page`
  ADD PRIMARY KEY (`serial_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `log_sign`
--
ALTER TABLE `log_sign`
  ADD PRIMARY KEY (`email`,`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_perform`
--
ALTER TABLE `action_perform`
  MODIFY `serial_server` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_page`
--
ALTER TABLE `admin_page`
  MODIFY `serial_number` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `serial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
