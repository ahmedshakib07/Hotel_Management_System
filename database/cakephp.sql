-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 12:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_hoolulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `checkIn` varchar(11) NOT NULL,
  `checkOut` varchar(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `adult` varchar(11) NOT NULL,
  `children` varchar(11) NOT NULL,
  `roomType` varchar(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `createdDate` timestamp NULL DEFAULT current_timestamp(),
  `modifiedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `checkIn`, `checkOut`, `name`, `phone`, `email`, `adult`, `children`, `roomType`, `u_id`, `status`, `createdDate`, `modifiedDate`) VALUES
(1, '04/20/2023', '04/22/2023', 'Sakib', '01970776607', 'mysoftheaven@gmail.com', '1', 'Children', '1', 1, '0', '2023-04-05 05:18:44', '2023-04-05 05:18:44'),
(2, '04/20/2023', '04/22/2023', 'HOOLULU', '01970776607', 'mysoftheaven@gmail.com', '3', 'Children', '3', 0, '0', '2023-04-05 05:20:19', '2023-04-05 05:20:19'),
(3, '04/21/2023', '04/22/2023', 'HOOLULU Resort', '01970776602', 'imtiaz@gmail.com', '1', 'Children', '1', 0, '0', '2023-04-05 08:32:53', '2023-04-05 08:32:53'),
(41, '04/06/2023', '04/08/2023', 'Aboni', '01970776607', 'abani.mysoftheaven22@gmai', 'Adult', 'Children', 'Room type', 0, '1', '2023-04-06 05:21:19', '2023-04-06 05:21:19'),
(42, '04/20/2023', '04/20/2023', 'HOOLULU Resort 2', '01970776602', 'test@gmail.com', '2', '1', '2', 0, '0', '2023-04-12 05:25:30', '2023-04-12 05:25:30'),
(43, '', '', '', '', '', 'Adult', 'Children', 'Room type', 0, '0', '2023-04-13 10:22:40', '2023-04-13 10:22:40'),
(44, '04/17/2023', '04/20/2023', 'Ahmed sakib', '01970776607', 'amin@gmail.com', '2', '2', '2', 0, '0', '2023-04-16 08:02:18', '2023-04-16 08:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomTypeId` varchar(11) NOT NULL,
  `roomNo` varchar(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomTypeId`, `roomNo`, `created_date`, `modified_date`) VALUES
(1, '1', '101', '2023-04-06 06:43:18', '2023-04-08 10:38:52'),
(2, '2', '107', '2023-04-06 06:43:59', '2023-04-08 10:38:52'),
(8, '1', '105', '2023-04-08 10:41:57', '2023-04-08 10:41:57'),
(9, '2', '104', '2023-04-08 10:48:16', '2023-04-08 10:48:16'),
(10, 'Room type', '', '2023-04-09 10:30:52', '2023-04-09 10:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `role`, `password`, `created`, `modified`) VALUES
(1, 'Imtiaz', 1912383299, 'admin@gmail.com', 'admin', '12345', '2023-03-09 13:11:42', '2023-03-09 13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `id` int(11) NOT NULL,
  `uName` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utility`
--

INSERT INTO `utility` (`id`, `uName`) VALUES
(1, 'AC'),
(2, 'Pool'),
(3, 'Snacks'),
(4, 'Snacks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
