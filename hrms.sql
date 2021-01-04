-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 03:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('admin', 'sadller70');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `a_id` int(5) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`a_id`, `uname`, `date`) VALUES
(18, 'mayank68', '2018-04-15'),
(19, 'sumit70', '2018-04-15'),
(20, 'sumit70', '2018-01-15'),
(21, 'sumit70', '2018-04-16'),
(22, 'sumit70', '2018-03-01'),
(24, 'sumit70', '2018-03-02'),
(28, 'sumit70', '2018-03-03'),
(29, 'sumit70', '2018-03-04'),
(30, 'sumit70', '2018-03-05'),
(31, 'sumit70', '2018-03-06'),
(32, 'sumit70', '2018-03-07'),
(33, 'sumit70', '2018-03-08'),
(34, 'sumit70', '2018-03-09'),
(35, 'sumit70', '2018-03-10'),
(36, 'sumit70', '2018-03-11'),
(37, 'sumit70', '2018-03-12'),
(38, 'sumit70', '2018-03-15'),
(39, 'sumit70', '2018-03-17'),
(40, 'sumit70', '2018-03-18'),
(41, 'sumit70', '2018-03-19'),
(42, 'sumit70', '2018-03-20'),
(43, 'sumit70', '2018-03-21'),
(44, 'sumit70', '2018-03-22'),
(45, 'sumit70', '2018-03-24'),
(46, 'sumit70', '2018-03-25'),
(47, 'sumit70', '2018-03-26'),
(48, 'sumit70', '2018-03-28'),
(49, 'sumit70', '2018-04-17'),
(50, 'nayek72', '2018-04-17'),
(51, 'mayank68', '2018-04-17'),
(52, 'sumit70', '2018-04-23'),
(53, 'mukesh', '2018-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `empid` int(5) NOT NULL,
  `title` varchar(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(35) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `doj` date NOT NULL,
  `type` varchar(15) NOT NULL,
  `basic` int(7) NOT NULL,
  `hra` int(7) NOT NULL,
  `conveyance` int(7) NOT NULL,
  `medical` int(7) NOT NULL,
  `special` int(7) NOT NULL,
  `provident` int(7) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `account` varchar(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `m_degree` varchar(30) NOT NULL,
  `m_institute` varchar(40) NOT NULL,
  `m_year` varchar(5) NOT NULL,
  `m_cgpa` varchar(10) NOT NULL,
  `b_degree` varchar(30) NOT NULL,
  `b_institute` varchar(40) NOT NULL,
  `b_year` varchar(5) NOT NULL,
  `b_cgpa` varchar(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_status` varchar(10) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `pend_msg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`empid`, `title`, `fname`, `lname`, `uname`, `password`, `photo`, `mobile`, `dob`, `email`, `nationality`, `c_address`, `p_address`, `gender`, `doj`, `type`, `basic`, `hra`, `conveyance`, `medical`, `special`, `provident`, `bankname`, `account`, `pan`, `m_degree`, `m_institute`, `m_year`, `m_cgpa`, `b_degree`, `b_institute`, `b_year`, `b_cgpa`, `f_name`, `m_status`, `s_name`, `pend_msg`) VALUES
(67, 'Mr.', 'Sumit', 'Pandey', 'sumit70', 'sumit70', 'sumit70.jpg', '8765260889', '1996-12-06', 'sumitpandey@gmail.com', 'India', 'Kanpur, UP', 'Kanpur, UP', 'male', '2018-01-11', 'Permanent', 20000, 1200, 2000, 3000, 700, 1500, 'State Bank of India', '29913323282', 'QWERT1234K', 'MCA', 'NIT jamshedpur', '2019', '8.10', 'BCA', 'Kanpur University', '2016', '70', 'Ajay Kumar Pandey', 'Single', '', 0),
(68, 'Mr.', 'Mayank', 'Sharma', 'mayank68', 'mayank68', 'mayank68.jpg', '9192939495', '1997-11-06', 'mayank@gmail.com', 'Pakistan', 'Karachi, Pakistan', 'Karachi, Pakistan', 'female', '2018-01-01', 'Permanent', 25000, 0, 0, 0, 0, 0, 'State Bank of Osama', '45545656423', 'QWERT1234D', 'MCA', 'NIT Islamabad', '2019', '9.0', 'BSc', 'Karachi University', '2013', '45', 'Mayank ke papa', 'Single', '', 0),
(69, 'Mr.', 'Abhishek', 'Nayek', 'nayek72', 'nayek72', 'nayek72.jpg', '9192939496', '1995-02-02', 'nayek@gmail.com', 'Ukraine', 'Jamshedpur, Jharkhand', 'Ranchi, Jharkhand', 'female', '2018-02-08', 'Contract', 23000, 1000, 1000, 200, 400, 600, 'State Bank of India', '234344543545', 'DFGHJ4567H', 'MCA', 'NIT jamshedpur', '2019', '8.10', 'BCA', 'Mannulal college', '2013', '99', 'Nayek ke papa', 'Married', 'kaju katli ', 0),
(70, 'Mr.', 'Mukesh', 'Yadav', 'mukesh', 'mukku', 'mukesh.jpg', '9394587632', '2018-04-20', 'mukesh@gmail.com', 'Yemen', 'UP', 'UP', 'male', '2018-02-08', 'Permanent', 30000, 1400, 1200, 1000, 1000, 1000, 'Bank of baroda', '454353454535', 'HJKLA1234R', 'MCA', 'Dainik Jagran', '2018', '75', '', '', '', '', 'mukesh ke papa', 'Single', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `leave_id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`leave_id`, `uname`, `type`, `start`, `end`, `reason`, `status`) VALUES
(2, 'nayek72', 'sick', '2018-04-19', '2018-04-28', '', 'Denied'),
(3, 'mukesh', 'sick', '2018-04-12', '2018-04-23', 'Fever', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msgid` int(11) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msgid`, `sender`, `receiver`, `message`, `datetime`, `seen`) VALUES
(55, 'admin', '', 'hey neeraj', '2018-04-05 04:29:06', 1),
(93, 'mayank68', 'admin', 'hello\r\n', '2018-04-05 22:56:37', 1),
(94, 'mayank68', 'admin', 'hii sumit', '2018-04-05 22:57:00', 1),
(95, 'admin', 'mayank68', 'Hello be', '2018-04-05 22:57:05', 1),
(96, 'admin', 'mayank68', 'Archna', '2018-04-05 22:57:14', 1),
(97, 'admin', 'mayank68', 'its working', '2018-04-05 22:57:40', 1),
(98, 'mayank68', 'admin', 'yupp', '2018-04-05 22:59:54', 1),
(99, 'mayank68', 'admin', 'accha hai yr', '2018-04-05 23:00:05', 1),
(100, 'admin', 'mayank68', 'Thanku thanku', '2018-04-05 23:02:18', 1),
(101, 'mayank68', 'admin', 'are isme jb msg ata hai to batata hii nhi hai', '2018-04-05 23:06:50', 1),
(102, 'mayank68', 'admin', 'kro kucch', '2018-04-05 23:07:07', 1),
(103, 'admin', 'mayank68', 'Ha', '2018-04-05 23:07:29', 1),
(104, 'mayank68', 'admin', 'ye accha lag rha hai hum isi se baat krenge okay?', '2018-04-05 23:07:39', 1),
(105, 'admin', 'mayank68', 'Notification wala system krna pdega', '2018-04-05 23:07:43', 1),
(106, 'admin', 'mayank68', ':-)', '2018-04-05 23:07:54', 1),
(107, 'mayank68', 'admin', 'hmmm socho aur kro', '2018-04-05 23:08:04', 1),
(108, 'admin', 'mayank68', 'okayy', '2018-04-05 23:08:10', 1),
(109, 'admin', 'mayank68', 'ek raat jagna pdega aur', '2018-04-05 23:08:27', 1),
(110, 'mayank68', 'admin', 'ab party cahiye', '2018-04-05 23:08:54', 1),
(111, 'admin', 'mayank68', 'logout kr aur dobara login kr...username : admin       password : sadller70', '2018-04-05 23:09:08', 1),
(112, 'mayank68', 'admin', 'hum jga denge subah', '2018-04-05 23:09:14', 1),
(113, 'admin', 'mayank68', 'party??', '2018-04-05 23:09:15', 1),
(114, 'mayank68', 'admin', 'nhi chahiye party..just kidding', '2018-04-05 23:09:44', 1),
(115, 'admin', 'mayank68', 'okk', '2018-04-05 23:09:51', 1),
(116, 'admin', 'mayank68', 'ye to aur bhi accha lag rha hai', '2018-04-05 23:14:25', 1),
(121, 'admin', 'neeraj71', 'first message', '2018-04-06 00:38:04', 0),
(134, 'mayank68', 'admin', 'ye kwon type liya ki party nhi cahiye??', '2018-04-06 04:59:53', 1),
(135, 'admin', 'mayank68', 'tune kiya hoga', '2018-04-06 05:00:18', 1),
(136, 'mayank68', 'admin', 'naa mujhe to cahiye', '2018-04-06 05:00:44', 1),
(137, 'admin', 'mayank68', 'ghante wala emoji nhi hai yha', '2018-04-06 05:01:31', 1),
(138, 'admin', 'mayank68', 'warna bhejte', '2018-04-06 05:01:38', 1),
(139, 'admin', 'mayank68', ':-)', '2018-04-06 05:01:43', 1),
(140, 'mayank68', 'admin', 'ghanta chodo koi emoji nhi hai', '2018-04-06 05:02:39', 1),
(141, 'mayank68', 'admin', 'bhut bekar ho ak party dene me tumhara ja kya rha hai', '2018-04-06 05:03:16', 1),
(142, 'admin', 'mayank68', ';-> ye use kro', '2018-04-06 05:03:56', 1),
(143, 'admin', 'mayank68', 'genuine reason b to hona chahiye', '2018-04-06 05:04:16', 1),
(144, 'admin', 'mayank68', 'kis chij k party', '2018-04-06 05:04:25', 1),
(145, 'admin', 'mayank68', 'ðŸ˜€', '2018-04-06 05:04:55', 1),
(146, 'mayank68', 'admin', 'chodd jane de ab lenge hi nhi party kabhi, jao kya yaad kroge tum bhi', '2018-04-06 05:05:07', 1),
(147, 'admin', 'mayank68', 'ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””ðŸ””', '2018-04-06 05:05:30', 1),
(148, 'mayank68', 'admin', 'are kaise laye????', '2018-04-06 05:05:59', 1),
(149, 'admin', 'mayank68', 'party tb jb khud earn krne lgege...paise mangne na pde', '2018-04-06 05:06:16', 1),
(150, 'admin', 'mayank68', 'https://emojikeyboard.org/', '2018-04-06 05:06:27', 1),
(151, 'admin', 'mayank68', 'isko open kr...emoji pe click kr ..auto  copy ho jaega', '2018-04-06 05:06:51', 1),
(152, 'mayank68', 'admin', 'hmmm okay wait krte hi 3-4 month ka', '2018-04-06 05:07:10', 1),
(153, 'admin', 'mayank68', 'hmmm...dua b kar..koi  to le jaye yha se', '2018-04-06 05:08:00', 1),
(154, 'mayank68', 'admin', 'hmm kr rhe hai, le jayenge don\'t worry', '2018-04-06 05:08:35', 1),
(155, 'mayank68', 'admin', 'jaa rhe thlne ab bye', '2018-04-06 05:09:14', 1),
(156, 'admin', 'mayank68', 'worried bilkul nhi hai ', '2018-04-06 05:09:16', 1),
(157, 'admin', 'mayank68', 'tahlne??', '2018-04-06 05:09:26', 1),
(158, 'admin', 'mayank68', 'sch me', '2018-04-06 05:09:31', 1),
(159, 'admin', 'mayank68', 'jati hai', '2018-04-06 05:09:38', 1),
(160, 'mayank68', 'admin', 'naa re aaj jag gye na to soch rhe hai 10 min de dete hai', '2018-04-06 05:10:12', 1),
(161, 'admin', 'mayank68', 'ohhhk..ja fir', '2018-04-06 05:10:44', 1),
(162, 'mayank68', 'admin', 'hmm bye', '2018-04-06 05:11:10', 1),
(163, 'admin', 'mayank68', 'bye..gud mrng', '2018-04-06 05:11:22', 1),
(164, 'mayank68', 'admin', 'gud mrng :-)', '2018-04-06 05:11:59', 1),
(165, 'admin', 'mayank68', 'signing off', '2018-04-06 05:12:50', 1),
(170, 'admin', 'neeraj71', 'gvvvgh', '2018-04-08 18:22:58', 0),
(171, 'admin', 'mukesh', 'Hi', '2018-04-23 07:17:38', 1),
(172, 'mukesh', 'admin', 'hello admin', '2018-04-23 07:17:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`empid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msgid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `empid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
