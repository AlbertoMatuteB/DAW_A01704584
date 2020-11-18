-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 11:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ep2`
--

DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `createEstadoZombie` (IN `id_zombie` INT(63), IN `id_estado` INT(63))  NO SQL
INSERT INTO `estado_zombi` (`id_zombi`, `id_estado`) VALUES (id_zombie, id_estado)$$

CREATE PROCEDURE `CreateZombie` (IN `nombre` VARCHAR(255) CHARSET utf8mb4)  NO SQL
INSERT INTO `zombi` (`nombre`) VALUES (nombre)$$

CREATE PROCEDURE `getDate` ()  NO SQL
SELECT Z.id_zombi as 'id', Z.nombre as 'Nombre', E.nombreEstado as 'Estado', EZ.fecha as 'Fecha'
FROM zombi Z, estado E, estado_zombi EZ
WHERE Z.id_zombi = EZ.id_zombi and EZ.id_estado = E.id_estado
ORDER BY z.id_zombi DESC$$

CREATE PROCEDURE `getZombieName` (IN `id_zombie` INT(63))  NO SQL
SELECT Z.nombre
FROM zombi Z
WHERE Z.id_zombi = id_zombie$$

CREATE PROCEDURE `getZombienum` (IN `estado` INT(63))  NO SQL
SELECT E.nombreEstado as 'id', COUNT(EZ.id_estado) as 'count'
FROM estado_zombi EZ, estado E
WHERE EZ.id_estado = estado AND E.id_estado = EZ.id_estado$$

CREATE PROCEDURE `OpcionesZombie` ()  NO SQL
SELECT Z.id_zombi as 'id', Z.nombre
FROM zombi Z$$

CREATE PROCEDURE `totalZombies` ()  NO SQL
SELECT count(DISTINCT(id_zombi))
FROM estado_zombi$$

CREATE PROCEDURE `updateZombi` (IN `id_zombi` INT(63), IN `id_estado` INT(63))  NO SQL
INSERT INTO estado_zombi(`id_zombi`, `id_estado`)
VALUES (id_zombi, id_estado)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(63) NOT NULL,
  `nombreEstado` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `nombreEstado`) VALUES
(1, 'infeccion'),
(2, 'desorientacion'),
(3, 'violencia'),
(4, 'desmayo'),
(5, 'transformacion');

-- --------------------------------------------------------

--
-- Table structure for table `estado_zombi`
--

CREATE TABLE `estado_zombi` (
  `id_zombi` int(63) NOT NULL,
  `id_estado` int(63) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zombi`
--

CREATE TABLE `zombi` (
  `id_zombi` int(63) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `estado_zombi`
--
ALTER TABLE `estado_zombi`
  ADD KEY `id_zombi` (`id_zombi`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `zombi`
--
ALTER TABLE `zombi`
  ADD PRIMARY KEY (`id_zombi`),
  ADD UNIQUE KEY `id_zombi` (`id_zombi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zombi`
--
ALTER TABLE `zombi`
  MODIFY `id_zombi` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estado_zombi`
--
ALTER TABLE `estado_zombi`
  ADD CONSTRAINT `estado_zombi_ibfk_1` FOREIGN KEY (`id_zombi`) REFERENCES `zombi` (`id_zombi`),
  ADD CONSTRAINT `estado_zombi_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
