-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2015 at 05:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tedxpxl`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categorieID` int(11) NOT NULL,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieID`, `titel`, `omschrijving`) VALUES
(1, 'Evenementen (Werkt ma goed door freeeee)', 'Hier komen alle geplande en voorbije evenementen.'),
(2, 'Gasten forum', 'forum voor de gasten'),
(3, 'Leden forum', 'forum voor de leden'),
(4, 'Nieuws', 'Al het nieuws van TedxPxl');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`berichtID` int(11) NOT NULL,
  `topicID` int(11) NOT NULL,
  `gebruikerID` int(11) NOT NULL,
  `bericht` text NOT NULL,
  `postDate` date NOT NULL,
  `latestPost` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`berichtID`, `topicID`, `gebruikerID`, `bericht`, `postDate`, `latestPost`) VALUES
(1, 1, 4, 'Wanneer werkt het forum?', '2015-05-23', 1),
(2, 2, 4, 'heheheh nice', '2015-05-23', 1),
(3, 3, 4, 'vreeed nice. kan niet wachten!', '2015-05-23', 0),
(4, 4, 4, 'hohohohohho, werk dan maar snel door', '2015-05-23', 1),
(5, 3, 1, 'Die kerel hierboven weet hoe het zit!!', '2015-05-23', 0),
(6, 3, 1, 'BTW, al lekker veel posts', '2015-05-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`rolID` int(11) NOT NULL,
  `rolNaam` varchar(75) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rolID`, `rolNaam`) VALUES
(1, 'admin'),
(2, 'lid'),
(3, 'niet-lid'),
(4, 'Verwijderd'),
(5, 'Banned');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
`topicID` int(11) NOT NULL,
  `titel` varchar(75) NOT NULL,
  `bericht` text NOT NULL,
  `gebruikerID` int(11) NOT NULL COMMENT 'gebruiker die deze topic heeft aangemaakt',
  `categorieID` int(11) NOT NULL,
  `latestThread` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`topicID`, `titel`, `bericht`, `gebruikerID`, `categorieID`, `latestThread`) VALUES
(1, 'Support', 'Stel hier je vragen!', 4, 2, 1),
(2, 'Welkom leden', 'Maak kennis met de andere leden hier', 4, 3, 1),
(3, 'Website launch party', 'De party van het jaar! De nieuwe website wordt gelauncht!', 4, 1, 1),
(4, 'Nieuwe website in de maak', 'We zijn een nieuwe website aan het maken. Woop Woop!', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`gebruikerID` int(11) NOT NULL,
  `rolID` int(11) NOT NULL DEFAULT '11',
  `username` varchar(75) NOT NULL COMMENT 'Ding wat gegenereerd wordt bij aanvraag nieuwe user',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profielfoto` mediumblob
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`gebruikerID`, `rolID`, `username`, `password`, `email`, `profielfoto`) VALUES
(1, 1, 'admin.admin', 'pxl', 'admin.admin@admin.be', NULL),
(2, 2, 'lid.lid', 'pxl', 'lid.lid@lid.be', NULL),
(3, 3, 'guest.guest', 'pxl', 'guest.guest@guest.be', NULL),
(4, 1, 'piet.vandeput', 'pxl', 'piet.vandeput@admin.be', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`berichtID`), ADD KEY `gebruikerID` (`gebruikerID`), ADD KEY `topicID` (`topicID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`rolID`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
 ADD PRIMARY KEY (`topicID`), ADD KEY `gebruikerID` (`gebruikerID`), ADD KEY `categorieID` (`categorieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`gebruikerID`), ADD UNIQUE KEY `email` (`email`), ADD KEY `rolID` (`rolID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `berichtID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `rolID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `gebruikerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `threads` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`categorieID`) REFERENCES `categories` (`categorieID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `roles` (`rolID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
