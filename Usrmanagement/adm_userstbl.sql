-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finallifeproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_userstbl`
--

CREATE TABLE `adm_userstbl` (
  `Id` int(11) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `User_Name` varchar(250) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Passwords` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `Created_At` date NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm_userstbl`
--

INSERT INTO `adm_userstbl` (`Id`, `Fname`, `Lname`, `User_Name`, `Email`, `Passwords`, `role`, `Status`, `Created_At`, `Created_By`) VALUES
(1, 'Admin', NULL, 'Admin', NULL, NULL, NULL, 0, '2023-06-29', 'SupperAdmin'),
(2, 'SuperAdmin', NULL, 'Super Admin', NULL, NULL, NULL, 0, '2023-06-29', 'SupperAdmin'),
(3, 'SuperAdmins', NULL, 'Super Admins', NULL, '$2y$10$4WFg3UoAOjjVNCDvkqZFHuX0K8DdnFju1qmJ3MHF.6d', 1, 0, '2023-06-29', 'SupperAdmin'),
(4, 'Meskerem Eshetu', NULL, '01744/12', NULL, '$2y$10$ZSpRgMpsgIDz1TI/6dA0JuLE3lTBDhSGl9HFJIJePiK', 1, 0, '2023-06-29', 'SupperAdmin'),
(5, 'Abekele', NULL, 'Abekele', NULL, '$2y$10$jsZi3ZK0kzvTO5Zbz.WX6ean4Kjtk7v/zwLLcmCdeCt', 1, 0, '2023-06-30', 'SupperAdmin'),
(6, 'Abera', NULL, 'AberaK', NULL, '123456', 1, 0, '2023-06-30', 'SupperAdmin'),
(7, 'Fikadu Bekele', NULL, 'Fbekele', NULL, '$2y$10$qoHMA0BaZFrt8kmHH0WoM.UftjT347W7AZlbBUJM/qw', 1, 0, '2023-06-30', 'SupperAdmin'),
(8, 'Alemitu Fiseha', NULL, 'AFiseha', NULL, '$2y$10$TRRA7kXf.K2Y1vk3u5BgNeJH10vkSJRoYbRyMFWyxIP', 1, 0, '2023-06-30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_userstbl`
--
ALTER TABLE `adm_userstbl`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD KEY `userrole` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_userstbl`
--
ALTER TABLE `adm_userstbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adm_userstbl`
--
ALTER TABLE `adm_userstbl`
  ADD CONSTRAINT `userrole` FOREIGN KEY (`role`) REFERENCES `adm_roletbl` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
