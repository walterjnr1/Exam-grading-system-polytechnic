-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading_system_foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_session`
--

CREATE TABLE `school_session` (
  `ID` int(5) NOT NULL,
  `current_session` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `ID` int(5) NOT NULL,
  `course_name` varchar(500) NOT NULL,
  `code` varchar(15) NOT NULL,
  `unit` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`ID`, `course_name`, `code`, `unit`) VALUES
(7, 'Computer Graphics', 'csc 111', '3'),
(11, 'Computer Security', 'COM 411', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourseform`
--

CREATE TABLE `tblcourseform` (
  `ID` int(11) NOT NULL,
  `courseformID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `session` varchar(9) NOT NULL,
  `course1` varchar(55) NOT NULL,
  `course2` varchar(55) NOT NULL,
  `course3` varchar(55) NOT NULL,
  `course4` varchar(55) NOT NULL,
  `course5` varchar(55) NOT NULL,
  `course6` varchar(55) NOT NULL,
  `course7` varchar(55) NOT NULL,
  `course8` varchar(55) NOT NULL,
  `course9` varchar(55) NOT NULL,
  `course10` varchar(55) NOT NULL,
  `course11` varchar(55) NOT NULL,
  `course12` varchar(55) NOT NULL,
  `tot_course` int(2) NOT NULL,
  `tot_unit` int(11) NOT NULL,
  `date_reg` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

CREATE TABLE `tblgroup` (
  `ID` int(5) NOT NULL,
  `groupname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(9, 'Admin'),
(8, 'Principal'),
(7, 'Super Admin'),
(11, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tbllecturer`
--

CREATE TABLE `tbllecturer` (
  `ID` int(3) NOT NULL,
  `lecturerID` varchar(5) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `email` varchar(35) NOT NULL,
  `date_reg` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `ID` int(5) NOT NULL,
  `admissionID` varchar(30) NOT NULL,
  `school_session` varchar(11) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `course1` varchar(44) NOT NULL,
  `cat1` varchar(3) NOT NULL,
  `exam1` varchar(3) NOT NULL,
  `total1` int(3) NOT NULL,
  `grade1` varchar(3) NOT NULL,
  `gradeunit1` varchar(3) NOT NULL,
  `gradepoint1` int(11) NOT NULL,
  `weightedpoint1` int(11) NOT NULL,
  `course2` varchar(33) NOT NULL,
  `cat2` varchar(2) NOT NULL,
  `exam2` varchar(3) NOT NULL,
  `total2` varchar(3) NOT NULL,
  `grade2` varchar(3) NOT NULL,
  `gradeunit2` varchar(3) NOT NULL,
  `gradepoint2` int(11) NOT NULL,
  `weightedpoint2` int(11) NOT NULL,
  `course3` varchar(33) NOT NULL,
  `cat3` varchar(3) NOT NULL,
  `exam3` varchar(3) NOT NULL,
  `total3` varchar(3) NOT NULL,
  `grade3` varchar(3) NOT NULL,
  `gradeunit3` varchar(3) NOT NULL,
  `gradepoint3` int(11) NOT NULL,
  `weightedpoint3` int(11) NOT NULL,
  `course4` varchar(33) NOT NULL,
  `cat4` varchar(3) NOT NULL,
  `exam4` varchar(3) NOT NULL,
  `total4` varchar(3) NOT NULL,
  `grade4` varchar(3) NOT NULL,
  `gradeunit4` varchar(3) NOT NULL,
  `gradepoint4` int(11) NOT NULL,
  `weightedpoint4` int(11) NOT NULL,
  `course5` varchar(30) NOT NULL,
  `cat5` varchar(3) NOT NULL,
  `exam5` varchar(3) NOT NULL,
  `total5` varchar(3) NOT NULL,
  `grade5` varchar(3) NOT NULL,
  `gradeunit5` varchar(3) NOT NULL,
  `gradepoint5` int(11) NOT NULL,
  `weightedpoint5` int(11) NOT NULL,
  `course6` varchar(30) NOT NULL,
  `cat6` varchar(3) NOT NULL,
  `exam6` varchar(3) NOT NULL,
  `total6` varchar(3) NOT NULL,
  `grade6` varchar(3) NOT NULL,
  `gradeunit6` varchar(3) NOT NULL,
  `gradepoint6` int(11) NOT NULL,
  `weightedpoint6` int(11) NOT NULL,
  `course7` varchar(30) NOT NULL,
  `cat7` varchar(3) NOT NULL,
  `exam7` varchar(3) NOT NULL,
  `total7` varchar(3) NOT NULL,
  `grade7` varchar(3) NOT NULL,
  `gradeunit7` varchar(3) NOT NULL,
  `gradepoint7` int(11) NOT NULL,
  `weightedpoint7` int(11) NOT NULL,
  `totalpoint` varchar(11) NOT NULL,
  `totalhour` varchar(11) NOT NULL,
  `gpa` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblresultsummary`
--

CREATE TABLE `tblresultsummary` (
  `ID` int(3) NOT NULL,
  `school_session` varchar(11) NOT NULL,
  `semester` varchar(19) NOT NULL,
  `dept` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(4) NOT NULL,
  `admissionID` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `state` varchar(25) NOT NULL,
  `status` int(10) NOT NULL,
  `date_reg` varchar(25) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastaccess` varchar(22) NOT NULL,
  `status` int(1) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `fullname`, `email`, `lastaccess`, `status`, `photo`) VALUES
(28, 'admin', 'admin123', 'Ndueso Walter', 'newleastpaysolution@gmail.com', '2023-08-30 15:14:17', 1, 'uploadImage/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinfo`
--

CREATE TABLE `websiteinfo` (
  `schoolname` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `website` varchar(100) NOT NULL,
  `logo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`schoolname`, `address`, `email`, `phone1`, `phone2`, `website`, `logo`) VALUES
('Foundation Polytechnic', 'Ikot Ekpene', 'Support_grade@foundation.com', '08009856954', '090565665577', 'www.foundation.edu', 'uploadImage/logo.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_session`
--
ALTER TABLE `school_session`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourseform`
--
ALTER TABLE `tblcourseform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblgroup`
--
ALTER TABLE `tblgroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllecturer`
--
ALTER TABLE `tbllecturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresultsummary`
--
ALTER TABLE `tblresultsummary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  ADD PRIMARY KEY (`schoolname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_session`
--
ALTER TABLE `school_session`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcourseform`
--
ALTER TABLE `tblcourseform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblgroup`
--
ALTER TABLE `tblgroup`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbllecturer`
--
ALTER TABLE `tbllecturer`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tblresultsummary`
--
ALTER TABLE `tblresultsummary`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
