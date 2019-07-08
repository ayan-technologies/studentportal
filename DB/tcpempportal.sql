-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 12:10 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcpempportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminUsername` varchar(255) NOT NULL,
  `AdminPassword` text NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compensationleave`
--

CREATE TABLE `compensationleave` (
  `CompensationID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `EmployeeEmpID` int(11) NOT NULL,
  `NoDays` int(11) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `GivenBy` varchar(50) NOT NULL,
  `CompensationCreatedBy` varchar(50) NOT NULL,
  `CompensationCreatedDate` datetime NOT NULL,
  `CompensationModifiedBy` varchar(50) NOT NULL,
  `CompensationModifiedDate` datetime NOT NULL,
  `CompensationStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `DepartmentCreatedBy` int(11) NOT NULL,
  `DepartmentCreatedDate` datetime NOT NULL,
  `DepartmentModifiedBy` int(11) NOT NULL,
  `DepartmentModifiedDate` datetime NOT NULL,
  `DepartmentStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `DepartmentCreatedBy`, `DepartmentCreatedDate`, `DepartmentModifiedBy`, `DepartmentModifiedDate`, `DepartmentStatus`) VALUES
(1, 'Management', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Administration', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Animation', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 'Development', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 'Marketing', 1, '2018-10-05 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 'Guest User', 2, '2018-06-27 00:00:00', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `DesignationID` int(11) NOT NULL,
  `DesignationDepartment` int(11) NOT NULL,
  `DesignationName` varchar(255) NOT NULL,
  `DesignationCreatedBy` int(11) NOT NULL,
  `DesignationCreatedDate` datetime NOT NULL,
  `DesignationModifiedBy` int(11) NOT NULL,
  `DesignationModifiedDate` datetime NOT NULL,
  `DesignationStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`DesignationID`, `DesignationDepartment`, `DesignationName`, `DesignationCreatedBy`, `DesignationCreatedDate`, `DesignationModifiedBy`, `DesignationModifiedDate`, `DesignationStatus`) VALUES
(1, 1, 'Manager', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 2, 'Admin', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 3, '3D Designer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 3, 'Max Designer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 3, 'Maya Designer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 1),
(6, 4, 'Senior PHP Developer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 4, 'PHP Developer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 4, 'Android Developer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 1),
(9, 4, 'iOS Developer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 1),
(10, 3, 'Senior Designer', 1, '2017-11-22 00:00:00', 0, '0000-00-00 00:00:00', 1),
(11, 1, 'Head', 1, '2018-01-04 00:00:00', 0, '0000-00-00 00:00:00', 1),
(12, 4, 'Junior PHP Developer', 2, '2018-04-10 00:00:00', 0, '0000-00-00 00:00:00', 1),
(13, 6, 'Guest User', 2, '2018-06-27 00:00:00', 0, '0000-00-00 00:00:00', 1),
(14, 3, '3D Animator', 2, '2018-07-09 00:00:00', 0, '0000-00-00 00:00:00', 1),
(15, 4, 'Junior iOS Developer', 2, '2018-07-30 13:07:42', 0, '0000-00-00 00:00:00', 1),
(16, 4, 'Junior Android Developer', 2, '2018-07-30 13:07:06', 0, '0000-00-00 00:00:00', 1),
(17, 3, 'Subject Matter Expert', 2, '2018-09-12 00:00:00', 2, '2018-10-01 05:10:53', 1),
(18, 4, 'Project Manager', 2, '2018-10-01 05:10:21', 2, '2018-10-01 05:10:12', 1),
(19, 5, 'Global Support Executive', 2, '2018-10-05 09:10:55', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeUserName` varchar(50) NOT NULL,
  `EmployeePassword` text NOT NULL,
  `EmployeeCreatedBy` int(11) NOT NULL,
  `EmployeeCreatedDate` datetime NOT NULL,
  `EmployeeModifyBy` int(11) NOT NULL,
  `EmployeeModifyDate` datetime NOT NULL,
  `EmployeeStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeUserName`, `EmployeePassword`, `EmployeeCreatedBy`, `EmployeeCreatedDate`, `EmployeeModifyBy`, `EmployeeModifyDate`, `EmployeeStatus`) VALUES
(1, 'Rajendran', 'cmFqMTIz', 1, '2018-06-30 13:27:29', 1, '2018-06-30 13:27:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `EmployeeID` int(11) NOT NULL,
  `EmployeeEmpID` int(11) NOT NULL,
  `EmployeeCode` varchar(20) NOT NULL,
  `EmployeeUserRole` int(11) NOT NULL,
  `EmployeeFirstName` varchar(255) NOT NULL,
  `EmployeeLastName` varchar(255) NOT NULL,
  `EmployeeDesignation` int(11) NOT NULL,
  `EmployeeDepartment` int(11) NOT NULL,
  `EmployeeJoinDate` date NOT NULL,
  `EmployeeJoinDesignation` int(11) NOT NULL,
  `EmployeeMobile` varchar(20) NOT NULL,
  `EmployeeEmail` varchar(255) NOT NULL,
  `EmployeePersonalEmail` varchar(255) NOT NULL,
  `EmployeeAddress` text NOT NULL,
  `EmployeeAddress2` text NOT NULL,
  `EmployeeCity` varchar(255) NOT NULL,
  `EmployeeState` varchar(255) NOT NULL,
  `EmployeeCountry` varchar(255) NOT NULL,
  `EmployeeZipcode` varchar(255) NOT NULL,
  `EmployeeImage` text NOT NULL,
  `EmployeeAltMobile1` varchar(20) NOT NULL,
  `EmployeeAltMobile2` varchar(20) NOT NULL,
  `EmployeeMaritalStatus` varchar(10) NOT NULL,
  `EmployeeInNotice` int(11) NOT NULL,
  `EmployeeIsResigned` int(11) NOT NULL,
  `EmployeeReleavedOn` date NOT NULL,
  `EmployeeCreatedBy` int(11) NOT NULL,
  `EmployeeCreatedDate` datetime NOT NULL,
  `EmployeeModifyBy` int(11) NOT NULL,
  `EmployeeModifyDate` datetime NOT NULL,
  `EmployeeBankName` varchar(255) NOT NULL,
  `EmployeeBankAccName` varchar(255) NOT NULL,
  `EmployeeBankAccNo` varchar(50) NOT NULL,
  `EmployeeBankBranch` varchar(50) NOT NULL,
  `EmployeeBankIFSC` varchar(255) NOT NULL,
  `EmployeeLeaves` float NOT NULL,
  `EmployeePanCard` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`EmployeeID`, `EmployeeEmpID`, `EmployeeCode`, `EmployeeUserRole`, `EmployeeFirstName`, `EmployeeLastName`, `EmployeeDesignation`, `EmployeeDepartment`, `EmployeeJoinDate`, `EmployeeJoinDesignation`, `EmployeeMobile`, `EmployeeEmail`, `EmployeePersonalEmail`, `EmployeeAddress`, `EmployeeAddress2`, `EmployeeCity`, `EmployeeState`, `EmployeeCountry`, `EmployeeZipcode`, `EmployeeImage`, `EmployeeAltMobile1`, `EmployeeAltMobile2`, `EmployeeMaritalStatus`, `EmployeeInNotice`, `EmployeeIsResigned`, `EmployeeReleavedOn`, `EmployeeCreatedBy`, `EmployeeCreatedDate`, `EmployeeModifyBy`, `EmployeeModifyDate`, `EmployeeBankName`, `EmployeeBankAccName`, `EmployeeBankAccNo`, `EmployeeBankBranch`, `EmployeeBankIFSC`, `EmployeeLeaves`, `EmployeePanCard`) VALUES
(1, 1, 'MGM-1', 1, 'Rajendran', '', 1, 1, '2012-06-15', 1, '9876543210', 'rajendran@exponentialteam.com', 'rajendran@exponentialteam.com', '', '', '', '', '', '', '', '9876543210', '', 'Married', 0, 0, '0000-00-00', 2, '2018-06-30 13:27:29', 2, '2018-06-30 13:27:29', '', '', '', '', '', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `InventoryEmployee` int(11) NOT NULL,
  `InventoryItemID` int(11) NOT NULL,
  `InventoryItem` text NOT NULL,
  `InventoryConfig` text NOT NULL,
  `InventoryCondition` text NOT NULL,
  `InventoryOutDate` datetime NOT NULL,
  `InventoryOutInspectedBy` int(11) NOT NULL,
  `InventoryOutStatus` varchar(50) NOT NULL,
  `InventoryOutSign` text NOT NULL,
  `InventoryOutApprovedDate` datetime NOT NULL,
  `InventoryInDate` datetime NOT NULL,
  `InventoryInInspectedBy` int(11) NOT NULL,
  `InventoryInStatus` varchar(50) NOT NULL,
  `InventoryInSign` text NOT NULL,
  `InventoryInApprovedDate` datetime NOT NULL,
  `InventoryAppliedon` datetime NOT NULL,
  `InventoryIsReturned` int(11) NOT NULL,
  `inti` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `InventoryEmployee`, `InventoryItemID`, `InventoryItem`, `InventoryConfig`, `InventoryCondition`, `InventoryOutDate`, `InventoryOutInspectedBy`, `InventoryOutStatus`, `InventoryOutSign`, `InventoryOutApprovedDate`, `InventoryInDate`, `InventoryInInspectedBy`, `InventoryInStatus`, `InventoryInSign`, `InventoryInApprovedDate`, `InventoryAppliedon`, `InventoryIsReturned`, `inti`) VALUES
(1, 1, 0, 'Apple LAPTOP, Charger, Mobile Charging Cable', 'MAC BOOK PRO', 'Good', '2018-01-25 00:00:00', 1, 'Approved', 'Okay. Keep it safe. When you return plz apply on portal.', '2018-01-25 13:05:19', '2018-01-29 03:41:57', 1, 'Approved', 'Okay', '2018-01-29 03:57:58', '2018-01-25 12:56:07', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventorycategory`
--

CREATE TABLE `inventorycategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CategoryEmployee` int(11) NOT NULL,
  `CategoryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorycategory`
--

INSERT INTO `inventorycategory` (`CategoryID`, `CategoryName`, `CategoryEmployee`, `CategoryDate`) VALUES
(1, 'Electronics', 1, '2018-02-09 13:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitem`
--

CREATE TABLE `inventoryitem` (
  `ItemID` int(11) NOT NULL,
  `ItemCategory` int(11) NOT NULL,
  `ItemName` text NOT NULL,
  `ItemConfiguration` text NOT NULL,
  `ItemCondition` text NOT NULL,
  `ItemEmployee` int(11) NOT NULL,
  `ItemDate` datetime NOT NULL,
  `ItemStatus` int(11) NOT NULL,
  `ItemImage` varchar(255) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventoryitem`
--

INSERT INTO `inventoryitem` (`ItemID`, `ItemCategory`, `ItemName`, `ItemConfiguration`, `ItemCondition`, `ItemEmployee`, `ItemDate`, `ItemStatus`, `ItemImage`, `isActive`) VALUES
(1, 1, 'Samsung Tab', 'Samsung Tab S2,Android 7.0 Noughat,32 GB RAM', 'Good, Tempered Glass Already Cracked.', 0, '2018-05-03 12:00:51', 0, '', 0),
(2, 1, 'Macbook Pro Laptop : End-2013', 'Ram:16GB, HDD:512GB, along with Adaptor ', 'Good', 0, '2018-03-09 12:03:18', 0, '', 0),
(3, 1, 'Wireless Keyboard', 'Logitech Wireless Keyboard, white& black colored', 'Good', 0, '2018-03-09 12:01:06', 0, '', 0),
(4, 1, 'Wireless Mouse', 'Logitech black & white Colored wireless mouse', 'Good', 0, '2018-03-09 12:02:42', 0, '', 0),
(5, 1, 'Apple Ipad WIFI Only', '32 GB Ram, 9.7 Inch, With Connecting Cable', 'Good, No damage', 0, '2018-05-03 10:11:27', 0, '', 0),
(6, 1, 'Nexus 5', 'Android Mobile, 16Gb Ram, No SD card', 'Good Condition with back cover', 0, '2018-06-05 12:51:55', 0, '', 0),
(7, 1, 'MacBook Pro : Mid-2014', 'Retina, 15 inch, MID 2014, 2.5 GHz intel Core i7 ,16 GB DDR3 ,Serial Number: C02N80N4G33QN, with Charger, Version\r\n: Mid-2014 ', 'Good Condition', 0, '2018-06-06 04:12:49', 0, '', 0),
(8, 1, 'Lenovo T440P ', 'laptop with Charger ', 'Good Condition', 0, '2018-06-06 04:13:50', 0, '', 0),
(9, 1, 'Iphone 6s Plus', 'Gray Color, 64 GB, mobile only, No Charger, No Headphones.', 'Good Condition, Temper class has crack', 0, '2018-06-06 04:14:44', 0, '', 0),
(10, 1, 'VOYO OBD2', 'device and Connecting Cable', 'Used, good condition', 0, '2018-06-06 04:18:46', 0, '', 0),
(11, 1, 'OBD2 emilator', 'device and Charger', 'Used , Good Condition', 0, '2018-06-06 04:16:14', 0, '', 0),
(12, 1, 'Test', 'Laptop  treer', 'Newggg', 0, '2018-07-12 13:07:53', 0, '', 0),
(13, 1, 'MacBook Pro (Retina, 15-inch, Mid 2014)', 'Ram: 16 GB 1600 MHz DDR3, I7 @.5 GHz, Graphics: Intel Iris Pro 1536 MB, Serial Number: C02NM0X8G3QN, with Adaptor', 'Good', 0, '2018-10-05 10:01:43', 0, '5bb736872249c.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplication`
--

CREATE TABLE `leaveapplication` (
  `LeaveID` int(11) NOT NULL,
  `LeaveEmployee` int(11) NOT NULL,
  `LeaveType` varchar(20) NOT NULL,
  `LeaveReason` text NOT NULL,
  `LeaveFromDate` date NOT NULL,
  `LeaveToDate` date NOT NULL,
  `LeaveSession` varchar(15) NOT NULL,
  `LeavePermissionDate` date NOT NULL,
  `LeavePermissionFrom` time NOT NULL,
  `LeavePermissionTo` time NOT NULL,
  `LeaveAppliedon` datetime NOT NULL,
  `LeaveIsIntimated` int(11) NOT NULL,
  `LeaveDays` float NOT NULL,
  `LeaveStatus` varchar(30) NOT NULL,
  `LeaveStatusReason` text NOT NULL,
  `LeaveApprovedBy` int(11) NOT NULL,
  `LeaveApprovedDate` datetime NOT NULL,
  `LeaveIsCancelled` int(11) NOT NULL,
  `LeaveCancelReason` text NOT NULL,
  `LeaveCancelDate` datetime NOT NULL,
  `LeaveCancelStatusReason` varchar(255) NOT NULL,
  `LeaveCancelApprovedBy` int(11) NOT NULL,
  `LeaveCancelApprovedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveapplication`
--

INSERT INTO `leaveapplication` (`LeaveID`, `LeaveEmployee`, `LeaveType`, `LeaveReason`, `LeaveFromDate`, `LeaveToDate`, `LeaveSession`, `LeavePermissionDate`, `LeavePermissionFrom`, `LeavePermissionTo`, `LeaveAppliedon`, `LeaveIsIntimated`, `LeaveDays`, `LeaveStatus`, `LeaveStatusReason`, `LeaveApprovedBy`, `LeaveApprovedDate`, `LeaveIsCancelled`, `LeaveCancelReason`, `LeaveCancelDate`, `LeaveCancelStatusReason`, `LeaveCancelApprovedBy`, `LeaveCancelApprovedDate`) VALUES
(1, 1, 'Leave', 'Going to Temple Festival', '2019-01-14', '2019-01-14', 'Full Day', '0000-00-00', '00:00:00', '00:00:00', '2019-01-08 04:43:47', 1, 1, 'Pending', '', 0, '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `employeeid` varchar(20) NOT NULL,
  `page` varchar(200) NOT NULL,
  `action` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `employeeid`, `page`, `action`, `time`) VALUES
(1, '2', 'Compensation Leave', 'Applied Cancel Request', '2018-07-30 13:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `officialleave`
--

CREATE TABLE `officialleave` (
  `OfficialID` int(11) NOT NULL,
  `OfficialLeave` varchar(255) NOT NULL,
  `OfficialLeaveFrom` date NOT NULL,
  `OfficialLeaveDay` varchar(255) NOT NULL,
  `OfficialStatus` int(11) NOT NULL,
  `OfficialCreatedBy` int(11) NOT NULL,
  `OfficialDateCreated` datetime NOT NULL,
  `OfficialModifiedBy` int(11) NOT NULL,
  `OfficialDateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officialleave`
--

INSERT INTO `officialleave` (`OfficialID`, `OfficialLeave`, `OfficialLeaveFrom`, `OfficialLeaveDay`, `OfficialStatus`, `OfficialCreatedBy`, `OfficialDateCreated`, `OfficialModifiedBy`, `OfficialDateModified`) VALUES
(1, 'Christmas', '2017-12-25', 'Monday', 1, 1, '2017-12-05 17:37:50', 0, '0000-00-00 00:00:00'),
(2, 'New Year', '2018-01-01', 'Monday', 1, 1, '2017-12-05 17:38:38', 0, '0000-00-00 00:00:00'),
(3, 'Pongal & Tamil New Years Day ', '2018-01-14', 'Sunday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'Thiruvalluvar Day (State Government Holiday)', '2018-01-15', 'Monday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'Republic Day', '2018-01-26', 'Friday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'Good Friday', '2018-03-30', 'Friday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'May Day – labour Day', '2018-05-01', 'Tuesday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'Independence Day', '2018-08-15', 'Wednesday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 'Vinayakar Chathurthi', '2018-09-13', 'Thursday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(10, 'Gandhi Jayanthi', '2018-10-02', 'Tuesday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 'Ayudha Pooja', '2018-10-18', 'Thursday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 'Deepavali', '2018-11-06', 'Tuesday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 'Christmas', '2018-12-25', 'Tuesday', 1, 1, '2018-01-03 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quickmail`
--

CREATE TABLE `quickmail` (
  `QuickID` int(11) NOT NULL,
  `QuickFromID` int(11) NOT NULL,
  `QuickFromName` varchar(255) NOT NULL,
  `QuickFromEmail` varchar(255) NOT NULL,
  `QuickEmailTo` text NOT NULL,
  `QuickSubject` text NOT NULL,
  `QuickMessage` text NOT NULL,
  `QuickDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quickmail`
--

INSERT INTO `quickmail` (`QuickID`, `QuickFromID`, `QuickFromName`, `QuickFromEmail`, `QuickEmailTo`, `QuickSubject`, `QuickMessage`, `QuickDate`) VALUES
(1, 8, 'Satya', 'satyajit@exponentialteam.com', 'surya@exponentialteam.com', 'Need Half day.', '<p>Surya,</p><p>As I am not feeling well I will take a half day today. I have approved task from Gajendra and put the file on render as I will not be available in 2nd half.</p><p>Please approve my leave as I need to take rest.</p><p><br></p><p>Satyajit.</p><p><br></p>', '2018-01-19 13:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `resignedemployee`
--

CREATE TABLE `resignedemployee` (
  `ResignedID` int(11) NOT NULL,
  `ResignedEmpID` int(11) NOT NULL,
  `ResignedNoticeDate` date NOT NULL,
  `ResignedDate` date NOT NULL,
  `ResignedReason` text NOT NULL,
  `ResignedCreatedBy` int(11) NOT NULL,
  `ResignedCreatedDate` datetime NOT NULL,
  `ResignedModifiedBy` int(11) NOT NULL,
  `ResignedModifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `UserRoleID` int(11) NOT NULL,
  `UserRoleName` varchar(255) NOT NULL,
  `UserRoleCreatedBy` int(11) NOT NULL,
  `UserRoleCreatedDate` datetime NOT NULL,
  `UserRoleModifiedBy` int(11) NOT NULL,
  `UserRoleModifiedDate` datetime NOT NULL,
  `UserRoleStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`UserRoleID`, `UserRoleName`, `UserRoleCreatedBy`, `UserRoleCreatedDate`, `UserRoleModifiedBy`, `UserRoleModifiedDate`, `UserRoleStatus`) VALUES
(1, 'Super Admin', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'Admin', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(3, 'Employee', 1, '2017-11-21 00:00:00', 0, '0000-00-00 00:00:00', 1),
(4, 'Guest User', 2, '2018-06-27 00:00:00', 0, '0000-00-00 00:00:00', 1),
(5, 'Development Manager', 2, '2018-10-05 00:00:00', 0, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `compensationleave`
--
ALTER TABLE `compensationleave`
  ADD PRIMARY KEY (`CompensationID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`DesignationID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `EmployeeEmpID` (`EmployeeEmpID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `InventoryItemID` (`InventoryItemID`),
  ADD KEY `inti` (`inti`);

--
-- Indexes for table `inventorycategory`
--
ALTER TABLE `inventorycategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officialleave`
--
ALTER TABLE `officialleave`
  ADD PRIMARY KEY (`OfficialID`);

--
-- Indexes for table `quickmail`
--
ALTER TABLE `quickmail`
  ADD PRIMARY KEY (`QuickID`);

--
-- Indexes for table `resignedemployee`
--
ALTER TABLE `resignedemployee`
  ADD PRIMARY KEY (`ResignedID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`UserRoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compensationleave`
--
ALTER TABLE `compensationleave`
  MODIFY `CompensationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `DesignationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventorycategory`
--
ALTER TABLE `inventorycategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officialleave`
--
ALTER TABLE `officialleave`
  MODIFY `OfficialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quickmail`
--
ALTER TABLE `quickmail`
  MODIFY `QuickID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resignedemployee`
--
ALTER TABLE `resignedemployee`
  MODIFY `ResignedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
