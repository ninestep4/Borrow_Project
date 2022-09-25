-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 10:33 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` char(5) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_img` text NOT NULL,
  `mem_mobile` varchar(20) NOT NULL,
  `mem_user` varchar(20) NOT NULL,
  `mem_pass` varchar(20) NOT NULL,
  `mem_level` char(5) NOT NULL,
  `mem_residence` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_img`, `mem_mobile`, `mem_user`, `mem_pass`, `mem_level`, `mem_residence`) VALUES
(1, 'panu', '', '0957153298', 'admin', '123456', '1', '987'),
(0, 'test', 'img/pexels-makjp-12258695.jpg', 'test', 'test', '123456', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `met_id` int(10) NOT NULL,
  `met_name` varchar(100) NOT NULL,
  `met_detail` text NOT NULL,
  `met_img` text NOT NULL,
  `met_total` int(10) NOT NULL,
  `met_mtype` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`met_id`, `met_name`, `met_detail`, `met_img`, `met_total`, `met_mtype`) VALUES
(1, 'ยาแดง', 'ทาแผล', 'matpic/2018-2609779.jpg', 189, '1'),
(2, 'เตียงนอน', 'เตียง', 'matpic/bed.jpg', 4, '2'),
(3, 'ผ้าพันแผล', 'พันบริเวณที่บาดเจ็บ', 'matpic/50d3189a70d07100fbe6f768831823ab.jpg_720x720q80.jpg_.webp', 199, '1');

-- --------------------------------------------------------

--
-- Table structure for table `meterdraw`
--

CREATE TABLE `meterdraw` (
  `draw_id` int(10) NOT NULL,
  `draw_date` varchar(20) NOT NULL,
  `draw_num` int(10) NOT NULL,
  `draw_metid` int(10) NOT NULL,
  `draw_userid_draw` int(10) NOT NULL,
  `draw_userid_app` int(10) NOT NULL,
  `draw_date_app` char(20) NOT NULL,
  `draw_status` char(5) NOT NULL,
  `start_borrow` varchar(10) NOT NULL,
  `end_borrow` varchar(10) NOT NULL,
  `people_name` varchar(100) NOT NULL,
  `people_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meterdraw`
--

INSERT INTO `meterdraw` (`draw_id`, `draw_date`, `draw_num`, `draw_metid`, `draw_userid_draw`, `draw_userid_app`, `draw_date_app`, `draw_status`, `start_borrow`, `end_borrow`, `people_name`, `people_id`) VALUES
(1, '2022-09-20', 1, 3, 1, 1, '23-09-2022 23:44', '1', '', '', '', 0),
(2, '23-09-2022', 1, 3, 1, 1, '2022-09-24 01:19', '1', '', '', '', 0),
(3, '23-09-2022', 1, 2, 1, 1, '2022-09-24 00:24', '1', '2022-09-24', '2022-09-25', '', 0),
(4, '23-09-2022', 1, 3, 0, 1, '2022-09-24 01:19', '1', '2022-09-24', '2022-09-30', '', 0),
(5, '23-09-2022', 1, 3, 0, 0, '', '0', '2022-09-25', '2022-09-30', '', 0),
(6, '23-09-2022', 1, 1, 0, 0, '', '0', '2022-09-25', '2022-09-28', '', 0),
(7, '23-09-2022', 1, 1, 0, 0, '', '0', '2022-09-24', '2022-09-29', '', 0),
(8, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '', 0),
(9, '23-09-2022', 1, 1, 0, 0, '', '0', '2022-09-24', '2022-09-27', '', 0),
(10, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '', 0),
(11, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '<? echo $people_name ?>', 0),
(12, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '<? $people_name ?>', 0),
(13, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '<?', 0),
(14, '23-09-2022', 1, 3, 0, 0, '', '0', '', '', '', 0),
(15, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '', 0),
(16, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', '1', 0),
(17, '23-09-2022', 1, 1, 0, 0, '', '0', '', '', 'นาย ภาณุ โห้เฉื่อย', 0);

-- --------------------------------------------------------

--
-- Table structure for table `metertype`
--

CREATE TABLE `metertype` (
  `mtype_id` char(5) NOT NULL,
  `mtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metertype`
--

INSERT INTO `metertype` (`mtype_id`, `mtype_name`) VALUES
('1', 'วัสดุ'),
('2', 'ครุภัณฑ์');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(11) NOT NULL,
  `people_name` varchar(100) NOT NULL,
  `people_sex` text NOT NULL,
  `people_address` varchar(300) NOT NULL,
  `people_idcard` varchar(13) NOT NULL,
  `people_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `people_name`, `people_sex`, `people_address`, `people_idcard`, `people_number`) VALUES
(1, 'นาย ภาณุ โห้เฉื่อย', '', '58/2 ม.1 ต.บางตลาด อ.ปากเกร็ด จ.นนทบุรี ', '1129700199409', '0957153298');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`met_id`);

--
-- Indexes for table `meterdraw`
--
ALTER TABLE `meterdraw`
  ADD PRIMARY KEY (`draw_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `met_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meterdraw`
--
ALTER TABLE `meterdraw`
  MODIFY `draw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
