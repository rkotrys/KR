-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lip 2018, 14:48
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `24486348_radio`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_file`
--

DROP TABLE IF EXISTS `kr_file`;
CREATE TABLE `kr_file` (
  `fid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `acr` int(11) NOT NULL DEFAULT '0',
  `edr` int(11) NOT NULL DEFAULT '3',
  `status` int(11) NOT NULL DEFAULT '0',
  `ackey` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `alias` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `path` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kr_file`
--

INSERT INTO `kr_file` (`fid`, `userid`, `acr`, `edr`, `status`, `ackey`, `cdate`, `acdate`, `name`, `alias`, `path`) VALUES
(2, 1, 0, 3, 1, '1234', '2018-07-16 11:34:12', '2018-07-16 11:34:12', 'Ogłoszenie o konkursie.docx', '', '/doc/1/files/Ogłoszenie o konkursie.docx');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_menu`
--

DROP TABLE IF EXISTS `kr_menu`;
CREATE TABLE `kr_menu` (
  `mid` int(10) UNSIGNED NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `lang` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `acr` int(11) NOT NULL DEFAULT '0',
  `edr` int(11) NOT NULL DEFAULT '3',
  `pid` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(512) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kr_menu`
--

INSERT INTO `kr_menu` (`mid`, `parent`, `position`, `userid`, `lang`, `acr`, `edr`, `pid`, `type`, `status`, `level`, `text`, `link`) VALUES
(1, 3, 2, 1, 'english', 0, 3, 4, 0, 1, 1, 'menu Konsultacje', ''),
(2, 0, 5, 1, 'english', 0, 3, 4, 0, 1, 0, 'Menu Mikroprocesory', ''),
(3, 0, 13, 1, 'english', 0, 3, 17, 0, 1, 0, 'TWWW', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_page`
--

DROP TABLE IF EXISTS `kr_page`;
CREATE TABLE `kr_page` (
  `pid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `lang` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `acr` int(11) NOT NULL,
  `edr` int(11) NOT NULL,
  `lastedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stopdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ackey` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kr_page`
--

INSERT INTO `kr_page` (`pid`, `userid`, `lang`, `status`, `acr`, `edr`, `lastedit`, `startdate`, `stopdate`, `ackey`, `title`, `content`) VALUES
(4, 1, 'english', 0, 0, 3, '2018-07-08 14:33:18', '2018-07-05 22:00:00', '2018-07-12 22:00:00', '', 'Konsultacje', '<h1>Konsultacje</h1>\r\n<p>Poniedziałek 11:30</p>\r\n<p><a title=\"mgc.png\" href=\"/doc/1/files/mgc.png\">document</a></p>'),
(5, 1, 'polish', 1, 2, 1, '2018-07-08 14:33:52', '2018-07-01 22:00:00', '2018-07-11 22:00:00', '1234', 'Dydaktyka', '<h1>Dydaktyka</h1>\r\n<p style=\"text-align: center;\"><img src=\"../../doc/1/images/construction.png\" alt=\"\" width=\"300\" height=\"300\" /></p>'),
(6, 1, 'english', 1, 0, 3, '2018-07-10 11:50:04', '2018-07-08 22:00:00', '0000-00-00 00:00:00', '', 'Mikroprocesory', '<h1>Mikroprocesory</h1>\r\n<ol>\r\n<li>kt&oacute;ry</li>\r\n<li>kt&oacute;ry</li>\r\n</ol>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/doc/1/images/construction.png\" alt=\"construction.png\" width=\"300\" height=\"300\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(16, 2, 'english', 1, 0, 3, '2018-07-09 12:30:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Jan Nowak page 16', '<p>111111111111111</p>'),
(17, 1, 'english', 1, 0, 3, '2018-07-18 11:19:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'TWWW', '<p>TWWW</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_users`
--

DROP TABLE IF EXISTS `kr_users`;
CREATE TABLE `kr_users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `title_pl` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle_pl` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `duty_pl` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `duty_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `uname` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT '1234',
  `resume_pl` text COLLATE utf8_polish_ci,
  `resume_en` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kr_users`
--

INSERT INTO `kr_users` (`userid`, `name`, `surname`, `title_pl`, `title_en`, `subtitle_pl`, `subtitle_en`, `tel`, `email`, `level`, `duty_pl`, `duty_en`, `photo`, `room`, `uname`, `pass`, `resume_pl`, `resume_en`) VALUES
(1, 'Robert', 'Kotrys', 'dr inż.', 'Ph.D.', '', '', '+48 612348723', 'robert.kotrys@gmail.com', 4, 'Wtorek 9:30 - 11:15', '', NULL, '206', 'rkotrys', '1234', 'Opis osoby ... .', 'Resume ... ...'),
(2, 'Jan', 'Nowak', 'mgr', 'Msc', 'Asystent', 'Teaching assistant', '12345678', 'jan@wp.pl', 2, 'Poniedziałek 11:00 - 12:30', 'Monday 11:15-13:00', NULL, '211', 'jnowak', '1234', 'Opis osoby.', 'Resume ... .');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kr_file`
--
ALTER TABLE `kr_file`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `owner` (`userid`);

--
-- Indexes for table `kr_menu`
--
ALTER TABLE `kr_menu`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `kr_page`
--
ALTER TABLE `kr_page`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `kr_users`
--
ALTER TABLE `kr_users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kr_file`
--
ALTER TABLE `kr_file`
  MODIFY `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kr_menu`
--
ALTER TABLE `kr_menu`
  MODIFY `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `kr_page`
--
ALTER TABLE `kr_page`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `kr_users`
--
ALTER TABLE `kr_users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
