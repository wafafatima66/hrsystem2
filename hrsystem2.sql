-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 06:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrsystem2`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position_no` varchar(100) NOT NULL,
  `applicant_id` varchar(100) DEFAULT NULL,
  `applicant_rating` varchar(100) DEFAULT NULL,
  `applicant_rank` varchar(100) DEFAULT NULL,
  `applicant_first_name` varchar(100) DEFAULT NULL,
  `applicant_last_name` varchar(100) DEFAULT NULL,
  `applicant_middle_name` varchar(100) DEFAULT NULL,
  `applicant_ext` varchar(100) DEFAULT NULL,
  `applicant_gender` varchar(100) DEFAULT NULL,
  `applicant_country` varchar(100) DEFAULT NULL,
  `applicant_state` varchar(100) DEFAULT NULL,
  `applicant_municipal` varchar(100) DEFAULT NULL,
  `applicant_zip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `item_no`, `position_no`, `applicant_id`, `applicant_rating`, `applicant_rank`, `applicant_first_name`, `applicant_last_name`, `applicant_middle_name`, `applicant_ext`, `applicant_gender`, `applicant_country`, `applicant_state`, `applicant_municipal`, `applicant_zip`) VALUES
(6, 'item1', '', 'appli2', '   first', 'sec', 'Quincy', 'Kirk', 'Yvonne Velazquez', 'Nesciunt omnis inci', 'Eos eum laboris accu', 'Papua New Guinea', 'Aut laborum magna ex', 'Minus placeat sed n', '86150'),
(9, '', '25-Dec-1978', '2021FG', '  HIGH', 'Et vel adipisicing c', 'Zephania', 'Campbell', 'Britanni Mcpherson', 'Sint illum deserun', 'Qui animi cupidatat', 'Turkey', 'Earum ducimus solut', 'Autem voluptatem rem', '63765'),
(13, 'Item3', '', '2021OIB', '  Sed ', '3', 'Kathleen', 'Daugherty', 'Fredericka', 'Anim ea rem ut disti', 'Similique', 'Serbia', 'Officia debitis iure', 'Deleniti itaque null', '25005'),
(14, 'item4', '', '2021POK', ' veniam', 'temporibus', 'Shana', 'Howe', 'Hiroko ', 'Fugiat eos exercita', 'obcaec', 'Uganda', 'Ipsum ', 'Optio ', '89367'),
(16, 'item1', '', '2021df', ' 3', '4', 'Keely', 'Frank', 'Brynne Higgins', 'Iusto exercitationem', 'Adipisci sunt dolore', 'Singapore', 'Amet quae pariatur', 'Id ut vel rem perspi', '62020');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_file`
--

CREATE TABLE `applicant_file` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `applicant_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_file`
--

INSERT INTO `applicant_file` (`id`, `file_name`, `applicant_id`) VALUES
(1, 'applicant - app1-OVERVIEW-OF-THE-SYSTEM-Part-2.docx', 'app1'),
(2, 'applicant - appli2-OVERVIEW-OF-THE-SYSTEM.docx', 'appli2'),
(3, 'applicant - appli2-OVERVIEW-OF-THE-SYSTEM-performance-management.docx', 'appli2'),
(4, 'applicant - app1-OVERVIEW-OF-THE-SYSTEM-Part-2.docx', 'app1'),
(5, 'applicant - app1-OVERVIEW-OF-THE-SYSTEM.docx', 'app1'),
(6, 'applicant - app1-OVERVIEW-OF-THE-SYSTEM-performance-management.docx', 'app1'),
(7, 'applicant - 2021FG-OVERVIEW-OF-THE-SYSTEM-Part-2.docx', '2021FG'),
(8, 'applicant - 2021FG-OVERVIEW-OF-THE-SYSTEM.docx', '2021FG');

-- --------------------------------------------------------

--
-- Table structure for table `cont_position`
--

CREATE TABLE `cont_position` (
  `id` int(11) NOT NULL,
  `position_no` varchar(100) DEFAULT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `salary_grade` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cont_position`
--

INSERT INTO `cont_position` (`id`, `position_no`, `position_name`, `salary_grade`, `duration`, `from_date`, `to_date`, `status`, `date_posted`) VALUES
(3, '25-Dec-1978', 'Zeus Craig', '05-Jan-2017', '22-Dec-2010', '1997-07-27', '1988-10-22', 0, '2021-08-19'),
(4, 'pos2', 'Rae Hendrix', '29-Oct-2011', '29-Mar-2021', '2007-09-26', '2012-10-06', 0, '2021-08-19'),
(5, 'pos1', 'officer', 'neutral', '2days', '1984-12-11', '1979-11-18', 0, '2021-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'dept1'),
(2, 'dept2'),
(3, 'dept3');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_image` varchar(100) DEFAULT NULL,
  `emp_first_name` varchar(45) DEFAULT NULL,
  `emp_middle_name` varchar(45) DEFAULT NULL,
  `emp_last_name` varchar(45) DEFAULT NULL,
  `emp_ext` varchar(45) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_gender` varchar(10) DEFAULT NULL,
  `emp_civil_status` varchar(45) DEFAULT NULL,
  `emp_height` int(10) DEFAULT NULL,
  `emp_weight` int(10) DEFAULT NULL,
  `emp_blood` varchar(5) DEFAULT NULL,
  `emp_citizen` varchar(100) DEFAULT NULL,
  `emp_nationality` varchar(50) DEFAULT NULL,
  `emp_resi_add` varchar(100) DEFAULT NULL,
  `emp_resi_add_street` varchar(100) DEFAULT NULL,
  `emp_resi_add_municipal` varchar(100) DEFAULT NULL,
  `emp_resi_add_barangay` varchar(100) DEFAULT NULL,
  `emp_resi_add_zipcode` varchar(100) DEFAULT NULL,
  `emp_per_add` varchar(100) DEFAULT NULL,
  `emp_per_add_street` varchar(100) DEFAULT NULL,
  `emp_per_add_municipal` varchar(100) DEFAULT NULL,
  `emp_per_add_barangay` varchar(100) DEFAULT NULL,
  `emp_per_add_zipcode` varchar(100) DEFAULT NULL,
  `emp_tel_no` varchar(100) DEFAULT NULL,
  `emp_mb_no` varchar(100) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_contact_gs` int(100) DEFAULT NULL,
  `emp_contact_pag` int(100) DEFAULT NULL,
  `emp_contact_ph` int(100) DEFAULT NULL,
  `emp_contact_ss` int(100) DEFAULT NULL,
  `emp_contact_tin` int(100) DEFAULT NULL,
  `emp_contact_agency` int(100) DEFAULT NULL,
  `emp_spouse_lastname` varchar(100) DEFAULT NULL,
  `emp_spouse_firstname` varchar(100) DEFAULT NULL,
  `emp_spouse_middlename` varchar(100) DEFAULT NULL,
  `emp_spouse_extname` varchar(100) DEFAULT NULL,
  `emp_sp_occupation` varchar(20) DEFAULT NULL,
  `emp_sp_employer` varchar(20) DEFAULT NULL,
  `emp_sp_add` varchar(50) DEFAULT NULL,
  `emp_sp_tel` int(20) DEFAULT NULL,
  `emp_father_lastname` varchar(100) DEFAULT NULL,
  `emp_father_firstname` varchar(100) DEFAULT NULL,
  `emp_father_middlename` varchar(100) DEFAULT NULL,
  `emp_father_extname` varchar(100) DEFAULT NULL,
  `emp_mother_lastname` varchar(100) DEFAULT NULL,
  `emp_mother_firstname` varchar(100) DEFAULT NULL,
  `emp_mother_middlename` varchar(100) DEFAULT NULL,
  `emp_mother_extname` varchar(100) DEFAULT NULL,
  `ele_school_name` varchar(100) DEFAULT NULL,
  `ele_degree` varchar(100) DEFAULT NULL,
  `ele_from_date` date DEFAULT NULL,
  `ele_to_date` date DEFAULT NULL,
  `ele_units` int(100) DEFAULT NULL,
  `ele_award` varchar(100) DEFAULT NULL,
  `ele_graduation` varchar(50) DEFAULT NULL,
  `sec_school_name` varchar(100) DEFAULT NULL,
  `sec_degree` varchar(100) DEFAULT NULL,
  `sec_from_date` date DEFAULT NULL,
  `sec_to_date` date DEFAULT NULL,
  `sec_units` int(100) DEFAULT NULL,
  `sec_award` varchar(100) DEFAULT NULL,
  `sec_graduation` int(50) DEFAULT NULL,
  `voc_school_name` varchar(100) DEFAULT NULL,
  `voc_degree` varchar(100) DEFAULT NULL,
  `voc_from_date` date DEFAULT NULL,
  `voc_to_date` date DEFAULT NULL,
  `voc_units` int(100) DEFAULT NULL,
  `voc_award` varchar(100) DEFAULT NULL,
  `voc_graduation` int(50) DEFAULT NULL,
  `coll_school_name` varchar(100) DEFAULT NULL,
  `coll_degree` varchar(100) DEFAULT NULL,
  `coll_from_date` date DEFAULT NULL,
  `coll_to_date` date DEFAULT NULL,
  `coll_units` int(100) DEFAULT NULL,
  `coll_award` varchar(100) DEFAULT NULL,
  `coll_graduation` int(50) DEFAULT NULL,
  `gra_school_name` varchar(100) DEFAULT NULL,
  `gra_degree` varchar(100) DEFAULT NULL,
  `gra_from_date` date DEFAULT NULL,
  `gra_to_date` date DEFAULT NULL,
  `gra_units` int(100) DEFAULT NULL,
  `gra_award` varchar(100) DEFAULT NULL,
  `gra_graduation` int(50) DEFAULT NULL,
  `condition_1` varchar(10) DEFAULT NULL,
  `condition_2` varchar(10) DEFAULT NULL,
  `condition_2_des` varchar(100) DEFAULT NULL,
  `condition_3` varchar(10) DEFAULT NULL,
  `condition_3_des` varchar(100) DEFAULT NULL,
  `condition_4` varchar(10) DEFAULT NULL,
  `condition_4_des` varchar(100) DEFAULT NULL,
  `condition_4_date` date DEFAULT NULL,
  `condition_4_status` varchar(100) DEFAULT NULL,
  `condition_5` varchar(10) DEFAULT NULL,
  `condition_5_des` varchar(100) DEFAULT NULL,
  `condition_6` varchar(10) DEFAULT NULL,
  `condition_6_des` varchar(100) DEFAULT NULL,
  `condition_7` varchar(10) DEFAULT NULL,
  `condition_7_des` varchar(100) DEFAULT NULL,
  `condition_8` varchar(10) DEFAULT NULL,
  `condition_8_des` varchar(100) DEFAULT NULL,
  `condition_9` varchar(10) DEFAULT NULL,
  `condition_9_des` varchar(100) DEFAULT NULL,
  `condition_10` varchar(10) DEFAULT NULL,
  `condition_10_des` varchar(100) DEFAULT NULL,
  `condition_11` varchar(10) DEFAULT NULL,
  `condition_11_des` varchar(100) DEFAULT NULL,
  `condition_12` varchar(10) DEFAULT NULL,
  `condition_12_des` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `emp_image`, `emp_first_name`, `emp_middle_name`, `emp_last_name`, `emp_ext`, `emp_dob`, `emp_gender`, `emp_civil_status`, `emp_height`, `emp_weight`, `emp_blood`, `emp_citizen`, `emp_nationality`, `emp_resi_add`, `emp_resi_add_street`, `emp_resi_add_municipal`, `emp_resi_add_barangay`, `emp_resi_add_zipcode`, `emp_per_add`, `emp_per_add_street`, `emp_per_add_municipal`, `emp_per_add_barangay`, `emp_per_add_zipcode`, `emp_tel_no`, `emp_mb_no`, `emp_email`, `emp_contact_gs`, `emp_contact_pag`, `emp_contact_ph`, `emp_contact_ss`, `emp_contact_tin`, `emp_contact_agency`, `emp_spouse_lastname`, `emp_spouse_firstname`, `emp_spouse_middlename`, `emp_spouse_extname`, `emp_sp_occupation`, `emp_sp_employer`, `emp_sp_add`, `emp_sp_tel`, `emp_father_lastname`, `emp_father_firstname`, `emp_father_middlename`, `emp_father_extname`, `emp_mother_lastname`, `emp_mother_firstname`, `emp_mother_middlename`, `emp_mother_extname`, `ele_school_name`, `ele_degree`, `ele_from_date`, `ele_to_date`, `ele_units`, `ele_award`, `ele_graduation`, `sec_school_name`, `sec_degree`, `sec_from_date`, `sec_to_date`, `sec_units`, `sec_award`, `sec_graduation`, `voc_school_name`, `voc_degree`, `voc_from_date`, `voc_to_date`, `voc_units`, `voc_award`, `voc_graduation`, `coll_school_name`, `coll_degree`, `coll_from_date`, `coll_to_date`, `coll_units`, `coll_award`, `coll_graduation`, `gra_school_name`, `gra_degree`, `gra_from_date`, `gra_to_date`, `gra_units`, `gra_award`, `gra_graduation`, `condition_1`, `condition_2`, `condition_2_des`, `condition_3`, `condition_3_des`, `condition_4`, `condition_4_des`, `condition_4_date`, `condition_4_status`, `condition_5`, `condition_5_des`, `condition_6`, `condition_6_des`, `condition_7`, `condition_7_des`, `condition_8`, `condition_8_des`, `condition_9`, `condition_9_des`, `condition_10`, `condition_10_des`, `condition_11`, `condition_11_des`, `condition_12`, `condition_12_des`) VALUES
(6, '2021er', 'employee2021er-employee2021XF-download.jpg', 'Lana', 'Kyla Haynes', ' Alexander', 'Dolore qui fuga Eni', '0000-00-00', 'Dolor dese', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(12, '2021po', NULL, 'Honorato', 'Brenden Foster', 'Bradshaw', 'Ut eum non est dolor', NULL, 'Amet quo i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2021df', NULL, 'Keely', 'Brynne Higgins', 'Frank', 'Iusto exercitationem', NULL, 'Adipisci s', NULL, NULL, NULL, NULL, NULL, 'Singapore', 'Amet quae pariatur', NULL, 'Id ut vel rem perspi', NULL, '62020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_agency`
--

CREATE TABLE `employee_agency` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary_grade` varchar(100) DEFAULT NULL,
  `date_of_effectivity` date DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `nature` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `date_of_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_agency`
--

INSERT INTO `employee_agency` (`id`, `emp_id`, `appointment_date`, `item_no`, `position`, `salary_grade`, `date_of_effectivity`, `department`, `office`, `nature`, `job_type`, `date_created`, `designation`, `date_of_expiry`) VALUES
(1, 'app1', '2021-08-21', 'item1', 'High', 'high', NULL, 'dept1', 'off1', 'Original', 'Permanent', '0000-00-00', '', '0000-00-00'),
(2, '2021er', NULL, 'item1', 'High', 'high', NULL, 'Culpa mollit ', 'Voluptas dolor', 'Original', 'Permanent', '2021-08-20', 'Iste face', '2016-05-22'),
(3, '202198', '2021-08-17', 'item1', 'High', 'high', NULL, NULL, NULL, 'Original', 'Permanent', '0000-00-00', '', '0000-00-00'),
(4, '2021OIB', '2021-08-25', 'Item3', 'position1', 'high', NULL, NULL, NULL, 'Original', 'Permanent', '0000-00-00', '', '0000-00-00'),
(5, '2021POK', '0000-00-00', 'item4', 'position2', '20-Nov-2018', NULL, 'DEPTNEW', 'officenew', 'Original', 'Permanent', '0000-00-00', '', '0000-00-00'),
(6, '2021yu', NULL, 'item2', 'High', 'Kin', NULL, 'Impedit commodo id', 'Est sed est laborum ', 'Original', 'Permanent', '1994-06-25', 'Molestiae possimus ', '1976-12-17'),
(7, '2021QW', NULL, 'item1', 'High', 'high', NULL, 'Illum eos corrupti', 'Pariatur Sed ipsa ', 'Original', 'Permanent', '2021-08-20', 'Tenetur qui id exerc', '1972-07-22'),
(8, '2021err', NULL, 'item1', 'High', 'high', NULL, 'Maiores et perspicia', 'Sit nostrud ea veni', 'Original', 'Permanent', '2021-08-20', 'Iste soluta fugit i', '1995-09-28'),
(9, '2021po', NULL, 'item1', 'High', 'high', NULL, 'Et quia quia nulla n', 'Nam earum ut unde ea', 'Original', 'Permanent', '2021-08-20', 'Nisi provident obca', '1990-07-02'),
(10, '2021yt', '2021-08-30', 'item1', 'High', 'high', NULL, 'dept1', 'office1', 'Original', 'Permanent', '0000-00-00', '', '0000-00-00'),
(11, '2021df', '2021-08-30', 'item1', 'High', 'high', NULL, 'dept1', 'office1', 'Original', 'Permanent', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_children`
--

CREATE TABLE `emp_children` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_child_name` varchar(50) DEFAULT NULL,
  `emp_child_dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_children`
--

INSERT INTO `emp_children` (`id`, `emp_id`, `emp_child_name`, `emp_child_dob`) VALUES
(1, '202198', '', '0000-00-00'),
(2, 'app1', '', '0000-00-00'),
(3, '2021er', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_civil_service`
--

CREATE TABLE `emp_civil_service` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `civil_exam_type` varchar(50) DEFAULT NULL,
  `civil_exam_name` varchar(50) DEFAULT NULL,
  `civil_exam_rating` int(10) DEFAULT NULL,
  `civil_exam_date` date DEFAULT NULL,
  `civil_exam_place` varchar(50) DEFAULT NULL,
  `civil_exam_licence_no` int(50) DEFAULT NULL,
  `civil_exam_licence_val` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_civil_service`
--

INSERT INTO `emp_civil_service` (`id`, `emp_id`, `civil_exam_type`, `civil_exam_name`, `civil_exam_rating`, `civil_exam_date`, `civil_exam_place`, `civil_exam_licence_no`, `civil_exam_licence_val`) VALUES
(1, '202198', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(2, 'app1', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(3, '2021er', '', '', 0, '0000-00-00', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_file`
--

CREATE TABLE `emp_file` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `file_folder` varchar(100) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `file_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_govt_id`
--

CREATE TABLE `emp_govt_id` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_gov_issued_id_type` varchar(100) DEFAULT NULL,
  `emp_gov_issued_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_govt_id`
--

INSERT INTO `emp_govt_id` (`id`, `emp_id`, `emp_gov_issued_id_type`, `emp_gov_issued_id`) VALUES
(1, '202198', '', ''),
(2, 'app1', '', ''),
(3, '2021er', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves`
--

CREATE TABLE `emp_leaves` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `type_of_leave` varchar(50) DEFAULT NULL,
  `leave_from_date` date DEFAULT NULL,
  `leave_to_date` date DEFAULT NULL,
  `date_diff` int(100) NOT NULL,
  `details_of_leave` varchar(255) NOT NULL,
  `no_of_working_days` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_filled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`id`, `emp_id`, `type_of_leave`, `leave_from_date`, `leave_to_date`, `date_diff`, `details_of_leave`, `no_of_working_days`, `status`, `remarks`, `date_filled`) VALUES
(3, '2021po', 'Vacation leave', '2021-09-01', '2021-09-03', 3, '', 3, 0, 'remarks done', '2021-08-29'),
(4, '2021df', 'Vacation leave', '2021-08-24', '2021-08-27', 4, 'Long term vacation', 3, 1, 'Yes leave is approved', '2021-08-29'),
(5, '2021df', 'Vacation leave', '2021-08-24', '2021-08-28', 5, 'GOING OUT', 5, NULL, NULL, '2021-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `emp_membership`
--

CREATE TABLE `emp_membership` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_membership` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_membership`
--

INSERT INTO `emp_membership` (`id`, `emp_id`, `emp_membership`) VALUES
(1, '202198', ''),
(2, 'app1', ''),
(3, '2021er', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_non_academic`
--

CREATE TABLE `emp_non_academic` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_non_academic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_non_academic`
--

INSERT INTO `emp_non_academic` (`id`, `emp_id`, `emp_non_academic`) VALUES
(1, '202198', ''),
(2, 'app1', ''),
(3, '2021er', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_performance`
--

CREATE TABLE `emp_performance` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `excel_file_type` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `rating_period` varchar(100) DEFAULT NULL,
  `rating` varchar(100) NOT NULL,
  `excel_file_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emp_reference`
--

CREATE TABLE `emp_reference` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `ref_full_name` varchar(50) DEFAULT NULL,
  `ref_add` varchar(50) DEFAULT NULL,
  `ref_tel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_reference`
--

INSERT INTO `emp_reference` (`id`, `emp_id`, `ref_full_name`, `ref_add`, `ref_tel`) VALUES
(1, '202198', '', '', ''),
(2, 'app1', '', '', ''),
(3, '2021er', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_special_skills`
--

CREATE TABLE `emp_special_skills` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `emp_special_skills` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_special_skills`
--

INSERT INTO `emp_special_skills` (`id`, `emp_id`, `emp_special_skills`) VALUES
(1, '202198', ''),
(2, 'app1', ''),
(3, '2021er', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_training`
--

CREATE TABLE `emp_training` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `title_of_training` varchar(50) DEFAULT NULL,
  `training_type_of_position` varchar(50) DEFAULT NULL,
  `training_no_of_hrs` int(10) DEFAULT NULL,
  `training_from_date` date DEFAULT NULL,
  `training_to_date` date NOT NULL,
  `training_conducted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_training`
--

INSERT INTO `emp_training` (`id`, `emp_id`, `title_of_training`, `training_type_of_position`, `training_no_of_hrs`, `training_from_date`, `training_to_date`, `training_conducted_by`) VALUES
(1, '202198', '', '', 0, '0000-00-00', '0000-00-00', ''),
(2, 'app1', '', '', 0, '0000-00-00', '0000-00-00', ''),
(3, '2021er', '', '', 0, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_voluntary_work`
--

CREATE TABLE `emp_voluntary_work` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `vol_name_org` varchar(50) DEFAULT NULL,
  `vol_org_add` varchar(50) DEFAULT NULL,
  `vol_from_date` date DEFAULT NULL,
  `vol_to_date` date NOT NULL,
  `vol_no_of_hrs` int(10) DEFAULT NULL,
  `vol_position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_voluntary_work`
--

INSERT INTO `emp_voluntary_work` (`id`, `emp_id`, `vol_name_org`, `vol_org_add`, `vol_from_date`, `vol_to_date`, `vol_no_of_hrs`, `vol_position`) VALUES
(1, '202198', '', '', '0000-00-00', '0000-00-00', 0, ''),
(2, 'app1', '', '', '0000-00-00', '0000-00-00', 0, ''),
(3, '2021er', '', '', '0000-00-00', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_work_experience`
--

CREATE TABLE `emp_work_experience` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `work_to_date` date DEFAULT NULL,
  `work_from_date` date DEFAULT NULL,
  `work_position` varchar(50) DEFAULT NULL,
  `work_employer` varchar(50) DEFAULT NULL,
  `work_govt_service` varchar(10) DEFAULT NULL,
  `work_monthly_sal` int(100) DEFAULT NULL,
  `work_increment` int(50) DEFAULT NULL,
  `work_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_work_experience`
--

INSERT INTO `emp_work_experience` (`id`, `emp_id`, `work_to_date`, `work_from_date`, `work_position`, `work_employer`, `work_govt_service`, `work_monthly_sal`, `work_increment`, `work_status`) VALUES
(1, '202198', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(2, 'app1', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(3, '2021er', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_competency`
--

CREATE TABLE `hiring_competency` (
  `id` int(11) NOT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `add_com` varchar(255) DEFAULT NULL,
  `com_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring_competency`
--

INSERT INTO `hiring_competency` (`id`, `item_no`, `add_com`, `com_num`) VALUES
(1, 'item1', '29-Dec-2007', 1),
(2, 'item1', '14-Jul-1991', 2),
(3, 'item1', '07-Mar-2019', 3),
(4, 'item1', '13-Nov-2020', 4),
(5, 'item1', '', 1),
(6, 'item1', '', 2),
(7, 'item1', '', 3),
(8, 'item1', '', 4),
(9, 'item2', '15-Feb-1982', 1),
(10, 'item2', '30-Apr-1979', 2),
(11, 'item2', '14-May-1993', 3),
(12, 'item2', '11-Mar-1985', 4),
(17, 'Item3', '03-Jul-2013', 1),
(18, 'Item3', '28-Mar-1978', 2),
(19, 'Item3', '23-Sep-1988', 3),
(20, 'Item3', '04-Jul-1976', 4),
(21, 'item4', '18-Oct-1993', 1),
(22, 'item4', '06-Feb-2011', 2),
(23, 'item4', '27-Nov-2002', 3),
(24, 'item4', '17-Sep-1976', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hiring_education`
--

CREATE TABLE `hiring_education` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position_no` varchar(100) DEFAULT NULL,
  `applicant_id` varchar(100) DEFAULT NULL,
  `hiring_education` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring_education`
--

INSERT INTO `hiring_education` (`id`, `item_no`, `position_no`, `applicant_id`, `hiring_education`) VALUES
(1, 'item1', NULL, NULL, '03-Nov-1993'),
(2, 'item1', NULL, NULL, ''),
(3, 'item2', NULL, NULL, '12-Jan-1998'),
(8, NULL, NULL, 'app1', '  Quo cumque odio vero'),
(9, NULL, NULL, 'app1', ' es2'),
(12, NULL, NULL, 'appli2', '  Consectetur sed qui'),
(13, NULL, NULL, 'appli2', ' trr'),
(14, NULL, NULL, 'dffg', ''),
(18, NULL, '25-Dec-1978', NULL, '24-Dec-1978'),
(19, NULL, '25-Dec-1978', NULL, 'ghgh'),
(20, NULL, 'pos2', NULL, '22-Jan-2010'),
(21, NULL, 'pos1', NULL, '05-Dec-2020'),
(22, NULL, 'pos1', NULL, 'yyu'),
(24, NULL, NULL, '2021FG', ' Aut possimus conseq'),
(25, NULL, NULL, 'tyty', ''),
(26, NULL, NULL, '202198', 'Ex ut nisi sequ'),
(28, 'Item3', NULL, NULL, '23-Oct-1983'),
(30, NULL, NULL, '2021OIB', ' nd'),
(31, 'item4', NULL, NULL, '14-Jul-2010'),
(32, NULL, NULL, '2021POK', 'Reprehenderit simili'),
(33, NULL, NULL, '2021yt', 'Ea vitae quas laboru'),
(34, NULL, NULL, '2021df', 'Rerum cupidatat reru');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_eligibility`
--

CREATE TABLE `hiring_eligibility` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position_no` varchar(100) DEFAULT NULL,
  `applicant_id` varchar(100) DEFAULT NULL,
  `hiring_eligibility` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring_eligibility`
--

INSERT INTO `hiring_eligibility` (`id`, `item_no`, `position_no`, `applicant_id`, `hiring_eligibility`) VALUES
(1, 'item1', NULL, NULL, '27-Nov-2002'),
(2, 'item1', NULL, NULL, ''),
(3, 'item2', NULL, NULL, '16-Aug-2009'),
(8, NULL, NULL, 'app1', '  Commodo voluptas lab'),
(9, NULL, NULL, 'app1', ' e2'),
(11, NULL, NULL, 'appli2', '  Dolorum excepteur ap'),
(12, NULL, NULL, 'dffg', ''),
(15, NULL, '25-Dec-1978', NULL, '11-Apr-2011'),
(16, NULL, '25-Dec-1978', NULL, 'trtrt'),
(17, NULL, 'pos2', NULL, '10-Mar-1980'),
(18, NULL, 'pos1', NULL, '17-Feb-2012'),
(19, NULL, 'pos1', NULL, 'bh'),
(21, NULL, NULL, '2021FG', ' Atque sit delectus '),
(22, NULL, NULL, 'tyty', ''),
(23, NULL, NULL, '202198', 'Id  Aliquip'),
(25, 'Item3', NULL, NULL, '17-Nov-2011'),
(27, NULL, NULL, '2021OIB', ' architect'),
(28, 'item4', NULL, NULL, '25-Jan-2009'),
(29, NULL, NULL, '2021POK', 'Consequat Velit qui'),
(30, NULL, NULL, '2021yt', 'Debitis qui eligendi'),
(31, NULL, NULL, '2021df', 'Magna id dolorem cor');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_training`
--

CREATE TABLE `hiring_training` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position_no` varchar(100) DEFAULT NULL,
  `applicant_id` varchar(100) DEFAULT NULL,
  `hiring_training` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring_training`
--

INSERT INTO `hiring_training` (`id`, `item_no`, `position_no`, `applicant_id`, `hiring_training`) VALUES
(1, 'item1', NULL, NULL, '14-Sep-1987'),
(2, 'item1', NULL, NULL, ''),
(3, 'item2', NULL, NULL, '09-Mar-1993'),
(8, NULL, NULL, 'app1', '  Assumenda eos dolor'),
(9, NULL, NULL, 'app1', ' t2'),
(11, NULL, NULL, 'appli2', '  Ut quia elit mollit'),
(12, NULL, NULL, 'appli2', 'er'),
(13, NULL, NULL, 'dffg', ''),
(17, NULL, '25-Dec-1978', NULL, '26-May-2007'),
(18, NULL, '25-Dec-1978', NULL, 'hghgh'),
(19, NULL, 'pos2', NULL, '18-Nov-2008'),
(20, NULL, 'pos1', NULL, '26-Sep-1997'),
(21, NULL, 'pos1', NULL, 'er'),
(23, NULL, NULL, '2021FG', ' Voluptatem rerum eum'),
(24, NULL, NULL, 'tyty', ''),
(25, NULL, NULL, '202198', 'Aut perferendis est '),
(27, 'Item3', NULL, NULL, '24-Feb-1987'),
(29, NULL, NULL, '2021OIB', '  ipsum est'),
(30, 'item4', NULL, NULL, '29-Apr-1984'),
(31, NULL, NULL, '2021POK', 'Provident velit vol'),
(32, NULL, NULL, '2021yt', 'Eius ullam ipsa ani'),
(33, NULL, NULL, '2021df', 'Libero tempora repre');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_work_exp`
--

CREATE TABLE `hiring_work_exp` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position_no` varchar(100) DEFAULT NULL,
  `applicant_id` varchar(100) DEFAULT NULL,
  `hiring_work_exp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring_work_exp`
--

INSERT INTO `hiring_work_exp` (`id`, `item_no`, `position_no`, `applicant_id`, `hiring_work_exp`) VALUES
(1, 'item1', NULL, NULL, '10-Aug-1973'),
(2, 'item1', NULL, NULL, ''),
(3, 'item2', NULL, NULL, '03-Jun-2005'),
(8, NULL, NULL, 'app1', '  Exercitation velit l'),
(9, NULL, NULL, 'app1', ' w2'),
(11, NULL, NULL, 'appli2', '  Quod veniam volupta'),
(12, NULL, NULL, 'dffg', ''),
(15, NULL, '25-Dec-1978', NULL, '05-Nov-2018'),
(16, NULL, '25-Dec-1978', NULL, 'trtrt'),
(17, NULL, 'pos2', NULL, '17-Feb-1971'),
(18, NULL, 'pos1', NULL, '09-May-1982'),
(19, NULL, 'pos1', NULL, 'rt'),
(21, NULL, NULL, '2021FG', ' Eaque beatae numquam'),
(22, NULL, NULL, 'tyty', ''),
(23, NULL, NULL, '202198', 'Amet veritatis'),
(25, 'Item3', NULL, NULL, '26-Jul-2019'),
(27, NULL, NULL, '2021OIB', ' vitae t'),
(28, 'item4', NULL, NULL, '28-Oct-2018'),
(29, NULL, NULL, '2021POK', 'Omnis ducimus Nam e'),
(30, NULL, NULL, '2021yt', 'Ut esse a soluta vo'),
(31, NULL, NULL, '2021df', 'Vero inventore dolor');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary_grade` varchar(100) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `place_of_assignment` varchar(100) NOT NULL,
  `date_posted` date NOT NULL,
  `nature` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_no`, `position`, `salary_grade`, `date_created`, `status`, `place_of_assignment`, `date_posted`, `nature`) VALUES
(1, 'item1', 'High', 'high', '2021-08-20', '1', 'ofiice', '2021-08-19', 'Original'),
(3, 'item2', 'High', 'Kin', '1994-06-25', '0', '02-May-2011', '2021-08-19', 'Original'),
(5, 'Item3', 'position1', 'high', '1993-11-04', '1', '19-Dec-1987', '0000-00-00', ''),
(6, 'item4', 'position2', '20-Nov-2018', '1998-07-09', '1', '08-Nov-2007', '2021-08-23', 'Original');

-- --------------------------------------------------------

--
-- Table structure for table `leave_credits`
--

CREATE TABLE `leave_credits` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `vacation_leave` int(100) DEFAULT NULL,
  `sick_leave` int(100) DEFAULT NULL,
  `spl` int(100) DEFAULT NULL,
  `force_leave` int(100) DEFAULT NULL,
  `lwp` int(100) DEFAULT NULL,
  `mon` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_credits`
--

INSERT INTO `leave_credits` (`id`, `emp_id`, `vacation_leave`, `sick_leave`, `spl`, `force_leave`, `lwp`, `mon`, `year`) VALUES
(1, '2021po', 3, 0, 0, 0, 0, 9, 2021),
(2, '2021df', 4, 0, 0, 0, 0, 9, 2021),
(3, '2021df', 5, 0, 0, 0, 0, 8, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `leave_credits_result`
--

CREATE TABLE `leave_credits_result` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(225) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `vl_pts_1` float DEFAULT NULL,
  `vl_pts_2` float DEFAULT NULL,
  `vl_pts_3` float DEFAULT NULL,
  `vl_pts_4` float DEFAULT NULL,
  `vl_pts_5` float DEFAULT NULL,
  `vl_pts_6` float DEFAULT NULL,
  `vl_pts_7` float DEFAULT NULL,
  `vl_pts_8` float DEFAULT NULL,
  `vl_pts_9` float DEFAULT NULL,
  `vl_pts_10` float DEFAULT NULL,
  `vl_pts_11` float DEFAULT NULL,
  `vl_pts_12` float DEFAULT NULL,
  `sl_pts_1` float DEFAULT NULL,
  `sl_pts_2` float DEFAULT NULL,
  `sl_pts_3` float DEFAULT NULL,
  `sl_pts_4` float DEFAULT NULL,
  `sl_pts_5` float DEFAULT NULL,
  `sl_pts_6` float DEFAULT NULL,
  `sl_pts_7` float DEFAULT NULL,
  `sl_pts_8` float DEFAULT NULL,
  `sl_pts_9` float DEFAULT NULL,
  `sl_pts_10` float DEFAULT NULL,
  `sl_pts_11` float DEFAULT NULL,
  `sl_pts_12` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_credits_result`
--

INSERT INTO `leave_credits_result` (`id`, `emp_id`, `year`, `vl_pts_1`, `vl_pts_2`, `vl_pts_3`, `vl_pts_4`, `vl_pts_5`, `vl_pts_6`, `vl_pts_7`, `vl_pts_8`, `vl_pts_9`, `vl_pts_10`, `vl_pts_11`, `vl_pts_12`, `sl_pts_1`, `sl_pts_2`, `sl_pts_3`, `sl_pts_4`, `sl_pts_5`, `sl_pts_6`, `sl_pts_7`, `sl_pts_8`, `sl_pts_9`, `sl_pts_10`, `sl_pts_11`, `sl_pts_12`) VALUES
(1, '2021er', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(2, '2021yu', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(4, '2021err', 2021, 16.25, 17.5, 18.75, 20, 21.25, 22.5, 23.75, 25, 26.25, 27.5, 28.75, 30, 16.25, 17.5, 18.75, 20, 21.25, 22.5, 23.75, 25, 26.25, 27.5, 28.75, 30),
(5, '2021po', 2021, 19.25, 20.5, 21.75, 23, 24.25, 25.5, 26.75, 28, 24.25, 25.5, 26.75, 28, 19.25, 20.5, 21.75, 23, 24.25, 25.5, 26.75, 28, 29.25, 30.5, 31.75, 33),
(7, '2021df', 2021, 16.25, 17.5, 18.75, 20, 21.25, 22.5, 23.75, 17.5, 12.5, 13.75, 15, 16.25, 16.25, 17.5, 18.75, 20, 21.25, 22.5, 23.75, 25, 26.25, 27.5, 28.75, 30);

-- --------------------------------------------------------

--
-- Table structure for table `leave_credits_year`
--

CREATE TABLE `leave_credits_year` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) DEFAULT NULL,
  `year` int(100) DEFAULT NULL,
  `vl_pts` decimal(10,2) DEFAULT NULL,
  `sl_pts` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_credits_year`
--

INSERT INTO `leave_credits_year` (`id`, `emp_id`, `year`, `vl_pts`, `sl_pts`) VALUES
(1, '2021po', 2020, '18.00', '18.00');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `office_name` varchar(100) DEFAULT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `office_name`, `department_name`) VALUES
(1, 'office1', 'dept1'),
(2, 'office2', 'dept3'),
(3, 'office4', 'dept2');

-- --------------------------------------------------------

--
-- Table structure for table `training_emp_list`
--

CREATE TABLE `training_emp_list` (
  `id` int(11) NOT NULL,
  `training_id` varchar(100) DEFAULT NULL,
  `emp_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_speaker_list`
--

CREATE TABLE `training_speaker_list` (
  `id` int(11) NOT NULL,
  `training_id` varchar(100) DEFAULT NULL,
  `speaker_last_name` varchar(100) DEFAULT NULL,
  `speaker_first_name` varchar(100) DEFAULT NULL,
  `speaker_middle_name` varchar(100) DEFAULT NULL,
  `speaker_ext` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_sponsor_list`
--

CREATE TABLE `training_sponsor_list` (
  `id` int(11) NOT NULL,
  `training_id` varchar(100) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training_table`
--

CREATE TABLE `training_table` (
  `training_id` int(11) NOT NULL,
  `title_of_training` varchar(100) DEFAULT NULL,
  `from_date` varchar(100) DEFAULT NULL,
  `to_date` varchar(100) DEFAULT NULL,
  `type_of_training` varchar(100) DEFAULT NULL,
  `no_of_hrs` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin_photo` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `emp_id` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `admin_photo`, `role`, `emp_id`, `department`, `office`) VALUES
(1, 'hr', 'Cruz', 'hr', 'admin1-2.jpg', 'Super Administrator', '', 'dept1', 'off1'),
(5, 'ce', 'Cecilia Blevins', 'ce123', NULL, 'Super Administrator', '202198', NULL, NULL),
(6, 'we', 'Shana Howe', 'we', NULL, 'Employee', '2021POK', NULL, NULL),
(8, 'er1', 'Jordan  Lara', 'er1', NULL, 'Department Head', 'app1', 'dept1', 'off1'),
(9, 'er', 'Lana  Alexander', 'er', NULL, 'Supervisor', '2021er', 'dept2', 'office2'),
(16, 'yu', 'Hannah Cooper', 'yu', NULL, 'Employee', '2021yu', 'dept1', 'office1'),
(17, 'emp', 'Keely Frank', 'emp', NULL, 'Employee', '2021df', 'dept1', 'office1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `applicant_file`
--
ALTER TABLE `applicant_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cont_position`
--
ALTER TABLE `cont_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position_no` (`position_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`) USING BTREE;

--
-- Indexes for table `employee_agency`
--
ALTER TABLE `employee_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_children`
--
ALTER TABLE `emp_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_civil_service`
--
ALTER TABLE `emp_civil_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_file`
--
ALTER TABLE `emp_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_govt_id`
--
ALTER TABLE `emp_govt_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_membership`
--
ALTER TABLE `emp_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_non_academic`
--
ALTER TABLE `emp_non_academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_performance`
--
ALTER TABLE `emp_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_reference`
--
ALTER TABLE `emp_reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_special_skills`
--
ALTER TABLE `emp_special_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_training`
--
ALTER TABLE `emp_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_voluntary_work`
--
ALTER TABLE `emp_voluntary_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_competency`
--
ALTER TABLE `hiring_competency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_education`
--
ALTER TABLE `hiring_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_eligibility`
--
ALTER TABLE `hiring_eligibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_training`
--
ALTER TABLE `hiring_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiring_work_exp`
--
ALTER TABLE `hiring_work_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_no` (`item_no`);

--
-- Indexes for table `leave_credits`
--
ALTER TABLE `leave_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_credits_result`
--
ALTER TABLE `leave_credits_result`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `leave_credits_year`
--
ALTER TABLE `leave_credits_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_emp_list`
--
ALTER TABLE `training_emp_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_speaker_list`
--
ALTER TABLE `training_speaker_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_sponsor_list`
--
ALTER TABLE `training_sponsor_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_table`
--
ALTER TABLE `training_table`
  ADD UNIQUE KEY `training_id` (`training_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `applicant_file`
--
ALTER TABLE `applicant_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cont_position`
--
ALTER TABLE `cont_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_agency`
--
ALTER TABLE `employee_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp_children`
--
ALTER TABLE `emp_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_civil_service`
--
ALTER TABLE `emp_civil_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_file`
--
ALTER TABLE `emp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_govt_id`
--
ALTER TABLE `emp_govt_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_membership`
--
ALTER TABLE `emp_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_non_academic`
--
ALTER TABLE `emp_non_academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_performance`
--
ALTER TABLE `emp_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_reference`
--
ALTER TABLE `emp_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_special_skills`
--
ALTER TABLE `emp_special_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_training`
--
ALTER TABLE `emp_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_voluntary_work`
--
ALTER TABLE `emp_voluntary_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hiring_competency`
--
ALTER TABLE `hiring_competency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hiring_education`
--
ALTER TABLE `hiring_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `hiring_eligibility`
--
ALTER TABLE `hiring_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hiring_training`
--
ALTER TABLE `hiring_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `hiring_work_exp`
--
ALTER TABLE `hiring_work_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_credits_result`
--
ALTER TABLE `leave_credits_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leave_credits_year`
--
ALTER TABLE `leave_credits_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training_emp_list`
--
ALTER TABLE `training_emp_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_speaker_list`
--
ALTER TABLE `training_speaker_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_sponsor_list`
--
ALTER TABLE `training_sponsor_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
