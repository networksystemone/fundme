-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2014 at 05:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fundmedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fundme_email`
--

CREATE TABLE IF NOT EXISTS `fundme_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL,
  `sent` int(1) NOT NULL COMMENT '0: not sent yet, 1: sent',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `fundme_my_gofundme`
--

CREATE TABLE IF NOT EXISTS `fundme_my_gofundme` (
  `url` varchar(100) NOT NULL,
  `num_donations` int(11) NOT NULL,
  `raised` varchar(11) NOT NULL,
  `goal` varchar(11) NOT NULL,
  `days_to_go` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  `interval` int(11) NOT NULL,
  `last_fetched` datetime NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fundme_my_gofundme`
--

INSERT INTO `fundme_my_gofundme` (`url`, `num_donations`, `raised`, `goal`, `days_to_go`, `end_date`, `interval`, `last_fetched`) VALUES
('http://www.gofundme.com/projectfundme', 0, '0', '12,000', 80, '2015-01-31 23:59:59', 10, '2014-11-12 05:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `fundme_post`
--

CREATE TABLE IF NOT EXISTS `fundme_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fundme_user`
--

CREATE TABLE IF NOT EXISTS `fundme_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fundme_user`
--

INSERT INTO `fundme_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
