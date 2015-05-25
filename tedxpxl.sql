-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 25 mei 2015 om 15:10
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `tedxpxl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tijd` int(11) unsigned NOT NULL,
  `ip_adres` varchar(16) NOT NULL,
  `captcha` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Gegevens worden geëxporteerd voor tabel `captcha`
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
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categorieID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `magZienTot` int(11) NOT NULL DEFAULT '2',
  `magPosten` int(11) NOT NULL,
  `magThreadsBewerken` int(11) NOT NULL,
  PRIMARY KEY (`categorieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`categorieID`, `titel`, `omschrijving`, `magZienTot`, `magPosten`, `magThreadsBewerken`) VALUES
(1, 'Evenementen', 'Hier komen alle geplande en voorbije evenementen.', 2, 2, 1),
(2, 'Gasten forum', 'forum voor de gasten', 3, 3, 2),
(3, 'Leden forum', 'forum voor de leden', 2, 2, 2),
(4, 'Nieuws', 'Al het nieuws van TedxPxl', 2, 2, 1),
(12, 'Piet''s testforum', 'Don''t mind this place', 2, 2, 2),
(13, 'Een leeg testforum', 'Nevermind me, I''m empty', 2, 2, 2),
(14, 'nog een leeg forum', 'jaja, nog eeeeeeeeeeen!', 2, 2, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `maanden`
--

CREATE TABLE IF NOT EXISTS `maanden` (
  `maandID` int(11) NOT NULL AUTO_INCREMENT,
  `maandNaam` varchar(10) NOT NULL,
  PRIMARY KEY (`maandID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `maanden`
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
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `berichtID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL,
  `gebruikerID` int(11) NOT NULL,
  `bericht` text NOT NULL,
  `postDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latestPost` tinyint(4) NOT NULL,
  PRIMARY KEY (`berichtID`),
  KEY `gebruikerID` (`gebruikerID`),
  KEY `topicID` (`topicID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`berichtID`, `topicID`, `gebruikerID`, `bericht`, `postDate`, `latestPost`) VALUES
(1, 1, 4, 'Wanneer werkt het forum?', '2015-05-23 00:00:00', 1),
(2, 2, 4, 'heheheh nice', '2015-05-23 00:00:00', 1),
(3, 3, 4, 'vreeed nice. kan niet wachten! naicuuuu', '2015-05-23 00:00:00', 0),
(4, 4, 4, 'hohohohohho, werk dan maar snel door', '2015-05-23 00:00:00', 1),
(11, 3, 4, 'vreeed nice. kan niet wachten! naicuuuu azda dazfazefa z faz fazf afa', '2015-05-23 00:00:00', 1),
(37, 31, 1, 'dit is een testbericht', '2015-05-25 00:00:00', 0),
(39, 31, 1, 'hoipiepeloi', '2015-05-25 02:59:23', 1),
(41, 36, 1, 'een eerste test? :O\r\n\r\nEDIT: Tijd is nu later dan de rest muahahahahahah ^^', '2015-05-25 03:56:02', 0),
(42, 36, 1, 'het ziet er naar uit ja dat dit wederom een test is', '2015-05-25 03:52:37', 0),
(43, 36, 1, 'Het lijk wel te werken. Nice!', '2015-05-25 03:56:19', 0),
(44, 36, 1, 'Too StronK!', '2015-05-25 03:56:19', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `rolID` int(11) NOT NULL AUTO_INCREMENT,
  `rolNaam` varchar(75) NOT NULL,
  PRIMARY KEY (`rolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`rolID`, `rolNaam`) VALUES
(1, 'admin'),
(2, 'lid'),
(3, 'niet-lid'),
(4, 'Verwijderd'),
(5, 'Banned');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(75) NOT NULL,
  `bericht` text NOT NULL,
  `gebruikerID` int(11) NOT NULL COMMENT 'gebruiker die deze topic heeft aangemaakt',
  `categorieID` int(11) NOT NULL,
  `eventDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'enkel nodig bij topics over events',
  `postDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`topicID`),
  KEY `gebruikerID` (`gebruikerID`),
  KEY `categorieID` (`categorieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Gegevens worden geëxporteerd voor tabel `threads`
--

INSERT INTO `threads` (`topicID`, `titel`, `bericht`, `gebruikerID`, `categorieID`, `eventDate`, `postDate`) VALUES
(1, 'Support', 'Stel hier je vragen!', 4, 2, '0000-00-00 00:00:00', '2015-05-24 00:00:00'),
(2, 'Welkom leden', 'Maak kennis met de andere leden hier', 4, 3, '0000-00-00 00:00:00', '2015-05-24 00:00:00'),
(3, 'Website launch party', 'De party van het jaar! De nieuwe website wordt gelauncht!', 4, 1, '0000-00-00 00:00:00', '2015-05-24 00:00:00'),
(4, 'Nieuwe website in de maak', 'We zijn een nieuwe website aan het maken. Woop Woop!', 4, 4, '0000-00-00 00:00:00', '2015-05-24 00:00:00'),
(5, 'Het grote wijzig-event', 'Lekker body dit!', 4, 1, '2015-05-14 00:00:00', '0000-00-00 00:00:00'),
(6, 'nog een test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, '2015-06-03 00:00:00', '0000-00-00 00:00:00'),
(9, 'zoveelste test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, '2015-07-14 00:00:00', '0000-00-00 00:00:00'),
(11, 'hupla nog wa testen', 'bladieblablabla', 4, 1, '2015-06-10 00:00:00', '0000-00-00 00:00:00'),
(13, 'nog ewa meer events', 'tralalalalalalalala', 2, 1, '2015-08-06 00:00:00', '0000-00-00 00:00:00'),
(14, 'hier zijn we alweer', 'trolololol', 3, 1, '2015-09-13 00:00:00', '0000-00-00 00:00:00'),
(15, 'dit wordt saai', 'wa moet ne mens nog zeggen omdenduur', 1, 1, '2015-11-21 00:00:00', '0000-00-00 00:00:00'),
(16, 'ee kijk, een vlieg', 'PETS dood', 2, 1, '2015-12-10 00:00:00', '0000-00-00 00:00:00'),
(17, 'kerstmis!!!', 'ho ho ho', 1, 1, '2015-12-25 00:00:00', '0000-00-00 00:00:00'),
(18, 'de sint is er ook bij ', 'zie ginds komt de stoomboot', 6, 1, '2015-12-06 00:00:00', '0000-00-00 00:00:00'),
(19, 'het nieuwe jaar', 'happy newyear !', 2, 1, '2016-01-01 00:00:00', '0000-00-00 00:00:00'),
(31, 'gastenboek2', 'post hier maar iets', 30, 2, '2015-05-25 14:41:21', '2015-05-25 14:41:21'),
(36, 'Piet''s awesome test topic', 'There can only be one who''s the test!', 1, 12, '2015-05-25 03:39:41', '2015-05-25 03:39:41'),
(37, 'Piet''s test topic numero dos', 'Veel plezier met testen', 1, 12, '2015-05-25 03:39:47', '2015-05-25 03:39:47'),
(39, 'Dit moet werken', 'Yaay', 30, 2, '2015-05-25 15:08:59', '2015-05-25 15:08:59');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `gebruikerID` int(11) NOT NULL AUTO_INCREMENT,
  `rolID` int(11) NOT NULL,
  `username` varchar(75) NOT NULL COMMENT 'Ding wat gegenereerd wordt bij aanvraag nieuwe user',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profielfoto` varchar(20) DEFAULT NULL,
  `voornaam` varchar(75) NOT NULL,
  `familienaam` varchar(75) NOT NULL,
  `al_ingelogd` tinyint(4) NOT NULL DEFAULT '0',
  `actief` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=nog niet geactiveerd door admin( en mag dus niet inloggen), 1 = wel',
  PRIMARY KEY (`gebruikerID`),
  UNIQUE KEY `email` (`email`),
  KEY `rolID` (`rolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`gebruikerID`, `rolID`, `username`, `password`, `email`, `profielfoto`, `voornaam`, `familienaam`, `al_ingelogd`, `actief`) VALUES
(1, 1, 'admin.admin', '$2y$10$X67Tp9c2MqMkmgXDhpyUI.27b03m6B59kHOFaGnxk9Xf6guUAqe8y', 'admin.admin@admin.be', NULL, '', '', 1, 1),
(2, 2, 'lid.lid', 'pxl', 'lid.lid@lid.be', NULL, '', '', 0, 0),
(3, 3, 'guest.guest', 'pxl', 'guest.guest@guest.be', NULL, '', '', 0, 0),
(4, 2, 'pxl', '$2y$10$mqocqqNZ00FffJdJX3VadeCdodBKPKtaTBrD0eKTQLj3uG5yn5N5O', 'aaaaaaaaaaaaaaaa@aaaaaaaaaaaaaa', NULL, 'koen', 'vaes', 1, 0),
(6, 2, 'pxl', 'test', 'neen@swek.com', NULL, 'koen', 'vaes', 0, 0),
(7, 2, 'pxl', 'test', 'ja@swek.com', NULL, 'koen', 'vaes', 0, 0),
(12, 2, '"--', 'test', 'koekje@eigendeeg.com', NULL, '"--', '"--', 0, 0),
(29, 2, 'stef.janssens', '$2y$10$e8zRdxlExduRS.YXlTAbJuDTYrlTNLMmh/1Y385WcOaApJEG3d41C', 's.j@hotmail', NULL, 'stef', 'janssens', 1, 0),
(30, 2, 'pxl2', '$2y$10$YmR/SN7H5gnj0LJB4LIoX.ubCp0YkO/UUo4XHHeH1y6GgTpU8pq5m', 's.j@hotmail.com', NULL, 'a', 'a', 1, 1),
(33, 2, 'koen.vaes', 'SP9UE06I', 'koen895@hotmail.com', NULL, 'koen', 'vaes', 0, 0);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `threads` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`categorieID`) REFERENCES `categories` (`categorieID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `roles` (`rolID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
