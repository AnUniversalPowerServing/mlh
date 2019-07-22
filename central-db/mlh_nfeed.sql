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
-- Database: `mlh_nfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_info`
--

CREATE TABLE IF NOT EXISTS `newsfeed_info` (
  `info_Id` varchar(25) NOT NULL,
  `artTitle` varchar(250) NOT NULL,
  `artShrtDesc` varchar(1500) NOT NULL,
  `artDesc` varchar(10000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images` varchar(10000) NOT NULL,
  `mediaURL01` varchar(350) NOT NULL,
  `mediaURL02` varchar(350) NOT NULL,
  `mediaURL03` varchar(350) NOT NULL,
  `status` varchar(8) NOT NULL COMMENT 'SAVE/ACTIVE/INACTIVE',
  `writtenBy` varchar(15) NOT NULL,
  PRIMARY KEY (`info_Id`),
  KEY `writtenBy` (`writtenBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_info`
--

INSERT INTO `newsfeed_info` (`info_Id`, `artTitle`, `artShrtDesc`, `artDesc`, `createdOn`, `images`, `mediaURL01`, `mediaURL02`, `mediaURL03`, `status`, `writtenBy`) VALUES
('NFI1613311724592767271574', 'Finding%20Nemo', 'Finding%20Nemo%20is%20a%202003%20American%20computer-animated%20adventure%20film%20produced%20by%20Pixar%20Animation%20Studios%20and%20released%20by%20Walt%20Disney%20Pictures.%20Written%20and%20directed%20by%20Andrew%20Stanton%20with%20co-direction%20by%20Lee%20Unkrich,%20the%20film%20stars%20the%20voices%20of%20Albert%20Brooks,%20Ellen%20DeGeneres,%20Alexander%20Gould,%20and%20Willem%20Dafoe.', '%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EA&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Amphiprioninae%22%20title=%22Amphiprioninae%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eclownfish%3C/a%3E&nbsp;couple,%20Marlin%20and%20Coral,%20are%20admiring%20their%20new%20home%20in%20the&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Great_Barrier_Reef%22%20title=%22Great%20Barrier%20Reef%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3EGreat%20Barrier%20Reef%3C/a%3E,&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Australia%22%20title=%22Australia%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3EAustralia%3C/a%3E,%20and%20their%20clutch%20of%20hundreds%20of%20eggs,%20when%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Barracuda%22%20title=%22Barracuda%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ebarracuda%3C/a%3E&nbsp;attacks.%20Marlin%20is%20knocked%20unconscious,%20and%20wakes%20up%20to%20find%20Coral%20and%20all%20but%20one%20of%20the%20eggs%20gone.%20He%20names%20this%20last%20egg&nbsp;%3Ci%3ENemo%3C/i%3E,%20a%20name%20that%20Coral%20had%20chosen.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EOn%20the%20first%20day%20of%20school,%20the%20overprotective%20Marlin%20embarrasses%20Nemo%20during%20a%20field%20trip.%20While%20Marlin%20talks%20to%20the%20teacher,%20Mr.%20Ray,%20Nemo%20sneaks%20away%20from%20the%20reef%20toward%20a%20boat%20and%20is%20captured%20by%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Scuba_diver%22%20class=%22mw-redirect%22%20title=%22Scuba%20diver%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Escuba%20diver%3C/a%3E.%20As%20the%20boat%20departs,%20one%20of%20the%20divers%20accidentally%20knocks%20his&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Diving_mask%22%20title=%22Diving%20mask%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ediving%20mask%3C/a%3E&nbsp;overboard.%20Marlin%20chases%20after%20the%20boat%20and%20meets%20Dory,%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Paracanthurus%22%20title=%22Paracanthurus%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eblue%20tang%3C/a%3E&nbsp;who%20suffers%20from&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Short-term_memory_loss%22%20class=%22mw-redirect%22%20title=%22Short-term%20memory%20loss%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eshort-term%20memory%20loss%3C/a%3E.%20The%20two%20encounter%20Bruce,%20Anchor%20and%20Chum,%20three%20reformed%20sharks%20who%20have%20renounced%20fish-eating%20diet.%20While%20at%20their&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Twelve-step_program%22%20title=%22Twelve-step%20program%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eprogress%20meeting%3C/a%3E,%20Marlin%20discovers%20the%20diver''s%20mask%20and%20notices%20an%20address%20written%20on%20it.%20However,%20Dory%20and%20Marlin%20fight%20over%20the%20mask,%20accidentally%20giving%20Dory%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Bloody_nose%22%20class=%22mw-redirect%22%20title=%22Bloody%20nose%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ebloody%20nose%3C/a%3E.%20The%20blood%20sends%20Bruce%20into%20a%20relapsed&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Feeding_frenzy%22%20title=%22Feeding%20frenzy%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efeeding%20frenzy%3C/a%3E,%20and%20he%20attacks%20Marlin%20and%20Dory,%20who%20narrowly%20escape.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3ENemo%20is%20placed%20in%20a&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Fish_tank%22%20class=%22mw-redirect%22%20title=%22Fish%20tank%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efish%20tank%3C/a%3E&nbsp;in%20a%20dentist''s%20office,%20where%20he%20meets%20the%20%22Tank%20Gang%22,%20a%20group%20of%20pet%20fish%20led%20by%20Gill.%20The%20gang%20learn%20Nemo%20is%20to%20be%20given%20to%20the%20dentist''s%20niece%20Darla,%20who%20has%20killed%20previous%20fish%20given%20to%20her.%20Gill%20devises%20a%20plan%20to%20escape:%20jam%20the%20tank''s&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Filter_(aquarium)%22%20title=%22Filter%20(aquarium)%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Efilter%3C/a%3E&nbsp;with%20a%20pebble%20so%20the%20dentist%20will%20have%20to%20put%20the%20fish%20in%20plastic%20bags%20to%20clean%20the%20tank,%20then%20roll%20out%20the%20window%20and%20into%20the%20harbor.%20Nemo%20attempts%20to%20jam%20the%20filter%20but%20fails,%20nearly%20dying%20in%20the%20process.%3C/p%3E%3Cp%20style=%22margin-top:%200.5em;%20margin-bottom:%200.5em;%20line-height:%20inherit;%20color:%20rgb(34,%2034,%2034);%20font-family:%20sans-serif;%22%3EThe%20mask%20falls%20into%20a%20trench%20in%20the%20deep%20sea,%20where,%20while%20battling%20an&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Anglerfish%22%20title=%22Anglerfish%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Eanglerfish%3C/a%3E,%20Dory%20reads%20the%20address%20as%20%2242%20Wallaby%20Way,&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Sydney%22%20title=%22Sydney%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3ESydney%3C/a%3E%22.%20To%20her%20own%20disbelief,%20Dory%20remembers%20the%20address%20despite%20her%20short-term%20memory%20loss.%20Dory%20and%20Marlin%20receive%20directions%20to%20Sydney%20from%20a%20school%20of&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Silver_moony%22%20class=%22mw-redirect%22%20title=%22Silver%20moony%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Emoonfish%3C/a%3E.%20On%20the%20way,%20they%20encounter%20a%20bloom%20of&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/Jellyfish%22%20title=%22Jellyfish%22%20style=%22color:%20rgb(11,%200,%20128);%20background-image:%20none;%20background-position:%20initial;%20background-size:%20initial;%20background-repeat:%20initial;%20background-attachment:%20initial;%20background-origin:%20initial;%20background-clip:%20initial;%22%3Ejellyfish%3C/a%3E&nbsp;that%20traps%20and%20nearly%20stings%20them%20to%20death.%20Marlin%20loses%20consciousness%20and%20awakens%20on%20the%20back%20of%20a%20sea%20turtle%20named%20Crush,%20who%20shuttles%20Marlin%20and%20Dory%20on%20the&nbsp;%3Ca%20href=%22https://en.wikipedia.org/wiki/E', '2018-10-18 05:34:31', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_60,w_1920,h_960,z_0.1563,c_crop/v1539860530/Fish-Images-HD_un5ozr.jpg', 'https://www.youtube.com/watch?v=SPHfeNgogVs', 'https://www.youtube.com/watch?v=uOkuhD-DDR0', 'https://www.youtube.com/watch?v=izRip45Eolw', 'ACTIVE', 'USR924357814934'),
('NFI4354888859954457818416', 'TEST%20NEWS', 'TESTHJJ%20GJKJJ%20YJKKJGH%20HJKJ', '%3Cp%3EFhhujjj%20uijhgvb%20jkkhhh%20jjhgfg%20hjjjgfv%20hhjj%3C/p%3E', '2018-10-24 11:47:07', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_690,w_1080,h_540,z_0.2778,c_crop/v1540401375/Screenshot_20181023-002214_Trello_w1b2e1.jpg', '', '', '', 'ACTIVE', 'USR924357814934'),
('NFI5783345756117198991981', 'ddtt%60d', 'vvhvv', '%3Cp%3Egcggcg%20cv%3C/p%3E', '2018-10-18 11:54:49', 'https://res.cloudinary.com/dbcyhclaw/image/upload/x_0,y_60,w_1920,h_960,z_0.1563,c_crop/v1539883441/Fish-Images-HD_pnpvah.jpg', 'https://www.youtube.com/watch?v=_ozLtmC8Q_E', '', '', 'ACTIVE', 'USR924357814934');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_move`
--

CREATE TABLE IF NOT EXISTS `newsfeed_move` (
  `nf_move_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `move_Id` varchar(8) NOT NULL,
  PRIMARY KEY (`nf_move_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `move_Id` (`move_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_share_i`
--

CREATE TABLE IF NOT EXISTS `newsfeed_share_i` (
  `ishare_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `view_members` varchar(1) NOT NULL,
  `view_subscribers` varchar(1) NOT NULL,
  `biz_Id` varchar(25) NOT NULL,
  `approvedBy` varchar(15) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ishare_Id`),
  KEY `bizUnionId` (`union_Id`),
  KEY `unionBranchId` (`branch_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `approvedBy` (`approvedBy`),
  KEY `biz_Id` (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_share_i`
--

INSERT INTO `newsfeed_share_i` (`ishare_Id`, `info_Id`, `union_Id`, `branch_Id`, `view_members`, `view_subscribers`, `biz_Id`, `approvedBy`, `ts`) VALUES
('NIS3361986229222839875558', 'NFI5783345756117198991981', 'UPA147982212651', 'ALL', 'Y', 'Y', '', 'USR924357814934', '2018-11-04 10:15:06'),
('NIS5833885568348665469156', 'NFI4354888859954457818416', 'UPA147982212651', 'ALL', 'Y', 'Y', '', 'USR924357814934', '2018-10-24 11:47:09'),
('NIS9848736881174346882948', 'NFI1613311724592767271574', 'UPA147982212651', 'ALL', 'Y', 'Y', '', 'USR924357814934', '2018-11-04 10:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_share_r`
--

CREATE TABLE IF NOT EXISTS `newsfeed_share_r` (
  `rshare_Id` varchar(25) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `union_Id` varchar(15) NOT NULL,
  `branch_Id` varchar(25) NOT NULL,
  `view_members` varchar(1) NOT NULL,
  `view_subscribers` varchar(1) NOT NULL,
  `biz_Id` varchar(25) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rshare_Id`),
  KEY `bizUnionId` (`union_Id`),
  KEY `unionBranchId` (`branch_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `biz_Id` (`biz_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_fav`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_fav` (
  `nf_fav_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nf_fav_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_likes`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_likes` (
  `nf_like_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nf_like_Id`),
  KEY `info_Id` (`info_Id`,`user_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_views`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_views` (
  `view_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`view_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_user_votes`
--

CREATE TABLE IF NOT EXISTS `newsfeed_user_votes` (
  `vote_Id` varchar(15) NOT NULL,
  `info_Id` varchar(25) NOT NULL,
  `user_Id` varchar(15) NOT NULL,
  `vote` varchar(4) NOT NULL COMMENT 'UP/DOWN',
  `atTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_Id`),
  KEY `info_Id` (`info_Id`),
  KEY `user_Id` (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `newsfeed_move`
--
ALTER TABLE `newsfeed_move`
  ADD CONSTRAINT `newsfeed_move_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_share_i`
--
ALTER TABLE `newsfeed_share_i`
  ADD CONSTRAINT `newsfeed_share_i_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_share_r`
--
ALTER TABLE `newsfeed_share_r`
  ADD CONSTRAINT `newsfeed_share_r_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_fav`
--
ALTER TABLE `newsfeed_user_fav`
  ADD CONSTRAINT `newsfeed_user_fav_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_likes`
--
ALTER TABLE `newsfeed_user_likes`
  ADD CONSTRAINT `newsfeed_user_likes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_views`
--
ALTER TABLE `newsfeed_user_views`
  ADD CONSTRAINT `newsfeed_user_views_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

--
-- Constraints for table `newsfeed_user_votes`
--
ALTER TABLE `newsfeed_user_votes`
  ADD CONSTRAINT `newsfeed_user_votes_ibfk_1` FOREIGN KEY (`info_Id`) REFERENCES `newsfeed_info` (`info_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
