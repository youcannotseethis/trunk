-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 16, 2013 at 06:43 PM
-- Server version: 5.5.30
-- PHP Version: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `state` varchar(64) NOT NULL,
  `tags` varchar(64) NOT NULL,
  `s_from` datetime DEFAULT '0000-00-00 00:00:00',
  `s_to` datetime DEFAULT '0000-00-00 00:00:00',
  `repeat_flag` tinyint(1) DEFAULT '0',
  `sunday` tinyint(1) DEFAULT '0',
  `monday` tinyint(1) DEFAULT '0',
  `tuesday` tinyint(1) DEFAULT '0',
  `wednesday` tinyint(1) DEFAULT '0',
  `thursday` tinyint(1) DEFAULT '0',
  `friday` tinyint(1) DEFAULT '0',
  `saturday` tinyint(1) DEFAULT '0',
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`fid`, `uid`, `state`, `tags`, `s_from`, `s_to`, `repeat_flag`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 1, 'traveling', '{"0":"traveling"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-05-16 22:41:39', 1),
(2, 2, 'working', '{"0":"working"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 0, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-05-16 22:42:13', 1),
(3, 3, 'lunch', '{"0":"lunch"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '2013-05-16 22:40:33', 1),
(4, 4, 'sleeping', '{"0":"sleeping"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '2013-05-16 22:40:44', 1),
(5, 5, 'boring', '{"0":"boring"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', '2013-05-16 22:40:53', 1),
(6, 6, 'doing database homework', '{"0":"doing database project"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00', '2013-05-16 22:41:02', 1),
(7, 6, 'working', '{"0":"working"}', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-05-16 22:41:11', 1),
(8, 1, 'state8', '{"0":"state8","1":"state8"}', '2013-05-16 21:38:18', '2013-04-28 21:38:18', 0, 0, 0, 0, 0, 0, 0, 0, '2013-05-16 18:39:23', '2013-05-16 22:41:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `CURRENT_U` int(11) NOT NULL DEFAULT '0',
  `FOLLOWED_USER` int(11) NOT NULL DEFAULT '0',
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CURRENT_U`,`FOLLOWED_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`CURRENT_U`, `FOLLOWED_USER`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_note`
--

CREATE TABLE IF NOT EXISTS `like_note` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `nid` int(11) NOT NULL DEFAULT '0',
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`,`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_note`
--

INSERT INTO `like_note` (`uid`, `nid`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 7, '2013-05-16 14:28:25', '2013-05-16 18:28:25', 1),
(1, 8, '2013-05-16 14:31:19', '2013-05-16 18:31:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `text_body` varchar(1000) DEFAULT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `dt_inserted` datetime DEFAULT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `s_from` datetime DEFAULT '0000-00-00 00:00:00',
  `s_to` datetime DEFAULT '0000-00-00 00:00:00',
  `repeat_flag` tinyint(1) DEFAULT '0',
  `sunday` tinyint(1) DEFAULT '0',
  `monday` tinyint(1) DEFAULT '0',
  `tuesday` tinyint(1) DEFAULT '0',
  `wednesday` tinyint(1) DEFAULT '0',
  `thursday` tinyint(1) DEFAULT '0',
  `friday` tinyint(1) DEFAULT '0',
  `saturday` tinyint(1) DEFAULT '0',
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`nid`, `uid`, `pid`, `text_body`, `keyword`, `dt_inserted`, `dt_edited`, `active`, `s_from`, `s_to`, `repeat_flag`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `public`) VALUES
(1, 1, 1, 'sucks', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 2, 'so so', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1),
(3, 3, 3, 'good', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1),
(4, 4, 4, 'disgusting', 'escort', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1),
(5, 5, 5, 'beautiful', 'escort', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1),
(6, 6, 6, 'great', 'coffee', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(7, 1, 3, 'aaa', 'bbbb', '2013-05-16 00:00:00', '2013-05-10 03:05:32', 1, '2013-05-06 23:03:27', '2013-05-22 23:03:27', 1, 1, 0, 0, 0, 0, 0, 0, 1),
(8, 1, 3, 'so good', 'coffee', '2013-05-14 00:00:00', '2013-05-14 21:19:47', 1, '2013-05-05 17:19:24', '2013-05-13 17:19:24', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(9, 1, 3, 'd', 'dddd', NULL, '2013-05-16 23:34:26', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, 1, 3, 'test', 'teesfsf', NULL, '2013-05-16 23:36:10', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 1, 3, 'fff', 'fdafasf', NULL, '2013-05-16 23:36:47', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 1, 3, 'fdafaf', 'fdafafa', NULL, '2013-05-16 23:37:17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 1, 3, 'fdafa', 'dfafafa', NULL, '2013-05-16 23:37:49', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 1, 3, '', '', NULL, '2013-05-16 23:39:01', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 1, 3, '123', '', NULL, '2013-05-16 23:39:16', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 1, 3, '', '', NULL, '2013-05-16 23:42:59', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(17, 1, 3, '', '', '2013-05-17 00:00:00', '2013-05-16 23:43:24', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 11, 1, 'asdf', 'asdf', '2013-05-16 18:30:05', '2013-05-16 22:30:05', 1, '2013-05-13 21:27:27', '2013-05-13 21:27:27', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 11, 1, 'asfd', 'asfd', '2013-05-16 18:30:24', '2013-05-16 22:30:24', 1, '2013-05-20 21:30:06', '2013-05-13 21:30:06', 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`pid`, `pname`, `latitude`, `longitude`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 'Sala Bar', 40.1, -75.2, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(2, 'McDonalds', 40.2, -75.1, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(3, 'Shake Shack', 40.3, -75.3, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(4, 'Banned', 40.4, -75.5, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(5, 'Nail', 40.5, -75.4, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(6, 'Orens Daily Roast', 40.6, -75.6, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(7, 'Brooklyn Heights Promenade', 40.6983, -73.9966, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(8, 'US Post Office', 40.6955, -73.9905, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(9, 'Theodore Roosevelt Federal Courthouse (U.S. District Court)', 40.6967, -73.9896, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(10, 'monkeyHut', 40.7, -74, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(11, 'Chinese Mirch', 40.7008, -74.0021, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(12, 'Brookyn Bridge Park Greenway', 40.7003, -73.997, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(13, 'Habana Outpost', 40.7, -74, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(14, 'Govenors island', 40.7021, -73.9982, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(15, 'Squibb Park Bridge', 40.7009, -73.9956, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(16, 'Cab 6B74', 40.6999, -74, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(17, 'Fruit Street Sitting Area', 40.7007, -73.9952, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(18, 'Brooklyn Bridge Park Pop Up Pool', 40.7, -73.9966, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(19, 'Squibb Park', 40.701, -73.9951, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(20, 'Brooklyn Hip Hop Festival', 40.6975, -73.9981, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(21, 'Brooklyn Bethal', 40.7004, -73.9999, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(22, 'Hot Dog Vendor on corner of John and Front', 40.7002, -74.0009, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(23, 'Columbia heights', 40.6995, -73.9958, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(24, 'Harry Chapin Playground', 40.7007, -73.9949, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(25, 'Hillside Park', 40.6998, -73.9957, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(26, '24 Hour Picnic People', 40.7019, -73.997, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(27, 'Yips', 40.7004, -74.0011, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(28, 'kk hair salon', 40.6996, -74.0011, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(29, 'QBE', 40.699, -74.0004, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(30, 'Metropolitan Opera Summer Recital Series', 40.6973, -73.9977, '0000-00-00 00:00:00', '2013-05-09 19:32:11', 1),
(31, 'Stairway To Heaven', 40.6982, -73.9963, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(32, 'Internal Medicine Associates', 40.699, -74.0004, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(33, 'Dr Shur', 40.699, -74.0004, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(34, 'Livys apartment !', 40.7002, -74.0014, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(35, 'La cabana', 40.6987, -73.9995, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(36, 'EmblemHealth Fitness Center', 40.7016, -74.0016, '0000-00-00 00:00:00', '2013-05-09 19:29:03', 1),
(37, 'NYU Bobst Library', 40.7296, -73.9967, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(38, 'NYU Skirball Center for the Performing Arts', 40.7297, -73.9976, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(39, 'Starbucks at NYU', 40.7295, -73.9966, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(40, 'Washington Square Park', 40.7308, -73.9976, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(41, 'NYU Bobst Library LL1', 40.7298, -73.9968, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(42, 'NYU Stern School of Business', 40.7291, -73.996, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(43, 'Helen & Martin Kimmel Center for University Life at NYU', 40.7301, -73.9977, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(44, 'NYU Bobst Avery Fisher Center', 40.7294, -73.9973, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(45, 'Kaufman Management Center', 40.7292, -73.9966, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(46, 'Kimmel Marketplace', 40.73, -73.9975, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(47, 'MTA Subway - W 4th St/Washington Sq (A/B/C/D/E/F/M)', 40.7316, -74.0002, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(48, 'NYU Bobst Library 9th Floor', 40.7296, -73.9971, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(49, 'Global Center For Academic & Spiritual Life', 40.73, -73.9982, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(50, 'NYU Jeffrey S. Gould Welcome Center (Shimkin Hall)', 40.7295, -73.9965, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(51, 'NYU Ticket Central', 40.7299, -73.9974, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(52, 'NYU Bobst Library 4th Floor', 40.7298, -73.9969, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(53, 'NYU Steinhardt Education Building', 40.7293, -73.9959, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(54, 'NYU Jerome S. Coles Sports & Recreation Center', 40.7268, -73.9969, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(55, 'Think Coffee', 40.7283, -73.9956, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(56, 'N.Y. Dosas', 40.7307, -73.9988, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(57, 'Gould Plaza', 40.729, -73.996, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(58, 'Korilla BBQ', 40.7358, -73.9931, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(59, 'NYU Bobst Library 5th Floor', 40.7298, -73.9968, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(60, 'Negril Village', 40.7296, -73.9984, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(61, 'NYU Law, Furman Hall', 40.73, -73.999, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(62, 'NYU Bobst Library LL2', 40.7298, -73.9969, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(63, 'Mille-Feuille', 40.729, -73.9979, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(64, 'Oren''s Daily Roast', 40.7305, -73.9952, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(65, 'Schwartz Plaza', 40.7294, -73.9969, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1),
(66, 'Avery Fisher Center', 40.7296, -73.9973, '0000-00-00 00:00:00', '2013-05-09 19:35:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `nid` int(11) NOT NULL DEFAULT '0',
  `reply_body` varchar(1000) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`rid`, `uid`, `nid`, `reply_body`, `active`, `dt_inserted`, `dt_edited`) VALUES
(1, 1, 2, 'Thanks for the tips', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `silent`
--

CREATE TABLE IF NOT EXISTS `silent` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `nid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silent`
--

INSERT INTO `silent` (`uid`, `nid`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dt_inserted` datetime NOT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `last_latitude` float NOT NULL DEFAULT '0',
  `last_longitude` float NOT NULL DEFAULT '0',
  `current_state` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`,`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `email`, `password`, `dt_inserted`, `dt_edited`, `first_name`, `last_name`, `gender`, `photo`, `description`, `last_latitude`, `last_longitude`, `current_state`, `active`) VALUES
(1, 'adam', 'adam@email.com', 'adam', '2013-04-17 15:58:59', '2013-05-16 22:38:03', 'adam', 'adam', 2, 'adam', 'hey you', 1, 1, 'traveling', 1),
(2, 'bob', 'bob@email.com', 'bob', '2013-04-17 15:58:59', '0000-00-00 00:00:00', 'bob', 'bob', 1, 'bob', 'bob', 2, 2, 'working', 1),
(3, 'carol', 'carol@email.com', 'carol', '2013-04-17 15:58:59', '0000-00-00 00:00:00', 'carol', 'carol', 0, 'carol', 'carol', 3, 3, 'at lunch', 1),
(4, 'dump', 'dump@email.com', 'dump', '2013-04-17 15:58:59', '0000-00-00 00:00:00', 'dump', 'dump', 0, 'dump', 'dump', 4, 4, 'sleeping', 1),
(5, 'ed', 'ed@email.com', 'ed', '2013-04-17 15:58:59', '0000-00-00 00:00:00', 'ed', 'ed', 1, 'ed', 'ed', 5, 5, 'boring', 1),
(6, 'fool', 'fool@email.com', 'fool', '2013-04-17 15:58:59', '0000-00-00 00:00:00', 'fool', 'fool', 1, 'fool', 'fool', 5, 5, 'doing database homework', 1),
(7, 'dang', 'dang@gmail.com', 'dang', '2013-04-30 17:23:24', '2013-04-30 21:23:24', '', '', 0, NULL, '', 0, 0, '', 1),
(8, 'xie', 'xie@gmail.com', 'xie', '2013-05-01 14:36:11', '2013-05-01 18:36:11', '', '', 0, NULL, '', 0, 0, '', 1),
(9, 'zhong', 'zhong@email.com', 'zhong', '2013-05-01 14:36:30', '2013-05-01 18:36:30', '', '', 0, NULL, '', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_location_record`
--

CREATE TABLE IF NOT EXISTS `user_location_record` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `dt_inserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `dt_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`,`dt_inserted`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
