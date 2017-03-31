-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 03:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_marks_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_user_name` varchar(255) NOT NULL,
  `f_password` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_email`, `f_user_name`, `f_password`, `admin`) VALUES
(1, 'A', 'a@a.com', 'f_a', '123', 1),
(2, 'B', 'b@b.com', 'f_b', '123', 0),
(3, 'C', 'c@c.com', 'f_c', '123', 0),
(4, 'D', 'd@d.com', 'f_d', '123', 0),
(5, 'Chinmesh Manjrekar', 'majchinmesh@live.com', 'majchinmesh', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `m_id` int(11) NOT NULL,
  `m_f_id` int(11) NOT NULL,
  `m_s_id` int(11) NOT NULL,
  `m_marked` int(1) DEFAULT NULL,
  `m_is_sup` int(1) DEFAULT NULL,
  `m_marks` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `m_f_id`, `m_s_id`, `m_marked`, `m_is_sup`, `m_marks`) VALUES
(3, 4, 1, 1, NULL, 40),
(4, 4, 2, 1, NULL, 40),
(5, 4, 3, 1, NULL, 40),
(6, 4, 4, 1, 1, 60),
(7, 3, 1, 1, NULL, 20),
(8, 3, 2, 1, NULL, 30),
(9, 3, 3, 1, 1, 35),
(10, 3, 4, 1, NULL, 27),
(11, 2, 1, 1, NULL, 35),
(12, 2, 2, 1, 1, 59),
(13, 2, 3, 1, NULL, 21),
(14, 2, 4, 1, NULL, 38),
(15, 1, 1, 1, 1, 50),
(16, 1, 2, 1, NULL, 20),
(17, 1, 3, 1, NULL, 35),
(18, 1, 4, 1, NULL, 38),
(20, 1, 7, 1, 1, 50),
(21, 2, 7, 1, 0, 29),
(22, 3, 7, 1, 0, 31),
(23, 4, 7, 1, 0, 40),
(24, 5, 8, 1, 1, 34),
(25, 2, 8, 1, 0, 32),
(26, 3, 8, 1, 0, 14),
(27, 4, 8, 1, 0, 40),
(28, 3, 9, 0, 1, 0),
(29, 4, 9, 0, 0, 0),
(30, 1, 9, 1, 0, 34),
(31, 5, 9, 1, 0, 36);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_roll` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_sup_id` int(11) NOT NULL,
  `s_ex1_id` int(11) NOT NULL,
  `s_ex2_id` int(11) NOT NULL,
  `s_ex3_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_name`, `s_roll`, `s_email`, `s_sup_id`, `s_ex1_id`, `s_ex2_id`, `s_ex3_id`) VALUES
(1, 'P', '14CSE1001', '', 1, 2, 3, 4),
(2, 'Q', '14CSE1002', '', 2, 3, 4, 1),
(3, 'R', '14CSE1003', '', 3, 4, 1, 2),
(4, 'S', '14CSE1004', '', 4, 3, 2, 1),
(7, 'T', '14CSE1005', 'T@T.com', 1, 2, 3, 4),
(8, 'U', '14CSE1006', 'U@U.com', 5, 2, 3, 4),
(9, 'V', '14CSE1007', 'V@V.com', 3, 4, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `f_user_name` (`f_user_name`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `m_f_id` (`m_f_id`),
  ADD KEY `m_s_id` (`m_s_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_name` (`s_name`),
  ADD UNIQUE KEY `s_roll` (`s_roll`),
  ADD KEY `s_sup_id` (`s_sup_id`),
  ADD KEY `s_ex1_id` (`s_ex1_id`),
  ADD KEY `s_ex2_id` (`s_ex2_id`),
  ADD KEY `s_ex3_id` (`s_ex3_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`m_f_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`m_s_id`) REFERENCES `students` (`s_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`s_sup_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`s_ex1_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`s_ex2_id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`s_ex3_id`) REFERENCES `faculty` (`f_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
