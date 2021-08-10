-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 09:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminUserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminUserName`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassTitle` varchar(255) NOT NULL,
  `Year` int(255) NOT NULL,
  `BatchNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassTitle`, `Year`, `BatchNo`) VALUES
('mca_one', 2017, '2020'),
('mca_two', 2018, '2021'),
('mca_three', 2019, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Sub1` varchar(255) NOT NULL,
  `Sub2` varchar(255) NOT NULL,
  `Lab` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FID`, `Name`, `Password`, `Sub1`, `Sub2`, `Lab`) VALUES
('KP1618', 'krishnaprasad', 'kp@123', 'Data Mining', '', NULL),
('KP1618', 'krishnaprasad', 'kp@123', 'Data Mining', '', NULL),
('IND1999', 'Indira', 'ind@123', 'Computer Networks', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mca_one`
--

CREATE TABLE `mca_one` (
  `RollNo` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `mca_one`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `mca_one` FOR EACH ROW DELETE FROM students WHERE RollNo=old.RollNo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `mca_one` FOR EACH ROW INSERT INTO students values(null,new.RollNo,new.Password,FIRST_YEAR,null,null,null,null,null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mca_three`
--

CREATE TABLE `mca_three` (
  `RollNo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `mca_three`
--
DELIMITER $$
CREATE TRIGGER `deletestudents` AFTER DELETE ON `mca_three` FOR EACH ROW DELETE FROM students WHERE RollNo=old.RollNo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertstudents` AFTER INSERT ON `mca_three` FOR EACH ROW INSERT INTO students VALUES(null,new.RollNo,new.Password,null,null,null,null,null,null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mca_two`
--

CREATE TABLE `mca_two` (
  `RollNo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mca_two`
--

INSERT INTO `mca_two` (`RollNo`, `Password`) VALUES
('160118862021', '123456'),
('160118862022', '123456789');

--
-- Triggers `mca_two`
--
DELIMITER $$
CREATE TRIGGER `deletestudent` AFTER DELETE ON `mca_two` FOR EACH ROW DELETE FROM students WHERE RollNo=old.RollNo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertstudent` AFTER INSERT ON `mca_two` FOR EACH ROW INSERT INTO students VALUES(null,new.RollNo,new.Password,null,null,null,null,null,null)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Name` varchar(255) DEFAULT NULL,
  `RollNo` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Class` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Birthday` varchar(255) DEFAULT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Name`, `RollNo`, `Password`, `Class`, `Mobile`, `Email`, `Birthday`, `Bio`, `Address`) VALUES
('', '160118862022', '1234', '2', '', '', '', '', ''),
(NULL, '160118862022', '123456789', NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, '160118862021', '123456', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubID` varchar(255) NOT NULL,
  `Sub` varchar(255) NOT NULL,
  `FID` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubID`, `Sub`, `FID`, `Class`) VALUES
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('CN09', 'Computer Networks', 'IND1999', '2'),
('DM12', 'Data Mining', 'KP1618', '2'),
('EIT19', 'Elements of information technology', 'KP1618', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mca_one`
--
ALTER TABLE `mca_one`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `mca_three`
--
ALTER TABLE `mca_three`
  ADD UNIQUE KEY `RollNo` (`RollNo`);

--
-- Indexes for table `mca_two`
--
ALTER TABLE `mca_two`
  ADD UNIQUE KEY `RollNo` (`RollNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
