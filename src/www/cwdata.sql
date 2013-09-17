-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 11:51 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cwdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `impresoras`
--

CREATE TABLE IF NOT EXISTS `impresoras` (
  `printernumber` int(32) NOT NULL,
  `printername` varchar(500) NOT NULL,
  `fnacimiento` varchar(10) DEFAULT NULL,
  `printermodel` varchar(30) DEFAULT NULL,
  `printermother` int(10) NOT NULL,
  `printerlocation` smallint(6) DEFAULT NULL,
  `printerurl` varchar(5000) DEFAULT NULL,
  `printeralive` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(500) NOT NULL,
  `foto` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`printernumber`),
  KEY `printermother` (`printermother`),
  KEY `username` (`username`),
  KEY `printermodel` (`printermodel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impresoras`
--

INSERT INTO `impresoras` (`printernumber`, `printername`, `fnacimiento`, `printermodel`, `printermother`, `printerlocation`, `printerurl`, `printeralive`, `username`, `foto`) VALUES
(-100000, 'Sin madre', NULL, NULL, -100000, NULL, NULL, 1, '*Desconocido', NULL),
(-10000, 'Madre', '16/05/2011', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE', 1, 'Asociación de Robótica de la UC3M', NULL),
(-9999, 'Padre', '08/10/2011', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE', 1, 'Departamento de Ingeniería de Sistemas y Automática UC3M', NULL),
(-9998, 'R1', '19/05/2009', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Makerbot_Cupcake:_R1', 1, 'Obijuan', NULL),
(2, 'Death Star', '17/09/2013', 'prusa mendel', -10000, 28, 'http://www.reprap.org/wiki/Clone_wars:Impresora_Death_Star', 1, 'Fernando Salceda Álvarez', '/var/www/cw_big_data/uploads/Clon-Deathstar_2012-01-07_1-r2.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impresoras`
--
ALTER TABLE `impresoras`
  ADD CONSTRAINT `impresoras_ibfk_1` FOREIGN KEY (`printermodel`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `impresoras_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `impresoras_ibfk_4` FOREIGN KEY (`printermother`) REFERENCES `impresoras` (`printernumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
