-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2020 at 10:52 AM
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
  `auctionDescription` varchar(255) DEFAULT NULL,
  `startingPrice` int(10) UNSIGNED NOT NULL,
  `reservePrice` int(10) UNSIGNED NOT NULL,
  `increments` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `topBidNO` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  PRIMARY KEY (`auctionNo`),
  KEY `topBidNO` (`topBidNO`),
  KEY `sellerId` (`sellerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `street` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`buyerId`),
  UNIQUE KEY `email` (`email`)
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
  `street` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`sellerId`),
  UNIQUE KEY `email` (`email`)
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
