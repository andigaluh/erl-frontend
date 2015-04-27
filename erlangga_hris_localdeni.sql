-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 05:28 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erlangga_hris`
--

-- --------------------------------------------------------

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `active_inactive`
--

INSERT INTO `active_inactive` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Active', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Inactive', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Active by Term', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alasan_cuti`
--

CREATE TABLE IF NOT EXISTS `alasan_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alasan_cuti`
--

INSERT INTO `alasan_cuti` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Melahirkan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Sakit', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `award_warning_type`
--

CREATE TABLE IF NOT EXISTS `award_warning_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `certification_type`
--

CREATE TABLE IF NOT EXISTS `certification_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `certification_type`
--

INSERT INTO `certification_type` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'HPL', '2015-01-19 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Jakarta', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Bandung', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Surabaya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Medan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comp_session`
--

CREATE TABLE IF NOT EXISTS `comp_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `payroll_type_id` tinyint(2) NOT NULL DEFAULT '1',
  `is_absence` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comp_session`
--

INSERT INTO `comp_session` (`id`, `title`, `year`, `description`, `payroll_type_id`, `is_absence`, `is_active`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Session 2015', 2015, 'Company Session 2015', 1, 0, 1, '2015-02-11 00:00:00', 1, '2015-02-12 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course_status`
--

INSERT INTO `course_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Registration', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Confirmation', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Completed', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Passed', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Waiting List', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Cancelled', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Drop Out', '2015-01-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dollar_rate`
--

CREATE TABLE IF NOT EXISTS `dollar_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_session_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(254) NOT NULL,
  `rupiah` decimal(16,0) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dollar_rate`
--

INSERT INTO `dollar_rate` (`id`, `comp_session_id`, `title`, `rupiah`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 'dollar rate 2015', '12500', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `education_center`
--

CREATE TABLE IF NOT EXISTS `education_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `education_degree`
--

CREATE TABLE IF NOT EXISTS `education_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `education_group`
--

CREATE TABLE IF NOT EXISTS `education_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employee_status`
--

INSERT INTO `employee_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Work Center', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Employed', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Terminated', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Honorarium', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `empl_status`
--

INSERT INTO `empl_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Probation', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Permanent', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Contract', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Part Time', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Expat Contranct', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Sick', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'UPLeave', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Ahli', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'Daily Contract', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 'Daily Permanent', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'Job Training', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exp_field`
--

CREATE TABLE IF NOT EXISTS `exp_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exp_level`
--

CREATE TABLE IF NOT EXISTS `exp_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exp_level`
--

INSERT INTO `exp_level` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'test', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exp_year`
--

CREATE TABLE IF NOT EXISTS `exp_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'G01', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'G02', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

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
-- Table structure for table `ikatan_dinas_type`
--

CREATE TABLE IF NOT EXISTS `ikatan_dinas_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_absen`
--

CREATE TABLE IF NOT EXISTS `keterangan_absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` smallint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keterangan_absen`
--

INSERT INTO `keterangan_absen` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Sakit', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(2, 'telat', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE IF NOT EXISTS `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `url` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `url`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'active inactive', 'active_inactive', '2015-02-20 05:23:01', 1, '2015-02-20 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'organization class', 'organization_class', '2015-02-20 05:41:12', 1, '2015-02-20 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'award warning type', 'award_warning_type', '2015-02-20 05:42:27', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'certification type', 'certification_type', '2015-02-20 05:42:41', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'course status', 'course_status', '2015-02-20 05:42:53', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'dollar rate', 'dollar_rate', '2015-02-20 05:43:05', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'education center', 'education_center', '2015-02-20 05:43:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'education degree', 'education_degree', '2015-02-20 05:43:28', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'education group', 'education_group', '2015-02-20 05:43:38', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 'employee status', 'employee_status', '2015-02-20 05:43:48', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'empl status', 'empl_status', '2015-02-20 05:44:06', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 'exp field', 'exp_field', '2015-02-20 05:44:16', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 'experience level', 'exp_level', '2015-02-20 05:44:31', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 'experience year', 'exp_year', '2015-02-20 05:44:55', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(15, 'grade', 'grade', '2015-02-20 05:45:03', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 'groups', 'groups', '2015-02-20 05:45:11', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 'ikatan dinas type', 'ikatan_dinas_type', '2015-02-20 05:45:24', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 'library', 'library', '2015-02-20 05:45:32', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 'marital', 'marital', '2015-02-20 05:45:39', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 'payroll by position', 'payroll_by_position', '2015-02-20 05:45:58', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(21, 'payroll setup', 'payroll_setup', '2015-02-20 05:46:07', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(22, 'payroll type', 'payroll_type', '2015-02-20 05:46:17', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(23, 'position group', 'position_group', '2015-02-20 05:46:28', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(24, 'resign reason', 'resign_reason', '2015-02-20 05:46:39', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

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
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Single', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Married', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Divorced', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Widowhood', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_session_id` int(11) NOT NULL DEFAULT '1',
  `parent_organization_id` int(3) NOT NULL DEFAULT '0',
  `organization_class_id` int(3) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `comp_session_id`, `parent_organization_id`, `organization_class_id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 0, 1, 'Komunigrafik', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 1, 1, 2, 'Administration & Finance', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 1, 1, 2, 'Technology', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 1, 1, 2, 'Design & Multimedia', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 1, 1, 2, 'Marketing', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 1, 3, 3, 'Administration', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 1, 3, 3, 'Finance', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 1, 4, 3, 'Program', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 1, 5, 3, 'Design', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 1, 5, 3, 'Multimedia', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 1, 6, 3, 'Marketing', '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 1, 10, 4, 'Design Section', '2015-02-12 04:46:02', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 1, 13, 5, 'Design Unit', '2015-02-12 04:46:51', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organization_class`
--

CREATE TABLE IF NOT EXISTS `organization_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `order_no` tinyint(3) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `organization_class`
--

INSERT INTO `organization_class` (`id`, `title`, `order_no`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Company', 1, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Departement', 2, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Division', 3, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(4, 'Section', 4, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '2015-02-09 00:00:00', 1),
(5, 'Unit', 5, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 1, '2015-02-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_by_position`
--

CREATE TABLE IF NOT EXISTS `payroll_by_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `amount` decimal(16,0) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_setup`
--

CREATE TABLE IF NOT EXISTS `payroll_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_session_id` int(11) NOT NULL DEFAULT '1',
  `payroll_type_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(254) NOT NULL,
  `variable_name` varchar(254) NOT NULL,
  `amout` decimal(16,0) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payroll_setup`
--

INSERT INTO `payroll_setup` (`id`, `comp_session_id`, `payroll_type_id`, `title`, `variable_name`, `amout`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 1, 'Tunjangan Masa Kerja', 'tmk', '42500', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 1, 1, 'Jumlah Jam Kerja', 'jjk', '173', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 1, 1, 'Max hari kerja sebulan', 'mhk', '25', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 1, 1, 'Pembagi potongan BPJS', 'bpjs', '1000', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 1, 1, 'Variable tunjangan kehadiran', 'tjk', '150000', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 1, 1, 'variable pengurangan kehadiran', 'pkh', '6000', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 1, 1, 'variable min alpha', 'mal', '1', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 1, 1, 'variable min telat', 'mtl', '3', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 1, 1, 'Tunjangan Transport', 'ttp', '5000', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_type`
--

CREATE TABLE IF NOT EXISTS `payroll_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `basic_salary_table` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payroll_type`
--

INSERT INTO `payroll_type` (`id`, `title`, `basic_salary_table`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'by position', 'position', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'by position group', 'position_group', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'by individu', 'users_employement', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `abbr` varchar(254) NOT NULL,
  `position_group_id` int(3) NOT NULL,
  `parent_position_id` int(3) NOT NULL DEFAULT '0',
  `organization_id` int(3) NOT NULL,
  `description` text NOT NULL,
  `basic_salary` decimal(16,0) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `title`, `abbr`, `position_group_id`, `parent_position_id`, `organization_id`, `description`, `basic_salary`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Director', 'Dir', 1, 0, 1, '', '4000000', '2015-01-14 00:00:00', 1, '2015-02-09 08:33:11', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Departement Head of Administration & Finance', 'Dept. Head Adm Fin', 2, 1, 3, '', '3000000', '2015-01-14 00:00:00', 1, '2015-02-09 08:34:07', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Departement Head of Technology', 'Dept. Head Tech', 2, 1, 4, '', '3000000', '2015-02-09 08:34:42', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Departement Head of Design & Multimedia', 'Dept. Head DM', 2, 1, 5, '', '3000000', '2015-02-09 08:35:25', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Departement Head of Marketing', 'Dept. Head Mkt', 2, 1, 6, '', '3000000', '2015-02-09 08:36:04', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Division Head of Administration', 'Div. Head Adm', 3, 2, 7, '', '2000000', '2015-02-09 08:37:18', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Administration Officer', 'Adm Off', 5, 6, 7, '', '1000000', '2015-02-09 08:38:09', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Finance Officer', 'Fin Off', 5, 6, 8, '', '1000000', '2015-02-09 08:38:49', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'Division Head of Technology', 'Div. Head Tech', 3, 3, 4, '', '2000000', '2015-02-09 08:39:26', 1, '2015-02-09 08:40:46', 1, 0, '0000-00-00 00:00:00', 0),
(10, 'Programmer Officer', 'Prog. Off', 5, 9, 9, '', '1000000', '2015-02-09 08:41:13', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'Division Head Of Design', 'Div. Head Des', 3, 4, 10, '', '2000000', '2015-02-09 08:44:02', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 'Design Officer', 'Des. Off', 5, 11, 10, '', '1000000', '2015-02-09 08:45:50', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 'Division Head of Multimedia', 'Div. Head Mul', 3, 4, 11, '', '2000000', '2015-02-09 08:46:20', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 'Multimedia Officer', 'Mul. Off', 5, 13, 11, '', '1000000', '2015-02-09 08:47:19', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(15, 'Division Head of Marketing', 'Div. Head Mkt', 3, 5, 12, '', '2000000', '2015-02-09 08:47:46', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 'Marketing Officer', 'Mkt. Off', 5, 15, 12, '', '1000000', '2015-02-09 08:48:11', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position_group`
--

CREATE TABLE IF NOT EXISTS `position_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `abbr` varchar(254) NOT NULL,
  `level_order` int(3) NOT NULL,
  `level` set('Director','Management','Non Management') NOT NULL,
  `parent_position_group_id` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `basic_salary` decimal(16,0) NOT NULL DEFAULT '0',
  `gradeval_bottom` int(11) NOT NULL,
  `gradeval_top` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `position_group`
--

INSERT INTO `position_group` (`id`, `title`, `abbr`, `level_order`, `level`, `parent_position_group_id`, `description`, `basic_salary`, `gradeval_bottom`, `gradeval_top`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Director', 'Dir', 10, 'Director', 0, '', '0', 0, 0, '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Departement Head', 'Dept. Head', 20, 'Management', 1, '', '0', 0, 0, '2015-01-14 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Division Head', 'Div. Head', 30, 'Management', 2, '', '0', 0, 0, '2015-02-06 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(5, 'Officer', 'Off', 40, 'Non Management', 3, '', '0', 0, 0, '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'test', 'test', 70, '', 5, 'test', '0', 0, 0, '2015-02-12 08:07:32', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-12 08:07:51', 1);

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resign_reason`
--

INSERT INTO `resign_reason` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Pensiun', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'PHK', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Mundur', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_setup`
--

CREATE TABLE IF NOT EXISTS `table_setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `default_val` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `table_setup`
--

INSERT INTO `table_setup` (`id`, `title`, `default_val`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'organization_class_limit', 10, '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Pesawat', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Mobil Kantor', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

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
  `marital_id` tinyint(2) NOT NULL DEFAULT '0',
  `photo` varchar(254) NOT NULL,
  `mobile_phone` varchar(40) NOT NULL,
  `previous_email` varchar(254) NOT NULL,
  `bb_pin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `nik`, `bod`, `marital_id`, `photo`, `mobile_phone`, `previous_email`, `bb_pin`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1430100467, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '1980-01-01 00:00:00', 1, '', '', '', ''),
(8, '::1', 'andigaluh', '$2y$08$y7.a5emJ8BkLRssQz6t7XuMRreIUuGndkV25IjBvRv1ADoeZyxBaW', NULL, 'andi@komunigrafik.com', NULL, NULL, NULL, NULL, 1418971675, 1419235251, 1, 'andi galuh', 'sutrisno', '0', '08561951175', '50402116', '1983-10-13 00:00:00', 2, 'ktp.jpg', '0', 'erortea@yahoo.com', '7777777'),
(9, '::1', 'bakhtiarzein', '$2y$08$Sd5cYmKbAzgLv0nuGU/ATu6MT4mUF/u6kCFg4AAOt9QnmJBCuxJiG', NULL, 'bakhtiar@komunigrafik.com', NULL, NULL, NULL, NULL, 1423536591, 1423536591, 1, 'Bakhtiar', 'Zein', NULL, '', '50402115', '2015-02-10 00:00:00', 2, '', '', '', ''),
(10, '::1', 'muhammadirwansyah', '$2y$08$FyeX7OF8H.e/fWOWQoZke.guZh2OKHRufELZGGfAaUjacIeTzQide', NULL, 'irwansyah@komunigrafik.com', NULL, NULL, NULL, NULL, 1423557658, 1423557658, 1, 'Muhammad', 'irwansyah', NULL, '', '50402117', '2015-02-10 00:00:00', 2, '', '', '', ''),
(11, '::1', 'muhammaddahri', '$2y$08$AMbfDzib15EsTNRjov.hrODi/te5a3C6pds9njOK9FOwO76bNgEYy', NULL, 'dahri@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621479, 1423621479, 1, 'Muhammad', 'Dahri', NULL, '', '50402118', '2015-02-11 00:00:00', 1, '', '', '', ''),
(12, '::1', 'randikhadewantoro', '$2y$08$FBKdiWqO3wnFe.MN4T5R2.23s4Ke3NQvD9SAzl5dXQz0OpDeqYKyG', NULL, 'randikha@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621535, 1423621535, 1, 'randikha', 'Dewantoro', NULL, '', '50402119', '2015-02-11 00:00:00', 2, '', '', '', ''),
(13, '::1', 'fahmiachmad', '$2y$08$Il3HSsq/fJG/PdXTkYbqje15tk4j7ctv3yWwaq0/OIUvpmL7orJtG', NULL, 'fahmi@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621563, 1423621563, 1, 'Fahmi', 'Achmad', NULL, '', '50402120', '2015-02-11 00:00:00', 2, '', '', '', ''),
(14, '::1', 'denisaputra', '$2y$08$HNsoYutW44Wi7Vli51PUquFCVccvo12KLSomm9JEZanNgJevqUsha', NULL, 'deni@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621584, 1425954757, 1, 'Deni', 'Saputra', NULL, '', '50402121', '2015-02-11 00:00:00', 2, '', '', '', ''),
(15, '::1', 'agussusilo', '$2y$08$Jhx9cHkuVgCPoa.Sl//9je4HfcUGPnp6eWl2oY7NwNoR1wxorysYG', NULL, 'agus@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621603, 1423621603, 1, 'Agus', 'Susilo', NULL, '', '50402122', '2015-02-11 00:00:00', 1, '', '', '', ''),
(16, '::1', 'rizarifansyah', '$2y$08$ZboX5tfH/3kybmfG22ock.ZiOh8s6Zna.nPQDMz2hf7A1duTTiI3S', NULL, 'riza@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621635, 1423621635, 1, 'Riza', 'Rifansyah', NULL, '', '50402123', '2015-02-11 00:00:00', 2, '', '', '', ''),
(17, '::1', 'fauzanrabbani', '$2y$08$4fj6/qSM9/Os72IbeKIzJ.Gv.Orv2E0JRx7TMgLQc3jRvlMrPjIDm', NULL, 'jhanojan@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621678, 1423621678, 1, 'Fauzan', 'Rabbani', NULL, '', '50402124', '2015-02-11 00:00:00', 1, '', '', '', ''),
(18, '::1', 'abdulghanni', '$2y$08$7jvQ/ANQQTX00H6UYgXxHewWv0Lvv7Ao2QuPx7L8B/bxddsLap.bK', NULL, 'abdul@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621705, 1423621705, 1, 'Abdul', 'Ghanni', NULL, '', '50402125', '2015-02-11 00:00:00', 1, '', '', '', ''),
(19, '::1', 'rizkydwi', '$2y$08$B4XpKU.2fOBCb6wN5Ue1MeFr9okYL792pkff9gDX/vcUTQ.Jia2zO', NULL, 'rizky@komunigrafik.com', NULL, NULL, NULL, NULL, 1423621748, 1423621748, 1, 'Rizky', 'Dwi', NULL, '', '50402126', '2015-02-11 00:00:00', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_awardwarning`
--

CREATE TABLE IF NOT EXISTS `users_awardwarning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `award_warning_type_id` int(2) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `app_date` datetime NOT NULL,
  `sk_number` varchar(254) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_awardwarning`
--

INSERT INTO `users_awardwarning` (`id`, `user_id`, `award_warning_type_id`, `title`, `description`, `app_date`, `sk_number`, `start_date`, `end_date`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 0, 'test1_edit', 'test1', '2015-02-04 00:00:00', 'test1', '2015-02-05 00:00:00', '2015-02-05 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-04 00:00:00', 1),
(2, 8, 0, 'test1', 'test1', '2015-02-04 00:00:00', 'test1', '2015-02-05 00:00:00', '2015-02-06 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 8, 0, 'test2', 'test2', '2015-02-04 00:00:00', 'test2', '2015-02-05 00:00:00', '2015-02-06 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_certificate`
--

CREATE TABLE IF NOT EXISTS `users_certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(16) NOT NULL,
  `certification_type_id` int(3) NOT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users_certificate`
--

INSERT INTO `users_certificate` (`id`, `user_id`, `certification_type_id`, `description`, `start_date`, `end_date`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(2, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(3, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(4, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(5, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(6, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(7, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(8, 8, 1, '', '2015-01-29 00:00:00', '2015-01-31 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(9, 8, 1, '', '2015-01-04 00:00:00', '2015-01-05 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(10, 8, 1, '', '2015-01-04 00:00:00', '2015-01-09 00:00:00', '2015-01-30 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-30 00:00:00', 1),
(11, 8, 1, '', '2015-02-02 00:00:00', '2015-02-06 00:00:00', '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 8, 1, '', '2015-02-09 00:00:00', '2015-02-13 00:00:00', '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-02 00:00:00', 1),
(13, 8, 1, '', '2015-02-15 00:00:00', '2015-02-20 00:00:00', '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 8, 1, '', '2015-02-02 00:00:00', '2015-02-11 00:00:00', '2015-02-02 00:00:00', 1, '2015-02-02 00:00:00', 1, 1, '2015-02-02 00:00:00', 1);

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
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users_course`
--

INSERT INTO `users_course` (`id`, `user_id`, `title`, `registration_date`, `course_status_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'tes1', '2015-01-27 00:00:00', 2, '2015-01-27 00:00:00', 1, '2015-01-27 00:00:00', 1, 1, '2015-01-27 00:00:00', 1),
(2, 8, 'tes2', '2011-03-23 00:00:00', 2, '2015-01-27 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-27 00:00:00', 1),
(3, 8, 'tes1', '2014-12-31 00:00:00', 2, '2015-01-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-28 00:00:00', 1),
(4, 8, 'tes', '2015-01-21 00:00:00', 6, '2015-01-28 00:00:00', 1, '2015-01-28 00:00:00', 1, 1, '2015-01-28 00:00:00', 1),
(5, 8, 'tes2', '2015-01-27 00:00:00', 2, '2015-01-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-28 00:00:00', 1),
(6, 8, 'tes3', '2015-01-18 00:00:00', 1, '2015-01-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-28 00:00:00', 1),
(7, 8, 'tes4', '2015-01-04 00:00:00', 7, '2015-01-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-28 00:00:00', 1),
(8, 8, 'tes5', '2015-01-05 00:00:00', 4, '2015-01-28 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-01-28 00:00:00', 1),
(9, 8, 'test1_edit_edit', '2014-10-07 00:00:00', 2, '2015-01-28 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(10, 8, 'test2_edit_edit_edit', '2015-01-29 00:00:00', 4, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(11, 8, 'test3_edit', '2015-01-29 00:00:00', 7, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(12, 8, 'test4_edit', '2015-01-06 00:00:00', 5, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(13, 8, 'test5_edit', '2015-01-06 00:00:00', 6, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(14, 8, 'test6_edit', '2015-01-05 00:00:00', 1, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(15, 8, 'test7_edit_edit', '2015-01-20 00:00:00', 3, '2015-01-29 00:00:00', 1, '2015-01-29 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(16, 8, 'test8', '2015-02-02 00:00:00', 7, '2015-02-02 00:00:00', 1, '2015-02-02 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 8, 'test9', '2015-02-10 00:00:00', 1, '2015-02-02 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 8, 'test10', '2015-02-25 00:00:00', 1, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 8, 'test11', '2015-02-03 00:00:00', 2, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 8, 'test12', '2015-02-24 00:00:00', 5, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_cuti`
--

CREATE TABLE IF NOT EXISTS `users_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_comp_session` int(11) NOT NULL,
  `date_mulai_cuti` date NOT NULL,
  `date_selesai_cuti` date NOT NULL,
  `jumlah_hari` tinyint(4) NOT NULL,
  `alasan_cuti_id` int(11) NOT NULL,
  `user_pengganti` int(11) NOT NULL COMMENT 'user_id kary pengganti',
  `alamat_cuti` text NOT NULL,
  `is_app_lv1` tinyint(1) NOT NULL DEFAULT '0',
  `user_app_lv1` int(11) NOT NULL COMMENT 'user_id supervisor',
  `date_app_lv1` date NOT NULL,
  `note_app_lv1` text NOT NULL,
  `is_app_lv2` tinyint(1) NOT NULL DEFAULT '0',
  `user_app_lv2` int(11) NOT NULL COMMENT 'user_id approval level2',
  `date_app_lv2` date NOT NULL,
  `note_app_lv2` text NOT NULL,
  `is_app_lv3` tinyint(1) NOT NULL DEFAULT '0',
  `user_app_lv3` int(11) NOT NULL,
  `date_app_lv3` date NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_users_sti` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users_cuti`
--

INSERT INTO `users_cuti` (`id`, `user_id`, `id_comp_session`, `date_mulai_cuti`, `date_selesai_cuti`, `jumlah_hari`, `alasan_cuti_id`, `user_pengganti`, `alamat_cuti`, `is_app_lv1`, `user_app_lv1`, `date_app_lv1`, `note_app_lv1`, `is_app_lv2`, `user_app_lv2`, `date_app_lv2`, `note_app_lv2`, `is_app_lv3`, `user_app_lv3`, `date_app_lv3`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 1, '2015-03-01', '2015-03-10', 9, 1, 9, 'Jalan Kapuk 45B', 0, 0, '2015-03-12', '', 0, 0, '2015-03-12', '', 0, 0, '2015-03-12', '2015-03-05 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 0, 0, '2015-03-04', '2015-03-07', 3, 1, 9, 'tessss', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-05 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 1, 0, '2015-03-01', '2015-03-03', 2, 2, 9, 'tadawdaw', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-05 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 1, 1, '2015-03-01', '2015-03-02', 1, 1, 9, 'awdaw', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 1, 1, '2015-03-07', '2015-03-11', 4, 1, 9, 'adawdaw', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 1, 1, '2015-03-08', '2015-03-10', 2, 1, 9, 'dfdxf', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 1, 1, '2015-03-08', '2015-03-10', 2, 1, 9, 'dfdxf', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 1, 1, '2015-03-08', '2015-03-13', 5, 1, 9, 'esrer', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 1, 1, '2015-03-02', '2015-03-11', 0, 2, 1, '22', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 1, 1, '2015-03-06', '2015-03-18', 0, 1, 9, 'awdadawd', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 1, 1, '2015-03-02', '2015-03-12', 0, 1, 1, 'eesrser', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 1, 1, '2015-03-06', '2015-03-10', 0, 1, 9, 'adawdawd', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 1, 1, '2015-03-06', '2015-03-17', 11, 1, 9, 'adawdawd', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 1, 1, '2015-03-09', '2015-03-10', 1, 1, 9, 'adawdawd', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '2015-03-08 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_cuti_plafon`
--

CREATE TABLE IF NOT EXISTS `users_cuti_plafon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_comp_session` int(11) NOT NULL,
  `hak_cuti` int(4) NOT NULL,
  `hak_cuti_sebelumnya` int(4) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_users_sti` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_education`
--

CREATE TABLE IF NOT EXISTS `users_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `education_degree_id` int(2) NOT NULL,
  `education_group_id` int(2) NOT NULL,
  `education_center_id` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_education`
--

INSERT INTO `users_education` (`id`, `user_id`, `title`, `description`, `start_date`, `end_date`, `education_degree_id`, `education_group_id`, `education_center_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'sd', 'sd 02 pagi', '1996-01-01 00:00:00', '2009-01-31 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 8, 'smp', 'smp 5', '2002-01-31 00:00:00', '2006-01-31 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 8, 'sma', 'sma', '2015-02-02 00:00:00', '2015-02-20 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 8, 'S1_edit', 'universitas', '2014-11-03 00:00:00', '2015-02-02 00:00:00', 0, 0, 0, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

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
  `basic_salary` decimal(16,0) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_employement`
--

INSERT INTO `users_employement` (`id`, `user_id`, `seniority_date`, `position_id`, `organization_id`, `empl_status_id`, `employee_status_id`, `cost_center`, `position_group_id`, `grade_id`, `resign_reason_id`, `active_inactive_id`, `basic_salary`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, '1995-01-01 00:00:00', 2, 3, 2, 2, '-', 2, 1, 1, 1, '0', '2015-02-06 00:00:00', 1, '2015-02-10 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(5, 9, '2008-01-01 00:00:00', 1, 1, 2, 2, 'C01', 1, 1, 3, 1, '0', '0000-00-00 00:00:00', 0, '2015-02-12 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(6, 10, '2008-01-01 00:00:00', 3, 4, 2, 1, '-', 2, 1, 1, 1, '0', '0000-00-00 00:00:00', 0, '2015-02-10 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(7, 11, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 12, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 13, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 14, '1970-01-01 00:00:00', 6, 7, 1, 1, '-', 3, 1, 1, 1, '0', '0000-00-00 00:00:00', 0, '2015-03-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(11, 15, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 16, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 17, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 18, '1970-01-01 00:00:00', 7, 7, 1, 1, '-', 5, 1, 1, 1, '0', '0000-00-00 00:00:00', 0, '2015-03-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(15, 19, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 1, '2015-03-01 00:00:00', 3, 1, 1, 1, '', 1, 1, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_experience`
--

CREATE TABLE IF NOT EXISTS `users_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(254) NOT NULL,
  `position` varchar(254) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` datetime NOT NULL,
  `address` text NOT NULL,
  `line_business` varchar(254) NOT NULL,
  `resign_reason_id` int(2) NOT NULL,
  `last_salary` decimal(10,0) NOT NULL,
  `exp_level_id` int(2) NOT NULL,
  `exp_year_id` int(2) NOT NULL,
  `exp_field_id` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_experience`
--

INSERT INTO `users_experience` (`id`, `user_id`, `company`, `position`, `start_date`, `end_date`, `address`, `line_business`, `resign_reason_id`, `last_salary`, `exp_level_id`, `exp_year_id`, `exp_field_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'comp1_edit', 'comp', '2014-12-07', '2015-02-04 00:00:00', 'depok', 'IT', 1, '1000000', 0, 0, 0, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(54, 1, 1),
(55, 1, 2),
(58, 8, 1),
(59, 8, 2),
(77, 9, 1),
(78, 9, 2),
(79, 10, 1),
(80, 10, 2),
(66, 11, 1),
(67, 11, 2),
(81, 12, 1),
(82, 12, 2),
(83, 13, 2),
(84, 14, 2),
(72, 15, 2),
(85, 16, 2),
(74, 17, 2),
(75, 18, 2),
(76, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_ikatan_dinas`
--

CREATE TABLE IF NOT EXISTS `users_ikatan_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ikatan_dinas_type` int(2) NOT NULL,
  `title` varchar(254) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_ikatan_dinas`
--

INSERT INTO `users_ikatan_dinas` (`id`, `user_id`, `ikatan_dinas_type`, `title`, `start_date`, `end_date`, `amount`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 0, 'test1_edit', '2015-02-04 00:00:00', '2015-02-05 00:00:00', '1500000', '2015-02-04 00:00:00', 1, '2015-02-04 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 8, 0, 'test2', '2015-02-04 00:00:00', '2015-02-05 00:00:00', '2000000', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_jabatan`
--

CREATE TABLE IF NOT EXISTS `users_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `organization_id` int(2) NOT NULL,
  `position_id` int(11) NOT NULL,
  `employee_group_id` int(2) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `branch_id` int(2) NOT NULL,
  `personnel_action_id` int(3) NOT NULL,
  `sk_date` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_jabatan`
--

INSERT INTO `users_jabatan` (`id`, `user_id`, `organization_id`, `position_id`, `employee_group_id`, `grade_id`, `start_date`, `end_date`, `branch_id`, `personnel_action_id`, `sk_date`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 2, 2, 2, 2, '2015-02-08 00:00:00', '2015-02-04 00:00:00', 0, 0, '2015-02-04 00:00:00', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 8, 1, 1, 1, 1, '2015-02-24 00:00:00', '2015-02-02 00:00:00', 0, 0, '2015-02-02 00:00:00', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_keterangan_absen`
--

CREATE TABLE IF NOT EXISTS `users_keterangan_absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_comp_session` int(11) NOT NULL,
  `date_tidak_hadir` date NOT NULL,
  `keterangan_id` int(11) NOT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `is_app_lv1` tinyint(1) NOT NULL,
  `user_app_lv1` int(11) NOT NULL,
  `date_app_lv1` date NOT NULL,
  `is_app_lv2` tinyint(1) NOT NULL,
  `user_app_lv2` int(11) NOT NULL,
  `date_app_lv2` date NOT NULL,
  `is_app_lv3` tinyint(1) NOT NULL,
  `user_app_lv3` int(11) NOT NULL,
  `date_app_lv3` date NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_keterangan_absen`
--

INSERT INTO `users_keterangan_absen` (`id`, `user_id`, `id_comp_session`, `date_tidak_hadir`, `keterangan_id`, `alasan`, `is_app_lv1`, `user_app_lv1`, `date_app_lv1`, `is_app_lv2`, `user_app_lv2`, `date_app_lv2`, `is_app_lv3`, `user_app_lv3`, `date_app_lv3`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 27, 1, '2015-04-07', 0, 'aaa', 2, 30, '2015-04-08', 1, 30, '2015-04-08', 0, 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(2, 27, 1, '2015-04-07', 0, 'aaa', 1, 27, '2015-04-14', 1, 28, '2015-04-08', 0, 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(3, 1, 1, '2015-04-07', 0, 'au', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 1, '0000-00-00', 0, 0, '0000-00-00', 0),
(4, 1, 1, '2015-04-07', 1, 'aaa', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 1, '0000-00-00', 0, 0, '0000-00-00', 0),
(5, 29, 1, '0000-00-00', 1, 'lol', 1, 30, '2015-04-08', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 29, '0000-00-00', 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_sk`
--

CREATE TABLE IF NOT EXISTS `users_sk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sk_date` datetime NOT NULL,
  `sk_no` varchar(254) NOT NULL,
  `position_id` int(2) NOT NULL,
  `departement_id` int(2) NOT NULL,
  `effective_date` datetime NOT NULL,
  `location` varchar(254) NOT NULL,
  `sign_name` varchar(254) NOT NULL,
  `sign_position` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_sk`
--

INSERT INTO `users_sk` (`id`, `user_id`, `sk_date`, `sk_no`, `position_id`, `departement_id`, `effective_date`, `location`, `sign_name`, `sign_position`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-10 00:00:00', '1', '1', '1', '2015-02-03 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-03 00:00:00', 1),
(2, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-11 00:00:00', '1', 'edit', 'IT officer', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 1, '2015-02-03 00:00:00', 1),
(3, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-11 00:00:00', '1', '1', '1', '2015-02-03 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 8, '2015-02-10 00:00:00', '2_edit', 1, 0, '2015-02-12 00:00:00', '2', '2', '2', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_spd_dalam`
--

CREATE TABLE IF NOT EXISTS `users_spd_dalam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id yang ditugaskan ',
  `destination` varchar(254) NOT NULL,
  `date_spd` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_submit` tinyint(1) NOT NULL DEFAULT '0',
  `date_submit` date NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'user_id yang memberi tugas',
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_spd_dalam`
--

INSERT INTO `users_spd_dalam` (`id`, `title`, `user_id`, `destination`, `date_spd`, `start_time`, `end_time`, `is_submit`, `date_submit`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Rapat Design', 1, 'PT. Antah Berantah', '2015-03-09', '19:45:00', '21:30:00', 1, '2015-04-05', '2015-03-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Test Dummy 2', 1, 'Jalan Keadilan Depok', '2015-03-11', '00:00:00', '00:00:00', 1, '2015-03-11', '2015-03-10 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Meeting', 0, 'PT. Test', '2015-04-14', '00:00:00', '00:00:00', 0, '0000-00-00', '2015-04-05 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Testing', 9, 'PT. Telkom', '2015-04-08', '00:00:00', '00:00:00', 0, '0000-00-00', '2015-04-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Testing', 9, 'PT. Dua Kelinci', '2015-04-07', '00:00:00', '00:00:00', 0, '0000-00-00', '2015-04-06 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_spd_dalam_report`
--

CREATE TABLE IF NOT EXISTS `users_spd_dalam_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_spd_dalam_id` int(11) NOT NULL,
  `attachment` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `result` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_spd_luar`
--

CREATE TABLE IF NOT EXISTS `users_spd_luar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id yang ditugaskan ',
  `destination` varchar(254) NOT NULL,
  `date_spd` date NOT NULL,
  `from_city_id` int(11) NOT NULL,
  `to_city_id` int(11) NOT NULL,
  `transportation_id` int(11) NOT NULL,
  `is_submit` tinyint(1) NOT NULL DEFAULT '0',
  `date_submit` date NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'user_id yang memberi tugas',
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_spd_luar`
--

INSERT INTO `users_spd_luar` (`id`, `title`, `user_id`, `destination`, `date_spd`, `from_city_id`, `to_city_id`, `transportation_id`, `is_submit`, `date_submit`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Testing Apps', 1, 'PT. Dua Kelinci', '2015-04-02', 3, 1, 2, 1, '2015-04-13', '2015-04-06 00:00:00', 1, '2015-04-13 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Testing', 9, '0', '2015-04-14', 4, 2, 2, 0, '0000-00-00', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Testing App', 9, 'PT Telkom', '2015-04-15', 3, 1, 2, 0, '0000-00-00', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'awdawdaw', 9, 'wdawd', '2015-04-15', 1, 1, 2, 0, '0000-00-00', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'adawda', 9, 'dawda', '2015-04-16', 1, 4, 1, 0, '0000-00-00', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_spd_luar_report`
--

CREATE TABLE IF NOT EXISTS `users_spd_luar_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_spd_luar_id` int(11) NOT NULL,
  `attachment` varchar(254) NOT NULL,
  `description` text NOT NULL,
  `result` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_sti`
--

CREATE TABLE IF NOT EXISTS `users_sti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `identity_no` varchar(254) NOT NULL,
  `ijazah_name` varchar(254) NOT NULL,
  `ijazah_number` varchar(254) NOT NULL,
  `ijazah_history` varchar(254) NOT NULL,
  `institution` varchar(254) NOT NULL,
  `published_place` varchar(254) NOT NULL,
  `activation_date` datetime NOT NULL,
  `position_id` int(2) NOT NULL,
  `receivedby_id` int(11) NOT NULL,
  `acknowledgeby_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_sti`
--

INSERT INTO `users_sti` (`id`, `user_id`, `identity_no`, `ijazah_name`, `ijazah_number`, `ijazah_history`, `institution`, `published_place`, `activation_date`, `position_id`, `receivedby_id`, `acknowledgeby_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'sdf', 'sdf', '1', '1', '1', '1', '2015-02-04 00:00:00', 2, 8, 8, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 1, '2015-02-03 00:00:00', 1),
(2, 8, 'test', 'test', '2', '2', '2', '2', '2015-02-24 00:00:00', 2, 8, 8, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 8, '3 edit', '3 edit', '3', '3', '3', '3', '2015-02-17 00:00:00', 1, 8, 1, '2015-02-03 00:00:00', 1, '2015-02-04 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

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
