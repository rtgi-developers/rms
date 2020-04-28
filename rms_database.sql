-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 01:39 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `prod_id` int(11) NOT NULL,
  `matl_id` int(11) NOT NULL,
  `matl_qty` double NOT NULL,
  `matl_qty_uom` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`prod_id`, `matl_id`, `matl_qty`, `matl_qty_uom`) VALUES
(25, 14, 20, 'pcs'),
(26, 11, 20, 'pcs'),
(26, 13, 10, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `parent_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `parent_cat_id`) VALUES
(1, 'Products', NULL),
(2, 'Materials', NULL),
(3, 'Towels', 1),
(4, 'Bath Towels', 3),
(5, 'Hand Towels', 3),
(6, 'Wash Towels', 3),
(7, 'Ultra Soft', 4),
(8, 'Zero Twist', 4),
(9, 'Fabric', 2),
(10, 'Cotton Fabric', 9),
(11, 'Duck Fabric', 9),
(12, 'Linen Fabric', 9),
(13, 'Natural Fabric', 12),
(14, 'Cartons', 18),
(15, 'Rugs', 1),
(16, 'Outdoor Mats', 15),
(17, 'Area Rugs', 15),
(18, 'Packing Materials', 2),
(19, 'Labels', 18),
(20, 'Tape', 18),
(21, 'Kitchen & Linen', 1),
(22, 'Kitchen Towel', 21);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `curr_code` varchar(3) NOT NULL,
  `curr_name` varchar(255) NOT NULL,
  `curr_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`curr_code`, `curr_name`, `curr_status`) VALUES
('AED', 'UAE dirham', 'Disabled'),
('AFA', 'Afghanistan afghani', 'Disabled'),
('ALL', 'Albanian lek', 'Disabled'),
('AMD', 'Armenian dram', 'Disabled'),
('ANG', 'Netherlands Antillian guilder', 'Disabled'),
('AOR', 'Angolan kwanza reajustado', 'Disabled'),
('ARS', 'Argentine peso', 'Disabled'),
('AUD', 'Australian dollar', 'Disabled'),
('AWG', 'Aruban guilder', 'Disabled'),
('AZN', 'Azerbaijanian new manat', 'Disabled'),
('BBD', 'Barbados dollar', 'Disabled'),
('BDT', 'Bangladeshi taka', 'Disabled'),
('BGN', 'Bulgarian lev', 'Disabled'),
('BHD', 'Bahraini dinar', 'Disabled'),
('BIF', 'Burundi franc', 'Disabled'),
('BMD', 'Bermudian dollar', 'Disabled'),
('BND', 'Brunei dollar', 'Disabled'),
('BOB', 'Bolivian boliviano', 'Disabled'),
('BRL', 'Brazilian real', 'Disabled'),
('BSD', 'Bahamian dollar', 'Disabled'),
('BTN', 'Bhutan ngultrum', 'Disabled'),
('BWP', 'Botswana pula', 'Disabled'),
('BYN', 'Belarusian ruble', 'Disabled'),
('BZD', 'Belize dollar', 'Disabled'),
('CAD', 'Canadian dollar', 'Disabled'),
('CDF', 'Congolese franc', 'Disabled'),
('CHF', 'Swiss franc', 'Disabled'),
('CLP', 'Chilean peso', 'Disabled'),
('CNY', 'Chinese yuan renminbi', 'Disabled'),
('COP', 'Colombian peso', 'Disabled'),
('CRC', 'Costa Rican colon', 'Disabled'),
('CUP', 'Cuban peso', 'Disabled'),
('CVE', 'Cape Verde escudo', 'Disabled'),
('CZK', 'Czech koruna', 'Disabled'),
('DJF', 'Djibouti franc', 'Disabled'),
('DKK', 'Danish krone', 'Disabled'),
('DOP', 'Dominican peso', 'Disabled'),
('DZD', 'Algerian dinar', 'Disabled'),
('EEK', 'Estonian kroon', 'Disabled'),
('EGP', 'Egyptian pound', 'Disabled'),
('ERN', 'Eritrean nakfa', 'Disabled'),
('ETB', 'Ethiopian birr', 'Disabled'),
('EUR', 'EU euro', 'Disabled'),
('FJD', 'Fiji dollar', 'Disabled'),
('FKP', 'Falkland Islands pound', 'Disabled'),
('GBP', 'British pound', 'Disabled'),
('GEL', 'Georgian lari', 'Disabled'),
('GHS', 'Ghanaian new cedi', 'Disabled'),
('GIP', 'Gibraltar pound', 'Disabled'),
('GMD', 'Gambian dalasi', 'Disabled'),
('GNF', 'Guinean franc', 'Disabled'),
('GTQ', 'Guatemalan quetzal', 'Disabled'),
('GYD', 'Guyana dollar', 'Disabled'),
('HKD', 'Hong Kong SAR dollar', 'Disabled'),
('HNL', 'Honduran lempira', 'Disabled'),
('HRK', 'Croatian kuna', 'Disabled'),
('HTG', 'Haitian gourde', 'Disabled'),
('HUF', 'Hungarian forint', 'Disabled'),
('IDR', 'Indonesian rupiah', 'Disabled'),
('ILS', 'Israeli new shekel', 'Disabled'),
('INR', 'Indian rupee', 'Enabled'),
('IQD', 'Iraqi dinar', 'Disabled'),
('IRR', 'Iranian rial', 'Disabled'),
('ISK', 'Icelandic krona', 'Disabled'),
('JMD', 'Jamaican dollar', 'Disabled'),
('JOD', 'Jordanian dinar', 'Disabled'),
('JPY', 'Japanese yen', 'Disabled'),
('KES', 'Kenyan shilling', 'Disabled'),
('KGS', 'Kyrgyz som', 'Disabled'),
('KHR', 'Cambodian riel', 'Disabled'),
('KMF', 'Comoros franc', 'Disabled'),
('KPW', 'North Korean won', 'Disabled'),
('KRW', 'South Korean won', 'Disabled'),
('KWD', 'Kuwaiti dinar', 'Disabled'),
('KYD', 'Cayman Islands dollar', 'Disabled'),
('KZT', 'Kazakh tenge', 'Disabled'),
('LAK', 'Lao kip', 'Disabled'),
('LBP', 'Lebanese pound', 'Disabled'),
('LKR', 'Sri Lanka rupee', 'Disabled'),
('LRD', 'Liberian dollar', 'Disabled'),
('LSL', 'Lesotho loti', 'Disabled'),
('LTL', 'Lithuanian litas', 'Disabled'),
('LVL', 'Latvian lats', 'Disabled'),
('LYD', 'Libyan dinar', 'Disabled'),
('MAD', 'Moroccan dirham', 'Disabled'),
('MDL', 'Moldovan leu', 'Disabled'),
('MGA', 'Malagasy ariary', 'Disabled'),
('MKD', 'Macedonian denar', 'Disabled'),
('MMK', 'Myanmar kyat', 'Disabled'),
('MNT', 'Mongolian tugrik', 'Disabled'),
('MOP', 'Macao SAR pataca', 'Disabled'),
('MRO', 'Mauritanian ouguiya', 'Disabled'),
('MUR', 'Mauritius rupee', 'Disabled'),
('MVR', 'Maldivian rufiyaa', 'Disabled'),
('MWK', 'Malawi kwacha', 'Disabled'),
('MXN', 'Mexican peso', 'Disabled'),
('MYR', 'Malaysian ringgit', 'Disabled'),
('MZN', 'Mozambique new metical', 'Disabled'),
('NAD', 'Namibian dollar', 'Disabled'),
('NGN', 'Nigerian naira', 'Disabled'),
('NIO', 'Nicaraguan cordoba oro', 'Disabled'),
('NOK', 'Norwegian krone', 'Disabled'),
('NPR', 'Nepalese rupee', 'Disabled'),
('NZD', 'New Zealand dollar', 'Disabled'),
('OMR', 'Omani rial', 'Disabled'),
('PAB', 'Panamanian balboa', 'Disabled'),
('PEN', 'Peruvian nuevo sol', 'Disabled'),
('PGK', 'Papua New Guinea kina', 'Disabled'),
('PHP', 'Philippine peso', 'Disabled'),
('PKR', 'Pakistani rupee', 'Disabled'),
('PLN', 'Polish zloty', 'Disabled'),
('PYG', 'Paraguayan guarani', 'Disabled'),
('QAR', 'Qatari rial', 'Disabled'),
('RON', 'Romanian new leu', 'Disabled'),
('RSD', 'Serbian dinar', 'Disabled'),
('RUB', 'Russian ruble', 'Disabled'),
('RWF', 'Rwandan franc', 'Disabled'),
('SAR', 'Saudi riyal', 'Disabled'),
('SBD', 'Solomon Islands dollar', 'Disabled'),
('SCR', 'Seychelles rupee', 'Disabled'),
('SDG', 'Sudanese pound', 'Disabled'),
('SEK', 'Swedish krona', 'Disabled'),
('SGD', 'Singapore dollar', 'Disabled'),
('SHP', 'Saint Helena pound', 'Disabled'),
('SLL', 'Sierra Leone leone', 'Disabled'),
('SOS', 'Somali shilling', 'Disabled'),
('SRD', 'Suriname dollar', 'Disabled'),
('STD', 'Sao Tome and Principe dobra', 'Disabled'),
('SVC', 'El Salvador colon', 'Disabled'),
('SYP', 'Syrian pound', 'Disabled'),
('SZL', 'Swaziland lilangeni', 'Disabled'),
('THB', 'Thai baht', 'Disabled'),
('TJS', 'Tajik somoni', 'Disabled'),
('TMT', 'Turkmen new manat', 'Disabled'),
('TND', 'Tunisian dinar', 'Disabled'),
('TOP', 'Tongan pa\'anga', 'Disabled'),
('TRY', 'Turkish lira', 'Disabled'),
('TTD', 'Trinidad and Tobago dollar', 'Disabled'),
('TWD', 'Taiwan New dollar', 'Disabled'),
('TZS', 'Tanzanian shilling', 'Disabled'),
('UAH', 'Ukrainian hryvnia', 'Disabled'),
('UGX', 'Uganda new shilling', 'Disabled'),
('USD', 'US dollar', 'Enabled'),
('UYU', 'Uruguayan peso uruguayo', 'Disabled'),
('UZS', 'Uzbekistani sum', 'Disabled'),
('VEF', 'Venezuelan bolivar fuerte', 'Disabled'),
('VND', 'Vietnamese dong', 'Disabled'),
('VUV', 'Vanuatu vatu', 'Disabled'),
('WST', 'Samoan tala', 'Disabled'),
('XAF', 'CFA franc BEAC', 'Disabled'),
('XAG', 'Silver (ounce)', 'Disabled'),
('XAU', 'Gold (ounce)', 'Disabled'),
('XCD', 'East Caribbean dollar', 'Disabled'),
('XDR', 'IMF special drawing right', 'Disabled'),
('XFO', 'Gold franc', 'Disabled'),
('XFU', 'UIC franc', 'Disabled'),
('XOF', 'CFA franc BCEAO', 'Disabled'),
('XPD', 'Palladium (ounce)', 'Disabled'),
('XPF', 'CFP franc', 'Disabled'),
('XPT', 'Platinum (ounce)', 'Disabled'),
('YER', 'Yemeni rial', 'Disabled'),
('ZAR', 'South African rand', 'Disabled'),
('ZMK', 'Zambian kwacha', 'Disabled'),
('ZWL', 'Zimbabwe dollar', 'Disabled');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_website` varchar(255) DEFAULT NULL,
  `cust_email_1` varchar(255) DEFAULT NULL,
  `cust_email_2` varchar(255) DEFAULT NULL,
  `cust_phone_1` varchar(10) DEFAULT NULL,
  `cust_phone_2` varchar(10) DEFAULT NULL,
  `cust_def_curr` varchar(3) NOT NULL,
  `cust_comment` varchar(255) DEFAULT NULL,
  `cust_created_on` datetime NOT NULL,
  `cust_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_website`, `cust_email_1`, `cust_email_2`, `cust_phone_1`, `cust_phone_2`, `cust_def_curr`, `cust_comment`, `cust_created_on`, `cust_modified_on`) VALUES
(1, 'Orient Originals, Inc.', 'https://orientoriginals.com', 'rb@orientoriginals.com', 'info@orientoriginals.com', '2013320072', '2013320073', 'USD', 'Our own company', '2020-04-02 14:00:00', '0000-00-00 00:00:00'),
(2, 'Home Goods, Inc.', 'https://www.homegoods.com/', 'mfraenkel@nyc.rr.com', '', '5083903407', '', 'USD', 'TJX Group company', '2020-04-03 18:00:00', '2020-04-07 15:00:00'),
(3, 'Rajpootana Holdings', '', 'rb@orientoriginals.com', 'rb@orientoriginals.com', '2013320072', '', 'INR', 'ORG other company', '2020-04-05 15:00:00', '2020-04-28 13:00:00'),
(4, 'Tuesday Morning', 'https://www.tuesdaymorningvendors.com/', 'tms@tuesdaymorning.com', 'trafficinbound@tuesdaymorning.com', '9723873562', '', 'USD', 'Company website https://www.tuesdaymorning.com/', '2020-04-07 15:00:00', '2020-04-07 15:00:00'),
(5, 'Pier 1 Imports', 'https://www.pier1.com/', '', '', '', '', 'USD', '', '2020-04-28 13:00:00', '2020-04-28 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

CREATE TABLE `customers_address` (
  `cust_addr_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_addr_1` varchar(50) NOT NULL,
  `cust_addr_2` varchar(50) DEFAULT NULL,
  `cust_city` varchar(50) NOT NULL,
  `cust_state` varchar(50) NOT NULL,
  `cust_postal_code` varchar(15) NOT NULL,
  `cust_country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_address`
--

INSERT INTO `customers_address` (`cust_addr_id`, `cust_id`, `cust_addr_1`, `cust_addr_2`, `cust_city`, `cust_state`, `cust_postal_code`, `cust_country`) VALUES
(1, 1, '55 Edward Hart Drive', '', 'Jersey City', 'NJ', '07305', 'United States'),
(2, 1, '46 CONSTITUTION WAY', '', 'JERSEY CITY', 'NJ', '07305', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `inv_header`
--

CREATE TABLE `inv_header` (
  `inv_id` int(11) NOT NULL,
  `bill_addr_id` int(11) NOT NULL,
  `ship addr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` text NOT NULL,
  `user_agent` text NOT NULL COMMENT 'Browser Version Mobile Platform',
  `req_directory` varchar(255) DEFAULT NULL,
  `req_controller` varchar(35) NOT NULL COMMENT 'Class name',
  `req_method` varchar(35) NOT NULL COMMENT 'Function name',
  `req_type` varchar(4) NOT NULL COMMENT 'POST or GET',
  `req_data` text,
  `req_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `matl_id` int(11) NOT NULL,
  `matl_cat_id` int(11) NOT NULL,
  `matl_name` varchar(255) NOT NULL,
  `matl_color` varchar(50) NOT NULL,
  `matl_length` double NOT NULL,
  `matl_width` double NOT NULL,
  `matl_height` double NOT NULL,
  `matl_size_uom` varchar(6) NOT NULL COMMENT 'Dimensional unit of measurement',
  `matl_weight` double NOT NULL,
  `matl_weight_uom` varchar(6) NOT NULL COMMENT 'Weight unit of measurement',
  `matl_moq` double NOT NULL COMMENT 'Minimum order quantity',
  `matl_moq_uom` varchar(6) NOT NULL COMMENT 'MOQ unit of measurement',
  `matl_created_on` datetime NOT NULL,
  `matl_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Materials';

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`matl_id`, `matl_cat_id`, `matl_name`, `matl_color`, `matl_length`, `matl_width`, `matl_height`, `matl_size_uom`, `matl_weight`, `matl_weight_uom`, `matl_moq`, `matl_moq_uom`, `matl_created_on`, `matl_modified_on`) VALUES
(1, 13, 'My first material', 'Red', 10, 8, 6, 'in', 430, '6', 10, '10', '2020-02-19 08:17:03', '0000-00-00 00:00:00'),
(2, 5, 'My second material', 'Brown', 8, 5, 3, 'in', 678, '6', 500, '10', '2020-02-19 09:19:07', '0000-00-00 00:00:00'),
(4, 4, 'My fourth material - edited', 'White-Gold', 15, 14, 8, 'in', 8, '7', 1, '10', '2020-02-19 11:59:19', '2020-02-22 13:16:44'),
(5, 13, 'My fifth material', 'Grey', 5, 3, 1, 'in', 10, '7', 1000, '10', '2020-02-19 12:00:29', '0000-00-00 00:00:00'),
(6, 13, 'My sixth material', 'Red', 10, 8, 6, 'in', 430, '6', 10, '10', '2020-02-19 08:17:03', '0000-00-00 00:00:00'),
(7, 4, 'My seventh material edited', 'Blue', 8, 5, 3, 'in', 67, '6', 500, '10', '2020-02-19 09:19:07', '2020-02-22 13:14:11'),
(9, 4, 'My ninth material', 'White', 15, 14, 8, 'in', 8, '7', 1, '10', '2020-02-19 11:59:19', '0000-00-00 00:00:00'),
(10, 13, 'My tenth material', 'Grey', 5, 3, 1, 'in', 10, '7', 1000, '10', '2020-02-19 12:00:29', '0000-00-00 00:00:00'),
(11, 4, 'My eleventh material', 'White', 15, 14, 8, 'in', 8, '7', 1, '10', '2020-02-19 11:59:19', '0000-00-00 00:00:00'),
(13, 2, 'My second 2020 material', 'Brown', 18, 16, 8, 'in', 1420, 'g', 500, 'm', '2020-03-04 07:00:00', '2020-03-04 07:53:43'),
(14, 11, 'My Duck Duck Go Fabric', 'White', 100, 20, 0.1, 'in', 436, 'g', 200, 'm', '2020-03-21 07:00:00', '2020-03-21 07:00:00'),
(15, 20, 'Cotton Craft label rolls edited', 'White', 3, 3, 0, 'cm', 350, 'g', 100, 'pcs', '2020-03-24 13:00:00', '2020-03-24 13:21:18'),
(16, 12, 'Linen fabric made in India - Edited', 'Grey', 60, 8, 0, 'm', 150, 'g', 100, 'm', '2020-03-24 14:00:00', '2020-03-24 14:15:01'),
(17, 20, 'Amazon packing tape', 'Multi', 2, 2, 0, 'cm', 250, 'g', 10, 'pck', '2020-04-01 09:00:00', '2020-04-01 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(11) NOT NULL,
  `notif_msg` text NOT NULL,
  `user_posted` int(11) NOT NULL COMMENT 'Posted by user',
  `time_posted` datetime NOT NULL COMMENT 'Posting date and time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notif_id`, `notif_msg`, `user_posted`, `time_posted`) VALUES
(1, 'Testing with new notification', 1, '2020-01-13 07:49:36'),
(2, 'Testing again for all users', 1, '2020-01-14 07:50:59'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam accusamus omnis necessitatibus nulla, atque quidem inventore, quo itaque voluptatem quaerat doloribus reprehenderit, quam temporibus hic esse ipsam maxime dolorum ratione!', 1, '2020-01-16 09:16:54'),
(4, 'Use text utilities as needed to change the alignment of your blockquote.', 1, '2020-01-16 10:23:23'),
(5, 'Creating fifth notification of this system.', 1, '2020-01-16 11:30:59'),
(7, 'This is my 7th testing notification.', 1, '2020-01-16 12:13:24'),
(8, 'Amazon is changing FBA fees from 18th Feb 2020.', 1, '2020-01-16 12:19:05'),
(22, 'Testing final notification for all recipients of the system.', 1, '2020-01-20 13:17:51'),
(23, 'Create new product 12PK floor sack towel.', 1, '2020-01-20 13:22:27'),
(24, 'Create new product buffalo check table runner', 1, '2020-01-20 13:22:54'),
(25, 'All are requested to kindly update your profile.', 1, '2020-01-20 13:23:20'),
(26, 'Zeeshan please review po.', 1, '2020-01-22 06:24:53'),
(27, 'See all notifications', 1, '2020-01-22 06:28:00'),
(28, 'My new thursday notification.', 1, '2020-01-23 10:08:41'),
(34, 'Creating testing botification', 1, '2020-01-29 10:26:27'),
(37, 'India under lockdown due to corona virus.', 1, '2020-04-08 20:05:31'),
(38, 'My new notification for testing', 1, '2020-04-13 13:47:08'),
(39, 'second new notification ', 1, '2020-04-13 13:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `notif_rcpts`
--

CREATE TABLE `notif_rcpts` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Recipients user id',
  `is_read` tinyint(1) NOT NULL COMMENT 'True if red by recipients'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Notification recipients';

--
-- Dumping data for table `notif_rcpts`
--

INSERT INTO `notif_rcpts` (`notif_id`, `user_id`, `is_read`) VALUES
(1, 1, 1),
(1, 2, 0),
(2, 1, 1),
(2, 2, 0),
(3, 1, 1),
(3, 3, 1),
(4, 1, 1),
(5, 1, 1),
(8, 1, 1),
(8, 2, 0),
(8, 3, 1),
(22, 1, 1),
(22, 2, 0),
(22, 3, 1),
(23, 1, 1),
(23, 2, 0),
(23, 3, 1),
(24, 1, 1),
(24, 2, 0),
(24, 3, 1),
(25, 1, 1),
(25, 2, 0),
(25, 3, 1),
(26, 2, 0),
(27, 1, 1),
(28, 1, 1),
(28, 2, 0),
(34, 1, 1),
(37, 1, 1),
(38, 1, 1),
(38, 2, 0),
(38, 3, 0),
(39, 1, 1),
(39, 2, 0),
(39, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`user_id`, `task_id`, `permission`) VALUES
(2, 1, 0),
(2, 4, 0),
(2, 2, 0),
(2, 3, 0),
(2, 5, 0),
(2, 6, 0),
(2, 7, 0),
(2, 8, 0),
(2, 9, 0),
(2, 10, 1),
(2, 11, 0),
(2, 12, 0),
(2, 13, 0),
(2, 14, 1),
(2, 15, 0),
(3, 21, 0),
(3, 17, 1),
(3, 19, 0),
(3, 20, 0),
(3, 5, 0),
(3, 6, 0),
(3, 7, 0),
(3, 9, 0),
(3, 10, 1),
(3, 11, 0),
(3, 12, 1),
(3, 13, 0),
(3, 14, 0),
(3, 15, 0),
(3, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_cat_id` int(11) NOT NULL,
  `prod_style_num` varchar(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_color` varchar(15) NOT NULL,
  `prod_length` double NOT NULL,
  `prod_width` double NOT NULL,
  `prod_height` double DEFAULT NULL,
  `prod_size_uom` varchar(6) NOT NULL,
  `prod_weight` double NOT NULL,
  `prod_weight_uom` varchar(6) NOT NULL,
  `prod_moq` double NOT NULL,
  `prod_moq_uom` varchar(6) NOT NULL,
  `prod_mfg_time` double DEFAULT NULL,
  `prod_mfg_time_uom` varchar(6) DEFAULT NULL,
  `prod_cost` double DEFAULT NULL,
  `prod_cost_curr` varchar(3) DEFAULT NULL,
  `prod_price` double DEFAULT NULL,
  `prod_price_curr` varchar(3) DEFAULT NULL,
  `ip_qty` double NOT NULL,
  `ip_qty_uom` varchar(6) NOT NULL,
  `ip_weight` double NOT NULL,
  `ip_weight_uom` varchar(6) NOT NULL,
  `ip_length` double NOT NULL,
  `ip_width` double NOT NULL,
  `ip_height` double NOT NULL,
  `ip_dim_uom` varchar(6) NOT NULL,
  `mp_qty` double NOT NULL,
  `mp_qty_uom` varchar(6) NOT NULL,
  `mp_weight` double NOT NULL,
  `mp_weight_uom` varchar(6) NOT NULL,
  `mp_length` double NOT NULL,
  `mp_width` double NOT NULL,
  `mp_height` double NOT NULL,
  `mp_dim_uom` varchar(6) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Products';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat_id`, `prod_style_num`, `prod_name`, `prod_color`, `prod_length`, `prod_width`, `prod_height`, `prod_size_uom`, `prod_weight`, `prod_weight_uom`, `prod_moq`, `prod_moq_uom`, `prod_mfg_time`, `prod_mfg_time_uom`, `prod_cost`, `prod_cost_curr`, `prod_price`, `prod_price_curr`, `ip_qty`, `ip_qty_uom`, `ip_weight`, `ip_weight_uom`, `ip_length`, `ip_width`, `ip_height`, `ip_dim_uom`, `mp_qty`, `mp_qty_uom`, `mp_weight`, `mp_weight_uom`, `mp_length`, `mp_width`, `mp_height`, `mp_dim_uom`, `date_created`, `date_modified`) VALUES
(1, 1, '72504-18', 'My first product 2PK hand towel', 'Gold', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '2020-02-28 10:00:00', '2020-02-28 10:00:00'),
(5, 1, '72504-22', 'My 5th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, '72504-23', 'My 6th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, '72504-24', 'My 7th product 2PK rugs', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, '72504-25', 'My 8th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, '72504-26', 'My 9th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 4, '72504-27', 'My 10th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, '72504-29', 'My 12th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, '72504-30', 'My 13th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, '72504-31', 'My 14th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 5, '72504-32', 'My 15th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 5, '72504-33', 'My first product 2PK hand towel', 'Gold', 12, 10, 8, '4', 185, '6', 500, '10', 20, '18', 0, '', 0, '', 12, '10', 200, '6', 14, 12, 10, '4', 24, '14', 250, '6', 24, 10, 6, '4', '2020-02-29 11:00:00', '2020-02-29 11:00:00'),
(17, 1, '72504-18', 'My first product 2PK hand towel', 'Gold', 18, 12, 10, 'in', 500, 'g', 1000, 'sets', 15, 'days', 10, 'USD', 15, 'USD', 2, 'pcs', 1000, 'g', 25, 24, 8, 'in', 24, 'sets', 20000, 'g', 50, 48, 16, 'in', '2020-03-03 12:00:00', '2020-03-03 12:00:00'),
(18, 6, '72516-18', 'My new cool product 2PK wash towel', 'Tan', 20, 18, 14, 'in', 500, 'g', 1000, 'sets', 15, 'days', 12, 'USD', 15, 'USD', 2, 'pcs', 1000, 'g', 35, 30, 15, 'in', 24, 'sets', 24000, 'g', 40, 30, 15, 'in', '2020-03-06 10:00:00', '2020-03-06 10:00:00'),
(20, 5, '78184-10', 'MyBlue bird style 2PK hand towel', 'Blue', 18, 14, 0, 'in', 200, 'g', 500, 'ea', 0, '', 9.99, 'USD', 12.99, 'USD', 2, 'pcs', 1000, 'g', 36, 28, 16, 'in', 12, 'sets', 12000, 'g', 40, 30, 17, 'in', '2020-03-06 11:00:00', '2020-03-06 11:00:00'),
(21, 6, '72534-18', 'My first product 2PK wash towel', 'Gold', 18, 14, 8, 'in', 434, 'g', 1000, 'sets', 0, '', 0, '', 0, '', 2, 'pcs', 868, 'g', 8, 6, 2.25, 'in', 12, 'sets', 18, 'kg', 20, 16, 7, 'in', '2020-03-13 09:00:00', '2020-03-13 09:00:00'),
(22, 8, '72504-18', 'My first product 2PK hand towel', 'Gold', 18, 16, 4, 'in', 386, 'g', 500, 'pcs', 0, '', 0, '', 0, '', 2, 'pcs', 698, 'g', 20, 16, 8, 'in', 12, 'pcs', 18, 'kg', 26, 24, 12, 'in', '2020-03-13 10:00:00', '2020-03-13 10:00:00'),
(23, 5, '72504-18', 'My first product 2PK hand towel', 'Gold', 18, 16, 4, 'in', 386, 'g', 500, 'pcs', 0, '', 0, '', 0, '', 2, 'pcs', 698, 'g', 20, 16, 8, 'in', 12, 'pcs', 18, 'kg', 26, 24, 12, 'in', '2020-03-13 10:00:00', '2020-03-13 10:00:00'),
(24, 17, '72504-18', 'My first product 2PK hand towel', 'Gold', 18, 16, 0, 'in', 40, 'g', 500, 'pcs', 0, '', 0, '', 0, '', 2, 'pcs', 200, 'g', 30, 24, 20, 'in', 12, 'pcs', 800, 'g', 60, 48, 40, 'in', '2020-03-20 12:00:00', '2020-03-20 12:00:00'),
(25, 16, '62548-48', 'OUTDOOR RUBBER MATS', 'BROWN', 18, 10, 0, 'in', 156, 'g', 200, 'pcs', 0, '', 0, '', 0, '', 1, 'pcs', 160, 'g', 8, 6, 3, 'in', 30, 'pcs', 4.8, 'kg', 36, 30, 15, 'in', '2020-03-24 14:00:00', '2020-03-24 14:00:00'),
(26, 5, '12345-36', '6PK SET HAND TOWEL', 'WHITE', 28, 16, 0, 'in', 150, 'g', 50, 'sets', 0, '', 0, '', 0, '', 6, 'pcs', 900, 'g', 18, 16, 4, 'in', 10, 'sets', 9, 'kg', 42, 36, 28, 'in', '2020-04-01 10:00:00', '2020-04-01 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `so_details`
--

CREATE TABLE `so_details` (
  `so_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty_ord` int(11) NOT NULL,
  `prod_qty_shp` int(11) NOT NULL,
  `prod_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_details`
--

INSERT INTO `so_details` (`so_id`, `prod_id`, `prod_qty_ord`, `prod_qty_shp`, `prod_price`) VALUES
(1, 21, 500, 0, 16),
(1, 23, 300, 0, 11),
(1, 26, 450, 0, 9),
(3, 23, 600, 0, 45),
(4, 23, 40, 0, 10),
(4, 24, 30, 0, 15),
(10, 23, 45, 0, 36),
(12, 24, 12, 0, 16),
(13, 23, 15, 0, 14),
(13, 24, 15, 0, 14),
(14, 24, 751, 0, 9.79),
(15, 23, 120, 0, 5.46),
(16, 23, 1200, 0, 10),
(17, 23, 12, 0, 5.45),
(18, 23, 12, 0, 5),
(19, 23, 12, 0, 3),
(21, 24, 20, 0, 36),
(22, 24, 18, 0, 2.5),
(25, 24, 50, 0, 6.5),
(26, 24, 50, 0, 5.5),
(27, 22, 17, 0, 3),
(27, 24, 15, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `so_header`
--

CREATE TABLE `so_header` (
  `so_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `bill_addr_id` int(11) NOT NULL,
  `ship_addr_id` int(11) NOT NULL,
  `cust_po` varchar(15) NOT NULL,
  `order_date` date NOT NULL,
  `cancel_date` date NOT NULL,
  `ship_method` varchar(50) DEFAULT NULL,
  `pymt_terms` varchar(50) DEFAULT NULL,
  `curr_code` varchar(3) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `so_status` varchar(20) NOT NULL COMMENT 'OPEN, PARTIAL_SHIPPED, SHIPPED, ON_HOLD, CANCELLED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_header`
--

INSERT INTO `so_header` (`so_id`, `cust_id`, `bill_addr_id`, `ship_addr_id`, `cust_po`, `order_date`, `cancel_date`, `ship_method`, `pymt_terms`, `curr_code`, `date_created`, `date_updated`, `so_status`) VALUES
(1, 1, 1, 2, '12345', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(3, 2, 2, 1, '12346', '2020-04-21', '2020-04-29', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(4, 1, 1, 2, '12347', '2020-04-24', '2020-05-28', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(5, 1, 1, 2, '12348', '2020-04-19', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(6, 1, 1, 2, '12349', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(8, 1, 1, 2, '12340', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(9, 1, 2, 1, '123451', '2020-04-29', '2020-06-06', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(10, 1, 2, 2, '12350', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(11, 1, 1, 2, '12352', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(12, 1, 1, 1, '12353', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(13, 1, 2, 1, '12355', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(14, 1, 2, 2, '12357', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(15, 1, 2, 1, '12358', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(16, 1, 2, 1, '12359', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'INR', '2020-04-21', '2020-04-21', 'OPEN'),
(17, 1, 1, 1, '12360', '2020-04-21', '2020-04-25', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(18, 1, 2, 1, '12361', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(19, 1, 1, 1, '12362', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(20, 1, 1, 1, '12365', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(21, 1, 2, 1, '12369', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(22, 1, 2, 2, '12344', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(23, 1, 2, 2, '12343', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(25, 1, 1, 1, '12339', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(26, 1, 1, 1, '12338', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN'),
(27, 1, 1, 1, '12330', '2020-04-21', '2020-04-30', 'SEA', '150 DAYS', 'USD', '2020-04-21', '2020-04-21', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_cat` varchar(35) NOT NULL,
  `task_class` varchar(255) NOT NULL,
  `task_method` varchar(255) NOT NULL,
  `task_dir` varchar(255) NOT NULL,
  `is_perm_req` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_cat`, `task_class`, `task_method`, `task_dir`, `is_perm_req`) VALUES
(1, 'View dashboard page', 'Home', 'dashboard', 'index', 'home/', 0),
(2, 'Show number of unread notifications badge', 'System_Notificatons', 'notifs', 'count_unread_notif', 'systems/', 0),
(3, 'View system notification page', 'System_Notificatons', 'notifs', 'index', 'systems/', 0),
(4, 'View settings menu page', 'Settings', 'menu', 'index', 'settings/', 0),
(5, 'View tasks setting page', 'Task_Settings', 'tasks', 'index', 'settings/', 1),
(6, 'Delete task', 'Task_Settings', 'tasks', 'delete_task', 'settings/', 1),
(7, 'Edit task', 'Task_Settings', 'tasks', 'edit_task', 'settings/', 1),
(8, 'Loads  task category list options to select', 'Task_Settings', 'tasks', 'load_task_cat_options', 'settings/', 0),
(9, 'Create task', 'Task_Settings', 'tasks', 'create_task', 'settings/', 1),
(10, 'View user settings page', 'User_Settings', 'users', 'index', 'settings/', 1),
(11, 'Verify user', 'User_Settings', 'users', 'verify_user', 'settings/', 1),
(12, 'Delete user', 'User_Settings', 'users', 'delete_user', 'settings/', 1),
(13, 'Invite new user', 'User_Settings', 'users', 'invite_user', 'settings/', 1),
(14, 'View user permissions page', 'User_Settings', 'users', 'user_permissions', 'settings/', 1),
(15, 'Save user permissions', 'User_Settings', 'users', 'save_user_perms', 'settings/', 1),
(16, 'Make admin user', 'User_Settings', 'users', 'make_admin', 'settings/', 1),
(17, 'View notification settings page', 'Notification_Settings', 'notifs', 'index', 'settings/', 1),
(18, 'Loads recipients table', 'Notification_Settings', 'notifs', 'show_rcpts', 'settings/', 0),
(19, 'Create notification', 'Notification_Settings', 'notifs', 'create_notif', 'settings/', 1),
(20, 'Delete notification', 'Notification_Settings', 'notifs', 'delete_notif', 'settings/', 1),
(21, 'View user logs page', 'Logs_Settings', 'logs', 'index', 'settings/', 1),
(52, 'Load measurement units select options', 'System_Measurement_Units', 'uom', 'load_uom_options', 'systems/', 0),
(74, 'View categories page', 'Categories', 'categories', 'index', 'items/', 1),
(75, 'Get all categories table', 'Categories', 'categories', 'get_cat_serverside', 'items/', 0),
(76, 'Create category', 'Categories', 'categories', 'create_cat', 'items/', 1),
(77, 'Update category', 'Categories', 'categories', 'save_cat_changes', 'items/', 1),
(78, 'View materials page', 'Materials', 'materials', 'index', 'items/', 1),
(79, 'Get all categories in table', 'Materials', 'materials', 'get_matl_serverside', 'items/', 0),
(80, 'View create material page', 'Materials', 'materials', 'view_create_matl', 'items/', 0),
(81, 'Get material category options', 'Materials', 'materials', 'get_matl_cat_options', 'items/', 0),
(82, 'Create material', 'Materials', 'materials', 'create_matl', 'items/', 1),
(83, 'View edit material page', 'Materials', 'materials', 'view_edit_matl', 'items/', 0),
(84, 'Update material', 'Materials', 'materials', 'save_matl_changes', 'items/', 1),
(85, 'Delete material', 'Materials', 'materials', 'delete_matl', 'items/', 1),
(86, 'View products page', 'Products', 'products', 'index', 'items/', 1),
(87, 'Get all products in table', 'Products', 'products', 'get_prod_serverside', 'items/', 0),
(88, 'View create product page', 'Products', 'products', 'view_create_prod', 'items/', 0),
(89, 'Get product category options', 'Products', 'products', 'get_prod_cat_options', 'items/', 0),
(90, 'Create product', 'Products', 'products', 'create_product', 'items/', 1),
(91, 'View product BOM page', 'Products', 'bom', 'index', 'items/', 0),
(92, 'Get material description BOM addition', 'Products', 'bom', 'get_matl_desc_by_id', 'items/', 0),
(93, 'Get material options for BOM addition', 'Products', 'bom', 'get_matl_options_by_search', 'items/', 0),
(94, 'Add BOM to the product', 'Products', 'bom', 'add_bom', 'items/', 1),
(95, 'Delete BOM of a product', 'Products', 'bom', 'delete_bom', 'items/', 1),
(96, 'Delete product', 'Products', 'products', 'delete_prod', 'items/', 1),
(97, 'View customers page', 'Customers', 'customers', 'index', 'contacts/', 1),
(98, 'View create customer page', 'Customers', 'customers', 'view_create_cust', 'contacts/', 0),
(99, 'Create customer', 'Customers', 'customers', 'create_cust', 'contacts/', 1),
(100, 'Get all customers in table', 'Products', 'customers', 'get_cust_serverside', 'contacts/', 0),
(101, 'View customers address page', 'Customers', 'customers', 'view_cust_addr', 'contacts/', 0),
(102, 'Add customer address', 'Customers', 'customers', 'add_cust_addr', 'contacts/', 1),
(103, 'Delete customer address', 'Customers', 'customers', 'delete_cust_addr', 'contacts/', 1),
(104, 'Delete customer', 'Customers', 'customers', 'delete_cust', 'contacts/', 1),
(105, 'View edit customer page', 'Customers', 'customers', 'view_edit_cust', 'contacts/', 0),
(106, 'Update customer', 'Customers', 'customers', 'save_cust_changes', 'contacts/', 1),
(107, '', '', 'sales', 'index', 'orders/', 1),
(108, '', '', 'sales', 'view_create_so', 'orders/', 1),
(109, '', '', 'customers', 'get_cust_options_by_search', 'contacts/', 1),
(110, '', '', 'customers', 'get_cust_options', 'contacts/', 1),
(111, '', '', 'customers', 'get_cust_addr_options', 'contacts/', 1),
(112, '', '', 'products', 'get_prod_options_by_search', 'items/', 1),
(113, '', '', 'products', 'get_prod_details', 'items/', 1),
(114, '', '', 'react', 'index', '', 1),
(115, '', '', 'sales', 'create_so', 'orders/', 1),
(116, '', '', 'sales', 'add_so_header', 'orders/', 1),
(117, '', '', 'sales', 'add_so_details', 'orders/', 1),
(118, '', '', 'sales', 'delete_so_prod', 'orders/', 1),
(119, '', '', 'sales', 'get_so_serverside', 'orders/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(15) NOT NULL,
  `unit_abbr` varchar(5) NOT NULL,
  `unit_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Unit of measurements';

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`unit_id`, `unit_name`, `unit_abbr`, `unit_type`) VALUES
(1, 'box', 'box', 'Count'),
(2, 'dozen', 'dz', 'Count'),
(3, 'each', 'ea', 'Count'),
(4, 'pieces', 'pcs', 'Count'),
(5, 'sets', 'sets', 'Count'),
(6, 'centimeter', 'cm', 'Length'),
(7, 'feet', 'ft', 'Length'),
(8, 'inches', 'in', 'Length'),
(9, 'meter', 'm', 'Length'),
(10, 'millimeters', 'mm', 'Length'),
(11, 'Days', 'days', 'Time'),
(12, 'Hours', 'hrs', 'Time'),
(13, 'Weeks', 'wks', 'Time'),
(14, 'Years', 'yrs', 'Time'),
(15, 'liter', 'l', 'Volume'),
(16, 'milliliter', 'ml', 'Volume'),
(17, 'gram', 'g', 'Weight'),
(18, 'kilogram', 'kg', 'Weight'),
(19, 'ounce', 'oz', 'Weight'),
(20, 'pound', 'lb', 'Weight');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_regd` datetime NOT NULL,
  `role` varchar(10) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `title`, `date_regd`, `role`, `is_verified`) VALUES
(1, 'Tarique', 'tarique@rituraj.com', '$2y$10$xYU8x7mxFQrC23blDOOI0.bpypr8Sr9kDLZ6ejLKnwVyr2aaDCr7G', '', '', '0000-00-00', '', '2019-12-04 13:29:43', 'ADMIN', 1),
(2, 'Accounts', 'accounts@orientoriginals.com', '$2y$10$D92qVcReJcBhxBxXK7xRiug58aFYM44SFizRr23wVYgbJJIpkktkq', '', '', '0000-00-00', '', '2020-01-24 07:11:13', 'BASIC', 1),
(3, 'Tarique Google', 'mtarique001@gmail.com', '$2y$10$trLFpKlnvwsEMrB0wRNyAu1Bx8DAcXv7SZRz8MlghdggI1ZycZ7sO', '', '', '0000-00-00', '', '2020-01-29 12:10:20', 'BASIC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD UNIQUE KEY `prod_matl_id` (`prod_id`,`matl_id`),
  ADD KEY `fk_bom_materials` (`matl_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`curr_code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD PRIMARY KEY (`cust_addr_id`),
  ADD KEY `fk_address_customers` (`cust_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_users` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`matl_id`),
  ADD KEY `fk_materials_categories` (`matl_cat_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_rcpts`
--
ALTER TABLE `notif_rcpts`
  ADD KEY `fk_rcpt_notif` (`notif_id`),
  ADD KEY `fk_rcpt_users` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD KEY `fk_perms_task` (`task_id`),
  ADD KEY `fk_perms_users` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_products_categories` (`prod_cat_id`);

--
-- Indexes for table `so_details`
--
ALTER TABLE `so_details`
  ADD UNIQUE KEY `so_prod_id` (`so_id`,`prod_id`),
  ADD KEY `fk_so_details_header` (`so_id`) USING BTREE,
  ADD KEY `fk_so_details_prod` (`prod_id`);

--
-- Indexes for table `so_header`
--
ALTER TABLE `so_header`
  ADD PRIMARY KEY (`so_id`),
  ADD UNIQUE KEY `cust_id_po` (`cust_id`,`cust_po`) USING BTREE;

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_name` (`unit_name`),
  ADD UNIQUE KEY `unit_abbr` (`unit_abbr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers_address`
--
ALTER TABLE `customers_address`
  MODIFY `cust_addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `matl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `so_header`
--
ALTER TABLE `so_header`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bom`
--
ALTER TABLE `bom`
  ADD CONSTRAINT `fk_bom_materials` FOREIGN KEY (`matl_id`) REFERENCES `materials` (`matl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bom_products` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD CONSTRAINT `fk_address_customers` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fk_materials_categories` FOREIGN KEY (`matl_cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `notif_rcpts`
--
ALTER TABLE `notif_rcpts`
  ADD CONSTRAINT `fk_rcpt_notif` FOREIGN KEY (`notif_id`) REFERENCES `notif` (`notif_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rcpt_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_perms_task` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perms_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`prod_cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `so_details`
--
ALTER TABLE `so_details`
  ADD CONSTRAINT `fk_so_details_header` FOREIGN KEY (`so_id`) REFERENCES `so_header` (`so_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_so_details_prod` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
