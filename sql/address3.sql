-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2014 at 04:40 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `address3`
--
CREATE DATABASE IF NOT EXISTS `address3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `address3`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `name` varchar(244) DEFAULT NULL,
  `phone` varchar(123) DEFAULT NULL,
  `note` text,
  `tags` varchar(244) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `phone`, `note`, `tags`, `id`, `created`, `modified_at`) VALUES
('John, ', '567, ', NULL, 'best, ', 16, '2014-03-27 18:08:42', '2014-03-27 18:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_tags`
--

CREATE TABLE IF NOT EXISTS `contacts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(234) DEFAULT NULL,
  `phone` varchar(234) DEFAULT NULL,
  `tags` varchar(234) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contacts_tags`
--

INSERT INTO `contacts_tags` (`id`, `name`, `phone`, `tags`) VALUES
(8, 'John', '5195195190', 'hello'),
(9, 'Johny', '5195195191', 'jello'),
(10, 'Johnny', '5195195192', 'mellow');

-- --------------------------------------------------------

--
-- Table structure for table `dataface__datagrids`
--

CREATE TABLE IF NOT EXISTS `dataface__datagrids` (
  `gridID` int(11) NOT NULL AUTO_INCREMENT,
  `gridName` varchar(64) DEFAULT NULL,
  `gridData` text,
  `tableName` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`gridID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dataface__failed_logins`
--

CREATE TABLE IF NOT EXISTS `dataface__failed_logins` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `time_of_attempt` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dataface__modules`
--

CREATE TABLE IF NOT EXISTS `dataface__modules` (
  `module_name` varchar(255) NOT NULL DEFAULT '',
  `module_version` int(11) DEFAULT NULL,
  PRIMARY KEY (`module_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataface__modules`
--

INSERT INTO `dataface__modules` (`module_name`, `module_version`) VALUES
('modules_g2responsive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dataface__mtimes`
--

CREATE TABLE IF NOT EXISTS `dataface__mtimes` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `mtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataface__mtimes`
--

INSERT INTO `dataface__mtimes` (`name`, `mtime`) VALUES
('contacts', 1395943722),
('contacts_tags', 1394550783),
('dataface__datagrids', 1393595318),
('dataface__failed_logins', 1395169285),
('dataface__modules', 1393509304),
('dataface__mtimes', 1393595318),
('dataface__record_mtimes', 1394133787),
('dataface__version', 1393509304),
('namelist', 1393509304),
('name_table', 1395941344),
('name_tag', 1394560725),
('phone_table', 1395941344),
('phone_tag', 1394560757),
('tags', 1394560789),
('tags_table', 1395941344),
('users', 1393509304);

-- --------------------------------------------------------

--
-- Table structure for table `dataface__record_mtimes`
--

CREATE TABLE IF NOT EXISTS `dataface__record_mtimes` (
  `recordhash` varchar(32) NOT NULL DEFAULT '',
  `recordid` varchar(255) DEFAULT NULL,
  `mtime` int(11) NOT NULL,
  PRIMARY KEY (`recordhash`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataface__record_mtimes`
--

INSERT INTO `dataface__record_mtimes` (`recordhash`, `recordid`, `mtime`) VALUES
('01d76faa93b3d1083e3415bd84920b28', 'tags?id=1', 1394560775),
('083b995eff1c9106eeee5c8f8dd47cfe', 'name_tag?id=3', 1394560725),
('09471021d0ea6974cd87cca1ebad3a46', 'contacts?id=11', 1394569390),
('09570bec073f1f3943fc8b36eb47a94b', 'contacts_tags?id=6', 1394471705),
('0f5ae5c90423e2ab0921cc8b913f3cc1', 'phone_tag?id=3', 1394560757),
('0ffd2ee5234905445dbbe9abce76fd29', 'contacts_tags?tags_id=3', 1394456197),
('104335f1f0231dacbd37164b7dc8fde5', 'contacts_tags?tags_id=1', 1394133794),
('11f36e4bcd47c2fa28d217418a280ab4', 'contacts_tags?tags_id=4', 1394456233),
('2a224ef7d197c8f18f6f5eb2e35cc7e8', 'contacts_tags?id=1', 1394471607),
('2b73e744ccdba36652d5afb2ce8bcf9c', 'contacts_tags?id=5', 1394471683),
('2cd111b80634c09afdc343429242f744', 'contacts?id=12', 1394649023),
('30a220b77c988decfe91eb4766be3fa4', 'contacts?id=9', 1394478521),
('413e708cee58fe8aa833ef14d1340ab9', 'tags?id=3', 1394560789),
('57315a3edf197e526da978b4d647ce7e', 'contacts_tags?id=7', 1394477983),
('599984ddf1d73db498b5af27541580ba', 'contacts_tags?id=9', 1394550764),
('5e29675117932f6be03999ac5442ad8d', 'contacts_tags?id=10', 1394550783),
('68e45ab1c8cf2b05793f7ff587dfd8ef', 'phone_tag?id=2', 1394560749),
('6a10ac7064b609e5b45510d951df19f9', 'name_tag?id=1', 1394560671),
('6b09f2cf943fbad10f7ac9ccf3ecabc3', 'tags?id=2', 1394560781),
('7e3e5de2dcc4e548602229d78bf92cd7', 'contacts_tags?tags_id=2', 1394133802),
('8929f7d81e8a94a9b06ca6064ade934f', 'contacts?id=13', 1394648996),
('8af994706c1dec51b7cc9f45619c220d', 'contacts_tags?id=8', 1394550745),
('95cf37bc2f98572e9b94fefbc13126e6', 'name_tag?id=2', 1394560692),
('965e92cbdacf0b5660837195bcba6959', 'contacts?id=14', 1394654789),
('9df5cc5a2d8b3b2f194795866693a59d', 'phone_tag?id=1', 1394560740),
('a47c3a25e718c06787221ae4ebd7297d', 'contacts_tags?id=4', 1394471657),
('a60e4d9d1a681de02c259c11857109f4', 'contacts?id=8', 1394457310),
('a874705fc0a816305b8ca2ad76287143', 'contacts?id=10', 1394566182),
('c147e6bec165ef85eef8a25e838df170', 'contacts?id=15', 1394734743),
('c5f646fbe8192b5a7469539b460e1b78', 'contacts_tags?id=2', 1394471619),
('d074cd09433ed1ccef8f5e9446a5c6a8', 'contacts?id=16', 1395943723),
('f82ce0bbcde9b7cc2b123d2b44141d1e', 'contacts_tags?id=3', 1394471628);

-- --------------------------------------------------------

--
-- Table structure for table `dataface__version`
--

CREATE TABLE IF NOT EXISTS `dataface__version` (
  `version` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataface__version`
--

INSERT INTO `dataface__version` (`version`) VALUES
(8);

-- --------------------------------------------------------

--
-- Table structure for table `namelist`
--

CREATE TABLE IF NOT EXISTS `namelist` (
  `name` varchar(233) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `name_table`
--

CREATE TABLE IF NOT EXISTS `name_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_fld` varchar(234) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `name_table`
--

INSERT INTO `name_table` (`id`, `name_fld`) VALUES
(1, 'John'),
(2, 'Susan'),
(3, 'Janus');

-- --------------------------------------------------------

--
-- Table structure for table `phone_table`
--

CREATE TABLE IF NOT EXISTS `phone_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_fld` varchar(234) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `phone_table`
--

INSERT INTO `phone_table` (`id`, `phone_fld`) VALUES
(1, '555'),
(2, '556'),
(3, '567');

-- --------------------------------------------------------

--
-- Table structure for table `tags_table`
--

CREATE TABLE IF NOT EXISTS `tags_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags_fld` varchar(234) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tags_table`
--

INSERT INTO `tags_table` (`id`, `tags_fld`) VALUES
(1, 'best'),
(2, 'test'),
(3, 'bird nest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(244) DEFAULT NULL,
  `Role` enum('READ ONLY','NO ACCESS','EDIT','DELETE','OWNER','USER','ADMIN','REGISTER') DEFAULT 'READ ONLY',
  `comment_fld1` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `Role`, `comment_fld1`, `created`, `updated`, `email`) VALUES
('admin', 'a', 'ADMIN', NULL, '2012-06-06 10:58:40', NULL, ''),
('user', 'user', 'EDIT', NULL, '2012-06-06 10:56:06', NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
