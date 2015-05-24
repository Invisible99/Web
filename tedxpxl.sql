-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 24 mei 2015 om 14:47
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
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `roles` (`rolID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
