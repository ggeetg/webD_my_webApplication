-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 08:56 AM
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
(25, 'North-East Regional Institute of Education, Umiam (Meghalaya)', 'NERIE, Umiam (Meghalaya)', 26, 'Active');

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
(39, 38, 2, NULL, 2022, 23, 14275000, 1, 'Pending'),
(40, 39, 1, NULL, 2022, 23, 8540000, 1, 'Pending'),
(41, 40, 1, NULL, 2022, 23, 250000000, 1, 'Pending'),
(42, 41, 1, NULL, 2022, 23, 2062265000, 1, 'Pending'),
(43, 42, 2, NULL, 2022, 23, 76000000, 1, 'Pending'),
(44, 45, 2, NULL, 2022, 23, 85000000, 1, 'Pending'),
(45, 46, 1, NULL, 2022, 23, 66730000, 1, 'Pending'),
(46, 47, 2, NULL, 2022, 23, 12725000, 1, 'Pending'),
(47, 48, 2, NULL, 2022, 23, 5000000, 1, 'Pending'),
(48, 49, 1, NULL, 2022, 23, 11164060, 1, 'Pending'),
(49, 50, 1, NULL, 2022, 23, 7100000, 1, 'Pending'),
(50, 51, 1, NULL, 2022, 23, 8850000, 1, 'Pending'),
(51, 52, 1, NULL, 2022, 23, 1500000, 1, 'Pending'),
(52, 53, 2, NULL, 2022, 23, 680000, 1, 'Pending'),
(53, 55, 1, NULL, 2022, 23, 11, 11, 'Pending'),
(54, 56, 1, NULL, 2022, 23, 11, 11, 'Pending'),
(55, 57, 2, NULL, 2022, 23, 1340000, 1, 'Pending'),
(56, 58, 2, NULL, 2022, 22, 4586000, 1, 'Pending'),
(57, 59, 1, NULL, 2022, 23, 22000000, 1, 'Pending'),
(58, 60, 1, NULL, 2022, 23, 27608000, 1, 'Pending'),
(59, 61, 1, NULL, 2022, 23, 471000000, 1, 'Pending');

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
(237, 'admin_pmd', '::1', 'Success', '2022-02-28 05:00:05'),
(238, 'admin_pmd', '192.168.3.8', 'Success', '2022-02-28 05:22:01'),
(239, 'admin_pmd', '202.141.18.2', 'Success', '2022-02-28 05:56:43'),
(240, 'admin_pmd', '192.168.3.8', 'Success', '2022-02-28 06:25:51'),
(241, 'admin_pmd', '192.168.3.8', 'Success', '2022-02-28 09:22:13'),
(242, 'admin_pmd', '192.168.3.8', 'Success', '2022-02-28 11:32:41'),
(243, 'admin_pmd', '192.168.2.200', 'Success', '2022-03-02 06:10:42'),
(244, 'admin_pmd', '192.168.2.200', 'Success', '2022-03-02 07:33:02'),
(245, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-03 04:39:00'),
(246, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-03 05:57:48'),
(247, 'admin_pmd', '::1', 'Success', '2022-03-03 08:25:36'),
(248, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-03 09:18:51'),
(249, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-03 10:04:21'),
(250, 'admin_pmd', '::1', 'Success', '2022-03-03 10:42:41'),
(251, 'admin_pmd', '::1', 'Success', '2022-03-04 04:28:38'),
(252, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-04 04:59:42'),
(253, 'admin_pmd', '::1', 'Success', '2022-03-04 05:14:24'),
(254, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-04 09:13:38'),
(255, 'admin_pmd', '192.168.2.35', 'Success', '2022-03-04 10:16:03'),
(256, 'admin_pmd', '192.168.2.176', 'Success', '2022-03-09 05:18:49'),
(257, 'admin_pmd', '::1', 'Success', '2022-03-09 05:41:50'),
(258, 'admin_pmd', '192.168.2.176', 'Success', '2022-03-09 06:07:36'),
(259, 'admin_pmd', '192.168.2.176', 'Success', '2022-03-09 06:48:58'),
(260, 'admin_pmd', '192.168.2.176', 'Success', '2022-03-09 07:18:06'),
(261, 'admin_pmd', '192.168.2.176', 'Failure', '2022-03-09 10:24:52'),
(262, 'admin_pmd', '192.168.2.176', 'Success', '2022-03-09 10:25:55'),
(263, 'admin_pmd', '::1', 'Success', '2022-03-21 04:41:48'),
(264, 'admin_pmd', '192.168.2.177', 'Success', '2022-03-21 04:55:43');

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
(107, 38, 'National Level Jury meeting for selection of awardees for the year 2020 and 2021 - September 2022', '2022-09-22', 2, 'NA', '2022-02-28 05:38:28', 'Pending'),
(108, 38, 'Awards ceremony for National ICT Award for school teachers for the years 2020 &amp; 2021- October-November 2022.', '2022-10-01', 2, 'NA', '2022-02-28 05:38:28', 'Pending'),
(109, 38, 'Awards ceremony for National ICT Award for Teacher Educators and States/UTs for the year 2021- October-November, 2022.', '2022-10-01', 2, 'NA', '2022-02-28 05:38:28', 'Pending'),
(110, 39, 'Notification in the dailies and printing of brochures for the festival and ICT Mela, October 2022', '2023-10-01', 2, 'NA', '2022-02-28 06:38:36', 'Pending'),
(111, 39, 'Organisation of audio-video festival February, 2023', '2023-02-01', 2, 'NA', '2022-02-28 06:38:37', 'Pending'),
(112, 39, 'Organisation of ICT Mela by February, 2023', '2023-02-01', 2, 'NA', '2022-02-28 06:38:37', 'Pending'),
(113, 39, 'Participation of coordination meetings of various States/UTs (SIETs) committees by January 2023', '2023-01-01', 2, 'NA', '2022-02-28 06:38:37', 'Pending'),
(114, 40, 'i.	Meetings and workshops with various stake holders like States, UTs, State Boards, CBSE, KVS, NVS, NIOS, SCERTs, RIEs, SIEs etc. will be organized for maximum involvement', '2023-01-01', 2, 'na', '2022-02-28 06:46:01', 'Pending'),
(115, 41, 'Development &amp;onboarding of Virtual Labs Content (including simulations) on DIKSHA', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(116, 41, 'Workshops for SRGs for eContent development and dissemination', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(117, 41, 'Workshops for SRGs for digitization of print materials', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(118, 41, 'Workshops for SRGs to develop QR coded textbooks and integrate eContent with QR codes in Textbooks', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(119, 41, 'Workshops for up gradation of digital platforms and mobile apps', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(120, 41, 'Workshops for e-resource mapping and development of metadata', '2022-04-01', 2, 'NA', '2022-02-28 09:44:46', 'Pending'),
(121, 42, 'x', '2022-02-01', 2, 'na', '2022-02-28 11:22:04', 'Pending'),
(122, 45, 'X', '2022-03-02', 2, 'NA', '2022-03-02 06:27:07', 'Pending'),
(123, 46, 'A planning meeting (in-house) of experts will be organized to finalize a theme for Rashtriya Avishkar Saptah - 2022', '2022-03-01', 2, 'NA', '2022-03-02 07:05:59', 'Pending'),
(124, 46, 'Appropriate activities/study/research (for Secondary and Sr. Secondary stages) to be conducted in one school of each block across the nation during Rashtriya Avishkar Saptah - 2022 will be identified in-house.', '2022-03-01', 2, 'NA', '2022-03-02 07:05:59', 'Pending'),
(125, 46, 'A Draft manuscript of Guidelines for conduct of activities/study/research in one school of each block across the nation during Rashtriya Avishkar Saptah - 2022 will be developed in-house.', '2022-03-01', 2, 'NA', '2022-03-02 07:05:59', 'Pending'),
(126, 46, 'Two days National Consultative Meeting with MHRD officials, senior functionaries of State/UTs, all State RAA officials &amp; RIEs RAA Nodal Officers will be conducted to obtain feedback on Guidelines and to discuss the implementation of the programme.', '2022-03-01', 2, 'NA', '2022-03-02 07:05:59', 'Pending'),
(127, 46, 'Guidelines will be finalized and printed in the form of a booklet.', '2022-03-01', 2, 'NA', '2022-03-02 07:05:59', 'Pending'),
(128, 47, 'Identification and consent of the host State', '2022-04-22', 2, 'NA', '2022-03-03 04:58:29', 'Pending'),
(129, 47, 'Liaison work and meeting with the officials and nodal agency of the host state', '2022-04-22', 2, 'NA', '2022-03-03 04:58:29', 'Pending'),
(130, 47, 'Preparation of manuscripts and printing of materials', '2022-06-22', 2, 'NA', '2022-03-03 04:58:29', 'Pending'),
(131, 47, 'Organization of 47th   JNNSMEE 2020 and participation of its selected exhibits in the Children Science Congress, Indian Science Congress 2020', '2022-11-22', 2, 'NA', '2022-03-03 04:58:29', 'Pending'),
(132, 48, 'Purchase of books/materials relevant to Science, Mathematics and Environment, Models/Exhibits.', '2022-04-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(133, 48, 'One day meeting of the Advisory Committee members', '2022-06-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(134, 48, 'Development of Guidelines for the Preparation of Exhibits and Models and Organising the State Level Science, Mathematics and Environment Exhibition for Children 2022-23.', '2022-04-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(135, 48, 'Translation of SLSMEE 2022-23 guidelines into Hindi', '2022-07-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(136, 48, 'Two days workshop with all state level exhibition coordinators and representatives of other educational institutions', '2022-04-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(137, 48, 'Organisation of Inter DMS exhibition for children- 2022-23', '2022-04-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(138, 48, 'Catalytic Grant for State Level Science, Mathematics and Environment Exhibition for Children, 2022-23 (including one-day seminar).', '2022-04-01', 2, 'NA', '2022-03-03 06:28:05', 'Pending'),
(139, 49, 'Organization of Yoga Olympiad at National level. (800×4×1)', '2022-06-01', 2, 'NA', '2022-03-03 06:45:58', 'Pending'),
(140, 49, 'Preparation of report of Yoga Olympiad.', '2022-07-01', 2, 'NA', '2022-03-03 06:45:58', 'Pending'),
(141, 49, 'Organization of National Yoga Quiz Competition', '2022-06-01', 2, 'NA', '2022-03-03 06:45:58', 'Pending'),
(142, 49, 'Preparation of report of National Yoga Quiz Competition.', '2022-07-01', 2, 'NA', '2022-03-03 06:45:58', 'Pending'),
(143, 50, 'Organization of Working Group Meetings for Development and Vetting of Learning Outcome- based Curricula for 25 job roles in various sectors', '2022-06-01', 2, 'NA', '2022-03-03 07:10:45', 'Pending'),
(144, 50, 'Printing of Curricula', '2022-06-01', 2, 'NA', '2022-03-03 07:10:45', 'Pending'),
(145, 51, 'Flexipool for payment of salary and honorarium to Vocational Teachers or Resource Persons/Experts  (Salary @ Rs 25,000/- consolidated)   (20 VTs X Rs 25000 X 12 months = 60,00,000)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(146, 51, 'Cost of teaching-learning resource materials, including multimedia and software (Rs 1 lakh to each school per annum) ( Rs 1,00,000 x 10 = 10,00,000)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(147, 51, 'Cost of raw materials for training of students and teachers (Rs 50,000/- per school per annum)  (50,000 x 10)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(148, 51, 'Cost of field visits and hands on skill training of students in enterprises/industry/organisations   (Rs 20,000/- per school per annum) ( Rs 20,000 x 10 = 2,00,000/-)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(149, 51, 'Fee for Assessors for Skill Assessment and Certification ( Rs 15,000 X 10 = 1,50,000/-)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(150, 51, 'Advertisement and Publicity', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(151, 51, 'Travelling Expenses (40,000 X 10 = 4,00,000/-)', '2022-04-01', 2, 'NA', '2022-03-03 07:29:16', 'Pending'),
(152, 52, 'Correspondence with the Officials of Department of School Education of States/UTs, NSDC, SSCs and other stakeholders in VET', '2022-06-01', 2, 'NA', '2022-03-03 09:29:44', 'Pending'),
(153, 52, 'Organisation of 02 Regional Consultative Meetings-cum-Workshops', '2022-08-01', 2, 'NA', '2022-03-03 09:29:44', 'Pending'),
(154, 52, 'Organisation of 01 National Consultative Meeting-cum-Workshop', '2022-11-01', 2, 'NA', '2022-03-03 09:29:44', 'Pending'),
(155, 53, 'Translation of five English modules to Hindi. A total of 5 workshops of 5 days with 1 resource person( one for each module) each for 5 modules.', '2022-04-01', 2, 'NA', '2022-03-03 10:15:53', 'Pending'),
(156, 53, 'Review of translated Hindi modules by conducting 1 workshop of 2 days with 5 resource persons.(5 experts for 5 modules)', '2022-04-01', 2, 'NA', '2022-03-03 10:15:53', 'Pending'),
(157, 53, 'Editing of the reviewed Hindi modules. A total of 2 workshop of 2 days with 5 resource persons.', '2022-04-01', 2, 'NA', '2022-03-03 10:15:53', 'Pending'),
(158, 53, 'Review of English modules by organizing 5 workshops with 1 resource person each for 5 modules for 5 days.(1 RP for each module)', '2022-11-01', 2, 'NA', '2022-03-03 10:15:53', 'Pending'),
(159, 53, 'Editing and finalization of English modules by organizing 2 workshops with 5 resource persons for 2 days.', '2022-01-01', 2, 'NA', '2022-03-03 10:15:53', 'Pending'),
(160, 55, 'sdd', '2022-03-09', 2, 'sdd', '2022-03-04 05:17:47', 'Pending'),
(161, 56, 'sds', '2022-03-16', 2, 'sds', '2022-03-04 06:25:13', 'Pending'),
(162, 57, 'Identification of themes, concepts, issues and concern based on which class-wise integrated learning- outcome based materials will be developed.', '2022-04-04', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(163, 57, 'Collection of relevant references and available resources based on class wise learning- outcome.', '2022-07-01', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(164, 57, 'Four workshops for five days each for development of learning outcome based resources. (Story boards, illustrations, graphics, voice over activities, manuscripts etc.)', '2022-09-01', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(165, 57, 'Two workshops for five days each for finalization of learning outcome based resources. (Story boards, illustrations, graphics, voice over activities, manuscripts etc.)', '2022-11-01', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(166, 57, 'Field trial of the resources developed', '2022-01-01', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(167, 57, 'One workshop of review and finalization of the learning outcome based resources.', '2022-03-01', 2, 'NA', '2022-03-04 09:34:32', 'Pending'),
(168, 58, 'Updating the Manodarpan webpage (painting, posters, videos and slogans, digital newsletter)', '2022-04-01', 2, 'NA', '2022-03-04 10:51:49', 'Pending'),
(169, 58, 'Creating online chat option on the webpage', '2022-04-01', 2, 'NA', '2022-03-04 10:51:49', 'Pending'),
(170, 58, 'Organizing webinars/programmes (Honorarium to  experts/resource person in Webinars at national and regional levels)', '2022-04-01', 2, 'NA', '2022-03-04 10:51:49', 'Pending'),
(171, 58, 'Meetings of Members of Manodarpan Cell/Experts (Honorarium, TA/DA to experts/resource person at national and regional levels, Lunch, Tea, Stationery, photocopy etc.)', '2022-04-01', 2, 'NA', '2022-03-04 10:51:49', 'Pending'),
(172, 58, 'Running of tele helpline (through IVRS operator), orientation of the newly inducted counselors , online follow up , skill building (Hon, TA/DA to RPs, Lunch, Tea, Stationery', '2022-04-01', 2, 'NA', '2022-03-04 10:51:49', 'Pending'),
(173, 59, 'Correspondence with National agencies, States/UTs for identification and deputation of State Resource Persons.', '2022-04-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(174, 59, 'Development of Concept Paper', '2022-05-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(175, 59, 'Needs identification of potential participants', '2022-06-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(176, 59, 'Organization of Interactive Training Programme for National Resource Persons on School Health and Wellness Programme (50 x 5 x 1)', '2022-07-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(177, 59, 'Organization of 40 Interactive Training Programme for State/UT Resource Persons from  States/UTs/RIEs on School Health and Wellness Programme (40 x 5 x 40)', '2022-08-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(178, 59, 'Monitoring of follow-up Interactive Training Programmes for Nodal teacher as Health and Wellness Ambassadors and organization of SHP activities in school.', '2022-04-01', 2, 'NA', '2022-03-04 11:14:22', 'Pending'),
(179, 60, 'Tool development workshops', '2022-04-01', 2, 'na', '2022-03-09 07:40:19', 'Pending'),
(180, 60, 'Data analysis and report writing', '2022-10-01', 2, 'NA', '2022-03-09 07:40:19', 'Pending'),
(181, 60, 'Capacity building training for personnel of North Zone', '2022-09-01', 2, 'NA', '2022-03-09 07:40:20', 'Pending'),
(182, 60, 'Workshops with various stakeholders to develop, review and finalize  question bank on foundational literacy and numeracy as stated in NEP 2020', '2022-07-01', 2, 'NA', '2022-03-09 07:40:20', 'Pending'),
(183, 61, 'x', '2022-03-01', 2, 'na', '2022-03-09 10:57:55', 'Pending');

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
(38, 19, '22220T01', NULL, NULL, 'DIKSHA/ICT Excellence Award for School Teachers, Teacher Educators and States/UTs', '67', 38, '0,15,2', 3, 2, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'MoE (Ministry of Education)', '●	Advertisement for Nominations for Awards.  \r\n●	Updation of the portal for inviting online applications for awards.\r\n●	Self nominations by the prospective candidates.\r\n●	Evaluation and Submission of nominations entries for awards by State/UT/Organisation.\r\n●	National level Jury meeting  for the years 2020 and 2021.\r\n●	 Award ceremony for  teachers for the year 2020 and 2021.\r\n●	 Awards for Teacher Educators for the year 2021.\r\n●	 Awards for States/UTs for the year 2021.', 2, '2022-02-28 05:38:28'),
(39, 19, '22220D01', NULL, NULL, 'Organization of Festival, ICT Mela, contests for creation of quality digital contents and to improve coordination with States/ UTs.', '68', 38, '0,3,14,5', 2, 1, NULL, NULL, 3, 8, 7, '●	To provide a forum for exchange of ideas and innovative media programmes at National and States level.\r\n●	To coordinate with SIETs, RIEs, ICT/ET cells, SCERTs etc regarding media and ICT activities.\r\n●	To organise contests and events in media and ICT\r\n●	To motivate the educational communities for registrations, participation and in contests events for creating   digital content and media programmes.', 'x', 'Seminar,E-books,conference, award ceremony', 'SIETs, RIEs, ICT/ET cells, SCERTs', 'This activity will help in motivating students, teachers and teacher educators to create educational e-content in general and will help in preparation of child-centric teaching-learning materials. The Mela will also help in generating awareness about the new innovations and best practices with respect to use of ET and ICT in education', 2, '2022-02-28 06:38:36'),
(40, 19, '22220D02', NULL, NULL, 'Management of PM eVIDYA (One Class One Channel, Radio, Podcasts, CWSN) Project', '68', 38, '0,17,18,10', 2, 1, NULL, NULL, 3, 8, 7, '•	To develop and collate, curate e-Content (Audio and Video) from Class 1 to 12.\r\n•	To assist the Subject Matter Expert in developing the scripts leading to the production of video programmes.\r\n•	To manage the development of metadata for video programmes recorded.\r\n•	To manage the vetting/review process and to upload the content on the DIKSHA portal.\r\n•	To map the content on the DIKSHA for coherence.\r\n•	To prepare monthly schedules for all 12 channels and share the contents with BISAG-N, Gandhinagar for the telecast. \r\n•	To try out select series relevant to the curriculum and learning outcomes other than those based on textbooks but recommended in NEP 2020.\r\n•	To conduct feedback studies for feed forward purpose.\r\n•	To try out other platforms/technologies such as OTT for the dissemination of PM eVIDYAeContents.\r\n•	To conduct a research study in order to explore the efficacy of PM eVIDYA initiative\r\n•	To undertake multi-modal advocacy for popularization of PM eVIDYA channels and enhance viewing/listening of contents.', 'x', 'x', ', UTs, State Boards, CBSE, KVS, NVS, NIOS, SCERTs, RIEs, SIEs, SIETs, etc', 'The project aims at catering the educational needs of students, teachers and teacher educators by proving educational eContent based on NCERT textbook in various modes i.e., video and audio. The DIKSHA coherence will help in anytime anywhere access to these eContent.', 2, '2022-02-28 06:46:01'),
(41, 19, '22220T03', NULL, NULL, 'DIKSHA - One Nation, One Digital Platform', '67', 38, '0,15,2', 3, 1, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'DIC / NIC / NICSI', 'Content Development using latest technologies -1000 Audios / Videos, 330 Virtual Labs / OLABs\r\n*Online Courses : a.	Development of taxonomy for CPD in DIKSHA\r\nb.	30 curriculum based courses for students at secondary stage of school education  in different subject areas\r\nc.	3 courses for pre-service teachers and teacher educators\r\nd.	4 integrated teacher training courses  under NISHTHA \r\ne.	(AWWs for FLN, Sr. Secondary, Skill development, Educational Administrators / Leaders)\r\nf.	iv. 10 need based CPD courses on generic areas relevant inservice teachers and teacher educators\r\n\r\n*Transition of DIKSHA to DIC / NIC / NICSI: Onboarding of MSIP &amp; CSP (in 6 to 8 Months time)\r\n*Creation and evolution of program verticals : 1)Adult Education\r\n2)	CWSN\r\n3)	NIPUN BHARAT (FLN)\r\n4)	Vocational Education\r\n5)	OLABS  \r\n *Coordination Centre	Setting up of CCC (including hardware, software, human resources)(in 6-7 Months time)\r\n*Research	●	Conducting 3 pilots and one impact study(in 8-12 Months time)\r\n●	Conducting a study on effectiveness of NISHTHA programme through online mode\r\nAdvocacy	1.	Monthly Meetings - 12\r\n2.	Development of Jingles and Promos - 10 (program wise)\r\n3.	Printing of brochures, bookmarks, advertisements in newspapers, media (TV/radio) channels etc.\r\n4.	Organization &amp; participation - exhibitions, webinars, fairs, etc.\r\n5.	Organization of Social media campaigns - weekly program wise\r\n6.	Organization of student engagement activities - 4 (once every quarter)', 2, '2022-02-28 09:44:45'),
(42, 8, '22207T01', NULL, NULL, 'NISHTHA for the Elementary Stage Teachers', '69', 38, '0,15,2', 3, 2, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'x', 'x', 2, '2022-02-28 11:22:04'),
(45, 8, '22107D01', NULL, NULL, 'NISHTHA Secondary Stage', '69', 38, '0,6,15,2', 2, 2, NULL, NULL, 3, 8, 7, 'X', 'X', 'X', 'DIETs, BRCs, CRCs', 'X', 2, '2022-03-02 06:27:07'),
(46, 7, '22206E01', NULL, NULL, 'Rashtriya Avishkar Saptah – 2022', '72', 38, '0,3,4', 4, 1, NULL, NULL, 3, 8, 7, 'To generate excitement and encourage experimentation and exploration among school children at Secondary and Higher Secondary stage so that they become motivated and engaged in Science and Mathematics. To create awareness among general mass and to sensitize them about issues and concerns related to their life.', 'x', 'x', 'x', 'The project will create a large scale awareness and sensitization on the concerns relevant to them from the perspectives of environment and their health. It will also help in engaging children for real life situation and to critically think and analyse the concern and develop appropriate understanding of the possible solution. These activities would certainly contribute in the nurturance of various skills like critical thinking, collaboration, experimentation and communication etc. Also, through the engagement of children entire society at large is expected to be sensitized on issues and concerned affecting them. Guidelines for conduct of activities/ study/ research in a few schools of each block across the nation during Rashtriya Avishkar Saptah 2022. will be developed and shared with States/UTs for implementation. Data/ Results of activities/ study/ research from schools will be collected online, compiled, analysed and shared.', 1, '2022-03-02 07:05:59'),
(47, 7, '22206E02', NULL, NULL, '49th Jawahar Lal Nehru National Science, Mathematics and Environment Exhibition (JNNSMEE) for Children-2022', '73', 38, '0,21,5,4', 4, 2, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'NIE Departments, RIEs, CIET, PSSCIVE Bhopal for academic and out side agency - Officials of the Host State, Advisory Committee Members and other industrial and scientific organizations for Academic and administration', '•	Children will get a platform to showcase their innate talent and creativity \r\n•	Students, teachers, teacher educators and masses will get the exposure which can help them in developing their interests in Science and Mathematics. \r\n•	Children may realize the relevance of science to society and their responsibilities as scientists in the present age.\r\n•	Children may come out with of innovative solutions for challenges faced by the society\r\n•	Innate qualities like creativity, innovation and development of psychomotor and manipulative skills in children will be promoted.', 1, '2022-03-03 04:58:29'),
(48, 7, '22106E02', NULL, NULL, 'State Level Science, Mathematics and Environment Exhibitions (SLSMEE) for Children', '74', 38, '0,15', 4, 2, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'x', '•	 Science, Mathematics and Environmental Education will be popularize among students.\r\n•	Understanding amongst the school children towards the role of Science, Mathematics, Technology and Environmental Education in society may improve. \r\n•	   Scientific talent may improve among students. \r\n•	  Children, teachers and public in general may become sensitive about the environment.\r\n•	   Creative, innovative thinking may promote psychomotor and manipulative skills among children.\r\n•	   Participating children, teachers, parents and exhibition organizers get opportunity to interact with each other and thereby their exhibits may get chance for further improvement.\r\n•	  It may stimulate spirit of exploration in developing suitable technology by the application of scientific principles to everyday life situations.\r\n•	  It may strengthen the State Exhibitions in the presentation and development of write-ups for the models/exhibits for consideration of participation in 49th Jawaharlal Nehru National Science, Mathematics and Environment Exhibition (JNNSMEE) for Children– 2023.\r\n•	  It may get opportunity to organise Inter DM Schools Science, Mathematics and Environment exhibition for the children of all the four DM Schools together with INDEM- 2022-23', 1, '2022-03-03 06:28:05'),
(49, 6, '22205D01', NULL, NULL, 'Organization of National Yoga Olympiad and National Yoga Quiz Competition (Online)', '75', 38, '0,20,17,12', 2, 1, NULL, NULL, 3, 8, 7, '•	To encourage and develop a positive and healthy habit &amp;lifestyle for physical, mental and emotional health of children through yogic activities.\r\n•	To develop an understanding of yogic practices and apply this understanding accordingly in one’s life and living.\r\nTo develop humane values in children and harmony with the nature and universe.', 'Yoga Olympiad will be organized from the school to National level.  School, Block, District and State level will be held during April - May, 2022.  National level activities will be held during June, 2022. Detailed Scheme has already disseminated to States/UTs/RIEs and other implementing agencies.', 'x', 'x', '•	 Science, Mathematics and Environmental Education will be popularize among students.\r\n•	Understanding amongst the school children towards the role of Science, Mathematics, Technology and Environmental Education in society may improve. \r\n•	   Scientific talent may improve among students. \r\n•	  Children, teachers and public in general may become sensitive about the environment.\r\n•	   Creative, innovative thinking may promote psychomotor and manipulative skills among children.\r\n•	   Participating children, teachers, parents and exhibition organizers get opportunity to interact with each other and thereby their exhibits may get chance for further improvement.\r\n•	  It may stimulate spirit of exploration in developing suitable technology by the application of scientific principles to everyday life situations.\r\n•	  It may strengthen the State Exhibitions in the presentation and development of write-ups for the models/exhibits for consideration of participation in 49th Jawaharlal Nehru National Science, Mathematics and Environment Exhibition (JNNSMEE) for Children– 2023.\r\n•	  It may get opportunity to organise Inter DM Schools Science, Mathematics and Environment exhibition for the children of all the four DM Schools together with INDEM- 2022-23.', 1, '2022-03-03 06:45:58'),
(50, 20, '22121D01', NULL, NULL, 'Development of Curricula for 25 Job Roles for Vocational Education in Schools under Samagra Shiksha', '76', 38, '0,19', 2, 1, NULL, NULL, 3, 8, 7, '•	Identify the job roles for development of learning outcome-based curricula for vocational subjects; and \r\n•	Develop vocational curricula for identified job roles in various sectors of economy.', 'The States/UTs are implementing the scheme of Vocationalisation of Secondary Education under the Samagra Shiksha for Grades IX to XII.  Learning outcome-based curricula are being developed by the PSS Central Institute of Vocational Education (PSSCIVE), Bhopal for the vocational subjects introduced under the Samagra Shiksha from Grades IX to XII. Curricula for 152 job roles have been developed and there is demand from the States/UTs for development of additional vocational curricula as per the job roles in different sectors.  In this backdrop and keeping in view the emerging skill demands in various sectors, curricula for 25 Job Roles will be developed with the help of the experts in the respective fields. Working group meetings of experts would be organised for the development of curricula. These curricula will be uploaded on the website of PSSCIVE for wider dissemination to the various stakeholders of Vocational Education and Training (VET).', 'x', 'x', 'Twenty-five learning outcome-based vocational curriculum as per the job roles aligned with the National Skill Qualification Framework and approved by the National Skill Qualifications Committee.', 1, '2022-03-03 07:10:45'),
(51, 20, '22221D02', NULL, NULL, 'Innovative Model of Vocational Education in Schools', '76', 38, '0,19', 2, 1, NULL, NULL, 3, 8, 7, '•	Identify the job roles for development of learning outcome-based curricula for vocational subjects; and \r\n•	Develop vocational curricula for identified job roles in various sectors of economy.', 'x', 'x', 'x', '•	Introduction of pre-vocational education for exposure of students to a variety of career opportunities in the world of work.\r\n•	Industry aligned vocational courses that meet the skill demands of the Industry and the National Occupational Standards for the various job roles.\r\n•	Professional Development of Vocational Teachers/Trainers.\r\n•	Skills training by Vocational Teachers and local experts.\r\n•	Technology integration in teaching-learning using digital learning resources, model lesson plans, self-learning materials and skill assessment tools for better learning experience \r\n•	Performance-based assessment and evaluation.', 1, '2022-03-03 07:29:16'),
(52, 20, '22221D03', NULL, NULL, 'Consultation Meetings-cum-Workshops on Vocationalisation of School Education under Samagra Shiksha', '76', 38, '0,4,19', 2, 1, NULL, NULL, 3, 8, 7, '•	To study the current status of implementation of Vocationalisation of School Education under Samagra Shiksha;\r\n•	To identify and prioritize the key concerns and issues in effective implementation of the various components of vocationalisation of education in schools;\r\n•	To share innovative and good practices in the implementation of vocationalisation of education in schools adopted by the States/Union Territories; \r\n•	To identify key areas for actions in reorganizing, restructuring and strengthening vocational education programme in schools; and\r\n•	To make recommendations and follow-up actions for better coordination between the various stakeholders involved in the implementation of vocationalisation of education in schools.', 'x', 'x', 'x', '•	Common awareness among the stakeholders on VET with regard to the implementation of Vocationalisation of Education in Schools, with reference to the recommendations of the National Education Policy 2020. \r\n•	Sharing of information on matters concerning the implementation of vocationalisation of education under Samagra Shiksha.\r\n•	Strengthening of the various components of the scheme of vocationalisation of education under Samagra Shiksha.\r\n•	Making decisions based on the views and information shared during the consultation meetings-cum-workshops.\r\n•	Better understanding of various aspects of vocationalisation of education through participation of stakeholders in the workshop.\r\n•	Reports of the Regional (02 No.s) and National Consultation Meetings-cum-Workshop (01 No.) on Vocationalisation of School Education under Samagra Shiksha.', 1, '2022-03-03 09:29:44'),
(53, 2, '22101T01', NULL, NULL, 'Finalisation of Training Modules (English and Hindi) for Master Trainers of Anganwadis – Ongoing', '77', 38, '0,2', 3, 2, NULL, NULL, 3, 8, 7, 'x', 'a.	The course outlines for 5 training modules have been worked upon.\r\nb.	The sub content of 5 modules has been decided.\r\nc.	The module writing in DIKSHA format is in the process.', 'x', 'NGO', 'Training Module for Master Trainers of Anganwadis', 1, '2022-03-03 10:15:53'),
(57, 2, '22201D01', NULL, NULL, 'Development of Learning Outcomes based resources to cater the needs of disadvantaged groups and vulnerable children at the Preparatory Stage', 'Array', 38, '0,2', 2, 2, NULL, NULL, 3, 8, 7, '•	To enable students of disadvantaged groups and vulnerable children to attain the learning-outcomes in different curricular areas namely Language, Mathematics, Art Education and Health and Physical Education through EVS.\r\n•	To help students of disadvantaged groups and vulnerable children in bridging gaps in learning by providing them with need based material. \r\n•	To enable them reduce the curriculum load by integrating different subjects.\r\n•	To provide learning outcome based resources to the teachers which they can adopt or adapt for classroom transaction in offline and/or online mode.\r\n•	To help teachers go beyond textbooks and contextualize their teaching learning.', 'x', 'x', 'X', 'Audios/videos/print material based on learning outcomes will be      developed for class III and IV.', 1, '2022-03-04 09:34:32'),
(58, 11, '22210E01', NULL, NULL, 'Manodarpan: Providing Psychosocial Support for Mental Health and Well-being of Students during COVID-19 Outbreak and Beyond', 'Array', 38, '0,2', 4, 2, NULL, NULL, 3, 4, 7, '•	To develop sensitivity and understanding amongst teachers, parents and other stakeholders about mental health concerns of students by providing necessary materials (reading materials, posters, videos-games, webinars, jingles and slogans, etc.)\r\n•	To support students, teachers, and parents to address their mental health and psychosocial issues.\r\n•	To develop a mental health software application  to support all stakeholders in school system', 'The on-going activities such as offering the tele-helpline services, orientation of counsellors, webinars on mental health concerns such as Paricharcha, sessions for guidance of school students (Sahyog), updating of the Manodarpan web-page, responding to email of stakeholders, preparing digital newsletter and chat-bot, celebration of mental health week, etc. will be pursued during 2022-2023 also to ensure that students in schools, colleges and universities as well as their family members and teachers are able to reach out for support to deal with psycho-social concerns and mental well-being.\r\nIn the present academic year (2022-23) with the aim to strengthen integration of mental health in the school system it is proposed to delineate parameters related to mental health across stages of school education for providing inputs in the position paper on Guidance and Counselling and subsequently for integration in the National Curriculum Frameworks. Draft parameters will be discussed and finalised with experts in the field. \r\nTo share research learning’s in the area of mental health and to provide a platform to researchers/ stakeholders working in the area, a three days National conference is proposed to be organised. Academicians and professionals from mental health field across the country participate to share their learnings.\r\nIt is also proposed  to develop a mental health app which would include video games, fun activities, worksheets/relaxation techniques, tips and strategies, chat bot option, reference and resource material to help all the stakeholders in strengthening their mental health.  Need assessment and feedback from stakeholders would be undertaken. Based on the identified themes the content for the App will be developed. Technical support for developing the software app will be done in consultation with CIET, NCERT.\r\nTo reach every child and all stakeholders it is proposed to develop advocacy material/content for supporting Mental Health of the students, te', 'draft', '1.Ministry of Education (MoE) &amp;Members of Working Group for advisory academic, RIE (Ajmer, Bhopal, Bhubaneswar, Mysuru, Shillong) for Manodarpan Cell, NCERT, SCERTs/DIETs, CIET, NCERT,Educational Institutions/NGO’s across the country', 'Analysis of information collated from the counsellors relating to helpline calls is undertaken. Steps are taken to orient counsellors on handling of emerging concerns and for improvements in functioning of IVRS. Based on insights developed on various activities carried out new activities will be planned.', 2, '2022-03-04 10:51:49'),
(59, 6, '22205T02', NULL, NULL, 'Interactive Training Programmes for State Resource Persons under School Health and Wellness Programme of Ayushmaan Bharat initiative of Government of India', 'Array', 38, '0,2', 3, 1, NULL, NULL, 3, 8, 7, 'To create awareness about School Health and Wellness Programme and its concerns and develop abilities to act as Master Trainer and State Resource Persons for training programmes for Nodal teacher as Health and Wellness Ambassadors under School Health and Wellness Programme.', 'The following steps will be taken for organizing the interactive training programmes:\r\ni.	State Resource Persons will  be identified through a specific tool  before they join the  programme\r\nii.	Materials on School Health and Wellness Programme developed by the Department will be used; and\r\nActivity-based interactive participatory techniques will be employed in each session.', 'd', 'd', 'i.	Improvement in capacities of school staff to understand and respond to needs and concerns of adolescent students related to Health and Wellbeing,  \r\nii.	Integration of adolescent health and well-being in critical processes of school education (capacity building, school time table and activities, monitoring, appraisal, recognition, evaluation).\r\niii.	Support to community / society to understand and share issues related to health and well-being.\r\niv.	Promotion of mentorship support to individuals as well as participating school systems to co-create enabling teaching-learning environment for adolescents', 2, '2022-03-04 11:14:22'),
(60, 8, '22107T01', NULL, NULL, 'Strengthening Adult Education', 'Array', 38, '0,20,3,16', 3, 1, NULL, NULL, 3, 8, 7, 'The specific objectives of the programme are:\r\n•	To develop e-content for no-literate learners in the form of app based primer, modules, self-assessment tools etc. E-contents which were already developed by various ministries, institutions, and organizations for adult learners would be reviewed, redeveloped if needed and uploaded in DIKSHA portal.\r\n●	To assist non-literate learners getting into the digital literacy mode so as to enhance the achievement of goals of National Literacy Mission.\r\n●	To provide academic support to the states and UTs for translation, adaptation of e-content material in regional languages (including Tribal Languages).', 'x', 'Workshop,Research study,Handbooks,audio-video programmes, story books, posters, pamphlets, e-content, monograph, etc', 'SCERT, DIET', 'E-contents for self-learning and self-assessment for learners on various topics related to literacy and numeracy (language and mathematics) education for adult education in different languages', 1, '2022-03-09 07:40:18'),
(61, 8, '22107D02', NULL, NULL, 'Development of National Curriculum Frameworks as a follow-up of NEP, 2020', 'Array', 38, '0,16', 2, 1, NULL, NULL, 3, 8, 7, 'x', 'x', 'x', 'x', 'By August, 2022- State/UT Curriculum Frameworks for School Education and ECCE \r\nBy August, 2022- State/UT Curriculum Frameworks for Adult Education\r\nBy August, 2022- State/UT Curriculum Frameworks for Teacher Education\r\nBy April, 2023 – National Curriculum Framework for School Education and ECCE\r\nBy July-August, 2023 – National Curriculum Framework for Teacher Education \r\nBy July-August, 2023 – National Curriculum Framework for Adult Education', 1, '2022-03-09 10:57:55');

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
(94, 38, 1, 1, 12, 250000, 1, '2022-02-28 05:38:28'),
(95, 39, 1, 1, 12, 250000, 1, '2022-02-28 06:38:37'),
(96, 40, 45, 1, 6, 180000, 1, '2022-02-28 06:46:01'),
(97, 41, 2, 1, 6, 100000, 1, '2022-02-28 09:44:46'),
(98, 42, 1, 10, 12, 2500000, 1, '2022-02-28 11:22:04'),
(99, 42, 28, 2, 12, 300000, 1, '2022-02-28 11:22:04'),
(100, 42, 5, 2, 12, 600000, 1, '2022-02-28 11:22:04'),
(101, 45, 2, 2, 2, 0, 0, '2022-03-02 06:27:08'),
(102, 46, 1, 1, 10, 250000, 0, '2022-03-02 07:05:59'),
(103, 46, 12, 1, 10, 300000, 0, '2022-03-02 07:05:59'),
(104, 47, 41, 1, 8, 184000, 1, '2022-03-03 04:58:29'),
(105, 47, 28, 1, 6, 90000, 1, '2022-03-03 04:58:29'),
(106, 48, 2, 1, 1, 1, 1, '2022-03-03 06:28:05'),
(107, 49, 1, 1, 25000, 100000, 1, '2022-03-03 06:45:58'),
(108, 50, 20, 2, 10, 1100000, 1, '2022-03-03 07:10:45'),
(109, 51, 4, 1, 450000, 12, 1, '2022-03-03 07:29:16'),
(110, 52, 20, 2, 10, 550000, 1, '2022-03-03 09:29:44'),
(111, 53, 33, 1, 12, 380000, 1, '2022-03-03 10:15:53'),
(112, 55, 42, 1, 3, 11, 11, '2022-03-04 05:17:47'),
(113, 56, 8, 1, 2, 11, 11, '2022-03-04 06:25:13'),
(114, 57, 33, 1, 12, 360000, 1, '2022-03-04 09:34:32'),
(115, 58, 1, 2, 12, 600000, 1, '2022-03-04 10:51:49'),
(116, 58, 33, 1, 12, 720000, 1, '2022-03-04 10:51:49'),
(117, 58, 2, 1, 12, 276000, 1, '2022-03-04 10:51:49'),
(118, 59, 1, 2, 12, 600000, 1, '2022-03-04 11:14:22'),
(119, 60, 1, 4, 12, 1200000, 1, '2022-03-09 07:40:20'),
(120, 60, 11, 1, 12, 300000, 1, '2022-03-09 07:40:20'),
(121, 60, 41, 3, 12, 828000, 1, '2022-03-09 07:40:20'),
(122, 60, 3, 1, 12, 240000, 1, '2022-03-09 07:40:20'),
(123, 61, 5, 7, 12, 245000, 1, '2022-03-09 10:57:55'),
(124, 61, 15, 5, 12, 1, 1, '2022-03-09 10:57:55');

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
(38, 38, 'The Advertisement on mass media to popularise the award and invitation of entries for the years 2020-2021  April, 2022.', 4, 1),
(39, 38, 'Updation of ICT Award Portal for inviting entries for the award for the year 2020 and 2021- April, 2022.', 4, 1),
(40, 38, 'Online Self nominations by the prospective candidates for the years 2020 and 2021- May-June, 2022', 5, 3),
(41, 38, 'Evaluation of self nominated applications and submission of nominations by State/UT/ Autonomous Organisation for award for the years 2020 and 2021- July-August, 2022', 7, 3),
(42, 39, '400 entries for audio-video festival', 1, 3),
(43, 39, '40 Organisations participating in Mela', 1, 3),
(44, 39, 'Organisation of the Festival and ICT Mela', 1, 3),
(45, 39, '3000 Footfall in case of offline event and project report', 4, 3),
(46, 40, 'Recording of video &amp; audio programmes- continuous (all 1500 videos/audios to be completed by March, 2023', 3, 3),
(47, 40, 'Editing  and Review of programmes – continuous', 3, 3),
(48, 40, 'iv.	Scheduling for telecast – continuous (Schedules of the upcoming month to be ready by 20th of the present month', 3, 3),
(49, 41, 'x', 1, 3),
(50, 42, 'x', 1, 3),
(51, 45, 'X', 1, 3),
(52, 46, 'Timely development of the guidelines by the DESM, NCERT', 1, 3),
(53, 46, 'Try-out of the activities involving some experts and schools', 1, 3),
(54, 46, 'c)	Participation of State/UT functionaries (Department of Education/SCERT/SIE/SISE) from Education Department in the Orientation meeting organised by NCERT before the roll out of the project', 1, 3),
(55, 46, 'd)	Timely and appropriate awareness of district and block level functionaries (DIET/BRC/CRC) of the Education Department by the respective State/UT functionaries through the Orientation meeting organised either online or face-to-face (as per need)', 1, 3),
(56, 47, 'Selection of the exhibits for JNNSMEE-2022, from the exhibits selected at the State Level Exhibitions of the previous year (2020-2021) .', 1, 1),
(57, 47, 'Selection of venue for organizing the JNNSMEE – 2022 shall be made with the consent of host state.', 1, 3),
(58, 47, 'Liaison work with the host state for organizing the National Exhibition shall be taken up from time-to-time.', 1, 3),
(59, 48, 'Organization of advisory committee meeting for SLSMEE and JNNSMEE.', 1, 1),
(60, 48, 'Identification and finalization of theme and subthemes for the organization of SLSMEE in all states/UTs for 2022-23.', 1, 3),
(61, 48, '(c)Guidelines and other information regarding the organization of exhibitions and for the improvement of exhibits will be developed and printed in the form of booklet for dissemination. The same will also be made available on NCERT website. The reports of Exhibitions of States/UTs visited by faculty members of DESM and feedback received from the participants during the JNNSMEE–2021 will be considered while preparing guidelines for organization of state/UT level exhibitions.', 1, 3),
(62, 48, '(d)All DM Schools shall be invited to participate in Inter DM Schools Science, Mathematics and Environment Exhibition-2022 (12 Students and 01 teacher from each school) during the organisation of INDEM-2022.', 1, 3),
(63, 48, 'Dissemination of catalytic grants for organizing the State Level Exhibitions and One-Day Seminars to each state/UT as per NCERT norms', 1, 3),
(64, 48, 'Visits to different SLSMEEs by team members.', 1, 3),
(65, 48, 'Interaction with the participating children, teachers, parents, exhibition organizers will be made by faculty members during their visit to different SLSMEEs.', 1, 3),
(66, 48, 'The final report based on the reports submitted by the states/UTs will be prepared.', 1, 3),
(67, 49, 'Organization of Yoga Olympiad at National level', 1, 3),
(68, 49, 'Submission of report of Yoga Olympiad', 1, 3),
(69, 49, 'Organization of National Yoga Quiz Competition', 1, 3),
(70, 49, 'Submission of report of National Yoga Quiz Competition', 1, 3),
(71, 50, 'Adoption of the vocational curricula by the States.', 1, 3),
(72, 51, 'Students’ ability to move up the social ladder and improve their standard of living.', 1, 3),
(73, 51, 'Quality of Vocational Teachers/Trainers.', 1, 3),
(74, 51, 'Quality of vocational training and perception of training.', 1, 3),
(75, 51, 'Rate of students attending more than 80% of the classes.', 1, 3),
(76, 51, 'Perceived satisfaction by vocational students/trainees through questionnaires.', 1, 3),
(77, 51, 'Average grades of vocational students through board examination.', 1, 3),
(78, 52, 'Database to facilitate comparisons between the vocational education programmes in schools of the States/UTs.', 1, 3),
(79, 52, 'Identification of verifiable measures that could be considered for measuring the success of the vocationalisation of education in schools.', 1, 3),
(80, 52, 'Development of action plan for strengthening of the vocationalisation of education in schools.', 1, 3),
(81, 52, '•	Monitoring of the implementation of the action plan submitted by the States/UTs for strengthening and expansion of the vocationalisation of education in schools', 1, 3),
(82, 53, 'Translation of the English modules into Hindi', 1, 3),
(83, 53, 'Review of the translated Hindi modules', 1, 3),
(84, 53, 'Editing of the reviews translated Hindi modules', 1, 3),
(85, 53, 'Revision and editing of the English modules', 1, 3),
(86, 53, 'Finalisation of both English and Hindi modules', 1, 3),
(87, 55, 'dsdsd', 2, 3),
(88, 56, 'sd', 7, 3),
(89, 57, '•	In-house brainstorming on identification of themes, concepts, issues and concerns focusing on integration of Language, Mathematics, Art Education and Health and Physical Education and EVS, based on which class wise learning- outcome based materials will be developed.', 1, 1),
(90, 57, 'Collection of relevant references and available resources based on class wise learning- outcome', 1, 1),
(91, 57, 'Development of class-wise integrated learning- outcome based resources (print material and/or E-content) through workshops.', 1, 3),
(92, 57, 'Review and finalization of developed resources (print material and/or E-content) through workshops.', 1, 3),
(93, 57, 'Digitalization, Printing and upload/dissemination of material.', 1, 3),
(94, 58, 'x', 1, 3),
(95, 59, 'Correspondence with National agencies, States/UTs for identification and deputation of State Resource Persons.', 5, 3),
(96, 59, 'Development of Concept Paper.', 6, 3),
(97, 59, 'Needs identification of potential participants.', 8, 3),
(98, 59, 'Organization of Interactive Training Programme for National Resource Persons on School Health and Wellness Programme', 8, 3),
(99, 59, 'Organization of 40 Interactive Training Programme for State/UT Resource Persons from States/UTs/RIEs on School Health and Wellness Programme.', 8, 3),
(100, 60, 'Draft of learning outcomes', 1, 1),
(101, 60, 'Printing and distribution of learning outcomes to states and UTs', 1, 1),
(102, 61, '54 Templates in typed as well as in e-form for the development of Focus Group Papers and Curriculum Frameworks', 1, 3),
(103, 61, 'A Pool of around 300-400 state and national level officials oriented on the processes of curriculum development (around 6 academic and technical orientation programmes through online and offline mode already conducted)', 1, 3),
(104, 61, '25 Position Papers of the National Focus Groups', 1, 3),
(105, 61, 'Four National Curriculum Frameworks, viz., ECCE, SE, TE and AE', 1, 3);

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
(1, 'admin_pmd', '1316101d276f1f89899a85cdab66329e', 'd1a1f7b8950aa1eba43a2d7dd0bd0a1d', 0, 0, 3, 'test', 'test', 1, 4, 'test1', 8368467673, NULL, 1, NULL, 'xilonax337@aethiops.com', '0,11,12,13,14,15,21,22,23,24,25,26,33,34,41,42', 'Active', 'MPlho'),
(67, 'ciet_indu', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Indu', 'Kumar', 19, 1, '', 1126864801, NULL, 1, NULL, 'indu.kumar@ciet.nic.in', '0,23,31,32', 'Active', NULL),
(68, 'ciet_abhay', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Abhay', 'Kumar', 19, 3, '', 1126864810, NULL, 1, NULL, 'akumarabhay@gmail.com', '0,23,31,32', 'Active', NULL),
(69, 'dcsd_ranjana', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 1, 'Ranjana', 'Arora', 8, 1, '', 9898989898, NULL, 1, NULL, 'ranjuarora1967@yahoo.co.in', '0,23,31,32', 'Active', NULL),
(70, 'dee_suniti', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Suniti', 'Sanwal', 2, 1, '', 1126863735, NULL, 1, NULL, 'drssanwal@gmail.com', '0,23,31,32', 'Active', NULL),
(71, 'ciet_angel', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Angel', 'Rathnabai', 19, 3, '', 9191919191, NULL, 1, NULL, 'angel.rathnabai@ciet.nic.in', '0,23,31,32', 'Active', NULL),
(72, 'desm_dinesh', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Dinesh', 'Kumar', 7, 1, '', 9876554678, NULL, 1, NULL, 'ggupta.ncert@nic.in', '0,23,31,32', 'Active', NULL),
(73, 'desm_sunita', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Sunita', 'Farkya', 7, 1, '', 1126561742, NULL, 1, NULL, 'sfarkya@gmail.com', '0,23,31,32', 'Active', NULL),
(74, 'desm_tpsharma', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'TP', 'Sharma', 7, 1, '', 9879879898, NULL, 1, NULL, 'tpsarma@yahoo.com', '0,23,31,32', 'Active', NULL),
(75, 'dess_gouri', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Gouri', 'Srivastav', 6, 1, '', 1125094624, NULL, 1, NULL, 'headdess@gmail.com', '0,23,31,32', 'Active', NULL),
(76, 'psscive_vsmehrotra', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 1, 'VS', 'Mehrotra', 20, 1, '', 9424485821, NULL, 1, NULL, 'v.mehrotra@psscive.ac.in', '0,23,31,32', 'Active', NULL),
(77, 'dee_romila', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Romila', 'Soni', 2, 3, '', 9811052789, NULL, 1, NULL, 'romila64@gmail.com', '0,23,31,32', 'Active', NULL),
(78, 'dee_kavita', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Kavita', 'Sharma', 2, 1, '', 9393939393, NULL, 1, NULL, 'kavita9257@gmail.com', '0,23,31,32', 'Active', NULL),
(79, 'dee_usha', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Usha', 'Sharma', 2, 1, '', 9811543040, NULL, 1, NULL, 'ushaharma1730@yahoo.com', '0,23,31,32', 'Active', NULL),
(80, 'dee_akrajput', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'AK', 'Rajput', 2, 1, '', 9868255775, NULL, 1, NULL, 'mrdciet@gmail.com', '0,23,31,32', 'Active', NULL),
(81, 'depfe', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Anjum', 'Sibia', 11, 1, '', 7878787878, NULL, 1, NULL, 'anjumsibia@yahoo.com', '0,23,31,32', 'Active', NULL),
(82, 'ciet_amarendra', 'f656f2a175da1dbd61d5ebab3a71955b', NULL, 0, 2, 2, 'Amarendra', 'Behera', 19, 4, 'Joint Director', 1126962580, NULL, 1, NULL, 'amar_b2000@yahoo.com', '0,23,31,32', 'Active', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `acr_category`
--
ALTER TABLE `acr_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `acr_expenditure`
--
ALTER TABLE `acr_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `focus_area`
--
ALTER TABLE `focus_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `forget_attempt`
--
ALTER TABLE `forget_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `india_state`
--
ALTER TABLE `india_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `login_attempt`
--
ALTER TABLE `login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

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
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `project_senc_post`
--
ALTER TABLE `project_senc_post`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `p_indicators`
--
ALTER TABLE `p_indicators`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
