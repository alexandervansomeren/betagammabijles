-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 24 jan 2013 om 10:23
-- Serverversie: 5.1.61
-- PHP-versie: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `webdb13BG2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adress_data`
--

CREATE TABLE IF NOT EXISTS `adress_data` (
  `user_id` int(11) NOT NULL,
  `city` varchar(63) CHARACTER SET utf8 NOT NULL,
  `street` varchar(127) CHARACTER SET utf8 NOT NULL,
  `postal` smallint(6) NOT NULL,
  `postal_extra` varchar(4) CHARACTER SET utf8 NOT NULL,
  `streetnumber` varchar(31) CHARACTER SET utf8 NOT NULL,
  KEY `city` (`city`,`postal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Lelijke tabel';

--
-- Gegevens worden uitgevoerd voor tabel `adress_data`
--

INSERT INTO `adress_data` (`user_id`, `city`, `street`, `postal`, `postal_extra`, `streetnumber`) VALUES
(10, 'Amsterdam', 'asdf', 1234, 'AB', '12A'),
(2, 'Amsterdam', 'twee koningskinderenstraat', 1055, 'DJ', '17HS'),
(4, 'Hall', 'lendeweg', 6964, 'CK', '10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_code`
--

CREATE TABLE IF NOT EXISTS `course_code` (
  `course_code` int(11) NOT NULL,
  `course_id` smallint(6) NOT NULL,
  `course_difficulty` smallint(6) NOT NULL,
  PRIMARY KEY (`course_code`),
  KEY `course_id` (`course_id`,`course_difficulty`),
  KEY `course_code` (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Course_code is combinatie course_id en course_difficulty';

--
-- Gegevens worden uitgevoerd voor tabel `course_code`
--

INSERT INTO `course_code` (`course_code`, `course_id`, `course_difficulty`) VALUES
(1, 1, 1),
(3, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_difficulty`
--

CREATE TABLE IF NOT EXISTS `course_difficulty` (
  `difficulty_name` varchar(127) CHARACTER SET utf8 NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  UNIQUE KEY `difficulty_int` (`difficulty_id`),
  UNIQUE KEY `difficulty_name_2` (`difficulty_name`),
  KEY `difficulty_name` (`difficulty_name`,`difficulty_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de moeilijkheidsgraad gekoppeld aan een ';

--
-- Gegevens worden uitgevoerd voor tabel `course_difficulty`
--

INSERT INTO `course_difficulty` (`difficulty_name`, `difficulty_id`) VALUES
('Basic', 1),
('Basisschool', 2),
('HAVO-bovenbouw', 9),
('HAVO-onderbouw', 8),
('PRO', 3),
('VMBO-BBL', 4),
('VMBO-GL', 6),
('VMBO-KBL', 5),
('VMBO-T', 7),
('VWO-bovenbouw', 11),
('VWO-onderbouw', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_id`
--

CREATE TABLE IF NOT EXISTS `course_id` (
  `course_name` varchar(127) CHARACTER SET utf8 NOT NULL,
  `course_id` smallint(6) NOT NULL,
  UNIQUE KEY `subject_name_2` (`course_name`,`course_id`),
  KEY `subject_name` (`course_name`,`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de vaknaam gekoppeld aan een nummer';

--
-- Gegevens worden uitgevoerd voor tabel `course_id`
--

INSERT INTO `course_id` (`course_name`, `course_id`) VALUES
('Aardrijkskunde', 1),
('ANW', 19),
('Arabisch', 25),
('Biologie', 2),
('Duits', 11),
('Economie', 12),
('Engels', 4),
('Frans', 10),
('Fries', 20),
('Grieks', 14),
('Informatica', 27),
('Italiaans', 22),
('Latijn', 13),
('M & O', 15),
('MaL', 16),
('Muziek', 17),
('Natuurkunde', 18),
('Nederlands', 5),
('NLT', 26),
('Russisch', 23),
('Scheikunde', 3),
('Spaans', 21),
('Turks', 24),
('Wiskunde A', 6),
('Wiskunde B', 7),
('Wiskunde C', 8),
('Wiskunde D', 9);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_user`
--

CREATE TABLE IF NOT EXISTS `course_user` (
  `course_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `course_code` (`course_code`),
  KEY `course_code_2` (`course_code`),
  KEY `course_code_3` (`course_code`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Region kan uitgebouwd worden met tabel';

--
-- Gegevens worden uitgevoerd voor tabel `course_user`
--

INSERT INTO `course_user` (`course_code`, `user_id`) VALUES
(1, 2),
(2, 2),
(1, 4),
(1, 4),
(3, 4),
(1, 6),
(1, 6),
(1, 6),
(1, 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Genummerde unieke user_id',
  `username` varchar(31) CHARACTER SET utf8 NOT NULL COMMENT 'Gebruikersnaam ingevuld door user in reg.form.',
  `password` char(63) CHARACTER SET utf8 NOT NULL COMMENT 'Wachtwoord na hashing.',
  `user_type` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`),
  KEY `username_3` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de user_data opgeslagen. De primary key ' AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `password`, `user_type`) VALUES
(1, 'Emma123', '1111', 1),
(2, 'Emma1243', '1111', 1),
(3, 'alexandervansomeren', 'pw28321', 1),
(4, 'spacekees', 'tralili', 1),
(5, 'desuperuser', 'lois', 1),
(6, 'lauraa-lauu', 'geheim', 1),
(7, 'EmmaTEST', ' Geheim!', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_personal_data`
--

CREATE TABLE IF NOT EXISTS `user_personal_data` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(31) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(31) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Tussenvoegsel',
  `last_name` varchar(63) CHARACTER SET utf8 NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `emailadress` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_1` varchar(31) CHARACTER SET utf8 DEFAULT NULL,
  `phone_2` varchar(31) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `about_me` text CHARACTER SET utf8,
  PRIMARY KEY (`user_id`),
  KEY `gender` (`gender`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user_personal_data`
--

INSERT INTO `user_personal_data` (`user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `emailadress`, `phone_1`, `phone_2`, `date_of_birth`, `about_me`) VALUES
(6, 'laura', 'de', 'helgering', 1, 'laura_helgering@hotmail.com', '612345678', '687654321', '1994-01-25', 'hoi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
