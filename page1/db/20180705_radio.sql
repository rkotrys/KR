
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `kr_file`;
DROP TABLE IF EXISTS `kr_menu`;
DROP TABLE IF EXISTS `kr_page`;
DROP TABLE IF EXISTS `kr_users`;
CREATE TABLE IF NOT EXISTS `kr_file` (
  `fid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `acr` int(11) NOT NULL DEFAULT '0',
  `edr` int(11) NOT NULL DEFAULT '3',
  `status` int(11) NOT NULL DEFAULT '0',
  `ackey` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `alias` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `path` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `owner` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `kr_menu` (
  `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `lang` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `acr` int(11) NOT NULL DEFAULT '0',
  `edr` int(11) NOT NULL DEFAULT '3',
  `pid` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE IF NOT EXISTS `kr_page` (
  `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `lang` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `acr` int(11) NOT NULL,
  `edr` int(11) NOT NULL,
  `lastedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stopdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ackey` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE IF NOT EXISTS `kr_users` (
  `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `title_pl` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle_pl` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user',
  `duty_pl` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `duty_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `uname` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT '1234',
  `resume_pl` text COLLATE utf8_polish_ci,
  `resume_en` text COLLATE utf8_polish_ci,
  PRIMARY KEY (`userid`),
  KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

INSERT INTO `kr_users` (`userid`, `name`, `surname`, `title_pl`, `title_en`, `subtitle_pl`, `subtitle_en`, `tel`, `email`, `level`, `duty_pl`, `duty_en`, `photo`, `room`, `uname`, `pass`, `resume_pl`, `resume_en`) VALUES
(1, 'Robert', 'Kotrys', 'dr inż.', 'Ph.D.', '', '', '+48 612348723', 'robert.kotrys@gmail.com', 'staff', 'Wtorek 9:30 - 11:15', '', NULL, '206', 'rkotrys', '1234', 'Opis osoby ... .', 'Resume ... ...'),
(2, 'Jan', 'Nowak', 'mgr', 'Msc', 'Asystent', 'Teaching assistant', '12345678', 'jan@wp.pl', 'staff', 'Poniedziałek 11:00 - 12:30', 'Monday 11:15-13:00', NULL, '211', 'jnowak', '1234', 'Opis osoby.', 'Resume ... .');

COMMIT;