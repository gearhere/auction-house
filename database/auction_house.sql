-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 25, 2020 at 08:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `auction` (
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `auctionStatus` tinyint(1) NOT NULL DEFAULT '1',
  `category` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Other',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unnamed Auction',
  `auctionDescription` text COLLATE utf8mb4_unicode_ci,
  `startingPrice` int(10) UNSIGNED NOT NULL,
  `reservePrice` int(10) UNSIGNED DEFAULT NULL,
  `increments` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `sellerId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auctionwinner`
--

CREATE TABLE `auctionwinner` (
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bidNo` int(10) UNSIGNED NOT NULL,
  `bidStatus` tinyint(1) NOT NULL DEFAULT '0',
  `bidAmount` int(10) UNSIGNED NOT NULL,
  `bidTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyeraddress`
--

CREATE TABLE `buyeraddress` (
  `addressId` int(11) NOT NULL,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyertel`
--

CREATE TABLE `buyertel` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `createbid`
--

CREATE TABLE `createbid` (
  `bidNo` int(10) UNSIGNED NOT NULL,
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerId` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selleraddress`
--

CREATE TABLE `selleraddress` (
  `addressId` int(11) NOT NULL,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sellerId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellertel`
--

CREATE TABLE `sellertel` (
  `sellerId` int(10) UNSIGNED NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watching`
--

CREATE TABLE `watching` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `auctionNo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionNo`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `auctionwinner`
--
ALTER TABLE `auctionwinner`
  ADD PRIMARY KEY (`auctionNo`),
  ADD KEY `buyerId` (`buyerId`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bidNo`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `buyeraddress`
--
ALTER TABLE `buyeraddress`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `buyerId` (`buyerId`);

--
-- Indexes for table `buyertel`
--
ALTER TABLE `buyertel`
  ADD PRIMARY KEY (`buyerId`);

--
-- Indexes for table `createbid`
--
ALTER TABLE `createbid`
  ADD PRIMARY KEY (`bidNo`),
  ADD KEY `auctionNo` (`auctionNo`),
  ADD KEY `buyerId` (`buyerId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `selleraddress`
--
ALTER TABLE `selleraddress`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `sellertel`
--
ALTER TABLE `sellertel`
  ADD PRIMARY KEY (`sellerId`);

--
-- Indexes for table `watching`
--
ALTER TABLE `watching`
  ADD PRIMARY KEY (`buyerId`,`auctionNo`),
  ADD KEY `auctionNo` (`auctionNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bidNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyeraddress`
--
ALTER TABLE `buyeraddress`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selleraddress`
--
ALTER TABLE `selleraddress`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
