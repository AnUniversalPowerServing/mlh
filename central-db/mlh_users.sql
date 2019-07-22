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
-- Database: `mlh_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `subs_dom_info`
--

CREATE TABLE IF NOT EXISTS `subs_dom_info` (
  `domain_Id` varchar(15) NOT NULL,
  `domainName` varchar(100) NOT NULL,
  PRIMARY KEY (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_dom_info`
--

INSERT INTO `subs_dom_info` (`domain_Id`, `domainName`) VALUES
('01-TPI', 'Transportation'),
('02-EDU', 'Education'),
('03-MDA', 'Media'),
('04-STP', 'Startups'),
('05-REL', 'Religion'),
('06-FIN', 'Banking and Finance'),
('07-AGR', 'Agriculture'),
('08-ENT', 'Entertainment'),
('09-ITS', 'IT and Software'),
('CDE', 'CDE');

-- --------------------------------------------------------

--
-- Table structure for table `subs_subdom_info`
--

CREATE TABLE IF NOT EXISTS `subs_subdom_info` (
  `subdomain_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomainName` varchar(100) NOT NULL,
  PRIMARY KEY (`subdomain_Id`),
  KEY `domain_Id` (`domain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_subdom_info`
--

INSERT INTO `subs_subdom_info` (`subdomain_Id`, `domain_Id`, `subdomainName`) VALUES
('EDU-01-STUDTCHR', '02-EDU', 'Students / Teachers'),
('ENT-01-CIN', '08-ENT', 'Big Screen Cinema'),
('FIN-01-BNK', '06-FIN', 'Banking'),
('FIN-02-INS', '06-FIN', 'Insurance'),
('ITS-01-SN', '09-ITS', 'Social Network'),
('MDA-01-PRES', '03-MDA', 'Journalists'),
('REL-01-HIN', '05-REL', 'Hinduism'),
('REL-02-ISL', '05-REL', 'Islamic'),
('REL-03-CHR', '05-REL', 'Christianity'),
('STP-01-BAC', '04-STP', 'Building and Construction'),
('STP-02-RE', '04-STP', 'Real Estate'),
('STP-03-BPO', '04-STP', 'BPO'),
('STP-04-EDU', '04-STP', 'Education'),
('STP-05-EAU', '04-STP', 'Energy and Utilities'),
('STP-06-FIN', '04-STP', 'Finance'),
('STP-07-FAB', '04-STP', 'Food and Beverages'),
('STP-08-HC', '04-STP', 'Health Care'),
('STP-09-IG', '04-STP', 'Industrial Goods'),
('STP-10-MAP', '04-STP', 'Media and Publishing'),
('STP-11-RS', '04-STP', 'Retail Shops'),
('STP-12-TCH', '04-STP', 'Technology'),
('STP-13-TAA', '04-STP', 'Textiles and Apparel'),
('STP-14-TAL', '04-STP', 'Transportation and Logistics'),
('STP-15-TRL', '04-STP', 'Travel and Leisure'),
('TPI-01-A', '01-TPI', 'Auto'),
('TPI-02-B', '01-TPI', 'Bus'),
('TPI-03-C', '01-TPI', 'Cabs');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `user_Id` varchar(15) NOT NULL,
  `username` varchar(35) NOT NULL,
  `surName` varchar(35) NOT NULL,
  `name` varchar(35) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `about_me` varchar(2000) NOT NULL,
  `minlocation` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isAdmin` varchar(1) NOT NULL,
  `user_tz` varchar(35) NOT NULL,
  `acc_active` varchar(1) NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_Id`, `username`, `surName`, `name`, `dob`, `gender`, `profile_pic`, `about_me`, `minlocation`, `location`, `state`, `country`, `created_On`, `isAdmin`, `user_tz`, `acc_active`) VALUES
('USR113561617186', 'Achuth', 'Achuytham', 'Achuytham', '2018-06-06', 'MALE', ' http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Parvathipuram', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:20:42', 'N', 'Asia/Kolkata', 'Y'),
('USR128879133554', 'Santosh', 'Santhu', 'Santo', '2018-04-07', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/5.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-10-20 13:24:19', 'N', 'Asia/Kolkata', 'Y'),
('USR255798352927', 'Saiteja', 'Srirambhatla', 'Saiteja', '1996-08-16', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:24:13', 'N', 'Asia/Kolkata', 'Y'),
('USR273782437846', 'geetha', 'Nellutla', 'Geetha Rani ', '2018-03-19', 'FEMALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/12.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:24:03', 'N', 'Asia/Kolkata', 'Y'),
('USR461726196865', 'anupwefe', 'Nelwefl', 'eeffwee', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Bijapur City', 'Bijapur', 'Karnataka', 'India', '2018-10-20 13:23:55', 'N', 'Asia/Kolkata', 'Y'),
('USR473525687856', 'Raju', 'Rajendra', 'Raju', '2009-10-14', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_293,y_133,w_694,h_694,z_0.1296,c_crop/v1526192946/IMG-20171019-WA0054_vexsaw.jpg', '', 'Malakpet', 'Hyderabad', 'Telangana', 'India', '2018-05-13 06:29:07', 'N', 'Asia/Kolkata', 'Y'),
('USR553425241674', 'anup123', 'Nellutlalnrao', 'Laxmi Narasimha', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Devar Hippargi', 'Bijapur', 'Karnataka', 'India', '2018-10-20 13:22:53', 'N', 'Asia/Kolkata', 'Y'),
('USR571322289932', 'svsdv', 'vdv', 'e', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', '', '', '', '', '2018-10-20 13:22:47', 'N', 'Asia/Kolkata', 'Y'),
('USR626729797799', 'asifkhan', 'Shareef', 'Asif Khan', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:22:40', 'N', 'Asia/Kolkata', 'Y'),
('USR647727944827', 'kishoreNellutla', 'Nellutla', 'Kishore', '1991-12-03', 'MALE', 'http://localhost/mlh/android-web/1/images/avatar/1.jpg', '', 'Thungathurthi', 'Nalgonda', 'Telangana', 'India', '2018-11-06 04:03:31', 'N', 'Asia/Kolkata', 'Y'),
('USR715494757975', 'asdwww', 'aasc', 'acedqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/2.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:22:30', 'N', 'Asia/Kolkata', 'Y'),
('USR735875819411', 'anupchakravarthi', 'abcde', 'scc', '1991-10-10', 'MALE', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_13,y_13,w_230,h_230,z_0.3906,c_crop/v1529333612/sim-icon_fv64zu.png', '', 'Barwala', 'Hissar', 'Haryana', 'India', '2018-06-18 14:53:29', 'N', 'Asia/Kolkata', 'Y'),
('USR751143828474', 'anup12345f3rjf', 'ahchjdc', 'DXX ENX', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/1.jpg', '', 'Raichur Rural', 'Raichur', 'Karnataka', 'India', '2018-10-20 13:23:38', 'N', 'Asia/Kolkata', 'Y'),
('USR755171938565', 'qwert123', 'asdf123', 'adxdfcdg', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/1/images/avatar/5.jpg', '', 'Anantnag Region', 'Anantnag', 'Jammu And Kashmir', 'India', '2018-10-20 13:23:46', 'N', 'Asia/Kolkata', 'Y'),
('USR787548352593', 'anupchakri', 'Nellutla', 'R', '1991-10-10', 'MALE', 'http://localhost/mlh/android-web/1/images/avatar/3.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:23:31', 'N', 'Asia/Kolkata', 'Y'),
('USR856754698562', 'venugopal', 'Nellutla', 'Venugopal Rao', '1956-01-10', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'Sangareddy', 'Medak', 'Telangana', 'India', '2018-10-20 13:22:09', 'N', 'Asia/Kolkata', 'Y'),
('USR862369784264', 'Sai teja', 'Tej Sai Teja ', 'Sai Teja ', '2000-11-30', 'MALE', 'http://192.168.1.4/mlh/android-web/1/images/avatar/6.jpg', '', 'Wanaparthy', 'Mahbubnagar', 'Telangana', 'India', '2018-10-20 13:22:01', 'N', 'Asia/Kolkata', 'Y'),
('USR876657119297', 'k.adithya', 'Kankipati', 'adithya kankipati', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/6.jpg', '', 'L. B. Nagar', 'Ranga Reddy District', 'Telangana', 'India', '2018-10-20 13:21:34', 'N', 'Asia/Kolkata', 'Y'),
('USR916113175364', 'sde', 'wdqed', 'dqw', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/7.jpg', '', '', '', '', '', '2018-10-20 13:21:18', 'N', 'Asia/Kolkata', 'Y'),
('USR924357814934', 'anups', 'Nellutla', 'Anup Chakravarthi', '2015-11-12', 'MALE', 'http://localhost/mlh/android-web/1/images/avatar/3.jpg', '', 'Kuttanad', 'Mavelikara', 'Kerala', 'India', '2018-11-20 00:29:49', 'Y', 'Asia/Kolkata', 'Y'),
('USR947899367838', 'ascadcad', 'acdc', 'dqwdde', '0000-00-00', '', ' http://192.168.1.4/mlh/android-web/1/images/avatar/8.jpg', '', 'Araku Valley', 'Araku', 'Andhra Pradesh', 'India', '2018-10-20 13:21:40', 'N', 'Asia/Kolkata', 'Y'),
('USR984371315633', 'nellutlalnrao', 'NellutlaLNRao', 'AnupChakravarthi', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/3.jpg', '', 'Malappuram Region', 'Malappuram', 'Kerala', 'India', '2018-10-20 13:21:48', 'N', 'Asia/Kolkata', 'Y'),
('USR985685916147', 'ascasc', 'asc', 'cscc', '0000-00-00', '', 'http://192.168.1.4/mlh/android-web/1/images/avatar/2.jpg', '', 'Nandurbar', 'Nandurbar', 'Maharashtra', 'India', '2018-10-20 13:23:02', 'N', 'Asia/Kolkata', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE IF NOT EXISTS `user_contacts` (
  `contact_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `mcountrycode` varchar(6) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `mob_val` varchar(1) NOT NULL,
  PRIMARY KEY (`contact_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`contact_Id`, `user_Id`, `mcountrycode`, `mobile`, `mob_val`) VALUES
('111', 'USR113561617186', '+91', '999228', 'Y'),
('112', 'USR924357814934', '+91', '9999888228', 'Y'),
('1230', 'USR273782437846', '+91', '9959633209', 'Y'),
('1231', 'USR461726196865', '+91', '9948390094', 'Y'),
('1232', 'USR715494757975', '+91', '9177221984', 'Y'),
('1233', 'USR924357814934', '+91', '9160869337', 'Y'),
('1234', 'USR273782437846', '+91', '9291532292', 'Y'),
('6464', 'USR876657119297', '+91', '5345678191', 'Y'),
('USRC178962198129', 'USR647727944827', '+91', '9998884444', 'Y'),
('USRC672299184377', 'USR787548352593', '+91', '6300193369', 'Y'),
('USRC933712817918', 'USR856754698562', '+91', '6300195027', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnds`
--

CREATE TABLE IF NOT EXISTS `user_frnds` (
  `rel_Id` varchar(25) NOT NULL,
  `rel_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rel_tz` varchar(35) NOT NULL,
  `frnd1` varchar(15) NOT NULL COMMENT 'Request Sent',
  `frnd2` varchar(15) NOT NULL COMMENT 'Request Accepted',
  `frnd1_call_frnd2` varchar(35) NOT NULL,
  `frnd2_call_frnd1` varchar(35) NOT NULL,
  `notify` varchar(1) NOT NULL,
  PRIMARY KEY (`rel_Id`),
  KEY `frnd1` (`frnd1`,`frnd2`),
  KEY `frnd2` (`frnd2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_frnds`
--

INSERT INTO `user_frnds` (`rel_Id`, `rel_from`, `rel_tz`, `frnd1`, `frnd2`, `frnd1_call_frnd2`, `frnd2_call_frnd1`, `notify`) VALUES
('FREL187387334177284141946', '2018-06-01 17:39:27', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL216621668146357997868', '2018-06-01 18:16:28', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL323942158692231274458', '2018-06-02 18:04:18', 'Asia/Kolkata', 'USR461726196865', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL355323199734657944622', '2018-06-01 18:16:06', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL373546946265162946937', '2018-06-01 17:43:46', 'Asia/Kolkata', 'USR626729797799', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL398295761324325863596', '2018-06-01 18:15:11', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL418662147654876157835', '2018-06-01 17:40:47', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL443354954136494138944', '2018-06-01 17:39:44', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL465592416562739371251', '2018-06-01 17:37:07', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL473477679165452365849', '2018-06-01 18:16:20', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL492875446517343162711', '2018-09-23 11:16:52', 'Asia/Kolkata', 'USR473525687856', 'USR924357814934', 'My LocalHook Friend', 'My LocalHook Friend', 'Y'),
('FREL582849374534951452184', '2018-06-01 17:39:39', 'Asia/Kolkata', 'USR715494757975', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL583581511597759711768', '2018-06-01 17:47:41', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', ''),
('FREL742155929929149896838', '2018-06-01 18:16:24', 'Asia/Kolkata', 'USR128879133554', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnds_req`
--

CREATE TABLE IF NOT EXISTS `user_frnds_req` (
  `req_Id` varchar(25) NOT NULL,
  `from_userId` varchar(15) NOT NULL,
  `to_userId` varchar(15) NOT NULL,
  `usr_frm_call_to` varchar(35) NOT NULL,
  `usr_to_call_frm` varchar(35) NOT NULL,
  `req_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `req_tz` varchar(35) NOT NULL,
  `reqMessage` varchar(300) NOT NULL,
  `notify` varchar(1) NOT NULL,
  `watched` varchar(1) NOT NULL,
  PRIMARY KEY (`req_Id`),
  KEY `from_userId` (`from_userId`,`to_userId`),
  KEY `to_userId_2` (`to_userId`),
  KEY `to_userId` (`to_userId`),
  KEY `from_userId_2` (`from_userId`),
  KEY `to_userId_3` (`to_userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_frnds_req`
--

INSERT INTO `user_frnds_req` (`req_Id`, `from_userId`, `to_userId`, `usr_frm_call_to`, `usr_to_call_frm`, `req_on`, `req_tz`, `reqMessage`, `notify`, `watched`) VALUES
('UFRI337498785432', 'USR924357814934', 'USR128879133554', 'My LocalHook Friend', 'My LocalHook Friend', '2018-11-04 18:49:20', 'Asia/Kolkata', '', 'N', 'N'),
('UFRI497266512227', 'USR924357814934', 'USR113561617186', 'My LocalHook Friend', 'My LocalHook Friend', '2018-11-04 18:48:48', 'Asia/Kolkata', '', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_geo`
--

CREATE TABLE IF NOT EXISTS `user_profile_geo` (
  `user_Id` varchar(15) NOT NULL,
  `cur_lat` varchar(15) NOT NULL,
  `cur_long` varchar(15) NOT NULL,
  `geoUpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_geo`
--

INSERT INTO `user_profile_geo` (`user_Id`, `cur_lat`, `cur_long`, `geoUpdatedOn`) VALUES
('USR113561617186', '17.2975976', '78.560131', '2018-10-07 13:40:33'),
('USR273782437846', '0.0', '0.0', '2018-10-03 16:58:52'),
('USR571322289932', '0.0', '0.0', '2018-09-03 13:37:48'),
('USR924357814934', '17.3356668', '78.5248306', '2018-10-16 12:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE IF NOT EXISTS `user_subscriptions` (
  `sub_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `domain_Id` varchar(15) NOT NULL,
  `subdomain_Id` varchar(15) NOT NULL,
  `sub_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_Id`),
  KEY `domain_Id` (`domain_Id`),
  KEY `subdomain_Id` (`subdomain_Id`),
  KEY `user_Id` (`user_Id`),
  KEY `user_Id_2` (`user_Id`),
  KEY `domain_Id_2` (`domain_Id`),
  KEY `subdomain_Id_2` (`subdomain_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`sub_Id`, `user_Id`, `domain_Id`, `subdomain_Id`, `sub_on`) VALUES
('SUBUSR2557983529279139000', 'USR255798352927', '01-TPI', 'TPI-01-A', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139001', 'USR255798352927', '01-TPI', 'TPI-02-B', '2018-08-14 17:40:20'),
('SUBUSR2557983529279139002', 'USR255798352927', '01-TPI', 'TPI-03-C', '2018-08-14 17:40:20'),
('SUBUSR9243578149342360000', 'USR924357814934', '01-TPI', 'TPI-01-A', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360001', 'USR924357814934', '01-TPI', 'TPI-02-B', '2018-06-20 18:01:15'),
('SUBUSR9243578149342360002', 'USR924357814934', '01-TPI', 'TPI-03-C', '2018-06-20 18:01:15'),
('USRS133447759295221595635', 'USR924357814934', '02-EDU', 'EDU-01-STUDTCHR', '2018-11-18 18:17:16'),
('USRS196865959727525842894', 'USR787548352593', '06-FIN', 'FIN-02-INS', '2018-10-17 09:03:49'),
('USRS255633876612282166569', 'USR787548352593', '01-TPI', 'TPI-03-C', '2018-10-17 09:03:44'),
('USRS366521864538115839689', 'USR787548352593', '01-TPI', 'TPI-01-A', '2018-10-17 09:03:42'),
('USRS417871715125788473876', 'USR924357814934', '06-FIN', 'FIN-02-INS', '2018-10-07 12:25:13'),
('USRS714682439945971828618', 'USR647727944827', '01-TPI', 'TPI-03-C', '2018-11-06 04:03:48'),
('USRS752779423773583635438', 'USR647727944827', '06-FIN', 'FIN-01-BNK', '2018-11-06 04:03:50'),
('USRS815434953441644461919', 'USR924357814934', '06-FIN', 'FIN-01-BNK', '2018-10-07 12:25:11'),
('USRS876698654963529742344', 'USR647727944827', '01-TPI', 'TPI-02-B', '2018-11-06 04:03:44'),
('USRS884236288546386675941', 'USR647727944827', '01-TPI', 'TPI-01-A', '2018-11-06 04:03:46'),
('USRS925959232963692582675', 'USR787548352593', '01-TPI', 'TPI-02-B', '2018-10-17 09:03:40'),
('USRS998575357219462246172', 'USR787548352593', '06-FIN', 'FIN-01-BNK', '2018-10-17 09:03:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subs_subdom_info`
--
ALTER TABLE `subs_subdom_info`
  ADD CONSTRAINT `subs_subdom_info_ibfk_1` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`);

--
-- Constraints for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `user_contacts_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_accounts` (`user_Id`);

--
-- Constraints for table `user_frnds`
--
ALTER TABLE `user_frnds`
  ADD CONSTRAINT `user_frnds_ibfk_1` FOREIGN KEY (`frnd1`) REFERENCES `user_accounts` (`user_Id`),
  ADD CONSTRAINT `user_frnds_ibfk_2` FOREIGN KEY (`frnd2`) REFERENCES `user_accounts` (`user_Id`);

--
-- Constraints for table `user_frnds_req`
--
ALTER TABLE `user_frnds_req`
  ADD CONSTRAINT `user_frnds_req_ibfk_1` FOREIGN KEY (`from_userId`) REFERENCES `user_accounts` (`user_Id`),
  ADD CONSTRAINT `user_frnds_req_ibfk_2` FOREIGN KEY (`to_userId`) REFERENCES `user_accounts` (`user_Id`);

--
-- Constraints for table `user_profile_geo`
--
ALTER TABLE `user_profile_geo`
  ADD CONSTRAINT `user_profile_geo_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_accounts` (`user_Id`);

--
-- Constraints for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `user_subscriptions_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user_accounts` (`user_Id`),
  ADD CONSTRAINT `user_subscriptions_ibfk_2` FOREIGN KEY (`domain_Id`) REFERENCES `subs_dom_info` (`domain_Id`),
  ADD CONSTRAINT `user_subscriptions_ibfk_3` FOREIGN KEY (`subdomain_Id`) REFERENCES `subs_subdom_info` (`subdomain_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
