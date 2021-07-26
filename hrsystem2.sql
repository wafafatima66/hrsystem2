-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 12:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
  `assigned` varchar(100) DEFAULT NULL,
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
  `applicant_zip` varchar(100) DEFAULT NULL,
  `applicant_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `item_no`, `assigned`, `applicant_id`, `applicant_rating`, `applicant_rank`, `applicant_first_name`, `applicant_last_name`, `applicant_middle_name`, `applicant_ext`, `applicant_gender`, `applicant_country`, `applicant_state`, `applicant_municipal`, `applicant_zip`, `applicant_image`) VALUES
(1, 'Item1', '0', '234', ' 3', '23', '', '', '', '', '', '', '', '', '', ''),
(3, 'Item1', '1', '235', ' 4', '24', '', '', '', '', '', '', '', '', '', '');

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
(5, '2021XF', 'employee2021XF-download.jpg', 'Alexandra', '', '   Davies', '', '0000-00-00', 'Male', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '      ', '', '', '   ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '   ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '   ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '   ', '', '', '', '   ', '', '', '', ''),
(8, '2021XY', 'employee2021XY-images.jpg', 'Jennifer', '', ' Lisa', '', '0000-00-00', 'Female', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(9, '2021XA', 'employee2021XA-download1.jpg', 'Katherine', '', ' Lillian', '', '0000-00-00', 'Female', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(10, '2021XB', 'employee2021XB-1.jpg', 'Colin', '', ' Harry', '', '0000-00-00', 'Male', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(11, '2021XC', NULL, 'Johsua', '', 'Paul', '', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2021XD', NULL, 'Oliver', '', 'peter', '', NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_job_type`
--

CREATE TABLE `employee_job_type` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `job_type` varchar(100) DEFAULT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary_grade` varchar(100) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `nature` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `date_of_effectivity` date DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_of_expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_job_type`
--

INSERT INTO `employee_job_type` (`id`, `emp_id`, `job_type`, `item_no`, `position`, `salary_grade`, `date_created`, `department`, `unit`, `nature`, `designation`, `date_of_effectivity`, `type`, `date_of_expiry`) VALUES
(1, '2021XF', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(2, '2021XY', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(3, '2021XA', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(4, '2021XB', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(5, '2021XC', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(6, '2021XD', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00');

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
(3, '2021XF', '', '0000-00-00'),
(4, '2021XY', '', '0000-00-00'),
(5, '2021XA', '', '0000-00-00'),
(6, '2021XB', '', '0000-00-00');

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
(3, '2021XF', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(4, '2021XY', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(5, '2021XA', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(6, '2021XB', '', '', 0, '0000-00-00', '', 0, '0000-00-00');

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
(3, '2021XF', '', ''),
(4, '2021XY', '', ''),
(5, '2021XA', '', ''),
(6, '2021XB', '', '');

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
  `approve` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`id`, `emp_id`, `type_of_leave`, `leave_from_date`, `leave_to_date`, `date_diff`, `details_of_leave`, `no_of_working_days`, `approve`, `remarks`) VALUES
(1, '2021XY', 'Vacation leave', '2021-07-20', '2021-07-22', 3, 'Going for a vacation', 0, NULL, NULL),
(2, '2021XY', 'Sick leave', '2021-07-29', '2021-08-01', 4, 'Not well', 3, NULL, NULL);

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
(3, '2021XF', ''),
(4, '2021XY', ''),
(5, '2021XA', ''),
(6, '2021XB', '');

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
(3, '2021XF', ''),
(4, '2021XY', ''),
(5, '2021XA', ''),
(6, '2021XB', '');

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

--
-- Dumping data for table `emp_performance`
--

INSERT INTO `emp_performance` (`id`, `emp_id`, `excel_file_type`, `year`, `rating_period`, `rating`, `excel_file_name`) VALUES
(1, '2021XY', 'IPCR', '2021', ' 1', '5', 'excel-2021XY-excelnbn-Division-Performance-Commitment-and-Review-DPCR.xlsx'),
(2, '2021XY', 'DPCR', '2020', ' 2', '3', 'excel-2021XY-excel-trree-Division-Performance-Commitment-and-Review-DPCR.xlsx');

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
(3, '2021XF', '', '', ''),
(4, '2021XY', '', '', ''),
(5, '2021XA', '', '', ''),
(6, '2021XB', '', '', '');

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
(3, '2021XF', ''),
(4, '2021XY', ''),
(5, '2021XA', ''),
(6, '2021XB', '');

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
(3, '2021XF', '', '', 0, '0000-00-00', '0000-00-00', ''),
(4, '2021XY', '', '', 0, '0000-00-00', '0000-00-00', ''),
(5, '2021XA', '', '', 0, '0000-00-00', '0000-00-00', ''),
(6, '2021XB', '', '', 0, '0000-00-00', '0000-00-00', '');

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
(3, '2021XF', '', '', '0000-00-00', '0000-00-00', 0, ''),
(4, '2021XY', '', '', '0000-00-00', '0000-00-00', 0, ''),
(5, '2021XA', '', '', '0000-00-00', '0000-00-00', 0, ''),
(6, '2021XB', '', '', '0000-00-00', '0000-00-00', 0, '');

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
(3, '2021XF', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(4, '2021XY', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(5, '2021XA', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(6, '2021XB', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0');

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
(1, 'Item1', NULL, NULL, ''),
(2, 'Item1', NULL, NULL, ''),
(3, 'Item1', NULL, NULL, ''),
(4, NULL, NULL, '234', ''),
(5, NULL, NULL, '234', ''),
(6, NULL, NULL, '235', ''),
(7, NULL, NULL, '235', '');

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
(1, 'Item1', NULL, NULL, ''),
(2, 'Item1', NULL, NULL, ''),
(3, 'Item1', NULL, NULL, ''),
(4, NULL, NULL, '234', ''),
(5, NULL, NULL, '234', ''),
(6, NULL, NULL, '235', ''),
(7, NULL, NULL, '235', '');

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
(1, 'Item1', NULL, NULL, ''),
(2, 'Item1', NULL, NULL, ''),
(3, 'Item1', NULL, NULL, ''),
(4, NULL, NULL, '234', ''),
(5, NULL, NULL, '234', ''),
(6, NULL, NULL, '235', ''),
(7, NULL, NULL, '235', '');

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
(1, 'Item1', NULL, NULL, ''),
(2, 'Item1', NULL, NULL, ''),
(3, 'Item1', NULL, NULL, ''),
(4, NULL, NULL, '234', ''),
(5, NULL, NULL, '234', ''),
(6, NULL, NULL, '235', ''),
(7, NULL, NULL, '235', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nature` varchar(100) DEFAULT NULL,
  `item_no` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary_grade` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `filled` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `nature`, `item_no`, `position`, `salary_grade`, `date_created`, `filled`) VALUES
(1, 'Original', 'Item1', 'Officer', '2', ' 2021-07-26', '0'),
(2, 'Original', 'Item2', 'Officer', '2', ' 2021-07-26', '1');

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
(1, '2021XY', 0, 4, 0, 0, 0, 7, 2021);

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
  `vl_pts_4` int(11) DEFAULT NULL,
  `vl_pts_5` int(11) DEFAULT NULL,
  `vl_pts_6` int(11) DEFAULT NULL,
  `vl_pts_7` int(11) DEFAULT NULL,
  `vl_pts_8` int(11) DEFAULT NULL,
  `vl_pts_9` int(11) DEFAULT NULL,
  `vl_pts_10` int(11) DEFAULT NULL,
  `vl_pts_11` int(11) DEFAULT NULL,
  `vl_pts_12` int(11) DEFAULT NULL,
  `sl_pts_1` int(11) DEFAULT NULL,
  `sl_pts_2` int(11) DEFAULT NULL,
  `sl_pts_3` int(11) DEFAULT NULL,
  `sl_pts_4` int(11) DEFAULT NULL,
  `sl_pts_5` int(11) DEFAULT NULL,
  `sl_pts_6` int(11) DEFAULT NULL,
  `sl_pts_7` int(11) DEFAULT NULL,
  `sl_pts_8` int(11) DEFAULT NULL,
  `sl_pts_9` int(11) DEFAULT NULL,
  `sl_pts_10` int(11) DEFAULT NULL,
  `sl_pts_11` int(11) DEFAULT NULL,
  `sl_pts_12` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_credits_result`
--

INSERT INTO `leave_credits_result` (`id`, `emp_id`, `year`, `vl_pts_1`, `vl_pts_2`, `vl_pts_3`, `vl_pts_4`, `vl_pts_5`, `vl_pts_6`, `vl_pts_7`, `vl_pts_8`, `vl_pts_9`, `vl_pts_10`, `vl_pts_11`, `vl_pts_12`, `sl_pts_1`, `sl_pts_2`, `sl_pts_3`, `sl_pts_4`, `sl_pts_5`, `sl_pts_6`, `sl_pts_7`, `sl_pts_8`, `sl_pts_9`, `sl_pts_10`, `sl_pts_11`, `sl_pts_12`) VALUES
(1, '2021XF', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(2, '2021XY', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 18, 19, 20, 21, 23, 24),
(3, '2021XA', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(4, '2021XB', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(5, '2021XC', 2021, 16.25, 17.5, 18.75, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(6, '2021XD', 2021, 1.25, 1.25, 1.25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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
  `id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin_photo` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `emp_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `admin_photo`, `role`, `emp_id`) VALUES
('1', 'hr', 'Cruz', 'hr   ', 'admin1-2.jpg', 'Super Administrator', ''),
('2', 'emp', 'Jennifer', 'emp ', 'admin2-images.jpg', 'Employee', '2021XY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`) USING BTREE;

--
-- Indexes for table `employee_job_type`
--
ALTER TABLE `employee_job_type`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_job_type`
--
ALTER TABLE `employee_job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_children`
--
ALTER TABLE `emp_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_civil_service`
--
ALTER TABLE `emp_civil_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_file`
--
ALTER TABLE `emp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_govt_id`
--
ALTER TABLE `emp_govt_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_membership`
--
ALTER TABLE `emp_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_non_academic`
--
ALTER TABLE `emp_non_academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_performance`
--
ALTER TABLE `emp_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_reference`
--
ALTER TABLE `emp_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_special_skills`
--
ALTER TABLE `emp_special_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_training`
--
ALTER TABLE `emp_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_voluntary_work`
--
ALTER TABLE `emp_voluntary_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hiring_education`
--
ALTER TABLE `hiring_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hiring_eligibility`
--
ALTER TABLE `hiring_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hiring_training`
--
ALTER TABLE `hiring_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hiring_work_exp`
--
ALTER TABLE `hiring_work_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_credits_result`
--
ALTER TABLE `leave_credits_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_credits_year`
--
ALTER TABLE `leave_credits_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
