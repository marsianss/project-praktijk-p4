-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2024 at 08:07 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opleidingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aanmelden`
--

DROP TABLE IF EXISTS `aanmelden`;
CREATE TABLE IF NOT EXISTS `aanmelden` (
  `burgerservicenummer` int NOT NULL,
  `email` varchar(30) NOT NULL,
  `roepnaam` varchar(20) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `geboortedatum` date NOT NULL,
  `telefoonnummer` int NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aanmelden`
--

INSERT INTO `aanmelden` (`burgerservicenummer`, `email`, `roepnaam`, `geboortedatum`, `telefoonnummer`) VALUES
(777888999, 'charlie.davis@example.com', 'Charlie', '1980-06-01', 656789012),
(222333444, 'david.evans@example.com', 'David', '1992-03-18', 667890123),
(555666777, 'emily.francis@example.com', 'Emily', '1988-09-25', 678901234),
(888999000, 'frank.garcia@example.com', 'Frank', '1975-01-01', 689012345),
(333444555, 'george.hall@example.com', 'George', '1997-04-10', 690123456),
(666777888, 'helen.ireland@example.com', 'Helen', '1982-07-20', 701234567),
(999000111, 'ivan.jenkins@example.com', 'Ivan', '1999-10-15', 712345678);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
