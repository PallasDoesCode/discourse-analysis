-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2014 at 05:19 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discourseanalysis`
--
CREATE DATABASE IF NOT EXISTS `discourseanalysis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `discourseanalysis`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--
-- Creation: Sep 14, 2014 at 03:18 AM
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `owner` varchar(40) NOT NULL,
  `projectName` varchar(35) NOT NULL,
  `fileName` varchar(35) NOT NULL,
  `fileContents` longtext NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `files`:
--   `owner`
--       `usersinfo` -> `username`
--

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`owner`, `projectName`, `fileName`, `fileContents`, `public`, `lastUpdate`) VALUES('admin', '', 'Luke - Short & Parsed', '<pconj>WHEN</pconj>\n<pconj>WHENEVER</pconj>\n<pconj>WHILE</pconj>\n<pconj>AS</pconj>\n<pconj>AS LONG AS</pconj>\n<pconj>AS SOON AS</pconj>\n<pconj>SINCE</pconj>\n<pconj>UNTIL</pconj>\n<pconj>JUST AS</pconj>\n<pconj>AT THE SAME TIME AS</pconj>\n<pconj>WHERE</pconj>\n<pconj>WHEREVER</pconj>\n<pconj>THEREFORE</pconj>\n<pconj>AS A RESULT</pconj>\n<pconj>FOR THIS REASON</pconj>\n<pconj>CONSEQUENTLY</pconj>\n<pconj>HENCE</pconj>\n<pconj>ACCORDINGLY</pconj>\n<pconj>THUS</pconj>\n<pconj>SO</pconj>\n<pconj>BECAUSE</pconj>\n<pconj>FOR</pconj>\n<pconj>SINCE</pconj>\n<pconj>IN AS MUCH AS</pconj>\n<pconj>IN ORDER THAT</pconj>\n<pconj>SO THAT</pconj>\n<pconj>THAT</pconj>\n<pconj>TO THE END THAT</pconj>\n<pconj>FOR THE PURPOSE THAT</pconj>\n<pconj>LEST</pconj>\n<pconj>THUS</pconj>\n<pconj>IN THIS MANNER</pconj>\n<pconj>IN THAT MANNER</pconj>\n<pconj>BY THIS MEANS</pconj>\n<pconj>BY THAT MEANS</pconj>\n<pconj>SUCH THAT</pconj>\n<pconj>IF</pconj>\n<pconj>ONLY IF</pconj>\n<pconj>UNLESS</pconj>\n<pconj>EXCEPT THAT</pconj>\n<pconj>EXCEPT IF</pconj>\n<pconj>ALTHOUGH</pconj>\n<pconj>THOUGH</pconj>\n<pconj>EVEN THOUGH</pconj>\n<pconj>EVEN IF</pconj>\n<pconj>X</pconj>\n<pconj>AND</pconj>\n<pconj>NOW</pconj>\n<pconj>BUT</pconj>\n<pconj>ALSO</pconj>\n<pconj>OR</pconj>\n<pconj>WHETHER</pconj>\n<pconj>TILL</pconj>\n<pconj>THEN</pconj>\n<pconj>NEVERTHELESS</pconj>\n<pconj>YET</pconj>\n<pconj>STILL</pconj>\n<pconj>ONLY</pconj>\n<pconj>ON THE OTHER HAND</pconj>\n<pconj>CONVERSELY</pconj>\n<pconj>ON THE CONTRARY</pconj>\n<pconj>INSTEAD</pconj>\n<pconj>NOTWITHSTANDING</pconj>\n<pconj>NOR</pconj>\n<pconj>LIKEWISE</pconj>\n<pconj>EITHER</pconj>\n<pconj>ELSE</pconj>\n<pconj>OR ELSE</pconj>\n<pconj>MOREOVER</pconj>\n<pconj>NEITHER</pconj>\n<pconj>THAN</pconj>\n<pconj>INDEED</pconj>\n<pconj>OTHERWISE</pconj>\n<pconj>INASMUCH AS</pconj>\n\n<?xml version="1.0"?>\n<book><clause><conj>X</conj><text chapter="" verse="">&lt;?xml version="1.0" ?&gt;</text></clause><clause><conj>X</conj><text chapter="" verse=""/></clause><clause><conj>X</conj><text chapter="" verse="">&lt;book bookName="Luke 1"&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;X&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="1"&gt; it seemed good to me &lt;pconj&gt;also,&lt;/pconj&gt;&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;X&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="1"&gt; having had perfect understanding of all things from the very first&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;x&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="1"&gt; to write you an orderly account, [most] excellent Theophilius&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;and&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter= "1" verse= "1"&gt;&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;that&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="4"&gt; you may know the certainty of those things in which you were instructed&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;X&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="5"&gt; There was in the days of Herod, the king of Judea &lt;pconj&gt;and&lt;/pconj&gt; a certain priest named Zacharias&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;X&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="5"&gt; his wife[was] of the daughters of Aaron&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;and&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="5"&gt; her name [was] Elizabeth.&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;So&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="8"&gt; it was,&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;that&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="8"&gt; while he was serving &lt;pconj&gt;as&lt;/pconj&gt; priest &lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="9"&gt; before God in the order of his division,&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;and&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="10"&gt; the whole multitude of the people was praying outside at the hour of incense&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;but&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="10"&gt;&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;conj&gt;therefore&lt;/conj&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">		&lt;text chapter="1" verse="10"&gt; it was done.&lt;/text&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">	&lt;/clause&gt;</text></clause><clause><conj>X</conj><text chapter="" verse="">&lt;/book&gt;</text></clause></book>\n', 0, '2014-09-13 22:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--
-- Creation: Sep 14, 2014 at 02:22 AM
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL,
  `fileName` varchar(50) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--
-- Creation: Sep 14, 2014 at 02:22 AM
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `username` varchar(40) NOT NULL,
  `startTime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `sessionID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempusersinfo`
--
-- Creation: Sep 14, 2014 at 02:22 AM
--

DROP TABLE IF EXISTS `tempusersinfo`;
CREATE TABLE IF NOT EXISTS `tempusersinfo` (
  `confirm_code` varchar(65) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(75) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--
-- Creation: Sep 14, 2014 at 02:22 AM
--

DROP TABLE IF EXISTS `usersinfo`;
CREATE TABLE IF NOT EXISTS `usersinfo` (
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(75) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`username`, `password`, `email`, `name`, `admin`) VALUES('admin', 'pass', 'admin@email.com', 'Administrator', 1);
INSERT INTO `usersinfo` (`username`, `password`, `email`, `name`, `admin`) VALUES('user', 'pass', 'user@gmail.com', 'Regular User', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`owner`,`fileName`), ADD KEY `fk_owner` (`owner`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`username`,`fileName`), ADD KEY `fk_filename` (`fileName`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`sessionID`), ADD KEY `fk_username` (`username`);

--
-- Indexes for table `tempusersinfo`
--
ALTER TABLE `tempusersinfo`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner`) REFERENCES `usersinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
