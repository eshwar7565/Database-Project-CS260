-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 10:58 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `minqualification` varchar(15) DEFAULT NULL,
  `mincpi` float DEFAULT NULL,
  `compname` varchar(50) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `curryear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`minqualification`, `mincpi`, `compname`, `salary`, `mode`, `type`, `curryear`) VALUES
('BTech', 8, 'TCS', 35, 'Online', 'Interview', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `companyregister`
--

CREATE TABLE `companyregister` (
  `compname` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyregister`
--

INSERT INTO `companyregister` (`compname`, `year`, `email`, `pass`) VALUES
('TCS', 2019, 'xyz@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD KEY `fk_1` (`compname`);

--
-- Indexes for table `companyregister`
--
ALTER TABLE `companyregister`
  ADD PRIMARY KEY (`compname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`compname`) REFERENCES `companyregister` (`compname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
