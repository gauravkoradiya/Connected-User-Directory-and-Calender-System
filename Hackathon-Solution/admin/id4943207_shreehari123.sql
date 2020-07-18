-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2018 at 05:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4943207_shreehari123`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `admin_id` int(6) NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'shreeharicgpit@gmail.com', 'Shreehari@123');

-- --------------------------------------------------------

--
-- Table structure for table `ATTENDANCE`
--

CREATE TABLE `ATTENDANCE` (
  `c_id` int(11) NOT NULL,
  `meeting_code` int(6) NOT NULL,
  `user_id` int(12) NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `DIRECTORY`
--

CREATE TABLE `DIRECTORY` (
  `user_id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` float NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DIRECTORY`
--

INSERT INTO `DIRECTORY` (`user_id`, `name`, `designation`, `email`, `mobile`, `state`, `department`, `attendance`, `password`, `gender`, `address`, `profile_pic`) VALUES
(1, 'abcd', 'head', 'gauravkoradiya@gmail.com', '7874869304', 'gujarat', 'umbrella', 0, 'abcd', 'male', 'gujarat', '');

-- --------------------------------------------------------

--
-- Table structure for table `MEETING`
--

CREATE TABLE `MEETING` (
  `meeting_code` int(6) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keypoint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conclusion` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ATTENDANCE`
--
ALTER TABLE `ATTENDANCE`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meeting_code` (`meeting_code`);

--
-- Indexes for table `DIRECTORY`
--
ALTER TABLE `DIRECTORY`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `MEETING`
--
ALTER TABLE `MEETING`
  ADD PRIMARY KEY (`meeting_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ATTENDANCE`
--
ALTER TABLE `ATTENDANCE`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DIRECTORY`
--
ALTER TABLE `DIRECTORY`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `MEETING`
--
ALTER TABLE `MEETING`
  MODIFY `meeting_code` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ATTENDANCE`
--
ALTER TABLE `ATTENDANCE`
  ADD CONSTRAINT `ATTENDANCE_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `DIRECTORY` (`user_id`),
  ADD CONSTRAINT `ATTENDANCE_ibfk_2` FOREIGN KEY (`meeting_code`) REFERENCES `MEETING` (`meeting_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
