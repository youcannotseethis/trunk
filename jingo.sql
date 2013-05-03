-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 03, 2013 at 11:08 AM
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
  `tag` varchar(64) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`fid`, `uid`, `state`, `tag`, `s_from`, `s_to`, `repeat_flag`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 1, 'traveling', 'food', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 'working', 'food', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 3, 'lunch', 'food', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 4, 'sleeping', 'escort', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 5, 'boring', 'escort', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 6, 'doing database homework', 'coffee', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 6, 'working', 'food', '2013-04-13 10:40:35', '2013-04-22 10:40:39', 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`nid`, `uid`, `pid`, `text_body`, `keyword`, `dt_inserted`, `dt_edited`, `active`, `s_from`, `s_to`, `repeat_flag`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
(1, 1, 1, 'sucks', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 'so so', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(3, 3, 3, 'good', 'food', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(4, 4, 4, 'disgusting', 'escort', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(5, 5, 5, 'beautiful', 'escort', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(6, 6, 6, 'great', 'coffee', '2013-04-20 15:41:57', '0000-00-00 00:00:00', 1, '2013-04-13 10:40:35', '2013-04-22 10:40:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`pid`, `pname`, `latitude`, `longitude`, `dt_inserted`, `dt_edited`, `active`) VALUES
(1, 'Sala Bar', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'McDonalds', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Shake Shack', 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Banned', 4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Nail', 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Orens Daily Roast', 6, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
(1, 'adam', 'adam@email.com', 'adam', '2013-04-17 15:58:59', '2013-05-03 14:35:33', 'adam', 'adam', 2, 'adam', 'jkl;jjkl;jjkl;jlk;jkl;j;kljkl;j;jkl;j;jkl;;j', 1, 1, 'traveling', 1),
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
