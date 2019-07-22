-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2019 at 06:11 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mlh_uprof`
--

-- --------------------------------------------------------

--
-- Table structure for table `move_info`
--

CREATE TABLE IF NOT EXISTS `move_info` (
  `move_Id` varchar(8) NOT NULL,
  `petitionTitle` varchar(250) NOT NULL,
  `toA_pName1` varchar(60) NOT NULL,
  `toA_dd1` varchar(100) NOT NULL,
  `toA_pName2` varchar(60) NOT NULL,
  `toA_dd2` varchar(100) NOT NULL,
  `toA_pName3` varchar(60) NOT NULL,
  `toA_dd3` varchar(100) NOT NULL,
  `toA_pName4` varchar(60) NOT NULL,
  `toA_dd4` varchar(100) NOT NULL,
  `toA_pName5` varchar(60) NOT NULL,
  `toA_dd5` varchar(100) NOT NULL,
  `issue_desc` varchar(1000) NOT NULL,
  `issue_facedby` varchar(1000) NOT NULL,
  `expectedSolution` varchar(1000) NOT NULL,
  `move_img` varchar(1000) NOT NULL,
  `move_status` varchar(10) NOT NULL COMMENT 'NOTSTARTED/OPEN/CLOSED',
  `openOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `closedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `displayLevel` varchar(25) NOT NULL COMMENT 'SUBDOMAIN_LEVEL/DOMAIN_LEVEL',
  `createdOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createdBy` varchar(15) NOT NULL,
  PRIMARY KEY (`move_Id`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Domain Movement';

-- --------------------------------------------------------

--
-- Table structure for table `move_initiate`
--

CREATE TABLE IF NOT EXISTS `move_initiate` (
  `initate_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  PRIMARY KEY (`initate_Id`),
  KEY `move_Id` (`move_Id`,`union_Id`,`branch_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `branch_Id_2` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_sign`
--

CREATE TABLE IF NOT EXISTS `move_sign` (
  `sign_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sign_Id`),
  KEY `move_Id` (`move_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `move_Id_2` (`move_Id`),
  KEY `user_Id_2` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `move_views`
--

CREATE TABLE IF NOT EXISTS `move_views` (
  `view_Id` varchar(15) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `move_Id` (`move_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_account`
--

CREATE TABLE IF NOT EXISTS `unionprof_account` (
  `union_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `main_branch_Id` varchar(25) NOT NULL,
  `unionName` varchar(45) NOT NULL,
  `aboutUnion` varchar(10000) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  `issue01` varchar(250) NOT NULL,
  `issue02` varchar(250) NOT NULL,
  `issue03` varchar(250) NOT NULL,
  `issue04` varchar(250) NOT NULL,
  `issue05` varchar(250) NOT NULL,
  `issue06` varchar(250) NOT NULL,
  `issue07` varchar(250) NOT NULL,
  `issue08` varchar(250) NOT NULL,
  `issue09` varchar(250) NOT NULL,
  `issue10` varchar(250) NOT NULL,
  PRIMARY KEY (`union_Id`),
  KEY `admin_Id` (`admin_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `admin_Id_2` (`admin_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `main_branch_Id` (`main_branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_account`
--

INSERT INTO `unionprof_account` (`union_Id`, `domain_Id`, `subdomain_Id`, `main_branch_Id`, `unionName`, `aboutUnion`, `profile_pic`, `created_On`, `admin_Id`, `issue01`, `issue02`, `issue03`, `issue04`, `issue05`, `issue06`, `issue07`, `issue08`, `issue09`, `issue10`) VALUES
('UPA287223683747', '02-EDU', 'EDU-01-STUDTCHR', 'UPB2585569513351632525292', 'Student federation of india', 'This is a Sample Federation Union of the Country', '', '2018-11-25 06:11:11', 'USR924357814934', 'asefw', 'defwr', 'fefwr', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_branch`
--

CREATE TABLE IF NOT EXISTS `unionprof_branch` (
  `branch_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_Id` varchar(15) NOT NULL,
  `publicInvitation` varchar(1) NOT NULL COMMENT 'Enable/Disable',
  PRIMARY KEY (`branch_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `admin_Id` (`admin_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unionprof_branch`
--

INSERT INTO `unionprof_branch` (`branch_Id`, `union_Id`, `minlocation`, `location`, `state`, `country`, `createdOn`, `admin_Id`, `publicInvitation`) VALUES
('UPB2585569513351632525292', 'UPA287223683747', 'Nampong', 'Arunachal East', 'Arunachal Pradesh', 'India', '2018-11-25 06:11:12', 'USR924357814934', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_branch_req`
--

CREATE TABLE IF NOT EXISTS `unionprof_branch_req` (
  `req_branch_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `reqOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reqBy` varchar(15) NOT NULL,
  `reqMessage` varchar(300) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`req_branch_Id`),
  KEY `union_Id` (`union_Id`,`reqBy`),
  KEY `reqBy` (`reqBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_calndar`
--

CREATE TABLE IF NOT EXISTS `unionprof_calndar` (
  `calendar_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `sch_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Schedule Timestamp',
  `sch_title` varchar(45) NOT NULL,
  `sch_desc` varchar(250) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  PRIMARY KEY (`calendar_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_faq`
--

CREATE TABLE IF NOT EXISTS `unionprof_faq` (
  `faq_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `askedBy` varchar(15) NOT NULL,
  `askedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` varchar(2500) NOT NULL,
  `answeredBy` varchar(15) NOT NULL,
  `answeredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`faq_Id`),
  KEY `union_Id` (`union_Id`,`askedBy`,`answeredBy`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `askedBy` (`askedBy`),
  KEY `answeredBy` (`answeredBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_lang`
--

CREATE TABLE IF NOT EXISTS `unionprof_lang` (
  `union_Id` varchar(15) NOT NULL,
  `english` varchar(1) NOT NULL,
  `telugu` varchar(1) NOT NULL,
  `hindi` varchar(1) NOT NULL,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem` (
  `member_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `cur_role_Id` varchar(25) NOT NULL,
  `prev_role_Id` varchar(25) NOT NULL,
  `roleNotify` varchar(1) NOT NULL,
  `roleUpdatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `memNotify` varchar(1) NOT NULL,
  `memAddedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `memAddedBy` varchar(15) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'ONLINE/OFFLINE',
  PRIMARY KEY (`member_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `role_Id` (`cur_role_Id`),
  KEY `prev_role_Id` (`prev_role_Id`),
  KEY `memAddedBy` (`memAddedBy`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`),
  KEY `user_Id_2` (`user_Id`),
  KEY `cur_role_Id` (`cur_role_Id`),
  KEY `prev_role_Id_2` (`prev_role_Id`),
  KEY `memAddedBy_2` (`memAddedBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_perm1`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_perm1` (
  `permission1_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `createABranch` varchar(1) NOT NULL,
  `createABranchNotify` varchar(1) NOT NULL,
  `updateBranchInfo` varchar(1) NOT NULL,
  `updateBranchInfoNotify` varchar(1) NOT NULL,
  `deleteBranch` varchar(1) NOT NULL,
  `deleteBranchNotify` varchar(1) NOT NULL,
  `shiftMainBranch` varchar(1) NOT NULL,
  `shiftMainBranchNotify` varchar(1) NOT NULL,
  `createNewsFeedUnionLevel` varchar(1) NOT NULL,
  `createNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevel` varchar(1) NOT NULL,
  `approveNewsFeedUnionLevelNotify` varchar(1) NOT NULL,
  `createMovementUnionLevel` varchar(1) NOT NULL,
  `createMovementUnionLevelNotify` varchar(1) NOT NULL,
  `approveMovementUnionLevel` varchar(1) NOT NULL,
  `approveMovementUnionLevelNotify` varchar(1) NOT NULL,
  `createMovementSubDomainLevel` varchar(1) NOT NULL,
  `createMovementSubDomainLevelNotify` varchar(1) NOT NULL,
  `approveMovementSubDomainLevel` varchar(1) NOT NULL,
  `approveMovementSubDomainLevelNotify` varchar(1) NOT NULL,
  `createMovementDomainLevel` varchar(1) NOT NULL,
  `createMovementDomainLevelNotify` varchar(1) NOT NULL,
  `approveMovementDomainLevel` varchar(1) NOT NULL,
  `approveMovementDomainLevelNotify` varchar(1) NOT NULL,
  `updatePerm1` varchar(1) NOT NULL,
  `updatePerm1Notify` varchar(1) NOT NULL,
  `updatedPermOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission1_Id`),
  KEY `role_Id` (`user_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_perm2`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_perm2` (
  `permission2_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `createRole` varchar(1) NOT NULL,
  `createRoleNotify` varchar(1) NOT NULL,
  `viewRoles` varchar(1) NOT NULL,
  `viewRoleNotify` varchar(1) NOT NULL,
  `updateRole` varchar(1) NOT NULL,
  `updateRoleNotify` varchar(1) NOT NULL,
  `deleteRole` varchar(1) NOT NULL,
  `deleteRoleNotify` varchar(1) NOT NULL,
  `requestUsersToBeMembers` varchar(1) NOT NULL,
  `requestUsersToBeMembersNotify` varchar(1) NOT NULL,
  `approveUsersToBeMembers` varchar(1) NOT NULL,
  `approveUsersToBeMembersNotify` varchar(1) NOT NULL,
  `createNewsFeedBranchLevel` varchar(1) NOT NULL,
  `createNewsFeedBranchLevelNotify` varchar(1) NOT NULL,
  `approveNewsFeedBranchLevel` varchar(1) NOT NULL,
  `approveNewsFeedBranchLevelNotify` varchar(1) NOT NULL,
  `createMovementBranchLevel` varchar(1) NOT NULL,
  `createMovementBranchLevelNotify` varchar(1) NOT NULL,
  `approveMovementBranchLevel` varchar(1) NOT NULL,
  `approveMovementBranchLevelNotify` varchar(1) NOT NULL,
  `updatePerm2` varchar(1) NOT NULL,
  `updatePerm2Notify` varchar(1) NOT NULL,
  `faqAnswer` varchar(1) NOT NULL,
  `faqAnswerNotify` varchar(1) NOT NULL,
  `setCalendar` varchar(1) NOT NULL,
  `setCalendarNotify` varchar(1) NOT NULL,
  `updatedPermOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission2_Id`),
  KEY `role_Id` (`role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_req`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_req` (
  `request_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `role_Id` varchar(25) NOT NULL,
  `req_from` varchar(15) NOT NULL,
  `req_to` varchar(15) NOT NULL,
  `reqMessage` varchar(300) NOT NULL,
  `sent_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`request_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `req_from` (`req_from`),
  KEY `req_to` (`req_to`),
  KEY `branch_Id` (`branch_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`),
  KEY `union_Id_3` (`union_Id`),
  KEY `branch_Id_3` (`branch_Id`),
  KEY `role_Id` (`role_Id`),
  KEY `req_from_2` (`req_from`),
  KEY `req_to_2` (`req_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_mem_roles`
--

CREATE TABLE IF NOT EXISTS `unionprof_mem_roles` (
  `role_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `roleName` varchar(60) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_Id`),
  KEY `union_Id` (`union_Id`),
  KEY `branch_Id` (`branch_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `branch_Id_2` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_profile_geo`
--

CREATE TABLE IF NOT EXISTS `unionprof_profile_geo` (
  `union_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_sup`
--

CREATE TABLE IF NOT EXISTS `unionprof_sup` (
  `support_Id` varchar(15) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `supportOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`support_Id`),
  KEY `union_Id` (`union_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `union_Id_2` (`union_Id`),
  KEY `user_Id_2` (`user_Id`),
  KEY `branch_Id` (`branch_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unionprof_tl`
--

CREATE TABLE IF NOT EXISTS `unionprof_tl` (
  `tl_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `tlDate` date NOT NULL,
  `tlMsg` varchar(2500) NOT NULL,
  PRIMARY KEY (`tl_Id`),
  KEY `union_Id` (`union_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `move_initiate`
--
ALTER TABLE `move_initiate`
  ADD CONSTRAINT `move_initiate_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`),
  ADD CONSTRAINT `move_initiate_ibfk_2` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `move_initiate_ibfk_3` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `move_sign`
--
ALTER TABLE `move_sign`
  ADD CONSTRAINT `move_sign_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`);

--
-- Constraints for table `move_views`
--
ALTER TABLE `move_views`
  ADD CONSTRAINT `move_views_ibfk_1` FOREIGN KEY (`move_Id`) REFERENCES `move_info` (`move_Id`);

--
-- Constraints for table `unionprof_calndar`
--
ALTER TABLE `unionprof_calndar`
  ADD CONSTRAINT `unionprof_calndar_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_calndar_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `unionprof_faq`
--
ALTER TABLE `unionprof_faq`
  ADD CONSTRAINT `unionprof_faq_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_faq_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `unionprof_lang`
--
ALTER TABLE `unionprof_lang`
  ADD CONSTRAINT `unionprof_lang_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`);

--
-- Constraints for table `unionprof_mem`
--
ALTER TABLE `unionprof_mem`
  ADD CONSTRAINT `unionprof_mem_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_3` FOREIGN KEY (`cur_role_Id`) REFERENCES `unionprof_mem_roles` (`role_Id`),
  ADD CONSTRAINT `unionprof_mem_ibfk_4` FOREIGN KEY (`prev_role_Id`) REFERENCES `unionprof_mem_roles` (`role_Id`);

--
-- Constraints for table `unionprof_mem_perm1`
--
ALTER TABLE `unionprof_mem_perm1`
  ADD CONSTRAINT `unionprof_mem_perm1_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`);

--
-- Constraints for table `unionprof_mem_perm2`
--
ALTER TABLE `unionprof_mem_perm2`
  ADD CONSTRAINT `unionprof_mem_perm2_ibfk_1` FOREIGN KEY (`role_Id`) REFERENCES `unionprof_mem_roles` (`role_Id`);

--
-- Constraints for table `unionprof_mem_req`
--
ALTER TABLE `unionprof_mem_req`
  ADD CONSTRAINT `unionprof_mem_req_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`),
  ADD CONSTRAINT `unionprof_mem_req_ibfk_3` FOREIGN KEY (`role_Id`) REFERENCES `unionprof_mem_roles` (`role_Id`);

--
-- Constraints for table `unionprof_mem_roles`
--
ALTER TABLE `unionprof_mem_roles`
  ADD CONSTRAINT `unionprof_mem_roles_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_mem_roles_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

--
-- Constraints for table `unionprof_profile_geo`
--
ALTER TABLE `unionprof_profile_geo`
  ADD CONSTRAINT `unionprof_profile_geo_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`);

--
-- Constraints for table `unionprof_sup`
--
ALTER TABLE `unionprof_sup`
  ADD CONSTRAINT `unionprof_sup_ibfk_1` FOREIGN KEY (`union_Id`) REFERENCES `unionprof_account` (`union_Id`),
  ADD CONSTRAINT `unionprof_sup_ibfk_2` FOREIGN KEY (`branch_Id`) REFERENCES `unionprof_branch` (`branch_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
