-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 04:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `staff_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `time_in` time(6) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `staff_id`, `fname`, `lname`, `rank`, `time_in`, `comment`, `date`) VALUES
(1, 'stagsdh', '', '', '', '10:40:29.399686', 'hsjdjhjdsm', '0000-00-00 00:00:00.000000');

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
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

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
-- Table structure for table `memos`
--

CREATE TABLE `memos` (
  `id` int(6) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `d_o_p` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `resume_date` date NOT NULL,
  `source` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `memos`
--

INSERT INTO `memos` (`id`, `staff_id`, `d_o_p`, `subject`, `comment`, `resume_date`, `source`, `status`, `date`) VALUES
(1, 'hoo', '2018-05-15', 'hello', 'dhdv', '2018-05-16', 'fsh', 'gdgdg', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(6) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `d_o_p` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `resume_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `staff_id`, `d_o_p`, `subject`, `comment`, `resume_date`, `status`, `date`) VALUES
(11, 'staff 1', '0000-00-00', 'hdhdhdh', 'hddhjdhj', '0000-00-00', 'in Progress', '2018-05-25 18:59:03.461491'),
(12, 'staff 2', '0000-00-00', 'hdhdhdh', 'home', '0000-00-00', 'in Progress', '2018-05-25 18:59:03.461491'),
(13, 'staff 3', '0000-00-00', 'am sick today', 'nt fellng good', '0000-00-00', 'in Progress', '2018-05-26 11:05:26.519144'),
(15, 'error occured', '2018-02-03', 'good work', 'ddeeefeffe', '2018-05-04', 'in Progress', '2018-05-28 09:52:22.089236'),
(16, 'error occured', '2018-02-03', 'stop', 'am just checkng', '2018-10-04', 'in Progress', '2018-05-28 09:55:37.214983'),
(17, 'error occured', '2018-02-03', 'stop', 'am just checkng', '2018-10-04', 'in Progress', '2018-05-28 09:56:39.641934'),
(18, 'error occured', '2018-02-03', 'stop', 'am just checkng', '2018-10-04', 'in Progress', '2018-05-28 09:57:53.964378'),
(19, 'error occured', '2018-02-03', 'stop', 'am just checkng', '2018-10-04', 'in Progress', '2018-05-28 09:58:26.012723'),
(20, 'error occured', '2018-02-03', 'stop', 'am just checkng', '2018-10-04', 'in Progress', '2018-05-28 10:02:32.293999');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `id` int(6) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`id`, `staff_id`, `first_name`, `last_name`, `phone`, `email`, `position`, `unit`, `rank`, `campus`, `password`, `cpassword`, `date`) VALUES
(4, 'staff 1', 'james', 'okeke', 0, '', '', 'library', 'Staff', 'igbariam', 'md5(staff1)', 'md5(staff1', ''),
(5, 'staff 2', 'joy', 'mike', 0, '', '', 'store', 'Staff', 'igbariam', 'staff2', 'staff2', ''),
(6, 'staff 3', 'chimdi', 'okafor', 0, '', '', 'medical', 'Unit head', 'igbariam', '5d41402abc4b2a76b9719d911017c592', '5d41402abc4b2a76b9719d911017c592', ''),
(7, 'staff 2', 'chimdi', 'mike', 0, '', '', 'hhh', 'Unit head', 'igbariam', '6417462461f5d90e2dc5ed1e1c23215a', '6417462461f5d90e2dc5ed1e1c23215a', '');

-- --------------------------------------------------------

--
-- Table structure for table `reply_permissions`
--

CREATE TABLE `reply_permissions` (
  `id` int(6) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `d_o_p` date NOT NULL,
  `resume_date` date NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `accepted_date` date NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `reply_permissions`
--

INSERT INTO `reply_permissions` (`id`, `staff_name`, `staff_id`, `unit`, `campus`, `d_o_p`, `resume_date`, `subject`, `status`, `accepted_date`, `comment`, `date`) VALUES
(1, 'not available', '67677', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', '', '0000-00-00', 'am just checkng', '0000-00-00 00:00:00.000000'),
(2, 'not available', '7444', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', '', '0000-00-00', 'ccvftdtrcgcgcghchgchgcgh', '0000-00-00 00:00:00.000000'),
(3, 'not available', '9444', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', 'in Progress', '0000-00-00', 'hiii its me', '2018-05-28 10:02:32.353286');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(6) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `reciever` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `subject`, `date`, `doc_name`, `reciever`) VALUES
(1, 'good work', '2021-04-01', 'IMG-20171226-WA0000', 'unit head'),
(2, 'good work', '2021-04-01', 'IMG-20171226-WA0000', 'unit head'),
(3, 'good work', '2021-04-01', 'IMG-20171226-WA0000', 'unit head'),
(4, 'good work', '2021-04-01', 'IMG-20171226-WA0000', 'unit head'),
(5, 'good fjfjfj', '2018-05-03', 'differences_between_ipv4_and_ipv6', 'librarian'),
(6, 'good fjfjfj', '2018-05-03', 'differences_between_ipv4_and_ipv6', 'librarian'),
(7, 'good fjfjfj', '2018-05-03', 'differences_between_ipv4_and_ipv6', 'librarian'),
(8, 'good fjfjfj', '2018-05-03', 'WIN_20171106_22_48_05_Pro', 'librarian'),
(9, 'good fjfjfj', '2018-05-03', 'WIN_20171106_22_48_05_Pro', 'librarian'),
(10, 'good fjfjfj', '2018-05-03', 'WIN_20171106_22_48_05_Pro', 'librarian'),
(11, 'good work', '2022-03-03', 'WIN_20171106_22_48_18_Pro', 'librarian'),
(12, 'good work', '2022-03-03', 'WIN_20171106_22_48_18_Pro', 'librarian'),
(13, 'fk', '2018-04-03', 'af4610022ea794e97eee259432519a92', 'unit head'),
(14, 'fk', '2018-04-03', 'af4610022ea794e97eee259432519a92', 'unit head'),
(15, 'fk', '2018-04-03', 'af4610022ea794e97eee259432519a92', 'unit head'),
(16, 'good fjfjfj', '2018-05-03', 'WIN_20171106_22_48_05_Pro', 'librarian'),
(17, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(18, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(19, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(20, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(21, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(22, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(23, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(24, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(25, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(26, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(27, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(28, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(29, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(30, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(31, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(32, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(33, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(34, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(35, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(36, 'good fjfjfj', '2018-05-03', 'CHAPTER ONE changed', 'librarian'),
(37, 'angry', '2018-03-02', 'About Salesians of Don Bosco Anglophone West Africa', 'unit head'),
(38, 'angryfseh', '2018-03-02', 'coverpage it', 'unit head'),
(39, 'angryfseh', '2018-03-02', 'ESTHER WORK', 'unit head'),
(40, 'change', '2019-07-02', 'About Salesians of Don Bosco Anglophone West Africa', 'unit head'),
(41, 'good work', '2021-05-03', '9780321995780.pdf', 'unit head');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
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
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
