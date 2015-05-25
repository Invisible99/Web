-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 10:34 PM
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
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
`id` int(11) unsigned NOT NULL,
  `tijd` int(11) unsigned NOT NULL,
  `ip_adres` varchar(16) NOT NULL,
  `captcha` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`id`, `tijd`, `ip_adres`, `captcha`) VALUES
(56, 1432472360, '::1', 'GLR0H2PT'),
(57, 1432472663, '::1', 'SC481MY3'),
(58, 1432472664, '::1', 'YJ4AME0U'),
(59, 1432472666, '::1', 'V7FNP8WP'),
(60, 1432472667, '::1', 'TFE3VPNY'),
(61, 1432472668, '::1', 'K4N6I5MM'),
(62, 1432473082, '::1', '8JE1W0BO'),
(63, 1432473200, '::1', 'JAR3X35K'),
(64, 1432473319, '::1', 'AKJ3WM4D'),
(65, 1432473429, '::1', '073FRF73'),
(67, 1432473627, '::1', 'FJVABNIH'),
(68, 1432473691, '::1', '36QL8EWE'),
(69, 1432473709, '::1', 'F53R9224'),
(70, 1432473711, '::1', 'WLOTAMD6'),
(71, 1432473716, '::1', '3CCN551T'),
(72, 1432473822, '::1', '1A58I9Q7'),
(73, 1432473837, '::1', '01K23EUZ'),
(74, 1432473913, '::1', 'HG8MA26Y'),
(75, 1432473924, '::1', 'IJNZU81Q'),
(76, 1432473935, '::1', 'YT8F9SQ4'),
(77, 1432473941, '::1', 'TZK7KFHG'),
(78, 1432473950, '::1', 'APXWVFFL'),
(79, 1432473958, '::1', 'QJHP0RUC'),
(80, 1432473967, '::1', 'MCZI3J6W'),
(81, 1432473980, '::1', '64UMT8E9'),
(82, 1432474296, '::1', '82P39LFJ'),
(83, 1432474303, '::1', 'IZ20UNNI'),
(84, 1432474308, '::1', 'N1DKKK1H'),
(85, 1432474313, '::1', 'QGZYWSQZ'),
(86, 1432474319, '::1', 'EEXNKP6R'),
(87, 1432474334, '::1', 'V7DKCOMP'),
(88, 1432474339, '::1', 'H2LCFLAF'),
(89, 1432474346, '::1', '5J81LHZK'),
(90, 1432474354, '::1', 'CZN1JE71'),
(91, 1432474360, '::1', 'EUS4R7Z8'),
(92, 1432474365, '::1', '0VKMJ27O'),
(93, 1432474370, '::1', 'AA71P6LG'),
(94, 1432474376, '::1', '6VV2BPE1'),
(95, 1432474387, '::1', 'DRXTUBRP'),
(96, 1432474390, '::1', 'M3K99EGC'),
(97, 1432474403, '::1', '71R20R6A'),
(98, 1432474425, '::1', 'ZY7XSTJA'),
(99, 1432474437, '::1', '9EA4A0GW'),
(100, 1432474450, '::1', 'R65QSBMV'),
(101, 1432474464, '::1', '5X3T8T32'),
(102, 1432474470, '::1', '6K9TOGU5'),
(103, 1432474477, '::1', 'DEA4ODPV'),
(104, 1432474486, '::1', 'V8M0XOUP'),
(105, 1432474495, '::1', '66DCAKQ5'),
(106, 1432474512, '::1', 'WW497EBO'),
(107, 1432474537, '::1', 'W7IFF8KF'),
(108, 1432474562, '::1', 'NJ3CPVCH'),
(109, 1432474570, '::1', 'T8FDAS4T'),
(110, 1432474577, '::1', 'JZUWJCJH'),
(111, 1432474830, '::1', '6X7YWRHR'),
(112, 1432476305, '::1', 'HGWHU7QP'),
(114, 1432563740, '::1', '93XEOZGC'),
(115, 1432563831, '::1', 'QEBZRWXY');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categorieID` int(11) NOT NULL,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `magZienTot` int(11) NOT NULL DEFAULT '2',
  `magPosten` int(11) NOT NULL,
  `magThreadsBewerken` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieID`, `titel`, `omschrijving`, `magZienTot`, `magPosten`, `magThreadsBewerken`) VALUES
(1, 'Nieuws', 'De laatste weetjes!', 2, 2, 1),
(2, 'Evenementen', 'Events, parties, etc!', 2, 2, 1),
(3, 'Public', 'Deel je kennis met iedereen!', 3, 3, 2),
(4, 'Members', 'Voor alles wat de gasten niet aangaat!', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `maanden`
--

CREATE TABLE IF NOT EXISTS `maanden` (
`maandID` int(11) NOT NULL,
  `maandNaam` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maanden`
--

INSERT INTO `maanden` (`maandID`, `maandNaam`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maart'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Augustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`berichtID` int(11) NOT NULL,
  `topicID` int(11) NOT NULL,
  `gebruikerID` int(11) NOT NULL,
  `bericht` text NOT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latestPost` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`berichtID`, `topicID`, `gebruikerID`, `bericht`, `postDate`, `latestPost`) VALUES
(45, 41, 2, 'Just passing by. Het forum werkt wel vlotjes!', '2015-05-25 16:19:34', 0),
(46, 41, 2, 'Firefox user hier. Werkt allemaal tiptop', '2015-05-25 16:20:26', 0),
(47, 41, 34, 'Net een account aangemaakt. Werkt goed!', '2015-05-25 16:27:05', 1),
(48, 40, 34, 'Hopelijk geraakt het af op tijd', '2015-05-25 16:28:00', 1),
(49, 42, 34, 'Hoi ik ben Piet Vandeput', '2015-05-25 16:28:26', 1),
(50, 51, 34, 'Ik zal er zeker zijn!', '2015-05-25 22:12:13', 1),
(51, 45, 34, 'Aanwezig :D', '2015-05-25 22:12:46', 1);

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
  `eventDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'enkel nodig bij topics over events',
  `postDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eventFoto` varchar(20) DEFAULT NULL,
  `locatie` varchar(9999) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`topicID`, `titel`, `bericht`, `gebruikerID`, `categorieID`, `eventDate`, `postDate`, `eventFoto`, `locatie`) VALUES
(40, 'De website is bijna af!', 'We zijn hard aan het werk om de website aan de praat te krijgen tegen de deadline!', 1, 1, '2015-05-25 16:13:45', '2015-05-25 16:13:45', NULL, NULL),
(41, 'Gastenboek', 'Heb je een mening over de website?', 1, 3, '2015-05-25 16:17:04', '2015-05-25 16:17:04', NULL, NULL),
(42, 'Kennismakings hoekje', 'Stel je voor aan de andere leden', 1, 4, '2015-05-25 16:17:59', '2015-05-25 16:17:59', NULL, NULL),
(44, 'Mijn mening', 'Dit forum werkt best goed eigenlijk!', 34, 4, '2015-05-25 16:30:58', '2015-05-25 16:30:58', NULL, NULL),
(45, 'Verdediging op de PXL', 'Tijd om het webproject eens voor te stellen!', 1, 2, '2015-05-25 17:42:08', '2015-05-25 17:42:08', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d20116.462080856676!2d5.347562596253314!3d50.93189728834362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spxl!5e0!3m2!1snl!2s!4v1432566863523" width="400" height="300" frameborder="0" style="border:0"></iframe>'),
(49, 'Forum birthday bash', 'We vieren het eenjarig bestaan van het forum!', 1, 2, '2015-05-21 17:27:16', '2015-05-25 22:33:56', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24564.984042976885!2d-31.11678582574234!3d39.68069419993875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbe!4v1432578861547" width="600" height="450" frameborder="0" style="border:0"></iframe>'),
(51, '''We kapen een gratis bus'' Event', 'Kom naar het Dusart in Hasselt voor een gratisbus rit!', 1, 2, '2015-05-31 23:59:00', '2015-05-25 22:10:29', NULL, '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5028.945080688592!2d5.3348788056207335!3d50.9334735231601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c1218279f024a9%3A0xc044a3a863d3225a!2sKolonel+Dusartplein+34%2C+3500+Hasselt!5e0!3m2!1sen!2sbe!4v1432584518644" width="600" height="450" frameborder="0" style="border:0"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`gebruikerID` int(11) NOT NULL,
  `rolID` int(11) NOT NULL,
  `username` varchar(75) NOT NULL COMMENT 'Ding wat gegenereerd wordt bij aanvraag nieuwe user',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profielfoto` varchar(20) DEFAULT 'default.jpg',
  `voornaam` varchar(75) NOT NULL,
  `familienaam` varchar(75) NOT NULL,
  `al_ingelogd` tinyint(4) NOT NULL DEFAULT '0',
  `actief` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=nog niet geactiveerd door admin( en mag dus niet inloggen), 1 = wel'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`gebruikerID`, `rolID`, `username`, `password`, `email`, `profielfoto`, `voornaam`, `familienaam`, `al_ingelogd`, `actief`) VALUES
(1, 1, 'admin.tedxpxl', '$2y$10$X67Tp9c2MqMkmgXDhpyUI.27b03m6B59kHOFaGnxk9Xf6guUAqe8y', 'admin.tedxpxl@admin.be', 'default.jpg', 'admin', 'tedxpxl', 1, 1),
(2, 3, 'guest', 'guest', 'guest.guest@guest.be', 'default.jpg', 'guest', 'guest', 0, 0),
(34, 2, 'piet.vandeput', '$2y$10$VwUNr3U5FC95zX6HrVVijuemXL97jCa4LZLtIbc7I4SVkPRuZyTq2', 'piet-v@live.com', 'default.jpg', 'piet', 'vandeput', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `maanden`
--
ALTER TABLE `maanden`
 ADD PRIMARY KEY (`maandID`);

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
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `maanden`
--
ALTER TABLE `maanden`
MODIFY `maandID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `berichtID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `rolID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `gebruikerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `threads` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
