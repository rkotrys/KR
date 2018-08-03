-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Sie 2018, 13:40
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
(12, 0, 0, 1, 'english', 0, 3, 4, 0, 1, 0, 'M1 1', ''),
(19, 0, 1, 1, 'english', 0, 3, 6, 0, 1, 0, 'M1 3 3', ''),
(23, 0, 2, 1, 'english', 0, 3, 17, 0, 1, 0, 'M1 4', ''),
(24, 19, 0, 1, 'english', 0, 3, 4, 0, 1, 1, 'M1 5', ''),
(25, 0, 0, 1, 'polish', 0, 3, 5, 0, 1, 0, 'Dydaktyka', ''),
(26, 0, 1, 1, 'polish', 0, 3, 18, 0, 1, 0, 'Konsultacje', ''),
(27, 0, 2, 1, 'polish', 0, 3, 19, 0, 1, 0, 'Dydaktyka mikroprocesory', ''),
(28, 0, 3, 1, 'polish', 0, 3, 20, 0, 1, 0, 'Dydaktyka', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_page`
--

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
(4, 1, 'english', 0, 0, 3, '2018-07-08 14:33:18', '2018-07-05 22:00:00', '0000-00-00 00:00:00', '', 'Konsultacje', '<p>Poniedziałek 11:30</p>\r\n<p><a title=\"mgc.png\" href=\"/doc/1/files/mgc.png\">document</a></p>\r\n<p><a title=\"Ogłoszenie o konkursie.docx\" href=\"/doc/1/files/Ogłoszenie o konkursie.docx\">document nr 1</a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(5, 1, 'polish', 1, 0, 1, '2018-07-08 14:33:52', '2018-07-01 22:00:00', '2018-07-11 22:00:00', '1234', 'Dydaktyka', '<p style=\"text-align: left;\">lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p style=\"text-align: left;\">lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"../../doc/1/images/construction.png\" alt=\"\" width=\"300\" height=\"300\" /></p>\r\n<h2 style=\"text-align: left;\">Przedmiot 1</h2>\r\n<p style=\"text-align: left;\">lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<h2 style=\"text-align: left;\">Przedmiot 2</h2>\r\n<p style=\"text-align: left;\">lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<h2 style=\"text-align: left;\">Przedmiot 3</h2>\r\n<p style=\"text-align: left;\">lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>'),
(6, 1, 'english', 1, 0, 3, '2018-07-10 11:50:04', '2018-07-08 22:00:00', '0000-00-00 00:00:00', '', 'Mikroprocesory', '<ol>\r\n<li>kt&oacute;ry</li>\r\n<li>kt&oacute;ry</li>\r\n</ol>\r\n<p>lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/doc/1/images/construction.png\" alt=\"construction.png\" width=\"300\" height=\"300\" /></p>\r\n<p>lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(16, 2, 'english', 1, 0, 3, '2018-07-09 12:30:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Jan Nowak page 16', '<p>111111111111111</p>'),
(17, 1, 'english', 1, 0, 3, '2018-07-18 11:19:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'TWWW', '<p>lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/doc/1/images/Robert_Kotrys.png\" alt=\"Robert_Kotrys.png\" width=\"300\" height=\"300\" /></p>\r\n<p>ll</p>'),
(18, 1, 'polish', 1, 0, 3, '2018-08-01 09:32:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Konsultacje', '<p>W każda środę od godziny 11:30 do 13:00</p>\r\n<p>Pok&oacute;j 206, Polanka</p>'),
(19, 1, 'polish', 1, 0, 3, '2018-08-01 10:02:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Mikroprocesory', '<p>lorem ipsum lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>'),
(20, 1, 'polish', 0, 0, 3, '2018-08-01 10:39:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'Dydaktyka 2', '<p>asfhgdsgsg</p>\r\n<p>ertgrtytye</p>\r\n<p>werweyweryert</p>'),
(21, 7, 'english', 1, 0, 3, '2018-08-02 12:24:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'działalność', '<div class=\"row about-desc aos-init aos-animate\" data-aos=\"fade-up\">\r\n<div class=\"col-full\">\r\n<div id=\"tresc\">\r\n<h3>Systems and circuits for wireless and wired telecommunications</h3>\r\n<p>Systems and circuits for wireless and wired telecommunications including adaptive receivers (equalizers and joint detectors, carrier synchronization), data transmission techniques for CDMA, OFDM and OFDM/CDMA systems, adaptive modulation, link adaptation and reconfigurable transmitters and receivers for CDMA and OFDM systems, nonlinear distortion minimization and peak to average power ratio reduction, information and channel coding theory and its application in wireless transmission, implementation of mobile communications systems using software defined radio technology.</p>\r\n<h3>WLAN wireless networks</h3>\r\n<p>WLAN wireless networks, digital modulations, trellis coded modulation (TCM), CPM signals, concatenated codes for wireless transmission, optimal and suboptimal algorithms for data reception, multiple access methods for wireless networks, web technologies, e-learning.</p>\r\n<h3>Design for testability of VLSI digital circuits</h3>\r\n<p>Test data volume compression, low-power test data decompression, logic built-in self-test (BIST), memory BIST, fault diagnosis in scan-based designs, test response compaction, handling unknown states, arithmetic BIST.</p>\r\n</div>\r\n</div>\r\n</div>'),
(22, 7, 'english', 1, 0, 3, '2018-08-02 12:24:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'lab_rdio', '<h3>Laboratory of wireless communications</h3>\r\n<p>Rohde&amp;Schwarz measuring equipment featuring the possibility of wireless communications transceivers testing, as well as assessing their performance in fading channels with the aid of hardware simulations: SMIQ generator, FSIQ signal analyzer with a hardware channel simulator and bit error rate measurement, universal radio communication tester CMU200, starter kits equipped with TMS320C6000 DSP processors and compliant with D/A and A/D boards containing FPGA circuits, Software-Defined Radio DSP cards.</p>'),
(23, 7, 'english', 1, 0, 3, '2018-08-02 12:26:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'lab_mikro', '<div class=\"service-text\">\r\n<h3>Laboratory of microelectronic circuits and their application in wireless communications</h3>\r\n<p>Laboratory of microelectronic circuits and their application in wireless communications is used within the European Union 5th Framework Research Project WIND-FLEX (Wireless Indoor Flexible High Bitrate Modem) and since 2004 within the European Union 6th Framework Integrated Research Project WINNER (Wireless World Initiative New Radio: software for system level simulations and FPGA circuits synthesis (Quartus II [ALTERA], Synplify Pro [Synplicity] and ModelSim [Mentor Graphics]).</p>\r\n</div>'),
(24, 7, 'english', 1, 0, 3, '2018-08-02 12:26:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'lab_komp', '<div class=\"service-text\">\r\n<h3>Laboratory of computer science</h3>\r\n<p>Several personal computers equipped with external circuits, used during classes in computer science (C and C++), microprocessors and logical circuits.</p>\r\n</div>'),
(25, 7, 'english', 1, 0, 3, '2018-08-02 12:28:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'lab_procs', '<h3>Laboratory of microprocessors</h3>\r\n<p>A network of personal computers used during classes in microprocessors (8051 external modules and 80x86 assembler) and digital signal processing (MATLAB).</p>'),
(26, 7, 'english', 1, 0, 3, '2018-08-02 12:28:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'lab_wlan', '<div class=\"service-text\">\r\n<h3>Laboratory of WLAN wireless networks</h3>\r\n<p>Laboratory of WLAN wireless networks is equipped with personal computers and 802.11a/b/g compliant wireless devices (adapters, access points, routers, etc.) used during classes on WLAN wireless networks.</p>\r\n</div>'),
(27, 7, 'english', 1, 0, 3, '2018-08-02 12:29:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'osiągnięcia', '<div id=\"tresc\">\r\n<h2>International and collaborative research projects</h2>\r\n<ol>\r\n<li>Participation in the European Union 5th Framework Research Project WIND-FLEX (Wireless Indoor Flexible High Bitrate Modem Architectures).</li>\r\n<li>Participation in the European Union 6th Framework Integrated Research Project WINNER (Wireless World Initiative New Radio) since January 2004 and WINNER II (since January 2006).</li>\r\n<li>Participation in the European Union 6th Framework Network of Excellence NEWCOM (Network of Excellence in Wireless Communications) since January 2004.</li>\r\n<li>Participation (2003-2005) in the European Union international Leonardo da Vinci project INVOCOM (Internet-based vocational training of communication students, engineers, and technicians) which focused on the preparation of interactive educational material that covered the selected areas of electronics and telecommunications. (<a href=\"http://www.invocom.et.put.poznan.pl\" target=\"_blank\" rel=\"noopener\">www.invocom.et.put.poznan.pl</a>).</li>\r\n<li>Development of the Embedded Deterministic Test (EDT) technology for test data compression; a paper describing this technology has been selected as one of the most influential papers published at the IEEE International Test Conference (ICT) in the last 35 years and, in particular, the most significant paper presented at the ITC in 2002; the main archival paper presenting the EDT technology won the IEEE Circuits and Systems Society Donald O. Pederson award recognizing the best paper published in the IEEE Transactions on Computer-Aided Design of Integrated Circuits and Systems in 2004 &ndash; 2005; the EDT technology has been incorporated in the first commercial on-chip test compression product &ndash; TestKompress&reg; marketed by Mentor Graphics Corporation &ndash; a world leader in electronic hardware and software design solutions providing EDA products for semiconductor companies; TestKompress&reg; received three industrial awards: <em>Best in Test</em> of the <em>Test and Measurement world</em> magazine (the best product of the year 2001), <em>Product of the Year</em> of the <em>Electronic Products</em> magazine, <em>Hot 100 Products 2001</em> of the <em>EDN Access</em> magazine.</li>\r\n<li>Co-ordination of two EU international Leonardo da Vinci projects. The project titles are the following: <em>Vocational training for certification in ICT</em> (<a href=\"http://www.train2cert.eu\" target=\"_blank\" rel=\"noopener\">Train2Cert</a>) and <em>International certificates of excellence in selected areas of ICT</em> (<a href=\"http://www.train2cert.eu\" target=\"_blank\" rel=\"noopener\">InCert</a>) (www.incert.eu and www.train2cert.eu).</li>\r\n</ol>\r\n<h2>Monographs and textbooks:</h2>\r\n<ol>\r\n<li>J Rajski, J. Tyszer, <em>Arithmetic built-in self-test for embedded systems</em>, New York, Prentice Hall, 1998</li>\r\n<li>K. Wesołowski, <em>Systemy radiokomunikacji ruchomej</em> (in Polish), Warszawa, WKiŁ, 1998, 1999, 2003</li>\r\n<li>J. Tyszer, <em>Object-oriented computer simulation of discrete-event systems</em>, New York, Kluwer Academic Publishers, 1999</li>\r\n<li>K. Wesołowski, <em>Mobile Communication Systems</em>, Chichester, John Wiley &amp; Sons, 2002</li>\r\n<li>K. Wesołowski, <em>Introduction to Digital Communication Systems </em>(in Polish), Warszawa, WKiŁ, 2003</li>\r\n<li>K. Wesołowski, <em>Sistiemy podwiznoy radiosviazi</em> (in Russian), Goriaczaia Linija Telekom, Moscow, 2006</li>\r\n<li>textbooks published by the Poznan University of Technology Press</li>\r\n</ol>\r\n</div>'),
(28, 7, 'polish', 1, 0, 3, '2018-08-02 12:37:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'osiągnięcia', '<h2>Systems and circuits for wireless and wired telecommunications</h2>\r\n<p>Systems and circuits for wireless and wired telecommunications including adaptive receivers (equalizers and joint detectors, carrier synchronization), data transmission techniques for CDMA, OFDM and OFDM/CDMA systems, adaptive modulation, link adaptation and reconfigurable transmitters and receivers for CDMA and OFDM systems, nonlinear distortion minimization and peak to average power ratio reduction, information and channel coding theory and its application in wireless transmission, implementation of mobile communications systems using software defined radio technology.</p>\r\n<h2>WLAN wireless networks</h2>\r\n<p>WLAN wireless networks, digital modulations, trellis coded modulation (TCM), CPM signals, concatenated codes for wireless transmission, optimal and suboptimal algorithms for data reception, multiple access methods for wireless networks, web technologies, e-learning.</p>\r\n<h2>Design for testability of VLSI digital circuits</h2>\r\n<p>Test data volume compression, low-power test data decompression, logic built-in self-test (BIST), memory BIST, fault diagnosis in scan-based designs, test response compaction, handling unknown states, arithmetic BIST.</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kr_users`
--

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
  `room_pl` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `room_en` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `uname` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT '1234',
  `status` int(11) NOT NULL DEFAULT '0',
  `resume_pl` text COLLATE utf8_polish_ci,
  `resume_en` text COLLATE utf8_polish_ci,
  `interest_pl` text COLLATE utf8_polish_ci NOT NULL,
  `interest_en` text COLLATE utf8_polish_ci NOT NULL,
  `papers_pl` text COLLATE utf8_polish_ci NOT NULL,
  `papers_en` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kr_users`
--

INSERT INTO `kr_users` (`userid`, `name`, `surname`, `title_pl`, `title_en`, `subtitle_pl`, `subtitle_en`, `tel`, `email`, `level`, `duty_pl`, `duty_en`, `photo`, `room_pl`, `room_en`, `uname`, `pass`, `status`, `resume_pl`, `resume_en`, `interest_pl`, `interest_en`, `papers_pl`, `papers_en`) VALUES
(1, 'Robert', 'Kotrys', 'dr inż.', 'Ph.D.', 'Starszy specjalista', 'Senior Specialist', '+48 61 665 3914', 'robert.kotrys@gmail.com', 4, 'Wtorek 9:30 - 11:15', 'Wend. 8:00-9:30', 'doc/1/images/Robert_Kotrys.jpg', 'ul. Polanka 3, sala 206', '', 'rkotrys', '1234', 1, '<p>\nDr inż. Robert Kotrys pracuje w Katedrze Radiokomunikacji, na Wydziale Elektroniki i Telekomunikacji. Od 1992 roku do 2006 był zatrudniony w Instytycie Elektroniki i Telekomunikacji Politechniki Poznańskiej. W roku 2001 uzyskał tytuł doktora w dziedzinie nauk technicznych. Specjalizuje się w zagadnieniach cyfrowych systemów radiokomunikacyjnych. Dr inż. Robert Kotrys opublikował ponad 30 artykułów zamieszczonych w materiałach konferencyjnych oraz czasopismach zagranicznych i krajowych.\n</p>\n<p>\nZainteresowania zawodowe obejmują takie obszary jak: wielowymiarowe kody kratowe TCM, turbo kody, kody wielokrotne, kaskadowe, kodowanie czasowo przestrzenne, warstwa fizyczna i MAC w bezprzewodowych siecich lokalnych, zagadnienia bezpieczeństwa i jakości usług w bezprzewodowych sieciach lokalnych, problematyka zastosowania procesorów sygnałowych (TMSxxx, ADSPxxx) w nadawaniu i odbiorze, zagadnienia zdalnego nauczania oraz techniki i technologie internetowe.\n</p>', '<p>\nRobert Kotrys received his M.Sc. and Ph. D. degrees in Telecommunications from the Poznań University of Technology, Poland, in 1992 and 2001, respectively. Since 1992 he has been working in the Faculty of Electronics and Telecommunications, Poznań University of Technology, where he currently is an Assistant Professor.\n</p><p>\nHe is engaged in research and teaching in the area of telecommunication mobile systems and wireless networks, Internet and intranet technology and distance learning technique, tools and concepts.\n</p><p>\nHe has published several papers which have been published in communication journals and presented at national and international conferences. He participates in research grants funded by national authority as well as in several international projects funded by European Union. The latest EU projects are: InCert and Train2Cert.\n</p>', '', '', '', ''),
(2, 'Jan', 'Nowak', 'mgr', 'Msc', 'Asystent', 'Teaching assistant', '12345678', 'jan@wp.pl', 2, 'Poniedziałek 11:00 - 12:30', 'Monday 11:15-13:00', 'doc/1/images/Jan_Nowak.jpg', 'ul. Polanka 3, sala 211', '', 'jnowak', '1234', 1, 'Opis osoby.', 'Resume ... .', '', '', '', ''),
(3, 'Piotr', 'Remlein', 'dr hab. inż.', 'dr hab. inż.', 'Adiunkt', '', '+ 48 61 665 1234', 'Piotr.Remlein@et.put.poznan.pl', 2, 'Czwartek 12:00 - 13:30', 'Mond. 11:00-12:30', 'doc/1/images/Piotr_Remlein.jpg', 'ul. Polanka 3, sala 236', '', 'remlein', '1234', 1, 'Piotr Remlein uzyskał stopień magistra inżyniera telekomunikacji w 1991 roku i doktora nauk technicznych w 2002 roku. Od października 1992 pracuje w Instytucie Elektroniki i Telekomunikacji Politechniki Poznańskiej najpierw na stanowisku asystenta, a następnie od 1 października 2000 roku na stanowisku wykładowcy. Od 1 października 2002 roku jest adiunktem w tymże Instytucie. Piotr Remlein jest autorem i współautorem ponad 30 publikacji krajowych i zagranicznych. Obszar jego zainteresowań obejmuje przede wszystkim zagadnienia związane z kodowaniem, modulacją i cyfrowym przetwarzaniem sygnałów w bezprzewodowych systemach łączności.', '', '', '', '', ''),
(4, 'Maciej', 'Krasicki', 'dr hab. inż.', NULL, 'Adiunkt', NULL, '61 665 39 18', 'Maciej.Krasicki@put.poznan.pl', 2, 'w czasie wakacji letnich - po umówieniu mailem', NULL, 'doc/1/images/Maciej_Krasicki.jpg', 'ul. Polanka 3, sala 234', '', 'krasicki', '1234', 1, '<p>Maciej Krasicki w 2006 roku ukończył na Politechnice Poznańskiej studia magisterskie w dziedzinie telekomunikacji. W październiku 2010 roku obronił rozprawę doktorską pt. \"Iteracyjny odbiornik dla bezprzewodowych sieci komputerowych\". Od października 2011 roku jest zatrudniony na stanowisku adiunkta.</p>\n<p> \nSwoją działalność naukową prowadzi w Katedrze Radiokomunikacji Wydziału Elektroniki i Telekomunikacji. Obecnie obszarem zainteresowania jest warstwa fizyczna bezprzewodowych sieci komputerowych, ze szczególnym uwzględnieniem techniki wieloantenowej, turbokodowania i kodów przestrzenno-czasowych. Maciej Krasicki prowadzi zajęcia laboratoryjne z techniki cyfrowej, zaawansowanych technik transmisyjnych oraz ćwiczenia w zakresie systemów transmisji cyfrowej.\n</p>', NULL, '', '', '', ''),
(5, 'Marcin', 'Rodziewicz', 'dr inż.', NULL, 'Asystent', NULL, '+48 66 665 3936', 'marcin.rodziewicz@put.poznan.pl', 2, 'Poniedziałek 8:00 - 9:30', NULL, 'doc/1/images/Marcin_Rodziewicz.jpg', 'ul. Polanka 3, sala 237', '', 'rodziewicz', '1234', 1, 'Marcin Rodziewicz ukończył studia magisterskie w roku 2009. Od Października 2009 jest pracownikiem Katedry Radiokomunikacji Wydziału Elektroniki i Telekomunikacji oraz doktorantem Wydziału Elektroniki i Telekomunikacji. W latach 2009-2010 był zatrudniony w ramach projektu EUREKA/CELTIC WINNER+. W latach 2011-2013 zatrudniony był w projekcie Inżynieria Internetu Przyszłości realizowanego w ramach Programu Operacyjnego Innowacyjna Gospodarka. W latach 2013-2015 uczestniczył w projekcie METIS. Marcin Rodziewicz prowadzi zajęcia laboratoryjne z Mikroprocesorów oraz Programowania Terminali Mobilnych', NULL, '', '', '', ''),
(6, '', 'Guest', '', NULL, '', NULL, '', '', 0, '', NULL, '', 'virtual user', '', 'guest', '', 0, 'Każdy gość odwiedzający stronę.', NULL, '', '', '', ''),
(7, '', 'Front', '', NULL, '', NULL, '', '', 2, '', NULL, '', 'virtual user', '', 'front', '1234', 0, 'Właściciel informacji na stronie głównej', NULL, '', '', '', '');

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
  MODIFY `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `kr_page`
--
ALTER TABLE `kr_page`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `kr_users`
--
ALTER TABLE `kr_users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
