-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 12:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pac_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `acr`
--

CREATE TABLE `acr` (
  `id` int(11) NOT NULL,
  `mr_activity_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `target_group` varchar(1000) DEFAULT NULL,
  `bud_san_no` varchar(1000) DEFAULT NULL,
  `bud_san_date` date DEFAULT NULL,
  `bud_amnt` int(11) DEFAULT NULL,
  `sc_st_group` int(11) DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `brief` text DEFAULT NULL,
  `difficulties` text DEFAULT NULL,
  `amnt_spent` int(11) DEFAULT NULL,
  `venue` varchar(1000) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `outcome` varchar(2000) DEFAULT NULL,
  `impact` varchar(2000) DEFAULT NULL,
  `measures` varchar(2000) DEFAULT NULL,
  `followup` varchar(2000) DEFAULT NULL,
  `faculty` varchar(2000) DEFAULT NULL,
  `total_participants` int(11) DEFAULT NULL,
  `total_external_resource` int(11) DEFAULT NULL,
  `total_internal_resource` int(11) DEFAULT NULL,
  `contingency` int(11) DEFAULT NULL,
  `othr_expense` int(11) DEFAULT NULL,
  `completion_fy_end` int(11) DEFAULT NULL,
  `chk1` varchar(10) NOT NULL DEFAULT 'Pending',
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acr`
--

INSERT INTO `acr` (`id`, `mr_activity_id`, `project_id`, `target_group`, `bud_san_no`, `bud_san_date`, `bud_amnt`, `sc_st_group`, `objective`, `brief`, `difficulties`, `amnt_spent`, `venue`, `start_date`, `end_date`, `outcome`, `impact`, `measures`, `followup`, `faculty`, `total_participants`, `total_external_resource`, `total_internal_resource`, `contingency`, `othr_expense`, `completion_fy_end`, `chk1`, `time`) VALUES
(56, 75, NULL, 'General', '2020', '2021-04-01', 1000, 8, 'Get an idea abt app\r\ncreate db design\r\ncreate models diagram', 'discussion on project', 'na', 500, 'PMD hall', '2021-06-15', '2021-06-15', 'reports', 'wip', 'wo=io', 'iop', 'asd,asd,ncet\r\nasd,efw,ed\'e', 6, 3, 3, NULL, NULL, 22, 'Submit', '2021-06-12'),
(57, 77, NULL, 'General', '2020', '2021-05-31', 12, 1, 'ad\r\nf', '\r\nsdsd', 'we/\'f\r\nef', 12, '1qw', '2021-06-17', '2021-06-26', '\r\nfef\r\nd\r\n', 'wde\r\ned', '\r\ned\r\n', 'ew', 'ed\r\nrfes', 2, 2, 2, NULL, NULL, 22, 'Submit', '2021-06-12'),
(59, 78, NULL, 'children', '2020/04/0109', '0000-00-00', 0, NULL, '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '', '', '', 0, 0, 0, NULL, NULL, NULL, 'Pending', '2021-06-12'),
(60, 82, NULL, 'Teachers', '1-2/2002', '2021-07-15', 10000, 3, 'training', 'training conducted to the teachers', 'insufficient spce', 8500, 'NIE, New Delhi', '2021-07-20', '2021-07-08', '', '', '', '', '', 0, 3, 5, NULL, NULL, 22, 'Pending', '2021-07-09'),
(61, 84, NULL, '', '', '0000-00-00', 0, 0, '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '', '', '', 0, 0, 0, NULL, NULL, NULL, 'Pending', '2021-07-11'),
(62, 83, NULL, '', '', '0000-00-00', 0, 0, '', '', '', 0, '', '0000-00-00', '0000-00-00', '', '', '', '', '', 0, 0, 0, NULL, NULL, NULL, 'Pending', '2021-07-11'),
(63, 79, NULL, 'General', '123456', '2021-07-05', 1000, 8, 'Good Objective', 'Nice report', 'No', 500, 'PMD', '2021-07-17', '2021-07-17', 'Good Outcome', 'Good Improvement', 'None', 'None', 'Ashita Raveendran', 10, 0, 0, NULL, NULL, 22, 'Submit', '2021-07-22'),
(64, 80, NULL, '', '', '0000-00-00', NULL, 0, '', '', '', NULL, '', '0000-00-00', '0000-00-00', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-07-23'),
(65, 88, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec', 'adf/3333/sad-223qw,dfas', '2021-08-01', 100000, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 10000, 'conference hall, NCERT.', '2021-08-10', '2021-08-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra eget dolor ac sagittis. Ut vel porta elit, at blandit orci. Donec sit amet sapien pretium, porttitor leo et, faucibus ligula. Integer id risus suscipit, ornare dui non, accumsan ante. Ut blandit neque nec lorem finibus bibendum. Etiam a lorem nisi. Mauris ornare sapien sed massa accumsan, nec tempor diam pretium. Quisque non metus ut leo luctus ultrices at et est. Mauris nec metus scelerisque, tincidunt felis sit amet, gravida turpis. Maecenas a scelerisque elit, facilisis pretium urna. Morbi a lorem auctor, gravida neque a, tristique lectus. Maecenas egestas porttitor vulputate.', 3, 2, 1, NULL, NULL, 22, 'Submit', '2021-08-16'),
(66, 89, NULL, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', '0\'kol!@;\"Lp\'', '2021-09-14', 30, 7, 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 20, 'asd', '2021-09-22', '2021-09-25', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 2, 1, 1, NULL, NULL, 22, 'Submit', '2021-09-16'),
(67, 94, NULL, 'asdf', '0dsf', '2021-08-13', 25333, 3, 'q', 'q', 'q', 28, 'sd', '2021-08-22', '2021-08-23', 'q', 'q', 'q', 'q', 'q', 5, 4, 4, NULL, NULL, 22, 'Submit', '2021-08-17'),
(70, 95, NULL, '', '', '0000-00-00', 0, NULL, '', '', '', 23, '', '0000-00-00', '0000-00-00', '', '', '', '', '', 5, 7, 8, 0, 7, NULL, 'Pending', '2021-08-24'),
(71, 97, NULL, 'asd', 'adf/3333/sad-223qw,dfas', '2021-09-17', 1234, 3, '2', 'w', 'w', 6, '12', '2021-09-23', '2021-10-01', 'w', 'w', 'w', 'w', 'w', 2, 1, 1, 1, 1, 22, 'Submit', '2021-09-15'),
(72, 98, NULL, '3', '3', '2021-09-08', 4, 1, 'q', 'q', 'q', 6, 'fr', '2021-09-22', '2021-09-25', 'q', 'q', 'q', 'q', 'q', 2, 1, 1, 1, 1, 22, 'Submit', '2021-09-15'),
(73, 105, NULL, 'a', 'a', '2021-10-30', 1, 5, 's', 's', 's', 16, 's', '2021-10-27', '2021-11-04', 's', 's', 's', 's', 's\r\ne', 12, 1, 1, 1, 11, 22, 'Submit', '2021-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `acr_category`
--

CREATE TABLE `acr_category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acr_category`
--

INSERT INTO `acr_category` (`id`, `name`, `status`) VALUES
(1, 'SC', 'Active'),
(2, 'ST', 'Active'),
(7, 'General', 'Active'),
(8, 'Women', 'Active'),
(9, 'Special needs', 'Active'),
(10, 'Minority', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `acr_expenditure`
--

CREATE TABLE `acr_expenditure` (
  `id` int(11) NOT NULL,
  `acr_id` int(11) NOT NULL,
  `participants_category` varchar(100) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `ta` int(11) DEFAULT NULL,
  `da` int(11) DEFAULT NULL,
  `honorarium` int(11) DEFAULT NULL,
  `total_expenditure` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acr_expenditure`
--

INSERT INTO `acr_expenditure` (`id`, `acr_id`, `participants_category`, `number`, `ta`, `da`, `honorarium`, `total_expenditure`) VALUES
(1, 56, '1', 3, 100, NULL, 100, 300),
(2, 56, '2', 3, 100, NULL, 50, 200),
(3, 57, '1', 1, 1, NULL, 1, 3),
(4, 57, '2', 1, 1, NULL, 1, 3),
(7, 59, '1', NULL, NULL, NULL, NULL, NULL),
(8, 59, '2', NULL, NULL, NULL, NULL, NULL),
(9, 60, '1', 10, 24568, NULL, 12548, 37241),
(10, 60, '2', 2, 12, NULL, 10, 27),
(11, 61, '1', NULL, NULL, NULL, NULL, NULL),
(12, 61, '2', NULL, NULL, NULL, NULL, NULL),
(13, 62, '1', NULL, NULL, NULL, NULL, NULL),
(14, 62, '2', NULL, NULL, NULL, NULL, NULL),
(15, 63, '1', 5, 5, NULL, 5, 15),
(16, 63, '2', 5, 5, NULL, 5, 15),
(17, 64, '1', NULL, NULL, NULL, NULL, NULL),
(18, 64, '2', NULL, NULL, NULL, NULL, NULL),
(19, 65, '1', 2, 200, NULL, 200, 600),
(20, 65, '2', 1, 100, NULL, 100, 300),
(21, 66, '1', 1, 1, NULL, 1, 3),
(22, 66, '2', 1, 1, NULL, 1, 3),
(23, 67, '1', 2, 2, NULL, 2, 8),
(24, 67, '2', 3, 4, NULL, 4, 20),
(27, 70, '1', 1, 2, NULL, 3, 5),
(28, 70, '2', 4, 5, NULL, 6, 11),
(29, 71, '1', 1, 1, NULL, 1, 2),
(30, 71, '2', 1, 1, NULL, 1, 2),
(31, 72, '1', 1, 1, NULL, 1, 2),
(32, 72, '2', 1, 1, NULL, 1, 2),
(33, 73, '1', 11, 1, NULL, 1, 2),
(34, 73, '2', 1, 1, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `acr_image`
--

CREATE TABLE `acr_image` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `acr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acr_image`
--

INSERT INTO `acr_image` (`id`, `name`, `image`, `acr_id`) VALUES
(1, 'sand-stone-zen-believe-pesok-kamni.jpg', 'images/acr_image/\\sand-stone-zen-believe-pesok-kamni.jpg', 56),
(2, 'fTU8Ft.jpg', 'images/acr_image/\\1623471480fTU8Ft.jpg', 57),
(3, 'erro-EODB portal-1.png', 'images/acr_image/\\erro-EODB portal-1.png', 60),
(4, 'pexels-photo-247431.jpeg', 'images/acr_image/\\1626023479pexels-photo-247431.jpeg', 61),
(5, 'Daily-Latest-New-Cool-Whatsapp-Status-Updates-Messages.jpg', 'images/acr_image/\\1626023548Daily-Latest-New-Cool-Whatsapp-Status-Updates-Messag', 60),
(6, 'fTU8Ft.jpg', 'images/acr_image/\\1626023596fTU8Ft.jpg', 62),
(7, 'Daily-Latest-New-Cool-Whatsapp-Status-Updates-Messages.jpg', 'images/acr_image/\\1626023618Daily-Latest-New-Cool-Whatsapp-Status-Updates-Messag', 62),
(8, 'best-of-green-desktop-wallpaper-hd-gallery-9.jpg', 'images/acr_image/\\1626023692best-of-green-desktop-wallpaper-hd-gallery-9.jpg', 62),
(9, 'qwe.jpg', 'images/acr_image/\\qwe.jpg', 62),
(10, 'best-of-green-desktop-wallpaper-hd-gallery-9.jpg', 'images/acr_image/\\1626023852best-of-green-desktop-wallpaper-hd-gallery-9.jpg', 62),
(11, 'sand-stone-zen-believe-pesok-kamni.jpg', 'images/acr_image/\\1626023880sand-stone-zen-believe-pesok-kamni.jpg', 62),
(12, 'best-of-green-desktop-wallpaper-hd-gallery-9-wert-57765-fghffg-ygnhn-67767777.jp', 'images/acr_image/\\best-of-green-desktop-wallpaper-hd-gallery-9-wert-57765-fghffg', 60),
(13, 'BBO2Y58 bb.jpg', 'images/acr_image/\\BBO2Y58 bb.jpg', 60),
(14, 'ncert.jpg', 'images/acr_image/\\ncert.jpg', 64),
(15, '1.PNG', 'images/acr_image/\\1.PNG', 66),
(16, '1.PNG', 'images/acr_image/\\16316985961.PNG', 71),
(17, '2.PNG', 'images/acr_image/\\16351444582.PNG', 73);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `comment`, `user_id`, `time`, `status`) VALUES
(1, 'hi\r\nthis is testing message\r\n', 1, '2021-06-12 12:58:33', 'Active'),
(2, 'test\r\n123', 12, '2021-06-16 07:11:16', 'Active'),
(3, 'a\r\nb\r\nc\r\nd\r\ne\r\nf\r\ng\r\nh', 12, '2021-06-16 07:21:39', 'Active'),
(4, 'Monthly report for the month of July is added for the program District Level Training', 33, '2021-07-09 11:05:37', 'Active'),
(5, 'Hello, this is a  test message.\r\n ', 1, '2021-07-12 08:32:43', 'Active'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in pulvinar libero. Duis sed ante et ipsum molestie tincidunt at quis orci. Donec consequat dui quis dictum laoreet. Integer tempus sapien ut quam convallis dignissim. Duis ullamcorper ac sapien at fringilla. Vivamus interdum arcu mattis urna consequat, at pharetra libero ultricies. Suspendisse tempus hendrerit nulla, nec rhoncus lacus dictum non. Quisque justo nulla, tristique sed turpis et, tempor egestas eros. Donec tellus ante, luctus vitae purus non, vulputate euismod nulla. Sed at dapibus nisl, non cursus diam. Phasellus sagittis tortor vitae odio congue, a mattis odio bibendum. Nulla eleifend mi egestas tellus tincidunt, sed gravida quam tempor. Curabitur euismod posuere nulla nec dignissim.\r\n\r\nInteger pharetra at nisl non molestie. Suspendisse feugiat vestibulum dictum. Nunc id vestibulum orci. Maecenas dolor urna, molestie eu congue malesuada, tempor sit amet elit. Duis elementum nibh leo, et lacinia erat portt', 1, '2021-07-12 11:06:47', 'Active'),
(7, '<script1>alert(document.domain)</script>', 52, '2021-09-21 11:16:39', 'Active'),
(8, '<h1>HTML INJECTION by manish</h1>', 52, '2021-09-21 11:17:18', 'Active'),
(9, '<1>alert(1)</script>', 1, '2021-09-22 06:24:38', 'Active'),
(10, 'http://e0fdsbh88arcg9a6fm0qc4dc53btzi.burpcollaborator.net', 1, '2021-09-22 06:25:51', 'Active'),
(11, '<h1w>HTML INJECTION by manish</h1>', 1, '2021-09-22 06:56:07', 'Active'),
(12, '<script1>alert(document.domain)</script>', 1, '2021-09-22 06:57:55', 'Active'),
(13, '<style1>*{color:red}</style>', 1, '2021-09-22 06:59:17', 'Active'),
(14, '<h11as>HTML-INJECTION</h1>', 50, '2021-09-27 08:21:33', 'Active'),
(15, '<script1>alert(document.domain)</script>', 50, '2021-09-27 08:23:35', 'Active'),
(16, '<1>*{color:green}</style1>1', 50, '2021-09-27 08:25:03', 'Active'),
(17, '<style1>*{color:green}</style>', 50, '2021-09-27 08:25:35', 'Active'),
(18, '<1>*{color:green}</style>', 50, '2021-09-27 08:41:14', 'Active'),
(19, '<1>*{color:red}</style>', 50, '2021-09-27 08:47:42', 'Active'),
(20, '<h111HTML-INJECTION</h1>', 51, '2021-09-27 09:18:02', 'Active'),
(21, '<1>alert(document.domain)</script>', 51, '2021-09-27 09:19:39', 'Active'),
(22, '<1>*{color:red}</style>', 51, '2021-09-27 09:24:09', 'Active'),
(23, '<h11HTML-INJECTION</h1>', 52, '2021-09-27 10:02:40', 'Active'),
(24, 'csrf', 52, '2021-09-27 10:42:56', 'Active'),
(25, '<1>alert(document.domain)</script>', 52, '2021-09-27 10:45:20', 'Active'),
(26, '<1>*{color:red}</style>', 52, '2021-09-27 10:52:23', 'Active'),
(27, '<1>alert(document.domain)</script>', 53, '2021-09-27 11:01:44', 'Active'),
(28, '<1>html injection</h1>', 53, '2021-09-27 11:02:54', 'Active'),
(29, '<1>*{color:red}</style>', 53, '2021-09-27 11:05:47', 'Active'),
(30, 'h', 1, '2021-10-22 10:17:35', 'Active'),
(31, '&lt;h1&gt;asd&lt;/h1&gt;', 1, '2021-10-22 10:27:24', 'Active'),
(32, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', 1, '2021-10-22 10:28:05', 'Active'),
(33, '&lt;style&gt;*{color:red}&lt;/style&gt;', 1, '2021-11-09 11:09:19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `completed_or_not`
--

CREATE TABLE `completed_or_not` (
  `sno` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_or_not`
--

INSERT INTO `completed_or_not` (`sno`, `value`, `status`) VALUES
(1, 'Completed', 'Active'),
(2, 'Not Completed', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(25) DEFAULT NULL,
  `dept_pac_code` int(11) DEFAULT NULL,
  `status` varchar(12) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `short_name`, `dept_pac_code`, `status`) VALUES
(1, 'NCERT', 'NCERT', NULL, 'Active'),
(2, 'Department of Elementary Education', 'DEE', 1, 'Active'),
(3, 'Department of Education in Languages', 'DEL', 2, 'Active'),
(4, 'Department of Education of Group with Special Needs', 'DEGSN', 3, 'Active'),
(5, 'Department of Gender Studies', 'DGS', 4, 'Active'),
(6, 'Department of Education in Social Sciences', 'DESS', 5, 'Active'),
(7, 'Department of Education in Science and Mathematics', 'DESM', 6, 'Active'),
(8, 'Department of Curriculum Studies', 'DCS', 7, 'Active'),
(9, 'Department of Education in Arts and Aesthetics', 'DEAA', 8, 'Active'),
(10, 'Division of Educational Kits', 'DEK', 9, 'Active'),
(11, 'Department of Education Psychology and Foundations of Education', 'DEPFE', 10, 'Active'),
(12, 'Division of Educational Research', 'DER', 11, 'Active'),
(13, 'Department of Teacher Education', 'DTE', 12, 'Active'),
(14, 'Educational Survey Division', 'ESD', 13, 'Active'),
(15, 'International Relations Division', 'IRD', 14, 'Active'),
(16, 'Library and Documentation Division', 'LDD', 15, 'Active'),
(17, 'Planning and Monitoring Division', 'PMD', 16, 'Active'),
(18, 'Curriculum Group', 'CG', 17, 'Active'),
(19, 'Central Institute of Educational Technology', 'CIET', 20, 'Active'),
(20, 'Pandit Sunderlal Sharma Central Institute of Vocational Education, Bhopal', 'PSSCIVE, Bhopal', 21, 'Active'),
(21, 'Regional Institute of Education, Ajmer', 'RIE, Ajmer', 22, 'Active'),
(22, 'Regional Institute of Education, Bhopal', 'RIE, Bhopal', 23, 'Active'),
(23, 'Regional Institute of Education, Bhubaneswar', 'RIE, Bhubaneswar', 24, 'Active'),
(24, 'Regional Institute of Education, Mysuru', 'RIE, Mysuru', 25, 'Active'),
(25, 'North-East Regional Institute of Education, Umiam (Meghalaya)', 'NERIE, Umiam (Meghalaya)', 26, 'Active'),
(29, '&lt;script&gt;alert(document.domain)&lt;/script&gt; k', '&lt;script&gt;alert(docum', 30, 'Active'),
(30, '<h1>HTML-INJECTION-man</h1>', 'none', 51, 'Active'),
(31, '&lt;style&gt; *{color:red}&lt;/style&gt;', 'null', 10, 'Active'),
(32, '{{7*7}}', 'asdf', 52, 'Active'),
(33, '&lt;h1&gt;AJAY&lt;/h1&gt;', 'af', 33, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `desig`, `status`) VALUES
(1, 'Professor', 'Active'),
(2, 'Associate Professor', 'Active'),
(3, 'Assistant Professor', 'Active'),
(4, 'Any Other', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `yearly_status` int(11) DEFAULT NULL,
  `final_status` int(11) DEFAULT NULL,
  `fin_year_start` int(11) NOT NULL,
  `fin_year_end` int(11) NOT NULL,
  `budget_allocated` bigint(20) DEFAULT NULL,
  `budget_utilized` bigint(20) DEFAULT NULL,
  `chk1` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`id`, `project_id`, `yearly_status`, `final_status`, `fin_year_start`, `fin_year_end`, `budget_allocated`, `budget_utilized`, `chk1`) VALUES
(1, 1, 1, 1, 2020, 21, 100000, 123, 'Done'),
(2, 2, 1, 2, 2021, 22, 100000, 214, 'Done'),
(3, 1, 2, 4, 2021, 22, 5000, 100, 'Pending'),
(4, 3, 1, 2, 2021, 22, 123123, 500, 'Done'),
(5, 4, 6, 2, 2021, 22, 1111, 1, 'Done'),
(6, 5, 6, 2, 2021, 22, 1111, 1, 'Done'),
(7, 6, 1, NULL, 2022, 23, 100000, NULL, 'Pending'),
(8, 7, 1, 2, 2021, 22, 111111111, 11, 'Done'),
(9, 8, 1, 2, 2021, 22, 1, NULL, 'Done'),
(10, 9, 1, 2, 2021, 22, 1824730, 158530, 'Done'),
(11, 10, 1, 2, 2021, 22, 873730, 164073, 'Done'),
(12, 11, 6, 2, 2021, 22, 477730, 20, 'Done'),
(13, 12, 1, 2, 2021, 22, 462825, 29242, 'Done'),
(14, 13, 6, 2, 2021, 22, 533960, 46033, 'Done'),
(15, 14, 1, 2, 2021, 22, 100000, 28, 'Done'),
(16, 3, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(17, 5, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(18, 2, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(19, 4, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(20, 7, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(21, 8, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(22, 9, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(23, 10, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(24, 11, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(25, 12, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(26, 13, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(27, 14, 2, NULL, 2022, 23, 100000, NULL, 'Pending'),
(28, 15, 1, NULL, 2022, 23, 200000, NULL, 'Pending'),
(29, 16, 1, NULL, 2022, 23, 2222, NULL, 'Pending'),
(30, 17, 6, NULL, 2021, 22, 123123, 23, 'Pending'),
(31, 18, 1, NULL, 2021, 22, 10, 10, 'Pending'),
(32, 30, 1, NULL, 2021, 22, 1000, NULL, 'Pending'),
(33, 31, 1, NULL, 2021, 22, 1, 1, 'Pending'),
(34, 32, 6, NULL, 2021, 22, 111, 1, 'Pending'),
(35, 33, 6, NULL, 2021, 22, 111, 1, 'Pending'),
(36, 34, 6, NULL, 2021, 22, 111, 1, 'Pending'),
(37, 35, 1, NULL, 2021, 22, 12, 19, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `focus_area`
--

CREATE TABLE `focus_area` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `focus_area`
--

INSERT INTO `focus_area` (`id`, `name`, `status`) VALUES
(1, 'Research', 'Active'),
(2, 'Training', 'Active'),
(3, 'Conference', 'Active'),
(4, 'Seminar', 'Active'),
(5, 'Science', 'Active'),
(6, 'Language', 'Active'),
(7, 'Social Science', 'Active'),
(8, 'Examination reforms', 'Active'),
(9, 'Evaluation', 'Active'),
(10, 'Text Books', 'Active'),
(11, 'Gender/Girls', 'Active'),
(12, 'Higher order thinking analysis', 'Active'),
(13, 'ECCE – Foundational Literacy and Numeracy', 'Active'),
(14, 'ICT', 'Active'),
(15, 'Teacher Education', 'Active'),
(16, 'Curriculum', 'Active'),
(17, 'Audio – Video', 'Active'),
(18, 'E- Content', 'Active'),
(19, 'Vocational', 'Active'),
(20, 'Adult Education', 'Active'),
(21, 'Mathematics', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `forget_attempt`
--

CREATE TABLE `forget_attempt` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_attempt`
--

INSERT INTO `forget_attempt` (`id`, `ip`, `email`, `timestamp`) VALUES
(1, '::1', 'ajayverma018@gmail.com', '2021-10-29 09:04:41'),
(2, '::1', 'ajayverma018@gmail.com', '2021-10-29 09:04:58'),
(3, '::1', '', '2021-10-29 09:06:34'),
(4, '::1', 'abc@123.com', '2021-10-29 09:07:35'),
(5, '::1', 'abc@123.com', '2021-10-29 09:07:44'),
(6, '::1', 'y@w', '2021-10-29 09:08:07'),
(7, '::1', 'y@w.cc', '2021-10-29 09:08:11'),
(8, '::1', 'y@w.cc', '2021-10-29 09:08:11'),
(9, '::1', 'a4ak31@gmail.com', '2021-10-29 09:08:28'),
(10, '::1', 'a4ak31@gmail.com', '2021-10-29 09:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `india_state`
--

CREATE TABLE `india_state` (
  `state_id` int(11) NOT NULL,
  `state` varchar(25) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `india_state`
--

INSERT INTO `india_state` (`state_id`, `state`, `status`) VALUES
(1, 'Andaman & Nicobar', 'Active'),
(2, 'Andhra Pradesh', 'Active'),
(3, 'Arunachal Pradesh', 'Active'),
(4, 'Assam', 'Active'),
(5, 'Bihar', 'Active'),
(6, 'Chandigarh', 'Active'),
(7, 'Chhattisgarh', 'Active'),
(8, 'Dadra Nagar Haveli', 'Active'),
(9, 'Daman & Diu', 'Active'),
(10, 'Delhi', 'Active'),
(11, 'Goa', 'Active'),
(12, 'Gujarat', 'Active'),
(13, 'Haryana', 'Active'),
(14, 'Himachal Pradesh', 'Active'),
(15, 'Jammu & Kashmir', 'Active'),
(16, 'Jharkhand', 'Active'),
(17, 'Karnataka', 'Active'),
(18, 'Kerala', 'Active'),
(19, 'Ladakh', 'Active'),
(20, 'Lakshadweep', 'Active'),
(21, 'Madhya Pradesh', 'Active'),
(22, 'Maharashtra', 'Active'),
(23, 'Manipur', 'Active'),
(24, 'Meghalaya', 'Active'),
(25, 'Mizoram', 'Active'),
(26, 'Nagaland', 'Active'),
(27, 'Odisha', 'Active'),
(28, 'Puducherry', 'Active'),
(29, 'Punjab', 'Active'),
(30, 'Rajasthan', 'Active'),
(31, 'Sikkim', 'Active'),
(32, 'Tamil Nadu', 'Active'),
(33, 'Telangana', 'Active'),
(34, 'Tripura', 'Active'),
(35, 'Uttar Pradesh', 'Active'),
(36, 'Uttarakhand', 'Active'),
(37, 'West Bengal', 'Active'),
(38, 'All States', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL,
  `usename` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `attempt` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempt`
--

INSERT INTO `login_attempt` (`id`, `usename`, `ip`, `attempt`, `timestamp`) VALUES
(1, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:07:46'),
(2, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:07:54'),
(3, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:07:58'),
(4, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:08:02'),
(5, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:08:02'),
(6, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:08:07'),
(7, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:08:07'),
(8, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:08:10'),
(9, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:10:51'),
(10, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:24:23'),
(11, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:24:29'),
(12, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:24:33'),
(13, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:24:36'),
(14, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:34:48'),
(15, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:34:48'),
(16, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:34:59'),
(17, 'admin_pmd', '::1', 'Success', '2021-10-29 07:35:03'),
(18, 'admin_pmd', '::1', 'Success', '2021-10-29 07:38:59'),
(19, 'admin_pmd', '::1', 'Success', '2021-10-29 07:38:59'),
(20, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:39:04'),
(21, 'ashita_r', '::1', 'Success', '2021-10-29 07:43:33'),
(22, 'ashita_r', '::1', 'Success', '2021-10-29 07:43:33'),
(23, 'ashita_r', '::1', 'Success', '2021-10-29 07:43:33'),
(24, 'shivangi', '::1', 'Success', '2021-10-29 07:43:45'),
(25, 'admin_pmd', '::1', 'Success', '2021-10-29 07:45:49'),
(26, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:47:05'),
(27, 'admin_pmd', '::1', 'Success', '2021-10-29 07:47:08'),
(28, 'admin_pmd', '::1', 'Success', '2021-10-29 07:47:08'),
(29, 'admin_pmd', '::1', 'Success', '2021-10-29 07:47:11'),
(30, 'admin_pmd', '::1', 'Success', '2021-10-29 07:47:12'),
(31, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:47:15'),
(32, 'admin_pmd', '::1', 'Failure', '2021-10-29 07:47:16'),
(33, 'admin_pmd', '::1', 'Failure', '2021-10-29 08:08:39'),
(34, 'admin_pmd', '::1', 'Failure', '2021-10-29 08:08:39'),
(35, 'admin_pmd', '::1', 'Failure', '2021-10-29 08:08:43'),
(36, 'admin_pmd', '::1', 'Success', '2021-10-29 08:08:46'),
(37, 'admin_pmd', '::1', 'Failure', '2021-10-29 08:08:50'),
(38, 'admin_pmd', '::1', 'Failure', '2021-10-29 08:08:50'),
(39, 'admin_pmd', '::1', 'Success', '2021-10-29 09:56:44'),
(40, 'admin_pmd', '::1', 'Success', '2021-10-29 11:23:14'),
(41, 'admin_pmd', '::1', 'Success', '2021-11-02 05:50:41'),
(42, 'admin_pmd', '::1', 'Success', '2021-11-02 06:29:08'),
(43, 'admin_pmd', '::1', 'Success', '2021-11-02 06:29:08'),
(44, 'admin_pmd', '::1', 'Success', '2021-11-08 05:45:07'),
(45, 'admin_pmd', '::1', 'Success', '2021-11-08 05:49:46'),
(46, 'admin_pmd', '::1', 'Success', '2021-11-08 06:36:52'),
(47, 'admin_pmd', '::1', 'Success', '2021-11-08 07:04:57'),
(48, 'admin_pmd', '::1', 'Success', '2021-11-08 07:05:43'),
(49, 'admin_pmd', '::1', 'Success', '2021-11-08 07:09:08'),
(50, 'admin_pmd', '::1', 'Success', '2021-11-08 07:09:30'),
(51, 'admin_pmd', '::1', 'Success', '2021-11-08 09:10:09'),
(52, 'admin_pmd', '::1', 'Failure', '2021-11-09 08:35:09'),
(53, 'admin_pmd', '::1', 'Failure', '2021-11-09 08:35:21'),
(54, 'admin_pmd', '::1', 'Failure', '2021-11-09 08:35:36'),
(55, 'user2', '::1', 'Success', '2021-11-09 08:36:16'),
(56, 'user2', '::1', 'Success', '2021-11-09 08:38:18'),
(57, 'user2', '::1', 'Success', '2021-11-09 08:40:35'),
(58, 'user2', '::1', 'Success', '2021-11-09 08:47:24'),
(59, 'admin_pmd', '::1', 'Success', '2021-11-09 08:47:37'),
(60, 'admin_pmd', '::1', 'Success', '2021-11-09 08:47:51'),
(61, 'admin_pmd', '::1', 'Success', '2021-11-09 08:55:40'),
(62, 'admin_pmd', '192.168.3.9', 'Success', '2021-11-09 10:49:20'),
(63, 'admin_pmd', '::1', 'Success', '2021-11-09 10:54:55'),
(64, 'admin_pmd', '::1', 'Success', '2021-11-10 05:19:21'),
(65, 'admin_pmd', '::1', 'Success', '2021-11-11 05:25:08'),
(66, 'admin_pmd', '::1', 'Success', '2021-11-11 08:45:59'),
(67, 'user1', '::1', 'Success', '2021-11-11 09:14:30'),
(68, 'user1', '::1', 'Success', '2021-11-11 09:14:30'),
(69, 'user2', '::1', 'Success', '2021-11-11 09:21:48'),
(70, 'user3', '::1', 'Success', '2021-11-11 09:35:25'),
(71, 'user4', '::1', 'Success', '2021-11-11 09:40:05'),
(72, 'user5', '::1', 'Failure', '2021-11-11 09:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_link` varchar(500) NOT NULL DEFAULT '#',
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_link`, `status`) VALUES
(11, 'Add User', 'adduser.php', 'Active'),
(12, 'Edit User', 'user.php', 'Active'),
(13, 'Add Department', 'addDept.php', 'Active'),
(14, 'Edit Department', 'editDept.php', 'Active'),
(15, 'Add Program Coordinator', '#', 'disable'),
(21, 'Register Program', 'registration.php', 'Active'),
(22, 'Edit Program', 'adminedit.php', 'Active'),
(23, 'View Program', 'view.php', 'Active'),
(24, 'Delete Program', '#', 'disable'),
(25, 'Search Program', 'search.php', 'Active'),
(26, 'Archive', 'archive.php', 'Active'),
(31, 'Monthly Report', 'monthlyreport.php', 'Active'),
(32, 'Activity Completion Report (ACR)', 'projectactivity.php', 'Active'),
(33, 'Prime Minister 15 point', '#', 'disable'),
(34, 'Financial Ending Report', 'financialEnding.php', 'Active'),
(41, 'Department Wise', 'deptSummary.php', 'Active'),
(42, 'Year Wise', '#', 'disable'),
(43, 'Final Submit', 'finalsubmit.php', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `sno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`sno`, `name`, `status`) VALUES
(1, 'January', 'Active'),
(2, 'February', 'Active'),
(3, 'March', 'Active'),
(4, 'April', 'Active'),
(5, 'May', 'Active'),
(6, 'June', 'Active'),
(7, 'July', 'Active'),
(8, 'August', 'Active'),
(9, 'September', 'Active'),
(10, 'October', 'Active'),
(11, 'November', 'Active'),
(12, 'December', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `name_prefix`
--

CREATE TABLE `name_prefix` (
  `id` int(11) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `name_prefix`
--

INSERT INTO `name_prefix` (`id`, `prefix`, `status`) VALUES
(1, 'Prof.', 'Active'),
(2, 'Dr.', 'Active'),
(3, 'Mr.', 'Active'),
(4, 'Mrs.', 'Active'),
(5, 'Ms.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `program_level`
--

CREATE TABLE `program_level` (
  `sno` int(11) NOT NULL,
  `level` varchar(12) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_level`
--

INSERT INTO `program_level` (`sno`, `level`, `status`) VALUES
(1, 'State', 'Active'),
(2, 'Region', 'Active'),
(3, 'National', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `program_post`
--

CREATE TABLE `program_post` (
  `sno` int(11) NOT NULL,
  `post` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_post`
--

INSERT INTO `program_post` (`sno`, `post`, `status`) VALUES
(1, 'JPFs', 'Active'),
(2, 'DTP', 'Active'),
(3, 'Computer Typist', 'Active'),
(4, 'Course Administrator', 'Active'),
(5, 'Graphic Designer', 'Active'),
(6, 'Instructional Designer', 'Active'),
(7, 'Graphic Artist (Animator)', 'Active'),
(8, 'Animators (Multimedia)', 'Active'),
(9, 'Content Developer', 'Active'),
(10, 'Content Developer (Academic)', 'Active'),
(11, 'Computer Programmer', 'Active'),
(12, 'System Analyst', 'Active'),
(13, 'Web Developer', 'Active'),
(14, 'Graphic Artists', 'Active'),
(15, 'Project Associate', 'Active'),
(16, 'Visual Analyser', 'Active'),
(17, 'Cameraman', 'Active'),
(18, 'Producer', 'Active'),
(19, 'Network Administrator', 'Active'),
(20, 'Assistant Editor', 'Active'),
(21, 'Lab Assistant', 'Active'),
(22, 'Teachers', 'Active'),
(23, 'Care Giver', 'Active'),
(24, 'Tech Coordinator', 'Active'),
(25, 'Producer Grade-II', 'Active'),
(26, 'Engineer Grade-II', 'Active'),
(27, 'Production Assistant', 'Active'),
(28, 'MTS', 'Active'),
(29, 'Editor', 'Active'),
(30, 'Sound Recordist', 'Active'),
(31, 'Computer Operator', 'Active'),
(32, 'Production Assistant cum Cameraman', 'Active'),
(33, 'Senior Project Associate', 'Active'),
(35, 'Photographer', 'Active'),
(36, 'Programmer', 'Active'),
(37, 'Engineer', 'Active'),
(38, 'Pre-primary Teachers (DMS)', 'Active'),
(39, 'Care givers (DMS)', 'Active'),
(40, 'Lab Assistant (Mechatronics)', 'Active'),
(41, 'DTP Operator', 'Active'),
(42, 'Artist', 'Active'),
(43, 'Web Designer', 'Active'),
(44, 'Software Designer', 'Active'),
(45, 'Animation Artist', 'Active'),
(46, 'Video Editor', 'Active'),
(47, 'Course co-ordinator', 'Active'),
(48, 'Gardner', 'Active'),
(49, 'Mentor', 'Active'),
(50, 'Online Course co-ordinator', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `program_stage`
--

CREATE TABLE `program_stage` (
  `sno` int(11) NOT NULL,
  `stage` varchar(25) DEFAULT NULL,
  `status` varchar(12) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_stage`
--

INSERT INTO `program_stage` (`sno`, `stage`, `status`) VALUES
(1, 'Foundational stage', 'Active'),
(2, 'Primary', 'Active'),
(3, 'Upper Primary', 'Active'),
(4, 'Secondary', 'Active'),
(5, 'Senior secondary', 'Active'),
(6, 'All stages', 'Active'),
(7, 'Not applicable', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `program_status`
--

CREATE TABLE `program_status` (
  `sno` int(11) NOT NULL,
  `type` varchar(12) DEFAULT NULL,
  `status` varchar(12) DEFAULT 'Active',
  `arranging_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_status`
--

INSERT INTO `program_status` (`sno`, `type`, `status`, `arranging_order`) VALUES
(1, 'New', 'Active', 1),
(2, 'Ongoing', 'Active', 3),
(3, 'Carried over', 'Active', 4),
(4, 'Drop', 'Active', 5),
(5, 'Completed', 'Active', 6),
(6, 'New-Regular', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `program_target_group`
--

CREATE TABLE `program_target_group` (
  `sno` int(11) NOT NULL,
  `target_group` varchar(50) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_target_group`
--

INSERT INTO `program_target_group` (`sno`, `target_group`, `status`) VALUES
(1, 'SC', 'Active'),
(2, 'ST', 'Active'),
(3, 'Minorities', 'Active'),
(4, 'Special needs', 'Active'),
(5, 'Transgender', 'Active'),
(6, 'Girls & Women', 'Active'),
(7, 'Out of school children/school dropouts', 'Active'),
(8, 'General', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `program_type`
--

CREATE TABLE `program_type` (
  `sno` int(11) NOT NULL,
  `type` varchar(12) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_type`
--

INSERT INTO `program_type` (`sno`, `type`, `status`) VALUES
(1, 'Research', 'Active'),
(2, 'Development', 'Active'),
(3, 'Training', 'Active'),
(4, 'Extension', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `project_activity`
--

CREATE TABLE `project_activity` (
  `sno` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `activity_name` varchar(1000) DEFAULT NULL,
  `comp_date` date DEFAULT NULL,
  `status_completed` int(11) DEFAULT NULL,
  `obstacles` varchar(1000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `chk1` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_activity`
--

INSERT INTO `project_activity` (`sno`, `project_id`, `activity_name`, `comp_date`, `status_completed`, `obstacles`, `time`, `chk1`) VALUES
(75, 1, 'workshop', '2021-06-15', 1, '', '2021-06-12 03:47:05', 'Pending'),
(76, 1, 'In-house meeting', '2021-06-30', 2, '', '2021-06-12 03:47:05', 'Pending'),
(77, 2, 'workshop', '2021-06-16', 1, '', '2021-06-12 04:13:33', 'Pending'),
(78, 2, 'in house meeting', '2021-06-25', 2, '', '2021-06-12 04:13:33', 'Pending'),
(79, 3, 'qwe', '2021-06-18', 2, '', '2021-06-14 07:46:38', 'Pending'),
(80, 4, 'lk', '2021-06-17', 2, '', '2021-06-16 06:12:06', 'Pending'),
(81, 5, 'q', '2021-01-01', 2, '', '2021-06-16 06:46:06', 'Pending'),
(82, 6, 'Training to teachers', '2021-07-30', 2, '', '2021-07-09 09:46:10', 'Pending'),
(83, 6, 'Preparation of e-content', '2021-08-15', 2, '', '2021-07-09 09:46:10', 'Pending'),
(84, 7, 'q', '2021-01-01', 2, 'lop', '2021-07-11 17:06:56', 'Pending'),
(85, 8, 'visit school', '2021-08-26', 2, '', '2021-08-04 11:15:02', 'Pending'),
(86, 8, 'ajay', '2021-09-11', 2, '', '2021-08-04 11:15:03', 'Pending'),
(87, 8, 'verma', '2021-08-21', 2, '', '2021-08-10 05:40:46', 'Pending'),
(88, 9, 'Consultation meetings', '2021-08-30', 1, 'na', '2021-08-11 06:18:39', 'Pending'),
(89, 10, 'workshop', '2021-09-04', 1, '', '2021-08-11 08:41:39', 'Pending'),
(90, 12, 'visit school', '2021-09-11', 2, 'finance issue', '2021-08-12 09:12:06', 'Pending'),
(91, 13, 'Helping in registration and enrollment of participants and in the conduct of the course', '2021-11-15', 2, '', '2021-08-12 09:19:33', 'Pending'),
(92, 13, 'Running of the course including timely uploading of modules, assignments and allocation of usage rights to participants and mentors', '2021-11-30', 2, '', '2021-08-12 09:19:33', 'Pending'),
(93, 13, 'Responding to the queries, collating feedback and Evaluation of course and report writing', '2021-12-15', 2, '', '2021-08-12 09:19:33', 'Pending'),
(94, 14, 'workshop-1', '2021-08-20', 1, '', '2021-08-16 11:19:28', 'Pending'),
(95, 15, 'e', '2022-06-23', 2, '', '2022-04-18 11:49:39', 'Pending'),
(96, 16, 'q', '2022-04-30', 2, '', '2022-04-18 11:51:06', 'Pending'),
(97, 17, 'w', '2021-09-25', 1, 'none', '2021-09-15 09:31:47', 'Pending'),
(98, 17, 'e', '2021-10-09', 2, '', '2021-09-15 09:31:47', 'Pending'),
(99, 18, 'null', '2021-09-30', 2, 'qwe', '2021-09-21 11:25:36', 'Pending'),
(100, 30, 'act', '2021-12-04', 2, '', '2021-10-21 11:00:02', 'Pending'),
(101, 31, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '2021-10-28', 2, '', '2021-10-21 11:17:23', 'Pending'),
(102, 32, 'q', '2021-10-24', 2, '', '2021-10-22 09:31:15', 'Pending'),
(103, 33, 'q', '2021-10-24', 2, '', '2021-10-22 09:39:05', 'Pending'),
(104, 34, 'q', '2021-10-24', 2, '', '2021-10-22 09:39:30', 'Pending'),
(105, 35, 'gg', '2021-10-15', 2, '', '2021-10-25 05:29:07', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `project_monthly_report`
--

CREATE TABLE `project_monthly_report` (
  `sno` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `fin_year_end` int(11) DEFAULT NULL,
  `budget_utilized` int(11) DEFAULT NULL,
  `progress_till_date` varchar(2000) DEFAULT NULL,
  `chk1` varchar(20) NOT NULL DEFAULT 'Pending',
  `chk2` varchar(20) NOT NULL DEFAULT 'Pending',
  `chk3` varchar(20) NOT NULL DEFAULT 'Pending',
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_monthly_report`
--

INSERT INTO `project_monthly_report` (`sno`, `project_id`, `month`, `fin_year_end`, `budget_utilized`, `progress_till_date`, `chk1`, `chk2`, `chk3`, `time`) VALUES
(1, 1, 6, 21, 2000, '1 workshop', 'Pending', 'Pending', 'Pending', '2021-06-12'),
(2, 2, 6, 22, 200, 'qwe\r\nwe', 'Submit', 'Submit', 'Pending', '2021-06-12'),
(3, 5, 6, 21, NULL, NULL, 'Submit', 'Submit', 'Pending', '2021-06-16'),
(4, 6, 7, 23, 10000, 'Training conducted', 'Pending', 'Pending', 'Pending', '2021-07-09'),
(5, 6, 7, 23, 0, '', 'Pending', 'Pending', 'Pending', '2021-07-09'),
(6, 6, 7, 23, 0, 'asas', 'Pending', 'Pending', 'Pending', '2021-07-09'),
(7, 6, 7, 23, 0, '', 'Pending', 'Pending', 'Pending', '2021-07-09'),
(8, 6, 7, 23, 0, '123', 'Pending', 'Pending', 'Pending', '2021-07-11'),
(9, 7, 7, 22, 11, 'pop', 'Submit', 'Submit', 'Pending', '2021-07-11'),
(10, 4, 7, 22, 1, '01', 'Submit', 'Submit', 'Pending', '2021-07-19'),
(11, 3, 7, 22, 0, '', 'Pending', 'Pending', 'Pending', '2021-07-23'),
(12, 5, 7, 22, 0, '', 'Pending', 'Pending', 'Pending', '2021-07-23'),
(13, 2, 7, 22, 2, 'w', 'Submit', 'Submit', 'Pending', '2021-07-23'),
(14, 8, 8, 22, 33, '', 'Pending', 'Pending', 'Pending', '2021-08-06'),
(15, 3, 8, 22, 0, 'dgf', 'Pending', 'Pending', 'Pending', '2021-08-06'),
(16, 9, 8, 22, 60000, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'Submit', 'Submit', 'Pending', '2021-08-16'),
(17, 12, 8, 22, 111, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'Submit', 'Submit', 'Pending', '2021-08-16'),
(18, 13, 8, 22, 11, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'Submit', 'Submit', 'Pending', '2021-08-16'),
(19, 10, 8, 22, 82000, 'doing testing', 'Submit', 'Submit', 'Pending', '2021-08-16'),
(20, 11, 8, 22, 20, 'na', 'Submit', 'Submit', 'Pending', '2021-08-16'),
(21, 13, 9, 22, 20, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'Submit', 'Pending', 'Pending', '2021-09-16'),
(22, 9, 9, 22, 30, 'Praesent lacinia sed lectus at consectetur. Suspendisse lobortis dignissim suscipit. Ut a vulputate diam, et egestas tellus. Sed dictum erat eu urna placerat mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce leo tellus, porta vitae lobortis in, faucibus id orci. Duis molestie massa at luctus consectetur. Pellentesque urna orci, consequat eget ante eu, fringilla rhoncus urna. Quisque ac elementum tellus.', 'Submit', 'Pending', 'Pending', '2021-09-16'),
(23, 9, 10, 22, 58000, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in porttitor mauris.', 'Submit', 'Submit', 'Pending', '2021-10-18'),
(24, 13, 10, 22, 23001, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in porttitor mauris.', 'Submit', 'Submit', 'Pending', '2021-10-18'),
(25, 12, 10, 22, 29000, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in porttitor mauris.', 'Submit', 'Submit', 'Pending', '2021-10-18'),
(26, 10, 10, 22, 82000, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in porttitor mauris.', 'Submit', 'Submit', 'Pending', '2021-10-18'),
(27, 12, 1, 22, 111, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morb', 'Submit', 'Submit', 'Pending', '2022-01-18'),
(28, 9, 1, 22, 30000, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis eros. Vestibulum eu augue in diam mattis maximus eu pellentesque lorem. Donec viverra sollicitudin purus ac bibendum. Nullam accumsan nec dui in finibus. Praesent orci velit, consequat at eros ac, pharetra fermentum quam. Nunc scelerisque orci et porta mollis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur in porttitor mauris.', 'Submit', 'Submit', 'Pending', '2022-01-18'),
(29, 13, 1, 22, 23000, 'Praesent volutpat nibh id auctor eleifend. Nulla porta enim ultrices, ornare ex laoreet, interdum eros. Ut id tincidunt risus, eget lobortis', 'Submit', 'Submit', 'Pending', '2022-01-18'),
(30, 10, 1, 22, 30, 'year, c.name', 'Submit', 'Submit', 'Pending', '2022-01-18'),
(31, 12, 3, 22, 20, 'jk', 'Submit', 'Submit', 'Pending', '2022-03-18'),
(32, 9, 3, 22, 500, 'kiol', 'Submit', 'Submit', 'Pending', '2022-03-18'),
(33, 13, 3, 22, 1, 'jk', 'Submit', 'Submit', 'Pending', '2022-03-18'),
(34, 10, 3, 22, 23, 'l', 'Submit', 'Submit', 'Pending', '2022-03-18'),
(35, 14, 3, 22, 0, '', 'Pending', 'Pending', 'Pending', '2022-03-18'),
(36, 17, 9, 22, 11, 'sdf', 'Submit', 'Pending', 'Pending', '2021-09-15'),
(37, 9, 4, 24, NULL, NULL, 'Submit', 'Submit', 'Pending', '2021-09-17'),
(38, 30, 2, 21, NULL, NULL, 'Submit', 'Submit', 'Pending', '2021-10-22'),
(39, 35, 10, 22, 3, 'dsfsd\r\ndsa', 'Submit', 'Pending', 'Pending', '2021-10-25'),
(40, 35, 11, 22, 0, '', 'Pending', 'Pending', 'Pending', '2021-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `project_mr_activity`
--

CREATE TABLE `project_mr_activity` (
  `id` int(11) NOT NULL,
  `mr_id` int(11) NOT NULL,
  `activity_title` varchar(1000) DEFAULT NULL,
  `approving_authority` varchar(100) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `till_date` date DEFAULT NULL,
  `venue` varchar(1000) DEFAULT NULL,
  `number_lvl_participants` int(11) DEFAULT NULL,
  `num_lvl_participants` varchar(500) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_mr_activity`
--

INSERT INTO `project_mr_activity` (`id`, `mr_id`, `activity_title`, `approving_authority`, `duration`, `date`, `till_date`, `venue`, `number_lvl_participants`, `num_lvl_participants`, `remarks`) VALUES
(1, 1, 'meeting', 'pac', 1, '2021-06-16', '2021-06-16', 'pmd ncert', 1, 'asst. professor', 'nill'),
(2, 1, 'meeting-2', 'other', 1, '2021-06-17', '2021-06-17', 'ncert', 1, 'programmer', 'N/A'),
(3, 2, 'qwe\'', 'pac', 1, '2021-06-16', '2021-06-16', 'ncert', 1, '122', '31asd'),
(4, 2, 'as', 'other', 2, '2021-06-18', '2021-06-20', 'asd', 2, '3ed', 'd'),
(5, 3, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(6, 4, 'Orientation program.', 'PAC', 2, '2021-07-16', '2021-07-19', 'SCERT, Bhopal', 5, 'Graduate', 'afdf'),
(7, 4, 'asfs', 'gghdf', 10, '2021-07-01', '2021-07-10', 'SCERT, Bhopal', 5, 'Post graduate', 'asdfsdf'),
(8, 9, 'o', 'pac', 3, '2021-07-06', '2021-07-09', '1', 5, '11, phd', ''),
(9, 10, '01', '01', 1, '2021-07-18', '2021-07-19', '01', 1, '01', '01'),
(10, 11, 'qwe', 'pac', 11, '2021-07-01', '2021-07-16', 'qwe\r\ny', 0, '', 'a\r\nb'),
(11, 11, 'q', 'q', 2, '2021-01-01', '2021-01-03', 'ncert', 1, 'q', 'q'),
(12, 14, 'q', 'q', 2, '2021-08-17', '2021-08-19', 'nby', 4, 'e', ''),
(13, 15, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(14, 16, 'wrd', 'PAC', 11, '2021-08-11', '2021-08-22', 'ncert', 1, 'phd', ''),
(15, 18, 'workshop', 'pac', 1, '2021-08-04', '2021-08-05', 'd', 1, 'q', ''),
(16, 18, 'e', 'w', 1, '2021-08-27', '2021-08-31', 's', 1, 'd', ''),
(17, 19, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(18, 20, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(19, 23, 'internal meeting', 'pac', 1, '2021-10-15', '2021-10-16', 'ch', 12, 'pg', ''),
(20, 25, 'a', 'pac', 1, '2021-10-11', '2021-10-11', '1', 1, '1', ''),
(21, 24, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(22, 26, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(23, 30, 'year, c.name', 'pac', 2, '2022-01-05', '2022-01-07', 'pol', 2, 's', 'hj'),
(24, 30, 'hj', 'pac', 1, '2022-01-02', '2022-02-08', 'pmd ncert', 2, '1q', ''),
(25, 34, '', '', 0, '0000-00-00', '0000-00-00', '', 0, '', ''),
(26, 36, 'df', 'sdf', 3, '2021-09-15', '2021-09-18', '3', 3, 'r', ''),
(27, 37, 'qwerty', 'other', 1, '2021-09-18', '2021-09-19', 'pmd ncert', 1, '22ew', ''),
(29, 39, 'dasw', 'asd', 1, '2021-10-26', '2021-10-27', '2', 2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `project_registration`
--

CREATE TABLE `project_registration` (
  `id` int(11) NOT NULL,
  `constituent_unit` int(11) DEFAULT NULL,
  `pac_code` varchar(20) DEFAULT NULL,
  `year` varchar(11) DEFAULT NULL,
  `year_end` varchar(11) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `proj_coord` varchar(200) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `focus_area` varchar(500) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `budget_allocated` bigint(11) DEFAULT NULL,
  `budget_utilized` bigint(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `target_group` int(11) DEFAULT NULL,
  `stage` int(11) DEFAULT NULL,
  `objective` varchar(2000) DEFAULT NULL,
  `methodology` varchar(2000) DEFAULT NULL,
  `tools` varchar(2000) DEFAULT NULL,
  `collaborating_agencies` varchar(2000) DEFAULT NULL,
  `dissemination` varchar(2000) DEFAULT NULL,
  `report_submit` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_registration`
--

INSERT INTO `project_registration` (`id`, `constituent_unit`, `pac_code`, `year`, `year_end`, `title`, `proj_coord`, `state`, `focus_area`, `type`, `status`, `budget_allocated`, `budget_utilized`, `level`, `target_group`, `stage`, `objective`, `methodology`, `tools`, `collaborating_agencies`, `dissemination`, `report_submit`, `time`) VALUES
(1, 17, '20116D01', NULL, NULL, 'MIS web application development', '12', 38, '0,14,19', 2, 4, NULL, NULL, 3, 8, 1, 'To develop an MIS application.\r\nTrack record of monthly reports of every department.', 'Develop an web application', 'using predefined forms\r\nusing analysis s/w', 'NCERT\r\nCIET', 'generates reports\r\nanalysis of reports\r\nusing s/w', 2, '2021-06-12 03:47:05'),
(2, 17, '21116R01', NULL, NULL, 'Demo program', '12', 38, '0,20,17', 1, 2, NULL, NULL, 3, 8, 1, 'cover all state\r\nresearch', 'wateerfall\r\nrad', 'dreamwevwer\r\napache\r\nqwerty', 'ncert\r\nciet', 'reports\r\nand', 1, '2021-06-12 04:13:33'),
(3, 17, '21116R02', '2021', '22', 'test', '17', 38, '0,17', 1, 2, 123123, NULL, 1, 1, 1, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 1, '2021-06-14 07:46:38'),
(4, 17, '21116D03', NULL, NULL, 'testing of changes', '17', 12, '0,3', 2, 2, NULL, NULL, 2, 7, 6, 'lk', 'lk', 'lk', 'lk', 'lk', 1, '2021-06-16 06:12:06'),
(5, 17, '21116R04', '2021', '22', 'qwerty', '22', 38, '0,17', 1, 2, 1111, 1, 1, 1, 1, 'Qwerty', 'q', 'q', 'q', 'q', 1, '2021-06-16 06:46:05'),
(6, 14, '22113R03', '2020', '23', 'District Level Survey', '20', 2, '0,18,14', 1, 1, 100000, NULL, 3, 8, 6, 'Preparation of e-content for improving the ICT in schools', 'Research and training', 'ICT tools', 'NIC', 'Publish on NCERT web site', 2, '2021-07-09 09:46:10'),
(7, 17, '21216D05', NULL, NULL, 'qwqw', '17', 1, '0,17', 2, 2, NULL, NULL, 1, 1, 1, 'q', 'q', 'q', 'q', 'q', 1, '2021-07-11 17:06:55'),
(8, 17, '21116R06', '2021', '22', 'mis web application', '17', 38, '0,20', 1, 2, 1, NULL, 2, 3, 2, 'qwe', 'q', 'q', 'q', 'g', 1, '2021-08-04 11:15:02'),
(9, 24, '21125R01', '2022', '23', 'Sustainable Development Goals (SDG) 4.7: Policies and Practices in School Education Objectives', '38', 38, '0,1,15', 1, 2, 100000, NULL, 3, 8, 7, 'The study intends to\r\n Analyse the extent to which (i) global citizenship and (ii) education for sustainable development,\r\nincluding gender equality and human rights, are mainstreamed at all levels in: national/state\r\neducation policies and curricula in school education;  Examine the curricular practices related to GCED & ESD implemented in the schools', 'The study will use the method of document analysis while examining the policies and curricula at the\r\nnational and state level for achieving the target of SDG 4.7. More specifically, the research team will\r\nstudy the currently binding official delineations of the intended curriculum that refer to or deal with\r\nlearning goals and content related to sustainable development, civic and citizenship education as well as\r\nto the much newer concept of global citizenship education (GCED). The national curriculum and\r\ncurricula of the States in the area of sustainable development, sustainable lifestyles, human rights, gender\r\nequality, peace and non-violence, global citizenship and cultural diversity will be analysed.\r\nA structured questionnaire developed shall be sent to the States for collecting information\r\nregarding the key elements of GCED and ESD existing in their policies and curricula and school\r\npractices. A framework for analysis shall be developed on the basis of which, the policies and\r\ncurricula shall be analysed. A consultation meet will be conducted with the state representatives\r\nthat will help in setting a detailed state wise report on how GCED and ESD mainstream and the\r\nmeasures taken for attaining the target SDG 4.7. The status shall be interpreted by the priority\r\nand emphasis given to the implementation of GCED and ESD in policies, curricula, in-service\r\nteacher training and student assessments, i.e., on the basis of existence, frequency, priority and\r\nscope of implementation. This may not provide us complete picture on whether the measures\r\ntaken at national/State level lead to desired changes in the learning. Hence taking a sample of\r\nfive states from five regions of the country, case studies will be conducted on some curricular\r\npractices based on SDG 4.7 at school level. The classroom transaction and the curricular\r\npractices adopted as a ‘whole school’ approach, assessment practices will also be considered for\r\nanalysis. Beyond the mere ‘existence’ ', 'The following tools shall be used for the study.  Questionnaire for the state representatives and Questionnaire, interview schedule, focus group\r\ndiscussion for teachers and students will be used to study the curricular practices  Progress: The tools have been reviewed and finalized and is in the process of mailing the same to the\r\nstate officials.', 'NCERT, Constituents units, SCERTs ', 'Report', 1, '2021-08-11 06:18:39'),
(10, 24, '21125D02', '2021', '22', 'Management Information System (MIS) for the PAC/PAB Programmes of the NCERT constituent units', '41', 38, '0,18,9,14,1', 2, 2, 873730, NULL, 3, 8, 7, 'To develop MIS for the PAC/PAB approved projects of NCERT\r\n To monitor the progress of PAC/PAB approved programmes of the NCERT Constituent Units', 'The web portal is getting ready. The validation is in process. Organisation and entry of the data\r\nfrom the various materials will be done with the help of computer programmer and typists.', 'web application', 'ncert', 'report', 1, '2021-08-11 08:13:53'),
(11, 24, '21125D03', '2021', '22', 'Preparation of Annual Reports and NCERT’s Newsletter', '41', 38, '0,10', 2, 2, 477730, NULL, 3, 8, 7, 'The following are the objectives of the programme:  To prepare the Annual Report of NCERT for 2020-21;  To develop contents of NCERT activities for use in the Annual Report of MoE; and\r\n To prepare NCERT’s Newsletter for highlighting the major achievements of the Council.\r\nकौशल,', ' Material will be collected from NCERT constituents to edit and prepare the first draft of\r\nAnnual Report.  First draft will be sent back to respective constituents for final correction.  Corrected material will be finalized for publication.  Material for MoE Annual Report will be collected from NCERT constituents.  Edited material duly approved by the Director, NCERT will be submitted to MoE for\r\ninclusion in the Annual Report of MoE.  NCERT’s Newsletter will be prepared after collecting information from all the constituent\r\nUnits of the Council.', 'na', 'ncert', 'newsleter', 1, '2021-08-11 08:37:19'),
(12, 24, '21125T04', NULL, NULL, 'Training of DIET Faculty in Project Planning, Implementation, Monitoring and Evaluation', '40', 38, '0', 3, 2, NULL, NULL, 3, 8, 7, ' To build the capacity of the DIET faculty in the area of project planning.  To provide inputs in developing strategies for implementing the projects according to the\r\nobjectives of the programmes.  To acquaint DIET faculty with project evaluation techniques.\r\n', ' Training package ‘Educational project planning, implementation, monitoring and evaluation’\r\ndeveloped by PMD will be updated in a workshop and used for the training programme.  The trainees will be assigned a task to prepare a good project on Project Planning,\r\nImplementation, Monitoring, and Evaluation', 'Various kinds of programmes being conducted in DIETs will be taken up as examples for\r\ndiscussion in the training programme.', 'NCERTSCERT/DIETs', 'Various kinds of programmes being conducted', 1, '2021-08-12 09:12:06'),
(13, 24, '21125T05', NULL, NULL, 'Online Course (Blended) on Instructional Strategies for Mathematics and Statistics in Economics', '38', 38, '0,3', 3, 2, NULL, NULL, 3, 8, 7, ' To run the online course (blended mode) on Instructional Strategies for Mathematics and\r\nStatistics in Economics  To acquaint the Economics teachers in innovative and interactive methods of teaching learning of\r\nmathematical and statistical tools and its applications in Economics  To strengthen the capacity of Economics teachers in effectively transacting mathematical and\r\nstatistical processes used in economics\r\n', 'The course will be organized in blended mode (face-to-face and online) for equipping teachers\r\nand other stake holders.\r\n281\r\n Running the online (blended mode) course on Instructional Strategies for Mathematics\r\nand Statistics in Economics.  Enriching &Updating the course.', 'The online course is being piloted for post graduate teachers in economics. The six\r\nmonths online course modules based on four quadrants of MOOCs, i.e., the e-text, the\r\nassessment quadrants and the video lectures have been developed which have been disseminated.\r\nThe online course was launched in the month of November 2020. The course will be finalized on\r\nthe basis of the feedback received and evaluation of the course by July 2021. The upcoming\r\ncourses will run using the materials (four quadrants) which shall be updated from time to time.', 'All the Constituent Units of\r\nNCERT', 'training', 1, '2021-08-12 09:19:33'),
(14, 24, '21125R06', NULL, NULL, 'xyz', '41', 38, '0,17,3,16', 1, 2, NULL, NULL, 1, 8, 4, 'asd sdf', 'asd sdf', 'asd sdf', 'asd sdf', 'report', 1, '2021-08-16 11:19:27'),
(15, 24, '22225R01', NULL, NULL, 'teest', '41', 2, '0,17', 1, 1, NULL, NULL, 1, 1, 1, 'e', 'e', 'e', 'e', 'f', 2, '2022-04-18 11:49:39'),
(16, 24, '22125D02', NULL, NULL, 'title123', '41', 2, '0,17', 2, 1, NULL, NULL, 1, 2, 4, 'q', 'q', 'q', 'q', 'q', 2, '2022-04-18 11:51:06'),
(17, 3, '21202D01', NULL, NULL, 'qwerty', '48', 9, '0,17', 2, 6, NULL, NULL, 1, 2, 3, 'qw', 'qwe', 'q', 'wq', 'y', 2, '2021-09-15 09:31:47'),
(18, 2, '21101R01', NULL, NULL, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '21', 10, '0,18', 1, 1, 10, 10, 1, 8, 5, 'testing by manish', '&quot;&gt;&lt;script&gt;alert(&#039;new&#039;)&lt;/script&gt;', '2', '3', 'null', 1, '2021-09-21 11:25:35'),
(23, 17, '21116R05', NULL, NULL, 'qwerty.21.10.21', '23', 10, '0,20', 1, 1, NULL, NULL, 1, 2, 6, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', 2, '2021-10-21 10:05:47'),
(30, 2, '21101R02', NULL, NULL, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '21', 10, '0,17,3,16', 1, 1, 1000, NULL, 1, 2, 6, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', 2, '2021-10-21 11:00:02'),
(31, 3, '21102D02', NULL, NULL, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '48', 15, '0,17', 2, 1, NULL, NULL, 2, 2, 2, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', '&lt;script&gt;alert(document.domain)&lt;/script&gt;', 2, '2021-10-21 11:17:23'),
(32, 10, '21109E01', NULL, NULL, 'sfad', '65', 9, '0,20,17,3', 4, 6, NULL, NULL, 1, 2, 2, 'q', 'q', 'q', 'q', 'q', 2, '2021-10-22 09:31:14'),
(33, 10, '21109E02', NULL, NULL, 'sfad', '65', 9, '0,20,17,3', 4, 6, NULL, NULL, 1, 2, 2, 'q', 'q', 'q', 'q', 'q', 2, '2021-10-22 09:39:05'),
(34, 10, '21109E03', NULL, NULL, 'sfad', '65', 9, '0,20,17,3', 4, 6, NULL, NULL, 1, 2, 2, 'q', 'q', 'q', 'q', 'q', 2, '2021-10-22 09:39:30'),
(35, 13, '21112D01', NULL, NULL, 'fgd', '51', 10, '0,20,17', 2, 1, NULL, NULL, 1, 6, 6, 'ghj', 'ghj', 'ghj', 'ghj', 'dd', 2, '2021-10-25 05:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_senc_post`
--

CREATE TABLE `project_senc_post` (
  `sno` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `post` int(11) DEFAULT NULL,
  `senc_post_num` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `expenditure` int(11) DEFAULT NULL,
  `expenditure_used` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_senc_post`
--

INSERT INTO `project_senc_post` (`sno`, `project_id`, `post`, `senc_post_num`, `duration`, `expenditure`, `expenditure_used`, `time`) VALUES
(18, 0, 11, 1, 6, 180000, 11, '2021-01-05 09:31:45'),
(19, 0, 33, 1, 6, 180000, 11, '2021-01-05 09:31:45'),
(20, 72, 14, 2, 2, 2, 1, '2021-02-03 06:22:43'),
(22, 73, 4, 1, 1, 11, 0, '2021-03-09 05:01:24'),
(23, 73, 5, 1, 1, 1, 0, '2021-03-09 05:01:24'),
(24, 74, 17, 1, 1, 1, 0, '2021-03-09 05:03:30'),
(25, 70, 26, 2, 1, 0, 1, '2021-03-15 08:07:04'),
(27, 77, 11, 1, 6, 29000, 29000, '2021-03-15 10:14:05'),
(28, 78, 23, 2, 2, 2, 0, '2021-03-17 09:21:19'),
(29, 78, 2, 12, 1, 1, 0, '2021-03-17 09:21:19'),
(30, 79, 31, 1, 12, 120000, 24000, '2021-03-17 10:19:32'),
(31, 79, 1, 2, 12, 240000, 0, '2021-03-17 10:19:32'),
(32, 80, 4, 1, 11, 4, 2, '2021-03-17 11:07:14'),
(33, 81, 26, 11, 11, 11, 0, '2021-03-17 11:10:20'),
(34, 81, 5, 2, 2, 2, 0, '2021-03-17 11:10:20'),
(35, 82, 11, 1, 11, 319000, 0, '2021-03-18 05:40:03'),
(36, 70, 3, 2, 8, 0, 1, '2021-03-18 18:35:31'),
(37, 85, 11, 1, 6, 1000000, 2000, '2021-03-19 09:46:19'),
(38, 86, 4, 3, 3, 3, 3, '2021-03-19 10:06:40'),
(39, 72, 10, 2, 2, 2, 2, '2021-03-20 13:01:48'),
(40, 88, 17, 1, 1, 10000, 1000, '2021-03-23 19:27:57'),
(41, 89, 2, 1, 3, 10000, 0, '2021-03-24 06:42:17'),
(42, 92, 9, 1, 3, 10000, 22, '2021-03-24 06:45:27'),
(43, 93, 11, 1, 12, 348000, 174000, '2021-03-25 09:48:52'),
(44, 93, 33, 1, 12, 360000, 180000, '2021-03-25 09:48:52'),
(45, 94, 41, 1, 1, 1, 1, '2021-03-26 05:40:46'),
(46, 94, 10, 1, 1, 1, 1, '2021-03-26 05:40:47'),
(47, 95, 45, 1, 1, 1000, 1000, '2021-04-09 07:36:54'),
(48, 95, 42, 1, 1, 1000, 1000, '2021-04-09 07:36:54'),
(49, 96, 20, 1, 1, 1000, 5000, '2020-04-09 07:50:15'),
(50, 97, 45, 0, 0, 0, 0, '2021-04-22 11:24:25'),
(51, 98, 45, 0, 0, 0, 0, '2021-04-22 11:28:34'),
(52, 99, 4, 1, 1, 1, 1, '2021-04-22 11:30:20'),
(53, 99, 8, 2, 2, 2, 2, '2021-04-22 11:33:39'),
(54, 100, 45, 0, 0, 0, 0, '2021-04-22 11:42:49'),
(55, 101, 45, 0, 0, 0, 0, '2021-04-22 11:43:42'),
(56, 102, 39, 1, 11, 100, 0, '2021-05-02 10:18:11'),
(57, 102, 8, 2, 1, 1, 1, '2021-05-02 10:18:12'),
(58, 103, 31, 1, 10, 20000, 10, '2021-05-25 05:03:59'),
(59, 103, 33, 1, 10, 20000, 10, '2021-05-25 05:03:59'),
(60, 104, 17, 1, 1, 10000, 0, '2021-05-25 05:06:49'),
(61, 105, 45, 2, 1, 1, 10, '2021-05-25 05:11:16'),
(62, 106, 45, 1, 1, 1, 2, '2021-05-25 05:16:32'),
(63, 1, 11, 1, 6, 6000, 1000, '2021-06-12 03:47:05'),
(64, 1, 33, 1, 6, 6000, 1000, '2021-06-12 03:47:05'),
(65, 2, 29, 1, 1, 500, 2, '2021-06-12 04:13:33'),
(66, 2, 23, 1, 1, 400, 2, '2021-06-12 04:13:33'),
(67, 3, 20, 1, 11, 11111, 0, '2021-06-14 07:46:38'),
(68, 4, 4, 1, 11, 11, 1, '2021-06-16 06:12:06'),
(69, 5, 45, 1, 1, 1, 0, '2021-06-16 06:46:06'),
(70, 6, 11, 1, 12, 1200000, 0, '2021-07-09 09:46:10'),
(71, 7, 45, 1, 1, 1, 11, '2021-07-11 17:06:56'),
(72, 8, 41, 1, 1, 1, 1, '2021-08-04 11:15:03'),
(73, 8, 29, 1, 1, 1, 1, '2021-08-04 11:15:03'),
(74, 9, 1, 2, 11, 572000, 500, '2021-08-11 06:18:39'),
(75, 10, 11, 1, 11, 319000, 23, '2021-08-11 08:13:53'),
(76, 10, 33, 1, 11, 330000, 23, '2021-08-11 08:13:53'),
(77, 10, 3, 1, 11, 253000, 23, '2021-08-11 08:13:53'),
(78, 11, 3, 1, 11, 200000, 10, '2021-08-11 08:37:19'),
(79, 11, 2, 1, 11, 200000, 10, '2021-08-11 08:37:19'),
(80, 12, 4, 1, 11, 22222, 20, '2021-08-12 09:12:06'),
(81, 13, 1, 1, 11, 252522, 1, '2021-08-12 09:19:34'),
(82, 14, 2, 1, 11, 12000, 0, '2021-08-16 11:19:28'),
(83, 15, 29, 1, 1, 40000, 0, '2022-04-18 11:49:39'),
(84, 16, 47, 1, 1, 1, 0, '2022-04-18 11:51:06'),
(85, 17, 11, 3, 3, 33333, 11, '2021-09-15 09:31:47'),
(86, 18, 42, 3, 5, 5, 3, '2021-09-21 11:25:36'),
(87, 30, 10, 2, 12, 12, 10, '2021-10-21 11:00:02'),
(88, 31, 17, 1, 1, 1, 1, '2021-10-21 11:17:23'),
(89, 32, 4, 1, 1, 1, 1, '2021-10-22 09:31:15'),
(90, 33, 4, 1, 1, 1, 1, '2021-10-22 09:39:05'),
(91, 34, 4, 1, 1, 1, 1, '2021-10-22 09:39:30'),
(92, 35, 2, 1, 1, 1, 0, '2021-10-25 05:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `p_indicators`
--

CREATE TABLE `p_indicators` (
  `sno` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `per_indi` varchar(2000) DEFAULT NULL,
  `exp_month` int(11) DEFAULT NULL,
  `completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_indicators`
--

INSERT INTO `p_indicators` (`sno`, `pid`, `per_indi`, `exp_month`, `completed`) VALUES
(1, 8, 'qw\r\ndd\r\nhh', 1, 2),
(3, 8, 'a', 10, 1),
(4, 8, 'b', 11, 3),
(5, 8, 'c', 10, 3),
(7, 9, 'Supporting in the dissemination of tools &\r\norganization of consultation meetings', 8, 1),
(8, 9, 'Field Work – Data Collection (Online) ', 12, 1),
(9, 9, 'Coding and Analysis of Data and supporting in\r\nreport writing', 1, 1),
(10, 10, 'Collection and entry of information on PAC/PAB approved projects of NCERT', 3, 3),
(11, 11, 'Collection and editing of the material received from NCERT for the Annual Report of\r\nNCERT', 8, 3),
(12, 11, 'Collection and editing of the material for MoE Annual report', 12, 3),
(13, 11, 'Collection and editing of the material for NCERT’s Newsletter', 10, 3),
(14, 12, 'A workshop for updating the training package ', 5, 2),
(15, 12, 'Training of DIET Faculty –', 2, 3),
(16, 13, 'Conduct sessions on online mode', 3, 2),
(17, 13, 'Face-to face/Virtual interaction with trainees', 4, 2),
(18, 13, 'Review workshop for the finalization of the course', 6, 2),
(19, 13, 'Counduct of the online course- September2021', 8, 1),
(20, 13, 'Face- to- face/Virtual training for five days', 9, 2),
(21, 13, 'Face- to- face/ Virtual interaction with trainees', 11, 3),
(22, 13, 'Updating/Enrichment of the Module July 2021', 12, 3),
(23, 14, 'workshop', 10, 3),
(24, 15, 'e', 11, 3),
(25, 17, 'q', 8, 3),
(26, 17, 'w', 11, 3),
(29, 31, '&lt;script&gt;alert(document.domain)&lt;/script&gt;', 2, 3),
(30, 32, 'q', 3, 2),
(31, 32, 'q', 3, 3),
(32, 33, 'q', 3, 2),
(33, 33, 'q', 3, 3),
(34, 34, 'q', 3, 2),
(35, 34, 'q', 3, 3),
(36, 35, 'ss', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `p_status`
--

CREATE TABLE `p_status` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_status`
--

INSERT INTO `p_status` (`sno`, `name`, `status`) VALUES
(1, 'Completed within time', 'Active'),
(2, 'Completed after time', 'Active'),
(3, 'Not completed', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `State` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `State`) VALUES
(1, 'Andaman & Nicobar'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chhattisgarh'),
(8, 'Dadra Nagar Haveli'),
(9, 'Daman & Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu & Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Ladakh'),
(20, 'Lakshadweep'),
(21, 'Madhya Pradesh'),
(22, 'Maharashtra'),
(23, 'Manipur'),
(24, 'Meghalaya'),
(25, 'Mizoram'),
(26, 'Nagaland'),
(27, 'Odisha'),
(28, 'Puducherry'),
(29, 'Punjab'),
(30, 'Rajasthan'),
(31, 'Sikkim'),
(32, 'Tamil Nadu'),
(33, 'Telangana'),
(34, 'Tripura'),
(35, 'Uttar Pradesh'),
(36, 'Uttarakhand'),
(37, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `previous_pass` varchar(100) DEFAULT NULL,
  `f_p_reset` tinyint(1) NOT NULL DEFAULT 1,
  `utype` int(2) NOT NULL,
  `name_prefix` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dept` int(11) NOT NULL,
  `designation` int(11) DEFAULT NULL,
  `desig_other` varchar(50) DEFAULT NULL,
  `contact` double DEFAULT NULL,
  `dept_code` int(11) DEFAULT NULL,
  `head_dept` int(11) NOT NULL,
  `head_dept_code` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `menu_ref_id` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `upass`, `previous_pass`, `f_p_reset`, `utype`, `name_prefix`, `first_name`, `last_name`, `dept`, `designation`, `desig_other`, `contact`, `dept_code`, `head_dept`, `head_dept_code`, `email`, `menu_ref_id`, `status`, `token`) VALUES
(1, 'admin_pmd', '1316101d276f1f89899a85cdab66329e', 'd1a1f7b8950aa1eba43a2d7dd0bd0a1d', 0, 0, 3, 'test', 'test', 1, 4, 'test1', 8368467673, NULL, 1, NULL, 'xilonax337@aethiops.com', '0,11,12,13,14,15,21,22,23,24,25,26,33,34,41,42', 'Active', 'LbnY7'),
(12, 'ashita', '2cabfb6f76bbb6177c43e8a3597a7f48', NULL, 0, 2, 2, 'ashita', 'raveendran', 17, 2, '', 9898989898, NULL, 1, NULL, 'ashitancert@gmail.com', '0,23,31,32', 'Active', NULL),
(14, 'srinivas', '1316101d276f1f89899a85cdab66329e', NULL, 1, 2, 3, 'nl', 'srinivas', 11, 4, 'Sr System Analyst', 1111111111, NULL, 1, NULL, 'nls_vas@yahoo.com', '0,11,12', 'Active', NULL),
(16, 'ajayverma', 'e2026058f86e855d24b74c229b6ba1a9', NULL, 1, 2, 3, 'Ajay', 'Verma', 20, 4, 'programer', 9868716380, NULL, 1, NULL, 'ajayverma018@gmail.com', '0,23,31,32', 'Active', NULL),
(17, 'susan', '2b04db29831d961ef8a4efd8c128a5d3', NULL, 0, 1, 5, 'susan', 'sukanya', 17, 4, 'Sr project associate', 8989898989, NULL, 1, NULL, 'susansukanya@gmail.com', '0,23,31,32,43', 'Active', NULL),
(18, 'sonu', '371ab955fdc11c44c980779c3135b155', NULL, 1, 1, 3, 'sonu', 'kumar', 20, 1, '', 9868716380, NULL, 1, NULL, 'a4ak31@gmail.com', '0,23,31,32,43', 'Active', NULL),
(19, 'nitesh', '388c6df5ce99c934d9c5f0bf29d758e4', NULL, 1, 2, 3, 'nitesh', 'aggarwal', 18, 1, '', 9898989898, NULL, 1, NULL, 'nitesh@gmail.com', '0,23,31,32', 'Active', NULL),
(20, 'nlsvas', 'd4395a5856617fa4afe8c5cd2eed3912', NULL, 0, 2, 3, 'NL', 'Srinivas', 14, 4, 'SSA', 9650218899, NULL, 1, NULL, 'nls_vas@yahoo.com', '0,23,31,32', 'Active', NULL),
(21, 'sri123', 'ca349f428e66b84e317016fee5d520e9', NULL, 1, 1, 2, 'Sri', 'vas', 2, 1, '', 9868434148, NULL, 1, NULL, 'nls_vas@yahoo.com', '0,23,31,32,43', 'Active', NULL),
(22, 'aditya', '057829fa5a65fc1ace408f490be486ac', NULL, 0, 2, 3, 'aditya', 'ranjan', 17, 1, '', 9717286907, NULL, 1, NULL, 'aadimlnc@gmail.com', '0,23,31,32', 'Active', NULL),
(23, 'ashitaR', 'cb3fa6f68a3906bf51227611ffbce4a6', NULL, 0, 1, 2, 'Ashita', 'Raveendran', 17, 2, '', 9895012345, NULL, 1, NULL, 'ashita.raveendran@ncert.nic.in', '0,23,31,32,43', 'Active', NULL),
(24, 'sonuk', '371ab955fdc11c44c980779c3135b155', NULL, 1, 4, 3, 'Sonu', 'Kumar', 19, 4, 'external', 1231231231, NULL, 1, NULL, 'a4ak31@gmail.com', '0,41,42', 'Active', NULL),
(25, 'shivangi', '01f4411323d24331e61bee714d77c169', NULL, 0, 4, 5, 'Shivangi', 'Singh', 17, 4, 'Course Coordinator', 1234567898, NULL, 1, NULL, 'xyz@xyz.com', '0,23,41,42', 'Active', NULL),
(26, 'verma', '3a0e5755c7d35e770c5fa735f60b15ca', NULL, 0, 3, 3, 'Sonu', 'verma', 17, 1, '', 9868716380, NULL, 1, NULL, 'a4ak31@gmail.com', '0,23,31,32', 'Active', NULL),
(27, 'admisdf', '56d536efafd1f763d4ca6525e920a354', NULL, 1, 2, 2, 'sdfa', 'sdf', 15, 2, '', 1231231234, NULL, 1, NULL, 'asdf.dfg_r@asdf.uu', '0,23,31,32', 'Active', NULL),
(28, 'aakash', '1e10e58d45f41ef7e0b3c3bb687d2c76', NULL, 0, 2, 3, 'Aakash', 'Kumar', 19, 2, '', 8965412663, NULL, 1, NULL, 'aakash@gmail.com', '0,23,31,32', 'Active', NULL),
(29, 'alok', 'bad220c335d0c1f53548f6acdb17e265', NULL, 1, 1, 3, 'alok', 'kumar', 19, 1, '', 4569874589, NULL, 1, NULL, 'alok@gmail.com', '0,23,31,32,43', 'Active', NULL),
(30, 'atulkumar', '9763d3de0df49d64fcba1835d7457ce1', NULL, 0, 3, 3, 'Atul', 'Srivastava', 14, 4, 'Programmer', 9811237047, NULL, 1, NULL, 'katul24@yahoo.com', '0,23,31,32', 'Active', NULL),
(31, 'xyz123', 'a130870ccaa6bb8f250dcbec777ed7df', NULL, 1, 3, 2, 'FARMAN', 'ALI', 18, 2, '', 8787878787, NULL, 1, NULL, 'xyz@gmail.com', '0,23,31,32', 'Active', NULL),
(32, 'abc123', 'bd468870e94d9962d110ac746a870bcb', NULL, 0, 4, 3, 'abc', 'de', 19, 1, '', 7866554987, NULL, 1, NULL, 'abc@123.com', '0,23,41', 'Active', NULL),
(33, 'nlsvas1973', '2887ec8b01f6859f15e605c615de3876', NULL, 0, 3, 3, 'NL', 'Srinivas', 14, 4, 'SSA', 9868474743, NULL, 1, NULL, 'nlsvas1973@gmail.com', '0,23,31,32,43', 'Active', NULL),
(34, 'jkl123', 'dcfbbb688fd92187f02071d265ad047a', NULL, 1, 2, 3, 'Jkl', 'Mn', 16, 2, '', 1478965230, NULL, 1, NULL, 'jkl@gmail.com', '0,23,31,32', 'Active', NULL),
(35, 'rkp123', 'bd5c68f3cb568a1fad15ed3d50872f4e', NULL, 1, 2, 3, 'rkp', 'rkp', 15, 1, '', 9876543210, NULL, 1, NULL, 'rkp@123.com', '0,23,31,32', 'Active', NULL),
(36, 'rmz123', '8f10e7618f13c4c64e2500a3463e2cba', NULL, 1, 2, 2, 'RMZ', 'ALM', 15, 3, '', 7894561230, NULL, 1, NULL, 'rmz@gmail.com', '0,23,31,32', 'Active', NULL),
(37, 'indrani', '9e7b959d020234767263b3581f84ef68', NULL, 0, 1, 1, 'Indrani', 'Bhaduri', 14, 1, '', 1234567890, NULL, 1, NULL, 'indrani@abc.in', '0,23,31,32,43', 'Active', NULL),
(38, 'shivangi_s', '01f4411323d24331e61bee714d77c169', NULL, 0, 2, 5, 'Shivangi', 'Singh', 24, 1, '', 9874563210, NULL, 1, NULL, 'shivangi@gmail.com', '0,23,31,32', 'Active', NULL),
(39, 'ajay_v', '2b2af08c09f1de8e69377c03dfb7e794', NULL, 0, 2, 3, 'Ajay', 'Verma', 24, 2, '', 9865478512, NULL, 1, NULL, 'ajay@gmail.com', '0,23,31,32', 'Active', NULL),
(40, 'susan_s', '2b04db29831d961ef8a4efd8c128a5d3', NULL, 0, 2, 5, 'Susan', 'Sukanya', 24, 3, '', 9856741258, NULL, 1, NULL, 'susan@gmail.com', '0,23,31,32', 'Active', NULL),
(41, 'ashita_r', '2cabfb6f76bbb6177c43e8a3597a7f48', NULL, 0, 1, 4, 'Ashita', 'Ravinderan', 24, 1, '', 7878787878, NULL, 1, NULL, 'ashita@gmail.com', '0,23,31,32,43', 'Active', NULL),
(42, 'tripti_s', '93849be2f2999bcd6c37ddb303c584c8', NULL, 0, 3, 3, 'Tripti', 'Sherawat', 24, 4, 'Section Officer', 3232323145, NULL, 1, NULL, 'tripti@gmail.com', '0,23,31,32', 'Active', NULL),
(43, 'test_t', '9a7664316b1f7fafb8f71389c531695f', NULL, 1, 4, 2, 'test', 'a', 15, 2, '', 1111111110, NULL, 1, NULL, 'test@gmail.com', '0,23,41', 'Active', NULL),
(44, 'ppp+p', 'e6fe26dd3cc4b28694cc2f7e4c3bb543', NULL, 1, 2, 3, 'pppppppppppppp', 'p', 16, 3, '', 7777777877, NULL, 1, NULL, 'pp@pp.com', '0,23,31,32', 'Active', NULL),
(45, 'qq_q', 'a8225dd86724618e6dc4b0feb2ef3bbe', NULL, 1, 3, 3, 'qqqq', 'qq', 15, 2, '', 4444444444, NULL, 1, NULL, 'qq@cc.cc', '0,23,31,32', 'Active', NULL),
(46, 'aditya_r', 'ffedb97acbbff450ba139a67120f13d3', NULL, 1, 4, 3, 'aadityaa', 'ranjan', 24, 4, 'jpf', 5656789764, NULL, 1, NULL, 'aditya@gmail.com', '0,23,41', 'Active', NULL),
(47, 'gumnish_k', 'f125d04de624fa512c974009f886ab1e', NULL, 1, 4, 3, 'gumnish', 'kumar', 24, 1, '', 9869869869, NULL, 1, NULL, 'gumnish@gmail.com', '0,23,41', 'Active', NULL),
(48, 'qwerty', 'b4f86c635ed8c810cbe199e23401c02b', NULL, 0, 2, 2, 'qwe', 'qwe', 3, 1, '', 1231231232, NULL, 1, NULL, 'qwerty@qwe.cc', '0,23,31,32', 'Active', NULL),
(49, 'vikrant', '2da3a17786aa99996c817e117d3a1a08', NULL, 0, 1, 2, 'vikrant', 'kumar', 14, 1, '', 9999999999, NULL, 1, NULL, 'vikrant@gmail.com', '0,23,31,32,43', 'Active', NULL),
(50, 'user1', 'b4f86c635ed8c810cbe199e23401c02b', NULL, 0, 4, 3, 'Sunil-CSRF', 'Yadav', 13, 4, 'MTS', 8076843799, NULL, 1, NULL, 'sy13021989@gmail.com', '0,23,41', 'Active', 'NlhlV'),
(51, 'user2', 'b4f86c635ed8c810cbe199e23401c02b', NULL, 0, 2, 3, 'csrf', 'Subhash', 13, 2, '', 8787878789, NULL, 1, NULL, 'subhaspd99@gmail.com', '0,23,31,32', 'Active', 'QcoVp'),
(52, 'user3', 'b4f86c635ed8c810cbe199e23401c02b', NULL, 0, 1, 2, 'scriptalertdocumentdomainscript', 'Raveendran', 13, 4, '<script>alert(document.domain)</script>', 6666666666, NULL, 1, NULL, 'ajayverma018@yahoo.com', '0,23,31,32,43', 'Active', 'wFc6J'),
(53, 'user4', 'b4f86c635ed8c810cbe199e23401c02b', NULL, 0, 3, 3, 'Vijay', 'Kumar', 13, 4, 'Section Officer', 3232323232, NULL, 1, NULL, 'ppmedncert@gmail.com', '0,23,31,32', 'Active', 'LVWlv'),
(54, 'eth_man', '43219d1d7a54c87f575fe7a4e86b4075', NULL, 0, 1, 3, 'Confirm', 'Confirm', 30, 4, 'Account Takeover', 8368438713, NULL, 1, NULL, 'jr.mayank1999@gmail.com', '0,23,31,32,43', 'Active', NULL),
(55, 'anoopsingh2807', '3b73672008529ffba852a65c9d5b9a97', NULL, 0, 1, 2, 'scriptalert1script', 'singh', 19, 1, '', 8826100326, NULL, 1, NULL, 'anupkumar0425@gmail.com', '0,23,31,32,43', 'Active', NULL),
(56, 'un9nplayer', 'f53f8899f5673cde68edef15d75a2f62', NULL, 0, 1, 3, 'Mayank', 'sharma', 18, 4, 'Account Takeover', 8368438713, NULL, 1, NULL, 'jr.mayank1999@gmail.com', '0,23,24,25,28,20,36,31,32,43', 'Active', NULL),
(57, 'un9n', '2fead2ce50b1bb1d45a82c78f0df9e23', NULL, 1, 4, 3, 'mayank', 'sharma', 18, 1, '', 8368438710, NULL, 1, NULL, 'xiyawoh135@tmednews.com', '0,23,41', 'Active', NULL),
(58, 'test', '3fe5294464468f96b2b67c7f14edb452', NULL, 0, 4, 3, 'mayank', 'sharma', 18, 1, '', 8368438718, NULL, 1, NULL, 'vohes43444@vefblogg.com', '0,11,12,13,14,23,41', 'Active', NULL),
(59, 'test2', 'aa83b2673566fdc76078ef23e98fd349', NULL, 1, 4, 3, 'mayank', 'sharma', 8, 4, 'Test', 8368438715, NULL, 1, NULL, 'likike5889@tmednews.com', '0,11,12,13,14,23,41', 'Active', NULL),
(60, 'test4', '3fe5294464468f96b2b67c7f14edb452', NULL, 0, 4, 3, 'Mayank', 'sharma', 8, 1, '', 8368487456, NULL, 1, NULL, 'yacekow309@aethiops.com', '0,11,12,13,14,23,41', 'Active', NULL),
(61, 'tiwan17899', '3fe5294464468f96b2b67c7f14edb452', NULL, 0, 1, 2, 'department', 'head', 8, 4, 'Test', 1234567897, NULL, 1, NULL, 'tiwan17899@cantouri.com', '0,23,31,32,43', 'Active', NULL),
(62, 'test5', '3fe5294464468f96b2b67c7f14edb452', NULL, 0, 4, 3, 'test', 'test', 18, 4, 'test', 8368467673, NULL, 1, NULL, 'xilonax337@aethiops.com', '0,11,12,13,14,23,41', 'Active', NULL),
(63, 'asdsss', '6f370c8c7109534c3d5c394123a477d7', NULL, 1, 1, 2, 'asd', 'asd', 17, 4, '&lt;script&gt;alert(document.domain)&lt;/script&gt', 1212121212, NULL, 1, NULL, 'asd@asd.asd', '0,23,31,32,43', 'Active', NULL),
(64, 'ssss', '67b587616031ee8e892e9418558406ed', NULL, 1, 2, 3, 'sss', 'ssss', 17, 2, '', 3333333333, NULL, 1, NULL, 'ss@ss.ss', '0,23,31,32', 'Active', NULL),
(65, 'dddd', 'dd81b28dcdf010d95a55d55e6bf1bd1e', NULL, 0, 1, 3, 'dd', 'dd', 10, 4, '&lt;script&gt;alert(document.domain)&lt;/script&gt', 4444444422, NULL, 1, NULL, 'dd@dd.dd', '0,23,31,32,43', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `role`, `status`) VALUES
(0, 'Admin', 'null'),
(1, 'Department Head', 'Active'),
(2, 'Program Coordinator', 'Active'),
(3, 'Assistant Program Coordinator', 'Active'),
(4, 'View User', 'Active'),
(5, 'Custom User', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `yes_no`
--

CREATE TABLE `yes_no` (
  `sno` int(11) NOT NULL,
  `choose` varchar(10) DEFAULT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yes_no`
--

INSERT INTO `yes_no` (`sno`, `choose`, `status`) VALUES
(1, 'Yes', 'Active'),
(2, 'No', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acr`
--
ALTER TABLE `acr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_key2` (`mr_activity_id`);

--
-- Indexes for table `acr_category`
--
ALTER TABLE `acr_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acr_expenditure`
--
ALTER TABLE `acr_expenditure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_key` (`acr_id`) USING BTREE;

--
-- Indexes for table `acr_image`
--
ALTER TABLE `acr_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_key3` (`acr_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_or_not`
--
ALTER TABLE `completed_or_not`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `focus_area`
--
ALTER TABLE `focus_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_attempt`
--
ALTER TABLE `forget_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `india_state`
--
ALTER TABLE `india_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `menu_name` (`menu_name`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `name_prefix`
--
ALTER TABLE `name_prefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_level`
--
ALTER TABLE `program_level`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `program_post`
--
ALTER TABLE `program_post`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `program_stage`
--
ALTER TABLE `program_stage`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `program_status`
--
ALTER TABLE `program_status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `program_target_group`
--
ALTER TABLE `program_target_group`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `program_type`
--
ALTER TABLE `program_type`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `project_activity`
--
ALTER TABLE `project_activity`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `project_monthly_report`
--
ALTER TABLE `project_monthly_report`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `project_mr_activity`
--
ALTER TABLE `project_mr_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_registration`
--
ALTER TABLE `project_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`pac_code`);

--
-- Indexes for table `project_senc_post`
--
ALTER TABLE `project_senc_post`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `p_indicators`
--
ALTER TABLE `p_indicators`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `p_status`
--
ALTER TABLE `p_status`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yes_no`
--
ALTER TABLE `yes_no`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acr`
--
ALTER TABLE `acr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `acr_category`
--
ALTER TABLE `acr_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `acr_expenditure`
--
ALTER TABLE `acr_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `acr_image`
--
ALTER TABLE `acr_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `completed_or_not`
--
ALTER TABLE `completed_or_not`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `focus_area`
--
ALTER TABLE `focus_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `forget_attempt`
--
ALTER TABLE `forget_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `india_state`
--
ALTER TABLE `india_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `login_attempt`
--
ALTER TABLE `login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `name_prefix`
--
ALTER TABLE `name_prefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_post`
--
ALTER TABLE `program_post`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `program_stage`
--
ALTER TABLE `program_stage`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program_status`
--
ALTER TABLE `program_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_activity`
--
ALTER TABLE `project_activity`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `project_monthly_report`
--
ALTER TABLE `project_monthly_report`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `project_mr_activity`
--
ALTER TABLE `project_mr_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project_registration`
--
ALTER TABLE `project_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `project_senc_post`
--
ALTER TABLE `project_senc_post`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `p_indicators`
--
ALTER TABLE `p_indicators`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `p_status`
--
ALTER TABLE `p_status`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acr`
--
ALTER TABLE `acr`
  ADD CONSTRAINT `f_key2` FOREIGN KEY (`mr_activity_id`) REFERENCES `project_activity` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `acr_expenditure`
--
ALTER TABLE `acr_expenditure`
  ADD CONSTRAINT `f_key1` FOREIGN KEY (`acr_id`) REFERENCES `acr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `acr_image`
--
ALTER TABLE `acr_image`
  ADD CONSTRAINT `f_key3` FOREIGN KEY (`acr_id`) REFERENCES `acr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
