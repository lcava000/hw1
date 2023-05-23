-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mag 23, 2023 alle 15:58
-- Versione del server: 8.0.30
-- Versione PHP: 8.1.10

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
-- Struttura della tabella `orderattempt`
--

CREATE TABLE `orderattempt` (
  `sessionId` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `roomType` int NOT NULL,
  `checkinDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `roomcustomer`
--

CREATE TABLE `roomcustomer` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `trn` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomcustomer`
--

INSERT INTO `roomcustomer` (`id`, `name`, `surname`, `trn`, `email`, `password`) VALUES
(8, 'Salvatore', 'Miano', '192819281739281', 'sha@gmail.com', '$2y$10$0pqVzu0PPX2.xl7IKSDdt.xqUkFTY2u/vMaabfUOg8Zp.01RzfgDK'),
(9, 'Giuseppe', 'Savio', '182917261728172', 'giuseppe@gmail.com', '$2y$10$/54UMSX5ENroCiroJqKSbel3B2mNiary.fWt0zjReYBPsW59KZWva'),
(10, 'Salvatore', 'Dispinsieri', '126172617244444', 'salvo.dispi@gmail.com', '$2y$10$bUJANQp1SWNDXHZU0c0JieRg4S0NfitQUvy0IdbU5N2KLdblqGN3W'),
(11, 'Giuseppe', 'test', '565651425162716', 'koala@gmail.com', '$2y$10$SVu.dNUefRv8DPmmueI5K.10bUj7fbcJ5JxDw0lTaJgjtHOjMKXMS'),
(12, 'Giuseppe', 'Maria', '182718271827293', 'giuseppe.doc@gmail.com', '$2y$10$mAdkG79sRkLCfkPAFFXHtuNj2q0WqXo9sZeninFwaMHTiKxmWv7Um'),
(13, 'Lorenzo', 'Cavallaro', '172617281261729', 'mario@mario.it', '$2y$10$el6TG4rNXDhezIURg9T5e.uP92QwVnDyjFVeIfvcYoSrfon55q1k2'),
(14, 'Salvatore', 'mairano', '151515151515151', 'test@regno.it', '$2y$10$u14oVpXIGI0.8mQ/UWWxcONES7t1jNiglm3mANpXaLPd0VZhV.ZRO'),
(15, 'Martina', 'Strazzeri', '151515151515151', 'martina@gmail.com', '$2y$10$D4MaNHMjd4ZZ7OCbLiw15OdQuGy57wn34fEItfW0UCgMai674aD6m'),
(16, 'Marta', 'Giuspepa', '171717171829102', 'test@regnoooo.it', '$2y$10$PyqFPqbaTVcXf3j7jNFWg.SXFMhPiEk67/cjy/tzFq4FQsGDUo/F.'),
(17, 'Martina', 'Strazzeri2', '171717171829102', 'regno@regno.ir', '$2y$10$eQPaQrXSNKCDV85AMyY9TuhmnJgKBx3vF7h989icjJRlEaEHbijpi'),
(18, 'Giovanni', 'Melone', '182917281627192', 'giovanni@gmail.com', '$2y$10$weWpL5BsAUuy0ufvJe1Ie.81F3GbutYBl.xy1sVQza2WH5axL6cvK'),
(19, 'Giovanna', 'Malone', '171829102918727', 'lcava0000@gmail.com', '$2y$10$7wEPPRk4F7JmpZKRcrImeOMCCErVjwoouyt.VOEzMixdN36r4t5zK'),
(20, 'Esme', 'Romeo', '252525252525252', 'esme@gmail.com', '$2y$10$9lHgX3bngS5xls7Ox8rwE.Ce9wNn473.CgHuNzmgGNL6yfxsI02yW'),
(21, 'Giuseppa', 'Melone', '171829102918727', 'giuseppa@melone.it', '$2y$10$NtkC8aFzwZbWGXP4F4S0HeGJkpVJPCRiKMi2NnAqNrDqFIozw3um6'),
(22, 'Lorenzo', 'Cavallaro', '171829102918727', 'lorenzo.cavallaro@gmail.com', '$2y$10$BB/nwXXQ5j2dnJRsr4.qZOPxKQFn8csPS11WLc1Pc3xKpeizSTdgm'),
(23, 'Test', 'Finale', '172617281261729', 'test@finale.it', '$2y$10$0ReHV1fQTLI0ZgcKgr0dtec3aJg4w/jIFyjaTf6IrcvUQ1Addg3Vm'),
(24, 'Giuseppe', 'Verona', '151515151515151', 'giuseppe@verone.it', '$2y$10$/.jDiVMswMQrDfpD4CMtzufEOoay1sJnDOQD.4R0/Ifz98ptdK7nW');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomreservation`
--

CREATE TABLE `roomreservation` (
  `id` int NOT NULL,
  `customerId` int NOT NULL,
  `roomId` int DEFAULT NULL,
  `checkinDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `totalPayed` double NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL DEFAULT '0',
  `invoiceUrl` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomreservation`
--

INSERT INTO `roomreservation` (`id`, `customerId`, `roomId`, `checkinDate`, `checkoutDate`, `totalPayed`, `isConfirmed`, `invoiceUrl`, `timestamp`) VALUES
(8, 8, 1, '2023-05-16', '2023-05-20', 480000, 1, './invoices/6463aab3a9b02.pdf', '2023-05-16 16:09:25'),
(9, 8, 4, '2023-05-16', '2023-05-19', 300000, 1, './invoices/6463ad8904a81.pdf', '2023-05-16 16:21:30'),
(10, 8, 3, '2023-05-16', '2023-05-17', 190000, 1, './invoices/6463aeae5bf60.pdf', '2023-05-16 16:26:24'),
(11, 10, 1, '2023-05-22', '2023-05-23', 120000, 1, './invoices/646b7c2e743cf.pdf', '2023-05-22 14:29:04'),
(12, 11, 4, '2023-05-22', '2023-05-23', 100000, 1, './invoices/646b823bb83a9.pdf', '2023-05-22 14:54:53'),
(13, 8, 3, '2023-05-27', '2023-05-28', 190000, 1, './invoices/646b8df5b01d3.pdf', '2023-05-22 15:44:57'),
(14, 12, 6, '2023-05-22', '2023-05-23', 150000, 1, './invoices/646b90efe0f66.pdf', '2023-05-22 15:57:38'),
(15, 12, 3, '2023-05-22', '2023-05-23', 190000, 1, './invoices/646b91f8018e0.pdf', '2023-05-22 16:02:03'),
(16, 16, 5, '2023-05-22', '2023-05-27', 600000, 1, './invoices/646b99097a284.pdf', '2023-05-22 16:32:11'),
(17, 21, 1, '2023-05-23', '2023-05-28', 600000, 1, './invoices/646cc5b1168d8.pdf', '2023-05-23 13:55:01'),
(18, 22, 6, '2023-05-23', '2023-08-10', 11850000, 1, './invoices/646cc6a219833.pdf', '2023-05-23 13:59:00'),
(19, 20, 4, '2023-05-23', '2023-05-24', 100000, 1, './invoices/646cc74f8a959.pdf', '2023-05-23 14:01:54'),
(20, 23, 3, '2023-05-23', '2023-05-24', 190000, 1, 'https://codepro.it/api/invoices/646ccd43e81eb.pdf', '2023-05-23 14:27:15'),
(21, 24, 9, '2023-05-23', '2024-05-24', 22020000, 1, 'https://codepro.it/api/invoices/646cd9913ab2c.pdf', '2023-05-23 15:19:45');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomservice`
--

CREATE TABLE `roomservice` (
  `roomId` int NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `roomDescription` text NOT NULL,
  `roomShortDescription` text NOT NULL,
  `roomImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomservice`
--

INSERT INTO `roomservice` (`roomId`, `roomName`, `roomDescription`, `roomShortDescription`, `roomImage`) VALUES
(1, 'Deluxe Room', 'As you enter the room, you\'ll be greeted with a spacious and beautifully decorated interior. The room features a comfortable king-size bed, luxurious linens, and plush pillows to ensure a good night\'s sleep. The room also has a seating area with a sofa and chairs, providing a cozy space to relax and unwind.', 'The Deluxe Room is a stylish and comfortable retreat for travelers, featuring modern furnishings and high-tech amenities.', './asset/images/room/room1.jpg'),
(2, 'Royal Room', '\nAs you step into the Royal Room, you\'ll be embraced by a spacious and exquisitely adorned interior. A lavish king-size bed adorned with sumptuous linens and plush pillows invites you to a restful slumber. The cozy seating area, with a sofa and chairs, offers a tranquil space to unwind.', 'The Royal Room promises an unforgettable stay in Dubai for those seeking the ultimate in comfort and luxury.', './asset/images/room/room2.jpg'),
(3, 'Business Room', 'Stepping into the Business Room, you\'ll be welcomed by a generously sized and elegantly furnished space. The room boasts a cozy king-size bed adorned with luxurious linens and plush pillows, guaranteeing a restful night\'s sleep. Additionally, a well-appointed seating area featuring a comfortable sofa and chairs provides the perfect setting to unwind and relax. Ideal for business travelers, this room strikes a balance between comfort and functionality, offering a conducive environment for work and productivity.', 'The Business Room is designed for travelers who are looking for a comfortable and efficient stay.', './asset/images/room/room3.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int NOT NULL,
  `roomServiceId` int DEFAULT NULL,
  `roomName` varchar(150) DEFAULT NULL,
  `roomBed` int NOT NULL,
  `roomPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomtype`
--

INSERT INTO `roomtype` (`id`, `roomServiceId`, `roomName`, `roomBed`, `roomPrice`) VALUES
(1, 1, 'Single Sea View Suite', 1, 1200),
(2, 1, 'Double Sea View Suite', 2, 1500),
(3, 1, 'Quadruple Sea View Suite', 4, 1900),
(4, 1, 'Single City View Suite', 1, 1000),
(5, 1, 'Double City View Suite', 2, 1200),
(6, 1, 'Quadruple City View Suite', 4, 1500),
(7, 2, 'Double Royal Room', 2, 9999),
(8, 2, 'Quadruple Royal Room', 4, 14999),
(9, 3, 'Single Business Class Room', 1, 600),
(10, 3, 'Single Luxury Business Class Room', 1, 1000);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `orderattempt`
--
ALTER TABLE `orderattempt`
  ADD PRIMARY KEY (`sessionId`,`roomType`,`checkinDate`,`checkoutDate`),
  ADD KEY `roomType` (`roomType`);

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
-- AUTO_INCREMENT per la tabella `roomcustomer`
--
ALTER TABLE `roomcustomer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `roomservice`
--
ALTER TABLE `roomservice`
  MODIFY `roomId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orderattempt`
--
ALTER TABLE `orderattempt`
  ADD CONSTRAINT `orderattempt_ibfk_1` FOREIGN KEY (`roomType`) REFERENCES `roomtype` (`id`);

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
