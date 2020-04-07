-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 03:43 PM
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
(26, 11, 20, 'pcs');

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
  `cust_email_1` varchar(255) NOT NULL,
  `cust_email_2` varchar(255) DEFAULT NULL,
  `cust_phone_1` varchar(10) NOT NULL,
  `cust_phone_2` varchar(10) NOT NULL,
  `cust_pymt_terms` varchar(50) DEFAULT NULL,
  `cust_comment` varchar(255) DEFAULT NULL,
  `cust_created_on` datetime NOT NULL,
  `cust_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_website`, `cust_email_1`, `cust_email_2`, `cust_phone_1`, `cust_phone_2`, `cust_pymt_terms`, `cust_comment`, `cust_created_on`, `cust_modified_on`) VALUES
(1, 'Orient Originals, Inc.', 'https://orientoriginals.com', 'rb@orientoriginals.com', 'info@orientoriginals.com', '2013320072', '2013320073', NULL, 'Our own company', '2020-04-02 14:00:00', '0000-00-00 00:00:00'),
(2, 'Home Goods, Inc.', 'https://www.homegoods.com/', 'mfraenkel@nyc.rr.com', '', '5083903407', '', 'NET 30 DAYS ROG', 'TJX Group company', '2020-04-03 18:00:00', '2020-04-07 15:00:00'),
(3, 'Rajpootana Holdings', '', 'rb@orientoriginals.com', 'rb@orientoriginals.com', '2013320072', '', '', 'ORG other company', '2020-04-05 15:00:00', '0000-00-00 00:00:00'),
(4, 'Tuesday Morning', 'https://www.tuesdaymorningvendors.com/', 'tms@tuesdaymorning.com', 'trafficinbound@tuesdaymorning.com', '9723873562', '', 'NET 60 ROG', 'Company website https://www.tuesdaymorning.com/', '2020-04-07 15:00:00', '2020-04-07 15:00:00');

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
(1, 1, '55 Edward Hart Drive', '', 'Jersey City', 'NJ', '07305', 'United States');

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `user_ip`, `user_agent`, `req_directory`, `req_controller`, `req_method`, `req_type`, `req_data`, `req_time`) VALUES
(1, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'settings/', 'users', 'user_permissions', 'GET', 'userid: Mg==\nusername: QWNjb3VudHM=\nuseremail: YWNjb3VudHNAb3JpZW50b3JpZ2luYWxzLmNvbQ==\nuserrole: QkFTSUM=\n', '2020-04-01 10:31:43'),
(2, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-01 10:31:44'),
(3, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-01 10:31:46'),
(4, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-01 10:31:47'),
(5, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-01 10:31:47'),
(6, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-01 10:32:31'),
(7, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-01 10:32:31'),
(8, 1, '::1', 'Chrome 80.0.3987.149  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-01 10:32:31'),
(9, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-02 06:52:56'),
(10, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 06:52:57'),
(11, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-02 10:22:54'),
(12, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 10:22:55'),
(13, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-02 10:23:07'),
(14, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 10:23:07'),
(15, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:37:29'),
(16, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:37:29'),
(17, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:37:44'),
(18, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:38:23'),
(19, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:38:24'),
(20, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:52:04'),
(21, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:52:05'),
(22, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:52:28'),
(23, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:52:29'),
(24, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:52:41'),
(25, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:52:42'),
(26, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 11:53:29'),
(27, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 11:53:29'),
(28, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 12:47:27'),
(29, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:47:28'),
(30, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 12:47:31'),
(31, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:47:31'),
(32, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 12:49:32'),
(33, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:49:32'),
(34, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 12:53:48'),
(35, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:53:48'),
(36, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 12:55:05'),
(37, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:55:06'),
(38, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 12:59:22'),
(39, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 12:59:22'),
(40, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:00:21'),
(41, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:00:21'),
(42, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:02:06'),
(43, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:02:07'),
(44, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:02:42'),
(45, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:02:42'),
(46, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-02 13:02:42'),
(47, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'view_create_prod', 'GET', 'No data sent by user.', '2020-04-02 13:02:44'),
(48, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:02:45'),
(49, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_cat_options', 'GET', 'cat-id: 1\n', '2020-04-02 13:02:45'),
(50, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:02:53'),
(51, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:02:54'),
(52, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:03:56'),
(53, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:03:57'),
(54, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:03:58'),
(55, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:03:59'),
(56, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:04:16'),
(57, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:04:16'),
(58, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:04:44'),
(59, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:04:45'),
(60, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:05:01'),
(61, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:01'),
(62, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'settings/', 'menu', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:05:10'),
(63, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:11'),
(64, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'settings/', 'notifs', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:05:11'),
(65, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:12'),
(66, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'settings/', 'notifs', 'show_rcpts', 'GET', 'No data sent by user.', '2020-04-02 13:05:13'),
(67, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:05:29'),
(68, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:29'),
(69, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:05:30'),
(70, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:30'),
(71, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:05:57'),
(72, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:05:58'),
(73, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:06:47'),
(74, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:06:47'),
(75, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:07:09'),
(76, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:07:09'),
(77, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:07:57'),
(78, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:07:57'),
(79, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:09:24'),
(80, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:09:25'),
(81, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:09:53'),
(82, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:09:53'),
(83, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-02 13:09:53'),
(84, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'view_create_prod', 'GET', 'No data sent by user.', '2020-04-02 13:09:55'),
(85, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:09:55'),
(86, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_cat_options', 'GET', 'cat-id: 1\n', '2020-04-02 13:09:55'),
(87, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_cat_options', 'GET', 'cat-id: 15\n', '2020-04-02 13:09:58'),
(88, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_cat_options', 'GET', 'cat-id: 16\n', '2020-04-02 13:09:59'),
(89, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 13:10:20'),
(90, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:10:20'),
(91, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:10:22'),
(92, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:10:22'),
(93, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:10:57'),
(94, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:10:58'),
(95, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:11:40'),
(96, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:11:41'),
(97, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:12:19'),
(98, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:12:19'),
(99, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:13:31'),
(100, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:13:31'),
(101, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:15:33'),
(102, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:15:34'),
(103, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:27:43'),
(104, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:27:44'),
(105, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 13:33:11'),
(106, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 13:33:11'),
(107, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-02 14:23:05'),
(108, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:23:07'),
(109, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-02 14:23:07'),
(110, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-02 14:23:10'),
(111, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:23:11'),
(112, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:23:11'),
(113, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:23:12'),
(114, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:43:44'),
(115, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:43:45'),
(116, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'GET', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: USA\ntxtCustComment: Our own company\n', '2020-04-02 14:46:14'),
(117, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'GET', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: USA\ntxtCustComment: Our own company\n', '2020-04-02 14:47:06'),
(118, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:47:36'),
(119, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:47:37'),
(120, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\ntxtCustComment: Our own company\n', '2020-04-02 14:47:53'),
(121, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:48:17'),
(122, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\ntxtCustComment: Our own company\n', '2020-04-02 14:48:24'),
(123, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\ntxtCustComment: Our own company\n', '2020-04-02 14:49:18'),
(124, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:49:41'),
(125, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:49:42'),
(126, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: \ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\ntxtCustComment: Our own company\n', '2020-04-02 14:50:19'),
(127, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:51:39'),
(128, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:51:40'),
(129, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Orient Originals, Inc.\ntxtCustWebsite: https://orientoriginals.com\ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: info@orientoriginals.com\ntxtCustPhone1: 2013320072\ntxtCustPhone2: 2013320073\ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\ntxtCustComment: Our own company\n', '2020-04-02 14:52:12'),
(130, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-02 14:59:08'),
(131, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-02 14:59:09'),
(132, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 14:33:25'),
(133, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 14:33:26'),
(134, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'settings/', 'menu', 'index', 'GET', 'No data sent by user.', '2020-04-03 14:33:27'),
(135, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 14:33:28'),
(136, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 14:35:03'),
(137, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 14:35:03'),
(138, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 15:59:28'),
(139, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 15:59:29'),
(140, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 15:59:34'),
(141, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 15:59:34'),
(142, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:26:21'),
(143, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:26:21'),
(144, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:26:23'),
(145, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:26:24'),
(146, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:26:24'),
(147, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:26:52'),
(148, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:26:52'),
(149, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:27:44'),
(150, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:27:45'),
(151, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:27:45'),
(152, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'GET', 'No data sent by user.', '2020-04-03 17:27:54'),
(153, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'GET', 'No data sent by user.', '2020-04-03 17:28:55'),
(154, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:28:56'),
(155, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:28:57'),
(156, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:28:57'),
(157, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:29:53'),
(158, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:29:54'),
(159, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:29:54'),
(160, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:31:46'),
(161, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:31:47'),
(162, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:31:47'),
(163, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:34:58'),
(164, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:34:59'),
(165, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:34:59'),
(166, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:35:43'),
(167, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:35:44'),
(168, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:35:44'),
(169, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:36:04'),
(170, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:36:05'),
(171, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:36:05'),
(172, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:36:20'),
(173, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:36:21'),
(174, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:36:21'),
(175, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:44:32'),
(176, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:44:33'),
(177, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:44:33'),
(178, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:44:44'),
(179, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:44:45'),
(180, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:44:45'),
(181, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:45:07'),
(182, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:45:07'),
(183, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:45:07'),
(184, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:45:39'),
(185, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:45:39'),
(186, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:45:39'),
(187, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:46:21'),
(188, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:46:22'),
(189, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:46:22'),
(190, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:47:24'),
(191, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:47:24'),
(192, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:47:24'),
(193, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:49:58'),
(194, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:49:59'),
(195, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:49:59'),
(196, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:50:11'),
(197, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:50:12'),
(198, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:12'),
(199, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:50:21'),
(200, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:50:22'),
(201, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:22'),
(202, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 2\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: u\nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:31'),
(203, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 3\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: un\nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:32'),
(204, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 4\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: uni\nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:32'),
(205, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 5\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: un\nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:34'),
(206, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 6\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: u\nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:34'),
(207, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 7\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:50:34'),
(208, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:55:21'),
(209, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:55:22'),
(210, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:55:22'),
(211, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:55:39'),
(212, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:55:40');
INSERT INTO `logs` (`log_id`, `user_id`, `user_ip`, `user_agent`, `req_directory`, `req_controller`, `req_method`, `req_type`, `req_data`, `req_time`) VALUES
(213, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:55:40'),
(214, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:57:00'),
(215, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:57:02'),
(216, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:57:03'),
(217, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:57:03'),
(218, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 17:57:19'),
(219, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 17:57:20'),
(220, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 17:57:20'),
(221, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 2\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:52'),
(222, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 3\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: or\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:52'),
(223, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 4\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: ori\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:53'),
(224, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 5\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: orie\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:53'),
(225, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 6\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: orien\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:54'),
(226, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 7\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: orient\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:54'),
(227, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 8\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: orien\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:55'),
(228, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 9\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: orie\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:55'),
(229, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 10\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: ori\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:55'),
(230, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 11\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: or\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:55'),
(231, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 12\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:56'),
(232, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 13\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o0\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:59'),
(233, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 14\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o00\nregex: false\nci_csrf_token: \n', '2020-04-03 17:59:59'),
(234, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 15\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o0\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:00'),
(235, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 16\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: o\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:00'),
(236, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 17\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:00'),
(237, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 18\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:00'),
(238, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 19\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 0\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:01'),
(239, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 20\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 00\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:01'),
(240, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 21\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 007\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:02'),
(241, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 22\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 0072\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:02'),
(242, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 23\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 007\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:03'),
(243, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 24\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 0073\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:04'),
(244, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 25\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 007\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:06'),
(245, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 26\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 00\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:06'),
(246, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 27\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: 0\nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:06'),
(247, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 28\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:00:07'),
(248, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:04:41'),
(249, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:05:36'),
(250, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:05:36'),
(251, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:05:40'),
(252, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:05:41'),
(253, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:05:41'),
(254, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:06:07'),
(255, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:06:07'),
(256, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:06:07'),
(257, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:06:22'),
(258, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:06:22'),
(259, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:06:22'),
(260, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-03 18:09:24'),
(261, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:09:25'),
(262, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Home Goods, Inc.\ntxtCustWebsite: https://www.homegoods.com/\ntxtCustEmail1: mfraenkel@nyc.rr.com\ntxtCustEmail2: \ntxtCustPhone1: 5083903407\ntxtCustPhone2: \ntxtCustAddr1: P O BOX 9338\ntxtCustAddr2: \ntxtCustCity: Framingham\ntxtCustState: MA\ntxtCustPostalCode: 1701\ntxtCustCountry: United States\ntxtCustComment: \n', '2020-04-03 18:14:19'),
(263, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:14:23'),
(264, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:14:23'),
(265, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:14:23'),
(266, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:18:37'),
(267, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:18:37'),
(268, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:23:24'),
(269, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:23:24'),
(270, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:23:25'),
(271, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-03 18:23:26'),
(272, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:23:26'),
(273, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-03 18:24:06'),
(274, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:24:06'),
(275, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:27:30'),
(276, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:27:31'),
(277, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:27:31'),
(278, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-03 18:27:53'),
(279, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-03 18:27:54'),
(280, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-03 18:27:54'),
(281, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-03 19:49:54'),
(282, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-04 10:59:28'),
(283, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 10:59:29'),
(284, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 11:09:39'),
(285, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 11:09:40'),
(286, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 11:09:40'),
(287, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 11:41:20'),
(288, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 11:41:21'),
(289, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 11:48:41'),
(290, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 11:48:42'),
(291, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 11:48:42'),
(292, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 12:00:53'),
(293, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:00:54'),
(294, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:01:39'),
(295, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:01:40'),
(296, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:01:40'),
(297, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:03:48'),
(298, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:03:49'),
(299, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:03:49'),
(300, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'index', 'GET', 'prodid: 22\nprodname: My first product 2PK hand towel\n', '2020-04-04 12:03:52'),
(301, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:03:53'),
(302, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:03:55'),
(303, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:04:10'),
(304, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:04:11'),
(305, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:04:11'),
(306, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:05:19'),
(307, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:05:20'),
(308, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:05:20'),
(309, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:05:31'),
(310, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:05:32'),
(311, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:05:32'),
(312, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:05:53'),
(313, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:05:53'),
(314, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:05:53'),
(315, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:09:09'),
(316, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:09:09'),
(317, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:09:10'),
(318, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:10:26'),
(319, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:10:27'),
(320, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:10:27'),
(321, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:11:12'),
(322, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:11:12'),
(323, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:11:12'),
(324, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:11:14'),
(325, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:11:15'),
(326, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:11:15'),
(327, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:17:11'),
(328, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:17:12'),
(329, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:17:12'),
(330, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'index', 'GET', 'prodid: 22\nprodname: My first product 2PK hand towel\n', '2020-04-04 12:17:13'),
(331, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:17:14'),
(332, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:17:16'),
(333, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:17:36'),
(334, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:17:49'),
(335, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: \n', '2020-04-04 12:17:56'),
(336, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:17:56'),
(337, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: \n', '2020-04-04 12:21:45'),
(338, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:21:46'),
(339, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: \n', '2020-04-04 12:21:46'),
(340, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:23:48'),
(341, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:25:27'),
(342, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:25:28'),
(343, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:25:29'),
(344, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:25:45'),
(345, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:25:45'),
(346, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:25:45'),
(347, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:25:47'),
(348, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:25:47'),
(349, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:26:58'),
(350, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:26:58'),
(351, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:27:13'),
(352, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:27:14'),
(353, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:27:14'),
(354, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'index', 'GET', 'prodid: 25\nprodname: OUTDOOR RUBBER MATS\n', '2020-04-04 12:27:15'),
(355, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:27:16'),
(356, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: \n', '2020-04-04 12:27:18'),
(357, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 12:27:46'),
(358, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:27:47');
INSERT INTO `logs` (`log_id`, `user_id`, `user_ip`, `user_agent`, `req_directory`, `req_controller`, `req_method`, `req_type`, `req_data`, `req_time`) VALUES
(359, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 12:27:47'),
(360, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:27:48'),
(361, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:27:49'),
(362, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:28:24'),
(363, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:28:25'),
(364, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:34:16'),
(365, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:34:16'),
(366, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:34:39'),
(367, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:34:40'),
(368, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:35:09'),
(369, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:35:10'),
(370, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:36:55'),
(371, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:36:55'),
(372, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:52:35'),
(373, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:52:36'),
(374, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 12:59:34'),
(375, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 12:59:35'),
(376, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 12:59:40'),
(377, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:00:23'),
(378, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:00:24'),
(379, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 13:00:51'),
(380, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:06:54'),
(381, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:06:56'),
(382, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 13:07:03'),
(383, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:13:51'),
(384, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:13:52'),
(385, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:17:43'),
(386, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:17:43'),
(387, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:19:12'),
(388, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:19:13'),
(389, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:20:01'),
(390, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:20:02'),
(391, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:22:02'),
(392, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:22:02'),
(393, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:22:40'),
(394, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:22:41'),
(395, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:22:50'),
(396, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:22:53'),
(397, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 55 Edward Hart Drive\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 13:23:38'),
(398, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:23:40'),
(399, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:23:41'),
(400, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:24:20'),
(401, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:24:21'),
(402, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:25:24'),
(403, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:25:25'),
(404, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:27:14'),
(405, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:27:14'),
(406, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:28:00'),
(407, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:28:00'),
(408, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:28:55'),
(409, 1, '::1', 'Chrome 80.0.3987.162  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:28:56'),
(410, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-04 13:31:24'),
(411, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:31:24'),
(412, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 13:31:28'),
(413, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:31:29'),
(414, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 13:31:29'),
(415, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 13:31:32'),
(416, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:31:32'),
(417, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: \ntxtCustWebsite: \ntxtCustEmail1: \ntxtCustEmail2: \ntxtCustPhone1: \ntxtCustPhone2: \ntxtCustAddr1: \ntxtCustAddr2: \ntxtCustCity: \ntxtCustState: \ntxtCustPostalCode: \ntxtCustCountry: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 13:31:34'),
(418, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: \ntxtCustWebsite: \ntxtCustEmail1: \ntxtCustEmail2: \ntxtCustPhone1: \ntxtCustPhone2: \ntxtCustAddr1: \ntxtCustAddr2: \ntxtCustCity: \ntxtCustState: \ntxtCustPostalCode: \ntxtCustCountry: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 13:31:39'),
(419, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: \ntxtCustWebsite: \ntxtCustEmail1: \ntxtCustEmail2: \ntxtCustPhone1: \ntxtCustPhone2: \ntxtCustAddr1: \ntxtCustAddr2: \ntxtCustCity: \ntxtCustState: \ntxtCustPostalCode: \ntxtCustCountry: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 13:31:39'),
(420, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: \ntxtCustWebsite: \ntxtCustEmail1: \ntxtCustEmail2: \ntxtCustPhone1: \ntxtCustPhone2: \ntxtCustAddr1: \ntxtCustAddr2: \ntxtCustCity: \ntxtCustState: \ntxtCustPostalCode: \ntxtCustCountry: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 13:31:40'),
(421, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: \ntxtCustWebsite: \ntxtCustEmail1: \ntxtCustEmail2: \ntxtCustPhone1: \ntxtCustPhone2: \ntxtCustAddr1: \ntxtCustAddr2: \ntxtCustCity: \ntxtCustState: \ntxtCustPostalCode: \ntxtCustCountry: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 13:31:41'),
(422, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 13:31:48'),
(423, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:31:48'),
(424, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 13:31:48'),
(425, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 13:31:51'),
(426, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 13:31:51'),
(427, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 14:00:05'),
(428, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 14:00:06'),
(429, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 14:00:13'),
(430, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 14:00:14'),
(431, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 14:00:38'),
(432, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 14:00:38'),
(433, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 46 CONSTITUTION WAY\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 14:07:53'),
(434, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 14:09:25'),
(435, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 14:09:25'),
(436, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 475 OBERLIN AVENUE SOUTH\ntxtCustAddr2: \ntxtCustCity: Lakewood\ntxtCustState: NJ\ntxtCustPostalCode: 08701-6904\ntxtCustCountry: United States\n', '2020-04-04 14:50:55'),
(437, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 475 OBERLIN AVENUE SOUTH\ntxtCustAddr2: \ntxtCustCity: Lakewood\ntxtCustState: NJ\ntxtCustPostalCode: 08701-6904\ntxtCustCountry: United States\n', '2020-04-04 14:51:22'),
(438, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 475 OBERLIN AVENUE SOUTH\ntxtCustAddr2: \ntxtCustCity: Lakewood\ntxtCustState: NJ\ntxtCustPostalCode: 08701-6904\ntxtCustCountry: United States\n', '2020-04-04 14:51:55'),
(439, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 15:12:23'),
(440, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:12:23'),
(441, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 1\n', '2020-04-04 15:14:49'),
(442, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 2\n', '2020-04-04 15:14:59'),
(443, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_cust_addr', 'GET', 'custid: 1\ncustname: Orient Originals, Inc.\n', '2020-04-04 15:17:39'),
(444, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:17:40'),
(445, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 2\n', '2020-04-04 15:17:44'),
(446, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 3\n', '2020-04-04 15:19:07'),
(447, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 4\n', '2020-04-04 15:19:11'),
(448, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 5\n', '2020-04-04 15:19:15'),
(449, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'add_cust_addr', 'POST', 'txtCustId: 1\ntxtCustAddr1: 46 CONSTITUTION WAY\ntxtCustAddr2: \ntxtCustCity: Jersey City\ntxtCustState: NJ\ntxtCustPostalCode: 07305\ntxtCustCountry: United States\n', '2020-04-04 15:19:20'),
(450, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust_addr', 'GET', 'custid: 1\ncustaddrid: 6\n', '2020-04-04 15:19:23'),
(451, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 15:24:13'),
(452, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:24:14'),
(453, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 15:24:14'),
(454, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 15:24:18'),
(455, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:24:19'),
(456, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 15:29:48'),
(457, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:29:48'),
(458, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 15:29:52'),
(459, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:29:53'),
(460, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 15:29:53'),
(461, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 15:30:19'),
(462, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:30:19'),
(463, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 15:30:19'),
(464, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 15:31:29'),
(465, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:31:30'),
(466, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 15:31:30'),
(467, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 15:31:31'),
(468, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:31:31'),
(469, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Rajpootana Holdings\ntxtCustWebsite: \ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: rb@orientoriginals.com\ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 15:31:54'),
(470, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Rajpootana Holdings\ntxtCustWebsite: \ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: rb@orientoriginals.com\ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustPymtTerms: \ntxtCustComment: \n', '2020-04-04 15:31:58'),
(471, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-04 15:33:16'),
(472, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:33:16'),
(473, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-04 15:33:17'),
(474, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-04 15:33:18'),
(475, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-04 15:33:18'),
(476, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:39:48'),
(477, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:39:52'),
(478, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:39:57'),
(479, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:39:59'),
(480, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:39:59'),
(481, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:42:00'),
(482, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:42:03'),
(483, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:42:03'),
(484, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:42:27'),
(485, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:42:31'),
(486, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:42:31'),
(487, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:42:48'),
(488, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:42:51'),
(489, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:42:51'),
(490, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:44:11'),
(491, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:44:13'),
(492, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:44:13'),
(493, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:46:26'),
(494, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:46:28'),
(495, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:46:28'),
(496, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:47:17'),
(497, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:47:19'),
(498, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:47:20'),
(499, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 14:47:54'),
(500, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 14:47:57'),
(501, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 14:47:57'),
(502, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:05:13'),
(503, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:05:13'),
(504, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:05:16'),
(505, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:05:17'),
(506, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:05:17'),
(507, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'index', 'GET', 'prodid: 25\nprodname: OUTDOOR RUBBER MATS\n', '2020-04-05 15:05:22'),
(508, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:05:22'),
(509, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: r\n', '2020-04-05 15:05:28'),
(510, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: re\n', '2020-04-05 15:05:29'),
(511, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: red\n', '2020-04-05 15:05:29'),
(512, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 1\n', '2020-04-05 15:05:30'),
(513, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 1\n', '2020-04-05 15:05:32'),
(514, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 10\n', '2020-04-05 15:05:36'),
(515, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: 10\n', '2020-04-05 15:05:37'),
(516, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'add_bom', 'POST', 'txtProdId: 25\ntxtMatlId: 10\ntxtMatlName: My tenth material - Grey\ntxtMatlQty: 15\ntxtMatlQtyUom: pcs\n', '2020-04-05 15:05:55'),
(517, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 1\n', '2020-04-05 15:06:01'),
(518, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: \n', '2020-04-05 15:06:01'),
(519, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: r\n', '2020-04-05 15:06:11'),
(520, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: re\n', '2020-04-05 15:06:11'),
(521, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: red\n', '2020-04-05 15:06:12'),
(522, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 1\n', '2020-04-05 15:06:13'),
(523, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_options_by_search', 'GET', 'keyword: 14\n', '2020-04-05 15:06:17'),
(524, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'get_matl_desc_by_id', 'GET', 'matlid: 14\n', '2020-04-05 15:06:18'),
(525, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'add_bom', 'POST', 'txtProdId: 25\ntxtMatlId: 14\ntxtMatlName: My Duck Duck Go Fabric - White\ntxtMatlQty: 20\ntxtMatlQtyUom: pcs\n', '2020-04-05 15:06:24'),
(526, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'products', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:06:30'),
(527, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:06:30'),
(528, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'products', 'get_prod_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 5\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:06:30'),
(529, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'index', 'GET', 'prodid: 25\nprodname: OUTDOOR RUBBER MATS\n', '2020-04-05 15:06:34'),
(530, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:06:34'),
(531, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'items/', 'bom', 'delete_bom', 'GET', 'prodid: 25\nmatlid: 10\n', '2020-04-05 15:06:48'),
(532, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:07:15'),
(533, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:07:16'),
(534, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:07:16'),
(535, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-05 15:07:29'),
(536, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:07:30'),
(537, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:07:33'),
(538, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:07:33'),
(539, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:07:34'),
(540, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:12:49'),
(541, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:12:50'),
(542, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:12:51'),
(543, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'delete_cust', 'GET', 'custid: 3\n', '2020-04-05 15:13:06'),
(544, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-05 15:13:20'),
(545, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:13:21'),
(546, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Rajpootana Holdings\ntxtCustWebsite: \ntxtCustEmail1: rb@orientoriginals.com\ntxtCustEmail2: rb@orientoriginals.com\ntxtCustPhone1: 2013320072\ntxtCustPhone2: \ntxtCustPymtTerms: \ntxtCustComment: ORG other company\n', '2020-04-05 15:14:04'),
(547, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:14:14'),
(548, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:14:15'),
(549, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:14:15'),
(550, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:14:42'),
(551, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:14:43'),
(552, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:14:44'),
(553, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:18:00'),
(554, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:18:01'),
(555, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:18:01'),
(556, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-05 15:18:30'),
(557, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-05 15:18:31'),
(558, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-05 15:18:31'),
(559, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-06 04:57:02'),
(560, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-06 04:57:03'),
(561, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-06 04:57:19'),
(562, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-06 04:57:19'),
(563, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-06 04:57:20'),
(564, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'home/', 'dashboard', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:00:04'),
(565, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:00:05'),
(566, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:00:08'),
(567, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:00:09'),
(568, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:00:09'),
(569, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:14:28'),
(570, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:14:29'),
(571, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:14:29'),
(572, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:15:20'),
(573, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:15:20'),
(574, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:15:20'),
(575, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:15:44'),
(576, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:15:44');
INSERT INTO `logs` (`log_id`, `user_id`, `user_ip`, `user_agent`, `req_directory`, `req_controller`, `req_method`, `req_type`, `req_data`, `req_time`) VALUES
(577, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:15:44'),
(578, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:15:46'),
(579, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:15:47'),
(580, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:16:33'),
(581, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:16:34'),
(582, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:18:38'),
(583, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:18:39'),
(584, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:19:51'),
(585, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:19:52'),
(586, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:20:22'),
(587, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:20:23'),
(588, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:30:01'),
(589, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:30:02'),
(590, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:30:14'),
(591, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:30:15'),
(592, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:31:24'),
(593, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:31:24'),
(594, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:31:45'),
(595, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:31:46'),
(596, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'POST', 'txtEditCustId: 2\ntxtEditCustName: Home Goods, Inc.\ntxtEditCustWebsite: https://www.homegoods.com/\ntxtEditCustEmail1: mfraenkel@nyc.rr.com\ntxtEditCustEmail2: \ntxtEditCustPhone1: 5083903407\ntxtEditCustPhone2: \ntxtEditCustPymtTerms: 30 DAYS ROG\ntxtEditCustComment: TJX Group company\n', '2020-04-07 15:31:51'),
(597, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'GET', 'No data sent by user.', '2020-04-07 15:31:58'),
(598, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'POST', 'txtEditCustId: 2\ntxtEditCustName: Home Goods, Inc.\ntxtEditCustWebsite: https://www.homegoods.com/\ntxtEditCustEmail1: mfraenkel@nyc.rr.com\ntxtEditCustEmail2: \ntxtEditCustPhone1: 5083903407\ntxtEditCustPhone2: \ntxtEditCustPymtTerms: 30 DAYS ROG\ntxtEditCustComment: TJX Group company\n', '2020-04-07 15:32:05'),
(599, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:35:09'),
(600, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:35:10'),
(601, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'POST', 'txtEditCustId: 2\ntxtEditCustName: Home Goods, Inc.\ntxtEditCustWebsite: https://www.homegoods.com/\ntxtEditCustEmail1: mfraenkel@nyc.rr.com\ntxtEditCustEmail2: \ntxtEditCustPhone1: 5083903407\ntxtEditCustPhone2: \ntxtEditCustPymtTerms: 30 DAYS ROG\ntxtEditCustComment: TJX Group company\n', '2020-04-07 15:35:14'),
(602, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'POST', 'txtEditCustId: 2\ntxtEditCustName: Home Goods, Inc.\ntxtEditCustWebsite: https://www.homegoods.com/\ntxtEditCustEmail1: mfraenkel@nyc.rr.com\ntxtEditCustEmail2: \ntxtEditCustPhone1: 5083903407\ntxtEditCustPhone2: \ntxtEditCustPymtTerms: 30 DAYS ROG\ntxtEditCustComment: TJX Group company\n', '2020-04-07 15:35:54'),
(603, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:35:57'),
(604, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:35:58'),
(605, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'save_cust_changes', 'POST', 'txtEditCustId: 2\ntxtEditCustName: Home Goods, Inc.\ntxtEditCustWebsite: https://www.homegoods.com/\ntxtEditCustEmail1: mfraenkel@nyc.rr.com\ntxtEditCustEmail2: \ntxtEditCustPhone1: 5083903407\ntxtEditCustPhone2: \ntxtEditCustPymtTerms: net 30 DAYS ROG\ntxtEditCustComment: TJX Group company\n', '2020-04-07 15:36:21'),
(606, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_edit_cust', 'GET', 'custid: 2\n', '2020-04-07 15:36:23'),
(607, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:36:24'),
(608, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:36:38'),
(609, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:36:39'),
(610, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:36:39'),
(611, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'view_create_cust', 'GET', 'No data sent by user.', '2020-04-07 15:36:42'),
(612, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:36:42'),
(613, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Tuesday Morning\ntxtCustWebsite:  https://www.tuesdaymorningvendors.com\ntxtCustEmail1: tms@tuesdaymorning.com\ntxtCustEmail2: trafficinbound@tuesdaymorning.com\ntxtCustPhone1: 9723873562\ntxtCustPhone2: \ntxtCustPymtTerms: NET 60 ROG\ntxtCustComment: Company website https://www.tuesdaymorning.com/\n', '2020-04-07 15:40:19'),
(614, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Tuesday Morning\ntxtCustWebsite:  https://www.tuesdaymorningvendors.com/\ntxtCustEmail1: tms@tuesdaymorning.com\ntxtCustEmail2: trafficinbound@tuesdaymorning.com\ntxtCustPhone1: 9723873562\ntxtCustPhone2: \ntxtCustPymtTerms: NET 60 ROG\ntxtCustComment: Company website https://www.tuesdaymorning.com/\n', '2020-04-07 15:40:27'),
(615, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'create_cust', 'POST', 'txtCustName: Tuesday Morning\ntxtCustWebsite: https://www.tuesdaymorningvendors.com/\ntxtCustEmail1: tms@tuesdaymorning.com\ntxtCustEmail2: trafficinbound@tuesdaymorning.com\ntxtCustPhone1: 9723873562\ntxtCustPhone2: \ntxtCustPymtTerms: NET 60 ROG\ntxtCustComment: Company website https://www.tuesdaymorning.com/\n', '2020-04-07 15:40:33'),
(616, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'index', 'GET', 'No data sent by user.', '2020-04-07 15:40:38'),
(617, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'systems/', 'notifs', 'count_unread_notif', 'GET', 'No data sent by user.', '2020-04-07 15:40:38'),
(618, 1, '::1', 'Chrome 80.0.3987.163  Windows 10', 'contacts/', 'customers', 'get_cust_serverside', 'POST', 'draw: 1\ndata: 0\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 1\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 2\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 3\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ndata: 4\nname: \nsearchable: true\norderable: true\nvalue: \nregex: false\ncolumn: 0\ndir: asc\nstart: 0\nlength: 10\nvalue: \nregex: false\nci_csrf_token: \n', '2020-04-07 15:40:38');

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
(35, 'Lockdown due to Coronavirus', 1, '2020-03-25 17:07:18'),
(36, 'Cool cool collll', 1, '2020-03-31 12:55:41');

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
(35, 1, 0),
(35, 2, 0),
(35, 3, 0),
(36, 1, 0),
(36, 2, 0),
(36, 3, 0);

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
(11, 4, '72504-28', 'My 11th product 2PK hand towel', '', 72, 16, 0.5, '4', 346, '6', 500, '14', 15, '18', 75, 'INR', 6, 'USD', 2, '10', 350, '6', 16, 12, 6, '4', 12, '14', 4.2, '7', 20, 14, 10, '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(97, '', '', 'customers', 'index', 'contacts/', 1),
(98, '', '', 'customers', 'view_create_cust', 'contacts/', 1),
(99, '', '', 'customers', 'create_cust', 'contacts/', 1),
(100, '', '', 'customers', 'get_cust_serverside', 'contacts/', 1),
(101, '', '', 'customers', 'view_cust_addr', 'contacts/', 1),
(102, '', '', 'customers', 'add_cust_addr', 'contacts/', 1),
(103, '', '', 'customers', 'delete_cust_addr', 'contacts/', 1),
(104, '', '', 'customers', 'delete_cust', 'contacts/', 1),
(105, '', '', 'customers', 'view_edit_cust', 'contacts/', 1),
(106, '', '', 'customers', 'save_cust_changes', 'contacts/', 1);

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
  MODIFY `cust_addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=619;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `matl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
