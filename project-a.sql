-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 06:15 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE IF NOT EXISTS `a` (
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `e` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a`
--

INSERT INTO `a` (`b`, `c`, `d`, `e`) VALUES
('Keyboard', '$10.00', '$16.00', '$6.00'),
('Monitor', '$80.00', '$120.00', '$40.00'),
('Mouse', '$5.00', '$7.00', '$2.00'),
('', '', 'Total', '$48.00'),
('Keyboard', '$10.00', '$16.00', '$6.00'),
('Monitor', '$80.00', '$120.00', '$40.00'),
('Mouse', '$5.00', '$7.00', '$2.00'),
('', '', 'Total', '$48.00');

-- --------------------------------------------------------

--
-- Table structure for table `arun`
--

CREATE TABLE IF NOT EXISTS `arun` (
  `dptname` char(50) DEFAULT NULL,
  `sem` char(30) DEFAULT NULL,
  `prefix` char(30) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `upload` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arun`
--

INSERT INTO `arun` (`dptname`, `sem`, `prefix`, `start`, `end`, `upload`) VALUES
('EEE', 's1/s2', 'JYALEEE', 1, 40, 'ex.csv'),
('CS', 's3/s4', 'jyalecse', 1, 52, 'ex2.csv'),
('ME', 's1/s2', 'anthony', 1, 60, 'ex1.csv');

-- --------------------------------------------------------

--
-- Table structure for table `csv`
--

CREATE TABLE IF NOT EXISTS `csv` (
  `day` varchar(30) NOT NULL,
  `s1` varchar(30) NOT NULL,
  `s2` varchar(30) NOT NULL,
  `s3` varchar(30) NOT NULL,
  `s4` varchar(30) NOT NULL,
  `s5` varchar(30) NOT NULL,
  `s6` varchar(30) NOT NULL,
  `s7` varchar(30) NOT NULL,
  `sub` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csv`
--


-- --------------------------------------------------------

--
-- Table structure for table `f_status`
--

CREATE TABLE IF NOT EXISTS `f_status` (
  `dpt` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `d_status` int(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_status`
--

INSERT INTO `f_status` (`dpt`, `f_name`, `d_status`, `file`, `status`) VALUES
('CS', 'Ms.Divya M Menon', 1, 'files/ex2.csv', 0),
('CS', 'Mr.Bineesh M', 1, 'files/ex2.csv', 0),
('CS', 'Mr. Aneesh Chandran', 1, 'files/ex2.csv', 0),
('CS', 'Ms. Sobha P Xavier', 1, 'files/ex2.csv', 0),
('CS', 'Mr.Majo John', 2, 'files/ex2.csv', 0),
('CS', 'Ms.Diana Davis', 1, 'files/ex2.csv', 0),
('CS', 'Ms Sabna A B', 2, 'files/ex2.csv', 0),
('CS', 'Ms.Chimmu Mani ', 1, 'files/ex2.csv', 0),
('CS', 'Ms.Jisna V A', 2, 'files/ex2.csv', 0),
('EEE', 'Ms.Divya M Menon', 1, 'files/ex.csv', 0),
('EEE', 'Mr.Bineesh M', 1, 'files/ex.csv', 0),
('EEE', 'Mr. Aneesh Chandran', 1, 'files/ex.csv', 0),
('EEE', 'Ms. Sobha P Xavier', 2, 'files/ex.csv', 0),
('EEE', 'Mr.Majo John', 2, 'files/ex.csv', 0),
('EEE', 'Ms.Diana Davis', 1, 'files/ex.csv', 0),
('EEE', 'Ms Sabna A B', 1, 'files/ex.csv', 0),
('EEE', 'Ms.Chimmu Mani ', 0, 'files/ex.csv', 0),
('EEE', 'Ms.Jisna V A', 1, 'files/ex.csv', 0),
('ME', 'Mr.Bineesh M', 1, 'files/ex1.csv', 0),
('ME', 'Mr. Aneesh Chandran', 1, 'files/ex1.csv', 0),
('ME', 'Ms. Sobha P Xavier', 2, 'files/ex1.csv', 0),
('ME', 'Mr.Majo John', 1, 'files/ex1.csv', 0),
('ME', 'Ms.Diana Davis', 1, 'files/ex1.csv', 0),
('ME', 'Ms Sabna A B', 1, 'files/ex1.csv', 0),
('ME', 'Ms.Chimmu Mani ', 1, 'files/ex1.csv', 0),
('ME', 'Ms.Jisna V A', 1, 'files/ex1.csv', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grp_arun`
--

CREATE TABLE IF NOT EXISTS `grp_arun` (
  `gpname` char(50) DEFAULT NULL,
  `rmname` char(30) DEFAULT NULL,
  `noseat` int(11) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `grp_arun`
--

INSERT INTO `grp_arun` (`gpname`, `rmname`, `noseat`, `strength`, `id`) VALUES
('CSE DPT', '', 0, 0, 27),
('CSE DPT', 'rm2', 30, 2, 29),
('CSE DPT', 'rm3', 30, 2, 30),
('EEE DPT', '', 0, 0, 31),
('EEE DPT', 'rm4', 30, 2, 32),
('EEE DPT', 'rm5', 75, 1, 33),
('EEE DPT', 'rm6', 65, 1, 34),
('CSE DPT', 'rm1', 30, 2, 46);

-- --------------------------------------------------------

--
-- Table structure for table `seat_exam`
--

CREATE TABLE IF NOT EXISTS `seat_exam` (
  `ex_s_name` varchar(50) NOT NULL,
  `no_exams` int(20) NOT NULL,
  `ex_n` varchar(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `f_neded` int(30) NOT NULL,
  `clz_occpid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_exam`
--

INSERT INTO `seat_exam` (`ex_s_name`, `no_exams`, `ex_n`, `room`, `f_neded`, `clz_occpid`) VALUES
('S1/S2 1st sessional examination', 6, '', '', 6, 4),
('S1/S2 1st sessional examination', 0, 'EXAM6', 'rm1', 1, 0),
('S1/S2 1st sessional examination', 0, 'EXAM6', 'rm2', 2, 0),
('S1/S2 1st sessional examination', 0, 'EXAM6', 'rm3', 1, 0),
('S1/S2 1st sessional examination', 0, 'EXAM6', 'rm5', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `sem` varchar(30) NOT NULL,
  `dpt` varchar(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `st` int(30) NOT NULL,
  `end` int(30) NOT NULL,
  `bal` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`sem`, `dpt`, `room`, `st`, `end`, `bal`) VALUES
('s3/s4', 'CS', 'rm5', 1, 52, 52),
('s1/s2', 'ME', 'rm2', 1, 30, 61),
('s1/s2', 'ME', 'rm3', 31, 60, 61),
('s1/s2', 'ME', 'rm1', 61, 61, 61),
('s1/s2', 'EEE', 'rm2', 1, 30, 40),
('s1/s2', 'EEE', 'rm3', 31, 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `temp_room`
--

CREATE TABLE IF NOT EXISTS `temp_room` (
  `gpname` varchar(30) NOT NULL,
  `rmname` varchar(30) NOT NULL,
  `str` int(30) NOT NULL,
  `stra` int(30) NOT NULL,
  `b_str` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_room`
--

INSERT INTO `temp_room` (`gpname`, `rmname`, `str`, `stra`, `b_str`) VALUES
('CSE DPT', 'rm2', 0, 0, 2),
('CSE DPT', 'rm3', 20, 0, 2),
('CSE DPT', 'rm1', 30, 29, 2),
('EEE DPT', 'rm4', 30, 30, 2),
('EEE DPT', 'rm6', 65, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_stud`
--

CREATE TABLE IF NOT EXISTS `temp_stud` (
  `sem` varchar(30) NOT NULL,
  `dpt` varchar(30) NOT NULL,
  `ad` varchar(30) NOT NULL,
  `del` varchar(30) NOT NULL,
  `strn` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_stud`
--

INSERT INTO `temp_stud` (`sem`, `dpt`, `ad`, `del`, `strn`) VALUES
('s1/s2', 'EEE', '', '', 40),
('s1/s2', 'ME', '', '', 60),
('s3/s4', 'CS', '', '', 52),
('s1/s2', 'ME', 'dssad2', '', 0),
('s1/s2', 'ME', '', 'anthony1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `cid` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `fd` varchar(50) NOT NULL,
  `em` varchar(50) NOT NULL,
  `un` varchar(50) NOT NULL,
  `p` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `fn`, `fd`, `em`, `un`, `p`) VALUES
('arun', 'arun', 'arun', 'arun', 'arun', '722279e9e630b3e731464b69968ea4b4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
