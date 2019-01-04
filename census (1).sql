-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 06:42 AM
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
(3, 'Hazrat Bilal', '15302-6769504-8', '123456', 'admin@census.com');

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
(2, 41, 252, 'jalal ', 'dada', 'male', '2018-02-02'),
(4, 39, 227, 'fifi', 'ghalib', 'male', '2018-08-01'),
(6, 39, 227, 'aaa', 'aaa', 'male', '2018-02-02'),
(7, 39, 227, 'su', 'khan dada', 'male', '2017-09-09');

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
(38, 'nekayat', 'ghalib', '15302-0920943-3', 'mandish', 'kabal', 'malakand protected area', 'kpk', 'urban', 'hazratbilalghalib@gmail.com', '03139659062', '82020'),
(39, 'hazrat bilal', 'Asmat Ullah', '15302-6769504-1', 'timergara', 'temergara', 'lower dir', 'kpk', 'urban', 'genius@gmail.com', '03469089697', '123456'),
(40, 'adnan khan', 'sajid khan', '15704-6769897-3', 'dir', 'wari', 'upper dir', 'kpk', 'rural', 'hazratbilalghalibnnnnn@gmail.com', '03338412237', '98741'),
(41, 'jalal din', 'sher afzal', '15302-6769504-9', 'kas', 'timergara', 'lower dir', 'kpk', 'urban', 'nazir44@gmail.com', '03449189694', '62747'),
(42, 'sajid javaid', 'javaid khan', '15504-6769897-3', 'mardan phase ii', 'topi', 'mardan', 'kpk', 'rural', 'hazratbilalghalib33@gmail.com', '03469189094', '45835'),
(43, 'majid umer', 'umer amjad', '25302-6769504-1', 'phase iii', 'shalimar', 'attock', 'punjab', 'rural', 'majidumeer@gmail.com', '03135531766', '16048'),
(58, 'abdul wahab', 'bakht munir', '15502-6769504-4', 'mandish', 'mastuj', 'abbottabad', 'kpk', 'urban', 'mailtoabdulabdul@gmail.com', '03022935228', '378505');

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
(216, 207, 'daughter'),
(225, 209, 'daughter'),
(240, 0, 'daughter'),
(246, 209, 'daughter'),
(247, 228, 'daughter'),
(250, 227, 'daughter'),
(251, 227, 'daughter'),
(253, 252, 'daughter'),
(254, 252, 'daughter'),
(255, 252, 'daughter'),
(259, 258, 'daughter'),
(261, 260, 'daughter'),
(262, 260, 'daughter'),
(263, 260, 'daughter'),
(264, 260, 'daughter'),
(265, 228, 'daughter'),
(269, 260, 'daughter'),
(271, 228, 'daughter'),
(272, 208, 'son'),
(276, 228, 'brother');

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
(209, 40, 'joint house', 30, 'head'),
(210, 39, 'joint house', 31, 'head'),
(221, 40, 'joint house', 34, 'head'),
(227, 39, 'joint house', 35, 'head'),
(228, 39, 'joint house', 36, 'head'),
(238, 39, 'joint house', 43, 'head'),
(239, 39, 'joint house', 44, 'head'),
(252, 41, 'joint house', 45, 'head'),
(256, 39, 'joint house', 46, 'head'),
(257, 42, 'common house', 47, 'head'),
(258, 39, 'joint house', 48, 'head'),
(260, 39, 'common house', 49, 'head'),
(270, 39, 'common house', 50, 'head'),
(274, 43, 'joint house', 51, 'head'),
(275, 39, 'joint house', 52, 'head'),
(277, 39, 'common house', 53, 'head'),
(278, 39, 'joint house', 54, 'head');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `individual_id` int(9) NOT NULL,
  `houseType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`individual_id`, `houseType`) VALUES
(226, 'have house'),
(248, 'joint house'),
(249, 'joint house');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(9) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `reciever_email` varchar(100) NOT NULL,
  `message` varchar(20000) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `reading` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_email`, `reciever_email`, `message`, `subject`, `reading`) VALUES
(32, 'hazratbilal@gmail.com', 'admin@census.com', 'hi how are u', 'change name ', 'on'),
(33, 'admin@census.com', 'hazratbilal@gmail.com', 'dd', 'test', 'on'),
(34, 'admin@census.com', 'genius@gmail.com', 'chage the father name of person whose cnic is 134356787', 'change the father name', 'on'),
(35, 'admin@census.com', 'admin@census.com', 'i change the name of\r\nperson whose cnic is 1234566', 'work done', 'on'),
(36, 'genius@gmail.com', 'admin@census.com', 'jnjkijoij', 'test', 'on'),
(37, 'genius@gmail.com', 'admin@census.com', 'hi how are u', 'test', 'on'),
(38, 'genius@gmail.com', 'admin@census.com', 'hi how are u', 'test', 'on'),
(39, 'admin@census.com', 'genius@gmail.com', 'ok', 'jkj', 'on'),
(40, 'genius@gmail.com', 'hazratbilalghalib@gmail.com', 'name:bilal \r\nf.name:ghalib\r\ncnic:2345678', 'add this', 'on'),
(41, 'genius@gmail.com', 'admin@census.com', 'Message:jjj', 'burn down', 'on'),
(42, 'admin@census.com', 'genius@gmail.com', 'nnnnn', 'test', 'on'),
(43, 'admin@census.com', 'genius@gmail.com', 'jkkjj', 'test', 'on'),
(44, 'admin@census.com', 'genius@gmail.com', 'mk', 'burn down', 'on'),
(45, 'admin@census.com', 'genius@gmail.com', 'jjjj', 'burn down', 'on'),
(46, 'admin@census.com', 'genius@gmail.com', 'niosoafjopdwoas', 'bfddsioajfj', 'on'),
(47, 'genius@gmail.com', 'admin@census.com', 'klkk', 'ij', 'on'),
(48, 'genius@gmail.com', 'admin@census.com', 'kiubhyvgfcdxs', ',,,', 'on'),
(49, 'genius@gmail.com', 'admin@census.com', 'jjjj', 'juuu', 'on'),
(50, 'genius@gmail.com', 'admin@census.com', 'kjjjj', 'jjj', 'on'),
(51, 'genius@gmail.com', 'admin@census.com', 'jjjj', 'jkjjj', 'on'),
(52, 'admin@census.com', 'hazratbilalghalib@gmail.com', 'Message:ZXjdcnL', 'burn down', 'off'),
(53, 'admin@census.com', 'genius@gmail.com', 'YOU ARE NOT WORKING PROPERLY', 'test', 'on');

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
(209, 'suliman', 'sher khan', 'male', '1999-02-02', 'married', 'muslim', 'educated', 'intermediate', 'teacher', '15302-6769504-4', 'urdu', 40, 'No'),
(216, 'seema khan', 'jawad ahmed', 'female', '1991-09-09', 'married', 'muslim', 'educated', 'middle', 'no job', '15302-6769504-9', 'pashto', 39, 'No'),
(221, 'sajid khan', 'nazir khan', 'male', '1990-02-02', 'married', 'muslim', 'educated', 'intermediate', 'teacher', '15302-6769504-4', 'urdu', 40, 'No'),
(225, 'ali khan', 'jalal khan', 'male', '1997-03-03', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '', 'urdu', 40, 'No'),
(226, 'hazrat bilal mir', 'khan dada', 'male', '1978-02-02', 'widow', 'muslim', 'educated', 'intermediate', 'teacher', '', 'urdu', 40, 'No'),
(227, 'abdul wahid ', 'nazir khan', 'male', '1998-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-1', 'urdu', 39, 'No'),
(228, 'suliman', 'khan dada', 'male', '1991-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6769504-1', 'urdu', 39, 'No'),
(238, 'dilawar khan', 'main abdal', 'male', '1970-03-03', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '14443-0999999-5', 'urdu', 39, 'No'),
(239, 'abid khan', 'said khan', 'male', '1980-04-04', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15302-6069504-1', 'urdu', 39, 'No'),
(240, 'sania wahid', 'abdul wahid', 'female', '2017-03-02', '', 'muslim', '', 'noeducation', '', '', 'urdu', 39, 'No'),
(246, 'salik khan', 'suliman khan', 'male', '2016-02-02', 'married', 'muslim', 'student', 'under primary', 'student', '', 'pashto', 40, 'No'),
(247, 'ijaz khan', 'gul zamin', 'male', '1999-02-03', 'unmarried', 'muslim', 'educated', 'bachelor', 'student', '', 'pashto', 39, 'No'),
(248, 'abdul wahid ', 'nazir khan', 'male', '1999-02-04', 'unmarried', 'muslim', 'educated', 'noeducation', 'teacher', '', 'urdu', 39, 'No'),
(249, 'suliman', 'bilal khan', 'male', '1997-09-09', 'unmarried', 'muslim', 'educated', 'noeducation', 'teacher', '', 'urdu', 39, 'No'),
(250, 'suliman', 'dada', 'female', '1999-02-02', 'married', 'muslim', 'educated', 'under primary', 'student', '', 'urdu', 39, 'No'),
(251, 'hazrat bilal ghalib', 'nazir khan', 'male', '1998-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '', 'urdu', 39, 'No'),
(252, 'adnan khan', 'sher zaman', 'male', '1990-02-02', 'married', 'muslim', 'uneducated', 'master', 'engineer', '15704-6709897-3', 'pashto', 41, 'No'),
(253, 'sema khan', 'haron', 'female', '1996-03-03', 'married', 'muslim', 'educated', 'intermediate', 'no job', '', 'pashto', 41, 'No'),
(254, 'hasnain khan', 'adnan khan', 'male', '2018-02-02', 'unmarried', 'muslim', 'less than five', 'less than five', 'less than five', '', 'pashto', 41, 'No'),
(255, 'gulali', 'adnan khan', 'female', '2018-03-03', 'unmarried', 'muslim', 'less than five', 'under primary', 'less than five', '', 'pashto', 41, 'No'),
(256, 'sohail ahmed khan', 'mir afzal ', 'male', '1994-03-04', 'married', 'muslim', 'educated', 'master', 'student', '15804-6769897-3', 'pashto', 39, 'No'),
(257, 'suliman', 'nazir khan', 'male', '1992-02-02', 'married', 'muslim', 'educated', 'matric', 'no job', '15204-6769897-3', 'pashto', 42, 'No'),
(258, 'zubair ahmed', 'khan zada', 'male', '1992-02-02', 'married', 'muslim', 'uneducated', 'under primary', 'no job', '15301-6769504-1', 'pashto', 39, 'No'),
(259, 'sema khan', 'sahad', 'female', '1997-02-02', 'married', 'muslim', 'educated', 'middle', 'no job', '', 'pashto', 39, 'No'),
(260, 'jandaraz khan', 'nazir khan', 'male', '1990-06-07', 'married', 'muslim', 'educated', 'middle', 'no job', '15704-6969697-3', 'pashto', 39, 'No'),
(261, 'jena khan', 'dilawar', 'female', '1994-02-01', 'married', 'muslim', 'educated', 'intermediate', 'no job', '', 'pashto', 39, 'No'),
(262, 'sema khan', 'jandaraz khan', 'female', '2017-02-02', 'unmarried', 'muslim', 'less than five', 'less than five', 'less than five', '', 'pashto', 39, 'No'),
(263, 'sema khan', 'jandaraz khan', 'female', '2017-02-02', 'unmarried', 'muslim', 'less than five', 'less than five', 'less than five', '', 'pashto', 39, 'No'),
(264, 'jalal khan', 'jandaraz khan', 'male', '2018-02-02', 'unmarried', 'muslim', 'less than five', 'less than five', 'less than five', '', 'pashto', 39, 'No'),
(265, 'jalal khan', 'jandaraz khan', 'male', '2018-02-02', 'unmarried', 'muslim', 'less than five', 'less than five', 'less than five', '', 'pashto', 39, 'No'),
(269, 'chatraye be', 'sadar ali', 'male', '2000-02-02', 'married', 'muslim', 'uneducated', 'middle', 'no job', '', 'pashto', 39, 'No'),
(270, 'nouman khan ', 'malak khan', 'male', '2000-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '15902-6769504-1', 'pashto', 39, 'No'),
(271, 'sundas ', 'sahil khan', 'female', '2002-02-02', 'married', 'muslim', 'educated', 'matric', 'student', '', 'pashto', 39, 'No'),
(272, 'sania ', 'Abdul Wahid', 'female', '2018-02-02', 'unmarried', 'muslim', 'student', 'under primary', 'student', NULL, 'urdu', 39, 'No'),
(274, 'hazrat bilal ghalib', 'mene', 'male', '1993-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '25302-6769504-9', 'urdu', 43, 'No'),
(275, 'aa', 'khan dada', 'male', '2000-02-02', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '45704-6769897-3', 'urdu', 39, 'No'),
(276, 'zzddd', 'khan dada', 'male', '2018-07-29', 'unmarried', 'muslim', 'student', 'under primary', 'student', NULL, 'pashto', 39, 'No'),
(277, 'abdul wahab', 'bakht munir', 'male', '1998-02-02', 'married', 'muslim', 'educated', 'intermediate', 'student', '35302-6769504-1', 'pashto', 39, 'No'),
(278, 'suliman', 'nazir khan', 'male', '1999-03-03', 'married', 'muslim', 'educated', 'noeducation', 'teacher', '35704-6769897-3', 'urdu', 39, 'No');

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
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `head_family`
--
ALTER TABLE `head_family`
  ADD UNIQUE KEY `houseNo` (`houseNo`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `head_family`
--
ALTER TABLE `head_family`
  MODIFY `houseNo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
