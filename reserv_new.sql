-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 192.168.5.193:3306
-- Generation Time: Mar 23, 2015 at 11:18 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reserv_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `gtype`
--

CREATE TABLE IF NOT EXISTS `gtype` (
  `ID` int(11) NOT NULL COMMENT 'Primary Race Number',
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time of Data Inserted',
  `counted` tinyint(1) NOT NULL,
  `date` datetime NOT NULL COMMENT 'First Time Data Entry',
  `jump_date` time NOT NULL COMMENT 'Jump Time on Remote',
  `Type` varchar(1) NOT NULL COMMENT 'Races Type',
  `Runners` tinyint(4) NOT NULL COMMENT 'Race Number on Remote',
  `Number` tinyint(4) NOT NULL COMMENT 'Race Partisipant from Remote',
  `Location` varchar(50) NOT NULL COMMENT 'Race Location from Remote',
  `Results` smallint(6) NOT NULL COMMENT 'Race Result from Remote',
  `Name` varchar(24) NOT NULL COMMENT 'Data Entry Staff from Remote',
  `Comment` varchar(1024) NOT NULL COMMENT 'Race Comment from Remote'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gtype`
--

INSERT INTO `gtype` (`ID`, `Time`, `counted`, `date`, `jump_date`, `Type`, `Runners`, `Number`, `Location`, `Results`, `Name`, `Comment`) VALUES
(1, '2015-03-23 04:06:16', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 10, 6, 'BALLARAT', 17, 'Indra', 'None'),
(2, '2015-03-23 04:06:41', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 11, 6, 'BALLARAT', 7, 'Indra', 'None'),
(3, '2015-03-23 04:14:30', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 11, 6, 'BALLARAT', 7, 'Indra', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `ID` int(11) NOT NULL COMMENT 'Primary Race Number',
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time of Data Inserted',
  `Counted` tinyint(1) NOT NULL,
  `Date` datetime NOT NULL COMMENT 'First Time Data Entry',
  `Jump_Date` time NOT NULL COMMENT 'Jump Time on Remote',
  `Type` varchar(1) NOT NULL COMMENT 'Races Type',
  `Runners` tinyint(4) NOT NULL COMMENT 'Race Number on Remote',
  `Number` tinyint(4) NOT NULL COMMENT 'Race Partisipant from Remote',
  `Location` varchar(50) NOT NULL COMMENT 'Race Location from Remote',
  `Results` smallint(6) NOT NULL COMMENT 'Race Result from Remote',
  `Name` varchar(24) NOT NULL COMMENT 'Data Entry Staff from Remote',
  `Comment` varchar(1024) NOT NULL COMMENT 'Race Comment from Remote'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ID`, `Time`, `Counted`, `Date`, `Jump_Date`, `Type`, `Runners`, `Number`, `Location`, `Results`, `Name`, `Comment`) VALUES
(14, '2015-03-23 04:14:51', 1, '2015-03-22 00:00:00', '14:50:00', 'T', 10, 6, 'BALLARAT', 17, 'Indra', 'Standing Start'),
(15, '2015-03-23 04:06:16', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 10, 6, 'BALLARAT', 17, 'Indra', 'None'),
(16, '2015-03-23 04:06:26', 0, '2015-03-22 00:00:00', '14:50:00', 'R', 10, 6, 'BALLARAT', 17, 'Indra', 'None'),
(17, '2015-03-23 04:06:33', 0, '2015-03-22 00:00:00', '14:50:00', 'R', 11, 6, 'BALLARAT', 7, 'Indra', 'None'),
(18, '2015-03-23 04:06:37', 1, '2015-03-22 00:00:00', '14:50:00', 'T', 11, 6, 'BALLARAT', 7, 'Indra', 'None'),
(19, '2015-03-23 04:06:41', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 11, 6, 'BALLARAT', 7, 'Indra', 'None'),
(20, '2015-03-23 04:14:30', 1, '2015-03-22 00:00:00', '14:50:00', 'G', 11, 6, 'BALLARAT', 7, 'Indra', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `rtype`
--

CREATE TABLE IF NOT EXISTS `rtype` (
  `ID` int(11) NOT NULL COMMENT 'Primary Race Number',
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time of Data Inserted',
  `counted` tinyint(1) NOT NULL,
  `date` datetime NOT NULL COMMENT 'First Time Data Entry',
  `jump_date` time NOT NULL COMMENT 'Jump Time on Remote',
  `Type` varchar(1) NOT NULL COMMENT 'Races Type',
  `Runners` tinyint(4) NOT NULL COMMENT 'Race Number on Remote',
  `Number` tinyint(4) NOT NULL COMMENT 'Race Partisipant from Remote',
  `Location` varchar(50) NOT NULL COMMENT 'Race Location from Remote',
  `Results` smallint(6) NOT NULL COMMENT 'Race Result from Remote',
  `Name` varchar(24) NOT NULL COMMENT 'Data Entry Staff from Remote',
  `Comment` varchar(1024) NOT NULL COMMENT 'Race Comment from Remote'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtype`
--

INSERT INTO `rtype` (`ID`, `Time`, `counted`, `date`, `jump_date`, `Type`, `Runners`, `Number`, `Location`, `Results`, `Name`, `Comment`) VALUES
(1, '2015-03-23 04:06:26', 0, '2015-03-22 00:00:00', '14:50:00', 'R', 10, 6, 'BALLARAT', 17, 'Indra', 'None'),
(2, '2015-03-23 04:06:33', 0, '2015-03-22 00:00:00', '14:50:00', 'R', 11, 6, 'BALLARAT', 7, 'Indra', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `ttype`
--

CREATE TABLE IF NOT EXISTS `ttype` (
  `ID` int(11) NOT NULL COMMENT 'Primary Race Number',
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time of Data Inserted',
  `counted` tinyint(1) NOT NULL,
  `date` datetime NOT NULL COMMENT 'First Time Data Entry',
  `jump_date` time NOT NULL COMMENT 'Jump Time on Remote',
  `Type` varchar(1) NOT NULL COMMENT 'Races Type',
  `Runners` tinyint(4) NOT NULL COMMENT 'Race Number on Remote',
  `Number` tinyint(4) NOT NULL COMMENT 'Race Partisipant from Remote',
  `Location` varchar(50) NOT NULL COMMENT 'Race Location from Remote',
  `Results` smallint(6) NOT NULL COMMENT 'Race Result from Remote',
  `Name` varchar(24) NOT NULL COMMENT 'Data Entry Staff from Remote',
  `Comment` varchar(1024) NOT NULL COMMENT 'Race Comment from Remote'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttype`
--

INSERT INTO `ttype` (`ID`, `Time`, `counted`, `date`, `jump_date`, `Type`, `Runners`, `Number`, `Location`, `Results`, `Name`, `Comment`) VALUES
(1, '2015-03-23 04:06:08', 1, '2015-03-22 00:00:00', '14:50:00', 'T', 10, 6, 'BALLARAT', 17, 'Indra', 'None'),
(2, '2015-03-23 04:06:37', 1, '2015-03-22 00:00:00', '14:50:00', 'T', 11, 6, 'BALLARAT', 7, 'Indra', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gtype`
--
ALTER TABLE `gtype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rtype`
--
ALTER TABLE `rtype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ttype`
--
ALTER TABLE `ttype`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gtype`
--
ALTER TABLE `gtype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Race Number',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Race Number',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `rtype`
--
ALTER TABLE `rtype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Race Number',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ttype`
--
ALTER TABLE `ttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Race Number',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
