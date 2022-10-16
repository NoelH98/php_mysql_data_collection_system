-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2018 at 06:26 AM
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
-- Database: `clientsdirectory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'superadmin@sp', 'd3bbd6d8423d130c8ac4b7531e71e648');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `branchID` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`branchID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchID`, `username`, `user_id`, `title`, `description`) VALUES
(3, 'AndiCreations', 4, 'Financial Department', 'Handles financial work'),
(4, 'AndiCreations', 4, 'IT Department', 'Handles IT work');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `UserID` int(25) NOT NULL AUTO_INCREMENT,
  `Username` varchar(65) NOT NULL,
  `password` varchar(32) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `employment_status` varchar(255) NOT NULL,
  `education_level` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`UserID`, `Username`, `password`, `Email`, `first_name`, `last_name`, `gender`, `phone_number`, `date_of_birth`, `marital_status`, `employment_status`, `education_level`, `nationality`, `hobbies`) VALUES
(4, 'Andi', 'd3bbd6d8423d130c8ac4b7531e71e648', 'andicreations94@gmail.com', 'Noel', 'Eugene', 'Male', '0754545454', '1998-01-24', 'No', 'No', 'Degree', 'Kenyan', 'Chess/Basketball'),
(5, 'noel', 'd3bbd6d8423d130c8ac4b7531e71e648', 'noelheugene@gmail.com', 'Noel', 'Eugene', 'Male', '0721464645', '1998-01-24', 'Yes', 'Yes', 'Degree', 'Kenyan', 'Singing'),
(6, 'SandaCate', 'd3bbd6d8423d130c8ac4b7531e71e648', 'sandacate@gmail.com', 'Sanda', 'Cate', 'Female', '0711111111', '1995-01-12', 'No', 'Yes', 'Degree', 'Kenyan', 'Traveling');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `email`, `message`) VALUES
(1, 'Andi', 'andicreations@gmail.com', 'Hello Sp ');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `client` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `rating_value` int(10) DEFAULT NULL,
  `rating_date` date NOT NULL,
  `responce_date` date DEFAULT NULL,
  `query_status` varchar(15) DEFAULT 'No',
  `user_comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `username`, `service`, `category`, `branch`, `comment`, `client`, `gender`, `rating_value`, `rating_date`, `responce_date`, `query_status`, `user_comment`) VALUES
(10, '4', 'Responce Time', 'Suggestion', 'Financial Department', 'Have a better means of responding to clients!', 'Andi', NULL, 3, '2018-04-29', '2018-05-06', 'Yes', NULL),
(9, '4', 'Customer Service', 'Complement', 'IT Department', 'Keep up the good work!', 'Andi', NULL, 5, '2018-04-29', '2018-05-06', 'Yes', NULL),
(11, '4', 'Responce Time', 'Complement', 'Financial Department', 'Just a query test!', 'Andi', NULL, 2, '2018-05-02', '2018-05-06', 'Yes', NULL),
(12, '4', 'Customer Service', 'Suggestion', 'IT Department', 'Second query!', 'Andi', NULL, 1, '2018-05-02', '2018-05-06', 'Yes', NULL),
(13, '4', 'Customer Service', 'Complement', 'Financial Department', 'I really like your services ', 'Andi', NULL, 5, '2018-05-06', '2018-05-06', 'Yes', NULL),
(14, '4', 'Customer Service', 'Suggestion', 'Financial Department', 'Faster services are a requirement!', 'Andi', NULL, 2, '2018-05-06', '2018-05-06', 'Yes', NULL),
(15, '4', 'Customer Service', 'Suggestion', 'IT Department', 'I like reading your columns', 'Andi', NULL, 5, '2018-05-06', '2018-06-10', 'Yes', NULL),
(16, '4', 'Responce Time', 'Complaint', 'IT Department', 'Do better', 'Andi', NULL, 3, '2018-05-06', '2018-06-11', 'Yes', 'hello kenyans'),
(17, '4', 'Customer Service', 'Complaint', 'IT Department', 'Just a comment', '', NULL, 5, '2018-05-09', NULL, 'No', NULL),
(18, '4', 'Responce Time', 'Complement', 'IT Department', 'yeah john doe just tesstig', 'ronney', NULL, 5, '2018-05-21', NULL, 'No', NULL),
(19, '4', 'Responce Time', 'Complement', 'IT Department', 'yeah john doe just tesstig', 'ronney', NULL, 5, '2018-05-21', NULL, 'No', NULL),
(20, '4', 'Customer Service', 'Suggestion', 'customer service', 'Hello World', 'Andi', NULL, 3, '2018-06-12', NULL, 'No', NULL),
(21, '4', 'Front service', 'Complaint', 'IT Department', 'Hello Kenya', 'Andi', NULL, 1, '2018-06-12', NULL, 'No', NULL),
(22, '4', 'Front service', 'Complement', 'IT Department', 'keep  up the good work', 'Andi', NULL, 5, '2018-06-18', NULL, 'No', NULL),
(23, '4', 'Front service', 'Complement', 'IT Department', 'keep  up the good work', 'Andi', NULL, 5, '2018-06-18', NULL, 'No', NULL),
(24, '4', 'Responce Time', 'Suggestion', 'Financial Department', 'hello kenya,world', 'Andi', 'Male', 4, '2018-06-22', NULL, 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceID` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `user_id` int(15) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `branchID` varchar(50) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `username`, `user_id`, `service_name`, `branchID`) VALUES
(3, 'AndiCreations', 4, 'Responce Time', 'IT Department'),
(4, 'AndiCreations', 4, 'Customer Service', 'Financial Department');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `sector`) VALUES
(4, 'AndiCreations', 'd3bbd6d8423d130c8ac4b7531e71e648', 'Kenya', 'Communications'),
(5, 'Nation media group', 'd3bbd6d8423d130c8ac4b7531e71e648', 'Kenya/Nairobi/karen/Kenyatta', 'Communications');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
