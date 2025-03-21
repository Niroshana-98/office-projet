-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 02:42 PM
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
  `reason` int(1) DEFAULT NULL,
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
  `office_Rec_Aprv_RM` varchar(255) NOT NULL,
  `office_Rec_Reject_RM` varchar(255) NOT NULL,
  `office_Rec_time_stamp` timestamp NULL DEFAULT current_timestamp(),
  `office_Rec_user_id` int(11) NOT NULL,
  `office_Rec_Recommend` int(1) NOT NULL,
  `Office_head_Aprv_RM` varchar(255) NOT NULL,
  `Office_head_Reject_RM` varchar(255) NOT NULL,
  `Office_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Office_head_user_id` int(11) NOT NULL,
  `office_head_Recommend` int(1) NOT NULL,
  `Dist_Chk_Offi_Aprv_Rm` varchar(255) NOT NULL,
  `Dist_Chk_Offi_Reject_RM` varchar(255) NOT NULL,
  `Dist_Chk_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dist_Chk_Offi_user_id` int(11) NOT NULL,
  `Dist_Rec_Offi_Aprv_Rm` varchar(255) NOT NULL,
  `Dist_Rec_Offi_Reject_RM` varchar(255) NOT NULL,
  `Dist_Rec_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dist_Rec_Offi_user_id` int(11) NOT NULL,
  `Dist_Rec_Offi_Recommend` int(1) NOT NULL,
  `Dist_offi_head_Aprv_RM` varchar(255) NOT NULL,
  `Dist_offi_head_Reject_RM` varchar(255) NOT NULL,
  `Dist_offi_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dist_offi_head_user_id` int(11) NOT NULL,
  `Dist_offi_head_Recommend` int(1) NOT NULL,
  `Dep_Chk_Offi_Aprv_RM` varchar(255) NOT NULL,
  `Dep_Chk_Offi_Reject_RM` varchar(255) NOT NULL,
  `Dep_Chk_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dep_Chk_Offi_user_id` int(11) NOT NULL,
  `Dep_Rec_Offi_Aprv_RM` varchar(255) NOT NULL,
  `Dep_Rec_Offi_Reject_RM` varchar(255) NOT NULL,
  `Dep_Rec_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dep_Rec_Offi_user_id` int(11) NOT NULL,
  `Dep_Rec_Offi_Recommend` int(1) NOT NULL,
  `Dep_head_Aprv_RM` varchar(255) NOT NULL,
  `Dep_head_Reject_RM` varchar(255) NOT NULL,
  `Dep_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Dep_head_user_id` int(11) NOT NULL,
  `Dep_head_Recommend` int(1) NOT NULL,
  `Min_Chk_Offi_Aprv_RM` varchar(255) NOT NULL,
  `Min_Chk_Offi_Reject_RM` varchar(255) NOT NULL,
  `Min_Chk_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Min_Chk_Offi_user_id` int(11) NOT NULL,
  `Min_Rec_Offi_Aprv_RM` varchar(255) NOT NULL,
  `Min_Rec_Offi_Reject_RM` varchar(255) NOT NULL,
  `Min_Rec_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Min_Rec_Offi_user_id` int(11) NOT NULL,
  `Min_Rec_Offi_Recommend` int(1) NOT NULL,
  `Min_head_Aprv_RM` varchar(255) NOT NULL,
  `Min_head_Reject_RM` varchar(255) NOT NULL,
  `Min_head_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Min_head_user_id` int(11) NOT NULL,
  `Min_head_Recommend` int(1) NOT NULL,
  `CS_Chk_Offi_Aprv_RM` varchar(255) NOT NULL,
  `CS_Chk_Offi_Reject_RM` varchar(255) NOT NULL,
  `CS_Chk_Offi_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `CS_Chk_Offi_user_id` int(11) NOT NULL,
  `AO_Aprv_RM` varchar(255) NOT NULL,
  `AO_Reject_RM` varchar(255) NOT NULL,
  `AO_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `AO_user_id` int(11) NOT NULL,
  `AO_Recommend` int(1) NOT NULL,
  `ACS_Aprv_RM` varchar(255) NOT NULL,
  `ACS_Reject_RM` varchar(255) NOT NULL,
  `ACS_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACS_user_id` int(11) NOT NULL,
  `ACS_Recommend` int(1) NOT NULL,
  `DCS_Aprv_RM` varchar(255) NOT NULL,
  `DCS_Reject_RM` varchar(255) NOT NULL,
  `DCS_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `DCS_user_id` int(11) NOT NULL,
  `DCS_Recommend` int(1) NOT NULL,
  `CS_Aprv_RM` varchar(255) NOT NULL,
  `CS_Reject_RM` varchar(255) NOT NULL,
  `CS_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `CS_user_id` int(11) NOT NULL,
  `ACC1_Aprv_RM` varchar(255) NOT NULL,
  `ACC1_Reject_RM` varchar(255) NOT NULL,
  `ACC1_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACC1_user_id` int(11) NOT NULL,
  `ACC2_Aprv_RM` varchar(255) NOT NULL,
  `ACC2_Reject_RM` varchar(255) NOT NULL,
  `ACC2_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ACC2_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_no`, `reason`, `name_full`, `name_si`, `name_eng`, `nic`, `address_pri`, `tel_land`, `tel_mob`, `email_pri`, `service`, `grade`, `upp_status`, `desi`, `c_w_p`, `min`, `date_att_sp`, `ins_name`, `course_name`, `service_minite_no`, `course_start_date`, `course_end_date`, `course_fee`, `before_recieved`, `bf_01course_name`, `bf_01ins_name`, `bf_01start_date`, `bf_01gov_paid`, `bf_01full_course_fee`, `bf_02course_name`, `bf_02ins_name`, `bf_02start_date`, `bf_02gov_paid`, `bf_02full_course_fee`, `up_porva_anu`, `up_service_minite`, `up_app_letter_confirm`, `up_attach_sp`, `up_course_selected`, `up_campus_confirm`, `up_course_complete`, `up_pay_recept`, `up_other`, `created`, `app_status`, `offi_cat`, `min_id`, `dep_id`, `dist_offi_id`, `Subject_Aprv_Rm`, `Subject_Reject_RM`, `Subject_time_stamp`, `Subject_user_id`, `office_Rec_Aprv_RM`, `office_Rec_Reject_RM`, `office_Rec_time_stamp`, `office_Rec_user_id`, `office_Rec_Recommend`, `Office_head_Aprv_RM`, `Office_head_Reject_RM`, `Office_head_time_stamp`, `Office_head_user_id`, `office_head_Recommend`, `Dist_Chk_Offi_Aprv_Rm`, `Dist_Chk_Offi_Reject_RM`, `Dist_Chk_Offi_time_stamp`, `Dist_Chk_Offi_user_id`, `Dist_Rec_Offi_Aprv_Rm`, `Dist_Rec_Offi_Reject_RM`, `Dist_Rec_Offi_time_stamp`, `Dist_Rec_Offi_user_id`, `Dist_Rec_Offi_Recommend`, `Dist_offi_head_Aprv_RM`, `Dist_offi_head_Reject_RM`, `Dist_offi_head_time_stamp`, `Dist_offi_head_user_id`, `Dist_offi_head_Recommend`, `Dep_Chk_Offi_Aprv_RM`, `Dep_Chk_Offi_Reject_RM`, `Dep_Chk_Offi_time_stamp`, `Dep_Chk_Offi_user_id`, `Dep_Rec_Offi_Aprv_RM`, `Dep_Rec_Offi_Reject_RM`, `Dep_Rec_Offi_time_stamp`, `Dep_Rec_Offi_user_id`, `Dep_Rec_Offi_Recommend`, `Dep_head_Aprv_RM`, `Dep_head_Reject_RM`, `Dep_head_time_stamp`, `Dep_head_user_id`, `Dep_head_Recommend`, `Min_Chk_Offi_Aprv_RM`, `Min_Chk_Offi_Reject_RM`, `Min_Chk_Offi_time_stamp`, `Min_Chk_Offi_user_id`, `Min_Rec_Offi_Aprv_RM`, `Min_Rec_Offi_Reject_RM`, `Min_Rec_Offi_time_stamp`, `Min_Rec_Offi_user_id`, `Min_Rec_Offi_Recommend`, `Min_head_Aprv_RM`, `Min_head_Reject_RM`, `Min_head_time_stamp`, `Min_head_user_id`, `Min_head_Recommend`, `CS_Chk_Offi_Aprv_RM`, `CS_Chk_Offi_Reject_RM`, `CS_Chk_Offi_time_stamp`, `CS_Chk_Offi_user_id`, `AO_Aprv_RM`, `AO_Reject_RM`, `AO_time_stamp`, `AO_user_id`, `AO_Recommend`, `ACS_Aprv_RM`, `ACS_Reject_RM`, `ACS_time_stamp`, `ACS_user_id`, `ACS_Recommend`, `DCS_Aprv_RM`, `DCS_Reject_RM`, `DCS_time_stamp`, `DCS_user_id`, `DCS_Recommend`, `CS_Aprv_RM`, `CS_Reject_RM`, `CS_time_stamp`, `CS_user_id`, `ACC1_Aprv_RM`, `ACC1_Reject_RM`, `ACC1_time_stamp`, `ACC1_user_id`, `ACC2_Aprv_RM`, `ACC2_Reject_RM`, `ACC2_time_stamp`, `ACC2_user_id`) VALUES
(1, 1, 'Dilmi Kavindya Amarasiri Weerapperuma', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'D.K.A.Weerapperuma', '996534120V', 'akuratiya, Baddegama', '0', '764607826', 'kavindyadilmi09@gmail.com', 1, 5, 'ස්ථිරයි', 19, 33, 12, '2021-10-16', 'කොළඹ විශ්ව විද්‍යාලය', 'කළමනාකරණවෙදි', '5.2', '2024-01-16', '2026-10-16', 220000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-03-20 01:54:10', 260, 4, 12, 3, 1, 'Approved By Subject Officer', '', '2025-01-16 09:22:41', 2, '', '', '2025-01-16 05:06:04', 0, 0, '', '', '2025-01-16 05:06:04', 0, 0, '', '', '2025-01-16 05:06:04', 0, 'Approved By District Recommend Officer', 'Reject By District Recommend Officer', '2025-01-16 09:41:44', 8, 0, '', '', '2025-01-17 03:34:46', 9, 0, 'Approved By Department Check Officer', '', '2025-01-17 06:31:36', 10, 'Approved By Department Recommend Officer', '', '2025-01-17 08:41:09', 11, 0, '', '', '2025-01-18 06:17:13', 12, 0, '', '', '2025-01-18 10:59:49', 13, 'Reject By Ministry Recommend Officer', '', '2025-01-18 11:32:35', 14, 0, 'Approved By Ministry Head', '', '2025-01-20 04:23:30', 15, 0, 'Approved By CS Check Officer', '', '2025-01-20 07:42:41', 16, 'Approved By CS AO Officer', '', '2025-01-20 09:57:11', 37, 0, 'Approved By CS ACS Officer', '', '2025-01-21 04:48:04', 38, 0, '', '', '2025-01-21 06:07:18', 39, 0, 'Approved By CS', '', '2025-01-21 08:42:03', 40, 'Approved By ACC 1', '', '2025-01-21 09:45:10', 41, 'Approved By ACC 2', '', '2025-01-21 09:52:08', 42),
(2, 2, 'කාරියවසම් මහේෂ්', 'කාරියවසම් මයා ', 'K.Mahesh', '197500000000', 'අංක 2, ගාල්ල', '711234567', '711234567', 'spcsrecruitment.inq@gmail.com', 1, 2, 'ස්ථිරයි', 15, 50, 12, '2018-01-01', 'University of Colombo', 'Master of Management', '127', '2024-12-01', '2025-01-31', 135000.00, 'ඇත', 'diploma in management', '', '2023-01-15', 0.00, 25000.00, '', '', '0000-00-00', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-03-20 02:15:14', 140, 5, 12, 3, 1, 'Approved By Subject Officer', '', '2025-01-16 08:22:03', 1, 'Approved By Recommend Officer', '', '2025-01-16 08:49:06', 5, 0, 'Approved By Office Head', '', '2025-01-16 08:53:27', 6, 0, 'Approved By District Check Officer', '', '2025-01-16 08:59:16', 7, 'Approved By District Recommend Officer', '', '2025-01-16 09:42:02', 8, 0, 'Approved By District Head', '', '2025-01-17 03:35:34', 9, 0, 'Approved By Department Check Officer', '', '2025-01-17 06:33:08', 10, 'Approved By Department Recommend Officer', '', '2025-01-17 08:41:18', 11, 0, 'Approved By Department Head', '', '2025-01-18 06:17:32', 12, 0, 'Approved By Ministry Check Officer', '', '2025-01-18 11:00:19', 13, '', '', '2025-01-18 11:32:44', 14, 0, 'Approved By Ministry Head', '', '2025-01-20 04:23:41', 15, 0, '', '', '2025-01-20 07:44:07', 16, '', '', '2025-01-20 10:01:11', 37, 0, '', '', '2025-01-21 04:48:12', 38, 0, '', '', '2025-01-21 06:07:38', 39, 0, 'Approved By CS', '', '2025-01-21 08:42:14', 40, '', '', '2025-01-21 09:45:21', 41, '', '', '2025-01-21 09:52:15', 42),
(3, 1, 'Dilmi Kavindya Amarasiri Weerapperuma', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'D.K.A.Weerapperuma', '996534121V', 'akuratiya, Baddegama', '0', '764607826', 'ahub2920@gmail.com', 2, 9, 'ස්ථිරයි', 30, 19, 12, '2025-01-16', 'කොළඹ විශ්ව විද්‍යාලය', 'කළමනාකරණවෙදි', '5.2', '0000-00-00', '2025-01-16', 220000.00, 'ඇත', 'කළමනාකරණවේදි ඩිප්ලොමා', 'විවෘත විශ්ව විද්‍යලය', '2025-01-16', 30000.00, 120000.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-02-25 07:58:44', 240, 3, 12, 3, 0, 'Approved By Subject Officer', '', '2025-01-16 08:02:45', 3, '', '', '2025-01-16 05:19:32', 0, 0, '', '', '2025-01-16 05:19:32', 0, 0, '', '', '2025-01-16 05:19:32', 0, '', '', '2025-01-16 05:19:32', 0, 0, '', '', '2025-01-16 05:19:32', 0, 0, '', '', '2025-01-16 05:19:32', 0, 'Approved By Department Recommend Officer', '', '2025-01-17 08:41:26', 11, 0, '', '', '2025-01-18 06:17:40', 12, 0, '', '', '2025-01-18 11:00:27', 13, '', '', '2025-02-23 10:25:11', 14, 1, '', '', '2025-02-23 12:57:13', 15, 1, '', '', '2025-02-24 04:18:17', 16, '', '', '2025-02-24 08:07:59', 37, 1, '', '', '2025-02-25 03:12:41', 38, 1, '', '', '2025-02-25 04:58:37', 39, 1, '', '', '2025-02-25 07:58:44', 40, 'Approved By ACC 1', '', '2025-01-21 09:45:30', 41, 'Approved By ACC 2', '', '2025-01-21 09:52:24', 42),
(4, 1, 'Dilmi Kavindya Amarasiri Weerapperuma', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'D.K.A.Weerapperuma', '996534123V', 'akuratiya, Baddegama', '0', '764607826', 'imacreation61@gmail.com', 3, 11, 'ස්ථිරයි', 32, 12, 12, '2025-01-16', 'කොළඹ විශ්ව විද්‍යාලය', 'කළමනාකරණවෙදි', '5.2', '2025-01-16', '2025-01-16', 220000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-02-19 03:19:18', 260, 2, 12, 0, 0, 'Approved By Subject Officer', '', '2025-01-16 08:03:19', 4, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, 0, '', '', '2025-01-16 05:44:08', 0, '', '', '2025-01-18 11:33:03', 14, 0, '', '', '2025-01-20 04:24:00', 15, 0, '', '', '2025-01-20 07:44:46', 16, '', '', '2025-01-20 10:01:53', 37, 0, 'Approved By CS ACS Officer', '', '2025-01-21 04:48:30', 38, 0, '', '', '2025-01-21 06:08:11', 39, 0, 'Approved By CS', '', '2025-01-21 08:42:32', 40, 'Approved By ACC 1', '', '2025-01-21 09:45:39', 41, 'Approved By ACC 2', '', '2025-01-21 09:52:33', 42),
(5, 2, 'Dilmi Kavindya Amarasiri Weerapperuma', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'D.K.A.Weerapperuma', '996534124V', 'akuratiya, Baddegama', '764607826', '764607826', 'usedemo627@gmail.com', 4, 13, 'ස්ථිරයි', 39, 39, 13, '2025-01-16', 'කොළඹ විශ්ව විද්‍යාලය', 'කළමනාකරණවෙදි', '5.2', '2025-01-16', '2025-01-16', 220000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-02-19 03:19:22', 105, 6, 13, 6, 0, 'Approved By Subject Officer', '', '2025-01-16 08:04:14', 25, 'Approved By Recommend Officer', '', '2025-01-16 08:48:02', 28, 0, '', '', '2025-01-18 02:17:00', 29, 0, '', '', '2025-01-16 05:47:53', 0, '', '', '2025-01-16 05:47:53', 0, 0, '', '', '2025-01-16 05:47:53', 0, 0, 'Approved By Department Check Officer', '', '2025-01-18 04:29:54', 30, 'Approved By Department Recommend Officer', '', '2025-01-18 05:32:54', 32, 0, 'Approved By Department Head', '', '2025-01-18 05:54:52', 33, 0, 'Approved By Ministry Check Officer', '', '2025-01-18 11:47:50', 34, 'Approved By Ministry Recommend Officer', '', '2025-01-18 12:00:10', 35, 0, '', '', '2025-01-20 04:20:34', 36, 0, 'Approved By CS Check Officer', '', '2025-01-20 07:44:56', 16, 'Approved By CS AO Officer', '', '2025-01-20 10:02:05', 37, 0, '', '', '2025-01-21 04:48:38', 38, 0, 'Approved By CS DCS Officer', '', '2025-01-21 06:08:22', 39, 0, 'Approved By CS', '', '2025-01-21 08:42:44', 40, '', '', '2025-01-21 09:45:46', 41, '', '', '2025-01-21 09:52:40', 42),
(6, 1, 'Dilmi Kavindya Amarasiri Weerapperuma', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'D.K.A.Weerapperuma', '996534125V', 'akuratiya, Baddegama', '0', '764607826', 'imalshakmp@gmail.com', 4, 13, 'ස්ථිරයි', 36, 22, 13, '2025-01-16', 'කොළඹ විශ්ව විද්‍යාලය', 'කළමනාකරණවෙදි', '5.2', '2025-01-16', '2025-01-16', 220000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-02-19 03:19:26', 260, 3, 13, 6, 0, '', '', '2025-01-18 04:30:22', 26, '', '', '2025-01-16 05:51:54', 0, 0, '', '', '2025-01-16 05:51:54', 0, 0, '', '', '2025-01-16 05:51:54', 0, '', '', '2025-01-16 05:51:54', 0, 0, '', '', '2025-01-16 05:51:54', 0, 0, '', '', '2025-01-16 05:51:54', 0, 'Approved Department Department Recommend Officer', '', '2025-01-18 05:34:04', 32, 0, '', '', '2025-01-18 05:55:01', 33, 0, '', '', '2025-01-18 11:47:57', 34, '', '', '2025-01-18 12:00:16', 35, 0, 'Approved By Ministry Head', '', '2025-01-20 04:21:09', 36, 0, '', '', '2025-01-20 07:45:03', 16, '', '', '2025-01-20 10:02:11', 37, 0, 'Approved By CS ACS Officer', '', '2025-01-21 04:48:47', 38, 0, 'Approved By CS DCS Officer', '', '2025-01-21 06:08:30', 39, 0, '', '', '2025-01-21 08:42:50', 40, 'Approved By ACC 1', '', '2025-01-21 09:45:53', 41, 'Approved By ACC 2', '', '2025-01-21 09:52:49', 42),
(13, 2, 'Dushantha Nuwanpriya Panangala', 'ටී.පී.එන්. ද සිල්වා', 'T.P.N.De Silva', 'GML_REC', 'Boossa, Galle', '714498048', '763903736', 'niroshanthirimadura4@gmail.com', 6, 21, 'ස්ථිරයි', 55, 50, 12, '2025-02-02', 'University of Colombo', 'Msc', '2011/12/05 NO 12', '2025-02-03', '2025-02-28', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_13.png', NULL, NULL, NULL, 'uploads/up_course_selected/course_selected_13.png', NULL, NULL, NULL, '', '2025-02-25 07:58:56', 240, 5, 12, 3, 1, 'Approved', '', '2025-02-20 04:39:51', 1, 'Approved', '', '2025-02-20 05:48:41', 5, 1, 'Approved', '', '2025-02-20 09:27:15', 6, 1, 'Aprroved', '', '2025-02-20 09:27:41', 7, '', '', '2025-02-21 08:22:52', 8, 1, '', '', '2025-02-21 08:23:18', 9, 1, '', '', '2025-02-22 13:39:24', 10, '', '', '2025-02-22 13:39:50', 11, 2, '', '', '2025-02-22 14:20:36', 12, 1, '', '', '2025-02-23 05:55:57', 13, 'Approved', '', '2025-02-23 10:24:26', 14, 1, '', '', '2025-02-24 05:39:31', 15, 1, '', '', '2025-02-24 05:40:03', 16, '', '', '2025-02-24 08:08:08', 37, 2, '', '', '2025-02-25 06:15:06', 38, 1, '', '', '2025-02-25 06:15:30', 39, 1, 'Approved', '', '2025-02-25 07:58:56', 40, '', '', '2025-02-18 04:44:48', 0, '', '', '2025-02-18 04:44:48', 0),
(15, 1, 'Dushantha Nuwanpriya Panangala', 'ටී.පී.එන්. ද සිල්වා', 'D.N.Panangala', 'GML_OFF', 'Wanchawala, Galle', '715615399', '763903736', 'niroshanthirimadura5@gmail.com', 6, 21, 'ස්ථිරයි', 56, 50, 12, '2025-02-09', 'University of Colombo', 'Msc', '2011/12/05 NO 12', '2025-02-06', '2025-02-28', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_15.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2025-02-25 07:59:08', 221, 5, 12, 3, 1, 'Approved', '', '2025-02-20 04:46:38', 1, '', '', '2025-02-20 04:47:04', 5, 1, '', '', '2025-02-20 05:49:19', 6, 1, 'Approved', '', '2025-02-21 04:56:26', 7, 'Approved', '', '2025-02-21 04:57:11', 8, 1, '', '', '2025-02-22 12:18:31', 9, 1, '', '', '2025-02-22 12:19:00', 10, '', '', '2025-02-22 12:28:10', 11, 2, '', '', '2025-02-23 10:22:52', 12, 1, 'Approved', '', '2025-02-23 11:57:50', 13, '', '', '2025-02-23 14:17:06', 14, 1, '', '', '2025-02-24 03:15:52', 15, 1, '', '', '2025-02-24 04:18:34', 16, '', '', '2025-02-25 04:05:55', 37, 1, '', '', '2025-02-25 04:06:17', 38, 2, '', '', '2025-02-25 04:58:28', 39, 1, '', 'Reject', '2025-02-25 07:59:08', 40, '', '', '2025-02-20 04:45:44', 0, '', '', '2025-02-20 04:45:44', 0),
(16, 2, 'තිරිමාදුර පසිදු නිරෝශන ද සිල්වා', 'ටී.පී.එන්. ද සිල්වා', 'T.P.N.De Silva', 'ACLG_REC', 'Wanchawala, Galle', '715615399', '763903736', 'niroshanthirimadura@gmail.com\n', 7, 23, 'ස්ථිරයි', 61, 33, 12, '2025-02-02', 'University of Colombo', '', '2011/12/05 NO 12', '2025-02-01', '2025-02-28', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_16.png', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/up_pay_recept/pay_recept_16.png', '', '2025-03-21 12:19:59', 240, 4, 12, 3, 1, 'Approved', '', '2025-02-20 09:57:43', 2, '', '', '2025-02-20 09:54:35', 0, 0, '', '', '2025-02-20 09:54:35', 0, 0, '', '', '2025-02-20 09:54:35', 0, 'Approved', '', '2025-02-21 03:57:01', 8, 1, '', '', '2025-02-22 04:20:21', 9, 1, '', '', '2025-02-22 04:25:46', 10, '', '', '2025-02-23 05:42:25', 11, 1, '', '', '2025-02-23 05:43:18', 12, 1, '', '', '2025-02-23 05:56:25', 13, '', '', '2025-02-23 10:24:57', 14, 2, '', '', '2025-02-23 12:58:40', 15, 2, '', '', '2025-02-24 09:37:03', 16, '', '', '2025-02-24 09:37:47', 37, 1, '', '', '2025-02-25 03:13:12', 38, 1, '', '', '2025-02-25 04:59:01', 39, 2, '', '', '2025-03-21 12:19:59', 40, '', '', '2025-02-20 09:54:35', 0, '', '', '2025-02-20 09:54:35', 0),
(17, 2, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'ඩී.කේ.ඒ.වීරප්පෙරුම', 'T.P.N. De Silva', '996534126V', '415/2, Idamtota, Ambalangoda', '764930627', '764607826', 'deniroshansilva@gmail.com', 3, 11, 'ස්ථිරයි', 32, 13, 13, '2025-03-17', 'University of Ruhuna', 'Computer Science', '14', '2025-03-10', '2025-03-28', 500000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, NULL, 'uploads/up_service_minite/service_minite_17.png', 'uploads/up_app_letter_confirm/up_app_letter_confirm_17.png', 'uploads/up_attach_sp/attach_sp_17.png', NULL, NULL, NULL, NULL, '', '2025-03-17 05:29:45', 2, 2, 13, 0, 0, 'Reject', 'Reject', '2025-03-17 04:16:49', 27, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-17 04:15:23', 35, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-13 12:03:21', 0, '', '', '2025-03-13 12:03:21', 0);

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
(84, 'Public Health Field Officer', 11),
(85, 'Assistant Chief Secretary', 1),
(86, 'Assistant Secretary', 1),
(87, 'Management Service Officer', 12),
(88, 'Development Officer', 13);

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
(5, 'III', 1),
(6, 'Special', 2),
(7, 'I', 2),
(8, 'II', 2),
(9, 'III', 2),
(10, 'Special', 3),
(11, 'I', 3),
(12, 'II', 3),
(13, 'I', 4),
(14, 'II', 4),
(15, 'III', 4),
(16, 'Special', 5),
(17, 'I', 5),
(18, 'II', 5),
(19, 'III', 5),
(20, 'I', 6),
(21, 'II', 6),
(22, 'III', 6),
(23, 'I', 7),
(24, 'II', 7),
(25, 'III', 7),
(26, 'Admin I', 8),
(27, 'Admin II', 8),
(28, 'Special', 8),
(29, 'I', 8),
(30, 'II', 8),
(31, 'Prelim', 8),
(32, 'II', 9),
(33, 'II', 10),
(34, 'Special', 11),
(35, 'III', 3),
(36, 'III', 9),
(37, 'III', 10);

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
(4, 'Chief Secretary\'s Office - Deputy Chief Secretary (Admin)'),
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
(4, 'Chief Secretary\'s Office - Deputy Chief Secretary (Admin)', 2, 4, 0, 0),
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
(11, 'ශ්‍රී ලං.තා.සේ. SLTS'),
(12, 'MSO'),
(13, 'DO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `offi_id` int(3) NOT NULL,
  `desi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `status` varchar(3) DEFAULT '1',
  `temp_status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `nic`, `email`, `tel`, `offi_id`, `desi`, `password`, `otp`, `status`, `temp_status`) VALUES
(1, 'ටී.පී.එන්. ද සිල්වා', 'GML_SUB', 'niroshanthirimadura@gmail.com', '0763903736', 50, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '325946', '10', ''),
(2, 'ටී.පී.එන්. ද සිල්වා', 'ACLG_SUB', 'niroshanthirimadura1@gmail.com', '0763903736', 33, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(3, 'ටී.පී.එන්. ද සිල්වා', 'DOLG_SUB', 'niroshanthirimadura2@gmail.com', '0763903736', 19, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(4, 'ටී.පී.එන්. ද සිල්වා', 'CM_SUB', 'niroshanthirimadura3@gmail.com', '0763903736', 12, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(5, 'ටී.පී.එන්. ද සිල්වා', 'GML_REC', 'niroshanthirimadura4@gmail.com', '0763903736', 50, 'Office Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '18', ''),
(6, 'ටී.පී.එන්. ද සිල්වා', 'GML_OFF', 'niroshanthirimadura5@gmail.com', '0763903736', 50, 'Office Head', '202cb962ac59075b964b07152d234b70', '196908', '22', ''),
(7, 'ටී.පී.එන්. ද සිල්වා', 'ACLG_CHK', 'niroshanthirimadura6@gmail.com', '0763903736', 33, 'District Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '26', ''),
(8, 'ටී.පී.එන්. ද සිල්වා', 'ACLG_REC', 'niroshanthirimadura@gmail.com\n', '0763903736', 33, 'District Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '30', ''),
(9, 'ටී.පී.එන්. ද සිල්වා', 'ACLG_OFF', 'niroshanthirimadura8@gmail.com', '0763903736', 33, 'District Office Head', '202cb962ac59075b964b07152d234b70', '196908', '34', ''),
(10, 'ටී.පී.එන්. ද සිල්වා', 'DOLG_CHK', 'niroshanthirimadura9@gmail.com', '0763903736', 19, 'Department Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '38', ''),
(11, 'ටී.පී.එන්. ද සිල්වා', 'DOLG_REC', 'niroshanthirimadura10@gmail.com', '0763903736', 19, 'Department Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '42', ''),
(12, 'ටී.පී.එන්. ද සිල්වා', 'DOLG_OFF', 'niroshanthirimadura11@gmail.com', '0763903736', 19, 'Department Office Head', '202cb962ac59075b964b07152d234b70', '196908', '46', ''),
(13, 'ටී.පී.එන්. ද සිල්වා', 'CM_CHK', 'niroshanthirimadura12@gmail.com', '0763903736', 12, 'Ministry Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '50', ''),
(14, 'ටී.පී.එන්. ද සිල්වා', 'CM_REC', 'niroshanthirimadura13@gmail.com', '0763903736', 12, 'Ministry Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '54', ''),
(15, 'ටී.පී.එන්. ද සිල්වා', 'CM_OFF', 'niroshanthirimadura14@gmail.com', '0763903736', 12, 'Ministry Office Head', '202cb962ac59075b964b07152d234b70', '196908', '58', ''),
(16, 'ටී.පී.එන්. ද සිල්වා', 'CS_CHK', 'niroshanthirimadura15@gmail.com', '0763903736', 4, 'CS Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '62', ''),
(17, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534120V', 'kavindyadilmi09@gmail.com', '0764607826', 33, '', '202cb962ac59075b964b07152d234b70', '999652', '4', ''),
(18, 'කාරියවසම් මයා ', '197500000000', 'spcsrecruitment.inq@gmail.com', '0711234567', 50, 'Director', '202cb962ac59075b964b07152d234b70', '814789', '4', ''),
(19, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534121V', 'ahub2920@gmail.com', '0764607826', 19, '', '202cb962ac59075b964b07152d234b70', '987373', '4', ''),
(20, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534122V', 's22004074@ousl.lk', '0764607826', 12, '', 'd6dca697346c252d0e6116bd85e12ab8', '966857', '4', ''),
(21, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534123V', 'imacreation61@gmail.com', '0764607826', 12, '', '202cb962ac59075b964b07152d234b70', '145140', '4', ''),
(22, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534124V', 'usedemo627@gmail.com', '0764607826', 39, '', '202cb962ac59075b964b07152d234b70', '310390', '4', ''),
(23, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534125V', 'imalshakmp@gmail.com', '0764607826', 22, '', 'd6dca697346c252d0e6116bd85e12ab8', '815458', '4', ''),
(24, 'ඩී.කේ.ඒ.වීරප්පෙරුම', '996534126V', 'deniroshansilva@gmail.com', '0764607826', 13, '', '202cb962ac59075b964b07152d234b70', '323690', '4', ''),
(25, 'ටී.පී.එන්. ද සිල්වා', 'ZEO_SUB', 'niroshanthirimadura16@gmail.com', '0763903736', 39, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(26, 'ටී.පී.එන්. ද සිල්වා', 'DPE_SUB', 'niroshanthirimadura17@gmail.com', '0763903736', 22, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(27, 'ටී.පී.එන්. ද සිල්වා', 'MOE_SUB', 'niroshanthirimadura18@gmail.com', '0763903736', 13, 'Subject Officer', '202cb962ac59075b964b07152d234b70', '196908', '10', ''),
(28, 'ටී.පී.එන්. ද සිල්වා', 'ZEO_REC', 'niroshanthirimadura19@gmail.com', '0763903736', 39, 'Office Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '18', ''),
(29, 'ටී.පී.එන්. ද සිල්වා', 'ZEO_OFF', 'niroshanthirimadura20@gmail.com', '0763903736', 39, 'Office Head', '202cb962ac59075b964b07152d234b70', '196908', '22', ''),
(30, 'ටී.පී.එන්. ද සිල්වා', 'DPE_CHK', 'niroshanthirimadura21@gmail.com', '0763903736', 22, 'Department Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '38', ''),
(32, 'ටී.පී.එන්. ද සිල්වා', 'DPE_REC', 'niroshanthirimadura23@gmail.com', '0763903736', 22, 'Department Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '42', ''),
(33, 'ටී.පී.එන්. ද සිල්වා', 'DPE_OFF', 'niroshanthirimadura24@gmail.com', '0763903736', 22, 'Department Office Head', '202cb962ac59075b964b07152d234b70', '196908', '46', ''),
(34, 'ටී.පී.එන්. ද සිල්වා', 'MOE_CHK', 'niroshanthirimadura25@gmail.com', '0763903736', 13, 'Ministry Check Officer', '202cb962ac59075b964b07152d234b70', '196908', '50', ''),
(35, 'ටී.පී.එන්. ද සිල්වා', 'MOE_REC', 'niroshanthirimadura26@gmail.com', '0763903736', 13, 'Ministry Recommend Officer', '202cb962ac59075b964b07152d234b70', '196908', '54', ''),
(36, 'ටී.පී.එන්. ද සිල්වා', 'MOE_OFF', 'niroshanthirimadura27@gmail.com', '0763903736', 13, 'Ministry Office Head', '202cb962ac59075b964b07152d234b70', '196908', '58', ''),
(37, 'ටී.පී.එන්. ද සිල්වා', 'CS_AO', 'niroshanthirimadura16@gmail.com', '0763903736', 4, 'CS AO Officer', '202cb962ac59075b964b07152d234b70', '196908', '66', ''),
(38, 'ටී.පී.එන්. ද සිල්වා', 'CS_ACS', 'niroshanthirimadura17@gmail.com', '0763903736', 4, 'CS ACS Officer', '202cb962ac59075b964b07152d234b70', '196908', '70', ''),
(39, 'ටී.පී.එන්. ද සිල්වා', 'CS_DCS', 'niroshanthirimadura18@gmail.com', '0763903736', 4, 'CS DCS Officer', '202cb962ac59075b964b07152d234b70', '196908', '74', ''),
(40, 'ටී.පී.එන්. ද සිල්ව', 'CS', 'niroshanthirimadura19@gmail.com', '0763903736', 4, 'CS', '202cb962ac59075b964b07152d234b70', '196908', '78', ''),
(41, 'ටී.පී.එන්. ද සිල්ව', 'ACC1', 'niroshanthirimadura20@gmail.com', '0763903736', 4, 'Accountant 1', '202cb962ac59075b964b07152d234b70', '196908', '82', ''),
(42, 'ටී.පී.එන්. ද සිල්වා', 'ACC2', 'niroshanthirimadura21@gmail.com', '0763903736', 4, 'Accountant 2', '202cb962ac59075b964b07152d234b70', '196908', '86', ''),
(44, 'ටී.පී.එන්. ද සිල්වා', 'ADMIN', 'desilva.niroshana98@gmail.com', '0763903736', 4, 'Super Admin', '202cb962ac59075b964b07152d234b70', '526318', '100', ''),
(48, 'ටීපීඑන්දසිල්වා', '982971680V', 'anuradhasamanmalee1996@gmail.com', '0763903736', 4, 'Municipal Commissioner', '202cb962ac59075b964b07152d234b70', '476633', '58', ''),
(50, 'ටී.පී.එන්. ද සිල්වා', 'CS_DCSs', 'niroshanthirimadura48@gmail.com', '0763903736', 4, 'CS DCS Officer', '202cb962ac59075b964b07152d234b70', '196908', '74', '');

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
  MODIFY `app_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
