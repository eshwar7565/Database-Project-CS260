-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2023 at 12:53 PM
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
-- Stand-in structure for view `aidept`
-- (See below for the actual view)
--
CREATE TABLE `aidept` (
`yyear` smallint(6)
,`AI` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `alumnic`
--

CREATE TABLE `alumnic` (
  `rollno` varchar(8) NOT NULL,
  `compname` varchar(25) NOT NULL,
  `salary` float NOT NULL,
  `joinyear` date NOT NULL,
  `leftyear` date NOT NULL,
  `areaofwork` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `location` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnic`
--

INSERT INTO `alumnic` (`rollno`, `compname`, `salary`, `joinyear`, `leftyear`, `areaofwork`, `position`, `location`) VALUES
('1301CS01', 'Alphabet', 35, '2021-02-02', '0000-00-00', 'IT', 'SDE', 'Hyderabad'),
('1701ME02', 'Yellow.ai', 25, '2022-01-10', '2023-01-01', 'IT', 'Data Scientist', 'Hyderabad');

-- --------------------------------------------------------

--
-- Table structure for table `alumnie`
--

CREATE TABLE `alumnie` (
  `rollno` varchar(8) NOT NULL,
  `collegename` varchar(25) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `joinyear` date NOT NULL,
  `leftyear` date NOT NULL,
  `areaofstudy` varchar(40) NOT NULL,
  `location` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnie`
--

INSERT INTO `alumnie` (`rollno`, `collegename`, `degree`, `joinyear`, `leftyear`, `areaofstudy`, `location`) VALUES
('1301CS01', 'IIT Delhi', 'MSc', '2022-08-28', '2023-04-01', 'A.I', 'Delhi'),
('1701ME02', 'IIT Kharagpur', 'MSc', '2023-03-02', '0000-00-00', 'DataScience', 'Kharagpur ');

-- --------------------------------------------------------

--
-- Table structure for table `alumnir`
--

CREATE TABLE `alumnir` (
  `rollno` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `passyear` smallint(6) NOT NULL,
  `alcpi` float NOT NULL,
  `degree` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `alemail` varchar(50) NOT NULL,
  `allinkedin` varchar(50) DEFAULT NULL,
  `pass` varchar(15) NOT NULL,
  `isplacedbyiit` varchar(3) NOT NULL DEFAULT 'NO',
  `compname` varchar(50) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnir`
--

INSERT INTO `alumnir` (`rollno`, `name`, `passyear`, `alcpi`, `degree`, `branch`, `alemail`, `allinkedin`, `pass`, `isplacedbyiit`, `compname`, `salary`) VALUES
('1301CS01', 'Sanju', 2017, 8.8, 'Btech', 'CSE', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'hiam', 25),
('1301EE01', 'Malinga', 2017, 7, 'Btech', 'EE', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'TCS', 21),
('1301EE02', 'Amit Mishra', 2017, 8.9, 'Btech', 'EE', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'sonics', 45),
('1501CB01', 'Shardul', 2019, 8.4, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', '12', 23),
('1501CB02', 'Shardul', 2019, 8.4, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', '12', 28),
('1501CB03', 'Shardul', 2019, 8.4, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', '12', 13),
('1501CB04', 'Shardul', 2019, 8.4, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', '12', 6),
('1501CE01', 'Hardik', 2019, 8, 'Btech', 'CE', 'jos@f.com', 'www.linkedin.com/esh_war', '123', 'YES', 'TCS', 20),
('1501CE02', 'Mohit', 2019, 8.4, 'Btech', 'CE', 'm@g.c', 'link.com', '123', 'YES', 'hiam', 23),
('1501CS01', 'Shardul', 2019, 8.4, 'Btech', 'CSE', 'm@g.c', 'link.com', '123', 'YES', '12', 24),
('1501CS77', 'Rohit Kumar', 2022, 7.8, 'Btech', 'CSE', 'es@gmail.com', 'www.linkedin.com/esh_war', '123', 'YES', 'hiam', 22),
('1501EE01', 'Jos Buttler', 2019, 8.2, 'Btech', 'EE', 'jos@f.com', 'www.linkedin.com/eshwar', '123', 'YES', 'kia', 25),
('1601CB01', 'Chahar', 2020, 8.4, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', '12', 17),
('1601CE01', 'Murali Vijay', 2020, 8.7, 'Btech', 'CE', 'm@g.c', 'link.com', '123', 'YES', 'compabc', 27),
('1601CE02', 'Suresh', 2020, 8.4, 'Btech', 'CE', 'm@g.c', 'link.com', '123', 'YES', 'sonics', 27),
('1601EE01', 'Rashid Khan', 2020, 8, 'Btech', 'EE', 'bum@gmail.com', 'www.linkedin.com/eshwar', '123', 'YES', 'compabc', 18),
('1601ME01', 'MS Dhoni', 2020, 8.21, 'Btech', 'ME', 'msd@is.com', 'www.linkedin.com/eshwar', '123', 'YES', '12', 15),
('1701CB01', 'Ashwin', 2021, 7, 'Btech', 'CB', 'm@g.c', 'link.com', '123', 'YES', 'TCS', 12),
('1701CE01', 'Jadeja', 2021, 9.4, 'Btech', 'CE', 'm@g.c', 'link.com', '123', 'YES', 'sonics', 37),
('1701CS11', 'Aarav Choudhary', 2020, 9.2, 'Btech', 'CSE', 'aarav.choudhary@gmail.com', 'www.linkedin.com/in/aarav-choudhary', '123', 'YES', 'Google', 25),
('1701ME01', 'Dhawan', 2021, 7.9, 'Btech', 'ME', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'kia', 18),
('1701ME02', 'Kathik', 2021, 8.9, 'Btech', 'ME', 'katta@iitp.ac.in', 'www.linkedin.com/esh_war', '123', 'YES', 'compabc', 23),
('1801AI20', 'Rajat', 2022, 8, 'Btech', 'AI', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'kia', 23),
('1801CS01', 'Rohit Sharma', 2020, 7.6, 'Btech', 'CSE', 'es@gmail.com', 'www.linkedin.com/esh_war', '123', 'YES', 'sonics', 45),
('1801CS02', 'Rohit Sharma', 2022, 8.6, 'Btech', 'CSE', 'es@gmail.com', 'www.linkedin.com/eshwar', '123', 'YES', 'KESARI', 36),
('1801CS03', 'Rohit Sharma', 2022, 7.8, 'Btech', 'CSE', 'es@gmail.com', 'www.linkedin.com/esh_war', '123', 'YES', 'hiam', 22),
('1801ME02', 'Rajat Patidar', 2022, 8, 'Btech', 'AI', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'kia', 23),
('1801MM01', 'Bumrah', 2022, 9, 'Btech', 'MM', 'bum@gmail.com', 'www.linkedin.com/eshwar', '123', 'YES', 'sonics', 39),
('1801MM02', 'Rajat Patidar', 2022, 8, 'Btech', 'MM', 'msd@is.com', 'www.linkedin.com/esh_war', '123', 'YES', 'kia', 23),
('1901CS01', 'Virat Kohli', 2021, 9, 'Btech', 'CSE', 'es@gmail.com', 'www.linkedin.com/esh_war', '123', 'YES', 'TCS', 23),
('1901CS10', 'Aarav Choudhary', 2020, 9.2, 'Btech', 'CSE', 'aarav.choudhary@gmail.com', 'www.linkedin.com/in/aarav-choudhary', '123', 'YES', 'Google', 25),
('1901CS11', 'Aarav Choudhary', 2020, 9.2, 'Btech', 'CSE', 'aarav.choudhary@gmail.com', 'www.linkedin.com/in/aarav-choudhary', '123', 'YES', 'Google', 25),
('1901EE02', 'Nitya Sharma', 2020, 9.7, 'Btech', 'EE', 'nitya.sharma@gmail.com', 'www.linkedin.com/in/nitya-sharma', '321', 'YES', 'Amazon', 30),
('1901EE20', 'Nitya Sharma', 2020, 9.7, 'Btech', 'EE', 'nitya.sharma@gmail.com', 'www.linkedin.com/in/nitya-sharma', '321', 'YES', 'Amazon', 30),
('2001CS23', 'Virat', 2022, 9, 'Btech', 'CSE', 'es@gmal', 'www.linkedin.com/esh_war', '123', 'YES', 'kia', 16),
('2001EE01', 'Rhea Patel', 2021, 8.6, 'Btech', 'EE', 'rhea.patel@gmail.com', 'www.linkedin.com/in/rhea-patel', '456', 'YES', 'Microsoft', 15),
('2001EE10', 'Rhea Patel', 2021, 8.6, 'Btech', 'EE', 'rhea.patel@gmail.com', 'www.linkedin.com/in/rhea-patel', '456', 'YES', 'Microsoft', 15),
('2001ME01', 'Samarth Singh', 2022, 7.5, 'Btech', 'ME', 'samarth.singh@gmail.com', 'www.linkedin.com/in/samarth-singh', '789', 'NO', NULL, NULL),
('2001ME02', 'Karan Kapoor', 2021, 8.3, 'Btech', 'ME', 'karan.kapoor@gmail.com', 'www.linkedin.com/in/karan-kapoor', '654', 'NO', NULL, NULL),
('2001ME10', 'Samarth Singh', 2022, 7.5, 'Btech', 'ME', 'samarth.singh@gmail.com', 'www.linkedin.com/in/samarth-singh', '789', 'NO', NULL, NULL),
('2001ME22', 'Karan Kapoor', 2021, 8.3, 'Btech', 'ME', 'karan.kapoor@gmail.com', 'www.linkedin.com/in/karan-kapoor', '654', 'NO', NULL, NULL),
('2101CS02', 'Aryan Gupta', 2022, 7.9, 'Btech', 'CSE', 'aryan.gupta@gmail.com', 'www.linkedin.com/in/aryan-gupta', '987', 'YES', 'Facebook', 20),
('2101CS35', 'Aryan Gupta', 2022, 7.9, 'Btech', 'CSE', 'aryan.gupta@gmail.com', 'www.linkedin.com/in/aryan-gupta', '987', 'YES', 'Facebook', 20);

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `rollno` varchar(8) NOT NULL,
  `compname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`rollno`, `compname`) VALUES
('2101ai15', 'Amazon'),
('2101ai26', 'TCS'),
('2101ai36', 'TCS'),
('2101cb16', 'Amazon'),
('2101cb16', 'Facebook'),
('2101cb16', 'kia'),
('2101me01', 'Amazon'),
('2101me01', 'TCS'),
('2101mm98', 'KESARI'),
('2101mm98', 'TCS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `branchwiseyear`
-- (See below for the actual view)
--
CREATE TABLE `branchwiseyear` (
`Year` smallint(11)
,`AI` bigint(21)
,`CBE` bigint(21)
,`CE` bigint(21)
,`CSE` bigint(21)
,`EE` bigint(21)
,`EP` bigint(21)
,`MC` bigint(21)
,`ME` bigint(21)
,`MME` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cbdept`
-- (See below for the actual view)
--
CREATE TABLE `cbdept` (
`yyear` smallint(6)
,`CBE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cedept`
-- (See below for the actual view)
--
CREATE TABLE `cedept` (
`yyear` smallint(6)
,`CE` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `companyregister`
--

CREATE TABLE `companyregister` (
  `compname` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `minqualification` varchar(10) DEFAULT NULL,
  `mincpi` float DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `mode` varchar(15) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `curryear` smallint(6) DEFAULT NULL,
  `role` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companyregister`
--

INSERT INTO `companyregister` (`compname`, `year`, `email`, `pass`, `minqualification`, `mincpi`, `salary`, `mode`, `type`, `curryear`, `role`) VALUES
('12', 2009, 's@gmail.com', '123', 'Btech', 7.2, 21, 'offline', 'interview', 2023, 'programmer'),
('Amazon', 2010, 'xyz@gmail.com', '123', 'Btech', 7.2, 30, 'offline', 'interview', 2023, 'developer'),
('compabc', 2002, 'xz@gmail.com', '123', 'Btech', 7.2, 20, 'offline', 'interview', 2023, 'HR'),
('DML', 2023, 'msd@is.com', '123', 'Btech', 7.2, 19, 'offline', 'interview', 2023, 'SDE'),
('Facebook', 2010, 'xyz@gmail.com', '123', 'Btech', 7.2, 35, 'offline', 'interview', 2023, 'ML Scientist'),
('Google', 2010, 'xyz@gmail.com', '123', 'Btech', 7.2, 37, 'offline', 'interview', 2023, 'Botanist'),
('hiam', 2009, 's1@gmail.com', '123', 'Btech', 7.2, 45, 'offline', 'interview', 2023, 'developer'),
('IPL', 2009, 'an@hmail.com', '123', 'Btech', 7.2, 43, 'offline', 'interview', 2023, 'Data Scientist'),
('KESARI', 2023, 'kesari@gmail.com', '1', 'Btech', 7.2, 40, 'offline', 'interview', 2023, 'QA Engineer'),
('kia', 2009, 's3@gmail.cqom', '123', 'Btech', 7.2, 40, 'offline', 'interview', 2023, '.NET developer'),
('Microsoft', 2010, 'xyz@gmail.com', '123', 'Btech', 7.2, 50, 'offline', 'interview', 2023, 'App developer'),
('sonics', 2015, 's@g.com', '123', 'Btech', 7.2, 55, 'offline', 'interview', 2023, 'Web developer'),
('TCS', 2019, 'xyz@gmail.com', '123', 'BTech', 7, 35, 'Online', 'Interview', 2023, 'Java Developer');

-- --------------------------------------------------------

--
-- Stand-in structure for view `csedept`
-- (See below for the actual view)
--
CREATE TABLE `csedept` (
`yyear` smallint(6)
,`CSE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `eedept`
-- (See below for the actual view)
--
CREATE TABLE `eedept` (
`yyear` smallint(6)
,`EE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `epdept`
-- (See below for the actual view)
--
CREATE TABLE `epdept` (
`yyear` smallint(6)
,`EP` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mcdept`
-- (See below for the actual view)
--
CREATE TABLE `mcdept` (
`yyear` smallint(6)
,`MC` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `medept`
-- (See below for the actual view)
--
CREATE TABLE `medept` (
`yyear` smallint(6)
,`ME` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mmdept`
-- (See below for the actual view)
--
CREATE TABLE `mmdept` (
`yyear` smallint(6)
,`MME` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `reject`
--

CREATE TABLE `reject` (
  `rollno` varchar(8) NOT NULL,
  `compname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reject`
--

INSERT INTO `reject` (`rollno`, `compname`) VALUES
('2101ai15', '12');

-- --------------------------------------------------------

--
-- Table structure for table `sd`
--

CREATE TABLE `sd` (
  `name` varchar(50) DEFAULT NULL,
  `rollno` char(8) NOT NULL,
  `webmail` varchar(50) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `c10` float DEFAULT NULL,
  `c12` float DEFAULT NULL,
  `cpi` double DEFAULT NULL,
  `resume` mediumblob DEFAULT NULL,
  `special` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `aoi` varchar(50) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `passoutyear` int(11) DEFAULT NULL,
  `compname` varchar(40) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sd`
--

INSERT INTO `sd` (`name`, `rollno`, `webmail`, `pass`, `c10`, `c12`, `cpi`, `resume`, `special`, `age`, `aoi`, `branch`, `passoutyear`, `compname`, `salary`, `mime`) VALUES

('Kavitha', '2101ai36', 'web2@hot.com', '123', 98, 96, 8.4, NULL, 'ml', 21, 'app dev', 'MM', 2025, '', NULL, NULL),
('Suresh', '2101cb16', 'eshwar_2101ai25@iitp.ac.in', '123', 9.8, 9.72, 8, NULL, 'AI', 22, 'Neural Networks', 'AI', 2025, '12', 21, '-'),
('Rachakonda', '2101cs16', 'eshwarrachakonda02@gmail.com', '123', 98, 98, 8, NULL, 'ai', 18, 'ml', 'CSE', 2025, '', NULL, NULL),
('Sharma ', '2101me01', 'jos@f.com', '123', 90, 90, 9, NULL, 'ai', 21, 'ai', 'ME', 2021, '', 0, '-'),
('Eshwar Rachakonda', '2101mm98', 'eshwar_2101ai25@iitp.ac.in', '123', 9.7, 9.72, 7.8, NULL, 'AI', 22, 'CNN', 'MM', 2025, 'TCS', 35, '-');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
-- (See below for the actual view)
--
CREATE TABLE `view1` (
`yyear` smallint(11)
,`AI` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view2`
-- (See below for the actual view)
--
CREATE TABLE `view2` (
`yyear` smallint(11)
,`CBE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view3`
-- (See below for the actual view)
--
CREATE TABLE `view3` (
`yyear` smallint(11)
,`CE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view4`
-- (See below for the actual view)
--
CREATE TABLE `view4` (
`yyear` smallint(11)
,`CSE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view5`
-- (See below for the actual view)
--
CREATE TABLE `view5` (
`yyear` smallint(11)
,`EE` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view6`
-- (See below for the actual view)
--
CREATE TABLE `view6` (
`yyear` smallint(11)
,`EP` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view7`
-- (See below for the actual view)
--
CREATE TABLE `view7` (
`yyear` smallint(11)
,`MC` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view8`
-- (See below for the actual view)
--
CREATE TABLE `view8` (
`yyear` smallint(11)
,`ME` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view9`
-- (See below for the actual view)
--
CREATE TABLE `view9` (
`yyear` smallint(11)
,`MME` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yyear` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yyear`) VALUES
(2012),
(2013),
(2014),
(2015),
(2016),
(2017),
(2018),
(2019),
(2020),
(2021),
(2022);

-- --------------------------------------------------------

--
-- Table structure for table `yearwisecomp`
--

CREATE TABLE `yearwisecomp` (
  `year` smallint(6) NOT NULL,
  `compname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearwisecomp`
--

INSERT INTO `yearwisecomp` (`year`, `compname`) VALUES
(2012, 'TCS'),
(2013, 'TCS'),
(2015, '12'),
(2015, 'TCS'),
(2016, '12'),
(2017, '12'),
(2017, 'TCS'),
(2018, '12'),
(2019, '12'),
(2020, '12'),
(2021, '12'),
(2021, 'TCS'),
(2022, '12'),
(2022, 'Amazon'),
(2022, 'TCS'),
(2023, 'Amazon'),
(2023, 'TCS');

-- --------------------------------------------------------

--
-- Structure for view `aidept`
--
DROP TABLE IF EXISTS `aidept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aidept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `AI` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'AI' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `branchwiseyear`
--
DROP TABLE IF EXISTS `branchwiseyear`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `branchwiseyear`  AS SELECT `view1`.`yyear` AS `Year`, `view1`.`AI` AS `AI`, `view2`.`CBE` AS `CBE`, `view3`.`CE` AS `CE`, `view4`.`CSE` AS `CSE`, `view5`.`EE` AS `EE`, `view6`.`EP` AS `EP`, `view7`.`MC` AS `MC`, `view8`.`ME` AS `ME`, `view9`.`MME` AS `MME` FROM ((((((((`view1` join `view2` on(`view1`.`yyear` = `view2`.`yyear`)) join `view3` on(`view1`.`yyear` = `view3`.`yyear`)) join `view4` on(`view1`.`yyear` = `view4`.`yyear`)) join `view5` on(`view1`.`yyear` = `view5`.`yyear`)) join `view6` on(`view1`.`yyear` = `view6`.`yyear`)) join `view7` on(`view1`.`yyear` = `view7`.`yyear`)) join `view8` on(`view1`.`yyear` = `view8`.`yyear`)) join `view9` on(`view1`.`yyear` = `view9`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `cbdept`
--
DROP TABLE IF EXISTS `cbdept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cbdept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `CBE` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'CB' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `cedept`
--
DROP TABLE IF EXISTS `cedept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cedept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `CE` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'CE' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `csedept`
--
DROP TABLE IF EXISTS `csedept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csedept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `CSE` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'CSE' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `eedept`
--
DROP TABLE IF EXISTS `eedept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eedept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `EE` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'EE' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `epdept`
--
DROP TABLE IF EXISTS `epdept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `epdept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `EP` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'EP' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `mcdept`
--
DROP TABLE IF EXISTS `mcdept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mcdept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `MC` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'MC' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `medept`
--
DROP TABLE IF EXISTS `medept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `medept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `ME` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'ME' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `mmdept`
--
DROP TABLE IF EXISTS `mmdept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mmdept`  AS SELECT `alumnir`.`passyear` AS `yyear`, count(`alumnir`.`branch`) AS `MME` FROM `alumnir` WHERE `alumnir`.`isplacedbyiit` = 'YES' AND `alumnir`.`branch` = 'MM' GROUP BY `alumnir`.`passyear``passyear`  ;

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1`  AS SELECT `year`.`yyear` AS `yyear`, `aidept`.`AI` AS `AI` FROM (`year` left join `aidept` on(`year`.`yyear` = `aidept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view2`
--
DROP TABLE IF EXISTS `view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2`  AS SELECT `year`.`yyear` AS `yyear`, `cbdept`.`CBE` AS `CBE` FROM (`year` left join `cbdept` on(`year`.`yyear` = `cbdept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view3`
--
DROP TABLE IF EXISTS `view3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view3`  AS SELECT `year`.`yyear` AS `yyear`, `cedept`.`CE` AS `CE` FROM (`year` left join `cedept` on(`year`.`yyear` = `cedept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view4`
--
DROP TABLE IF EXISTS `view4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view4`  AS SELECT `year`.`yyear` AS `yyear`, `csedept`.`CSE` AS `CSE` FROM (`year` left join `csedept` on(`year`.`yyear` = `csedept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view5`
--
DROP TABLE IF EXISTS `view5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view5`  AS SELECT `year`.`yyear` AS `yyear`, `eedept`.`EE` AS `EE` FROM (`year` left join `eedept` on(`year`.`yyear` = `eedept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view6`
--
DROP TABLE IF EXISTS `view6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view6`  AS SELECT `year`.`yyear` AS `yyear`, `epdept`.`EP` AS `EP` FROM (`year` left join `epdept` on(`year`.`yyear` = `epdept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view7`
--
DROP TABLE IF EXISTS `view7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view7`  AS SELECT `year`.`yyear` AS `yyear`, `mcdept`.`MC` AS `MC` FROM (`year` left join `mcdept` on(`year`.`yyear` = `mcdept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view8`
--
DROP TABLE IF EXISTS `view8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view8`  AS SELECT `year`.`yyear` AS `yyear`, `medept`.`ME` AS `ME` FROM (`year` left join `medept` on(`year`.`yyear` = `medept`.`yyear`))  ;

-- --------------------------------------------------------

--
-- Structure for view `view9`
--
DROP TABLE IF EXISTS `view9`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view9`  AS SELECT `year`.`yyear` AS `yyear`, `mmdept`.`MME` AS `MME` FROM (`year` left join `mmdept` on(`year`.`yyear` = `mmdept`.`yyear`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnic`
--
ALTER TABLE `alumnic`
  ADD KEY `fk_10` (`rollno`);

--
-- Indexes for table `alumnie`
--
ALTER TABLE `alumnie`
  ADD KEY `fk_18` (`rollno`);

--
-- Indexes for table `alumnir`
--
ALTER TABLE `alumnir`
  ADD PRIMARY KEY (`rollno`),
  ADD KEY `fk_13` (`compname`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`rollno`,`compname`),
  ADD KEY `fk_14` (`compname`);

--
-- Indexes for table `companyregister`
--
ALTER TABLE `companyregister`
  ADD PRIMARY KEY (`compname`);

--
-- Indexes for table `reject`
--
ALTER TABLE `reject`
  ADD PRIMARY KEY (`rollno`,`compname`),
  ADD KEY `fk_16` (`compname`);

--
-- Indexes for table `sd`
--
ALTER TABLE `sd`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yyear`);

--
-- Indexes for table `yearwisecomp`
--
ALTER TABLE `yearwisecomp`
  ADD PRIMARY KEY (`year`,`compname`),
  ADD KEY `fk_19` (`compname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnic`
--
ALTER TABLE `alumnic`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`rollno`) REFERENCES `alumnir` (`rollno`);

--
-- Constraints for table `alumnie`
--
ALTER TABLE `alumnie`
  ADD CONSTRAINT `fk_18` FOREIGN KEY (`rollno`) REFERENCES `alumnir` (`rollno`);

--
-- Constraints for table `alumnir`
--
ALTER TABLE `alumnir`
  ADD CONSTRAINT `fk_13` FOREIGN KEY (`compname`) REFERENCES `companyregister` (`compname`);

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `fk_14` FOREIGN KEY (`compname`) REFERENCES `companyregister` (`compname`),
  ADD CONSTRAINT `fk_15` FOREIGN KEY (`rollno`) REFERENCES `sd` (`rollno`);

--
-- Constraints for table `reject`
--
ALTER TABLE `reject`
  ADD CONSTRAINT `fk_16` FOREIGN KEY (`compname`) REFERENCES `companyregister` (`compname`),
  ADD CONSTRAINT `fk_17` FOREIGN KEY (`rollno`) REFERENCES `sd` (`rollno`);

--
-- Constraints for table `yearwisecomp`
--
ALTER TABLE `yearwisecomp`
  ADD CONSTRAINT `fk_19` FOREIGN KEY (`compname`) REFERENCES `companyregister` (`compname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
