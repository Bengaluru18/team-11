-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2018 at 03:58 AM
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
-- Table structure for table `hie_app`
--

CREATE TABLE `hie_app` (
  `dname` varchar(30) NOT NULL,
  `approverdname` varchar(30) NOT NULL,
  `approvername` varchar(30) NOT NULL,
  `approverphno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hie_app`
--

INSERT INTO `hie_app` (`dname`, `approverdname`, `approvername`, `approverphno`) VALUES
('Dental Clinic', 'MSW', 'Nanjundappa', 24356781),
('ENT Surgeon', 'speech_level', 'Laksmi', 23453211),
('Ocupational Theparist', 'Ocupational Theparist', 'Vinay', 23256743),
('Ophthalmologist', 'MSW', 'Sanajana', 25244879),
('Orthopedic Surgeon', 'Physiotherapist', 'Jayalaksmi', 23423421),
('Paediatric Neurologist', 'MSW', 'Kailash Nair', 25635478),
('Physiotherapist ', 'Physiotherapist ', 'Rahul Shivakumar', 23245632),
('Psychiatrists', 'MSW', 'Suraj', 23134621),
('Special Educators', 'MSW', 'Renuka', 23567121),
('speech_level', 'speech_level', 'Jayalata', 23221221);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hie_app`
--
ALTER TABLE `hie_app`
  ADD PRIMARY KEY (`dname`,`approverdname`),
  ADD UNIQUE KEY `unique` (`approverphno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
