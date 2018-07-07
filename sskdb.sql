-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2018 at 07:05 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sskdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dno` int(10) NOT NULL,
  `dname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dno`, `dname`) VALUES
(1, 'Paediatric Neurologist'),
(2, 'Orthopedic Surgeon'),
(3, 'Ophthalmologist'),
(4, 'ENT Surgeon'),
(5, 'Dental Clinic'),
(6, 'Psychiatrists'),
(7, 'Special Educators'),
(8, 'Pschologist'),
(9, 'Ocupational Theparist'),
(10, 'Physiotherapist '),
(11, 'Dummy');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `parent_name` varchar(30) NOT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `reg_no` varchar(10) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `Class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `dob`, `parent_name`, `phone_no`, `reg_no`, `age`, `Class`) VALUES
('Prassana Raveendran', '1997-06-16', 'Raveendran', 25238121, 'P100', 16, 10),
('Yash Srivastav', '1997-03-16', 'DK Srivastav', 22905721, 'P101', 3, NULL),
('poniwal', '1997-08-23', 'sonu', 23459088, 'P23', 13, 8),
('Roy', '1999-02-01', 'Lokesh', 23987899, 'P234', 6, 1),
('Sunny ', '1997-09-23', 'nishanth', 23456789, 'P30', 7, 4),
('Ojas', '1997-02-01', 'Poonam', 22234321, 'P32', 7, 3),
('minal', '1999-02-03', 'masi', 23432345, 'P345', 9, 5),
('naman', '1999-03-11', 'Raman', 29034459, 'P43', 17, 9),
('moksh', '1997-04-02', 'Komal', 24564321, 'P432', 9, 8),
('aswani', '1998-02-03', 'mani', 23412345, 'P78', 6, 1),
('kumar', '1997-08-01', 'Adwani', 25678900, 'P784', 6, 1),
('Kanya', '1996-06-07', 'Tanya', 23123244, 'P908', 16, 9),
('Andrew', '1994-06-08', 'Koyal', 23409099, 'P98', 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(6) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'MSW'),
(2, 'Medical Professional'),
(3, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_time` time NOT NULL,
  `schedule_date` date NOT NULL,
  `doctor_id` int(6) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_time`, `schedule_date`, `doctor_id`, `reg_no`, `status_id`) VALUES
('01:10:50', '2018-07-01', 10, 'P784', 1),
('01:20:00', '2018-07-12', 90, 'P234', 2),
('02:20:10', '2018-08-16', 221, 'P30', 3),
('03:23:00', '2018-08-04', 98, 'P100', 3),
('03:30:30', '2018-07-11', 98, 'P78', 1),
('06:09:30', '2018-02-12', 88, 'P432', 3),
('07:20:30', '2018-09-06', 99, 'P345', 2),
('08:20:13', '2018-07-27', 10, 'P100', 4),
('21:09:05', '2018-07-11', 99, 'P908', 1),
('23:09:21', '2018-07-04', 111, 'P23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_info`) VALUES
(1, 'Confirm'),
(2, 'Pending'),
(3, 'Cancellation Pending'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `emp_id` int(6) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `role_id` int(6) NOT NULL,
  `dno` int(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`emp_id`, `emp_name`, `phone_no`, `email_id`, `role_id`, `dno`, `password`) VALUES
(10, 'Vineeth Kumar', 22347861, 'vineeth@ssk.in', 2, 4, 'mmm'),
(12, 'Ratna T V', 22435612, 'ratna@ssk.in', 2, 3, 'mmm'),
(34, 'Manikanta Gowda', 24356632, 'manikanta.gowda@ssk.in', 2, 2, 'mmm'),
(88, 'Hariharan', 24355221, 'hariharan@ssk.in', 2, 7, 'mmm'),
(90, 'Shruthi ', 22675879, 'shruthi@ssk.in', 2, 10, 'mmm'),
(98, 'Subramaniyam', 26453721, 'subramaniyam@ssk.in', 2, 1, 'mmm'),
(99, 'Subhash Chakraborty', 26487022, 'subhash.chakraborty@ssk.in', 2, 8, 'mmm'),
(111, 'Rahul Narayan', 26580999, 'rahul@ssk.in', 1, 11, 'msw'),
(112, 'Subbalakshmi', 25224265, 'subbalakshmi@ssk.in', 1, 11, 'msw'),
(221, 'Sujana', 26511133, 'sujana@ssk.in', 3, 11, 'rrr'),
(222, 'Aparna Gupta', 26511135, 'aparna@ssk.in', 3, 11, 'rrr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dno`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`reg_no`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_time`,`schedule_date`),
  ADD KEY `fk3` (`doctor_id`),
  ADD KEY `fk4` (`reg_no`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`emp_id`,`role_id`),
  ADD KEY `fk1` (`dno`),
  ADD KEY `fk2` (`role_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`doctor_id`) REFERENCES `workers` (`emp_id`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`reg_no`) REFERENCES `patient` (`reg_no`),
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`dno`) REFERENCES `department` (`dno`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
