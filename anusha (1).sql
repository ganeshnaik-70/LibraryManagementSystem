-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 20, 2022 at 04:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anusha`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `numpage` int(11) NOT NULL,
  `numcopy` int(11) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `bname`, `aname`, `category`, `publication`, `year`, `numpage`, `numcopy`, `price`) VALUES
(2, 'Data Structures and algorithm', 'Vishwanath M', 'Computer Science', 'CodingBooks', '2016', 200, 20, 100),
(3, 'Java Basic', 'Jakson P', 'Computer Science', 'Code method', '2019', 350, 10, 150),
(4, 'Physics', 'Jhon', 'Science', 'Global Max', '2015', 400, 8, 210),
(5, 'Chemistry', 'Manjunath', 'Science', 'Global Max', '2019', 100, 15, 400),
(6, 'Mathemetics', 'Aryabhata', 'General', 'mathsbooks', '2015', 450, 10, 230),
(7, 'Computer Science basic', 'Leo Da Vinchi', 'Computer Science', 'Code method', '2015', 250, 10, 300);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(10) NOT NULL,
  `phone` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `password`, `email`, `city`, `phone`) VALUES
(1, 'Ganesh', 'Klgn7896', 'ganeshravinaik2001@gmail.com', 'Honnavar', 8971046276),
(2, 'anusha', 'Ani45623', 'anishi78@gmail.com', 'shimoga', 7885859674),
(3, 'aditya', 'Adii1234', 'adi78@gmai.com', 'Mysore', 7485967485),
(4, 'vellar', 'okoK123@', 'watsemytime@gmail.com', 'shinde', 9292929292),
(5, 'vellar', 'okoK123@', 'watsemytime@gmail.com', 'shinde', 9292929292),
(6, 'milksing', '7890Mlik', 'milka234@gmail.com', 'manglore', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `date_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`, `date_time`) VALUES
('Ganesh', 'Klgn7896', '2021-09-19 03:58:59pm'),
('Ganesh', 'Klgn7896', '2021-09-19 04:01:53pm'),
('admin', 'Admin123', '2021-09-19 04:08:46pm'),
('admin', 'Admin123', '2021-09-19 04:10:29pm'),
('admin', 'Admin123', '2021-09-19 04:25:15pm'),
('admin', 'Admin123', '2021-09-20 06:51:48am'),
('admin', 'Admin123', '2021-09-20 07:10:51am'),
('admin', 'Admin123', '2021-09-20 07:37:55am'),
('admin', 'Admin123', '2021-09-20 10:38:12am'),
('aditya', 'Adii1234', '2021-09-20 03:20:50pm'),
('Ganesh', 'Klgn7896', '2021-09-20 03:21:26pm'),
('Ganesh', 'Klgn7896', '2021-09-20 03:27:13pm'),
('Ganesh', 'Klgn7896', '2021-09-20 04:45:38pm'),
('admin', 'Admin123', '2021-12-05 03:25:03pm'),
('admin', 'Admin123', '2021-12-05 03:41:11pm'),
('milksing', '7890Mlik', '2021-12-05 03:51:02pm'),
('milksing', '7890Mlik', '2021-12-05 03:58:31pm'),
('admin', 'Admin123', '2022-04-18 11:30:10am'),
('anusha', 'Ani45623', '2022-04-18 11:30:57am'),
('admin', 'Admin123', '2022-04-18 11:33:00am');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `item_no` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `p_mode` varchar(20) NOT NULL,
  `bname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`item_no`, `amount`, `p_mode`, `bname`) VALUES
(0, 0, '', ''),
(0, 0, '', ''),
(0, 0, '', ''),
(0, 0, '', ''),
(0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `rid` int(11) NOT NULL,
  `bid` int(10) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`rid`, `bid`, `bname`, `aname`, `category`, `publication`, `year`, `status`, `date`, `price`) VALUES
(8, 2, 'Data Structures and algorithm', 'Vishwanath M', 'Computer Science', 'CodingBooks', '2016', 'dissmis', '2021-09-20', 0),
(9, 3, 'Java Basic', 'Jakson P', 'Computer Science', 'Code method', '2019', 'dissmis', '2021-09-20', 0),
(10, 5, 'Chemistry', 'Manjunath', 'Science', 'Global Max', '2019', 'accept', '2021-09-20', 0),
(11, 2, 'Data Structures and algorithm', 'Vishwanath M', 'Computer Science', 'CodingBooks', '2016', 'accept', '2021-12-04', 0),
(12, 7, 'Computer Science basic', 'Leo Da Vinchi', 'Computer Science', 'Code method', '2015', 'dissmis', '2021-12-05', 0),
(13, 6, 'Mathemetics', 'Aryabhata', 'General', 'mathsbooks', '2015', 'accept', '2021-12-05', 0),
(14, 6, 'Mathemetics', 'Aryabhata', 'General', 'mathsbooks', '2015', 'accept', '2021-12-05', 0),
(15, 2, 'Data Structures and algorithm', 'Vishwanath M', 'Computer Science', 'CodingBooks', '2016', 'pending', '2022-04-18', 0),
(16, 2, 'Data Structures and algorithm', 'Vishwanath M', 'Computer Science', 'CodingBooks', '2016', 'pending', '2022-04-18', 100),
(17, 3, 'Java Basic', 'Jakson P', 'Computer Science', 'Code method', '2019', 'pending', '2022-04-18', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
