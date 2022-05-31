-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 05:52 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `met64db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` char(5) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('001', 'แผนกคลังวัสดุ'),
('002', 'แผนกการเงิน'),
('003', 'แผนกบุคคล'),
('004', 'แผนกเทคโนโลยี');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(10) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_img` text NOT NULL,
  `mem_mobile` varchar(10) NOT NULL,
  `mem_user` varchar(10) NOT NULL,
  `mem_pass` varchar(10) NOT NULL,
  `mem_level` char(5) NOT NULL,
  `mem_dept` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_img`, `mem_mobile`, `mem_user`, `mem_pass`, `mem_level`, `mem_dept`) VALUES
(1, 'นายรุ่งเรือง มุศิริ', 'img/joe.jpg', '0877053646', 'admin', 'admin', '1', '001'),
(2, 'นายสอบ สิทธิ์ผู้ใช้งาน', 'img/rung.jpg', '0877053646', 'user', 'user', '2', '002'),
(3, 'นายสราวุฒิ สุขพิลาภ', 'img/OIP.jpg', '0887654321', '11', '11', '2', '004'),
(4, 'นางสาวสุทธิดา มณฑิราช', 'img/U2T 22.jpg', '0889765432', '22', '22', '2', '003');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`met_id`, `met_name`, `met_detail`, `met_img`, `met_total`, `met_mtype`) VALUES
(1, 'ปากกาหมึกเจล 0.7 มม. น้ำเงิน', 'ปากกาเจล แบบกด ซีบร้า SARASA JJB-15 หมึกสีน้ำเงิน ขนาด 0.7 มม.', 'matpic/OFM1005563.jpg', 20, '01'),
(2, 'XX-ปูนอินทรี', 'XX-ผลิตภัณฑ์คุณภาพตามมาตรฐาน มอก.80-2550', 'matpic/5e748e5dcc86b-ปูนอินทรี.png', 0, '02'),
(3, 'กระถางต้นไม้ทรงมาตรฐาน', 'เป็นกระถางที่ใช้ทั่วไปมีปากกว้างก้นกระถางแคบ', 'matpic/02_Flower-Pot_SS_Save-for-web.jpg', 0, '03'),
(5, 'กระถางต้นไม้ทรงเตี้ย', 'กระถางทรงเตี้ย เป็นกระถางที่มีปากกระถางกว้างกว่าความสูง', 'matpic/05_Flower-Pot_SS_Save-for-web.jpg', 5, '03');

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
  `draw_status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meterdraw`
--

INSERT INTO `meterdraw` (`draw_id`, `draw_date`, `draw_num`, `draw_metid`, `draw_userid_draw`, `draw_userid_app`, `draw_date_app`, `draw_status`) VALUES
(1, '2021-09-23', 10, 1, 2, 1, '2021-09-23', '1'),
(2, '2021-09-23', 5, 1, 2, 1, '2021-09-23', '1'),
(3, '2021-09-23', 3, 1, 2, 0, '', '0'),
(4, '2021-09-23', 6, 5, 2, 1, '2021-09-23', '1'),
(5, '2021-09-23', 2, 1, 3, 1, '2021-09-23', '1'),
(6, '2021-09-23', 1, 5, 3, 0, '', '0'),
(7, '2021-09-23', 10, 1, 4, 0, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `metertype`
--

CREATE TABLE `metertype` (
  `mtype_id` char(5) NOT NULL,
  `mtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `metertype`
--

INSERT INTO `metertype` (`mtype_id`, `mtype_name`) VALUES
('01', 'วัสดุสำนักงาน'),
('02', 'วัสดุก่อสร้าง'),
('03', 'วัสดุการเกษตร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

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
-- Indexes for table `metertype`
--
ALTER TABLE `metertype`
  ADD PRIMARY KEY (`mtype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `met_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meterdraw`
--
ALTER TABLE `meterdraw`
  MODIFY `draw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
