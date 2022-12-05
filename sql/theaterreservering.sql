-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 12:54 PM
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
-- Database: `theaterreservering`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userHashedPassword` char(60) NOT NULL,
  `userLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userID`, `userName`, `userHashedPassword`, `userLevel`) VALUES
(1, 'admin', '$2y$10$zF5dmIWv7BEzB6SVAEEoLe4gy0ra9O/tdsQCIVgAXZsIaJ5lhHdRu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `showID` int(11) NOT NULL,
  `showName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `Max_seats` int(11) NOT NULL,
  `Past` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`showID`, `showName`, `description`, `startTime`, `date`, `location`, `Max_seats`, `Past`) VALUES
(1, 'ABBA THE MUSIC', 'Van de makers van o.a. Queen The Music, Motel Westcoast, The Best of Britain e.a.Een tienkoppige', '20:15:00', '2023-03-04', 'Theater De Meerpaal, Dronten', 500, b'0'),
(2, 'Disney\\\'s Aladdin', 'Nog maar te zien tot en met december. Dit is je laatste kans, dus mis deze spectaculaire magische mu', '15:00:00', '2022-10-19', 'AFAS Circustheater, Scheveningen', 300, b'0'),
(3, 'ALLEEN FAMILIE', 'Huub Stapel is terug. De man die Mars en Venus genadeloos langs de meetlat van het leven legde, en h', '20:15:00', '2022-10-15', 'Agora theater en congrescentrum, Lelysta', 250, b'0'),
(4, 'SOME KIND OF GOLEM', 'De Amsterdam Klezmer Band bestaat 25 jaar. Dat gaat niet in de koude kleren zitten. Die kleren worden in deze show zorgvuldig uitgeschud. De Amsterdam Klezmer Band is geen stilstaand water. De Amsterdam Klezmer Band leeft. Some Kind of Golem biedt rijk en', '20:00:00', '2022-10-28', 'Theater de Speeldoos (Baarn), Baarn', 1000, b'0'),
(5, 'AN IRISH CHRISTMAS', 'Liefhebbers van Ierse folk, Kerst én traditionele dans, kunnen hun hart ophalen bij deze grootse Ierse dans- en muziekshow met zestien dansers en musici on stage!\\r\\n\\r\\nDe show wordt gebracht door het befaamde Ierse Riverdance gezelschap Celtic Steps. Ze', '15:00:00', '2022-10-31', 'Schouwburg Lochem, Lochem', 600, b'0'),
(6, 'ASHTON BROTHERS', 'Na het grandioze succes van hun zomerspektakel Ashtonia waarmee ze de afgelopen jaren tienduizenden mensen in Eindhoven, Apeldoorn en op Slot Zeist een unieke avond uit bezorgden en hun daarop volgende coronaproof Medicine Show… zijn de Ashton Brothers te', '18:00:00', '2023-06-22', 'Kielzog Theater, Hoogezand', 950, b'0'),
(7, 'ASSEPOESTER DE MUSICAL', 'Na een succesvolle reeks meeslepende sprookjesmusicals betovert Van Hoorne Entertainment in 2022-2023 haar bezoekers met Assepoester De Musical. Met ruim 125.000 bezoekers per theaterseizoen, zijn de sprookjesvoorstellingen al vele jaren op rij échte publ', '13:30:00', '2022-11-12', 'Theater \\\'t Voorhuys, Emmeloord', 400, b'0'),
(8, 'George Ezra', 'George Ezra Barnett, beter bekend onder zijn artiestennaam George Ezra, is sinds zijn definitieve doorbraak in 2014 met de single ‘Budapest’ niet meer weg te denken van de nationale en internationale hitlijsten. Het ongekende succes van de single herhaald', '20:00:00', '2023-06-13', 'Ziggo Dome, Amsterdam', 478, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(11) NOT NULL,
  `visitorID` int(11) NOT NULL,
  `showID` int(11) NOT NULL,
  `countPeople` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitorID` int(11) NOT NULL,
  `visitorName` varchar(50) NOT NULL,
  `visitorEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`showID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `FK_showID` (`showID`),
  ADD KEY `FK_visitorID` (`visitorID`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitorID`),
  ADD UNIQUE KEY `visitorEmail` (`visitorEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `showID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_showID` FOREIGN KEY (`showID`) REFERENCES `performance` (`showID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_visitorID` FOREIGN KEY (`visitorID`) REFERENCES `visitor` (`visitorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
