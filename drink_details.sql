-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 01:31 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `drink_details`
--

CREATE TABLE `drink_details` (
  `drink_id` int(11) NOT NULL,
  `drink_name` varchar(150) DEFAULT NULL,
  `drink_type` varchar(150) DEFAULT NULL,
  `avg_cost` float DEFAULT NULL,
  `std_drink` float DEFAULT NULL,
  `alcohol_percentage` float NOT NULL,
  `ml` float NOT NULL,
  `container` varchar(100) NOT NULL,
  `Calories_kJ` float NOT NULL,
  `Calories` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drink_details`
--

INSERT INTO `drink_details` (`drink_id`, `drink_name`, `drink_type`, `avg_cost`, `std_drink`, `alcohol_percentage`, `ml`, `container`, `Calories_kJ`, `Calories`) VALUES
(1, 'Beer', 'Full Strength', NULL, 1.1, 4.8, 285, 'Middy', 430.35, 102.807),
(2, 'Beer', 'Full Strength', NULL, 1.4, 4.8, 375, 'Schmiddy', 566.25, 135.272),
(3, 'Beer', 'Full Strength', NULL, 1.6, 4.8, 425, 'Schooner', 641.75, 153.309),
(4, 'Beer', 'Mid Strength', NULL, 0.8, 3.5, 285, 'glass', 342, 81.7009),
(5, 'Beer', 'Mid Strength', NULL, 1, 3.5, 375, 'bottle', 450, 107.501),
(6, 'Beer', 'Mid Strength', NULL, 1.2, 3.5, 425, 'glass', 510, 121.835),
(7, 'Beer', 'Low Strength', NULL, 0.6, 2.7, 285, 'glass', 293.55, 70.1266),
(8, 'Beer', 'Low Strength', NULL, 0.8, 2.7, 375, 'bottle', 386.25, 92.2719),
(9, 'Beer', 'Low Strength', NULL, 0.9, 2.7, 425, 'glass', 437.75, 104.575),
(10, 'Wine', 'Red', NULL, 1, 13, 100, 'standard serve', 324, 77.4009),
(11, 'Wine', 'Red', NULL, 1.5, 13, 150, 'restaurant serve', 486, 116.101),
(12, 'Wine', 'Red', NULL, 7.7, 13, 750, 'bottle', 2430, 580.506),
(13, 'Wine', 'White', NULL, 0.9, 11.5, 100, 'standard serve', 296, 70.7119),
(14, 'Wine', 'White', NULL, 1.4, 11.5, 150, 'restaurant serve', 444, 106.068),
(15, 'Wine', 'White', NULL, 6.8, 11.5, 750, 'bottle', 2220, 530.339),
(16, 'Champagne', '', NULL, 1.4, 12, 150, 'restaurant serve', 507, 121.1),
(17, 'Champagne', '', NULL, 7.1, 12, 750, 'bottle', 2535, 605.59),
(18, 'Wine', 'Port', NULL, 0.8, 17.5, 60, 'standard serve', 186, 44.4338),
(19, 'Spirits', 'High Strength', NULL, 1, 40, 30, 'nip', 265.8, 63.4974),
(20, 'Spirits', 'High Strength', NULL, 22, 40, 700, 'bottle', 6202, 1481.61),
(21, 'Spirits', 'Full strength ready-to-drink', NULL, 1.1, 5, 275, 'bottle', 0, 0),
(22, 'Spirits', 'Full strength ready-to-drink', NULL, 1.2, 5, 330, 'bottle', 0, 0),
(23, 'Spirits', 'Full strength ready-to-drink', NULL, 2.6, 5, 660, 'bottle', 0, 0),
(24, 'Spirits', 'High strength ready-to-drink', NULL, 1.5, 7, 275, 'bottle', 0, 0),
(25, 'Spirits', 'High strength ready-to-drink', NULL, 1.8, 7, 330, 'bottle', 0, 0),
(26, 'Spirits', 'High strength ready-to-drink', NULL, 3.6, 7, 660, 'bottle', 0, 0),
(27, 'Spirits', 'Full strength pre-mix spirits', NULL, 1, 5, 250, 'can', 1115, 266.364),
(28, 'Spirits', 'Full strength pre-mix spirits', NULL, 1.2, 5, 300, 'can', 1338, 319.637),
(29, 'Spirits', 'Full strength pre-mix spirits', NULL, 1.5, 5, 375, 'can', 1672.5, 399.546),
(30, 'Spirits', 'Full strength pre-mix spirits', NULL, 1.7, 5, 440, 'can', 1962.4, 468.801),
(31, 'Spirits', 'High strength pre-mix spirits', NULL, 1.9, 10, 250, 'can', 617.5, 147.516),
(32, 'Spirits', 'High strength pre-mix spirits', NULL, 1.6, 7, 300, 'can', 741, 177.019),
(33, 'Spirits', 'High strength pre-mix spirits', NULL, 2.1, 7, 375, 'can', 926.5, 221.333),
(34, 'Spirits', 'High strength pre-mix spirits', NULL, 2.4, 7, 440, 'can', 1086.8, 259.627),
(35, 'Beer', 'Full Strength', NULL, 0.8, 4.8, 200, 'Glass', 0, 72.145),
(36, 'Beer', 'Full Strength', NULL, 1.3, 4.8, 350, 'Schmiddy', 0, 126.254),
(37, 'Beer', 'Full Strength', NULL, 2.2, 4.8, 570, 'Pint', 0, 205.614),
(38, 'Beer', 'Mid Strength', NULL, 0.6, 3.5, 200, 'Glass', 0, 57.334),
(39, 'Beer', 'Mid Strength', NULL, 1, 3.5, 350, 'Schmiddy', 0, 100.334),
(40, 'Beer', 'Mid Strength', NULL, 1.6, 3.5, 570, 'Pint', 0, 163.402),
(41, 'Beer', 'Low Strength', NULL, 0.4, 2.7, 200, 'Glass', 0, 49.211),
(42, 'Beer', 'Low Strength', NULL, 0.7, 2.7, 350, 'Schmiddy', 0, 86.119),
(43, 'Beer', 'Low Strength', NULL, 1.2, 2.7, 570, 'Pint', 0, 140.252);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drink_details`
--
ALTER TABLE `drink_details`
  ADD PRIMARY KEY (`drink_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drink_details`
--
ALTER TABLE `drink_details`
  MODIFY `drink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
