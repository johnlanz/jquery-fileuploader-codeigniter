-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2011 at 02:07 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `autopopulate`
--

CREATE TABLE IF NOT EXISTS `autopopulate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `autopopulate`
--

INSERT INTO `autopopulate` (`id`, `name`, `parent_id`, `lft`, `rght`, `created`) VALUES
(1, 'Test 1', NULL, NULL, NULL, '2011-08-23 16:25:10'),
(2, 'Test 2', NULL, NULL, NULL, '2011-08-23 16:25:27'),
(3, 'Test 3', NULL, NULL, NULL, '2011-08-23 16:25:37'),
(4, 'Test 4', NULL, NULL, NULL, '2011-08-23 16:25:50'),
(14, 'Test 1 Category Content', 6, NULL, NULL, '2011-08-23 16:30:59'),
(6, 'Test 1 Category', 1, NULL, NULL, '2011-08-23 16:27:03'),
(7, 'Test 1 Category 2', 1, NULL, NULL, '2011-08-23 16:28:28'),
(8, 'Test 1 Cateogry 3', 1, NULL, NULL, '2011-08-23 16:28:46'),
(9, 'Test 2 Category', 2, NULL, NULL, '2011-08-23 16:29:14'),
(10, 'Test 2 Category 2', 2, NULL, NULL, '2011-08-23 16:29:30'),
(11, 'Test 2 Cateogry 3', 2, NULL, NULL, '2011-08-23 16:29:41'),
(12, 'Test 3 Category', 3, NULL, NULL, '2011-08-23 16:29:58'),
(13, 'Test 3 Category 2', 3, NULL, NULL, '2011-08-23 16:30:14'),
(15, 'Test 1 Category 2 Content', 7, NULL, NULL, '2011-08-23 16:31:39'),
(16, 'Test 1 Category 3 Content', 8, NULL, NULL, '2011-08-23 16:32:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
