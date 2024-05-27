-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 27 mei 2024 om 11:15
-- Serverversie: 8.2.0
-- PHP-versie: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectp4`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanmelden`
--

DROP TABLE IF EXISTS `aanmelden`;
CREATE TABLE IF NOT EXISTS `aanmelden` (
  `burgerservicenummer` int NOT NULL,
  `email` varchar(30) NOT NULL,
  `roepnaam` varchar(20) NOT NULL,
  `geboortedatum` date NOT NULL,
  `telefoonnummer` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `aanmelden`
--

INSERT INTO `aanmelden` (`burgerservicenummer`, `email`, `roepnaam`, `geboortedatum`, `telefoonnummer`) VALUES
(987522355, 'gert@hotmail.com', 'Gert', '2006-02-23', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2000-02-23', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2000-02-02', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2006-02-23', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2006-02-23', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2006-02-23', 98525152),
(987522355, 'plop@plopper.com', 'plop', '0000-00-00', 98525152),
(987522355, 'plop@plopper.com', 'plop', '0000-00-00', 98525152),
(987522355, 'plop@plopper.com', 'plop', '2006-02-23', 98525152),
(987522355, 'plop@plopper.com', 'Gert', '2006-02-23', 98525152),
(987522355, 'ploppppp@gmail.com', 'plopper', '5955-08-08', 98525152),
(987522355, 'ploppppp@gmail.com', 'plopper', '0588-02-23', 98525152);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
