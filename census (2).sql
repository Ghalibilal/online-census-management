-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 06:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `census`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `gmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `cnic`, `Password`, `gmail`) VALUES
(1, 'Hazrat Bilal', '15302-6769504-1', '123456', 'hazratbilalghalib@gmail.com'),
(2, 'Abdul Wahid', '15304-3917530-3', '123456', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `id` int(9) NOT NULL,
  `emp_id` int(9) NOT NULL,
  `head_id` int(9) NOT NULL,
  `name` varchar(40) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`id`, `emp_id`, `head_id`, `name`, `father_name`, `gender`, `birthday`) VALUES
(1, 39, 208, 'sania ', 'Abdul Wahid', 'female', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `death`
--

CREATE TABLE `death` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `age_of_death` date NOT NULL,
  `emp_id` int(9) NOT NULL,
  `head_id` int(9) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `death`
--

INSERT INTO `death` (`id`, `name`, `father_name`, `birthday`, `age_of_death`, `emp_id`, `head_id`, `gender`) VALUES
(208, 'abdul wahid ', 'nazir khan', '1999-04-06', '2018-02-02', 39, 208, 'male'),
(209, 'suliman', 'sher khan', '1999-02-02', '2017-02-02', 40, 209, 'male'),
(213, 'shahrukhan', 'godar khan', '1990-02-02', '2018-04-03', 39, 213, 'male'),
(215, 'zubaida bibi', 'sajid', '1996-02-04', '2018-02-03', 39, 215, 'female'),
(216, 'seema khan', 'jawad ahmed', '1991-09-09', '2018-03-05', 39, 208, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(19) NOT NULL,
  `name` varchar(40) NOT NULL,
  `Father_name` varchar(40) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `area` varchar(100) NOT NULL,
  `tehsil` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(40) NOT NULL,
  `region` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `Father_name`, `cnic`, `area`, `tehsil`, `district`, `province`, `region`, `email`, `phone`, `password`) VALUES
(38, 'nekayat', 'malak khan', '15302-0920943-3', 'mandish', 'temergara', 'lower dir', 'kpk', 'rural', 'hazratbilalghalib@gmail.com', '03139659062', '82020'),
(39, 'hazrat bilal', 'Asmat Ullah', '15302-6769504-1', 'timergara', 'temergara', 'lower dir', 'kpk', 'urban', 'genius@gmail.com', '03469089697', '25118'),
(40, 'adnan khan', 'sajid khan', '15704-6769897-3', 'dir', 'wari', 'upper dir', 'kpk', 'rural', 'hazratbilalghalibnnnnn@gmail.com', '03338412237', '98741');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int(9) NOT NULL,
  `head_id` int(9) NOT NULL,
  `relation_head` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_id`, `head_id`, `relation_head`) VALUES
(212, 208, 'wife'),
(216, 207, 'wife'),
(220, 217, 'son-in-law');

-- --------------------------------------------------------

--
-- Table structure for table `head_family`
--

CREATE TABLE `head_family` (
  `head_id` int(9) NOT NULL,
  `emp_id` int(9) NOT NULL,
  `houseType` varchar(40) NOT NULL,
  `houseNo` int(9) NOT NULL,
  `head_f` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_family`
--

INSERT INTO `head_family` (`head_id`, `emp_id`, `houseType`, `houseNo`, `head_f`) VALUES
(206, 39, 'joint house', 27, 'head'),
(207, 38, 'joint house', 28, 'head'),
(208, 39, 'joint house', 29, 'head'),
(209, 40, 'joint house', 30, 'head'),
(210, 39, 'joint house', 31, 'head'),
(217, 39, 'joint house', 33, 'head'),
(221, 40, 'common house', 34, 'head'),
(222, 40, 'common house', 37, 'head');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `individual_id` int(9) NOT NULL,
  `houseType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `serial_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fatherName` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` date NOT NULL,
  `martial_status` varchar(10) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `education_status` varchar(30) NOT NULL,
  `qualification` varchar(60) NOT NULL,
  `job` varchar(50) NOT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `tongue` varchar(40) NOT NULL,
  `emp_id` int(9) NOT NULL,
  `death_status` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`serial_no`, `name`, `fatherName`, `gender`, `age`, `martial_status`, `religion`, `education_status`, `qualification`, `job`, `cnic`, `tongue`, `emp_id`, `death_status`) VALUES
(207, 'hazrat bilal', 'Asmat Ullah', 'male', '2000-04-29', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-1', 'urdu', 38, 'No'),
(208, 'abdul wahid ', 'nazir khan', 'male', '1999-04-06', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15402-3917530-3', 'urdu', 39, 'Yes'),
(209, 'suliman', 'sher khan', 'male', '1999-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-4', 'urdu', 40, 'Yes'),
(216, 'seema khan', 'jawad ahmed', 'female', '1991-09-09', 'married', 'muslim', 'educated', 'middle', 'no job', '15302-6769504-9', 'pashto', 39, 'Yes'),
(217, 'hazratbilal', 'shah zullah khan', 'male', '1999-04-04', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-0', 'urdu', 39, 'No'),
(220, 'hazratbilal', 'shah zullah khan', 'male', '1991-01-01', 'unmarried', 'muslim', 'educated', 'noeducation', 'teacher', '14444-0999999-5', 'urdu', 39, 'No'),
(221, 'sajid khan', 'nazir khan', 'male', '1990-02-02', 'married', 'muslim', 'educated', 'intermediate', 'teacher', '15302-6769504-4', 'urdu', 40, 'No'),
(222, 'hazrat bilal', 'Asmat Ullah', 'male', '1990-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-9', 'urdu', 40, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death`
--
ALTER TABLE `death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `head_family`
--
ALTER TABLE `head_family`
  ADD UNIQUE KEY `houseNo` (`houseNo`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `head_family`
--
ALTER TABLE `head_family`
  MODIFY `houseNo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
