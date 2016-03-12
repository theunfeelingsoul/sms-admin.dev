-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 at 05:57 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` int(11) NOT NULL,
  `label_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `label_name`) VALUES
(1, 'nairobi'),
(3, 'westland'),
(4, 'karen'),
(6, 'tanzanias'),
(8, 'Family'),
(9, 'dddd'),
(10, 'Friends');

-- --------------------------------------------------------

--
-- Table structure for table `people_group`
--

CREATE TABLE `people_group` (
  `id` int(11) NOT NULL,
  `person_id` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people_group`
--

INSERT INTO `people_group` (`id`, `person_id`, `group_name`) VALUES
(1, '5', '8'),
(2, '4', '8'),
(3, '6', '8'),
(4, '7', '10'),
(5, '5', '10');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `idnumber` text NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id_personal`, `name`, `gender`, `telp`, `idnumber`, `label`) VALUES
(4, 'Bryan - bro', 'Male', '+254725720658', 'xxxxxx', ''),
(5, 'Victor -kenya', 'Male', '+254791604418', 'ddddddd', ''),
(6, 'Fatihi', 'Male', '+254725813847', 'yyyyyyyy', ''),
(7, 'Sam', 'Female', '+254725498453', '5678iuhgfgh', '');

-- --------------------------------------------------------

--
-- Table structure for table `sentsms`
--

CREATE TABLE `sentsms` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `smstext` varchar(255) NOT NULL,
  `draft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sentsms`
--

INSERT INTO `sentsms` (`id`, `phone`, `smstext`, `draft`) VALUES
(1, '+254773648008', 'test2', 0),
(2, '+254725813847', 'test2', 0),
(3, '+254774429248', 'test2', 0),
(4, '+254773648008', 'sacascasc', 0),
(5, '+254725813847', 'sacascasc', 0),
(6, '+254774429248', 'sacascasc', 0),
(7, '', '', 1),
(10, '', '', 1),
(11, '+254725720658', 'This is the government. We see you. 0_0', 0),
(12, '+254791604418', 'This is the government. We see you. 0_0', 0),
(13, '+254725720658', 'bla bla bla', 0),
(14, '+254791604418', 'bla bla bla', 0),
(15, '+254725720658', 'dbhdfnn', 0),
(16, '+254791604418', 'dbhdfnn', 0),
(17, '+254791604418', 'This is the government. We are still watching you.', 0),
(18, '+254725720658', 'This is the government. We are still watching you.', 0),
(19, '+254725813847', 'This is the government. We are still watching you.', 0),
(20, '+254791604418', 'Gov', 0),
(21, '+254725720658', 'Gov', 0),
(22, '+254725813847', 'Gov', 0),
(23, '+254725498453', 'Hello. This is the Government. We see you.', 0),
(24, '+254791604418', 'Hello. This is the Government. We see you.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`) VALUES
(2, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people_group`
--
ALTER TABLE `people_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indexes for table `sentsms`
--
ALTER TABLE `sentsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `people_group`
--
ALTER TABLE `people_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sentsms`
--
ALTER TABLE `sentsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
