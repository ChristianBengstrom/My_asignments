-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Vært: localhost
-- Genereringstid: 03. 10 2018 kl. 10:42:00
-- Serverversion: 10.1.36-MariaDB
-- PHP-version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `media`
--

CREATE TABLE `media` (
  `channel` int(11) NOT NULL,
  `mediaurl` varchar(64) NOT NULL,
  `mimetype` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `media`
--

INSERT INTO `media` (`channel`, `mediaurl`, `mimetype`) VALUES
(1, 'big_buck_bunny.ogv', 'video/ogg'),
(12, 'dolphin4.mp3', 'audio/mp3'),
(1, 'happiness.mp4', 'video/mp4'),
(13, 'hippo4.wav', 'audio/wav'),
(11, 'ofof.mp3', 'audio/mp3'),
(2, 'small.mp4', 'video/mp4'),
(2, 'small.ogv', 'video/ogg'),
(2, 'small.webm', 'video/webm');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaurl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
