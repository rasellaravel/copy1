-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2022 at 01:20 PM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LiveProjekts_cop`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=diactive;1=active',
  `role` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Cliok IT', 'Info@copypro.lt', '$2y$10$5yS7KPmI2krNKNJ6Fk2YdekRAbOE7fcV1oHAeey3cEcDNtW8Vtj96', NULL, 1, 1, '2021-03-15 10:24:50', '2022-03-24 06:05:16'),
(2, 'indijos', 'indijos@gmail.com', '$2y$10$L1BQT3uZmGSKpXb2QJZvVu8Bs.ci2wZdbRylwaUm0g6y/B9pDHA6K', NULL, 1, 2, '2021-04-10 07:37:51', '2021-12-01 05:04:38'),
(28, 'Copy pro', 'aurimas@copypro.lt', '$2y$10$v3yHjexR24Jkg.s1sNc.k.RHcr4h8pZ9bTN2avqNG2Vyq2Y6fkE4G', NULL, 1, 2, '2022-03-23 09:12:02', '2022-03-23 09:12:02'),
(29, 'Mindaugas', 'mrkt@copypro.lt', '$2y$10$Vdev4njrvc77rQOldS2ntek.Bs7Sjv4F09yfs5fax4ICfmOXv/F/C', NULL, 1, 2, '2022-03-25 07:35:37', '2022-03-25 07:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`id`, `user_id`, `api_key`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'a7d8bff0fec1959063cf1ae3032352c8d386be1325b4abbfc458021207f68e47', 0, '2021-06-02 03:32:06', '2021-07-14 22:16:57'),
(3, 4, '87394236d4e1004b8ed4cfb5c953d300f3093fb05c38154ac3b142c9c21ed969', 0, '2021-06-02 03:34:15', '2021-07-14 22:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `img`, `video`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdfsf', 'sdfsfsdf', '1648032846.jpg', NULL, '2022-03-23 09:54:06', '2022-03-23 09:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `yarn_color` int(11) DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasp` int(11) DEFAULT NULL,
  `surface_amber` int(11) DEFAULT NULL,
  `certificate` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_passwords`
--

CREATE TABLE `certificate_passwords` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company_name_o` varchar(255) DEFAULT NULL,
  `address_o` mediumtext DEFAULT NULL,
  `tel_o` varchar(200) DEFAULT NULL,
  `fax_o` varchar(200) DEFAULT NULL,
  `email_o` varchar(255) DEFAULT NULL,
  `company_code` varchar(150) DEFAULT NULL,
  `vat_code` varchar(150) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_code` varchar(150) DEFAULT NULL,
  `other_code` varchar(150) DEFAULT NULL,
  `director_name` varchar(255) DEFAULT NULL,
  `director_tel` varchar(150) DEFAULT NULL,
  `de_director_name` varchar(255) DEFAULT NULL,
  `de_director_tel` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(2, 'AL', 'Albania', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(3, 'DZ', 'Algeria', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(4, 'DS', 'American Samoa', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(5, 'AD', 'Andorra', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(6, 'AO', 'Angola', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(7, 'AI', 'Anguilla', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(8, 'AQ', 'Antarctica', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(9, 'AG', 'Antigua and Barbuda', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(10, 'AR', 'Argentina', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(11, 'AM', 'Armenia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(12, 'AW', 'Aruba', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(13, 'AU', 'Australia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(14, 'AT', 'Austria', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(15, 'AZ', 'Azerbaijan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(16, 'BS', 'Bahamas', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(17, 'BH', 'Bahrain', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(18, 'BD', 'Bangladesh', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(19, 'BB', 'Barbados', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(20, 'BY', 'Belarus', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(21, 'BE', 'Belgium', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(22, 'BZ', 'Belize', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(23, 'BJ', 'Benin', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(24, 'BM', 'Bermuda', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(25, 'BT', 'Bhutan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(26, 'BO', 'Bolivia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(27, 'BA', 'Bosnia and Herzegovina', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(28, 'BW', 'Botswana', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(29, 'BV', 'Bouvet Island', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(30, 'BR', 'Brazil', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(31, 'IO', 'British Indian Ocean Territory', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(32, 'BN', 'Brunei Darussalam', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(33, 'BG', 'Bulgaria', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(34, 'BF', 'Burkina Faso', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(35, 'BI', 'Burundi', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(36, 'KH', 'Cambodia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(37, 'CM', 'Cameroon', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(38, 'CA', 'Canada', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(39, 'CV', 'Cape Verde', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(40, 'KY', 'Cayman Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(41, 'CF', 'Central African Republic', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(42, 'TD', 'Chad', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(43, 'CL', 'Chile', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(44, 'CN', 'China', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(45, 'CX', 'Christmas Island', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(46, 'CC', 'Cocos (Keeling) Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(47, 'CO', 'Colombia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(48, 'KM', 'Comoros', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(49, 'CD', 'Democratic Republic of the Congo', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(50, 'CG', 'Republic of Congo', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(51, 'CK', 'Cook Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(52, 'CR', 'Costa Rica', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(53, 'HR', 'Croatia (Hrvatska)', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(54, 'CU', 'Cuba', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(55, 'CY', 'Cyprus', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(56, 'CZ', 'Czech Republic', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(57, 'DK', 'Denmark', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(58, 'DJ', 'Djibouti', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(59, 'DM', 'Dominica', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(60, 'DO', 'Dominican Republic', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(61, 'TP', 'East Timor', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(62, 'EC', 'Ecuador', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(63, 'EG', 'Egypt', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(64, 'SV', 'El Salvador', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(65, 'GQ', 'Equatorial Guinea', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(66, 'ER', 'Eritrea', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(67, 'EE', 'Estonia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(68, 'ET', 'Ethiopia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(70, 'FO', 'Faroe Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(71, 'FJ', 'Fiji', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(72, 'FI', 'Finland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(73, 'FR', 'France', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(74, 'FX', 'France, Metropolitan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(75, 'GF', 'French Guiana', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(76, 'PF', 'French Polynesia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(77, 'TF', 'French Southern Territories', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(78, 'GA', 'Gabon', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(79, 'GM', 'Gambia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(80, 'GE', 'Georgia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(81, 'DE', 'Germany', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(82, 'GH', 'Ghana', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(83, 'GI', 'Gibraltar', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(84, 'GK', 'Guernsey', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(85, 'GR', 'Greece', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(86, 'GL', 'Greenland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(87, 'GD', 'Grenada', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(88, 'GP', 'Guadeloupe', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(89, 'GU', 'Guam', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(90, 'GT', 'Guatemala', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(91, 'GN', 'Guinea', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(92, 'GW', 'Guinea-Bissau', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(93, 'GY', 'Guyana', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(94, 'HT', 'Haiti', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(95, 'HM', 'Heard and Mc Donald Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(96, 'HN', 'Honduras', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(97, 'HK', 'Hong Kong', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(98, 'HU', 'Hungary', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(99, 'IS', 'Iceland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(100, 'IN', 'India', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(101, 'IM', 'Isle of Man', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(102, 'ID', 'Indonesia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(103, 'IR', 'Iran (Islamic Republic of)', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(104, 'IQ', 'Iraq', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(105, 'IE', 'Ireland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(106, 'IL', 'Israel', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(107, 'IT', 'Italy', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(108, 'CI', 'Ivory Coast', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(109, 'JE', 'Jersey', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(110, 'JM', 'Jamaica', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(111, 'JP', 'Japan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(112, 'JO', 'Jordan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(113, 'KZ', 'Kazakhstan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(114, 'KE', 'Kenya', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(115, 'KI', 'Kiribati', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(117, 'KR', 'Korea, Republic of', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(118, 'XK', 'Kosovo', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(119, 'KW', 'Kuwait', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(120, 'KG', 'Kyrgyzstan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(122, 'LV', 'Latvia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(123, 'LB', 'Lebanon', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(124, 'LS', 'Lesotho', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(125, 'LR', 'Liberia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(127, 'LI', 'Liechtenstein', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(128, 'LT', 'Lithuania', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(129, 'LU', 'Luxembourg', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(130, 'MO', 'Macau', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(131, 'MK', 'North Macedonia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(132, 'MG', 'Madagascar', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(133, 'MW', 'Malawi', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(134, 'MY', 'Malaysia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(135, 'MV', 'Maldives', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(136, 'ML', 'Mali', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(137, 'MT', 'Malta', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(138, 'MH', 'Marshall Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(139, 'MQ', 'Martinique', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(140, 'MR', 'Mauritania', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(141, 'MU', 'Mauritius', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(142, 'TY', 'Mayotte', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(143, 'MX', 'Mexico', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(144, 'FM', 'Micronesia, Federated States of', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(145, 'MD', 'Moldova, Republic of', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(146, 'MC', 'Monaco', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(147, 'MN', 'Mongolia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(148, 'ME', 'Montenegro', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(149, 'MS', 'Montserrat', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(150, 'MA', 'Morocco', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(151, 'MZ', 'Mozambique', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(152, 'MM', 'Myanmar', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(153, 'NA', 'Namibia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(154, 'NR', 'Nauru', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(155, 'NP', 'Nepal', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(156, 'NL', 'Netherlands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(157, 'AN', 'Netherlands Antilles', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(158, 'NC', 'New Caledonia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(159, 'NZ', 'New Zealand', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(160, 'NI', 'Nicaragua', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(161, 'NE', 'Niger', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(162, 'NG', 'Nigeria', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(163, 'NU', 'Niue', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(164, 'NF', 'Norfolk Island', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(165, 'MP', 'Northern Mariana Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(166, 'NO', 'Norway', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(167, 'OM', 'Oman', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(168, 'PK', 'Pakistan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(169, 'PW', 'Palau', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(170, 'PS', 'Palestine', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(171, 'PA', 'Panama', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(172, 'PG', 'Papua New Guinea', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(173, 'PY', 'Paraguay', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(174, 'PE', 'Peru', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(175, 'PH', 'Philippines', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(176, 'PN', 'Pitcairn', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(177, 'PL', 'Poland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(178, 'PT', 'Portugal', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(179, 'PR', 'Puerto Rico', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(180, 'QA', 'Qatar', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(181, 'RE', 'Reunion', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(182, 'RO', 'Romania', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(183, 'RU', 'Russian Federation', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(184, 'RW', 'Rwanda', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(185, 'KN', 'Saint Kitts and Nevis', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(186, 'LC', 'Saint Lucia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(188, 'WS', 'Samoa', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(189, 'SM', 'San Marino', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(190, 'ST', 'Sao Tome and Principe', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(191, 'SA', 'Saudi Arabia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(192, 'SN', 'Senegal', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(193, 'RS', 'Serbia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(194, 'SC', 'Seychelles', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(195, 'SL', 'Sierra Leone', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(196, 'SG', 'Singapore', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(197, 'SK', 'Slovakia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(198, 'SI', 'Slovenia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(199, 'SB', 'Solomon Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(200, 'SO', 'Somalia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(201, 'ZA', 'South Africa', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(203, 'SS', 'South Sudan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(204, 'ES', 'Spain', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(205, 'LK', 'Sri Lanka', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(206, 'SH', 'St. Helena', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(207, 'PM', 'St. Pierre and Miquelon', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(208, 'SD', 'Sudan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(209, 'SR', 'Suriname', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(211, 'SZ', 'Swaziland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(212, 'SE', 'Sweden', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(213, 'CH', 'Switzerland', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(214, 'SY', 'Syrian Arab Republic', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(215, 'TW', 'Taiwan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(216, 'TJ', 'Tajikistan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(217, 'TZ', 'Tanzania, United Republic of', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(218, 'TH', 'Thailand', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(219, 'TG', 'Togo', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(220, 'TK', 'Tokelau', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(221, 'TO', 'Tonga', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(222, 'TT', 'Trinidad and Tobago', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(223, 'TN', 'Tunisia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(224, 'TR', 'Turkey', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(225, 'TM', 'Turkmenistan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(226, 'TC', 'Turks and Caicos Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(227, 'TV', 'Tuvalu', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(228, 'UG', 'Uganda', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(229, 'UA', 'Ukraine', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(230, 'AE', 'United Arab Emirates', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(231, 'GB', 'United Kingdom', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(232, 'US', 'United States', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(233, 'UM', 'United States minor outlying islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(234, 'UY', 'Uruguay', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(235, 'UZ', 'Uzbekistan', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(236, 'VU', 'Vanuatu', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(237, 'VA', 'Vatican City State', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(238, 'VE', 'Venezuela', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(239, 'VN', 'Vietnam', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(240, 'VG', 'Virgin Islands (British)', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(241, 'VI', 'Virgin Islands (U.S.)', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(242, 'WF', 'Wallis and Futuna Islands', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(243, 'EH', 'Western Sahara', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(244, 'YE', 'Yemen', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(245, 'ZM', 'Zambia', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58'),
(246, 'ZW', 'Zimbabwe', 1, '2020-12-08 10:39:59', '2021-07-14 22:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_clasps`
--

CREATE TABLE `custom_clasps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_lt` varchar(100) NOT NULL,
  `name_rus` varchar(100) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_colors`
--

CREATE TABLE `custom_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_en` varchar(100) NOT NULL,
  `color_lt` varchar(100) NOT NULL,
  `color_rus` varchar(100) NOT NULL,
  `color_pt` varchar(255) NOT NULL,
  `color_es` varchar(255) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_colors`
--

INSERT INTO `custom_colors` (`id`, `color_en`, `color_lt`, `color_rus`, `color_pt`, `color_es`, `code`, `created_at`, `updated_at`) VALUES
(1, 'black', 'black', 'black', 'black', 'black', '#ffff', '2022-03-23 09:31:21', '2022-03-23 09:31:21'),
(2, 'balta', 'balta', 'balta', 'balta', 'balta', '#00000', '2022-03-25 07:42:13', '2022-03-25 07:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `custom_sizes`
--

CREATE TABLE `custom_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_lt` varchar(255) NOT NULL,
  `name_rus` varchar(255) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_sizes`
--

INSERT INTO `custom_sizes` (`id`, `name_en`, `name_lt`, `name_rus`, `name_pt`, `name_es`, `created_at`, `updated_at`) VALUES
(1, 'Specificatipo Fathar 1', 'Specificatipo Fathar 1', 'Specificatipo Fathar 1', 'Specificatipo Fathar 1', 'Specificatipo Fathar 1', '2022-03-21 13:12:32', '2022-03-21 13:12:32'),
(2, 'Specification father 2', 'Specification father 2', 'Specification father 2', 'Specification father 2', 'Specification father 2', '2022-03-21 13:12:54', '2022-03-21 13:12:54'),
(9, 'Surface Amber', 'Surface Amber', 'Surface Amber', 'Surface Amber', 'Surface Amber', '2022-03-23 08:49:58', '2022-03-23 08:49:58'),
(10, 'Clasp', 'Clasp', 'Clasp', 'Clasp', 'Clasp', '2022-03-23 08:50:46', '2022-03-23 08:50:46'),
(11, 'drobės išmatavimas', 'drobės išmatavimas', 'drobės išmatavimas', 'drobės išmatavimas', 'drobės išmatavimas', '2022-03-23 09:28:02', '2022-03-23 09:28:02'),
(13, 'drobes ilgis', 'drobes ilgis', 'drobes ilgis', 'drobes ilgis', 'drobes ilgis', '2022-03-23 09:40:25', '2022-03-23 09:40:25'),
(14, 'Spauda', 'Spauda', 'Spauda', 'Spauda', 'Spauda', '2022-03-25 07:41:21', '2022-03-25 07:41:21'),
(15, 'A4', 'A4', 'A4', 'A4', 'A4', '2022-03-25 09:28:16', '2022-03-25 09:28:16'),
(16, 'A3', 'A3', 'A3', 'A3', 'A3', '2022-03-25 09:28:37', '2022-03-25 09:28:37'),
(17, 'A5', 'A5', 'A5', 'A5', 'A5', '2022-03-25 09:29:00', '2022-03-25 09:29:00'),
(18, 'A6', 'A6', 'A6', 'A6', 'A6', '2022-03-25 09:29:10', '2022-03-25 09:29:10'),
(19, '210x110', '210x110', '210x110', '210x110', '210x110', '2022-03-25 09:29:27', '2022-03-25 09:29:27'),
(20, 'Nestandartiniai dydžiai', 'Nestandartiniai dydžiai', 'Nestandartiniai dydžiai', 'Nestandartiniai dydžiai', 'Nestandartiniai dydžiai', '2022-03-25 09:38:19', '2022-03-25 09:38:19'),
(21, 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', '2022-03-25 09:38:55', '2022-03-25 09:38:55'),
(22, 'Spalvota/nespalvota', 'Spalvota/nespalvota', 'Spalvota/nespalvota', 'Spalvota/nespalvota', 'Spalvota/nespalvota', '2022-03-25 09:49:14', '2022-03-25 09:49:14'),
(23, 'Pakavimas', 'Pakavimas', 'Pakavimas', 'Pakavimas', 'Pakavimas', '2022-03-25 09:52:21', '2022-03-25 09:52:21'),
(24, 'Vienpusis/dvipusis', 'Vienpusis/dvipusis', 'Vienpusis/dvipusis', 'Vienpusis/dvipusis', 'Vienpusis/dvipusis', '2022-03-25 10:15:06', '2022-03-25 10:15:06'),
(25, 'Drobės išmatavimai', 'Drobės išmatavimai', 'Drobės išmatavimai', 'Drobės išmatavimai', 'Drobės išmatavimai', '2022-03-28 08:58:40', '2022-03-28 08:58:40'),
(26, 'Drobės kraštai', 'Drobės kraštai', 'Drobės kraštai', 'Drobės kraštai', 'Drobės kraštai', '2022-03-28 09:00:03', '2022-03-28 09:00:03'),
(27, 'Medžiaga', 'Medžiaga', 'Medžiaga', 'Medžiaga', 'Medžiaga', '2022-03-28 09:00:21', '2022-03-28 09:00:21');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_blogs`
--

CREATE TABLE `home_blogs` (
  `id` int(11) NOT NULL,
  `title_lt` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_rus` varchar(255) DEFAULT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inner_menus`
--

CREATE TABLE `inner_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inner_menu_lt` varchar(255) DEFAULT NULL,
  `inner_menu_en` varchar(255) DEFAULT NULL,
  `inner_menu_rus` varchar(255) DEFAULT NULL,
  `inner_menu_pt` varchar(255) DEFAULT NULL,
  `inner_menu_es` varchar(255) DEFAULT NULL,
  `url_en` mediumtext DEFAULT NULL,
  `url_lt` mediumtext DEFAULT NULL,
  `url_rus` mediumtext DEFAULT NULL,
  `url_pt` mediumtext DEFAULT NULL,
  `url_es` mediumtext DEFAULT NULL,
  `custom_size_id` text DEFAULT NULL,
  `custom_clasp_id` text DEFAULT NULL,
  `surface_amber_id` text DEFAULT NULL,
  `specification_id` text DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `meta_description_en` longtext DEFAULT NULL,
  `meta_description_lt` longtext DEFAULT NULL,
  `meta_description_rus` longtext DEFAULT NULL,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inner_menu_info`
--

CREATE TABLE `inner_menu_info` (
  `id` int(11) NOT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `description_pt` text DEFAULT NULL,
  `description_es` text DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `inner_menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_lt` varchar(255) NOT NULL,
  `menu_en` varchar(255) NOT NULL,
  `menu_rus` varchar(255) NOT NULL,
  `menu_pt` varchar(255) NOT NULL,
  `menu_es` varchar(255) NOT NULL,
  `url_en` mediumtext DEFAULT NULL,
  `url_lt` mediumtext DEFAULT NULL,
  `url_rus` mediumtext DEFAULT NULL,
  `url_pt` mediumtext DEFAULT NULL,
  `url_es` mediumtext DEFAULT NULL,
  `custom_size_id` text DEFAULT NULL,
  `custom_clasp_id` text DEFAULT NULL,
  `surface_amber_id` text DEFAULT NULL,
  `specification_id` text DEFAULT NULL,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_lt`, `menu_en`, `menu_rus`, `menu_pt`, `menu_es`, `url_en`, `url_lt`, `url_rus`, `url_pt`, `url_es`, `custom_size_id`, `custom_clasp_id`, `surface_amber_id`, `specification_id`, `total_view`, `created_at`, `updated_at`) VALUES
(11, 'Spauda', 'Spauda', 'Spauda', 'Spauda', 'Spauda', NULL, NULL, NULL, NULL, NULL, '[\"20\",\"21\",\"22\",\"23\",\"24\"]', NULL, NULL, NULL, 8, '2022-03-25 07:43:38', '2022-03-28 14:12:04'),
(12, 'Spauda su įrišimu', 'Spauda su įrišimu', 'Spauda su įrišimu', 'Spauda su įrišimu', 'Spauda su įrišimu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2022-03-25 10:45:46', '2022-03-28 12:17:29'),
(13, 'Plačiaformatė spauda', 'Plačiaformatė spauda', 'Plačiaformatė spauda', 'Plačiaformatė spauda', 'Plačiaformatė spauda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-03-25 10:46:01', '2022-03-28 07:06:11'),
(14, 'Planšetai', 'Planšetai', 'Planšetai', 'Planšetai', 'Planšetai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-03-25 10:46:10', '2022-03-29 08:48:49'),
(15, 'Vizitinės kortelės', 'Vizitinės kortelės', 'Vizitinės kortelės', 'Vizitinės kortelės', 'Vizitinės kortelės', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2022-03-25 10:46:34', '2022-03-28 07:06:15'),
(17, 'Foto produktai', 'Foto produktai', 'Foto produktai', 'Foto produktai', 'Foto produktai', NULL, NULL, NULL, NULL, NULL, '[\"25\",\"26\",\"27\"]', NULL, NULL, NULL, 5, '2022-03-25 10:46:52', '2022-03-28 09:09:56'),
(18, 'Kanceliarinės prekės', 'Kanceliarinės prekės', 'Kanceliarinės prekės', 'Kanceliarinės prekės', 'Kanceliarinės prekės', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2022-03-25 10:46:59', '2022-03-29 08:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `menu_info`
--

CREATE TABLE `menu_info` (
  `id` int(11) NOT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `description_pt` text DEFAULT NULL,
  `description_es` text DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_info`
--

INSERT INTO `menu_info` (`id`, `description_en`, `description_lt`, `description_rus`, `description_pt`, `description_es`, `img`, `icon`, `menu_id`, `created_at`, `updated_at`) VALUES
(10, 'asfasfafs', 'asfasfafs', 'asfasfafs', 'asfasfafs', 'asfasfafs', '', '', 11, '2022-03-25 07:43:39', '2022-03-25 10:15:30'),
(11, NULL, NULL, NULL, NULL, NULL, '', '', 12, '2022-03-25 10:45:46', '2022-03-25 10:45:46'),
(12, NULL, NULL, NULL, NULL, NULL, '', '', 13, '2022-03-25 10:46:02', '2022-03-25 10:46:02'),
(13, NULL, NULL, NULL, NULL, NULL, '', '', 14, '2022-03-25 10:46:10', '2022-03-25 10:46:10'),
(14, NULL, NULL, NULL, NULL, NULL, '', '', 15, '2022-03-25 10:46:34', '2022-03-25 10:46:34'),
(16, NULL, NULL, NULL, NULL, NULL, '', '', 17, '2022-03-25 10:46:52', '2022-03-28 09:02:05'),
(17, NULL, NULL, NULL, NULL, NULL, '', '', 18, '2022-03-25 10:46:59', '2022-03-25 10:46:59');

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
(0, '2021_04_28_192738_create_most_vieweds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `most_vieweds`
--

CREATE TABLE `most_vieweds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `viewable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `most_vieweds`
--

INSERT INTO `most_vieweds` (`id`, `viewable_id`, `viewable_type`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Menu', '103.127.6.221', '2021-07-14 20:20:10', '2021-07-14 20:20:10'),
(2, 1, 'App\\Menu', '77.230.175.121', '2021-07-27 17:46:57', '2021-07-27 17:46:57'),
(3, 5, 'App\\Menu', '77.230.175.121', '2021-07-27 17:47:08', '2021-07-27 17:47:08'),
(4, 19, 'App\\Menu', '77.230.175.121', '2021-07-27 17:47:44', '2021-07-27 17:47:44'),
(5, 3, 'App\\Menu', '77.230.175.121', '2021-07-27 17:47:52', '2021-07-27 17:47:52'),
(6, 2, 'App\\Menu', '77.230.175.121', '2021-07-27 17:47:54', '2021-07-27 17:47:54'),
(7, 7, 'App\\SubMenu', '77.230.175.121', '2021-07-27 17:47:58', '2021-07-27 17:47:58'),
(8, 1, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:39', '2021-08-24 07:14:39'),
(9, 2, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:44', '2021-08-24 07:14:44'),
(10, 3, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:46', '2021-08-24 07:14:46'),
(11, 4, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:49', '2021-08-24 07:14:49'),
(12, 5, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:52', '2021-08-24 07:14:52'),
(13, 6, 'App\\Menu', '80.174.182.249', '2021-08-24 07:14:55', '2021-08-24 07:14:55'),
(14, 208, 'App\\InnerMenu', '80.174.182.249', '2021-08-24 07:18:16', '2021-08-24 07:18:16'),
(15, 2, 'App\\Menu', '31.4.242.183', '2021-08-28 11:20:36', '2021-08-28 11:20:36'),
(16, 3, 'App\\Menu', '31.4.242.43', '2021-09-01 06:04:01', '2021-09-01 06:04:01'),
(17, 1, 'App\\Product', '95.63.194.153', '2021-09-07 06:04:54', '2021-09-07 06:04:54'),
(18, 1, 'App\\Menu', '95.63.194.153', '2021-09-07 06:06:07', '2021-09-07 06:06:07'),
(19, 1, 'App\\SubMenu', '95.63.194.153', '2021-09-07 06:06:48', '2021-09-07 06:06:48'),
(20, 5, 'App\\Menu', '95.63.194.153', '2021-09-07 06:13:54', '2021-09-07 06:13:54'),
(21, 1, 'App\\Product', '103.147.163.206', '2021-09-09 09:49:24', '2021-09-09 09:49:24'),
(22, 1, 'App\\Menu', '103.147.163.206', '2021-09-09 09:52:06', '2021-09-09 09:52:06'),
(23, 2, 'App\\Menu', '103.147.163.206', '2021-09-09 09:52:13', '2021-09-09 09:52:13'),
(24, 3, 'App\\Menu', '103.147.163.206', '2021-09-09 09:53:05', '2021-09-09 09:53:05'),
(25, 19, 'App\\Menu', '103.147.163.206', '2021-09-09 10:53:51', '2021-09-09 10:53:51'),
(26, 1, 'App\\Menu', '31.4.242.216', '2021-09-25 02:45:37', '2021-09-25 02:45:37'),
(28, 1, 'App\\Menu', '47.60.40.41', '2021-09-25 03:02:33', '2021-09-25 03:02:33'),
(29, 2, 'App\\Menu', '47.60.40.41', '2021-09-25 03:02:54', '2021-09-25 03:02:54'),
(31, 1, 'App\\Menu', '31.4.242.17', '2021-09-25 08:59:35', '2021-09-25 08:59:35'),
(34, 2, 'App\\Menu', '37.111.200.98', '2021-09-27 04:39:43', '2021-09-27 04:39:43'),
(35, 2, 'App\\Menu', '31.4.242.146', '2021-09-28 17:34:29', '2021-09-28 17:34:29'),
(36, 2, 'App\\Menu', '31.4.242.47', '2021-09-29 14:19:53', '2021-09-29 14:19:53'),
(37, 1, 'App\\Menu', '31.4.242.47', '2021-09-29 14:33:54', '2021-09-29 14:33:54'),
(42, 2, 'App\\Menu', '31.4.242.164', '2021-09-30 04:52:32', '2021-09-30 04:52:32'),
(44, 1, 'App\\Menu', '31.4.242.164', '2021-09-30 05:01:22', '2021-09-30 05:01:22'),
(46, 2, 'App\\Menu', '66.249.81.249', '2021-09-30 05:04:21', '2021-09-30 05:04:21'),
(47, 2, 'App\\Menu', '66.249.81.245', '2021-09-30 05:04:21', '2021-09-30 05:04:21'),
(48, 2, 'App\\Menu', '66.249.81.247', '2021-09-30 05:04:28', '2021-09-30 05:04:28'),
(52, 2, 'App\\Menu', '47.60.47.63', '2021-09-30 21:56:33', '2021-09-30 21:56:33'),
(54, 5, 'App\\Menu', '47.60.47.63', '2021-09-30 21:57:45', '2021-09-30 21:57:45'),
(55, 1, 'App\\Menu', '47.60.47.63', '2021-09-30 21:57:51', '2021-09-30 21:57:51'),
(59, 5, 'App\\Menu', '103.136.96.5', '2021-10-04 09:27:12', '2021-10-04 09:27:12'),
(62, 2, 'App\\Menu', '31.4.242.163', '2021-10-04 16:44:46', '2021-10-04 16:44:46'),
(64, 5, 'App\\Menu', '31.4.242.163', '2021-10-04 16:55:59', '2021-10-04 16:55:59'),
(67, 1, 'App\\SubMenu', '31.4.242.163', '2021-10-04 17:23:38', '2021-10-04 17:23:38'),
(69, 2, 'App\\Menu', '31.4.242.168', '2021-10-06 05:12:22', '2021-10-06 05:12:22'),
(70, 5, 'App\\Menu', '103.147.163.206', '2021-10-06 09:21:46', '2021-10-06 09:21:46'),
(73, 1, 'App\\SubMenu', '103.147.163.206', '2021-10-06 11:09:25', '2021-10-06 11:09:25'),
(74, 1, 'App\\Menu', '31.4.242.168', '2021-10-07 08:25:41', '2021-10-07 08:25:41'),
(76, 5, 'App\\Menu', '31.4.242.168', '2021-10-07 08:26:29', '2021-10-07 08:26:29'),
(77, 2, 'App\\Menu', '31.4.242.68', '2021-10-09 11:15:40', '2021-10-09 11:15:40'),
(78, 2, 'App\\SubMenu', '31.4.242.68', '2021-10-09 11:54:33', '2021-10-09 11:54:33'),
(79, 1, 'App\\SubMenu', '31.4.242.68', '2021-10-09 14:41:43', '2021-10-09 14:41:43'),
(80, 2, 'App\\SubMenu', '103.147.163.206', '2021-10-10 09:41:54', '2021-10-10 09:41:54'),
(81, 1, 'App\\SubMenu', '31.4.242.221', '2021-10-10 10:05:19', '2021-10-10 10:05:19'),
(82, 2, 'App\\Menu', '31.4.242.48', '2021-10-10 19:27:01', '2021-10-10 19:27:01'),
(83, 2, 'App\\Menu', '31.4.242.133', '2021-10-13 08:28:23', '2021-10-13 08:28:23'),
(84, 2, 'App\\Menu', '31.4.242.174', '2021-10-13 12:42:03', '2021-10-13 12:42:03'),
(85, 1, 'App\\SubMenu', '31.4.242.174', '2021-10-13 17:25:33', '2021-10-13 17:25:33'),
(87, 5, 'App\\Menu', '31.4.242.174', '2021-10-13 17:28:45', '2021-10-13 17:28:45'),
(90, 7, 'App\\Menu', '31.4.242.174', '2021-10-13 17:38:04', '2021-10-13 17:38:04'),
(91, 6, 'App\\SubMenu', '31.4.242.174', '2021-10-13 17:38:07', '2021-10-13 17:38:07'),
(92, 5, 'App\\SubMenu', '31.4.242.174', '2021-10-13 17:42:20', '2021-10-13 17:42:20'),
(93, 2, 'App\\SubMenu', '31.4.242.174', '2021-10-13 17:43:33', '2021-10-13 17:43:33'),
(94, 4, 'App\\SubMenu', '31.4.242.174', '2021-10-13 17:43:38', '2021-10-13 17:43:38'),
(95, 5, 'App\\SubMenu', '31.4.209.73', '2021-10-13 17:46:30', '2021-10-13 17:46:30'),
(97, 5, 'App\\SubMenu', '31.13.103.120', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(98, 5, 'App\\SubMenu', '31.13.103.118', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(99, 5, 'App\\SubMenu', '69.171.249.111', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(100, 5, 'App\\SubMenu', '69.171.249.14', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(101, 7, 'App\\Menu', '103.147.163.206', '2021-10-14 15:09:59', '2021-10-14 15:09:59'),
(103, 5, 'App\\SubMenu', '173.252.87.22', '2021-10-16 07:38:44', '2021-10-16 07:38:44'),
(104, 2, 'App\\Menu', '31.4.242.214', '2021-10-17 08:08:50', '2021-10-17 08:08:50'),
(105, 6, 'App\\SubMenu', '31.4.242.214', '2021-10-17 08:08:55', '2021-10-17 08:08:55'),
(106, 7, 'App\\Menu', '31.4.242.214', '2021-10-17 08:09:08', '2021-10-17 08:09:08'),
(107, 7, 'App\\Menu', '31.4.209.73', '2021-10-17 16:35:20', '2021-10-17 16:35:20'),
(109, 5, 'App\\Menu', '31.4.209.73', '2021-10-18 05:34:11', '2021-10-18 05:34:11'),
(110, 1, 'App\\Menu', '31.4.209.73', '2021-10-18 05:34:30', '2021-10-18 05:34:30'),
(111, 2, 'App\\Menu', '31.4.209.73', '2021-10-18 05:34:35', '2021-10-18 05:34:35'),
(116, 7, 'App\\Menu', '103.136.96.5', '2021-10-18 05:56:50', '2021-10-18 05:56:50'),
(117, 6, 'App\\SubMenu', '103.136.96.5', '2021-10-18 06:01:44', '2021-10-18 06:01:44'),
(118, 7, 'App\\Menu', '31.4.242.133', '2021-10-18 07:03:06', '2021-10-18 07:03:06'),
(119, 5, 'App\\Menu', '31.4.242.133', '2021-10-18 07:03:13', '2021-10-18 07:03:13'),
(122, 2, 'App\\Menu', '31.13.103.15', '2021-10-18 07:22:52', '2021-10-18 07:22:52'),
(123, 5, 'App\\Menu', '31.13.103.119', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(124, 2, 'App\\Menu', '31.13.127.4', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(125, 5, 'App\\Menu', '31.13.127.40', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(126, 2, 'App\\Menu', '31.13.127.28', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(127, 5, 'App\\SubMenu', '31.4.242.133', '2021-10-18 07:26:47', '2021-10-18 07:26:47'),
(128, 2, 'App\\Menu', '31.4.242.116', '2021-10-20 04:56:31', '2021-10-20 04:56:31'),
(131, 2, 'App\\Menu', '31.4.242.82', '2021-10-20 10:24:11', '2021-10-20 10:24:11'),
(132, 5, 'App\\SubMenu', '31.4.242.82', '2021-10-20 10:44:07', '2021-10-20 10:44:07'),
(133, 2, 'App\\Menu', '31.4.242.79', '2021-10-20 16:03:13', '2021-10-20 16:03:13'),
(135, 5, 'App\\SubMenu', '31.4.242.79', '2021-10-20 16:06:00', '2021-10-20 16:06:00'),
(136, 3, 'App\\SubMenu', '31.4.242.79', '2021-10-20 16:06:04', '2021-10-20 16:06:04'),
(137, 2, 'App\\SubMenu', '31.4.242.79', '2021-10-20 16:06:08', '2021-10-20 16:06:08'),
(139, 2, 'App\\Menu', '31.13.103.22', '2021-10-21 06:37:01', '2021-10-21 06:37:01'),
(140, 2, 'App\\Menu', '31.4.242.54', '2021-10-21 06:40:51', '2021-10-21 06:40:51'),
(143, 4, 'App\\SubMenu', '83.50.213.16', '2021-10-28 06:01:54', '2021-10-28 06:01:54'),
(144, 5, 'App\\SubMenu', '83.50.213.16', '2021-10-28 06:02:00', '2021-10-28 06:02:00'),
(145, 3, 'App\\SubMenu', '83.50.213.16', '2021-10-28 13:42:58', '2021-10-28 13:42:58'),
(146, 2, 'App\\SubMenu', '83.50.213.16', '2021-10-28 13:43:01', '2021-10-28 13:43:01'),
(147, 1, 'App\\SubMenu', '83.50.213.16', '2021-10-28 13:43:15', '2021-10-28 13:43:15'),
(154, 6, 'App\\SubMenu', '83.50.213.16', '2021-10-28 17:44:22', '2021-10-28 17:44:22'),
(155, 6, 'App\\SubMenu', '173.252.107.18', '2021-10-28 18:04:14', '2021-10-28 18:04:14'),
(156, 6, 'App\\SubMenu', '173.252.107.2', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(157, 6, 'App\\SubMenu', '66.220.149.8', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(158, 6, 'App\\SubMenu', '69.171.251.22', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(159, 6, 'App\\SubMenu', '173.252.87.118', '2021-10-28 18:04:21', '2021-10-28 18:04:21'),
(160, 7, 'App\\SubMenu', '83.50.213.16', '2021-10-28 18:11:56', '2021-10-28 18:11:56'),
(161, 6, 'App\\SubMenu', '90.131.33.245', '2021-10-28 18:25:34', '2021-10-28 18:25:34'),
(163, 6, 'App\\SubMenu', '162.204.252.47', '2021-10-28 18:28:46', '2021-10-28 18:28:46'),
(165, 6, 'App\\SubMenu', '84.15.180.86', '2021-10-29 02:02:58', '2021-10-29 02:02:58'),
(166, 6, 'App\\SubMenu', '83.179.69.8', '2021-10-29 02:33:30', '2021-10-29 02:33:30'),
(167, 6, 'App\\SubMenu', '78.58.188.166', '2021-10-29 03:52:14', '2021-10-29 03:52:14'),
(168, 6, 'App\\SubMenu', '95.91.204.88', '2021-10-29 04:15:57', '2021-10-29 04:15:57'),
(169, 6, 'App\\SubMenu', '69.63.189.120', '2021-10-29 04:16:04', '2021-10-29 04:16:04'),
(170, 7, 'App\\SubMenu', '95.91.204.88', '2021-10-29 04:16:19', '2021-10-29 04:16:19'),
(171, 5, 'App\\Menu', '95.91.204.88', '2021-10-29 04:17:28', '2021-10-29 04:17:28'),
(172, 1, 'App\\Menu', '95.91.204.88', '2021-10-29 04:17:39', '2021-10-29 04:17:39'),
(176, 2, 'App\\Menu', '83.50.213.16', '2021-10-29 10:17:15', '2021-10-29 10:17:15'),
(177, 5, 'App\\Menu', '83.50.213.16', '2021-10-29 10:21:24', '2021-10-29 10:21:24'),
(178, 7, 'App\\Menu', '83.50.213.16', '2021-10-29 10:21:28', '2021-10-29 10:21:28'),
(179, 1, 'App\\Menu', '83.50.213.16', '2021-10-29 10:21:31', '2021-10-29 10:21:31'),
(182, 6, 'App\\SubMenu', '84.15.180.198', '2021-10-29 11:17:32', '2021-10-29 11:17:32'),
(183, 6, 'App\\SubMenu', '78.61.98.214', '2021-10-29 18:47:08', '2021-10-29 18:47:08'),
(184, 6, 'App\\SubMenu', '86.100.80.227', '2021-10-30 04:52:13', '2021-10-30 04:52:13'),
(185, 6, 'App\\SubMenu', '69.63.184.5', '2021-10-30 12:13:54', '2021-10-30 12:13:54'),
(187, 2, 'App\\Menu', '188.69.240.110', '2021-10-31 11:37:18', '2021-10-31 11:37:18'),
(190, 2, 'App\\Menu', '31.4.242.27', '2021-11-10 03:59:54', '2021-11-10 03:59:54'),
(192, 6, 'App\\SubMenu', '31.13.103.15', '2021-11-11 11:09:29', '2021-11-11 11:09:29'),
(193, 6, 'App\\SubMenu', '31.13.103.117', '2021-11-11 11:09:29', '2021-11-11 11:09:29'),
(194, 6, 'App\\SubMenu', '195.182.71.123', '2021-11-12 07:28:58', '2021-11-12 07:28:58'),
(195, 6, 'App\\SubMenu', '31.13.103.10', '2021-11-12 07:30:50', '2021-11-12 07:30:50'),
(196, 6, 'App\\SubMenu', '77.79.44.6', '2021-11-15 14:10:45', '2021-11-15 14:10:45'),
(197, 5, 'App\\Menu', '77.211.5.5', '2021-11-22 07:40:19', '2021-11-22 07:40:19'),
(199, 1, 'App\\Menu', '103.136.96.3', '2021-11-25 04:43:02', '2021-11-25 04:43:02'),
(201, 2, 'App\\Menu', '103.136.96.3', '2021-11-25 04:43:15', '2021-11-25 04:43:15'),
(207, 7, 'App\\Menu', '31.4.242.64', '2021-11-25 08:49:07', '2021-11-25 08:49:07'),
(209, 7, 'App\\Menu', '31.4.242.248', '2021-11-25 11:35:17', '2021-11-25 11:35:17'),
(210, 5, 'App\\Menu', '31.4.242.248', '2021-11-25 11:35:24', '2021-11-25 11:35:24'),
(211, 2, 'App\\Menu', '31.4.242.248', '2021-11-25 11:35:26', '2021-11-25 11:35:26'),
(212, 5, 'App\\Menu', '47.60.43.161', '2021-11-25 11:50:12', '2021-11-25 11:50:12'),
(214, 2, 'App\\Menu', '91.219.240.4', '2021-11-26 19:39:20', '2021-11-26 19:39:20'),
(215, 2, 'App\\Menu', '149.154.161.3', '2021-11-26 19:39:46', '2021-11-26 19:39:46'),
(216, 1, 'App\\SubMenu', '31.4.242.252', '2021-11-26 19:39:46', '2021-11-26 19:39:46'),
(217, 5, 'App\\SubMenu', '31.4.242.252', '2021-11-26 19:39:49', '2021-11-26 19:39:49'),
(218, 2, 'App\\SubMenu', '31.4.242.252', '2021-11-26 19:39:54', '2021-11-26 19:39:54'),
(219, 2, 'App\\Menu', '23.106.63.34', '2021-11-26 19:39:54', '2021-11-26 19:39:54'),
(220, 4, 'App\\SubMenu', '31.4.242.252', '2021-11-26 19:39:59', '2021-11-26 19:39:59'),
(221, 1, 'App\\Menu', '31.4.242.252', '2021-11-26 19:40:03', '2021-11-26 19:40:03'),
(223, 5, 'App\\Menu', '31.4.242.252', '2021-11-26 19:40:13', '2021-11-26 19:40:13'),
(232, 5, 'App\\Menu', '91.219.240.4', '2021-11-26 19:44:40', '2021-11-26 19:44:40'),
(233, 3, 'App\\SubMenu', '31.4.242.252', '2021-11-26 19:45:19', '2021-11-26 19:45:19'),
(234, 2, 'App\\Menu', '78.58.134.92', '2021-11-26 20:02:17', '2021-11-26 20:02:17'),
(235, 1, 'App\\Menu', '78.58.134.92', '2021-11-26 20:02:54', '2021-11-26 20:02:54'),
(237, 7, 'App\\Menu', '88.216.29.149', '2021-11-26 20:43:59', '2021-11-26 20:43:59'),
(238, 5, 'App\\Menu', '88.216.29.149', '2021-11-26 20:45:41', '2021-11-26 20:45:41'),
(240, 1, 'App\\Menu', '88.216.29.149', '2021-11-26 20:46:08', '2021-11-26 20:46:08'),
(241, 2, 'App\\Menu', '88.216.29.149', '2021-11-26 20:46:39', '2021-11-26 20:46:39'),
(242, 3, 'App\\SubMenu', '23.106.63.34', '2021-11-26 20:48:26', '2021-11-26 20:48:26'),
(244, 5, 'App\\SubMenu', '23.106.63.34', '2021-11-26 20:50:27', '2021-11-26 20:50:27'),
(245, 2, 'App\\Menu', '84.15.182.163', '2021-11-26 21:26:25', '2021-11-26 21:26:25'),
(248, 5, 'App\\Menu', '84.15.182.163', '2021-11-26 21:27:19', '2021-11-26 21:27:19'),
(249, 1, 'App\\Menu', '84.15.182.163', '2021-11-26 21:27:25', '2021-11-26 21:27:25'),
(250, 7, 'App\\Menu', '84.15.182.163', '2021-11-26 21:27:33', '2021-11-26 21:27:33'),
(252, 5, 'App\\Menu', '84.15.176.73', '2021-11-27 05:48:04', '2021-11-27 05:48:04'),
(253, 2, 'App\\Menu', '188.69.211.18', '2021-11-27 06:33:48', '2021-11-27 06:33:48'),
(254, 2, 'App\\Menu', '85.206.107.173', '2021-11-27 06:37:36', '2021-11-27 06:37:36'),
(255, 2, 'App\\Menu', '90.138.69.253', '2021-11-27 07:16:24', '2021-11-27 07:16:24'),
(257, 5, 'App\\Menu', '90.138.69.253', '2021-11-27 07:18:22', '2021-11-27 07:18:22'),
(258, 2, 'App\\Menu', '31.4.242.5', '2021-11-27 07:48:43', '2021-11-27 07:48:43'),
(260, 5, 'App\\Menu', '84.15.189.91', '2021-11-27 08:40:02', '2021-11-27 08:40:02'),
(261, 1, 'App\\Menu', '84.15.189.91', '2021-11-27 08:40:33', '2021-11-27 08:40:33'),
(262, 2, 'App\\Menu', '84.15.189.91', '2021-11-27 08:40:43', '2021-11-27 08:40:43'),
(266, 5, 'App\\Menu', '84.210.132.88', '2021-11-27 09:38:47', '2021-11-27 09:38:47'),
(267, 7, 'App\\Menu', '84.210.132.88', '2021-11-27 09:38:52', '2021-11-27 09:38:52'),
(268, 1, 'App\\Menu', '84.210.132.88', '2021-11-27 09:39:15', '2021-11-27 09:39:15'),
(272, 1, 'App\\Menu', '31.4.242.136', '2021-11-30 07:56:53', '2021-11-30 07:56:53'),
(274, 5, 'App\\Menu', '103.136.96.3', '2021-12-01 05:12:45', '2021-12-01 05:12:45'),
(276, 2, 'App\\Menu', '77.211.5.143', '2021-12-02 10:44:47', '2021-12-02 10:44:47'),
(280, 7, 'App\\Menu', '47.60.43.161', '2021-12-03 01:05:11', '2021-12-03 01:05:11'),
(281, 7, 'App\\Menu', '31.13.127.18', '2021-12-03 01:05:31', '2021-12-03 01:05:31'),
(282, 7, 'App\\Menu', '31.13.127.33', '2021-12-03 01:05:32', '2021-12-03 01:05:32'),
(283, 7, 'App\\Menu', '31.13.127.8', '2021-12-03 01:05:37', '2021-12-03 01:05:37'),
(284, 2, 'App\\Menu', '188.69.209.55', '2021-12-03 09:27:09', '2021-12-03 09:27:09'),
(288, 2, 'App\\Menu', '83.176.175.56', '2021-12-03 10:10:18', '2021-12-03 10:10:18'),
(289, 2, 'App\\Menu', '5.20.96.227', '2021-12-03 10:18:03', '2021-12-03 10:18:03'),
(290, 2, 'App\\Menu', '90.131.40.242', '2021-12-03 10:27:44', '2021-12-03 10:27:44'),
(291, 2, 'App\\Menu', '78.31.187.5', '2021-12-03 10:33:19', '2021-12-03 10:33:19'),
(292, 2, 'App\\Menu', '88.119.206.127', '2021-12-03 10:44:46', '2021-12-03 10:44:46'),
(296, 5, 'App\\Menu', '88.119.206.127', '2021-12-03 10:47:16', '2021-12-03 10:47:16'),
(297, 7, 'App\\Menu', '88.119.206.127', '2021-12-03 10:47:46', '2021-12-03 10:47:46'),
(299, 2, 'App\\Menu', '46.64.37.245', '2021-12-03 11:01:05', '2021-12-03 11:01:05'),
(302, 2, 'App\\Menu', '90.140.136.66', '2021-12-03 11:15:40', '2021-12-03 11:15:40'),
(303, 5, 'App\\Menu', '90.140.136.66', '2021-12-03 11:16:15', '2021-12-03 11:16:15'),
(304, 1, 'App\\Menu', '90.140.136.66', '2021-12-03 11:16:29', '2021-12-03 11:16:29'),
(306, 7, 'App\\Menu', '90.140.136.66', '2021-12-03 11:16:36', '2021-12-03 11:16:36'),
(313, 2, 'App\\Menu', '47.60.43.161', '2021-12-03 11:48:41', '2021-12-03 11:48:41'),
(314, 1, 'App\\Menu', '47.60.43.161', '2021-12-03 11:49:09', '2021-12-03 11:49:09'),
(316, 2, 'App\\Menu', '31.4.215.71', '2021-12-03 11:50:50', '2021-12-03 11:50:50'),
(318, 3, 'App\\SubMenu', '77.211.5.61', '2021-12-03 18:55:57', '2021-12-03 18:55:57'),
(320, 5, 'App\\SubMenu', '77.211.5.61', '2021-12-03 18:56:17', '2021-12-03 18:56:17'),
(322, 4, 'App\\SubMenu', '77.211.5.61', '2021-12-03 18:56:31', '2021-12-03 18:56:31'),
(327, 2, 'App\\Menu', '31.4.242.206', '2021-12-04 10:53:08', '2021-12-04 10:53:08'),
(328, 3, 'App\\SubMenu', '31.4.242.206', '2021-12-04 10:53:12', '2021-12-04 10:53:12'),
(331, 7, 'App\\Menu', '103.136.96.3', '2021-12-05 04:10:05', '2021-12-05 04:10:05'),
(332, 5, 'App\\Menu', '77.211.5.95', '2021-12-05 07:41:33', '2021-12-05 07:41:33'),
(335, 2, 'App\\SubMenu', '77.211.5.95', '2021-12-05 08:24:09', '2021-12-05 08:24:09'),
(336, 2, 'App\\Menu', '188.69.214.150', '2021-12-05 08:38:27', '2021-12-05 08:38:27'),
(340, 1, 'App\\SubMenu', '103.136.96.3', '2021-12-05 09:02:22', '2021-12-05 09:02:22'),
(341, 1, 'App\\Menu', '77.211.5.95', '2021-12-05 09:08:13', '2021-12-05 09:08:13'),
(342, 3, 'App\\SubMenu', '77.211.5.95', '2021-12-05 09:11:10', '2021-12-05 09:11:10'),
(344, 7, 'App\\SubMenu', '77.211.5.95', '2021-12-05 09:45:42', '2021-12-05 09:45:42'),
(345, 6, 'App\\SubMenu', '77.211.5.95', '2021-12-05 09:45:45', '2021-12-05 09:45:45'),
(347, 1, 'App\\SubMenu', '77.211.5.95', '2021-12-05 09:50:26', '2021-12-05 09:50:26'),
(349, 2, 'App\\Menu', '77.211.5.95', '2021-12-05 09:50:51', '2021-12-05 09:50:51'),
(354, 6, 'App\\SubMenu', '103.136.96.3', '2021-12-06 03:42:42', '2021-12-06 03:42:42'),
(359, 1, 'App\\Menu', '37.111.219.86', '2021-12-06 10:59:10', '2021-12-06 10:59:10'),
(361, 2, 'App\\Menu', '37.111.219.86', '2021-12-06 11:00:48', '2021-12-06 11:00:48'),
(362, 1, 'App\\Menu', '31.4.214.252', '2021-12-06 14:14:29', '2021-12-06 14:14:29'),
(364, 5, 'App\\Menu', '31.4.214.252', '2021-12-06 14:23:08', '2021-12-06 14:23:08'),
(366, 7, 'App\\Menu', '31.4.242.127', '2021-12-06 18:05:52', '2021-12-06 18:05:52'),
(367, 2, 'App\\SubMenu', '31.4.242.127', '2021-12-06 18:27:44', '2021-12-06 18:27:44'),
(368, 1, 'App\\SubMenu', '31.4.242.127', '2021-12-06 18:27:46', '2021-12-06 18:27:46'),
(369, 1, 'App\\Menu', '77.211.5.156', '2021-12-07 03:28:52', '2021-12-07 03:28:52'),
(370, 2, 'App\\Menu', '77.211.5.156', '2021-12-07 03:28:55', '2021-12-07 03:28:55'),
(372, 5, 'App\\Menu', '77.211.5.156', '2021-12-07 03:30:10', '2021-12-07 03:30:10'),
(373, 7, 'App\\Menu', '77.211.5.156', '2021-12-07 03:30:13', '2021-12-07 03:30:13'),
(378, 2, 'App\\SubMenu', '103.136.96.3', '2021-12-07 04:35:03', '2021-12-07 04:35:03'),
(379, 1, 'App\\SubMenu', '37.111.217.190', '2021-12-07 05:41:18', '2021-12-07 05:41:18'),
(389, 3, 'App\\SubMenu', '77.211.5.73', '2021-12-07 09:30:54', '2021-12-07 09:30:54'),
(396, 6, 'App\\SubMenu', '31.4.242.228', '2021-12-07 11:16:57', '2021-12-07 11:16:57'),
(397, 2, 'App\\SubMenu', '31.4.242.228', '2021-12-07 11:17:12', '2021-12-07 11:17:12'),
(398, 4, 'App\\SubMenu', '31.4.242.228', '2021-12-07 11:17:16', '2021-12-07 11:17:16'),
(399, 6, 'App\\SubMenu', '188.69.197.162', '2021-12-07 11:17:18', '2021-12-07 11:17:18'),
(400, 3, 'App\\SubMenu', '31.4.242.228', '2021-12-07 11:17:21', '2021-12-07 11:17:21'),
(401, 5, 'App\\SubMenu', '31.4.242.228', '2021-12-07 11:17:38', '2021-12-07 11:17:38'),
(402, 5, 'App\\SubMenu', '188.69.197.162', '2021-12-07 11:18:00', '2021-12-07 11:18:00'),
(403, 5, 'App\\SubMenu', '90.131.44.169', '2021-12-07 11:43:52', '2021-12-07 11:43:52'),
(404, 5, 'App\\SubMenu', '66.220.149.32', '2021-12-07 11:59:07', '2021-12-07 11:59:07'),
(405, 5, 'App\\SubMenu', '66.220.149.3', '2021-12-07 11:59:07', '2021-12-07 11:59:07'),
(406, 2, 'App\\Menu', '31.4.214.252', '2021-12-07 13:15:54', '2021-12-07 13:15:54'),
(407, 2, 'App\\Menu', '212.89.24.6', '2021-12-07 13:15:56', '2021-12-07 13:15:56'),
(409, 3, 'App\\SubMenu', '77.211.5.28', '2021-12-07 13:28:57', '2021-12-07 13:28:57'),
(415, 4, 'App\\SubMenu', '77.211.5.46', '2021-12-08 06:52:25', '2021-12-08 06:52:25'),
(417, 1, 'App\\SubMenu', '77.211.5.141', '2021-12-08 16:25:11', '2021-12-08 16:25:11'),
(419, 7, 'App\\Menu', '77.211.5.141', '2021-12-08 16:33:09', '2021-12-08 16:33:09'),
(424, 1, 'App\\Menu', '159.69.58.136', '2021-12-08 19:27:09', '2021-12-08 19:27:09'),
(425, 7, 'App\\SubMenu', '157.55.39.203', '2021-12-09 01:56:41', '2021-12-09 01:56:41'),
(427, 5, 'App\\Menu', '207.46.13.70', '2021-12-09 02:13:37', '2021-12-09 02:13:37'),
(430, 3, 'App\\SubMenu', '77.211.5.56', '2021-12-09 14:20:49', '2021-12-09 14:20:49'),
(433, 5, 'App\\Menu', '77.211.5.56', '2021-12-09 15:16:59', '2021-12-09 15:16:59'),
(436, 5, 'App\\SubMenu', '5.255.253.156', '2021-12-10 05:16:24', '2021-12-10 05:16:24'),
(439, 1, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:16:31', '2021-12-10 05:16:31'),
(441, 3, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:16:35', '2021-12-10 05:16:35'),
(444, 6, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:16:51', '2021-12-10 05:16:51'),
(445, 1, 'App\\Menu', '5.255.253.156', '2021-12-10 05:16:53', '2021-12-10 05:16:53'),
(447, 7, 'App\\Menu', '5.255.253.156', '2021-12-10 05:17:05', '2021-12-10 05:17:05'),
(449, 2, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:19:52', '2021-12-10 05:19:52'),
(451, 5, 'App\\Menu', '5.255.253.156', '2021-12-10 05:20:38', '2021-12-10 05:20:38'),
(452, 2, 'App\\Menu', '5.255.253.185', '2021-12-10 05:20:42', '2021-12-10 05:20:42'),
(453, 4, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:20:59', '2021-12-10 05:20:59'),
(454, 7, 'App\\SubMenu', '5.255.253.185', '2021-12-10 05:21:08', '2021-12-10 05:21:08'),
(455, 5, 'App\\SubMenu', '173.252.83.23', '2021-12-10 08:28:38', '2021-12-10 08:28:38'),
(456, 5, 'App\\Menu', '77.211.5.139', '2021-12-10 08:34:22', '2021-12-10 08:34:22'),
(457, 5, 'App\\Menu', '77.211.5.142', '2021-12-10 13:28:15', '2021-12-10 13:28:15'),
(458, 5, 'App\\Menu', '90.131.42.245', '2021-12-10 16:32:27', '2021-12-10 16:32:27'),
(460, 7, 'App\\Menu', '90.131.42.245', '2021-12-10 16:34:37', '2021-12-10 16:34:37'),
(461, 2, 'App\\Menu', '90.131.42.245', '2021-12-10 16:36:02', '2021-12-10 16:36:02'),
(462, 2, 'App\\Menu', '5.255.253.156', '2021-12-10 18:15:26', '2021-12-10 18:15:26'),
(465, 4, 'App\\SubMenu', '31.4.242.195', '2021-12-11 07:43:06', '2021-12-11 07:43:06'),
(467, 1, 'App\\Menu', '77.211.5.231', '2021-12-12 02:33:10', '2021-12-12 02:33:10'),
(468, 2, 'App\\Menu', '77.211.5.231', '2021-12-12 02:33:15', '2021-12-12 02:33:15'),
(474, 5, 'App\\Menu', '77.211.5.231', '2021-12-12 02:45:38', '2021-12-12 02:45:38'),
(476, 5, 'App\\Menu', '157.55.39.169', '2021-12-12 07:07:51', '2021-12-12 07:07:51'),
(480, 5, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:44:04', '2021-12-12 13:44:04'),
(481, 4, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:44:18', '2021-12-12 13:44:18'),
(482, 3, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:44:26', '2021-12-12 13:44:26'),
(483, 2, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:44:39', '2021-12-12 13:44:39'),
(487, 1, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:45:50', '2021-12-12 13:45:50'),
(488, 5, 'App\\Menu', '85.232.129.228', '2021-12-12 13:46:08', '2021-12-12 13:46:08'),
(489, 6, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:46:17', '2021-12-12 13:46:17'),
(490, 7, 'App\\SubMenu', '85.232.129.228', '2021-12-12 13:46:28', '2021-12-12 13:46:28'),
(491, 1, 'App\\Menu', '85.232.129.228', '2021-12-12 13:46:32', '2021-12-12 13:46:32'),
(492, 1, 'App\\Menu', '212.52.60.196', '2021-12-12 13:46:34', '2021-12-12 13:46:34'),
(494, 1, 'App\\Menu', '88.119.11.39', '2021-12-13 12:06:34', '2021-12-13 12:06:34'),
(496, 5, 'App\\Menu', '88.119.11.39', '2021-12-13 12:06:41', '2021-12-13 12:06:41'),
(497, 7, 'App\\Menu', '88.119.11.39', '2021-12-13 12:06:45', '2021-12-13 12:06:45'),
(500, 2, 'App\\Menu', '85.232.129.228', '2021-12-13 12:09:04', '2021-12-13 12:09:04'),
(501, 7, 'App\\Menu', '85.232.129.228', '2021-12-13 12:09:26', '2021-12-13 12:09:26'),
(503, 7, 'App\\Menu', '95.91.204.88', '2021-12-13 12:54:19', '2021-12-13 12:54:19'),
(504, 7, 'App\\Menu', '90.131.42.250', '2021-12-13 15:16:34', '2021-12-13 15:16:34'),
(505, 5, 'App\\Menu', '90.131.42.250', '2021-12-13 15:16:47', '2021-12-13 15:16:47'),
(506, 7, 'App\\Menu', '78.58.212.76', '2021-12-13 15:23:53', '2021-12-13 15:23:53'),
(507, 6, 'App\\SubMenu', '188.69.213.246', '2021-12-13 16:11:10', '2021-12-13 16:11:10'),
(508, 2, 'App\\Menu', '85.206.238.87', '2021-12-13 16:16:10', '2021-12-13 16:16:10'),
(509, 7, 'App\\Menu', '85.206.238.87', '2021-12-13 16:18:11', '2021-12-13 16:18:11'),
(510, 7, 'App\\Menu', '77.211.5.43', '2021-12-13 17:47:21', '2021-12-13 17:47:21'),
(511, 6, 'App\\SubMenu', '77.211.5.43', '2021-12-13 17:47:21', '2021-12-13 17:47:21'),
(512, 2, 'App\\Menu', '78.56.179.236', '2021-12-13 20:44:17', '2021-12-13 20:44:17'),
(528, 1, 'App\\Menu', '78.56.179.236', '2021-12-13 20:55:25', '2021-12-13 20:55:25'),
(529, 6, 'App\\SubMenu', '78.56.179.236', '2021-12-13 20:55:32', '2021-12-13 20:55:32'),
(530, 7, 'App\\SubMenu', '78.56.179.236', '2021-12-13 20:55:37', '2021-12-13 20:55:37'),
(531, 5, 'App\\Menu', '78.56.179.236', '2021-12-13 20:55:41', '2021-12-13 20:55:41'),
(532, 7, 'App\\Menu', '78.56.179.236', '2021-12-13 20:55:44', '2021-12-13 20:55:44'),
(536, 7, 'App\\Menu', '47.60.46.33', '2021-12-13 21:24:52', '2021-12-13 21:24:52'),
(537, 7, 'App\\Menu', '31.13.103.17', '2021-12-13 21:35:27', '2021-12-13 21:35:27'),
(538, 7, 'App\\Menu', '31.13.103.21', '2021-12-13 21:35:28', '2021-12-13 21:35:28'),
(540, 3, 'App\\SubMenu', '77.211.5.88', '2021-12-14 15:06:01', '2021-12-14 15:06:01'),
(541, 4, 'App\\SubMenu', '77.211.5.88', '2021-12-14 15:06:09', '2021-12-14 15:06:09'),
(543, 5, 'App\\Menu', '86.100.18.241', '2021-12-15 20:17:59', '2021-12-15 20:17:59'),
(544, 1, 'App\\Menu', '86.100.18.241', '2021-12-15 20:18:08', '2021-12-15 20:18:08'),
(545, 6, 'App\\SubMenu', '66.220.149.32', '2021-12-16 07:16:38', '2021-12-16 07:16:38'),
(546, 2, 'App\\Menu', '90.131.36.207', '2021-12-17 08:48:37', '2021-12-17 08:48:37'),
(547, 1, 'App\\Menu', '188.69.194.4', '2021-12-17 09:23:37', '2021-12-17 09:23:37'),
(548, 7, 'App\\Menu', '188.69.194.4', '2021-12-17 09:26:52', '2021-12-17 09:26:52'),
(549, 5, 'App\\Menu', '188.69.194.4', '2021-12-17 09:27:08', '2021-12-17 09:27:08'),
(552, 2, 'App\\Menu', '188.69.194.4', '2021-12-17 09:27:47', '2021-12-17 09:27:47'),
(553, 7, 'App\\Menu', '78.62.10.237', '2021-12-17 14:02:53', '2021-12-17 14:02:53'),
(556, 6, 'App\\SubMenu', '31.4.242.45', '2021-12-17 18:53:01', '2021-12-17 18:53:01'),
(557, 5, 'App\\Menu', '31.4.242.45', '2021-12-17 18:57:26', '2021-12-17 18:57:26'),
(558, 2, 'App\\Menu', '31.4.242.45', '2021-12-17 18:57:29', '2021-12-17 18:57:29'),
(559, 1, 'App\\Menu', '31.4.242.45', '2021-12-17 18:57:31', '2021-12-17 18:57:31'),
(560, 6, 'App\\SubMenu', '86.38.153.4', '2021-12-17 18:58:41', '2021-12-17 18:58:41'),
(561, 6, 'App\\SubMenu', '69.171.249.116', '2021-12-17 19:10:53', '2021-12-17 19:10:53'),
(562, 4, 'App\\SubMenu', '159.223.125.115', '2021-12-18 22:46:08', '2021-12-18 22:46:08'),
(563, 2, 'App\\SubMenu', '167.172.62.246', '2021-12-18 22:46:10', '2021-12-18 22:46:10'),
(566, 6, 'App\\SubMenu', '137.184.37.180', '2021-12-18 22:46:37', '2021-12-18 22:46:37'),
(567, 3, 'App\\SubMenu', '137.184.37.185', '2021-12-18 22:46:38', '2021-12-18 22:46:38'),
(569, 5, 'App\\SubMenu', '206.189.12.85', '2021-12-18 22:46:47', '2021-12-18 22:46:47'),
(570, 1, 'App\\Menu', '161.35.237.29', '2021-12-18 22:46:58', '2021-12-18 22:46:58'),
(572, 1, 'App\\SubMenu', '159.223.126.170', '2021-12-18 22:47:31', '2021-12-18 22:47:31'),
(573, 2, 'App\\Menu', '167.172.62.216', '2021-12-18 22:47:43', '2021-12-18 22:47:43'),
(574, 7, 'App\\SubMenu', '137.184.37.207', '2021-12-18 22:48:12', '2021-12-18 22:48:12'),
(578, 7, 'App\\Menu', '159.223.122.233', '2021-12-18 22:50:48', '2021-12-18 22:50:48'),
(580, 5, 'App\\Menu', '137.184.234.23', '2021-12-18 22:54:35', '2021-12-18 22:54:35'),
(583, 2, 'App\\Menu', '78.61.13.108', '2021-12-19 18:37:56', '2021-12-19 18:37:56'),
(584, 1, 'App\\Menu', '78.61.13.108', '2021-12-19 18:39:35', '2021-12-19 18:39:35'),
(585, 5, 'App\\Menu', '78.61.13.108', '2021-12-19 18:40:40', '2021-12-19 18:40:40'),
(586, 7, 'App\\Menu', '78.61.13.108', '2021-12-19 18:40:48', '2021-12-19 18:40:48'),
(587, 5, 'App\\SubMenu', '77.211.5.79', '2021-12-20 09:31:45', '2021-12-20 09:31:45'),
(589, 6, 'App\\SubMenu', '77.211.5.79', '2021-12-20 09:36:44', '2021-12-20 09:36:44'),
(590, 6, 'App\\SubMenu', '31.4.242.230', '2021-12-20 18:59:53', '2021-12-20 18:59:53'),
(591, 6, 'App\\SubMenu', '88.118.87.238', '2021-12-20 19:00:30', '2021-12-20 19:00:30'),
(594, 5, 'App\\Menu', '77.211.5.119', '2021-12-21 14:55:03', '2021-12-21 14:55:03'),
(598, 6, 'App\\SubMenu', '31.13.103.17', '2021-12-22 07:09:17', '2021-12-22 07:09:17'),
(599, 6, 'App\\SubMenu', '81.7.87.143', '2021-12-22 07:09:44', '2021-12-22 07:09:44'),
(601, 7, 'App\\SubMenu', '81.7.87.143', '2021-12-22 07:33:45', '2021-12-22 07:33:45'),
(602, 5, 'App\\Menu', '81.7.87.143', '2021-12-22 07:33:50', '2021-12-22 07:33:50'),
(603, 1, 'App\\SubMenu', '81.7.87.143', '2021-12-22 07:34:07', '2021-12-22 07:34:07'),
(604, 3, 'App\\SubMenu', '81.7.87.143', '2021-12-22 07:34:26', '2021-12-22 07:34:26'),
(605, 4, 'App\\SubMenu', '81.7.87.143', '2021-12-22 07:34:55', '2021-12-22 07:34:55'),
(606, 1, 'App\\Menu', '81.7.87.143', '2021-12-22 07:35:04', '2021-12-22 07:35:04'),
(607, 1, 'App\\Menu', '78.56.234.143', '2021-12-22 08:56:49', '2021-12-22 08:56:49'),
(609, 7, 'App\\SubMenu', '167.172.62.217', '2021-12-23 06:21:28', '2021-12-23 06:21:28'),
(610, 6, 'App\\SubMenu', '167.71.4.78', '2021-12-23 06:23:07', '2021-12-23 06:23:07'),
(611, 2, 'App\\Menu', '159.223.125.115', '2021-12-23 06:23:43', '2021-12-23 06:23:43'),
(612, 5, 'App\\Menu', '68.183.1.60', '2021-12-23 06:26:20', '2021-12-23 06:26:20'),
(613, 3, 'App\\SubMenu', '137.184.37.200', '2021-12-23 06:32:08', '2021-12-23 06:32:08'),
(616, 4, 'App\\SubMenu', '159.223.122.120', '2021-12-23 06:40:42', '2021-12-23 06:40:42'),
(617, 2, 'App\\SubMenu', '167.172.62.216', '2021-12-23 06:46:55', '2021-12-23 06:46:55'),
(619, 1, 'App\\SubMenu', '147.182.164.49', '2021-12-23 06:49:10', '2021-12-23 06:49:10'),
(620, 1, 'App\\Menu', '68.183.14.230', '2021-12-23 07:01:13', '2021-12-23 07:01:13'),
(625, 7, 'App\\Menu', '167.71.4.78', '2021-12-23 07:53:03', '2021-12-23 07:53:03'),
(630, 6, 'App\\SubMenu', '137.184.37.190', '2021-12-26 15:55:02', '2021-12-26 15:55:02'),
(631, 7, 'App\\Menu', '137.184.37.190', '2021-12-26 15:57:07', '2021-12-26 15:57:07'),
(634, 1, 'App\\SubMenu', '167.99.209.88', '2021-12-26 17:41:31', '2021-12-26 17:41:31'),
(635, 2, 'App\\Menu', '167.172.62.217', '2021-12-26 17:50:36', '2021-12-26 17:50:36'),
(636, 4, 'App\\SubMenu', '5.161.59.203', '2021-12-26 17:54:46', '2021-12-26 17:54:46'),
(639, 5, 'App\\Menu', '159.223.114.185', '2021-12-26 18:49:31', '2021-12-26 18:49:31'),
(642, 7, 'App\\SubMenu', '143.198.146.251', '2021-12-26 19:19:49', '2021-12-26 19:19:49'),
(643, 5, 'App\\SubMenu', '5.161.58.19', '2021-12-26 22:24:15', '2021-12-26 22:24:15'),
(644, 3, 'App\\SubMenu', '167.172.62.223', '2021-12-26 22:30:59', '2021-12-26 22:30:59'),
(646, 1, 'App\\Menu', '167.172.62.208', '2021-12-27 00:18:17', '2021-12-27 00:18:17'),
(653, 1, 'App\\SubMenu', '207.46.13.93', '2021-12-28 21:44:20', '2021-12-28 21:44:20'),
(654, 2, 'App\\SubMenu', '207.46.13.93', '2021-12-29 03:31:06', '2021-12-29 03:31:06'),
(655, 7, 'App\\Menu', '83.190.234.46', '2021-12-29 20:46:31', '2021-12-29 20:46:31'),
(661, 1, 'App\\Menu', '90.131.38.185', '2021-12-31 18:48:46', '2021-12-31 18:48:46'),
(662, 7, 'App\\Menu', '90.131.38.185', '2021-12-31 18:48:52', '2021-12-31 18:48:52'),
(666, 6, 'App\\SubMenu', '157.55.39.221', '2022-01-01 20:23:38', '2022-01-01 20:23:38'),
(668, 7, 'App\\Menu', '157.55.39.63', '2022-01-03 09:24:07', '2022-01-03 09:24:07'),
(669, 1, 'App\\Menu', '78.57.205.151', '2022-01-03 18:09:53', '2022-01-03 18:09:53'),
(671, 2, 'App\\Menu', '78.57.205.151', '2022-01-03 18:10:30', '2022-01-03 18:10:30'),
(672, 1, 'App\\Menu', '77.79.8.186', '2022-01-04 13:05:03', '2022-01-04 13:05:03'),
(673, 2, 'App\\Menu', '77.79.8.186', '2022-01-04 13:05:16', '2022-01-04 13:05:16'),
(674, 7, 'App\\Menu', '31.4.242.187', '2022-01-04 14:23:39', '2022-01-04 14:23:39'),
(675, 2, 'App\\Menu', '83.176.235.21', '2022-01-04 15:46:55', '2022-01-04 15:46:55'),
(676, 7, 'App\\Menu', '83.176.235.21', '2022-01-04 15:48:10', '2022-01-04 15:48:10'),
(677, 5, 'App\\Menu', '83.176.235.21', '2022-01-04 15:48:18', '2022-01-04 15:48:18'),
(682, 2, 'App\\Menu', '86.100.22.182', '2022-01-04 16:11:13', '2022-01-04 16:11:13'),
(686, 1, 'App\\SubMenu', '185.191.171.19', '2022-01-06 05:00:04', '2022-01-06 05:00:04'),
(688, 5, 'App\\SubMenu', '185.191.171.22', '2022-01-06 16:27:15', '2022-01-06 16:27:15'),
(692, 2, 'App\\Menu', '207.46.13.93', '2022-01-06 23:45:29', '2022-01-06 23:45:29'),
(694, 3, 'App\\SubMenu', '185.191.171.34', '2022-01-07 05:45:48', '2022-01-07 05:45:48'),
(698, 2, 'App\\SubMenu', '185.191.171.17', '2022-01-07 23:10:13', '2022-01-07 23:10:13'),
(700, 6, 'App\\SubMenu', '185.191.171.33', '2022-01-08 01:22:23', '2022-01-08 01:22:23'),
(701, 1, 'App\\Menu', '185.191.171.3', '2022-01-08 01:39:43', '2022-01-08 01:39:43'),
(704, 1, 'App\\SubMenu', '185.191.171.35', '2022-01-08 07:33:11', '2022-01-08 07:33:11'),
(705, 2, 'App\\Menu', '185.191.171.33', '2022-01-08 07:45:09', '2022-01-08 07:45:09'),
(706, 1, 'App\\Menu', '90.131.42.2', '2022-01-08 09:05:17', '2022-01-08 09:05:17'),
(708, 5, 'App\\Menu', '90.131.42.2', '2022-01-08 09:07:12', '2022-01-08 09:07:12'),
(709, 5, 'App\\Menu', '185.191.171.45', '2022-01-08 11:15:54', '2022-01-08 11:15:54'),
(711, 5, 'App\\SubMenu', '185.191.171.18', '2022-01-09 02:32:36', '2022-01-09 02:32:36'),
(716, 7, 'App\\SubMenu', '185.191.171.8', '2022-01-09 06:03:13', '2022-01-09 06:03:13'),
(717, 7, 'App\\SubMenu', '207.46.13.93', '2022-01-09 07:48:57', '2022-01-09 07:48:57'),
(720, 1, 'App\\Menu', '185.119.81.103', '2022-01-09 13:14:28', '2022-01-09 13:14:28'),
(721, 2, 'App\\Menu', '185.119.81.103', '2022-01-09 13:14:29', '2022-01-09 13:14:29'),
(722, 7, 'App\\Menu', '185.119.81.103', '2022-01-09 13:14:39', '2022-01-09 13:14:39'),
(723, 5, 'App\\Menu', '185.119.81.103', '2022-01-09 13:14:49', '2022-01-09 13:14:49'),
(724, 5, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:14:55', '2022-01-09 13:14:55'),
(725, 3, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:14:56', '2022-01-09 13:14:56'),
(726, 4, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:15:03', '2022-01-09 13:15:03'),
(729, 6, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:15:16', '2022-01-09 13:15:16'),
(731, 1, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:15:27', '2022-01-09 13:15:27'),
(733, 2, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:15:35', '2022-01-09 13:15:35'),
(735, 7, 'App\\SubMenu', '185.119.81.103', '2022-01-09 13:15:38', '2022-01-09 13:15:38'),
(767, 6, 'App\\SubMenu', '78.60.245.120', '2022-01-09 15:21:10', '2022-01-09 15:21:10'),
(768, 1, 'App\\Menu', '86.157.81.99', '2022-01-09 16:03:44', '2022-01-09 16:03:44'),
(770, 2, 'App\\Menu', '86.157.81.99', '2022-01-09 16:03:56', '2022-01-09 16:03:56'),
(775, 7, 'App\\Menu', '87.125.241.16', '2022-01-09 19:11:55', '2022-01-09 19:11:55'),
(777, 5, 'App\\Menu', '86.157.81.99', '2022-01-09 20:11:33', '2022-01-09 20:11:33'),
(778, 7, 'App\\Menu', '86.157.81.99', '2022-01-09 20:11:48', '2022-01-09 20:11:48'),
(804, 5, 'App\\Menu', '31.4.209.187', '2022-01-09 20:39:36', '2022-01-09 20:39:36'),
(805, 2, 'App\\Menu', '31.4.209.187', '2022-01-09 20:39:42', '2022-01-09 20:39:42'),
(809, 7, 'App\\Menu', '185.191.171.4', '2022-01-09 20:59:43', '2022-01-09 20:59:43'),
(810, 3, 'App\\SubMenu', '31.4.242.50', '2022-01-09 21:47:45', '2022-01-09 21:47:45'),
(811, 5, 'App\\Menu', '31.4.242.50', '2022-01-09 21:47:54', '2022-01-09 21:47:54'),
(812, 4, 'App\\SubMenu', '31.4.242.50', '2022-01-09 21:47:58', '2022-01-09 21:47:58'),
(813, 5, 'App\\SubMenu', '31.4.242.50', '2022-01-09 21:48:03', '2022-01-09 21:48:03'),
(814, 1, 'App\\SubMenu', '31.4.242.50', '2022-01-09 21:48:14', '2022-01-09 21:48:14'),
(816, 2, 'App\\SubMenu', '185.191.171.18', '2022-01-10 02:21:07', '2022-01-10 02:21:07'),
(817, 1, 'App\\Menu', '185.191.171.7', '2022-01-10 04:51:19', '2022-01-10 04:51:19'),
(818, 6, 'App\\SubMenu', '185.191.171.34', '2022-01-10 05:03:37', '2022-01-10 05:03:37'),
(820, 7, 'App\\Menu', '79.116.68.244', '2022-01-10 08:23:53', '2022-01-10 08:23:53'),
(821, 5, 'App\\Menu', '79.116.68.244', '2022-01-10 08:24:05', '2022-01-10 08:24:05'),
(822, 2, 'App\\Menu', '79.116.68.244', '2022-01-10 08:24:07', '2022-01-10 08:24:07'),
(823, 1, 'App\\Menu', '79.116.68.244', '2022-01-10 08:24:18', '2022-01-10 08:24:18'),
(828, 6, 'App\\SubMenu', '77.211.5.25', '2022-01-10 14:53:42', '2022-01-10 14:53:42'),
(829, 6, 'App\\SubMenu', '212.129.82.45', '2022-01-10 14:55:35', '2022-01-10 14:55:35'),
(830, 6, 'App\\SubMenu', '31.13.103.16', '2022-01-10 15:04:41', '2022-01-10 15:04:41'),
(831, 6, 'App\\SubMenu', '212.129.80.34', '2022-01-10 16:44:26', '2022-01-10 16:44:26'),
(832, 1, 'App\\Menu', '212.129.80.34', '2022-01-10 16:45:16', '2022-01-10 16:45:16'),
(833, 2, 'App\\Menu', '212.129.80.34', '2022-01-10 16:45:26', '2022-01-10 16:45:26'),
(835, 2, 'App\\SubMenu', '185.191.171.38', '2022-01-10 18:56:44', '2022-01-10 18:56:44'),
(836, 4, 'App\\SubMenu', '185.191.171.8', '2022-01-10 18:57:30', '2022-01-10 18:57:30'),
(843, 7, 'App\\SubMenu', '185.191.171.34', '2022-01-11 09:26:50', '2022-01-11 09:26:50'),
(844, 1, 'App\\SubMenu', '185.191.171.42', '2022-01-11 11:27:48', '2022-01-11 11:27:48'),
(854, 2, 'App\\SubMenu', '157.55.39.221', '2022-01-12 00:49:44', '2022-01-12 00:49:44'),
(856, 3, 'App\\SubMenu', '185.191.171.16', '2022-01-12 07:25:58', '2022-01-12 07:25:58'),
(862, 4, 'App\\SubMenu', '185.191.171.38', '2022-01-12 22:34:33', '2022-01-12 22:34:33'),
(869, 2, 'App\\Menu', '77.211.5.2', '2022-01-13 22:47:23', '2022-01-13 22:47:23'),
(870, 3, 'App\\SubMenu', '157.55.39.221', '2022-01-14 22:49:45', '2022-01-14 22:49:45'),
(871, 6, 'App\\SubMenu', '185.191.171.18', '2022-01-14 23:42:07', '2022-01-14 23:42:07'),
(872, 4, 'App\\SubMenu', '185.191.171.26', '2022-01-15 04:19:39', '2022-01-15 04:19:39'),
(875, 6, 'App\\SubMenu', '31.4.242.126', '2022-01-15 17:00:09', '2022-01-15 17:00:09'),
(877, 7, 'App\\SubMenu', '31.4.242.76', '2022-01-15 19:38:58', '2022-01-15 19:38:58'),
(879, 7, 'App\\SubMenu', '78.62.63.187', '2022-01-15 22:13:56', '2022-01-15 22:13:56'),
(880, 5, 'App\\Menu', '78.62.63.187', '2022-01-15 22:14:21', '2022-01-15 22:14:21'),
(881, 7, 'App\\Menu', '78.62.63.187', '2022-01-15 22:14:37', '2022-01-15 22:14:37'),
(882, 1, 'App\\Menu', '78.62.63.187', '2022-01-15 22:15:07', '2022-01-15 22:15:07'),
(883, 2, 'App\\Menu', '78.62.63.187', '2022-01-15 22:15:20', '2022-01-15 22:15:20'),
(885, 6, 'App\\SubMenu', '90.131.43.73', '2022-01-16 13:31:44', '2022-01-16 13:31:44'),
(887, 7, 'App\\SubMenu', '31.4.242.23', '2022-01-16 14:33:27', '2022-01-16 14:33:27'),
(889, 1, 'App\\Menu', '192.99.18.122', '2022-01-16 18:09:54', '2022-01-16 18:09:54'),
(890, 7, 'App\\SubMenu', '192.99.18.122', '2022-01-16 18:09:55', '2022-01-16 18:09:55'),
(891, 6, 'App\\SubMenu', '192.99.18.122', '2022-01-16 18:09:56', '2022-01-16 18:09:56'),
(892, 7, 'App\\Menu', '192.99.18.122', '2022-01-16 18:09:57', '2022-01-16 18:09:57'),
(893, 2, 'App\\Menu', '192.99.18.122', '2022-01-16 18:09:59', '2022-01-16 18:09:59'),
(894, 1, 'App\\SubMenu', '192.99.18.122', '2022-01-16 18:09:59', '2022-01-16 18:09:59'),
(895, 2, 'App\\SubMenu', '192.99.18.122', '2022-01-16 18:10:00', '2022-01-16 18:10:00'),
(897, 6, 'App\\SubMenu', '185.191.171.44', '2022-01-17 03:25:08', '2022-01-17 03:25:08'),
(898, 5, 'App\\Menu', '78.56.198.240', '2022-01-17 09:24:09', '2022-01-17 09:24:09'),
(899, 1, 'App\\Menu', '78.56.198.240', '2022-01-17 09:24:16', '2022-01-17 09:24:16'),
(905, 6, 'App\\SubMenu', '77.211.5.24', '2022-01-18 12:38:18', '2022-01-18 12:38:18'),
(906, 6, 'App\\SubMenu', '78.60.250.201', '2022-01-18 12:38:52', '2022-01-18 12:38:52'),
(909, 1, 'App\\Menu', '90.131.44.156', '2022-01-18 20:38:41', '2022-01-18 20:38:41'),
(910, 2, 'App\\Menu', '90.131.44.156', '2022-01-18 20:39:09', '2022-01-18 20:39:09'),
(912, 7, 'App\\SubMenu', '90.131.44.156', '2022-01-18 20:39:47', '2022-01-18 20:39:47'),
(913, 5, 'App\\Menu', '90.131.44.156', '2022-01-18 20:39:59', '2022-01-18 20:39:59'),
(914, 6, 'App\\SubMenu', '90.131.44.156', '2022-01-18 20:40:19', '2022-01-18 20:40:19'),
(915, 5, 'App\\SubMenu', '207.46.13.148', '2022-01-18 23:24:15', '2022-01-18 23:24:15'),
(916, 1, 'App\\SubMenu', '207.46.13.201', '2022-01-19 01:28:12', '2022-01-19 01:28:12'),
(917, 7, 'App\\SubMenu', '31.4.242.130', '2022-01-19 11:26:45', '2022-01-19 11:26:45'),
(921, 7, 'App\\Menu', '82.135.136.38', '2022-01-19 12:17:49', '2022-01-19 12:17:49'),
(922, 2, 'App\\SubMenu', '207.46.13.201', '2022-01-19 18:22:40', '2022-01-19 18:22:40'),
(923, 7, 'App\\SubMenu', '90.131.40.186', '2022-01-19 20:21:56', '2022-01-19 20:21:56'),
(924, 5, 'App\\Menu', '90.131.40.186', '2022-01-19 20:22:19', '2022-01-19 20:22:19'),
(925, 6, 'App\\SubMenu', '90.131.40.186', '2022-01-19 20:22:36', '2022-01-19 20:22:36'),
(927, 7, 'App\\Menu', '207.46.13.129', '2022-01-19 21:11:43', '2022-01-19 21:11:43'),
(929, 4, 'App\\SubMenu', '207.46.13.148', '2022-01-20 08:47:37', '2022-01-20 08:47:37'),
(935, 1, 'App\\Menu', '207.46.13.148', '2022-01-21 02:54:54', '2022-01-21 02:54:54'),
(936, 6, 'App\\SubMenu', '23.100.232.233', '2022-01-21 12:30:19', '2022-01-21 12:30:19'),
(939, 7, 'App\\Menu', '23.100.232.233', '2022-01-21 21:07:42', '2022-01-21 21:07:42'),
(943, 3, 'App\\SubMenu', '207.46.13.148', '2022-01-23 00:08:08', '2022-01-23 00:08:08'),
(945, 6, 'App\\SubMenu', '185.191.171.10', '2022-01-23 02:22:07', '2022-01-23 02:22:07'),
(948, 5, 'App\\SubMenu', '185.191.171.9', '2022-01-23 20:35:10', '2022-01-23 20:35:10'),
(949, 6, 'App\\SubMenu', '157.55.39.222', '2022-01-23 23:08:09', '2022-01-23 23:08:09'),
(950, 5, 'App\\SubMenu', '185.191.171.3', '2022-01-24 05:07:24', '2022-01-24 05:07:24'),
(951, 7, 'App\\SubMenu', '207.46.13.201', '2022-01-24 05:35:11', '2022-01-24 05:35:11'),
(953, 1, 'App\\Menu', '88.119.127.92', '2022-01-24 07:30:39', '2022-01-24 07:30:39'),
(954, 6, 'App\\SubMenu', '31.4.242.103', '2022-01-24 09:47:50', '2022-01-24 09:47:50'),
(956, 7, 'App\\Menu', '31.4.242.96', '2022-01-24 12:04:02', '2022-01-24 12:04:02'),
(962, 2, 'App\\Menu', '185.191.171.9', '2022-01-25 12:39:49', '2022-01-25 12:39:49'),
(966, 5, 'App\\SubMenu', '185.191.171.19', '2022-01-26 00:16:24', '2022-01-26 00:16:24'),
(968, 2, 'App\\Menu', '90.131.44.206', '2022-01-26 06:40:11', '2022-01-26 06:40:11'),
(969, 7, 'App\\Menu', '90.131.44.206', '2022-01-26 06:42:01', '2022-01-26 06:42:01'),
(970, 1, 'App\\Menu', '90.131.44.206', '2022-01-26 06:42:25', '2022-01-26 06:42:25'),
(973, 3, 'App\\SubMenu', '185.191.171.43', '2022-01-26 13:05:29', '2022-01-26 13:05:29'),
(974, 1, 'App\\SubMenu', '185.191.171.43', '2022-01-26 14:11:05', '2022-01-26 14:11:05'),
(975, 7, 'App\\Menu', '78.63.207.183', '2022-01-26 15:18:51', '2022-01-26 15:18:51'),
(977, 5, 'App\\Menu', '78.63.207.183', '2022-01-26 15:20:17', '2022-01-26 15:20:17'),
(979, 2, 'App\\Menu', '78.63.207.183', '2022-01-26 15:21:08', '2022-01-26 15:21:08'),
(985, 2, 'App\\SubMenu', '185.191.171.26', '2022-01-27 08:12:02', '2022-01-27 08:12:02'),
(994, 3, 'App\\SubMenu', '185.191.171.44', '2022-01-28 18:47:44', '2022-01-28 18:47:44'),
(996, 1, 'App\\SubMenu', '185.191.171.38', '2022-01-28 19:22:44', '2022-01-28 19:22:44'),
(997, 2, 'App\\SubMenu', '207.46.13.5', '2022-01-28 19:36:53', '2022-01-28 19:36:53'),
(999, 1, 'App\\SubMenu', '207.46.13.5', '2022-01-28 21:42:36', '2022-01-28 21:42:36'),
(1007, 7, 'App\\Menu', '185.191.171.25', '2022-01-29 07:00:03', '2022-01-29 07:00:03'),
(1009, 2, 'App\\Menu', '207.46.13.5', '2022-01-29 20:28:15', '2022-01-29 20:28:15'),
(1017, 1, 'App\\Menu', '88.118.214.177', '2022-01-30 12:59:42', '2022-01-30 12:59:42'),
(1020, 7, 'App\\SubMenu', '185.191.171.37', '2022-01-30 20:25:54', '2022-01-30 20:25:54'),
(1021, 1, 'App\\SubMenu', '185.191.171.18', '2022-01-30 22:43:10', '2022-01-30 22:43:10'),
(1027, 4, 'App\\SubMenu', '66.249.72.139', '2022-01-31 08:42:27', '2022-01-31 08:42:27'),
(1029, 6, 'App\\SubMenu', '66.249.72.135', '2022-01-31 09:24:11', '2022-01-31 09:24:11'),
(1030, 7, 'App\\Menu', '185.191.171.19', '2022-01-31 11:18:57', '2022-01-31 11:18:57'),
(1033, 7, 'App\\SubMenu', '207.46.13.5', '2022-01-31 13:10:43', '2022-01-31 13:10:43'),
(1035, 5, 'App\\Menu', '31.4.242.22', '2022-01-31 14:08:13', '2022-01-31 14:08:13'),
(1037, 1, 'App\\Menu', '66.249.64.201', '2022-01-31 14:36:41', '2022-01-31 14:36:41'),
(1038, 1, 'App\\Menu', '78.60.131.26', '2022-01-31 14:47:50', '2022-01-31 14:47:50'),
(1040, 2, 'App\\Menu', '86.42.25.233', '2022-01-31 15:15:55', '2022-01-31 15:15:55'),
(1044, 5, 'App\\Menu', '89.19.88.160', '2022-01-31 18:40:48', '2022-01-31 18:40:48'),
(1045, 2, 'App\\Menu', '89.19.88.160', '2022-01-31 18:41:22', '2022-01-31 18:41:22'),
(1046, 7, 'App\\Menu', '89.19.88.160', '2022-01-31 18:43:31', '2022-01-31 18:43:31'),
(1048, 1, 'App\\Menu', '89.19.88.160', '2022-01-31 18:45:10', '2022-01-31 18:45:10'),
(1050, 3, 'App\\SubMenu', '185.191.171.42', '2022-01-31 19:08:41', '2022-01-31 19:08:41'),
(1055, 2, 'App\\Menu', '66.249.64.201', '2022-02-01 07:45:28', '2022-02-01 07:45:28'),
(1056, 6, 'App\\SubMenu', '185.191.171.11', '2022-02-01 07:49:54', '2022-02-01 07:49:54'),
(1058, 2, 'App\\Menu', '88.95.78.119', '2022-02-01 11:22:11', '2022-02-01 11:22:11'),
(1060, 5, 'App\\Menu', '88.95.78.119', '2022-02-01 11:22:26', '2022-02-01 11:22:26'),
(1062, 7, 'App\\Menu', '88.95.78.119', '2022-02-01 11:22:58', '2022-02-01 11:22:58'),
(1063, 1, 'App\\Menu', '88.95.78.119', '2022-02-01 11:23:17', '2022-02-01 11:23:17'),
(1064, 4, 'App\\SubMenu', '185.191.171.13', '2022-02-01 12:05:43', '2022-02-01 12:05:43'),
(1065, 7, 'App\\Menu', '86.42.25.233', '2022-02-01 13:57:33', '2022-02-01 13:57:33'),
(1066, 1, 'App\\Menu', '86.42.25.233', '2022-02-01 14:00:34', '2022-02-01 14:00:34'),
(1067, 5, 'App\\Menu', '86.42.25.233', '2022-02-01 14:02:00', '2022-02-01 14:02:00'),
(1069, 4, 'App\\SubMenu', '77.211.5.40', '2022-02-01 14:11:28', '2022-02-01 14:11:28'),
(1070, 3, 'App\\SubMenu', '77.211.5.40', '2022-02-01 14:11:34', '2022-02-01 14:11:34'),
(1071, 1, 'App\\SubMenu', '77.211.5.40', '2022-02-01 14:11:48', '2022-02-01 14:11:48'),
(1072, 5, 'App\\SubMenu', '77.211.5.40', '2022-02-01 14:11:54', '2022-02-01 14:11:54'),
(1073, 5, 'App\\Menu', '77.211.5.40', '2022-02-01 14:44:55', '2022-02-01 14:44:55'),
(1077, 5, 'App\\Menu', '66.249.64.201', '2022-02-01 18:23:21', '2022-02-01 18:23:21'),
(1081, 5, 'App\\Menu', '77.211.5.38', '2022-02-01 21:10:20', '2022-02-01 21:10:20'),
(1083, 7, 'App\\SubMenu', '185.191.171.42', '2022-02-02 00:24:24', '2022-02-02 00:24:24'),
(1085, 2, 'App\\Menu', '86.30.33.17', '2022-02-02 07:31:58', '2022-02-02 07:31:58'),
(1086, 5, 'App\\Menu', '86.30.33.17', '2022-02-02 07:33:10', '2022-02-02 07:33:10'),
(1088, 7, 'App\\Menu', '86.30.33.17', '2022-02-02 07:34:02', '2022-02-02 07:34:02'),
(1089, 1, 'App\\Menu', '86.30.33.17', '2022-02-02 07:34:15', '2022-02-02 07:34:15'),
(1094, 1, 'App\\Menu', '165.140.216.54', '2022-02-02 20:58:34', '2022-02-02 20:58:34'),
(1095, 7, 'App\\Menu', '165.140.216.54', '2022-02-02 20:58:34', '2022-02-02 20:58:34'),
(1096, 2, 'App\\Menu', '165.140.216.54', '2022-02-02 20:58:36', '2022-02-02 20:58:36'),
(1097, 5, 'App\\Menu', '165.140.216.54', '2022-02-02 20:58:36', '2022-02-02 20:58:36'),
(1099, 3, 'App\\SubMenu', '185.191.171.13', '2022-02-02 23:16:30', '2022-02-02 23:16:30'),
(1100, 4, 'App\\SubMenu', '66.249.66.7', '2022-02-03 02:37:34', '2022-02-03 02:37:34'),
(1102, 3, 'App\\SubMenu', '66.249.66.7', '2022-02-03 03:47:54', '2022-02-03 03:47:54'),
(1103, 2, 'App\\SubMenu', '66.249.66.11', '2022-02-03 03:58:23', '2022-02-03 03:58:23'),
(1104, 6, 'App\\SubMenu', '66.249.66.9', '2022-02-03 04:13:44', '2022-02-03 04:13:44'),
(1107, 7, 'App\\SubMenu', '66.249.66.9', '2022-02-03 04:34:22', '2022-02-03 04:34:22'),
(1110, 7, 'App\\Menu', '66.249.66.9', '2022-02-03 05:11:12', '2022-02-03 05:11:12'),
(1112, 5, 'App\\Menu', '47.60.43.84', '2022-02-03 06:31:51', '2022-02-03 06:31:51'),
(1113, 1, 'App\\Menu', '88.119.146.219', '2022-02-03 13:37:16', '2022-02-03 13:37:16'),
(1117, 6, 'App\\SubMenu', '66.249.66.199', '2022-02-03 15:07:47', '2022-02-03 15:07:47'),
(1122, 5, 'App\\Menu', '66.249.74.9', '2022-02-06 01:49:44', '2022-02-06 01:49:44'),
(1124, 5, 'App\\Menu', '40.77.167.6', '2022-02-06 08:06:38', '2022-02-06 08:06:38'),
(1127, 5, 'App\\Menu', '66.249.79.199', '2022-02-07 14:00:47', '2022-02-07 14:00:47'),
(1128, 7, 'App\\SubMenu', '207.46.13.104', '2022-02-07 16:54:26', '2022-02-07 16:54:26'),
(1129, 6, 'App\\SubMenu', '88.119.156.150', '2022-02-08 06:15:58', '2022-02-08 06:15:58'),
(1132, 1, 'App\\SubMenu', '207.46.13.213', '2022-02-09 03:57:10', '2022-02-09 03:57:10'),
(1134, 1, 'App\\Menu', '185.191.171.34', '2022-02-09 11:04:27', '2022-02-09 11:04:27'),
(1139, 1, 'App\\SubMenu', '185.191.171.40', '2022-02-09 17:25:36', '2022-02-09 17:25:36'),
(1140, 1, 'App\\Menu', '35.202.135.180', '2022-02-10 08:50:43', '2022-02-10 08:50:43'),
(1141, 7, 'App\\Menu', '34.67.106.168', '2022-02-10 08:50:43', '2022-02-10 08:50:43'),
(1142, 7, 'App\\Menu', '35.202.135.180', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1143, 5, 'App\\Menu', '35.193.217.195', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1144, 2, 'App\\Menu', '35.202.135.180', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1145, 2, 'App\\SubMenu', '207.46.13.213', '2022-02-10 12:50:41', '2022-02-10 12:50:41'),
(1150, 7, 'App\\Menu', '94.2.197.55', '2022-02-11 14:24:46', '2022-02-11 14:24:46'),
(1152, 5, 'App\\Menu', '94.2.197.55', '2022-02-11 14:25:19', '2022-02-11 14:25:19');
INSERT INTO `most_vieweds` (`id`, `viewable_id`, `viewable_type`, `ip`, `created_at`, `updated_at`) VALUES
(1153, 2, 'App\\Menu', '94.2.197.55', '2022-02-11 14:25:25', '2022-02-11 14:25:25'),
(1154, 1, 'App\\Menu', '94.2.197.55', '2022-02-11 14:25:31', '2022-02-11 14:25:31'),
(1155, 5, 'App\\Menu', '188.69.194.55', '2022-02-11 14:30:35', '2022-02-11 14:30:35'),
(1157, 2, 'App\\Menu', '78.57.173.133', '2022-02-11 15:50:20', '2022-02-11 15:50:20'),
(1158, 5, 'App\\Menu', '78.57.173.133', '2022-02-11 15:52:08', '2022-02-11 15:52:08'),
(1159, 7, 'App\\Menu', '78.57.173.133', '2022-02-11 15:52:31', '2022-02-11 15:52:31'),
(1160, 1, 'App\\Menu', '78.57.173.133', '2022-02-11 15:52:53', '2022-02-11 15:52:53'),
(1162, 1, 'App\\Menu', '193.217.6.142', '2022-02-11 19:57:50', '2022-02-11 19:57:50'),
(1163, 5, 'App\\SubMenu', '207.46.13.215', '2022-02-11 21:14:23', '2022-02-11 21:14:23'),
(1164, 5, 'App\\Menu', '185.191.171.39', '2022-02-12 00:37:40', '2022-02-12 00:37:40'),
(1167, 2, 'App\\Menu', '86.38.75.41', '2022-02-12 06:23:08', '2022-02-12 06:23:08'),
(1168, 5, 'App\\Menu', '86.38.75.41', '2022-02-12 06:24:30', '2022-02-12 06:24:30'),
(1169, 1, 'App\\Menu', '86.38.75.41', '2022-02-12 06:24:45', '2022-02-12 06:24:45'),
(1170, 7, 'App\\Menu', '78.63.247.132', '2022-02-12 09:53:42', '2022-02-12 09:53:42'),
(1171, 5, 'App\\Menu', '78.63.247.132', '2022-02-12 09:53:59', '2022-02-12 09:53:59'),
(1172, 1, 'App\\Menu', '78.63.247.132', '2022-02-12 09:54:07', '2022-02-12 09:54:07'),
(1179, 4, 'App\\SubMenu', '207.46.13.215', '2022-02-13 05:20:27', '2022-02-13 05:20:27'),
(1180, 1, 'App\\Menu', '192.99.18.136', '2022-02-13 09:05:13', '2022-02-13 09:05:13'),
(1181, 7, 'App\\SubMenu', '192.99.18.136', '2022-02-13 09:05:14', '2022-02-13 09:05:14'),
(1182, 6, 'App\\SubMenu', '192.99.18.136', '2022-02-13 09:05:20', '2022-02-13 09:05:20'),
(1183, 7, 'App\\Menu', '192.99.18.136', '2022-02-13 09:05:21', '2022-02-13 09:05:21'),
(1184, 2, 'App\\Menu', '192.99.18.136', '2022-02-13 09:05:49', '2022-02-13 09:05:49'),
(1185, 1, 'App\\SubMenu', '192.99.18.136', '2022-02-13 09:05:49', '2022-02-13 09:05:49'),
(1186, 2, 'App\\SubMenu', '192.99.18.136', '2022-02-13 09:05:50', '2022-02-13 09:05:50'),
(1187, 3, 'App\\SubMenu', '192.99.18.136', '2022-02-13 09:05:51', '2022-02-13 09:05:51'),
(1193, 5, 'App\\Menu', '185.191.171.3', '2022-02-14 04:14:20', '2022-02-14 04:14:20'),
(1194, 5, 'App\\Menu', '78.58.44.125', '2022-02-14 13:39:36', '2022-02-14 13:39:36'),
(1195, 7, 'App\\Menu', '78.58.44.125', '2022-02-14 13:39:48', '2022-02-14 13:39:48'),
(1196, 1, 'App\\Menu', '78.58.44.125', '2022-02-14 13:40:10', '2022-02-14 13:40:10'),
(1198, 7, 'App\\SubMenu', '207.46.13.39', '2022-02-15 20:18:52', '2022-02-15 20:18:52'),
(1200, 1, 'App\\Menu', '84.15.183.84', '2022-02-15 20:57:44', '2022-02-15 20:57:44'),
(1204, 7, 'App\\SubMenu', '185.191.171.2', '2022-02-16 09:08:10', '2022-02-16 09:08:10'),
(1207, 1, 'App\\Menu', '3.142.194.98', '2022-02-16 12:04:24', '2022-02-16 12:04:24'),
(1208, 2, 'App\\Menu', '3.142.194.98', '2022-02-16 12:04:24', '2022-02-16 12:04:24'),
(1209, 1, 'App\\SubMenu', '3.142.194.98', '2022-02-16 12:04:25', '2022-02-16 12:04:25'),
(1210, 2, 'App\\SubMenu', '3.142.194.98', '2022-02-16 12:04:25', '2022-02-16 12:04:25'),
(1211, 3, 'App\\SubMenu', '3.142.194.98', '2022-02-16 12:04:26', '2022-02-16 12:04:26'),
(1212, 4, 'App\\SubMenu', '3.142.194.98', '2022-02-16 12:04:26', '2022-02-16 12:04:26'),
(1214, 2, 'App\\SubMenu', '185.191.171.15', '2022-02-16 12:55:03', '2022-02-16 12:55:03'),
(1215, 7, 'App\\Menu', '168.119.91.226', '2022-02-16 13:50:42', '2022-02-16 13:50:42'),
(1216, 1, 'App\\SubMenu', '207.46.13.39', '2022-02-16 14:46:36', '2022-02-16 14:46:36'),
(1218, 1, 'App\\Menu', '85.206.120.120', '2022-02-16 16:04:18', '2022-02-16 16:04:18'),
(1219, 2, 'App\\Menu', '85.206.120.120', '2022-02-16 16:04:30', '2022-02-16 16:04:30'),
(1220, 7, 'App\\Menu', '85.206.120.120', '2022-02-16 16:05:04', '2022-02-16 16:05:04'),
(1222, 2, 'App\\Menu', '23.226.31.35', '2022-02-17 03:59:31', '2022-02-17 03:59:31'),
(1223, 7, 'App\\Menu', '23.226.31.35', '2022-02-17 03:59:32', '2022-02-17 03:59:32'),
(1224, 1, 'App\\Menu', '23.226.31.35', '2022-02-17 03:59:32', '2022-02-17 03:59:32'),
(1225, 5, 'App\\Menu', '23.226.31.35', '2022-02-17 03:59:36', '2022-02-17 03:59:36'),
(1226, 7, 'App\\Menu', '78.58.65.91', '2022-02-17 16:11:07', '2022-02-17 16:11:07'),
(1228, 2, 'App\\Menu', '78.58.65.91', '2022-02-17 16:12:21', '2022-02-17 16:12:21'),
(1230, 1, 'App\\Menu', '78.58.65.91', '2022-02-17 16:13:36', '2022-02-17 16:13:36'),
(1231, 5, 'App\\Menu', '78.58.65.91', '2022-02-17 16:13:40', '2022-02-17 16:13:40'),
(1235, 6, 'App\\SubMenu', '207.46.13.36', '2022-02-17 21:13:03', '2022-02-17 21:13:03'),
(1237, 1, 'App\\Menu', '78.62.236.162', '2022-02-19 07:14:15', '2022-02-19 07:14:15'),
(1238, 1, 'App\\Menu', '78.62.236.162', '2022-02-19 07:14:19', '2022-02-19 07:14:19'),
(1241, 7, 'App\\Menu', '157.55.39.201', '2022-02-19 14:46:47', '2022-02-19 14:46:47'),
(1244, 7, 'App\\Menu', '86.38.153.140', '2022-02-20 11:57:22', '2022-02-20 11:57:22'),
(1248, 1, 'App\\Menu', '54.153.92.244', '2022-02-22 14:06:03', '2022-02-22 14:06:03'),
(1249, 2, 'App\\Menu', '54.153.92.244', '2022-02-22 14:06:05', '2022-02-22 14:06:05'),
(1250, 1, 'App\\SubMenu', '54.153.92.244', '2022-02-22 14:06:07', '2022-02-22 14:06:07'),
(1251, 2, 'App\\SubMenu', '54.153.92.244', '2022-02-22 14:06:08', '2022-02-22 14:06:08'),
(1252, 3, 'App\\SubMenu', '54.153.92.244', '2022-02-22 14:06:10', '2022-02-22 14:06:10'),
(1253, 4, 'App\\SubMenu', '54.153.92.244', '2022-02-22 14:06:11', '2022-02-22 14:06:11'),
(1254, 5, 'App\\SubMenu', '54.153.92.244', '2022-02-22 14:06:13', '2022-02-22 14:06:13'),
(1255, 2, 'App\\Menu', '84.15.191.68', '2022-02-22 15:01:22', '2022-02-22 15:01:22'),
(1256, 5, 'App\\Menu', '84.15.191.68', '2022-02-22 15:01:42', '2022-02-22 15:01:42'),
(1258, 5, 'App\\SubMenu', '185.191.171.4', '2022-02-23 12:16:55', '2022-02-23 12:16:55'),
(1259, 2, 'App\\Menu', '207.46.13.39', '2022-02-23 14:42:26', '2022-02-23 14:42:26'),
(1260, 5, 'App\\SubMenu', '207.46.13.39', '2022-02-23 15:47:17', '2022-02-23 15:47:17'),
(1262, 5, 'App\\Menu', '35.202.14.21', '2022-02-24 02:39:59', '2022-02-24 02:39:59'),
(1263, 7, 'App\\Menu', '34.136.130.198', '2022-02-24 02:39:59', '2022-02-24 02:39:59'),
(1264, 1, 'App\\Menu', '34.136.130.198', '2022-02-24 02:40:01', '2022-02-24 02:40:01'),
(1265, 2, 'App\\Menu', '34.68.101.21', '2022-02-24 02:40:01', '2022-02-24 02:40:01'),
(1266, 6, 'App\\SubMenu', '185.191.171.37', '2022-02-24 14:05:58', '2022-02-24 14:05:58'),
(1268, 2, 'App\\Menu', '188.69.194.104', '2022-02-24 18:27:37', '2022-02-24 18:27:37'),
(1269, 1, 'App\\Menu', '188.69.194.104', '2022-02-24 18:29:06', '2022-02-24 18:29:06'),
(1270, 5, 'App\\Menu', '188.69.194.104', '2022-02-24 18:30:15', '2022-02-24 18:30:15'),
(1271, 7, 'App\\Menu', '188.69.194.104', '2022-02-24 18:30:30', '2022-02-24 18:30:30'),
(1272, 2, 'App\\Menu', '185.191.171.24', '2022-02-24 20:28:47', '2022-02-24 20:28:47'),
(1273, 2, 'App\\Menu', '51.174.94.185', '2022-02-24 20:43:16', '2022-02-24 20:43:16'),
(1280, 1, 'App\\Menu', '51.174.94.185', '2022-02-24 20:47:16', '2022-02-24 20:47:16'),
(1281, 5, 'App\\Menu', '51.174.94.185', '2022-02-24 20:47:33', '2022-02-24 20:47:33'),
(1283, 7, 'App\\Menu', '51.174.94.185', '2022-02-24 20:48:18', '2022-02-24 20:48:18'),
(1285, 1, 'App\\Menu', '78.58.220.62', '2022-02-24 21:29:01', '2022-02-24 21:29:01'),
(1287, 7, 'App\\Menu', '78.57.55.28', '2022-02-24 23:09:00', '2022-02-24 23:09:00'),
(1289, 5, 'App\\Menu', '77.211.5.208', '2022-02-25 07:00:19', '2022-02-25 07:00:19'),
(1290, 2, 'App\\Menu', '77.211.5.208', '2022-02-25 07:00:24', '2022-02-25 07:00:24'),
(1292, 4, 'App\\SubMenu', '77.211.5.208', '2022-02-25 07:01:14', '2022-02-25 07:01:14'),
(1294, 1, 'App\\SubMenu', '77.211.5.208', '2022-02-25 07:01:39', '2022-02-25 07:01:39'),
(1296, 3, 'App\\SubMenu', '77.211.5.208', '2022-02-25 07:02:07', '2022-02-25 07:02:07'),
(1299, 7, 'App\\Menu', '31.18.251.139', '2022-02-25 14:42:18', '2022-02-25 14:42:18'),
(1300, 5, 'App\\SubMenu', '185.191.171.36', '2022-02-25 16:29:13', '2022-02-25 16:29:13'),
(1303, 2, 'App\\Menu', '31.13.103.12', '2022-02-26 11:20:07', '2022-02-26 11:20:07'),
(1304, 2, 'App\\Menu', '31.13.103.7', '2022-02-26 11:20:08', '2022-02-26 11:20:08'),
(1305, 7, 'App\\Menu', '122.161.77.211', '2022-02-26 11:25:57', '2022-02-26 11:25:57'),
(1306, 5, 'App\\Menu', '122.161.77.211', '2022-02-26 11:26:48', '2022-02-26 11:26:48'),
(1307, 2, 'App\\Menu', '122.161.77.211', '2022-02-26 11:27:04', '2022-02-26 11:27:04'),
(1313, 2, 'App\\Menu', '78.61.46.5', '2022-02-27 16:26:31', '2022-02-27 16:26:31'),
(1321, 2, 'App\\SubMenu', '185.191.171.44', '2022-02-28 19:48:16', '2022-02-28 19:48:16'),
(1322, 7, 'App\\Menu', '84.240.57.168', '2022-02-28 19:48:34', '2022-02-28 19:48:34'),
(1324, 6, 'App\\SubMenu', '185.191.171.2', '2022-02-28 23:10:00', '2022-02-28 23:10:00'),
(1326, 4, 'App\\SubMenu', '185.191.171.42', '2022-03-01 14:55:53', '2022-03-01 14:55:53'),
(1327, 1, 'App\\Menu', '78.56.191.204', '2022-03-01 16:15:46', '2022-03-01 16:15:46'),
(1329, 5, 'App\\SubMenu', '185.191.171.7', '2022-03-01 16:33:00', '2022-03-01 16:33:00'),
(1331, 3, 'App\\SubMenu', '185.191.171.39', '2022-03-02 04:52:16', '2022-03-02 04:52:16'),
(1332, 1, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:12', '2022-03-02 05:05:12'),
(1333, 1, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:17', '2022-03-02 05:05:17'),
(1334, 1, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:17', '2022-03-02 05:05:17'),
(1335, 2, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:38', '2022-03-02 05:05:38'),
(1336, 2, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:42', '2022-03-02 05:05:42'),
(1337, 2, 'App\\Menu', '78.63.91.158', '2022-03-02 05:05:43', '2022-03-02 05:05:43'),
(1339, 2, 'App\\Menu', '104.198.39.203', '2022-03-02 07:40:43', '2022-03-02 07:40:43'),
(1340, 7, 'App\\Menu', '34.123.112.222', '2022-03-02 07:40:43', '2022-03-02 07:40:43'),
(1341, 7, 'App\\Menu', '35.222.76.99', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1342, 1, 'App\\Menu', '34.69.143.137', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1343, 5, 'App\\Menu', '34.67.56.167', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1347, 2, 'App\\SubMenu', '185.191.171.21', '2022-03-02 23:31:23', '2022-03-02 23:31:23'),
(1348, 5, 'App\\Menu', '40.77.167.32', '2022-03-03 03:28:17', '2022-03-03 03:28:17'),
(1350, 7, 'App\\SubMenu', '185.191.171.20', '2022-03-03 13:04:25', '2022-03-03 13:04:25'),
(1351, 3, 'App\\SubMenu', '40.77.167.32', '2022-03-03 16:28:35', '2022-03-03 16:28:35'),
(1354, 2, 'App\\SubMenu', '207.46.13.39', '2022-03-04 06:35:25', '2022-03-04 06:35:25'),
(1355, 7, 'App\\SubMenu', '185.191.171.33', '2022-03-04 06:53:01', '2022-03-04 06:53:01'),
(1361, 7, 'App\\Menu', '185.191.171.22', '2022-03-04 21:30:34', '2022-03-04 21:30:34'),
(1365, 7, 'App\\SubMenu', '157.55.39.176', '2022-03-05 14:48:14', '2022-03-05 14:48:14'),
(1368, 7, 'App\\SubMenu', '185.191.171.23', '2022-03-06 10:33:22', '2022-03-06 10:33:22'),
(1370, 1, 'App\\SubMenu', '185.191.171.1', '2022-03-06 13:03:38', '2022-03-06 13:03:38'),
(1373, 7, 'App\\Menu', '185.191.171.13', '2022-03-07 00:55:47', '2022-03-07 00:55:47'),
(1376, 1, 'App\\Menu', '118.179.96.81', '2022-03-07 10:34:50', '2022-03-07 10:34:50'),
(1377, 4, 'App\\SubMenu', '185.191.171.19', '2022-03-07 23:12:00', '2022-03-07 23:12:00'),
(1379, 5, 'App\\SubMenu', '157.55.39.194', '2022-03-08 03:08:52', '2022-03-08 03:08:52'),
(1383, 4, 'App\\SubMenu', '157.55.39.194', '2022-03-09 22:20:40', '2022-03-09 22:20:40'),
(1385, 5, 'App\\SubMenu', '77.211.5.208', '2022-03-10 10:33:03', '2022-03-10 10:33:03'),
(1387, 1, 'App\\Menu', '192.99.18.108', '2022-03-10 11:25:04', '2022-03-10 11:25:04'),
(1388, 7, 'App\\SubMenu', '192.99.18.108', '2022-03-10 11:25:07', '2022-03-10 11:25:07'),
(1389, 6, 'App\\SubMenu', '192.99.18.108', '2022-03-10 11:25:11', '2022-03-10 11:25:11'),
(1390, 7, 'App\\Menu', '192.99.18.108', '2022-03-10 11:25:12', '2022-03-10 11:25:12'),
(1391, 2, 'App\\Menu', '192.99.18.108', '2022-03-10 11:25:34', '2022-03-10 11:25:34'),
(1392, 1, 'App\\SubMenu', '192.99.18.108', '2022-03-10 11:25:35', '2022-03-10 11:25:35'),
(1393, 2, 'App\\SubMenu', '192.99.18.108', '2022-03-10 11:25:35', '2022-03-10 11:25:35'),
(1399, 1, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:27:57', '2022-03-12 04:27:57'),
(1400, 2, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:27:59', '2022-03-12 04:27:59'),
(1401, 3, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:28:01', '2022-03-12 04:28:01'),
(1402, 4, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:28:12', '2022-03-12 04:28:12'),
(1403, 5, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:28:15', '2022-03-12 04:28:15'),
(1404, 6, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:28:18', '2022-03-12 04:28:18'),
(1405, 7, 'App\\SubMenu', '20.116.9.202', '2022-03-12 04:28:20', '2022-03-12 04:28:20'),
(1406, 2, 'App\\Menu', '20.116.9.202', '2022-03-12 04:28:24', '2022-03-12 04:28:24'),
(1407, 5, 'App\\Menu', '20.116.9.202', '2022-03-12 04:28:28', '2022-03-12 04:28:28'),
(1408, 1, 'App\\Menu', '20.116.9.202', '2022-03-12 04:28:33', '2022-03-12 04:28:33'),
(1409, 7, 'App\\Menu', '20.116.9.202', '2022-03-12 04:28:42', '2022-03-12 04:28:42'),
(1420, 2, 'App\\Menu', '78.60.14.164', '2022-03-13 18:00:45', '2022-03-13 18:00:45'),
(1421, 1, 'App\\Menu', '78.60.14.164', '2022-03-13 18:01:16', '2022-03-13 18:01:16'),
(1423, 1, 'App\\Menu', '185.191.171.4', '2022-03-13 20:02:00', '2022-03-13 20:02:00'),
(1426, 1, 'App\\Menu', '90.131.46.209', '2022-03-14 11:10:51', '2022-03-14 11:10:51'),
(1429, 2, 'App\\Menu', '89.190.112.10', '2022-03-14 17:21:59', '2022-03-14 17:21:59'),
(1432, 1, 'App\\Menu', '89.190.112.10', '2022-03-14 17:24:27', '2022-03-14 17:24:27'),
(1435, 1, 'App\\Menu', '185.191.171.33', '2022-03-16 00:08:24', '2022-03-16 00:08:24'),
(1437, 1, 'App\\SubMenu', '185.191.171.25', '2022-03-16 05:57:25', '2022-03-16 05:57:25'),
(1439, 1, 'App\\Menu', '45.41.12.64', '2022-03-17 03:08:09', '2022-03-17 03:08:09'),
(1440, 5, 'App\\Menu', '45.41.12.64', '2022-03-17 03:08:11', '2022-03-17 03:08:11'),
(1441, 7, 'App\\Menu', '188.69.192.211', '2022-03-17 10:28:17', '2022-03-17 10:28:17'),
(1443, 5, 'App\\Menu', '188.69.192.211', '2022-03-17 10:29:12', '2022-03-17 10:29:12'),
(1444, 2, 'App\\Menu', '84.15.186.15', '2022-03-17 13:48:09', '2022-03-17 13:48:09'),
(1446, 5, 'App\\Menu', '185.191.171.21', '2022-03-18 13:58:40', '2022-03-18 13:58:40'),
(1448, 2, 'App\\Menu', '207.46.13.78', '2022-03-19 17:15:02', '2022-03-19 17:15:02'),
(1449, 1, 'App\\Menu', '31.4.210.67', '2022-03-20 10:05:27', '2022-03-20 10:05:27'),
(1451, 2, 'App\\Menu', '31.4.210.67', '2022-03-20 10:05:49', '2022-03-20 10:05:49'),
(1453, 1, 'App\\Menu', '85.206.8.4', '2022-03-21 06:13:30', '2022-03-21 06:13:30'),
(1454, 2, 'App\\Menu', '85.206.8.4', '2022-03-21 06:13:37', '2022-03-21 06:13:37'),
(1455, 1, 'App\\SubMenu', '85.206.8.4', '2022-03-21 06:13:38', '2022-03-21 06:13:38'),
(1457, 1, 'App\\Menu', '103.136.96.254', '2022-03-21 11:19:24', '2022-03-21 11:19:24'),
(1458, 1, 'App\\Menu', '114.31.1.69', '2022-03-21 11:19:26', '2022-03-21 11:19:26'),
(1459, 6, 'App\\SubMenu', '103.136.96.254', '2022-03-21 11:19:45', '2022-03-21 11:19:45'),
(1462, 1, 'App\\Menu', '77.211.5.208', '2022-03-21 12:31:59', '2022-03-21 12:31:59'),
(1463, 7, 'App\\Menu', '77.211.5.208', '2022-03-21 12:32:01', '2022-03-21 12:32:01'),
(1465, 6, 'App\\SubMenu', '85.206.22.56', '2022-03-22 07:32:06', '2022-03-22 07:32:06'),
(1466, 2, 'App\\Menu', '103.136.96.254', '2022-03-22 08:43:29', '2022-03-22 08:43:29'),
(1467, 5, 'App\\Menu', '103.136.96.254', '2022-03-22 08:43:31', '2022-03-22 08:43:31'),
(1468, 7, 'App\\Menu', '103.136.96.254', '2022-03-22 08:43:33', '2022-03-22 08:43:33'),
(1470, 5, 'App\\Menu', '85.206.8.4', '2022-03-22 09:34:11', '2022-03-22 09:34:11'),
(1471, 7, 'App\\Menu', '85.206.8.4', '2022-03-22 09:34:12', '2022-03-22 09:34:12'),
(1473, 7, 'App\\SubMenu', '85.206.8.4', '2022-03-22 09:34:50', '2022-03-22 09:34:50'),
(1474, 6, 'App\\SubMenu', '85.206.8.4', '2022-03-22 09:34:54', '2022-03-22 09:34:54'),
(1475, 1, 'App\\Menu', '88.119.194.189', '2022-03-22 09:48:26', '2022-03-22 09:48:26'),
(1476, 2, 'App\\Menu', '88.119.194.189', '2022-03-22 10:49:15', '2022-03-22 10:49:15'),
(1477, 5, 'App\\Menu', '88.119.194.189', '2022-03-22 10:49:17', '2022-03-22 10:49:17'),
(1478, 7, 'App\\Menu', '88.119.194.189', '2022-03-22 10:49:18', '2022-03-22 10:49:18'),
(1480, 6, 'App\\SubMenu', '88.119.194.189', '2022-03-22 10:53:32', '2022-03-22 10:53:32'),
(1481, 8, 'App\\Menu', '103.136.96.254', '2022-03-23 07:19:12', '2022-03-23 07:19:12'),
(1483, 9, 'App\\Menu', '103.136.96.254', '2022-03-23 08:54:30', '2022-03-23 08:54:30'),
(1485, 10, 'App\\Menu', '85.206.8.4', '2022-03-23 09:36:19', '2022-03-23 09:36:19'),
(1486, 8, 'App\\SubMenu', '85.206.8.4', '2022-03-23 09:36:22', '2022-03-23 09:36:22'),
(1487, 9, 'App\\Menu', '77.211.5.208', '2022-03-23 09:46:43', '2022-03-23 09:46:43'),
(1490, 10, 'App\\Menu', '77.211.5.208', '2022-03-23 09:47:14', '2022-03-23 09:47:14'),
(1492, 9, 'App\\Menu', '85.206.8.4', '2022-03-23 09:47:55', '2022-03-23 09:47:55'),
(1494, 5, 'App\\Menu', '42.0.7.245', '2022-03-23 12:13:38', '2022-03-23 12:13:38'),
(1495, 1, 'App\\Menu', '103.21.42.196', '2022-03-23 14:10:05', '2022-03-23 14:10:05'),
(1496, 10, 'App\\Menu', '103.147.163.206', '2022-03-23 16:04:47', '2022-03-23 16:04:47'),
(1497, 10, 'App\\Menu', '103.15.42.203', '2022-03-23 16:05:25', '2022-03-23 16:05:25'),
(1498, 6, 'App\\SubMenu', '103.147.163.206', '2022-03-23 16:07:14', '2022-03-23 16:07:14'),
(1499, 8, 'App\\SubMenu', '103.147.163.206', '2022-03-23 16:07:24', '2022-03-23 16:07:24'),
(1500, 7, 'App\\SubMenu', '103.147.163.206', '2022-03-23 16:08:51', '2022-03-23 16:08:51'),
(1501, 10, 'App\\Menu', '77.211.5.134', '2022-03-24 03:51:15', '2022-03-24 03:51:15'),
(1502, 8, 'App\\SubMenu', '77.211.5.134', '2022-03-24 03:52:41', '2022-03-24 03:52:41'),
(1503, 10, 'App\\Menu', '103.136.96.254', '2022-03-24 04:43:28', '2022-03-24 04:43:28'),
(1504, 8, 'App\\SubMenu', '103.136.96.254', '2022-03-24 04:43:39', '2022-03-24 04:43:39'),
(1505, 8, 'App\\SubMenu', '43.250.82.230', '2022-03-24 04:43:46', '2022-03-24 04:43:46'),
(1506, 9, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:08', '2022-03-25 05:36:08'),
(1507, 1, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:09', '2022-03-25 05:36:09'),
(1508, 10, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:14', '2022-03-25 05:36:14'),
(1509, 7, 'App\\SubMenu', '85.206.22.56', '2022-03-25 05:36:15', '2022-03-25 05:36:15'),
(1510, 2, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:18', '2022-03-25 05:36:18'),
(1511, 5, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:19', '2022-03-25 05:36:19'),
(1512, 7, 'App\\Menu', '85.206.22.56', '2022-03-25 05:36:19', '2022-03-25 05:36:19'),
(1515, 10, 'App\\Menu', '88.119.194.189', '2022-03-25 07:31:36', '2022-03-25 07:31:36'),
(1516, 10, 'App\\Menu', '193.219.73.165', '2022-03-25 07:31:37', '2022-03-25 07:31:37'),
(1518, 10, 'App\\Menu', '172.58.85.242', '2022-03-25 07:32:19', '2022-03-25 07:32:19'),
(1519, 11, 'App\\Menu', '88.119.194.189', '2022-03-25 07:48:19', '2022-03-25 07:48:19'),
(1521, 8, 'App\\SubMenu', '88.119.194.189', '2022-03-25 07:48:52', '2022-03-25 07:48:52'),
(1522, 11, 'App\\Menu', '77.211.5.208', '2022-03-25 09:03:52', '2022-03-25 09:03:52'),
(1527, 9, 'App\\SubMenu', '88.119.194.189', '2022-03-25 10:31:16', '2022-03-25 10:31:16'),
(1528, 57, 'App\\Product', '88.119.194.189', '2022-03-25 10:31:24', '2022-03-25 10:31:24'),
(1529, 12, 'App\\Menu', '88.119.194.189', '2022-03-25 11:27:51', '2022-03-25 11:27:51'),
(1530, 13, 'App\\Menu', '88.119.194.189', '2022-03-25 11:27:52', '2022-03-25 11:27:52'),
(1531, 16, 'App\\Menu', '103.136.96.254', '2022-03-25 13:22:16', '2022-03-25 13:22:16'),
(1532, 17, 'App\\Menu', '103.136.96.254', '2022-03-25 13:22:19', '2022-03-25 13:22:19'),
(1533, 13, 'App\\Menu', '103.136.96.254', '2022-03-25 13:22:21', '2022-03-25 13:22:21'),
(1534, 12, 'App\\Menu', '103.136.96.254', '2022-03-25 13:22:23', '2022-03-25 13:22:23'),
(1535, 11, 'App\\Menu', '103.136.96.254', '2022-03-25 13:22:25', '2022-03-25 13:22:25'),
(1536, 57, 'App\\Product', '103.136.96.254', '2022-03-25 13:22:27', '2022-03-25 13:22:27'),
(1537, 15, 'App\\Menu', '103.136.96.254', '2022-03-25 13:29:46', '2022-03-25 13:29:46'),
(1538, 14, 'App\\Menu', '103.136.96.254', '2022-03-25 13:29:47', '2022-03-25 13:29:47'),
(1539, 11, 'App\\Menu', '86.38.75.149', '2022-03-26 04:30:27', '2022-03-26 04:30:27'),
(1540, 57, 'App\\Product', '86.38.75.149', '2022-03-26 04:30:46', '2022-03-26 04:30:46'),
(1541, 57, 'App\\Product', '86.38.75.149', '2022-03-26 04:30:46', '2022-03-26 04:30:46'),
(1542, 57, 'App\\Product', '86.38.75.149', '2022-03-26 04:30:47', '2022-03-26 04:30:47'),
(1543, 17, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:14', '2022-03-27 04:02:14'),
(1544, 12, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:28', '2022-03-27 04:02:28'),
(1545, 13, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:31', '2022-03-27 04:02:31'),
(1546, 14, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:33', '2022-03-27 04:02:33'),
(1547, 15, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:35', '2022-03-27 04:02:35'),
(1548, 16, 'App\\Menu', '86.38.75.149', '2022-03-27 04:02:37', '2022-03-27 04:02:37'),
(1549, 11, 'App\\Menu', '195.12.177.10', '2022-03-27 04:02:43', '2022-03-27 04:02:43'),
(1550, 12, 'App\\Menu', '85.206.8.4', '2022-03-28 06:09:17', '2022-03-28 06:09:17'),
(1551, 11, 'App\\Menu', '85.206.8.4', '2022-03-28 06:16:01', '2022-03-28 06:16:01'),
(1552, 57, 'App\\Product', '85.206.8.4', '2022-03-28 06:16:37', '2022-03-28 06:16:37'),
(1553, 9, 'App\\SubMenu', '85.206.8.4', '2022-03-28 06:18:26', '2022-03-28 06:18:26'),
(1554, 11, 'App\\Menu', '77.211.5.29', '2022-03-28 06:35:34', '2022-03-28 06:35:34'),
(1555, 57, 'App\\Product', '77.211.5.29', '2022-03-28 06:35:41', '2022-03-28 06:35:41'),
(1556, 17, 'App\\Menu', '77.211.5.29', '2022-03-28 06:37:45', '2022-03-28 06:37:45'),
(1557, 16, 'App\\Menu', '77.211.5.29', '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(1558, 15, 'App\\Menu', '77.211.5.29', '2022-03-28 06:37:52', '2022-03-28 06:37:52'),
(1559, 58, 'App\\Product', '85.206.8.4', '2022-03-28 06:38:07', '2022-03-28 06:38:07'),
(1560, 58, 'App\\Product', '77.211.5.29', '2022-03-28 06:38:08', '2022-03-28 06:38:08'),
(1561, 9, 'App\\SubMenu', '77.211.5.29', '2022-03-28 06:40:56', '2022-03-28 06:40:56'),
(1562, 13, 'App\\Menu', '85.206.8.4', '2022-03-28 07:06:11', '2022-03-28 07:06:11'),
(1563, 14, 'App\\Menu', '85.206.8.4', '2022-03-28 07:06:14', '2022-03-28 07:06:14'),
(1564, 15, 'App\\Menu', '85.206.8.4', '2022-03-28 07:06:15', '2022-03-28 07:06:15'),
(1565, 16, 'App\\Menu', '85.206.8.4', '2022-03-28 07:06:17', '2022-03-28 07:06:17'),
(1566, 9, 'App\\SubMenu', '103.136.96.254', '2022-03-28 07:31:01', '2022-03-28 07:31:01'),
(1567, 58, 'App\\Product', '103.136.96.254', '2022-03-28 07:35:03', '2022-03-28 07:35:03'),
(1568, 18, 'App\\Menu', '85.206.8.4', '2022-03-28 07:54:02', '2022-03-28 07:54:02'),
(1569, 17, 'App\\Menu', '85.206.8.4', '2022-03-28 07:54:10', '2022-03-28 07:54:10'),
(1570, 10, 'App\\SubMenu', '88.119.194.189', '2022-03-28 09:09:46', '2022-03-28 09:09:46'),
(1571, 59, 'App\\Product', '88.119.194.189', '2022-03-28 09:09:48', '2022-03-28 09:09:48'),
(1572, 17, 'App\\Menu', '88.119.194.189', '2022-03-28 09:09:56', '2022-03-28 09:09:56'),
(1573, 12, 'App\\Menu', '90.131.44.125', '2022-03-28 12:17:29', '2022-03-28 12:17:29'),
(1574, 11, 'App\\Menu', '78.61.112.85', '2022-03-28 14:12:04', '2022-03-28 14:12:04'),
(1575, 57, 'App\\Product', '78.61.112.85', '2022-03-28 14:12:09', '2022-03-28 14:12:09'),
(1576, 18, 'App\\Menu', '86.38.75.149', '2022-03-29 01:09:29', '2022-03-29 01:09:29'),
(1577, 59, 'App\\Product', '86.38.75.149', '2022-03-29 01:09:36', '2022-03-29 01:09:36'),
(1578, 59, 'App\\Product', '85.206.8.4', '2022-03-29 05:57:02', '2022-03-29 05:57:02'),
(1579, 14, 'App\\Menu', '88.119.194.189', '2022-03-29 08:48:49', '2022-03-29 08:48:49'),
(1580, 58, 'App\\Product', '88.119.194.189', '2022-03-29 08:49:13', '2022-03-29 08:49:13'),
(1581, 18, 'App\\Menu', '88.119.194.189', '2022-03-29 08:49:22', '2022-03-29 08:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `my_vieweds`
--

CREATE TABLE `my_vieweds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_vieweds`
--

INSERT INTO `my_vieweds` (`id`, `ip`, `count`, `product_id`, `created_at`, `updated_at`) VALUES
(717, '88.119.194.189', 13, 57, '2022-03-25 10:31:25', '2022-03-29 08:49:05'),
(718, '103.136.96.254', 1, 57, '2022-03-25 13:22:27', '2022-03-25 13:22:27'),
(719, '86.38.75.149', 1, 57, '2022-03-26 04:30:46', '2022-03-26 04:30:46'),
(720, '85.206.8.4', 1, 57, '2022-03-28 06:16:37', '2022-03-28 06:16:37'),
(721, '77.211.5.29', 1, 57, '2022-03-28 06:35:41', '2022-03-28 06:35:41'),
(722, '85.206.8.4', 3, 58, '2022-03-28 06:38:07', '2022-03-29 05:58:11'),
(723, '77.211.5.29', 1, 58, '2022-03-28 06:38:08', '2022-03-28 06:38:08'),
(724, '103.136.96.254', 1, 58, '2022-03-28 07:35:03', '2022-03-28 07:35:03'),
(725, '88.119.194.189', 3, 59, '2022-03-28 09:09:48', '2022-03-29 08:49:23'),
(726, '78.61.112.85', 1, 57, '2022-03-28 14:12:09', '2022-03-28 14:12:09'),
(727, '86.38.75.149', 1, 59, '2022-03-29 01:09:36', '2022-03-29 01:09:36'),
(728, '85.206.8.4', 1, 59, '2022-03-29 05:57:02', '2022-03-29 05:57:02'),
(729, '88.119.194.189', 1, 58, '2022-03-29 08:49:13', '2022-03-29 08:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` int(11) NOT NULL,
  `ordered_vendor_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `color_en` varchar(100) DEFAULT NULL,
  `color_lt` varchar(255) DEFAULT NULL,
  `color_rus` varchar(255) DEFAULT NULL,
  `color_es` varchar(255) DEFAULT NULL,
  `color_pt` varchar(255) DEFAULT NULL,
  `yarn_color` varchar(100) DEFAULT NULL,
  `size_en` text DEFAULT NULL,
  `size_lt` text DEFAULT NULL,
  `size_rus` text DEFAULT NULL,
  `size_es` text DEFAULT NULL,
  `size_pt` text DEFAULT NULL,
  `clasp` varchar(191) DEFAULT NULL,
  `surface_amber` varchar(191) DEFAULT NULL,
  `certificate` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `total` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `ordered_vendor_id`, `product_id`, `quantity`, `color_en`, `color_lt`, `color_rus`, `color_es`, `color_pt`, `yarn_color`, `size_en`, `size_lt`, `size_rus`, `size_es`, `size_pt`, `clasp`, `surface_amber`, `certificate`, `price`, `total`, `created_at`, `updated_at`) VALUES
(20, 17, 17, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 11, 11, '2021-12-01 06:16:27', '2021-12-01 06:16:27'),
(21, 18, 34, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 12, 12, '2021-12-01 06:18:11', '2021-12-01 06:18:11'),
(22, 19, 34, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 12, 12, '2021-12-01 06:26:12', '2021-12-01 06:26:12'),
(23, 20, 45, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 11, 11, '2021-12-02 10:49:20', '2021-12-02 10:49:20'),
(24, 21, 11, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 8, 8, '2021-12-02 10:52:24', '2021-12-02 10:52:24'),
(25, 22, 2, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 10, 10, '2021-12-06 14:16:29', '2021-12-06 14:16:29'),
(26, 23, 2, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 10, 10, '2021-12-06 14:29:48', '2021-12-06 14:29:48'),
(27, 24, 34, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 12, 12, '2021-12-07 08:36:31', '2021-12-07 08:36:31'),
(28, 24, 46, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 11, 11, '2021-12-07 08:36:31', '2021-12-07 08:36:31'),
(29, 25, 8, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 25, 25, '2021-12-22 08:58:33', '2021-12-22 08:58:33'),
(30, 25, 2, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 10, 10, '2021-12-22 08:58:33', '2021-12-22 08:58:33'),
(31, 26, 40, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 130, 130, '2022-01-24 12:05:27', '2022-01-24 12:05:27'),
(32, 27, 49, 1, '', '', '', '', '', NULL, '', '', '', '', '', NULL, NULL, NULL, 24, 24, '2022-03-22 11:09:39', '2022-03-22 11:09:39'),
(33, 28, 51, 1, '', '', '', '', '', NULL, 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', NULL, NULL, NULL, 19.6, 19.6, '2022-03-23 14:49:28', '2022-03-23 14:49:28'),
(34, 29, 51, 1, '', '', '', '', '', NULL, 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', 'Surface Amber: Published, Clasp: pop upSurface Amber: Published, Clasp: pop up, ', NULL, NULL, NULL, 19.6, 19.6, '2022-03-23 14:55:46', '2022-03-23 14:55:46'),
(35, 30, 53, 2, 'Color : black', 'Color : black', 'Color : black', 'Color : black', 'Color : black', NULL, 'drobės išmatavimas: 30cmX50cm, drobes ilgis: 30drobes ilgis: 30, ', 'drobės išmatavimas: 30cmX50cm, drobes ilgis: 50drobes ilgis: 50, ', 'drobės išmatavimas: 30cmX50cm, drobes ilgis: 30drobes ilgis: 30, ', 'drobės išmatavimas: 30cmX50cm, drobes ilgis: 30drobes ilgis: 30, ', 'drobės išmatavimas: 30cmX50cm, drobes ilgis: 30drobes ilgis: 30, ', NULL, NULL, NULL, 9.8, 19.6, '2022-03-25 07:21:25', '2022-03-25 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_vendors`
--

CREATE TABLE `ordered_vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `shipping_cost` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordered_vendors`
--

INSERT INTO `ordered_vendors` (`id`, `order_id`, `vendor_id`, `total`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(17, 17, 2, 18, 7, '2021-12-01 06:16:27', '2021-12-01 06:16:27'),
(18, 18, 2, 19, 7, '2021-12-01 06:18:11', '2021-12-01 06:18:11'),
(19, 19, 2, 19, 7, '2021-12-01 06:26:12', '2021-12-01 06:26:12'),
(20, 20, 2, 18, 7, '2021-12-02 10:49:20', '2021-12-02 10:49:20'),
(21, 21, 2, 15, 7, '2021-12-02 10:52:24', '2021-12-02 10:52:24'),
(22, 22, 2, 17, 7, '2021-12-06 14:16:29', '2021-12-06 14:16:29'),
(23, 23, 2, 17, 7, '2021-12-06 14:29:47', '2021-12-06 14:29:47'),
(24, 24, 2, 33, 10, '2021-12-07 08:36:31', '2021-12-07 08:36:31'),
(25, 25, 2, 41, 6, '2021-12-22 08:58:33', '2021-12-22 08:58:33'),
(26, 26, 2, 133, 3, '2022-01-24 12:05:27', '2022-01-24 12:05:27'),
(27, 27, 2, 31, 7, '2022-03-22 11:09:39', '2022-03-22 11:09:39'),
(28, 28, 2, 29.6, 10, '2022-03-23 14:49:28', '2022-03-23 14:49:28'),
(29, 29, 2, 26.6, 7, '2022-03-23 14:55:46', '2022-03-23 14:55:46'),
(30, 30, 28, 24.6, 5, '2022-03-25 07:21:25', '2022-03-25 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `lastname` varchar(191) DEFAULT NULL,
  `apartment` varchar(191) DEFAULT NULL,
  `street_address` varchar(191) DEFAULT NULL,
  `town` varchar(191) DEFAULT NULL,
  `district` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `post_code` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `order_note` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_method` varchar(191) NOT NULL,
  `total` float DEFAULT 0,
  `shipping_type` varchar(255) DEFAULT NULL,
  `user_discount` float DEFAULT 0,
  `package_discount` float DEFAULT 0,
  `maintenance_charge` float DEFAULT 0,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `post_machine` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `company_id` varchar(191) DEFAULT NULL,
  `company_vat` varchar(191) DEFAULT NULL,
  `company_address` varchar(191) DEFAULT NULL,
  `others` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending;1=confirmed;2=shipped;3=delivered;',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lastname`, `apartment`, `street_address`, `town`, `district`, `country`, `post_code`, `phone`, `email`, `order_note`, `user_id`, `order_id`, `payment_method`, `total`, `shipping_type`, `user_discount`, `package_discount`, `maintenance_charge`, `is_paid`, `post_machine`, `company_name`, `company_id`, `company_vat`, `company_address`, `others`, `status`, `created_at`, `updated_at`) VALUES
(29, 'fTest', 'fTest', 'fTest', 'fTest', 'fTest', 'fTest', 'Bangladesh', '324535', '345345', 'fTest@gmail.com', 'sdfasf', 18, '623b43028fdc2', 'paysera', 26.6, 'Pristatymas', 0, 0, 0, 1, NULL, 'GLOBAL MULTI SE', '3434', '343', 'Ttest', 'asdfsadfsadf', 0, '2022-03-23 14:55:46', '2022-03-23 14:56:08'),
(30, 'EVALDAS KARCIAUSKAS', 'asdas', '23', 'asfdasd', 'Maišiagala', 'werwerwnegras', 'Lithuania', '14244', '860806073', 'karciauskas55@gmail.com', NULL, 19, '623d7b84f255a', 'paysera', 24.6, 'Pristatymas', 0, 0, 0, 0, NULL, 'click it.lt', 'click it.lt', 'click it.lt', 'Krotošyno', NULL, 0, '2022-03-25 07:21:25', '2022-03-25 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `package_price` int(11) DEFAULT NULL,
  `package_discount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `content_en` text DEFAULT NULL,
  `content_lt` text DEFAULT NULL,
  `content_rus` text DEFAULT NULL,
  `content_pt` text DEFAULT NULL,
  `content_es` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_lt` varchar(255) DEFAULT NULL,
  `title_rus` varchar(255) DEFAULT NULL,
  `title_pt` varchar(255) DEFAULT NULL,
  `title_es` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `content_en`, `content_lt`, `content_rus`, `content_pt`, `content_es`, `slug`, `title_en`, `title_lt`, `title_rus`, `title_pt`, `title_es`, `created_at`, `updated_at`) VALUES
(1, 'daug&nbsp; info&nbsp;', 'daug&nbsp; info&nbsp;', 'daug&nbsp; info&nbsp;', 'daug&nbsp; info&nbsp;', 'daug&nbsp; info&nbsp;', 'pristatymas--ghrazinimas', 'Pristatymas & GHrazinimas', 'Pristatymas & GHrazinimas', 'Pristatymas & GHrazinimas', 'Pristatymas & GHrazinimas', 'Pristatymas & GHrazinimas', '2021-12-02 10:58:21', '2021-12-02 10:58:21'),
(2, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>', 'terms-condition', 'Terms condition', 'Terms condition', 'Terms condition', 'Terms condition', 'Terms condition', '2021-12-05 08:12:17', '2021-12-05 08:12:17'),
(3, '<h1 style=\"box-sizing: border-box; margin: 22px 0px 11px; font-family: BlissPro-Light; color: rgb(51, 51, 51); font-size: 41px;\"><span style=\"font-weight: normal; background-color: rgb(255, 0, 0);\">Apie mus</span></h1><div class=\"info clearfix\" style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: BlissPro-Light; font-size: 16px; background-color: rgb(255, 255, 255);\"><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro – kopijavimo paslaugų centras, kuris teikia visas nespalvoto bei spalvoto kopijavimo ir spausdinimo paslaugas. Kopijavimas ir spausdinimas VISŲ FORMATŲ, pradedant nuo A8 ... A4, A3, A2, A1, A0, A0+ (plotis - 1067mm).&nbsp;<br style=\"box-sizing: border-box;\">Taip pat atliekame papildomas paslaugas - įrišimas, laminavimas, skenavimas (įskaitant didelius formatus) ir kt.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro siūlo didelį dokumentų tvarkymo paslaugų pasirinkimą, nuolat tobulina užsakovų aptarnavimo kokybę, atitinkančią technologijų raidą bei klientų reikalavimus.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro naudojasi naujausiais ir kokybiškiausiais įrenginiais. Kopijų ir spaudos kokybę užtikrina sertifikatus turintys įrenginių aptarnavimo inžinieriai ir techninius rodiklius atitinkančios medžiagos.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Centras jau dešimtmetį veikia Rygoje, o nuo 2010 m. spalio atvėrė duris ir Vilniaus centre.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro kopijavimo centre klientus operatyviai aptarnauja dėmesingi ir rūpestingi darbuotojai.<br style=\"box-sizing: border-box;\">Laukiame Jūsų Gedimino pr. 33 (I-VII 07:00 –&nbsp;22:00) ir Pylimo g. 22D (I-V&nbsp;09:00 – 17:00)&nbsp;(Pylimo g. 2022-02-24 d. dėl elektros&nbsp;darbų NEDIRBS)</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Mūsų vertybės – greitis, draugiškumas, patikimumas, patogumas ir kūrybiškumas!&nbsp;<br style=\"box-sizing: border-box;\">Kopijuoti galima kitur, tačiau PAJUSK mūsų paslaugų IŠSKIRTINUMĄ!&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">&nbsp;</p></div>', '<h1 style=\"box-sizing: border-box; margin: 22px 0px 11px; font-family: BlissPro-Light; font-weight: 200; color: rgb(51, 51, 51); font-size: 41px; background-color: rgb(255, 255, 255);\">Apie mus</h1><div class=\"info clearfix\" style=\"box-sizing: border-box; color: rgb(51, 51, 51); font-family: BlissPro-Light; font-size: 16px; background-color: rgb(255, 255, 255);\"><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro – kopijavimo paslaugų centras, kuris teikia visas nespalvoto bei spalvoto kopijavimo ir spausdinimo paslaugas. Kopijavimas ir spausdinimas VISŲ FORMATŲ, pradedant nuo A8 ... A4, A3, A2, A1, A0, A0+ (plotis - 1067mm).&nbsp;<br style=\"box-sizing: border-box;\">Taip pat atliekame papildomas paslaugas - įrišimas, laminavimas, skenavimas (įskaitant didelius formatus) ir kt.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro siūlo didelį dokumentų tvarkymo paslaugų pasirinkimą, nuolat tobulina užsakovų aptarnavimo kokybę, atitinkančią technologijų raidą bei klientų reikalavimus.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro naudojasi naujausiais ir kokybiškiausiais įrenginiais. Kopijų ir spaudos kokybę užtikrina sertifikatus turintys įrenginių aptarnavimo inžinieriai ir techninius rodiklius atitinkančios medžiagos.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Centras jau dešimtmetį veikia Rygoje, o nuo 2010 m. spalio atvėrė duris ir Vilniaus centre.&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Copy Pro kopijavimo centre klientus operatyviai aptarnauja dėmesingi ir rūpestingi darbuotojai.<br style=\"box-sizing: border-box;\">Laukiame Jūsų Gedimino pr. 33 (I-VII 07:00 –&nbsp;22:00) ir Pylimo g. 22D (I-V&nbsp;09:00 – 17:00)&nbsp;(Pylimo g. 2022-02-24 d. dėl elektros&nbsp;darbų NEDIRBS)</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">Mūsų vertybės – greitis, draugiškumas, patikimumas, patogumas ir kūrybiškumas!&nbsp;<br style=\"box-sizing: border-box;\">Kopijuoti galima kitur, tačiau PAJUSK mūsų paslaugų IŠSKIRTINUMĄ!&nbsp;</p><p style=\"box-sizing: border-box; margin-bottom: 11px;\">&nbsp;<span style=\"font-family: BlissPro-Medium; font-weight: 700; text-transform: uppercase; background-color: rgb(108, 108, 108); color: rgb(240, 239, 239); font-size: 12px;\">KONTAKTAI</span></p><p style=\"box-sizing: border-box; margin-bottom: 11px; color: rgb(240, 239, 239); font-size: 12px; background-color: rgb(108, 108, 108);\">Gedimino pr. 33, Vilnius | KIEKVIENĄ DIENĄ nuo 7.00 iki 22.00&nbsp;| Tel. . +370 5 260 0522 | Mob. +370 688 02 504|&nbsp;<a href=\"mailto:copypro@copypro.lt\" style=\"box-sizing: border-box; color: rgb(240, 239, 239);\">copypro@copypro.lt</a></p><p style=\"box-sizing: border-box; margin-bottom: 11px; color: rgb(240, 239, 239); font-size: 12px; background-color: rgb(108, 108, 108);\">Pylimo g. 22D,&nbsp;Vilnius | I-V&nbsp;nuo 7.00 iki 19.00 | Mob. +370 674 53 554|&nbsp;<a href=\"mailto:pylimo@copypro.lt\" style=\"box-sizing: border-box; color: rgb(240, 239, 239);\">pylimo@copypro.lt</a><br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700; text-transform: uppercase; font-family: BlissPro-Medium;\">MŪSŲ PARTNERIAI</span></p><p style=\"box-sizing: border-box; margin-bottom: 11px; color: rgb(240, 239, 239); font-size: 12px; background-color: rgb(108, 108, 108);\"><img alt=\"\" height=\"15\" src=\"https://www.copypro.lt/uploads/files/6249-004-179bde49.jpg\" width=\"30\" style=\"box-sizing: border-box; border: 0px;\">&nbsp; &nbsp;<a href=\"http://www.copypro.lv/\" style=\"box-sizing: border-box; color: rgb(240, 239, 239);\">www.copypro.lv</a><br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\"><img alt=\"\" height=\"15\" src=\"https://www.copypro.lt/uploads/files/255px-flag-of-estoniasvg.png\" width=\"30\" style=\"box-sizing: border-box; border: 0px;\">&nbsp; &nbsp;<a href=\"http://www.copypro.ee/\" style=\"box-sizing: border-box; color: rgb(240, 239, 239);\">www.copypro.ee</a></p></div>', 'sdfsdfsf', 'sdfsdfsf', 'sdfsdfsf', 'apie-mus', 'APIE MUS', 'Apie mus', 'sdfsdfsdf', 'sdfsdfsdf', 'sdfsdfsdf', '2022-03-23 09:55:04', '2022-03-25 07:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `menu_id` int(11) NOT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `inner_menu_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `shipping_category_id` int(11) NOT NULL,
  `title_lt` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_rus` varchar(255) NOT NULL,
  `title_pt` varchar(255) NOT NULL,
  `title_es` varchar(255) NOT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `description_pt` longtext DEFAULT NULL,
  `description_es` longtext DEFAULT NULL,
  `delivery_lt` longtext DEFAULT NULL,
  `delivery_en` longtext DEFAULT NULL,
  `delivery_rus` longtext DEFAULT NULL,
  `delivery_pt` longtext DEFAULT NULL,
  `delivery_es` longtext DEFAULT NULL,
  `specification_lt` longtext DEFAULT NULL,
  `specification_en` longtext DEFAULT NULL,
  `specification_rus` longtext DEFAULT NULL,
  `specification_pt` longtext DEFAULT NULL,
  `specification_es` longtext DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `url_en` text DEFAULT NULL,
  `url_lt` text DEFAULT NULL,
  `url_rus` text DEFAULT NULL,
  `url_pt` text DEFAULT NULL,
  `url_es` text DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `others` longtext DEFAULT NULL,
  `new_s` int(11) NOT NULL DEFAULT 0,
  `is_stock` int(11) NOT NULL DEFAULT 1 COMMENT '1=stock; 0=out_of_stock',
  `total_view` int(11) NOT NULL DEFAULT 0,
  `is_top_product` int(11) NOT NULL DEFAULT 0,
  `is_free_shipping` int(11) NOT NULL DEFAULT 0,
  `is_certificate` int(11) NOT NULL DEFAULT 0,
  `last_visit_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `menu_id`, `sub_menu_id`, `inner_menu_id`, `vendor_id`, `code`, `shipping_category_id`, `title_lt`, `title_en`, `title_rus`, `title_pt`, `title_es`, `description_lt`, `description_en`, `description_rus`, `description_pt`, `description_es`, `delivery_lt`, `delivery_en`, `delivery_rus`, `delivery_pt`, `delivery_es`, `specification_lt`, `specification_en`, `specification_rus`, `specification_pt`, `specification_es`, `product_img`, `url_en`, `url_lt`, `url_rus`, `url_pt`, `url_es`, `weight`, `others`, `new_s`, `is_stock`, `total_view`, `is_top_product`, `is_free_shipping`, `is_certificate`, `last_visit_time`, `created_at`, `updated_at`) VALUES
(57, 11, 9, NULL, 28, NULL, 2, 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'product_main1648456924.webp', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 9, 0, 0, 0, NULL, '2022-03-25 10:31:06', '2022-03-28 14:12:08'),
(58, 11, 9, NULL, 28, 'ąčęęę', 2, 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', 'gdesks', 'gdesks', 'gdesks', 'gdesks', 'gdesks', 'prisjdksls', 'prisjdksls', 'prisjdksls', 'prisjdksls', 'prisjdksls', 'dkdkdk', 'dkdkdk', 'dkdkdk', 'dkdkdk', 'dkdkdk', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, 4, 1, 0, 0, NULL, '2022-03-28 06:37:48', '2022-03-29 08:49:13'),
(59, 18, 10, NULL, 28, NULL, 2, 'CD-R diskas popieriniame vokelyje', 'CD-R diskas popieriniame vokelyje', 'CD-R diskas popieriniame vokelyje', 'CD-R diskas popieriniame vokelyje', 'CD-R diskas popieriniame vokelyje', '<ul style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; list-style-type: disc; color: rgb(119, 119, 119);\"><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">tipas CD-R;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">talpa 700 MB;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo laikas 80 min.;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo greitis 52X (maksimalus);</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">popieriniame vokelyje su langeliu;</li></ul>', '<ul style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; list-style-type: disc; color: rgb(119, 119, 119);\"><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">tipas CD-R;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">talpa 700 MB;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo laikas 80 min.;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo greitis 52X (maksimalus);</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">popieriniame vokelyje su langeliu;</li></ul>', '<ul style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; list-style-type: disc; color: rgb(119, 119, 119);\"><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">tipas CD-R;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">talpa 700 MB;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo laikas 80 min.;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo greitis 52X (maksimalus);</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">popieriniame vokelyje su langeliu;</li></ul>', '<ul style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; list-style-type: disc; color: rgb(119, 119, 119);\"><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">tipas CD-R;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">talpa 700 MB;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo laikas 80 min.;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo greitis 52X (maksimalus);</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">popieriniame vokelyje su langeliu;</li></ul>', '<ul style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 9px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; font-size: 13px; vertical-align: baseline; list-style-type: disc; color: rgb(119, 119, 119);\"><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">tipas CD-R;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">talpa 700 MB;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo laikas 80 min.;</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">įrašymo greitis 52X (maksimalus);</li><li style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">popieriniame vokelyje su langeliu;</li></ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'product_main1648464298.webp', NULL, NULL, NULL, NULL, NULL, 0.1, NULL, 1, 1, 3, 0, 0, 0, NULL, '2022-03-28 08:44:58', '2022-03-29 05:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `pro_id`, `img`, `created_at`, `updated_at`) VALUES
(57, 57, 'product_alt-0-1648456487.webp', '2022-03-28 06:34:48', '2022-03-28 06:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `custom_clasp_id` text DEFAULT NULL,
  `custom_color_id` text DEFAULT NULL,
  `yarn_color_id` text DEFAULT NULL,
  `surface_amber_id` text DEFAULT NULL,
  `size_id` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `pro_id`, `custom_clasp_id`, `custom_color_id`, `yarn_color_id`, `surface_amber_id`, `size_id`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(56, 57, NULL, NULL, NULL, NULL, '[[\"429\",\"430\",\"431\",\"432\",\"433\",\"434\",\"435\",\"436\"],[\"438\",\"437\"],[\"446\",\"447\"]]', 0.11, 0, '2022-03-25 10:31:07', '2022-03-28 06:42:05'),
(57, 58, NULL, NULL, NULL, NULL, '[[\"429\",\"430\",\"431\",\"432\",\"433\",\"434\",\"435\",\"436\"],[\"438\",\"437\"],[\"446\",\"447\"]]', 0.11, 0, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(58, 59, NULL, NULL, NULL, NULL, '[]', 2, NULL, '2022-03-28 08:44:58', '2022-03-28 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping_categories`
--

CREATE TABLE `product_shipping_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shipping_category_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `price`, `created_at`, `updated_at`) VALUES
(86, 57, NULL, 0.11, '2022-03-25 10:31:06', '2022-03-25 10:32:44'),
(87, 57, '[\"429\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:06', '2022-03-25 10:32:44'),
(88, 57, '[\"430\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:06', '2022-03-25 10:32:44'),
(89, 57, '[\"431\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:06', '2022-03-25 10:32:44'),
(90, 57, '[\"432\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:06', '2022-03-25 10:32:44'),
(91, 57, '[\"433\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(92, 57, '[\"434\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(93, 57, '[\"435\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(94, 57, '[\"436\",\"438\",\"446\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(95, 57, '[\"429\",\"438\",\"447\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(96, 57, '[\"430\",\"438\",\"447\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(97, 57, '[\"431\",\"438\",\"447\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(98, 57, '[\"432\",\"438\",\"447\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(99, 57, '[\"433\",\"438\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(100, 57, '[\"434\",\"438\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(101, 57, '[\"435\",\"438\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(102, 57, '[\"436\",\"438\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(103, 57, '[\"429\",\"437\",\"446\"]', 0.11, '2022-03-25 10:31:07', '2022-03-25 10:32:44'),
(104, 57, '[\"430\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(105, 57, '[\"431\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(106, 57, '[\"432\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(107, 57, '[\"433\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(108, 57, '[\"433\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(109, 57, '[\"435\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(110, 57, '[\"436\",\"437\",\"446\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(111, 57, '[\"429\",\"437\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(112, 57, '[\"430\",\"437\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(113, 57, '[\"431\",\"437\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(114, 57, '[\"432\",\"437\",\"447\"]', 1, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(115, 57, '[\"433\",\"437\",\"447\"]', 2, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(116, 57, '[\"434\",\"437\",\"447\"]', 2, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(117, 57, '[\"435\",\"437\",\"447\"]', 2, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(118, 57, '[\"436\",\"437\",\"447\"]', 2, '2022-03-25 10:31:07', '2022-03-25 10:31:07'),
(119, 58, NULL, 0.11, '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(120, 58, '[\"429\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(121, 58, '[\"430\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(122, 58, '[\"431\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(123, 58, '[\"432\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(124, 58, '[\"433\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(125, 58, '[\"434\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(126, 58, '[\"435\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(127, 58, '[\"436\",\"438\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(128, 58, '[\"429\",\"438\",\"447\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(129, 58, '[\"430\",\"438\",\"447\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(130, 58, '[\"431\",\"438\",\"447\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(131, 58, '[\"432\",\"438\",\"447\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(132, 58, '[\"433\",\"438\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(133, 58, '[\"434\",\"438\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(134, 58, '[\"435\",\"438\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(135, 58, '[\"436\",\"438\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(136, 58, '[\"429\",\"437\",\"446\"]', 0.11, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(137, 58, '[\"430\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(138, 58, '[\"431\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(139, 58, '[\"432\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(140, 58, '[\"433\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(141, 58, '[\"433\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(142, 58, '[\"435\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(143, 58, '[\"436\",\"437\",\"446\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(144, 58, '[\"429\",\"437\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(145, 58, '[\"430\",\"437\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(146, 58, '[\"431\",\"437\",\"447\"]', 1, '2022-03-28 06:37:49', '2022-03-28 06:37:49'),
(147, 58, '[\"432\",\"437\",\"447\"]', 1, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(148, 58, '[\"433\",\"437\",\"447\"]', 2, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(149, 58, '[\"434\",\"437\",\"447\"]', 2, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(150, 58, '[\"435\",\"437\",\"447\"]', 2, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(151, 58, '[\"436\",\"437\",\"447\"]', 2, '2022-03-28 06:37:50', '2022-03-28 06:37:50'),
(152, 59, NULL, 2, '2022-03-28 08:44:58', '2022-03-28 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `specification_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `text_en` varchar(255) DEFAULT NULL,
  `text_lt` varchar(255) DEFAULT NULL,
  `text_rus` varchar(255) DEFAULT NULL,
  `text_pt` varchar(255) DEFAULT NULL,
  `text_es` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pro_sliders`
--

CREATE TABLE `pro_sliders` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secondary_menus`
--

CREATE TABLE `secondary_menus` (
  `id` int(11) NOT NULL,
  `menu_lt` varchar(255) DEFAULT NULL,
  `menu_en` varchar(255) DEFAULT NULL,
  `menu_rus` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url_en` mediumtext DEFAULT NULL,
  `url_lt` mediumtext DEFAULT NULL,
  `url_rus` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secondary_sub_menus`
--

CREATE TABLE `secondary_sub_menus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu_lt` varchar(255) DEFAULT NULL,
  `sub_menu_en` varchar(255) DEFAULT NULL,
  `sub_menu_rus` varchar(255) DEFAULT NULL,
  `url_en` mediumtext DEFAULT NULL,
  `url_lt` mediumtext DEFAULT NULL,
  `url_rus` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_price` float DEFAULT 0,
  `maintenance_charge` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `min_price`, `maintenance_charge`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2021-05-30 07:50:30', '2021-12-01 04:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `shipping_type_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `shipping_category_id` int(10) UNSIGNED NOT NULL,
  `processing_time` int(11) NOT NULL,
  `delivery_from` int(11) NOT NULL,
  `delivery_to` int(11) NOT NULL,
  `max_weight` float NOT NULL,
  `additional_weight_price` float DEFAULT NULL,
  `price` float NOT NULL,
  `additional_price` float DEFAULT NULL,
  `max_price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `country_id`, `shipping_type_id`, `vendor_id`, `shipping_category_id`, `processing_time`, `delivery_from`, `delivery_to`, `max_weight`, `additional_weight_price`, `price`, `additional_price`, `max_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:34', '2021-12-01 05:59:34'),
(2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:34', '2021-12-01 05:59:34'),
(3, 3, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:34', '2021-12-01 05:59:34'),
(4, 4, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:34', '2021-12-01 05:59:34'),
(5, 5, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(6, 6, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(7, 7, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(8, 8, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(9, 9, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(10, 10, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(11, 11, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(12, 12, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(13, 13, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:35', '2021-12-01 05:59:35'),
(14, 14, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(15, 15, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(16, 16, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(17, 17, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(18, 18, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-12 05:24:07'),
(19, 19, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(20, 20, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(21, 21, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(22, 22, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(23, 23, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:36', '2021-12-01 05:59:36'),
(24, 24, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(25, 25, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(26, 26, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(27, 27, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(28, 28, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(29, 29, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(30, 30, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(31, 31, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(32, 32, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(33, 33, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(34, 34, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(35, 35, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:37', '2021-12-01 05:59:37'),
(36, 36, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(37, 37, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(38, 38, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(39, 39, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(40, 40, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(41, 41, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(42, 42, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(43, 43, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(44, 44, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(45, 45, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(46, 46, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(47, 47, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(48, 48, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(49, 49, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:38', '2021-12-01 05:59:38'),
(50, 50, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(51, 51, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(52, 52, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(53, 53, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(54, 54, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(55, 55, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(56, 56, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(57, 57, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(58, 58, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(59, 59, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(60, 60, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:39', '2021-12-01 05:59:39'),
(61, 61, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(62, 62, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(63, 63, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(64, 64, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(65, 65, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(66, 66, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(67, 67, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(68, 68, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(69, 69, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(70, 70, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(71, 71, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(72, 72, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:40', '2021-12-01 05:59:40'),
(73, 73, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(74, 74, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(75, 75, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(76, 76, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(77, 77, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(78, 78, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(79, 79, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(80, 80, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(81, 81, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:41', '2021-12-01 05:59:41'),
(82, 82, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(83, 83, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(84, 84, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(85, 85, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(86, 86, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(87, 87, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(88, 88, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(89, 89, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(90, 90, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(91, 91, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(92, 92, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(93, 93, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(94, 94, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(95, 95, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(96, 96, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(97, 97, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:42', '2021-12-01 05:59:42'),
(98, 98, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(99, 99, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(100, 100, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(101, 101, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(102, 102, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(103, 103, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(104, 104, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(105, 105, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(106, 106, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(107, 107, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(108, 108, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(109, 109, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(110, 110, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(111, 111, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(112, 112, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(113, 113, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(114, 114, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:43', '2021-12-01 05:59:43'),
(115, 115, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(116, 116, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(117, 117, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(118, 118, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(119, 119, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(120, 120, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(121, 121, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(122, 122, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(123, 123, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(124, 124, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(125, 125, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(126, 126, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(127, 127, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(128, 129, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(129, 130, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(130, 131, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(131, 132, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(132, 133, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(133, 134, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(134, 135, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(135, 136, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(136, 137, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:44', '2021-12-01 05:59:44'),
(137, 138, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(138, 139, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(139, 140, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(140, 141, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(141, 142, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(142, 143, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(143, 144, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(144, 145, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(145, 146, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:45', '2021-12-01 05:59:45'),
(146, 147, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(147, 148, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(148, 149, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(149, 150, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(150, 151, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(151, 152, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(152, 153, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(153, 154, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(154, 155, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(155, 156, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(156, 157, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(157, 158, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:46', '2021-12-01 05:59:46'),
(158, 159, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(159, 160, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(160, 161, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(161, 162, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(162, 163, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(163, 164, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(164, 165, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(165, 166, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(166, 167, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(167, 168, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(168, 169, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(169, 170, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(170, 171, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(171, 172, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(172, 173, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(173, 174, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(174, 175, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(175, 176, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(176, 177, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(177, 178, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(178, 179, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(179, 180, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:47', '2021-12-01 05:59:47'),
(180, 181, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(181, 182, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(182, 183, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(183, 184, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(184, 185, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(185, 186, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(186, 187, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(187, 188, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(188, 189, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:48', '2021-12-01 05:59:48'),
(189, 190, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(190, 191, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(191, 192, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(192, 193, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(193, 194, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(194, 195, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(195, 196, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(196, 197, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(197, 198, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(198, 199, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(199, 200, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(200, 201, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(201, 202, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(202, 203, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:49', '2021-12-01 05:59:49'),
(203, 204, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(204, 205, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(205, 206, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(206, 207, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(207, 208, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(208, 209, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:50', '2021-12-01 05:59:50'),
(209, 210, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(210, 211, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(211, 212, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(212, 213, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(213, 214, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(214, 215, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(215, 216, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(216, 217, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(217, 218, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(218, 219, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(219, 220, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(220, 221, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(221, 222, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(222, 223, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(223, 224, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:51', '2021-12-01 05:59:51'),
(224, 225, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:52', '2021-12-01 05:59:52'),
(226, 227, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:52', '2021-12-01 05:59:52'),
(227, 228, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(228, 229, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(229, 230, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(230, 231, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(231, 232, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(232, 233, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(233, 234, 2, 2, 1, 1, 1, 1, 1, 1, 7, 2, 10, '2021-12-01 05:59:53', '2021-12-01 05:59:53'),
(251, 128, 2, 28, 2, 1, 3, 10, 10, 1, 5, 0, 20, '2022-03-25 06:42:36', '2022-03-25 06:42:36'),
(252, 128, 3, 28, 3, 1, 6, 17, 50, 1, 3, 0.2, 20, '2022-03-25 07:39:16', '2022-03-25 08:04:44'),
(253, 204, 3, 28, 3, 1, 2, 2, 500, 10, 10, 2, 20, '2022-03-25 09:06:30', '2022-03-25 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_categories`
--

CREATE TABLE `shipping_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_categories`
--

INSERT INTO `shipping_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'indijos', 1, '2021-12-01 05:51:26', '2022-03-23 09:44:24'),
(2, 'Lietuvos', 1, '2022-03-23 09:44:35', '2022-03-23 09:44:35'),
(3, 'Dpd', 1, '2022-03-25 08:02:38', '2022-03-25 08:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_settings`
--

CREATE TABLE `shipping_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_price` float DEFAULT NULL,
  `min_item` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_settings`
--

INSERT INTO `shipping_settings` (`id`, `min_price`, `min_item`, `created_at`, `updated_at`) VALUES
(1, 3, 10000, '2021-04-11 04:39:16', '2022-03-25 06:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_types`
--

INSERT INTO `shipping_types` (`id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pristatymas', 1, '2021-05-24 04:13:16', '2022-03-23 15:20:22'),
(3, 'DPD I NAMUS', 1, '2022-03-25 07:37:00', '2022-03-25 07:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_en` varchar(255) DEFAULT NULL,
  `size_lt` varchar(255) DEFAULT NULL,
  `size_rus` varchar(255) DEFAULT NULL,
  `size_pt` varchar(255) DEFAULT NULL,
  `size_es` varchar(255) DEFAULT NULL,
  `custom_size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_en`, `size_lt`, `size_rus`, `size_pt`, `size_es`, `custom_size_id`, `created_at`, `updated_at`) VALUES
(42, '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', 6, '2021-03-25 06:31:19', '2021-07-14 22:17:07'),
(43, '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', 6, '2021-03-25 06:31:20', '2021-07-14 22:17:07'),
(44, '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', 6, '2021-03-25 06:31:20', '2021-07-14 22:17:07'),
(45, '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', 6, '2021-03-25 06:31:21', '2021-07-14 22:17:07'),
(46, '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', 6, '2021-03-25 06:31:22', '2021-07-14 22:17:07'),
(47, '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', 6, '2021-03-25 06:31:23', '2021-07-14 22:17:07'),
(48, '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', 6, '2021-03-25 06:31:24', '2021-07-14 22:17:07'),
(50, '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', 8, '2021-03-25 06:31:34', '2021-07-14 22:17:07'),
(52, '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', 6, '2021-03-25 06:31:35', '2021-07-14 22:17:07'),
(57, '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', 6, '2021-03-25 06:31:36', '2021-07-14 22:17:07'),
(58, '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', 8, '2021-03-25 06:31:36', '2021-07-14 22:17:07'),
(62, '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', 8, '2021-03-25 06:31:38', '2021-07-14 22:17:07'),
(63, '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', 6, '2021-03-25 06:31:38', '2021-07-14 22:17:07'),
(69, '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', 6, '2021-03-25 06:31:38', '2021-07-14 22:17:07'),
(70, '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', 8, '2021-03-25 06:31:38', '2021-07-14 22:17:07'),
(75, '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', 6, '2021-03-25 06:31:46', '2021-07-14 22:17:07'),
(76, '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', 8, '2021-03-25 06:31:46', '2021-07-14 22:17:07'),
(80, '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', 6, '2021-03-25 06:31:46', '2021-07-14 22:17:07'),
(81, '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', 8, '2021-03-25 06:31:46', '2021-07-14 22:17:07'),
(86, '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', 6, '2021-03-25 06:31:48', '2021-07-14 22:17:07'),
(87, '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', 8, '2021-03-25 06:31:48', '2021-07-14 22:17:07'),
(95, '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', 8, '2021-03-25 06:31:49', '2021-07-14 22:17:07'),
(96, '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', 6, '2021-03-25 06:31:49', '2021-07-14 22:17:07'),
(101, '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', 8, '2021-03-25 06:31:50', '2021-07-14 22:17:07'),
(102, '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', 6, '2021-03-25 06:31:50', '2021-07-14 22:17:07'),
(106, '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', 8, '2021-03-25 06:31:51', '2021-07-14 22:17:07'),
(111, '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', 8, '2021-03-25 06:31:51', '2021-07-14 22:17:07'),
(112, '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', '19 ( pėdos ilgis 11,5 cm)', 12, '2021-03-25 06:31:51', '2021-07-14 22:17:07'),
(118, '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', 8, '2021-03-25 06:31:52', '2021-07-14 22:17:07'),
(119, '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', '20 (pėdos ilgis 12 cm)', 12, '2021-03-25 06:31:52', '2021-07-14 22:17:07'),
(124, '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', '21 (pėdos ilgis 13 cm)', 12, '2021-03-25 06:31:52', '2021-07-14 22:17:07'),
(125, '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', 8, '2021-03-25 06:31:52', '2021-07-14 22:17:07'),
(129, '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', 8, '2021-03-25 06:31:54', '2021-07-14 22:17:07'),
(131, '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', '22 (pėdos ilgis 13,5 cm)', 12, '2021-03-25 06:31:54', '2021-07-14 22:17:07'),
(135, '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', '23 (pėdos ilgis 14,5 cm)', 12, '2021-03-25 06:31:55', '2021-07-14 22:17:07'),
(137, '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', 8, '2021-03-25 06:31:55', '2021-07-14 22:17:07'),
(141, '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', '24 (pėdos ilgis 15 cm)', 12, '2021-03-25 06:32:00', '2021-07-14 22:17:07'),
(142, '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', 8, '2021-03-25 06:32:00', '2021-07-14 22:17:07'),
(144, '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', '25 (pėdos ilgis 15,5 cm)', 12, '2021-03-25 06:32:07', '2021-07-14 22:17:07'),
(148, '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', '26 (pėdos ilgis 16,5 cm)', 12, '2021-03-25 06:32:09', '2021-07-14 22:17:07'),
(152, '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', '27 (pėdos ilgis 17 cm)', 12, '2021-03-25 06:32:09', '2021-07-14 22:17:07'),
(157, '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', '28 (pėdos ilgis 17,5 cm)', 12, '2021-03-25 06:32:11', '2021-07-14 22:17:07'),
(164, '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', '29 (pėdos ilgis 18,5 cm)', 12, '2021-03-25 06:32:11', '2021-07-14 22:17:07'),
(169, '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', '30 (pėdos ilgis 19 cm)', 12, '2021-03-25 06:32:12', '2021-07-14 22:17:07'),
(175, '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', '31 (pėdos ilgis 19,5 cm)', 12, '2021-03-25 06:32:13', '2021-07-14 22:17:07'),
(180, '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', '32 (pėdos ilgis 20,5 cm)', 12, '2021-03-25 06:32:13', '2021-07-14 22:17:07'),
(185, '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', '33 (pėdos ilgis 21 cm)', 12, '2021-03-25 06:32:15', '2021-07-14 22:17:07'),
(189, '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', '34 (pėdos ilgis 21,5 cm)', 12, '2021-03-25 06:32:16', '2021-07-14 22:17:07'),
(378, '44-48 cm', '44-48 cm', '44-48 cm', '44-48 cm', '44-48 cm', 27, '2021-06-30 08:22:45', '2021-07-14 22:17:07'),
(379, '50-54 cm', '50-54 cm', '50-54 cm', '50-54 cm', '50-54 cm', 27, '2021-06-30 08:22:45', '2021-07-14 22:17:07'),
(380, '3-4 metai', '3-4 metai', '3-4 metai', '3-4 metai', '3-4 metai', 28, '2021-06-30 08:24:53', '2021-07-14 22:17:07'),
(381, '52-56 cm', '52-56 cm', '52-56 cm', '52-56 cm', '52-56 cm', 27, '2021-06-30 09:15:26', '2021-07-14 22:17:07'),
(382, '4-5 metai', '4-5 metai', '4-5 metai', '4-5 metai', '4-5 metai', 28, '2021-06-30 10:39:45', '2021-07-14 22:17:07'),
(383, '5-6 metai', '5-6 metai', '5-6 metai', '5-6 metai', '5-6 metai', 28, '2021-06-30 10:39:45', '2021-07-14 22:17:07'),
(384, '6-7 metai', '6-7 metai', '6-7 metai', '6-7 metai', '6-7 metai', 28, '2021-06-30 10:39:45', '2021-07-14 22:17:07'),
(386, '7-8 metai', '7-8 metai', '7-8 metai', '7-8 metai', '7-8 metai', 28, '2021-07-01 05:52:11', '2021-07-14 22:17:07'),
(387, '4 metai', '4 metai', '4 metai', '4 metai', '4 metai', 28, '2021-07-01 07:01:15', '2021-07-14 22:17:07'),
(388, '5 metai', '5 metai', '5 metai', '5 metai', '5 metai', 28, '2021-07-01 07:01:15', '2021-07-14 22:17:07'),
(389, '6 metai', '6 metai', '6 metai', '6 metai', '6 metai', 28, '2021-07-01 07:01:15', '2021-07-14 22:17:07'),
(390, '7 metai', '7 metai', '7 metai', '7 metai', '7 metai', 28, '2021-07-01 07:01:15', '2021-07-14 22:17:07'),
(391, '8  metai', '8  metai', '8  metai', '8  metai', '8  metai', 28, '2021-07-01 07:01:15', '2021-07-14 22:17:07'),
(392, 'kitas', 'kitas', 'kitas', 'kitas', 'kitas', 1, '2022-03-21 13:12:32', '2022-03-21 13:12:32'),
(393, 'kitas  2', 'kitas  2', 'kitas  2', 'kitas  2', 'kitas  2', 1, '2022-03-21 13:12:32', '2022-03-21 13:12:32'),
(394, '22', '22', '22', '22', '22', 2, '2022-03-21 13:12:54', '2022-03-21 13:12:54'),
(395, '23', '23', '23', '23', '23', 2, '2022-03-21 13:12:54', '2022-03-21 13:12:54'),
(396, '24', '24', '24', '24', '24', 2, '2022-03-21 13:12:54', '2022-03-21 13:12:54'),
(397, 'Published', 'Published', 'Published', 'Published', 'Published', 3, '2022-03-23 07:05:20', '2022-03-23 07:05:20'),
(398, 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 3, '2022-03-23 07:05:20', '2022-03-23 07:05:20'),
(399, 'pop up', 'pop up', 'pop up', 'pop up', 'pop up', 4, '2022-03-23 07:05:55', '2022-03-23 07:05:55'),
(400, 'screw', 'screw', 'screw', 'screw', 'screw', 4, '2022-03-23 07:05:56', '2022-03-23 07:05:56'),
(401, '45cm', '45cm', '45cm', '45cm', '45cm', 5, '2022-03-23 07:07:05', '2022-03-23 07:07:05'),
(402, '50 cm', '50 cm', '50 cm', '50 cm', '50 cm', 5, '2022-03-23 07:07:06', '2022-03-23 07:07:06'),
(403, 'Published', 'Published', 'Published', 'Published', 'Published', 6, '2022-03-23 07:33:25', '2022-03-23 07:33:25'),
(404, 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 6, '2022-03-23 07:33:25', '2022-03-23 07:33:25'),
(405, 'Published', 'Published', 'Published', 'Published', 'Published', 7, '2022-03-23 07:36:39', '2022-03-23 07:36:39'),
(406, 'Unpublised', 'Unpublised', 'Unpublised', 'Unpublised', 'Unpublised', 7, '2022-03-23 07:36:39', '2022-03-23 07:36:39'),
(407, 'pop up', 'pop up', 'pop up', 'pop up', 'pop up', 8, '2022-03-23 07:37:16', '2022-03-23 07:37:16'),
(408, 'scraw', 'scraw', 'scraw', 'scraw', 'scraw', 8, '2022-03-23 07:37:17', '2022-03-23 07:37:17'),
(409, 'Published', 'Published', 'Published', 'Published', 'Published', 9, '2022-03-23 08:49:58', '2022-03-23 08:49:58'),
(410, 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 'Unpublished', 9, '2022-03-23 08:49:58', '2022-03-23 08:49:58'),
(411, 'pop up', 'pop up', 'pop up', 'pop up', 'pop up', 10, '2022-03-23 08:50:46', '2022-03-23 08:50:46'),
(412, 'scrw', 'scrw', 'scrw', 'scrw', 'scrw', 10, '2022-03-23 08:50:46', '2022-03-23 08:50:46'),
(413, '30cmX50cm', '30cmX50cm', '30cmX50cm', '30cmX50cm', '30cmX50cm', 11, '2022-03-23 09:28:02', '2022-03-23 09:28:02'),
(414, '30cmX50cm', '40x50', '30cmX50cm', '30cmX50cm', '30cmX50cm', 11, '2022-03-23 09:28:02', '2022-03-23 09:28:02'),
(415, '30cmx50cm', '30cmX50cm', '30cmx50cm', '30cmx50cm', '30cmx50cm', 12, '2022-03-23 09:29:34', '2022-03-23 09:29:34'),
(416, '30', '50', '30', '30', '30', 13, '2022-03-23 09:40:26', '2022-03-23 09:40:26'),
(417, '21x29,7', '21x29,7', '21x29,7', '21x29,7', '21x29,7', 14, '2022-03-25 07:41:21', '2022-03-25 07:41:21'),
(418, '29.7x42', '29.7x42', '29.7x42', '29.7x42', '29.7x42', 14, '2022-03-25 07:41:21', '2022-03-25 07:41:21'),
(419, 'A4', 'A4', 'A4', 'A4', 'A4', 15, '2022-03-25 09:28:16', '2022-03-25 09:28:16'),
(421, 'A3', 'A3', 'A3', 'A3', 'A3', 16, '2022-03-25 09:28:50', '2022-03-25 09:28:50'),
(422, 'A5', 'A5', 'A5', 'A5', 'A5', 17, '2022-03-25 09:29:00', '2022-03-25 09:29:00'),
(423, 'A6', 'A6', 'A6', 'A6', 'A6', 18, '2022-03-25 09:29:10', '2022-03-25 09:29:10'),
(424, '210x110 mm', '210x110 mm', '210x110 mm', '210x110 mm', '210x110 mm', 19, '2022-03-25 09:29:27', '2022-03-25 09:29:27'),
(425, 'A5', 'A5', 'A5', 'A5', 'A5', 20, '2022-03-25 09:38:19', '2022-03-25 09:38:19'),
(426, 'A6', 'A6', 'A6', 'A6', 'A6', 20, '2022-03-25 09:38:37', '2022-03-25 09:38:37'),
(427, '210x110 mm', '210x110 mm', '210x110 mm', '210x110 mm', '210x110 mm', 20, '2022-03-25 09:38:37', '2022-03-25 09:38:37'),
(429, '80 g/m2 (paprastas biuro popierius)', '80 g/m2 (paprastas biuro popierius)', '80 g/m2 (paprastas biuro popierius)', '80 g/m2 (paprastas biuro popierius)', '80 g/m2 (paprastas biuro popierius)', 21, '2022-03-25 09:42:59', '2022-03-25 09:42:59'),
(430, '120 g/m2 kreidinis', '120 g/m2 kreidinis', '120 g/m2 kreidinis', '120 g/m2 kreidinis', '120 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(431, '160 g/m2 kreidinis', '160 g/m2 kreidinis', '160 g/m2 kreidinis', '160 g/m2 kreidinis', '160 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(432, '200 g/m2 kreidinis', '200 g/m2 kreidinis', '200 g/m2 kreidinis', '200 g/m2 kreidinis', '200 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(433, '250g/m2 kreidinis', '250g/m2 kreidinis', '250g/m2 kreidinis', '250g/m2 kreidinis', '250g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(434, '280 g/m2 kreidinis', '280 g/m2 kreidinis', '280 g/m2 kreidinis', '280 g/m2 kreidinis', '280 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(435, '300 g/m2 kreidinis', '300 g/m2 kreidinis', '300 g/m2 kreidinis', '300 g/m2 kreidinis', '300 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(436, '350 g/m2 kreidinis', '350 g/m2 kreidinis', '350 g/m2 kreidinis', '350 g/m2 kreidinis', '350 g/m2 kreidinis', 21, '2022-03-25 09:45:04', '2022-03-25 09:45:04'),
(437, 'Spalvota', 'Spalvota', 'Spalvota', 'Spalvota', 'Spalvota', 22, '2022-03-25 09:49:14', '2022-03-25 09:49:14'),
(438, 'Nespalvota', 'Nespalvota', 'Nespalvota', 'Nespalvota', 'Nespalvota', 22, '2022-03-25 09:49:32', '2022-03-25 09:49:32'),
(440, 'nepakuoti (-)', 'nepakuoti (-)', 'nepakuoti (-)', 'nepakuoti (-)', 'nepakuoti (-)', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(441, 'įmautė', 'įmautė', 'įmautė', 'įmautė', 'įmautė', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(442, 'baltas vokas', 'baltas vokas', 'baltas vokas', 'baltas vokas', 'baltas vokas', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(443, 'kraft vokas', 'kraft vokas', 'kraft vokas', 'kraft vokas', 'kraft vokas', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(444, 'tekstūrinis vokas', 'tekstūrinis vokas', 'tekstūrinis vokas', 'tekstūrinis vokas', 'tekstūrinis vokas', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(445, 'vokas su oro apsauga', 'vokas su oro apsauga', 'vokas su oro apsauga', 'vokas su oro apsauga', 'vokas su oro apsauga', 23, '2022-03-25 09:53:48', '2022-03-25 09:53:48'),
(446, 'Vienpusis', 'Vienpusis', 'Vienpusis', 'Vienpusis', 'Vienpusis', 24, '2022-03-25 10:15:06', '2022-03-25 10:15:06'),
(447, 'Dvipusis', 'Dvipusis', 'Dvipusis', 'Dvipusis', 'Dvipusis', 24, '2022-03-25 10:15:06', '2022-03-25 10:15:06'),
(448, '20x30', '20x30', '20x30', '20x30', '20x30', 25, '2022-03-28 08:58:40', '2022-03-28 08:58:40'),
(449, 'Veidrodinis vaizdas', 'Veidrodinis vaizdas', 'Veidrodinis vaizdas', 'Veidrodinis vaizdas', 'Veidrodinis vaizdas', 26, '2022-03-28 09:00:03', '2022-03-28 09:00:03'),
(450, 'Vientisa spalva', 'Vientisa spalva', 'Vientisa spalva', 'Vientisa spalva', 'Vientisa spalva', 26, '2022-03-28 09:00:03', '2022-03-28 09:00:03'),
(451, 'Pratęsta nuotrauka', 'Pratęsta nuotrauka', 'Pratęsta nuotrauka', 'Pratęsta nuotrauka', 'Pratęsta nuotrauka', 26, '2022-03-28 09:00:03', '2022-03-28 09:00:03'),
(452, 'Sintetinė', 'Sintetinė', 'Sintetinė', 'Sintetinė', 'Sintetinė', 27, '2022-03-28 09:00:21', '2022-03-28 09:00:21'),
(453, 'Natūrali', 'Natūrali', 'Natūrali', 'Natūrali', 'Natūrali', 27, '2022-03-28 09:00:21', '2022-03-28 09:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_lt` varchar(255) DEFAULT NULL,
  `title_rus` varchar(255) DEFAULT NULL,
  `description_lt` mediumtext DEFAULT NULL,
  `description_en` mediumtext DEFAULT NULL,
  `description_rus` mediumtext DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `btn_name_lt` varchar(50) DEFAULT NULL,
  `btn_name_en` varchar(50) DEFAULT NULL,
  `btn_name_rus` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_lt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_rus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_pt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_es` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slugable_id` int(11) NOT NULL,
  `slugable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `slug_en`, `slug_lt`, `slug_rus`, `slug_pt`, `slug_es`, `slugable_id`, `slugable_type`, `created_at`, `updated_at`) VALUES
(1, 'smilkalai', 'smilkalai', 'smilkalai', 'smilkalai', 'smilkalai', 1, 'App\\Menu', '2021-09-25 02:30:39', '2021-09-25 02:30:39'),
(2, 'smilkalines', 'smilkalines', 'smilkalines', 'smilkalines', 'smilkalines', 2, 'App\\Menu', '2021-09-25 02:38:19', '2021-09-25 02:38:19'),
(4, 'smilkalai-1', 'smilkalai-1', 'smilkalai-1', 'smilkalai-1', 'smilkalai-1', 1, 'App\\Menu', '2021-09-25 02:45:37', '2021-09-25 02:45:37'),
(6, 'smilkalai-2', 'smilkalai-2', 'smilkalai-2', 'smilkalai-2', 'smilkalai-2', 1, 'App\\Menu', '2021-09-25 03:02:33', '2021-09-25 03:02:33'),
(7, 'smilkalines-1', 'smilkalines-1', 'smilkalines-1', 'smilkalines-1', 'smilkalines-1', 2, 'App\\Menu', '2021-09-25 03:02:54', '2021-09-25 03:02:54'),
(9, 'smilkalai-3', 'smilkalai-3', 'smilkalai-3', 'smilkalai-3', 'smilkalai-3', 1, 'App\\Menu', '2021-09-25 08:59:35', '2021-09-25 08:59:35'),
(11, 'papuosalaiakmenys', 'papuosalaiakmenys', 'papuosalaiakmenys', 'papuosalaiakmenys', 'papuosalaiakmenys', 5, 'App\\Menu', '2021-09-27 02:09:30', '2021-09-27 02:09:30'),
(15, 'smilkalines-2', 'smilkalines-2', 'smilkalines-2', 'smilkalines-2', 'smilkalines-2', 2, 'App\\Menu', '2021-09-27 04:39:41', '2021-09-27 04:39:41'),
(16, 'smilkalines-3', 'smilkalines-3', 'smilkalines-3', 'smilkalines-3', 'smilkalines-3', 2, 'App\\Menu', '2021-09-28 17:34:29', '2021-09-28 17:34:29'),
(17, 'smilkalines-4', 'smilkalines-4', 'smilkalines-4', 'smilkalines-4', 'smilkalines-4', 2, 'App\\Menu', '2021-09-29 14:19:53', '2021-09-29 14:19:53'),
(18, 'smilkalai-4', 'smilkalai-4', 'smilkalai-4', 'smilkalai-4', 'smilkalai-4', 1, 'App\\Menu', '2021-09-29 14:33:54', '2021-09-29 14:33:54'),
(26, 'smilkalines-9', 'smilkalines-9', 'smilkalines-9', 'smilkalines-9', 'smilkalines-9', 2, 'App\\Menu', '2021-09-30 04:52:32', '2021-09-30 04:52:32'),
(28, 'smilkalai-5', 'smilkalai-5', 'smilkalai-5', 'smilkalai-5', 'smilkalai-5', 1, 'App\\Menu', '2021-09-30 05:01:22', '2021-09-30 05:01:22'),
(30, 'smilkalines-a', 'smilkalines-a', 'smilkalines-a', 'smilkalines-a', 'smilkalines-a', 2, 'App\\Menu', '2021-09-30 05:04:21', '2021-09-30 05:04:21'),
(31, 'smilkalines-b', 'smilkalines-b', 'smilkalines-b', 'smilkalines-b', 'smilkalines-b', 2, 'App\\Menu', '2021-09-30 05:04:21', '2021-09-30 05:04:21'),
(32, 'smilkalines-c', 'smilkalines-c', 'smilkalines-c', 'smilkalines-c', 'smilkalines-c', 2, 'App\\Menu', '2021-09-30 05:04:28', '2021-09-30 05:04:28'),
(36, 'smilkalines-e', 'smilkalines-e', 'smilkalines-e', 'smilkalines-e', 'smilkalines-e', 2, 'App\\Menu', '2021-09-30 21:56:33', '2021-09-30 21:56:33'),
(38, 'papuosalaiakmenys-1', 'papuosalaiakmenys-1', 'papuosalaiakmenys-1', 'papuosalaiakmenys-1', 'papuosalaiakmenys-1', 5, 'App\\Menu', '2021-09-30 21:57:45', '2021-09-30 21:57:45'),
(39, 'smilkalai-6', 'smilkalai-6', 'smilkalai-6', 'smilkalai-6', 'smilkalai-6', 1, 'App\\Menu', '2021-09-30 21:57:51', '2021-09-30 21:57:51'),
(43, 'papuosalaiakmenys-2', 'papuosalaiakmenys-2', 'papuosalaiakmenys-2', 'papuosalaiakmenys-2', 'papuosalaiakmenys-2', 5, 'App\\Menu', '2021-10-04 09:27:12', '2021-10-04 09:27:12'),
(47, 'smilkalines-11', 'smilkalines-11', 'smilkalines-11', 'smilkalines-11', 'smilkalines-11', 2, 'App\\Menu', '2021-10-04 16:44:46', '2021-10-04 16:44:46'),
(52, 'papuosalaiakmenys-3', 'papuosalaiakmenys-3', 'papuosalaiakmenys-3', 'papuosalaiakmenys-3', 'papuosalaiakmenys-3', 5, 'App\\Menu', '2021-10-04 16:55:59', '2021-10-04 16:55:59'),
(57, 'inkrustuotos-akmenukais', 'inkrustuotos-akmenukais', 'inkrustuotos-akmenukais', 'inkrustuotos-akmenukais', 'inkrustuotos-akmenukais', 1, 'App\\SubMenu', '2021-10-04 17:22:50', '2021-10-04 17:22:50'),
(58, 'inkrustuotos-akmenukais-1', 'inkrustuotos-akmenukais-1', 'inkrustuotos-akmenukais-1', 'inkrustuotos-akmenukais-1', 'inkrustuotos-akmenukais-1', 1, 'App\\SubMenu', '2021-10-04 17:23:38', '2021-10-04 17:23:38'),
(60, 'smilkalines-5', 'smilkalines-5', 'smilkalines-5', 'smilkalines-5', 'smilkalines-5', 2, 'App\\Menu', '2021-10-06 05:12:22', '2021-10-06 05:12:22'),
(61, 'papuosalaiakmenys-4', 'papuosalaiakmenys-4', 'papuosalaiakmenys-4', 'papuosalaiakmenys-4', 'papuosalaiakmenys-4', 5, 'App\\Menu', '2021-10-06 09:21:46', '2021-10-06 09:21:46'),
(68, 'inkrustuotos-akmenukais-2', 'inkrustuotos-akmenukais-2', 'inkrustuotos-akmenukais-2', 'inkrustuotos-akmenukais-2', 'inkrustuotos-akmenukais-2', 1, 'App\\SubMenu', '2021-10-06 11:09:25', '2021-10-06 11:09:25'),
(69, 'smilkalai-7', 'smilkalai-7', 'smilkalai-7', 'smilkalai-7', 'smilkalai-7', 1, 'App\\Menu', '2021-10-07 08:25:41', '2021-10-07 08:25:41'),
(71, 'papuosalaiakmenys-5', 'papuosalaiakmenys-5', 'papuosalaiakmenys-5', 'papuosalaiakmenys-5', 'papuosalaiakmenys-5', 5, 'App\\Menu', '2021-10-07 08:26:29', '2021-10-07 08:26:29'),
(72, 'smilkalines-6', 'smilkalines-6', 'smilkalines-6', 'smilkalines-6', 'smilkalines-6', 2, 'App\\Menu', '2021-10-09 11:15:40', '2021-10-09 11:15:40'),
(73, 'inkrustuotos-akmenukais-3', 'inkrustuotos-akmenukais-3', 'inkrustuotos-akmenukais-3', 'inkrustuotos-akmenukais-3', 'inkrustuotos-akmenukais-3', 2, 'App\\SubMenu', '2021-10-09 11:51:59', '2021-10-09 11:51:59'),
(74, 'dezutes-smilkalams-2-viename', 'inkrustuotos-akmenukais-4', 'inkrustuotos-akmenukais-4', 'inkrustuotos-akmenukais-4', 'inkrustuotos-akmenukais-4', 2, 'App\\SubMenu', '2021-10-09 11:52:45', '2021-10-09 11:52:45'),
(75, 'dezutes-smilkalams-smilkalines-du-viename', 'inkrustuotos-akmenukais-5', 'inkrustuotos-akmenukais-5', 'inkrustuotos-akmenukais-5', 'inkrustuotos-akmenukais-5', 1, 'App\\SubMenu', '2021-10-09 11:53:33', '2021-10-09 11:53:33'),
(76, 'dezutes-smilkalams-2-viename-1', 'inkrustuotos-akmenukais-6', 'inkrustuotos-akmenukais-6', 'inkrustuotos-akmenukais-6', 'inkrustuotos-akmenukais-6', 2, 'App\\SubMenu', '2021-10-09 11:54:33', '2021-10-09 11:54:33'),
(77, 'dezutes-smilkalams-smilkalines-du-viename-1', 'inkrustuotos-akmenukais-7', 'inkrustuotos-akmenukais-7', 'inkrustuotos-akmenukais-7', 'inkrustuotos-akmenukais-7', 1, 'App\\SubMenu', '2021-10-09 14:41:43', '2021-10-09 14:41:43'),
(78, 'dezutes-smilkalams-2-viename-2', 'inkrustuotos-akmenukais-8', 'inkrustuotos-akmenukais-8', 'inkrustuotos-akmenukais-8', 'inkrustuotos-akmenukais-8', 2, 'App\\SubMenu', '2021-10-10 09:41:54', '2021-10-10 09:41:54'),
(79, 'inkrustuotos-akmenukais-4', 'inkrustuotos-akmenukais-9', 'inkrustuotos-akmenukais-9', 'inkrustuotos-akmenukais-9', 'inkrustuotos-akmenukais-9', 1, 'App\\SubMenu', '2021-10-10 09:45:05', '2021-10-10 09:45:05'),
(80, 'inkrustuotos-akmenukais-5', 'inkrustuotos-akmenukais-a', 'inkrustuotos-akmenukais-a', 'inkrustuotos-akmenukais-a', 'inkrustuotos-akmenukais-a', 1, 'App\\SubMenu', '2021-10-10 10:05:19', '2021-10-10 10:05:19'),
(81, 'dsgdf', 'dsgdf', 'dsgdf', 'dsgdf', 'dsgdf', 2, 'App\\SubMenu', '2021-10-10 10:37:42', '2021-10-10 10:37:42'),
(82, 'dsgdf-1', 'dsgdf-1', 'dsgdf-1', 'dsgdf-1', 'dsgdf-1', 2, 'App\\SubMenu', '2021-10-10 10:39:14', '2021-10-10 10:39:14'),
(83, 'inkrustuotos-akmenukais-6', 'inkrustuotos-akmenukais-b', 'inkrustuotos-akmenukais-b', 'inkrustuotos-akmenukais-b', 'inkrustuotos-akmenukais-b', 1, 'App\\SubMenu', '2021-10-10 10:58:30', '2021-10-10 10:58:30'),
(84, 'dfgfh', 'dfgfh', 'dfgfh', 'dfgfh', 'dfgfh', 2, 'App\\SubMenu', '2021-10-10 11:00:53', '2021-10-10 11:00:53'),
(85, 'dsfgfh', 'dsfgfh', 'dsfgfh', 'dsfgfh', 'dsfgfh', 3, 'App\\SubMenu', '2021-10-10 11:01:59', '2021-10-10 11:01:59'),
(86, 'safgvdshg', 'safgvdshg', 'safgvdshg', 'safgvdshg', 'safgvdshg', 4, 'App\\SubMenu', '2021-10-10 11:04:07', '2021-10-10 11:04:07'),
(87, 'gfjhgj', 'gfjhgj', 'gfjhgj', 'gfjhgj', 'gfjhgj', 5, 'App\\SubMenu', '2021-10-10 11:04:34', '2021-10-10 11:04:34'),
(88, 'test', 'test', 'test', 'test', 'test', 6, 'App\\Menu', '2021-10-10 11:06:12', '2021-10-10 11:06:12'),
(89, 'smilkalines-7', 'smilkalines-7', 'smilkalines-7', 'smilkalines-7', 'smilkalines-7', 2, 'App\\Menu', '2021-10-10 19:27:01', '2021-10-10 19:27:01'),
(90, 'inkrustuotos-akmenukais-7', 'inkrustuotos-akmenukais-c', 'inkrustuotos-akmenukais-c', 'inkrustuotos-akmenukais-c', 'inkrustuotos-akmenukais-c', 1, 'App\\SubMenu', '2021-10-10 19:27:43', '2021-10-10 19:27:43'),
(91, 'medines-dezutes-smilkalines-du-viename', 'medines-dezutes-smilkalines-du-viename', 'medines-dezutes-smilkalines-du-viename', 'medines-dezutes-smilkalines-du-viename', 'medines-dezutes-smilkalines-du-viename', 2, 'App\\SubMenu', '2021-10-13 08:24:20', '2021-10-13 08:24:20'),
(92, 'sidabro-spalvos-smilkalines', 'sidabro-spalvos-smilkalines', 'sidabro-spalvos-smilkalines', 'sidabro-spalvos-smilkalines', 'sidabro-spalvos-smilkalines', 3, 'App\\SubMenu', '2021-10-13 08:27:52', '2021-10-13 08:27:52'),
(93, 'aukso-spalvos-smilkalines', 'aukso-spalvos-smilkalines', 'aukso-spalvos-smilkalines', 'aukso-spalvos-smilkalines', 'aukso-spalvos-smilkalines', 4, 'App\\SubMenu', '2021-10-13 08:28:20', '2021-10-13 08:28:20'),
(94, 'smilkalines-8', 'smilkalines-8', 'smilkalines-8', 'smilkalines-8', 'smilkalines-8', 2, 'App\\Menu', '2021-10-13 08:28:23', '2021-10-13 08:28:23'),
(95, 'apvalios-smilkalines', 'apvalios-smilkalines', 'apvalios-smilkalines', 'apvalios-smilkalines', 'apvalios-smilkalines', 5, 'App\\SubMenu', '2021-10-13 08:42:57', '2021-10-13 08:42:57'),
(96, 'smilkalines-d', 'smilkalines-d', 'smilkalines-d', 'smilkalines-d', 'smilkalines-d', 2, 'App\\Menu', '2021-10-13 12:42:03', '2021-10-13 12:42:03'),
(97, 'kitos-prekes', 'kitos-prekes', 'kitos-prekes', 'kitos-prekes', 'kitos-prekes', 7, 'App\\Menu', '2021-10-13 17:23:59', '2021-10-13 17:23:59'),
(98, 'inkrustuotos-akmenukais-8', 'inkrustuotos-akmenukais-d', 'inkrustuotos-akmenukais-d', 'inkrustuotos-akmenukais-d', 'inkrustuotos-akmenukais-d', 1, 'App\\SubMenu', '2021-10-13 17:25:33', '2021-10-13 17:25:33'),
(103, 'papuosalaiakmenys-6', 'papuosalaiakmenys-6', 'papuosalaiakmenys-6', 'papuosalaiakmenys-6', 'papuosalaiakmenys-6', 5, 'App\\Menu', '2021-10-13 17:28:45', '2021-10-13 17:28:45'),
(113, 'grojantys-dubenys', 'grojantys-dubenys', 'grojantys-dubenys', 'grojantys-dubenys', 'grojantys-dubenys', 6, 'App\\SubMenu', '2021-10-13 17:35:52', '2021-10-13 17:35:52'),
(114, 'kitos-prekes-1', 'kitos-prekes-1', 'kitos-prekes-1', 'kitos-prekes-1', 'kitos-prekes-1', 7, 'App\\Menu', '2021-10-13 17:38:04', '2021-10-13 17:38:04'),
(115, 'grojantys-dubenys-1', 'grojantys-dubenys-1', 'grojantys-dubenys-1', 'grojantys-dubenys-1', 'grojantys-dubenys-1', 6, 'App\\SubMenu', '2021-10-13 17:38:07', '2021-10-13 17:38:07'),
(116, 'kitos-prekes-2', 'kitos-prekes-2', 'kitos-prekes-2', 'kitos-prekes-2', 'kitos-prekes-2', 7, 'App\\Menu', '2021-10-13 17:40:52', '2021-10-13 17:40:52'),
(117, 'apvalios-smilkalines-1', 'apvalios-smilkalines-1', 'apvalios-smilkalines-1', 'apvalios-smilkalines-1', 'apvalios-smilkalines-1', 5, 'App\\SubMenu', '2021-10-13 17:42:20', '2021-10-13 17:42:20'),
(118, 'medines-dezutes-smilkalines-du-viename-1', 'medines-dezutes-smilkalines-du-viename-1', 'medines-dezutes-smilkalines-du-viename-1', 'medines-dezutes-smilkalines-du-viename-1', 'medines-dezutes-smilkalines-du-viename-1', 2, 'App\\SubMenu', '2021-10-13 17:43:33', '2021-10-13 17:43:33'),
(119, 'aukso-spalvos-smilkalines-1', 'aukso-spalvos-smilkalines-1', 'aukso-spalvos-smilkalines-1', 'aukso-spalvos-smilkalines-1', 'aukso-spalvos-smilkalines-1', 4, 'App\\SubMenu', '2021-10-13 17:43:38', '2021-10-13 17:43:38'),
(121, 'apvalios-smilkalines-2', 'apvalios-smilkalines-2', 'apvalios-smilkalines-2', 'apvalios-smilkalines-2', 'apvalios-smilkalines-2', 5, 'App\\SubMenu', '2021-10-13 17:46:30', '2021-10-13 17:46:30'),
(123, 'apvalios-smilkalines-3', 'apvalios-smilkalines-3', 'apvalios-smilkalines-3', 'apvalios-smilkalines-3', 'apvalios-smilkalines-3', 5, 'App\\SubMenu', '2021-10-13 17:52:08', '2021-10-13 17:52:08'),
(124, 'apvalios-smilkalines-4', 'apvalios-smilkalines-4', 'apvalios-smilkalines-4', 'apvalios-smilkalines-4', 'apvalios-smilkalines-4', 5, 'App\\SubMenu', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(125, 'apvalios-smilkalines-5', 'apvalios-smilkalines-5', 'apvalios-smilkalines-5', 'apvalios-smilkalines-5', 'apvalios-smilkalines-5', 5, 'App\\SubMenu', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(126, 'apvalios-smilkalines-6', 'apvalios-smilkalines-6', 'apvalios-smilkalines-6', 'apvalios-smilkalines-6', 'apvalios-smilkalines-6', 5, 'App\\SubMenu', '2021-10-13 17:52:09', '2021-10-13 17:52:09'),
(127, 'kitos-prekes-3', 'kitos-prekes-3', 'kitos-prekes-3', 'kitos-prekes-3', 'kitos-prekes-3', 7, 'App\\Menu', '2021-10-14 15:09:59', '2021-10-14 15:09:59'),
(129, 'apvalios-smilkalines-7', 'apvalios-smilkalines-7', 'apvalios-smilkalines-7', 'apvalios-smilkalines-7', 'apvalios-smilkalines-7', 5, 'App\\SubMenu', '2021-10-16 07:38:44', '2021-10-16 07:38:44'),
(130, 'smilkalines-f', 'smilkalines-f', 'smilkalines-f', 'smilkalines-f', 'smilkalines-f', 2, 'App\\Menu', '2021-10-17 08:08:50', '2021-10-17 08:08:50'),
(131, 'grojantys-dubenys-2', 'grojantys-dubenys-2', 'grojantys-dubenys-2', 'grojantys-dubenys-2', 'grojantys-dubenys-2', 6, 'App\\SubMenu', '2021-10-17 08:08:55', '2021-10-17 08:08:55'),
(132, 'kitos-prekes-4', 'kitos-prekes-4', 'kitos-prekes-4', 'kitos-prekes-4', 'kitos-prekes-4', 7, 'App\\Menu', '2021-10-17 08:09:08', '2021-10-17 08:09:08'),
(133, 'kitos-prekes-5', 'kitos-prekes-5', 'kitos-prekes-5', 'kitos-prekes-5', 'kitos-prekes-5', 7, 'App\\Menu', '2021-10-17 16:35:20', '2021-10-17 16:35:20'),
(135, 'papuosalaiakmenys-7', 'papuosalaiakmenys-7', 'papuosalaiakmenys-7', 'papuosalaiakmenys-7', 'papuosalaiakmenys-7', 5, 'App\\Menu', '2021-10-18 05:34:11', '2021-10-18 05:34:11'),
(136, 'smilkalai-8', 'smilkalai-8', 'smilkalai-8', 'smilkalai-8', 'smilkalai-8', 1, 'App\\Menu', '2021-10-18 05:34:30', '2021-10-18 05:34:30'),
(137, 'smilkalines-10', 'smilkalines-10', 'smilkalines-10', 'smilkalines-10', 'smilkalines-10', 2, 'App\\Menu', '2021-10-18 05:34:35', '2021-10-18 05:34:35'),
(143, 'kitos-prekes-6', 'kitos-prekes-6', 'kitos-prekes-6', 'kitos-prekes-6', 'kitos-prekes-6', 7, 'App\\Menu', '2021-10-18 05:56:36', '2021-10-18 05:56:36'),
(144, 'kitos-prekes-7', 'kitos-prekes-7', 'kitos-prekes-7', 'kitos-prekes-7', 'kitos-prekes-7', 7, 'App\\Menu', '2021-10-18 05:56:50', '2021-10-18 05:56:50'),
(145, 'kitos-prekes-8', 'kitos-prekes-8', 'kitos-prekes-8', 'kitos-prekes-8', 'kitos-prekes-8', 7, 'App\\Menu', '2021-10-18 05:57:25', '2021-10-18 05:57:25'),
(146, 'grojantys-dubenys-3', 'grojantys-dubenys-3', 'grojantys-dubenys-3', 'grojantys-dubenys-3', 'grojantys-dubenys-3', 6, 'App\\SubMenu', '2021-10-18 06:01:03', '2021-10-18 06:01:03'),
(147, 'grojantys-dubenys-4', 'grojantys-dubenys-4', 'grojantys-dubenys-4', 'grojantys-dubenys-4', 'grojantys-dubenys-4', 6, 'App\\SubMenu', '2021-10-18 06:01:44', '2021-10-18 06:01:44'),
(150, 'kitos-prekes-9', 'kitos-prekes-9', 'kitos-prekes-9', 'kitos-prekes-9', 'kitos-prekes-9', 7, 'App\\Menu', '2021-10-18 07:03:06', '2021-10-18 07:03:06'),
(151, 'papuosalaiakmenys-8', 'papuosalaiakmenys-8', 'papuosalaiakmenys-8', 'papuosalaiakmenys-8', 'papuosalaiakmenys-8', 5, 'App\\Menu', '2021-10-18 07:03:13', '2021-10-18 07:03:13'),
(159, 'smilkalines-12', 'smilkalines-12', 'smilkalines-12', 'smilkalines-12', 'smilkalines-12', 2, 'App\\Menu', '2021-10-18 07:22:52', '2021-10-18 07:22:52'),
(160, 'papuosalaiakmenys-9', 'papuosalaiakmenys-9', 'papuosalaiakmenys-9', 'papuosalaiakmenys-9', 'papuosalaiakmenys-9', 5, 'App\\Menu', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(161, 'smilkalines-13', 'smilkalines-13', 'smilkalines-13', 'smilkalines-13', 'smilkalines-13', 2, 'App\\Menu', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(162, 'papuosalaiakmenys-a', 'papuosalaiakmenys-a', 'papuosalaiakmenys-a', 'papuosalaiakmenys-a', 'papuosalaiakmenys-a', 5, 'App\\Menu', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(163, 'smilkalines-14', 'smilkalines-14', 'smilkalines-14', 'smilkalines-14', 'smilkalines-14', 2, 'App\\Menu', '2021-10-18 07:22:53', '2021-10-18 07:22:53'),
(165, 'apvalios-smilkalines-8', 'apvalios-smilkalines-8', 'apvalios-smilkalines-8', 'apvalios-smilkalines-8', 'apvalios-smilkalines-8', 5, 'App\\SubMenu', '2021-10-18 07:26:47', '2021-10-18 07:26:47'),
(170, 'smilkalines-15', 'smilkalines-15', 'smilkalines-15', 'smilkalines-15', 'smilkalines-15', 2, 'App\\Menu', '2021-10-20 04:56:31', '2021-10-20 04:56:31'),
(176, 'smilkalines-16', 'smilkalines-16', 'smilkalines-16', 'smilkalines-16', 'smilkalines-16', 2, 'App\\Menu', '2021-10-20 10:24:11', '2021-10-20 10:24:11'),
(177, 'apvalios-smilkalines-9', 'apvalios-smilkalines-9', 'apvalios-smilkalines-9', 'apvalios-smilkalines-9', 'apvalios-smilkalines-9', 5, 'App\\SubMenu', '2021-10-20 10:44:07', '2021-10-20 10:44:07'),
(184, 'smilkalines-17', 'smilkalines-17', 'smilkalines-17', 'smilkalines-17', 'smilkalines-17', 2, 'App\\Menu', '2021-10-20 16:03:13', '2021-10-20 16:03:13'),
(186, 'apvalios-smilkalines-a', 'apvalios-smilkalines-a', 'apvalios-smilkalines-a', 'apvalios-smilkalines-a', 'apvalios-smilkalines-a', 5, 'App\\SubMenu', '2021-10-20 16:06:00', '2021-10-20 16:06:00'),
(187, 'sidabro-spalvos-smilkalines-1', 'sidabro-spalvos-smilkalines-1', 'sidabro-spalvos-smilkalines-1', 'sidabro-spalvos-smilkalines-1', 'sidabro-spalvos-smilkalines-1', 3, 'App\\SubMenu', '2021-10-20 16:06:04', '2021-10-20 16:06:04'),
(188, 'medines-dezutes-smilkalines-du-viename-2', 'medines-dezutes-smilkalines-du-viename-2', 'medines-dezutes-smilkalines-du-viename-2', 'medines-dezutes-smilkalines-du-viename-2', 'medines-dezutes-smilkalines-du-viename-2', 2, 'App\\SubMenu', '2021-10-20 16:06:08', '2021-10-20 16:06:08'),
(192, 'smilkalines-18', 'smilkalines-18', 'smilkalines-18', 'smilkalines-18', 'smilkalines-18', 2, 'App\\Menu', '2021-10-21 06:37:01', '2021-10-21 06:37:01'),
(193, 'smilkalines-19', 'smilkalines-19', 'smilkalines-19', 'smilkalines-19', 'smilkalines-19', 2, 'App\\Menu', '2021-10-21 06:40:51', '2021-10-21 06:40:51'),
(196, 'aukso-spalvos-smilkalines-2', 'aukso-spalvos-smilkalines-2', 'aukso-spalvos-smilkalines-2', 'aukso-spalvos-smilkalines-2', 'aukso-spalvos-smilkalines-2', 4, 'App\\SubMenu', '2021-10-28 06:01:54', '2021-10-28 06:01:54'),
(197, 'apvalios-smilkalines-b', 'apvalios-smilkalines-b', 'apvalios-smilkalines-b', 'apvalios-smilkalines-b', 'apvalios-smilkalines-b', 5, 'App\\SubMenu', '2021-10-28 06:02:00', '2021-10-28 06:02:00'),
(198, 'sidabro-spalvos-smilkalines-2', 'sidabro-spalvos-smilkalines-2', 'sidabro-spalvos-smilkalines-2', 'sidabro-spalvos-smilkalines-2', 'sidabro-spalvos-smilkalines-2', 3, 'App\\SubMenu', '2021-10-28 13:42:58', '2021-10-28 13:42:58'),
(199, 'medines-dezutes-smilkalines-du-viename-3', 'medines-dezutes-smilkalines-du-viename-3', 'medines-dezutes-smilkalines-du-viename-3', 'medines-dezutes-smilkalines-du-viename-3', 'medines-dezutes-smilkalines-du-viename-3', 2, 'App\\SubMenu', '2021-10-28 13:43:01', '2021-10-28 13:43:01'),
(200, 'inkrustuotos-akmenukais-9', 'inkrustuotos-akmenukais-e', 'inkrustuotos-akmenukais-e', 'inkrustuotos-akmenukais-e', 'inkrustuotos-akmenukais-e', 1, 'App\\SubMenu', '2021-10-28 13:43:15', '2021-10-28 13:43:15'),
(240, 'grojantys-dubenys-5', 'grojantys-dubenys-5', 'grojantys-dubenys-5', 'grojantys-dubenys-5', 'grojantys-dubenys-5', 6, 'App\\SubMenu', '2021-10-28 17:44:22', '2021-10-28 17:44:22'),
(246, 'grojantys-dubenys-6', 'grojantys-dubenys-6', 'grojantys-dubenys-6', 'grojantys-dubenys-6', 'grojantys-dubenys-6', 6, 'App\\SubMenu', '2021-10-28 18:04:14', '2021-10-28 18:04:14'),
(247, 'grojantys-dubenys-7', 'grojantys-dubenys-7', 'grojantys-dubenys-7', 'grojantys-dubenys-7', 'grojantys-dubenys-7', 6, 'App\\SubMenu', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(248, 'grojantys-dubenys-8', 'grojantys-dubenys-8', 'grojantys-dubenys-8', 'grojantys-dubenys-8', 'grojantys-dubenys-8', 6, 'App\\SubMenu', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(249, 'grojantys-dubenys-9', 'grojantys-dubenys-9', 'grojantys-dubenys-9', 'grojantys-dubenys-9', 'grojantys-dubenys-9', 6, 'App\\SubMenu', '2021-10-28 18:04:15', '2021-10-28 18:04:15'),
(250, 'grojantys-dubenys-a', 'grojantys-dubenys-a', 'grojantys-dubenys-a', 'grojantys-dubenys-a', 'grojantys-dubenys-a', 6, 'App\\SubMenu', '2021-10-28 18:04:21', '2021-10-28 18:04:21'),
(251, 'transcendentines-kriaukles', 'transcendentines-kriaukles', 'transcendentines-kriaukles', 'transcendentines-kriaukles', 'transcendentines-kriaukles', 7, 'App\\SubMenu', '2021-10-28 18:08:00', '2021-10-28 18:08:00'),
(253, 'transcendentines-kriaukles-1', 'transcendentines-kriaukles-1', 'transcendentines-kriaukles-1', 'transcendentines-kriaukles-1', 'transcendentines-kriaukles-1', 7, 'App\\SubMenu', '2021-10-28 18:11:56', '2021-10-28 18:11:56'),
(256, 'grojantys-dubenys-b', 'grojantys-dubenys-b', 'grojantys-dubenys-b', 'grojantys-dubenys-b', 'grojantys-dubenys-b', 6, 'App\\SubMenu', '2021-10-28 18:25:34', '2021-10-28 18:25:34'),
(258, 'grojantys-dubenys-c', 'grojantys-dubenys-c', 'grojantys-dubenys-c', 'grojantys-dubenys-c', 'grojantys-dubenys-c', 6, 'App\\SubMenu', '2021-10-28 18:28:46', '2021-10-28 18:28:46'),
(260, 'grojantys-dubenys-d', 'grojantys-dubenys-d', 'grojantys-dubenys-d', 'grojantys-dubenys-d', 'grojantys-dubenys-d', 6, 'App\\SubMenu', '2021-10-29 02:02:57', '2021-10-29 02:02:57'),
(261, 'grojantys-dubenys-e', 'grojantys-dubenys-e', 'grojantys-dubenys-e', 'grojantys-dubenys-e', 'grojantys-dubenys-e', 6, 'App\\SubMenu', '2021-10-29 02:33:30', '2021-10-29 02:33:30'),
(262, 'grojantys-dubenys-f', 'grojantys-dubenys-f', 'grojantys-dubenys-f', 'grojantys-dubenys-f', 'grojantys-dubenys-f', 6, 'App\\SubMenu', '2021-10-29 03:52:13', '2021-10-29 03:52:13'),
(263, 'grojantys-dubenys-10', 'grojantys-dubenys-10', 'grojantys-dubenys-10', 'grojantys-dubenys-10', 'grojantys-dubenys-10', 6, 'App\\SubMenu', '2021-10-29 04:15:57', '2021-10-29 04:15:57'),
(264, 'grojantys-dubenys-11', 'grojantys-dubenys-11', 'grojantys-dubenys-11', 'grojantys-dubenys-11', 'grojantys-dubenys-11', 6, 'App\\SubMenu', '2021-10-29 04:16:04', '2021-10-29 04:16:04'),
(265, 'transcendentines-kriaukles-2', 'transcendentines-kriaukles-2', 'transcendentines-kriaukles-2', 'transcendentines-kriaukles-2', 'transcendentines-kriaukles-2', 7, 'App\\SubMenu', '2021-10-29 04:16:19', '2021-10-29 04:16:19'),
(266, 'papuosalaiakmenys-b', 'papuosalaiakmenys-b', 'papuosalaiakmenys-b', 'papuosalaiakmenys-b', 'papuosalaiakmenys-b', 5, 'App\\Menu', '2021-10-29 04:17:28', '2021-10-29 04:17:28'),
(267, 'smilkalai-9', 'smilkalai-9', 'smilkalai-9', 'smilkalai-9', 'smilkalai-9', 1, 'App\\Menu', '2021-10-29 04:17:39', '2021-10-29 04:17:39'),
(275, 'smilkalines-1a', 'smilkalines-1a', 'smilkalines-1a', 'smilkalines-1a', 'smilkalines-1a', 2, 'App\\Menu', '2021-10-29 10:17:15', '2021-10-29 10:17:15'),
(277, 'papuosalaiakmenys-c', 'papuosalaiakmenys-c', 'papuosalaiakmenys-c', 'papuosalaiakmenys-c', 'papuosalaiakmenys-c', 5, 'App\\Menu', '2021-10-29 10:21:24', '2021-10-29 10:21:24'),
(278, 'kitos-prekes-a', 'kitos-prekes-a', 'kitos-prekes-a', 'kitos-prekes-a', 'kitos-prekes-a', 7, 'App\\Menu', '2021-10-29 10:21:28', '2021-10-29 10:21:28'),
(279, 'smilkalai-a', 'smilkalai-a', 'smilkalai-a', 'smilkalai-a', 'smilkalai-a', 1, 'App\\Menu', '2021-10-29 10:21:31', '2021-10-29 10:21:31'),
(283, 'grojantys-dubenys-12', 'grojantys-dubenys-12', 'grojantys-dubenys-12', 'grojantys-dubenys-12', 'grojantys-dubenys-12', 6, 'App\\SubMenu', '2021-10-29 11:17:32', '2021-10-29 11:17:32'),
(284, 'grojantys-dubenys-13', 'grojantys-dubenys-13', 'grojantys-dubenys-13', 'grojantys-dubenys-13', 'grojantys-dubenys-13', 6, 'App\\SubMenu', '2021-10-29 18:47:08', '2021-10-29 18:47:08'),
(285, 'grojantys-dubenys-14', 'grojantys-dubenys-14', 'grojantys-dubenys-14', 'grojantys-dubenys-14', 'grojantys-dubenys-14', 6, 'App\\SubMenu', '2021-10-30 04:52:12', '2021-10-30 04:52:12'),
(286, 'grojantys-dubenys-15', 'grojantys-dubenys-15', 'grojantys-dubenys-15', 'grojantys-dubenys-15', 'grojantys-dubenys-15', 6, 'App\\SubMenu', '2021-10-30 12:13:54', '2021-10-30 12:13:54'),
(288, 'smilkalines-1b', 'smilkalines-1b', 'smilkalines-1b', 'smilkalines-1b', 'smilkalines-1b', 2, 'App\\Menu', '2021-10-31 11:37:18', '2021-10-31 11:37:18'),
(293, 'smilkalines-1c', 'smilkalines-1c', 'smilkalines-1c', 'smilkalines-1c', 'smilkalines-1c', 2, 'App\\Menu', '2021-11-10 03:59:53', '2021-11-10 03:59:53'),
(296, 'grojantys-dubenys-16', 'grojantys-dubenys-16', 'grojantys-dubenys-16', 'grojantys-dubenys-16', 'grojantys-dubenys-16', 6, 'App\\SubMenu', '2021-11-11 11:09:29', '2021-11-11 11:09:29'),
(297, 'grojantys-dubenys-17', 'grojantys-dubenys-17', 'grojantys-dubenys-17', 'grojantys-dubenys-17', 'grojantys-dubenys-17', 6, 'App\\SubMenu', '2021-11-11 11:09:29', '2021-11-11 11:09:29'),
(298, 'grojantys-dubenys-18', 'grojantys-dubenys-18', 'grojantys-dubenys-18', 'grojantys-dubenys-18', 'grojantys-dubenys-18', 6, 'App\\SubMenu', '2021-11-12 07:28:58', '2021-11-12 07:28:58'),
(299, 'grojantys-dubenys-19', 'grojantys-dubenys-19', 'grojantys-dubenys-19', 'grojantys-dubenys-19', 'grojantys-dubenys-19', 6, 'App\\SubMenu', '2021-11-12 07:30:50', '2021-11-12 07:30:50'),
(300, 'grojantys-dubenys-1a', 'grojantys-dubenys-1a', 'grojantys-dubenys-1a', 'grojantys-dubenys-1a', 'grojantys-dubenys-1a', 6, 'App\\SubMenu', '2021-11-15 14:10:45', '2021-11-15 14:10:45'),
(301, 'papuosalaiakmenys-d', 'papuosalaiakmenys-d', 'papuosalaiakmenys-d', 'papuosalaiakmenys-d', 'papuosalaiakmenys-d', 5, 'App\\Menu', '2021-11-22 07:40:19', '2021-11-22 07:40:19'),
(303, 'smilkalai-b', 'smilkalai-b', 'smilkalai-b', 'smilkalai-b', 'smilkalai-b', 1, 'App\\Menu', '2021-11-25 04:43:02', '2021-11-25 04:43:02'),
(305, 'smilkalines-1d', 'smilkalines-1d', 'smilkalines-1d', 'smilkalines-1d', 'smilkalines-1d', 2, 'App\\Menu', '2021-11-25 04:43:15', '2021-11-25 04:43:15'),
(311, 'kitos-prekes-b', 'kitos-prekes-b', 'kitos-prekes-b', 'kitos-prekes-b', 'kitos-prekes-b', 7, 'App\\Menu', '2021-11-25 08:49:07', '2021-11-25 08:49:07'),
(313, 'kitos-prekes-c', 'kitos-prekes-c', 'kitos-prekes-c', 'kitos-prekes-c', 'kitos-prekes-c', 7, 'App\\Menu', '2021-11-25 11:35:17', '2021-11-25 11:35:17'),
(314, 'papuosalaiakmenys-e', 'papuosalaiakmenys-e', 'papuosalaiakmenys-e', 'papuosalaiakmenys-e', 'papuosalaiakmenys-e', 5, 'App\\Menu', '2021-11-25 11:35:24', '2021-11-25 11:35:24'),
(315, 'smilkalines-1e', 'smilkalines-1e', 'smilkalines-1e', 'smilkalines-1e', 'smilkalines-1e', 2, 'App\\Menu', '2021-11-25 11:35:26', '2021-11-25 11:35:26'),
(316, 'papuosalaiakmenys-f', 'papuosalaiakmenys-f', 'papuosalaiakmenys-f', 'papuosalaiakmenys-f', 'papuosalaiakmenys-f', 5, 'App\\Menu', '2021-11-25 11:50:12', '2021-11-25 11:50:12'),
(318, 'smilkalines-1f', 'smilkalines-1f', 'smilkalines-1f', 'smilkalines-1f', 'smilkalines-1f', 2, 'App\\Menu', '2021-11-26 19:39:20', '2021-11-26 19:39:20'),
(319, 'smilkalines-20', 'smilkalines-20', 'smilkalines-20', 'smilkalines-20', 'smilkalines-20', 2, 'App\\Menu', '2021-11-26 19:39:46', '2021-11-26 19:39:46'),
(320, 'inkrustuotos-akmenukais-a', 'inkrustuotos-akmenukais-f', 'inkrustuotos-akmenukais-f', 'inkrustuotos-akmenukais-f', 'inkrustuotos-akmenukais-f', 1, 'App\\SubMenu', '2021-11-26 19:39:46', '2021-11-26 19:39:46'),
(321, 'apvalios-smilkalines-c', 'apvalios-smilkalines-c', 'apvalios-smilkalines-c', 'apvalios-smilkalines-c', 'apvalios-smilkalines-c', 5, 'App\\SubMenu', '2021-11-26 19:39:49', '2021-11-26 19:39:49'),
(322, 'medines-dezutes-smilkalines-du-viename-4', 'medines-dezutes-smilkalines-du-viename-4', 'medines-dezutes-smilkalines-du-viename-4', 'medines-dezutes-smilkalines-du-viename-4', 'medines-dezutes-smilkalines-du-viename-4', 2, 'App\\SubMenu', '2021-11-26 19:39:54', '2021-11-26 19:39:54'),
(323, 'smilkalines-21', 'smilkalines-21', 'smilkalines-21', 'smilkalines-21', 'smilkalines-21', 2, 'App\\Menu', '2021-11-26 19:39:54', '2021-11-26 19:39:54'),
(324, 'aukso-spalvos-smilkalines-3', 'aukso-spalvos-smilkalines-3', 'aukso-spalvos-smilkalines-3', 'aukso-spalvos-smilkalines-3', 'aukso-spalvos-smilkalines-3', 4, 'App\\SubMenu', '2021-11-26 19:39:59', '2021-11-26 19:39:59'),
(325, 'smilkalai-c', 'smilkalai-c', 'smilkalai-c', 'smilkalai-c', 'smilkalai-c', 1, 'App\\Menu', '2021-11-26 19:40:03', '2021-11-26 19:40:03'),
(327, 'papuosalaiakmenys-10', 'papuosalaiakmenys-10', 'papuosalaiakmenys-10', 'papuosalaiakmenys-10', 'papuosalaiakmenys-10', 5, 'App\\Menu', '2021-11-26 19:40:13', '2021-11-26 19:40:13'),
(336, 'papuosalaiakmenys-11', 'papuosalaiakmenys-11', 'papuosalaiakmenys-11', 'papuosalaiakmenys-11', 'papuosalaiakmenys-11', 5, 'App\\Menu', '2021-11-26 19:44:40', '2021-11-26 19:44:40'),
(337, 'sidabro-spalvos-smilkalines-3', 'sidabro-spalvos-smilkalines-3', 'sidabro-spalvos-smilkalines-3', 'sidabro-spalvos-smilkalines-3', 'sidabro-spalvos-smilkalines-3', 3, 'App\\SubMenu', '2021-11-26 19:45:19', '2021-11-26 19:45:19'),
(338, 'smilkalines-22', 'smilkalines-22', 'smilkalines-22', 'smilkalines-22', 'smilkalines-22', 2, 'App\\Menu', '2021-11-26 20:02:17', '2021-11-26 20:02:17'),
(339, 'smilkalai-d', 'smilkalai-d', 'smilkalai-d', 'smilkalai-d', 'smilkalai-d', 1, 'App\\Menu', '2021-11-26 20:02:54', '2021-11-26 20:02:54'),
(341, 'kitos-prekes-d', 'kitos-prekes-d', 'kitos-prekes-d', 'kitos-prekes-d', 'kitos-prekes-d', 7, 'App\\Menu', '2021-11-26 20:43:59', '2021-11-26 20:43:59'),
(342, 'papuosalaiakmenys-12', 'papuosalaiakmenys-12', 'papuosalaiakmenys-12', 'papuosalaiakmenys-12', 'papuosalaiakmenys-12', 5, 'App\\Menu', '2021-11-26 20:45:41', '2021-11-26 20:45:41'),
(344, 'smilkalai-e', 'smilkalai-e', 'smilkalai-e', 'smilkalai-e', 'smilkalai-e', 1, 'App\\Menu', '2021-11-26 20:46:08', '2021-11-26 20:46:08'),
(345, 'smilkalines-23', 'smilkalines-23', 'smilkalines-23', 'smilkalines-23', 'smilkalines-23', 2, 'App\\Menu', '2021-11-26 20:46:39', '2021-11-26 20:46:39'),
(346, 'sidabro-spalvos-smilkalines-4', 'sidabro-spalvos-smilkalines-4', 'sidabro-spalvos-smilkalines-4', 'sidabro-spalvos-smilkalines-4', 'sidabro-spalvos-smilkalines-4', 3, 'App\\SubMenu', '2021-11-26 20:48:26', '2021-11-26 20:48:26'),
(348, 'apvalios-smilkalines-d', 'apvalios-smilkalines-d', 'apvalios-smilkalines-d', 'apvalios-smilkalines-d', 'apvalios-smilkalines-d', 5, 'App\\SubMenu', '2021-11-26 20:50:27', '2021-11-26 20:50:27'),
(349, 'smilkalines-24', 'smilkalines-24', 'smilkalines-24', 'smilkalines-24', 'smilkalines-24', 2, 'App\\Menu', '2021-11-26 21:26:25', '2021-11-26 21:26:25'),
(352, 'papuosalaiakmenys-13', 'papuosalaiakmenys-13', 'papuosalaiakmenys-13', 'papuosalaiakmenys-13', 'papuosalaiakmenys-13', 5, 'App\\Menu', '2021-11-26 21:27:19', '2021-11-26 21:27:19'),
(353, 'smilkalai-f', 'smilkalai-f', 'smilkalai-f', 'smilkalai-f', 'smilkalai-f', 1, 'App\\Menu', '2021-11-26 21:27:25', '2021-11-26 21:27:25'),
(354, 'kitos-prekes-e', 'kitos-prekes-e', 'kitos-prekes-e', 'kitos-prekes-e', 'kitos-prekes-e', 7, 'App\\Menu', '2021-11-26 21:27:32', '2021-11-26 21:27:32'),
(356, 'papuosalaiakmenys-14', 'papuosalaiakmenys-14', 'papuosalaiakmenys-14', 'papuosalaiakmenys-14', 'papuosalaiakmenys-14', 5, 'App\\Menu', '2021-11-27 05:47:59', '2021-11-27 05:47:59'),
(357, 'smilkalines-25', 'smilkalines-25', 'smilkalines-25', 'smilkalines-25', 'smilkalines-25', 2, 'App\\Menu', '2021-11-27 06:33:48', '2021-11-27 06:33:48'),
(358, 'smilkalines-26', 'smilkalines-26', 'smilkalines-26', 'smilkalines-26', 'smilkalines-26', 2, 'App\\Menu', '2021-11-27 06:37:36', '2021-11-27 06:37:36'),
(359, 'smilkalines-27', 'smilkalines-27', 'smilkalines-27', 'smilkalines-27', 'smilkalines-27', 2, 'App\\Menu', '2021-11-27 07:16:24', '2021-11-27 07:16:24'),
(362, 'papuosalaiakmenys-15', 'papuosalaiakmenys-15', 'papuosalaiakmenys-15', 'papuosalaiakmenys-15', 'papuosalaiakmenys-15', 5, 'App\\Menu', '2021-11-27 07:18:18', '2021-11-27 07:18:18'),
(363, 'smilkalines-28', 'smilkalines-28', 'smilkalines-28', 'smilkalines-28', 'smilkalines-28', 2, 'App\\Menu', '2021-11-27 07:48:43', '2021-11-27 07:48:43'),
(365, 'papuosalaiakmenys-16', 'papuosalaiakmenys-16', 'papuosalaiakmenys-16', 'papuosalaiakmenys-16', 'papuosalaiakmenys-16', 5, 'App\\Menu', '2021-11-27 08:40:02', '2021-11-27 08:40:02'),
(366, 'smilkalai-10', 'smilkalai-10', 'smilkalai-10', 'smilkalai-10', 'smilkalai-10', 1, 'App\\Menu', '2021-11-27 08:40:33', '2021-11-27 08:40:33'),
(367, 'smilkalines-29', 'smilkalines-29', 'smilkalines-29', 'smilkalines-29', 'smilkalines-29', 2, 'App\\Menu', '2021-11-27 08:40:43', '2021-11-27 08:40:43'),
(371, 'papuosalaiakmenys-17', 'papuosalaiakmenys-17', 'papuosalaiakmenys-17', 'papuosalaiakmenys-17', 'papuosalaiakmenys-17', 5, 'App\\Menu', '2021-11-27 09:38:47', '2021-11-27 09:38:47'),
(372, 'kitos-prekes-f', 'kitos-prekes-f', 'kitos-prekes-f', 'kitos-prekes-f', 'kitos-prekes-f', 7, 'App\\Menu', '2021-11-27 09:38:52', '2021-11-27 09:38:52'),
(373, 'smilkalai-11', 'smilkalai-11', 'smilkalai-11', 'smilkalai-11', 'smilkalai-11', 1, 'App\\Menu', '2021-11-27 09:39:15', '2021-11-27 09:39:15'),
(377, 'smilkalai-12', 'smilkalai-12', 'smilkalai-12', 'smilkalai-12', 'smilkalai-12', 1, 'App\\Menu', '2021-11-30 07:56:53', '2021-11-30 07:56:53'),
(379, 'papuosalaiakmenys-18', 'papuosalaiakmenys-18', 'papuosalaiakmenys-18', 'papuosalaiakmenys-18', 'papuosalaiakmenys-18', 5, 'App\\Menu', '2021-12-01 05:12:45', '2021-12-01 05:12:45'),
(400, 'smilkalines-2a', 'smilkalines-2a', 'smilkalines-2a', 'smilkalines-2a', 'smilkalines-2a', 2, 'App\\Menu', '2021-12-02 10:44:47', '2021-12-02 10:44:47'),
(404, 'kitos-prekes-10', 'kitos-prekes-10', 'kitos-prekes-10', 'kitos-prekes-10', 'kitos-prekes-10', 7, 'App\\Menu', '2021-12-03 01:05:11', '2021-12-03 01:05:11'),
(405, 'kitos-prekes-11', 'kitos-prekes-11', 'kitos-prekes-11', 'kitos-prekes-11', 'kitos-prekes-11', 7, 'App\\Menu', '2021-12-03 01:05:31', '2021-12-03 01:05:31'),
(406, 'kitos-prekes-12', 'kitos-prekes-12', 'kitos-prekes-12', 'kitos-prekes-12', 'kitos-prekes-12', 7, 'App\\Menu', '2021-12-03 01:05:32', '2021-12-03 01:05:32'),
(407, 'kitos-prekes-13', 'kitos-prekes-13', 'kitos-prekes-13', 'kitos-prekes-13', 'kitos-prekes-13', 7, 'App\\Menu', '2021-12-03 01:05:37', '2021-12-03 01:05:37'),
(408, 'smilkalines-2b', 'smilkalines-2b', 'smilkalines-2b', 'smilkalines-2b', 'smilkalines-2b', 2, 'App\\Menu', '2021-12-03 09:27:09', '2021-12-03 09:27:09'),
(412, 'smilkalines-2c', 'smilkalines-2c', 'smilkalines-2c', 'smilkalines-2c', 'smilkalines-2c', 2, 'App\\Menu', '2021-12-03 10:10:18', '2021-12-03 10:10:18'),
(413, 'smilkalines-2d', 'smilkalines-2d', 'smilkalines-2d', 'smilkalines-2d', 'smilkalines-2d', 2, 'App\\Menu', '2021-12-03 10:18:03', '2021-12-03 10:18:03'),
(414, 'smilkalines-2e', 'smilkalines-2e', 'smilkalines-2e', 'smilkalines-2e', 'smilkalines-2e', 2, 'App\\Menu', '2021-12-03 10:27:44', '2021-12-03 10:27:44'),
(415, 'smilkalines-2f', 'smilkalines-2f', 'smilkalines-2f', 'smilkalines-2f', 'smilkalines-2f', 2, 'App\\Menu', '2021-12-03 10:33:19', '2021-12-03 10:33:19'),
(416, 'smilkalines-30', 'smilkalines-30', 'smilkalines-30', 'smilkalines-30', 'smilkalines-30', 2, 'App\\Menu', '2021-12-03 10:44:46', '2021-12-03 10:44:46'),
(420, 'papuosalaiakmenys-19', 'papuosalaiakmenys-19', 'papuosalaiakmenys-19', 'papuosalaiakmenys-19', 'papuosalaiakmenys-19', 5, 'App\\Menu', '2021-12-03 10:47:16', '2021-12-03 10:47:16'),
(421, 'kitos-prekes-14', 'kitos-prekes-14', 'kitos-prekes-14', 'kitos-prekes-14', 'kitos-prekes-14', 7, 'App\\Menu', '2021-12-03 10:47:46', '2021-12-03 10:47:46'),
(423, 'smilkalines-31', 'smilkalines-31', 'smilkalines-31', 'smilkalines-31', 'smilkalines-31', 2, 'App\\Menu', '2021-12-03 11:01:05', '2021-12-03 11:01:05'),
(426, 'smilkalines-32', 'smilkalines-32', 'smilkalines-32', 'smilkalines-32', 'smilkalines-32', 2, 'App\\Menu', '2021-12-03 11:15:40', '2021-12-03 11:15:40'),
(427, 'papuosalaiakmenys-1a', 'papuosalaiakmenys-1a', 'papuosalaiakmenys-1a', 'papuosalaiakmenys-1a', 'papuosalaiakmenys-1a', 5, 'App\\Menu', '2021-12-03 11:16:15', '2021-12-03 11:16:15'),
(428, 'smilkalai-13', 'smilkalai-13', 'smilkalai-13', 'smilkalai-13', 'smilkalai-13', 1, 'App\\Menu', '2021-12-03 11:16:29', '2021-12-03 11:16:29'),
(430, 'kitos-prekes-15', 'kitos-prekes-15', 'kitos-prekes-15', 'kitos-prekes-15', 'kitos-prekes-15', 7, 'App\\Menu', '2021-12-03 11:16:36', '2021-12-03 11:16:36'),
(437, 'smilkalines-33', 'smilkalines-33', 'smilkalines-33', 'smilkalines-33', 'smilkalines-33', 2, 'App\\Menu', '2021-12-03 11:48:41', '2021-12-03 11:48:41'),
(438, 'smilkalai-14', 'smilkalai-14', 'smilkalai-14', 'smilkalai-14', 'smilkalai-14', 1, 'App\\Menu', '2021-12-03 11:49:09', '2021-12-03 11:49:09'),
(440, 'smilkalines-34', 'smilkalines-34', 'smilkalines-34', 'smilkalines-34', 'smilkalines-34', 2, 'App\\Menu', '2021-12-03 11:50:50', '2021-12-03 11:50:50'),
(443, 'sidabro-spalvos-smilkalines-5', 'sidabro-spalvos-smilkalines-5', 'sidabro-spalvos-smilkalines-5', 'sidabro-spalvos-smilkalines-5', 'sidabro-spalvos-smilkalines-5', 3, 'App\\SubMenu', '2021-12-03 18:55:57', '2021-12-03 18:55:57'),
(445, 'apvalios-smilkalines-e', 'apvalios-smilkalines-e', 'apvalios-smilkalines-e', 'apvalios-smilkalines-e', 'apvalios-smilkalines-e', 5, 'App\\SubMenu', '2021-12-03 18:56:17', '2021-12-03 18:56:17'),
(447, 'aukso-spalvos-smilkalines-4', 'aukso-spalvos-smilkalines-4', 'aukso-spalvos-smilkalines-4', 'aukso-spalvos-smilkalines-4', 'aukso-spalvos-smilkalines-4', 4, 'App\\SubMenu', '2021-12-03 18:56:31', '2021-12-03 18:56:31'),
(452, 'smilkalines-35', 'smilkalines-35', 'smilkalines-35', 'smilkalines-35', 'smilkalines-35', 2, 'App\\Menu', '2021-12-04 10:53:08', '2021-12-04 10:53:08'),
(453, 'sidabro-spalvos-smilkalines-6', 'sidabro-spalvos-smilkalines-6', 'sidabro-spalvos-smilkalines-6', 'sidabro-spalvos-smilkalines-6', 'sidabro-spalvos-smilkalines-6', 3, 'App\\SubMenu', '2021-12-04 10:53:12', '2021-12-04 10:53:12'),
(456, 'kitos-prekes-16', 'kitos-prekes-16', 'kitos-prekes-16', 'kitos-prekes-16', 'kitos-prekes-16', 7, 'App\\Menu', '2021-12-05 04:10:05', '2021-12-05 04:10:05'),
(457, 'papuosalaiakmenys-1b', 'papuosalaiakmenys-1b', 'papuosalaiakmenys-1b', 'papuosalaiakmenys-1b', 'papuosalaiakmenys-1b', 5, 'App\\Menu', '2021-12-05 07:41:32', '2021-12-05 07:41:32'),
(460, 'medines-dezutes-smilkalines-du-viename-5', 'medines-dezutes-smilkalines-du-viename-5', 'medines-dezutes-smilkalines-du-viename-5', 'medines-dezutes-smilkalines-du-viename-5', 'medines-dezutes-smilkalines-du-viename-5', 2, 'App\\SubMenu', '2021-12-05 08:24:09', '2021-12-05 08:24:09'),
(461, 'smilkalines-36', 'smilkalines-36', 'smilkalines-36', 'smilkalines-36', 'smilkalines-36', 2, 'App\\Menu', '2021-12-05 08:38:27', '2021-12-05 08:38:27'),
(465, 'inkrustuotos-akmenukais-b', 'inkrustuotos-akmenukais-10', 'inkrustuotos-akmenukais-10', 'inkrustuotos-akmenukais-10', 'inkrustuotos-akmenukais-10', 1, 'App\\SubMenu', '2021-12-05 09:02:22', '2021-12-05 09:02:22'),
(466, 'smilkalai-15', 'smilkalai-15', 'smilkalai-15', 'smilkalai-15', 'smilkalai-15', 1, 'App\\Menu', '2021-12-05 09:08:13', '2021-12-05 09:08:13'),
(467, 'sidabro-spalvos-smilkalines-7', 'sidabro-spalvos-smilkalines-7', 'sidabro-spalvos-smilkalines-7', 'sidabro-spalvos-smilkalines-7', 'sidabro-spalvos-smilkalines-7', 3, 'App\\SubMenu', '2021-12-05 09:11:10', '2021-12-05 09:11:10'),
(469, 'transcendentines-kriaukles-3', 'transcendentines-kriaukles-3', 'transcendentines-kriaukles-3', 'transcendentines-kriaukles-3', 'transcendentines-kriaukles-3', 7, 'App\\SubMenu', '2021-12-05 09:45:42', '2021-12-05 09:45:42'),
(470, 'grojantys-dubenys-1b', 'grojantys-dubenys-1b', 'grojantys-dubenys-1b', 'grojantys-dubenys-1b', 'grojantys-dubenys-1b', 6, 'App\\SubMenu', '2021-12-05 09:45:45', '2021-12-05 09:45:45'),
(472, 'inkrustuotos-akmenukais-c', 'inkrustuotos-akmenukais-11', 'inkrustuotos-akmenukais-11', 'inkrustuotos-akmenukais-11', 'inkrustuotos-akmenukais-11', 1, 'App\\SubMenu', '2021-12-05 09:50:26', '2021-12-05 09:50:26'),
(474, 'smilkalines-37', 'smilkalines-37', 'smilkalines-37', 'smilkalines-37', 'smilkalines-37', 2, 'App\\Menu', '2021-12-05 09:50:51', '2021-12-05 09:50:51'),
(479, 'grojantys-dubenys-1c', 'grojantys-dubenys-1c', 'grojantys-dubenys-1c', 'grojantys-dubenys-1c', 'grojantys-dubenys-1c', 6, 'App\\SubMenu', '2021-12-06 03:42:36', '2021-12-06 03:42:36'),
(486, 'smilkalai-16', 'smilkalai-16', 'smilkalai-16', 'smilkalai-16', 'smilkalai-16', 1, 'App\\Menu', '2021-12-06 10:59:10', '2021-12-06 10:59:10'),
(488, 'smilkalines-38', 'smilkalines-38', 'smilkalines-38', 'smilkalines-38', 'smilkalines-38', 2, 'App\\Menu', '2021-12-06 11:00:48', '2021-12-06 11:00:48'),
(489, 'smilkalai-17', 'smilkalai-17', 'smilkalai-17', 'smilkalai-17', 'smilkalai-17', 1, 'App\\Menu', '2021-12-06 14:14:29', '2021-12-06 14:14:29'),
(491, 'papuosalaiakmenys-1c', 'papuosalaiakmenys-1c', 'papuosalaiakmenys-1c', 'papuosalaiakmenys-1c', 'papuosalaiakmenys-1c', 5, 'App\\Menu', '2021-12-06 14:23:08', '2021-12-06 14:23:08'),
(493, 'kitos-prekes-17', 'kitos-prekes-17', 'kitos-prekes-17', 'kitos-prekes-17', 'kitos-prekes-17', 7, 'App\\Menu', '2021-12-06 18:05:52', '2021-12-06 18:05:52'),
(494, 'medines-dezutes-smilkalines-du-viename-6', 'medines-dezutes-smilkalines-du-viename-6', 'medines-dezutes-smilkalines-du-viename-6', 'medines-dezutes-smilkalines-du-viename-6', 'medines-dezutes-smilkalines-du-viename-6', 2, 'App\\SubMenu', '2021-12-06 18:27:44', '2021-12-06 18:27:44'),
(495, 'inkrustuotos-akmenukais-d', 'inkrustuotos-akmenukais-12', 'inkrustuotos-akmenukais-12', 'inkrustuotos-akmenukais-12', 'inkrustuotos-akmenukais-12', 1, 'App\\SubMenu', '2021-12-06 18:27:46', '2021-12-06 18:27:46'),
(496, 'smilkalai-18', 'smilkalai-18', 'smilkalai-18', 'smilkalai-18', 'smilkalai-18', 1, 'App\\Menu', '2021-12-07 03:28:52', '2021-12-07 03:28:52'),
(497, 'smilkalines-39', 'smilkalines-39', 'smilkalines-39', 'smilkalines-39', 'smilkalines-39', 2, 'App\\Menu', '2021-12-07 03:28:55', '2021-12-07 03:28:55'),
(499, 'papuosalaiakmenys-1d', 'papuosalaiakmenys-1d', 'papuosalaiakmenys-1d', 'papuosalaiakmenys-1d', 'papuosalaiakmenys-1d', 5, 'App\\Menu', '2021-12-07 03:30:10', '2021-12-07 03:30:10'),
(500, 'kitos-prekes-18', 'kitos-prekes-18', 'kitos-prekes-18', 'kitos-prekes-18', 'kitos-prekes-18', 7, 'App\\Menu', '2021-12-07 03:30:13', '2021-12-07 03:30:13'),
(505, 'medines-dezutes-smilkalines-du-viename-7', 'medines-dezutes-smilkalines-du-viename-7', 'medines-dezutes-smilkalines-du-viename-7', 'medines-dezutes-smilkalines-du-viename-7', 'medines-dezutes-smilkalines-du-viename-7', 2, 'App\\SubMenu', '2021-12-07 04:34:59', '2021-12-07 04:34:59'),
(506, 'inkrustuotos-akmenukais-e', 'inkrustuotos-akmenukais-13', 'inkrustuotos-akmenukais-13', 'inkrustuotos-akmenukais-13', 'inkrustuotos-akmenukais-13', 1, 'App\\SubMenu', '2021-12-07 05:41:14', '2021-12-07 05:41:14'),
(516, 'sidabro-spalvos-smilkalines-8', 'sidabro-spalvos-smilkalines-8', 'sidabro-spalvos-smilkalines-8', 'sidabro-spalvos-smilkalines-8', 'sidabro-spalvos-smilkalines-8', 3, 'App\\SubMenu', '2021-12-07 09:30:54', '2021-12-07 09:30:54'),
(523, 'grojantys-dubenys-1d', 'grojantys-dubenys-1d', 'grojantys-dubenys-1d', 'grojantys-dubenys-1d', 'grojantys-dubenys-1d', 6, 'App\\SubMenu', '2021-12-07 11:16:57', '2021-12-07 11:16:57'),
(524, 'medines-dezutes-smilkalines-du-viename-8', 'medines-dezutes-smilkalines-du-viename-8', 'medines-dezutes-smilkalines-du-viename-8', 'medines-dezutes-smilkalines-du-viename-8', 'medines-dezutes-smilkalines-du-viename-8', 2, 'App\\SubMenu', '2021-12-07 11:17:12', '2021-12-07 11:17:12'),
(525, 'aukso-spalvos-smilkalines-5', 'aukso-spalvos-smilkalines-5', 'aukso-spalvos-smilkalines-5', 'aukso-spalvos-smilkalines-5', 'aukso-spalvos-smilkalines-5', 4, 'App\\SubMenu', '2021-12-07 11:17:16', '2021-12-07 11:17:16'),
(526, 'grojantys-dubenys-1e', 'grojantys-dubenys-1e', 'grojantys-dubenys-1e', 'grojantys-dubenys-1e', 'grojantys-dubenys-1e', 6, 'App\\SubMenu', '2021-12-07 11:17:18', '2021-12-07 11:17:18'),
(527, 'sidabro-spalvos-smilkalines-9', 'sidabro-spalvos-smilkalines-9', 'sidabro-spalvos-smilkalines-9', 'sidabro-spalvos-smilkalines-9', 'sidabro-spalvos-smilkalines-9', 3, 'App\\SubMenu', '2021-12-07 11:17:21', '2021-12-07 11:17:21'),
(528, 'apvalios-smilkalines-f', 'apvalios-smilkalines-f', 'apvalios-smilkalines-f', 'apvalios-smilkalines-f', 'apvalios-smilkalines-f', 5, 'App\\SubMenu', '2021-12-07 11:17:38', '2021-12-07 11:17:38'),
(529, 'apvalios-smilkalines-10', 'apvalios-smilkalines-10', 'apvalios-smilkalines-10', 'apvalios-smilkalines-10', 'apvalios-smilkalines-10', 5, 'App\\SubMenu', '2021-12-07 11:18:00', '2021-12-07 11:18:00'),
(530, 'apvalios-smilkalines-11', 'apvalios-smilkalines-11', 'apvalios-smilkalines-11', 'apvalios-smilkalines-11', 'apvalios-smilkalines-11', 5, 'App\\SubMenu', '2021-12-07 11:43:52', '2021-12-07 11:43:52'),
(531, 'apvalios-smilkalines-12', 'apvalios-smilkalines-12', 'apvalios-smilkalines-12', 'apvalios-smilkalines-12', 'apvalios-smilkalines-12', 5, 'App\\SubMenu', '2021-12-07 11:59:07', '2021-12-07 11:59:07'),
(532, 'apvalios-smilkalines-13', 'apvalios-smilkalines-13', 'apvalios-smilkalines-13', 'apvalios-smilkalines-13', 'apvalios-smilkalines-13', 5, 'App\\SubMenu', '2021-12-07 11:59:07', '2021-12-07 11:59:07'),
(533, 'smilkalines-3a', 'smilkalines-3a', 'smilkalines-3a', 'smilkalines-3a', 'smilkalines-3a', 2, 'App\\Menu', '2021-12-07 13:15:54', '2021-12-07 13:15:54'),
(534, 'smilkalines-3b', 'smilkalines-3b', 'smilkalines-3b', 'smilkalines-3b', 'smilkalines-3b', 2, 'App\\Menu', '2021-12-07 13:15:56', '2021-12-07 13:15:56'),
(536, 'sidabro-spalvos-smilkalines-a', 'sidabro-spalvos-smilkalines-a', 'sidabro-spalvos-smilkalines-a', 'sidabro-spalvos-smilkalines-a', 'sidabro-spalvos-smilkalines-a', 3, 'App\\SubMenu', '2021-12-07 13:28:57', '2021-12-07 13:28:57'),
(542, 'aukso-spalvos-smilkalines-6', 'aukso-spalvos-smilkalines-6', 'aukso-spalvos-smilkalines-6', 'aukso-spalvos-smilkalines-6', 'aukso-spalvos-smilkalines-6', 4, 'App\\SubMenu', '2021-12-08 06:52:25', '2021-12-08 06:52:25'),
(544, 'inkrustuotos-akmenukais-f', 'inkrustuotos-akmenukais-14', 'inkrustuotos-akmenukais-14', 'inkrustuotos-akmenukais-14', 'inkrustuotos-akmenukais-14', 1, 'App\\SubMenu', '2021-12-08 16:25:11', '2021-12-08 16:25:11'),
(546, 'kitos-prekes-19', 'kitos-prekes-19', 'kitos-prekes-19', 'kitos-prekes-19', 'kitos-prekes-19', 7, 'App\\Menu', '2021-12-08 16:33:09', '2021-12-08 16:33:09'),
(551, 'smilkalai-19', 'smilkalai-19', 'smilkalai-19', 'smilkalai-19', 'smilkalai-19', 1, 'App\\Menu', '2021-12-08 19:27:09', '2021-12-08 19:27:09'),
(552, 'transcendentines-kriaukles-4', 'transcendentines-kriaukles-4', 'transcendentines-kriaukles-4', 'transcendentines-kriaukles-4', 'transcendentines-kriaukles-4', 7, 'App\\SubMenu', '2021-12-09 01:56:41', '2021-12-09 01:56:41'),
(554, 'papuosalaiakmenys-1e', 'papuosalaiakmenys-1e', 'papuosalaiakmenys-1e', 'papuosalaiakmenys-1e', 'papuosalaiakmenys-1e', 5, 'App\\Menu', '2021-12-09 02:13:37', '2021-12-09 02:13:37'),
(557, 'sidabro-spalvos-smilkalines-b', 'sidabro-spalvos-smilkalines-b', 'sidabro-spalvos-smilkalines-b', 'sidabro-spalvos-smilkalines-b', 'sidabro-spalvos-smilkalines-b', 3, 'App\\SubMenu', '2021-12-09 14:20:49', '2021-12-09 14:20:49'),
(560, 'papuosalaiakmenys-1f', 'papuosalaiakmenys-1f', 'papuosalaiakmenys-1f', 'papuosalaiakmenys-1f', 'papuosalaiakmenys-1f', 5, 'App\\Menu', '2021-12-09 15:16:59', '2021-12-09 15:16:59'),
(563, 'apvalios-smilkalines-14', 'apvalios-smilkalines-14', 'apvalios-smilkalines-14', 'apvalios-smilkalines-14', 'apvalios-smilkalines-14', 5, 'App\\SubMenu', '2021-12-10 05:16:24', '2021-12-10 05:16:24'),
(566, 'inkrustuotos-akmenukais-10', 'inkrustuotos-akmenukais-15', 'inkrustuotos-akmenukais-15', 'inkrustuotos-akmenukais-15', 'inkrustuotos-akmenukais-15', 1, 'App\\SubMenu', '2021-12-10 05:16:31', '2021-12-10 05:16:31'),
(568, 'sidabro-spalvos-smilkalines-c', 'sidabro-spalvos-smilkalines-c', 'sidabro-spalvos-smilkalines-c', 'sidabro-spalvos-smilkalines-c', 'sidabro-spalvos-smilkalines-c', 3, 'App\\SubMenu', '2021-12-10 05:16:35', '2021-12-10 05:16:35'),
(571, 'grojantys-dubenys-1f', 'grojantys-dubenys-1f', 'grojantys-dubenys-1f', 'grojantys-dubenys-1f', 'grojantys-dubenys-1f', 6, 'App\\SubMenu', '2021-12-10 05:16:51', '2021-12-10 05:16:51'),
(572, 'smilkalai-1a', 'smilkalai-1a', 'smilkalai-1a', 'smilkalai-1a', 'smilkalai-1a', 1, 'App\\Menu', '2021-12-10 05:16:53', '2021-12-10 05:16:53'),
(574, 'kitos-prekes-1a', 'kitos-prekes-1a', 'kitos-prekes-1a', 'kitos-prekes-1a', 'kitos-prekes-1a', 7, 'App\\Menu', '2021-12-10 05:17:04', '2021-12-10 05:17:04'),
(576, 'medines-dezutes-smilkalines-du-viename-9', 'medines-dezutes-smilkalines-du-viename-9', 'medines-dezutes-smilkalines-du-viename-9', 'medines-dezutes-smilkalines-du-viename-9', 'medines-dezutes-smilkalines-du-viename-9', 2, 'App\\SubMenu', '2021-12-10 05:19:52', '2021-12-10 05:19:52'),
(578, 'papuosalaiakmenys-20', 'papuosalaiakmenys-20', 'papuosalaiakmenys-20', 'papuosalaiakmenys-20', 'papuosalaiakmenys-20', 5, 'App\\Menu', '2021-12-10 05:20:38', '2021-12-10 05:20:38'),
(579, 'smilkalines-3c', 'smilkalines-3c', 'smilkalines-3c', 'smilkalines-3c', 'smilkalines-3c', 2, 'App\\Menu', '2021-12-10 05:20:42', '2021-12-10 05:20:42'),
(580, 'aukso-spalvos-smilkalines-7', 'aukso-spalvos-smilkalines-7', 'aukso-spalvos-smilkalines-7', 'aukso-spalvos-smilkalines-7', 'aukso-spalvos-smilkalines-7', 4, 'App\\SubMenu', '2021-12-10 05:20:59', '2021-12-10 05:20:59'),
(581, 'transcendentines-kriaukles-5', 'transcendentines-kriaukles-5', 'transcendentines-kriaukles-5', 'transcendentines-kriaukles-5', 'transcendentines-kriaukles-5', 7, 'App\\SubMenu', '2021-12-10 05:21:08', '2021-12-10 05:21:08'),
(582, 'apvalios-smilkalines-15', 'apvalios-smilkalines-15', 'apvalios-smilkalines-15', 'apvalios-smilkalines-15', 'apvalios-smilkalines-15', 5, 'App\\SubMenu', '2021-12-10 08:28:38', '2021-12-10 08:28:38'),
(583, 'papuosalaiakmenys-21', 'papuosalaiakmenys-21', 'papuosalaiakmenys-21', 'papuosalaiakmenys-21', 'papuosalaiakmenys-21', 5, 'App\\Menu', '2021-12-10 08:34:21', '2021-12-10 08:34:21'),
(584, 'papuosalaiakmenys-22', 'papuosalaiakmenys-22', 'papuosalaiakmenys-22', 'papuosalaiakmenys-22', 'papuosalaiakmenys-22', 5, 'App\\Menu', '2021-12-10 13:28:15', '2021-12-10 13:28:15'),
(585, 'papuosalaiakmenys-23', 'papuosalaiakmenys-23', 'papuosalaiakmenys-23', 'papuosalaiakmenys-23', 'papuosalaiakmenys-23', 5, 'App\\Menu', '2021-12-10 16:32:27', '2021-12-10 16:32:27'),
(587, 'kitos-prekes-1b', 'kitos-prekes-1b', 'kitos-prekes-1b', 'kitos-prekes-1b', 'kitos-prekes-1b', 7, 'App\\Menu', '2021-12-10 16:34:37', '2021-12-10 16:34:37'),
(588, 'smilkalines-3d', 'smilkalines-3d', 'smilkalines-3d', 'smilkalines-3d', 'smilkalines-3d', 2, 'App\\Menu', '2021-12-10 16:36:02', '2021-12-10 16:36:02'),
(589, 'smilkalines-3e', 'smilkalines-3e', 'smilkalines-3e', 'smilkalines-3e', 'smilkalines-3e', 2, 'App\\Menu', '2021-12-10 18:15:26', '2021-12-10 18:15:26');
INSERT INTO `slugs` (`id`, `slug_en`, `slug_lt`, `slug_rus`, `slug_pt`, `slug_es`, `slugable_id`, `slugable_type`, `created_at`, `updated_at`) VALUES
(592, 'aukso-spalvos-smilkalines-8', 'aukso-spalvos-smilkalines-8', 'aukso-spalvos-smilkalines-8', 'aukso-spalvos-smilkalines-8', 'aukso-spalvos-smilkalines-8', 4, 'App\\SubMenu', '2021-12-11 07:43:06', '2021-12-11 07:43:06'),
(594, 'smilkalai-1b', 'smilkalai-1b', 'smilkalai-1b', 'smilkalai-1b', 'smilkalai-1b', 1, 'App\\Menu', '2021-12-12 02:33:10', '2021-12-12 02:33:10'),
(595, 'smilkalines-3f', 'smilkalines-3f', 'smilkalines-3f', 'smilkalines-3f', 'smilkalines-3f', 2, 'App\\Menu', '2021-12-12 02:33:15', '2021-12-12 02:33:15'),
(601, 'papuosalaiakmenys-24', 'papuosalaiakmenys-24', 'papuosalaiakmenys-24', 'papuosalaiakmenys-24', 'papuosalaiakmenys-24', 5, 'App\\Menu', '2021-12-12 02:45:38', '2021-12-12 02:45:38'),
(603, 'papuosalaiakmenys-25', 'papuosalaiakmenys-25', 'papuosalaiakmenys-25', 'papuosalaiakmenys-25', 'papuosalaiakmenys-25', 5, 'App\\Menu', '2021-12-12 07:07:51', '2021-12-12 07:07:51'),
(607, 'apvalios-smilkalines-16', 'apvalios-smilkalines-16', 'apvalios-smilkalines-16', 'apvalios-smilkalines-16', 'apvalios-smilkalines-16', 5, 'App\\SubMenu', '2021-12-12 13:44:04', '2021-12-12 13:44:04'),
(608, 'aukso-spalvos-smilkalines-9', 'aukso-spalvos-smilkalines-9', 'aukso-spalvos-smilkalines-9', 'aukso-spalvos-smilkalines-9', 'aukso-spalvos-smilkalines-9', 4, 'App\\SubMenu', '2021-12-12 13:44:18', '2021-12-12 13:44:18'),
(609, 'sidabro-spalvos-smilkalines-d', 'sidabro-spalvos-smilkalines-d', 'sidabro-spalvos-smilkalines-d', 'sidabro-spalvos-smilkalines-d', 'sidabro-spalvos-smilkalines-d', 3, 'App\\SubMenu', '2021-12-12 13:44:26', '2021-12-12 13:44:26'),
(610, 'medines-dezutes-smilkalines-du-viename-a', 'medines-dezutes-smilkalines-du-viename-a', 'medines-dezutes-smilkalines-du-viename-a', 'medines-dezutes-smilkalines-du-viename-a', 'medines-dezutes-smilkalines-du-viename-a', 2, 'App\\SubMenu', '2021-12-12 13:44:39', '2021-12-12 13:44:39'),
(614, 'inkrustuotos-akmenukais-11', 'inkrustuotos-akmenukais-16', 'inkrustuotos-akmenukais-16', 'inkrustuotos-akmenukais-16', 'inkrustuotos-akmenukais-16', 1, 'App\\SubMenu', '2021-12-12 13:45:50', '2021-12-12 13:45:50'),
(615, 'papuosalaiakmenys-26', 'papuosalaiakmenys-26', 'papuosalaiakmenys-26', 'papuosalaiakmenys-26', 'papuosalaiakmenys-26', 5, 'App\\Menu', '2021-12-12 13:46:08', '2021-12-12 13:46:08'),
(616, 'grojantys-dubenys-20', 'grojantys-dubenys-20', 'grojantys-dubenys-20', 'grojantys-dubenys-20', 'grojantys-dubenys-20', 6, 'App\\SubMenu', '2021-12-12 13:46:17', '2021-12-12 13:46:17'),
(617, 'transcendentines-kriaukles-6', 'transcendentines-kriaukles-6', 'transcendentines-kriaukles-6', 'transcendentines-kriaukles-6', 'transcendentines-kriaukles-6', 7, 'App\\SubMenu', '2021-12-12 13:46:28', '2021-12-12 13:46:28'),
(618, 'smilkalai-1c', 'smilkalai-1c', 'smilkalai-1c', 'smilkalai-1c', 'smilkalai-1c', 1, 'App\\Menu', '2021-12-12 13:46:32', '2021-12-12 13:46:32'),
(619, 'smilkalai-1d', 'smilkalai-1d', 'smilkalai-1d', 'smilkalai-1d', 'smilkalai-1d', 1, 'App\\Menu', '2021-12-12 13:46:34', '2021-12-12 13:46:34'),
(621, 'smilkalai-1e', 'smilkalai-1e', 'smilkalai-1e', 'smilkalai-1e', 'smilkalai-1e', 1, 'App\\Menu', '2021-12-13 12:06:34', '2021-12-13 12:06:34'),
(623, 'papuosalaiakmenys-27', 'papuosalaiakmenys-27', 'papuosalaiakmenys-27', 'papuosalaiakmenys-27', 'papuosalaiakmenys-27', 5, 'App\\Menu', '2021-12-13 12:06:41', '2021-12-13 12:06:41'),
(624, 'kitos-prekes-1c', 'kitos-prekes-1c', 'kitos-prekes-1c', 'kitos-prekes-1c', 'kitos-prekes-1c', 7, 'App\\Menu', '2021-12-13 12:06:45', '2021-12-13 12:06:45'),
(627, 'smilkalines-40', 'smilkalines-40', 'smilkalines-40', 'smilkalines-40', 'smilkalines-40', 2, 'App\\Menu', '2021-12-13 12:09:04', '2021-12-13 12:09:04'),
(628, 'kitos-prekes-1d', 'kitos-prekes-1d', 'kitos-prekes-1d', 'kitos-prekes-1d', 'kitos-prekes-1d', 7, 'App\\Menu', '2021-12-13 12:09:26', '2021-12-13 12:09:26'),
(630, 'kitos-prekes-1e', 'kitos-prekes-1e', 'kitos-prekes-1e', 'kitos-prekes-1e', 'kitos-prekes-1e', 7, 'App\\Menu', '2021-12-13 12:54:19', '2021-12-13 12:54:19'),
(631, 'kitos-prekes-1f', 'kitos-prekes-1f', 'kitos-prekes-1f', 'kitos-prekes-1f', 'kitos-prekes-1f', 7, 'App\\Menu', '2021-12-13 15:16:34', '2021-12-13 15:16:34'),
(632, 'papuosalaiakmenys-28', 'papuosalaiakmenys-28', 'papuosalaiakmenys-28', 'papuosalaiakmenys-28', 'papuosalaiakmenys-28', 5, 'App\\Menu', '2021-12-13 15:16:47', '2021-12-13 15:16:47'),
(633, 'kitos-prekes-20', 'kitos-prekes-20', 'kitos-prekes-20', 'kitos-prekes-20', 'kitos-prekes-20', 7, 'App\\Menu', '2021-12-13 15:23:53', '2021-12-13 15:23:53'),
(634, 'grojantys-dubenys-21', 'grojantys-dubenys-21', 'grojantys-dubenys-21', 'grojantys-dubenys-21', 'grojantys-dubenys-21', 6, 'App\\SubMenu', '2021-12-13 16:11:10', '2021-12-13 16:11:10'),
(635, 'smilkalines-41', 'smilkalines-41', 'smilkalines-41', 'smilkalines-41', 'smilkalines-41', 2, 'App\\Menu', '2021-12-13 16:16:10', '2021-12-13 16:16:10'),
(636, 'kitos-prekes-21', 'kitos-prekes-21', 'kitos-prekes-21', 'kitos-prekes-21', 'kitos-prekes-21', 7, 'App\\Menu', '2021-12-13 16:18:11', '2021-12-13 16:18:11'),
(637, 'kitos-prekes-22', 'kitos-prekes-22', 'kitos-prekes-22', 'kitos-prekes-22', 'kitos-prekes-22', 7, 'App\\Menu', '2021-12-13 17:47:21', '2021-12-13 17:47:21'),
(638, 'grojantys-dubenys-22', 'grojantys-dubenys-22', 'grojantys-dubenys-22', 'grojantys-dubenys-22', 'grojantys-dubenys-22', 6, 'App\\SubMenu', '2021-12-13 17:47:21', '2021-12-13 17:47:21'),
(639, 'smilkalines-42', 'smilkalines-42', 'smilkalines-42', 'smilkalines-42', 'smilkalines-42', 2, 'App\\Menu', '2021-12-13 20:44:17', '2021-12-13 20:44:17'),
(655, 'smilkalai-1f', 'smilkalai-1f', 'smilkalai-1f', 'smilkalai-1f', 'smilkalai-1f', 1, 'App\\Menu', '2021-12-13 20:55:25', '2021-12-13 20:55:25'),
(656, 'grojantys-dubenys-23', 'grojantys-dubenys-23', 'grojantys-dubenys-23', 'grojantys-dubenys-23', 'grojantys-dubenys-23', 6, 'App\\SubMenu', '2021-12-13 20:55:32', '2021-12-13 20:55:32'),
(657, 'transcendentines-kriaukles-7', 'transcendentines-kriaukles-7', 'transcendentines-kriaukles-7', 'transcendentines-kriaukles-7', 'transcendentines-kriaukles-7', 7, 'App\\SubMenu', '2021-12-13 20:55:37', '2021-12-13 20:55:37'),
(658, 'papuosalaiakmenys-29', 'papuosalaiakmenys-29', 'papuosalaiakmenys-29', 'papuosalaiakmenys-29', 'papuosalaiakmenys-29', 5, 'App\\Menu', '2021-12-13 20:55:41', '2021-12-13 20:55:41'),
(659, 'kitos-prekes-23', 'kitos-prekes-23', 'kitos-prekes-23', 'kitos-prekes-23', 'kitos-prekes-23', 7, 'App\\Menu', '2021-12-13 20:55:44', '2021-12-13 20:55:44'),
(663, 'kitos-prekes-24', 'kitos-prekes-24', 'kitos-prekes-24', 'kitos-prekes-24', 'kitos-prekes-24', 7, 'App\\Menu', '2021-12-13 21:24:52', '2021-12-13 21:24:52'),
(664, 'kitos-prekes-25', 'kitos-prekes-25', 'kitos-prekes-25', 'kitos-prekes-25', 'kitos-prekes-25', 7, 'App\\Menu', '2021-12-13 21:35:27', '2021-12-13 21:35:27'),
(665, 'kitos-prekes-26', 'kitos-prekes-26', 'kitos-prekes-26', 'kitos-prekes-26', 'kitos-prekes-26', 7, 'App\\Menu', '2021-12-13 21:35:28', '2021-12-13 21:35:28'),
(667, 'sidabro-spalvos-smilkalines-e', 'sidabro-spalvos-smilkalines-e', 'sidabro-spalvos-smilkalines-e', 'sidabro-spalvos-smilkalines-e', 'sidabro-spalvos-smilkalines-e', 3, 'App\\SubMenu', '2021-12-14 15:06:01', '2021-12-14 15:06:01'),
(668, 'aukso-spalvos-smilkalines-a', 'aukso-spalvos-smilkalines-a', 'aukso-spalvos-smilkalines-a', 'aukso-spalvos-smilkalines-a', 'aukso-spalvos-smilkalines-a', 4, 'App\\SubMenu', '2021-12-14 15:06:09', '2021-12-14 15:06:09'),
(670, 'papuosalaiakmenys-2a', 'papuosalaiakmenys-2a', 'papuosalaiakmenys-2a', 'papuosalaiakmenys-2a', 'papuosalaiakmenys-2a', 5, 'App\\Menu', '2021-12-15 20:17:59', '2021-12-15 20:17:59'),
(671, 'smilkalai-20', 'smilkalai-20', 'smilkalai-20', 'smilkalai-20', 'smilkalai-20', 1, 'App\\Menu', '2021-12-15 20:18:08', '2021-12-15 20:18:08'),
(672, 'grojantys-dubenys-24', 'grojantys-dubenys-24', 'grojantys-dubenys-24', 'grojantys-dubenys-24', 'grojantys-dubenys-24', 6, 'App\\SubMenu', '2021-12-16 07:16:38', '2021-12-16 07:16:38'),
(673, 'smilkalines-43', 'smilkalines-43', 'smilkalines-43', 'smilkalines-43', 'smilkalines-43', 2, 'App\\Menu', '2021-12-17 08:48:37', '2021-12-17 08:48:37'),
(674, 'smilkalai-21', 'smilkalai-21', 'smilkalai-21', 'smilkalai-21', 'smilkalai-21', 1, 'App\\Menu', '2021-12-17 09:23:37', '2021-12-17 09:23:37'),
(675, 'kitos-prekes-27', 'kitos-prekes-27', 'kitos-prekes-27', 'kitos-prekes-27', 'kitos-prekes-27', 7, 'App\\Menu', '2021-12-17 09:26:52', '2021-12-17 09:26:52'),
(676, 'papuosalaiakmenys-2b', 'papuosalaiakmenys-2b', 'papuosalaiakmenys-2b', 'papuosalaiakmenys-2b', 'papuosalaiakmenys-2b', 5, 'App\\Menu', '2021-12-17 09:27:08', '2021-12-17 09:27:08'),
(679, 'smilkalines-44', 'smilkalines-44', 'smilkalines-44', 'smilkalines-44', 'smilkalines-44', 2, 'App\\Menu', '2021-12-17 09:27:47', '2021-12-17 09:27:47'),
(680, 'kitos-prekes-28', 'kitos-prekes-28', 'kitos-prekes-28', 'kitos-prekes-28', 'kitos-prekes-28', 7, 'App\\Menu', '2021-12-17 14:02:53', '2021-12-17 14:02:53'),
(683, 'grojantys-dubenys-25', 'grojantys-dubenys-25', 'grojantys-dubenys-25', 'grojantys-dubenys-25', 'grojantys-dubenys-25', 6, 'App\\SubMenu', '2021-12-17 18:53:01', '2021-12-17 18:53:01'),
(684, 'papuosalaiakmenys-2c', 'papuosalaiakmenys-2c', 'papuosalaiakmenys-2c', 'papuosalaiakmenys-2c', 'papuosalaiakmenys-2c', 5, 'App\\Menu', '2021-12-17 18:57:26', '2021-12-17 18:57:26'),
(685, 'smilkalines-45', 'smilkalines-45', 'smilkalines-45', 'smilkalines-45', 'smilkalines-45', 2, 'App\\Menu', '2021-12-17 18:57:29', '2021-12-17 18:57:29'),
(686, 'smilkalai-22', 'smilkalai-22', 'smilkalai-22', 'smilkalai-22', 'smilkalai-22', 1, 'App\\Menu', '2021-12-17 18:57:31', '2021-12-17 18:57:31'),
(687, 'grojantys-dubenys-26', 'grojantys-dubenys-26', 'grojantys-dubenys-26', 'grojantys-dubenys-26', 'grojantys-dubenys-26', 6, 'App\\SubMenu', '2021-12-17 18:58:41', '2021-12-17 18:58:41'),
(688, 'grojantys-dubenys-27', 'grojantys-dubenys-27', 'grojantys-dubenys-27', 'grojantys-dubenys-27', 'grojantys-dubenys-27', 6, 'App\\SubMenu', '2021-12-17 19:10:53', '2021-12-17 19:10:53'),
(689, 'aukso-spalvos-smilkalines-b', 'aukso-spalvos-smilkalines-b', 'aukso-spalvos-smilkalines-b', 'aukso-spalvos-smilkalines-b', 'aukso-spalvos-smilkalines-b', 4, 'App\\SubMenu', '2021-12-18 22:46:08', '2021-12-18 22:46:08'),
(690, 'medines-dezutes-smilkalines-du-viename-b', 'medines-dezutes-smilkalines-du-viename-b', 'medines-dezutes-smilkalines-du-viename-b', 'medines-dezutes-smilkalines-du-viename-b', 'medines-dezutes-smilkalines-du-viename-b', 2, 'App\\SubMenu', '2021-12-18 22:46:10', '2021-12-18 22:46:10'),
(693, 'grojantys-dubenys-28', 'grojantys-dubenys-28', 'grojantys-dubenys-28', 'grojantys-dubenys-28', 'grojantys-dubenys-28', 6, 'App\\SubMenu', '2021-12-18 22:46:37', '2021-12-18 22:46:37'),
(694, 'sidabro-spalvos-smilkalines-f', 'sidabro-spalvos-smilkalines-f', 'sidabro-spalvos-smilkalines-f', 'sidabro-spalvos-smilkalines-f', 'sidabro-spalvos-smilkalines-f', 3, 'App\\SubMenu', '2021-12-18 22:46:37', '2021-12-18 22:46:37'),
(696, 'apvalios-smilkalines-17', 'apvalios-smilkalines-17', 'apvalios-smilkalines-17', 'apvalios-smilkalines-17', 'apvalios-smilkalines-17', 5, 'App\\SubMenu', '2021-12-18 22:46:47', '2021-12-18 22:46:47'),
(697, 'smilkalai-23', 'smilkalai-23', 'smilkalai-23', 'smilkalai-23', 'smilkalai-23', 1, 'App\\Menu', '2021-12-18 22:46:58', '2021-12-18 22:46:58'),
(699, 'inkrustuotos-akmenukais-12', 'inkrustuotos-akmenukais-17', 'inkrustuotos-akmenukais-17', 'inkrustuotos-akmenukais-17', 'inkrustuotos-akmenukais-17', 1, 'App\\SubMenu', '2021-12-18 22:47:31', '2021-12-18 22:47:31'),
(700, 'smilkalines-46', 'smilkalines-46', 'smilkalines-46', 'smilkalines-46', 'smilkalines-46', 2, 'App\\Menu', '2021-12-18 22:47:43', '2021-12-18 22:47:43'),
(701, 'transcendentines-kriaukles-8', 'transcendentines-kriaukles-8', 'transcendentines-kriaukles-8', 'transcendentines-kriaukles-8', 'transcendentines-kriaukles-8', 7, 'App\\SubMenu', '2021-12-18 22:48:11', '2021-12-18 22:48:11'),
(705, 'kitos-prekes-29', 'kitos-prekes-29', 'kitos-prekes-29', 'kitos-prekes-29', 'kitos-prekes-29', 7, 'App\\Menu', '2021-12-18 22:50:48', '2021-12-18 22:50:48'),
(707, 'papuosalaiakmenys-2d', 'papuosalaiakmenys-2d', 'papuosalaiakmenys-2d', 'papuosalaiakmenys-2d', 'papuosalaiakmenys-2d', 5, 'App\\Menu', '2021-12-18 22:54:35', '2021-12-18 22:54:35'),
(710, 'smilkalines-47', 'smilkalines-47', 'smilkalines-47', 'smilkalines-47', 'smilkalines-47', 2, 'App\\Menu', '2021-12-19 18:37:56', '2021-12-19 18:37:56'),
(711, 'smilkalai-24', 'smilkalai-24', 'smilkalai-24', 'smilkalai-24', 'smilkalai-24', 1, 'App\\Menu', '2021-12-19 18:39:35', '2021-12-19 18:39:35'),
(712, 'papuosalaiakmenys-2e', 'papuosalaiakmenys-2e', 'papuosalaiakmenys-2e', 'papuosalaiakmenys-2e', 'papuosalaiakmenys-2e', 5, 'App\\Menu', '2021-12-19 18:40:40', '2021-12-19 18:40:40'),
(713, 'kitos-prekes-2a', 'kitos-prekes-2a', 'kitos-prekes-2a', 'kitos-prekes-2a', 'kitos-prekes-2a', 7, 'App\\Menu', '2021-12-19 18:40:47', '2021-12-19 18:40:47'),
(714, 'apvalios-smilkalines-18', 'apvalios-smilkalines-18', 'apvalios-smilkalines-18', 'apvalios-smilkalines-18', 'apvalios-smilkalines-18', 5, 'App\\SubMenu', '2021-12-20 09:31:45', '2021-12-20 09:31:45'),
(716, 'grojantys-dubenys-29', 'grojantys-dubenys-29', 'grojantys-dubenys-29', 'grojantys-dubenys-29', 'grojantys-dubenys-29', 6, 'App\\SubMenu', '2021-12-20 09:36:44', '2021-12-20 09:36:44'),
(717, 'grojantys-dubenys-2a', 'grojantys-dubenys-2a', 'grojantys-dubenys-2a', 'grojantys-dubenys-2a', 'grojantys-dubenys-2a', 6, 'App\\SubMenu', '2021-12-20 18:59:53', '2021-12-20 18:59:53'),
(718, 'grojantys-dubenys-2b', 'grojantys-dubenys-2b', 'grojantys-dubenys-2b', 'grojantys-dubenys-2b', 'grojantys-dubenys-2b', 6, 'App\\SubMenu', '2021-12-20 19:00:30', '2021-12-20 19:00:30'),
(721, 'papuosalaiakmenys-2f', 'papuosalaiakmenys-2f', 'papuosalaiakmenys-2f', 'papuosalaiakmenys-2f', 'papuosalaiakmenys-2f', 5, 'App\\Menu', '2021-12-21 14:55:03', '2021-12-21 14:55:03'),
(725, 'grojantys-dubenys-2c', 'grojantys-dubenys-2c', 'grojantys-dubenys-2c', 'grojantys-dubenys-2c', 'grojantys-dubenys-2c', 6, 'App\\SubMenu', '2021-12-22 07:09:16', '2021-12-22 07:09:16'),
(726, 'grojantys-dubenys-2d', 'grojantys-dubenys-2d', 'grojantys-dubenys-2d', 'grojantys-dubenys-2d', 'grojantys-dubenys-2d', 6, 'App\\SubMenu', '2021-12-22 07:09:43', '2021-12-22 07:09:43'),
(728, 'transcendentines-kriaukles-9', 'transcendentines-kriaukles-9', 'transcendentines-kriaukles-9', 'transcendentines-kriaukles-9', 'transcendentines-kriaukles-9', 7, 'App\\SubMenu', '2021-12-22 07:33:45', '2021-12-22 07:33:45'),
(729, 'papuosalaiakmenys-30', 'papuosalaiakmenys-30', 'papuosalaiakmenys-30', 'papuosalaiakmenys-30', 'papuosalaiakmenys-30', 5, 'App\\Menu', '2021-12-22 07:33:50', '2021-12-22 07:33:50'),
(730, 'inkrustuotos-akmenukais-13', 'inkrustuotos-akmenukais-18', 'inkrustuotos-akmenukais-18', 'inkrustuotos-akmenukais-18', 'inkrustuotos-akmenukais-18', 1, 'App\\SubMenu', '2021-12-22 07:34:07', '2021-12-22 07:34:07'),
(731, 'sidabro-spalvos-smilkalines-10', 'sidabro-spalvos-smilkalines-10', 'sidabro-spalvos-smilkalines-10', 'sidabro-spalvos-smilkalines-10', 'sidabro-spalvos-smilkalines-10', 3, 'App\\SubMenu', '2021-12-22 07:34:26', '2021-12-22 07:34:26'),
(732, 'aukso-spalvos-smilkalines-c', 'aukso-spalvos-smilkalines-c', 'aukso-spalvos-smilkalines-c', 'aukso-spalvos-smilkalines-c', 'aukso-spalvos-smilkalines-c', 4, 'App\\SubMenu', '2021-12-22 07:34:54', '2021-12-22 07:34:54'),
(733, 'smilkalai-25', 'smilkalai-25', 'smilkalai-25', 'smilkalai-25', 'smilkalai-25', 1, 'App\\Menu', '2021-12-22 07:35:04', '2021-12-22 07:35:04'),
(734, 'smilkalai-26', 'smilkalai-26', 'smilkalai-26', 'smilkalai-26', 'smilkalai-26', 1, 'App\\Menu', '2021-12-22 08:56:49', '2021-12-22 08:56:49'),
(736, 'transcendentines-kriaukles-a', 'transcendentines-kriaukles-a', 'transcendentines-kriaukles-a', 'transcendentines-kriaukles-a', 'transcendentines-kriaukles-a', 7, 'App\\SubMenu', '2021-12-23 06:21:28', '2021-12-23 06:21:28'),
(737, 'grojantys-dubenys-2e', 'grojantys-dubenys-2e', 'grojantys-dubenys-2e', 'grojantys-dubenys-2e', 'grojantys-dubenys-2e', 6, 'App\\SubMenu', '2021-12-23 06:23:07', '2021-12-23 06:23:07'),
(738, 'smilkalines-48', 'smilkalines-48', 'smilkalines-48', 'smilkalines-48', 'smilkalines-48', 2, 'App\\Menu', '2021-12-23 06:23:43', '2021-12-23 06:23:43'),
(739, 'papuosalaiakmenys-31', 'papuosalaiakmenys-31', 'papuosalaiakmenys-31', 'papuosalaiakmenys-31', 'papuosalaiakmenys-31', 5, 'App\\Menu', '2021-12-23 06:26:20', '2021-12-23 06:26:20'),
(740, 'sidabro-spalvos-smilkalines-11', 'sidabro-spalvos-smilkalines-11', 'sidabro-spalvos-smilkalines-11', 'sidabro-spalvos-smilkalines-11', 'sidabro-spalvos-smilkalines-11', 3, 'App\\SubMenu', '2021-12-23 06:32:08', '2021-12-23 06:32:08'),
(743, 'aukso-spalvos-smilkalines-d', 'aukso-spalvos-smilkalines-d', 'aukso-spalvos-smilkalines-d', 'aukso-spalvos-smilkalines-d', 'aukso-spalvos-smilkalines-d', 4, 'App\\SubMenu', '2021-12-23 06:40:42', '2021-12-23 06:40:42'),
(744, 'medines-dezutes-smilkalines-du-viename-c', 'medines-dezutes-smilkalines-du-viename-c', 'medines-dezutes-smilkalines-du-viename-c', 'medines-dezutes-smilkalines-du-viename-c', 'medines-dezutes-smilkalines-du-viename-c', 2, 'App\\SubMenu', '2021-12-23 06:46:55', '2021-12-23 06:46:55'),
(746, 'inkrustuotos-akmenukais-14', 'inkrustuotos-akmenukais-19', 'inkrustuotos-akmenukais-19', 'inkrustuotos-akmenukais-19', 'inkrustuotos-akmenukais-19', 1, 'App\\SubMenu', '2021-12-23 06:49:10', '2021-12-23 06:49:10'),
(747, 'smilkalai-27', 'smilkalai-27', 'smilkalai-27', 'smilkalai-27', 'smilkalai-27', 1, 'App\\Menu', '2021-12-23 07:01:13', '2021-12-23 07:01:13'),
(752, 'kitos-prekes-2b', 'kitos-prekes-2b', 'kitos-prekes-2b', 'kitos-prekes-2b', 'kitos-prekes-2b', 7, 'App\\Menu', '2021-12-23 07:53:03', '2021-12-23 07:53:03'),
(757, 'grojantys-dubenys-2f', 'grojantys-dubenys-2f', 'grojantys-dubenys-2f', 'grojantys-dubenys-2f', 'grojantys-dubenys-2f', 6, 'App\\SubMenu', '2021-12-26 15:55:02', '2021-12-26 15:55:02'),
(758, 'kitos-prekes-2c', 'kitos-prekes-2c', 'kitos-prekes-2c', 'kitos-prekes-2c', 'kitos-prekes-2c', 7, 'App\\Menu', '2021-12-26 15:57:07', '2021-12-26 15:57:07'),
(761, 'inkrustuotos-akmenukais-15', 'inkrustuotos-akmenukais-1a', 'inkrustuotos-akmenukais-1a', 'inkrustuotos-akmenukais-1a', 'inkrustuotos-akmenukais-1a', 1, 'App\\SubMenu', '2021-12-26 17:41:31', '2021-12-26 17:41:31'),
(762, 'smilkalines-49', 'smilkalines-49', 'smilkalines-49', 'smilkalines-49', 'smilkalines-49', 2, 'App\\Menu', '2021-12-26 17:50:36', '2021-12-26 17:50:36'),
(763, 'aukso-spalvos-smilkalines-e', 'aukso-spalvos-smilkalines-e', 'aukso-spalvos-smilkalines-e', 'aukso-spalvos-smilkalines-e', 'aukso-spalvos-smilkalines-e', 4, 'App\\SubMenu', '2021-12-26 17:54:46', '2021-12-26 17:54:46'),
(766, 'papuosalaiakmenys-32', 'papuosalaiakmenys-32', 'papuosalaiakmenys-32', 'papuosalaiakmenys-32', 'papuosalaiakmenys-32', 5, 'App\\Menu', '2021-12-26 18:49:31', '2021-12-26 18:49:31'),
(769, 'transcendentines-kriaukles-b', 'transcendentines-kriaukles-b', 'transcendentines-kriaukles-b', 'transcendentines-kriaukles-b', 'transcendentines-kriaukles-b', 7, 'App\\SubMenu', '2021-12-26 19:19:49', '2021-12-26 19:19:49'),
(770, 'apvalios-smilkalines-19', 'apvalios-smilkalines-19', 'apvalios-smilkalines-19', 'apvalios-smilkalines-19', 'apvalios-smilkalines-19', 5, 'App\\SubMenu', '2021-12-26 22:24:15', '2021-12-26 22:24:15'),
(771, 'sidabro-spalvos-smilkalines-12', 'sidabro-spalvos-smilkalines-12', 'sidabro-spalvos-smilkalines-12', 'sidabro-spalvos-smilkalines-12', 'sidabro-spalvos-smilkalines-12', 3, 'App\\SubMenu', '2021-12-26 22:30:59', '2021-12-26 22:30:59'),
(773, 'smilkalai-28', 'smilkalai-28', 'smilkalai-28', 'smilkalai-28', 'smilkalai-28', 1, 'App\\Menu', '2021-12-27 00:18:17', '2021-12-27 00:18:17'),
(780, 'inkrustuotos-akmenukais-16', 'inkrustuotos-akmenukais-1b', 'inkrustuotos-akmenukais-1b', 'inkrustuotos-akmenukais-1b', 'inkrustuotos-akmenukais-1b', 1, 'App\\SubMenu', '2021-12-28 21:44:20', '2021-12-28 21:44:20'),
(781, 'medines-dezutes-smilkalines-du-viename-d', 'medines-dezutes-smilkalines-du-viename-d', 'medines-dezutes-smilkalines-du-viename-d', 'medines-dezutes-smilkalines-du-viename-d', 'medines-dezutes-smilkalines-du-viename-d', 2, 'App\\SubMenu', '2021-12-29 03:31:06', '2021-12-29 03:31:06'),
(782, 'kitos-prekes-2d', 'kitos-prekes-2d', 'kitos-prekes-2d', 'kitos-prekes-2d', 'kitos-prekes-2d', 7, 'App\\Menu', '2021-12-29 20:46:31', '2021-12-29 20:46:31'),
(788, 'smilkalai-29', 'smilkalai-29', 'smilkalai-29', 'smilkalai-29', 'smilkalai-29', 1, 'App\\Menu', '2021-12-31 18:48:46', '2021-12-31 18:48:46'),
(789, 'kitos-prekes-2e', 'kitos-prekes-2e', 'kitos-prekes-2e', 'kitos-prekes-2e', 'kitos-prekes-2e', 7, 'App\\Menu', '2021-12-31 18:48:52', '2021-12-31 18:48:52'),
(793, 'grojantys-dubenys-30', 'grojantys-dubenys-30', 'grojantys-dubenys-30', 'grojantys-dubenys-30', 'grojantys-dubenys-30', 6, 'App\\SubMenu', '2022-01-01 20:23:38', '2022-01-01 20:23:38'),
(796, 'kitos-prekes-2f', 'kitos-prekes-2f', 'kitos-prekes-2f', 'kitos-prekes-2f', 'kitos-prekes-2f', 7, 'App\\Menu', '2022-01-03 09:24:07', '2022-01-03 09:24:07'),
(797, 'smilkalai-2a', 'smilkalai-2a', 'smilkalai-2a', 'smilkalai-2a', 'smilkalai-2a', 1, 'App\\Menu', '2022-01-03 18:09:53', '2022-01-03 18:09:53'),
(799, 'smilkalines-4a', 'smilkalines-4a', 'smilkalines-4a', 'smilkalines-4a', 'smilkalines-4a', 2, 'App\\Menu', '2022-01-03 18:10:30', '2022-01-03 18:10:30'),
(800, 'smilkalai-2b', 'smilkalai-2b', 'smilkalai-2b', 'smilkalai-2b', 'smilkalai-2b', 1, 'App\\Menu', '2022-01-04 13:05:03', '2022-01-04 13:05:03'),
(801, 'smilkalines-4b', 'smilkalines-4b', 'smilkalines-4b', 'smilkalines-4b', 'smilkalines-4b', 2, 'App\\Menu', '2022-01-04 13:05:16', '2022-01-04 13:05:16'),
(802, 'kitos-prekes-30', 'kitos-prekes-30', 'kitos-prekes-30', 'kitos-prekes-30', 'kitos-prekes-30', 7, 'App\\Menu', '2022-01-04 14:23:39', '2022-01-04 14:23:39'),
(803, 'smilkalines-4c', 'smilkalines-4c', 'smilkalines-4c', 'smilkalines-4c', 'smilkalines-4c', 2, 'App\\Menu', '2022-01-04 15:46:55', '2022-01-04 15:46:55'),
(804, 'kitos-prekes-31', 'kitos-prekes-31', 'kitos-prekes-31', 'kitos-prekes-31', 'kitos-prekes-31', 7, 'App\\Menu', '2022-01-04 15:48:10', '2022-01-04 15:48:10'),
(805, 'papuosalaiakmenys-33', 'papuosalaiakmenys-33', 'papuosalaiakmenys-33', 'papuosalaiakmenys-33', 'papuosalaiakmenys-33', 5, 'App\\Menu', '2022-01-04 15:48:18', '2022-01-04 15:48:18'),
(810, 'smilkalines-4d', 'smilkalines-4d', 'smilkalines-4d', 'smilkalines-4d', 'smilkalines-4d', 2, 'App\\Menu', '2022-01-04 16:11:13', '2022-01-04 16:11:13'),
(814, 'inkrustuotos-akmenukais-17', 'inkrustuotos-akmenukais-1c', 'inkrustuotos-akmenukais-1c', 'inkrustuotos-akmenukais-1c', 'inkrustuotos-akmenukais-1c', 1, 'App\\SubMenu', '2022-01-06 05:00:03', '2022-01-06 05:00:03'),
(816, 'apvalios-smilkalines-1a', 'apvalios-smilkalines-1a', 'apvalios-smilkalines-1a', 'apvalios-smilkalines-1a', 'apvalios-smilkalines-1a', 5, 'App\\SubMenu', '2022-01-06 16:27:15', '2022-01-06 16:27:15'),
(820, 'smilkalines-4e', 'smilkalines-4e', 'smilkalines-4e', 'smilkalines-4e', 'smilkalines-4e', 2, 'App\\Menu', '2022-01-06 23:45:29', '2022-01-06 23:45:29'),
(822, 'sidabro-spalvos-smilkalines-13', 'sidabro-spalvos-smilkalines-13', 'sidabro-spalvos-smilkalines-13', 'sidabro-spalvos-smilkalines-13', 'sidabro-spalvos-smilkalines-13', 3, 'App\\SubMenu', '2022-01-07 05:45:44', '2022-01-07 05:45:44'),
(826, 'medines-dezutes-smilkalines-du-viename-e', 'medines-dezutes-smilkalines-du-viename-e', 'medines-dezutes-smilkalines-du-viename-e', 'medines-dezutes-smilkalines-du-viename-e', 'medines-dezutes-smilkalines-du-viename-e', 2, 'App\\SubMenu', '2022-01-07 23:10:13', '2022-01-07 23:10:13'),
(828, 'grojantys-dubenys-31', 'grojantys-dubenys-31', 'grojantys-dubenys-31', 'grojantys-dubenys-31', 'grojantys-dubenys-31', 6, 'App\\SubMenu', '2022-01-08 01:22:23', '2022-01-08 01:22:23'),
(829, 'smilkalai-2c', 'smilkalai-2c', 'smilkalai-2c', 'smilkalai-2c', 'smilkalai-2c', 1, 'App\\Menu', '2022-01-08 01:39:43', '2022-01-08 01:39:43'),
(832, 'inkrustuotos-akmenukais-18', 'inkrustuotos-akmenukais-1d', 'inkrustuotos-akmenukais-1d', 'inkrustuotos-akmenukais-1d', 'inkrustuotos-akmenukais-1d', 1, 'App\\SubMenu', '2022-01-08 07:33:11', '2022-01-08 07:33:11'),
(833, 'smilkalines-4f', 'smilkalines-4f', 'smilkalines-4f', 'smilkalines-4f', 'smilkalines-4f', 2, 'App\\Menu', '2022-01-08 07:45:09', '2022-01-08 07:45:09'),
(834, 'smilkalai-2d', 'smilkalai-2d', 'smilkalai-2d', 'smilkalai-2d', 'smilkalai-2d', 1, 'App\\Menu', '2022-01-08 09:05:16', '2022-01-08 09:05:16'),
(836, 'papuosalaiakmenys-34', 'papuosalaiakmenys-34', 'papuosalaiakmenys-34', 'papuosalaiakmenys-34', 'papuosalaiakmenys-34', 5, 'App\\Menu', '2022-01-08 09:07:12', '2022-01-08 09:07:12'),
(837, 'papuosalaiakmenys-35', 'papuosalaiakmenys-35', 'papuosalaiakmenys-35', 'papuosalaiakmenys-35', 'papuosalaiakmenys-35', 5, 'App\\Menu', '2022-01-08 11:15:54', '2022-01-08 11:15:54'),
(839, 'apvalios-smilkalines-1b', 'apvalios-smilkalines-1b', 'apvalios-smilkalines-1b', 'apvalios-smilkalines-1b', 'apvalios-smilkalines-1b', 5, 'App\\SubMenu', '2022-01-09 02:32:36', '2022-01-09 02:32:36'),
(844, 'transcendentines-kriaukles-c', 'transcendentines-kriaukles-c', 'transcendentines-kriaukles-c', 'transcendentines-kriaukles-c', 'transcendentines-kriaukles-c', 7, 'App\\SubMenu', '2022-01-09 06:03:13', '2022-01-09 06:03:13'),
(845, 'transcendentines-kriaukles-d', 'transcendentines-kriaukles-d', 'transcendentines-kriaukles-d', 'transcendentines-kriaukles-d', 'transcendentines-kriaukles-d', 7, 'App\\SubMenu', '2022-01-09 07:48:57', '2022-01-09 07:48:57'),
(848, 'smilkalai-2e', 'smilkalai-2e', 'smilkalai-2e', 'smilkalai-2e', 'smilkalai-2e', 1, 'App\\Menu', '2022-01-09 13:14:28', '2022-01-09 13:14:28'),
(849, 'smilkalines-50', 'smilkalines-50', 'smilkalines-50', 'smilkalines-50', 'smilkalines-50', 2, 'App\\Menu', '2022-01-09 13:14:29', '2022-01-09 13:14:29'),
(850, 'kitos-prekes-32', 'kitos-prekes-32', 'kitos-prekes-32', 'kitos-prekes-32', 'kitos-prekes-32', 7, 'App\\Menu', '2022-01-09 13:14:39', '2022-01-09 13:14:39'),
(851, 'papuosalaiakmenys-36', 'papuosalaiakmenys-36', 'papuosalaiakmenys-36', 'papuosalaiakmenys-36', 'papuosalaiakmenys-36', 5, 'App\\Menu', '2022-01-09 13:14:49', '2022-01-09 13:14:49'),
(852, 'apvalios-smilkalines-1c', 'apvalios-smilkalines-1c', 'apvalios-smilkalines-1c', 'apvalios-smilkalines-1c', 'apvalios-smilkalines-1c', 5, 'App\\SubMenu', '2022-01-09 13:14:55', '2022-01-09 13:14:55'),
(853, 'sidabro-spalvos-smilkalines-14', 'sidabro-spalvos-smilkalines-14', 'sidabro-spalvos-smilkalines-14', 'sidabro-spalvos-smilkalines-14', 'sidabro-spalvos-smilkalines-14', 3, 'App\\SubMenu', '2022-01-09 13:14:56', '2022-01-09 13:14:56'),
(854, 'aukso-spalvos-smilkalines-f', 'aukso-spalvos-smilkalines-f', 'aukso-spalvos-smilkalines-f', 'aukso-spalvos-smilkalines-f', 'aukso-spalvos-smilkalines-f', 4, 'App\\SubMenu', '2022-01-09 13:15:03', '2022-01-09 13:15:03'),
(857, 'grojantys-dubenys-32', 'grojantys-dubenys-32', 'grojantys-dubenys-32', 'grojantys-dubenys-32', 'grojantys-dubenys-32', 6, 'App\\SubMenu', '2022-01-09 13:15:16', '2022-01-09 13:15:16'),
(859, 'inkrustuotos-akmenukais-19', 'inkrustuotos-akmenukais-1e', 'inkrustuotos-akmenukais-1e', 'inkrustuotos-akmenukais-1e', 'inkrustuotos-akmenukais-1e', 1, 'App\\SubMenu', '2022-01-09 13:15:27', '2022-01-09 13:15:27'),
(861, 'medines-dezutes-smilkalines-du-viename-f', 'medines-dezutes-smilkalines-du-viename-f', 'medines-dezutes-smilkalines-du-viename-f', 'medines-dezutes-smilkalines-du-viename-f', 'medines-dezutes-smilkalines-du-viename-f', 2, 'App\\SubMenu', '2022-01-09 13:15:35', '2022-01-09 13:15:35'),
(863, 'transcendentines-kriaukles-e', 'transcendentines-kriaukles-e', 'transcendentines-kriaukles-e', 'transcendentines-kriaukles-e', 'transcendentines-kriaukles-e', 7, 'App\\SubMenu', '2022-01-09 13:15:38', '2022-01-09 13:15:38'),
(895, 'grojantys-dubenys-33', 'grojantys-dubenys-33', 'grojantys-dubenys-33', 'grojantys-dubenys-33', 'grojantys-dubenys-33', 6, 'App\\SubMenu', '2022-01-09 15:21:10', '2022-01-09 15:21:10'),
(896, 'smilkalai-2f', 'smilkalai-2f', 'smilkalai-2f', 'smilkalai-2f', 'smilkalai-2f', 1, 'App\\Menu', '2022-01-09 16:03:44', '2022-01-09 16:03:44'),
(898, 'smilkalines-51', 'smilkalines-51', 'smilkalines-51', 'smilkalines-51', 'smilkalines-51', 2, 'App\\Menu', '2022-01-09 16:03:56', '2022-01-09 16:03:56'),
(903, 'kitos-prekes-33', 'kitos-prekes-33', 'kitos-prekes-33', 'kitos-prekes-33', 'kitos-prekes-33', 7, 'App\\Menu', '2022-01-09 19:11:55', '2022-01-09 19:11:55'),
(905, 'papuosalaiakmenys-37', 'papuosalaiakmenys-37', 'papuosalaiakmenys-37', 'papuosalaiakmenys-37', 'papuosalaiakmenys-37', 5, 'App\\Menu', '2022-01-09 20:11:33', '2022-01-09 20:11:33'),
(906, 'kitos-prekes-34', 'kitos-prekes-34', 'kitos-prekes-34', 'kitos-prekes-34', 'kitos-prekes-34', 7, 'App\\Menu', '2022-01-09 20:11:48', '2022-01-09 20:11:48'),
(932, 'papuosalaiakmenys-38', 'papuosalaiakmenys-38', 'papuosalaiakmenys-38', 'papuosalaiakmenys-38', 'papuosalaiakmenys-38', 5, 'App\\Menu', '2022-01-09 20:39:36', '2022-01-09 20:39:36'),
(933, 'smilkalines-52', 'smilkalines-52', 'smilkalines-52', 'smilkalines-52', 'smilkalines-52', 2, 'App\\Menu', '2022-01-09 20:39:42', '2022-01-09 20:39:42'),
(937, 'kitos-prekes-35', 'kitos-prekes-35', 'kitos-prekes-35', 'kitos-prekes-35', 'kitos-prekes-35', 7, 'App\\Menu', '2022-01-09 20:59:43', '2022-01-09 20:59:43'),
(938, 'sidabro-spalvos-smilkalines-15', 'sidabro-spalvos-smilkalines-15', 'sidabro-spalvos-smilkalines-15', 'sidabro-spalvos-smilkalines-15', 'sidabro-spalvos-smilkalines-15', 3, 'App\\SubMenu', '2022-01-09 21:47:45', '2022-01-09 21:47:45'),
(939, 'papuosalaiakmenys-39', 'papuosalaiakmenys-39', 'papuosalaiakmenys-39', 'papuosalaiakmenys-39', 'papuosalaiakmenys-39', 5, 'App\\Menu', '2022-01-09 21:47:54', '2022-01-09 21:47:54'),
(940, 'aukso-spalvos-smilkalines-10', 'aukso-spalvos-smilkalines-10', 'aukso-spalvos-smilkalines-10', 'aukso-spalvos-smilkalines-10', 'aukso-spalvos-smilkalines-10', 4, 'App\\SubMenu', '2022-01-09 21:47:58', '2022-01-09 21:47:58'),
(941, 'apvalios-smilkalines-1d', 'apvalios-smilkalines-1d', 'apvalios-smilkalines-1d', 'apvalios-smilkalines-1d', 'apvalios-smilkalines-1d', 5, 'App\\SubMenu', '2022-01-09 21:48:03', '2022-01-09 21:48:03'),
(942, 'inkrustuotos-akmenukais-1a', 'inkrustuotos-akmenukais-1f', 'inkrustuotos-akmenukais-1f', 'inkrustuotos-akmenukais-1f', 'inkrustuotos-akmenukais-1f', 1, 'App\\SubMenu', '2022-01-09 21:48:14', '2022-01-09 21:48:14'),
(944, 'medines-dezutes-smilkalines-du-viename-10', 'medines-dezutes-smilkalines-du-viename-10', 'medines-dezutes-smilkalines-du-viename-10', 'medines-dezutes-smilkalines-du-viename-10', 'medines-dezutes-smilkalines-du-viename-10', 2, 'App\\SubMenu', '2022-01-10 02:21:07', '2022-01-10 02:21:07'),
(945, 'smilkalai-30', 'smilkalai-30', 'smilkalai-30', 'smilkalai-30', 'smilkalai-30', 1, 'App\\Menu', '2022-01-10 04:51:19', '2022-01-10 04:51:19'),
(946, 'grojantys-dubenys-34', 'grojantys-dubenys-34', 'grojantys-dubenys-34', 'grojantys-dubenys-34', 'grojantys-dubenys-34', 6, 'App\\SubMenu', '2022-01-10 05:03:33', '2022-01-10 05:03:33'),
(948, 'kitos-prekes-36', 'kitos-prekes-36', 'kitos-prekes-36', 'kitos-prekes-36', 'kitos-prekes-36', 7, 'App\\Menu', '2022-01-10 08:23:53', '2022-01-10 08:23:53'),
(949, 'papuosalaiakmenys-3a', 'papuosalaiakmenys-3a', 'papuosalaiakmenys-3a', 'papuosalaiakmenys-3a', 'papuosalaiakmenys-3a', 5, 'App\\Menu', '2022-01-10 08:24:05', '2022-01-10 08:24:05'),
(950, 'smilkalines-53', 'smilkalines-53', 'smilkalines-53', 'smilkalines-53', 'smilkalines-53', 2, 'App\\Menu', '2022-01-10 08:24:07', '2022-01-10 08:24:07'),
(951, 'smilkalai-31', 'smilkalai-31', 'smilkalai-31', 'smilkalai-31', 'smilkalai-31', 1, 'App\\Menu', '2022-01-10 08:24:18', '2022-01-10 08:24:18'),
(956, 'grojantys-dubenys-35', 'grojantys-dubenys-35', 'grojantys-dubenys-35', 'grojantys-dubenys-35', 'grojantys-dubenys-35', 6, 'App\\SubMenu', '2022-01-10 14:53:42', '2022-01-10 14:53:42'),
(957, 'grojantys-dubenys-36', 'grojantys-dubenys-36', 'grojantys-dubenys-36', 'grojantys-dubenys-36', 'grojantys-dubenys-36', 6, 'App\\SubMenu', '2022-01-10 14:55:35', '2022-01-10 14:55:35'),
(958, 'grojantys-dubenys-37', 'grojantys-dubenys-37', 'grojantys-dubenys-37', 'grojantys-dubenys-37', 'grojantys-dubenys-37', 6, 'App\\SubMenu', '2022-01-10 15:04:41', '2022-01-10 15:04:41'),
(959, 'grojantys-dubenys-38', 'grojantys-dubenys-38', 'grojantys-dubenys-38', 'grojantys-dubenys-38', 'grojantys-dubenys-38', 6, 'App\\SubMenu', '2022-01-10 16:44:26', '2022-01-10 16:44:26'),
(960, 'smilkalai-32', 'smilkalai-32', 'smilkalai-32', 'smilkalai-32', 'smilkalai-32', 1, 'App\\Menu', '2022-01-10 16:45:16', '2022-01-10 16:45:16'),
(961, 'smilkalines-54', 'smilkalines-54', 'smilkalines-54', 'smilkalines-54', 'smilkalines-54', 2, 'App\\Menu', '2022-01-10 16:45:26', '2022-01-10 16:45:26'),
(963, 'medines-dezutes-smilkalines-du-viename-11', 'medines-dezutes-smilkalines-du-viename-11', 'medines-dezutes-smilkalines-du-viename-11', 'medines-dezutes-smilkalines-du-viename-11', 'medines-dezutes-smilkalines-du-viename-11', 2, 'App\\SubMenu', '2022-01-10 18:56:44', '2022-01-10 18:56:44'),
(964, 'aukso-spalvos-smilkalines-11', 'aukso-spalvos-smilkalines-11', 'aukso-spalvos-smilkalines-11', 'aukso-spalvos-smilkalines-11', 'aukso-spalvos-smilkalines-11', 4, 'App\\SubMenu', '2022-01-10 18:57:30', '2022-01-10 18:57:30'),
(971, 'transcendentines-kriaukles-f', 'transcendentines-kriaukles-f', 'transcendentines-kriaukles-f', 'transcendentines-kriaukles-f', 'transcendentines-kriaukles-f', 7, 'App\\SubMenu', '2022-01-11 09:26:50', '2022-01-11 09:26:50'),
(972, 'inkrustuotos-akmenukais-1b', 'inkrustuotos-akmenukais-20', 'inkrustuotos-akmenukais-20', 'inkrustuotos-akmenukais-20', 'inkrustuotos-akmenukais-20', 1, 'App\\SubMenu', '2022-01-11 11:27:48', '2022-01-11 11:27:48'),
(982, 'medines-dezutes-smilkalines-du-viename-12', 'medines-dezutes-smilkalines-du-viename-12', 'medines-dezutes-smilkalines-du-viename-12', 'medines-dezutes-smilkalines-du-viename-12', 'medines-dezutes-smilkalines-du-viename-12', 2, 'App\\SubMenu', '2022-01-12 00:49:44', '2022-01-12 00:49:44'),
(984, 'sidabro-spalvos-smilkalines-16', 'sidabro-spalvos-smilkalines-16', 'sidabro-spalvos-smilkalines-16', 'sidabro-spalvos-smilkalines-16', 'sidabro-spalvos-smilkalines-16', 3, 'App\\SubMenu', '2022-01-12 07:25:58', '2022-01-12 07:25:58'),
(990, 'aukso-spalvos-smilkalines-12', 'aukso-spalvos-smilkalines-12', 'aukso-spalvos-smilkalines-12', 'aukso-spalvos-smilkalines-12', 'aukso-spalvos-smilkalines-12', 4, 'App\\SubMenu', '2022-01-12 22:34:33', '2022-01-12 22:34:33'),
(997, 'smilkalines-55', 'smilkalines-55', 'smilkalines-55', 'smilkalines-55', 'smilkalines-55', 2, 'App\\Menu', '2022-01-13 22:47:23', '2022-01-13 22:47:23'),
(998, 'sidabro-spalvos-smilkalines-17', 'sidabro-spalvos-smilkalines-17', 'sidabro-spalvos-smilkalines-17', 'sidabro-spalvos-smilkalines-17', 'sidabro-spalvos-smilkalines-17', 3, 'App\\SubMenu', '2022-01-14 22:49:45', '2022-01-14 22:49:45'),
(999, 'grojantys-dubenys-39', 'grojantys-dubenys-39', 'grojantys-dubenys-39', 'grojantys-dubenys-39', 'grojantys-dubenys-39', 6, 'App\\SubMenu', '2022-01-14 23:42:07', '2022-01-14 23:42:07'),
(1000, 'aukso-spalvos-smilkalines-13', 'aukso-spalvos-smilkalines-13', 'aukso-spalvos-smilkalines-13', 'aukso-spalvos-smilkalines-13', 'aukso-spalvos-smilkalines-13', 4, 'App\\SubMenu', '2022-01-15 04:19:39', '2022-01-15 04:19:39'),
(1003, 'grojantys-dubenys-3a', 'grojantys-dubenys-3a', 'grojantys-dubenys-3a', 'grojantys-dubenys-3a', 'grojantys-dubenys-3a', 6, 'App\\SubMenu', '2022-01-15 17:00:09', '2022-01-15 17:00:09'),
(1005, 'transcendentines-kriaukles-10', 'transcendentines-kriaukles-10', 'transcendentines-kriaukles-10', 'transcendentines-kriaukles-10', 'transcendentines-kriaukles-10', 7, 'App\\SubMenu', '2022-01-15 19:38:58', '2022-01-15 19:38:58'),
(1007, 'transcendentines-kriaukles-11', 'transcendentines-kriaukles-11', 'transcendentines-kriaukles-11', 'transcendentines-kriaukles-11', 'transcendentines-kriaukles-11', 7, 'App\\SubMenu', '2022-01-15 22:13:56', '2022-01-15 22:13:56'),
(1008, 'papuosalaiakmenys-3b', 'papuosalaiakmenys-3b', 'papuosalaiakmenys-3b', 'papuosalaiakmenys-3b', 'papuosalaiakmenys-3b', 5, 'App\\Menu', '2022-01-15 22:14:21', '2022-01-15 22:14:21'),
(1009, 'kitos-prekes-37', 'kitos-prekes-37', 'kitos-prekes-37', 'kitos-prekes-37', 'kitos-prekes-37', 7, 'App\\Menu', '2022-01-15 22:14:37', '2022-01-15 22:14:37'),
(1010, 'smilkalai-33', 'smilkalai-33', 'smilkalai-33', 'smilkalai-33', 'smilkalai-33', 1, 'App\\Menu', '2022-01-15 22:15:07', '2022-01-15 22:15:07'),
(1011, 'smilkalines-56', 'smilkalines-56', 'smilkalines-56', 'smilkalines-56', 'smilkalines-56', 2, 'App\\Menu', '2022-01-15 22:15:20', '2022-01-15 22:15:20'),
(1013, 'grojantys-dubenys-3b', 'grojantys-dubenys-3b', 'grojantys-dubenys-3b', 'grojantys-dubenys-3b', 'grojantys-dubenys-3b', 6, 'App\\SubMenu', '2022-01-16 13:31:44', '2022-01-16 13:31:44'),
(1015, 'transcendentines-kriaukles-12', 'transcendentines-kriaukles-12', 'transcendentines-kriaukles-12', 'transcendentines-kriaukles-12', 'transcendentines-kriaukles-12', 7, 'App\\SubMenu', '2022-01-16 14:33:27', '2022-01-16 14:33:27'),
(1017, 'smilkalai-34', 'smilkalai-34', 'smilkalai-34', 'smilkalai-34', 'smilkalai-34', 1, 'App\\Menu', '2022-01-16 18:09:54', '2022-01-16 18:09:54'),
(1018, 'transcendentines-kriaukles-13', 'transcendentines-kriaukles-13', 'transcendentines-kriaukles-13', 'transcendentines-kriaukles-13', 'transcendentines-kriaukles-13', 7, 'App\\SubMenu', '2022-01-16 18:09:55', '2022-01-16 18:09:55'),
(1019, 'grojantys-dubenys-3c', 'grojantys-dubenys-3c', 'grojantys-dubenys-3c', 'grojantys-dubenys-3c', 'grojantys-dubenys-3c', 6, 'App\\SubMenu', '2022-01-16 18:09:56', '2022-01-16 18:09:56'),
(1020, 'kitos-prekes-38', 'kitos-prekes-38', 'kitos-prekes-38', 'kitos-prekes-38', 'kitos-prekes-38', 7, 'App\\Menu', '2022-01-16 18:09:57', '2022-01-16 18:09:57'),
(1021, 'smilkalines-57', 'smilkalines-57', 'smilkalines-57', 'smilkalines-57', 'smilkalines-57', 2, 'App\\Menu', '2022-01-16 18:09:59', '2022-01-16 18:09:59'),
(1022, 'inkrustuotos-akmenukais-1c', 'inkrustuotos-akmenukais-21', 'inkrustuotos-akmenukais-21', 'inkrustuotos-akmenukais-21', 'inkrustuotos-akmenukais-21', 1, 'App\\SubMenu', '2022-01-16 18:09:59', '2022-01-16 18:09:59'),
(1023, 'medines-dezutes-smilkalines-du-viename-13', 'medines-dezutes-smilkalines-du-viename-13', 'medines-dezutes-smilkalines-du-viename-13', 'medines-dezutes-smilkalines-du-viename-13', 'medines-dezutes-smilkalines-du-viename-13', 2, 'App\\SubMenu', '2022-01-16 18:10:00', '2022-01-16 18:10:00'),
(1025, 'grojantys-dubenys-3d', 'grojantys-dubenys-3d', 'grojantys-dubenys-3d', 'grojantys-dubenys-3d', 'grojantys-dubenys-3d', 6, 'App\\SubMenu', '2022-01-17 03:25:08', '2022-01-17 03:25:08'),
(1026, 'papuosalaiakmenys-3c', 'papuosalaiakmenys-3c', 'papuosalaiakmenys-3c', 'papuosalaiakmenys-3c', 'papuosalaiakmenys-3c', 5, 'App\\Menu', '2022-01-17 09:24:09', '2022-01-17 09:24:09'),
(1027, 'smilkalai-35', 'smilkalai-35', 'smilkalai-35', 'smilkalai-35', 'smilkalai-35', 1, 'App\\Menu', '2022-01-17 09:24:16', '2022-01-17 09:24:16'),
(1033, 'grojantys-dubenys-3e', 'grojantys-dubenys-3e', 'grojantys-dubenys-3e', 'grojantys-dubenys-3e', 'grojantys-dubenys-3e', 6, 'App\\SubMenu', '2022-01-18 12:38:18', '2022-01-18 12:38:18'),
(1034, 'grojantys-dubenys-3f', 'grojantys-dubenys-3f', 'grojantys-dubenys-3f', 'grojantys-dubenys-3f', 'grojantys-dubenys-3f', 6, 'App\\SubMenu', '2022-01-18 12:38:52', '2022-01-18 12:38:52'),
(1037, 'smilkalai-36', 'smilkalai-36', 'smilkalai-36', 'smilkalai-36', 'smilkalai-36', 1, 'App\\Menu', '2022-01-18 20:38:41', '2022-01-18 20:38:41'),
(1038, 'smilkalines-58', 'smilkalines-58', 'smilkalines-58', 'smilkalines-58', 'smilkalines-58', 2, 'App\\Menu', '2022-01-18 20:39:09', '2022-01-18 20:39:09'),
(1040, 'transcendentines-kriaukles-14', 'transcendentines-kriaukles-14', 'transcendentines-kriaukles-14', 'transcendentines-kriaukles-14', 'transcendentines-kriaukles-14', 7, 'App\\SubMenu', '2022-01-18 20:39:47', '2022-01-18 20:39:47'),
(1041, 'papuosalaiakmenys-3d', 'papuosalaiakmenys-3d', 'papuosalaiakmenys-3d', 'papuosalaiakmenys-3d', 'papuosalaiakmenys-3d', 5, 'App\\Menu', '2022-01-18 20:39:59', '2022-01-18 20:39:59'),
(1042, 'grojantys-dubenys-40', 'grojantys-dubenys-40', 'grojantys-dubenys-40', 'grojantys-dubenys-40', 'grojantys-dubenys-40', 6, 'App\\SubMenu', '2022-01-18 20:40:19', '2022-01-18 20:40:19'),
(1043, 'apvalios-smilkalines-1e', 'apvalios-smilkalines-1e', 'apvalios-smilkalines-1e', 'apvalios-smilkalines-1e', 'apvalios-smilkalines-1e', 5, 'App\\SubMenu', '2022-01-18 23:24:15', '2022-01-18 23:24:15'),
(1044, 'inkrustuotos-akmenukais-1d', 'inkrustuotos-akmenukais-22', 'inkrustuotos-akmenukais-22', 'inkrustuotos-akmenukais-22', 'inkrustuotos-akmenukais-22', 1, 'App\\SubMenu', '2022-01-19 01:28:12', '2022-01-19 01:28:12'),
(1045, 'transcendentines-kriaukles-15', 'transcendentines-kriaukles-15', 'transcendentines-kriaukles-15', 'transcendentines-kriaukles-15', 'transcendentines-kriaukles-15', 7, 'App\\SubMenu', '2022-01-19 11:26:45', '2022-01-19 11:26:45'),
(1049, 'kitos-prekes-39', 'kitos-prekes-39', 'kitos-prekes-39', 'kitos-prekes-39', 'kitos-prekes-39', 7, 'App\\Menu', '2022-01-19 12:17:49', '2022-01-19 12:17:49'),
(1050, 'medines-dezutes-smilkalines-du-viename-14', 'medines-dezutes-smilkalines-du-viename-14', 'medines-dezutes-smilkalines-du-viename-14', 'medines-dezutes-smilkalines-du-viename-14', 'medines-dezutes-smilkalines-du-viename-14', 2, 'App\\SubMenu', '2022-01-19 18:22:40', '2022-01-19 18:22:40'),
(1051, 'transcendentines-kriaukles-16', 'transcendentines-kriaukles-16', 'transcendentines-kriaukles-16', 'transcendentines-kriaukles-16', 'transcendentines-kriaukles-16', 7, 'App\\SubMenu', '2022-01-19 20:21:56', '2022-01-19 20:21:56'),
(1052, 'papuosalaiakmenys-3e', 'papuosalaiakmenys-3e', 'papuosalaiakmenys-3e', 'papuosalaiakmenys-3e', 'papuosalaiakmenys-3e', 5, 'App\\Menu', '2022-01-19 20:22:19', '2022-01-19 20:22:19'),
(1053, 'grojantys-dubenys-41', 'grojantys-dubenys-41', 'grojantys-dubenys-41', 'grojantys-dubenys-41', 'grojantys-dubenys-41', 6, 'App\\SubMenu', '2022-01-19 20:22:36', '2022-01-19 20:22:36'),
(1055, 'kitos-prekes-3a', 'kitos-prekes-3a', 'kitos-prekes-3a', 'kitos-prekes-3a', 'kitos-prekes-3a', 7, 'App\\Menu', '2022-01-19 21:11:43', '2022-01-19 21:11:43'),
(1057, 'aukso-spalvos-smilkalines-14', 'aukso-spalvos-smilkalines-14', 'aukso-spalvos-smilkalines-14', 'aukso-spalvos-smilkalines-14', 'aukso-spalvos-smilkalines-14', 4, 'App\\SubMenu', '2022-01-20 08:47:37', '2022-01-20 08:47:37'),
(1063, 'smilkalai-37', 'smilkalai-37', 'smilkalai-37', 'smilkalai-37', 'smilkalai-37', 1, 'App\\Menu', '2022-01-21 02:54:54', '2022-01-21 02:54:54'),
(1064, 'grojantys-dubenys-42', 'grojantys-dubenys-42', 'grojantys-dubenys-42', 'grojantys-dubenys-42', 'grojantys-dubenys-42', 6, 'App\\SubMenu', '2022-01-21 12:30:19', '2022-01-21 12:30:19'),
(1067, 'kitos-prekes-3b', 'kitos-prekes-3b', 'kitos-prekes-3b', 'kitos-prekes-3b', 'kitos-prekes-3b', 7, 'App\\Menu', '2022-01-21 21:07:42', '2022-01-21 21:07:42'),
(1071, 'sidabro-spalvos-smilkalines-18', 'sidabro-spalvos-smilkalines-18', 'sidabro-spalvos-smilkalines-18', 'sidabro-spalvos-smilkalines-18', 'sidabro-spalvos-smilkalines-18', 3, 'App\\SubMenu', '2022-01-23 00:08:08', '2022-01-23 00:08:08'),
(1073, 'grojantys-dubenys-43', 'grojantys-dubenys-43', 'grojantys-dubenys-43', 'grojantys-dubenys-43', 'grojantys-dubenys-43', 6, 'App\\SubMenu', '2022-01-23 02:22:07', '2022-01-23 02:22:07'),
(1076, 'apvalios-smilkalines-1f', 'apvalios-smilkalines-1f', 'apvalios-smilkalines-1f', 'apvalios-smilkalines-1f', 'apvalios-smilkalines-1f', 5, 'App\\SubMenu', '2022-01-23 20:35:10', '2022-01-23 20:35:10'),
(1077, 'grojantys-dubenys-44', 'grojantys-dubenys-44', 'grojantys-dubenys-44', 'grojantys-dubenys-44', 'grojantys-dubenys-44', 6, 'App\\SubMenu', '2022-01-23 23:08:09', '2022-01-23 23:08:09'),
(1078, 'apvalios-smilkalines-20', 'apvalios-smilkalines-20', 'apvalios-smilkalines-20', 'apvalios-smilkalines-20', 'apvalios-smilkalines-20', 5, 'App\\SubMenu', '2022-01-24 05:07:23', '2022-01-24 05:07:23'),
(1079, 'transcendentines-kriaukles-17', 'transcendentines-kriaukles-17', 'transcendentines-kriaukles-17', 'transcendentines-kriaukles-17', 'transcendentines-kriaukles-17', 7, 'App\\SubMenu', '2022-01-24 05:35:11', '2022-01-24 05:35:11'),
(1081, 'smilkalai-38', 'smilkalai-38', 'smilkalai-38', 'smilkalai-38', 'smilkalai-38', 1, 'App\\Menu', '2022-01-24 07:30:39', '2022-01-24 07:30:39'),
(1082, 'grojantys-dubenys-45', 'grojantys-dubenys-45', 'grojantys-dubenys-45', 'grojantys-dubenys-45', 'grojantys-dubenys-45', 6, 'App\\SubMenu', '2022-01-24 09:47:50', '2022-01-24 09:47:50'),
(1084, 'kitos-prekes-3c', 'kitos-prekes-3c', 'kitos-prekes-3c', 'kitos-prekes-3c', 'kitos-prekes-3c', 7, 'App\\Menu', '2022-01-24 12:04:02', '2022-01-24 12:04:02'),
(1090, 'smilkalines-59', 'smilkalines-59', 'smilkalines-59', 'smilkalines-59', 'smilkalines-59', 2, 'App\\Menu', '2022-01-25 12:39:49', '2022-01-25 12:39:49'),
(1094, 'apvalios-smilkalines-21', 'apvalios-smilkalines-21', 'apvalios-smilkalines-21', 'apvalios-smilkalines-21', 'apvalios-smilkalines-21', 5, 'App\\SubMenu', '2022-01-26 00:16:24', '2022-01-26 00:16:24'),
(1096, 'smilkalines-5a', 'smilkalines-5a', 'smilkalines-5a', 'smilkalines-5a', 'smilkalines-5a', 2, 'App\\Menu', '2022-01-26 06:40:11', '2022-01-26 06:40:11'),
(1097, 'kitos-prekes-3d', 'kitos-prekes-3d', 'kitos-prekes-3d', 'kitos-prekes-3d', 'kitos-prekes-3d', 7, 'App\\Menu', '2022-01-26 06:42:01', '2022-01-26 06:42:01'),
(1098, 'smilkalai-39', 'smilkalai-39', 'smilkalai-39', 'smilkalai-39', 'smilkalai-39', 1, 'App\\Menu', '2022-01-26 06:42:25', '2022-01-26 06:42:25'),
(1101, 'sidabro-spalvos-smilkalines-19', 'sidabro-spalvos-smilkalines-19', 'sidabro-spalvos-smilkalines-19', 'sidabro-spalvos-smilkalines-19', 'sidabro-spalvos-smilkalines-19', 3, 'App\\SubMenu', '2022-01-26 13:05:29', '2022-01-26 13:05:29'),
(1102, 'inkrustuotos-akmenukais-1e', 'inkrustuotos-akmenukais-23', 'inkrustuotos-akmenukais-23', 'inkrustuotos-akmenukais-23', 'inkrustuotos-akmenukais-23', 1, 'App\\SubMenu', '2022-01-26 14:11:05', '2022-01-26 14:11:05'),
(1103, 'kitos-prekes-3e', 'kitos-prekes-3e', 'kitos-prekes-3e', 'kitos-prekes-3e', 'kitos-prekes-3e', 7, 'App\\Menu', '2022-01-26 15:18:51', '2022-01-26 15:18:51'),
(1105, 'papuosalaiakmenys-3f', 'papuosalaiakmenys-3f', 'papuosalaiakmenys-3f', 'papuosalaiakmenys-3f', 'papuosalaiakmenys-3f', 5, 'App\\Menu', '2022-01-26 15:20:17', '2022-01-26 15:20:17'),
(1107, 'smilkalines-5b', 'smilkalines-5b', 'smilkalines-5b', 'smilkalines-5b', 'smilkalines-5b', 2, 'App\\Menu', '2022-01-26 15:21:08', '2022-01-26 15:21:08'),
(1113, 'medines-dezutes-smilkalines-du-viename-15', 'medines-dezutes-smilkalines-du-viename-15', 'medines-dezutes-smilkalines-du-viename-15', 'medines-dezutes-smilkalines-du-viename-15', 'medines-dezutes-smilkalines-du-viename-15', 2, 'App\\SubMenu', '2022-01-27 08:12:02', '2022-01-27 08:12:02'),
(1122, 'sidabro-spalvos-smilkalines-1a', 'sidabro-spalvos-smilkalines-1a', 'sidabro-spalvos-smilkalines-1a', 'sidabro-spalvos-smilkalines-1a', 'sidabro-spalvos-smilkalines-1a', 3, 'App\\SubMenu', '2022-01-28 18:47:44', '2022-01-28 18:47:44'),
(1124, 'inkrustuotos-akmenukais-1f', 'inkrustuotos-akmenukais-24', 'inkrustuotos-akmenukais-24', 'inkrustuotos-akmenukais-24', 'inkrustuotos-akmenukais-24', 1, 'App\\SubMenu', '2022-01-28 19:22:44', '2022-01-28 19:22:44'),
(1125, 'medines-dezutes-smilkalines-du-viename-16', 'medines-dezutes-smilkalines-du-viename-16', 'medines-dezutes-smilkalines-du-viename-16', 'medines-dezutes-smilkalines-du-viename-16', 'medines-dezutes-smilkalines-du-viename-16', 2, 'App\\SubMenu', '2022-01-28 19:36:53', '2022-01-28 19:36:53'),
(1127, 'inkrustuotos-akmenukais-20', 'inkrustuotos-akmenukais-25', 'inkrustuotos-akmenukais-25', 'inkrustuotos-akmenukais-25', 'inkrustuotos-akmenukais-25', 1, 'App\\SubMenu', '2022-01-28 21:42:36', '2022-01-28 21:42:36'),
(1135, 'kitos-prekes-3f', 'kitos-prekes-3f', 'kitos-prekes-3f', 'kitos-prekes-3f', 'kitos-prekes-3f', 7, 'App\\Menu', '2022-01-29 07:00:03', '2022-01-29 07:00:03'),
(1137, 'smilkalines-5c', 'smilkalines-5c', 'smilkalines-5c', 'smilkalines-5c', 'smilkalines-5c', 2, 'App\\Menu', '2022-01-29 20:28:15', '2022-01-29 20:28:15'),
(1145, 'smilkalai-3a', 'smilkalai-3a', 'smilkalai-3a', 'smilkalai-3a', 'smilkalai-3a', 1, 'App\\Menu', '2022-01-30 12:59:42', '2022-01-30 12:59:42'),
(1148, 'transcendentines-kriaukles-18', 'transcendentines-kriaukles-18', 'transcendentines-kriaukles-18', 'transcendentines-kriaukles-18', 'transcendentines-kriaukles-18', 7, 'App\\SubMenu', '2022-01-30 20:25:54', '2022-01-30 20:25:54'),
(1149, 'inkrustuotos-akmenukais-21', 'inkrustuotos-akmenukais-26', 'inkrustuotos-akmenukais-26', 'inkrustuotos-akmenukais-26', 'inkrustuotos-akmenukais-26', 1, 'App\\SubMenu', '2022-01-30 22:43:10', '2022-01-30 22:43:10'),
(1155, 'aukso-spalvos-smilkalines-15', 'aukso-spalvos-smilkalines-15', 'aukso-spalvos-smilkalines-15', 'aukso-spalvos-smilkalines-15', 'aukso-spalvos-smilkalines-15', 4, 'App\\SubMenu', '2022-01-31 08:42:27', '2022-01-31 08:42:27'),
(1157, 'grojantys-dubenys-46', 'grojantys-dubenys-46', 'grojantys-dubenys-46', 'grojantys-dubenys-46', 'grojantys-dubenys-46', 6, 'App\\SubMenu', '2022-01-31 09:24:11', '2022-01-31 09:24:11'),
(1158, 'kitos-prekes-40', 'kitos-prekes-40', 'kitos-prekes-40', 'kitos-prekes-40', 'kitos-prekes-40', 7, 'App\\Menu', '2022-01-31 11:18:57', '2022-01-31 11:18:57'),
(1161, 'transcendentines-kriaukles-19', 'transcendentines-kriaukles-19', 'transcendentines-kriaukles-19', 'transcendentines-kriaukles-19', 'transcendentines-kriaukles-19', 7, 'App\\SubMenu', '2022-01-31 13:10:43', '2022-01-31 13:10:43'),
(1163, 'papuosalaiakmenys-40', 'papuosalaiakmenys-40', 'papuosalaiakmenys-40', 'papuosalaiakmenys-40', 'papuosalaiakmenys-40', 5, 'App\\Menu', '2022-01-31 14:08:13', '2022-01-31 14:08:13'),
(1165, 'smilkalai-3b', 'smilkalai-3b', 'smilkalai-3b', 'smilkalai-3b', 'smilkalai-3b', 1, 'App\\Menu', '2022-01-31 14:36:41', '2022-01-31 14:36:41'),
(1166, 'smilkalai-3c', 'smilkalai-3c', 'smilkalai-3c', 'smilkalai-3c', 'smilkalai-3c', 1, 'App\\Menu', '2022-01-31 14:47:50', '2022-01-31 14:47:50');
INSERT INTO `slugs` (`id`, `slug_en`, `slug_lt`, `slug_rus`, `slug_pt`, `slug_es`, `slugable_id`, `slugable_type`, `created_at`, `updated_at`) VALUES
(1168, 'smilkalines-5d', 'smilkalines-5d', 'smilkalines-5d', 'smilkalines-5d', 'smilkalines-5d', 2, 'App\\Menu', '2022-01-31 15:15:55', '2022-01-31 15:15:55'),
(1172, 'papuosalaiakmenys-41', 'papuosalaiakmenys-41', 'papuosalaiakmenys-41', 'papuosalaiakmenys-41', 'papuosalaiakmenys-41', 5, 'App\\Menu', '2022-01-31 18:40:48', '2022-01-31 18:40:48'),
(1173, 'smilkalines-5e', 'smilkalines-5e', 'smilkalines-5e', 'smilkalines-5e', 'smilkalines-5e', 2, 'App\\Menu', '2022-01-31 18:41:22', '2022-01-31 18:41:22'),
(1174, 'kitos-prekes-41', 'kitos-prekes-41', 'kitos-prekes-41', 'kitos-prekes-41', 'kitos-prekes-41', 7, 'App\\Menu', '2022-01-31 18:43:31', '2022-01-31 18:43:31'),
(1176, 'smilkalai-3d', 'smilkalai-3d', 'smilkalai-3d', 'smilkalai-3d', 'smilkalai-3d', 1, 'App\\Menu', '2022-01-31 18:45:10', '2022-01-31 18:45:10'),
(1178, 'sidabro-spalvos-smilkalines-1b', 'sidabro-spalvos-smilkalines-1b', 'sidabro-spalvos-smilkalines-1b', 'sidabro-spalvos-smilkalines-1b', 'sidabro-spalvos-smilkalines-1b', 3, 'App\\SubMenu', '2022-01-31 19:08:41', '2022-01-31 19:08:41'),
(1183, 'smilkalines-5f', 'smilkalines-5f', 'smilkalines-5f', 'smilkalines-5f', 'smilkalines-5f', 2, 'App\\Menu', '2022-02-01 07:45:28', '2022-02-01 07:45:28'),
(1184, 'grojantys-dubenys-47', 'grojantys-dubenys-47', 'grojantys-dubenys-47', 'grojantys-dubenys-47', 'grojantys-dubenys-47', 6, 'App\\SubMenu', '2022-02-01 07:49:54', '2022-02-01 07:49:54'),
(1186, 'smilkalines-60', 'smilkalines-60', 'smilkalines-60', 'smilkalines-60', 'smilkalines-60', 2, 'App\\Menu', '2022-02-01 11:22:11', '2022-02-01 11:22:11'),
(1188, 'papuosalaiakmenys-42', 'papuosalaiakmenys-42', 'papuosalaiakmenys-42', 'papuosalaiakmenys-42', 'papuosalaiakmenys-42', 5, 'App\\Menu', '2022-02-01 11:22:26', '2022-02-01 11:22:26'),
(1190, 'kitos-prekes-42', 'kitos-prekes-42', 'kitos-prekes-42', 'kitos-prekes-42', 'kitos-prekes-42', 7, 'App\\Menu', '2022-02-01 11:22:58', '2022-02-01 11:22:58'),
(1191, 'smilkalai-3e', 'smilkalai-3e', 'smilkalai-3e', 'smilkalai-3e', 'smilkalai-3e', 1, 'App\\Menu', '2022-02-01 11:23:17', '2022-02-01 11:23:17'),
(1192, 'aukso-spalvos-smilkalines-16', 'aukso-spalvos-smilkalines-16', 'aukso-spalvos-smilkalines-16', 'aukso-spalvos-smilkalines-16', 'aukso-spalvos-smilkalines-16', 4, 'App\\SubMenu', '2022-02-01 12:05:43', '2022-02-01 12:05:43'),
(1193, 'kitos-prekes-43', 'kitos-prekes-43', 'kitos-prekes-43', 'kitos-prekes-43', 'kitos-prekes-43', 7, 'App\\Menu', '2022-02-01 13:57:33', '2022-02-01 13:57:33'),
(1194, 'smilkalai-3f', 'smilkalai-3f', 'smilkalai-3f', 'smilkalai-3f', 'smilkalai-3f', 1, 'App\\Menu', '2022-02-01 14:00:34', '2022-02-01 14:00:34'),
(1195, 'papuosalaiakmenys-43', 'papuosalaiakmenys-43', 'papuosalaiakmenys-43', 'papuosalaiakmenys-43', 'papuosalaiakmenys-43', 5, 'App\\Menu', '2022-02-01 14:02:00', '2022-02-01 14:02:00'),
(1197, 'aukso-spalvos-smilkalines-17', 'aukso-spalvos-smilkalines-17', 'aukso-spalvos-smilkalines-17', 'aukso-spalvos-smilkalines-17', 'aukso-spalvos-smilkalines-17', 4, 'App\\SubMenu', '2022-02-01 14:11:28', '2022-02-01 14:11:28'),
(1198, 'sidabro-spalvos-smilkalines-1c', 'sidabro-spalvos-smilkalines-1c', 'sidabro-spalvos-smilkalines-1c', 'sidabro-spalvos-smilkalines-1c', 'sidabro-spalvos-smilkalines-1c', 3, 'App\\SubMenu', '2022-02-01 14:11:34', '2022-02-01 14:11:34'),
(1199, 'inkrustuotos-akmenukais-22', 'inkrustuotos-akmenukais-27', 'inkrustuotos-akmenukais-27', 'inkrustuotos-akmenukais-27', 'inkrustuotos-akmenukais-27', 1, 'App\\SubMenu', '2022-02-01 14:11:48', '2022-02-01 14:11:48'),
(1200, 'apvalios-smilkalines-22', 'apvalios-smilkalines-22', 'apvalios-smilkalines-22', 'apvalios-smilkalines-22', 'apvalios-smilkalines-22', 5, 'App\\SubMenu', '2022-02-01 14:11:54', '2022-02-01 14:11:54'),
(1201, 'papuosalaiakmenys-44', 'papuosalaiakmenys-44', 'papuosalaiakmenys-44', 'papuosalaiakmenys-44', 'papuosalaiakmenys-44', 5, 'App\\Menu', '2022-02-01 14:44:55', '2022-02-01 14:44:55'),
(1205, 'papuosalaiakmenys-45', 'papuosalaiakmenys-45', 'papuosalaiakmenys-45', 'papuosalaiakmenys-45', 'papuosalaiakmenys-45', 5, 'App\\Menu', '2022-02-01 18:23:21', '2022-02-01 18:23:21'),
(1209, 'papuosalaiakmenys-46', 'papuosalaiakmenys-46', 'papuosalaiakmenys-46', 'papuosalaiakmenys-46', 'papuosalaiakmenys-46', 5, 'App\\Menu', '2022-02-01 21:10:20', '2022-02-01 21:10:20'),
(1211, 'transcendentines-kriaukles-1a', 'transcendentines-kriaukles-1a', 'transcendentines-kriaukles-1a', 'transcendentines-kriaukles-1a', 'transcendentines-kriaukles-1a', 7, 'App\\SubMenu', '2022-02-02 00:24:24', '2022-02-02 00:24:24'),
(1213, 'smilkalines-61', 'smilkalines-61', 'smilkalines-61', 'smilkalines-61', 'smilkalines-61', 2, 'App\\Menu', '2022-02-02 07:31:58', '2022-02-02 07:31:58'),
(1214, 'papuosalaiakmenys-47', 'papuosalaiakmenys-47', 'papuosalaiakmenys-47', 'papuosalaiakmenys-47', 'papuosalaiakmenys-47', 5, 'App\\Menu', '2022-02-02 07:33:10', '2022-02-02 07:33:10'),
(1216, 'kitos-prekes-44', 'kitos-prekes-44', 'kitos-prekes-44', 'kitos-prekes-44', 'kitos-prekes-44', 7, 'App\\Menu', '2022-02-02 07:34:02', '2022-02-02 07:34:02'),
(1217, 'smilkalai-40', 'smilkalai-40', 'smilkalai-40', 'smilkalai-40', 'smilkalai-40', 1, 'App\\Menu', '2022-02-02 07:34:14', '2022-02-02 07:34:14'),
(1222, 'smilkalai-41', 'smilkalai-41', 'smilkalai-41', 'smilkalai-41', 'smilkalai-41', 1, 'App\\Menu', '2022-02-02 20:58:34', '2022-02-02 20:58:34'),
(1223, 'kitos-prekes-45', 'kitos-prekes-45', 'kitos-prekes-45', 'kitos-prekes-45', 'kitos-prekes-45', 7, 'App\\Menu', '2022-02-02 20:58:34', '2022-02-02 20:58:34'),
(1224, 'smilkalines-62', 'smilkalines-62', 'smilkalines-62', 'smilkalines-62', 'smilkalines-62', 2, 'App\\Menu', '2022-02-02 20:58:36', '2022-02-02 20:58:36'),
(1225, 'papuosalaiakmenys-48', 'papuosalaiakmenys-48', 'papuosalaiakmenys-48', 'papuosalaiakmenys-48', 'papuosalaiakmenys-48', 5, 'App\\Menu', '2022-02-02 20:58:36', '2022-02-02 20:58:36'),
(1227, 'sidabro-spalvos-smilkalines-1d', 'sidabro-spalvos-smilkalines-1d', 'sidabro-spalvos-smilkalines-1d', 'sidabro-spalvos-smilkalines-1d', 'sidabro-spalvos-smilkalines-1d', 3, 'App\\SubMenu', '2022-02-02 23:16:30', '2022-02-02 23:16:30'),
(1228, 'aukso-spalvos-smilkalines-18', 'aukso-spalvos-smilkalines-18', 'aukso-spalvos-smilkalines-18', 'aukso-spalvos-smilkalines-18', 'aukso-spalvos-smilkalines-18', 4, 'App\\SubMenu', '2022-02-03 02:37:34', '2022-02-03 02:37:34'),
(1230, 'sidabro-spalvos-smilkalines-1e', 'sidabro-spalvos-smilkalines-1e', 'sidabro-spalvos-smilkalines-1e', 'sidabro-spalvos-smilkalines-1e', 'sidabro-spalvos-smilkalines-1e', 3, 'App\\SubMenu', '2022-02-03 03:47:54', '2022-02-03 03:47:54'),
(1231, 'medines-dezutes-smilkalines-du-viename-17', 'medines-dezutes-smilkalines-du-viename-17', 'medines-dezutes-smilkalines-du-viename-17', 'medines-dezutes-smilkalines-du-viename-17', 'medines-dezutes-smilkalines-du-viename-17', 2, 'App\\SubMenu', '2022-02-03 03:58:14', '2022-02-03 03:58:14'),
(1232, 'grojantys-dubenys-48', 'grojantys-dubenys-48', 'grojantys-dubenys-48', 'grojantys-dubenys-48', 'grojantys-dubenys-48', 6, 'App\\SubMenu', '2022-02-03 04:13:44', '2022-02-03 04:13:44'),
(1235, 'transcendentines-kriaukles-1b', 'transcendentines-kriaukles-1b', 'transcendentines-kriaukles-1b', 'transcendentines-kriaukles-1b', 'transcendentines-kriaukles-1b', 7, 'App\\SubMenu', '2022-02-03 04:34:22', '2022-02-03 04:34:22'),
(1238, 'kitos-prekes-46', 'kitos-prekes-46', 'kitos-prekes-46', 'kitos-prekes-46', 'kitos-prekes-46', 7, 'App\\Menu', '2022-02-03 05:11:08', '2022-02-03 05:11:08'),
(1240, 'papuosalaiakmenys-49', 'papuosalaiakmenys-49', 'papuosalaiakmenys-49', 'papuosalaiakmenys-49', 'papuosalaiakmenys-49', 5, 'App\\Menu', '2022-02-03 06:31:48', '2022-02-03 06:31:48'),
(1241, 'smilkalai-42', 'smilkalai-42', 'smilkalai-42', 'smilkalai-42', 'smilkalai-42', 1, 'App\\Menu', '2022-02-03 13:37:16', '2022-02-03 13:37:16'),
(1245, 'grojantys-dubenys-49', 'grojantys-dubenys-49', 'grojantys-dubenys-49', 'grojantys-dubenys-49', 'grojantys-dubenys-49', 6, 'App\\SubMenu', '2022-02-03 15:07:47', '2022-02-03 15:07:47'),
(1250, 'papuosalaiakmenys-4a', 'papuosalaiakmenys-4a', 'papuosalaiakmenys-4a', 'papuosalaiakmenys-4a', 'papuosalaiakmenys-4a', 5, 'App\\Menu', '2022-02-06 01:49:43', '2022-02-06 01:49:43'),
(1252, 'papuosalaiakmenys-4b', 'papuosalaiakmenys-4b', 'papuosalaiakmenys-4b', 'papuosalaiakmenys-4b', 'papuosalaiakmenys-4b', 5, 'App\\Menu', '2022-02-06 08:06:38', '2022-02-06 08:06:38'),
(1255, 'papuosalaiakmenys-4c', 'papuosalaiakmenys-4c', 'papuosalaiakmenys-4c', 'papuosalaiakmenys-4c', 'papuosalaiakmenys-4c', 5, 'App\\Menu', '2022-02-07 14:00:47', '2022-02-07 14:00:47'),
(1256, 'transcendentines-kriaukles-1c', 'transcendentines-kriaukles-1c', 'transcendentines-kriaukles-1c', 'transcendentines-kriaukles-1c', 'transcendentines-kriaukles-1c', 7, 'App\\SubMenu', '2022-02-07 16:54:26', '2022-02-07 16:54:26'),
(1257, 'grojantys-dubenys-4a', 'grojantys-dubenys-4a', 'grojantys-dubenys-4a', 'grojantys-dubenys-4a', 'grojantys-dubenys-4a', 6, 'App\\SubMenu', '2022-02-08 06:15:58', '2022-02-08 06:15:58'),
(1260, 'inkrustuotos-akmenukais-23', 'inkrustuotos-akmenukais-28', 'inkrustuotos-akmenukais-28', 'inkrustuotos-akmenukais-28', 'inkrustuotos-akmenukais-28', 1, 'App\\SubMenu', '2022-02-09 03:57:10', '2022-02-09 03:57:10'),
(1262, 'smilkalai-43', 'smilkalai-43', 'smilkalai-43', 'smilkalai-43', 'smilkalai-43', 1, 'App\\Menu', '2022-02-09 11:04:27', '2022-02-09 11:04:27'),
(1267, 'inkrustuotos-akmenukais-24', 'inkrustuotos-akmenukais-29', 'inkrustuotos-akmenukais-29', 'inkrustuotos-akmenukais-29', 'inkrustuotos-akmenukais-29', 1, 'App\\SubMenu', '2022-02-09 17:25:36', '2022-02-09 17:25:36'),
(1268, 'smilkalai-44', 'smilkalai-44', 'smilkalai-44', 'smilkalai-44', 'smilkalai-44', 1, 'App\\Menu', '2022-02-10 08:50:43', '2022-02-10 08:50:43'),
(1269, 'kitos-prekes-47', 'kitos-prekes-47', 'kitos-prekes-47', 'kitos-prekes-47', 'kitos-prekes-47', 7, 'App\\Menu', '2022-02-10 08:50:43', '2022-02-10 08:50:43'),
(1270, 'kitos-prekes-48', 'kitos-prekes-48', 'kitos-prekes-48', 'kitos-prekes-48', 'kitos-prekes-48', 7, 'App\\Menu', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1271, 'papuosalaiakmenys-4d', 'papuosalaiakmenys-4d', 'papuosalaiakmenys-4d', 'papuosalaiakmenys-4d', 'papuosalaiakmenys-4d', 5, 'App\\Menu', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1272, 'smilkalines-63', 'smilkalines-63', 'smilkalines-63', 'smilkalines-63', 'smilkalines-63', 2, 'App\\Menu', '2022-02-10 08:50:45', '2022-02-10 08:50:45'),
(1273, 'medines-dezutes-smilkalines-du-viename-18', 'medines-dezutes-smilkalines-du-viename-18', 'medines-dezutes-smilkalines-du-viename-18', 'medines-dezutes-smilkalines-du-viename-18', 'medines-dezutes-smilkalines-du-viename-18', 2, 'App\\SubMenu', '2022-02-10 12:50:41', '2022-02-10 12:50:41'),
(1278, 'kitos-prekes-49', 'kitos-prekes-49', 'kitos-prekes-49', 'kitos-prekes-49', 'kitos-prekes-49', 7, 'App\\Menu', '2022-02-11 14:24:46', '2022-02-11 14:24:46'),
(1280, 'papuosalaiakmenys-4e', 'papuosalaiakmenys-4e', 'papuosalaiakmenys-4e', 'papuosalaiakmenys-4e', 'papuosalaiakmenys-4e', 5, 'App\\Menu', '2022-02-11 14:25:19', '2022-02-11 14:25:19'),
(1281, 'smilkalines-64', 'smilkalines-64', 'smilkalines-64', 'smilkalines-64', 'smilkalines-64', 2, 'App\\Menu', '2022-02-11 14:25:25', '2022-02-11 14:25:25'),
(1282, 'smilkalai-45', 'smilkalai-45', 'smilkalai-45', 'smilkalai-45', 'smilkalai-45', 1, 'App\\Menu', '2022-02-11 14:25:31', '2022-02-11 14:25:31'),
(1283, 'papuosalaiakmenys-4f', 'papuosalaiakmenys-4f', 'papuosalaiakmenys-4f', 'papuosalaiakmenys-4f', 'papuosalaiakmenys-4f', 5, 'App\\Menu', '2022-02-11 14:30:35', '2022-02-11 14:30:35'),
(1285, 'smilkalines-65', 'smilkalines-65', 'smilkalines-65', 'smilkalines-65', 'smilkalines-65', 2, 'App\\Menu', '2022-02-11 15:50:20', '2022-02-11 15:50:20'),
(1286, 'papuosalaiakmenys-50', 'papuosalaiakmenys-50', 'papuosalaiakmenys-50', 'papuosalaiakmenys-50', 'papuosalaiakmenys-50', 5, 'App\\Menu', '2022-02-11 15:52:08', '2022-02-11 15:52:08'),
(1287, 'kitos-prekes-4a', 'kitos-prekes-4a', 'kitos-prekes-4a', 'kitos-prekes-4a', 'kitos-prekes-4a', 7, 'App\\Menu', '2022-02-11 15:52:31', '2022-02-11 15:52:31'),
(1288, 'smilkalai-46', 'smilkalai-46', 'smilkalai-46', 'smilkalai-46', 'smilkalai-46', 1, 'App\\Menu', '2022-02-11 15:52:53', '2022-02-11 15:52:53'),
(1290, 'smilkalai-47', 'smilkalai-47', 'smilkalai-47', 'smilkalai-47', 'smilkalai-47', 1, 'App\\Menu', '2022-02-11 19:57:50', '2022-02-11 19:57:50'),
(1291, 'apvalios-smilkalines-23', 'apvalios-smilkalines-23', 'apvalios-smilkalines-23', 'apvalios-smilkalines-23', 'apvalios-smilkalines-23', 5, 'App\\SubMenu', '2022-02-11 21:14:23', '2022-02-11 21:14:23'),
(1292, 'papuosalaiakmenys-51', 'papuosalaiakmenys-51', 'papuosalaiakmenys-51', 'papuosalaiakmenys-51', 'papuosalaiakmenys-51', 5, 'App\\Menu', '2022-02-12 00:37:40', '2022-02-12 00:37:40'),
(1295, 'smilkalines-66', 'smilkalines-66', 'smilkalines-66', 'smilkalines-66', 'smilkalines-66', 2, 'App\\Menu', '2022-02-12 06:23:06', '2022-02-12 06:23:06'),
(1296, 'papuosalaiakmenys-52', 'papuosalaiakmenys-52', 'papuosalaiakmenys-52', 'papuosalaiakmenys-52', 'papuosalaiakmenys-52', 5, 'App\\Menu', '2022-02-12 06:24:30', '2022-02-12 06:24:30'),
(1297, 'smilkalai-48', 'smilkalai-48', 'smilkalai-48', 'smilkalai-48', 'smilkalai-48', 1, 'App\\Menu', '2022-02-12 06:24:45', '2022-02-12 06:24:45'),
(1298, 'kitos-prekes-4b', 'kitos-prekes-4b', 'kitos-prekes-4b', 'kitos-prekes-4b', 'kitos-prekes-4b', 7, 'App\\Menu', '2022-02-12 09:53:42', '2022-02-12 09:53:42'),
(1299, 'papuosalaiakmenys-53', 'papuosalaiakmenys-53', 'papuosalaiakmenys-53', 'papuosalaiakmenys-53', 'papuosalaiakmenys-53', 5, 'App\\Menu', '2022-02-12 09:53:59', '2022-02-12 09:53:59'),
(1300, 'smilkalai-49', 'smilkalai-49', 'smilkalai-49', 'smilkalai-49', 'smilkalai-49', 1, 'App\\Menu', '2022-02-12 09:54:07', '2022-02-12 09:54:07'),
(1307, 'aukso-spalvos-smilkalines-19', 'aukso-spalvos-smilkalines-19', 'aukso-spalvos-smilkalines-19', 'aukso-spalvos-smilkalines-19', 'aukso-spalvos-smilkalines-19', 4, 'App\\SubMenu', '2022-02-13 05:20:27', '2022-02-13 05:20:27'),
(1308, 'smilkalai-4a', 'smilkalai-4a', 'smilkalai-4a', 'smilkalai-4a', 'smilkalai-4a', 1, 'App\\Menu', '2022-02-13 09:05:13', '2022-02-13 09:05:13'),
(1309, 'transcendentines-kriaukles-1d', 'transcendentines-kriaukles-1d', 'transcendentines-kriaukles-1d', 'transcendentines-kriaukles-1d', 'transcendentines-kriaukles-1d', 7, 'App\\SubMenu', '2022-02-13 09:05:14', '2022-02-13 09:05:14'),
(1310, 'grojantys-dubenys-4b', 'grojantys-dubenys-4b', 'grojantys-dubenys-4b', 'grojantys-dubenys-4b', 'grojantys-dubenys-4b', 6, 'App\\SubMenu', '2022-02-13 09:05:20', '2022-02-13 09:05:20'),
(1311, 'kitos-prekes-4c', 'kitos-prekes-4c', 'kitos-prekes-4c', 'kitos-prekes-4c', 'kitos-prekes-4c', 7, 'App\\Menu', '2022-02-13 09:05:21', '2022-02-13 09:05:21'),
(1312, 'smilkalines-67', 'smilkalines-67', 'smilkalines-67', 'smilkalines-67', 'smilkalines-67', 2, 'App\\Menu', '2022-02-13 09:05:49', '2022-02-13 09:05:49'),
(1313, 'inkrustuotos-akmenukais-25', 'inkrustuotos-akmenukais-2a', 'inkrustuotos-akmenukais-2a', 'inkrustuotos-akmenukais-2a', 'inkrustuotos-akmenukais-2a', 1, 'App\\SubMenu', '2022-02-13 09:05:49', '2022-02-13 09:05:49'),
(1314, 'medines-dezutes-smilkalines-du-viename-19', 'medines-dezutes-smilkalines-du-viename-19', 'medines-dezutes-smilkalines-du-viename-19', 'medines-dezutes-smilkalines-du-viename-19', 'medines-dezutes-smilkalines-du-viename-19', 2, 'App\\SubMenu', '2022-02-13 09:05:50', '2022-02-13 09:05:50'),
(1315, 'sidabro-spalvos-smilkalines-1f', 'sidabro-spalvos-smilkalines-1f', 'sidabro-spalvos-smilkalines-1f', 'sidabro-spalvos-smilkalines-1f', 'sidabro-spalvos-smilkalines-1f', 3, 'App\\SubMenu', '2022-02-13 09:05:51', '2022-02-13 09:05:51'),
(1321, 'papuosalaiakmenys-54', 'papuosalaiakmenys-54', 'papuosalaiakmenys-54', 'papuosalaiakmenys-54', 'papuosalaiakmenys-54', 5, 'App\\Menu', '2022-02-14 04:14:20', '2022-02-14 04:14:20'),
(1322, 'papuosalaiakmenys-55', 'papuosalaiakmenys-55', 'papuosalaiakmenys-55', 'papuosalaiakmenys-55', 'papuosalaiakmenys-55', 5, 'App\\Menu', '2022-02-14 13:39:36', '2022-02-14 13:39:36'),
(1323, 'kitos-prekes-4d', 'kitos-prekes-4d', 'kitos-prekes-4d', 'kitos-prekes-4d', 'kitos-prekes-4d', 7, 'App\\Menu', '2022-02-14 13:39:48', '2022-02-14 13:39:48'),
(1324, 'smilkalai-4b', 'smilkalai-4b', 'smilkalai-4b', 'smilkalai-4b', 'smilkalai-4b', 1, 'App\\Menu', '2022-02-14 13:40:10', '2022-02-14 13:40:10'),
(1326, 'transcendentines-kriaukles-1e', 'transcendentines-kriaukles-1e', 'transcendentines-kriaukles-1e', 'transcendentines-kriaukles-1e', 'transcendentines-kriaukles-1e', 7, 'App\\SubMenu', '2022-02-15 20:18:52', '2022-02-15 20:18:52'),
(1328, 'smilkalai-4c', 'smilkalai-4c', 'smilkalai-4c', 'smilkalai-4c', 'smilkalai-4c', 1, 'App\\Menu', '2022-02-15 20:57:44', '2022-02-15 20:57:44'),
(1332, 'transcendentines-kriaukles-1f', 'transcendentines-kriaukles-1f', 'transcendentines-kriaukles-1f', 'transcendentines-kriaukles-1f', 'transcendentines-kriaukles-1f', 7, 'App\\SubMenu', '2022-02-16 09:08:10', '2022-02-16 09:08:10'),
(1335, 'smilkalai-4d', 'smilkalai-4d', 'smilkalai-4d', 'smilkalai-4d', 'smilkalai-4d', 1, 'App\\Menu', '2022-02-16 12:04:24', '2022-02-16 12:04:24'),
(1336, 'smilkalines-68', 'smilkalines-68', 'smilkalines-68', 'smilkalines-68', 'smilkalines-68', 2, 'App\\Menu', '2022-02-16 12:04:24', '2022-02-16 12:04:24'),
(1337, 'inkrustuotos-akmenukais-26', 'inkrustuotos-akmenukais-2b', 'inkrustuotos-akmenukais-2b', 'inkrustuotos-akmenukais-2b', 'inkrustuotos-akmenukais-2b', 1, 'App\\SubMenu', '2022-02-16 12:04:25', '2022-02-16 12:04:25'),
(1338, 'medines-dezutes-smilkalines-du-viename-1a', 'medines-dezutes-smilkalines-du-viename-1a', 'medines-dezutes-smilkalines-du-viename-1a', 'medines-dezutes-smilkalines-du-viename-1a', 'medines-dezutes-smilkalines-du-viename-1a', 2, 'App\\SubMenu', '2022-02-16 12:04:25', '2022-02-16 12:04:25'),
(1339, 'sidabro-spalvos-smilkalines-20', 'sidabro-spalvos-smilkalines-20', 'sidabro-spalvos-smilkalines-20', 'sidabro-spalvos-smilkalines-20', 'sidabro-spalvos-smilkalines-20', 3, 'App\\SubMenu', '2022-02-16 12:04:26', '2022-02-16 12:04:26'),
(1340, 'aukso-spalvos-smilkalines-1a', 'aukso-spalvos-smilkalines-1a', 'aukso-spalvos-smilkalines-1a', 'aukso-spalvos-smilkalines-1a', 'aukso-spalvos-smilkalines-1a', 4, 'App\\SubMenu', '2022-02-16 12:04:26', '2022-02-16 12:04:26'),
(1342, 'medines-dezutes-smilkalines-du-viename-1b', 'medines-dezutes-smilkalines-du-viename-1b', 'medines-dezutes-smilkalines-du-viename-1b', 'medines-dezutes-smilkalines-du-viename-1b', 'medines-dezutes-smilkalines-du-viename-1b', 2, 'App\\SubMenu', '2022-02-16 12:55:03', '2022-02-16 12:55:03'),
(1343, 'kitos-prekes-4e', 'kitos-prekes-4e', 'kitos-prekes-4e', 'kitos-prekes-4e', 'kitos-prekes-4e', 7, 'App\\Menu', '2022-02-16 13:50:42', '2022-02-16 13:50:42'),
(1344, 'inkrustuotos-akmenukais-27', 'inkrustuotos-akmenukais-2c', 'inkrustuotos-akmenukais-2c', 'inkrustuotos-akmenukais-2c', 'inkrustuotos-akmenukais-2c', 1, 'App\\SubMenu', '2022-02-16 14:46:36', '2022-02-16 14:46:36'),
(1346, 'smilkalai-4e', 'smilkalai-4e', 'smilkalai-4e', 'smilkalai-4e', 'smilkalai-4e', 1, 'App\\Menu', '2022-02-16 16:04:18', '2022-02-16 16:04:18'),
(1347, 'smilkalines-69', 'smilkalines-69', 'smilkalines-69', 'smilkalines-69', 'smilkalines-69', 2, 'App\\Menu', '2022-02-16 16:04:30', '2022-02-16 16:04:30'),
(1348, 'kitos-prekes-4f', 'kitos-prekes-4f', 'kitos-prekes-4f', 'kitos-prekes-4f', 'kitos-prekes-4f', 7, 'App\\Menu', '2022-02-16 16:05:04', '2022-02-16 16:05:04'),
(1350, 'smilkalines-6a', 'smilkalines-6a', 'smilkalines-6a', 'smilkalines-6a', 'smilkalines-6a', 2, 'App\\Menu', '2022-02-17 03:59:30', '2022-02-17 03:59:30'),
(1351, 'kitos-prekes-50', 'kitos-prekes-50', 'kitos-prekes-50', 'kitos-prekes-50', 'kitos-prekes-50', 7, 'App\\Menu', '2022-02-17 03:59:31', '2022-02-17 03:59:31'),
(1352, 'smilkalai-4f', 'smilkalai-4f', 'smilkalai-4f', 'smilkalai-4f', 'smilkalai-4f', 1, 'App\\Menu', '2022-02-17 03:59:31', '2022-02-17 03:59:31'),
(1353, 'papuosalaiakmenys-56', 'papuosalaiakmenys-56', 'papuosalaiakmenys-56', 'papuosalaiakmenys-56', 'papuosalaiakmenys-56', 5, 'App\\Menu', '2022-02-17 03:59:35', '2022-02-17 03:59:35'),
(1354, 'kitos-prekes-51', 'kitos-prekes-51', 'kitos-prekes-51', 'kitos-prekes-51', 'kitos-prekes-51', 7, 'App\\Menu', '2022-02-17 16:11:07', '2022-02-17 16:11:07'),
(1356, 'smilkalines-6b', 'smilkalines-6b', 'smilkalines-6b', 'smilkalines-6b', 'smilkalines-6b', 2, 'App\\Menu', '2022-02-17 16:12:21', '2022-02-17 16:12:21'),
(1358, 'smilkalai-50', 'smilkalai-50', 'smilkalai-50', 'smilkalai-50', 'smilkalai-50', 1, 'App\\Menu', '2022-02-17 16:13:36', '2022-02-17 16:13:36'),
(1359, 'papuosalaiakmenys-57', 'papuosalaiakmenys-57', 'papuosalaiakmenys-57', 'papuosalaiakmenys-57', 'papuosalaiakmenys-57', 5, 'App\\Menu', '2022-02-17 16:13:40', '2022-02-17 16:13:40'),
(1363, 'grojantys-dubenys-4c', 'grojantys-dubenys-4c', 'grojantys-dubenys-4c', 'grojantys-dubenys-4c', 'grojantys-dubenys-4c', 6, 'App\\SubMenu', '2022-02-17 21:13:03', '2022-02-17 21:13:03'),
(1366, 'smilkalai-51', 'smilkalai-51', 'smilkalai-51', 'smilkalai-51', 'smilkalai-51', 1, 'App\\Menu', '2022-02-19 07:14:09', '2022-02-19 07:14:09'),
(1367, 'smilkalai-52', 'smilkalai-52', 'smilkalai-52', 'smilkalai-52', 'smilkalai-52', 1, 'App\\Menu', '2022-02-19 07:14:11', '2022-02-19 07:14:11'),
(1370, 'kitos-prekes-52', 'kitos-prekes-52', 'kitos-prekes-52', 'kitos-prekes-52', 'kitos-prekes-52', 7, 'App\\Menu', '2022-02-19 14:46:47', '2022-02-19 14:46:47'),
(1373, 'kitos-prekes-53', 'kitos-prekes-53', 'kitos-prekes-53', 'kitos-prekes-53', 'kitos-prekes-53', 7, 'App\\Menu', '2022-02-20 11:57:22', '2022-02-20 11:57:22'),
(1377, 'smilkalai-53', 'smilkalai-53', 'smilkalai-53', 'smilkalai-53', 'smilkalai-53', 1, 'App\\Menu', '2022-02-22 14:06:03', '2022-02-22 14:06:03'),
(1378, 'smilkalines-6c', 'smilkalines-6c', 'smilkalines-6c', 'smilkalines-6c', 'smilkalines-6c', 2, 'App\\Menu', '2022-02-22 14:06:04', '2022-02-22 14:06:04'),
(1379, 'inkrustuotos-akmenukais-28', 'inkrustuotos-akmenukais-2d', 'inkrustuotos-akmenukais-2d', 'inkrustuotos-akmenukais-2d', 'inkrustuotos-akmenukais-2d', 1, 'App\\SubMenu', '2022-02-22 14:06:07', '2022-02-22 14:06:07'),
(1380, 'medines-dezutes-smilkalines-du-viename-1c', 'medines-dezutes-smilkalines-du-viename-1c', 'medines-dezutes-smilkalines-du-viename-1c', 'medines-dezutes-smilkalines-du-viename-1c', 'medines-dezutes-smilkalines-du-viename-1c', 2, 'App\\SubMenu', '2022-02-22 14:06:08', '2022-02-22 14:06:08'),
(1381, 'sidabro-spalvos-smilkalines-21', 'sidabro-spalvos-smilkalines-21', 'sidabro-spalvos-smilkalines-21', 'sidabro-spalvos-smilkalines-21', 'sidabro-spalvos-smilkalines-21', 3, 'App\\SubMenu', '2022-02-22 14:06:10', '2022-02-22 14:06:10'),
(1382, 'aukso-spalvos-smilkalines-1b', 'aukso-spalvos-smilkalines-1b', 'aukso-spalvos-smilkalines-1b', 'aukso-spalvos-smilkalines-1b', 'aukso-spalvos-smilkalines-1b', 4, 'App\\SubMenu', '2022-02-22 14:06:11', '2022-02-22 14:06:11'),
(1383, 'apvalios-smilkalines-24', 'apvalios-smilkalines-24', 'apvalios-smilkalines-24', 'apvalios-smilkalines-24', 'apvalios-smilkalines-24', 5, 'App\\SubMenu', '2022-02-22 14:06:12', '2022-02-22 14:06:12'),
(1384, 'smilkalines-6d', 'smilkalines-6d', 'smilkalines-6d', 'smilkalines-6d', 'smilkalines-6d', 2, 'App\\Menu', '2022-02-22 15:01:22', '2022-02-22 15:01:22'),
(1385, 'papuosalaiakmenys-58', 'papuosalaiakmenys-58', 'papuosalaiakmenys-58', 'papuosalaiakmenys-58', 'papuosalaiakmenys-58', 5, 'App\\Menu', '2022-02-22 15:01:42', '2022-02-22 15:01:42'),
(1387, 'apvalios-smilkalines-25', 'apvalios-smilkalines-25', 'apvalios-smilkalines-25', 'apvalios-smilkalines-25', 'apvalios-smilkalines-25', 5, 'App\\SubMenu', '2022-02-23 12:16:55', '2022-02-23 12:16:55'),
(1388, 'smilkalines-6e', 'smilkalines-6e', 'smilkalines-6e', 'smilkalines-6e', 'smilkalines-6e', 2, 'App\\Menu', '2022-02-23 14:42:26', '2022-02-23 14:42:26'),
(1389, 'apvalios-smilkalines-26', 'apvalios-smilkalines-26', 'apvalios-smilkalines-26', 'apvalios-smilkalines-26', 'apvalios-smilkalines-26', 5, 'App\\SubMenu', '2022-02-23 15:47:17', '2022-02-23 15:47:17'),
(1391, 'papuosalaiakmenys-59', 'papuosalaiakmenys-59', 'papuosalaiakmenys-59', 'papuosalaiakmenys-59', 'papuosalaiakmenys-59', 5, 'App\\Menu', '2022-02-24 02:39:59', '2022-02-24 02:39:59'),
(1392, 'kitos-prekes-54', 'kitos-prekes-54', 'kitos-prekes-54', 'kitos-prekes-54', 'kitos-prekes-54', 7, 'App\\Menu', '2022-02-24 02:39:59', '2022-02-24 02:39:59'),
(1393, 'smilkalai-54', 'smilkalai-54', 'smilkalai-54', 'smilkalai-54', 'smilkalai-54', 1, 'App\\Menu', '2022-02-24 02:40:00', '2022-02-24 02:40:00'),
(1394, 'smilkalines-6f', 'smilkalines-6f', 'smilkalines-6f', 'smilkalines-6f', 'smilkalines-6f', 2, 'App\\Menu', '2022-02-24 02:40:01', '2022-02-24 02:40:01'),
(1395, 'grojantys-dubenys-4d', 'grojantys-dubenys-4d', 'grojantys-dubenys-4d', 'grojantys-dubenys-4d', 'grojantys-dubenys-4d', 6, 'App\\SubMenu', '2022-02-24 14:05:58', '2022-02-24 14:05:58'),
(1397, 'smilkalines-70', 'smilkalines-70', 'smilkalines-70', 'smilkalines-70', 'smilkalines-70', 2, 'App\\Menu', '2022-02-24 18:27:37', '2022-02-24 18:27:37'),
(1398, 'smilkalai-55', 'smilkalai-55', 'smilkalai-55', 'smilkalai-55', 'smilkalai-55', 1, 'App\\Menu', '2022-02-24 18:29:06', '2022-02-24 18:29:06'),
(1399, 'papuosalaiakmenys-5a', 'papuosalaiakmenys-5a', 'papuosalaiakmenys-5a', 'papuosalaiakmenys-5a', 'papuosalaiakmenys-5a', 5, 'App\\Menu', '2022-02-24 18:30:15', '2022-02-24 18:30:15'),
(1400, 'kitos-prekes-55', 'kitos-prekes-55', 'kitos-prekes-55', 'kitos-prekes-55', 'kitos-prekes-55', 7, 'App\\Menu', '2022-02-24 18:30:29', '2022-02-24 18:30:29'),
(1401, 'smilkalines-71', 'smilkalines-71', 'smilkalines-71', 'smilkalines-71', 'smilkalines-71', 2, 'App\\Menu', '2022-02-24 20:28:47', '2022-02-24 20:28:47'),
(1402, 'smilkalines-72', 'smilkalines-72', 'smilkalines-72', 'smilkalines-72', 'smilkalines-72', 2, 'App\\Menu', '2022-02-24 20:43:16', '2022-02-24 20:43:16'),
(1409, 'smilkalai-56', 'smilkalai-56', 'smilkalai-56', 'smilkalai-56', 'smilkalai-56', 1, 'App\\Menu', '2022-02-24 20:47:16', '2022-02-24 20:47:16'),
(1410, 'papuosalaiakmenys-5b', 'papuosalaiakmenys-5b', 'papuosalaiakmenys-5b', 'papuosalaiakmenys-5b', 'papuosalaiakmenys-5b', 5, 'App\\Menu', '2022-02-24 20:47:33', '2022-02-24 20:47:33'),
(1412, 'kitos-prekes-56', 'kitos-prekes-56', 'kitos-prekes-56', 'kitos-prekes-56', 'kitos-prekes-56', 7, 'App\\Menu', '2022-02-24 20:48:17', '2022-02-24 20:48:17'),
(1414, 'smilkalai-57', 'smilkalai-57', 'smilkalai-57', 'smilkalai-57', 'smilkalai-57', 1, 'App\\Menu', '2022-02-24 21:29:01', '2022-02-24 21:29:01'),
(1416, 'kitos-prekes-57', 'kitos-prekes-57', 'kitos-prekes-57', 'kitos-prekes-57', 'kitos-prekes-57', 7, 'App\\Menu', '2022-02-24 23:09:00', '2022-02-24 23:09:00'),
(1418, 'papuosalaiakmenys-5c', 'papuosalaiakmenys-5c', 'papuosalaiakmenys-5c', 'papuosalaiakmenys-5c', 'papuosalaiakmenys-5c', 5, 'App\\Menu', '2022-02-25 07:00:19', '2022-02-25 07:00:19'),
(1419, 'smilkalines-73', 'smilkalines-73', 'smilkalines-73', 'smilkalines-73', 'smilkalines-73', 2, 'App\\Menu', '2022-02-25 07:00:24', '2022-02-25 07:00:24'),
(1421, 'aukso-spalvos-smilkalines-1c', 'aukso-spalvos-smilkalines-1c', 'aukso-spalvos-smilkalines-1c', 'aukso-spalvos-smilkalines-1c', 'aukso-spalvos-smilkalines-1c', 4, 'App\\SubMenu', '2022-02-25 07:01:14', '2022-02-25 07:01:14'),
(1423, 'inkrustuotos-akmenukais-29', 'inkrustuotos-akmenukais-2e', 'inkrustuotos-akmenukais-2e', 'inkrustuotos-akmenukais-2e', 'inkrustuotos-akmenukais-2e', 1, 'App\\SubMenu', '2022-02-25 07:01:39', '2022-02-25 07:01:39'),
(1425, 'sidabro-spalvos-smilkalines-22', 'sidabro-spalvos-smilkalines-22', 'sidabro-spalvos-smilkalines-22', 'sidabro-spalvos-smilkalines-22', 'sidabro-spalvos-smilkalines-22', 3, 'App\\SubMenu', '2022-02-25 07:02:07', '2022-02-25 07:02:07'),
(1428, 'kitos-prekes-58', 'kitos-prekes-58', 'kitos-prekes-58', 'kitos-prekes-58', 'kitos-prekes-58', 7, 'App\\Menu', '2022-02-25 14:42:18', '2022-02-25 14:42:18'),
(1429, 'apvalios-smilkalines-27', 'apvalios-smilkalines-27', 'apvalios-smilkalines-27', 'apvalios-smilkalines-27', 'apvalios-smilkalines-27', 5, 'App\\SubMenu', '2022-02-25 16:29:13', '2022-02-25 16:29:13'),
(1432, 'smilkalines-74', 'smilkalines-74', 'smilkalines-74', 'smilkalines-74', 'smilkalines-74', 2, 'App\\Menu', '2022-02-26 11:20:07', '2022-02-26 11:20:07'),
(1433, 'smilkalines-75', 'smilkalines-75', 'smilkalines-75', 'smilkalines-75', 'smilkalines-75', 2, 'App\\Menu', '2022-02-26 11:20:08', '2022-02-26 11:20:08'),
(1434, 'kitos-prekes-59', 'kitos-prekes-59', 'kitos-prekes-59', 'kitos-prekes-59', 'kitos-prekes-59', 7, 'App\\Menu', '2022-02-26 11:25:57', '2022-02-26 11:25:57'),
(1435, 'papuosalaiakmenys-5d', 'papuosalaiakmenys-5d', 'papuosalaiakmenys-5d', 'papuosalaiakmenys-5d', 'papuosalaiakmenys-5d', 5, 'App\\Menu', '2022-02-26 11:26:48', '2022-02-26 11:26:48'),
(1436, 'smilkalines-76', 'smilkalines-76', 'smilkalines-76', 'smilkalines-76', 'smilkalines-76', 2, 'App\\Menu', '2022-02-26 11:27:04', '2022-02-26 11:27:04'),
(1442, 'smilkalines-77', 'smilkalines-77', 'smilkalines-77', 'smilkalines-77', 'smilkalines-77', 2, 'App\\Menu', '2022-02-27 16:26:30', '2022-02-27 16:26:30'),
(1450, 'medines-dezutes-smilkalines-du-viename-1d', 'medines-dezutes-smilkalines-du-viename-1d', 'medines-dezutes-smilkalines-du-viename-1d', 'medines-dezutes-smilkalines-du-viename-1d', 'medines-dezutes-smilkalines-du-viename-1d', 2, 'App\\SubMenu', '2022-02-28 19:48:16', '2022-02-28 19:48:16'),
(1451, 'kitos-prekes-5a', 'kitos-prekes-5a', 'kitos-prekes-5a', 'kitos-prekes-5a', 'kitos-prekes-5a', 7, 'App\\Menu', '2022-02-28 19:48:34', '2022-02-28 19:48:34'),
(1453, 'grojantys-dubenys-4e', 'grojantys-dubenys-4e', 'grojantys-dubenys-4e', 'grojantys-dubenys-4e', 'grojantys-dubenys-4e', 6, 'App\\SubMenu', '2022-02-28 23:10:00', '2022-02-28 23:10:00'),
(1455, 'aukso-spalvos-smilkalines-1d', 'aukso-spalvos-smilkalines-1d', 'aukso-spalvos-smilkalines-1d', 'aukso-spalvos-smilkalines-1d', 'aukso-spalvos-smilkalines-1d', 4, 'App\\SubMenu', '2022-03-01 14:55:53', '2022-03-01 14:55:53'),
(1456, 'smilkalai-58', 'smilkalai-58', 'smilkalai-58', 'smilkalai-58', 'smilkalai-58', 1, 'App\\Menu', '2022-03-01 16:15:46', '2022-03-01 16:15:46'),
(1458, 'apvalios-smilkalines-28', 'apvalios-smilkalines-28', 'apvalios-smilkalines-28', 'apvalios-smilkalines-28', 'apvalios-smilkalines-28', 5, 'App\\SubMenu', '2022-03-01 16:33:00', '2022-03-01 16:33:00'),
(1460, 'sidabro-spalvos-smilkalines-23', 'sidabro-spalvos-smilkalines-23', 'sidabro-spalvos-smilkalines-23', 'sidabro-spalvos-smilkalines-23', 'sidabro-spalvos-smilkalines-23', 3, 'App\\SubMenu', '2022-03-02 04:52:16', '2022-03-02 04:52:16'),
(1461, 'smilkalai-59', 'smilkalai-59', 'smilkalai-59', 'smilkalai-59', 'smilkalai-59', 1, 'App\\Menu', '2022-03-02 05:05:03', '2022-03-02 05:05:03'),
(1462, 'smilkalai-5a', 'smilkalai-5a', 'smilkalai-5a', 'smilkalai-5a', 'smilkalai-5a', 1, 'App\\Menu', '2022-03-02 05:05:16', '2022-03-02 05:05:16'),
(1463, 'smilkalai-5b', 'smilkalai-5b', 'smilkalai-5b', 'smilkalai-5b', 'smilkalai-5b', 1, 'App\\Menu', '2022-03-02 05:05:17', '2022-03-02 05:05:17'),
(1464, 'smilkalines-78', 'smilkalines-78', 'smilkalines-78', 'smilkalines-78', 'smilkalines-78', 2, 'App\\Menu', '2022-03-02 05:05:35', '2022-03-02 05:05:35'),
(1465, 'smilkalines-79', 'smilkalines-79', 'smilkalines-79', 'smilkalines-79', 'smilkalines-79', 2, 'App\\Menu', '2022-03-02 05:05:40', '2022-03-02 05:05:40'),
(1466, 'smilkalines-7a', 'smilkalines-7a', 'smilkalines-7a', 'smilkalines-7a', 'smilkalines-7a', 2, 'App\\Menu', '2022-03-02 05:05:42', '2022-03-02 05:05:42'),
(1468, 'smilkalines-7b', 'smilkalines-7b', 'smilkalines-7b', 'smilkalines-7b', 'smilkalines-7b', 2, 'App\\Menu', '2022-03-02 07:40:43', '2022-03-02 07:40:43'),
(1469, 'kitos-prekes-5b', 'kitos-prekes-5b', 'kitos-prekes-5b', 'kitos-prekes-5b', 'kitos-prekes-5b', 7, 'App\\Menu', '2022-03-02 07:40:43', '2022-03-02 07:40:43'),
(1470, 'kitos-prekes-5c', 'kitos-prekes-5c', 'kitos-prekes-5c', 'kitos-prekes-5c', 'kitos-prekes-5c', 7, 'App\\Menu', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1471, 'smilkalai-5c', 'smilkalai-5c', 'smilkalai-5c', 'smilkalai-5c', 'smilkalai-5c', 1, 'App\\Menu', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1472, 'papuosalaiakmenys-5e', 'papuosalaiakmenys-5e', 'papuosalaiakmenys-5e', 'papuosalaiakmenys-5e', 'papuosalaiakmenys-5e', 5, 'App\\Menu', '2022-03-02 07:40:44', '2022-03-02 07:40:44'),
(1476, 'medines-dezutes-smilkalines-du-viename-1e', 'medines-dezutes-smilkalines-du-viename-1e', 'medines-dezutes-smilkalines-du-viename-1e', 'medines-dezutes-smilkalines-du-viename-1e', 'medines-dezutes-smilkalines-du-viename-1e', 2, 'App\\SubMenu', '2022-03-02 23:31:23', '2022-03-02 23:31:23'),
(1477, 'papuosalaiakmenys-5f', 'papuosalaiakmenys-5f', 'papuosalaiakmenys-5f', 'papuosalaiakmenys-5f', 'papuosalaiakmenys-5f', 5, 'App\\Menu', '2022-03-03 03:28:17', '2022-03-03 03:28:17'),
(1479, 'transcendentines-kriaukles-20', 'transcendentines-kriaukles-20', 'transcendentines-kriaukles-20', 'transcendentines-kriaukles-20', 'transcendentines-kriaukles-20', 7, 'App\\SubMenu', '2022-03-03 13:04:25', '2022-03-03 13:04:25'),
(1480, 'sidabro-spalvos-smilkalines-24', 'sidabro-spalvos-smilkalines-24', 'sidabro-spalvos-smilkalines-24', 'sidabro-spalvos-smilkalines-24', 'sidabro-spalvos-smilkalines-24', 3, 'App\\SubMenu', '2022-03-03 16:28:35', '2022-03-03 16:28:35'),
(1483, 'medines-dezutes-smilkalines-du-viename-1f', 'medines-dezutes-smilkalines-du-viename-1f', 'medines-dezutes-smilkalines-du-viename-1f', 'medines-dezutes-smilkalines-du-viename-1f', 'medines-dezutes-smilkalines-du-viename-1f', 2, 'App\\SubMenu', '2022-03-04 06:35:23', '2022-03-04 06:35:23'),
(1484, 'transcendentines-kriaukles-21', 'transcendentines-kriaukles-21', 'transcendentines-kriaukles-21', 'transcendentines-kriaukles-21', 'transcendentines-kriaukles-21', 7, 'App\\SubMenu', '2022-03-04 06:53:01', '2022-03-04 06:53:01'),
(1490, 'kitos-prekes-5d', 'kitos-prekes-5d', 'kitos-prekes-5d', 'kitos-prekes-5d', 'kitos-prekes-5d', 7, 'App\\Menu', '2022-03-04 21:30:34', '2022-03-04 21:30:34'),
(1494, 'transcendentines-kriaukles-22', 'transcendentines-kriaukles-22', 'transcendentines-kriaukles-22', 'transcendentines-kriaukles-22', 'transcendentines-kriaukles-22', 7, 'App\\SubMenu', '2022-03-05 14:48:14', '2022-03-05 14:48:14'),
(1497, 'transcendentines-kriaukles-23', 'transcendentines-kriaukles-23', 'transcendentines-kriaukles-23', 'transcendentines-kriaukles-23', 'transcendentines-kriaukles-23', 7, 'App\\SubMenu', '2022-03-06 10:33:22', '2022-03-06 10:33:22'),
(1499, 'inkrustuotos-akmenukais-2a', 'inkrustuotos-akmenukais-2f', 'inkrustuotos-akmenukais-2f', 'inkrustuotos-akmenukais-2f', 'inkrustuotos-akmenukais-2f', 1, 'App\\SubMenu', '2022-03-06 13:03:38', '2022-03-06 13:03:38'),
(1502, 'kitos-prekes-5e', 'kitos-prekes-5e', 'kitos-prekes-5e', 'kitos-prekes-5e', 'kitos-prekes-5e', 7, 'App\\Menu', '2022-03-07 00:55:47', '2022-03-07 00:55:47'),
(1505, 'smilkalai-5d', 'smilkalai-5d', 'smilkalai-5d', 'smilkalai-5d', 'smilkalai-5d', 1, 'App\\Menu', '2022-03-07 10:34:50', '2022-03-07 10:34:50'),
(1506, 'aukso-spalvos-smilkalines-1e', 'aukso-spalvos-smilkalines-1e', 'aukso-spalvos-smilkalines-1e', 'aukso-spalvos-smilkalines-1e', 'aukso-spalvos-smilkalines-1e', 4, 'App\\SubMenu', '2022-03-07 23:12:00', '2022-03-07 23:12:00'),
(1508, 'apvalios-smilkalines-29', 'apvalios-smilkalines-29', 'apvalios-smilkalines-29', 'apvalios-smilkalines-29', 'apvalios-smilkalines-29', 5, 'App\\SubMenu', '2022-03-08 03:08:52', '2022-03-08 03:08:52'),
(1512, 'aukso-spalvos-smilkalines-1f', 'aukso-spalvos-smilkalines-1f', 'aukso-spalvos-smilkalines-1f', 'aukso-spalvos-smilkalines-1f', 'aukso-spalvos-smilkalines-1f', 4, 'App\\SubMenu', '2022-03-09 22:20:40', '2022-03-09 22:20:40'),
(1514, 'apvalios-smilkalines-2a', 'apvalios-smilkalines-2a', 'apvalios-smilkalines-2a', 'apvalios-smilkalines-2a', 'apvalios-smilkalines-2a', 5, 'App\\SubMenu', '2022-03-10 10:33:02', '2022-03-10 10:33:02'),
(1516, 'smilkalai-5e', 'smilkalai-5e', 'smilkalai-5e', 'smilkalai-5e', 'smilkalai-5e', 1, 'App\\Menu', '2022-03-10 11:25:04', '2022-03-10 11:25:04'),
(1517, 'transcendentines-kriaukles-24', 'transcendentines-kriaukles-24', 'transcendentines-kriaukles-24', 'transcendentines-kriaukles-24', 'transcendentines-kriaukles-24', 7, 'App\\SubMenu', '2022-03-10 11:25:07', '2022-03-10 11:25:07'),
(1518, 'grojantys-dubenys-4f', 'grojantys-dubenys-4f', 'grojantys-dubenys-4f', 'grojantys-dubenys-4f', 'grojantys-dubenys-4f', 6, 'App\\SubMenu', '2022-03-10 11:25:11', '2022-03-10 11:25:11'),
(1519, 'kitos-prekes-5f', 'kitos-prekes-5f', 'kitos-prekes-5f', 'kitos-prekes-5f', 'kitos-prekes-5f', 7, 'App\\Menu', '2022-03-10 11:25:12', '2022-03-10 11:25:12'),
(1520, 'smilkalines-7c', 'smilkalines-7c', 'smilkalines-7c', 'smilkalines-7c', 'smilkalines-7c', 2, 'App\\Menu', '2022-03-10 11:25:34', '2022-03-10 11:25:34'),
(1521, 'inkrustuotos-akmenukais-2b', 'inkrustuotos-akmenukais-30', 'inkrustuotos-akmenukais-30', 'inkrustuotos-akmenukais-30', 'inkrustuotos-akmenukais-30', 1, 'App\\SubMenu', '2022-03-10 11:25:35', '2022-03-10 11:25:35'),
(1522, 'medines-dezutes-smilkalines-du-viename-20', 'medines-dezutes-smilkalines-du-viename-20', 'medines-dezutes-smilkalines-du-viename-20', 'medines-dezutes-smilkalines-du-viename-20', 'medines-dezutes-smilkalines-du-viename-20', 2, 'App\\SubMenu', '2022-03-10 11:25:35', '2022-03-10 11:25:35'),
(1528, 'inkrustuotos-akmenukais-2c', 'inkrustuotos-akmenukais-31', 'inkrustuotos-akmenukais-31', 'inkrustuotos-akmenukais-31', 'inkrustuotos-akmenukais-31', 1, 'App\\SubMenu', '2022-03-12 04:27:57', '2022-03-12 04:27:57'),
(1529, 'medines-dezutes-smilkalines-du-viename-21', 'medines-dezutes-smilkalines-du-viename-21', 'medines-dezutes-smilkalines-du-viename-21', 'medines-dezutes-smilkalines-du-viename-21', 'medines-dezutes-smilkalines-du-viename-21', 2, 'App\\SubMenu', '2022-03-12 04:27:59', '2022-03-12 04:27:59'),
(1530, 'sidabro-spalvos-smilkalines-25', 'sidabro-spalvos-smilkalines-25', 'sidabro-spalvos-smilkalines-25', 'sidabro-spalvos-smilkalines-25', 'sidabro-spalvos-smilkalines-25', 3, 'App\\SubMenu', '2022-03-12 04:28:01', '2022-03-12 04:28:01'),
(1531, 'aukso-spalvos-smilkalines-20', 'aukso-spalvos-smilkalines-20', 'aukso-spalvos-smilkalines-20', 'aukso-spalvos-smilkalines-20', 'aukso-spalvos-smilkalines-20', 4, 'App\\SubMenu', '2022-03-12 04:28:12', '2022-03-12 04:28:12'),
(1532, 'apvalios-smilkalines-2b', 'apvalios-smilkalines-2b', 'apvalios-smilkalines-2b', 'apvalios-smilkalines-2b', 'apvalios-smilkalines-2b', 5, 'App\\SubMenu', '2022-03-12 04:28:15', '2022-03-12 04:28:15'),
(1533, 'grojantys-dubenys-50', 'grojantys-dubenys-50', 'grojantys-dubenys-50', 'grojantys-dubenys-50', 'grojantys-dubenys-50', 6, 'App\\SubMenu', '2022-03-12 04:28:18', '2022-03-12 04:28:18'),
(1534, 'transcendentines-kriaukles-25', 'transcendentines-kriaukles-25', 'transcendentines-kriaukles-25', 'transcendentines-kriaukles-25', 'transcendentines-kriaukles-25', 7, 'App\\SubMenu', '2022-03-12 04:28:20', '2022-03-12 04:28:20'),
(1535, 'smilkalines-7d', 'smilkalines-7d', 'smilkalines-7d', 'smilkalines-7d', 'smilkalines-7d', 2, 'App\\Menu', '2022-03-12 04:28:24', '2022-03-12 04:28:24'),
(1536, 'papuosalaiakmenys-60', 'papuosalaiakmenys-60', 'papuosalaiakmenys-60', 'papuosalaiakmenys-60', 'papuosalaiakmenys-60', 5, 'App\\Menu', '2022-03-12 04:28:28', '2022-03-12 04:28:28'),
(1537, 'smilkalai-5f', 'smilkalai-5f', 'smilkalai-5f', 'smilkalai-5f', 'smilkalai-5f', 1, 'App\\Menu', '2022-03-12 04:28:33', '2022-03-12 04:28:33'),
(1538, 'kitos-prekes-60', 'kitos-prekes-60', 'kitos-prekes-60', 'kitos-prekes-60', 'kitos-prekes-60', 7, 'App\\Menu', '2022-03-12 04:28:37', '2022-03-12 04:28:37'),
(1549, 'smilkalines-7e', 'smilkalines-7e', 'smilkalines-7e', 'smilkalines-7e', 'smilkalines-7e', 2, 'App\\Menu', '2022-03-13 18:00:45', '2022-03-13 18:00:45'),
(1550, 'smilkalai-60', 'smilkalai-60', 'smilkalai-60', 'smilkalai-60', 'smilkalai-60', 1, 'App\\Menu', '2022-03-13 18:01:16', '2022-03-13 18:01:16'),
(1552, 'smilkalai-61', 'smilkalai-61', 'smilkalai-61', 'smilkalai-61', 'smilkalai-61', 1, 'App\\Menu', '2022-03-13 20:02:00', '2022-03-13 20:02:00'),
(1555, 'smilkalai-62', 'smilkalai-62', 'smilkalai-62', 'smilkalai-62', 'smilkalai-62', 1, 'App\\Menu', '2022-03-14 11:10:51', '2022-03-14 11:10:51'),
(1558, 'smilkalines-7f', 'smilkalines-7f', 'smilkalines-7f', 'smilkalines-7f', 'smilkalines-7f', 2, 'App\\Menu', '2022-03-14 17:21:59', '2022-03-14 17:21:59'),
(1561, 'smilkalai-63', 'smilkalai-63', 'smilkalai-63', 'smilkalai-63', 'smilkalai-63', 1, 'App\\Menu', '2022-03-14 17:24:27', '2022-03-14 17:24:27'),
(1564, 'smilkalai-64', 'smilkalai-64', 'smilkalai-64', 'smilkalai-64', 'smilkalai-64', 1, 'App\\Menu', '2022-03-16 00:08:24', '2022-03-16 00:08:24'),
(1566, 'inkrustuotos-akmenukais-2d', 'inkrustuotos-akmenukais-32', 'inkrustuotos-akmenukais-32', 'inkrustuotos-akmenukais-32', 'inkrustuotos-akmenukais-32', 1, 'App\\SubMenu', '2022-03-16 05:57:25', '2022-03-16 05:57:25'),
(1568, 'smilkalai-65', 'smilkalai-65', 'smilkalai-65', 'smilkalai-65', 'smilkalai-65', 1, 'App\\Menu', '2022-03-17 03:08:09', '2022-03-17 03:08:09'),
(1569, 'papuosalaiakmenys-61', 'papuosalaiakmenys-61', 'papuosalaiakmenys-61', 'papuosalaiakmenys-61', 'papuosalaiakmenys-61', 5, 'App\\Menu', '2022-03-17 03:08:11', '2022-03-17 03:08:11'),
(1570, 'kitos-prekes-61', 'kitos-prekes-61', 'kitos-prekes-61', 'kitos-prekes-61', 'kitos-prekes-61', 7, 'App\\Menu', '2022-03-17 10:28:16', '2022-03-17 10:28:16'),
(1572, 'papuosalaiakmenys-62', 'papuosalaiakmenys-62', 'papuosalaiakmenys-62', 'papuosalaiakmenys-62', 'papuosalaiakmenys-62', 5, 'App\\Menu', '2022-03-17 10:29:12', '2022-03-17 10:29:12'),
(1573, 'smilkalines-80', 'smilkalines-80', 'smilkalines-80', 'smilkalines-80', 'smilkalines-80', 2, 'App\\Menu', '2022-03-17 13:48:09', '2022-03-17 13:48:09'),
(1575, 'papuosalaiakmenys-63', 'papuosalaiakmenys-63', 'papuosalaiakmenys-63', 'papuosalaiakmenys-63', 'papuosalaiakmenys-63', 5, 'App\\Menu', '2022-03-18 13:58:40', '2022-03-18 13:58:40'),
(1577, 'smilkalines-81', 'smilkalines-81', 'smilkalines-81', 'smilkalines-81', 'smilkalines-81', 2, 'App\\Menu', '2022-03-19 17:15:02', '2022-03-19 17:15:02'),
(1578, 'smilkalai-66', 'smilkalai-66', 'smilkalai-66', 'smilkalai-66', 'smilkalai-66', 1, 'App\\Menu', '2022-03-20 10:05:27', '2022-03-20 10:05:27'),
(1580, 'smilkalines-82', 'smilkalines-82', 'smilkalines-82', 'smilkalines-82', 'smilkalines-82', 2, 'App\\Menu', '2022-03-20 10:05:49', '2022-03-20 10:05:49'),
(1582, 'smilkalai-67', 'smilkalai-67', 'smilkalai-67', 'smilkalai-67', 'smilkalai-67', 1, 'App\\Menu', '2022-03-21 06:13:30', '2022-03-21 06:13:30'),
(1583, 'smilkalines-83', 'smilkalines-83', 'smilkalines-83', 'smilkalines-83', 'smilkalines-83', 2, 'App\\Menu', '2022-03-21 06:13:37', '2022-03-21 06:13:37'),
(1584, 'inkrustuotos-akmenukais-2e', 'inkrustuotos-akmenukais-33', 'inkrustuotos-akmenukais-33', 'inkrustuotos-akmenukais-33', 'inkrustuotos-akmenukais-33', 1, 'App\\SubMenu', '2022-03-21 06:13:37', '2022-03-21 06:13:37'),
(1586, 'smilkalai-68', 'smilkalai-68', 'smilkalai-68', 'smilkalai-68', 'smilkalai-68', 1, 'App\\Menu', '2022-03-21 11:19:24', '2022-03-21 11:19:24'),
(1587, 'smilkalai-69', 'smilkalai-69', 'smilkalai-69', 'smilkalai-69', 'smilkalai-69', 1, 'App\\Menu', '2022-03-21 11:19:26', '2022-03-21 11:19:26'),
(1588, 'grojantys-dubenys-51', 'grojantys-dubenys-51', 'grojantys-dubenys-51', 'grojantys-dubenys-51', 'grojantys-dubenys-51', 6, 'App\\SubMenu', '2022-03-21 11:19:45', '2022-03-21 11:19:45'),
(1591, 'kitos-prekes-62', 'kitos-prekes-62', 'kitos-prekes-62', 'kitos-prekes-62', 'kitos-prekes-62', 7, 'App\\Menu', '2022-03-21 12:20:03', '2022-03-21 12:20:03'),
(1592, 'kitos-prekes-63', 'kitos-prekes-63', 'kitos-prekes-63', 'kitos-prekes-63', 'preke-1', 7, 'App\\Menu', '2022-03-21 12:20:32', '2022-03-21 12:20:32'),
(1593, 'papuosalaiakmenys-64', 'papuosalaiakmenys-64', 'papuosalaiakmenys-64', 'papuosalaiakmenys-64', 'preke-2', 5, 'App\\Menu', '2022-03-21 12:20:50', '2022-03-21 12:20:50'),
(1594, 'smilkalines-84', 'smilkalines-84', 'smilkalines-84', 'smilkalines-84', 'produkt-2', 2, 'App\\Menu', '2022-03-21 12:21:15', '2022-03-21 12:21:15'),
(1595, 'smilkalai-6a', 'smilkalai-6a', 'smilkalai-6a', 'smilkalai-6a', 'smilkalai-6a', 1, 'App\\Menu', '2022-03-21 12:21:33', '2022-03-21 12:21:33'),
(1596, 'iner-produkt', 'transcendentines-kriaukles-26', 'transcendentines-kriaukles-26', 'transcendentines-kriaukles-26', 'transcendentines-kriaukles-26', 7, 'App\\SubMenu', '2022-03-21 12:22:35', '2022-03-21 12:22:35'),
(1597, 'iner-produkt-2', 'grojantys-dubenys-52', 'grojantys-dubenys-52', 'grojantys-dubenys-52', 'grojantys-dubenys-52', 6, 'App\\SubMenu', '2022-03-21 12:22:57', '2022-03-21 12:22:57'),
(1598, 'kategorija-1', 'papuosalaiakmenys-65', 'papuosalaiakmenys-65', 'papuosalaiakmenys-65', 'preke-2-1', 5, 'App\\Menu', '2022-03-21 12:28:08', '2022-03-21 12:28:08'),
(1599, 'kategorija-1-1', 'ktehorija', 'papuosalaiakmenys-66', 'papuosalaiakmenys-66', 'preke-2-2', 5, 'App\\Menu', '2022-03-21 12:28:27', '2022-03-21 12:28:27'),
(1600, 'kategorija-1-2', 'ktehorija-1', 'kategorija', 'kategorija', 'preke-2-3', 5, 'App\\Menu', '2022-03-21 12:28:49', '2022-03-21 12:28:49'),
(1601, 'smilkalines-85', 'produkt-2', 'produkt-2', 'produkt-2', 'produkt-2-1', 2, 'App\\Menu', '2022-03-21 12:29:18', '2022-03-21 12:29:18'),
(1602, 'produkt-2', 'produkt-2-1', 'produkt-2-1', 'produkt-2-1', 'produkt-2-2', 2, 'App\\Menu', '2022-03-21 12:29:41', '2022-03-21 12:29:41'),
(1603, 'produkt-3', 'produkt-3', 'produkt-3', 'produkt-3', 'produkt-3', 1, 'App\\Menu', '2022-03-21 12:30:31', '2022-03-21 12:30:31'),
(1605, 'produkt-3-1', 'produkt-3-1', 'produkt-3-1', 'produkt-3-1', 'produkt-3-1', 1, 'App\\Menu', '2022-03-21 12:31:59', '2022-03-21 12:31:59'),
(1606, 'kitos-prekes-64', 'kitos-prekes-64', 'kitos-prekes-64', 'kitos-prekes-64', 'preke-1-1', 7, 'App\\Menu', '2022-03-21 12:32:01', '2022-03-21 12:32:01'),
(1608, 'kitos-prekes-65', 'kitos-prekes-65', 'kitos-prekes-65', 'kitos-prekes-65', 'preke-1-2', 7, 'App\\Menu', '2022-03-21 12:54:10', '2022-03-21 12:54:10'),
(1609, 'iner-produkt-1', 'transcendentines-kriaukles-27', 'transcendentines-kriaukles-27', 'transcendentines-kriaukles-27', 'transcendentines-kriaukles-27', 7, 'App\\SubMenu', '2022-03-21 12:55:41', '2022-03-21 12:55:41'),
(1610, 'kitos-prekes-66', 'kitos-prekes-66', 'kitos-prekes-66', 'kitos-prekes-66', 'preke-1-3', 7, 'App\\Menu', '2022-03-21 13:13:56', '2022-03-21 13:13:56'),
(1611, 'iner-produkt-3', 'transcendentines-kriaukles-28', 'transcendentines-kriaukles-28', 'transcendentines-kriaukles-28', 'transcendentines-kriaukles-28', 7, 'App\\SubMenu', '2022-03-21 13:14:49', '2022-03-21 13:14:49'),
(1612, 'iner-produkt-2-1', 'grojantys-dubenys-53', 'grojantys-dubenys-53', 'grojantys-dubenys-53', 'grojantys-dubenys-53', 6, 'App\\SubMenu', '2022-03-22 07:32:06', '2022-03-22 07:32:06'),
(1613, 'produkt-2-1', 'produkt-2-2', 'produkt-2-2', 'produkt-2-2', 'produkt-2-3', 2, 'App\\Menu', '2022-03-22 08:43:29', '2022-03-22 08:43:29'),
(1614, 'kategorija-1-3', 'ktehorija-2', 'kategorija-1', 'kategorija-1', 'preke-2-4', 5, 'App\\Menu', '2022-03-22 08:43:31', '2022-03-22 08:43:31'),
(1615, 'kitos-prekes-67', 'kitos-prekes-67', 'kitos-prekes-67', 'kitos-prekes-67', 'preke-1-4', 7, 'App\\Menu', '2022-03-22 08:43:33', '2022-03-22 08:43:33'),
(1617, 'kategorija-1-4', 'ktehorija-3', 'kategorija-2', 'kategorija-2', 'preke-2-5', 5, 'App\\Menu', '2022-03-22 09:34:11', '2022-03-22 09:34:11'),
(1618, 'kitos-prekes-68', 'kitos-prekes-68', 'kitos-prekes-68', 'kitos-prekes-68', 'preke-1-5', 7, 'App\\Menu', '2022-03-22 09:34:12', '2022-03-22 09:34:12'),
(1620, 'iner-produkt-4', 'transcendentines-kriaukles-29', 'transcendentines-kriaukles-29', 'transcendentines-kriaukles-29', 'transcendentines-kriaukles-29', 7, 'App\\SubMenu', '2022-03-22 09:34:50', '2022-03-22 09:34:50'),
(1621, 'iner-produkt-2-2', 'grojantys-dubenys-54', 'grojantys-dubenys-54', 'grojantys-dubenys-54', 'grojantys-dubenys-54', 6, 'App\\SubMenu', '2022-03-22 09:34:54', '2022-03-22 09:34:54'),
(1622, 'produkt-3-2', 'produkt-3-2', 'produkt-3-2', 'produkt-3-2', 'produkt-3-2', 1, 'App\\Menu', '2022-03-22 09:48:26', '2022-03-22 09:48:26'),
(1623, 'produkt-2-2', 'produkt-2-3', 'produkt-2-3', 'produkt-2-3', 'produkt-2-4', 2, 'App\\Menu', '2022-03-22 10:49:15', '2022-03-22 10:49:15'),
(1624, 'kategorija-1-5', 'ktehorija-4', 'kategorija-3', 'kategorija-3', 'preke-2-6', 5, 'App\\Menu', '2022-03-22 10:49:17', '2022-03-22 10:49:17'),
(1625, 'kitos-prekes-69', 'kitos-prekes-69', 'kitos-prekes-69', 'kitos-prekes-69', 'preke-1-6', 7, 'App\\Menu', '2022-03-22 10:49:18', '2022-03-22 10:49:18'),
(1627, 'iner-produkt-2-3', 'grojantys-dubenys-55', 'grojantys-dubenys-55', 'grojantys-dubenys-55', 'grojantys-dubenys-55', 6, 'App\\SubMenu', '2022-03-22 10:53:32', '2022-03-22 10:53:32'),
(1628, 'kitos-prekes-6a', 'kitos-prekes-6a', 'kitos-prekes-6a', 'kitos-prekes-6a', 'preke-1-7', 7, 'App\\Menu', '2022-03-23 07:12:08', '2022-03-23 07:12:08'),
(1629, 'varitaion', 'varitaion', 'varitaion', 'varitaion', 'varitaion', 8, 'App\\Menu', '2022-03-23 07:15:15', '2022-03-23 07:15:15'),
(1631, 'varitaion-1', 'varitaion-1', 'varitaion-1', 'varitaion-1', 'varitaion-1', 8, 'App\\Menu', '2022-03-23 07:19:12', '2022-03-23 07:19:12'),
(1633, 'rtest-main-menu', 'rtest-main-menu', 'rtest-main-menu', 'rtest-main-menu', 'rtest-main-menu', 9, 'App\\Menu', '2022-03-23 08:51:53', '2022-03-23 08:51:53'),
(1635, 'rtest-main-menu-1', 'rtest-main-menu-1', 'rtest-main-menu-1', 'rtest-main-menu-1', 'rtest-main-menu-1', 9, 'App\\Menu', '2022-03-23 08:54:30', '2022-03-23 08:54:30'),
(1637, 'drobes', 'drobes', 'drobes', 'drobes', 'drobes', 10, 'App\\Menu', '2022-03-23 09:34:54', '2022-03-23 09:34:54'),
(1638, 'drobiukasia', 'drobiukasia', 'drobiukasia', 'drobiukasia', 'drobiukasia', 8, 'App\\SubMenu', '2022-03-23 09:35:25', '2022-03-23 09:35:25'),
(1639, 'drobes-1', 'drobes-1', 'drobes-1', 'drobes-1', 'drobes-1', 10, 'App\\Menu', '2022-03-23 09:36:19', '2022-03-23 09:36:19'),
(1640, 'drobiukasia-1', 'drobiukasia-1', 'drobiukasia-1', 'drobiukasia-1', 'drobiukasia-1', 8, 'App\\SubMenu', '2022-03-23 09:36:22', '2022-03-23 09:36:22'),
(1641, 'drobes-2', 'drobes-2', 'drobes-2', 'drobes-2', 'drobes-2', 10, 'App\\Menu', '2022-03-23 09:41:00', '2022-03-23 09:41:00');
INSERT INTO `slugs` (`id`, `slug_en`, `slug_lt`, `slug_rus`, `slug_pt`, `slug_es`, `slugable_id`, `slugable_type`, `created_at`, `updated_at`) VALUES
(1642, 'drobiukasia-2', 'drobiukasia-2', 'drobiukasia-2', 'drobiukasia-2', 'drobiukasia-2', 8, 'App\\SubMenu', '2022-03-23 09:41:12', '2022-03-23 09:41:12'),
(1644, 'rtest-main-menu-2', 'rtest-main-menu-2', 'rtest-main-menu-2', 'rtest-main-menu-2', 'rtest-main-menu-2', 9, 'App\\Menu', '2022-03-23 09:46:43', '2022-03-23 09:46:43'),
(1647, 'drobes-3', 'drobes-3', 'drobes-3', 'drobes-3', 'drobes-3', 10, 'App\\Menu', '2022-03-23 09:47:14', '2022-03-23 09:47:14'),
(1649, 'rtest-main-menu-3', 'rtest-main-menu-3', 'rtest-main-menu-3', 'rtest-main-menu-3', 'rtest-main-menu-3', 9, 'App\\Menu', '2022-03-23 09:47:55', '2022-03-23 09:47:55'),
(1652, 'kategorija-1-6', 'ktehorija-5', 'kategorija-4', 'kategorija-4', 'preke-2-7', 5, 'App\\Menu', '2022-03-23 12:13:38', '2022-03-23 12:13:38'),
(1653, 'produkt-3-3', 'produkt-3-3', 'produkt-3-3', 'produkt-3-3', 'produkt-3-3', 1, 'App\\Menu', '2022-03-23 14:10:04', '2022-03-23 14:10:04'),
(1654, 'drobes-4', 'drobes-4', 'drobes-4', 'drobes-4', 'drobes-4', 10, 'App\\Menu', '2022-03-23 16:04:47', '2022-03-23 16:04:47'),
(1655, 'drobes-5', 'drobes-5', 'drobes-5', 'drobes-5', 'drobes-5', 10, 'App\\Menu', '2022-03-23 16:05:24', '2022-03-23 16:05:24'),
(1656, 'iner-produkt-2-4', 'grojantys-dubenys-56', 'grojantys-dubenys-56', 'grojantys-dubenys-56', 'grojantys-dubenys-56', 6, 'App\\SubMenu', '2022-03-23 16:07:14', '2022-03-23 16:07:14'),
(1657, 'drobiukasia-3', 'drobiukasia-3', 'drobiukasia-3', 'drobiukasia-3', 'drobiukasia-3', 8, 'App\\SubMenu', '2022-03-23 16:07:24', '2022-03-23 16:07:24'),
(1658, 'iner-produkt-5', 'transcendentines-kriaukles-2a', 'transcendentines-kriaukles-2a', 'transcendentines-kriaukles-2a', 'transcendentines-kriaukles-2a', 7, 'App\\SubMenu', '2022-03-23 16:08:51', '2022-03-23 16:08:51'),
(1659, 'drobes-6', 'drobes-6', 'drobes-6', 'drobes-6', 'drobes-6', 10, 'App\\Menu', '2022-03-24 03:51:10', '2022-03-24 03:51:10'),
(1660, 'drobiukasia-4', 'drobiukasia-4', 'drobiukasia-4', 'drobiukasia-4', 'drobiukasia-4', 8, 'App\\SubMenu', '2022-03-24 03:52:35', '2022-03-24 03:52:35'),
(1661, 'drobes-7', 'drobes-7', 'drobes-7', 'drobes-7', 'drobes-7', 10, 'App\\Menu', '2022-03-24 04:43:28', '2022-03-24 04:43:28'),
(1662, 'drobiukasia-5', 'drobiukasia-5', 'drobiukasia-5', 'drobiukasia-5', 'drobiukasia-5', 8, 'App\\SubMenu', '2022-03-24 04:43:39', '2022-03-24 04:43:39'),
(1663, 'drobiukasia-6', 'drobiukasia-6', 'drobiukasia-6', 'drobiukasia-6', 'drobiukasia-6', 8, 'App\\SubMenu', '2022-03-24 04:43:46', '2022-03-24 04:43:46'),
(1664, 'rtest-main-menu-4', 'rtest-main-menu-4', 'rtest-main-menu-4', 'rtest-main-menu-4', 'rtest-main-menu-4', 9, 'App\\Menu', '2022-03-25 05:36:08', '2022-03-25 05:36:08'),
(1665, 'produkt-3-4', 'produkt-3-4', 'produkt-3-4', 'produkt-3-4', 'produkt-3-4', 1, 'App\\Menu', '2022-03-25 05:36:09', '2022-03-25 05:36:09'),
(1666, 'drobes-8', 'drobes-8', 'drobes-8', 'drobes-8', 'drobes-8', 10, 'App\\Menu', '2022-03-25 05:36:14', '2022-03-25 05:36:14'),
(1667, 'iner-produkt-6', 'transcendentines-kriaukles-2b', 'transcendentines-kriaukles-2b', 'transcendentines-kriaukles-2b', 'transcendentines-kriaukles-2b', 7, 'App\\SubMenu', '2022-03-25 05:36:15', '2022-03-25 05:36:15'),
(1668, 'produkt-2-3', 'produkt-2-4', 'produkt-2-4', 'produkt-2-4', 'produkt-2-5', 2, 'App\\Menu', '2022-03-25 05:36:18', '2022-03-25 05:36:18'),
(1669, 'kategorija-1-7', 'ktehorija-6', 'kategorija-5', 'kategorija-5', 'preke-2-8', 5, 'App\\Menu', '2022-03-25 05:36:18', '2022-03-25 05:36:18'),
(1670, 'kitos-prekes-6b', 'kitos-prekes-6b', 'kitos-prekes-6b', 'kitos-prekes-6b', 'preke-1-8', 7, 'App\\Menu', '2022-03-25 05:36:19', '2022-03-25 05:36:19'),
(1674, 'drobes-9', 'drobes-9', 'drobes-9', 'drobes-9', 'drobes-9', 10, 'App\\Menu', '2022-03-25 07:31:36', '2022-03-25 07:31:36'),
(1675, 'drobes-a', 'drobes-a', 'drobes-a', 'drobes-a', 'drobes-a', 10, 'App\\Menu', '2022-03-25 07:31:37', '2022-03-25 07:31:37'),
(1677, 'drobes-b', 'drobes-b', 'drobes-b', 'drobes-b', 'drobes-b', 10, 'App\\Menu', '2022-03-25 07:32:19', '2022-03-25 07:32:19'),
(1678, 'spauda', 'spauda', 'spauda', 'spauda', 'spauda', 11, 'App\\Menu', '2022-03-25 07:43:39', '2022-03-25 07:43:39'),
(1680, 'spauda-1', 'spauda-1', 'spauda-1', 'spauda-1', 'spauda-1', 11, 'App\\Menu', '2022-03-25 07:48:19', '2022-03-25 07:48:19'),
(1682, 'drobiukasia-7', 'drobiukasia-7', 'drobiukasia-7', 'drobiukasia-7', 'drobiukasia-7', 8, 'App\\SubMenu', '2022-03-25 07:48:52', '2022-03-25 07:48:52'),
(1684, 'spauda-2', 'spauda-2', 'spauda-2', 'spauda-2', 'spauda-2', 11, 'App\\Menu', '2022-03-25 09:03:52', '2022-03-25 09:03:52'),
(1686, 'spauda-3', 'spauda-3', 'spauda-3', 'spauda-3', 'spauda-3', 11, 'App\\Menu', '2022-03-25 09:30:37', '2022-03-25 09:30:37'),
(1691, 'spauda-4', 'spauda-4', 'spauda-4', 'spauda-4', 'spauda-4', 11, 'App\\Menu', '2022-03-25 09:47:11', '2022-03-25 09:47:11'),
(1692, 'spauda-5', 'spauda-5', 'spauda-5', 'spauda-5', 'spauda-5', 11, 'App\\Menu', '2022-03-25 09:47:26', '2022-03-25 09:47:26'),
(1693, 'spauda-6', 'spauda-6', 'spauda-6', 'spauda-6', 'spauda-6', 11, 'App\\Menu', '2022-03-25 09:50:39', '2022-03-25 09:50:39'),
(1694, 'spauda-7', 'spauda-7', 'spauda-7', 'spauda-7', 'spauda-7', 11, 'App\\Menu', '2022-03-25 09:52:06', '2022-03-25 09:52:06'),
(1695, 'spauda-8', 'spauda-8', 'spauda-8', 'spauda-8', 'spauda-8', 11, 'App\\Menu', '2022-03-25 09:54:08', '2022-03-25 09:54:08'),
(1696, 'a4-spauda-4', 'a4-spauda-4', 'a4-spauda-4', 'a4-spauda-4', 'a4-spauda-4', 9, 'App\\SubMenu', '2022-03-25 09:55:15', '2022-03-25 09:55:15'),
(1697, 'a4-spauda', 'a4-spauda', 'a4-spauda', 'a4-spauda', 'a4-spauda', 9, 'App\\SubMenu', '2022-03-25 10:04:05', '2022-03-25 10:04:05'),
(1698, 'a4-spauda-1', 'a4-spauda-1', 'a4-spauda-1', 'a4-spauda-1', 'a4-spauda-1', 9, 'App\\SubMenu', '2022-03-25 10:04:54', '2022-03-25 10:04:54'),
(1700, 'spauda-9', 'spauda-9', 'spauda-9', 'spauda-9', 'spauda-9', 11, 'App\\Menu', '2022-03-25 10:15:30', '2022-03-25 10:15:30'),
(1701, 'a4-spauda-3', 'a4-spauda-3', 'a4-spauda-3', 'a4-spauda-3', 'a4-spauda-3', 9, 'App\\SubMenu', '2022-03-25 10:15:39', '2022-03-25 10:15:39'),
(1702, 'a4-spauda-2', 'a4-spauda-2', 'a4-spauda-2', 'a4-spauda-2', 'a4-spauda-2', 57, 'App\\Product', '2022-03-25 10:31:06', '2022-03-25 10:31:06'),
(1703, 'a4-spauda-5', 'a4-spauda-5', 'a4-spauda-5', 'a4-spauda-5', 'a4-spauda-5', 9, 'App\\SubMenu', '2022-03-25 10:31:16', '2022-03-25 10:31:16'),
(1704, 'a4-spauda-6', 'a4-spauda-6', 'a4-spauda-6', 'a4-spauda-6', 'a4-spauda-6', 57, 'App\\Product', '2022-03-25 10:31:24', '2022-03-25 10:31:24'),
(1705, 'a4-spauda-7', 'a4-spauda-7', 'a4-spauda-7', 'a4-spauda-7', 'a4-spauda-7', 57, 'App\\Product', '2022-03-25 10:32:23', '2022-03-25 10:32:23'),
(1706, 'a4-spauda-8', 'a4-spauda-8', 'a4-spauda-8', 'a4-spauda-8', 'a4-spauda-8', 57, 'App\\Product', '2022-03-25 10:32:44', '2022-03-25 10:32:44'),
(1707, 'a4-spauda-9', 'a4-spauda-9', 'a4-spauda-9', 'a4-spauda-9', 'a4-spauda-9', 57, 'App\\Product', '2022-03-25 10:40:54', '2022-03-25 10:40:54'),
(1708, 'spauda-su-irisimu', 'spauda-su-irisimu', 'spauda-su-irisimu', 'spauda-su-irisimu', 'spauda-su-irisimu', 12, 'App\\Menu', '2022-03-25 10:45:46', '2022-03-25 10:45:46'),
(1709, 'placiaformate-spauda', 'placiaformate-spauda', 'placiaformate-spauda', 'placiaformate-spauda', 'placiaformate-spauda', 13, 'App\\Menu', '2022-03-25 10:46:02', '2022-03-25 10:46:02'),
(1710, 'plansetai', 'plansetai', 'plansetai', 'plansetai', 'plansetai', 14, 'App\\Menu', '2022-03-25 10:46:10', '2022-03-25 10:46:10'),
(1711, 'vizitines-korteles', 'vizitines-korteles', 'vizitines-korteles', 'vizitines-korteles', 'vizitines-korteles', 15, 'App\\Menu', '2022-03-25 10:46:34', '2022-03-25 10:46:34'),
(1712, 'disko-irasymas', 'disko-irasymas', 'disko-irasymas', 'disko-irasymas', 'disko-irasymas', 16, 'App\\Menu', '2022-03-25 10:46:45', '2022-03-25 10:46:45'),
(1713, 'foto-produktai', 'foto-produktai', 'foto-produktai', 'foto-produktai', 'foto-produktai', 17, 'App\\Menu', '2022-03-25 10:46:52', '2022-03-25 10:46:52'),
(1714, 'kanceliarines-prekes', 'kanceliarines-prekes', 'kanceliarines-prekes', 'kanceliarines-prekes', 'kanceliarines-prekes', 18, 'App\\Menu', '2022-03-25 10:46:59', '2022-03-25 10:46:59'),
(1715, 'rtest-main-menu-5', 'rtest-main-menu-5', 'rtest-main-menu-5', 'rtest-main-menu-5', 'rtest-main-menu-5', 9, 'App\\Menu', '2022-03-25 11:19:22', '2022-03-25 11:19:22'),
(1716, 'spauda-su-irisimu-1', 'spauda-su-irisimu-1', 'spauda-su-irisimu-1', 'spauda-su-irisimu-1', 'spauda-su-irisimu-1', 12, 'App\\Menu', '2022-03-25 11:27:51', '2022-03-25 11:27:51'),
(1717, 'placiaformate-spauda-1', 'placiaformate-spauda-1', 'placiaformate-spauda-1', 'placiaformate-spauda-1', 'placiaformate-spauda-1', 13, 'App\\Menu', '2022-03-25 11:27:52', '2022-03-25 11:27:52'),
(1718, 'disko-irasymas-1', 'disko-irasymas-1', 'disko-irasymas-1', 'disko-irasymas-1', 'disko-irasymas-1', 16, 'App\\Menu', '2022-03-25 13:22:16', '2022-03-25 13:22:16'),
(1719, 'foto-produktai-1', 'foto-produktai-1', 'foto-produktai-1', 'foto-produktai-1', 'foto-produktai-1', 17, 'App\\Menu', '2022-03-25 13:22:19', '2022-03-25 13:22:19'),
(1720, 'placiaformate-spauda-2', 'placiaformate-spauda-2', 'placiaformate-spauda-2', 'placiaformate-spauda-2', 'placiaformate-spauda-2', 13, 'App\\Menu', '2022-03-25 13:22:21', '2022-03-25 13:22:21'),
(1721, 'spauda-su-irisimu-2', 'spauda-su-irisimu-2', 'spauda-su-irisimu-2', 'spauda-su-irisimu-2', 'spauda-su-irisimu-2', 12, 'App\\Menu', '2022-03-25 13:22:23', '2022-03-25 13:22:23'),
(1722, 'spauda-a', 'spauda-a', 'spauda-a', 'spauda-a', 'spauda-a', 11, 'App\\Menu', '2022-03-25 13:22:25', '2022-03-25 13:22:25'),
(1723, 'a4-spauda-a', 'a4-spauda-a', 'a4-spauda-a', 'a4-spauda-a', 'a4-spauda-a', 57, 'App\\Product', '2022-03-25 13:22:27', '2022-03-25 13:22:27'),
(1724, 'vizitines-korteles-1', 'vizitines-korteles-1', 'vizitines-korteles-1', 'vizitines-korteles-1', 'vizitines-korteles-1', 15, 'App\\Menu', '2022-03-25 13:29:46', '2022-03-25 13:29:46'),
(1725, 'plansetai-1', 'plansetai-1', 'plansetai-1', 'plansetai-1', 'plansetai-1', 14, 'App\\Menu', '2022-03-25 13:29:47', '2022-03-25 13:29:47'),
(1726, 'spauda-b', 'spauda-b', 'spauda-b', 'spauda-b', 'spauda-b', 11, 'App\\Menu', '2022-03-26 04:30:27', '2022-03-26 04:30:27'),
(1727, 'a4-spauda-b', 'a4-spauda-b', 'a4-spauda-b', 'a4-spauda-b', 'a4-spauda-b', 57, 'App\\Product', '2022-03-26 04:30:45', '2022-03-26 04:30:45'),
(1728, 'a4-spauda-c', 'a4-spauda-c', 'a4-spauda-c', 'a4-spauda-c', 'a4-spauda-c', 57, 'App\\Product', '2022-03-26 04:30:46', '2022-03-26 04:30:46'),
(1730, 'a4-spauda-d', 'a4-spauda-d', 'a4-spauda-d', 'a4-spauda-d', 'a4-spauda-d', 57, 'App\\Product', '2022-03-26 04:30:47', '2022-03-26 04:30:47'),
(1731, 'foto-produktai-2', 'foto-produktai-2', 'foto-produktai-2', 'foto-produktai-2', 'foto-produktai-2', 17, 'App\\Menu', '2022-03-27 04:02:14', '2022-03-27 04:02:14'),
(1732, 'spauda-su-irisimu-3', 'spauda-su-irisimu-3', 'spauda-su-irisimu-3', 'spauda-su-irisimu-3', 'spauda-su-irisimu-3', 12, 'App\\Menu', '2022-03-27 04:02:27', '2022-03-27 04:02:27'),
(1733, 'placiaformate-spauda-3', 'placiaformate-spauda-3', 'placiaformate-spauda-3', 'placiaformate-spauda-3', 'placiaformate-spauda-3', 13, 'App\\Menu', '2022-03-27 04:02:31', '2022-03-27 04:02:31'),
(1734, 'plansetai-2', 'plansetai-2', 'plansetai-2', 'plansetai-2', 'plansetai-2', 14, 'App\\Menu', '2022-03-27 04:02:33', '2022-03-27 04:02:33'),
(1735, 'vizitines-korteles-2', 'vizitines-korteles-2', 'vizitines-korteles-2', 'vizitines-korteles-2', 'vizitines-korteles-2', 15, 'App\\Menu', '2022-03-27 04:02:35', '2022-03-27 04:02:35'),
(1736, 'disko-irasymas-2', 'disko-irasymas-2', 'disko-irasymas-2', 'disko-irasymas-2', 'disko-irasymas-2', 16, 'App\\Menu', '2022-03-27 04:02:37', '2022-03-27 04:02:37'),
(1737, 'spauda-c', 'spauda-c', 'spauda-c', 'spauda-c', 'spauda-c', 11, 'App\\Menu', '2022-03-27 04:02:43', '2022-03-27 04:02:43'),
(1738, 'spauda-su-irisimu-4', 'spauda-su-irisimu-4', 'spauda-su-irisimu-4', 'spauda-su-irisimu-4', 'spauda-su-irisimu-4', 12, 'App\\Menu', '2022-03-28 06:09:17', '2022-03-28 06:09:17'),
(1739, 'spauda-d', 'spauda-d', 'spauda-d', 'spauda-d', 'spauda-d', 11, 'App\\Menu', '2022-03-28 06:16:01', '2022-03-28 06:16:01'),
(1740, 'a4-spauda-e', 'a4-spauda-e', 'a4-spauda-e', 'a4-spauda-e', 'a4-spauda-e', 57, 'App\\Product', '2022-03-28 06:16:37', '2022-03-28 06:16:37'),
(1741, 'a4-spauda-f', 'a4-spauda-f', 'a4-spauda-f', 'a4-spauda-f', 'a4-spauda-f', 9, 'App\\SubMenu', '2022-03-28 06:18:26', '2022-03-28 06:18:26'),
(1742, 'a4-spauda-10', 'a4-spauda-10', 'a4-spauda-10', 'a4-spauda-10', 'a4-spauda-10', 57, 'App\\Product', '2022-03-28 06:34:47', '2022-03-28 06:34:47'),
(1743, 'spauda-e', 'spauda-e', 'spauda-e', 'spauda-e', 'spauda-e', 11, 'App\\Menu', '2022-03-28 06:35:34', '2022-03-28 06:35:34'),
(1744, 'a4-spauda-11', 'a4-spauda-11', 'a4-spauda-11', 'a4-spauda-11', 'a4-spauda-11', 57, 'App\\Product', '2022-03-28 06:35:40', '2022-03-28 06:35:40'),
(1745, 'foto-produktai-3', 'foto-produktai-3', 'foto-produktai-3', 'foto-produktai-3', 'foto-produktai-3', 17, 'App\\Menu', '2022-03-28 06:37:45', '2022-03-28 06:37:45'),
(1746, 'a4-spauda-12', 'a4-spauda-12', 'a4-spauda-12', 'a4-spauda-12', 'a4-spauda-12', 58, 'App\\Product', '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(1747, 'disko-irasymas-3', 'disko-irasymas-3', 'disko-irasymas-3', 'disko-irasymas-3', 'disko-irasymas-3', 16, 'App\\Menu', '2022-03-28 06:37:48', '2022-03-28 06:37:48'),
(1748, 'vizitines-korteles-3', 'vizitines-korteles-3', 'vizitines-korteles-3', 'vizitines-korteles-3', 'vizitines-korteles-3', 15, 'App\\Menu', '2022-03-28 06:37:52', '2022-03-28 06:37:52'),
(1749, 'a4-spauda-13', 'a4-spauda-13', 'a4-spauda-13', 'a4-spauda-13', 'a4-spauda-13', 58, 'App\\Product', '2022-03-28 06:38:07', '2022-03-28 06:38:07'),
(1750, 'a4-spauda-14', 'a4-spauda-14', 'a4-spauda-14', 'a4-spauda-14', 'a4-spauda-14', 58, 'App\\Product', '2022-03-28 06:38:08', '2022-03-28 06:38:08'),
(1751, 'a4-spauda-15', 'a4-spauda-15', 'a4-spauda-15', 'a4-spauda-15', 'a4-spauda-15', 9, 'App\\SubMenu', '2022-03-28 06:40:56', '2022-03-28 06:40:56'),
(1752, 'a4-spauda-16', 'a4-spauda-16', 'a4-spauda-16', 'a4-spauda-16', 'a4-spauda-16', 57, 'App\\Product', '2022-03-28 06:42:05', '2022-03-28 06:42:05'),
(1753, 'placiaformate-spauda-4', 'placiaformate-spauda-4', 'placiaformate-spauda-4', 'placiaformate-spauda-4', 'placiaformate-spauda-4', 13, 'App\\Menu', '2022-03-28 07:06:11', '2022-03-28 07:06:11'),
(1754, 'plansetai-3', 'plansetai-3', 'plansetai-3', 'plansetai-3', 'plansetai-3', 14, 'App\\Menu', '2022-03-28 07:06:14', '2022-03-28 07:06:14'),
(1755, 'vizitines-korteles-4', 'vizitines-korteles-4', 'vizitines-korteles-4', 'vizitines-korteles-4', 'vizitines-korteles-4', 15, 'App\\Menu', '2022-03-28 07:06:15', '2022-03-28 07:06:15'),
(1756, 'disko-irasymas-4', 'disko-irasymas-4', 'disko-irasymas-4', 'disko-irasymas-4', 'disko-irasymas-4', 16, 'App\\Menu', '2022-03-28 07:06:17', '2022-03-28 07:06:17'),
(1757, 'a4-spauda-17', 'a4-spauda-17', 'a4-spauda-17', 'a4-spauda-17', 'a4-spauda-17', 9, 'App\\SubMenu', '2022-03-28 07:31:01', '2022-03-28 07:31:01'),
(1758, 'a4-spauda-18', 'a4-spauda-18', 'a4-spauda-18', 'a4-spauda-18', 'a4-spauda-18', 58, 'App\\Product', '2022-03-28 07:35:02', '2022-03-28 07:35:02'),
(1759, 'kanceliarines-prekes-1', 'kanceliarines-prekes-1', 'kanceliarines-prekes-1', 'kanceliarines-prekes-1', 'kanceliarines-prekes-1', 18, 'App\\Menu', '2022-03-28 07:54:02', '2022-03-28 07:54:02'),
(1760, 'foto-produktai-4', 'foto-produktai-4', 'foto-produktai-4', 'foto-produktai-4', 'foto-produktai-4', 17, 'App\\Menu', '2022-03-28 07:54:10', '2022-03-28 07:54:10'),
(1761, 'isorines-duomenu-laikmenos', 'isorines-duomenu-laikmenos', 'isorines-duomenu-laikmenos', 'isorines-duomenu-laikmenos', 'isorines-duomenu-laikmenos', 10, 'App\\SubMenu', '2022-03-28 08:34:57', '2022-03-28 08:34:57'),
(1762, 'cd-r-diskas-popieriniame-vokelyje', 'cd-r-diskas-popieriniame-vokelyje', 'cd-r-diskas-popieriniame-vokelyje', 'cd-r-diskas-popieriniame-vokelyje', 'cd-r-diskas-popieriniame-vokelyje', 59, 'App\\Product', '2022-03-28 08:44:58', '2022-03-28 08:44:58'),
(1763, 'foto-produktai-5', 'foto-produktai-5', 'foto-produktai-5', 'foto-produktai-5', 'foto-produktai-5', 17, 'App\\Menu', '2022-03-28 09:02:05', '2022-03-28 09:02:05'),
(1764, 'isorines-duomenu-laikmenos-1', 'isorines-duomenu-laikmenos-1', 'isorines-duomenu-laikmenos-1', 'isorines-duomenu-laikmenos-1', 'isorines-duomenu-laikmenos-1', 10, 'App\\SubMenu', '2022-03-28 09:09:46', '2022-03-28 09:09:46'),
(1765, 'cd-r-diskas-popieriniame-vokelyje-1', 'cd-r-diskas-popieriniame-vokelyje-1', 'cd-r-diskas-popieriniame-vokelyje-1', 'cd-r-diskas-popieriniame-vokelyje-1', 'cd-r-diskas-popieriniame-vokelyje-1', 59, 'App\\Product', '2022-03-28 09:09:48', '2022-03-28 09:09:48'),
(1766, 'foto-produktai-6', 'foto-produktai-6', 'foto-produktai-6', 'foto-produktai-6', 'foto-produktai-6', 17, 'App\\Menu', '2022-03-28 09:09:56', '2022-03-28 09:09:56'),
(1767, 'spauda-su-irisimu-5', 'spauda-su-irisimu-5', 'spauda-su-irisimu-5', 'spauda-su-irisimu-5', 'spauda-su-irisimu-5', 12, 'App\\Menu', '2022-03-28 12:17:29', '2022-03-28 12:17:29'),
(1768, 'spauda-f', 'spauda-f', 'spauda-f', 'spauda-f', 'spauda-f', 11, 'App\\Menu', '2022-03-28 14:12:04', '2022-03-28 14:12:04'),
(1769, 'a4-spauda-19', 'a4-spauda-19', 'a4-spauda-19', 'a4-spauda-19', 'a4-spauda-19', 57, 'App\\Product', '2022-03-28 14:12:09', '2022-03-28 14:12:09'),
(1770, 'kanceliarines-prekes-2', 'kanceliarines-prekes-2', 'kanceliarines-prekes-2', 'kanceliarines-prekes-2', 'kanceliarines-prekes-2', 18, 'App\\Menu', '2022-03-29 01:09:29', '2022-03-29 01:09:29'),
(1771, 'cd-r-diskas-popieriniame-vokelyje-2', 'cd-r-diskas-popieriniame-vokelyje-2', 'cd-r-diskas-popieriniame-vokelyje-2', 'cd-r-diskas-popieriniame-vokelyje-2', 'cd-r-diskas-popieriniame-vokelyje-2', 59, 'App\\Product', '2022-03-29 01:09:36', '2022-03-29 01:09:36'),
(1772, 'cd-r-diskas-popieriniame-vokelyje-3', 'cd-r-diskas-popieriniame-vokelyje-3', 'cd-r-diskas-popieriniame-vokelyje-3', 'cd-r-diskas-popieriniame-vokelyje-3', 'cd-r-diskas-popieriniame-vokelyje-3', 59, 'App\\Product', '2022-03-29 05:57:02', '2022-03-29 05:57:02'),
(1773, 'plansetai-4', 'plansetai-4', 'plansetai-4', 'plansetai-4', 'plansetai-4', 14, 'App\\Menu', '2022-03-29 08:48:49', '2022-03-29 08:48:49'),
(1774, 'a4-spauda-1a', 'a4-spauda-1a', 'a4-spauda-1a', 'a4-spauda-1a', 'a4-spauda-1a', 58, 'App\\Product', '2022-03-29 08:49:13', '2022-03-29 08:49:13'),
(1775, 'kanceliarines-prekes-3', 'kanceliarines-prekes-3', 'kanceliarines-prekes-3', 'kanceliarines-prekes-3', 'kanceliarines-prekes-3', 18, 'App\\Menu', '2022-03-29 08:49:22', '2022-03-29 08:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_lt` varchar(255) NOT NULL,
  `name_rus` varchar(255) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `name_en`, `name_lt`, `name_rus`, `name_pt`, `name_es`, `created_at`, `updated_at`) VALUES
(1, 'Specification', 'Specification', 'Specification', 'Specification', 'Specification', '2022-03-21 12:52:47', '2022-03-21 12:53:18'),
(2, 'sp1', 'sp1', 'sp1', 'sp1', 'sp1', '2022-03-23 07:10:32', '2022-03-23 07:10:32'),
(3, 'sp2', 'sp2', 'sp2', 'sp2', 'sp2', '2022-03-23 07:10:41', '2022-03-23 07:10:41'),
(5, 'sp3', 'sp3', 'sp3', 'sp3', 'sp3', '2022-03-23 08:49:17', '2022-03-23 08:49:17'),
(6, 'drobes unikalumas', 'drobes unikalumas', 'drobes unikalumas', 'drobes unikalumas', 'drobes unikalumas', '2022-03-23 09:32:01', '2022-03-23 09:32:01'),
(7, 'Galimi variantai', 'Galimi variantai', 'Galimi variantai', 'Galimi variantai', 'Galimi variantai', '2022-03-25 07:42:34', '2022-03-25 07:42:34'),
(8, 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', 'Popieriaus pasirinkimas', '2022-03-25 09:30:17', '2022-03-25 09:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `sub_menu_lt` varchar(255) NOT NULL,
  `sub_menu_en` varchar(255) NOT NULL,
  `sub_menu_rus` varchar(255) NOT NULL,
  `sub_menu_pt` varchar(255) NOT NULL,
  `sub_menu_es` varchar(255) NOT NULL,
  `url_en` mediumtext DEFAULT NULL,
  `url_lt` mediumtext DEFAULT NULL,
  `url_rus` mediumtext DEFAULT NULL,
  `url_pt` mediumtext DEFAULT NULL,
  `url_es` mediumtext DEFAULT NULL,
  `custom_size_id` text DEFAULT NULL,
  `custom_clasp_id` text DEFAULT NULL,
  `surface_amber_id` text DEFAULT NULL,
  `specification_id` text DEFAULT NULL,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `menu_id`, `sub_menu_lt`, `sub_menu_en`, `sub_menu_rus`, `sub_menu_pt`, `sub_menu_es`, `url_en`, `url_lt`, `url_rus`, `url_pt`, `url_es`, `custom_size_id`, `custom_clasp_id`, `surface_amber_id`, `specification_id`, `total_view`, `created_at`, `updated_at`) VALUES
(9, 11, 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', 'A4 spauda', NULL, NULL, NULL, NULL, NULL, '[\"21\",\"22\",\"24\"]', NULL, NULL, NULL, 4, '2022-03-25 09:55:15', '2022-03-28 07:31:01'),
(10, 18, 'Išorinės duomenų laikmenos', 'Išorinės duomenų laikmenos', 'Išorinės duomenų laikmenos', 'Išorinės duomenų laikmenos', 'Išorinės duomenų laikmenos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-03-28 08:34:56', '2022-03-28 09:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_info`
--

CREATE TABLE `sub_menu_info` (
  `id` int(11) NOT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_lt` longtext DEFAULT NULL,
  `description_rus` longtext DEFAULT NULL,
  `description_pt` text DEFAULT NULL,
  `description_es` text DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menu_info`
--

INSERT INTO `sub_menu_info` (`id`, `description_en`, `description_lt`, `description_rus`, `description_pt`, `description_es`, `img`, `sub_menu_id`, `created_at`, `updated_at`) VALUES
(6, NULL, NULL, NULL, NULL, NULL, 'sub-menu1647868977.webp', 6, '2021-10-13 17:35:52', '2022-03-21 12:22:57'),
(7, NULL, NULL, NULL, NULL, NULL, 'sub-menu1647868955.webp', 7, '2021-10-28 18:08:00', '2022-03-21 13:14:49'),
(8, 'dsedffsdfa', 'dsedffsdfa', 'dsedffsdfa', 'dsedffsdfa', 'dsedffsdfa', '', 8, '2022-03-23 09:35:25', '2022-03-23 09:41:12'),
(9, NULL, NULL, NULL, NULL, NULL, '', 9, '2022-03-25 09:55:15', '2022-03-25 10:15:39'),
(10, NULL, NULL, NULL, NULL, NULL, '', 10, '2022-03-28 08:34:57', '2022-03-28 08:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `surface_ambers`
--

CREATE TABLE `surface_ambers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_lt` varchar(100) NOT NULL,
  `name_rus` varchar(100) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, 'Test', 'test@gmail.com', NULL, '$2y$10$wH/dDVXJj7dhKrmi2KyfwuVNSkLqB1AK32zuAspwzD.hbK2sAd6b6', NULL, '2021-12-01 06:16:26', '2021-12-01 06:16:26'),
(7, 'Tamal', 'paklausti@gmail.com', NULL, '$2y$10$Et410MV95.vTmDdh.mwS.ufz6RlZDYKettGR0aJ5U9p7Jsh923QLG', NULL, '2021-12-02 10:49:20', '2021-12-02 10:49:20'),
(8, 'Jdj', 'bdbdhd@nd.com', NULL, '$2y$10$XPNH7VRjqWOTAqUKpGkmBOc8SlPJFQugvOMSjC7vfFry95MsziMQ2', NULL, '2021-12-06 14:16:28', '2021-12-06 14:16:28'),
(10, 'test', 'bbb@gmail.com', NULL, '$2y$10$oA2G5vqr4JRtaWS/VuPIDONzNElMgieQcBpbvNMXVnMZgZvwpZUjq', NULL, '2021-12-07 08:36:31', '2021-12-07 08:36:31'),
(11, 'Gabrielė Valaitytė', 'gabrielle.valaityte@gmail.com', NULL, '$2y$10$iKCY1BftfPtwnLGUockLruPf1l1VxKi.SHKkv0VyNYUxMNiKDOf2G', NULL, '2021-12-22 08:58:33', '2021-12-22 08:58:33'),
(12, 'rterew', 'rewertgre@jsa.lo', NULL, '$2y$10$9z4dwf/vVcmhwk6NCUSNr.Y2lemHu3GALF2hD1T2OM3AAXZ0RHGDK', NULL, '2022-01-24 12:05:27', '2022-01-24 12:05:27'),
(13, 'Rasel', 'testpro@gmail.com', NULL, '$2y$10$TeO6CSEJehACm90AIOr6UObef/URY5oS3S1ZrwaSWJhjhLLImEPbu', NULL, '2022-03-22 11:09:39', '2022-03-22 11:09:39'),
(14, 'TTamal', 'tamalttest@gmail.com', NULL, '$2y$10$oKoMeZ/7swS63LLOQkyKP.k7S318ffa64mSDACDFZXYFiKOw.fGOS', NULL, '2022-03-23 14:24:25', '2022-03-23 14:24:25'),
(15, 'TTamal', 'tamal321@gmail.com', NULL, '$2y$10$Fo/WsKzNVqXUyPzGpH67QuI4GESBQibBI/bEVSs/9P0EhzfRbdG42', NULL, '2022-03-23 14:25:47', '2022-03-23 14:25:47'),
(16, 'TTamal', 'rasel430142@gmail.com', NULL, '$2y$10$cMldB5jWkgFJTaqwftBmKeiv4o9pI/LH8UO9XIrOb5F6aFyRTUoN6', NULL, '2022-03-23 14:31:19', '2022-03-23 14:31:19'),
(17, 'TTamal', 'password@gmail.com', NULL, '$2y$10$q1kaX6Hp2V5WUEvrRk/lSu38f/wVHZS2Wzz2jCdx0a472oLv01NBS', NULL, '2022-03-23 14:49:28', '2022-03-23 14:49:28'),
(18, 'fTest', 'fTest@gmail.com', NULL, '$2y$10$C6ERJzm/hSyL7f6F6ve2duoNlzkR3NfmPkmuCRnB0PX4uWWUDrCGq', NULL, '2022-03-23 14:55:46', '2022-03-23 14:55:46'),
(19, 'EVALDAS KARCIAUSKAS', 'karciauskas55@gmail.com', NULL, '$2y$10$/TcSHYidoWbikv6nY8REvuSGF9GfiyGOkGE.vLG5QtHNzFCVkLjZq', NULL, '2022-03-25 07:21:25', '2022-03-25 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_district` varchar(255) DEFAULT NULL,
  `billing_town` varchar(255) DEFAULT NULL,
  `billing_strt_address` varchar(255) DEFAULT NULL,
  `billing_apartment` varchar(255) DEFAULT NULL,
  `billing_post_code` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_machine` varchar(191) DEFAULT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `company_id` varchar(191) DEFAULT NULL,
  `company_vat` varchar(191) DEFAULT NULL,
  `company_address` varchar(191) DEFAULT NULL,
  `others` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_id`, `last_name`, `phone`, `image`, `billing_country`, `billing_district`, `billing_town`, `billing_strt_address`, `billing_apartment`, `billing_post_code`, `discount`, `created_at`, `updated_at`, `post_machine`, `company_name`, `company_id`, `company_vat`, `company_address`, `others`) VALUES
(19, 18, 'fTest', '345345', NULL, 'Bangladesh', 'fTest', 'fTest', 'fTest', 'fTest', 324535, NULL, '2022-03-23 14:55:46', '2022-03-23 14:55:46', NULL, 'GLOBAL MULTI SE', '3434', '343', 'Ttest', 'asdfsadfsadf'),
(20, 19, 'EVALDAS KARCIAUSKAS', '860806073', NULL, 'Lithuania', 'werwerwnegras', 'Maišiagala', 'asfdasd', '23', 14244, NULL, '2022-03-25 07:21:25', '2022-03-25 07:21:25', NULL, 'click it.lt', 'click it.lt', 'click it.lt', 'Krotošyno', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yarn_colors`
--

CREATE TABLE `yarn_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_en` varchar(100) NOT NULL,
  `color_lt` varchar(100) NOT NULL,
  `color_rus` varchar(100) NOT NULL,
  `color_pt` varchar(255) NOT NULL,
  `color_es` varchar(255) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_passwords`
--
ALTER TABLE `certificate_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_clasps`
--
ALTER TABLE `custom_clasps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_colors`
--
ALTER TABLE `custom_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_sizes`
--
ALTER TABLE `custom_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blogs`
--
ALTER TABLE `home_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inner_menus`
--
ALTER TABLE `inner_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id_foreign` (`menu_id`),
  ADD KEY `sub_menu_id_foreign` (`sub_menu_id`);

--
-- Indexes for table `inner_menu_info`
--
ALTER TABLE `inner_menu_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inner_menu_info_menu_id_foreign` (`inner_menu_id`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_info`
--
ALTER TABLE `menu_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_info_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_vieweds`
--
ALTER TABLE `most_vieweds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_vieweds`
--
ALTER TABLE `my_vieweds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_vieweds_product_id_foreign` (`product_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `ordered_vendors`
--
ALTER TABLE `ordered_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_vendor_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_shipping_categories`
--
ALTER TABLE `product_shipping_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_foreign` (`product_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specification_id_foreign` (`specification_id`),
  ADD KEY `product_specification_product_id_foreign` (`product_id`);

--
-- Indexes for table `pro_sliders`
--
ALTER TABLE `pro_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondary_menus`
--
ALTER TABLE `secondary_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondary_sub_menus`
--
ALTER TABLE `secondary_sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id_foreign` (`country_id`),
  ADD KEY `shipping_type_id_foreign` (`shipping_type_id`),
  ADD KEY `shipping_category_id_foreign` (`shipping_category_id`);

--
-- Indexes for table `shipping_categories`
--
ALTER TABLE `shipping_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_settings`
--
ALTER TABLE `shipping_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_size_id_foreign` (`custom_size_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slugs_slug_en_unique` (`slug_en`),
  ADD UNIQUE KEY `slugs_slug_lt_unique` (`slug_lt`),
  ADD UNIQUE KEY `slugs_slug_rus_unique` (`slug_rus`),
  ADD UNIQUE KEY `slugs_slug_pt_unique` (`slug_pt`),
  ADD UNIQUE KEY `slugs_slug_es_unique` (`slug_es`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id_foreign` (`menu_id`);

--
-- Indexes for table `sub_menu_info`
--
ALTER TABLE `sub_menu_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menu_info_menu_id_foreign` (`sub_menu_id`) USING BTREE;

--
-- Indexes for table `surface_ambers`
--
ALTER TABLE `surface_ambers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_colors`
--
ALTER TABLE `yarn_colors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_passwords`
--
ALTER TABLE `certificate_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_clasps`
--
ALTER TABLE `custom_clasps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_colors`
--
ALTER TABLE `custom_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_sizes`
--
ALTER TABLE `custom_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_blogs`
--
ALTER TABLE `home_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inner_menus`
--
ALTER TABLE `inner_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inner_menu_info`
--
ALTER TABLE `inner_menu_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu_info`
--
ALTER TABLE `menu_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `most_vieweds`
--
ALTER TABLE `most_vieweds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1582;

--
-- AUTO_INCREMENT for table `my_vieweds`
--
ALTER TABLE `my_vieweds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=730;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ordered_vendors`
--
ALTER TABLE `ordered_vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_shipping_categories`
--
ALTER TABLE `product_shipping_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pro_sliders`
--
ALTER TABLE `pro_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secondary_menus`
--
ALTER TABLE `secondary_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `secondary_sub_menus`
--
ALTER TABLE `secondary_sub_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `shipping_categories`
--
ALTER TABLE `shipping_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_settings`
--
ALTER TABLE `shipping_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1776;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_menu_info`
--
ALTER TABLE `sub_menu_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surface_ambers`
--
ALTER TABLE `surface_ambers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `yarn_colors`
--
ALTER TABLE `yarn_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `my_vieweds`
--
ALTER TABLE `my_vieweds`
  ADD CONSTRAINT `my_vieweds_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
