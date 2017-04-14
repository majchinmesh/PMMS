-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 02:44 PM
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
(1, 'Dr. Damodar Reddy Edla', 'dr.reddy@nitgoa.ac.in', 'damodar', 'damu', 1),
(2, 'Dr. Purushothama B R', 'puru@nitgoa.ac.in', 'purushothama', 'puru', 0),
(3, 'Dr. Veena Thenkanidiyoor', 'veenat@nitgoa.ac.in', 'veena', 'veenu', 0),
(5, 'Dr. S. Mini', 'mini@nitgoa.ac.in', 'mini', 'minu', 0),
(6, 'Dr. Pravati Swain', 'pravati@nitgoa.ac.in', 'pravati', 'pravu', 0),
(7, 'Dr. Venkatanareshbabu Kuppili', 'venkatanaresh@nitgoa.ac.in', 'venkat', 'venku', 0),
(8, 'Dr. Modi Chirag Navinchandra', 'cnmodi@nitgoa.ac.in', 'modi', 'modu', 0),
(10, 'Dr. Keshavamurthy B.N.', 'bnkeshav.fcse@nitgoa.ac.in', 'kesha', 'keshu', 0),
(11, 'Mrs. Aruna Govada', 'arunag@nitgoa.ac.in', 'aruna', '123', 0);

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
(32, 1, 10, 1, 1, 33),
(33, 2, 10, 1, 0, 23),
(34, 3, 10, 0, 0, 0),
(35, 5, 10, 0, 0, 0),
(36, 2, 11, 0, 1, 0),
(37, 3, 11, 0, 0, 0),
(38, 5, 11, 0, 0, 0),
(39, 6, 11, 0, 0, 0),
(40, 3, 12, 0, 1, 0),
(41, 5, 12, 0, 0, 0),
(42, 6, 12, 0, 0, 0),
(43, 7, 12, 0, 0, 0),
(44, 5, 13, 0, 1, 0),
(45, 6, 13, 0, 0, 0),
(46, 7, 13, 0, 0, 0),
(47, 8, 13, 0, 0, 0),
(48, 6, 14, 0, 1, 0),
(49, 7, 14, 0, 0, 0),
(50, 8, 14, 0, 0, 0),
(51, 10, 14, 0, 0, 0),
(56, 8, 16, 0, 1, 0),
(57, 10, 16, 0, 0, 0),
(58, 11, 16, 0, 0, 0),
(59, 1, 16, 0, 0, 0),
(60, 10, 17, 0, 1, 0),
(61, 11, 17, 0, 0, 0),
(62, 1, 17, 0, 0, 0),
(63, 2, 17, 1, 0, 40),
(64, 11, 18, 0, 1, 0),
(65, 1, 18, 1, 0, 26),
(66, 2, 18, 1, 0, 2),
(67, 3, 18, 0, 0, 0),
(160, 10, 42, 0, 1, 0),
(161, 2, 42, 0, 0, 0),
(162, 7, 42, 0, 0, 0),
(163, 6, 42, 0, 0, 0),
(164, 10, 43, 0, 1, 0),
(165, 1, 43, 0, 0, 0),
(166, 5, 43, 0, 0, 0),
(167, 2, 43, 0, 0, 0),
(168, 2, 44, 0, 1, 0),
(169, 5, 44, 0, 0, 0),
(170, 1, 44, 0, 0, 0),
(171, 11, 44, 0, 0, 0),
(172, 1, 45, 0, 1, 0),
(173, 6, 45, 0, 0, 0),
(174, 2, 45, 0, 0, 0),
(175, 5, 45, 0, 0, 0),
(176, 11, 46, 0, 1, 0),
(177, 6, 46, 0, 0, 0),
(178, 3, 46, 0, 0, 0),
(179, 7, 46, 0, 0, 0),
(180, 8, 47, 0, 1, 0),
(181, 1, 47, 0, 0, 0),
(182, 6, 47, 0, 0, 0),
(183, 11, 47, 0, 0, 0),
(184, 1, 48, 0, 1, 0),
(185, 7, 48, 0, 0, 0),
(186, 10, 48, 0, 0, 0),
(187, 5, 48, 0, 0, 0),
(188, 5, 49, 0, 1, 0),
(189, 3, 49, 0, 0, 0),
(190, 11, 49, 0, 0, 0),
(191, 7, 49, 0, 0, 0),
(192, 1, 50, 0, 1, 0),
(193, 5, 50, 0, 0, 0),
(194, 2, 50, 0, 0, 0),
(195, 6, 50, 0, 0, 0),
(196, 8, 51, 0, 1, 0),
(197, 5, 51, 0, 0, 0),
(198, 7, 51, 0, 0, 0),
(199, 11, 51, 0, 0, 0),
(200, 8, 52, 0, 1, 0),
(201, 6, 52, 0, 0, 0),
(202, 11, 52, 0, 0, 0),
(203, 5, 52, 0, 0, 0),
(204, 2, 53, 0, 1, 0),
(205, 6, 53, 0, 0, 0),
(206, 8, 53, 0, 0, 0),
(207, 11, 53, 0, 0, 0),
(208, 5, 54, 0, 1, 0),
(209, 6, 54, 0, 0, 0),
(210, 1, 54, 0, 0, 0),
(211, 7, 54, 0, 0, 0),
(212, 3, 55, 0, 1, 0),
(213, 7, 55, 0, 0, 0),
(214, 1, 55, 0, 0, 0),
(215, 8, 55, 0, 0, 0),
(216, 2, 56, 0, 1, 0),
(217, 8, 56, 0, 0, 0),
(218, 5, 56, 0, 0, 0),
(219, 6, 56, 0, 0, 0),
(220, 6, 57, 0, 1, 0),
(221, 10, 57, 0, 0, 0),
(222, 7, 57, 0, 0, 0),
(223, 11, 57, 0, 0, 0),
(224, 6, 58, 0, 1, 0),
(225, 1, 58, 0, 0, 0),
(226, 3, 58, 0, 0, 0),
(227, 11, 58, 0, 0, 0),
(228, 11, 59, 0, 1, 0),
(229, 5, 59, 0, 0, 0),
(230, 7, 59, 0, 0, 0),
(231, 10, 59, 0, 0, 0),
(232, 6, 60, 0, 1, 0),
(233, 10, 60, 0, 0, 0),
(234, 7, 60, 0, 0, 0),
(235, 8, 60, 0, 0, 0),
(236, 5, 61, 0, 1, 0),
(237, 7, 61, 0, 0, 0),
(238, 6, 61, 0, 0, 0),
(239, 1, 61, 0, 0, 0),
(240, 7, 62, 0, 1, 0),
(241, 1, 62, 0, 0, 0),
(242, 6, 62, 0, 0, 0),
(243, 11, 62, 0, 0, 0),
(244, 7, 63, 0, 1, 0),
(245, 1, 63, 1, 0, 30),
(246, 6, 63, 0, 0, 0),
(247, 8, 63, 0, 0, 0);

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
(10, 'Amit Kumar', '14CSE1001', 'amitkumar@gmail.com', 1, 2, 3, 5),
(11, 'Annette Catherine Paul', '14CSE1002', 'annettecatherinepaul@gmail.com', 2, 3, 5, 6),
(12, 'Bikumalla Prudhvi Raj', '14CSE1003', 'bikumallaprudhviraj@gmail.com', 3, 5, 6, 7),
(13, 'Colaco Larren Francis', '14CSE1004', 'colacolarrenfrancis@gmail.com', 5, 6, 7, 8),
(14, 'Dhavalikar Gauri Pandurang', '14CSE1005', 'dhavalikargauripandurang@gmail.com', 6, 7, 8, 10),
(16, 'Himanshu Singh', '14CSE1007', 'himanshusingh@gmail.com', 8, 10, 11, 1),
(17, 'Kamisetty Yamini Preethi', '14CSE1008', 'kamisettyyaminipreethi@gmail.com', 10, 11, 1, 2),
(18, 'Kareti Vineeth Sai', '14CSE1009', 'karetivineethsai@gmail.com', 11, 1, 2, 3),
(42, 'Kuldeep Singh', '14CSE1010', 'KuldeepSingh@gmail.com', 10, 2, 7, 6),
(43, 'Madhusudan Meena', '14CSE1011', 'MadhusudanMeena@gmail.com', 10, 1, 5, 2),
(44, 'Mangalorekar Kunal Gautam', '14CSE1012', 'MangalorekarKunalGautam@gmail.com', 2, 5, 1, 11),
(45, 'Chinmesh Manjrekar', '14CSE1013', 'ChinmeshManjrekar@gmail.com', 1, 6, 2, 5),
(46, 'Md Fahim Ansari', '14CSE1014', 'MdFahimAnsari@gmail.com', 11, 6, 3, 7),
(47, 'Nidhi Ranjan', '14CSE1015', 'NidhiRanjan@gmail.com', 8, 1, 6, 11),
(48, 'Nikhil Chaudhary', '14CSE1016', 'NikhilChaudhary@gmail.com', 1, 7, 10, 5),
(49, 'Om Prakash Verma', '14CSE1017', 'OmPrakashVerma@gmail.com', 5, 3, 11, 7),
(50, 'Palash Rajendra Soundarkar', '14CSE1018', 'PalashRajendraSoundarkar@gmail.com', 1, 5, 2, 6),
(51, 'Pranav Vinod Machingal', '14CSE1019', 'PranavVinodMachingal@gmail.com', 8, 5, 7, 11),
(52, 'Reetwik Das', '14CSE1021', 'ReetwikDas@gmail.com', 8, 6, 11, 5),
(53, 'Raj Rohit', '14CSE1022', 'RajRohit@gmail.com', 2, 6, 8, 11),
(54, 'Shahil Ahmed C.G', '14CSE1023', 'ShahilAhmedC.G@gmail.com', 5, 6, 1, 7),
(55, 'Sourab Mangrulkar', '14CSE1024', 'SourabMangrulkar@gmail.com', 3, 7, 1, 8),
(56, 'Suhani Shrivastava', '14CSE1025', 'SuhaniShrivastava@gmail.com', 2, 8, 5, 6),
(57, 'Sunil Sri Datta Jammalamadaka', '14CSE1026', 'SunilSriDattaJammalamadaka@gmail.com', 6, 10, 7, 11),
(58, 'Tamba Soham Girish', '14CSE1027', 'TambaSohamGirish@gmail.com', 6, 1, 3, 11),
(59, 'Tangella Manvitha', '14CSE1028', 'TangellaManvitha@gmail.com', 11, 5, 7, 10),
(60, 'Vannati Sai Kumar', '14CSE1029', 'VannatiSaiKumar@gmail.com', 6, 10, 7, 8),
(61, 'Yallamelli Abhishek', '14CSE1030', 'YallamelliAbhishek@gmail.com', 5, 7, 6, 1),
(62, 'Kevin Monteiro', '14CSE1031', 'KevinMonteiro@gmail.com', 7, 1, 6, 11),
(63, 'Arjit Punia', '13CSE007', 'ArjitPunia@gmail.com', 7, 1, 6, 8);

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
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
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
