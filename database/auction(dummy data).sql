-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2020 at 12:34 AM
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

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionNo`, `auctionStatus`, `category`, `title`, `auctionDescription`, `startingPrice`, `reservePrice`, `increments`, `startDate`, `endDate`, `sellerId`) VALUES
(1, 1, 'Electronics', 'Apple iPad 5th', 'Gen 32GB Retina 2017 WiFi Space Grey Refurbished 5th Generation,Minor scratching to screen and case. Perfect use for School, College, Small Business. Battery has been tested and is working.', 229, 1000, 1, '2020-11-10 19:11:19', '2020-12-31 19:11:19', 123456),
(2, 1, 'Fashion', 'Bridesmaid Dress Size 12', 'Brand new with tags size 12 purchased from bhs rrp 80 Exquisitely elegant the Daisy bridesmaid dress features a strapless bodice with flattering ruching and a gem embellished satin waistband trim. With delicate gathering at the waistband.', 20, NULL, 1, '2020-10-01 15:40:11', '2020-11-30 10:00:00', 123456),
(3, 1, 'Electronics', 'Shark DuoClean Cordless Vacuum', 'Shark Manufacturer Refurbished products are returned products which have been professionally checked, cleaned and restored. Refurbished products may have minor cosmetic imperfections and may not be in their original packaging.', 185, 300, 1, '2020-11-10 00:11:00', '2020-12-28 19:11:19', 123456),
(4, 1, 'CollectablesandArt', 'Inspirational Prints A3/A4/A5', 'Printed on 260gsm satin paper used in art galleries. Money back guarantee if you\'re in any way unhappy. Frame option available shown at the bottom of the size dropdown. ', 10, 50, 1, '2020-11-01 00:11:44', '2020-12-25 00:00:00', 123456),
(5, 1, 'SportsandHobbies', 'Mountain Bike/Bicycle', 'New: A brand-new, unused, unopened and undamaged item in original retail packaging (where packaging is applicable). If the item comes direct from a manufacturer, it may be delivered in non-retail packaging, such as a plain or unprinted box or plastic bag. See the seller\'s listing for full details. ', 450, NULL, 1, '2020-11-16 18:11:19', '2020-12-03 00:00:00', 123456),
(6, 1, 'HomeandGarden', 'Memory Foam Mattress', 'Brand: bed-world\r\nMPN: does not apply\r\nHeadboard Height: 20 inch\r\nRequired Tools:	ScrewdriverManufacturer Warranty: 1 year', 108, 400, 1, '2020-11-09 19:11:19', '2020-12-01 19:11:19', 123456),
(7, 1, 'Motors', 'TDI V6 Automatic', 'This jeep has only ever had 2 owners and its all been my family\r\nWas my uncles at first then my dads then my brothers then myself. I know the jeep inside out\r\nAny questions please ask\r\n', 35000, NULL, 1, '2020-11-22 19:11:19', '2021-04-01 19:11:19', 123456),
(8, 1, 'BusiandIndu', 'Pallet Collars X 10 (1200 X 1000mm)', 'Wooden collars great for raised garden beds. These are not new, in good used condition, colours vary. Sizes 1200 x 1000mm 10 for 65 approx 7 high. Can be stacked up on top of each other for required height. Collection Banbury or can be delivered for fuel cost. More than 10 available if required.', 70, 150, 1, '2020-11-21 19:40:19', '2020-12-25 23:00:00', 123456),
(9, 1, 'Health', 'Oral-B Toothbrush Heads Pack ', 'Oral-B CrossAction Black Toothbrush Heads Pack Of 4 Replacement Refills', 15, NULL, 1, '2020-11-22 19:11:19', '2020-11-30 19:11:19', 123456),
(10, 1, 'Media', 'Last Christmas [DVD]', 'Format: DVD\r\nStyle: Cult\r\nActor: Emilia Clarke\r\nGenre: Comedy\r\nSub-Genre: Christmas\r\nLanguage: English', 7, NULL, 1, '2020-11-10 19:11:19', '2020-12-03 19:11:19', 123456),
(11, 1, 'Others', '4 Bedroom House In France', 'The floor was an old-fashioned parquet with a blend of deep homely browns and the walls were the greens of summer gardens meeting a bold white baseboard. The banister was a twirl of a branch.', 32500, NULL, 1, '2020-11-17 19:44:21', '2021-08-01 00:00:00', 123456);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
