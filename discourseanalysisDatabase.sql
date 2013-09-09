-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2013 at 09:57 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discourseanalysis`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `Owner` varchar(40) NOT NULL,
  `fileName` varchar(35) NOT NULL,
  `fileLocation` varchar(150) NOT NULL,
  `lastUpdate` datetime NOT NULL,
  PRIMARY KEY (`fileName`,`fileLocation`),
  KEY `fk_owner` (`Owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Username` varchar(40) NOT NULL,
  `fileName` varchar(50) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  PRIMARY KEY (`Username`,`fileName`),
  KEY `fk_filename` (`fileName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `Username` varchar(40) NOT NULL,
  `startTime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `sessionID` int(15) NOT NULL,
  PRIMARY KEY (`sessionID`),
  KEY `fk_username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempusersinfo`
--

CREATE TABLE IF NOT EXISTS `tempusersinfo` (
  `confirm_code` varchar(65) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE IF NOT EXISTS `usersinfo` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`Owner`) REFERENCES `usersinfo` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `fk2_username` FOREIGN KEY (`Username`) REFERENCES `usersinfo` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_filename` FOREIGN KEY (`fileName`) REFERENCES `files` (`fileName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`Username`) REFERENCES `usersinfo` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
