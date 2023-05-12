-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 06, 2023 alle 18:09
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `roomcustomer`
--

CREATE TABLE `roomcustomer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomcustomer`
--

INSERT INTO `roomcustomer` (`id`, `name`, `surname`) VALUES
(1, 'Oliver', 'Walker'),
(2, 'Charlotte', 'Taylor');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomreservation`
--

CREATE TABLE `roomreservation` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `checkinDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `totalPayed` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomreservation`
--

INSERT INTO `roomreservation` (`id`, `customerId`, `roomId`, `checkinDate`, `checkoutDate`, `totalPayed`) VALUES
(1, 1, 1, '2023-05-05', '2023-05-06', 11200.5),
(3, 2, 1, '2023-05-09', '2023-05-10', 11200.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `roomservice`
--

CREATE TABLE `roomservice` (
  `roomId` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `roomDescription` text NOT NULL,
  `roomImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomservice`
--

INSERT INTO `roomservice` (`roomId`, `roomName`, `roomDescription`, `roomImage`) VALUES
(1, 'Deluxe Room', 'As you enter the room, you\'ll be greeted with a spacious and beautifully decorated interior. The room features a comfortable king-size bed, luxurious linens, and plush pillows to ensure a good night\'s sleep. The room also has a seating area with a sofa and chairs, providing a cozy space to relax and unwind.', '../www');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `roomServiceId` int(11) DEFAULT NULL,
  `roomName` varchar(150) DEFAULT NULL,
  `roomPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomtype`
--

INSERT INTO `roomtype` (`id`, `roomServiceId`, `roomName`, `roomPrice`) VALUES
(1, 1, 'Single Sea View Suite', 1200),
(2, 1, 'Double Sea View Suite', 1500),
(3, 1, 'Quadruple Sea View Suite', 1900),
(4, 1, 'Single City View Suite', 1000),
(5, 1, 'Double City View Suite', 1200),
(6, 1, 'Quadruple City View Suite', 1500);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `roomcustomer`
--
ALTER TABLE `roomcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `roomId` (`roomId`);

--
-- Indici per le tabelle `roomservice`
--
ALTER TABLE `roomservice`
  ADD PRIMARY KEY (`roomId`);

--
-- Indici per le tabelle `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomServiceId` (`roomServiceId`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `roomcustomer`
--
ALTER TABLE `roomcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `roomservice`
--
ALTER TABLE `roomservice`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD CONSTRAINT `roomReservation_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `roomcustomer` (`id`),
  ADD CONSTRAINT `roomReservation_ibfk_2` FOREIGN KEY (`roomId`) REFERENCES `roomtype` (`id`);

--
-- Limiti per la tabella `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `roomType_ibfk_1` FOREIGN KEY (`roomServiceId`) REFERENCES `roomservice` (`roomId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
