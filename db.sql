-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2015 at 06:40 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erlangga_hris`
--
CREATE DATABASE IF NOT EXISTS `erlangga_hris` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `erlangga_hris`;

-- --------------------------------------------------------

--
-- Table structure for table `course_status`
--

CREATE TABLE IF NOT EXISTS `course_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course_status`
--

INSERT INTO `course_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Registration', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'Confirmation', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(3, 'Completed', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(4, 'Passed', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(5, 'Waiting List', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(6, 'Cancelled', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(7, 'Drop Out', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_course`
--

CREATE TABLE IF NOT EXISTS `users_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(16) NOT NULL,
  `title` varchar(254) NOT NULL,
  `registration_date` datetime NOT NULL,
  `course_status_id` int(3) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `active_inactive`
--

CREATE TABLE IF NOT EXISTS `active_inactive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `active_inactive`
--

INSERT INTO `active_inactive` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Active', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'Inactive', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(3, 'Active by Term', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_status`
--

CREATE TABLE IF NOT EXISTS `employee_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee_status`
--

INSERT INTO `employee_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Work Center', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'Employed', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(3, 'Terminated', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(4, 'Honorarium', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `empl_status`
--

CREATE TABLE IF NOT EXISTS `empl_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `empl_status`
--

INSERT INTO `empl_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Probation', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'Permanent', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(3, 'Contract', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(4, 'Part Time', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(5, 'Expat Contranct', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(6, 'Sick', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(7, 'UPLeave', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(8, 'Ahli', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(9, 'Daily Contract', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(10, 'Daily Permanent', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(11, 'Job Training', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'G01', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'G02', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'member', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE IF NOT EXISTS `marital` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`id`, `title`, `is_deleted`) VALUES
(1, 'Single', 0),
(2, 'Married', 0),
(3, 'Divorced', 0),
(4, 'Widowhood', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'HRD', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'Kredit Analis', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'ka. cabang pusat', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'ka. cabang bandung', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `position_group`
--

CREATE TABLE IF NOT EXISTS `position_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `position_group`
--

INSERT INTO `position_group` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'staff', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'kacab', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resign_reason`
--

CREATE TABLE IF NOT EXISTS `resign_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resign_reason`
--

INSERT INTO `resign_reason` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(1, 'Pensiun', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'PHK', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0),
(3, 'Mundur', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `nik` varchar(15) NOT NULL,
  `bod` datetime NOT NULL,
  `business_unit_id` int(3) NOT NULL DEFAULT '1',
  `marital_id` tinyint(2) NOT NULL DEFAULT '0',
  `photo` varchar(254) NOT NULL,
  `mobile_phone` varchar(40) NOT NULL,
  `previous_email` varchar(254) NOT NULL,
  `bb_pin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `nik`, `bod`, `business_unit_id`, `marital_id`, `photo`, `mobile_phone`, `previous_email`, `bb_pin`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1421209836, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '0000-00-00 00:00:00', 0, 0, '', '', '', ''),
(8, '::1', 'andigaluh', '$2y$08$y7.a5emJ8BkLRssQz6t7XuMRreIUuGndkV25IjBvRv1ADoeZyxBaW', NULL, 'andi@komunigrafik.com', NULL, NULL, NULL, NULL, 1418971675, 1419235251, 1, 'andi galuh', 'sutrisno', '0', '0', '50402116', '1983-10-13 00:00:00', 1, 2, 'ktp.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_employement`
--

CREATE TABLE IF NOT EXISTS `users_employement` (
  `id` bigint(16) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `seniority_date` datetime NOT NULL,
  `position_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `empl_status_id` int(11) NOT NULL,
  `employee_status_id` int(11) NOT NULL,
  `cost_center` varchar(254) NOT NULL,
  `position_group_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `resign_reason_id` int(11) NOT NULL,
  `active_inactive_id` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(46, 8, 1),
(47, 8, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
