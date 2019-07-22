-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2019 at 06:10 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlh_hook`
--

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_info`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_info` (
  `hook_buddy_Id` varchar(25) NOT NULL,
  `hook_title` varchar(100) NOT NULL,
  `hook_desc` varchar(2500) NOT NULL,
  `hook_img` varchar(500) NOT NULL,
  `mediaURL` varchar(350) NOT NULL,
  `srvy_q` varchar(200) NOT NULL,
  `srvy_opt1` varchar(200) NOT NULL,
  `srvy_opt2` varchar(200) NOT NULL,
  `srvy_opt3` varchar(200) NOT NULL,
  `srvy_opt4` varchar(200) NOT NULL,
  `srvy_opt5` varchar(200) NOT NULL,
  `srvy_opt6` varchar(200) NOT NULL,
  `srvy_opt7` varchar(200) NOT NULL,
  `srvy_opt8` varchar(200) NOT NULL,
  `srvy_opt9` varchar(200) NOT NULL,
  `srvy_opt10` varchar(200) NOT NULL,
  `status` varchar(8) NOT NULL,
  `hook_by` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_Id`),
  KEY `hook_by` (`hook_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_srvy_r`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_srvy_r` (
  `hook_buddy_srvy_Id` varchar(25) NOT NULL,
  `hook_buddy_Id` varchar(25) NOT NULL,
  `srvy_option` varchar(9) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_srvy_Id`),
  KEY `hook_buddy_Id` (`hook_buddy_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_buddy_users`
--

CREATE TABLE IF NOT EXISTS `hook_buddy_users` (
  `hook_buddy_usr_Id` varchar(25) NOT NULL,
  `hook_buddy_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_buddy_usr_Id`),
  KEY `hook_buddy_Id` (`hook_buddy_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_public_info`
--

CREATE TABLE IF NOT EXISTS `hook_public_info` (
  `hook_public_Id` varchar(25) NOT NULL,
  `hook_title` varchar(100) NOT NULL,
  `hook_desc` varchar(2500) NOT NULL,
  `hook_img` varchar(500) NOT NULL,
  `mediaURL` varchar(350) NOT NULL,
  `srvy_q` varchar(200) NOT NULL,
  `srvy_opt1` varchar(200) NOT NULL,
  `srvy_opt2` varchar(200) NOT NULL,
  `srvy_opt3` varchar(200) NOT NULL,
  `srvy_opt4` varchar(200) NOT NULL,
  `srvy_opt5` varchar(200) NOT NULL,
  `srvy_opt6` varchar(200) NOT NULL,
  `srvy_opt7` varchar(200) NOT NULL,
  `srvy_opt8` varchar(200) NOT NULL,
  `srvy_opt9` varchar(200) NOT NULL,
  `srvy_opt10` varchar(200) NOT NULL,
  `status` varchar(8) NOT NULL,
  `hook_by` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_public_Id`),
  KEY `hook_by` (`hook_by`),
  KEY `hook_by_2` (`hook_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_public_srvy_r`
--

CREATE TABLE IF NOT EXISTS `hook_public_srvy_r` (
  `hook_public_srvy_Id` varchar(25) NOT NULL,
  `hook_public_Id` varchar(25) NOT NULL,
  `srvy_option` varchar(9) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_public_srvy_Id`),
  KEY `hook_buddy_Id` (`hook_public_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hook_public_subdom`
--

CREATE TABLE IF NOT EXISTS `hook_public_subdom` (
  `hook_public_usr_Id` varchar(25) NOT NULL,
  `hook_public_Id` varchar(25) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`hook_public_usr_Id`),
  KEY `hook_buddy_Id` (`hook_public_Id`,`domain_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `hook_public_Id` (`hook_public_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hook_buddy_srvy_r`
--
ALTER TABLE `hook_buddy_srvy_r`
  ADD CONSTRAINT `hook_buddy_srvy_r_ibfk_1` FOREIGN KEY (`hook_buddy_Id`) REFERENCES `hook_buddy_info` (`hook_buddy_Id`);

--
-- Constraints for table `hook_buddy_users`
--
ALTER TABLE `hook_buddy_users`
  ADD CONSTRAINT `hook_buddy_users_ibfk_1` FOREIGN KEY (`hook_buddy_Id`) REFERENCES `hook_buddy_info` (`hook_buddy_Id`);

--
-- Constraints for table `hook_public_srvy_r`
--
ALTER TABLE `hook_public_srvy_r`
  ADD CONSTRAINT `hook_public_srvy_r_ibfk_1` FOREIGN KEY (`hook_public_Id`) REFERENCES `hook_public_info` (`hook_public_Id`);

--
-- Constraints for table `hook_public_subdom`
--
ALTER TABLE `hook_public_subdom`
  ADD CONSTRAINT `hook_public_subdom_ibfk_1` FOREIGN KEY (`hook_public_Id`) REFERENCES `hook_public_info` (`hook_public_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
