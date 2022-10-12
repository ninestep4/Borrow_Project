-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 01:41 AM
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
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `met_name` varchar(200) NOT NULL,
  `met_id` int(20) NOT NULL,
  `met_total` int(20) NOT NULL,
  `import_total` int(20) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `date_import` date NOT NULL,
  `import_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`met_name`, `met_id`, `met_total`, `import_total`, `mem_name`, `date_import`, `import_id`) VALUES
('หัวใจเทียม', 5, 10, 5, 'มาเฟียไม่มีหัวใจ', '2022-09-29', 1),
('หัวใจเทียม', 5, 30, 10, '', '2022-10-08', 28),
('ยาแดง', 1, 250, 200, '', '2022-10-08', 29),
('ผ้าพันแผล', 3, 200, 10, '', '2022-10-08', 30);

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
(1, 'มาเฟียไม่มีหัวใจ', '', '0957153298', 'admin', '123456', '1', '58/2'),
(3, 'ทศพร', '', '0999999999', 'admin2', '123456', '1', ''),
(8, 'test', '', 'test', 'test', 'test', '2', '');

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
(1, 'ยาแดง', 'ทาแผล', 'matpic/2018-2609779.jpg', 250, '1'),
(2, 'เตียงนอน', 'เตียง', 'matpic/bed.jpg', 3, '2'),
(3, 'ผ้าพันแผล', 'พันบริเวณที่บาดเจ็บ', 'matpic/50d3189a70d07100fbe6f768831823ab.jpg_720x720q80.jpg_.webp', 200, '1'),
(4, 'ไม้ค้ำยัน', 'ประคองการทรงตัว', 'matpic/ไม้ค้ำ.jpg', 80, '2'),
(5, 'หัวใจเทียม', 'สำหรับมาเฟีย', 'matpic/modelheart.png', 29, '4');

-- --------------------------------------------------------

--
-- Table structure for table `meterdraw`
--

CREATE TABLE `meterdraw` (
  `draw_id` int(10) NOT NULL,
  `met_mtype` int(2) NOT NULL,
  `draw_num` int(10) NOT NULL,
  `draw_metid` int(10) NOT NULL,
  `draw_userid_draw` varchar(100) NOT NULL,
  `draw_userid_app` int(20) NOT NULL,
  `draw_date_app` date NOT NULL,
  `draw_status` char(5) NOT NULL,
  `start_borrow` varchar(10) NOT NULL,
  `end_borrow` varchar(10) NOT NULL,
  `people_name` varchar(100) NOT NULL,
  `met_name` varchar(100) NOT NULL,
  `met_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meterdraw`
--

INSERT INTO `meterdraw` (`draw_id`, `met_mtype`, `draw_num`, `draw_metid`, `draw_userid_draw`, `draw_userid_app`, `draw_date_app`, `draw_status`, `start_borrow`, `end_borrow`, `people_name`, `met_name`, `met_id`) VALUES
(126, 4, 1, 5, '', 1, '2022-10-09', '1', '', '', '', 'หัวใจเทียม', 5);

-- --------------------------------------------------------

--
-- Table structure for table `metertype`
--

CREATE TABLE `metertype` (
  `mtype_id` int(5) NOT NULL,
  `mtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metertype`
--

INSERT INTO `metertype` (`mtype_id`, `mtype_name`) VALUES
(1, 'วัสดุ'),
(2, 'ครุภัณฑ์'),
(3, 'เวชภัณฑ์ที่มิใช่ยา'),
(4, 'อวัยวะเทียม');

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
  `people_number` varchar(10) NOT NULL,
  `people_type` varchar(20) NOT NULL,
  `peoplename_refer` varchar(200) NOT NULL,
  `number_refer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `people_name`, `people_sex`, `people_address`, `people_idcard`, `people_number`, `people_type`, `peoplename_refer`, `number_refer`) VALUES
(1, 'ภาณุ โห้เฉื่อย', 'ชาย', '58/2 ม.1 ต.บางตลาด อ.ปากเกร็ด จ.นนทบุรี', '1129700199409', '0957153298', 'บุคคลในชุมชน', '', ''),
(11, 'ทศพร อมศิริ', 'ชาย', '387/806', '', '0625843315', 'บุคคลนอกชุมชน', '', ''),
(13, '123123', 'หญิง', '123srr', '11234545325', '534534', 'บุคคลในชุมชน', '', ''),
(14, 'tod', 'หญิง', '234', '234', '234', 'บุคคลในชุมชน', 'eiei', '22222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`import_id`);

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
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `import_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `met_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meterdraw`
--
ALTER TABLE `meterdraw`
  MODIFY `draw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `metertype`
--
ALTER TABLE `metertype`
  MODIFY `mtype_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
