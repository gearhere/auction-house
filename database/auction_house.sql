-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2020 at 08:20 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionNo`, `auctionStatus`, `category`, `title`, `auctionDescription`, `startingPrice`, `reservePrice`, `increments`, `startDate`, `endDate`, `sellerId`) VALUES
(1, 0, 'HomeandGarden', 'Crushed Velvet Shell Scallop Accent Occasional Chair Armchair Dining Furniture', 'Perfect for a lounge, dining or bedroom setting, the chair is upholstered in crushed velvet with colour options of Grey, Midnight Blue, Teal and Dusky Pink. A great feature for any home, very comfortable with extra padded cushioning in the seat and back rest. The chair comes with deep cushioning on the seat and back providing you with comfort and style.', 58, NULL, 1, '2020-11-16 00:00:00', '2020-11-11 23:01:30', 2),
(2, 1, 'Fashion', 'Bridesmaid Dress Size 12', 'Brand new with tags size 12 purchased from bhs rrp 80 Exquisitely elegant the Daisy bridesmaid dress features a strapless bodice with flattering ruching and a gem embellished satin waistband trim. With delicate gathering at the waistband.', 20, NULL, 1, '2020-10-01 15:40:11', '2020-11-30 10:00:00', 2),
(3, 1, 'Electronics', 'Shark DuoClean Cordless Vacuum', 'Shark Manufacturer Refurbished products are returned products which have been professionally checked, cleaned and restored. Refurbished products may have minor cosmetic imperfections and may not be in their original packaging.', 185, 300, 1, '2020-11-10 00:11:00', '2020-12-28 19:11:19', 3),
(4, 1, 'CollectablesandArt', 'Inspirational Prints A3/A4/A5', 'Printed on 260gsm satin paper used in art galleries. Money back guarantee if you \'re in any way unhappy. Frame option available shown at the bottom of the size dropdown. ', 10, 50, 1, '2020-11-01 00:11:44', '2020-12-25 00:00:00', 4),
(5, 1, 'SportsandHobbies', 'Mountain Bike/Bicycle', 'New: A brand-new, unused, unopened and undamaged item in original retail packaging (where packaging is applicable). If the item comes direct from a manufacturer, it may be delivered in non-retail packaging, such as a plain or unprinted box or plastic bag. See the seller\'s listing for full details. ', 450, NULL, 1, '2020-11-16 18:11:19', '2020-12-03 00:00:00', 5),
(6, 1, 'HomeandGarden', 'Memory Foam Mattress', 'Brand: bed-world\r\nMPN: does not apply\r\nHeadboard Height: 20 inch\r\nRequired Tools:	ScrewdriverManufacturer Warranty: 1 year', 108, 400, 1, '2020-11-09 19:11:19', '2020-12-01 19:11:19', 1),
(7, 1, 'Motors', 'TDI V6 Automatic', 'This jeep has only ever had 2 owners and its all been my family\r\nWas my uncles at first then my dads then my brothers then myself. I know the jeep inside out\r\nAny questions please ask\r\n', 35000, NULL, 1, '2020-11-22 19:11:19', '2021-04-01 19:11:19', 1),
(8, 1, 'BusiandIndu', 'Pallet Collars X 10 (1200 X 1000mm)', 'Wooden collars great for raised garden beds. These are not new, in good used condition, colours vary. Sizes 1200 x 1000mm 10 for 65 approx 7 high. Can be stacked up on top of each other for required height. Collection Banbury or can be delivered for fuel cost. More than 10 available if required.', 70, 150, 1, '2020-11-21 19:40:19', '2020-12-25 23:00:00', 2),
(9, 1, 'Health', 'Oral-B Toothbrush Heads Pack ', 'Oral-B CrossAction Black Toothbrush Heads Pack Of 4 Replacement Refills', 15, NULL, 1, '2020-11-22 19:11:19', '2020-11-30 19:11:19', 3),
(10, 1, 'Media', 'Last Christmas [DVD]', 'Format: DVD\r\nStyle: Cult\r\nActor: Emilia Clarke\r\nGenre: Comedy\r\nSub-Genre: Christmas\r\nLanguage: English', 7, NULL, 1, '2020-11-10 19:11:19', '2020-12-03 19:11:19', 4),
(11, 1, 'Others', '4 Bedroom House In France', 'The floor was an old-fashioned parquet with a blend of deep homely browns and the walls were the greens of summer gardens meeting a bold white baseboard. The banister was a twirl of a branch.', 32500, NULL, 1, '2020-11-17 19:44:21', '2021-08-01 00:00:00', 5),
(12, 1, 'Others', 'Unnamed Auction', '', 100, 110, 1, '2020-11-27 17:04:00', '2020-11-28 17:04:00', 2),
(149, 0, 'HomeandGarden', 'Newgate Modern Black Square Mantel Clock with No-Tick Silent Sweep Movement', 'Mid-Century Modern Mantel Clock | Black/Cream, Modern space-age design fuses with mid-Century retro style in the Henry mantel clock. A rectangular case coated in matt black silicone holds a cream dial. The contemporary mantel clock stands on elongated angled legs.', 20, NULL, 1, '2020-11-10 00:00:00', '2020-11-12 00:00:00', 3),
(150, 0, 'HomeandGarden', 'UNION JACK & RETRO Design Chenille Cushion Covers or Filled Cushions 18\" / 45cm', 'Union jack (british flag) Navy, Red and White Cushion cover or Filled Cushion. Or options of various Retro Vintge themed designs. Size:18\"x 18\"(45cm x 45cm); Luxury Chenille Fabric; 70% Cotton 30% Polyester', 4, NULL, 1, '2020-11-05 00:00:00', '2020-11-10 00:00:00', 4),
(151, 0, 'HomeandGarden', 'Digihome PTDR43UHDS2 43 Inch Smart 4K Ultra HD LED TV Freeview Play', 'The Digihome PTDR43UHDS2 43 Inch Smart 4K Ultra HD LED TV is a great large screen television that would be ideal for a family home. The 4K Ultra HD resolution provides a picture that is four times the resolution of Full HD, this gives you a stunning life-like image with beautiful colours and detail. The Freeview tuner gives you access to plenty of TV channels for free without subscription while Freeview Play gives you quick and easy access to on demand services ensuring you never miss your favourite shows.', 200, NULL, 1, '2020-11-15 00:00:00', '2020-11-26 23:07:00', 5),
(152, 1, 'HomeandGarden', 'HOMCOM Wooden 4 Tiers Storage Display Unit Bookshelf Bookcase Dividers S Shaped', 'This S Shape shelf can be used as a bookshelf or cupboard cabinet in your home, office and study. Made of high quality particle board, surface is matt finish effect carcass, made from melamine, water and scratch resistant.', 47, NULL, 1, '2020-11-10 00:00:00', '2020-12-27 00:00:00', 1),
(153, 1, 'Electronics', 'Apple iPad 5th Gen 32GB Retina 2017 WiFi Space Grey Refurbished 5th Generation', 'Seller notes: \"的Minor scratching to screen and case. Perfect use for School, College, Small Business. Battery has been tested and is working. 1 Year RTB warranty included. Wi-Fi enabled. Ready to use out of the box.”Offering a host of features with an eye-catching design, the Apple iPad 32 GB tablet PC in Space Grey certainly packs a punch. Powered by the 1.4 GHz Apple A6X Prozessor and running on iOS operating system, this iPad adapts to your needs with maximum performance, enhanced battery life, and an unparalleled visual experience. Moreover, the 9.7-inch LED-backlit Multi-Touch screen with IPS technology delivers razor-sharp images and videos with vibrant colors and rich detail. With a 32 GB memory capacity, the Apple iPad lets you save all your multimedia files. Plus, the tablet supports Wi-Fi and allows you to surf the Web and download videos and games at lightning-fast speed. What’s more, the 8 MP camera enables you to capture stunning, high-quality images with amazing clarity.', 230, 180, 1, '2020-11-06 00:00:00', '2020-12-19 00:00:00', 2),
(154, 0, 'Electronics', 'Apple iMac Core i5 3.4GHz 21.5 inch Retina 4K Mid 2017 1TB Fusion 8GB Ram A1418', 'Seller notes:	“Sourced from Apple then fully tested and graded by our on-site technicians. We run 80 functional tests on each product to ensure the best quality for your device”; The Apple iMac desktop computer with 4K retina display renders performance and multi-tasking efficiencies with the integrated 8 GB memory. This PC is powered by a reliable 3.0 GHz processor. The 1 TB provides storage space for digital content. This Apple desktop features Mac OS Sierra operation system and a convenient 21.5-inch display.', 899, NULL, 1, '2020-11-16 00:00:00', '2020-11-20 00:00:00', 3),
(155, 0, 'Electronics', 'Razer Raiju Ultimate Wireless & Wired Gaming Controller - Mecha-Tactile Button', 'The Razer Raiju Ultimate is the wireless PS4 controller that allows advanced customization via our own mobile app. Whether it’s remapping multi-function buttons or adjusting sensitivity options, you have full control from the palm of your hand. Take it further with interchangeable thumbsticks, and choose either a tilting or individual D-Pad button layout. Enable functions on the fly with a quick control panel, and activate Hair Trigger Mode for quick-firing action. Comes with 3 connectivity modes: PS4, USB and PC without manual repairing for optimal efficiency. Also features wired mode.', 200, NULL, 1, '2020-11-16 00:00:00', '2020-11-19 00:00:00', 4),
(156, 1, 'Electronics', 'FIFA 21 (Xbox One) In Stock Now Brand New & Sealed Free UK P&P	WIN AS ONE in EA SPORTS™', 'FIFA 21 on PlayStationⓇ4, Xbox One, and PC with new ways to team up and express yourself on the streets and in the stadium. Powered by Frostbite™, FIFA 21 raises the game with fresh features that let you enjoy even bigger victories together in VOLTA FOOTBALL and FIFA Ultimate Team™, feel a new level of gameplay realism that rewards you for your creativity and control, manage every moment in Career Mode, and experience unrivaled authenticity that gives you the most true-to-life experience of The World’s Game.', 50, NULL, 1, '2020-11-16 00:00:00', '2020-12-25 00:00:00', 5),
(157, 1, 'Electronics', 'Microsoft Official Xbox Armed Forces II Controller Special Edition 12M Warranty', 'Condition:Opened – never used; Own the battlefield with the Xbox Wireless Controller - Armed Forces II Special Edition featuring a modern camouflage pattern and textured grip for enhanced comfort. Enjoy custom button mapping and plug in any compatible headset with the 3.5mm stereo headset jack. And with Bluetooth technology, play your favourite games on Windows 10 PCs and tablets.', 50, 20, 1, '2020-11-05 00:00:00', '2020-12-29 00:00:00', 1),
(159, 0, 'Others', 'Emmi Coffee', 'coffe', 1, 3, 1, '2020-11-24 21:29:09', '2020-11-24 01:33:00', 1),
(162, 0, 'Others', 'Tesco Milk', 'organic', 5, 10, 1, '2020-11-24 22:57:14', '2020-11-25 19:30:00', 1),
(166, 0, 'Fashion', 'Wallet', 'A simple paper wallet.', 23, 50, 1, '2020-11-27 13:22:39', '2020-11-27 15:38:50', 1),
(168, 1, 'SportsandHobbies', 'Football', 'World Cup Souvenir Soccer', 2000, 1000, 1, '2020-11-27 14:03:13', '2020-12-01 18:06:00', 1),
(169, 1, 'Electronics', 'Apple iPod', 'Classic iPod from 2010', 500, 501, 1, '2020-11-27 16:15:59', '2021-01-07 17:17:00', 4);

--
-- Triggers `auction`
--
DROP TRIGGER IF EXISTS `check_cat`;
DELIMITER $$
CREATE TRIGGER `check_cat` BEFORE INSERT ON `auction` FOR EACH ROW BEGIN 
	IF NEW.category  NOT IN ('Fashion', 'Electronics', 'SportsandHobbies', 'HomeandGarden', 'Motors', 'CollectablesandArt', 'BusiandIndu', 'Health', 'Media', 'Others')
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Out of range of categories!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_endDate`;
DELIMITER $$
CREATE TRIGGER `check_endDate` BEFORE INSERT ON `auction` FOR EACH ROW BEGIN 
	IF NEW.endDate < NOW()
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "End date cannot be earlier than now!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_reservePrice`;
DELIMITER $$
CREATE TRIGGER `check_reservePrice` BEFORE INSERT ON `auction` FOR EACH ROW BEGIN 
	IF NEW.reservePrice <= NEW.startingPrice
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Reserve price should be higher than the starting price!";
    end if;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `auctionwinner`
--

INSERT INTO `auctionwinner` (`auctionNo`, `buyerId`) VALUES
(155, 1),
(151, 2),
(162, 2),
(150, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidNo`, `bidStatus`, `bidAmount`, `bidTime`) VALUES
(1, 0, 250, '2020-11-22 12:28:23'),
(2, 1, 60, '2020-11-17 08:36:29'),
(3, 1, 210, '2020-11-18 07:25:33'),
(4, 1, 300, '2020-11-25 17:18:01'),
(5, 1, 200, '2020-11-25 17:20:39'),
(6, 1, 300, '2020-11-25 19:28:40'),
(7, 0, 21, '2020-11-26 22:46:41'),
(8, 1, 251, '2020-11-26 23:02:14'),
(9, 0, 16, '2020-11-26 23:59:13'),
(10, 1, 15, '2020-11-27 15:12:27'),
(11, 0, 25, '2020-11-27 15:13:02'),
(12, 0, 26, '2020-11-27 15:13:29'),
(13, 1, 27, '2020-11-27 15:16:01'),
(14, 1, 45, '2020-11-27 15:37:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerId`, `email`, `password`, `firstName`, `lastName`, `level`) VALUES
(1, 'yang.zou@ucl.ac.uk', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'yang', 'zou', 0),
(2, 'ex@qq.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'John', 'Joe', 0),
(3, '285@gmail.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'yyy', 'zzz', 0);

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

--
-- Triggers `buyertel`
--
DROP TRIGGER IF EXISTS `check_bTel_length`;
DELIMITER $$
CREATE TRIGGER `check_bTel_length` BEFORE INSERT ON `buyertel` FOR EACH ROW BEGIN 
	IF LENGTH(NEW.telNo) < 10 OR LENGTH(NEW.telNo) > 15 OR LENGTH(NEW.backupTelNo) < 10 OR LENGTH(NEW.backupTelNo) > 15
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Telephone number too short or too long!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_bTel_unique`;
DELIMITER $$
CREATE TRIGGER `check_bTel_unique` BEFORE INSERT ON `buyertel` FOR EACH ROW BEGIN 
	IF NEW.telNo = NEW.backupTelNo
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Duplicate phone number!";
    end if;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `createbid`
--

INSERT INTO `createbid` (`bidNo`, `auctionNo`, `buyerId`) VALUES
(1, 151, 1),
(2, 157, 1),
(3, 155, 1),
(4, 156, 3),
(5, 150, 3),
(6, 162, 2),
(7, 2, 2),
(8, 151, 2),
(9, 9, 2),
(10, 4, 1),
(11, 2, 1),
(12, 2, 1),
(13, 2, 1),
(14, 166, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerId`, `email`, `password`, `firstName`, `lastName`, `level`) VALUES
(1, 'ao.chen@gmail.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'ao', 'chen', 0),
(2, '623bff@outlook.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'star', 'alexander', 0),
(3, 'bondxx@163.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'Bond', 'James', 0),
(4, 'hugh@gmail.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'Hugh', 'Tander', 0),
(5, 'alice.pi@ucl.ac.uk', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'puma', 'alice', 0);

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

--
-- Triggers `sellertel`
--
DROP TRIGGER IF EXISTS `check_sTel`;
DELIMITER $$
CREATE TRIGGER `check_sTel` BEFORE INSERT ON `sellertel` FOR EACH ROW BEGIN 
	IF LENGTH(NEW.telNo) < 10 OR LENGTH(NEW.telNo) > 15 OR LENGTH(NEW.backupTelNo) < 10 OR LENGTH(NEW.backupTelNo) > 15
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Telephone number too short or too long!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_sTel_unique`;
DELIMITER $$
CREATE TRIGGER `check_sTel_unique` BEFORE INSERT ON `sellertel` FOR EACH ROW BEGIN 
	IF NEW.telNo = NEW.backupTelNo
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Duplicate phone number!";
    end if;
END
$$
DELIMITER ;

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
-- Dumping data for table `watching`
--

INSERT INTO `watching` (`buyerId`, `auctionNo`) VALUES
(1, 4),
(3, 6),
(1, 8),
(1, 153),
(3, 153),
(1, 156);

--
-- Triggers `watching`
--
DROP TRIGGER IF EXISTS `check_watching`;
DELIMITER $$
CREATE TRIGGER `check_watching` BEFORE INSERT ON `watching` FOR EACH ROW BEGIN 
	IF NEW.buyerId IN (SELECT buyerId FROM auctionwinner) OR NEW.auctionNo IN (SELECT auctionNo FROM auction WHERE auctionStatus = 0)
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Cannot watch an ended auction!";
    end if;
END
$$
DELIMITER ;

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

DELIMITER $$
--
-- Events
--
DROP EVENT `UPDATE AUCTION STATUS`$$
CREATE DEFINER=`root`@`localhost` EVENT `UPDATE AUCTION STATUS` ON SCHEDULE EVERY 10 SECOND STARTS '2020-11-25 19:07:20' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE auction
SET 
auctionStatus = false
WHERE UNIX_TIMESTAMP(endDate) < UNIX_TIMESTAMP()$$

DROP EVENT `UPDATE WINNER`$$
CREATE DEFINER=`root`@`localhost` EVENT `UPDATE WINNER` ON SCHEDULE EVERY 10 SECOND STARTS '2020-11-25 19:12:53' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO auctionwinner SELECT createbid.auctionNo, createbid.buyerId FROM auction,bid,createbid WHERE createbid.auctionNo NOT in (SELECT auctionNo FROM auctionwinner) AND auction.auctionNo = createbid.auctionNo AND bid.bidNo = createbid.bidNo AND auctionStatus = 0 AND bid.bidStatus = 1 AND bid.bidAmount >= auction.reservePrice$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
