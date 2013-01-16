-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 16 jan 2013 om 14:48
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
  PRIMARY KEY (`user_id`),
  KEY `city` (`city`,`postal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Lelijke tabel';

--
-- Gegevens worden uitgevoerd voor tabel `adress_data`
--

INSERT INTO `adress_data` (`user_id`, `city`, `street`, `postal`, `postal_extra`, `streetnumber`) VALUES
(0, 'lkdsjfklsdjf', 'dfjasdfjksd', 1234, 'AB', '12A');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_code`
--

CREATE TABLE IF NOT EXISTS `course_code` (
  `course_code` int(11) NOT NULL,
  `course_id` smallint(6) NOT NULL,
  `course_difficulty` smallint(6) NOT NULL,
  PRIMARY KEY (`course_code`,`course_difficulty`),
  KEY `course_id` (`course_id`,`course_difficulty`),
  KEY `course_code` (`course_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Course_code is combinatie course_id en course_difficulty';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_difficulty`
--

CREATE TABLE IF NOT EXISTS `course_difficulty` (
  `difficulty_name` varchar(127) CHARACTER SET utf8 NOT NULL,
  `difficulty_int` int(11) NOT NULL,
  UNIQUE KEY `difficulty_int` (`difficulty_int`),
  UNIQUE KEY `difficulty_name_2` (`difficulty_name`),
  KEY `difficulty_name` (`difficulty_name`,`difficulty_int`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de moeilijkheidsgraad gekoppeld aan een ';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_id`
--

CREATE TABLE IF NOT EXISTS `course_id` (
  `course_name` varchar(127) CHARACTER SET utf8 NOT NULL,
  `course_int` int(11) NOT NULL,
  UNIQUE KEY `subject_name_2` (`course_name`,`course_int`),
  KEY `subject_name` (`course_name`,`course_int`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de vaknaam gekoppeld aan een nummer';

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `course_user_region`
--

CREATE TABLE IF NOT EXISTS `course_user_region` (
  `course_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(63) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `course_code` (`course_code`,`region`),
  KEY `course_code_2` (`course_code`),
  KEY `course_code_3` (`course_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Region kan uitgebouwd worden met tabel' AUTO_INCREMENT=8 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de user_data opgeslagen. De primary key ' AUTO_INCREMENT=1 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
