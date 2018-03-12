-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2018 at 12:18 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminali`
--

-- --------------------------------------------------------

--
-- Table structure for table `izmene_logovi`
--

DROP TABLE IF EXISTS `izmene_logovi`;
CREATE TABLE IF NOT EXISTS `izmene_logovi` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `datum` timestamp NOT NULL,
  `operacija` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID_polazna_lokacija` int(6) NOT NULL,
  `ID_odredisna_lokacija` int(6) NOT NULL,
  `ID_uredjaja` int(6) NOT NULL,
  `napomena` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `broj_dokumenta` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_polazna_lokacija` (`ID_polazna_lokacija`),
  KEY `ID_odredisna_lokacija` (`ID_odredisna_lokacija`),
  KEY `ID_uredjaja` (`ID_uredjaja`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `izmene_logovi`
--

INSERT INTO `izmene_logovi` (`id`, `datum`, `operacija`, `ID_polazna_lokacija`, `ID_odredisna_lokacija`, `ID_uredjaja`, `napomena`, `broj_dokumenta`) VALUES
(17, '2018-03-11 23:00:00', 'novi', 5, 1, 19, 'prva nabavka', 'test'),
(18, '2018-03-11 23:00:00', 'novi', 5, 1, 20, 'prva nabavka', 'test'),
(19, '2018-03-11 23:00:00', 'novi', 5, 1, 21, 'prva nabavka', 'test'),
(20, '2018-03-11 23:00:00', 'novi', 5, 1, 22, 'prva nabavka', 'test'),
(21, '2018-03-11 23:00:00', 'novi', 5, 1, 23, 'prva nabavka', 'test'),
(22, '2018-03-11 23:00:00', 'novi', 5, 1, 24, 'prva nabavka', 'test'),
(23, '2018-03-11 23:00:00', 'izdavanje_iz_magacina', 1, 3, 19, 'Izdavanje Zdravku', 'test'),
(24, '2018-03-11 23:00:00', 'izdavanje_iz_magacina', 1, 3, 20, 'Izdavanje Zdravku', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `lokacije`
--

DROP TABLE IF EXISTS `lokacije`;
CREATE TABLE IF NOT EXISTS `lokacije` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `lokacija` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lokacije`
--

INSERT INTO `lokacije` (`id`, `lokacija`) VALUES
(1, 'magacin'),
(2, 'serv_lanus'),
(3, 'serviser'),
(4, 'teren'),
(5, 'nabavka'),
(6, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `uredjaji_lokacija`
--

DROP TABLE IF EXISTS `uredjaji_lokacija`;
CREATE TABLE IF NOT EXISTS `uredjaji_lokacija` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `tip_uredjaja` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `serijski_broj` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID_lokacija` int(6) DEFAULT NULL,
  `datum_poslednje_promene` timestamp NULL DEFAULT NULL,
  `napomena` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_lokacija` (`ID_lokacija`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uredjaji_lokacija`
--

INSERT INTO `uredjaji_lokacija` (`id`, `tip_uredjaja`, `serijski_broj`, `ID_lokacija`, `datum_poslednje_promene`, `napomena`) VALUES
(19, 'terminal', '101', 3, '2018-03-11 23:00:00', 'Izdavanje Zdravku'),
(20, 'terminal', '102', 3, '2018-03-11 23:00:00', 'Izdavanje Zdravku'),
(21, 'terminal', '103', 1, '2018-03-11 23:00:00', 'prva nabavka'),
(22, 'terminal', '104', 1, '2018-03-11 23:00:00', 'prva nabavka'),
(23, 'q prox', '250001', 1, '2018-03-11 23:00:00', 'prva nabavka'),
(24, 'q prox', '250002', 1, '2018-03-11 23:00:00', 'prva nabavka'),
(25, 'terminal', '505', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `izmene_logovi`
--
ALTER TABLE `izmene_logovi`
  ADD CONSTRAINT `izmene_logovi_ibfk_1` FOREIGN KEY (`ID_polazna_lokacija`) REFERENCES `lokacije` (`id`),
  ADD CONSTRAINT `izmene_logovi_ibfk_2` FOREIGN KEY (`ID_odredisna_lokacija`) REFERENCES `lokacije` (`id`),
  ADD CONSTRAINT `izmene_logovi_ibfk_3` FOREIGN KEY (`ID_uredjaja`) REFERENCES `uredjaji_lokacija` (`id`);

--
-- Constraints for table `uredjaji_lokacija`
--
ALTER TABLE `uredjaji_lokacija`
  ADD CONSTRAINT `uredjaji_lokacija_ibfk_1` FOREIGN KEY (`ID_lokacija`) REFERENCES `lokacije` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
