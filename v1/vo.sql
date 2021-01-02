-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2014 at 06:04 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vo`
--

create database vo;

use vo;

-- --------------------------------------------------------

--
-- Table structure for table `vo_patients`
--

CREATE TABLE IF NOT EXISTS `vo_patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `tc_kimlik_no` varchar(11) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vo_patients`
--

INSERT INTO `vo_patients` (`id`, `name`, `tc_kimlik_no`, `details`) VALUES
(1, 'Fırat Dülger', '36341302282', '-'),
(2, 'Arif Işıkman', '36341302292', '-'),
(6, 'Çağan Önder', '12345678', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `vo_records`
--

CREATE TABLE IF NOT EXISTS `vo_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `patientid` varchar(10) DEFAULT NULL,
  `patientname` varchar(150) DEFAULT NULL,
  `patientstr` varchar(500) DEFAULT NULL,
  `examination` varchar(150) DEFAULT NULL,
  `examinationstr` varchar(500) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `isRead` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vo_records`
--

INSERT INTO `vo_records` (`id`, `username`, `filename`, `patientid`, `patientname`, `patientstr`, `examination`, `examinationstr`, `date`, `isRead`) VALUES
(5, 'firat', '20146191257_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;Ge?mi? olsun', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-19 12:57:55', 1),
(6, 'firat', '20146191259_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;Ge?mi? olsun', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-19 13:00:05', 1),
(7, 'firat', '20146191738_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-19 17:38:24', 1),
(8, 'firat', '20146241112_arif_isikman.3gpp', '2', 'Arif I??kman', '2;;Arif I??kman;;36341302292;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-24 11:12:29', 1),
(9, 'firat', '20146241150_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-24 11:50:48', 1),
(10, 'firat', '20146241151_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-24 11:51:24', 1),
(11, 'firat', '20146241312_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-24 13:12:04', 1),
(12, 'firat', '20146241319_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-24 13:22:35', 1),
(13, 'firat', '20146261012_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-26 10:12:23', 1),
(14, 'firat', '20146301015_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-30 10:15:50', 1),
(15, 'firat', '20146301131_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-30 11:31:43', 1),
(16, 'firat', '20146301356_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-30 13:56:40', 1),
(17, 'firat', '20146301358_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-30 13:58:36', 1),
(18, 'firat', '20146301401_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-30 14:01:20', 1),
(19, 'firat', '20146301418_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-06-30 14:18:16', 1),
(20, 'firat', '20146301432_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-06-30 14:32:46', 1),
(21, 'firat', '20147031758_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-07-03 17:59:03', 1),
(22, 'firat', '20147031802_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-07-03 18:02:31', 1),
(23, 'firat', '20147031804_arif_isikman.3gpp', '2', 'Arif I??kman', '2;;Arif I??kman;;36341302292;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-07-03 18:04:58', 1),
(24, 'firat', '20147101740_arif_isikman.3gpp', '2', 'Arif I??kman', '2;;Arif I??kman;;36341302292;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-07-10 17:40:37', 1),
(25, 'deneme', '20147101752_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Ultrasyon', '1;;Ultrasyon;;Hastan?n ultrasyonu ?ekilecek', '2014-07-10 17:52:32', 1),
(26, 'deneme', '20147111018_firat_dulger.3gpp', '1', 'F?rat D?lger', '1;;F?rat D?lger;;36341302282;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-07-11 10:18:14', 1),
(27, 'firat', '20147140831_arif_isikman.3gpp', '2', 'Arif I??kman', '2;;Arif I??kman;;36341302292;;-', 'Emar', '2;;Emar;;Hastan?n emar? ?ekilecek', '2014-07-14 08:31:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vo_users`
--

CREATE TABLE IF NOT EXISTS `vo_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueness` (`username`,`password`,`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vo_users`
--

INSERT INTO `vo_users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Fırat Dülger', 'firat', 'keke', 1),
(2, 'Admin', 'yonet', 'yonet', 3),
(21, 'Mustafa Musluk', 'mustafa', '', 1);

