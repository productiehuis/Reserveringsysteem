-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 12:44 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theaterreserveringen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bezoeker`
--

CREATE TABLE `bezoeker` (
  `BezoekerNummer` int(11) NOT NULL,
  `BezoekerNaam` varchar(20) NOT NULL,
  `BezoekerEmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserveringen`
--

CREATE TABLE `reserveringen` (
  `ReserveringNummer` int(11) NOT NULL,
  `BezoekerNummer` int(11) NOT NULL,
  `VoorstellingNummer` int(11) NOT NULL,
  `Aantal_personen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voorstellingen`
--

CREATE TABLE `voorstellingen` (
  `VoorstellingNummer` int(11) NOT NULL,
  `VoorstellingNaam` varchar(50) NOT NULL,
  `Begintijd` time NOT NULL,
  `Datum` date NOT NULL,
  `Locatie` varchar(50) NOT NULL,
  `Max_zitplaats` int(11) NOT NULL,
  `Voorbij` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bezoeker`
--
ALTER TABLE `bezoeker`
  ADD PRIMARY KEY (`BezoekerNummer`);

--
-- Indexes for table `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`ReserveringNummer`),
  ADD KEY `FK_BezoekerNummer` (`BezoekerNummer`),
  ADD KEY `FK_VoorstellingNummer` (`VoorstellingNummer`);

--
-- Indexes for table `voorstellingen`
--
ALTER TABLE `voorstellingen`
  ADD PRIMARY KEY (`VoorstellingNummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bezoeker`
--
ALTER TABLE `bezoeker`
  MODIFY `BezoekerNummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `ReserveringNummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voorstellingen`
--
ALTER TABLE `voorstellingen`
  MODIFY `VoorstellingNummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `FK_BezoekerNummer` FOREIGN KEY (`BezoekerNummer`) REFERENCES `bezoeker` (`BezoekerNummer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VoorstellingNummer` FOREIGN KEY (`VoorstellingNummer`) REFERENCES `voorstellingen` (`VoorstellingNummer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
