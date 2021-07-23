-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 07:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.1.32

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
(1, 'wafa', '0', 'eff', ' dfdf', 'fdf', 'dfd', 'dfdf', 'dfvdf', 'dfdf', 'tr', 'dfdf', 'sdsd', 'sdsd', 'sdsd', ''),
(2, 'wafa', '0', 'ddfdf', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'rfff', '1', 'sdsd', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'ssdsd', '0', '', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'dfd', '0', 'dfdfdf', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'dfd', '0', 'dfdf', ' ', '', 'dfdfd', 'dfddf', '', '', '', '', '', '', '', ''),
(7, 'rfff', '0', 'sdsdsd', ' dsdsd', '', '', '', '', '', '', '', '', '', '', 'applicantsdsdsd-199736752_1197297364043566_2397431528188672325_n.jpg'),
(8, 'rfff', '0', 'waas', ' sdsd', 'sdsd', 'asas', 'asas', 'asas', 'asas', 'dsd', 'sdsd', 'dsdsd', 'ass', 'asas', ''),
(9, 'wafa', '0', 'dsdsd', ' ', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '0', 'sdsffgfg', '  dfd', 'fdffd', 'asas', 'gfgf', 'gfgfg', 'fgfg', 'fg', 'asas', 'sdsd', 'sdsd', 'sdsd', 'applicantsdsffgfg-199736752_1197297364043566_2397431528188672325_n.jpg');

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
(48, 'trree', NULL, 'ea', 'assa', 'adads', 'sd', NULL, 'fee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'qwert', 'employeeqwert-nathan-farrish-ydyvTNi5Rdg-unsplash.jpg', 'wwww', 'www', ' www', '', '2021-07-19', 'www', 'sdsd', 44, 43, '34', 'Algeria', 'Antigua and Barbuda', '42 Cathcart Dr Apt #D', '1', '2', '2', '63021', 'House - 56 , road - 6/C , Sector - 12 , Uttara ,  dhaka', '1', '3', '3', '1230', '+8801626735066', '3444', 'wafafatima66@gmail.com', 34343, 222, 54454, 2323, 44455, 2323, 'Fatima', 'Wafa', 'sds', 'sdsdd', 'ssdd', 'sdd', 'House - 56 , road - 6/C , Sector - 12 , Uttara ,  ', 454545, 'Fatima', 'Wafa', 'sccx', 'dgdf', 'Fatima', ' Wafa', 'sdfsdf', 'dfrdr', 'Wafa', 'asasss', '2021-07-12', '2021-07-15', 676, 'fdfdf', 'dfdf', 'Wafa Fatima', 'sfdfd', '2021-07-13', '2021-07-08', 0, 'dfdf ', 0, 'asas', 'asas', '2021-07-19', '2021-07-14', 0, 'sdsd', 0, 'ererer', 'dfdfd', '2021-07-21', '2021-07-26', 0, 'dfdf', 0, 'dsdsd', 'dsdsd', '2021-07-26', '2021-07-27', 0, 'zdsd', 0, 'No', 'No', 'erer ', 'Yes', 'erere', 'Yes', 'erer', '2021-07-05', 'eere', 'No', 'ererer', 'No', 'ereer', 'No', 'ererer', 'Yes', 'erere ', 'No', 'erere', 'Yes', 'ererer ', 'No', 'erere', 'Yes', 'grtrt'),
(55, 'srrd', 'employeesrrd-nathan-farrish-ydyvTNi5Rdg-unsplash.jpg', 'dfdf', 'sdsd', '   dfdf', 'dsd', '0000-00-00', 'sdsd', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '      ', '', '', '   ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '   ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '   ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '   ', '', '', '', '   ', '', '', '', ''),
(59, 'tyytt', 'employeetyytt-nathan-farrish-ydyvTNi5Rdg-unsplash.jpg', 'dsdsd', '', '   sdsd', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '      ', '', '', '   ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '   ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '   ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '   ', '', '', '', '   ', '', '', '', ''),
(61, 'emp_id', 'employeekjh-WhatsApp Image 2021-06-28 at 12.31.29 PM.jpeg', 'dsdsd', '', '     sdsd', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '          ', '', '', '     ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '     ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '     ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '     ', '', '', '', '     ', '', '', '', ''),
(67, 'waasfdfdfdf', 'employeewaasfdfdfdf-207230569_832528287386618_1466384603877992065_n.png', '', '', '   ssdsd', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '      ', '', '', '   ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '   ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '   ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '   ', '', '', '', '   ', '', '', '', ''),
(69, 'wadssqwee', '', '', '', ' ', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(70, 'were', NULL, 'Wafa', 'sdsd', 'Fatima', 'dfd', NULL, 'err', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'gttrt', NULL, 'dss', 'fdfdf', 'sdsd', 'dfd', NULL, 'fdfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'rttt', NULL, 'gdfd', 'vdfdf', 'dfdf', 'gfg', NULL, 'ghgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'nbn', '', 'as', 'dfdf', ' Fatima', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(74, 'kjjj', '', 'Wafa', 'sdsd', ' Fatima', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '  ', '', '', ' ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, ' ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', ' ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ' ', '', '', '', ' ', '', '', '', ''),
(75, 'wjkkk', 'programmer', 'Wafa', 'sdsd', '  Fatima', 'hii7', '0000-00-00', 'yyy', '', 0, 0, 'ytyty', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, 'hjg', '', '', '', '', '', '', 0, '', '', '', '', '', '  jhh  ', '', '', '  ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '  ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, 'Yes', 'Yes', 'If YES , please give details  ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', '0000-00-00', '', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details  ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details  ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details'),
(76, '', '', 'Wafa', 'sdsdhhh', '  Fatima', 'hii7', '0000-00-00', '', 'dfdf', 0, 0, 'ytyty', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, 'hjg', '', '', '', '', '', '', 0, '', '', '', '', '', '  jhh  ', '', '', '  ', '', '0000-00-00', '0000-00-00', 0, '', 'rdf', 'df', '', '0000-00-00', '0000-00-00', 0, '  ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, 'Yes', '', 'ihhshddd  ', '', 'kjjsjssd', 'Yes', '', '0000-00-00', '', '', '', '', '', '', '', '', '  ', '', '', '', '  ', '', '', '', ''),
(77, 'esss', 'employeeesss-1.png', 'Wafa', 'sdsd', '     Fatima2', 'hii7', '0000-00-00', '', 'sdsd', 0, 0, 'ytyty', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, 'hjg', '', '', '', '', '', '', 0, '', '', '', '', '', '     jhh     ', '', '', '  ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '  ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, 'Yes', '', 'ihhshddd     ', '', 'kjjsjssd', 'Yes', '', '0000-00-00', '', '', '', '', '', '', '', '', '     ', '', '', '', '     ', '', '', '', ''),
(78, 'wjkkk1', 'programmer', 'Wafae', 'sdsd', '   Fatima', 'hii7', '0000-00-00', '', '', 0, 0, 'ytyty', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, 'hjg', '', '', '', '', '', '', 0, '', '', '', '', '', '   jhh   ', '', '', '  ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '  ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, 'Yes', 'Yes', 'If YES , please give details   ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', '0000-00-00', '', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details   ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details   ', 'Yes', 'If YES , please give details', 'Yes', 'If YES , please give details'),
(79, 'eggh', '', 'thhhh', '', '  ', '', '0000-00-00', '', '', 0, 0, '', '', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', 'State/Province', 'City/Municipilaty', 'Barangay', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '    ', '', '', '  ', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '0000-00-00', '0000-00-00', 0, '  ', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '0000-00-00', '0000-00-00', 0, '', 0, '', '', '  ', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '  ', '', '', '', '  ', '', '', '', ''),
(81, 'wass', 'employeewass-1.png', 'rws', 'dfdf', '         sdsd', 'fgfg', '2021-07-20', 'fe', 'dfdf', 34, 44, 'dfd', 'Åland Islands', 'Anguilla', 'dfdf', 'State/Province', 'City/Municipilaty', 'Barangay', '344', 'dfdf2', 'State/Province', 'City/Municipilaty', 'Barangay', '344', '32233', '3244', 'sdf@hm.com', 34, 533, 644, 322, 344, 655, 'dfdf', 'dfdf', 'dfdf', 'dfdf', 'wewe', 'ererr', 'esdsd', 32232, 'gsss', 'ddf', 'ghf', 'dgdf', 'dfsd', '           sdfsds       ', 'sdfsdf', 'dssdf', '        sdsd', 'ssdsdd', '2021-07-20', '2021-07-22', 23, 'dsdsd', 'sdsdsd', 'ddfdf', 'dfdfdf', '2021-07-07', '2021-07-14', 44, 'dfdf        ', 0, 'dfdf', 'dfdfd', '2021-07-14', '2021-07-17', 0, 'dfdf', 0, 'cdsdsf', 'sdfds', '2021-07-14', '2021-07-03', 0, 'sdfsd', 0, 'sdsd', 'dfdf', '2021-07-26', '2021-07-28', 0, 'erer', 0, '', 'No', 'fgfgf         ', 'No', 'erer', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '         ', '', '', '', '         ', '', '', '', ''),
(82, 'bbbbbbb', NULL, 'bn', 'bn', 'bn', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'werrr', NULL, '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'gttrt', 'Permanent', '', 'sdsd', 'sdsd', '2021-07-12', 'rtrt', 'gfgfg', 'sdsd', 'sdsd', NULL, NULL, '2021-07-20'),
(2, 'rttt', 'Contractual', '', 'dfdf', 'dfdf', '2021-07-13', 'drer', 'dfdgdg', '', 'dfdf', '2021-07-21', '', '2021-07-22'),
(3, 'bbbbbbb', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00'),
(4, 'werrr', 'Permanent', '', '', '', '0000-00-00', '', '', '', '', NULL, NULL, '0000-00-00');

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
(39, 'qwert', 'jkk', '2021-07-20'),
(40, 'qwert', 'drdrdr', '2021-07-25'),
(43, 'srrd', '', '0000-00-00'),
(47, 'tyytt', '', '0000-00-00'),
(48, 'kjh', '', '0000-00-00'),
(49, 'waassas', '', '0000-00-00'),
(52, 'waasfdfdfdf', '', '0000-00-00'),
(53, 'wadssqwee', '', '0000-00-00'),
(54, 'nbn', '', '0000-00-00'),
(55, 'kjjj', '', '0000-00-00'),
(56, 'wjkkk', 'Array', '0000-00-00'),
(57, '', '', '0000-00-00'),
(58, 'esss', '', '0000-00-00'),
(59, 'wjkkk1', 'knm', '2021-07-27'),
(60, 'eggh', '', '0000-00-00'),
(62, 'wass', '', '0000-00-00');

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
(29, 'qwert', 'Board Examination', 'sdsd', 4343, '2021-07-13', 'eerer', 0, '2021-07-19'),
(30, 'qwert', 'Civil Service Examination', 'ererer', 2323, '2021-07-14', 'sdsdsd', 0, '2021-07-20'),
(33, 'srrd', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(37, 'tyytt', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(38, 'kjh', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(39, 'waassas', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(42, 'waasfdfdfdf', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(43, 'wadssqwee', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(44, 'nbn', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(45, 'kjjj', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(46, 'wjkkk', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(47, '', 'Civil Service Examination', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(48, 'esss', 'Civil Service Examination', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(49, 'wjkkk1', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(50, 'eggh', '', '', 0, '0000-00-00', '', 0, '0000-00-00'),
(52, 'wass', 'Board Examination', 'dfdfdf', 0, '0000-00-00', 'dfdf', 0, '0000-00-00');

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

--
-- Dumping data for table `emp_file`
--

INSERT INTO `emp_file` (`id`, `emp_id`, `file_folder`, `file_name`, `file_type`, `file_size`, `file_date`) VALUES
(1, 'trree', 'pds', 'trree-bts.jpg', 'image/jpeg', '41001', '2021-07-13'),
(2, 'trree', 'ipcr', 'trree-843c2884faec54d3513c2d7982c59540.jpg', 'image/jpeg', '27563', '2021-07-14'),
(3, 'trree', 'saln', 'trree-artworks-000158955755-nxlok9-t500x500.jpg', 'image/jpeg', '37378', '2021-07-14'),
(4, 'trree', 'others', 'trree-bts.jpg', 'image/jpeg', '41001', '2021-07-14');

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
(21, 'qwert', 'passport', 'wewewe'),
(22, 'qwert', 'dserer', '4344343'),
(25, 'srrd', '', ''),
(29, 'tyytt', '', ''),
(30, 'kjh', '', ''),
(31, 'waassas', '', ''),
(34, 'waasfdfdfdf', '', ''),
(35, 'wadssqwee', '', ''),
(36, 'nbn', '', ''),
(37, 'kjjj', '', ''),
(38, 'wjkkk', '', ''),
(39, '', 'p', 'w'),
(40, 'esss', 'p', 'w'),
(41, 'wjkkk1', '', ''),
(42, 'eggh', '', ''),
(44, 'wass', 'derere', 'rdfdfdfd');

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
(1, 'Trree', 'vacation leave', '2021-05-11', '2021-05-14', 4, '', 0, 1, 'fgfg'),
(2, 'Trree', '0', '2021-05-14', '2021-05-15', 2, '', 0, NULL, NULL),
(3, 'Trree', '0', '2021-05-18', '2021-05-20', 3, '', 0, NULL, NULL),
(4, 'Trree', 'sick leave', '2021-05-24', '2021-05-26', 3, '', 0, NULL, NULL),
(5, 'trree', 'Vacation leave', '2021-07-14', '2021-07-19', 6, 'rdfdfdfdfddfdf', 5, NULL, NULL),
(6, 'trree', 'Vacation leave', '2021-07-11', '2021-07-15', 5, '', 0, NULL, NULL),
(7, 'qwert', 'Vacation leave', '2021-07-26', '2021-07-27', 2, '', 0, NULL, NULL),
(8, 'srrd', 'Sick leave', '2021-07-18', '2021-07-23', 6, '', 0, NULL, NULL),
(9, 'were', 'Vacation leave', '2021-07-04', '2021-07-07', 4, '', 0, NULL, NULL);

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
(20, 'qwert', 'rtrt'),
(23, 'srrd', 'dfdf'),
(27, 'tyytt', 'fgfgfg'),
(28, 'kjh', ''),
(29, 'waassas', ''),
(32, 'waasfdfdfdf', 'hhh'),
(33, 'wadssqwee', 'sdsddf'),
(34, 'wadssqwee', 'dfrtrtrt'),
(35, 'nbn', ''),
(36, 'kjjj', ''),
(37, 'wjkkk', ''),
(38, '', 'fggg'),
(39, 'esss', 'fggg'),
(40, 'wjkkk1', ''),
(41, 'eggh', ''),
(43, 'wass', 'erdsds');

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
(26, 'qwert', 'trtrt'),
(29, 'srrd', 'dfdf'),
(33, 'tyytt', 'sdfff'),
(34, 'kjh', ''),
(35, 'waassas', 'sdddd'),
(38, 'waasfdfdfdf', 'hghg'),
(39, 'wadssqwee', 'ssdsd'),
(40, 'wadssqwee', 'sdddf'),
(41, 'nbn', ''),
(42, 'kjjj', ''),
(43, 'wjkkk', ''),
(44, '', 'gffff'),
(45, 'esss', 'gffff'),
(46, 'wjkkk1', ''),
(47, 'eggh', ''),
(49, 'wass', 'rrerer');

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
(1, 'nbn', 'DPCR', '2021', ' 1', '1', 'excelnbn-Division-Performance-Commitment-and-Review-DPCR.xlsx'),
(2, 'nbn', 'DPCR', '2021', ' 1', '1', 'excelnbn-Division-Performance-Commitment-and-Review-DPCR.xlsx'),
(3, 'nbn', 'DPCR', '2021', ' 1', '1', 'excelnbn-Division-Performance-Commitment-and-Review-DPCR.xlsx'),
(4, 'nbn', 'DPCR', '2021', ' 2', '1', 'excelnbn-Division-Performance-Commitment-and-Review-DPCR.xlsx'),
(5, 'nbn', 'DPCR', '2021', ' 1', '3', 'excel-nbn-Individual-Performance-Commitment-and-Review-IPCR.xlsx'),
(6, 'trree', 'DPCR', '2021', ' 1', '2', 'excel-trree-Division-Performance-Commitment-and-Review-DPCR.xlsx');

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
(26, 'qwert', 'ferer', 'erere', 'erteter'),
(27, 'qwert', 'rewwew', 'ferfret', 'retertre'),
(30, 'srrd', '', '', ''),
(34, 'tyytt', '', '', ''),
(35, 'kjh', '', '', ''),
(36, 'waassas', '', '', ''),
(39, 'waasfdfdfdf', '', '', ''),
(40, 'wadssqwee', '', '', ''),
(41, 'nbn', '', '', ''),
(42, 'kjjj', '', '', ''),
(43, 'wjkkk', '', '', ''),
(44, '', '', '', ''),
(45, 'esss', '', '', ''),
(46, 'wjkkk1', '', '', ''),
(47, 'eggh', '', '', ''),
(49, 'wass', 'ghghg', 'ghgh', '');

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
(26, 'qwert', 'ewewe'),
(27, 'qwert', 'sdsdsds'),
(33, 'srrd', 'dfdf'),
(34, 'srrd', 'ererer'),
(35, 'srrd', 'hjhj'),
(36, 'srrd', 'kosis'),
(37, 'srrd', ''),
(44, 'tyytt', ''),
(45, 'tyytt', ''),
(46, 'kjh', ''),
(47, 'waassas', 'was'),
(51, 'waasfdfdfdf', 'sds'),
(52, 'waasfdfdfdf', 'jhhh'),
(53, 'wadssqwee', 'wfs'),
(54, 'wadssqwee', 'wewe'),
(55, 'nbn', ''),
(56, 'kjjj', ''),
(57, 'wjkkk', ''),
(58, '', 'gfff'),
(59, 'esss', 'gfff'),
(60, 'wjkkk1', ''),
(61, 'eggh', ''),
(63, 'wass', 'sdsd');

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
(37, 'qwert', 'dfdfdf', 'managerial', 434, '2021-07-13', '2021-07-22', 'ddf'),
(38, 'qwert', 'dfdwewe', 'supervisory', 33, '2021-07-20', '2021-07-22', 'fdfdf'),
(41, 'srrd', '', '', 0, '0000-00-00', '0000-00-00', ''),
(45, 'tyytt', '', '', 0, '0000-00-00', '0000-00-00', ''),
(46, 'kjh', '', '', 0, '0000-00-00', '0000-00-00', ''),
(47, 'waassas', '', '', 0, '0000-00-00', '0000-00-00', ''),
(50, 'waasfdfdfdf', '', '', 0, '0000-00-00', '0000-00-00', ''),
(51, 'wadssqwee', '', '', 0, '0000-00-00', '0000-00-00', ''),
(52, 'nbn', '', '', 0, '0000-00-00', '0000-00-00', ''),
(53, 'kjjj', '', '', 0, '0000-00-00', '0000-00-00', ''),
(54, 'wjkkk', '', '', 0, '0000-00-00', '0000-00-00', ''),
(55, '', '', '', 0, '0000-00-00', '0000-00-00', ''),
(56, 'esss', '', '', 0, '0000-00-00', '0000-00-00', ''),
(57, 'wjkkk1', '', '', 0, '0000-00-00', '0000-00-00', ''),
(58, 'eggh', '', '', 0, '0000-00-00', '0000-00-00', ''),
(60, 'wass', 'cfff', 'managerial', 445, '0000-00-00', '0000-00-00', 'ererer');

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
(29, 'qwert', 'wewewe', 'fdfdf', '2021-07-27', '2021-07-30', 334, '434'),
(30, 'qwert', 'dsdsds', 'rerer', '2021-07-20', '2021-07-22', 34, 'sddfdfd'),
(33, 'srrd', '', '', '0000-00-00', '0000-00-00', 0, ''),
(37, 'tyytt', '', '', '0000-00-00', '0000-00-00', 0, ''),
(38, 'kjh', '', '', '0000-00-00', '0000-00-00', 0, ''),
(39, 'waassas', '', '', '0000-00-00', '0000-00-00', 0, ''),
(42, 'waasfdfdfdf', '', '', '0000-00-00', '0000-00-00', 0, ''),
(43, 'wadssqwee', '', '', '0000-00-00', '0000-00-00', 0, ''),
(44, 'nbn', '', '', '0000-00-00', '0000-00-00', 0, ''),
(45, 'kjjj', '', '', '0000-00-00', '0000-00-00', 0, ''),
(46, 'wjkkk', '', '', '0000-00-00', '0000-00-00', 0, ''),
(47, '', '', '', '0000-00-00', '0000-00-00', 0, ''),
(48, 'esss', '', '', '0000-00-00', '0000-00-00', 0, ''),
(49, 'wjkkk1', '', '', '0000-00-00', '0000-00-00', 0, ''),
(50, 'eggh', '', '', '0000-00-00', '0000-00-00', 0, ''),
(52, 'wass', 'dfdfd', 'dfdfdf', '0000-00-00', '0000-00-00', 0, '');

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
(37, 'qwert', '2021-07-23', '2021-07-19', 'erer', 'erere', 'No', 44, 343, 'contractual'),
(38, 'qwert', '2021-07-23', '2021-07-27', 'wdsds', 'dfdfdf', 'Yes', 4434, 434, 'contractual'),
(41, 'srrd', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(45, 'tyytt', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(46, 'kjh', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(47, 'waassas', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(50, 'waasfdfdfdf', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(51, 'wadssqwee', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(52, 'nbn', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(53, 'kjjj', '0000-00-00', '0000-00-00', '', '', '', 0, 0, '0'),
(54, 'wjkkk', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(55, '', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(56, 'esss', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(57, 'wjkkk1', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(58, 'eggh', '0000-00-00', '0000-00-00', '', '', '0', 0, 0, '0'),
(60, 'wass', '2021-07-30', '2021-07-26', 'ererer', 'ererer', '0', 0, 0, '0');

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
(7, 'sdsd', NULL, NULL, 'dfdf'),
(8, 'sdsd', NULL, NULL, 'dfdf'),
(9, 'jfhkfg', NULL, NULL, 'sdsd'),
(10, 'jfhkfg', NULL, NULL, 'sdsff'),
(11, 'wafa', NULL, NULL, 'edu1'),
(12, 'wafa', NULL, NULL, 'edu2'),
(13, NULL, NULL, 'ddfdf', 'dfdf'),
(14, NULL, NULL, 'sdsd', 'sdsdd'),
(15, NULL, NULL, '', 'dfdf'),
(16, NULL, NULL, '', 'dfdf'),
(17, NULL, NULL, 'dfdfdf', 'dfdf'),
(18, NULL, NULL, 'dfdfdf', 'erer'),
(19, NULL, NULL, 'dfdf', ''),
(20, NULL, NULL, 'sdsdsd', ''),
(21, NULL, NULL, 'waas', 'e1'),
(22, NULL, NULL, 'waas', 'e2'),
(23, NULL, NULL, 'dsdsd', ''),
(24, NULL, NULL, 'sdsffgfg', ''),
(25, NULL, NULL, 'sdsffgfg', 'e');

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
(6, 'sdsd', NULL, NULL, 'fdf'),
(7, 'sdsd', NULL, NULL, 'freee'),
(8, 'jfhkfg', NULL, NULL, 'sdsdsd'),
(9, 'jfhkfg', NULL, NULL, 'rererer'),
(10, 'wafa', NULL, NULL, 'e1'),
(11, 'wafa', NULL, NULL, 'e2'),
(12, NULL, NULL, 'ddfdf', 'dfdfdf'),
(13, NULL, NULL, '', 'fgdg'),
(14, NULL, NULL, '', 'bnbn'),
(15, NULL, NULL, 'dfdfdf', 'erer'),
(16, NULL, NULL, 'dfdfdf', 'wewe'),
(17, NULL, NULL, 'dfdf', ''),
(18, NULL, NULL, 'sdsdsd', ''),
(19, NULL, NULL, 'waas', 'e1'),
(20, NULL, NULL, 'waas', 'e2'),
(21, NULL, NULL, 'dsdsd', ''),
(22, NULL, NULL, 'sdsffgfg', ''),
(23, NULL, NULL, 'sdsffgfg', 'e');

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
(6, 'sdsd', NULL, NULL, 'sdsd'),
(7, 'sdsd', NULL, NULL, 'fsdsd'),
(8, 'jfhkfg', NULL, NULL, 'dewe'),
(9, 'jfhkfg', NULL, NULL, 'gfggfg'),
(10, 'wafa', NULL, NULL, 't1'),
(11, 'wafa', NULL, NULL, 't2'),
(12, NULL, NULL, 'ddfdf', 'dfdf'),
(13, NULL, NULL, '', 'gdd'),
(14, NULL, NULL, '', 'jbbn'),
(15, NULL, NULL, 'dfdfdf', 'rer'),
(16, NULL, NULL, 'dfdfdf', 'ererr'),
(17, NULL, NULL, 'dfdf', ''),
(18, NULL, NULL, 'sdsdsd', ''),
(19, NULL, NULL, 'waas', 'tr1'),
(20, NULL, NULL, 'waas', 't2'),
(21, NULL, NULL, 'dsdsd', ''),
(22, NULL, NULL, 'sdsffgfg', ''),
(23, NULL, NULL, 'sdsffgfg', 't');

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
(6, 'sdsd', NULL, NULL, 'ewew'),
(7, 'sdsd', NULL, NULL, 'wesds'),
(8, 'jfhkfg', NULL, NULL, 'fdfdf'),
(9, 'jfhkfg', NULL, NULL, 'ewewewe'),
(10, 'wafa', NULL, NULL, 'w1'),
(11, 'wafa', NULL, NULL, 'w2'),
(12, NULL, NULL, 'ddfdf', 'dfdf'),
(13, NULL, NULL, '', 'dfdf'),
(14, NULL, NULL, '', 'wewe'),
(15, NULL, NULL, 'dfdfdf', 'fgfg'),
(16, NULL, NULL, 'dfdfdf', 'ererre'),
(17, NULL, NULL, 'dfdf', ''),
(18, NULL, NULL, 'sdsdsd', ''),
(19, NULL, NULL, 'waas', 'wr1'),
(20, NULL, NULL, 'waas', 'w2'),
(21, NULL, NULL, 'dsdsd', ''),
(22, NULL, NULL, 'sdsffgfg', ''),
(23, NULL, NULL, 'sdsffgfg', 'w');

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
(1, 'Original', 'rfff', 'sdsd', 'sdsds', ' 2021-07-07', '0'),
(2, 'Original', 'ssdsd', 'fdfdf', 'dfdf', ' 2021-07-13', '1'),
(3, 'Original', 'dfd', 'ggf', 'gfg', ' 2021-07-21', '0'),
(4, 'Original', 'fdf', 'dfdf', 'gf', ' 2021-07-14', '0'),
(5, 'Original', 'sdsd', 'sfdf', 'dfdf', ' 2021-07-12', '0'),
(6, 'Original', 'sdsd', 'fdfdf', 'fdf', ' 2021-07-07', '0'),
(7, 'Original', 'jfhkfg', 'dsd', 'fgfg', ' 2021-07-21', '0'),
(8, 'Original', 'wafa', '', '', ' ', '0');

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
(1, 'Trree', 5, 0, 0, 0, 0, 7, 2021),
(6, 'qwert', 2, 0, 0, 0, 0, 7, 2021),
(7, 'srrd', 0, 6, 0, 0, 0, 7, 2021),
(8, 'were', 4, 0, 0, 0, 0, 7, 2021);

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
(1, 'trree', 2021, 14.25, 15.5, 16.75, 18, 19, 21, 14, 16, 17, 18, 19, 21, 11, 13, 14, 15, 16, 18, 19, 20, 21, 23, 24, 25),
(1392, 'wadd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1393, 'srrd', 2021, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 15, 16, 18, 19, 20, 21),
(1394, 'bbbbbbb', 2021, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30, 16, 18, 19, 20, 21, 23, 24, 25, 26, 28, 29, 30),
(1395, 'werrr', 2021, 1.25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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
(7, 'trree', 2020, '10.00', '10.00'),
(8, 'trree', 2020, '13.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `training_emp_list`
--

CREATE TABLE `training_emp_list` (
  `id` int(11) NOT NULL,
  `training_id` varchar(100) DEFAULT NULL,
  `emp_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_emp_list`
--

INSERT INTO `training_emp_list` (`id`, `training_id`, `emp_id`) VALUES
(1, '1', 'sdsd'),
(2, '1', 'sdsdsd'),
(3, '1', 'dfdf'),
(4, '1', 'dfdf'),
(5, '1', ''),
(6, '2', '');

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

--
-- Dumping data for table `training_speaker_list`
--

INSERT INTO `training_speaker_list` (`id`, `training_id`, `speaker_last_name`, `speaker_first_name`, `speaker_middle_name`, `speaker_ext`, `title`) VALUES
(1, '1', '', '', '', '', ''),
(2, '1', '', '', '', '', ''),
(3, '1', '', '', '', '', ''),
(4, '1', '', '', '', '', ''),
(5, '2', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `training_sponsor_list`
--

CREATE TABLE `training_sponsor_list` (
  `id` int(11) NOT NULL,
  `training_id` varchar(100) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_sponsor_list`
--

INSERT INTO `training_sponsor_list` (`id`, `training_id`, `sponsor`) VALUES
(1, '1', ''),
(2, '1', ''),
(3, '1', ''),
(4, '1', ''),
(5, '2', '');

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

--
-- Dumping data for table `training_table`
--

INSERT INTO `training_table` (`training_id`, `title_of_training`, `from_date`, `to_date`, `type_of_training`, `no_of_hrs`, `venue`, `province`, `agency`) VALUES
(0, 'dfdfdf', '', '', '', '', '', '', ''),
(2, 'digital mareting', '', '', '', '', '', '', '');

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
('0', 'emp', 'emp', 'emp', NULL, 'Employee', 'nbn'),
('1', 'hr', 'Cruz', 'hr    ', 'admin1-admin1-1.png', 'Super Admin', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `employee_job_type`
--
ALTER TABLE `employee_job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_children`
--
ALTER TABLE `emp_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `emp_civil_service`
--
ALTER TABLE `emp_civil_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `emp_file`
--
ALTER TABLE `emp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_govt_id`
--
ALTER TABLE `emp_govt_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_membership`
--
ALTER TABLE `emp_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `emp_non_academic`
--
ALTER TABLE `emp_non_academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `emp_performance`
--
ALTER TABLE `emp_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_reference`
--
ALTER TABLE `emp_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `emp_special_skills`
--
ALTER TABLE `emp_special_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `emp_training`
--
ALTER TABLE `emp_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `emp_voluntary_work`
--
ALTER TABLE `emp_voluntary_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `emp_work_experience`
--
ALTER TABLE `emp_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hiring_education`
--
ALTER TABLE `hiring_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hiring_eligibility`
--
ALTER TABLE `hiring_eligibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hiring_training`
--
ALTER TABLE `hiring_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hiring_work_exp`
--
ALTER TABLE `hiring_work_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_credits_result`
--
ALTER TABLE `leave_credits_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1396;

--
-- AUTO_INCREMENT for table `leave_credits_year`
--
ALTER TABLE `leave_credits_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `training_emp_list`
--
ALTER TABLE `training_emp_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_speaker_list`
--
ALTER TABLE `training_speaker_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `training_sponsor_list`
--
ALTER TABLE `training_sponsor_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
