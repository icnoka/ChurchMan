-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 10:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `churchapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`ContactId` int(11) NOT NULL,
  `ContactType` varchar(1) NOT NULL,
  `ContactDetails` varchar(255) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `ContactDescription` varchar(255) NOT NULL,
  `EnterBy` bigint(20) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ModifiedBy` bigint(20) NOT NULL,
  `ModifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`PersonId` bigint(20) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Title` varchar(1) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Occupation` int(11) DEFAULT NULL,
  `MaritalStatus` int(11) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Active` tinyint(4) NOT NULL,
  `Member` tinyint(4) NOT NULL,
  `EnteredBy` bigint(20) NOT NULL,
  `DateEntered` datetime NOT NULL,
  `ModifiedBy` bigint(20) NOT NULL,
  `DateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`PersonId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `PersonId` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
