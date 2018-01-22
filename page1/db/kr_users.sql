-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2018, 12:57
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
-- Struktura tabeli dla tabeli `kr_users`
--

CREATE TABLE `kr_users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_polish_ci NOT NULL DEFAULT 'user',
  `duty` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `duty_en` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `resume` text COLLATE utf8_polish_ci,
  `resume_en` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kr_users`
--

INSERT INTO `kr_users` (`userid`, `name`, `surname`, `title`, `title_en`, `subtitle`, `subtitle_en`, `tel`, `email`, `level`, `duty`, `duty_en`, `photo`, `room`, `resume`, `resume_en`) VALUES
(1, 'Robert', 'Kotrys', 'dr inż.', '', NULL, '', '+48 612348723', 'robert.kotrys@gmail.com', 'user', 'Wtorek 9:30 - 11:15', '', NULL, '', NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kr_users`
--
ALTER TABLE `kr_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kr_users`
--
ALTER TABLE `kr_users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
