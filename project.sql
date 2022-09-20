-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 11:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_img`, `mem_mobile`, `mem_user`, `mem_pass`, `mem_level`, `mem_residence`) VALUES
(1, 'panu', '', '', 'admin', '123456', '1', ''),
(2, 'test', '', '', 'test', '123456', '2', '');

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
(2, 'test', 'test', 'matpic/72.png', 1, '');

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
(1, '2022-02-28', 21, 2, 2, 1, '2022-02-28', '1'),
(2, '2022-03-03', 2, 2, 2, 1, '2022-05-25', '1'),
(3, '2022-05-25', 1, 2, 2, 1, '2022-05-25', '1'),
(4, '2022-05-26', 1, 2, 2, 1, '2022-05-26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `metertype`
--

CREATE TABLE `metertype` (
  `mtype_id` char(5) NOT NULL,
  `mtype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meter`
--
ALTER TABLE `meter`
  MODIFY `met_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meterdraw`
--
ALTER TABLE `meterdraw`
  MODIFY `draw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
