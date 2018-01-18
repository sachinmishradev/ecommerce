-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2017 at 06:30 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2275758_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'sachin@gmail.com', 'sachinadmin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Styli'),
(2, 'dkyjgh'),
(3, 'Dr.Batra\'s ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `size` varchar(25) NOT NULL DEFAULT 'medium',
  `qty` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Quotes'),
(3, 'Men\'s'),
(4, 'Ladie\'s'),
(5, 'Being Human'),
(6, 'RAPCHIK'),
(7, 'Hair Care');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_street` varchar(255) NOT NULL,
  `customer_landmark` varchar(200) NOT NULL,
  `customer_pincode` varchar(20) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_street`, `customer_landmark`, `customer_pincode`, `customer_address`, `customer_image`, `token`, `activated`) VALUES
(24, '::1', 'mishra', 'mishra@gmail.com', 'sachinmishra', '99', 'Punjab', '8285300742', '155/5 shyam colony', 'near durga builder gate ', '121003', 'faridabad haryana\r\n', '20160604_154336.jpg', 'f46ef1789c8d36ab5af884a11c917db3', '1'),
(25, '::1', 'RAPCHIK', 'rap@gmail.com', 'kali', '99', 'Haryana', '8285300742', '', '', '', 'g-115', '1.JPG', 'c1518d889529278c227ef533725b55fa', '1'),
(35, '::1', 'kjyhvs', 's@g.com', 'kali', 'india', 'tugalkabad', 'hgvsdjhab', 'hgasgchv', 'shgdvhajh', '121003333', 'assxA', '1.JPG', '14ea35797caf4efb3e87928b68e8d9d4', '1'),
(37, '2405:204:1387:3446:9c34:ce87:34dd:ded1', 'Sachin', '987@gmail.com ', 'sa', '99', 'Delhi-Ncr', '8285300742 ', 'Shyam colony Faridabad ', 'Near Durga builder gate', '121003', 'Hello moto', 'IMG_v3dcdx.jpg', 'bddced9e30179dc20f437a5ee2e552104adss839', '1'),
(38, '47.30.32.216', 'happy', 'happy@gmail.com', 'happy', '99', 'Delhi-Ncr', '8284511515', 'sakuba', 'aidygakubj', '121003', 'saukyjbh', '20160806_121520.jpg', '6f4db85483cd927e885bbdf7c61e50574asds398', '1'),
(39, '172.98.84.205', 'SUMIT KUMAR', 'sumitsngh1698@gmail.com', 'sumitsingh@1698', '99', 'Delhi-Ncr', '8285828488', '234 004 GUPTA COLONY Sangam Vihar Kalkaji South East Delhi India 110080', 'Delhi', '110080', '234 004 GUPTA COLONY Sangam Vihar Kalkaji South East Delhi India 110080', 'LOGO1.jpg', '37d6d89a2fd3cadf869a4a94f555d8184s98s3da', '1'),
(40, '2405:204:12a2:9d27:4658:953e:17dd:4155', 'Shaan', 'shaan@gmail.com', '123456789123', '99', 'Delhi-Ncr', '8285300742 ', 'Shyam colony 5', 'None Selected', '121003', 'Shyam colony h-no 115/5 neardurgabuilder gate amarnagar', 'BeautyPlus_20170916160707_save.jpg', 'a6f2236e9609892fdf49534ff20903f49a4dss38', '0'),
(42, '2405:204:1100:7cd3:f5a7:ad4c:f539:6cb3', 'sachin mishra', 'sachinmishra199747@gmail.com', 'sachinmishrag', '99', 'Delhi-Ncr', '8285300742', 'shyam colony', 'Haryana', '121003', 'shyam colony', 'default.jpg', 'e7c685549ade566ffb08e3f373835dc7ad489ss3', '1'),
(43, '47.30.89.175', 'sachin mishra', 'itsmesachin987@gmail.com', 'sachinmishra', '99', 'Delhi-Ncr', '', '115/5 sehatpur amarnagar, faridabad', 'Haryana', '121003', 'shyam colony 121003', 'default.jpg', 'b768b67e019c0108b7e9db1194fc1a9adsas8943', '0'),
(44, '47.30.89.175', 'sachin mishra', 'pythonbuff@gmail.com', 'sachinmishra', '99', 'Delhi-Ncr', '', 'shyam colony', 'Haryana', '121003', 'shyam ', 'default.jpg', 'a04b6c2ef4a091c66473da82820e21729sad3s48', '1'),
(45, '2405:204:1221:11d9:5334:91d1:4bbb:5851', 'Ravi mishra', 'itsmerkmishra@gmail.com', 'ravikantmishra', '99', 'Delhi-Ncr', '', '115/5 Shyam colony ', 'Near durga builder gate', '121003', 'Faridabad haryana', 'default.jpg', '4435f97150fcec39534555b18ab696fc3s9d8as4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `image1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `main_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`image1`, `image2`, `image3`, `image4`, `main_image`) VALUES
('blue1.jpg', 'blue2.jpg', 'blue3.jpg', 'blue.jpg', 'blue.jpg'),
('grey1.jpg', 'grey2.jpg', 'grey3.jpg', 'grey.jpg', 'grey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `Payment_mode` text NOT NULL,
  `deltype` varchar(60) NOT NULL,
  `order_date` datetime NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'In Progress...'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_id`, `c_id`, `size`, `qty`, `amount`, `Payment_mode`, `deltype`, `order_date`, `invoice_no`, `status`) VALUES
(96, 20, 42, 'xlarge', 2, '1699', 'COD', 'instant', '2017-09-28 10:32:19', '1417677202', 'In Progress...'),
(97, 5, 42, 'large', 15, '24099', 'COD', 'instant', '2017-09-29 09:22:10', '1111287879', 'In Progress...'),
(98, 13, 42, 'xlarge', 12, '3459', 'COD', 'instant', '2017-09-29 09:22:10', '1067577760', 'In Progress...'),
(99, 18, 42, 'large', 6, '1593', 'COD', 'instant', '2017-09-29 09:22:10', '1440904733', 'In Progress...'),
(100, 20, 42, 'xlarge', 13, '10499', 'COD', 'instant', '2017-09-29 09:22:11', '447490795', 'In Progress...'),
(101, 15, 42, 'xlarge', 3, '15000', 'COD', '4 to 5 wds', '2017-09-29 22:14:46', '1572891852', 'In Progress...'),
(102, 24, 42, 'xlarge', 13, '4160', 'COD', '4 to 5 wds', '2017-09-30 01:09:34', '2010920345', 'In Progress...'),
(103, 25, 42, 'xlarge', 2, '1219', 'COD', 'instant', '2017-09-30 09:12:19', '1371056834', 'In Progress...'),
(104, 20, 24, 'xlarge', 12, '9699', 'COD', 'instant', '2017-09-30 11:41:18', '191111850', 'In Progress...'),
(105, 12, 44, 'medium', 1, '234', 'COD', '4 to 5 wds', '2017-09-30 18:03:56', '1320361972', 'In Progress...'),
(106, 24, 44, 'xlarge', 2, '739', 'COD', 'instant', '2017-09-30 18:14:52', '2015542990', 'In Progress...'),
(107, 24, 42, 'xlarge', 5, '1699', 'COD', 'instant', '2017-09-30 18:21:46', '1247559005', 'In Progress...'),
(108, 25, 44, 'xlarge', 5, '2800', 'COD', '4 to 5 wds', '2017-09-30 19:05:45', '1635103909', 'In Progress...'),
(109, 17, 42, 'medium', 1, '400', 'COD', '4 to 5 wds', '2017-09-30 19:30:59', '1113683314', 'In Progress...'),
(110, 25, 42, 'xlarge', 2, '1120', 'COD', '4 to 5 wds', '2017-09-30 19:30:59', '1700868627', 'In Progress...'),
(111, 18, 42, 'xlarge', 2, '597', 'COD', 'instant', '2017-09-30 19:42:44', '2120673392', 'In Progress...'),
(112, 18, 42, 'medium', 1, '249', 'COD', '4 to 5 wds', '2017-09-30 20:03:35', '1431736519', 'In Progress...'),
(113, 24, 45, 'xlarge', 3, '960', 'COD', '4 to 5 wds', '2017-10-01 09:05:13', '1409430130', 'In Progress...'),
(114, 24, 42, 'xlarge', 4, '1280', 'COD', '4 to 5 wds', '2017-10-01 09:42:36', '189825432', 'In Progress...'),
(115, 25, 42, 'xlarge', 2, '1120', 'COD', '4 to 5 wds', '2017-10-01 09:42:36', '1195806234', 'In Progress...'),
(116, 20, 42, 'xlarge', 1, '899', 'COD', 'instant', '2017-10-01 10:12:01', '1086599495', 'In Progress...'),
(117, 24, 42, 'large', 2, '739', 'COD', 'instant', '2017-10-01 10:12:01', '904148270', 'In Progress...');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(5, 0, 0, 'awsome', 1600, '<p>bfegftk</p>', 'IMG_0554.JPG', 'beard'),
(9, 0, 0, 'Stylish The', 1000, '<p>Dashing girls t-shirts drop me boys</p>', 'IMG_0552.JPG', 'Stylish,jaan'),
(12, 0, 0, 'esehi', 234, '<p>skjvhaj</p>', 'IMG_0553.JPG', 'akyhak'),
(13, 2, 1, 'Ma MAA Hoti h', 280, '<h2 style=\"text-align: center;\">&nbsp;This is all about art that makes you blast</h2>\r\n<p style=\"text-align: center;\"><em>make you all black pro</em></p>', 'IMG_0550.JPG', 'all,about'),
(15, 0, 0, 'sachin', 5000, '<p>sakhabkjdbhka</p>', 'IMG_0559.JPG', 'hello'),
(17, 0, 0, 'GYm kre h rare h hum dm kre ', 400, '<h1 style=\"text-align: center;\">Gym kre h !</h1>\r\n<p style=\"text-align: center;\"><em>goria churana mera gyia&nbsp;</em></p>\r\n<p style=\"text-align: center;\"><em>goria churana mera gyia&nbsp;</em></p>\r\n<p style=\"text-align: center;\"><em>goria churana mera gyia&nbsp;</em></p>', 'im1.jpg', 'goria,churana'),
(18, 7, 3, 'Hair Fall Control Shampoo 200ml', 249, '', 'logo.png', 'Hair,shampoo'),
(20, 3, 3, 'Skin Lightning', 800, '<h2>Skin Lightning Face Wash</h2>\r\n<p>face wash that makes your skinn lightning.that makes your skinn lightning.that makes your skinn lightning.that makes your skinn lightning.that makes your skinn lightning.that makes your skinn lightning.that makes your skinn lightning.</p>', 'wellness_product_1.jpg', 'skinn,lightning,ski,wash,face'),
(21, 2, 2, 'healing', 900, '<p>nawso</p>', 'IMG-20170903-WA0052.jpg', 'kanj'),
(24, 5, 1, 'black', 320, '<p>schi nishsj</p>', 'blue.jpg', 'saci'),
(25, 3, 1, 'grey', 560, '<p>sachin</p>', 'grey.jpg', 'saik');

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `unicode` varchar(20) NOT NULL,
  `activatereset` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resetpass`
--

INSERT INTO `resetpass` (`id`, `mail`, `unicode`, `activatereset`) VALUES
(19, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(20, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(21, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(22, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(23, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(24, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(25, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(26, 'mishra@gmail.com', '5ec43706c180313fb15d', '1'),
(34, 'sachinmishra199747@gmail.com', '518d5f8e122d86afc44e', '0'),
(35, 'sachinmishra199747@gmail.com', '775927217', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(111) NOT NULL,
  `review` text NOT NULL,
  `c_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `c_id`) VALUES
(1, '', 24),
(2, '', 24),
(3, '', 24),
(4, '', 24),
(5, '', 24),
(6, '', 24),
(7, 'sacigiuhoaona', 24),
(8, 'sachin', 24),
(9, 'askyfaoilbj\r\n', 24),
(10, '', 24),
(11, '', 24),
(12, '', 24),
(13, '', 24),
(14, '', 24),
(15, '', 24),
(16, 'jhdbka', 24),
(17, '', 24),
(18, 'sachin mishra', 24),
(19, '', 24),
(20, '', 38),
(21, '', 0),
(22, '', 24),
(23, '', 24),
(24, '', 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`main_image`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
