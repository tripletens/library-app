-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 01:13 PM
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
(1, 'not available', 'error occured', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', '', '0000-00-00', 'am just checkng', '0000-00-00 00:00:00.000000'),
(2, 'not available', 'error occured', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', '', '0000-00-00', 'am just checkng again\\', '0000-00-00 00:00:00.000000'),
(3, 'not available', 'error occured', 'not available', 'not available', '2018-02-03', '2018-10-04', 'stop', 'in Progress', '0000-00-00', 'am just checkng wth u', '2018-05-28 10:02:32.353286');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reply_permissions`
--
ALTER TABLE `reply_permissions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
