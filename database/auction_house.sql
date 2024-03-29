-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2020 at 05:31 PM
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
  `reservePrice` int(10) UNSIGNED NOT NULL DEFAULT '0',
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
(1, 0, 'HomeandGarden', 'Crushed Velvet Shell Scallop Accent Occasional Chair Armchair Dining Furniture', 'Perfect for a lounge, dining or bedroom setting, the chair is upholstered in crushed velvet with colour options of Grey, Midnight Blue, Teal and Dusky Pink. A great feature for any home, very comfortable with extra padded cushioning in the seat and back rest. The chair comes with deep cushioning on the seat and back providing you with comfort and style.', 58, 0, 1, '2020-11-16 00:00:00', '2020-11-11 23:01:30', 2),
(2, 0, 'Fashion', 'Bridesmaid Dress Size 12', 'Brand new with tags size 12 purchased from bhs rrp 80 Exquisitely elegant the Daisy bridesmaid dress features a strapless bodice with flattering ruching and a gem embellished satin waistband trim. With delicate gathering at the waistband.', 20, 22, 1, '2020-10-01 15:40:11', '2020-12-01 17:14:00', 2),
(3, 1, 'Electronics', 'Shark DuoClean Cordless Vacuum', 'Shark Manufacturer Refurbished products are returned products which have been professionally checked, cleaned and restored. Refurbished products may have minor cosmetic imperfections and may not be in their original packaging.', 185, 300, 1, '2020-11-10 00:11:00', '2020-12-28 19:11:19', 3),
(4, 1, 'CollectablesandArt', 'Inspirational Prints A3/A4/A5', 'Printed on 260gsm satin paper used in art galleries. Money back guarantee if you \'re in any way unhappy. Frame option available shown at the bottom of the size dropdown. ', 10, 50, 1, '2020-11-01 00:11:44', '2020-12-25 00:00:00', 4),
(5, 1, 'SportsandHobbies', 'Mountain Bike/Bicycle', 'New: A brand-new, unused, unopened and undamaged item in original retail packaging (where packaging is applicable). If the item comes direct from a manufacturer, it may be delivered in non-retail packaging, such as a plain or unprinted box or plastic bag. See the seller\'s listing for full details. ', 450, 0, 1, '2020-11-16 18:11:19', '2020-12-03 00:00:00', 5),
(6, 1, 'HomeandGarden', 'Memory Foam Mattress', 'Brand: bed-world\r\nMPN: does not apply\r\nHeadboard Height: 20 inch\r\nRequired Tools:	ScrewdriverManufacturer Warranty: 1 year', 108, 400, 1, '2020-11-09 19:11:19', '2020-12-01 19:11:19', 1),
(7, 1, 'Motors', 'TDI V6 Automatic', 'This jeep has only ever had 2 owners and its all been my family\r\nWas my uncles at first then my dads then my brothers then myself. I know the jeep inside out\r\nAny questions please ask\r\n', 35000, 0, 1, '2020-11-22 19:11:19', '2021-04-01 19:11:19', 1),
(8, 1, 'BusiandIndu', 'Pallet Collars X 10 (1200 X 1000mm)', 'Wooden collars great for raised garden beds. These are not new, in good used condition, colours vary. Sizes 1200 x 1000mm 10 for 65 approx 7 high. Can be stacked up on top of each other for required height. Collection Banbury or can be delivered for fuel cost. More than 10 available if required.', 70, 150, 1, '2020-11-21 19:40:19', '2020-12-25 23:00:00', 2),
(9, 0, 'Health', 'Oral-B Toothbrush Heads Pack ', 'Oral-B CrossAction Black Toothbrush Heads Pack Of 4 Replacement Refills', 15, 0, 1, '2020-11-22 19:11:19', '2020-11-30 19:11:19', 3),
(10, 1, 'Media', 'Last Christmas [DVD]', 'Format: DVD\r\nStyle: Cult\r\nActor: Emilia Clarke\r\nGenre: Comedy\r\nSub-Genre: Christmas\r\nLanguage: English', 7, 0, 1, '2020-11-10 19:11:19', '2020-12-03 19:11:19', 4),
(11, 1, 'Others', '4 Bedroom House In France', 'The floor was an old-fashioned parquet with a blend of deep homely browns and the walls were the greens of summer gardens meeting a bold white baseboard. The banister was a twirl of a branch.', 32500, 0, 1, '2020-11-17 19:44:21', '2021-08-01 00:00:00', 5),
(12, 0, 'Others', 'Unnamed Auction', '', 100, 110, 1, '2020-11-27 17:04:00', '2020-11-28 17:04:00', 2),
(149, 0, 'HomeandGarden', 'Newgate Modern Black Square Mantel Clock with No-Tick Silent Sweep Movement', 'Mid-Century Modern Mantel Clock | Black/Cream, Modern space-age design fuses with mid-Century retro style in the Henry mantel clock. A rectangular case coated in matt black silicone holds a cream dial. The contemporary mantel clock stands on elongated angled legs.', 20, 0, 1, '2020-11-10 00:00:00', '2020-11-12 00:00:00', 3),
(150, 0, 'HomeandGarden', 'UNION JACK & RETRO Design Chenille Cushion Covers or Filled Cushions 18\" / 45cm', 'Union jack (british flag) Navy, Red and White Cushion cover or Filled Cushion. Or options of various Retro Vintge themed designs. Size:18\"x 18\"(45cm x 45cm); Luxury Chenille Fabric; 70% Cotton 30% Polyester', 4, 0, 1, '2020-11-05 00:00:00', '2020-11-10 00:00:00', 4),
(151, 0, 'HomeandGarden', 'Digihome PTDR43UHDS2 43 Inch Smart 4K Ultra HD LED TV Freeview Play', 'The Digihome PTDR43UHDS2 43 Inch Smart 4K Ultra HD LED TV is a great large screen television that would be ideal for a family home. The 4K Ultra HD resolution provides a picture that is four times the resolution of Full HD, this gives you a stunning life-like image with beautiful colours and detail. The Freeview tuner gives you access to plenty of TV channels for free without subscription while Freeview Play gives you quick and easy access to on demand services ensuring you never miss your favourite shows.', 200, 0, 1, '2020-11-15 00:00:00', '2020-11-26 23:07:00', 5),
(152, 1, 'HomeandGarden', 'HOMCOM Wooden 4 Tiers Storage Display Unit Bookshelf Bookcase Dividers S Shaped', 'This S Shape shelf can be used as a bookshelf or cupboard cabinet in your home, office and study. Made of high quality particle board, surface is matt finish effect carcass, made from melamine, water and scratch resistant.', 47, 0, 1, '2020-11-10 00:00:00', '2020-12-27 00:00:00', 1),
(153, 1, 'Electronics', 'Apple iPad 5th Gen 32GB Retina 2017 WiFi Space Grey Refurbished 5th Generation', 'Seller notes: \"Minor scratching to screen and case. Perfect use for School, College, Small Business. Battery has been tested and is working. 1 Year RTB warranty included. Wi-Fi enabled. Ready to use out of the box.”Offering a host of features with an eye-catching design, the Apple iPad 32 GB tablet PC in Space Grey certainly packs a punch. Powered by the 1.4 GHz Apple A6X Prozessor and running on iOS operating system, this iPad adapts to your needs with maximum performance, enhanced battery life, and an unparalleled visual experience. Moreover, the 9.7-inch LED-backlit Multi-Touch screen with IPS technology delivers razor-sharp images and videos with vibrant colors and rich detail. With a 32 GB memory capacity, the Apple iPad lets you save all your multimedia files. Plus, the tablet supports Wi-Fi and allows you to surf the Web and download videos and games at lightning-fast speed. What’s more, the 8 MP camera enables you to capture stunning, high-quality images with amazing clarity.', 230, 180, 1, '2020-11-06 00:00:00', '2020-12-19 00:00:00', 2),
(154, 0, 'Electronics', 'Apple iMac Core i5 3.4GHz 21.5 inch Retina 4K Mid 2017 1TB Fusion 8GB Ram A1418', 'Seller notes:	“Sourced from Apple then fully tested and graded by our on-site technicians. We run 80 functional tests on each product to ensure the best quality for your device”; The Apple iMac desktop computer with 4K retina display renders performance and multi-tasking efficiencies with the integrated 8 GB memory. This PC is powered by a reliable 3.0 GHz processor. The 1 TB provides storage space for digital content. This Apple desktop features Mac OS Sierra operation system and a convenient 21.5-inch display.', 899, 0, 1, '2020-11-16 00:00:00', '2020-11-20 00:00:00', 3),
(155, 0, 'Electronics', 'Razer Raiju Ultimate Wireless & Wired Gaming Controller - Mecha-Tactile Button', 'The Razer Raiju Ultimate is the wireless PS4 controller that allows advanced customization via our own mobile app. Whether it’s remapping multi-function buttons or adjusting sensitivity options, you have full control from the palm of your hand. Take it further with interchangeable thumbsticks, and choose either a tilting or individual D-Pad button layout. Enable functions on the fly with a quick control panel, and activate Hair Trigger Mode for quick-firing action. Comes with 3 connectivity modes: PS4, USB and PC without manual repairing for optimal efficiency. Also features wired mode.', 200, 0, 1, '2020-11-16 00:00:00', '2020-11-19 00:00:00', 4),
(156, 1, 'Electronics', 'FIFA 21 (Xbox One) In Stock Now Brand New & Sealed Free UK P&P	WIN AS ONE in EA SPORTS', 'FIFA 21 (Xbox One) In Stock Now Brand New & Sealed Free UK P&P	WIN AS ONE in EA SPORTS™\', \'FIFA 21 on PlayStationⓇ4, Xbox One, and PC with new ways to team up and express yourself on the streets and in the stadium. Powered by Frostbite™, FIFA 21 raises the game with fresh features that let you enjoy even bigger victories together in VOLTA FOOTBALL and FIFA Ultimate Team™, feel a new level of gameplay realism that rewards you for your creativity and control, manage every moment in Career Mode, and experience unrivaled authenticity that gives you the most true-to-life experience of The World’s Game.', 50, 0, 1, '2020-11-16 00:00:00', '2020-12-25 00:00:00', 5),
(157, 1, 'Electronics', 'Microsoft Official Xbox Armed Forces II Controller Special Edition 12M Warranty', 'Condition: Opened - never used; Own the battlefield with the Xbox Wireless Controller - Armed Forces II Special Edition featuring a modern camouflage pattern and textured grip for enhanced comfort. Enjoy custom button mapping and plug in any compatible headset with the 3.5mm stereo headset jack. And with Bluetooth technology, play your favourite games on Windows 10 PCs and tablets.', 50, 20, 1, '2020-11-05 00:00:00', '2020-12-29 00:00:00', 1),
(159, 0, 'Others', 'Emmi Coffee', 'coffe', 1, 3, 1, '2020-11-24 21:29:09', '2020-11-24 01:33:00', 1),
(162, 0, 'Others', 'Tesco Milk', 'organic', 5, 10, 1, '2020-11-24 22:57:14', '2020-11-25 19:30:00', 1),
(166, 0, 'Fashion', 'Wallet', 'A simple paper wallet.', 23, 50, 1, '2020-11-27 13:22:39', '2020-11-27 15:38:50', 1),
(168, 1, 'SportsandHobbies', 'Football', 'World Cup Souvenir Soccer', 2000, 2500, 1, '2020-11-27 14:03:13', '2020-12-01 18:06:00', 1),
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
	IF NEW.reservePrice < NEW.startingPrice
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Reserve price should be higher than the starting price!";
    end if;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, 0, 27, '2020-11-27 15:16:01'),
(14, 1, 45, '2020-11-27 15:37:45'),
(15, 0, 2500, '2020-11-27 23:20:36'),
(16, 1, 20, '2020-11-27 23:37:29'),
(17, 1, 20, '2020-11-27 23:40:18'),
(18, 0, 2600, '2020-11-27 23:41:43'),
(21, 1, 2700, '2020-11-28 20:27:48'),
(25, 0, 186, '2020-11-28 22:45:11'),
(27, 1, 30, '2020-11-29 01:23:43'),
(34, 1, 200, '2020-11-29 02:12:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerId`, `email`, `password`, `firstName`, `lastName`, `level`) VALUES
(1, 'yang.zou@ucl.ac.uk', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'yang', 'zou', 1),
(2, 'ex@qq.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'John', 'Joe', 0),
(3, '285@gmail.com', '$2y$10$Ni40b6/zoCXiRtxG6.x07e7QPvNS1aboQT7aDvmPr7vSzKa/3h7X6', 'yyy', 'zzz', 0),
(6, 'zhduis@outlook.com', '$2y$10$7wRwaxilzO8H9ChLLYcDHuijEhnd2U2/y3fsRgn8QbfiABtv54.Yi', 'adwr', 'dawr', 0),
(8, 'guagua@gmail.com', '$2y$10$XyCf6tDyJRxtoDDE46ik8uOXNCURbCPe.JxylkxE8OPuLl.fGbd4.', 'gua', 'gua', 0),
(12, 'yingying@m.com', '$2y$10$BHIsoeQjIRCe3hWlxu2x6uV2RhEetVBT0B10hY0xark1l9ZCV3WQq', 'yingying', 'guai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyercont`
--

DROP TABLE IF EXISTS `buyercont`;
CREATE TABLE IF NOT EXISTS `buyercont` (
  `buyerId` int(10) UNSIGNED NOT NULL,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`buyerId`),
  KEY `buyerId` (`buyerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyercont`
--

INSERT INTO `buyercont` (`buyerId`, `street`, `city`, `postcode`, `telNo`, `backupTelNo`) VALUES
(1, 'Oxford Street', 'London', 'W1D 1BS', '1122334455', '2233445566'),
(2, 'Queen Victoria St', 'London', 'EC4N 4TQ', '88888888888', ''),
(6, 'UCL', 'London', 'WC1E 6BT', '+44 2076792000', ''),
(8, 'gulugulu', 'watai', 'dsahe', '462644124654', '462644124653'),
(12, 'dsda', 'giuo', 'uiui', '1234565431', '1234565432');

--
-- Triggers `buyercont`
--
DROP TRIGGER IF EXISTS `check_bTel_length`;
DELIMITER $$
CREATE TRIGGER `check_bTel_length` BEFORE INSERT ON `buyercont` FOR EACH ROW BEGIN 
	IF LENGTH(NEW.telNo) < 10 OR LENGTH(NEW.telNo) > 15
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Telephone number too short or too long!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_bTel_unique`;
DELIMITER $$
CREATE TRIGGER `check_bTel_unique` BEFORE INSERT ON `buyercont` FOR EACH ROW BEGIN 
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
(14, 166, 2),
(15, 168, 2),
(16, 9, 3),
(17, 4, 3),
(18, 168, 3),
(21, 168, 2),
(25, 3, 6),
(27, 2, 1),
(34, 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `sellercont`
--

DROP TABLE IF EXISTS `sellercont`;
CREATE TABLE IF NOT EXISTS `sellercont` (
  `sellerId` int(10) UNSIGNED NOT NULL,
  `street` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telNo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backupTelNo` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sellerId`),
  KEY `sellerId` (`sellerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellercont`
--

INSERT INTO `sellercont` (`sellerId`, `street`, `city`, `postcode`, `telNo`, `backupTelNo`) VALUES
(1, 'Buckingham Palace Road', 'London', 'SW1W 9TQ', '', NULL);

--
-- Triggers `sellercont`
--
DROP TRIGGER IF EXISTS `check_sTel_length`;
DELIMITER $$
CREATE TRIGGER `check_sTel_length` BEFORE INSERT ON `sellercont` FOR EACH ROW BEGIN 
	IF LENGTH(NEW.telNo) < 10 OR LENGTH(NEW.telNo) > 15
    THEN signal sqlstate '45000'
    SET MESSAGE_TEXT = "Telephone number too short or too long!";
    end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `check_sTel_unique`;
DELIMITER $$
CREATE TRIGGER `check_sTel_unique` BEFORE INSERT ON `sellercont` FOR EACH ROW BEGIN 
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
(1, 2),
(6, 2),
(1, 4),
(2, 4),
(3, 6),
(1, 8),
(1, 153),
(3, 153),
(1, 156);

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

DROP TABLE IF EXISTS `winner`;
CREATE TABLE IF NOT EXISTS `winner` (
  `auctionNo` int(10) UNSIGNED NOT NULL,
  `buyerId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`auctionNo`),
  KEY `buyerId` (`buyerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`auctionNo`, `buyerId`) VALUES
(2, 1),
(155, 1),
(151, 2),
(162, 2),
(9, 3),
(150, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `buyercont`
--
ALTER TABLE `buyercont`
  ADD CONSTRAINT `buyercont_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `createbid`
--
ALTER TABLE `createbid`
  ADD CONSTRAINT `createbid_ibfk_1` FOREIGN KEY (`bidNo`) REFERENCES `bid` (`bidNo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `createbid_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `createbid_ibfk_3` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sellercont`
--
ALTER TABLE `sellercont`
  ADD CONSTRAINT `sellercont_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`sellerId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `watching`
--
ALTER TABLE `watching`
  ADD CONSTRAINT `watching_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `watching_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `winner`
--
ALTER TABLE `winner`
  ADD CONSTRAINT `winner_ibfk_1` FOREIGN KEY (`buyerId`) REFERENCES `buyer` (`buyerId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `winner_ibfk_2` FOREIGN KEY (`auctionNo`) REFERENCES `auction` (`auctionNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
CREATE DEFINER=`root`@`localhost` EVENT `UPDATE WINNER` ON SCHEDULE EVERY 10 SECOND STARTS '2020-11-25 19:12:53' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO winner SELECT createbid.auctionNo, createbid.buyerId FROM auction,bid,createbid WHERE createbid.auctionNo NOT in (SELECT auctionNo FROM winner) AND auction.auctionNo = createbid.auctionNo AND bid.bidNo = createbid.bidNo AND auctionStatus = 0 AND bid.bidStatus = 1 AND bid.bidAmount >= auction.reservePrice$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
