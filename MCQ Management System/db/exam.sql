-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 07:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `pass`, `department`) VALUES
('Admin01', 'First Admin', 'firstadmin01@gmail.com', '1234567890', '12345', 'BCS');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `data` text NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `faculty`, `data`, `seen`) VALUES
(7, 'All', 'Last Sem Exam Start from 30 July 2021.', 'Both'),
(8, 'All', 'Sumbit your project befor 30 july 2021.', 'Student'),
(9, 'All', 'Arrange last sem exam from 30 july 2021.', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `ans_paper`
--

CREATE TABLE `ans_paper` (
  `ans_id` int(11) NOT NULL,
  `stud_prn` varchar(25) NOT NULL,
  `sub_id` varchar(25) NOT NULL,
  `qnum` varchar(25) NOT NULL,
  `ans` char(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ans_paper`
--

INSERT INTO `ans_paper` (`ans_id`, `stud_prn`, `sub_id`, `qnum`, `ans`, `status`) VALUES
(22, '321', '1', '1', 'c', 'Right'),
(23, '321', '1', '2', 'c', 'Wrong'),
(24, '1122', '7', '1', 'd', 'Right'),
(25, '12345', '7', '1', 'a', 'Right'),
(26, '1819000917', '9', '1', 'b', 'Wrong'),
(27, '1819000917', '9', '2', 'b', 'Right'),
(32, '1819000917', '11', '1', 'a', 'Right'),
(33, '1819000917', '12', '1', 'b', 'Wrong'),
(34, '1819000917', '12', '2', 'c', 'Wrong'),
(38, '1819000917', '10', '1', 'a', 'Right'),
(39, '1819000917', '10', '2', 'b', 'Right'),
(40, '1819000917', '10', '3', 'c', 'Right'),
(41, '1819000917', '10', '4', 'b', 'Wrong'),
(42, '1819000917', '20', '1', 'b', 'Right'),
(43, '1819000917', '19', '1', 'c', 'Wrong'),
(44, '1819001212', '20', '1', 'a', 'Right'),
(45, '1819001212', '20', '2', 'b', 'Right'),
(46, '1819000917', '21', '1', 'unanswered', 'Wrong'),
(47, '1819000917', '21', '2', 'unanswered', 'Wrong'),
(48, '1819001212', '22', '1', 'unanswered', 'Wrong'),
(49, '1819001212', '22', '2', 'b', 'Right');

-- --------------------------------------------------------

--
-- Table structure for table `que_paper`
--

CREATE TABLE `que_paper` (
  `id` varchar(100) NOT NULL,
  `subId` varchar(100) NOT NULL,
  `qnum` int(11) NOT NULL,
  `que` longtext NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `ans` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que_paper`
--

INSERT INTO `que_paper` (`id`, `subId`, `qnum`, `que`, `a`, `b`, `c`, `d`, `ans`) VALUES
('60d103d93df0c', '7', 1, 'Que 1', 'a', 'b', 'c', 'd', 'a'),
('60d10d072a9be', '8', 1, 'que 1', '1', '2', '3', '4', 'a'),
('60d10d73ca04b', '9', 1, 'Android 1', 'a', 'b', 'c', 'd', 'a'),
('60d10d73ca893', '9', 2, 'Android 2', '1', '2', '3', '4', 'b'),
('60d5aaec78c59', '10', 1, 'cpp 1', '1', '2', '3', '4', 'a'),
('60d5aaec7969b', '10', 2, 'cpp 2', 'a', 'b', 'c', 'D', 'b'),
('60d5aaec7a2b2', '10', 3, 'cpp 3', '1', '2', '3', '4', 'c'),
('60d5aaec7af7c', '10', 4, 'cpp 4', 'a', 'B', 'c', 'D', 'd'),
('60d5c5e473583', '11', 1, 'quation 1', '1', 'a', '2', 'b', 'a'),
('60d829cf12620', '12', 1, 'php que 1', 'a', 'b', 'c', 'd', 'a'),
('60d829cf13212', '12', 2, 'Php que 2', '1', '2', '3', '4', 'b'),
('60d82b448c2df', '13', 1, 'db 1', '1', '2', '3', '4', 'a'),
('60d82b448cdc7', '13', 2, 'db 2', 'a', 'b', 'c', 'D', 'b'),
('60d8437f436ff', '14', 1, 'Following is not Logical gate.', 'AND', 'OR', 'NOT', 'YES', 'd'),
('60d85ed90cc1c', '15', 1, '1', 'a', 'b', 'c', 'd', 'a'),
('60d86074e5bb9', '16', 1, 'Kali Linux is ......', 'Open source OS', 'not open source os', 'windows based os', 'option A and B', 'a'),
('60ddaee8a9a30', '17', 1, '1', 'a', 'b', 'c', 'd', 'd'),
('60decbe914971', '18', 1, 'TOC 1', 'a', 'b', 'c', 'd', 'a'),
('60decc9cc6ac6', '19', 1, 'ad graphics', '1', '2', '3', '4', 'b'),
('60e3fbc1f0455', '20', 1, 'c 1', '1', '2', '3', '4', 'a'),
('60e3fbc1f1315', '20', 2, 'c 2', 'a', 'b', 'c', 'd', 'b'),
('60e4771999419', '21', 1, 'a1', '1', '2', '3', '4', 'a'),
('60e4771999e5a', '21', 2, 'a 2', 'a', 'b', 'c', 'd', 'b'),
('60e4787e4a2b8', '22', 1, 'c programing 1', 'a', 'b', 'c', 'd', 'a'),
('60e4787e4ae93', '22', 2, ' c programing 2', '1', '2', '3', '4', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `stud_prn` varchar(25) NOT NULL,
  `stud_name` varchar(200) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `stream` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `sub_id` varchar(25) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `total_marks` int(100) NOT NULL,
  `obt_marks` int(100) NOT NULL,
  `percentage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `stud_prn`, `stud_name`, `faculty`, `stream`, `sem`, `sub_id`, `sub`, `total_marks`, `obt_marks`, `percentage`) VALUES
(15, '321', 'Matsagar AKSHAY D', 'IT', 'FY', 'II', '1', 'CPP', 20, 10, '50'),
(17, '12345', 'Shaikh Ashapak A', 'BCS', 'FY', 'IV', '7', 'CPP', 20, 20, '100'),
(20, '1819000917', 'Matsagar Sagar Bharat', 'BCS', 'TY', 'V', '9', 'Android', 20, 10, '50'),
(49, '1819000917', 'Matsagar Sagar Bharat', 'BCS', 'TY', 'V', '10', 'CPP', 40, 30, '75'),
(61, '1819000917', 'Matsagar Sagar Bharat', 'BCS', 'TY', 'VI', '20', 'demo', 10, 10, '100'),
(64, '1819000917', 'Matsagar Sagar Bharat', 'BCS', 'TY', 'VI', '19', 'AD Graphics', 10, 0, '0'),
(65, '1819001212', 'Matsagar AKSHAY DINKAR', 'BCS', 'FY', 'I', '20', 'c programing', 4, 4, '100'),
(66, '1819001212', 'Matsagar AKSHAY DINKAR', 'BCS', 'FY', 'I', '22', 'c II', 4, 2, '50');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud-id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `prn` varchar(30) NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `stream` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud-id`, `fname`, `mname`, `lname`, `prn`, `faculty`, `stream`, `gender`, `mobile`, `email`, `pass`) VALUES
(6, 'Sagar', 'Bharat', 'Matsagar', '1819000917', 'BCS', 'TY', 'Male', '7507497592', 'Sm@gmail.co', '123'),
(7, 'Ram', 'Charan', 'Bahirat', '123', 'BCS', 'TY', 'Male', '9192939495', 'charan@', '123'),
(9, 'Sagar', 'Bharat', 'Matsagar', '1122', 'BCS', 'FY', 'Male', '7507497592', 'Sm@gmail.co', '1122'),
(10, 'Ashapak', 'A', 'Shaikh', '12345', 'BCS', 'FY', 'Male', '12345', 'as@', '12345'),
(11, 'AKSHAY', 'DINKAR', 'Matsagar', '1819001212', 'BCS', 'FY', 'Male', '7788994455', 'Sm@gmail.co', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `stream` varchar(25) NOT NULL,
  `sem` varchar(25) NOT NULL,
  `sub` varchar(25) NOT NULL,
  `totalQ` varchar(25) NOT NULL,
  `q_mark` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `s_time` time NOT NULL,
  `end_time` time NOT NULL,
  `exam_time` int(250) NOT NULL,
  `teach_id` int(11) NOT NULL,
  `uid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `faculty`, `stream`, `sem`, `sub`, `totalQ`, `q_mark`, `date`, `s_time`, `end_time`, `exam_time`, `teach_id`, `uid`) VALUES
(7, 'BCS', 'FY', 'IV', 'CPP', '1', '20', '2021-06-30', '13:00:00', '15:00:00', 90, 3, '60d103cad6c11'),
(8, 'BCA', 'FY', 'I', 'java', '1', '20', '2021-06-25', '10:00:00', '11:00:00', 60, 5, '60d10ceadce0c'),
(9, 'BCS', 'TY', 'V', 'Android', '2', '10', '2021-06-27', '03:15:00', '04:15:00', 60, 3, '60d10d44a62b7'),
(10, 'BCS', 'TY', 'V', 'CPP', '4', '10', '2021-06-30', '03:15:00', '04:15:00', 120, 3, '60d5aa97ecf22'),
(11, 'BCS', 'TY', 'VI', 'Android', '1', '10', '2021-06-29', '03:15:00', '03:45:00', 30, 3, '60d5c43789e0b'),
(12, 'BCS', 'TY', 'V', 'Php', '2', '10', '2021-07-05', '03:15:00', '05:15:00', 60, 3, '60d829a594e2b'),
(13, 'BCS', 'SY', 'IV', 'Database m s', '2', '10', '2021-06-29', '03:15:00', '04:15:00', 30, 3, '60d82b2c88913'),
(14, 'BCS', 'FY', 'I', 'Digital Electronics', '1', '10', '2021-06-30', '14:57:00', '15:57:00', 30, 3, '60d843199f9be'),
(15, 'BCS', 'FY', 'I', 'math', '1', '10', '2021-06-29', '10:00:00', '13:00:00', 30, 3, '60d85ec9a629e'),
(16, 'BCS', 'SY', 'IV', 'Operating System', '1', '10', '2021-06-28', '10:00:00', '11:00:00', 30, 3, '60d85f9880983'),
(17, 'BCS', 'TY', 'VI', 'Ad Java', '1', '10', '2021-07-01', '19:30:00', '19:50:00', 30, 3, '60ddaedac688c'),
(18, 'BCS', 'TY', 'VI', 'TOC', '1', '10', '2021-07-03', '14:00:00', '16:00:00', 60, 3, '60decbd663546'),
(19, 'BCS', 'TY', 'VI', 'AD Graphics', '1', '10', '2021-07-06', '17:00:00', '21:50:00', 30, 3, '60decc8ebe2ae'),
(20, 'BCS', 'FY', 'I', 'c programing', '2', '2', '2021-07-06', '12:13:00', '21:13:00', 30, 3, '60e3fba5430e2'),
(21, 'BCS', 'TY', 'V', 'Android II', '2', '2', '2021-07-06', '20:59:00', '21:59:00', 30, 3, '60e476f76840f'),
(22, 'BCS', 'FY', 'I', 'c II', '2', '2', '2021-07-06', '21:05:00', '22:05:00', 30, 3, '60e4784c3d37a');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher-name` varchar(50) NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher-name`, `faculty`, `gender`, `mobile`, `email_id`, `pass`) VALUES
(2, 'A Maliye', 'BCS', 'Female', '9689563398', 'amaliye@gmail.com', 'am@'),
(3, 'G Pathare', 'BCS', 'Male', '9192939495', 'gp@gmail.com', 'gp@'),
(5, 'N Kulkarni', 'BCA', 'Male', '9192939495', 'nk@', '123'),
(6, 'P Joshi', 'BCS', 'Female', '8877665544', 'pj@gmail.com', '12345'),
(7, 'P Shinde', 'BCS', 'Female', '7507497592', 'ps@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ans_paper`
--
ALTER TABLE `ans_paper`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `que_paper`
--
ALTER TABLE `que_paper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud-id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ans_paper`
--
ALTER TABLE `ans_paper`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
