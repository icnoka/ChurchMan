-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 12:33 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church_app`
--
CREATE DATABASE IF NOT EXISTS `church_app` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `church_app`;

-- --------------------------------------------------------

--
-- Table structure for table `lookups`
--

DROP TABLE IF EXISTS `lookups`;
CREATE TABLE IF NOT EXISTS `lookups` (
  `lookupid` int(11) NOT NULL AUTO_INCREMENT,
  `lookup#` int(11) NOT NULL,
  `text` varchar(50) NOT NULL,
  `value` varchar(5) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`lookupid`),
  KEY `LookupValue` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `lookups`
--

TRUNCATE TABLE `lookups`;
--
-- Dumping data for table `lookups`
--

INSERT INTO `lookups` (`lookupid`, `lookup#`, `text`, `value`, `comment`, `sort_order`) VALUES
(1, 1, 'Male', 'M', 'Gender', 1),
(2, 1, 'Female', 'F', 'Gender', 2),
(3, 2, 'Patience', 'PT', 'Sunday School Class', 1),
(4, 2, 'Peace', 'PE', 'Sunday School Class', 2),
(5, 2, 'Faithfulnes', 'FA', 'Sunday School Class', 3),
(6, 2, 'Goodness', 'GD', 'Sunday School Class', 4),
(7, 2, 'Gentleness', 'GT', 'Sunday School Class', 5),
(8, 2, 'Glory', 'GL', 'Sunday School Class', 6),
(9, 2, 'Hope', 'HP', 'Sunday School Class', 7),
(10, 2, 'Joy', 'JY', 'Sunday School Class', 8),
(11, 2, 'Love', 'LV', 'Sunday School Class', 9),
(12, 2, 'Kindness', 'KD', 'Sunday School Class', 10),
(13, 2, 'Holiness', 'HL', 'Sunday School Class', 11),
(14, 3, 'None', '0', 'Title', 1),
(15, 3, 'Mr.', '1', 'Title', 2),
(16, 3, 'Mrs.', '2', 'Title', 2),
(17, 3, 'Dr.', '3', 'Title', 3),
(18, 3, 'Rev.', '4', 'Title', 4);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `personid` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_no` varchar(50) NOT NULL,
  `sundayschoolclass` varchar(5) DEFAULT NULL,
  `title` varchar(5) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `othernames` varchar(150) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(3) DEFAULT NULL,
  `occupation` varchar(150) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `postaladdress` varchar(500) DEFAULT NULL,
  `contact1` varchar(500) NOT NULL,
  `contact2` varchar(500) DEFAULT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `ismember` tinyint(1) NOT NULL,
  `entryperson` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`personid`),
  UNIQUE KEY `member_no` (`member_no`),
  KEY `SundaySchoolClass` (`sundayschoolclass`),
  KEY `Title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `person`
--

TRUNCATE TABLE `person`;
--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personid`, `member_no`, `sundayschoolclass`, `title`, `surname`, `firstname`, `othernames`, `gender`, `birthdate`, `country`, `occupation`, `email`, `postaladdress`, `contact1`, `contact2`, `isdeleted`, `isactive`, `ismember`, `entryperson`, `datecreated`, `lastmodified`) VALUES
(1, 'HQTD/HP005/7626', 'HP', '0', 'ARYEE', 'MR. AND MRS. ISAAC CHARLES ARYEE', '', '', '0000-00-00', 'iom', 'io', 'ic@ee.com', 'P.O.Box,Accra', '0243767626', '', 0, 1, 0, 0, '2018-01-14 21:02:51', '2018-01-14 21:02:51'),
(2, 'HQTD/PE001/0637', 'PE', '0', 'COBBY', 'JOHNSON', 'ATSU', 'M', '0000-00-00', '', '', '', '', '024***0637', '', 0, 1, 0, 3, '2018-01-21 04:58:26', '2018-01-21 04:58:26')

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

DROP TABLE IF EXISTS `tithe`;
CREATE TABLE IF NOT EXISTS `tithe` (
  `titheid` bigint(20) NOT NULL AUTO_INCREMENT,
  `personid` bigint(20) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `datecreated` datetime NOT NULL,
  `lastmodified` datetime NOT NULL,
  `entryperson` bigint(20) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`titheid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tithe`
--

TRUNCATE TABLE `tithe`;
--
-- Dumping data for table `tithe`
--

INSERT INTO `tithe` (`titheid`, `personid`, `amount`, `month`, `year`, `datecreated`, `lastmodified`, `entryperson`, `isdeleted`) VALUES
(1, 1, '300', 'Mar', 2017, '2018-01-18 08:10:55', '2018-01-18 08:10:55', 3, 0),
(2, 2, '300', 'Sep', 2018, '2018-02-02 07:27:10', '2018-02-02 07:27:10', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `isloggedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `loginattempts` int(11) NOT NULL DEFAULT '0',
  `lockeduntil` datetime NULL DEFAULT NULL,
  `createddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `status`, `isloggedin`, `loginattempts`, `lockeduntil`, `createddate`) VALUES
(1, 'admin', 'd106b29303767527fc11214f1b325fb6', 'icnoka@gmail.com', 0, '', 0, '0000-00-00 00:00:00', '2018-01-11 19:21:44'),
(2, 'accountant', 'd106b29303767527fc11214f1b325fb6', 'icnoka@gmail.com', 0, '', 0, '0000-00-00 00:00:00', '2018-01-11 19:24:17')

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `SundaySchoolClass` FOREIGN KEY (`sundayschoolclass`) REFERENCES `lookups` (`value`),
  ADD CONSTRAINT `Title` FOREIGN KEY (`title`) REFERENCES `lookups` (`value`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
