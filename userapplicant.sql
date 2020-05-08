-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 01:56 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userapplicant`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE IF NOT EXISTS `allocation` (
`allocation_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `application_id` int(10) NOT NULL,
  `fromDate` date NOT NULL,
  `duration` int(120) NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`allocation_id`, `unit_id`, `application_id`, `fromDate`, `duration`, `endDate`) VALUES
(12, 5, 111, '2020-05-22', 20, '2020-05-25'),
(13, 6, 112, '2020-05-15', 3, '2020-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
`applicant_id` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `monthlyIncome` decimal(21,0) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `email`, `monthlyIncome`, `username`) VALUES
(10, 'yudhaarha@gmail.com', '0', 'yudha10'),
(11, 'darkkuro115@gmail.com', '0', 'dandy12');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
`application_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `applicant_id` int(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `residence_id` int(10) DEFAULT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `applicationDate` varchar(20) DEFAULT NULL,
  `requiredMonth` varchar(120) DEFAULT NULL,
  `requiredYear` varchar(120) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `name`, `applicant_id`, `username`, `residence_id`, `staff_id`, `applicationDate`, `requiredMonth`, `requiredYear`, `status`) VALUES
(111, 'Yudha Adhitya', 10, 'yudha10', 1, 9, '05/12/2020', 'Mei', '2020', 'New'),
(112, 'Yudha Adhitya', 10, 'yudha10', 2, 10, '05/18/2020', 'Mei', '2020', 'New'),
(113, 'Dandy Hariyanto', 11, 'dandy12', NULL, 11, '05/22/2020', 'Mei', '2020', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE IF NOT EXISTS `datauser` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `housing_officer`
--

CREATE TABLE IF NOT EXISTS `housing_officer` (
  `username` varchar(10) NOT NULL,
`staff_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `housing_officer`
--

INSERT INTO `housing_officer` (`username`, `staff_id`) VALUES
('dandy12', 11),
('yudha10', 9),
('yudha10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `residences`
--

CREATE TABLE IF NOT EXISTS `residences` (
`id_r` int(11) NOT NULL,
  `applicant_id` int(30) NOT NULL,
  `residence_Id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `address` varchar(120) NOT NULL,
  `numUnits` int(120) NOT NULL,
  `sizePerUnit` decimal(21,0) NOT NULL,
  `monthlyRental` decimal(21,0) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `residences`
--

INSERT INTO `residences` (`id_r`, `applicant_id`, `residence_Id`, `staff_id`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`) VALUES
(1, 10, 1, 9, 'Jl. A', 1, '20', '1'),
(2, 10, 2, 10, 'Jl. B', 2, '3', '2'),
(3, 11, 0, 11, '', 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`unit_id` int(10) NOT NULL,
  `unit_no` int(10) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `residence_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_no`, `availability`, `residence_id`) VALUES
(5, 0, '', 1),
(6, 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `leveluser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `fullname`, `leveluser`) VALUES
('', '', '', '', ''),
('acel', '123456', 'axelnatashiajaya98@gmail.com', 'Axel Natashia Jaya', 'staff'),
('admin1', 'website', 'sandikagalih@gmail.com', 'Sandika Galih', 'staff'),
('admin10', '121212', 'kevin_sanjaya@gmail.com', 'Kevin Sanjaya', 'staff'),
('admin3', 'motivation', 'jamesbond@gmail.com', 'James Bond', 'staff'),
('admin4', 'code123', 'carenbernadeth@gmail.com', 'Caren Bernadeth', 'staff'),
('dandy12', 'asdfg', 'darkkuro115@gmail.com', 'Dandy Hariyanto', 'applicant'),
('masamune', 'masamunekun', 'masamune_20@gmail.com', 'Joichiro Masamune', 'staff'),
('Mi1001', '123456', 'yogaera29@gmail.com', 'Putu Yoga Era Subakti', 'staff'),
('yudha10', 'qwerty', 'yudhaarha@gmail.com', 'Yudha Adhitya', 'applicant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
 ADD PRIMARY KEY (`allocation_id`), ADD UNIQUE KEY `application_id_2` (`application_id`), ADD KEY `application_id` (`application_id`), ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
 ADD PRIMARY KEY (`applicant_id`), ADD UNIQUE KEY `username_2` (`username`), ADD KEY `username` (`username`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
 ADD PRIMARY KEY (`application_id`), ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `housing_officer`
--
ALTER TABLE `housing_officer`
 ADD PRIMARY KEY (`staff_id`), ADD KEY `username` (`username`);

--
-- Indexes for table `residences`
--
ALTER TABLE `residences`
 ADD PRIMARY KEY (`id_r`), ADD KEY `staff_id` (`staff_id`), ADD KEY `residence_Id` (`residence_Id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`unit_id`), ADD UNIQUE KEY `residence_id_2` (`residence_id`), ADD KEY `residence_id` (`residence_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
MODIFY `allocation_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
MODIFY `applicant_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
MODIFY `application_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `housing_officer`
--
ALTER TABLE `housing_officer`
MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `residences`
--
ALTER TABLE `residences`
MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `unit_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
ADD CONSTRAINT `allocation_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`),
ADD CONSTRAINT `allocation_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `application`
--
ALTER TABLE `application`
ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_id`);

--
-- Constraints for table `housing_officer`
--
ALTER TABLE `housing_officer`
ADD CONSTRAINT `housing_officer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `residences`
--
ALTER TABLE `residences`
ADD CONSTRAINT `residences_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `housing_officer` (`staff_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`residence_id`) REFERENCES `residences` (`residence_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
