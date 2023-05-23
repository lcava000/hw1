-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mag 23, 2023 alle 17:18
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
  `sessionid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roomtype` int NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
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
(8, 'Mario', 'Rossi', '192819281739281', 'mario.rossi@email.it', '$2y$10$0pqVzu0PPX2.xl7IKSDdt.xqUkFTY2u/vMaabfUOg8Zp.01RzfgDK'),
(9, 'Laura', 'Bianchi', '182917261728172', 'laura.bianchi@email.it', '$2y$10$/54UMSX5ENroCiroJqKSbel3B2mNiary.fWt0zjReYBPsW59KZWva'),
(10, 'Luca', 'Esposito', '126172617244444', 'luca.esposito@email.it', '$2y$10$bUJANQp1SWNDXHZU0c0JieRg4S0NfitQUvy0IdbU5N2KLdblqGN3W'),
(11, 'Giulia', 'Romano', '565651425162716', 'giulia.romano@email.it', '$2y$10$SVu.dNUefRv8DPmmueI5K.10bUj7fbcJ5JxDw0lTaJgjtHOjMKXMS'),
(12, 'Alessanro', 'Ricci', '182718271827293', 'alessandro.ricci@email.it', '$2y$10$mAdkG79sRkLCfkPAFFXHtuNj2q0WqXo9sZeninFwaMHTiKxmWv7Um'),
(13, 'Valentina', 'De Luca', '172617281261729', 'valentina.deluca@email.it', '$2y$10$el6TG4rNXDhezIURg9T5e.uP92QwVnDyjFVeIfvcYoSrfon55q1k2'),
(14, 'Marco', 'Martini', '151515151515151', 'marco.martini@email.it', '$2y$10$u14oVpXIGI0.8mQ/UWWxcONES7t1jNiglm3mANpXaLPd0VZhV.ZRO'),
(15, 'Chiara', 'Ferrari', '151515151515151', 'chiara.ferrari@email.it', '$2y$10$D4MaNHMjd4ZZ7OCbLiw15OdQuGy57wn34fEItfW0UCgMai674aD6m'),
(16, 'Francesco', 'Russo', '171717171829102', 'francesco.russo@email.it', '$2y$10$PyqFPqbaTVcXf3j7jNFWg.SXFMhPiEk67/cjy/tzFq4FQsGDUo/F.'),
(17, 'Sara', 'Conti', '171717171829102', 'sara.conti@email.it', '$2y$10$eQPaQrXSNKCDV85AMyY9TuhmnJgKBx3vF7h989icjJRlEaEHbijpi'),
(18, 'Federica', 'Barbieri', '182917281627192', ' federica.barbieri@email.it', '$2y$10$weWpL5BsAUuy0ufvJe1Ie.81F3GbutYBl.xy1sVQza2WH5axL6cvK'),
(19, 'Giovanni', 'Moretti', '171829102918727', 'giovanni.moretti@email.it', '$2y$10$7wEPPRk4F7JmpZKRcrImeOMCCErVjwoouyt.VOEzMixdN36r4t5zK'),
(20, 'Andrea', 'Ferretti', '252525252525252', 'andrea.ferretti@email.it', '$2y$10$9lHgX3bngS5xls7Ox8rwE.Ce9wNn473.CgHuNzmgGNL6yfxsI02yW'),
(21, 'Giuseppa', 'Melone', '171829102918727', 'giuseppa@melone.it', '$2y$10$NtkC8aFzwZbWGXP4F4S0HeGJkpVJPCRiKMi2NnAqNrDqFIozw3um6'),
(22, 'Paolo', 'Caruso', '171829102918727', 'paolo.caruso@email.it', '$2y$10$BB/nwXXQ5j2dnJRsr4.qZOPxKQFn8csPS11WLc1Pc3xKpeizSTdgm'),
(23, 'Simona', 'Gallo', '172617281261729', 'simona.gallo@email.it', '$2y$10$0ReHV1fQTLI0ZgcKgr0dtec3aJg4w/jIFyjaTf6IrcvUQ1Addg3Vm'),
(24, 'Antonio', 'Marino', '151515151515151', 'antonio.marino@email.it', '$2y$10$/.jDiVMswMQrDfpD4CMtzufEOoay1sJnDOQD.4R0/Ifz98ptdK7nW'),
(25, 'Alfio', 'Amalfi', '102918271829302', 'alfio@amalfi.it', '$2y$10$Ak57VwqNRou.Afhp8VTMfuGB2LfP0OfzW5uchnP9DhVxwf8jm3OTW'),
(26, 'Marco', 'Barbieri', '123456765432133', 'marco.barbieri@email.it', '$2y$10$JgoZSeqyjDa6Qy3lVcwT4OJZDmfmxM.sxMHkGNwDpX1DPE9NhTSpm'),
(27, 'Alessio', 'Piazza', '102918271829302', 'alessio.piazza@email.it', '$2y$10$GgS2vIwbTYfHn2I2sAUaW.8D8ZxamIBRFgX1MfUgMG/3.CMg0ZSFC');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomreservation`
--

CREATE TABLE `roomreservation` (
  `id` int NOT NULL,
  `customerid` int NOT NULL,
  `roomid` int DEFAULT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `totalpayed` double NOT NULL,
  `isconfirmed` tinyint(1) NOT NULL DEFAULT '0',
  `invoiceurl` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomreservation`
--

INSERT INTO `roomreservation` (`id`, `customerid`, `roomid`, `checkindate`, `checkoutdate`, `totalpayed`, `isconfirmed`, `invoiceurl`, `timestamp`) VALUES
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
(21, 24, 9, '2023-05-23', '2024-05-24', 22020000, 1, 'https://codepro.it/api/invoices/646cd9913ab2c.pdf', '2023-05-23 15:19:45'),
(22, 25, 7, '2023-05-23', '2023-05-24', 999900, 1, 'https://codepro.it/api/invoices/646cee21650ab.pdf', '2023-05-23 16:47:29'),
(23, 25, 10, '2023-05-23', '2023-05-24', 100000, 1, 'https://codepro.it/api/invoices/646cee66674ab.pdf', '2023-05-23 16:48:38'),
(24, 25, 8, '2023-05-23', '2023-05-24', 1499900, 1, 'https://codepro.it/api/invoices/646cef4fd1d39.pdf', '2023-05-23 16:52:32'),
(25, 26, 2, '2023-05-23', '2023-05-24', 150000, 1, 'https://codepro.it/api/invoices/646cf1286ec4a.pdf', '2023-05-23 17:00:24'),
(26, 26, 3, '2023-05-24', '2023-05-27', 570000, 1, 'https://codepro.it/api/invoices/646cf1aa885fd.pdf', '2023-05-23 17:02:34'),
(27, 27, 7, '2023-05-28', '2023-05-29', 999900, 1, 'https://codepro.it/api/invoices/646cf37ad179a.pdf', '2023-05-23 17:10:18');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomservice`
--

CREATE TABLE `roomservice` (
  `roomid` int NOT NULL,
  `roomname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `roomdescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `roomshortdescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `roomimage` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomservice`
--

INSERT INTO `roomservice` (`roomid`, `roomname`, `roomdescription`, `roomshortdescription`, `roomimage`) VALUES
(1, 'Deluxe Room', 'As you enter the room, you\'ll be greeted with a spacious and beautifully decorated interior. The room features a comfortable king-size bed, luxurious linens, and plush pillows to ensure a good night\'s sleep. The room also has a seating area with a sofa and chairs, providing a cozy space to relax and unwind.', 'The Deluxe Room is a stylish and comfortable retreat for travelers, featuring modern furnishings and high-tech amenities.', './asset/images/room/room1.jpg'),
(2, 'Royal Room', '\nAs you step into the Royal Room, you\'ll be embraced by a spacious and exquisitely adorned interior. A lavish king-size bed adorned with sumptuous linens and plush pillows invites you to a restful slumber. The cozy seating area, with a sofa and chairs, offers a tranquil space to unwind.', 'The Royal Room promises an unforgettable stay in Dubai for those seeking the ultimate in comfort and luxury.', './asset/images/room/room2.jpg'),
(3, 'Business Room', 'Stepping into the Business Room, you\'ll be welcomed by a generously sized and elegantly furnished space. The room boasts a cozy king-size bed adorned with luxurious linens and plush pillows, guaranteeing a restful night\'s sleep. Additionally, a well-appointed seating area featuring a comfortable sofa and chairs provides the perfect setting to unwind and relax. Ideal for business travelers, this room strikes a balance between comfort and functionality, offering a conducive environment for work and productivity.', 'The Business Room is designed for travelers who are looking for a comfortable and efficient stay.', './asset/images/room/room3.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int NOT NULL,
  `roomserviceid` int DEFAULT NULL,
  `roomname` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `roombed` int NOT NULL,
  `roomprice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `roomtype`
--

INSERT INTO `roomtype` (`id`, `roomserviceid`, `roomname`, `roombed`, `roomprice`) VALUES
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
  ADD PRIMARY KEY (`sessionid`,`roomtype`,`checkindate`,`checkoutdate`),
  ADD KEY `roomType` (`roomtype`);

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
  ADD KEY `customerId` (`customerid`),
  ADD KEY `roomId` (`roomid`);

--
-- Indici per le tabelle `roomservice`
--
ALTER TABLE `roomservice`
  ADD PRIMARY KEY (`roomid`);

--
-- Indici per le tabelle `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomServiceId` (`roomserviceid`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `roomcustomer`
--
ALTER TABLE `roomcustomer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `roomservice`
--
ALTER TABLE `roomservice`
  MODIFY `roomid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `orderattempt_ibfk_1` FOREIGN KEY (`roomtype`) REFERENCES `roomtype` (`id`);

--
-- Limiti per la tabella `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD CONSTRAINT `roomReservation_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `roomcustomer` (`id`),
  ADD CONSTRAINT `roomReservation_ibfk_2` FOREIGN KEY (`roomid`) REFERENCES `roomtype` (`id`);

--
-- Limiti per la tabella `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `roomType_ibfk_1` FOREIGN KEY (`roomserviceid`) REFERENCES `roomservice` (`roomid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
