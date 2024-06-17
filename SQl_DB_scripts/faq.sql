-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2024 at 11:11 AM
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
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Message` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Answer` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `Name`, `Email`, `Message`, `Answer`, `created_at`, `approved`) VALUES
(40, 'test', 'test@gmail.com', 'werkt het eindelijk?', 'JA', '2024-06-10 12:24:43', 1),
(35, 'john_doe', 'john.doe@example.com', 'What are the course prerequisites?', '', '2024-06-10 11:49:08', 0),
(34, 'carol_davis', 'carol.davis@example.com', 'Are there any group discounts?', 'YES', '2024-06-10 11:42:53', 1),
(29, 'test', 'test@gmail.com', 'Hoe kan ik mee aanmelden voor de opleiding?', 'Op de aanmeld pagina!', '2024-06-10 11:30:37', 1),
(37, 'alice_wong', 'alice.wong@example.com', 'Is there any financial aid available?', '', '2024-06-10 11:49:08', 0),
(38, 'bob_johnson', 'bob.johnson@example.com', 'Can I take the course online?', '', '2024-06-10 11:49:08', 0),
(39, 'carol_davis', 'carol.davis@example.com', 'Are there any group discounts?', '', '2024-06-10 11:49:08', 0),
(41, 'test', 'test@gmail.com', '1234', '12234', '2024-06-17 10:45:24', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
