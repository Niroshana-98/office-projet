-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch_mgt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_no` int(11) NOT NULL,
  `name_full` varchar(255) NOT NULL,
  `name_si` varchar(255) DEFAULT NULL,
  `name_eng` varchar(255) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `address_pri` varchar(255) DEFAULT NULL,
  `tel_land` varchar(20) DEFAULT NULL,
  `tel_mob` varchar(20) DEFAULT NULL,
  `email_pri` varchar(255) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `upp_status` varchar(255) DEFAULT NULL,
  `desi` int(11) DEFAULT NULL,
  `c_w_p` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `date_att_sp` date DEFAULT NULL,
  `ins_name` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `service_minite_no` varchar(50) DEFAULT NULL,
  `course_start_date` date NOT NULL,
  `course_end_date` date DEFAULT NULL,
  `course_fee` decimal(10,2) DEFAULT NULL,
  `before_recieved` varchar(255) DEFAULT NULL,
  `bf_01course_name` varchar(255) DEFAULT NULL,
  `bf_01ins_name` varchar(255) DEFAULT NULL,
  `bf_01start_date` date DEFAULT NULL,
  `bf_01gov_paid` decimal(10,2) DEFAULT NULL,
  `bf_01full_course_fee` decimal(10,2) DEFAULT NULL,
  `bf_02course_name` varchar(255) DEFAULT NULL,
  `bf_02ins_name` varchar(255) DEFAULT NULL,
  `bf_02start_date` date DEFAULT NULL,
  `bf_02gov_paid` decimal(10,2) DEFAULT NULL,
  `bf_02full_course_fee` decimal(10,2) DEFAULT NULL,
  `up_porva_anu` varchar(255) DEFAULT NULL,
  `up_service_minite` varchar(255) DEFAULT NULL,
  `up_app_letter_confirm` varchar(255) DEFAULT NULL,
  `up_attach_sp` varchar(255) DEFAULT NULL,
  `up_course_selected` varchar(255) DEFAULT NULL,
  `up_campus_confirm` varchar(255) DEFAULT NULL,
  `up_course_complete` varchar(255) DEFAULT NULL,
  `up_pay_recept` varchar(255) DEFAULT NULL,
  `up_other` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `app_status` int(4) NOT NULL,
  `offi_cat` int(11) NOT NULL,
  `min_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dist_offi_id` int(11) NOT NULL,
  `Subject_Aprv_Rm` varchar(255) NOT NULL,
  `Subject_Reject_RM` varchar(255) NOT NULL,
  `Subject_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Subject_user_id` int(11) NOT NULL,
  `Office_head_Aprv_RM` varchar(255) NOT NULL,
  `Office_head_Reject_RM` varchar(255) NOT NULL,
  `Office_head_time_stamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `Office_head_user_id` int(11) NOT NULL,
  `Dist_offi_head_Aprv_RM` varchar(255) NOT NULL,
  `Dist_offi_head_Reject_RM` varchar(255) NOT NULL,
  `Dist_offi_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dist_offi_head_user_id` int(11) NOT NULL,
  `Dep_head_Aprv_RM` varchar(255) NOT NULL,
  `Dep_head_Reject_RM` varchar(255) NOT NULL,
  `Dep_head_time_stamp` int(11) NOT NULL DEFAULT current_timestamp(),
  `Dep_head_user_id` int(11) NOT NULL,
  `Min_head_Aprv_RM` varchar(255) NOT NULL,
  `Min_head_Reject_RM` varchar(255) NOT NULL,
  `Min_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Min_head_user_id` int(11) NOT NULL,
  `Chief_Head_Aprv_RM` varchar(255) NOT NULL,
  `Chief_Head_Reject_RM` varchar(255) DEFAULT NULL,
  `Chief_Head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Chief_Head_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_no`, `name_full`, `name_si`, `name_eng`, `nic`, `address_pri`, `tel_land`, `tel_mob`, `email_pri`, `service`, `grade`, `upp_status`, `desi`, `c_w_p`, `min`, `date_att_sp`, `ins_name`, `course_name`, `service_minite_no`, `course_start_date`, `course_end_date`, `course_fee`, `before_recieved`, `bf_01course_name`, `bf_01ins_name`, `bf_01start_date`, `bf_01gov_paid`, `bf_01full_course_fee`, `bf_02course_name`, `bf_02ins_name`, `bf_02start_date`, `bf_02gov_paid`, `bf_02full_course_fee`, `up_porva_anu`, `up_service_minite`, `up_app_letter_confirm`, `up_attach_sp`, `up_course_selected`, `up_campus_confirm`, `up_course_complete`, `up_pay_recept`, `up_other`, `created`, `app_status`, `offi_cat`, `min_id`, `dep_id`, `dist_offi_id`, `Subject_Aprv_Rm`, `Subject_Reject_RM`, `Subject_time_stamp`, `Subject_user_id`, `Office_head_Aprv_RM`, `Office_head_Reject_RM`, `Office_head_time_stamp`, `Office_head_user_id`, `Dist_offi_head_Aprv_RM`, `Dist_offi_head_Reject_RM`, `Dist_offi_head_time_stamp`, `Dist_offi_head_user_id`, `Dep_head_Aprv_RM`, `Dep_head_Reject_RM`, `Dep_head_time_stamp`, `Dep_head_user_id`, `Min_head_Aprv_RM`, `Min_head_Reject_RM`, `Min_head_time_stamp`, `Min_head_user_id`, `Chief_Head_Aprv_RM`, `Chief_Head_Reject_RM`, `Chief_Head_time_stamp`, `Chief_Head_user_id`) VALUES
(21, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'T.P.N.De Silva', '982972681V', '415/2', '717720219', '717720219', 'niroshanthirimadura1@gmail.com', 11, 34, 'ස්ථිරයි', 79, 51, 13, '2024-11-19', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '2024-11-19', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_21.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:21:23', 111, 5, 12, 3, 1, 'Approved', '', '2024-12-09 03:37:32', 4, 'Approved', '0', '2024-12-10 06:00:48.000000', 2, 'Approved', 'Rejected', '2024-12-10 06:32:11', 7, 'Approved', 'Rejected', 2147483647, 13, 'Approved', 'Rejected', '2024-12-10 08:08:20', 16, 'Approved', 'Rejected', '2024-12-10 08:21:23', 19),
(31, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'T.P.N.De Silva', '982972680V', '415/2', '0', '717720219', 'niroshanthirimadura@gmail.com', 11, 34, 'ස්ථිරයි', 80, 39, 14, '0000-00-00', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 0.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_31.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:13', 111, 6, 13, 6, 0, 'Approved', 'Rejected', '2024-12-09 06:49:32', 1, 'Approved', 'Rejected', '2024-12-09 06:53:09.000000', 3, '', '', '2024-12-03 04:31:38', 0, '', '', 2147483647, 0, '', '', '2024-12-05 07:34:54', 0, '', 'Rejected', '2024-12-10 08:29:13', 19),
(32, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972682V', '415/2', '717720219', '717720219', 'niroshanthirimadura2@gmail.com', 10, 33, 'ස්ථිරයි', 77, 33, 13, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_32.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:27', 111, 4, 12, 3, 1, 'Approved', 'Rejected', '2024-12-10 06:02:20', 9, '', '', '2024-12-03 03:38:00.363824', 0, 'Approved', 'Rejected', '2024-12-10 06:32:23', 7, 'Approved', 'Rejected', 2147483647, 13, 'Approved', 'Rejected', '2024-12-10 08:08:31', 16, '', 'Rejected', '2024-12-10 08:29:27', 19),
(33, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972683V', '415/2', '717720219', '717720219', 'niroshanthirimadura3@gmail.com', 6, 21, 'ස්ථිරයි', 56, 34, 11, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_33.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:37', 111, 4, 12, 3, 2, 'Approved', 'Rejected', '2024-12-10 06:36:05', 10, '', '', '2024-12-03 06:42:19.739845', 0, 'Approved', 'Reject', '2024-12-10 06:38:36', 12, 'Approved', '', 2147483647, 13, 'Approved', 'Rejected', '2024-12-10 08:08:40', 16, '', 'Rejected', '2024-12-10 08:29:37', 19),
(34, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972684V', '415/2', '717720219', '717720219', 'niroshanthirimadura4@gmail.com', 1, 2, 'ස්ථිරයි', 10, 12, 12, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '2024-12-16', '2024-12-31', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_34.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:49', 111, 2, 12, 0, 0, 'Approved', '', '2024-12-10 08:07:55', 15, '', '', '2024-12-05 06:30:51.608900', 0, '', '', '2024-12-05 06:30:51', 0, '', '', 2147483647, 0, 'Approved', 'Rejected', '2024-12-10 08:08:50', 16, '', 'Rejected', '2024-12-10 08:29:49', 19),
(35, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972685V', '415/2', '717720219', '717720219', 'niroshanthirimadura5@gmail.com', 1, 2, 'ස්ථිරයි', 14, 4, 11, '0000-00-00', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_35.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:31:03', 3, 1, 4, 0, 0, 'Approved', '', '2024-12-10 08:30:35', 18, '', '', '2024-12-05 08:32:23.446029', 0, '', '', '2024-12-05 08:32:23', 0, '', '', 2147483647, 0, '', '', '2024-12-05 08:32:23', 0, '', 'Rejected', '2024-12-10 08:31:03', 19);

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(512) DEFAULT NULL,
  `min_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`dep_id`, `dep_name`, `min_id`) VALUES
(1, 'Provincial Internal Audit Unit', 4),
(2, 'Management Development and Training Institute - Wakwella', 8),
(3, 'Department of Local Government', 12),
(4, 'Ayurveda Department', 12),
(5, 'Office of the Provincial Director of Health Services ', 12),
(6, 'Department of Provincial Education', 13),
(7, ' Department of Provincial Land Commissioner', 13),
(8, 'Department of Provincial Irrigation', 14),
(9, 'Department of Provincial Agriculture', 14),
(10, 'Department of Provincial Co-operative Development', 14),
(11, 'Department of Provincial Industrial Development', 15),
(12, 'Department of Provincial Animal Production and Health', 15),
(13, 'Department of Social Welfare, Probation & Childcare Services', 16),
(14, ' Department of Provincial Housing Commissioner', 16),
(15, 'Department of Sports ', 16),
(16, 'Department of Provincial Rural Development', 16);

-- --------------------------------------------------------

--
-- Table structure for table `desi`
--

CREATE TABLE `desi` (
  `desi_id` int(11) NOT NULL,
  `desi_name` varchar(512) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desi`
--

INSERT INTO `desi` (`desi_id`, `desi_name`, `service_id`) VALUES
(1, 'Secretary to the Governor', 1),
(2, 'Secretary', 1),
(3, 'Deputy Chief Secretary (Administration)', 1),
(4, 'Deputy Chief Secretary (Personnel & Training)', 1),
(5, 'Senior Assistant Secretary', 1),
(6, 'Commissioner of Local Government', 1),
(7, 'Municipal Commissioner', 1),
(8, 'Senior Assistant Secretary', 1),
(9, 'Additional Provincial Director of Education (Administration)', 1),
(10, 'Provincial  Land Commissioner ', 1),
(11, 'Commissioner of Cooperative Development', 1),
(12, 'Provincial Director ', 1),
(13, 'Commissioner of Social Welfare, Probation and Child Care', 1),
(14, 'Director', 1),
(15, 'Commissioner', 1),
(16, 'Provincial Deputy Director (Administration)', 1),
(17, 'DeputyCommissier of Local Government', 1),
(18, 'Deputy Municipal Commissioner', 1),
(19, 'Deputy Commissioner ', 1),
(20, 'Provincial Director of Rural Development', 1),
(21, 'Commissioner ', 1),
(22, 'Provincial Director ', 1),
(23, 'Deputy Chief Secretary (Finance)', 2),
(24, 'Chief Internal Auditor', 2),
(25, 'Chief Accountant (Accounts & Payments)', 2),
(26, 'Chief Accountant (Budget)', 2),
(27, 'Chief Accountant (Finance & Revenue)', 2),
(28, 'Chief Accountant ', 2),
(29, 'Internal Auditor', 2),
(30, 'Accountant', 2),
(31, 'Deputy Chief Secretary (Planning)', 3),
(32, 'Assistant/Deputy  Director (Planning)', 3),
(33, 'Assistant Director (Planning)', 3),
(34, 'Director (Planning)', 3),
(35, 'Provincial Director of Education ', 4),
(36, 'Additional Provincial Director of Education ', 4),
(37, 'Zonal Director of Education ', 4),
(38, 'Deputy Director of Education ', 4),
(39, 'Deputy Zonal Director of Education ', 4),
(40, 'Assistant/Deputy Director (Education) ', 4),
(41, 'Assistant/Deputy Director of Education ', 4),
(42, 'Divisional Director of Education ', 4),
(43, 'Principal', 4),
(44, 'Deputy Chief Secretary (Engineering)', 5),
(45, 'Director (Engineering)', 5),
(46, 'Chief Engineer (Buildings)', 5),
(47, 'Chief Engineer (Design)', 5),
(48, 'Chief Engineer (Technical)', 5),
(49, 'Provincial Director of Irrigation \r\n', 5),
(50, 'Chief Engineer (Irrigation)', 5),
(51, 'Engineer (Electrical)', 5),
(52, 'Engineer (Civil)', 5),
(53, 'Engineer (Mechanical)', 5),
(54, 'Engineer (Irrigation)', 5),
(55, 'Provincial  Director of Agriculture', 6),
(56, 'Additional Provincial  Director of Agriculture', 6),
(57, 'Deputy Director ', 6),
(58, 'Assistant/Deputy Director ', 6),
(59, 'Provincial Director ', 7),
(60, 'Additional Provincial  Director ', 7),
(61, 'Subject Matter Specialist', 7),
(62, 'Deputy Director', 7),
(63, 'Assistant/Deputy Director', 7),
(64, 'Veterinary Surgeon\r\n', 7),
(65, 'Animal Husbandary Officer', 7),
(66, 'Livestock Officer', 7),
(67, 'Commissioner of Provincial Ayurveda', 8),
(68, 'Assistant/Deputy Commissioner', 8),
(69, 'Ayurvedic  Medical Officer (Specialist)', 8),
(70, 'Supervisory Community Health Medical Officer', 8),
(71, 'Ayurvedic  Medical Officer', 8),
(72, 'Medical Superintendent(Ayurvedic)', 8),
(73, 'Ayurvedic  Medical Officer (Officer-In-Charge)', 8),
(74, 'Community Health Medical Officer', 8),
(75, 'Architect', 9),
(76, 'Chemist', 10),
(77, 'Entomologist', 10),
(78, 'Draftsman', 11),
(79, 'Technical Officer (Civil)', 11),
(80, 'Technical Officer ', 11),
(81, 'Senior Colonization Officer ', 11),
(82, 'Agriculture Instructor (Special)\r\n', 11),
(83, 'Livestock  Development Instructor', 11),
(84, 'Public Health Field Officer', 11);

-- --------------------------------------------------------

--
-- Table structure for table `dist_offi`
--

CREATE TABLE `dist_offi` (
  `dist_offi_id` int(11) NOT NULL,
  `dist_offi_name` varchar(512) DEFAULT NULL,
  `min_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dist_offi`
--

INSERT INTO `dist_offi` (`dist_offi_id`, `dist_offi_name`, `min_id`, `dep_id`) VALUES
(1, 'Office of the Assistant Commissioner of Local Government - Galle', 12, 3),
(2, 'Office of the Assistant Commissioner of Local Government -Matara', 12, 3),
(3, 'Office of the Assistant Commissioner of Local Government - Hambanthota', 12, 3),
(4, ' Office of the  Regional Director of Health Services - Galle District', 12, 5),
(5, 'Office of the Regional Director of Health Services - Matara District', 12, 5),
(6, 'Office of the  Regional Director of Health Services - Hambantota District', 12, 5),
(7, 'Zonal Education Office - Ambalangoda', 13, 6),
(8, 'Zonal Education Office - Walasmulla', 13, 6),
(9, 'Zonal Education Office - Udugama', 13, 6),
(10, 'Zonal Education Office - Hambanthota', 13, 6),
(11, 'Zonal Education Office - Mulatiyana', 13, 6),
(12, 'Zonal Education Office - Akuressa', 13, 6),
(13, 'Zonal Education Office - Matara', 13, 6),
(14, 'Zonal Education Office -Elpitiya', 13, 6),
(15, ' Zonal Education Office -Tangalle ', 13, 6),
(16, 'Zonal Education Office - Deniyaya, Morawaka', 13, 6),
(17, 'Zonal Education Office - Galle', 13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(512) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade_name`, `service_id`) VALUES
(1, 'Special', 1),
(2, 'I', 1),
(3, 'II', 1),
(4, 'III/II', 1),
(5, 'III', 1),
(6, 'Special', 2),
(7, 'I', 2),
(8, 'III/II', 2),
(9, 'III', 2),
(10, 'Special', 3),
(11, 'I', 3),
(12, 'III/II', 3),
(13, 'I', 4),
(14, 'II', 4),
(15, 'III/II', 4),
(16, 'Special', 5),
(17, 'I', 5),
(18, 'II', 5),
(19, 'III/II', 5),
(20, 'I', 6),
(21, 'II', 6),
(22, 'III/II', 6),
(23, 'I', 7),
(24, 'II', 7),
(25, 'III/II', 7),
(26, 'Admin I', 8),
(27, 'Admin II', 8),
(28, 'Special', 8),
(29, 'I', 8),
(30, 'II/I', 8),
(31, 'Prelim/II/I', 8),
(32, 'III/II', 9),
(33, 'III/II', 10),
(34, 'Special', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `min_id` int(11) NOT NULL,
  `min_name` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`min_id`, `min_name`) VALUES
(1, 'Governor\'s Secretariat'),
(2, 'Council Secretariat '),
(3, 'Provincial Public Service Commission'),
(4, 'Chief Secretary\'s Office'),
(5, 'Chief Secretary\'s Office - Deputy Chief Secretary (Planning)'),
(6, 'Chief Secretary\'s Office - Deputy Chief Secretary (Engineering)'),
(7, 'Chief Secretary\'s Office - Deputy Chief Secretary (Finance) '),
(8, 'Chief Secretary\'s Office - Deputy Chief Secretary (Personnel & Training)'),
(9, 'Provincial Co-operative Employee\'s Commission'),
(10, 'Department of Provincial Motor Vehicles'),
(11, 'Department of Provincial Revenue'),
(12, 'Chief Ministry '),
(13, 'Ministry of Education'),
(14, 'Ministry of Agriculture'),
(15, 'Ministry of Fisheries'),
(16, 'Ministry of Sports ');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `offi_id` int(11) NOT NULL,
  `offi_name` varchar(250) DEFAULT NULL,
  `offi_cat` int(11) DEFAULT NULL,
  `min_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `dist_offi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`offi_id`, `offi_name`, `offi_cat`, `min_id`, `dep_id`, `dist_offi_id`) VALUES
(1, 'Governor\'s Secretariat', 2, 1, 0, 0),
(2, 'Council Secretariat ', 2, 2, 0, 0),
(3, 'Provincial Public Service Commission', 2, 3, 0, 0),
(4, 'Chief Secretary\'s Office', 1, 4, 0, 0),
(5, 'Chief Secretary\'s Office - Deputy Chief Secretary (Planning)', 2, 5, 0, 0),
(6, 'Chief Secretary\'s Office - Deputy Chief Secretary (Engineering)', 2, 6, 0, 0),
(7, 'Chief Secretary\'s Office - Deputy Chief Secretary (Finance) ', 2, 7, 0, 0),
(8, 'Chief Secretary\'s Office - Deputy Chief Secretary (Personnel & Training)', 2, 8, 0, 0),
(9, 'Provincial Co-operative Employee\'s Commission', 2, 9, 0, 0),
(10, 'Department of Provincial Motor Vehicles', 2, 10, 0, 0),
(11, 'Department of Provincial Revenue', 2, 11, 0, 0),
(12, 'Chief Ministry ', 2, 12, 0, 0),
(13, 'Ministry of Education', 2, 13, 0, 0),
(14, 'Ministry of Agriculture', 2, 14, 0, 0),
(15, 'Ministry of Fisheries', 2, 15, 0, 0),
(16, 'Ministry of Sports ', 2, 16, 0, 0),
(17, 'Provincial Internal Audit Unit', 3, 4, 1, 0),
(18, 'Management Development and Training Institute - Wakwella', 3, 8, 2, 0),
(19, 'Department of Local Government', 3, 12, 3, 0),
(20, 'Ayurveda Department', 3, 12, 4, 0),
(21, 'Office of the Provincial Director of Health Services ', 3, 12, 5, 0),
(22, 'Department of Provincial Education', 3, 13, 6, 0),
(23, ' Department of Provincial Land Commissioner', 3, 13, 7, 0),
(24, 'Department of Provincial Irrigation', 3, 14, 8, 0),
(25, 'Department of Provincial Agriculture', 3, 14, 9, 0),
(26, 'Department of Provincial Co-operative Development', 3, 14, 10, 0),
(27, 'Department of Provincial Industrial Development', 3, 15, 11, 0),
(28, 'Department of Provincial Animal Production and Health', 3, 15, 12, 0),
(29, 'Department of Social Welfare, Probation & Childcare Services', 3, 16, 13, 0),
(30, ' Department of Provincial Housing Commissioner', 3, 16, 14, 0),
(31, 'Department of Sports ', 3, 16, 15, 0),
(32, 'Department of Provincial Rural Development', 3, 16, 16, 0),
(33, 'Office of the Assistant Commissioner of Local Government - Galle', 4, 12, 3, 1),
(34, 'Office of the Assistant Commissioner of Local Government -Matara', 4, 12, 3, 2),
(35, 'Office of the Assistant Commissioner of Local Government - Hambanthota', 4, 12, 3, 3),
(36, ' Office of the  Regional Director of Health Services - Galle District', 4, 12, 5, 4),
(37, 'Office of the Regional Director of Health Services - Matara District', 4, 12, 5, 5),
(38, 'Office of the  Regional Director of Health Services - Hambantota District', 4, 12, 5, 6),
(39, 'Zonal Education Office - Ambalangoda', 6, 13, 6, 0),
(40, 'Zonal Education Office - Walasmulla', 6, 13, 6, 0),
(41, 'Zonal Education Office - Udugama', 6, 13, 6, 0),
(42, 'Zonal Education Office - Hambanthota', 6, 13, 6, 0),
(43, 'Zonal Education Office - Mulatiyana', 6, 13, 6, 0),
(44, 'Zonal Education Office - Akuressa', 6, 13, 6, 0),
(45, 'Zonal Education Office - Matara', 6, 13, 6, 0),
(46, 'Zonal Education Office -Elpitiya', 6, 13, 6, 0),
(47, ' Zonal Education Office -Tangalle ', 6, 13, 6, 0),
(48, 'Zonal Education Office - Deniyaya', 6, 13, 6, 0),
(49, 'Zonal Education Office - Galle', 6, 13, 6, 0),
(50, 'Galle Municipal Council', 5, 12, 3, 1),
(51, 'Ambalangoda Urban Council', 5, 12, 3, 1),
(52, 'Hikkaduwa Urban Council', 5, 12, 3, 1),
(53, 'Bope Poddala Pradeshiya Sabhawa', 5, 12, 3, 1),
(54, 'Rajgama Pradeshiya Sabhawa', 5, 12, 3, 1),
(55, 'Niyagama Pradeshiya Sabhawa', 5, 12, 3, 1),
(56, 'Imaduwa Pradeshiya Sabhawa', 5, 12, 3, 1),
(57, 'Akmeemana Pradeshiya Sabhawa', 5, 12, 3, 1),
(58, 'Neluwa Pradeshiya Sabhawa', 5, 12, 3, 1),
(59, 'Welivitiya-Divithura Pradeshiya Sabhawa', 5, 12, 3, 1),
(60, 'Bentota Pradeshiya Sabhawa', 5, 12, 3, 1),
(61, 'Baddegama Pradeshiya Sabhawa', 5, 12, 3, 1),
(62, 'Nagoda Pradeshiya Sabhawa', 5, 12, 3, 1),
(63, 'Karandeniya Pradeshiya Sabhawa', 5, 12, 3, 1),
(64, 'Thawalama Pradeshiya Sabhawa', 5, 12, 3, 1),
(65, 'Yakkalamulla Pradeshiya Sabhawa', 5, 12, 3, 1),
(66, 'Habaraduwa Pradeshiya Sabhawa', 5, 12, 3, 1),
(67, ' Ambalangoda Pradeshiya Sabhawa', 5, 12, 3, 1),
(68, 'Elpitiya Pradeshiya Sabhawa', 5, 12, 3, 1),
(69, 'Balapitiya Pradeshiya Sabhawa', 5, 12, 3, 1),
(70, 'Matara Municipal  Council', 5, 12, 3, 2),
(71, 'Weligama Urban Council', 5, 12, 3, 2),
(72, 'Pitabeddara Pradeshiya Sabhawa', 5, 12, 3, 2),
(73, 'Athuraliya Pradeshiya Sabhawa', 5, 12, 3, 2),
(74, 'Dikwella Pradeshiya Sabhawa', 5, 12, 3, 2),
(75, 'Mulatiyana Pradeshiya Sabhawa', 5, 12, 3, 2),
(76, 'Kirinda-Puhulwella Pradeshiya Sabhawa', 5, 12, 3, 2),
(77, ' Kamburupitiya Pradeshiya Sabhawa', 5, 12, 3, 2),
(78, 'Matara Pradeshiya Sabhawa', 5, 12, 3, 2),
(79, 'Pasgoda Pradeshiya Sabhawa', 5, 12, 3, 2),
(80, 'Hakmana Pradeshiya Sabhawa', 5, 12, 3, 2),
(81, 'Kotapola Pradeshiya Sabhawa', 5, 12, 3, 2),
(82, 'Akuressa Pradeshiya Sabhawa', 5, 12, 3, 2),
(83, 'Weligama Pradeshiya Sabhawa', 5, 12, 3, 2),
(84, 'Thihagoda Pradeshiya Sabhawa', 5, 12, 3, 2),
(85, 'Malimbada Pradeshiya Sabhawa', 5, 12, 3, 2),
(86, 'Devinuwara Pradeshiya Sabhawa', 5, 12, 3, 2),
(87, 'Hambanthota Municipal Council', 5, 12, 3, 3),
(88, 'Tangalle Urban Council', 5, 12, 3, 3),
(89, 'Ambalantota Pradeshiya Sabhawa', 5, 12, 3, 3),
(90, 'Beliaththa Pradeshiya Sabhawa', 5, 12, 3, 3),
(91, 'Sooriyawewa Pradeshiya Sabhawa', 5, 12, 3, 3),
(92, 'Lunugamwehera Pradeshiya Sabhawa', 5, 12, 3, 3),
(93, 'Agunakolapalassa Pradeshiya Sabhawa', 5, 12, 3, 3),
(94, 'Katuwana Pradeshiya Sabhawa', 5, 12, 3, 3),
(95, 'Thissamaharamaya Pradeshiya Sabhawa', 5, 12, 3, 3),
(96, 'Hambantota Pradeshiya Sabhawa', 5, 12, 3, 3),
(97, 'Tangalle Pradeshiya Sabhawa', 5, 12, 3, 3),
(98, ' Weeraketiya Pradeshiya Sabhawa', 5, 12, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_Id` int(11) NOT NULL,
  `service_name` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_Id`, `service_name`) VALUES
(1, 'ශ්‍රී ලං.ප.සේ SLAS'),
(2, 'ශ්‍රී ලං.ග.සේ. SLAcS '),
(3, 'ශ්‍රී ලං.ක්‍ර.සේ. SLPS'),
(4, 'ශ්‍රී ලං.අ.ප.සේ. SLEAS'),
(5, 'ශ්‍රී ලං.ඉංජි.සේ. SLEgS'),
(6, 'ශ්‍රී ලං.කෘෂි.සේ. SLAgS'),
(7, 'ශ්‍රී ලං.ස.නි. හා සෞ.සේ. SLAPHS'),
(8, 'ශ්‍රී ලං.ආයුර්.වෛ.සේ. SLAyMS'),
(9, 'ශ්‍රී ලං.වා.වි.සේ. SLArchS'),
(10, 'ශ්‍රී ලං.වි.සේ. SLSS'),
(11, 'ශ්‍රී ලං.තා.සේ. SLTS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `offi_id` int(3) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `nic`, `email`, `tel`, `offi_id`, `password`, `otp`, `status`) VALUES
(1, 'Subject Officer 1', '1234', 'subjectofficer@gmail.com', '0911234567', 39, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(2, 'Office Head 1', '12345', 'officehead@gmail.com', '0911234567', 51, '202cb962ac59075b964b07152d234b70', '256375', '12'),
(3, 'Office Head 2', '12345A', 'officehead1@gmail.com', '0911234567', 39, '202cb962ac59075b964b07152d234b70', '256377', '12'),
(4, 'Subject Officer 2', '1234A', 'subjectofficer1@gmail.com', '0911234567', 51, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(5, 'Pasindu Niroshana', '982972680V', 'niroshanthirimadura@gmail.com', '0717720219', 39, '2884e86b6d3e8a29539360c97faf8bd7', '991544', '4'),
(6, 'Pasindu Niroshana', '982972681V', 'niroshanthirimadura1@gmail.com', '0717720219', 51, '2884e86b6d3e8a29539360c97faf8bd7', '991544', '4'),
(7, 'District Officer', '123456', 'districtofficer@gmail.com', '0911234567', 33, '202cb962ac59075b964b07152d234b70', '256374', '14'),
(8, 'Pasindu Niroshana', '982972682V', 'niroshanthirimadura2@gmail.com', '0717720219', 33, '2884e86b6d3e8a29539360c97faf8bd7', '991545', '4'),
(9, 'Subject Officer 3', '1234B', 'subjectofficer3@gmail.com', '0911234567', 33, '202cb962ac59075b964b07152d234b70', '256376', '11'),
(10, 'Subject Officer 4', '1234C', 'subjectofficer4@gmail.com', '0911234567', 34, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(11, 'Pasindu Niroshana', '982972683V', 'niroshanthirimadura3@gmail.com', '0717720219', 34, '2884e86b6d3e8a29539360c97faf8bd7', '991542', '4'),
(12, 'District Officer Matara', '123456A', 'districtofficer@gmail.com', '0911234567', 34, '202cb962ac59075b964b07152d234b70', '256375', '14'),
(13, 'Local Goverment Department Head', '1234567', 'departmenthead@gmail.com', '0911234567', 19, '202cb962ac59075b964b07152d234b70', '256375', '16'),
(14, 'Pasindu Niroshana', '982972684V', 'niroshanthirimadura4@gmail.com', '0717720219', 12, '2884e86b6d3e8a29539360c97faf8bd7', '991544', '4'),
(15, 'Subject Officer 4', '1234D', 'subjectofficer5@gmail.com', '0911234567', 12, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(16, 'Chief Ministry', '12345678', 'ministrythead@gmail.com', '0911234567', 12, '202cb962ac59075b964b07152d234b70', '256374', '18'),
(17, 'Pasindu Niroshana', '982972685V', 'niroshanthirimadura5@gmail.com', '0717720219', 4, '2884e86b6d3e8a29539360c97faf8bd7', '991547', '4'),
(18, 'Subject Officer 5', '1234E', 'subjectofficer6@gmail.com', '0911234567', 4, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(19, 'Chief Secretariat', '123456789', 'chiefsecetary@gmail.com', '0911234567', 4, '202cb962ac59075b964b07152d234b70', '254374', '20'),
(20, 'Pasindu Niroshana', '982972686V', 'niroshanthirimadura6@gmail.com', '0717720219', 4, '2884e86b6d3e8a29539360c97faf8bd7', '991547', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_no`),
  ADD KEY `FK_service` (`service`),
  ADD KEY `FK_grade` (`grade`),
  ADD KEY `FK_desi` (`desi`),
  ADD KEY `FK_ministry` (`min`),
  ADD KEY `FK_offi_id` (`c_w_p`);

--
-- Indexes for table `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `fk_min_id` (`min_id`);

--
-- Indexes for table `desi`
--
ALTER TABLE `desi`
  ADD PRIMARY KEY (`desi_id`),
  ADD KEY `fk_service_id` (`service_id`);

--
-- Indexes for table `dist_offi`
--
ALTER TABLE `dist_offi`
  ADD PRIMARY KEY (`dist_offi_id`),
  ADD KEY `fk_miin_id` (`min_id`),
  ADD KEY `fk_deep_id` (`dep_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`min_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`offi_id`),
  ADD KEY `fk_min` (`min_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`nic`),
  ADD KEY `FK_office` (`offi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_desi` FOREIGN KEY (`desi`) REFERENCES `desi` (`desi_id`),
  ADD CONSTRAINT `FK_grade` FOREIGN KEY (`grade`) REFERENCES `grade` (`grade_id`),
  ADD CONSTRAINT `FK_ministry` FOREIGN KEY (`min`) REFERENCES `ministry` (`min_id`),
  ADD CONSTRAINT `FK_offi_id` FOREIGN KEY (`c_w_p`) REFERENCES `office` (`offi_id`),
  ADD CONSTRAINT `FK_service` FOREIGN KEY (`service`) REFERENCES `service` (`service_Id`);

--
-- Constraints for table `dep`
--
ALTER TABLE `dep`
  ADD CONSTRAINT `fk_min_id` FOREIGN KEY (`min_id`) REFERENCES `ministry` (`min_id`);

--
-- Constraints for table `desi`
--
ALTER TABLE `desi`
  ADD CONSTRAINT `fk_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_Id`);

--
-- Constraints for table `dist_offi`
--
ALTER TABLE `dist_offi`
  ADD CONSTRAINT `fk_deep_id` FOREIGN KEY (`dep_id`) REFERENCES `dep` (`dep_id`),
  ADD CONSTRAINT `fk_miin_id` FOREIGN KEY (`min_id`) REFERENCES `ministry` (`min_id`);

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_Id`);

--
-- Constraints for table `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `fk_min` FOREIGN KEY (`min_id`) REFERENCES `ministry` (`min_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_office` FOREIGN KEY (`offi_id`) REFERENCES `office` (`offi_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
