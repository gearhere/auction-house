-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2020 at 06:17 PM
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
DROP DATABASE IF EXISTS `auction_house`;
CREATE DATABASE IF NOT EXISTS `auction_house` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `auction_house`;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auctionNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auctionStatus` tinyint(1) NOT NULL DEFAULT '1',
  `category` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Other',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unnamed Auction',
  `auctionDescription` text COLLATE utf8mb4_unicode_ci,
  `startingPrice` int(10) UNSIGNED NOT NULL,
  `reservePrice` int(10) UNSIGNED DEFAULT NULL,
  `increments` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `sellerId` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`auctionNo`),
  KEY `sellerId` (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auctionwinner`
--

DROP TABLE IF EXISTS `auctionwinner`;
CREATE TABLE IF NOT EXISTS `auctionwinner` (
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`auctionNo`),
  KEY `buyerId` (`buyerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `buyerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`buyerId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyeraddress`
--

DROP TABLE IF EXISTS `buyeraddress`;
CREATE TABLE IF NOT EXISTS `buyeraddress` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`addressId`),
  KEY `buyerId` (`buyerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyertel`
--

DROP TABLE IF EXISTS `buyertel`;
CREATE TABLE IF NOT EXISTS `buyertel` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`buyerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `sellerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`sellerId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selleraddress`
--

DROP TABLE IF EXISTS `selleraddress`;
CREATE TABLE IF NOT EXISTS `selleraddress` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sellerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`addressId`),
  KEY `sellerId` (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellertel`
--

DROP TABLE IF EXISTS `sellertel`;
CREATE TABLE IF NOT EXISTS `sellertel` (
  `sellerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `auctionwinner`
--
ALTER TABLE `auctionwinner`
  ADD CONSTRAINT `auctionwinner_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `auctionwinner_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `buyeraddress`
--
ALTER TABLE `buyeraddress`
  ADD CONSTRAINT `buyeraddress_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `buyertel`
--
ALTER TABLE `buyertel`
  ADD CONSTRAINT `buyertel_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `createbid`
--
ALTER TABLE `createbid`
  ADD CONSTRAINT `createbid_ibfk_1` FOREIGN KEY (`bidNo`) REFERENCES `bid` (`bidNo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `createbid_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `createbid_ibfk_3` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `selleraddress`
--
ALTER TABLE `selleraddress`
  ADD CONSTRAINT `selleraddress_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sellertel`
--
ALTER TABLE `sellertel`
  ADD CONSTRAINT `sellertel_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `watching`
--
ALTER TABLE `watching`
  ADD CONSTRAINT `watching_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `watching_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
