-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2013 at 06:50 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yiiapps_startup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password_strategy` varchar(255) NOT NULL,
  `requires_new_password` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_attempts` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(32) NOT NULL,
  `validation_key` varchar(255) NOT NULL,
  `create_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_id` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `salt`, `password_strategy`, `requires_new_password`, `email`, `login_attempts`, `login_time`, `login_ip`, `validation_key`, `create_id`, `create_time`, `update_id`, `update_time`) VALUES
(1, 'shaan', '$2a$14$mY5Bj5ocw6.ArEiaEYZn7OMbcYfUjLWnqNfEUm.j6C8K4WLXO6q9K', '$2a$14$mY5Bj5ocw6.ArEiaEYZn7Q', 'bcrypt', 0, '', 4, 0, '', '3bbda15b66e2e639cfbaf897aa6c94b2', 0, 0, 0, 0),
(2, 'admin', '$2a$14$cGr9hBLMGpaMXcO/neBRF.xpWAAkZKf6e11S8FMLfnJuUkWNU6hze', '$2a$14$cGr9hBLMGpaMXcO/neBRFA', 'bcrypt', 0, 'admin@tolodo.com', 5, 0, '', '54dee74f5adab67f85e4fa0e5a870cf9', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

DROP TABLE IF EXISTS `lookup`;
CREATE TABLE IF NOT EXISTS `lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', '1', 'PostStatus', 1),
(2, 'Published', '2', 'PostStatus', 2),
(3, 'Archived', '3', 'PostStatus', 3),
(4, 'Pending Approval', '1', 'CommentStatus', 1),
(5, 'Approved', '2', 'CommentStatus', 2),
(6, 'Yes', '1', 'yesNo', 1),
(7, 'No', '0', 'yesNo', 2),
(11, 'Male', '1', 'gender', 1),
(12, 'Female', '2', 'gender', 2),
(13, 'Free', '1', 'UserType', 1),
(14, 'Super Administrator', '1', 'AdminUser', 1),
(15, 'Administrator', '2', 'AdminUser', 2),
(16, 'Private', '1', 'Visibility', 1),
(17, 'Public', '2', 'Visibility', 2),
(18, 'Plus', '2', 'UserType', 2),
(19, 'Premium', '3', 'UserType', 3),
(20, 'Private', '1', 'Visibility', 1),
(21, 'Public', '2', 'Visibility', 2),
(30, 'Send', '2', 'MsgStatus', 2),
(31, 'Resend', '3', 'MsgStatus', 3),
(32, 'Chinese', 'ch', 'lang', 1),
(33, 'Japanese', 'jp', 'lang', 2),
(34, 'English', 'en', 'lang', 3),
(35, 'E-Commerce', '1', 'webcat', 1),
(36, 'Business/Corporate', '2', 'webcat', 2),
(37, 'Web / Interactive', '3', 'webcat', 3),
(38, 'Design Agencies', '4', 'webcat', 4),
(39, 'Sports', '5', 'webcat', 5),
(40, 'Promotional', '5', 'webcat', 5),
(41, 'Art / Illustration', '6', 'webcat', 6),
(42, 'Fashion', '7', 'webcat', 7),
(43, 'Film / Movies / TV', '8', 'webcat', 8),
(44, 'Blogging', '9', 'webcat', 9),
(45, 'Games / Entertainment', '10', 'webcat', 10),
(46, 'Mobile / APPS', '11', 'webcat', 11),
(47, 'Music / Sound', '12', 'webcat', 12),
(48, 'Photography', '13', 'webcat', 13),
(49, 'Architecture', '14', 'webcat', 14),
(50, 'Associations / Institutions', '15', 'webcat', 15),
(51, 'Others', '16', 'webcat', 16),
(52, 'Hotel / Restaurant', '17', 'webcat', 17),
(53, 'Food / Drink', '18', 'webcat', 18),
(54, 'Events', '19', 'webcat', 19),
(55, 'Technology', '20', 'webcat', 20),
(56, 'Culture / Education / Science', '21', 'webcat', 21),
(57, 'Tutorial', '22', 'cate', 22),
(58, 'Open Source', '23', 'cate', 23),
(59, 'Yii Blogs', '24', 'cate', 24),
(60, 'Yii Books', '25', 'cate', 25),
(61, 'Yii Themes', '26', 'cate', 26),
(62, 'How To', '27', 'cate', 27),
(63, 'Freelance', '1', 'jobtype', 1),
(64, 'Full Time', '2', 'jobtype', 2),
(65, 'testlookup', '244', '1', 244);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL DEFAULT '1',
  `first_name` varchar(256) DEFAULT NULL,
  `last_name` varchar(256) DEFAULT NULL,
  `user_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `paypal_email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `gender` varchar(256) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `state` varchar(256) DEFAULT NULL,
  `zip` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `github` varchar(100) DEFAULT NULL,
  `yii_profile` varchar(200) NOT NULL,
  `bio` text,
  `skills` varchar(300) NOT NULL,
  `is_subscribed` enum('0','1') NOT NULL DEFAULT '1',
  `is_freelance` enum('1','0') NOT NULL DEFAULT '0',
  `is_blocked` enum('0','1') NOT NULL DEFAULT '0',
  `is_confirmed` enum('0','1') NOT NULL DEFAULT '0',
  `active_key` varchar(256) NOT NULL,
  `salt` varchar(256) NOT NULL,
  `password_strategy` varchar(255) NOT NULL,
  `requires_new_password` tinyint(1) NOT NULL,
  `login_attempts` int(11) NOT NULL,
  `login_ip` varchar(32) NOT NULL,
  `update_time` datetime NOT NULL,
  `last_login` varchar(256) DEFAULT NULL,
  `views` int(11) DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`user_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `first_name`, `last_name`, `user_name`, `email`, `paypal_email`, `password`, `image`, `gender`, `birth_date`, `address`, `city`, `country`, `state`, `zip`, `phone`, `mobile`, `facebook`, `twitter`, `website`, `github`, `yii_profile`, `bio`, `skills`, `is_subscribed`, `is_freelance`, `is_blocked`, `is_confirmed`, `active_key`, `salt`, `password_strategy`, `requires_new_password`, `login_attempts`, `login_ip`, `update_time`, `last_login`, `views`, `timestamp`) VALUES
(29, 1, 'Hello', 'Hello', 'hello', 'Hello@gmail.com', '', '$2a$14$f7cIbDOyZdxksMJws92/PO/OEiGXQsSeJn8DlfMi8w.3tRibsMk3m', '12111213527160886741-yii-developer.jpg', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'CActiveDataProvider implements a data provider based on ActiveRecord.\r\n\r\nCActiveDataProvider provides data in terms of ActiveRecord objects which are of class modelClass. It uses the AR CActiveRecord::findAll method to retrieve the data from database. The criteria property can be used to specify various query options. ', '', '1', '0', '0', '0', '31d87b36dfbd20f3ac96617743b7d0f8', '$2a$14$f7cIbDOyZdxksMJws92/PQ', 'bcrypt', 0, 0, '', '2012-11-16 06:41:00', '2012-11-16 06:41:08', 206, '2013-02-09 16:42:08'),
(31, 1, 'shaan', 'khan', 'shaan', 'shaan222@uexel.com', '', '$2a$14$R9UV3QlJocld0eoGJStpt.0LzjvmPU.Q/STEQJWI4VsipXd03EyO2', '251112135384138229270-yii-developer.png', '1', '0000-00-00', '', 'Islamabad', 'Pakistan', '', '', '', '343535', '', '', '', '', '', 'Opportunities magazine and website carrying Local Authority and Public Sector job vacancies including benefits, revenues, fraud, collections, democratic and ...Opportunities magazine and website carrying Local Authority and Public Sector job vacancies including benefits, revenues, fraud, collections, democratic and ...', 'yii, developers, freelancer, ceo', '1', '0', '0', '0', '19331564b608ec63205bf04c2f664ca1', '$2a$14$R9UV3QlJocld0eoGJStptA', 'bcrypt', 0, 0, '', '2012-11-25 11:06:00', '2012-11-25 11:01:53', 11, '2013-02-04 09:01:38'),
(32, 1, 'shaan', 'khan', 'shaan22', 'shaan@uexel.com', NULL, '$2a$14$GIQUhDpsXgCXfCfGGpD2IuBQg8f0v5JMgB6YRpOZuVB9BrQvJ5XlC', 'no_yii_user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '1', '0', '0', '0', '', '$2a$14$GIQUhDpsXgCXfCfGGpD2Iw', 'bcrypt', 0, 0, '', '2012-11-14 09:55:00', NULL, 16, '2012-11-14 10:08:57'),
(33, 1, 'shaan', 'khan', 'shaan33', 'shaan22@uexel.com', NULL, '$2a$14$L1X.yHqHiONcNA4LDurLv.G2DS10LZ7vujcFg11aQnXv2d2a.KoRq', 'no_yii_user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '1', '0', '0', '0', '', '$2a$14$L1X.yHqHiONcNA4LDurLvA', 'bcrypt', 0, 0, '', '0000-00-00 00:00:00', NULL, 3, '2013-02-09 16:42:17'),
(34, 1, 'shaan', 'khan', 'shaan2222222', 'shaan2s22@uexel.com', NULL, '$2a$14$7MTJsDh/Lv34CQ53kQboEeYeBuzQfFcOVeiYgZH5orlc1J78gqOrO', 'no_yii_user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '1', '0', '0', '0', '', '$2a$14$7MTJsDh/Lv34CQ53kQboEg', 'bcrypt', 0, 0, '', '0000-00-00 00:00:00', NULL, 9, '2013-02-09 12:14:53'),
(35, 1, 'shaan', 'khan', 'shaanee', 'shaan23e22@uexel.com', NULL, '$2a$14$SGwWNQNR4i0/L2mXJdQo0uI8dZCpwdAx0DmULnLw3fHVOWy5wxKE2', 'no_yii_user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '1', '0', '0', '0', '', '$2a$14$SGwWNQNR4i0/L2mXJdQo0w', 'bcrypt', 0, 0, '', '0000-00-00 00:00:00', NULL, 1, '2012-11-16 03:53:00'),
(36, 1, 'shaan', 'khan', 'shaan33ee', 'shaane22@uexel.com', NULL, '$2a$14$FH51XP4se7tVPKiNBXQQs.crud1tG0nR0Y8nRj5dPyCmSD6FpR/dS', 'no_yii_user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '1', '0', '0', '0', '', '$2a$14$FH51XP4se7tVPKiNBXQQsA', 'bcrypt', 0, 0, '', '0000-00-00 00:00:00', NULL, 1, '2012-11-16 05:13:00'),
(37, 1, 'shaan', 'khan', 'shaan360', 'shaan444@uexel.com', 'shaan@uexel.com', '$2a$14$qpJ/slFCYcNAXNWcn62Up.88XuFwmSu2VDPHqhyBoEGL21WGo8dm2', '090213136040117328420-yii-developer.jpg', '1', '0000-00-00', 'Flate # 7 Block #26 C G11/3 Isamabad,Pakistan', 'Islamabad', 'Pakistan', 'ICT', '44000', '345353535', '34535353535', 'shaanmkhan', 'shaanmkhan', 'http://uexel.com', 'shaan360', 'RETE', '“It’s never too early to start beefing up your obituary.” — The Most Interesting Man in the World', 'yii, mysql, bootsrap, ci, css3', '1', '0', '0', '0', '64c15c5f9aef4b49256edfa6da0a7482', '$2a$14$qpJ/slFCYcNAXNWcn62UpA', 'bcrypt', 0, 0, '', '2013-02-09 13:42:00', '2013-02-09 13:42:18', 39, '2013-02-09 16:40:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
