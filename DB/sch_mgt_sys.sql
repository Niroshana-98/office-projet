-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 10:40 AM
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
(32, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972682V', '415/2', '717720219', '717720219', 'niroshanthirimadura2@gmail.com', 10, 33, 'ස්ථිරයි', 77, 33, 13, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_32.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:27', 111, 4, 12, 3, 1, 'Approved', 'Rejected', '2024-12-10 06:02:20', 9, '', '', '2024-12-03 03:38:00.363824', 0, 'Approved', 'Rejected', '2024-12-10 06:32:23', 7, 'Approved', 'Rejected', 2147483647, 13, 'Approved', 'Rejected', '2024-12-10 08:08:31', 16, '', 'Rejected', '2024-12-10 08:29:27', 19),
(33, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972683V', '415/2', '717720219', '717720219', 'niroshanthirimadura3@gmail.com', 6, 21, 'ස්ථිරයි', 56, 34, 11, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_33.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:37', 111, 4, 12, 3, 2, 'Approved', 'Rejected', '2024-12-10 06:36:05', 10, '', '', '2024-12-03 06:42:19.739845', 0, 'Approved', 'Reject', '2024-12-10 06:38:36', 12, 'Approved', '', 2147483647, 13, 'Approved', 'Rejected', '2024-12-10 08:08:40', 16, '', 'Rejected', '2024-12-10 08:29:37', 19),
(34, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972684V', '415/2', '717720219', '717720219', 'niroshanthirimadura4@gmail.com', 1, 2, 'ස්ථිරයි', 10, 12, 12, '2024-12-08', 'University Of Ruhuna', 'Computer Science', '12', '2024-12-16', '2024-12-31', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_34.PNG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-10 08:29:49', 111, 2, 12, 0, 0, 'Approved', '', '2024-12-10 08:07:55', 15, '', '', '2024-12-05 06:30:51.608900', 0, '', '', '2024-12-05 06:30:51', 0, '', '', 2147483647, 0, 'Approved', 'Rejected', '2024-12-10 08:08:50', 16, '', 'Rejected', '2024-12-10 08:29:49', 19),
(35, 'තිරිමාදුර පසිඳු නිරෝශන ද සිල්වා', 'Pasindu Niroshana', 'Pasindu Niroshana', '982972685V', '415/2', '717720219', '717720219', 'niroshanthirimadura5@gmail.com', 1, 2, 'ස්ථිරයි', 14, 4, 11, '0000-00-00', 'University Of Ruhuna', 'Computer Science', '12', '0000-00-00', '0000-00-00', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_35.PNG', 'uploads/up_service_minite/up_service_minite_35.png', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/up_other/up_other_35.png', '2024-12-19 18:56:43', 2, 1, 4, 0, 0, 'Rejected', 'Rejected', '2024-12-19 18:55:18', 18, '', '', '2024-12-05 08:32:23.446029', 0, '', '', '2024-12-05 08:32:23', 0, '', '', 2147483647, 0, '', '', '2024-12-05 08:32:23', 0, '', 'Rejected', '2024-12-10 08:31:03', 19),
(47, 'දිල්මි කාවින්ද්‍යා වීරප්පෙරුම', 'D.K.A.Weerapperuma', 'D.K.A.Weerapperuma', '996534120V', 'බද්දේගම', '0', '764607826', 'kavindyadilmi09@gmail.com', 1, 5, 'ස්ථිරයි', 2, 80, 12, '2020-03-05', 'කොළඹ විශ්ව විද්‍යාලය', 'රාජ්‍ය පරිපාලනය', '2.3', '2025-01-20', '2026-01-20', 200000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_47.jpg', 'uploads/up_service_minite/service_minite_47.jpg', 'uploads/up_app_letter_confirm/app_letter_confirm_47.jpg', 'uploads/up_attach_sp/attach_sp_47.jpg', 'uploads/up_course_selected/course_selected_47.jpg', NULL, NULL, NULL, '', '2024-12-20 09:02:09', 100, 5, 12, 3, 2, '', '', '2024-12-20 08:56:56', 28, 'test', '', '2024-12-20 08:58:27.000000', 29, '', '', '2024-12-20 09:00:34', 31, 'test', 'test reject', 2147483647, 33, '', '', '2024-12-20 09:02:09', 35, '', NULL, '2024-12-20 08:29:18', 0),
(48, 'දුෂාන්ත නුවන්ප්‍රිය පනංගල ', 'D.N.Panangala', 'D.N.Panangala', '822491898V', 'වංචාවල , ගාල්ල .', '91222222', '714498048', 'dunupa@gmail.com', 1, 2, 'ස්ථිරයි', 8, 49, 13, '2024-12-02', 'UoM', 'MSc', 'tr/23/09', '2024-12-02', '2026-10-20', 400000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_48.png', NULL, 'uploads/up_app_letter_confirm/app_letter_confirm_48.pdf', NULL, NULL, NULL, NULL, NULL, '', '2024-12-20 08:55:16', 110, 6, 13, 6, 0, 'Approved', '', '2024-12-20 08:45:31', 23, 'ok', '2,4', '2024-12-20 08:46:55.000000', 22, '', '', '2024-12-20 08:38:40', 0, '', '', 2147483647, 25, '', '1,23,4', '2024-12-20 08:54:47', 27, '', NULL, '2024-12-20 08:38:40', 0),
(49, 'අඅඅඅඅඅඅ ප්‍රබෝධා', 'A.Prabodha', 'A.Prabodha', '960000050V', 'කලේගාන, ගාල්ල', '914944012', '719001002', 'spcsrecruitment.inq@gmail.com', 4, 15, 'ස්ථිරයි', 38, 49, 13, '2024-08-20', 'කොළඹ විශ්වවිද්‍යාලය', 'අධ්‍යාපන කළමනාකරණය පිළිබඳ පශ්චාත් උපාධිය', '7-1', '2024-12-25', '2025-12-31', 200.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_49.jpg', 'uploads/up_service_minite/service_minite_49.jpg', 'uploads/up_app_letter_confirm/app_letter_confirm_49.jpg', 'uploads/up_attach_sp/attach_sp_49.jpg', 'uploads/up_course_selected/course_selected_49.jpg', 'uploads/up_campus_confirm/campus_confirm_49.jpg', NULL, NULL, '', '2024-12-20 10:02:06', 2, 6, 13, 6, 0, '', '', '2024-12-20 09:51:10', 0, '', '', '2024-12-20 09:51:10.418374', 0, '', '', '2024-12-20 09:51:10', 0, '', '', 2147483647, 0, '', '', '2024-12-20 09:51:10', 0, '', NULL, '2024-12-20 09:51:10', 0),
(50, 'හේවාවසම් බෙන්තොටගේ තිසාරා සන්දීපනී', 'එච්.බී.තිසාරා සන්දීපනී', 'H.B.Thisara Sandeepanie', '997860128V', 'ඌරල, වදුරඹ', '914944012', '701914446', 's22004074@ousl.lk', 4, 15, 'ස්ථිරයි', 43, 47, 13, '1976-09-20', 'කොළඹ විශ්ව විද්‍යාලය', 'මානව සම්පත් කළමනාකරණය', '7-1', '2024-12-11', '2026-12-20', 0.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_50.jpg', 'uploads/up_service_minite/service_minite_50.png', 'uploads/up_app_letter_confirm/app_letter_confirm_50.jpg', 'uploads/up_attach_sp/attach_sp_50.jpg', 'uploads/up_course_selected/course_selected_50.jpg', 'uploads/up_campus_confirm/campus_confirm_50.png', 'uploads/up_course_complete/course_complete_50.jpg', 'uploads/up_pay_recept/pay_recept_50.jpg', 'uploads/up_other/other_50.jpg', '2024-12-20 10:03:18', 2, 6, 13, 6, 0, '', '', '2024-12-20 09:52:21', 0, '', '', '2024-12-20 09:52:21.801983', 0, '', '', '2024-12-20 09:52:21', 0, '', '', 2147483647, 0, '', '', '2024-12-20 09:52:21', 0, '', NULL, '2024-12-20 09:52:21', 0),
(51, 'මහදුරගේ චතුරිකා දේශානි', 'එම්.ඩී.සී. දේශානි', 'M.D.C. Deshani', '847513900V', 'මේඛලා, කදුරුපේ පාර, බූස්ස.', '0', '772838452', 'dchathurika84@gmail.com', 1, 1, 'ස්ථිරයි', 4, 8, 8, '2010-02-10', 'විවෘත විශ්වවිද්‍යාලය', 'කළමනාකරණවේදී', '5', '2023-06-20', '2024-12-03', 52000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_51.JPG', 'uploads/up_service_minite/service_minite_51.JPG', 'uploads/up_app_letter_confirm/app_letter_confirm_51.JPG', 'uploads/up_attach_sp/attach_sp_51.JPG', 'uploads/up_course_selected/course_selected_51.JPG', NULL, NULL, NULL, '', '2024-12-20 10:01:01', 2, 2, 8, 0, 0, '', '', '2024-12-20 09:59:55', 0, '', '', '2024-12-20 09:59:55.035888', 0, '', '', '2024-12-20 09:59:55', 0, '', '', 2147483647, 0, '', '', '2024-12-20 09:59:55', 0, '', NULL, '2024-12-20 09:59:55', 0),
(52, '', 'ජී.වයි.සී.මාලනි', '', '198782010074', '', '0', '707965044', 'gycmalani@gmail.com', 1, 4, 'Open this select menu', 2, 8, 8, '2010-01-01', 'රුහුණ විශ්ව විද්‍යාලය', 'ආර්ථික විද්‍යා පශ්චාත් උපාධිය', '10.01', '2025-01-01', '2027-01-01', 200000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-20 10:03:26', 2, 2, 8, 0, 0, '', '', '2024-12-20 10:01:07', 0, '', '', '2024-12-20 10:01:07.854363', 0, '', '', '2024-12-20 10:01:07', 0, '', '', 2147483647, 0, '', '', '2024-12-20 10:01:07', 0, '', NULL, '2024-12-20 10:01:07', 0),
(53, 'සේනානායක දාසිලි ලියනගේ දිවාන්', 'එස්.ඩී.එල්.දිවාන්', 'එස්.ඩී.එල්.දිවාන්', '198533002040', 'නෙළුව', '788738585', '788738585', 'divansenanayake@gmail.com', 4, 14, 'ස්ථිරයි', 37, 13, 13, '2023-02-20', 'කොළඹ විශ්ව විද්‍යාලය', 'රාජ්‍ය පරිපාලනය', '2.3', '2024-12-02', '2025-01-21', 200000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_53.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-20 10:16:59', 2, 2, 13, 0, 0, '', '', '2024-12-20 10:15:56', 0, '', '', '2024-12-20 10:15:56.224560', 0, '', '', '2024-12-20 10:15:56', 0, '', '', 2147483647, 0, '', '', '2024-12-20 10:15:56', 0, '', NULL, '2024-12-20 10:15:56', 0),
(54, 'සේනානායක දාසිලි ලියනගේ දිවාන්', 'ඒ.පී.තිසරා', 'A.P.Thisara', '990000000V', 'නෙළුව', '0', '752030700', 'ahub2920@gmail.com', 8, 27, 'ස්ථිරයි', 72, 12, 12, '2024-07-24', 'කොළඹ විශ්ව විද්‍යාලය', 'රාජ්‍ය පරිපාලනය', '2.3', '2024-12-27', '2025-10-24', 200000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_54.jpg', 'uploads/up_service_minite/service_minite_54.jpg', NULL, NULL, NULL, NULL, 'uploads/up_course_complete/course_complete_54.jpg', NULL, '', '2024-12-24 08:04:04', 2, 2, 12, 0, 0, '', '', '2024-12-24 08:03:05', 0, '', '', '2024-12-24 08:03:05.013269', 0, '', '', '2024-12-24 08:03:05', 0, '', '', 2147483647, 0, '', '', '2024-12-24 08:03:05', 0, '', NULL, '2024-12-24 08:03:05', 0),
(55, 'ජීනසේන ලෝයල් මහතා', 'ජී.එල්.මහතා', 'G.L.Mahatha', '197500000000', 'Kaluwella, Galle', '4949494900', '712345678', 'spcsfor.schol@gmail.com', 3, 11, 'ස්ථිරයි', 32, 5, 5, '2015-12-25', 'Open University', 'Master of Project Management', '12-2', '2025-01-01', '2027-12-31', 300000.00, 'ඇත', 'Diploma in Management', 'University of Colombo', '2024-06-01', 0.00, 35000.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_55.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-24 08:14:50', 2, 2, 5, 0, 0, '', '', '2024-12-24 08:13:43', 0, '', '', '2024-12-24 08:13:43.051385', 0, '', '', '2024-12-24 08:13:43', 0, '', '', 2147483647, 0, '', '', '2024-12-24 08:13:43', 0, '', NULL, '2024-12-24 08:13:43', 0),
(56, 'ගීගන වතුර චන්දීපන් මාලනී', 'ජී.වයි.සී.මාලනි', 'G.Y.C.MALANI', '878202245V', 'වල්පිට දකුණ,බලගොඩ,පෝද්දල', '0', '707965044', 'deniroshansilva@gmail.com', 4, 14, 'ස්ථිරයි', 39, 49, 13, '2010-01-01', 'රුහුණ විශ්ව විද්‍යාලය', 'ආර්ථික විද්‍යා පශ්චාත් උපාධිය', '10.01', '2025-01-01', '2027-01-01', 200000.00, 'ඇත', 'රාජ්‍ය මූල්‍ය කළ.පශ්චාත් උපාධිය', 'ශ්‍රී ජයවර්ධනපුර විශ්ව විද්‍යාලය', '2017-10-20', 100000.00, 300000.00, '', '', '0000-00-00', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-24 09:31:18', 2, 6, 13, 6, 0, '', '', '2024-12-24 09:30:16', 0, '', '', '2024-12-24 09:30:16.304607', 0, '', '', '2024-12-24 09:30:16', 0, '', '', 2147483647, 0, '', '', '2024-12-24 09:30:16', 0, '', NULL, '2024-12-24 09:30:16', 0),
(57, 'හේවාවසම් බෙන්තොටගේ හංසි තත්සරණි', 'එච්.බී.හංසි තත්සරණි', 'H.B.Hansi Thathsarani', '997860148V', 'ඌරල, වදුරඹ', '764071408', '764071408', 'wakatic731@kelenson.com', 5, 19, 'ස්ථිරයි', 52, 19, 6, '2023-08-24', 'කොළඹ විශ්ව විද්‍යාලය', 'මානව සම්පත් කළමනාකරණය', '7-2', '2024-12-05', '2026-07-24', 0.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_57.jpg', 'uploads/up_service_minite/service_minite_57.jpg', 'uploads/up_app_letter_confirm/app_letter_confirm_57.jpg', NULL, NULL, NULL, NULL, NULL, '', '2024-12-24 09:43:26', 2, 3, 12, 3, 0, '', '', '2024-12-24 09:35:00', 0, '', '', '2024-12-24 09:35:00.621726', 0, '', '', '2024-12-24 09:35:00', 0, '', '', 2147483647, 0, '', '', '2024-12-24 09:35:00', 0, '', NULL, '2024-12-24 09:35:00', 0),
(58, 'සේනානායක දාසිලි ලියනගේ දිවාන්', 'ඒ.පෙරේරා', 'A.P.Thisara', '200500000000', 'නෙළුව', '716411443', '716411443', 'sitica4420@mowline.com', 2, 7, 'ස්ථිරයි', 24, 17, 7, '2018-10-29', 'කොළඹ විශ්ව විද්‍යාලය', 'රාජ්‍ය පරිපාලනය', '2.3', '2024-12-28', '2024-12-27', 200000.00, 'ඇත', 'කළමනාකරණ ඩිප්ලෝමාව', 'විවෘත විශ්ව විද්‍යලය', '2025-01-03', 25000.00, 50000.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/porva_anu_58.jpg', NULL, NULL, 'uploads/up_attach_sp/attach_sp_58.jpg', NULL, NULL, NULL, NULL, '', '2024-12-24 09:42:17', 2, 3, 4, 1, 0, '', '', '2024-12-24 09:37:18', 0, '', '', '2024-12-24 09:37:18.878139', 0, '', '', '2024-12-24 09:37:18', 0, '', '', 2147483647, 0, '', '', '2024-12-24 09:37:18', 0, '', NULL, '2024-12-24 09:37:18', 0),
(60, 'හේවාවසම් බෙන්තොටගේ හංසි තත්සරණි', 'එච්.බී.හංසි තත්සරණි', 'H.B.Hansi Thathsarani', '997860138V', 'ඌරල, වදුරඹ', '701914446', '772545687', 'dewihap963@matmayer.com', 1, 3, 'ස්ථිරයි', 11, 31, 16, '2022-05-27', 'කොළඹ විශ්ව විද්‍යාලය', 'මානව සම්පත් කළමනාකරණය', '7-1', '2023-12-27', '2026-05-27', 0.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, '', '', '0000-00-00', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-27 04:34:39', 1, 3, 16, 15, 0, '', '', '2024-12-27 04:34:39', 0, '', '', '2024-12-27 04:34:39.887630', 0, '', '', '2024-12-27 04:34:39', 0, '', '', 2147483647, 0, '', '', '2024-12-27 04:34:39', 0, '', NULL, '2024-12-27 04:34:39', 0),
(61, 'Pasindu Niroshana', 'පසිදු නිරොශන', 'T.P. Niroshana', '982972680V', 'Boossa, Galle', '763903736', '763903736', 'niroshanthirimadura@gmail.com', 4, 14, 'ස්ථිරයි', 38, 49, 13, '2024-12-10', 'University of Ruhuna', 'Computer Scince', '22-13-15', '2024-12-02', '2027-06-15', 300000.00, 'ඇත', 'BED', 'UOK', '2024-12-09', 100000.00, 300000.00, '', '', '0000-00-00', 0.00, 0.00, 'uploads/up_porva_anu/up_porva_anu_61.png', NULL, NULL, NULL, 'uploads/up_course_selected/course_selected_61.png', NULL, NULL, NULL, '', '2024-12-27 06:30:16', 100, 6, 13, 6, 0, '', '10203', '2024-12-27 06:21:20', 23, '', 'abc', '2024-12-27 06:22:48.000000', 22, '', '', '2024-12-27 05:21:09', 0, '', '', 2147483647, 25, '', '', '2024-12-27 06:30:16', 27, '', NULL, '2024-12-27 05:21:09', 0),
(62, 'මහදුරගේ චතුරිකා ', 'එම්.ඩී.සී. චතුරිකා', 'M.D.C.Chathurika', '812343900V', 'මේඛලා, කදුරුපේ පාර, බූස්ස.', '772838451', '772838450', 'spvacancies.cs@gmail.com', 11, 34, 'ස්ථිරයි', 79, 6, 6, '2020-02-27', 'technology', 'civil', '211', '2022-06-20', '2023-07-24', 52000.00, 'නැත', '', '', '0000-00-00', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2024-12-27 09:11:32', 2, 2, 6, 0, 0, '', '', '2024-12-27 09:11:16', 0, '', '', '2024-12-27 09:11:16.981783', 0, '', '', '2024-12-27 09:11:16', 0, '', '', 2147483647, 0, '', '', '2024-12-27 09:11:16', 0, '', NULL, '2024-12-27 09:11:16', 0);

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
(85, 'Assistant Secretary', 1);

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
  `email` varchar(50) NOT NULL,
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
(20, 'Pasindu Niroshana', '982972686V', 'niroshanthirimadura6@gmail.com', '0717720219', 4, '2884e86b6d3e8a29539360c97faf8bd7', '991547', '2'),
(22, 'Galla EDU DIR', 'GLEDZ', 'subjectofficer6@gmail.com', '0911234567', 49, '202cb962ac59075b964b07152d234b70', '256374', '12'),
(23, 'Galle EDU Subject', 'GLEDZ_SUB', 'subjectofficer6@gmail.com', '0911234567', 49, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(24, 'PDE Subject', 'PDE_SUB', 'subjectofficer6@gmail.com', '0911234567', 22, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(25, 'Provincial Educatiion Dir', 'PDE', 'subjectofficer6@gmail.com', '0911234567', 22, '202cb962ac59075b964b07152d234b70', '256374', '16'),
(26, 'MOE Subject', 'MOE_SUB', 'subjectofficer6@gmail.com', '0911234567', 13, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(27, 'MOE SEC', 'MOE', 'subjectofficer6@gmail.com', '0911234567', 13, '202cb962ac59075b964b07152d234b70', '256374', '18'),
(28, 'HKPS Subject', 'HKPS_SUB', 'subjectofficer6@gmail.com', '0911234567', 80, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(29, 'HKPS SEC', 'HKPS', 'subjectofficer6@gmail.com', '0911234567', 80, '202cb962ac59075b964b07152d234b70', '256374', '12'),
(30, 'AC Matara Subject', 'ACMT_SUB', 'subjectofficer6@gmail.com', '0911234567', 34, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(31, 'AC Matara Dir', 'ACMT', 'subjectofficer6@gmail.com', '0911234567', 34, '202cb962ac59075b964b07152d234b70', '256374', '14'),
(32, 'DLC Subject', 'DLC_SUB', 'subjectofficer6@gmail.com', '0911234567', 19, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(33, 'DLC Dir', 'DLC', 'subjectofficer6@gmail.com', '0911234567', 19, '202cb962ac59075b964b07152d234b70', '256374', '16'),
(34, 'CM Subject', 'CM_SUB', 'subjectofficer6@gmail.com', '0911234567', 12, '202cb962ac59075b964b07152d234b70', '256374', '11'),
(35, 'CM Dir', 'CM', 'subjectofficer6@gmail.com', '0911234567', 12, '202cb962ac59075b964b07152d234b70', '256374', '18'),
(36, 'D.N.Panangala', '822491898V', 'dunupa@gmail.com', '0714498048', 49, '202cb962ac59075b964b07152d234b70', '492624', '4'),
(37, 'D.K.A.Weerapperuma', '996534120V', 'kavindyadilmi09@gmail.com', '0764607826', 80, '578a3c7234647950fd26ca793ef77600', '380612', '4'),
(38, 'එම්.ඩී.සී. දේශානි', '847513900V', 'dchathurika84@gmail.com', '0772838452', 8, '4833e5878c00295d78d83e6083e38745', '330235', '4'),
(39, 'එච්.බී.තිසාරා සන්දීපනී', '997860128V', 's22004074@ousl.lk', '0701914446', 47, '48e5ef2649ddb6f12a6e6e8eda05b5df', '799708', '4'),
(40, 'ජී.වයි.සී.මාලනි', '198782010074', 'gycmalani@gmail.com', '0707965044', 8, 'b9a16a170f99dba8431fb943c32735e5', '787476', '4'),
(41, 'A.Prabodha', '960000050V', 'spcsrecruitment.inq@gmail.com', '0719001002', 49, '40f4b7443fd6bb014bc148ce7bf18317', '675631', '4'),
(42, 'Niroshana', '982974680V', 'niroshanathirimadura@gmail.com', '0763903736', 15, '2884e86b6d3e8a29539360c97faf8bd7', '756102', '1'),
(43, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'anjananeda@gmail.com', '0716411443', 13, '6426d602470779d5a4bbc909469eecf6', '623726', '2'),
(44, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'kavindyadilmi09@gmail.com', '0716411443', 13, '6426d602470779d5a4bbc909469eecf6', '171770', '1'),
(45, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'kavindyadilmi09@gmail.com', '0716411443', 13, '6426d602470779d5a4bbc909469eecf6', '914443', '1'),
(46, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'divansenanayake@gmail.com', '0716411443', 13, '6426d602470779d5a4bbc909469eecf6', '732852', '2'),
(47, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'anjananeda@gmail.com', '0716411443', 12, '6426d602470779d5a4bbc909469eecf6', '512469', '2'),
(48, 'එම්.ඩී.සී. දේශානි', '837513900V', 'spcomtraining.cs@gmail.com', '0772838452', 6, '4833e5878c00295d78d83e6083e38745', '201290', '2'),
(49, 'එම්.ඩී.සී. දේශානි', '837513900V', 'spcomtraining.cs@gmail.com', '0772838452', 6, '4833e5878c00295d78d83e6083e38745', '725518', '2'),
(50, 'priyangika sudarshani', '190000000000', 'priyangikasudarshani06@gmail.c', '0701234567', 71, '0b1c8bc395a9588a79cd3c191c22a6b4', '638205', '1'),
(51, 'එම්.ඩී.සී. දේශානි', '837513900V', 'spcomtraining.cs@gmail.com', '0772838452', 6, '948d16620c304b05f12c4be469dc0c0b', '713679', '1'),
(52, 'එස්.ඩී.එල්.ලලිත්', '857492692v', 'anjananeda@gmail.com', '0716411443', 12, '698d51a19d8a121ce581499d7b701668', '391299', '1'),
(53, 'එම්.ඩී.සී. දේශානි', '827513900V', 'spcomtraining.cs@gmail.com', '0772838452', 6, '3db4f2c3dbd5b50337736be50b9d69cd', '173179', '1'),
(56, 'එස්.ඩී.එල්.දිවාන්', '198533002040', 'divansenanayake@gmail.com', '0788738585', 13, '698d51a19d8a121ce581499d7b701668', '412600', '4'),
(57, 'P\'Sudarshani', '190000000000', 'hirushaimantha@gmail.com', '0711234567', 71, '0b1c8bc395a9588a79cd3c191c22a6b4', '507600', '2'),
(58, 'එම්.ඩී.සී. දේශානි', '817513900V', 'spcomtraining.cs@gmail.com', '0772838452', 6, 'a63884a8e03dbd92b4b35e049a6a87aa', '150879', '1'),
(71, 'T.A.Samanmalee', '962972680V', 'anuradhasamanmalee1996@gmail.com', '0763903736', 5, '2884e86b6d3e8a29539360c97faf8bd7', '777651', '2'),
(73, 'ඒ.පී.තිසරා', '990000000V', 'ahub2920@gmail.com', '0752030700', 12, '202cb962ac59075b964b07152d234b70', '955942', '4'),
(75, 'ජී.එල්.මහතා', '197500000000', 'spcsfor.schol@gmail.com', '0712345678', 5, 'ae62277411503eaeca3f3e7daf1d9b5a', '956225', '4'),
(76, 'ජී.වයි.සී.මාලනි', '878202244V', 'chandimalani@yahoo.com', '0707965044', 49, 'b9a16a170f99dba8431fb943c32735e5', '144960', '1'),
(77, 'එච්.බී.හංසි තත්සරණි', '997860125V', 'cadreinfo.cs@gmail.com', '0701914446', 19, '81dc9bdb52d04dc20036dbd8313ed055', '468031', '1'),
(78, 'ජී.වයි.සී.මාලනි', '878202245V', 'deniroshansilva@gmail.com', '0707965044', 49, 'b9a16a170f99dba8431fb943c32735e5', '328485', '4'),
(79, 'එච්.බී.හංසි තත්සරණි', '997860148V', 'wakatic731@kelenson.com', '0764071408', 19, 'e10adc3949ba59abbe56e057f20f883e', '248710', '4'),
(80, 'ඒ.පෙරේරා', '200500000000', 'sitica4420@mowline.com', '0716411443', 17, '202cb962ac59075b964b07152d234b70', '738843', '4'),
(81, 'කේ.ජී.ගයා සුරංගි', '875303597v', 'gaya.surangi7@gmailcom', '0715121906', 8, '8b50e0c82631759859dad79c553152c4', '760658', '1'),
(82, 'සි.ිසිාටස', '960000000V', 'juydozefyi@gufum.com', '0716411443', 16, '250cf8b51c773f3f8dc8b4be867a9a02', '162589', '2'),
(83, 'කේ.ජී.ගයා සුරංගි', '875303598V', 'gaya.surangi7@gmail.com', '0715121906', 8, '8b50e0c82631759859dad79c553152c4', '748131', '2'),
(84, 'එච්.බී.හංසි තත්සරණි', '997860138V', 'dewihap963@matmayer.com', '0772545687', 31, '86163c9222cac15c964c88abfc96f340', '213626', '3'),
(85, 'පසිදු නිරොශන', '982972680V', 'niroshanthirimadura@gmail.com', '0763903736', 49, '2884e86b6d3e8a29539360c97faf8bd7', '195059', '4'),
(86, 'එම්.ඩී.සී. චතුරිකා', '812343900V', 'spvacancies.cs@gmail.com', '0772838450', 6, '9f06b76a6552ccff3336981cbc20d218', '469738', '4');

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
  MODIFY `app_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
