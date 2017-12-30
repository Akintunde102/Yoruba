-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 09:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yuf`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE IF NOT EXISTS `blog_members` (
  `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Akintunde', '$2y$10$kC325Aq9pbhwr87DWXee0OhYuMbgAzho5Jk16dkZENNwKZFVoIBRS', 'jegedeakintunde@gmail.com'),
(3, 'Akinomo', '$2y$10$LOhd5GYbsR870Acy4a2HPetXs6nZS0Fdv.j/lsWw57v8eFAx.Kjhe', 'jegedeakintunde@gmail.com'),
(4, 'Ife', '$2y$10$KBz2Iqgey/S6HLhh3b7KW.6P/TeH.x/pmK2bec7sahRgTnG7F4StS', 'jju@gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `postTags` varchar(200) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postDesc`, `postCont`, `postDate`, `postTags`) VALUES
(8, 'Get Started', 'Awon oro  ti e n ka yii  onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyii', '<p>Awon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N<br />\r\n<br />\r\n<br />\r\nje O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;<br />\r\n<br />\r\n<br />\r\nonitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyiiAwon oro &nbsp;ti e n ka yii &nbsp;onitumo, A ko si be fun lilo lasan ni. N je O ye e . Ohun ti mon so . Emi ni mo ko awon oro wonyii</p>\r\n', '2015-11-26 15:01:26', '.htaccess.htaccess.index,php,apache,');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `regid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `memid` varchar(20) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `Month` varchar(255) DEFAULT NULL,
  `Day` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `StateO` varchar(255) DEFAULT NULL,
  `TownO` varchar(255) DEFAULT NULL,
  `PlaceB` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `Approval` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`regid`, `image`, `memid`, `FullName`, `Year`, `Month`, `Day`, `Email`, `Address`, `StateO`, `TownO`, `PlaceB`, `regdate`, `Approval`) VALUES
(13, 'passport/3.png', 'YUF/OS/013', 'Akintunde', '1994', 'March', '6', 'ki@hyu.com', 'Ijj=oka Street', 'Osun', 'iiii', 'Akure', '2016-11-30 09:40:09', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
