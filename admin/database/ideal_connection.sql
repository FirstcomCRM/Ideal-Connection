-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 03:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideal_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_appointment`
--

CREATE TABLE `db_appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_name` varchar(200) NOT NULL,
  `appointment_telephone` varchar(10) NOT NULL,
  `appointment_email` varchar(200) NOT NULL,
  `appointment_nric` varchar(15) NOT NULL,
  `appointment_total_person` int(11) NOT NULL,
  `appointment_service_type` int(11) NOT NULL,
  `appointment_location` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` text NOT NULL,
  `appointment_end_time` text NOT NULL,
  `appointment_incharge_person` int(11) NOT NULL,
  `appointment_address` text NOT NULL,
  `appointment_remarks` text NOT NULL,
  `appointment_confirm` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_appointment`
--

INSERT INTO `db_appointment` (`appointment_id`, `appointment_name`, `appointment_telephone`, `appointment_email`, `appointment_nric`, `appointment_total_person`, `appointment_service_type`, `appointment_location`, `appointment_date`, `appointment_time`, `appointment_end_time`, `appointment_incharge_person`, `appointment_address`, `appointment_remarks`, `appointment_confirm`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(6, 'denise', '123456789', 'denisexue13@gmail.com', 'd1234568k', 0, 3, 3, '2017-12-27', '04:00 PM', '05:00 PM', 0, '', '', 0, 0, '2017-12-15 16:20:35', 0, '2017-12-15 16:23:22'),
(7, 'Casper', '25622355', 'siewphekxi@firstcom.com.sg', 'G3385510P', 0, 3, 1, '2017-12-21', '12:00 PM', '01:00 PM', 0, 'chao chu kang', '', 0, 0, '2017-12-18 14:09:27', 0, '0000-00-00 00:00:00'),
(8, 'Casper', '25622355', 'siewphekxi@firstcom.com.sg', 'G3385510P', 0, 3, 1, '2017-12-23', '02:00 PM', '03:00 PM', 0, '158 kallang way', '', 2, 0, '2017-12-19 09:24:25', 10000, '2017-12-19 09:46:40'),
(9, 'Casper', '25622355', 'siewphekxi@firstcom.com.sg', 'G3385510P', 0, 3, 3, '2017-12-29', '02:00 PM', '03:00 PM', 0, '', '', 1, 0, '2017-12-19 09:25:39', 10000, '2017-12-19 09:46:37'),
(10, 'Denise', '12345678', 'denisexue13@gmail.com', 's1234545e', 0, 3, 1, '2017-12-27', '06:00 PM', '07:00 PM', 0, 'ang mo kio ave 3 blk 212', '', 2, 0, '2017-12-19 15:45:47', 0, '2017-12-19 15:54:52'),
(11, 'denise', '12345678', 'denisexue13@gmail.com', 'e1234578l', 0, 3, 3, '2017-12-22', '06:00 PM', '07:00 PM', 0, '', '', 1, 0, '2017-12-19 15:57:32', 10000, '2017-12-19 15:58:51'),
(12, 'Casper', '56565656', 'siewphekxi@firstcom.com.sg', 'G3385510P', 0, 3, 3, '2018-01-02', '10:00 AM', '11:00 AM', 0, '', '', 3, 0, '2017-12-29 16:00:06', 0, '2018-01-12 13:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `db_booth`
--

CREATE TABLE `db_booth` (
  `booth_id` int(11) NOT NULL,
  `booth_title` text COLLATE utf8_unicode_ci NOT NULL,
  `booth_left` int(11) NOT NULL,
  `booth_right` int(11) NOT NULL,
  `booth_location` int(11) NOT NULL,
  `booth_address` text COLLATE utf8_unicode_ci NOT NULL,
  `booth_unit_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `booth_floor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `booth_price` decimal(15,2) NOT NULL,
  `booth_status` int(11) NOT NULL,
  `booth_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_booth`
--

INSERT INTO `db_booth` (`booth_id`, `booth_title`, `booth_left`, `booth_right`, `booth_location`, `booth_address`, `booth_unit_no`, `booth_floor`, `booth_price`, `booth_status`, `booth_desc`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, 'Side Corner', 0, 0, 0, '', '', '', '0.00', 1, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'A1-D002', 1, 1, 3, '101 EUNOS AVENUE 3 EUNOS INDUSTRIAL ESTATE SINGAPORE 409835', '05', '10', '200.00', 1, 'A1-D002', 10000, '2018-02-24 12:31:42', 10000, '2018-02-24 13:17:07'),
(3, '	A1-D003', 2, 1, 1, '311 NEW UPPER CHANGI ROAD UOB Bedok Bus Interchange SINGAPORE 467360', '0253', '10', '150.00', 1, '', 10000, '2018-02-27 10:33:56', 10000, '2018-02-27 10:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `db_booth_image`
--

CREATE TABLE `db_booth_image` (
  `image_id` int(11) NOT NULL,
  `image_name` text COLLATE utf8_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `image_booth_id` int(11) NOT NULL,
  `image_main` int(11) NOT NULL,
  `image_status` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `db_booth_image`
--

INSERT INTO `db_booth_image` (`image_id`, `image_name`, `image_url`, `image_booth_id`, `image_main`, `image_status`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(2, '1.png', 'dist/images/booth/2/1.png', 2, 1, 1, 10000, '2018-02-27 10:23:00', 10000, '2018-02-27 10:33:20'),
(3, '123.PNG', 'dist/images/booth/3/123.PNG', 3, 1, 1, 10000, '2018-02-27 10:34:08', 10000, '2018-02-27 10:34:36'),
(4, 'IMG_8627.JPG', 'dist/images/booth/3/IMG_8627.JPG', 3, 0, 1, 10000, '2018-02-27 10:34:22', 10000, '2018-02-27 10:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `db_breakperiod`
--

CREATE TABLE `db_breakperiod` (
  `breakperiod_id` int(11) NOT NULL,
  `breakperiod_title` text NOT NULL,
  `breakperiod_location` int(11) NOT NULL,
  `breakperiod_service_type` int(11) NOT NULL,
  `breakperiod_daytype` int(11) NOT NULL,
  `breakperiod_date` date NOT NULL,
  `breakperiod_enddate` date NOT NULL,
  `breakperiod_starttime` text NOT NULL,
  `breakperiod_endtime` text NOT NULL,
  `breakperiod_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `breakperiod_status` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_breakperiod`
--

INSERT INTO `db_breakperiod` (`breakperiod_id`, `breakperiod_title`, `breakperiod_location`, `breakperiod_service_type`, `breakperiod_daytype`, `breakperiod_date`, `breakperiod_enddate`, `breakperiod_starttime`, `breakperiod_endtime`, `breakperiod_desc`, `breakperiod_status`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(4, 'Holiday', 3, 3, 1, '2017-10-11', '2017-09-14', '01:30 PM', '06:30 PM', 'Holiday', 1, 10000, '2017-09-20 15:37:43', 10000, '2017-09-26 15:49:56'),
(5, 'Holiday', 3, 3, 2, '2017-10-03', '0000-00-00', '01:00 PM', '03:00 PM', 'Holiday', 1, 10000, '2017-09-27 09:13:58', 0, '2017-09-27 10:59:19'),
(6, 'Holiday', 3, 3, 2, '2017-10-03', '0000-00-00', '04:00 PM', '05:00 PM', 'Holiday', 1, 10000, '2017-09-27 09:13:58', 0, '2017-09-27 10:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `db_empl`
--

CREATE TABLE `db_empl` (
  `empl_id` int(11) NOT NULL,
  `empl_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_department` int(11) NOT NULL,
  `empl_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_login_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_login_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_nric` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_birthday` date NOT NULL,
  `empl_joindate` date NOT NULL,
  `empl_resigndate` date NOT NULL,
  `empl_confirmationdate` date NOT NULL,
  `empl_leave_approved1` int(11) NOT NULL,
  `empl_leave_approved2` int(11) NOT NULL,
  `empl_leave_approved3` int(11) NOT NULL,
  `empl_claims_approved1` int(11) NOT NULL,
  `empl_claims_approved2` int(11) NOT NULL,
  `empl_claims_approved3` int(11) NOT NULL,
  `empl_group` int(11) NOT NULL,
  `empl_manager` int(11) NOT NULL,
  `empl_postal_code` int(11) NOT NULL,
  `empl_unit_number` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_street` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_postal_code2` int(11) NOT NULL,
  `empl_unit_number2` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_street2` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_remark` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_outlet` int(11) NOT NULL,
  `empl_bank` int(11) NOT NULL,
  `empl_bank_acc_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empl_nationality` int(11) NOT NULL,
  `empl_emplpass` int(11) NOT NULL,
  `empl_levy_amt` decimal(15,2) NOT NULL,
  `empl_pass_issuance` date NOT NULL,
  `empl_pass_renewal` date NOT NULL,
  `empl_language` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empl_marital_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_religion` int(11) NOT NULL,
  `empl_sex` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_card` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_iscpf` int(11) NOT NULL,
  `empl_cpf_account_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_income_taxid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_race` int(11) NOT NULL,
  `empl_cpf_first_half` int(11) NOT NULL,
  `empl_sld_opt_out` int(11) NOT NULL,
  `empl_fund_opt_out` int(11) NOT NULL,
  `empl_fund_first_half` int(11) NOT NULL,
  `empl_emer_contact` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_emer_relation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_emer_phone1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_emer_phone2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_emer_address` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_emer_remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_resignreason` text COLLATE utf8_unicode_ci NOT NULL,
  `empl_probation` int(11) NOT NULL,
  `empl_prdate` date NOT NULL,
  `empl_paymode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empl_bank_acc_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `empl_work_permit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_work_permit_date_arrival` date NOT NULL,
  `empl_work_permit_application_date` date NOT NULL,
  `empl_numberofchildren` int(11) NOT NULL,
  `empl_isovertime` int(11) NOT NULL,
  `empl_work_time_start` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_work_time_end` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empl_levegroup` int(11) NOT NULL,
  `empl_designation` int(11) NOT NULL,
  `empl_extentionprobation` int(11) NOT NULL,
  `empl_seqno` int(11) NOT NULL,
  `empl_status` int(11) NOT NULL,
  `empl_client` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_empl`
--

INSERT INTO `db_empl` (`empl_id`, `empl_code`, `empl_name`, `empl_department`, `empl_email`, `empl_login_email`, `empl_login_password`, `empl_nric`, `empl_mobile`, `empl_tel`, `empl_birthday`, `empl_joindate`, `empl_resigndate`, `empl_confirmationdate`, `empl_leave_approved1`, `empl_leave_approved2`, `empl_leave_approved3`, `empl_claims_approved1`, `empl_claims_approved2`, `empl_claims_approved3`, `empl_group`, `empl_manager`, `empl_postal_code`, `empl_unit_number`, `empl_street`, `empl_postal_code2`, `empl_unit_number2`, `empl_street2`, `empl_remark`, `empl_outlet`, `empl_bank`, `empl_bank_acc_no`, `empl_nationality`, `empl_emplpass`, `empl_levy_amt`, `empl_pass_issuance`, `empl_pass_renewal`, `empl_language`, `empl_marital_status`, `empl_religion`, `empl_sex`, `empl_card`, `empl_iscpf`, `empl_cpf_account_no`, `empl_income_taxid`, `empl_race`, `empl_cpf_first_half`, `empl_sld_opt_out`, `empl_fund_opt_out`, `empl_fund_first_half`, `empl_emer_contact`, `empl_emer_relation`, `empl_emer_phone1`, `empl_emer_phone2`, `empl_emer_address`, `empl_emer_remarks`, `empl_resignreason`, `empl_probation`, `empl_prdate`, `empl_paymode`, `empl_bank_acc_name`, `empl_work_permit`, `empl_work_permit_date_arrival`, `empl_work_permit_application_date`, `empl_numberofchildren`, `empl_isovertime`, `empl_work_time_start`, `empl_work_time_end`, `empl_levegroup`, `empl_designation`, `empl_extentionprobation`, `empl_seqno`, `empl_status`, `empl_client`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, '-1', 'LZ', 0, 'sales@hairpluslab.com', 'sales@hairpluslab.com', '752cf6475ef9a33828f9b3e093ed7414', '12365456', '64170700', '64170700', '1984-07-17', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 3, 0, 563226, '02', '226C ANG MO KIO AVENUE 1 UOB Ang Mo Kio Avenue 1 SINGAPORE 563226', 596468, '03', '201 ULU PANDAN ROAD NEXUS INTERNATIONAL SCHOOL (SINGAPORE) SINGAPORE 596468', '&lt;p&gt;Experience : 3 Year&lt;/p&gt;\r\n\r\n&lt;p&gt;Position : Manager&lt;/p&gt;\r\n\r\n&lt;p&gt;Available Time : 12:00 pm - 8:00 pm&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 3, 0, '', 0, 0, '0.00', '0000-00-00', '0000-00-00', '', '', 0, 'F', '', 0, '', '', 0, 0, 0, 0, 0, 'Rajak', 'Brother', '56325632', '23562356', '546a asdasdsa asdsa', 'asdadad536 33 asdsafasd', '', 0, '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 0, 0, 0, 1, 0, 10000, '2017-09-21 11:09:46', 10000, '2017-12-12 10:01:38'),
(2, '-1', 'DX', 0, 'sales@hairpluslab.com', 'sal', 'bebc729080e59bf4c7cb24e3d062a23c', '789789789', '64170700', '64170700', '1994-06-08', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 1, 0, 564596, '132', '596D ANG MO KIO STREET 52 CITY VIEW @ CHENG SAN SINGAPORE 564596', 123565, '12', '3150 COMMONWEALTH AVENUE WEST CLEMENTI MRT STATION SINGAPORE 129580', '&lt;p&gt;&lt;em&gt;&lt;strong&gt;Experience : 3 Year&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;&lt;strong&gt;Position : Manager&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;&lt;strong&gt;Available Time : 12:00 pm - 8:00 pm&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 3, 0, '', 0, 0, '0.00', '0000-00-00', '0000-00-00', '', '', 0, 'F', '', 0, '', '', 0, 0, 0, 0, 0, 'adsa', 'asdsad', 'adasd', 'asdasdsaddss', 'sdcdscs', 'dscsdcsdcdsc', '', 0, '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 0, 0, 0, 1, 0, 10000, '2017-09-21 11:13:07', 10000, '2017-12-12 10:02:51'),
(3, '-1', 'ZY', 0, 'sales@hairpluslab.com', 'sa', 'bebc729080e59bf4c7cb24e3d062a23c', '12344567', '64170700', '64170700', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 3, 0, 0, '', '', 0, '', '', '', 3, 0, '', 0, 0, '0.00', '0000-00-00', '0000-00-00', '', '', 0, 'F', '', 0, '', '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 0, 0, 0, 1, 0, 10000, '2017-12-12 10:04:28', 10000, '2017-12-12 10:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `db_group`
--

CREATE TABLE `db_group` (
  `group_id` int(11) NOT NULL,
  `group_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `group_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `group_seqno` int(11) NOT NULL,
  `group_status` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_group`
--

INSERT INTO `db_group` (`group_id`, `group_code`, `group_desc`, `group_seqno`, `group_status`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, 'Admin', 'Admin', 10, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Manager', 'Manager', 20, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Sales Person', 'Sales Person', 30, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_inventory`
--

CREATE TABLE `db_inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_item_name` text COLLATE utf8_unicode_ci NOT NULL,
  `inventory_item_price` decimal(15,2) NOT NULL,
  `inventory_item_quantity` int(11) NOT NULL,
  `inventory_item_owner` int(11) NOT NULL,
  `inventory_item_location` int(11) NOT NULL,
  `inventory_item_status` int(11) NOT NULL,
  `inventory_item_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_inventory`
--

INSERT INTO `db_inventory` (`inventory_id`, `inventory_item_name`, `inventory_item_price`, `inventory_item_quantity`, `inventory_item_owner`, `inventory_item_location`, `inventory_item_status`, `inventory_item_desc`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, 'Table', '100.00', 20, 0, 0, 1, 'Table', 10000, '2018-02-21 12:01:27', 10000, '2018-02-21 12:33:54'),
(2, 'Table', '100.00', 20, 0, 1, 1, 'Table', 10000, '2018-02-21 12:07:32', 10000, '2018-02-26 16:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `db_location`
--

CREATE TABLE `db_location` (
  `location_id` int(11) NOT NULL,
  `location_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_postal_code` int(11) NOT NULL,
  `location_unit_no` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_address` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_close` varchar(200) NOT NULL,
  `location_status` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_location`
--

INSERT INTO `db_location` (`location_id`, `location_title`, `location_postal_code`, `location_unit_no`, `location_address`, `location_desc`, `location_close`, `location_status`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, 'Bedok Bus Interchange', 467360, '311', '311 NEW UPPER CHANGI ROAD UOB Bedok Bus Interchange SINGAPORE 467360', 'Bedok Bus Interchange', '0,', 1, 10000, '2017-09-20 11:14:31', 10000, '2018-02-21 14:26:54'),
(3, '101 Eunos Avenue 3', 409835, '01', '101 EUNOS AVENUE 3 EUNOS INDUSTRIAL ESTATE SINGAPORE 409835', '101 EUNOS AVENUE 3 EUNOS INDUSTRIAL ESTATE SINGAPORE 409835', '0,', 1, 10000, '2017-09-20 11:14:31', 10000, '2018-02-21 14:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `db_menu`
--

CREATE TABLE `db_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_table` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_istap` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_isrefno` int(11) NOT NULL,
  `menu_seqno` int(11) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_menu`
--

INSERT INTO `db_menu` (`menu_id`, `menu_table`, `menu_icon`, `menu_name`, `menu_path`, `menu_istap`, `menu_parent`, `menu_isrefno`, `menu_seqno`, `menu_status`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1, '', 'fa fa-home', 'Dashboard', 'dashboard.php', 0, 0, 0, 10, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, '', 'fa fa-user', 'User', 'empl.php', 0, 0, 0, 20, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, '', 'fa fa-cog', 'Setup', '', 0, 0, 0, 50, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, '', 'fa fa-map-marker', 'Location', 'location.php', 0, 3, 0, 10, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, '', 'fa fa-archive', 'Type of Services', 'servicestype.php', 0, 3, 0, 20, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, '', 'fa fa-hand-stop-o', 'Break Period', 'breakperiod.php', 0, 0, 0, 40, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, '', 'fa fa-check-square-o', 'Appointment', 'appointment.php', 0, 0, 0, 30, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, '', 'fa fa-sitemap', 'Inventory', 'inventory.php', 0, 0, 0, 30, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, '', 'fa fa-home', 'Booth', 'booth.php', 0, 0, 0, 30, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_menuprm`
--

CREATE TABLE `db_menuprm` (
  `menuprm_id` int(11) NOT NULL,
  `menuprm_menu_id` int(11) NOT NULL,
  `menuprm_group_id` int(11) NOT NULL,
  `menuprm_prmcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_menuprm`
--

INSERT INTO `db_menuprm` (`menuprm_id`, `menuprm_menu_id`, `menuprm_group_id`, `menuprm_prmcode`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(68, 1, 3, 'access', 10000, '2016-07-07 16:14:34', 10000, '2016-07-07 16:14:34'),
(77, 2, 2, 'access', 10000, '2016-07-08 17:34:46', 10000, '2016-07-08 17:34:46'),
(78, 2, 2, 'create', 10000, '2016-07-08 17:34:46', 10000, '2016-07-08 17:34:46'),
(79, 2, 2, 'update', 10000, '2016-07-08 17:34:46', 10000, '2016-07-08 17:34:46'),
(80, 2, 2, 'delete', 10000, '2016-07-08 17:34:46', 10000, '2016-07-08 17:34:46'),
(81, 2, 2, 'view', 10000, '2016-07-08 17:34:47', 10000, '2016-07-08 17:34:47'),
(82, 2, 2, 'print', 10000, '2016-07-08 17:34:47', 10000, '2016-07-08 17:34:47'),
(83, 2, 2, 'approved', 10000, '2016-07-08 17:34:47', 10000, '2016-07-08 17:34:47'),
(84, 3, 2, 'access', 10000, '2016-07-08 17:34:50', 10000, '2016-07-08 17:34:50'),
(85, 3, 2, 'create', 10000, '2016-07-08 17:34:50', 10000, '2016-07-08 17:34:50'),
(86, 3, 2, 'update', 10000, '2016-07-08 17:34:51', 10000, '2016-07-08 17:34:51'),
(87, 3, 2, 'delete', 10000, '2016-07-08 17:34:51', 10000, '2016-07-08 17:34:51'),
(88, 3, 2, 'view', 10000, '2016-07-08 17:34:51', 10000, '2016-07-08 17:34:51'),
(89, 3, 2, 'print', 10000, '2016-07-08 17:34:51', 10000, '2016-07-08 17:34:51'),
(90, 3, 2, 'approved', 10000, '2016-07-08 17:34:51', 10000, '2016-07-08 17:34:51'),
(91, 4, 2, 'access', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(92, 4, 2, 'create', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(93, 4, 2, 'update', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(94, 4, 2, 'delete', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(95, 4, 2, 'view', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(96, 4, 2, 'print', 10000, '2016-07-08 17:34:55', 10000, '2016-07-08 17:34:55'),
(97, 4, 2, 'approved', 10000, '2016-07-08 17:34:56', 10000, '2016-07-08 17:34:56'),
(105, 13, 2, 'access', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(106, 13, 2, 'create', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(107, 13, 2, 'update', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(108, 13, 2, 'delete', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(109, 13, 2, 'view', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(110, 13, 2, 'print', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(111, 13, 2, 'approved', 10000, '2016-07-08 17:35:02', 10000, '2016-07-08 17:35:02'),
(112, 5, 2, 'access', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(113, 5, 2, 'create', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(114, 5, 2, 'update', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(115, 5, 2, 'delete', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(116, 5, 2, 'view', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(117, 5, 2, 'print', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(118, 5, 2, 'approved', 10000, '2016-07-08 17:35:06', 10000, '2016-07-08 17:35:06'),
(133, 3, 5, 'access', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(134, 3, 5, 'create', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(135, 3, 5, 'update', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(136, 3, 5, 'delete', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(137, 3, 5, 'view', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(138, 3, 5, 'print', 10000, '2016-07-08 18:34:47', 10000, '2016-07-08 18:34:47'),
(301, 3, 3, 'access', 6, '2016-08-12 10:03:37', 6, '2016-08-12 10:03:37'),
(302, 3, 3, 'create', 6, '2016-08-12 10:03:37', 6, '2016-08-12 10:03:37'),
(303, 3, 3, 'update', 6, '2016-08-12 10:03:37', 6, '2016-08-12 10:03:37'),
(314, 14, 1, 'access', 6, '2016-08-12 10:04:05', 6, '2016-08-12 10:04:05'),
(315, 14, 1, 'create', 6, '2016-08-12 10:04:05', 6, '2016-08-12 10:04:05'),
(316, 14, 1, 'update', 6, '2016-08-12 10:04:06', 6, '2016-08-12 10:04:06'),
(317, 14, 1, 'delete', 6, '2016-08-12 10:04:06', 6, '2016-08-12 10:04:06'),
(318, 14, 1, 'view', 6, '2016-08-12 10:04:06', 6, '2016-08-12 10:04:06'),
(319, 14, 1, 'print', 6, '2016-08-12 10:04:06', 6, '2016-08-12 10:04:06'),
(320, 14, 1, 'approved', 6, '2016-08-12 10:04:06', 6, '2016-08-12 10:04:06'),
(328, 6, 1, 'access', 6, '2016-08-12 10:04:15', 6, '2016-08-12 10:04:15'),
(329, 6, 1, 'create', 6, '2016-08-12 10:04:15', 6, '2016-08-12 10:04:15'),
(330, 6, 1, 'update', 6, '2016-08-12 10:04:15', 6, '2016-08-12 10:04:15'),
(331, 6, 1, 'delete', 6, '2016-08-12 10:04:15', 6, '2016-08-12 10:04:15'),
(332, 6, 1, 'view', 6, '2016-08-12 10:04:16', 6, '2016-08-12 10:04:16'),
(333, 6, 1, 'print', 6, '2016-08-12 10:04:16', 6, '2016-08-12 10:04:16'),
(334, 6, 1, 'approved', 6, '2016-08-12 10:04:16', 6, '2016-08-12 10:04:16'),
(342, 3, 1, 'access', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(343, 3, 1, 'create', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(344, 3, 1, 'update', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(345, 3, 1, 'delete', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(346, 3, 1, 'view', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(347, 3, 1, 'print', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(348, 3, 1, 'approved', 6, '2016-08-12 10:04:28', 6, '2016-08-12 10:04:28'),
(349, 4, 1, 'access', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(350, 4, 1, 'create', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(351, 4, 1, 'update', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(352, 4, 1, 'delete', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(353, 4, 1, 'view', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(354, 4, 1, 'print', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(355, 4, 1, 'approved', 6, '2016-08-12 10:04:32', 6, '2016-08-12 10:04:32'),
(371, 2, 1, 'access', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(372, 2, 1, 'create', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(373, 2, 1, 'update', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(374, 2, 1, 'delete', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(375, 2, 1, 'view', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(376, 2, 1, 'print', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(377, 2, 1, 'approved', 6, '2016-08-12 10:08:47', 6, '2016-08-12 10:08:47'),
(378, 13, 1, 'access', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(379, 13, 1, 'create', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(380, 13, 1, 'update', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(381, 13, 1, 'delete', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(382, 13, 1, 'view', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(383, 13, 1, 'print', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(384, 13, 1, 'approved', 8, '2016-08-15 11:43:59', 8, '2016-08-15 11:43:59'),
(385, 17, 2, 'access', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(386, 17, 2, 'create', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(387, 17, 2, 'update', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(388, 17, 2, 'delete', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(389, 17, 2, 'view', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(390, 17, 2, 'print', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(391, 17, 2, 'approved', 22, '2016-09-02 16:18:56', 22, '2016-09-02 16:18:56'),
(392, 17, 1, 'access', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(393, 17, 1, 'create', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(394, 17, 1, 'update', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(395, 17, 1, 'delete', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(396, 17, 1, 'view', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(397, 17, 1, 'print', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(398, 17, 1, 'approved', 22, '2016-09-02 16:19:00', 22, '2016-09-02 16:19:00'),
(399, 5, 3, 'access', 10000, '2016-09-07 09:53:34', 10000, '2016-09-07 09:53:34'),
(400, 5, 3, 'view', 10000, '2016-09-07 09:53:34', 10000, '2016-09-07 09:53:34'),
(401, 5, 3, 'print', 10000, '2016-09-07 09:53:34', 10000, '2016-09-07 09:53:34'),
(408, 4, 3, 'access', 9, '2016-09-07 13:52:37', 9, '2016-09-07 13:52:37'),
(409, 4, 3, 'create', 9, '2016-09-07 13:52:37', 9, '2016-09-07 13:52:37'),
(410, 4, 3, 'update', 9, '2016-09-07 13:52:37', 9, '2016-09-07 13:52:37'),
(411, 4, 3, 'print', 9, '2016-09-07 13:52:37', 9, '2016-09-07 13:52:37'),
(412, 4, 4, 'print', 9, '2016-09-07 13:52:42', 9, '2016-09-07 13:52:42'),
(427, 1, 2, 'access', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(428, 1, 2, 'create', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(429, 1, 2, 'update', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(430, 1, 2, 'delete', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(431, 1, 2, 'view', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(432, 1, 2, 'print', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(433, 1, 2, 'approved', 11, '2016-09-29 10:21:21', 11, '2016-09-29 10:21:21'),
(441, 14, 2, 'access', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(442, 14, 2, 'create', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(443, 14, 2, 'update', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(444, 14, 2, 'delete', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(445, 14, 2, 'view', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(446, 14, 2, 'print', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(447, 14, 2, 'approved', 11, '2016-09-29 10:21:58', 11, '2016-09-29 10:21:58'),
(448, 8, 1, 'access', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(449, 8, 1, 'create', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(450, 8, 1, 'update', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(451, 8, 1, 'delete', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(452, 8, 1, 'view', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(453, 8, 1, 'print', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(454, 8, 1, 'approved', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(455, 9, 1, 'access', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(456, 9, 1, 'create', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(457, 9, 1, 'update', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(458, 9, 1, 'delete', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(459, 9, 1, 'view', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(460, 9, 1, 'print', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(461, 9, 1, 'approved', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(462, 10, 1, 'access', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(463, 10, 1, 'create', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(464, 10, 1, 'update', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(465, 10, 1, 'delete', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(466, 10, 1, 'view', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(467, 10, 1, 'print', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(468, 10, 1, 'approved', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(469, 11, 1, 'access', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(470, 11, 1, 'create', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(471, 11, 1, 'update', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(472, 11, 1, 'delete', 10000, '2016-11-08 12:52:39', 10000, '2016-11-08 12:52:39'),
(473, 11, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(474, 11, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(475, 11, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(476, 12, 1, 'access', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(477, 12, 1, 'create', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(478, 12, 1, 'update', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(479, 12, 1, 'delete', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(480, 12, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(481, 12, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(482, 12, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(483, 15, 1, 'access', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(484, 15, 1, 'create', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(485, 15, 1, 'update', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(486, 15, 1, 'delete', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(487, 15, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(488, 15, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(489, 15, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(490, 16, 1, 'access', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(491, 16, 1, 'create', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(492, 16, 1, 'update', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(493, 16, 1, 'delete', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(494, 16, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(495, 16, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(496, 16, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(497, 18, 1, 'access', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(498, 18, 1, 'create', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(499, 18, 1, 'update', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(500, 18, 1, 'delete', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(501, 18, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(502, 18, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(503, 18, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(504, 7, 1, 'access', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(505, 7, 1, 'create', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(506, 7, 1, 'update', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(507, 7, 1, 'delete', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(508, 7, 1, 'view', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(509, 7, 1, 'print', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(510, 7, 1, 'approved', 10000, '2016-11-08 12:52:40', 10000, '2016-11-08 12:52:40'),
(511, 8, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(512, 8, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(513, 8, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(514, 8, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(515, 8, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(516, 8, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(517, 8, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(518, 9, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(519, 9, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(520, 9, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(521, 9, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(522, 9, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(523, 9, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(524, 9, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(525, 10, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(526, 10, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(527, 10, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(528, 10, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(529, 10, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(530, 10, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(531, 10, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(532, 11, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(533, 11, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(534, 11, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(535, 11, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(536, 11, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(537, 11, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(538, 11, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(539, 12, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(540, 12, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(541, 12, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(542, 12, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(543, 12, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(544, 12, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(545, 12, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(546, 15, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(547, 15, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(548, 15, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(549, 15, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(550, 15, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(551, 15, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(552, 15, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(553, 16, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(554, 16, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(555, 16, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(556, 16, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(557, 16, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(558, 16, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(559, 16, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(560, 18, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(561, 18, 2, 'create', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(562, 18, 2, 'update', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(563, 18, 2, 'delete', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(564, 18, 2, 'view', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(565, 18, 2, 'print', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(566, 18, 2, 'approved', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(567, 7, 2, 'access', 10000, '2016-11-08 12:52:46', 10000, '2016-11-08 12:52:46'),
(568, 19, 1, 'access', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(569, 19, 1, 'create', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(570, 19, 1, 'update', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(571, 19, 1, 'delete', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(572, 19, 1, 'view', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(573, 19, 1, 'print', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(574, 19, 1, 'approved', 10000, '2017-05-11 17:58:32', 10000, '2017-05-11 17:58:32'),
(591, 23, 6, 'access', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(592, 23, 6, 'create', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(593, 23, 6, 'update', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(594, 23, 6, 'delete', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(595, 23, 6, 'view', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(596, 23, 6, 'print', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(597, 23, 6, 'approved', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(598, 24, 6, 'access', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(599, 24, 6, 'create', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(600, 24, 6, 'update', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(601, 24, 6, 'delete', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(602, 24, 6, 'view', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(603, 24, 6, 'print', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(604, 24, 6, 'approved', 10000, '2017-06-07 16:12:14', 10000, '2017-06-07 16:12:14'),
(605, 1, 6, 'access', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(606, 1, 6, 'create', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(607, 1, 6, 'update', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(608, 1, 6, 'delete', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(609, 1, 6, 'view', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(610, 1, 6, 'print', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(611, 1, 6, 'approved', 10000, '2017-06-07 16:12:24', 10000, '2017-06-07 16:12:24'),
(619, 21, 7, 'access', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(620, 21, 7, 'create', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(621, 21, 7, 'update', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(622, 21, 7, 'delete', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(623, 21, 7, 'view', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(624, 21, 7, 'print', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(625, 21, 7, 'approved', 10000, '2017-06-08 09:17:20', 10000, '2017-06-08 09:17:20'),
(633, 1, 4, 'access', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(634, 1, 4, 'create', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(635, 1, 4, 'update', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(636, 1, 4, 'delete', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(637, 1, 4, 'view', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(638, 1, 4, 'print', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(639, 1, 4, 'approved', 10000, '2017-06-15 10:17:07', 10000, '2017-06-15 10:17:07'),
(647, 21, 4, 'access', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(648, 21, 4, 'create', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(649, 21, 4, 'update', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(650, 21, 4, 'delete', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(651, 21, 4, 'view', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(652, 21, 4, 'print', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(653, 21, 4, 'approved', 10000, '2017-06-15 10:17:15', 10000, '2017-06-15 10:17:15'),
(654, 2, 4, 'access', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(655, 2, 4, 'create', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(656, 2, 4, 'update', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(657, 2, 4, 'delete', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(658, 2, 4, 'view', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(659, 2, 4, 'print', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(660, 2, 4, 'approved', 10000, '2017-06-15 10:17:18', 10000, '2017-06-15 10:17:18'),
(689, 20, 1, 'access', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(690, 20, 1, 'create', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(691, 20, 1, 'update', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(692, 20, 1, 'delete', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(693, 20, 1, 'view', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(694, 20, 1, 'print', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(695, 20, 1, 'approved', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(696, 22, 1, 'access', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(697, 22, 1, 'create', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(698, 22, 1, 'update', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(699, 22, 1, 'delete', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(700, 22, 1, 'view', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(701, 22, 1, 'print', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(702, 22, 1, 'approved', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(703, 23, 1, 'access', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(704, 23, 1, 'create', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(705, 23, 1, 'update', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(706, 23, 1, 'delete', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(707, 23, 1, 'view', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(708, 23, 1, 'print', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(709, 23, 1, 'approved', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(710, 24, 1, 'access', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(711, 24, 1, 'create', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(712, 24, 1, 'update', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(713, 24, 1, 'delete', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(714, 24, 1, 'view', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(715, 24, 1, 'print', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(716, 24, 1, 'approved', 10000, '2017-06-15 10:18:33', 10000, '2017-06-15 10:18:33'),
(717, 20, 4, 'access', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(718, 20, 4, 'create', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(719, 20, 4, 'update', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(720, 20, 4, 'delete', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(721, 20, 4, 'view', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(722, 20, 4, 'print', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(723, 20, 4, 'approved', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(724, 22, 4, 'access', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(725, 22, 4, 'create', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(726, 22, 4, 'update', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(727, 22, 4, 'delete', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(728, 22, 4, 'view', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(729, 22, 4, 'print', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(730, 22, 4, 'approved', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(731, 23, 4, 'access', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(732, 23, 4, 'create', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(733, 23, 4, 'update', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(734, 23, 4, 'delete', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(735, 23, 4, 'view', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(736, 23, 4, 'print', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(737, 23, 4, 'approved', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(738, 24, 4, 'access', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(739, 24, 4, 'create', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(740, 24, 4, 'update', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(741, 24, 4, 'delete', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(742, 24, 4, 'view', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(743, 24, 4, 'print', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(744, 24, 4, 'approved', 10000, '2017-06-15 10:18:42', 10000, '2017-06-15 10:18:42'),
(745, 1, 8, 'access', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(746, 1, 8, 'create', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(747, 1, 8, 'update', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(748, 1, 8, 'delete', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(749, 1, 8, 'view', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(750, 1, 8, 'print', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(751, 1, 8, 'approved', 10000, '2017-06-15 14:52:27', 10000, '2017-06-15 14:52:27'),
(752, 21, 8, 'access', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(753, 21, 8, 'create', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(754, 21, 8, 'update', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(755, 21, 8, 'delete', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(756, 21, 8, 'view', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(757, 21, 8, 'print', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(758, 21, 8, 'approved', 10000, '2017-06-15 14:52:33', 10000, '2017-06-15 14:52:33'),
(759, 2, 8, 'access', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(760, 2, 8, 'create', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(761, 2, 8, 'update', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(762, 2, 8, 'delete', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(763, 2, 8, 'view', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(764, 2, 8, 'print', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(765, 2, 8, 'approved', 10000, '2017-06-15 14:52:37', 10000, '2017-06-15 14:52:37'),
(794, 19, 8, 'access', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(795, 19, 8, 'create', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(796, 19, 8, 'update', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(797, 19, 8, 'delete', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(798, 19, 8, 'view', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(799, 19, 8, 'print', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(800, 19, 8, 'approved', 10000, '2017-06-15 14:52:48', 10000, '2017-06-15 14:52:48'),
(801, 25, 4, 'access', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(802, 25, 4, 'create', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(803, 25, 4, 'update', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(804, 25, 4, 'delete', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(805, 25, 4, 'view', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(806, 25, 4, 'print', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(807, 25, 4, 'approved', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(808, 27, 4, 'access', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(809, 27, 4, 'create', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(810, 27, 4, 'update', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(811, 27, 4, 'delete', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(812, 27, 4, 'view', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(813, 27, 4, 'print', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(814, 27, 4, 'approved', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(815, 26, 4, 'access', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(816, 26, 4, 'create', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(817, 26, 4, 'update', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(818, 26, 4, 'delete', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(819, 26, 4, 'view', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(820, 26, 4, 'print', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(821, 26, 4, 'approved', 10000, '2017-06-30 17:14:04', 10000, '2017-06-30 17:14:04'),
(861, 25, 8, 'access', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(862, 25, 8, 'create', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(863, 25, 8, 'update', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(864, 25, 8, 'view', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(865, 25, 8, 'print', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(866, 25, 8, 'approved', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(867, 27, 8, 'access', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(868, 27, 8, 'create', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(869, 27, 8, 'update', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(870, 27, 8, 'view', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(871, 27, 8, 'print', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(872, 27, 8, 'approved', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(873, 26, 8, 'access', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(874, 26, 8, 'create', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(875, 26, 8, 'update', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(876, 26, 8, 'view', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(877, 26, 8, 'print', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(878, 26, 8, 'approved', 10000, '2017-06-30 17:40:06', 10000, '2017-06-30 17:40:06'),
(886, 1, 5, 'access', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(887, 1, 5, 'create', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(888, 1, 5, 'update', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(889, 1, 5, 'delete', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(890, 1, 5, 'view', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(891, 1, 5, 'print', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(892, 1, 5, 'approved', 10000, '2017-07-06 09:33:06', 10000, '2017-07-06 09:33:06'),
(893, 1, 9, 'access', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(894, 1, 9, 'create', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(895, 1, 9, 'update', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(896, 1, 9, 'delete', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(897, 1, 9, 'view', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(898, 1, 9, 'print', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(899, 1, 9, 'approved', 10000, '2017-07-06 09:38:48', 10000, '2017-07-06 09:38:48'),
(914, 3, 9, 'access', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(915, 3, 9, 'create', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(916, 3, 9, 'update', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(917, 3, 9, 'delete', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(918, 3, 9, 'view', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(919, 3, 9, 'print', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(920, 3, 9, 'approved', 10000, '2017-07-10 15:07:15', 10000, '2017-07-10 15:07:15'),
(921, 3, 8, 'access', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(922, 3, 8, 'create', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(923, 3, 8, 'update', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(924, 3, 8, 'delete', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(925, 3, 8, 'view', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(926, 3, 8, 'print', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(927, 3, 8, 'approved', 10000, '2017-07-10 15:24:34', 10000, '2017-07-10 15:24:34'),
(935, 4, 8, 'access', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(936, 4, 8, 'create', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(937, 4, 8, 'update', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(938, 4, 8, 'delete', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(939, 4, 8, 'view', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(940, 4, 8, 'print', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(941, 4, 8, 'approved', 10000, '2017-07-11 10:31:13', 10000, '2017-07-11 10:31:13'),
(942, 13, 9, 'access', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(943, 13, 9, 'create', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(944, 13, 9, 'update', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(945, 13, 9, 'delete', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(946, 13, 9, 'view', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(947, 13, 9, 'print', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(948, 13, 9, 'approved', 10000, '2017-07-11 10:37:03', 10000, '2017-07-11 10:37:03'),
(949, 14, 9, 'access', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(950, 14, 9, 'create', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(951, 14, 9, 'update', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(952, 14, 9, 'delete', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(953, 14, 9, 'view', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(954, 14, 9, 'print', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(955, 14, 9, 'approved', 10000, '2017-07-11 10:37:09', 10000, '2017-07-11 10:37:09'),
(1031, 30, 5, 'access', 10000, '2017-07-20 10:14:55', 10000, '2017-07-20 10:14:55'),
(1032, 30, 5, 'view', 10000, '2017-07-20 10:14:55', 10000, '2017-07-20 10:14:55'),
(1033, 30, 5, 'print', 10000, '2017-07-20 10:14:55', 10000, '2017-07-20 10:14:55'),
(1034, 29, 5, 'access', 10000, '2017-07-20 10:14:55', 10000, '2017-07-20 10:14:55'),
(1035, 29, 5, 'create', 10000, '2017-07-20 10:14:55', 10000, '2017-07-20 10:14:55'),
(1036, 29, 5, 'update', 10000, '2017-07-20 10:14:56', 10000, '2017-07-20 10:14:56'),
(1037, 29, 5, 'delete', 10000, '2017-07-20 10:14:56', 10000, '2017-07-20 10:14:56'),
(1038, 29, 5, 'view', 10000, '2017-07-20 10:14:56', 10000, '2017-07-20 10:14:56'),
(1039, 29, 5, 'print', 10000, '2017-07-20 10:14:56', 10000, '2017-07-20 10:14:56'),
(1040, 29, 5, 'approved', 10000, '2017-07-20 10:14:56', 10000, '2017-07-20 10:14:56'),
(1055, 1, 7, 'access', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1056, 1, 7, 'create', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1057, 1, 7, 'update', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1058, 1, 7, 'delete', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1059, 1, 7, 'view', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1060, 1, 7, 'print', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1061, 1, 7, 'approved', 10000, '2017-07-21 14:18:54', 10000, '2017-07-21 14:18:54'),
(1083, 3, 7, 'access', 10000, '2017-07-21 14:19:05', 10000, '2017-07-21 14:19:05'),
(1084, 3, 7, 'create', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1085, 3, 7, 'update', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1086, 3, 7, 'delete', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1087, 3, 7, 'view', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1088, 3, 7, 'print', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1089, 3, 7, 'approved', 10000, '2017-07-21 14:19:06', 10000, '2017-07-21 14:19:06'),
(1090, 14, 7, 'access', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1091, 14, 7, 'create', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1092, 14, 7, 'update', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1093, 14, 7, 'delete', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1094, 14, 7, 'view', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1095, 14, 7, 'print', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1096, 14, 7, 'approved', 10000, '2017-07-21 14:19:10', 10000, '2017-07-21 14:19:10'),
(1097, 13, 7, 'access', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1098, 13, 7, 'create', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1099, 13, 7, 'update', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1100, 13, 7, 'delete', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1101, 13, 7, 'view', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1102, 13, 7, 'print', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1103, 13, 7, 'approved', 10000, '2017-07-21 14:19:15', 10000, '2017-07-21 14:19:15'),
(1104, 14, 4, 'access', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1105, 14, 4, 'create', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1106, 14, 4, 'update', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1107, 14, 4, 'delete', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1108, 14, 4, 'view', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1109, 14, 4, 'print', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1110, 14, 4, 'approved', 10000, '2017-07-21 14:19:39', 10000, '2017-07-21 14:19:39'),
(1111, 13, 4, 'access', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1112, 13, 4, 'create', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1113, 13, 4, 'update', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1114, 13, 4, 'delete', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1115, 13, 4, 'view', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1116, 13, 4, 'print', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1117, 13, 4, 'approved', 10000, '2017-07-21 14:19:43', 10000, '2017-07-21 14:19:43'),
(1155, 3, 4, 'access', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1156, 3, 4, 'create', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1157, 3, 4, 'update', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1158, 3, 4, 'delete', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1159, 3, 4, 'view', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1160, 3, 4, 'print', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1161, 3, 4, 'approved', 10000, '2017-07-21 14:21:32', 10000, '2017-07-21 14:21:32'),
(1172, 5, 4, 'access', 10000, '2017-07-21 14:23:08', 10000, '2017-07-21 14:23:08'),
(1173, 5, 4, 'view', 10000, '2017-07-21 14:23:08', 10000, '2017-07-21 14:23:08'),
(1174, 5, 4, 'print', 10000, '2017-07-21 14:23:08', 10000, '2017-07-21 14:23:08'),
(1175, 5, 7, 'access', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1176, 5, 7, 'create', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1177, 5, 7, 'update', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1178, 5, 7, 'delete', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1179, 5, 7, 'view', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1180, 5, 7, 'print', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1181, 5, 7, 'approved', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1182, 30, 7, 'access', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1183, 30, 7, 'create', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1184, 30, 7, 'update', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1185, 30, 7, 'delete', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1186, 30, 7, 'view', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1187, 30, 7, 'print', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1188, 30, 7, 'approved', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1189, 29, 7, 'access', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1190, 29, 7, 'create', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1191, 29, 7, 'update', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1192, 29, 7, 'delete', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1193, 29, 7, 'view', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1194, 29, 7, 'print', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1195, 29, 7, 'approved', 10000, '2017-07-21 14:24:54', 10000, '2017-07-21 14:24:54'),
(1196, 31, 7, 'access', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1197, 31, 7, 'create', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1198, 31, 7, 'update', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1199, 31, 7, 'delete', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1200, 31, 7, 'view', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1201, 31, 7, 'print', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1202, 31, 7, 'approved', 10000, '2017-07-27 16:59:11', 10000, '2017-07-27 16:59:11'),
(1203, 20, 7, 'access', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1204, 20, 7, 'create', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1205, 20, 7, 'update', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1206, 20, 7, 'delete', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1207, 20, 7, 'view', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1208, 20, 7, 'print', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1209, 20, 7, 'approved', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1210, 24, 7, 'access', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1211, 24, 7, 'create', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1212, 24, 7, 'update', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1213, 24, 7, 'delete', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1214, 24, 7, 'view', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1215, 24, 7, 'print', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1216, 24, 7, 'approved', 10000, '2017-07-28 09:29:24', 10000, '2017-07-28 09:29:24'),
(1217, 2, 7, 'access', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1218, 2, 7, 'create', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1219, 2, 7, 'update', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1220, 2, 7, 'delete', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1221, 2, 7, 'view', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1222, 2, 7, 'print', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1223, 2, 7, 'approved', 10000, '2017-07-28 09:29:34', 10000, '2017-07-28 09:29:34'),
(1224, 1, 10, 'access', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1225, 1, 10, 'create', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1226, 1, 10, 'update', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1227, 1, 10, 'delete', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1228, 1, 10, 'view', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1229, 1, 10, 'print', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1230, 1, 10, 'approved', 10000, '2017-07-31 09:37:14', 10000, '2017-07-31 09:37:14'),
(1245, 20, 10, 'access', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1246, 20, 10, 'update', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1247, 20, 10, 'view', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1248, 24, 10, 'access', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1249, 24, 10, 'update', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1250, 24, 10, 'view', 10000, '2017-07-31 09:45:59', 10000, '2017-07-31 09:45:59'),
(1251, 20, 8, 'access', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1252, 20, 8, 'create', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1253, 20, 8, 'update', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1254, 20, 8, 'delete', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1255, 20, 8, 'view', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1256, 20, 8, 'print', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1257, 22, 8, 'access', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1258, 22, 8, 'create', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1259, 22, 8, 'update', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1260, 22, 8, 'delete', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1261, 22, 8, 'view', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1262, 22, 8, 'print', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1263, 23, 8, 'access', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1264, 23, 8, 'create', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1265, 23, 8, 'update', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1266, 23, 8, 'delete', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1267, 23, 8, 'view', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1268, 23, 8, 'print', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1269, 24, 8, 'access', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1270, 24, 8, 'create', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1271, 24, 8, 'update', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1272, 24, 8, 'delete', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59');
INSERT INTO `db_menuprm` (`menuprm_id`, `menuprm_menu_id`, `menuprm_group_id`, `menuprm_prmcode`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(1273, 24, 8, 'view', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1274, 24, 8, 'print', 10000, '2017-08-08 15:30:59', 10000, '2017-08-08 15:30:59'),
(1275, 1, 1, 'access', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1276, 1, 1, 'create', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1277, 1, 1, 'update', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1278, 1, 1, 'delete', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1279, 1, 1, 'view', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1280, 1, 1, 'print', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1281, 1, 1, 'approved', 10000, '2017-08-11 14:55:14', 10000, '2017-08-11 14:55:14'),
(1282, 5, 1, 'access', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1283, 5, 1, 'create', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1284, 5, 1, 'update', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1285, 5, 1, 'delete', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1286, 5, 1, 'view', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1287, 5, 1, 'print', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1288, 5, 1, 'approved', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1289, 30, 1, 'access', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1290, 30, 1, 'create', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1291, 30, 1, 'update', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1292, 30, 1, 'delete', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1293, 30, 1, 'view', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1294, 30, 1, 'print', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1295, 30, 1, 'approved', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1296, 29, 1, 'access', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1297, 29, 1, 'create', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1298, 29, 1, 'update', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1299, 29, 1, 'delete', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1300, 29, 1, 'view', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1301, 29, 1, 'print', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1302, 29, 1, 'approved', 10000, '2017-08-11 14:55:22', 10000, '2017-08-11 14:55:22'),
(1303, 31, 1, 'access', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1304, 31, 1, 'create', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1305, 31, 1, 'update', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1306, 31, 1, 'delete', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1307, 31, 1, 'view', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1308, 31, 1, 'print', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27'),
(1309, 31, 1, 'approved', 10000, '2017-08-11 14:55:27', 10000, '2017-08-11 14:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `db_servicestype`
--

CREATE TABLE `db_servicestype` (
  `service_id` int(11) NOT NULL,
  `service_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `service_start` text NOT NULL,
  `service_end` text NOT NULL,
  `service_location` int(11) NOT NULL,
  `service_duration` int(11) NOT NULL,
  `service_booking_max` int(11) NOT NULL,
  `service_status` int(11) NOT NULL,
  `service_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `service_seqno` int(11) NOT NULL,
  `insertBy` int(11) NOT NULL,
  `insertDateTime` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_servicestype`
--

INSERT INTO `db_servicestype` (`service_id`, `service_title`, `service_start`, `service_end`, `service_location`, `service_duration`, `service_booking_max`, `service_status`, `service_desc`, `service_seqno`, `insertBy`, `insertDateTime`, `updateBy`, `updateDateTime`) VALUES
(3, 'Hair Care', '10:00 AM', '08:00 PM', 3, 60, 0, 1, 'Hair Care', 10, 10000, '2017-09-20 14:34:27', 10000, '2017-09-28 09:17:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_appointment`
--
ALTER TABLE `db_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `db_booth`
--
ALTER TABLE `db_booth`
  ADD PRIMARY KEY (`booth_id`);

--
-- Indexes for table `db_booth_image`
--
ALTER TABLE `db_booth_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `db_breakperiod`
--
ALTER TABLE `db_breakperiod`
  ADD PRIMARY KEY (`breakperiod_id`);

--
-- Indexes for table `db_empl`
--
ALTER TABLE `db_empl`
  ADD PRIMARY KEY (`empl_id`);

--
-- Indexes for table `db_group`
--
ALTER TABLE `db_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `db_inventory`
--
ALTER TABLE `db_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `db_location`
--
ALTER TABLE `db_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `db_menu`
--
ALTER TABLE `db_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `db_menuprm`
--
ALTER TABLE `db_menuprm`
  ADD PRIMARY KEY (`menuprm_id`);

--
-- Indexes for table `db_servicestype`
--
ALTER TABLE `db_servicestype`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_appointment`
--
ALTER TABLE `db_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `db_booth`
--
ALTER TABLE `db_booth`
  MODIFY `booth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_booth_image`
--
ALTER TABLE `db_booth_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_breakperiod`
--
ALTER TABLE `db_breakperiod`
  MODIFY `breakperiod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `db_empl`
--
ALTER TABLE `db_empl`
  MODIFY `empl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_group`
--
ALTER TABLE `db_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_inventory`
--
ALTER TABLE `db_inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `db_location`
--
ALTER TABLE `db_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_menu`
--
ALTER TABLE `db_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `db_menuprm`
--
ALTER TABLE `db_menuprm`
  MODIFY `menuprm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1310;
--
-- AUTO_INCREMENT for table `db_servicestype`
--
ALTER TABLE `db_servicestype`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
