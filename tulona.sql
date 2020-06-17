-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2020 at 10:30 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tulona`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `descripation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Brand1', 'Text', 0, 1, 1, '2020-04-06 03:17:53', '2020-05-09 00:25:56'),
(2, 'Brand2', 'Text', 1, 1, NULL, '2020-04-06 03:18:08', '2020-04-06 03:18:08'),
(3, 'Brand3', 'Text', 1, 1, NULL, '2020-04-06 03:18:24', '2020-04-06 03:18:24'),
(4, 'Brand5', 'Text', 1, 1, 1, '2020-04-12 05:16:37', '2020-04-13 03:27:54'),
(5, 'Brand6', 'Text', 1, 1, 1, '2020-04-13 03:27:27', '2020-04-26 03:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descripation`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category1', 'Text', 0, 1, '2020-04-06 03:16:16', '2020-05-07 05:18:36'),
(2, 'Sub Category-1', 'Text', 1, 1, '2020-04-06 03:16:37', '2020-04-12 05:11:50'),
(3, 'Sub  Category-2', 'Text', 1, 0, '2020-04-06 03:17:02', '2020-04-06 03:17:02'),
(4, 'Category-3', 'Text', 0, 0, '2020-04-06 03:17:24', '2020-04-06 03:17:24'),
(6, 'Sub Sub Category2', NULL, 2, 0, '2020-04-12 04:45:01', '2020-04-12 04:45:01'),
(7, 'Sub Sub Category1', 'Text', 2, 0, '2020-04-13 03:26:12', '2020-04-13 03:26:12'),
(8, 'Sub Sub Sub Category-1', 'You can specify how many words should be generated right next to the word \"lorem\". For example, lorem5 will generate a 5-words dummy text.', 7, 1, '2020-04-16 05:54:55', '2020-04-16 05:54:55'),
(9, 'Category-4', 'text', 0, 1, '2020-04-26 01:59:50', '2020-04-26 01:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `descripation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Company-1', 'Text', 1, 1, 1, '2020-04-06 03:18:49', '2020-04-16 05:59:27'),
(2, 'Company-2', 'Text', 1, 1, NULL, '2020-04-06 03:19:03', '2020-04-06 03:19:03'),
(3, 'Company-3', 'Text', 1, 1, 1, '2020-04-06 03:19:29', '2020-04-13 03:28:50'),
(4, 'Company5', NULL, 1, 1, NULL, '2020-04-12 05:47:07', '2020-04-12 05:47:07'),
(6, 'Company-6', 'text', 0, NULL, NULL, '2020-04-26 02:48:52', '2020-04-26 02:48:52'),
(8, 'Company-7', 'text', 0, NULL, NULL, '2020-04-26 03:10:37', '2020-04-26 03:10:37'),
(9, 'Company-8', 'text', 0, NULL, NULL, '2020-04-26 03:11:49', '2020-04-26 03:11:49'),
(10, 'Company-9', 'text', 0, NULL, NULL, '2020-04-26 03:14:27', '2020-04-26 03:14:27'),
(11, 'Company11', 'text', 1, NULL, 1, '2020-04-26 03:15:42', '2020-04-26 03:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'AF', 'Afghanistan', 0, NULL, NULL, NULL, NULL),
(3, 'AL', 'Albania', 0, NULL, NULL, NULL, NULL),
(4, 'DZ', 'Algeria', 0, NULL, NULL, NULL, NULL),
(5, 'DS', 'American Samoa', 0, NULL, NULL, NULL, NULL),
(6, 'AD', 'Andorra', 0, NULL, NULL, NULL, NULL),
(7, 'AO', 'Angola', 0, NULL, NULL, NULL, NULL),
(8, 'AI', 'Anguilla', 0, NULL, NULL, NULL, NULL),
(9, 'AQ', 'Antarctica', 0, NULL, NULL, NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', 0, NULL, NULL, NULL, NULL),
(11, 'AR', 'Argentina', 0, NULL, NULL, NULL, NULL),
(12, 'AM', 'Armenia', 0, NULL, NULL, NULL, NULL),
(13, 'AW', 'Aruba', 0, NULL, NULL, NULL, NULL),
(14, 'AU', 'Australia', 0, NULL, NULL, NULL, NULL),
(15, 'AT', 'Austria', 0, NULL, NULL, NULL, NULL),
(16, 'AZ', 'Azerbaijan', 0, NULL, NULL, NULL, NULL),
(17, 'BS', 'Bahamas', 0, NULL, NULL, NULL, NULL),
(18, 'BH', 'Bahrain', 0, NULL, NULL, NULL, NULL),
(19, 'BD', 'Bangladesh', 0, NULL, NULL, NULL, NULL),
(20, 'BB', 'Barbados', 0, NULL, NULL, NULL, NULL),
(21, 'BY', 'Belarus', 0, NULL, NULL, NULL, NULL),
(22, 'BE', 'Belgium', 0, NULL, NULL, NULL, NULL),
(23, 'BZ', 'Belize', 0, NULL, NULL, NULL, NULL),
(24, 'BJ', 'Benin', 0, NULL, NULL, NULL, NULL),
(25, 'BM', 'Bermuda', 0, NULL, NULL, NULL, NULL),
(26, 'BT', 'Bhutan', 0, NULL, NULL, NULL, NULL),
(27, 'BO', 'Bolivia', 0, NULL, NULL, NULL, NULL),
(28, 'BA', 'Bosnia and Herzegovina', 0, NULL, NULL, NULL, NULL),
(29, 'BW', 'Botswana', 0, NULL, NULL, NULL, NULL),
(30, 'BV', 'Bouvet Island', 0, NULL, NULL, NULL, NULL),
(31, 'BR', 'Brazil', 0, NULL, NULL, NULL, NULL),
(32, 'IO', 'British Indian Ocean Territory', 0, NULL, NULL, NULL, NULL),
(33, 'BN', 'Brunei Darussalam', 0, NULL, NULL, NULL, NULL),
(34, 'BG', 'Bulgaria', 0, NULL, NULL, NULL, NULL),
(35, 'BF', 'Burkina Faso', 0, NULL, NULL, NULL, NULL),
(36, 'BI', 'Burundi', 0, NULL, NULL, NULL, NULL),
(37, 'KH', 'Cambodia', 0, NULL, NULL, NULL, NULL),
(38, 'CM', 'Cameroon', 0, NULL, NULL, NULL, NULL),
(39, 'CA', 'Canada', 0, NULL, NULL, NULL, NULL),
(40, 'CV', 'Cape Verde', 0, NULL, NULL, NULL, NULL),
(41, 'KY', 'Cayman Islands', 0, NULL, NULL, NULL, NULL),
(42, 'CF', 'Central African Republic', 0, NULL, NULL, NULL, NULL),
(43, 'TD', 'Chad', 0, NULL, NULL, NULL, NULL),
(44, 'CL', 'Chile', 0, NULL, NULL, NULL, NULL),
(45, 'CN', 'China', 0, NULL, NULL, NULL, NULL),
(46, 'CX', 'Christmas Island', 0, NULL, NULL, NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', 0, NULL, NULL, NULL, NULL),
(48, 'CO', 'Colombia', 0, NULL, NULL, NULL, NULL),
(49, 'KM', 'Comoros', 0, NULL, NULL, NULL, NULL),
(50, 'CD', 'Democratic Republic of the Congo', 0, NULL, NULL, NULL, NULL),
(51, 'CG', 'Republic of the Congo', 0, NULL, NULL, NULL, NULL),
(52, 'CK', 'Cook Islands', 0, NULL, NULL, NULL, NULL),
(53, 'CR', 'Costa Rica', 0, NULL, NULL, NULL, NULL),
(54, 'HR', 'Croatia (Hrvatska)', 0, NULL, NULL, NULL, NULL),
(55, 'CU', 'Cuba', 0, NULL, NULL, NULL, NULL),
(56, 'CY', 'Cyprus', 0, NULL, NULL, NULL, NULL),
(57, 'CZ', 'Czech Republic', 0, NULL, NULL, NULL, NULL),
(58, 'DK', 'Denmark', 0, NULL, NULL, NULL, NULL),
(59, 'DJ', 'Djibouti', 0, NULL, NULL, NULL, NULL),
(60, 'DM', 'Dominica', 0, NULL, NULL, NULL, NULL),
(61, 'DO', 'Dominican Republic', 0, NULL, NULL, NULL, NULL),
(62, 'TP', 'East Timor', 0, NULL, NULL, NULL, NULL),
(63, 'EC', 'Ecuador', 0, NULL, NULL, NULL, NULL),
(64, 'EG', 'Egypt', 0, NULL, NULL, NULL, NULL),
(65, 'SV', 'El Salvador', 0, NULL, NULL, NULL, NULL),
(66, 'GQ', 'Equatorial Guinea', 0, NULL, NULL, NULL, NULL),
(67, 'ER', 'Eritrea', 0, NULL, NULL, NULL, NULL),
(68, 'EE', 'Estonia', 0, NULL, NULL, NULL, NULL),
(69, 'ET', 'Ethiopia', 0, NULL, NULL, NULL, NULL),
(70, 'FK', 'Falkland Islands (Malvinas)', 0, NULL, NULL, NULL, NULL),
(71, 'FO', 'Faroe Islands', 0, NULL, NULL, NULL, NULL),
(72, 'FJ', 'Fiji', 0, NULL, NULL, NULL, NULL),
(73, 'FI', 'Finland', 0, NULL, NULL, NULL, NULL),
(74, 'FR', 'France', 0, NULL, NULL, NULL, NULL),
(75, 'FX', 'France, Metropolitan', 0, NULL, NULL, NULL, NULL),
(76, 'GF', 'French Guiana', 0, NULL, NULL, NULL, NULL),
(77, 'PF', 'French Polynesia', 0, NULL, NULL, NULL, NULL),
(78, 'TF', 'French Southern Territories', 0, NULL, NULL, NULL, NULL),
(79, 'GA', 'Gabon', 0, NULL, NULL, NULL, NULL),
(80, 'GM', 'Gambia', 0, NULL, NULL, NULL, NULL),
(81, 'GE', 'Georgia', 0, NULL, NULL, NULL, NULL),
(82, 'DE', 'Germany', 0, NULL, NULL, NULL, NULL),
(83, 'GH', 'Ghana', 0, NULL, NULL, NULL, NULL),
(84, 'GI', 'Gibraltar', 0, NULL, NULL, NULL, NULL),
(85, 'GK', 'Guernsey', 0, NULL, NULL, NULL, NULL),
(86, 'GR', 'Greece', 0, NULL, NULL, NULL, NULL),
(87, 'GL', 'Greenland', 0, NULL, NULL, NULL, NULL),
(88, 'GD', 'Grenada', 0, NULL, NULL, NULL, NULL),
(89, 'GP', 'Guadeloupe', 0, NULL, NULL, NULL, NULL),
(90, 'GU', 'Guam', 0, NULL, NULL, NULL, NULL),
(91, 'GT', 'Guatemala', 0, NULL, NULL, NULL, NULL),
(92, 'GN', 'Guinea', 0, NULL, NULL, NULL, NULL),
(93, 'GW', 'Guinea-Bissau', 0, NULL, NULL, NULL, NULL),
(94, 'GY', 'Guyana', 0, NULL, NULL, NULL, NULL),
(95, 'HT', 'Haiti', 0, NULL, NULL, NULL, NULL),
(96, 'HM', 'Heard and Mc Donald Islands', 0, NULL, NULL, NULL, NULL),
(97, 'HN', 'Honduras', 0, NULL, NULL, NULL, NULL),
(98, 'HK', 'Hong Kong', 0, NULL, NULL, NULL, NULL),
(99, 'HU', 'Hungary', 0, NULL, NULL, NULL, NULL),
(100, 'IS', 'Iceland', 0, NULL, NULL, NULL, NULL),
(101, 'IN', 'India', 0, NULL, NULL, NULL, NULL),
(102, 'IM', 'Isle of Man', 0, NULL, NULL, NULL, NULL),
(103, 'ID', 'Indonesia', 0, NULL, NULL, NULL, NULL),
(104, 'IR', 'Iran (Islamic Republic of)', 0, NULL, NULL, NULL, NULL),
(105, 'IQ', 'Iraq', 0, NULL, NULL, NULL, NULL),
(106, 'IE', 'Ireland', 0, NULL, NULL, NULL, NULL),
(107, 'IL', 'Israel', 0, NULL, NULL, NULL, NULL),
(108, 'IT', 'Italy', 0, NULL, NULL, NULL, NULL),
(109, 'CI', 'Ivory Coast', 0, NULL, NULL, NULL, NULL),
(110, 'JE', 'Jersey', 0, NULL, NULL, NULL, NULL),
(111, 'JM', 'Jamaica', 0, NULL, NULL, NULL, NULL),
(112, 'JP', 'Japan', 0, NULL, NULL, NULL, NULL),
(113, 'JO', 'Jordan', 0, NULL, NULL, NULL, NULL),
(114, 'KZ', 'Kazakhstan', 0, NULL, NULL, NULL, NULL),
(115, 'KE', 'Kenya', 0, NULL, NULL, NULL, NULL),
(116, 'KI', 'Kiribati', 0, NULL, NULL, NULL, NULL),
(117, 'KP', 'Korea, Democratic People\'s Republic of', 0, NULL, NULL, NULL, NULL),
(118, 'KR', 'Korea, Republic of', 0, NULL, NULL, NULL, NULL),
(119, 'XK', 'Kosovo', 0, NULL, NULL, NULL, NULL),
(120, 'KW', 'Kuwait', 0, NULL, NULL, NULL, NULL),
(121, 'KG', 'Kyrgyzstan', 0, NULL, NULL, NULL, NULL),
(122, 'LA', 'Lao People\'s Democratic Republic', 0, NULL, NULL, NULL, NULL),
(123, 'LV', 'Latvia', 0, NULL, NULL, NULL, NULL),
(124, 'LB', 'Lebanon', 0, NULL, NULL, NULL, NULL),
(125, 'LS', 'Lesotho', 0, NULL, NULL, NULL, NULL),
(126, 'LR', 'Liberia', 0, NULL, NULL, NULL, NULL),
(127, 'LY', 'Libyan Arab Jamahiriya', 0, NULL, NULL, NULL, NULL),
(128, 'LI', 'Liechtenstein', 0, NULL, NULL, NULL, NULL),
(129, 'LT', 'Lithuania', 0, NULL, NULL, NULL, NULL),
(130, 'LU', 'Luxembourg', 0, NULL, NULL, NULL, NULL),
(131, 'MO', 'Macau', 0, NULL, NULL, NULL, NULL),
(132, 'MK', 'North Macedonia', 0, NULL, NULL, NULL, NULL),
(133, 'MG', 'Madagascar', 0, NULL, NULL, NULL, NULL),
(134, 'MW', 'Malawi', 0, NULL, NULL, NULL, NULL),
(135, 'MY', 'Malaysia', 0, NULL, NULL, NULL, NULL),
(136, 'MV', 'Maldives', 0, NULL, NULL, NULL, NULL),
(137, 'ML', 'Mali', 0, NULL, NULL, NULL, NULL),
(138, 'MT', 'Malta', 0, NULL, NULL, NULL, NULL),
(139, 'MH', 'Marshall Islands', 0, NULL, NULL, NULL, NULL),
(140, 'MQ', 'Martinique', 0, NULL, NULL, NULL, NULL),
(141, 'MR', 'Mauritania', 0, NULL, NULL, NULL, NULL),
(142, 'MU', 'Mauritius', 0, NULL, NULL, NULL, NULL),
(143, 'TY', 'Mayotte', 0, NULL, NULL, NULL, NULL),
(144, 'MX', 'Mexico', 0, NULL, NULL, NULL, NULL),
(145, 'FM', 'Micronesia, Federated States of', 0, NULL, NULL, NULL, NULL),
(146, 'MD', 'Moldova, Republic of', 0, NULL, NULL, NULL, NULL),
(147, 'MC', 'Monaco', 0, NULL, NULL, NULL, NULL),
(148, 'MN', 'Mongolia', 0, NULL, NULL, NULL, NULL),
(149, 'ME', 'Montenegro', 0, NULL, NULL, NULL, NULL),
(150, 'MS', 'Montserrat', 0, NULL, NULL, NULL, NULL),
(151, 'MA', 'Morocco', 0, NULL, NULL, NULL, NULL),
(152, 'MZ', 'Mozambique', 0, NULL, NULL, NULL, NULL),
(153, 'MM', 'Myanmar', 0, NULL, NULL, NULL, NULL),
(154, 'NA', 'Namibia', 0, NULL, NULL, NULL, NULL),
(155, 'NR', 'Nauru', 0, NULL, NULL, NULL, NULL),
(156, 'NP', 'Nepal', 0, NULL, NULL, NULL, NULL),
(157, 'NL', 'Netherlands', 0, NULL, NULL, NULL, NULL),
(158, 'AN', 'Netherlands Antilles', 0, NULL, NULL, NULL, NULL),
(159, 'NC', 'New Caledonia', 0, NULL, NULL, NULL, NULL),
(160, 'NZ', 'New Zealand', 0, NULL, NULL, NULL, NULL),
(161, 'NI', 'Nicaragua', 0, NULL, NULL, NULL, NULL),
(162, 'NE', 'Niger', 0, NULL, NULL, NULL, NULL),
(163, 'NG', 'Nigeria', 0, NULL, NULL, NULL, NULL),
(164, 'NU', 'Niue', 0, NULL, NULL, NULL, NULL),
(165, 'NF', 'Norfolk Island', 0, NULL, NULL, NULL, NULL),
(166, 'MP', 'Northern Mariana Islands', 0, NULL, NULL, NULL, NULL),
(167, 'NO', 'Norway', 0, NULL, NULL, NULL, NULL),
(168, 'OM', 'Oman', 0, NULL, NULL, NULL, NULL),
(169, 'PK', 'Pakistan', 0, NULL, NULL, NULL, NULL),
(170, 'PW', 'Palau', 0, NULL, NULL, NULL, NULL),
(171, 'PS', 'Palestine', 0, NULL, NULL, NULL, NULL),
(172, 'PA', 'Panama', 0, NULL, NULL, NULL, NULL),
(173, 'PG', 'Papua New Guinea', 0, NULL, NULL, NULL, NULL),
(174, 'PY', 'Paraguay', 0, NULL, NULL, NULL, NULL),
(175, 'PE', 'Peru', 0, NULL, NULL, NULL, NULL),
(176, 'PH', 'Philippines', 0, NULL, NULL, NULL, NULL),
(177, 'PN', 'Pitcairn', 0, NULL, NULL, NULL, NULL),
(178, 'PL', 'Poland', 0, NULL, NULL, NULL, NULL),
(179, 'PT', 'Portugal', 0, NULL, NULL, NULL, NULL),
(180, 'PR', 'Puerto Rico', 0, NULL, NULL, NULL, NULL),
(181, 'QA', 'Qatar', 0, NULL, NULL, NULL, NULL),
(182, 'RE', 'Reunion', 0, NULL, NULL, NULL, NULL),
(183, 'RO', 'Romania', 0, NULL, NULL, NULL, NULL),
(184, 'RU', 'Russian Federation', 0, NULL, NULL, NULL, NULL),
(185, 'RW', 'Rwanda', 0, NULL, NULL, NULL, NULL),
(186, 'KN', 'Saint Kitts and Nevis', 0, NULL, NULL, NULL, NULL),
(187, 'LC', 'Saint Lucia', 0, NULL, NULL, NULL, NULL),
(188, 'VC', 'Saint Vincent and the Grenadines', 0, NULL, NULL, NULL, NULL),
(189, 'WS', 'Samoa', 0, NULL, NULL, NULL, NULL),
(190, 'SM', 'San Marino', 0, NULL, NULL, NULL, NULL),
(191, 'ST', 'Sao Tome and Principe', 0, NULL, NULL, NULL, NULL),
(192, 'SA', 'Saudi Arabia', 0, NULL, NULL, NULL, NULL),
(193, 'SN', 'Senegal', 0, NULL, NULL, NULL, NULL),
(194, 'RS', 'Serbia', 0, NULL, NULL, NULL, NULL),
(195, 'SC', 'Seychelles', 0, NULL, NULL, NULL, NULL),
(196, 'SL', 'Sierra Leone', 0, NULL, NULL, NULL, NULL),
(197, 'SG', 'Singapore', 0, NULL, NULL, NULL, NULL),
(198, 'SK', 'Slovakia', 0, NULL, NULL, NULL, NULL),
(199, 'SI', 'Slovenia', 0, NULL, NULL, NULL, NULL),
(200, 'SB', 'Solomon Islands', 0, NULL, NULL, NULL, NULL),
(201, 'SO', 'Somalia', 0, NULL, NULL, NULL, NULL),
(202, 'ZA', 'South Africa', 0, NULL, NULL, NULL, NULL),
(203, 'GS', 'South Georgia South Sandwich Islands', 0, NULL, NULL, NULL, NULL),
(204, 'SS', 'South Sudan', 0, NULL, NULL, NULL, NULL),
(205, 'ES', 'Spain', 0, NULL, NULL, NULL, NULL),
(206, 'LK', 'Sri Lanka', 0, NULL, NULL, NULL, NULL),
(207, 'SH', 'St. Helena', 0, NULL, NULL, NULL, NULL),
(208, 'PM', 'St. Pierre and Miquelon', 0, NULL, NULL, NULL, NULL),
(209, 'SD', 'Sudan', 0, NULL, NULL, NULL, NULL),
(210, 'SR', 'Suriname', 0, NULL, NULL, NULL, NULL),
(211, 'SJ', 'Svalbard and Jan Mayen Islands', 0, NULL, NULL, NULL, NULL),
(212, 'SZ', 'Swaziland', 0, NULL, NULL, NULL, NULL),
(213, 'SE', 'Sweden', 0, NULL, NULL, NULL, NULL),
(214, 'CH', 'Switzerland', 0, NULL, NULL, NULL, NULL),
(215, 'SY', 'Syrian Arab Republic', 0, NULL, NULL, NULL, NULL),
(216, 'TW', 'Taiwan', 0, NULL, NULL, NULL, NULL),
(217, 'TJ', 'Tajikistan', 0, NULL, NULL, NULL, NULL),
(218, 'TZ', 'Tanzania, United Republic of', 0, NULL, NULL, NULL, NULL),
(219, 'TH', 'Thailand', 0, NULL, NULL, NULL, NULL),
(220, 'TG', 'Togo', 0, NULL, NULL, NULL, NULL),
(221, 'TK', 'Tokelau', 0, NULL, NULL, NULL, NULL),
(222, 'TO', 'Tonga', 0, NULL, NULL, NULL, NULL),
(223, 'TT', 'Trinidad and Tobago', 0, NULL, NULL, NULL, NULL),
(224, 'TN', 'Tunisia', 0, NULL, NULL, NULL, NULL),
(225, 'TR', 'Turkey', 0, NULL, NULL, NULL, NULL),
(226, 'TM', 'Turkmenistan', 0, NULL, NULL, NULL, NULL),
(227, 'TC', 'Turks and Caicos Islands', 0, NULL, NULL, NULL, NULL),
(228, 'TV', 'Tuvalu', 0, NULL, NULL, NULL, NULL),
(229, 'UG', 'Uganda', 0, NULL, NULL, NULL, NULL),
(230, 'UA', 'Ukraine', 0, NULL, NULL, NULL, NULL),
(231, 'AE', 'United Arab Emirates', 0, NULL, NULL, NULL, NULL),
(232, 'GB', 'United Kingdom', 0, NULL, NULL, NULL, NULL),
(233, 'US', 'United States', 0, NULL, NULL, NULL, NULL),
(234, 'UM', 'United States minor outlying islands', 0, NULL, NULL, NULL, NULL),
(235, 'UY', 'Uruguay', 0, NULL, NULL, NULL, NULL),
(236, 'UZ', 'Uzbekistan', 0, NULL, NULL, NULL, NULL),
(237, 'VU', 'Vanuatu', 0, NULL, NULL, NULL, NULL),
(238, 'VA', 'Vatican City State', 0, NULL, NULL, NULL, NULL),
(239, 'VE', 'Venezuela', 0, NULL, NULL, NULL, NULL),
(240, 'VN', 'Vietnam', 0, NULL, NULL, NULL, NULL),
(241, 'VG', 'Virgin Islands (British)', 0, NULL, NULL, NULL, NULL),
(242, 'VI', 'Virgin Islands (U.S.)', 0, NULL, NULL, NULL, NULL),
(243, 'WF', 'Wallis and Futuna Islands', 0, NULL, NULL, NULL, NULL),
(244, 'EH', 'Western Sahara', 0, NULL, NULL, NULL, NULL),
(245, 'YE', 'Yemen', 0, NULL, NULL, NULL, NULL),
(246, 'ZM', 'Zambia', 0, NULL, NULL, NULL, NULL),
(247, 'ZW', 'Zimbabwe', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metatags`
--

CREATE TABLE `metatags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metatags`
--

INSERT INTO `metatags` (`id`, `name`, `descripation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'metatag1', NULL, 0, NULL, NULL, NULL, NULL),
(9, 'metatag2', NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_23_043328_create_categories_table', 1),
(5, '2020_03_24_082857_create_products_table', 1),
(6, '2020_03_24_085303_create_brands_table', 1),
(7, '2020_04_02_092706_create_product_types_table', 1),
(8, '2020_04_02_101420_create_metatags_table', 1),
(9, '2020_04_02_101455_create_companies_table', 1),
(10, '2020_04_02_101548_create_countries_table', 1),
(11, '2020_04_21_102957_create_units_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` int(11) DEFAULT NULL,
  `categorys_id` int(11) NOT NULL,
  `product_types_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `companies_id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_name` json DEFAULT NULL,
  `attribute_value` json DEFAULT NULL,
  `attribute_unit` json DEFAULT NULL,
  `short_descripation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_descripation` text COLLATE utf8mb4_unicode_ci,
  `countrys_id` int(11) NOT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `featured`, `categorys_id`, `product_types_id`, `brands_id`, `companies_id`, `model`, `mrp`, `image`, `attribute_name`, `attribute_value`, `attribute_unit`, `short_descripation`, `long_descripation`, `countrys_id`, `meta_tag`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(36, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '403245596smartphone-407108_1920.jpg', '[\"ram\", \"rom\", \"battery\"]', '[\"12\", \"10\", \"89809\"]', '[\"Gb\", \"Gb\", \"amp\"]', '<p>text</p>', '<p>long text</p>', 19, 'metatag1', 1, 1, NULL, '2020-05-07 04:33:29', '2020-05-07 04:33:29'),
(37, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '2017043193smartphone-407108_1920.jpg', '[\"ram\", \"rom\", \"display\"]', '[\"12\", \"98\", \"10\"]', '[\"Gb\", \"Gb\", \"inche\"]', '<p>text</p>', '<p>long Text</p>', 19, 'metatag1', 1, 1, NULL, '2020-05-07 04:37:35', '2020-05-07 04:37:35'),
(38, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '1627113028smartphone-407108_1920.jpg', '[\"water\", \"mailk\", \"battery\"]', '[\"100\", \"10\", \"4000\"]', '[\"litter\", \"litter\", \"amp\"]', '<p><span style=\"font-family: Arial; font-size: 12px;\">y how many words should be generated right next to the w</span><br></p>', '<p><span style=\"font-family: Arial; font-size: 12px;\">y how many words should be generated right next to the w</span><span style=\"font-family: Arial; font-size: 12px;\">y how many words should be generated right next to the w</span><br></p>', 19, 'metatag1', 1, 1, NULL, '2020-05-07 04:39:18', '2020-05-07 04:39:18'),
(39, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '524932236smartphone-407108_1920.jpg', '[\"hdd\", \"mailk\", \"battery\"]', '[\"100\", \"100\", \"40\"]', '[\"tb\", \"litter\", \"Amp\"]', '<p>text</p>', '<p>long Text</p>', 22, 'metatag1', 1, 1, NULL, '2020-05-07 04:40:41', '2020-05-07 04:40:41'),
(40, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '1771368620smartphone-407108_1920.jpg', '[\"joss\", \"water\"]', '[\"100\", \"4000\"]', '[\"litter\", \"litter\"]', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', 22, 'metatag1', 1, 1, NULL, '2020-05-07 05:15:15', '2020-05-07 05:15:15'),
(41, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '1804849138smartphone-407108_1920.jpg', '[\"joss\", \"water\"]', '[\"100\", \"4000\"]', '[\"litter\", \"litter\"]', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', 22, 'metatag1', 1, 1, NULL, '2020-05-07 05:15:33', '2020-05-07 05:15:33'),
(42, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '94567586smartphone-407108_1920.jpg', '[\"battery\"]', '[\"100\"]', '[\"Amp\"]', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', 22, 'metatag2', 1, 1, NULL, '2020-05-07 05:16:46', '2020-05-07 05:16:46'),
(43, 'Product-8', 1, 9, 5, 5, 4, 'model3', 90000, '573164068smartphone-407108_1920.jpg', '[\"battery\"]', '[\"100\"]', '[\"Amp\"]', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', '<p><span style=\"font-family: Arial; font-size: 12px;\">You can specify how many words should be generated right next</span><br></p>', 22, 'metatag2', 1, 1, NULL, '2020-05-07 05:16:59', '2020-05-07 05:16:59'),
(44, 'Product Mobile', 1, 4, 3, 3, 8, 'model-2', 52345, '1290623931smartphone-407108_1920.jpg', NULL, '[null]', NULL, '<p>text</p>', '<p>long text</p>', 19, 'metatag2', 1, 1, NULL, '2020-05-08 22:52:21', '2020-05-08 22:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `products_attribute`
--

CREATE TABLE `products_attribute` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attribute`
--

INSERT INTO `products_attribute` (`id`, `name`, `created_by`) VALUES
(18, 'water', NULL),
(19, 'mailk', NULL),
(20, 'ram', NULL),
(21, 'rom', NULL),
(22, 'battery', NULL),
(23, 'hdd', NULL),
(24, 'cash memory', NULL),
(25, 'camara', NULL),
(26, 'display', NULL),
(27, 'joss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `descripation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Service', 'Text', 0, 1, 1, '2020-04-06 03:19:55', '2020-04-16 06:03:01'),
(2, 'Service 2', 'Text', 1, 1, NULL, '2020-04-06 03:20:12', '2020-04-06 03:20:12'),
(3, 'Product Type -1', 'text', 1, 1, NULL, '2020-04-06 03:26:12', '2020-04-06 03:26:12'),
(4, 'Service 5 Product', NULL, 1, 1, NULL, '2020-04-12 03:23:18', '2020-04-12 03:23:18'),
(5, 'payment-menu', NULL, 1, 1, NULL, '2020-04-12 05:50:13', '2020-04-12 05:50:13'),
(6, 'Text Product', 'Text', 0, 1, NULL, '2020-04-16 06:12:05', '2020-04-16 06:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `descripation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Gb', NULL, 1, 1, NULL, '2020-04-21 05:25:28', '2020-04-21 05:25:28'),
(3, 'litter', 'text', 0, 1, NULL, '2020-04-26 03:35:41', '2020-04-26 03:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@g8ict.com', NULL, '$2y$10$hfMjmOaXvp/MHiheZRCJsu1a6K/KBqkzjPngZwj4FdLQeA9.qzpxa', NULL, '2020-04-06 03:15:26', '2020-04-06 03:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metatags`
--
ALTER TABLE `metatags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metatags_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attribute`
--
ALTER TABLE `products_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metatags`
--
ALTER TABLE `metatags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products_attribute`
--
ALTER TABLE `products_attribute`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
