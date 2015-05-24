-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2015 at 10:02 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

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
(112, 1432476305, '::1', 'HGWHU7QP');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categorieID` int(11) NOT NULL,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieID`, `titel`, `omschrijving`) VALUES
(1, 'Evenementen', 'Hier komen alle geplande en voorbije evenementen.'),
(2, 'Gasten forum', 'forum voor de gasten'),
(3, 'Leden forum', 'forum voor de leden'),
(4, 'Nieuws', 'Al het nieuws van TedxPxl'),
(7, 'Forum voor speciale mensen', 'Fre welcomes u!');

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
  `latestThread` tinyint(4) NOT NULL DEFAULT '1',
  `eventDate` date DEFAULT NULL COMMENT 'enkel nodig bij topics over events',
  `postDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`topicID`, `titel`, `bericht`, `gebruikerID`, `categorieID`, `latestThread`, `eventDate`, `postDate`) VALUES
(1, 'Support', 'Stel hier je vragen!', 4, 2, 1, '0000-00-00', '2015-05-24'),
(2, 'Welkom leden', 'Maak kennis met de andere leden hier', 4, 3, 1, '0000-00-00', '2015-05-24'),
(3, 'Website launch party', 'De party van het jaar! De nieuwe website wordt gelauncht!', 4, 1, 1, '0000-00-00', '2015-05-24'),
(4, 'Nieuwe website in de maak', 'We zijn een nieuwe website aan het maken. Woop Woop!', 4, 4, 1, '0000-00-00', '2015-05-24'),
(5, 'Het grote wijzig-event', 'Lekker body dit!', 4, 1, 0, '2015-05-14', '0000-00-00'),
(6, 'nog een test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, 0, '2015-06-03', '0000-00-00'),
(9, 'zoveelste test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, 0, '2015-07-14', '0000-00-00'),
(11, 'hupla nog wa testen', 'bladieblablabla', 4, 1, 0, '2015-06-10', '0000-00-00'),
(13, 'nog ewa meer events', 'tralalalalalalalala', 2, 1, 0, '2015-08-06', '0000-00-00'),
(14, 'hier zijn we alweer', 'trolololol', 3, 1, 0, '2015-09-13', '0000-00-00'),
(15, 'dit wordt saai', 'wa moet ne mens nog zeggen omdenduur', 1, 1, 0, '2015-11-21', '0000-00-00'),
(16, 'ee kijk, een vlieg', 'PETS dood', 2, 1, 0, '2015-12-10', '0000-00-00'),
(17, 'kerstmis!!!', 'ho ho ho', 1, 1, 0, '2015-12-25', '0000-00-00'),
(18, 'de sint is er ook bij ', 'zie ginds komt de stoomboot', 6, 1, 0, '2015-12-06', '0000-00-00'),
(19, 'het nieuwe jaar', 'happy newyear !', 2, 1, 0, '2016-01-01', '0000-00-00'),
(24, 'fre masterrace', 'officiele fanclub hier!', 1, 7, 1, '0000-00-00', '2015-05-24');

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
  `profielfoto` mediumblob,
  `voornaam` varchar(75) NOT NULL,
  `familienaam` varchar(75) NOT NULL,
  `al_ingelogd` tinyint(4) NOT NULL DEFAULT '0',
  `actief` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=nog niet geactiveerd door admin( en mag dus niet inloggen), 1 = wel'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`gebruikerID`, `rolID`, `username`, `password`, `email`, `profielfoto`, `voornaam`, `familienaam`, `al_ingelogd`, `actief`) VALUES
(1, 1, 'admin.admin', 'pxl', 'admin.admin@admin.be', NULL, '', '', 0, 0),
(2, 2, 'lid.lid', 'pxl', 'lid.lid@lid.be', NULL, '', '', 0, 0),
(3, 3, 'guest.guest', 'pxl', 'guest.guest@guest.be', NULL, '', '', 0, 0),
(4, 2, 'pxl', '$2y$10$mqocqqNZ00FffJdJX3VadeCdodBKPKtaTBrD0eKTQLj3uG5yn5N5O', 'aaaaaaaaaaaaaaaa@aaaaaaaaaaaaaa', NULL, 'koen', 'vaes', 1, 0),
(6, 2, 'pxl', 'test', 'neen@swek.com', NULL, 'koen', 'vaes', 0, 0),
(7, 2, 'pxl', 'test', 'ja@swek.com', NULL, 'koen', 'vaes', 0, 0),
(12, 2, '"--', 'test', 'koekje@eigendeeg.com', NULL, '"--', '"--', 0, 0),
(29, 2, 'stef.janssens', '$2y$10$e8zRdxlExduRS.YXlTAbJuDTYrlTNLMmh/1Y385WcOaApJEG3d41C', 's.j@hotmail', NULL, 'stef', 'janssens', 1, 0),
(30, 2, 'pxl2', '$2y$10$YmR/SN7H5gnj0LJB4LIoX.ubCp0YkO/UUo4XHHeH1y6GgTpU8pq5m', 's.j@hotmail.com', NULL, 'a', 'a', 1, 0),
(33, 2, 'koen.vaes', 'SP9UE06I', 'koen895@hotmail.com', NULL, 'koen', 'vaes', 0, 0);

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
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `maanden`
--
ALTER TABLE `maanden`
MODIFY `maandID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
MODIFY `topicID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `gebruikerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
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
