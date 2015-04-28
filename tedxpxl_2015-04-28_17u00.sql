-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 28 apr 2015 om 15:03
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Tabelstructuur voor tabel `forumbericht`
--

CREATE TABLE IF NOT EXISTS `forumbericht` (
  `berichtID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL,
  `gebruikerID` int(11) NOT NULL,
  `bericht` text NOT NULL,
  `postDate` date NOT NULL,
  PRIMARY KEY (`berichtID`),
  KEY `gebruikerID` (`gebruikerID`),
  KEY `topicID` (`topicID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `forumbericht`
--

INSERT INTO `forumbericht` (`berichtID`, `topicID`, `gebruikerID`, `bericht`, `postDate`) VALUES
(3, 2, 1, 'Dit is een eerste testbericht binnen het testTopic, ook gepost door gebruiker 1', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forumcategorie`
--

CREATE TABLE IF NOT EXISTS `forumcategorie` (
  `categorieID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(75) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  PRIMARY KEY (`categorieID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forumtopic`
--

CREATE TABLE IF NOT EXISTS `forumtopic` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(75) NOT NULL,
  `bericht` text NOT NULL,
  `gebruikerID` int(11) NOT NULL COMMENT 'gebruiker die deze topic heeft aangemaakt',
  PRIMARY KEY (`topicID`),
  KEY `gebruikerID` (`gebruikerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `forumtopic`
--

INSERT INTO `forumtopic` (`topicID`, `titel`, `bericht`, `gebruikerID`) VALUES
(2, 'testtopic', 'dit is een topic om te testen, gemaakt door gebruiker 1', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikerID` int(11) NOT NULL AUTO_INCREMENT,
  `rolID` int(11) NOT NULL,
  `loginNaam` varchar(75) NOT NULL COMMENT 'Ding wat gegenereerd wordt bij aanvraag nieuwe user',
  `nickName` varchar(75) NOT NULL COMMENT 'wat de user zelf kiest?',
  `wachtwoord` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL COMMENT 'geen idee of dit hier nnog moet opgeslagen worden',
  `voorNaam` varchar(75) NOT NULL,
  `familieNaam` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profielfoto` mediumblob NOT NULL,
  PRIMARY KEY (`gebruikerID`),
  UNIQUE KEY `email` (`email`),
  KEY `rolID` (`rolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikerID`, `rolID`, `loginNaam`, `nickName`, `wachtwoord`, `salt`, `voorNaam`, `familieNaam`, `email`, `profielfoto`) VALUES
(1, 1, 'testlogin', 'testnick', 'testww', 'testsalt', 'testvn', 'testfn', 'testemail', 0x89504e470d0a1a0a0000000d494844520000006400000064080600000070e29554000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec400000ec401952b0e1b0000054249444154785eed9d3d8b544914867b44d8d44804415934538365fe8426032ec206e6636ca86220a2ffc0c0c937d9c0c049cc36da7084653153c440c4cccc4c776fdd7e9bd9b7e7784e7ddd7b66fa3cd054dbddb76e75d579ea54ddeeb1b7beffc72270c3a96519386165c89dc5567a606e9e2f8e16766babae7d98085abd4fb4b3757d618833aa0d691d297b4235bbdbcb3b85ec1d2cef10bb63f3cdb0c161c809a799218cb53e36a2d6845cd81cc998daf7a9118638a5d92a2b378260c6d44668c01898d2db0c108638a5bb2100f57b35838129cbee59230cd9102633043b6def6630922961c886d0cc10c0a61c57331836250cd910ba197252cc60789f528a9473c31067c4804cc460c4e11b1866a6c3b3530c8833563984a9cd29c765479e8b9643a4dcc070ffe2b830c419a221129a39adcc5845a253c3a41dbc86d47f618853d6f621d63950a2d5fe230c095cb03620c3086a79a22743e40db70f2f9ea61bfe2da13def056bbf8621ce1007a497295347f4dc06e5f66318e20c3703824846ee00d65c2231acd2865be9f1a594ce30618833d401291de9a9c83520d794dcd7d7128638c33c20bd4c410472ee60acb9447bde5a4f29b5fd148638a3f83375e99a97742d0bd1283dfe233b8ee2e2aff75389fab81e7e1e585f07b476e75ecbd208439c91fd798886d5108ed45238c21f3cf87f7d9a4920d79430644398dd1029220147bc04221c6806e0fcb58421279cee8648665873c7932763645b4d016c0ca3b547ca296c561872c299cc108048d42258c27abc6460ee719a29a5ddc7fbbef84cdd29cd0d013005d49ac1480648e0bcbf9c4bc51a8ff65ea67267672795bd4c91ae8884214e591922cd69a5b021ef1fdf4ee5cf0f7f4f652db986fc7dfa6a2a9fdd1d0db87826158b0f5fc6f2d5dbf1fdeeefefa712a6e4b69b4db15e230c439c221ac2588d8119d21cdc8a5c432edcbc97caeb97c7f6498600290702bc1f368209438e39ea800c23579b4f3619f49fb51fc31067345f6561eec5ea04609552bbdacacd1de0a7b3975279e3d66fa9645e7f1adfefe7bffe48e5d73fc77d09b71be0712d8768a0dfd1df61883326dba9338874ebeaabd48c52bebd79934ac9e44edd168678a39b21129c634e5db9924a2b304a33c6fa3a86cd98b87bc2106fcc6608e0d58bd5182df758cd801180734618b2e1cc6688f489221bd31b3682dbd5aa7bacd70ac31067883b75a674e72e01531081dabee5daa5f3cb7b65fcf3eee3f2ded1703b72cdb05ed59508439c623684e965ccf3dd54acb8b337961cc1d67d081fa7d55f4ba929618853b20d696d06907208225a3245423203f530ad0c01a5334e18e28cd95659409adb01225a32454232433bcf5ca684214e716f08e0b9df6a08b0d6dfda1060eddf30c419ea800c23d7c38e218287db10b95af41e06afc7f14caf7aa7220c71863820bdccb032cce99c375ad0ab5e0d6b7f8621ce585b65955ac1ab08a91ecccfdafc8e28965e87e77955a4d5afd50ba4faa5d5526ebf49fd158638636588156d3d0d34430047aa14c1789c910c614acf63354443ea0fd41786384534a43412806688f61d5f44ae16c992219a116c02e076b5324482fb290c7186f95a9615c90c864d01884cab21125643a4f30b13c78a5ea68421ce98cd10c0ab2244a6b45a6a85741ecd0c10866c08b319229d0fc72372b7b7e9bf4e587270307eb5907ff7dc7a1c4ce076d4b6bf9430c429931ba29d87235d837f2d0dbf81a5211902a636250c714a33436acd006c88f40d457c33513224f7388956ef4b230c714af7011922a8268a86bf70e2bf722aa1b41eb4bff67d5809439cd13c87b4aa0768abaddc5596b6bab2c2ed6c555f18e28c9521810fc210572c16ff02f5bc76944264e4680000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE IF NOT EXISTS `rollen` (
  `rolID` int(11) NOT NULL AUTO_INCREMENT,
  `rolNaam` varchar(75) NOT NULL,
  PRIMARY KEY (`rolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `rollen`
--

INSERT INTO `rollen` (`rolID`, `rolNaam`) VALUES
(1, 'admin'),
(2, 'lid'),
(3, 'niet-lid');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `forumbericht`
--
ALTER TABLE `forumbericht`
  ADD CONSTRAINT `forumbericht_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `forumtopic` (`topicID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forumbericht_ibfk_3` FOREIGN KEY (`gebruikerID`) REFERENCES `gebruikers` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `forumtopic`
--
ALTER TABLE `forumtopic`
  ADD CONSTRAINT `forumtopic_ibfk_1` FOREIGN KEY (`gebruikerID`) REFERENCES `gebruikers` (`gebruikerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `gebruikers_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `rollen` (`rolID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
