-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2016 at 06:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
(2, 'nitale'),
(3, 'westlands'),
(4, 'karen'),
(5, 'cars'),
(6, 'tanzania');

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
(1, '6', 'Group 3'),
(2, '8', 'Group 3'),
(3, '6', 'Group 2'),
(4, '8', 'Group 2'),
(5, '6', 'Group 2'),
(6, '8', 'Group 2'),
(7, '6', 'cars'),
(8, '8', 'cars'),
(9, '6', 'nairobi'),
(10, '6', 'westlands'),
(11, '8', 'westlands');

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
(6, 'Akmal', 'Male', '6865443', 'Desa Paya', ''),
(8, 'fgbfgb', 'Male', 'dfbdb', 'dfbvdfb', '');

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
(1, '+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847,+254725813847', 'This is a test. This is victor.', 0),
(9, 'csdcs', 'sdcsdcsdc', 1),
(10, 'csdcsdc', 'sdcsdc', 1),
(12, 'casca', 'ascascasc', 1),
(13, 'sdvsdv', 'sdvsdvsdv', 1),
(14, 'svsv', 'svsvsdvsd', 0),
(15, 'sdvsd', 'sdvsdvsdv', 1),
(17, 'sSC', 'SDCSDCSDC', 1),
(18, 'vsdvfvbf55', 'vsvsdvsv                      bfbf', 0),
(20, 'nairobi,cars', 'dasascacas', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `people_group`
--
ALTER TABLE `people_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sentsms`
--
ALTER TABLE `sentsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
