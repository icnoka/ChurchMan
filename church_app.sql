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
(18, 3, 'Rev.', '4', 'Title', 4),
(19, 4, 'None', '0', 'Department', 1),
(20, 4, 'Ussher.', '1', 'Department', 2),
(21, 4, 'Music.', '2', 'Department', 2),
(22, 4, 'Protocol.', '3', 'Department', 3),
(23, 4, 'Aoudio.', '4', 'Department', 4);;

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
(2, 'HQTD/PE001/0637', 'PE', '0', 'COBBY', 'JOHNSON', 'ATSU', 'M', '0000-00-00', '', '', '', '', '0245400637', '', 0, 1, 0, 3, '2018-01-21 04:58:26', '2018-01-21 04:58:26'),
(3, 'HQTD/PE002/4144', 'PE', '0', 'ASUO', 'ROSELINE', 'NULL', 'F', '0000-00-00', '', '', '', '', '0208404144', '', 0, 1, 0, 3, '2018-01-21 05:04:51', '2018-01-21 05:04:51'),
(4, 'HQTD/PT001/7118', 'PT', '0', 'MARK-HANSON', 'DOROTHY', 'NULL', 'F', '0000-00-00', '', '', '', '', '0244697188', '', 0, 1, 0, 3, '2018-01-21 05:16:54', '2018-01-21 05:16:54'),
(5, 'HQTD/PT012/3498', 'PT', '0', 'AMARTEY', 'FAUSTINA', '', 'F', '0000-00-00', '', '', '', '', '0277813498', '', 0, 1, 0, 3, '2018-01-21 05:20:27', '2018-01-21 05:20:27'),
(6, 'HQTD/PT013/4179', 'PT', '0', 'MARK-HANSON', 'CYNTHIA', '', 'F', '0000-00-00', '', '', '', '', '0244064179', '', 0, 1, 0, 3, '2018-01-21 05:22:26', '2018-01-21 05:22:26'),
(7, 'HQTD/PT014/5489', 'PT', '0', 'MARK-HANSON', 'JOHN', 'WILLIAM', 'M', '0000-00-00', '', '', '', '', '0243255489', '', 0, 1, 0, 3, '2018-01-21 05:24:06', '2018-01-21 05:24:06'),
(8, 'HQTD/GT001/5210', 'GT', '0', 'DOKU', 'TIMOTHY', '', 'M', '0000-00-00', '', '', '', '', '0243645210', '', 0, 1, 0, 3, '2018-01-21 05:25:50', '2018-01-21 05:25:50'),
(9, 'HQTD/GT002/8828', 'GT', '0', 'AGGREY', 'ISAAC', '', 'M', '0000-00-00', '', '', '', '', '0244288828', '', 0, 1, 0, 3, '2018-01-21 06:00:58', '2018-01-21 06:00:58'),
(10, 'HQTD/GT003/1890', 'GT', '0', 'SENCHEREY', 'PATIENCE', '', 'F', '0000-00-00', '', '', '', '', '0244261890', '', 0, 1, 0, 3, '2018-01-21 06:02:42', '2018-01-21 06:02:42'),
(11, 'HQTD/GT004/6706', 'GT', '3', 'ABLORH', 'E.', 'JERRY', 'M', '0000-00-00', '', '', '', '', '0244656706', '', 0, 1, 0, 3, '2018-01-21 06:06:10', '2018-01-21 06:06:10'),
(13, 'HQTD/KD001/1378', 'KD', '1', 'QUAYE', 'SETH', '', 'M', '0000-00-00', '', '', '', '', '0268811378', '', 0, 1, 0, 3, '2018-01-21 06:44:04', '2018-01-21 06:44:04'),
(14, 'HQTD/KD002/6880', 'KD', '2', 'QUAYE', 'GLORIA', 'A.', 'F', '0000-00-00', '', '', '', '', '0264666880', '', 0, 1, 0, 3, '2018-01-21 06:45:09', '2018-01-21 06:45:09'),
(19, 'HQTD/KD004/0858', 'KD', '0', 'SAMPANA', 'JANET', '', 'F', '0000-00-00', '', '', '', '', '0244580858', '', 0, 1, 0, 3, '2018-01-21 07:25:17', '2018-01-21 07:25:17'),
(20, 'HQTD/KD005/4060', 'KD', '0', 'LAAR', 'DAVID', '', 'M', '0000-00-00', '', '', '', '', '0549604060', '', 0, 1, 0, 3, '2018-01-21 07:26:42', '2018-01-21 07:26:42'),
(21, 'HQTD/LV001/5462', 'LV', '0', 'ADJIRAKOR', 'DIANA', '', 'F', '0000-00-00', '', '', '', '', '0241115462', '', 0, 1, 0, 3, '2018-01-21 07:28:06', '2018-01-21 07:28:06'),
(22, 'HQTD/LV002/2149', 'LV', '1', 'HOTTOR', 'NICHOLAS', '', 'M', '0000-00-00', '', '', '', '', '0243002149', '', 0, 1, 0, 3, '2018-01-21 07:29:45', '2018-01-21 07:29:45'),
(23, 'HQTD/HP002/6292', 'HP', '0', 'ANABA', 'LAWRENCIA', '', 'F', '0000-00-00', '', '', '', '', '0240466292', '', 0, 1, 0, 3, '2018-01-21 07:48:20', '2018-01-21 07:48:20'),
(24, 'HQTD/HP003/6331', 'HP', '0', 'MENSAH', 'MAVIS', '', 'F', '0000-00-00', '', '', '', '', '0240666331', '', 0, 1, 0, 3, '2018-01-21 07:49:27', '2018-01-21 07:49:27'),
(25, 'HQTD/HP004/', 'HP', '2', 'OGYIRI', 'PEARL', '', 'F', '0000-00-00', '', '', '', '', '.', '', 0, 1, 0, 3, '2018-01-21 07:50:59', '2018-01-21 07:50:59'),
(26, 'HQTD/HP007/1089', 'HP', '0', 'MENSAH', 'MR. AND MRS. HENRY', '', '', '0000-00-00', '', '', '', '', '0269601089', '', 0, 1, 0, 3, '2018-01-21 08:01:59', '2018-01-21 08:01:59'),
(27, 'HQTD/GD001/6643', 'GD', '0', 'TETTEH', 'COMFORT', 'ANIMA', 'F', '0000-00-00', '', '', '', '', '0249676643', '', 0, 1, 0, 3, '2018-01-21 09:08:36', '2018-01-21 09:08:36'),
(28, 'HQTD/GL006/0279', 'GL', '4', 'SARFO', 'PATIENCE', 'N. S.', 'F', '0000-00-00', '', '', '', '', '0249220279', '', 0, 1, 0, 3, '2018-01-21 09:30:11', '2018-01-21 09:30:11'),
(29, 'HQTD/GL007/6998', 'GL', '0', 'SAMPONG', 'STELLA', 'A.', 'F', '0000-00-00', '', '', '', '', '0244516998', '', 0, 1, 0, 3, '2018-01-21 09:34:54', '2018-01-21 09:34:54'),
(30, 'HQTD/GL008/8189', 'GL', '0', 'OWUSU-SECHERE', 'JOHN', '', 'M', '0000-00-00', '', '', '', '', '0576848189', '', 0, 1, 0, 3, '2018-01-21 09:38:51', '2018-01-21 09:38:51'),
(31, 'HQTD/GL009/8811', 'GL', '0', 'SMITH', 'BEN', '', 'M', '0000-00-00', '', '', '', '', '0277998811', '', 0, 1, 0, 3, '2018-01-21 09:40:19', '2018-01-21 09:40:19'),
(32, 'HQTD/GL0010/8007', 'GL', '0', 'AMPADU', 'GEORGE', '', 'M', '0000-00-00', '', '', '', '', '0244628007', '', 0, 1, 0, 3, '2018-01-21 09:41:34', '2018-01-21 09:41:34'),
(33, 'HQTD/GL011/5043', 'GL', '2', 'MENSAH', 'VICTORIA', '', 'F', '0000-00-00', '', '', '', '', '0208475043', '', 0, 1, 0, 3, '2018-01-21 09:42:47', '2018-01-21 09:42:47'),
(34, 'HQTD/GL012/8063', 'GL', '2', 'BAAFI', 'MARGARET', '', 'F', '0000-00-00', '', '', '', '', '0276348063', '', 0, 1, 0, 3, '2018-01-21 09:43:57', '2018-01-21 09:43:57'),
(36, 'HQTD/FA001/2583', 'FA', '1', 'MENSAH', 'ARNOLD', '', 'M', '0000-00-00', '', '', '', '', '0249042583', '', 0, 1, 0, 3, '2018-01-21 09:55:21', '2018-01-21 09:55:21'),
(37, 'HQTD/JY001/1474', 'JY', '0', 'ADDO', 'MARK', '', 'M', '0000-00-00', '', '', '', '', '0277731474', '', 0, 1, 0, 3, '2018-01-21 09:57:17', '2018-01-21 09:57:17'),
(38, 'HQTD/JY015/7549', 'JY', '2', 'AFLAKPUI', 'VICTORIA', '', 'F', '0000-00-00', '', '', '', '', '0248767549', '', 0, 1, 0, 3, '2018-01-21 09:58:44', '2018-01-21 09:58:44'),
(39, 'HQTD/HL001/9599', 'HL', '0', 'BENSAH', 'CONFIDENCE', 'ETORNAM', 'M', '0000-00-00', '', '', '', '', '0264069599', '', 0, 1, 0, 3, '2018-01-21 10:00:27', '2018-01-21 10:00:27'),
(40, 'HQTD/GT005/8307', 'GT', '0', 'WELBECK', 'THEOPHILUS', '', 'M', '0000-00-00', '', '', '', '', '0207238307', '', 0, 1, 0, 3, '2018-01-21 10:12:54', '2018-01-21 10:12:54');

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
-- (1, 1, '300', 'Mar', 2017, '2018-01-18 08:10:55', '2018-01-18 08:10:55', 3, 0),
-- (2, 36, '300', 'Sep', 2018, '2018-02-02 07:27:10', '2018-02-02 07:27:10', 3, 0);

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
  `lockeduntil` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `status`, `isloggedin`, `loginattempts`, `lockeduntil`, `createddate`) VALUES
(1, 'aryeei', 'd106b29303767527fc11214f1b325fb6', 'icnoka@gmail.com', 0, '', 0, '0000-00-00 00:00:00', '2018-01-11 19:21:44'),
(2, 'admin', 'd106b29303767527fc11214f1b325fb6', 'icnoka@gmail.com', 0, '', 0, '0000-00-00 00:00:00', '2018-01-11 19:24:17'),
(3, 'member', 'd106b29303767527fc11214f1b325fb6', 'icnoka@hotmail.com', 0, '', 0, '0000-00-00 00:00:00', '2018-01-11 21:19:41');

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
