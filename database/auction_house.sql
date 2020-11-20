-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2020 at 11:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_house`
--
CREATE DATABASE IF NOT EXISTS `auction_house` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auction_house`;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auctionStatus` tinyint(1) NOT NULL DEFAULT '1',
  `category` varchar(35) DEFAULT NULL,
  `title` varchar(35) NOT NULL DEFAULT 'Unnamed Auction',
  `auctionDescription` text,
  `startingPrice` int(10) UNSIGNED NOT NULL,
  `reservePrice` int(10) UNSIGNED DEFAULT NULL,
  `increments` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `sellerId` int(11) NOT NULL,
  PRIMARY KEY (`auctionNo`),
  KEY `sellerId` (`sellerId`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionNo`, `auctionStatus`, `category`, `title`, `auctionDescription`, `startingPrice`, `reservePrice`, `increments`, `startDate`, `endDate`, `sellerId`) VALUES
(140, 1, 'Category1', '434324', '4324234', 123, 123, 1, '2020-11-18', '2020-11-18', 123456),
(141, 1, 'Category2', '132', '123', 123, 123, 1, '2020-11-19', '2020-11-19', 123456),
(142, 1, 'Category1', 'a126', 'a126', 100, 150, 1, '2020-11-18', '2020-11-18', 123456),
(143, 1, 'Category2', 'b11', 'b11', 50, 123, 1, '2020-11-19', '2020-11-19', 123456),
(144, 1, 'Category1', 'c61', 'c61', 666, 1000, 1, '2020-11-19', '2020-11-19', 123456),
(145, 1, 'Category2', 'b323', 'b323', 96, 150, 1, '2020-11-18', '2020-11-18', 123456),
(146, 1, 'Category3', 'b11', 'b11', 7, 10, 1, '2020-11-19', '2020-11-19', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `bidNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bidStatus` tinyint(1) NOT NULL DEFAULT '1',
  `bidAmount` int(10) UNSIGNED NOT NULL,
  `bidTime` datetime NOT NULL,
  PRIMARY KEY (`bidNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `buyerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`buyerId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyeraddress`
--

DROP TABLE IF EXISTS `buyeraddress`;
CREATE TABLE IF NOT EXISTS `buyeraddress` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL,
  `postcode` varchar(35) NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`addressId`),
  KEY `buyerId` (`buyerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyertel`
--

DROP TABLE IF EXISTS `buyertel`;
CREATE TABLE IF NOT EXISTS `buyertel` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) DEFAULT NULL,
  `backupTelNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`buyerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `createbid`
--

DROP TABLE IF EXISTS `createbid`;
CREATE TABLE IF NOT EXISTS `createbid` (
  `bidNo` int(10) UNSIGNED NOT NULL,
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`bidNo`),
  KEY `auctionNo` (`auctionNo`),
  KEY `buyerId` (`buyerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`sellerId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selleraddress`
--

DROP TABLE IF EXISTS `selleraddress`;
CREATE TABLE IF NOT EXISTS `selleraddress` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL,
  `postcode` varchar(35) NOT NULL,
  `sellerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`addressId`),
  KEY `sellerId` (`sellerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellertel`
--

DROP TABLE IF EXISTS `sellertel`;
CREATE TABLE IF NOT EXISTS `sellertel` (
  `sellerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) DEFAULT NULL,
  `backupTelNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`sellerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `watching`
--

DROP TABLE IF EXISTS `watching`;
CREATE TABLE IF NOT EXISTS `watching` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `auctionNo` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`buyerId`,`auctionNo`),
  KEY `auctionNo` (`auctionNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
