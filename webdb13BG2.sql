-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 31 jan 2013 om 20:50
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
(6, 'Amsterdam', 'Kinkerstraat', 1234, 'AB', '81'),
(2, 'Hall', 'Lendeweg', 1055, 'DJ', '10'),
(4, 'Leiden', 'Boerhaavelaan', 2334, 'AB', '28'),
(5, 'Amsterdam', 'Zuiderzeeweg', 1234, 'AB', '40'),
(3, 'Amsterdam', 'Kalverstraat', 1234, 'AB', '12'),
(25, 'Amsterdam', 'Rusland', 1111, 'GF', '2'),
(26, 'Utrecht', 'Oudegracht', 3576, 'AA', '223'),
(27, 'Amsterdam', 'Prinsengracht', 1122, 'ZC', '20'),
(28, 'Diemen', 'Rode Kruislaan', 1111, 'XC', '1301C'),
(29, 'Amsterdam', 'Keizersgracht', 1014, 'BJ', '310'),
(30, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1111D'),
(31, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1118D'),
(32, 'Diemen', 'Rode Kruislaan', 1111, 'XD', '1415C'),
(33, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1119E'),
(34, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1212C'),
(35, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1220A'),
(36, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1211A'),
(37, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1201A'),
(38, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1216B'),
(39, 'Diemen', 'Rode Kruislaan', 1111, 'XC', '1316C'),
(40, 'Diemen', 'Rode Kruislaan', 1111, 'XD', '1401A'),
(41, 'Diemen', 'Rode Kruislaan', 1111, 'XE', '1511E'),
(42, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1213A'),
(43, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1111E'),
(44, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1118A'),
(45, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1112A'),
(46, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1215A'),
(47, 'Amsterdam', 'Leidseplein', 1233, 'AB', '1'),
(48, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1213C'),
(49, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1111A'),
(50, 'Amsterdam', 'Sciencepark', 1024, 'XX', '409'),
(51, 'Amsterdam', 'van tuyll van serooskerkenweg', 1076, 'AB', '21'),
(52, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1216A'),
(53, 'Diemen', 'Rode Kruislaan', 1111, 'XE', '1501E'),
(54, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1208A'),
(55, 'Diemen', 'Rode Kruislaan', 1111, 'XA', '1112C'),
(56, 'Diemen', 'Rode Kruislaan', 1111, 'XC', '1308A'),
(57, 'Diemen', 'Rode Kruislaan', 1111, 'XB', '1213E'),
(58, 'Amsterdam', 'Prinsengracht', 1011, 'AB', '221'),
(59, 'Amsterdam', 'Rokin', 1091, 'AC', '32'),
(60, 'Amsterdam', 'Spuistraat', 1094, 'CD', '23'),
(61, 'Amsterdam', 'Roetersstraat', 1000, 'XA', '10'),
(62, 'Amsterdam', 'Spuistraat', 1043, 'XD', '54');

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
(101, 1, 1),
(102, 1, 2),
(103, 1, 3),
(104, 1, 4),
(105, 1, 5),
(106, 1, 6),
(107, 1, 7),
(108, 1, 8),
(109, 1, 9),
(110, 1, 10),
(111, 1, 11),
(201, 2, 1),
(202, 2, 2),
(203, 2, 3),
(204, 2, 4),
(205, 2, 5),
(206, 2, 6),
(207, 2, 7),
(208, 2, 8),
(209, 2, 9),
(210, 2, 10),
(211, 2, 11),
(301, 3, 1),
(302, 3, 2),
(303, 3, 3),
(304, 3, 4),
(305, 3, 5),
(306, 3, 6),
(307, 3, 7),
(308, 3, 8),
(309, 3, 9),
(310, 3, 10),
(311, 3, 11),
(401, 4, 1),
(402, 4, 2),
(403, 4, 3),
(404, 4, 4),
(405, 4, 5),
(406, 4, 6),
(407, 4, 7),
(408, 4, 8),
(409, 4, 9),
(410, 4, 10),
(411, 4, 11),
(501, 5, 1),
(502, 5, 2),
(503, 5, 3),
(504, 5, 4),
(505, 5, 5),
(506, 5, 6),
(507, 5, 7),
(508, 5, 8),
(509, 5, 9),
(510, 5, 10),
(511, 5, 11),
(601, 6, 1),
(602, 6, 2),
(603, 6, 3),
(604, 6, 4),
(605, 6, 5),
(606, 6, 6),
(607, 6, 7),
(608, 6, 8),
(609, 6, 9),
(610, 6, 10),
(611, 6, 11),
(701, 7, 1),
(702, 7, 2),
(703, 7, 3),
(704, 7, 4),
(705, 7, 5),
(706, 7, 6),
(707, 7, 7),
(708, 7, 8),
(709, 7, 9),
(710, 7, 10),
(711, 7, 11),
(801, 8, 1),
(802, 8, 2),
(803, 8, 3),
(804, 8, 4),
(805, 8, 5),
(806, 8, 6),
(807, 8, 7),
(808, 8, 8),
(809, 8, 9),
(810, 8, 10),
(811, 8, 11),
(901, 9, 1),
(902, 9, 2),
(903, 9, 3),
(904, 9, 4),
(905, 9, 5),
(906, 9, 6),
(907, 9, 7),
(908, 9, 8),
(909, 9, 9),
(910, 9, 10),
(911, 9, 11),
(1001, 10, 1),
(1002, 10, 2),
(1003, 10, 3),
(1004, 10, 4),
(1005, 10, 5),
(1006, 10, 6),
(1007, 10, 7),
(1008, 10, 8),
(1009, 10, 9),
(1010, 10, 10),
(1011, 10, 11),
(1101, 11, 1),
(1102, 11, 2),
(1103, 11, 3),
(1104, 11, 4),
(1105, 11, 5),
(1106, 11, 6),
(1107, 11, 7),
(1108, 11, 8),
(1109, 11, 9),
(1110, 11, 10),
(1111, 11, 11),
(1201, 12, 1),
(1202, 12, 2),
(1203, 12, 3),
(1204, 12, 4),
(1205, 12, 5),
(1206, 12, 6),
(1207, 12, 7),
(1208, 12, 8),
(1209, 12, 9),
(1210, 12, 10),
(1211, 12, 11),
(1301, 13, 1),
(1302, 13, 2),
(1303, 13, 3),
(1304, 13, 4),
(1305, 13, 5),
(1306, 13, 6),
(1307, 13, 7),
(1308, 13, 8),
(1309, 13, 9),
(1310, 13, 10),
(1311, 13, 11),
(1401, 14, 1),
(1402, 14, 2),
(1403, 14, 3),
(1404, 14, 4),
(1405, 14, 5),
(1406, 14, 6),
(1407, 14, 7),
(1408, 14, 8),
(1409, 14, 9),
(1410, 14, 10),
(1411, 14, 11),
(1501, 15, 1),
(1502, 15, 2),
(1503, 15, 3),
(1504, 15, 4),
(1505, 15, 5),
(1506, 15, 6),
(1507, 15, 7),
(1508, 15, 8),
(1509, 15, 9),
(1510, 15, 10),
(1511, 15, 11),
(1601, 16, 1),
(1602, 16, 2),
(1603, 16, 3),
(1604, 16, 4),
(1605, 16, 5),
(1606, 16, 6),
(1607, 16, 7),
(1608, 16, 8),
(1609, 16, 9),
(1610, 16, 10),
(1611, 16, 11),
(1701, 17, 1),
(1702, 17, 2),
(1703, 17, 3),
(1704, 17, 4),
(1705, 17, 5),
(1706, 17, 6),
(1707, 17, 7),
(1708, 17, 8),
(1709, 17, 9),
(1710, 17, 10),
(1711, 17, 11),
(1801, 18, 1),
(1802, 18, 2),
(1803, 18, 3),
(1804, 18, 4),
(1805, 18, 5),
(1806, 18, 6),
(1807, 18, 7),
(1808, 18, 8),
(1809, 18, 9),
(1810, 18, 10),
(1811, 18, 11),
(1901, 19, 1),
(1902, 19, 2),
(1903, 19, 3),
(1904, 19, 4),
(1905, 19, 5),
(1906, 19, 6),
(1907, 19, 7),
(1908, 19, 8),
(1909, 19, 9),
(1910, 19, 10),
(1911, 19, 11),
(2001, 20, 1),
(2002, 20, 2),
(2003, 20, 3),
(2004, 20, 4),
(2005, 20, 5),
(2006, 20, 6),
(2007, 20, 7),
(2008, 20, 8),
(2009, 20, 9),
(2010, 20, 10),
(2011, 20, 11),
(2101, 21, 1),
(2102, 21, 2),
(2103, 21, 3),
(2104, 21, 4),
(2105, 21, 5),
(2106, 21, 6),
(2107, 21, 7),
(2108, 21, 8),
(2109, 21, 9),
(2110, 21, 10),
(2111, 21, 11),
(2201, 22, 1),
(2202, 22, 2),
(2203, 22, 3),
(2204, 22, 4),
(2205, 22, 5),
(2206, 22, 6),
(2207, 22, 7),
(2208, 22, 8),
(2209, 22, 9),
(2210, 22, 10),
(2211, 22, 11),
(2301, 23, 1),
(2302, 23, 2),
(2303, 23, 3),
(2304, 23, 4),
(2305, 23, 5),
(2306, 23, 6),
(2307, 23, 7),
(2308, 23, 8),
(2309, 23, 9),
(2310, 23, 10),
(2311, 23, 11),
(2401, 24, 1),
(2402, 24, 2),
(2403, 24, 3),
(2404, 24, 4),
(2405, 24, 5),
(2406, 24, 6),
(2407, 24, 7),
(2408, 24, 8),
(2409, 24, 9),
(2410, 24, 10),
(2411, 24, 11),
(2501, 25, 1),
(2502, 25, 2),
(2503, 25, 3),
(2504, 25, 4),
(2505, 25, 5),
(2506, 25, 6),
(2507, 25, 7),
(2508, 25, 8),
(2509, 25, 9),
(2510, 25, 10),
(2511, 25, 11),
(2601, 26, 1),
(2602, 26, 2),
(2603, 26, 3),
(2604, 26, 4),
(2605, 26, 5),
(2606, 26, 6),
(2607, 26, 7),
(2608, 26, 8),
(2609, 26, 9),
(2610, 26, 10),
(2611, 26, 11),
(2701, 27, 1),
(2702, 27, 2),
(2703, 27, 3),
(2704, 27, 4),
(2705, 27, 5),
(2706, 27, 6),
(2707, 27, 7),
(2708, 27, 8),
(2709, 27, 9),
(2710, 27, 10),
(2711, 27, 11),
(2801, 28, 1),
(2802, 28, 2),
(2803, 28, 3),
(2804, 28, 4),
(2805, 28, 5),
(2806, 28, 6),
(2807, 28, 7),
(2808, 28, 8),
(2809, 28, 9),
(2810, 28, 10),
(2811, 28, 11),
(2901, 29, 1),
(2902, 29, 2),
(2903, 29, 3),
(2904, 29, 4),
(2905, 29, 5),
(2906, 29, 6),
(2907, 29, 7),
(2908, 29, 8),
(2909, 29, 9),
(2910, 29, 10),
(2911, 29, 11),
(3001, 30, 1),
(3002, 30, 2),
(3003, 30, 3),
(3004, 30, 4),
(3005, 30, 5),
(3006, 30, 6),
(3007, 30, 7),
(3008, 30, 8),
(3009, 30, 9),
(3010, 30, 10),
(3011, 30, 11),
(3101, 31, 1),
(3102, 31, 2),
(3103, 31, 3),
(3104, 31, 4),
(3105, 31, 5),
(3106, 31, 6),
(3107, 31, 7),
(3108, 31, 8),
(3109, 31, 9),
(3110, 31, 10),
(3111, 31, 11),
(3201, 32, 1),
(3202, 32, 2),
(3203, 32, 3),
(3204, 32, 4),
(3205, 32, 5),
(3206, 32, 6),
(3207, 32, 7),
(3208, 32, 8),
(3209, 32, 9),
(3210, 32, 10),
(3211, 32, 11);

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
('Culturele Kunstzinnige Vorming', 32),
('Duits', 11),
('Economie', 12),
('Engels', 4),
('Filosofie', 30),
('Frans', 10),
('Fries', 20),
('Geschiedenis', 28),
('Grieks', 14),
('Informatica', 27),
('Italiaans', 22),
('Kunst Algemeen', 31),
('Latijn', 13),
('M & O', 15),
('Maatschappijwetenschappen', 29),
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
(101, 2),
(102, 3),
(106, 3),
(106, 4),
(103, 5),
(105, 3),
(103, 3),
(104, 6),
(107, 10),
(311, 54),
(211, 54),
(111, 54),
(2811, 53),
(711, 53),
(211, 53),
(111, 53),
(1411, 52),
(1911, 52),
(2911, 52),
(111, 55),
(1211, 55),
(2311, 55),
(1011, 56),
(2111, 56),
(2211, 56),
(1311, 57),
(1811, 57),
(2311, 57),
(711, 58),
(1211, 58),
(2311, 58),
(611, 60),
(711, 60),
(811, 60),
(911, 60),
(1811, 60),
(911, 61),
(1811, 61),
(2711, 61),
(1711, 62),
(2411, 62);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Genummerde unieke user_id',
  `username` varchar(31) CHARACTER SET utf8 NOT NULL COMMENT 'Gebruikersnaam ingevuld door user in reg.form.',
  `password` char(255) CHARACTER SET utf8 NOT NULL COMMENT 'Wachtwoord na hashing.',
  `user_type` tinyint(4) NOT NULL,
  `salt` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `username_2` (`username`),
  KEY `username_3` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='In deze tabel wordt de user_data opgeslagen. De primary key ' AUTO_INCREMENT=63 ;

--
-- Gegevens worden uitgevoerd voor tabel `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `password`, `user_type`, `salt`) VALUES
(1, 'Emma123', '1111', 1, ''),
(2, 'Emma1243', '1111', 1, ''),
(3, 'alexandervansomeren', 'pw28321', 1, ''),
(4, 'spacekees', 'tralili', 1, ''),
(5, 'desuperuser', 'lois', 1, ''),
(6, 'lauraa-lauu', 'geheim', 1, ''),
(7, 'EmmaTEST', ' Geheim!', 2, ''),
(8, 'usernaampje', 'geheim', 1, ''),
(9, 'usernaampje2', 'geheim', 1, ''),
(10, 'Emmam', 'Emaowut', 1, ''),
(62, 'HalleBalle', '02efd9c8f9dcf3191f7a07a14bc886edfda50eab', 1, '370b37c7c541b8b79443e4e2ff15ff3d'),
(21, 'alexsomer', '16da7bc06a089eb09703f655c7d170b62676f6d5', 1, '8209884f24c895621ab7bd18e252d921'),
(22, 'alexsomer2', 'c93343504be92e8fb170479d56eadfb70794b4f4', 1, '0d5ffb59286f39fd922b08e27717cfe6'),
(23, 'alexsomer3', '8802d284a6015ebbb0e879deb3f65dc033470544', 1, 'eece8c59c3992fa3b48cc845a8168e42'),
(24, 'alexsomer4beheer', '', 3, ''),
(61, 'GeaBea', '707fe7be06fd4bac41fc4cab00e08a6802266021', 1, '3da25f257b8fd7551ee27fbff94093f4'),
(60, 'Alexander2', 'b4e91390a0a12711e7951045dbc1f5c463a7f1b6', 1, 'f17d839942e5e3f2de69768cece796a0'),
(59, 'EmmaAccount2', 'aa6cd0da344765416f316116d48e55d420a7a487', 2, '7420ec6fb1ffdd09170adc801947cd9d'),
(43, 'Salty', '469af9fb680229926e8f355dae1bc913a1058ff8', 2, 'bb688045ebc61c8bf3e738cbe5308c91'),
(58, 'KoningMetBaard', '7e0815b87afea769777a6940fbdd9f243e260dc3', 1, '6f43b8b9a6693cc4903a4b64700da7fb'),
(57, 'Willem123', 'cffc21e8ea25fdf770d0281cac5c912f4282051a', 1, '4b39ae6acc0feddb4b78e7ff0cf67178'),
(56, 'Hoefijzer', '0d669d6fef1bb9b6782bf63abd55d012700f7c1d', 1, '501a0533fde858c4c6797cce56aad1e9'),
(55, 'Froukje00', '955418982aa865cb42f585e48ca76180cb290416', 1, 'd16d4ddc28c3dd92bcc7589a6ef749d0'),
(54, 'Francine', 'e44c58b73c2fb64a4c39be783a9ae64ad1119074', 1, 'cf90c321a87193c21fe23902285b29df'),
(53, 'FiekeWieke', '3f230b4e85298d404b90d1dce04befa852cd5c0d', 1, '60236446bffa467da252584eb0c57cf6'),
(51, 'Lars', '07b7d696f399e6d4e4761459427e4cdc38d42a49', 1, 'dd5c0702b66979f4a06e77cf513e1e1e'),
(52, 'Bierbierbier', '6931eabcc6b68d33b00c6fa70958faa4a042f278', 2, 'ec60f0d8946fe4d62e114587d9990580');

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
  `last_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `gender` (`gender`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user_personal_data`
--

INSERT INTO `user_personal_data` (`user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `emailadress`, `phone_1`, `phone_2`, `date_of_birth`, `about_me`, `last_login`) VALUES
(2, 'Laura', 'van de soms', 'Helgering', 0, 'laura_helgering@hotmail.com', '612345678', '687654321', '1994-01-25', 'Hoi, ik ben laura :)', 2012),
(4, 'Bas', NULL, 'Nachtegaal', 1, 'bas@nachtegaal.eu', '0031641688333', NULL, '1984-10-11', 'participating at website building course, like a boss!', NULL),
(6, 'Super', NULL, 'Tim', 1, 'asdf@live.nl', '0612345678', '0612345678', '1992-06-16', 'Ik ben een blije student! Ik heet Tim en ben heel vriendelijk tegen insecten. Daarom dus ook extra goed in biologie!', NULL),
(10, 'Berend', 'de ', 'Bolle Bijlesdocent', 1, 'berend@bol.com', '0612345678', '0693969395\r\n', '1992-06-16', 'Ik ben op dezelfde dag jarig als Super Tim! Is dat niet grappig. Verder is er weinig over mij te weten behalve dus dat ik een superbe bijlesdocent ben! Hahahha hah ahh ahha ha aaaaaah ha :) :D', NULL),
(3, 'Hester', 'van', 'Trommel', 0, 'hes@trom.nl', '0612345678', '0698765432', '2013-01-09', 'Ik ben Hester en ik studeer Pyschologie. Ik woon samen met twee supercoole huisgenoten :D', 1234),
(11, 'Hester', 'van', 'Trommel', 0, 'hes@trom.nl', '0612345678', '0698765432', '2013-01-09', 'Ik ben Hester en ik studeer Pyschologie. Ik woon samen met twee supercoole huisgenoten :D', NULL),
(0, 'Alexander', 'van ', 'Someren', 1, 'alexanderensomeren@someren.nl', NULL, '0612345678', '2013-01-31', 'Hallo ik ben Alexander van Someren. Ik ga in de zomer op vakantie en ga dan veel van de muziek die nu ook op staat spelen.', 2013),
(43, 'Salt', 'van', 'Peperen', 0, 'salt@pepper.com', '0634523432', '', '1965-01-01', 'Nee niet echt, ballalalbn', NULL),
(51, 'Lars', '', 'Kemperman', 1, 'lars@kemperman.nl', '112233441', '', '1990-01-01', 'Ik wil eigenlijk geen bijles geven.', NULL),
(52, 'Zoey', 'op ''t', 'Veldt', 0, 'Zotv@hotmail.com', '0613245345', '', '1993-01-02', 'Hallo, ik ben Zoey!', NULL),
(53, 'Fieke', 'de', 'Wieke', 0, 'Fdewieke@live.nl', '0613245678', '0202345465', '1991-01-02', 'Hallo ik ben Fieke de Wieke. Ik hou van paarden en bijles geven. Verder ben ik heel blij en vrolijk. Groetjes!!!!!!!!!!', NULL),
(54, 'Francine', '', 'Olmenbos', 0, 'folmenbos@live.nl', '0617384654', '', '1998-02-03', 'Hallo ik ben Francine. Ik geef graag bijles. Ik kan heel goed Scheikunde. Tot ziens!', NULL),
(55, 'Froukje', 'van', 'Franiken', 0, 'fffff@hotmail.com', '0612345678', '', '1992-03-02', 'Nee, maar ik spreek goed Russisch.', NULL),
(56, 'Frits', 'de', 'Boer', 1, 'boerenfrits@live.nl', '0203546575', '', '1992-01-03', 'Hallo ik ben Frits. Ik spreek talen uit Zuid-Europa. Frans, Italiaans en Spaans. Grieks spreek ik ook, maar niet zo goed. Adieu!', NULL),
(57, 'Willem', 'de', 'Vrolijke', 1, 'wdv@live.nl', '0613254657', '', '1991-02-03', 'Hallo ik ben Willem. Weerwolf Willem', NULL),
(58, 'Willem', 'de', 'Vierde', 1, 'koningwillem@oranje.nl', '0612312321', '', '1976-02-01', 'Hallo ik ben Willem de Vierde. Een koning met een baard.', NULL),
(59, 'Emma', 'van der', 'Velden', 0, 'evdv@gmail.com', '0634523431', '', '1990-08-01', '', NULL),
(60, 'Alex-Sander', 'van', 'Zomeren', 1, 'alxvz@gmail.com', '0203457693', '', '1995-01-03', 'Ik geef heel veel bijles.', NULL),
(61, 'Gea', 'de', 'Boerin', 0, 'gedebe@live.nl', '02013276856', '', '1992-03-01', 'Ik geef alleen bijles ana slimme mensne.', NULL),
(62, 'Halle', '', 'Groenhart', 1, 'hallegroenhart@live.nl', '0645673543', '', '1981-02-03', '--', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
