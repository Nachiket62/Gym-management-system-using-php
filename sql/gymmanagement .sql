-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 08:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Admin_Name`, `Admin_Password`) VALUES
('NACHIKET', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fullname`, `username`, `email`, `phonenumber`, `password`, `gender`, `dt`) VALUES
(20, 'Nachiketa bharti', 'dfdsf', 'nachiketa62@gmail.com', 918789494716, 'sdfsd', 'm', '2022-07-14 23:51:06'),
(21, 'Nachiketa bharti', '', 'nachiketa62@gmail.com', 918789494716, 'gctgc', 'm', '2022-07-14 23:51:06'),
(22, 'Nachiketa Bharti', 'Nachiket', 'nachiketa62@gmail.com', 8789494716, 'nachi123', 'm', '2022-07-14 23:51:06'),
(23, 'Nachiketa bharti', 'afadsf', 'nachiketa62@gmail.com', 918789494716, 'sdfsd', 'm', '2022-07-15 01:11:42'),
(31, 'sdfsdf', 'sdfsdf', 'sdfsdfsd', 0, 'e10adc3949ba59abbe56', 'm', '2022-07-15 23:32:46'),
(32, 'sdfdsf', 'sdfdf', 'sdfdf', 8789494716, 'e10adc3949ba59abbe56', 'm', '2022-07-15 23:35:36'),
(33, 'sdfsdf', 'sdfdsf', 'dsfdsf', 0, 'e10adc3949ba59abbe56', 'm', '2022-07-15 23:38:00'),
(34, 'asdasd', 'dfgdfgdf', 'sergSDfg', 0, 'd8578edf8458ce06fbc5', 'm', '2022-07-15 23:39:03'),
(35, 'sdfsdf', 'adsfasdfgasdf', 'ksdpisdnf', 0, 'e10adc3949ba59abbe56', 'm', '2022-07-15 23:43:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
