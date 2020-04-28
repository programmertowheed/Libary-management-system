-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 08:20 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libary_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `name`, `publication_status`, `date`) VALUES
(1, 'Md. Towheed', 1, '2020-03-27 17:07:59'),
(2, 'Rezwan', 2, '2020-03-28 13:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `total_book` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `name`, `department_id`, `author_id`, `total_book`, `in_stock`, `publication_status`, `date`) VALUES
(1, 'Computer Fundamental', 1, 1, 10, 8, 1, '2020-03-27 17:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `publication_status`, `date`) VALUES
(1, 'CSE', 1, '2020-03-27 16:56:27'),
(3, 'Bangla', 2, '2020-03-27 17:03:07'),
(4, 'English', 1, '2020-03-27 17:17:54'),
(5, 'BBA', 1, '2020-03-28 13:01:22'),
(6, 'LLB', 1, '2020-04-03 09:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issuebook`
--

CREATE TABLE `tbl_issuebook` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issuebook`
--

INSERT INTO `tbl_issuebook` (`id`, `student_id`, `department_id`, `book_id`, `return_date`, `date`) VALUES
(2, 1, 1, 1, '12-02-2020', '2020-03-27 18:35:02'),
(5, 3, 1, 1, '12-02-2020', '2020-03-28 07:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `department_id`, `studentid`, `phone`, `publication_status`, `date`) VALUES
(1, 'Md. Towheedul Islam', '1', '171-15-9275', '01731974045', 2, '2020-03-27 16:43:16'),
(3, 'Zahid', '1', '171-15-9298', '01731974045', 1, '2020-03-27 17:03:39'),
(4, 'Jadid', '3', '171-15-9273', '01731974045', 1, '2020-03-27 17:19:33'),
(5, 'Alim', '1', '171-15-9276', '01731974045', 1, '2020-03-28 13:09:20'),
(6, 'Raihan', '1', '171-15-9274', '01731974045', 1, '2020-03-28 16:45:51'),
(8, 'Alim', '1', '171-15-9276', '01731974045', 1, '2020-04-03 06:42:10'),
(10, 'Mondol', '4', '171-15-9274', '01731974045', 1, '2020-04-03 08:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `randnum` varchar(25) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `userEmail`, `userPass`, `auth`, `mobile`, `randnum`, `role`, `picture`) VALUES
(1, 'Rex', 'admin@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', '5bd3aec55e6a58d67139f02e95a049a7', '01731974045', '847371', 'admin', '75d23af433e0cea4c0e45a56dba18b30pic.jpg'),
(2, 'Towheed', 'programmertowheed@gmail.com', 'b7d495695d96614aa67d821a66fabe26', 'a0234bf5b751d2fe7348a7c60a121c3a', '01731974045', '312559', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_issuebook`
--
ALTER TABLE `tbl_issuebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`,`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_issuebook`
--
ALTER TABLE `tbl_issuebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
