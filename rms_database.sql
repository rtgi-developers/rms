-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 12:51 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_type` varchar(10) NOT NULL,
  `cat_name` varchar(35) NOT NULL,
  `subcat_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_type`, `cat_name`, `subcat_name`) VALUES
(1, 'Material', 'Fabric', 'Cotton Fabric'),
(2, 'Material', 'Fabric', 'Duck Fabric'),
(4, 'Material', 'Office Equipment', 'Laser Printer'),
(5, 'Material', 'Fabric', 'Linen Fabric'),
(6, 'Material', 'Stationary', 'Gel Pen'),
(8, 'Product', 'Towels', 'Hand Towels'),
(9, 'Product', 'Towels', 'Bath Towels'),
(11, 'Material', 'Packing Material', 'Tape'),
(12, 'Material', 'Packing Material', 'Crrugated Boxes'),
(13, 'Material', 'Packing Material', 'Polybag'),
(14, 'Material', 'Stationary', 'Ball Pen'),
(15, 'Material', 'Stationary', 'Notebook'),
(16, 'Material', 'Packing Material', 'Labels'),
(19, 'Product', 'Towels', 'Wash Towels');

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` text NOT NULL,
  `user_agent` text NOT NULL COMMENT 'Browser Version Mobile Platform',
  `req_directory` varchar(255) NOT NULL,
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
  `matl_dim_uom` varchar(10) NOT NULL COMMENT 'Dimensional unit of measurement',
  `matl_weight` double NOT NULL,
  `matl_weight_uom` varchar(10) NOT NULL COMMENT 'Weight unit of measurement',
  `matl_moq` double NOT NULL COMMENT 'Minimum order quantity',
  `matl_count_uom` varchar(10) NOT NULL COMMENT 'Count unit of measurement',
  `matl_created_on` datetime NOT NULL,
  `matl_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Materials';

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`matl_id`, `matl_cat_id`, `matl_name`, `matl_color`, `matl_length`, `matl_width`, `matl_height`, `matl_dim_uom`, `matl_weight`, `matl_weight_uom`, `matl_moq`, `matl_count_uom`, `matl_created_on`, `matl_modified_on`) VALUES
(1, 13, 'My first material', 'Red', 10, 8, 6, '4', 430, '6', 10, '10', '2020-02-19 08:17:03', '0000-00-00 00:00:00'),
(2, 5, 'My second material', 'Brown', 8, 5, 3, '1', 678, '6', 500, '10', '2020-02-19 09:19:07', '0000-00-00 00:00:00'),
(3, 1, 'My third material', 'Black', 8, 4, 1, '4', 10, '7', 5, '12', '2020-02-19 11:58:16', '0000-00-00 00:00:00'),
(4, 4, 'My fourth material - edited', 'White-Gold', 15, 14, 8, '4', 8, '7', 1, '10', '2020-02-19 11:59:19', '2020-02-22 13:16:44'),
(5, 13, 'My fifth material', 'Grey', 5, 3, 1, '4', 10, '7', 1000, '10', '2020-02-19 12:00:29', '0000-00-00 00:00:00'),
(6, 13, 'My sixth material', 'Red', 10, 8, 6, '4', 430, '6', 10, '10', '2020-02-19 08:17:03', '0000-00-00 00:00:00'),
(7, 4, 'My seventh material edited', 'Blue', 8, 5, 3, '4', 67, '6', 500, '10', '2020-02-19 09:19:07', '2020-02-22 13:14:11'),
(8, 1, 'My eighth material', 'Black', 8, 4, 1, '4', 10, '7', 5, '12', '2020-02-19 11:58:16', '0000-00-00 00:00:00'),
(9, 4, 'My ninth material', 'White', 15, 14, 8, '4', 8, '7', 1, '10', '2020-02-19 11:59:19', '0000-00-00 00:00:00'),
(10, 13, 'My tenth material', 'Grey', 5, 3, 1, '4', 10, '7', 1000, '10', '2020-02-19 12:00:29', '0000-00-00 00:00:00'),
(11, 4, 'My eleventh material', 'White', 15, 14, 8, '4', 8, '7', 1, '10', '2020-02-19 11:59:19', '0000-00-00 00:00:00'),
(12, 12, 'ABC Material', 'Chocolate', 8, 4, 2, '4', 79, '6', 1000, '10', '2020-02-22 13:23:16', '2020-02-22 13:23:16');

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
(34, 'Creating testing botification', 1, '2020-01-29 10:26:27');

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
(34, 1, 1);

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
(3, 1, 0),
(3, 4, 0),
(3, 2, 0),
(3, 3, 0),
(3, 5, 0),
(3, 6, 0),
(3, 7, 0),
(3, 8, 0),
(3, 9, 0),
(3, 10, 1),
(3, 11, 0),
(3, 12, 0),
(3, 13, 0),
(3, 14, 1),
(3, 15, 0),
(5, 21, 0),
(5, 17, 1),
(5, 19, 0),
(5, 20, 0),
(5, 5, 0),
(5, 6, 0),
(5, 7, 0),
(5, 9, 0),
(5, 10, 1),
(5, 11, 0),
(5, 12, 1),
(5, 13, 0),
(5, 14, 0),
(5, 15, 0),
(5, 16, 0);

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
  `prod_height` double NOT NULL,
  `prod_dim_uom` int(11) NOT NULL,
  `prod_weight` double NOT NULL,
  `prod_weight_uom` int(11) NOT NULL,
  `prod_moq` double NOT NULL,
  `prod_moq_uom` int(11) NOT NULL,
  `prod_mfg_time` double NOT NULL,
  `prod_mfg_time_uom` int(11) NOT NULL,
  `prod_cost` double NOT NULL,
  `prod_cost_curr` varchar(3) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_price_curr` varchar(3) NOT NULL,
  `ip_qty` double NOT NULL,
  `ip_qty_uom` int(11) NOT NULL,
  `ip_weight` double NOT NULL,
  `ip_weight_uom` int(11) NOT NULL,
  `ip_length` double NOT NULL,
  `ip_width` double NOT NULL,
  `ip_height` double NOT NULL,
  `ip_dim_uom` int(11) NOT NULL,
  `mp_qty` double NOT NULL,
  `mp_qty_uom` int(11) NOT NULL,
  `mp_weight` double NOT NULL,
  `mp_weight_uom` int(11) NOT NULL,
  `mp_length` double NOT NULL,
  `mp_width` double NOT NULL,
  `mp_height` double NOT NULL,
  `mp_dim_uom` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Products';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat_id`, `prod_style_num`, `prod_name`, `prod_color`, `prod_length`, `prod_width`, `prod_height`, `prod_dim_uom`, `prod_weight`, `prod_weight_uom`, `prod_moq`, `prod_moq_uom`, `prod_mfg_time`, `prod_mfg_time_uom`, `prod_cost`, `prod_cost_curr`, `prod_price`, `prod_price_curr`, `ip_qty`, `ip_qty_uom`, `ip_weight`, `ip_weight_uom`, `ip_length`, `ip_width`, `ip_height`, `ip_dim_uom`, `mp_qty`, `mp_qty_uom`, `mp_weight`, `mp_weight_uom`, `mp_length`, `mp_width`, `mp_height`, `mp_dim_uom`, `date_created`, `date_modified`) VALUES
(1, 8, '72504-18', 'My first product 2PK hand towel', 'Gold', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '2020-02-28 10:00:00', '2020-02-28 10:00:00'),
(2, 8, '72504-19', 'My 2nd product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 8, '72504-20', 'My 3rd product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 8, '72504-21', 'My 4th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 8, '72504-22', 'My 5th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 8, '72504-23', 'My 6th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, '72504-24', 'My 7th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, '72504-25', 'My 8th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 8, '72504-26', 'My 9th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, '72504-27', 'My 10th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 8, '72504-28', 'My 11th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 8, '72504-29', 'My 12th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 8, '72504-30', 'My 13th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 8, '72504-31', 'My 14th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 8, '72504-32', 'My 15th product 2PK hand towel', '', 72, 16, 0.5, 4, 346, 6, 500, 14, 15, 18, 75, 'INR', 6, 'USD', 2, 10, 350, 6, 16, 12, 6, 4, 12, 14, 4.2, 7, 20, 14, 10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 19, '72504-33', 'My first product 2PK hand towel', 'Gold', 12, 10, 8, 4, 185, 6, 500, 10, 20, 18, 0, '', 0, '', 12, 10, 200, 6, 14, 12, 10, 4, 24, 14, 250, 6, 24, 10, 6, 4, '2020-02-29 11:00:00', '2020-02-29 11:00:00');

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
(22, 'View categories page', 'Item_Categories', 'categories', 'index', 'items/', 1),
(23, 'Get all categories table', 'Item_Categories', 'categories', 'get_cat_serverside', 'items/', 0),
(24, 'Delete category', 'Item_Categories', 'categories', 'delete_cat', 'items/', 1),
(25, 'Load categories datalist options', 'Item_Categories', 'categories', 'load_cat_list', 'items/', 0),
(26, 'Load sub categories datalist options', 'Item_Categories', 'categories', 'load_subcat_list', 'items/', 0),
(27, 'Create category', 'Item_Categories', 'categories', 'create_cat', 'items/', 1),
(28, 'Edit and update category', 'Item_Categories', 'categories', 'save_cat_changes', 'items/', 1),
(42, 'View materials page', 'Item_Materials', 'materials', 'index', 'items/', 1),
(43, 'Get all materials table', 'Item_Materials', 'materials', 'get_matl_serverside', 'items/', 0),
(44, 'View create materials page', 'Item_Materials', 'materials', 'view_create_matl', 'items/', 1),
(45, 'Load categories select options', 'Item_Materials', 'materials', 'load_cat_list', 'items/', 0),
(46, 'Load sub categories select options', 'Item_Materials', 'materials', 'load_subcat_list', 'items/', 0),
(47, 'Create material', 'Item_Materials', 'materials', 'create_matl', 'items/', 0),
(48, 'View edit materials page', 'Item_Materials', 'materials', 'view_edit_matl', 'items/', 1),
(49, 'Save material changes', 'Item_Materials', 'materials', 'save_matl_changes', 'items/', 0),
(50, 'Delete material', 'Item_Materials', 'materials', 'delete_matl', 'items/', 1),
(52, 'Load measurement units select options', 'System_Measurement_Units', 'uom', 'load_uom_options', 'systems/', 0),
(53, '', '', 'products', 'index', 'items/', 1),
(54, '', '', 'products', 'view_create_prod', 'items/', 1),
(55, '', '', 'categories', 'get_cat_options', 'items/', 1),
(56, '', '', 'products', 'get_prod_cat_options', 'items/', 1),
(57, '', '', 'products', 'get_prod_subcat_options', 'items/', 1),
(58, '', '', 'uom', 'get_uom_options', 'systems/', 1),
(59, '', '', 'products', 'create_product', 'items/', 1);

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
(1, 'centimeter', 'cm', 'Length'),
(2, 'meter', 'm', 'Length'),
(3, 'millimeters', 'mm', 'Length'),
(4, 'inches', 'in', 'Length'),
(5, 'feet', 'ft', 'Length'),
(6, 'gram', 'g', 'Weight'),
(7, 'kilogram', 'kg', 'Weight'),
(8, 'ounce', 'oz', 'Weight'),
(9, 'pound', 'lb', 'Weight'),
(10, 'pieces', 'pcs', 'Count'),
(11, 'each', 'ea', 'Count'),
(12, 'box', 'box', 'Count'),
(13, 'dozen', 'dz', 'Count'),
(14, 'sets', 'sets', 'Count'),
(15, 'pack', 'pack', 'Count'),
(16, 'liter', 'l', 'Volume'),
(17, 'milliliter', 'ml', 'Volume'),
(18, 'Days', 'days', 'Time'),
(19, 'Weeks', 'wks', 'Time'),
(20, 'Years', 'yrs', 'Time'),
(21, 'Hours', 'hrs', 'Time');

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
(3, 'Accounts', 'accounts@orientoriginals.com', '$2y$10$D92qVcReJcBhxBxXK7xRiug58aFYM44SFizRr23wVYgbJJIpkktkq', '', '', '0000-00-00', '', '2020-01-24 07:11:13', 'BASIC', 1),
(5, 'Tarique Google', 'mtarique001@gmail.com', '$2y$10$trLFpKlnvwsEMrB0wRNyAu1Bx8DAcXv7SZRz8MlghdggI1ZycZ7sO', '', '', '0000-00-00', '', '2020-01-29 12:10:20', 'BASIC', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_users` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`matl_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_rcpts`
--
ALTER TABLE `notif_rcpts`
  ADD KEY `fk_rcpt_notif` (`notif_id`);

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
  ADD PRIMARY KEY (`prod_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `matl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notif_rcpts`
--
ALTER TABLE `notif_rcpts`
  ADD CONSTRAINT `fk_rcpt_notif` FOREIGN KEY (`notif_id`) REFERENCES `notif` (`notif_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_perms_task` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perms_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
