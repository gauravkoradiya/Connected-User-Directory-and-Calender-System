-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2018 at 02:16 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(6) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'shreeharicgpit@gmail.com', 'Shreehari@123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_code` int(6) NOT NULL,
  `user_id` int(12) NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`),
  KEY `user_id` (`user_id`),
  KEY `meeting_code` (`meeting_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(6) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'shbdkjsbd'),
(2, 'shbdkjsbd'),
(3, 'wefwe');

-- --------------------------------------------------------

--
-- Table structure for table `dept_desig`
--

DROP TABLE IF EXISTS `dept_desig`;
CREATE TABLE IF NOT EXISTS `dept_desig` (
  `dept_desig_id` int(6) NOT NULL AUTO_INCREMENT,
  `dept_id` int(6) NOT NULL,
  `desig_id` int(6) NOT NULL,
  PRIMARY KEY (`dept_desig_id`),
  KEY `dept_id` (`dept_id`),
  KEY `desig_id` (`desig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `desig_id` int(6) NOT NULL AUTO_INCREMENT,
  `desig_name` varchar(50) NOT NULL,
  PRIMARY KEY (`desig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

DROP TABLE IF EXISTS `directory`;
CREATE TABLE IF NOT EXISTS `directory` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` float DEFAULT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`user_id`, `name`, `designation`, `email`, `mobile`, `state`, `department`, `attendance`, `password`, `gender`, `address`, `profile_pic`) VALUES
(1, 'abcd', 'head', 'gauravkoradiya@gmail.com', '7874869304', 'gujarat', 'umbrella', NULL, 'abcd', 'male', 'gujarat', ''),
(2, 'abcd', 'head', 'abcd@@mail.com', '1234567890', 'guj', 'umbrella', NULL, 'abcd', 'male', 'varahha road', ''),
(3, 'erverv', 'Directorate', 'rverv@mail.com', '13123123', 'Gujarat', 'Agriculture', NULL, 'aaaaaaaa', 'Male', '1vvsdvsdvs', 'none'),
(4, 'fvsdvsd', 'Directorate', 'sddcsdc@mail.com', 'sdcsdcsdc', 'Gujarat', 'Communication', NULL, 'aaaaaaaa', 'Female', 'sdcsdcc', 'none'),
(5, 'jdbkscj', 'Corporate', 'kkjebj@mail.com', '2u3y9', 'Maharastra', 'Agriculture', NULL, 'aaaaaaaa', 'Male', 'dsfdcsdc', 'none'),
(6, 'fvsdvsd', 'Directorate', 'sddcsdc@mail.com', 'sdcsdcsdc', 'Gujarat', 'Communication', NULL, 'yF85-c0w', 'Female', 'sdcsdcc', 'none'),
(7, 'fvsdvsd', 'Directorate', 'sddcsdc@mail.com', 'sdcsdcsdc', 'Gujarat', 'Communication', NULL, 'f8r*_.d7', 'Female', 'sdcsdcc', 'none'),
(8, 'fgetg', 'Directorate', 'rtger@gmail.com', '123456', 'Maharastra', 'Agriculture', NULL, '!VySTAZK', 'Female', 'eferferferf', 'none'),
(9, 'ascacac', 'Directorate', 'abcd@mail.com', '1234567890', 'Haryana', 'IT', NULL, 'mW*fCJ5)', 'Male', 'dscsdcsdc', 'umbrella.png'),
(10, 'ascacac', 'Directorate', 'abcd@mail.com', '1234567890', 'Haryana', 'IT', NULL, '(TYt$BCx', 'Male', 'dscsdcsdc', 'umbrella.png'),
(11, 'gk', 'Directorate', 'gk@mIL.COM', '1234567890', 'Maharastra', 'Agriculture', NULL, 'zB5&j!3M', 'Male', 'DFFBGNHJ', 'umbrella.png');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `meeting_code` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `keypoint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conclusion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`meeting_code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_code`, `title`, `description`, `date`, `time`, `status`, `keypoint`, `conclusion`) VALUES
(1, 'gfcvhbjkl', 'kjhjgfdghjkl;', '2018-03-12', '02:03:00', 'Upcoming', 'kkjhgfghj', NULL),
(2, 'gfcvhbjkl', 'kjhjgfdghjkl;', '2018-03-12', '02:03:00', 'Upcoming', 'kkjhgfghj', NULL),
(3, 'erty', 'mhgfds', '2017-09-14', '10:59:00', 'Upcoming', 'qwhjjhgfd', NULL),
(4, 'erty', 'mhgfds', '2017-09-14', '10:59:00', 'Upcoming', 'qwhjjhgfd', NULL),
(5, 'ghjdhgv', 'jjhhggchg', '2017-09-14', '10:59:00', 'Upcoming', 'hjkjjhgggghj', NULL),
(6, 'fhghjkol', ';hhgfhjkl', '2017-09-14', '10:59:00', 'Completed', 'poiuhgf', NULL),
(7, 'jhvhjk', 'hgjkkhg', '2018-03-12', '12:59:00', 'Upcoming', 'jhgfghhj', NULL),
(8, 'ghjkkjkhgc', 'jkjhgfgh', '2018-02-09', '12:59:00', 'Completed', 'jkjhjgggh', NULL),
(9, 'ghjkkjkhgc', 'jkjhgfgh', '2018-02-09', '12:59:00', 'Completed', 'jkjhjgggh', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `ATTENDANCE_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `directory` (`user_id`),
  ADD CONSTRAINT `ATTENDANCE_ibfk_2` FOREIGN KEY (`meeting_code`) REFERENCES `meeting` (`meeting_code`);

--
-- Constraints for table `dept_desig`
--
ALTER TABLE `dept_desig`
  ADD CONSTRAINT `dept_desig_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `dept_desig_ibfk_2` FOREIGN KEY (`desig_id`) REFERENCES `designation` (`desig_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
