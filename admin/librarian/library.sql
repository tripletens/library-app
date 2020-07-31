-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 12:15 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(6) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `time_in` time(6) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `fname`, `lname`, `staff_id`, `time_in`, `comment`, `date`) VALUES
(1, 'nonny', 'james', '999', '00:00:00.000000', 'A LITTLE BIT LATE', '2018-05-09 04:53:09.038919'),
(2, 'nonny', 'james', '999', '00:00:00.000000', 'A LITTLE BIT LATE', '2018-05-09 04:53:32.154746'),
(3, 'nonny', 'james', '999', '00:00:00.000000', 'A LITTLE BIT LATE', '2018-05-09 04:53:39.455393'),
(4, 'goat', 'COW', 'rat', '00:00:00.000000', '', '2018-05-09 04:54:28.312105'),
(5, 'nonny', 'mike', 'staff 2', '05:00:00.000000', 'i was ill', '2018-05-09 10:22:29.631539'),
(6, 'nonny', 'mike', 'staff 2', '05:00:00.000000', 'i was ill', '2018-05-09 10:22:35.836110'),
(7, 'nonny', 'mike', 'staff 2', '05:00:00.000000', 'i was ill', '2018-05-09 10:22:39.666273'),
(8, 'new name', 'last name', 'unknown staff ', '02:30:00.000000', 'i was not alive', '2018-05-09 10:25:32.709920'),
(9, 'new name', 'last name', 'unknown staff ', '02:30:00.000000', 'i was not alive', '2018-05-09 10:27:25.117800'),
(10, 'dhsdhdh', 'mike', 'dhdhh', '05:00:00.000000', 'dhdh', '2018-05-09 10:27:37.970470'),
(11, 'dhsdhdh', 'mike', 'dhdhh', '05:00:00.000000', 'dhdh', '2018-05-09 10:27:42.345668'),
(12, 'nonny', 'hhdhd', 'staff 2', '09:00:00.000000', 'hello', '2018-05-09 10:36:27.434575'),
(13, 'nonny', 'mike', 'staff 2', '05:00:00.000000', 'fdhdhd', '2018-05-09 10:58:20.768914'),
(14, 'nonny', 'mike', 'staff 2', '05:00:00.000000', 'fdhdhd', '2018-05-09 11:00:49.570118');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `department`, `faculty`, `author`, `publisher`, `date`) VALUES
(1, 'book1', 'A new Book', 'Computer Science', 'Physical Sciences', 'NONNY', 'Nonny prints', '2018-05-09 01:17:59.483080'),
(2, 'book2', 'a second new book', 'Computer Science', 'Physical Sciences', 'mike', 'mike prints', '2018-05-09 01:20:42.542731'),
(3, 'book3', 'a second new book', 'Computer Science', 'Physical Sciences', 'mike', 'mike prints', '2018-05-09 01:21:13.323545'),
(4, 'book 4', 'an interesting book', 'Computer Science', 'Physical Sciences', 'my book', 'mike prints', '2018-05-09 01:57:23.857185');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(6) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `resume_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `fname`, `lname`, `staff_id`, `resume_date`, `status`, `date`) VALUES
(1, 'nonny', 'mike', 'staff 2', '2018-09-08', 'hzjjsj', '2018-05-09 12:04:47.168970'),
(2, 'jdjj', 'hhh', 'staff 2', '2018-09-08', 'djdjj', '2018-05-09 12:08:51.363238'),
(3, 'jdjj', 'hhh', 'staff 2', '2018-09-08', 'djdjj', '2018-05-09 12:12:56.769487'),
(4, 'jdjj', 'hhh', 'staff 2', '2018-09-08', 'djdjj', '2018-05-09 12:14:15.113130');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `id` int(6) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `authority` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`id`, `staff_id`, `first_name`, `last_name`, `unit`, `authority`, `password`, `cpassword`, `date`) VALUES
(4, 'staff 1', 'james', 'okeke', 'library', 'Staff', 'md5(staff1)', 'md5(staff1', ''),
(5, 'staff 2', 'joy', 'mike', 'store', 'Staff', 'staff2', 'staff2', ''),
(6, 'staff 3', 'chimdi', 'okafor', 'medical', 'Unit head', '5d41402abc4b2a76b9719d911017c592', '5d41402abc4b2a76b9719d911017c592', ''),
(7, 'staff 2', 'chimdi', 'mike', 'hhh', 'Unit head', '6417462461f5d90e2dc5ed1e1c23215a', '6417462461f5d90e2dc5ed1e1c23215a', '');

-- --------------------------------------------------------

--
-- Table structure for table `reply_permissions`
--

CREATE TABLE `reply_permissions` (
  `id` int(6) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `accepted_date` date NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_permissions`
--
ALTER TABLE `reply_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reply_permissions`
--
ALTER TABLE `reply_permissions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
