-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 24 mei 2015 om 14:53
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
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categorieID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  PRIMARY KEY (`categorieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`categorieID`, `titel`, `omschrijving`) VALUES
(1, 'Evenementen', 'Hier komen alle geplande en voorbije evenementen.'),
(2, 'Gasten forum', 'forum voor de gasten'),
(3, 'Leden forum', 'forum voor de leden'),
(4, 'Nieuws', 'Al het nieuws van TedxPxl');

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
  `postDate` date NOT NULL,
  `latestPost` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`berichtID`),
  KEY `gebruikerID` (`gebruikerID`),
  KEY `topicID` (`topicID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
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
  `latestThread` tinyint(4) NOT NULL DEFAULT '1',
  `eventDate` date DEFAULT NULL COMMENT 'enkel nodig bij topics over events',
  PRIMARY KEY (`topicID`),
  KEY `gebruikerID` (`gebruikerID`),
  KEY `categorieID` (`categorieID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Gegevens worden geëxporteerd voor tabel `threads`
--

INSERT INTO `threads` (`topicID`, `titel`, `bericht`, `gebruikerID`, `categorieID`, `latestThread`, `eventDate`) VALUES
(1, 'Support', 'Stel hier je vragen!', 4, 2, 1, '0000-00-00'),
(2, 'Welkom leden', 'Maak kennis met de andere leden hier', 4, 3, 1, '0000-00-00'),
(3, 'Website launch party', 'De party van het jaar! De nieuwe website wordt gelauncht!', 4, 1, 1, '0000-00-00'),
(4, 'Nieuwe website in de maak', 'We zijn een nieuwe website aan het maken. Woop Woop!', 4, 4, 1, '0000-00-00'),
(5, 'Dit is een test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, 0, '2015-05-14'),
(6, 'nog een test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, 0, '2015-06-03'),
(9, 'zoveelste test event', 'lqjsdlmfjazlerjmljlkjlmsdjfmljsd\r\nfmljsmdfljmlksqdf\r\nmlsdjfmlqsjfmlkjqdf\r\nmjsdmlfjmqlsdjf', 4, 1, 0, '2015-07-14'),
(11, 'hupla nog wa testen', 'bladieblablabla', 4, 1, 0, '2015-06-10'),
(13, 'nog ewa meer events', 'tralalalalalalalala', 2, 1, 0, '2015-08-06'),
(14, 'hier zijn we alweer', 'trolololol', 3, 1, 0, '2015-09-13'),
(15, 'dit wordt saai', 'wa moet ne mens nog zeggen omdenduur', 1, 1, 1, '2015-11-21'),
(16, 'ee kijk, een vlieg', 'PETS dood', 2, 1, 1, '2015-12-10'),
(17, 'kerstmis!!!', 'ho ho ho', 1, 1, 0, '2015-12-25'),
(18, 'de sint is er ook bij ', 'zie ginds komt de stoomboot', 6, 1, 0, '2015-12-06'),
(19, 'het nieuwe jaar', 'happy newyear !', 2, 1, 1, '2016-01-01'),
(20, 'nog 1tje voor 2016 se', 'pffffffffffffffffffffffffffffffffffff', 3, 1, 1, '2016-04-05');

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
  `profielfoto` mediumblob,
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
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `threads` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`gebruikerID`) REFERENCES `users` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
