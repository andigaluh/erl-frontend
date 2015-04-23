-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2015 pada 14.41
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

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
-- Struktur dari tabel `active_inactive`
--

CREATE TABLE IF NOT EXISTS `active_inactive` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `active_inactive`
--

INSERT INTO `active_inactive` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Active', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Inactive', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Active by Term', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alasan_cuti`
--

CREATE TABLE IF NOT EXISTS `alasan_cuti` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alasan_cuti`
--

INSERT INTO `alasan_cuti` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'sakit', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `award_warning_type`
--

CREATE TABLE IF NOT EXISTS `award_warning_type` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `certification_type`
--

CREATE TABLE IF NOT EXISTS `certification_type` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `certification_type`
--

INSERT INTO `certification_type` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'HPL', '2015-01-19 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Jakarta', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Bandung', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Surabaya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Medan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comp_session`
--

CREATE TABLE IF NOT EXISTS `comp_session` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comp_session`
--

INSERT INTO `comp_session` (`id`, `title`, `year`, `description`, `payroll_type_id`, `is_absence`, `is_active`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Session 2015', 2015, 'Company Session 2015', 1, 0, 1, '2015-02-11 00:00:00', 1, '2015-02-12 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_status`
--

CREATE TABLE IF NOT EXISTS `course_status` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course_status`
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
-- Struktur dari tabel `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dollar_rate`
--

CREATE TABLE IF NOT EXISTS `dollar_rate` (
`id` int(11) NOT NULL,
  `comp_session_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(254) NOT NULL,
  `rupiah` decimal(16,0) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dollar_rate`
--

INSERT INTO `dollar_rate` (`id`, `comp_session_id`, `title`, `rupiah`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 1, 'dollar rate 2015', '12500', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `education_center`
--

CREATE TABLE IF NOT EXISTS `education_center` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `education_degree`
--

CREATE TABLE IF NOT EXISTS `education_degree` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `education_group`
--

CREATE TABLE IF NOT EXISTS `education_group` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `email`
--

CREATE TABLE IF NOT EXISTS `email` (
`id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(25) NOT NULL,
  `sent_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(250) NOT NULL,
  `email_body` text NOT NULL,
  `is_read` int(1) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `email`
--

INSERT INTO `email` (`id`, `sender_id`, `receiver_id`, `sent_on`, `subject`, `email_body`, `is_read`, `is_deleted`, `deleted_by`, `deleted_on`) VALUES
(1, 'P0501', '1', '2015-04-07 10:30:53', 'Account Activation Request', 'Employee with Nik = P0501 request account activation', 0, 0, NULL, NULL),
(2, 'B0018', '1', '2015-04-07 10:32:10', 'Account Activation Request', 'Employee with Nik = B0018 request account activation', 0, 0, NULL, NULL),
(3, 'P1493', '1', '2015-04-07 10:32:32', 'Account Activation Request', 'Employee with Nik = P1493 request account activation', 0, 0, NULL, NULL),
(4, 'B0478', '1', '2015-04-07 10:32:51', 'Account Activation Request', 'Employee with Nik = B0478 request account activation', 0, 0, NULL, NULL),
(5, 'P1493', '1', '2015-04-07 10:41:19', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(6, 'P0081', '1', '2015-04-07 10:48:01', 'Account Activation Request', 'Employee with Nik = P0081 request account activation', 0, 0, NULL, NULL),
(7, 'P1894', '1', '2015-04-07 10:53:37', 'Account Activation Request', 'Employee with Nik = P1894 request account activation', 0, 0, NULL, NULL),
(8, 'P0081', 'P1894', '2015-04-07 11:32:01', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(9, 'P0081', '1', '2015-04-07 11:32:01', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(10, 'P1493', 'P0081', '2015-04-07 11:34:24', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(11, 'P1493', 'P1894', '2015-04-07 11:34:24', 'Pengajuan Cuti Ka bag', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(12, 'P1493', '1', '2015-04-07 11:34:24', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 1, NULL, NULL),
(13, 'P0081', 'P1894', '2015-04-07 11:49:18', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(14, 'P0081', '1', '2015-04-07 11:49:18', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(15, 'P1894', '1', '2015-04-07 11:53:02', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(16, 'P0081', 'P1894', '2015-04-13 15:23:48', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(17, 'P0081', '1', '2015-04-13 15:23:49', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(18, 'P1493', 'P0081', '2015-04-13 16:30:54', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(19, 'P1493', 'P1894', '2015-04-13 16:30:54', 'Pengajuan Cuti Ka bag', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(20, 'P1493', '1', '2015-04-13 16:30:54', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(21, 'Z0001', '', '2015-04-13 17:29:28', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(22, 'Z0001', '', '2015-04-13 17:29:40', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(23, 'Z0001', '', '2015-04-13 17:32:22', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(24, 'P1493', 'P0081', '2015-04-13 17:33:27', 'Pengajuan Cuti', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(25, 'P1493', 'P1894', '2015-04-13 17:33:27', 'Pengajuan Cuti Ka bag', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(26, 'P1493', '1', '2015-04-13 17:33:27', 'Pengajuan Cuti admin', 'Employee with Nik request account activation', 0, 0, NULL, NULL),
(27, 'B0081', '1', '2015-04-16 19:40:55', 'Account Activation Request', 'Employee with Nik = B0081 request account activation', 0, 0, NULL, NULL),
(28, 'P0040', '1', '2015-04-20 15:46:45', 'Account Activation Request', 'Employee with Nik = P0040 request account activation', 0, 0, NULL, NULL),
(29, 'P0011', '1', '2015-04-20 15:47:48', 'Account Activation Request', 'Employee with Nik = P0011 request account activation', 0, 0, NULL, NULL),
(30, 'B0004', '1', '2015-04-21 16:21:50', 'Account Activation Request', 'Employee with Nik = B0004 request account activation', 0, 0, NULL, NULL),
(31, 'B0003', '1', '2015-04-22 17:11:19', 'Account Activation Request', 'Employee with Nik = B0003 request account activation', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee_status`
--

CREATE TABLE IF NOT EXISTS `employee_status` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee_status`
--

INSERT INTO `employee_status` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Work Center', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Employed', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Terminated', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Honorarium', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `empl_status`
--

CREATE TABLE IF NOT EXISTS `empl_status` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `empl_status`
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
-- Struktur dari tabel `exp_field`
--

CREATE TABLE IF NOT EXISTS `exp_field` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `exp_level`
--

CREATE TABLE IF NOT EXISTS `exp_level` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `exp_year`
--

CREATE TABLE IF NOT EXISTS `exp_year` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fpdata`
--

CREATE TABLE IF NOT EXISTS `fpdata` (
  `mchID` smallint(6) NOT NULL DEFAULT '0',
  `Nama` varchar(35) DEFAULT NULL,
  `ID` varchar(15) NOT NULL,
  `dept` varchar(30) DEFAULT NULL,
  `io` varchar(2) DEFAULT NULL,
  `priv` tinyint(4) DEFAULT NULL,
  `PC` varchar(50) DEFAULT NULL,
  `upld` varchar(10) DEFAULT NULL,
  `downld` varchar(10) DEFAULT NULL,
  `delflg` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fpfps`
--

CREATE TABLE IF NOT EXISTS `fpfps` (
  `mchID` smallint(6) NOT NULL,
  `fps` varchar(640) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grade`
--

INSERT INTO `grade` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'G01', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'G02', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'member', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikatan_dinas_type`
--

CREATE TABLE IF NOT EXISTS `ikatan_dinas_type` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_absen`
--

CREATE TABLE IF NOT EXISTS `keterangan_absen` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` smallint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan_absen`
--

INSERT INTO `keterangan_absen` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Sakit', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(2, 'telat', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `library`
--

CREATE TABLE IF NOT EXISTS `library` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `url` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `library`
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
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `marital`
--

CREATE TABLE IF NOT EXISTS `marital` (
`id` tinyint(2) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `marital`
--

INSERT INTO `marital` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Single', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Married', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Divorced', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Widowhood', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organization`
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
-- Struktur dari tabel `organization_class`
--

CREATE TABLE IF NOT EXISTS `organization_class` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `order_no` tinyint(3) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organization_class`
--

INSERT INTO `organization_class` (`id`, `title`, `order_no`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Company', 1, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Departement', 2, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Division', 3, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(4, 'Section', 4, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '2015-02-09 00:00:00', 1),
(5, 'Unit', 5, '2015-01-23 00:00:00', 1, '2015-02-06 00:00:00', 1, 1, '2015-02-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payroll_by_position`
--

CREATE TABLE IF NOT EXISTS `payroll_by_position` (
`id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `amount` decimal(16,0) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payroll_setup`
--

CREATE TABLE IF NOT EXISTS `payroll_setup` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payroll_setup`
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
-- Struktur dari tabel `payroll_type`
--

CREATE TABLE IF NOT EXISTS `payroll_type` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `basic_salary_table` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payroll_type`
--

INSERT INTO `payroll_type` (`id`, `title`, `basic_salary_table`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'by position', 'position', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'by position group', 'position_group', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'by individu', 'users_employement', '2015-02-11 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembiayaan`
--

CREATE TABLE IF NOT EXISTS `pembiayaan` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyelenggara`
--

CREATE TABLE IF NOT EXISTS `penyelenggara` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `position`
--

CREATE TABLE IF NOT EXISTS `position` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `position`
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
-- Struktur dari tabel `position_group`
--

CREATE TABLE IF NOT EXISTS `position_group` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `position_group`
--

INSERT INTO `position_group` (`id`, `title`, `abbr`, `level_order`, `level`, `parent_position_group_id`, `description`, `basic_salary`, `gradeval_bottom`, `gradeval_top`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Director', 'Dir', 10, 'Director', 0, '', '0', 0, 0, '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Departement Head', 'Dept. Head', 20, 'Management', 1, '', '0', 0, 0, '2015-01-14 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'Division Head', 'Div. Head', 30, 'Management', 2, '', '0', 0, 0, '2015-02-06 00:00:00', 1, '2015-02-06 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(5, 'Officer', 'Off', 40, 'Non Management', 3, '', '0', 0, 0, '2015-02-09 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'test', 'test', 70, '', 5, 'test', '0', 0, 0, '2015-02-12 08:07:32', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-12 08:07:51', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resign_reason`
--

CREATE TABLE IF NOT EXISTS `resign_reason` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resign_reason`
--

INSERT INTO `resign_reason` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Pensiun', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'PHK', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'Mundur', '2015-01-14 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_setup`
--

CREATE TABLE IF NOT EXISTS `table_setup` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `default_val` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_setup`
--

INSERT INTO `table_setup` (`id`, `title`, `default_val`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'organization_class_limit', 10, '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tadat`
--

CREATE TABLE IF NOT EXISTS `tadat` (
  `mchID` smallint(6) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fgrid` varchar(25) DEFAULT NULL,
  `shf` varchar(2) DEFAULT NULL,
  `idx` int(11) DEFAULT NULL,
  `fpsn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportation`
--

INSERT INTO `transportation` (`id`, `title`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 'Pesawat', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Mobil Kantor', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
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
  `superior_id` varchar(15) DEFAULT NULL,
  `bod` datetime NOT NULL,
  `marital_id` tinyint(2) NOT NULL DEFAULT '0',
  `photo` varchar(254) NOT NULL,
  `mobile_phone` varchar(40) NOT NULL,
  `previous_email` varchar(254) NOT NULL,
  `bb_pin` varchar(10) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `aviva` varchar(50) NOT NULL,
  `bpjs` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `nik`, `superior_id`, `bod`, `marital_id`, `photo`, `mobile_phone`, `previous_email`, `bb_pin`, `npwp`, `ktp`, `aviva`, `bpjs`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1429748719, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '', '1980-01-01 00:00:00', 1, '', '', '', '', '', '', '', ''),
(25, '::1', 'Bitri Indriany', '$2y$08$rHReJHyVE7avLV61mkZtQulcj/rSXsMULJTEIAXoWLHDRvSms8F/q', NULL, 'bitri.indriany@erlangga.co.id', NULL, NULL, NULL, NULL, 1428377453, 1429761886, 1, 'Bitri', 'Indriany', NULL, '02191600634', 'P0501', 'P0501', '1973-05-24 00:00:00', 2, '', '', '', '', '', '', '', ''),
(26, '::1', 'Suksma Wijaya', '$2y$08$PaV84/4X08XhswloLYxwEucSieSslHZhwyjkGY5oJaNQVcpfDkB0y', NULL, 'suksma.wijaya@erlangga.co.id', NULL, NULL, NULL, NULL, 1428377530, 1428377530, 1, 'Suksma', 'Wijaya', NULL, '', 'B0018', 'P0501', '1975-07-10 00:00:00', 2, '', '', '', '', '', '', '', ''),
(27, '::1', 'Wahyu Puji Sucianto', '$2y$08$tzNR63KFnlQV8xj/7mZxzONYqYmadb1giIEZcjq4tfA4FHszei91a', NULL, 'wahyu.sucianto@erlangga.co.id', NULL, NULL, NULL, NULL, 1428377552, 1429749748, 1, 'Wahyu', 'Sucianto', NULL, '0218704165', 'P1493', 'P0081', '1985-06-02 00:00:00', 2, '', '', '', '', '', '', '', ''),
(28, '::1', 'Yuniarti', '$2y$08$1Wtuzk3G8n9Dy9Q2SudlfOrTCwGIJUlwR29rCZkPCrGxOuK/6loXu', NULL, 'B0478', NULL, NULL, NULL, NULL, 1428377571, 1428377571, 1, 'Yuniarti', '', NULL, '', 'B0478', NULL, '1988-06-18 00:00:00', 1, '', '', '', '', '', '', '', ''),
(29, '127.0.0.1', 'Dede Susanti', '$2y$08$vzQuHEwYF2Xpoutfc6Zc1.tTl5DuhUbANm5Tp2Qf0NZg6lFAcpToq', NULL, 'dede.susanti@erlangga.co.id', NULL, NULL, NULL, NULL, 1428378480, 1429188675, 1, 'Dede', 'Susanti', NULL, '0218703753', 'P0081', 'P1894', '1970-06-15 00:00:00', 2, '', '', '', '', '', '', '', ''),
(30, '::1', 'Lili Sumarni', '$2y$08$OLxF1Bc2toOIK53q8.YkYujvxJICSPkvSj8ZdWwfIwrEFxq6PXAWO', NULL, 'P1894', NULL, NULL, NULL, NULL, 1428378817, 1429607092, 1, 'Lili', 'Sumarni', NULL, '', 'P1894', NULL, '1973-10-18 00:00:00', 2, '', '', '', '', '', '', '', ''),
(31, '::1', 'Dede Priatna', '$2y$08$iUwKt8Sm3CQjDgMwj0k0Eu7zSOosRuY06EuO2.JVKpQ.TOCZ6Othy', NULL, 'B0081', NULL, NULL, NULL, NULL, 1429188055, 1429188055, 0, '', '', NULL, '', 'B0081', NULL, '1983-10-08 00:00:00', 2, '', '', '', '', '', '', '', ''),
(32, '::1', 'Minggu Dominggus', '$2y$08$.mhwzFbgeCIHXqqs5OtATO4H88vSbvfuPyiLUX8HcdzGA0JQjHpUO', NULL, 'minggu.dominggus@erlangga.co.id', NULL, NULL, NULL, NULL, 1429519604, 1429519604, 1, '', '', NULL, '', 'P0040', NULL, '1954-10-04 00:00:00', 2, '', '', '', '', '', '', '', ''),
(33, '::1', 'Herman Sinaga', '$2y$08$GL0A0Q7A0/uzCi4pu8Amc.lkc5Q4DdZUiXxdk1awG2dEcGTD1S6Eq', NULL, 'herman.sinaga@erlangga.co.id', 'd3789d01abf6deb37cc61c61c492a2e328969e29', NULL, NULL, NULL, 1429519668, 1429519716, 0, 'Herman', 'Sinaga', NULL, '-', 'P0011', NULL, '1954-09-28 00:00:00', 2, '', '', '', '', '', '', '', ''),
(34, '::1', 'Kadirah Anwar', '$2y$08$msFddEtq2ODpDdBHxUrIU.0S2.kNVgK1JIAZyekh//wLt16x19mEC', NULL, 'kadirah.anwar@erlangga.co.id', NULL, NULL, NULL, NULL, 1429608110, 1429608110, 1, 'Kadirah', 'Anwar', NULL, '', 'B0004', NULL, '1967-03-31 00:00:00', 2, '', '', '', '', '', '', '', ''),
(35, '::1', 'Ariston B. Fau', '$2y$08$HuG0lpzjomezOiwurEcP1utarv2ZvWZVJzRApBkzK31cGP84HQaWy', NULL, 'ariston.fau@erlangga.co.id', NULL, NULL, NULL, NULL, 1429697479, 1429747855, 1, '', '', NULL, '0218727773', 'B0003', NULL, '1958-03-26 00:00:00', 2, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_awardwarning`
--

CREATE TABLE IF NOT EXISTS `users_awardwarning` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_awardwarning`
--

INSERT INTO `users_awardwarning` (`id`, `user_id`, `award_warning_type_id`, `title`, `description`, `app_date`, `sk_number`, `start_date`, `end_date`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 0, 'test1_edit', 'test1', '2015-02-04 00:00:00', 'test1', '2015-02-05 00:00:00', '2015-02-05 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-04 00:00:00', 1),
(2, 8, 0, 'test1', 'test1', '2015-02-04 00:00:00', 'test1', '2015-02-05 00:00:00', '2015-02-06 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 8, 0, 'test2', 'test2', '2015-02-04 00:00:00', 'test2', '2015-02-05 00:00:00', '2015-02-06 00:00:00', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_certificate`
--

CREATE TABLE IF NOT EXISTS `users_certificate` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_certificate`
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
-- Struktur dari tabel `users_course`
--

CREATE TABLE IF NOT EXISTS `users_course` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_course`
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
-- Struktur dari tabel `users_cuti`
--

CREATE TABLE IF NOT EXISTS `users_cuti` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_comp_session` int(11) NOT NULL,
  `date_mulai_cuti` date NOT NULL,
  `date_selesai_cuti` date NOT NULL,
  `jumlah_hari` tinyint(4) NOT NULL,
  `alasan_cuti_id` int(11) NOT NULL,
  `user_pengganti` varchar(11) NOT NULL COMMENT 'user_id kary pengganti',
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
  `note_app_lv3` text NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_on` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_cuti`
--

INSERT INTO `users_cuti` (`id`, `user_id`, `id_comp_session`, `date_mulai_cuti`, `date_selesai_cuti`, `jumlah_hari`, `alasan_cuti_id`, `user_pengganti`, `alamat_cuti`, `is_app_lv1`, `user_app_lv1`, `date_app_lv1`, `note_app_lv1`, `is_app_lv2`, `user_app_lv2`, `date_app_lv2`, `note_app_lv2`, `is_app_lv3`, `user_app_lv3`, `date_app_lv3`, `note_app_lv3`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(15, 29, 1, '2015-04-13', '2015-04-14', 1, 1, 'B0003', 'jj', 1, 30, '2015-04-13', '', 0, 0, '0000-00-00', '', 1, 1, '2015-04-13', '', '2015-04-13 00:00:00', 29, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 27, 1, '2015-04-13', '2015-04-14', 1, 1, 'B0003', 'jj', 1, 29, '2015-04-13', '', 1, 30, '2015-04-13', '', 1, 1, '2015-04-17', '', '2015-04-13 00:00:00', 27, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 1, 1, '2015-04-13', '2015-04-14', 1, 1, 'Z0001', 'a', 1, 1, '2015-04-22', 'sadasfasdsadasfasddasdasdasdsad', 1, 1, '2015-04-22', 'fdasdsadasfasdasdadasd', 1, 1, '2015-04-22', 'dsadsadasdsadsadasdsadsadasdasdasdsadad', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 1, 1, '2015-04-13', '2015-04-14', 1, 1, 'Z0001', 'a', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 1, 1, '2015-04-13', '2015-04-14', 1, 1, 'Z0001', 'ds', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', '2015-04-13 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 27, 1, '2015-04-01', '2015-04-06', 5, 1, 'B0003', 'x', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', 0, 0, '0000-00-00', '', '2015-04-13 00:00:00', 27, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_cuti_plafon`
--

CREATE TABLE IF NOT EXISTS `users_cuti_plafon` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_education`
--

CREATE TABLE IF NOT EXISTS `users_education` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_education`
--

INSERT INTO `users_education` (`id`, `user_id`, `title`, `description`, `start_date`, `end_date`, `education_degree_id`, `education_group_id`, `education_center_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'sd', 'sd 02 pagi', '1996-01-01 00:00:00', '2009-01-31 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 8, 'smp', 'smp 5', '2002-01-31 00:00:00', '2006-01-31 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 8, 'sma', 'sma', '2015-02-02 00:00:00', '2015-02-20 00:00:00', 0, 0, 0, '2015-02-02 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 8, 'S1_edit', 'universitas', '2014-11-03 00:00:00', '2015-02-02 00:00:00', 0, 0, 0, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_employement`
--

CREATE TABLE IF NOT EXISTS `users_employement` (
`id` bigint(16) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_employement`
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
(15, 19, '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_experience`
--

CREATE TABLE IF NOT EXISTS `users_experience` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_experience`
--

INSERT INTO `users_experience` (`id`, `user_id`, `company`, `position`, `start_date`, `end_date`, `address`, `line_business`, `resign_reason_id`, `last_salary`, `exp_level_id`, `exp_year_id`, `exp_field_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'comp1_edit', 'comp', '2014-12-07', '2015-02-04 00:00:00', 'depok', 'IT', 1, '1000000', 0, 0, 0, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(54, 1, 1),
(55, 1, 2),
(56, 25, 1),
(57, 25, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_ikatan_dinas`
--

CREATE TABLE IF NOT EXISTS `users_ikatan_dinas` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_ikatan_dinas`
--

INSERT INTO `users_ikatan_dinas` (`id`, `user_id`, `ikatan_dinas_type`, `title`, `start_date`, `end_date`, `amount`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 0, 'test1_edit', '2015-02-04 00:00:00', '2015-02-05 00:00:00', '1500000', '2015-02-04 00:00:00', 1, '2015-02-04 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 8, 0, 'test2', '2015-02-04 00:00:00', '2015-02-05 00:00:00', '2000000', '2015-02-04 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_jabatan`
--

CREATE TABLE IF NOT EXISTS `users_jabatan` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_jabatan`
--

INSERT INTO `users_jabatan` (`id`, `user_id`, `organization_id`, `position_id`, `employee_group_id`, `grade_id`, `start_date`, `end_date`, `branch_id`, `personnel_action_id`, `sk_date`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 2, 2, 2, 2, '2015-02-08 00:00:00', '2015-02-04 00:00:00', 0, 0, '2015-02-04 00:00:00', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(2, 8, 1, 1, 1, 1, '2015-02-24 00:00:00', '2015-02-02 00:00:00', 0, 0, '2015-02-02 00:00:00', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_keterangan_absen`
--

CREATE TABLE IF NOT EXISTS `users_keterangan_absen` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_keterangan_absen`
--

INSERT INTO `users_keterangan_absen` (`id`, `user_id`, `id_comp_session`, `date_tidak_hadir`, `keterangan_id`, `alasan`, `is_app_lv1`, `user_app_lv1`, `date_app_lv1`, `is_app_lv2`, `user_app_lv2`, `date_app_lv2`, `is_app_lv3`, `user_app_lv3`, `date_app_lv3`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 27, 1, '2015-04-07', 0, 'aaa', 2, 30, '2015-04-08', 1, 30, '2015-04-08', 0, 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(2, 27, 1, '2015-04-07', 0, 'aaa', 1, 27, '2015-04-14', 1, 28, '2015-04-08', 0, 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, 0, '0000-00-00', 0),
(3, 1, 1, '2015-04-07', 0, 'au', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 1, '0000-00-00', 0, 0, '0000-00-00', 0),
(4, 1, 1, '2015-04-07', 1, 'aaa', 0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 1, '0000-00-00', 0, 0, '0000-00-00', 0),
(5, 29, 1, '0000-00-00', 1, 'lol', 1, 30, '2015-04-08', 0, 0, '0000-00-00', 0, 0, '0000-00-00', '2015-04-07', 29, '0000-00-00', 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sk`
--

CREATE TABLE IF NOT EXISTS `users_sk` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_sk`
--

INSERT INTO `users_sk` (`id`, `user_id`, `sk_date`, `sk_no`, `position_id`, `departement_id`, `effective_date`, `location`, `sign_name`, `sign_position`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-10 00:00:00', '1', '1', '1', '2015-02-03 00:00:00', 1, '0000-00-00 00:00:00', 0, 1, '2015-02-03 00:00:00', 1),
(2, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-11 00:00:00', '1', 'edit', 'IT officer', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 1, '2015-02-03 00:00:00', 1),
(3, 8, '2015-02-04 00:00:00', '1', 1, 0, '2015-02-11 00:00:00', '1', '1', '1', '2015-02-03 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 8, '2015-02-10 00:00:00', '2_edit', 1, 0, '2015-02-12 00:00:00', '2', '2', '2', '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_spd_dalam`
--

CREATE TABLE IF NOT EXISTS `users_spd_dalam` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `user_id` varchar(15) NOT NULL COMMENT 'user_id yang ditugaskan ',
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_spd_dalam`
--

INSERT INTO `users_spd_dalam` (`id`, `title`, `user_id`, `destination`, `date_spd`, `start_time`, `end_time`, `is_submit`, `date_submit`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(14, 'Tes', 'P1493', 'JKT', '2015-04-16', '00:20:15', '00:20:15', 1, '2015-04-16', '2015-04-16 00:00:00', 29, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(15, 'tes', '1', 'et', '2015-04-29', '00:20:15', '00:20:15', 1, '2015-04-16', '2015-04-16 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 'dsa', 'B0018', 'sda', '2015-04-23', '00:20:15', '00:20:15', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 'dsa', 'B0018', 'Tes2', '2015-04-23', '00:20:15', '00:20:15', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 'gfdg', 'B0018', 'fdg', '2015-04-14', '00:20:15', '00:20:15', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 'i', 'B0018', 'kj', '2015-04-23', '00:20:15', '00:20:15', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 'i', 'B0018', 'kj', '2015-04-23', '00:20:15', '00:20:15', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(21, 'dsad', 'B0018', 'dsad', '2015-04-27', '11:55:30', '11:55:30', 0, '0000-00-00', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_spd_dalam_report`
--

CREATE TABLE IF NOT EXISTS `users_spd_dalam_report` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_spd_dalam_report`
--

INSERT INTO `users_spd_dalam_report` (`id`, `user_spd_dalam_id`, `attachment`, `description`, `result`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(3, 14, '', 'sadasdasd', 'dasdsadasd', '2015-04-19 00:00:00', 27, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 15, '', 'gjg', 'jghjg', '2015-04-19 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 14, '', 'sadasdasd', 'dasdsadasd', '2015-04-23 00:00:00', 25, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_spd_luar`
--

CREATE TABLE IF NOT EXISTS `users_spd_luar` (
`id` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `user_id` varchar(15) NOT NULL COMMENT 'user_id yang ditugaskan ',
  `destination` varchar(254) NOT NULL,
  `date_spd_start` date NOT NULL,
  `date_spd_end` date NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_spd_luar`
--

INSERT INTO `users_spd_luar` (`id`, `title`, `user_id`, `destination`, `date_spd_start`, `date_spd_end`, `from_city_id`, `to_city_id`, `transportation_id`, `is_submit`, `date_submit`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(5, 'rer', '1', 'rerer', '2015-04-22', '2015-04-23', 2, 1, 2, 0, '0000-00-00', '2015-04-22 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_spd_luar_report`
--

CREATE TABLE IF NOT EXISTS `users_spd_luar_report` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_spd_luar_report`
--

INSERT INTO `users_spd_luar_report` (`id`, `user_spd_luar_id`, `attachment`, `description`, `result`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 3, '', 'das', 'qwdeqw', '2015-04-20 00:00:00', 27, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 4, '', 'dsaddsad', 'dasd', '2015-04-20 00:00:00', 27, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sti`
--

CREATE TABLE IF NOT EXISTS `users_sti` (
`id` int(11) NOT NULL,
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
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_sti`
--

INSERT INTO `users_sti` (`id`, `user_id`, `identity_no`, `ijazah_name`, `ijazah_number`, `ijazah_history`, `institution`, `published_place`, `activation_date`, `position_id`, `receivedby_id`, `acknowledgeby_id`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 8, 'sdf', 'sdf', '1', '1', '1', '1', '2015-02-04 00:00:00', 2, 8, 8, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 1, '2015-02-03 00:00:00', 1),
(2, 8, 'test', 'test', '2', '2', '2', '2', '2015-02-24 00:00:00', 2, 8, 8, '2015-02-03 00:00:00', 1, '2015-02-03 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(3, 8, '3 edit', '3 edit', '3', '3', '3', '3', '2015-02-17 00:00:00', 1, 8, 1, '2015-02-03 00:00:00', 1, '2015-02-04 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_training`
--

CREATE TABLE IF NOT EXISTS `users_training` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_comp_session` int(11) NOT NULL,
  `training_name` varchar(50) NOT NULL,
  `tujuan_training` varchar(150) NOT NULL,
  `penyelenggara_id` int(11) NOT NULL,
  `pembiayaan_id` int(11) NOT NULL,
  `besar_biaya` int(15) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `is_app_lv1` tinyint(1) NOT NULL,
  `user_app_lv1` int(11) NOT NULL,
  `date_app_lv1` date NOT NULL,
  `is_app_lv2` tinyint(1) NOT NULL,
  `user_app_lv2` int(11) NOT NULL,
  `date_app_lv2` date NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_on` date NOT NULL,
  `edited_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `deleted_on` date NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_training`
--

INSERT INTO `users_training` (`id`, `user_id`, `id_comp_session`, `training_name`, `tujuan_training`, `penyelenggara_id`, `pembiayaan_id`, `besar_biaya`, `tempat`, `tanggal`, `jam`, `is_app_lv1`, `user_app_lv1`, `date_app_lv1`, `is_app_lv2`, `user_app_lv2`, `date_app_lv2`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`, `deleted_on`, `deleted_by`) VALUES
(1, 27, 1, 'asds', 'fadsd', 0, 0, 546345345, 'greg', '2015-04-22', '09:57:45', 1, 29, '2015-04-09', 1, 1, '2015-04-09', '2015-04-08', 27, '0000-00-00', 0, 0, '0000-00-00', 0),
(2, 25, 1, 'Tes', 'Tes', 0, 0, 0, 'jauh', '2015-04-23', '00:01:00', 0, 0, '0000-00-00', 1, 25, '2015-04-10', '2015-04-10', 25, '0000-00-00', 0, 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_inactive`
--
ALTER TABLE `active_inactive`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alasan_cuti`
--
ALTER TABLE `alasan_cuti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award_warning_type`
--
ALTER TABLE `award_warning_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certification_type`
--
ALTER TABLE `certification_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comp_session`
--
ALTER TABLE `comp_session`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_status`
--
ALTER TABLE `course_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dollar_rate`
--
ALTER TABLE `dollar_rate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_center`
--
ALTER TABLE `education_center`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_degree`
--
ALTER TABLE `education_degree`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_group`
--
ALTER TABLE `education_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_status`
--
ALTER TABLE `employee_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empl_status`
--
ALTER TABLE `empl_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_field`
--
ALTER TABLE `exp_field`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_level`
--
ALTER TABLE `exp_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_year`
--
ALTER TABLE `exp_year`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fpdata`
--
ALTER TABLE `fpdata`
 ADD PRIMARY KEY (`mchID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ikatan_dinas_type`
--
ALTER TABLE `ikatan_dinas_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keterangan_absen`
--
ALTER TABLE `keterangan_absen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital`
--
ALTER TABLE `marital`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_class`
--
ALTER TABLE `organization_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_by_position`
--
ALTER TABLE `payroll_by_position`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_setup`
--
ALTER TABLE `payroll_setup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_type`
--
ALTER TABLE `payroll_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembiayaan`
--
ALTER TABLE `pembiayaan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_group`
--
ALTER TABLE `position_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resign_reason`
--
ALTER TABLE `resign_reason`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_setup`
--
ALTER TABLE `table_setup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tadat`
--
ALTER TABLE `tadat`
 ADD PRIMARY KEY (`mchID`,`tgl`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `users_awardwarning`
--
ALTER TABLE `users_awardwarning`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_certificate`
--
ALTER TABLE `users_certificate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_course`
--
ALTER TABLE `users_course`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_cuti`
--
ALTER TABLE `users_cuti`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_users_sti` (`user_id`);

--
-- Indexes for table `users_cuti_plafon`
--
ALTER TABLE `users_cuti_plafon`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_users_sti` (`user_id`);

--
-- Indexes for table `users_education`
--
ALTER TABLE `users_education`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_employement`
--
ALTER TABLE `users_employement`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_experience`
--
ALTER TABLE `users_experience`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_ikatan_dinas`
--
ALTER TABLE `users_ikatan_dinas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_jabatan`
--
ALTER TABLE `users_jabatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_keterangan_absen`
--
ALTER TABLE `users_keterangan_absen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sk`
--
ALTER TABLE `users_sk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_spd_dalam`
--
ALTER TABLE `users_spd_dalam`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_spd_dalam_report`
--
ALTER TABLE `users_spd_dalam_report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_spd_luar`
--
ALTER TABLE `users_spd_luar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_spd_luar_report`
--
ALTER TABLE `users_spd_luar_report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sti`
--
ALTER TABLE `users_sti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_training`
--
ALTER TABLE `users_training`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_inactive`
--
ALTER TABLE `active_inactive`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alasan_cuti`
--
ALTER TABLE `alasan_cuti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `award_warning_type`
--
ALTER TABLE `award_warning_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `certification_type`
--
ALTER TABLE `certification_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comp_session`
--
ALTER TABLE `comp_session`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_status`
--
ALTER TABLE `course_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dollar_rate`
--
ALTER TABLE `dollar_rate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education_center`
--
ALTER TABLE `education_center`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_degree`
--
ALTER TABLE `education_degree`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_group`
--
ALTER TABLE `education_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `employee_status`
--
ALTER TABLE `employee_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `empl_status`
--
ALTER TABLE `empl_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `exp_field`
--
ALTER TABLE `exp_field`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exp_level`
--
ALTER TABLE `exp_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exp_year`
--
ALTER TABLE `exp_year`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ikatan_dinas_type`
--
ALTER TABLE `ikatan_dinas_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keterangan_absen`
--
ALTER TABLE `keterangan_absen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marital`
--
ALTER TABLE `marital`
MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `organization_class`
--
ALTER TABLE `organization_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payroll_by_position`
--
ALTER TABLE `payroll_by_position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_setup`
--
ALTER TABLE `payroll_setup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payroll_type`
--
ALTER TABLE `payroll_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembiayaan`
--
ALTER TABLE `pembiayaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `position_group`
--
ALTER TABLE `position_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `resign_reason`
--
ALTER TABLE `resign_reason`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `table_setup`
--
ALTER TABLE `table_setup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users_awardwarning`
--
ALTER TABLE `users_awardwarning`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_certificate`
--
ALTER TABLE `users_certificate`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users_course`
--
ALTER TABLE `users_course`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_cuti`
--
ALTER TABLE `users_cuti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_cuti_plafon`
--
ALTER TABLE `users_cuti_plafon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_education`
--
ALTER TABLE `users_education`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_employement`
--
ALTER TABLE `users_employement`
MODIFY `id` bigint(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users_experience`
--
ALTER TABLE `users_experience`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `users_ikatan_dinas`
--
ALTER TABLE `users_ikatan_dinas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_jabatan`
--
ALTER TABLE `users_jabatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_keterangan_absen`
--
ALTER TABLE `users_keterangan_absen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_sk`
--
ALTER TABLE `users_sk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_spd_dalam`
--
ALTER TABLE `users_spd_dalam`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users_spd_dalam_report`
--
ALTER TABLE `users_spd_dalam_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_spd_luar`
--
ALTER TABLE `users_spd_luar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_spd_luar_report`
--
ALTER TABLE `users_spd_luar_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_sti`
--
ALTER TABLE `users_sti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_training`
--
ALTER TABLE `users_training`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
