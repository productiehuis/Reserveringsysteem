-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2022 at 09:27 AM
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
(32, 'admin', '$2y$10$YLUsV3.UcnU9LyEEmmq7YOjvyyplxkaACrFAbtOcaUJwiZXQuNWYW', 1);

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
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `showID` int(11) NOT NULL,
  `showName` varchar(50) NOT NULL,
  `startTime` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `Max_seats` int(11) NOT NULL,
  `Past` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`showID`, `showName`, `startTime`, `date`, `location`, `Max_seats`, `Past`) VALUES
(1, 'Sneeuwwitje', '00:10:00', '2022-11-16', 'Nijmegen', 1200, b'0'),
(2, 'Sneeuwwitje', '00:10:00', '2022-11-16', 'Nijmegen', 1200, b'0'),
(3, 'Sneeuwwitje', '00:10:00', '2022-11-16', 'Nijmegen', 1200, b'0'),
(4, 'Sneeuwwitje', '00:10:00', '2022-11-16', 'Nijmegen', 1200, b'0'),
(11, 'Soldaat Oranje', '20:00:00', '2022-11-16', 'De Leest', 420, b'0'),
(12, 'Roodkapje', '22:00:00', '2023-04-20', 'Verkade fabriek', 1337, b'0'),
(13, 'wf', '14:39:00', '2022-09-28', 'aerg', 333, b'0');

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
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitorID`, `visitorName`, `visitorEmail`) VALUES
(1, 'admin', 'admin@kw1c.com'),
(2, 'ian', 'ianli@outlook.com');

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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `FK_showID` (`showID`),
  ADD KEY `FK_visitorID` (`visitorID`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`showID`);

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `showID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_showID` FOREIGN KEY (`showID`) REFERENCES `show` (`showID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_visitorID` FOREIGN KEY (`visitorID`) REFERENCES `visitor` (`visitorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
