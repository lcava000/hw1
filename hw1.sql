-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 11, 2023 alle 22:09
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
-- Struttura della tabella `payment_attempts`
--

CREATE TABLE `payment_attempts` (
  `order_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `id_roomtype` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `unitPrice` double NOT NULL,
  `totalNight` int(10) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `totalPrice` double NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `roomcustomer`
--

CREATE TABLE `roomcustomer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `trn` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomcustomer`
--

INSERT INTO `roomcustomer` (`id`, `name`, `surname`, `trn`, `email`, `password`) VALUES
(1, 'Oliver', 'Walker', '', 'lcava000@gmail.com', '$2y$10$UkVXLixaD7iR64.E.mi.cOXYpzpPL9ZWvEFcs9qE38h38rYJXRo..'),
(2, 'Charlotte', 'Taylor', '', 'aaa@gmail.com', 'dddd'),
(3, 'Alicia', 'Maria', 'MRALI19381D', 'lcava00011@gmail.com', '$2y$10$PHtZBDsNzaAc93LFRjJ69OAYEdIdHJYDaRxoDItY5vZiyqjeDrY4W'),
(4, 'Maria', 'Noone', 'BALI19381D', 'maria@gmail.com', '$2y$10$aofZSREtn0fr4bsEFjv0LuW/4h/bKV3RbJZjLmWSqXkBRbKdrdrgC'),
(5, 'Lorenzo', 'Cavallaro', 'DGB6278', 'lcava01@gmail.com', '$2y$10$iyd8UMNgVFiqX4SnnPXcUey5uOoL5UY51tbJBe3JQoRIAD.EAE6oy');

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
  `totalPayed` double NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomreservation`
--

INSERT INTO `roomreservation` (`id`, `customerId`, `roomId`, `checkinDate`, `checkoutDate`, `totalPayed`, `isConfirmed`) VALUES
(1, 1, 1, '2023-05-05', '2023-05-06', 11200.5, 1),
(3, 2, 1, '2023-05-09', '2023-05-10', 11200.5, 1);

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
  `roomBed` int(11) NOT NULL,
  `roomPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `roomtype`
--

INSERT INTO `roomtype` (`id`, `roomServiceId`, `roomName`, `roomBed`, `roomPrice`) VALUES
(1, 1, 'Single Sea View Suite', 1, 1200),
(2, 1, 'Double Sea View Suite', 2, 1500),
(3, 1, 'Quadruple Sea View Suite', 4, 1900),
(4, 1, 'Single City View Suite', 1, 1000),
(5, 1, 'Double City View Suite', 2, 1200),
(6, 1, 'Quadruple City View Suite', 4, 1500);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `payment_attempts`
--
ALTER TABLE `payment_attempts`
  ADD PRIMARY KEY (`order_id`);

--
-- Indici per le tabelle `roomcustomer`
--
ALTER TABLE `roomcustomer`
  ADD PRIMARY KEY (`id`,`email`);

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
-- AUTO_INCREMENT per la tabella `payment_attempts`
--
ALTER TABLE `payment_attempts`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `roomcustomer`
--
ALTER TABLE `roomcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
