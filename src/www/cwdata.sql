-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 12:23 AM
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
  `printernumber` int(11) NOT NULL,
  `printername` varchar(500) NOT NULL,
  `fnacimiento` varchar(10) DEFAULT NULL,
  `printermodel` varchar(30) DEFAULT NULL,
  `printermother` int(10) NOT NULL,
  `printerlocation` smallint(6) DEFAULT NULL,
  `printerurl` varchar(5000) DEFAULT NULL,
  `printeralive` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(500) NOT NULL,
  PRIMARY KEY (`printernumber`),
  KEY `printermother` (`printermother`),
  KEY `username` (`username`),
  KEY `printermodel` (`printermodel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impresoras`
--

INSERT INTO `impresoras` (`printernumber`, `printername`, `fnacimiento`, `printermodel`, `printermother`, `printerlocation`, `printerurl`, `printeralive`, `username`) VALUES
(-1, 'Sin madre', NULL, NULL, -1, NULL, NULL, 1, 'Desconocido');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` varchar(30) NOT NULL,
  `human` text NOT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `human`, `url`) VALUES
('cupcake', 'Cupcake', NULL),
('huxley', 'Huxley', NULL),
('mosaic', 'Makergear Mosaic', NULL),
('p2', 'Prusa 2', 'http://reprap.org/wiki/Prusa_Mendel_(iteration_2)'),
('p3_alu', 'Prusa 3 alminio', 'http://reprap.org/wiki/Clone_wars:_Prusa_iteraci%C3%B3n_3_single_frame'),
('p3_box', 'Prusa 3 box', 'http://www.reprap.org/wiki/Clone_wars:_Prusa_iteración_3'),
('portabee', 'PortaBee', NULL),
('printrbot', 'Printrbot', NULL),
('printrbot 2', 'Printrbot 2', NULL),
('printrbot jr', 'Printrbot jr', NULL),
('printrbot plus', 'Printrbot plus', NULL),
('printrbot plus lc', 'Printrbot plus LC', NULL),
('printrbot simple', 'Printrbot simple', NULL),
('prusa air', 'Prusa Air', NULL),
('prusa air 2', 'Prusa Air 2', NULL),
('prusa mendel', 'Prusa Mendel', NULL),
('prusa mold', 'Prusa Mold', 'http://www.reprap.org/wiki/Clone_wars:_Prusa_Mold'),
('replicator', 'Makerbot Replicator', NULL),
('replicator2', 'Makerbot Replicator II', NULL),
('repstrap', 'RepStrap', NULL),
('rostock', 'Rostock', 'http://reprap.org/wiki/Rostock'),
('thingomati', 'Makerbot Thing-o-Matic', NULL),
('ultimaker', 'Ultimaker', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `provincia`) VALUES
(2, 'Albacete'),
(3, 'Alicante/Alacant'),
(4, 'Almería'),
(1, 'Araba/Álava'),
(33, 'Asturias'),
(5, 'Ávila'),
(6, 'Badajoz'),
(7, 'Balears, Illes'),
(8, 'Barcelona'),
(48, 'Bizkaia'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(39, 'Cantabria'),
(12, 'Castellón/Castelló'),
(51, 'Ceuta'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'Coruña, A'),
(16, 'Cuenca'),
(20, 'Gipuzkoa'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(27, 'Lugo'),
(25, 'Lleida'),
(28, 'Madrid'),
(29, 'Málaga'),
(52, 'Melilla'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(34, 'Palencia'),
(35, 'Palmas, Las'),
(36, 'Pontevedra'),
(26, 'Rioja, La'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia/València'),
(47, 'Valladolid'),
(49, 'Zamora'),
(50, 'Zaragoza');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(500) NOT NULL,
  `userurl` text,
  `useremail` text,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `userurl`, `useremail`) VALUES
('Desconocido', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `impresoras`
--
ALTER TABLE `impresoras`
  ADD CONSTRAINT `impresoras_ibfk_1` FOREIGN KEY (`printermodel`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `impresoras_ibfk_2` FOREIGN KEY (`printermother`) REFERENCES `impresoras` (`printernumber`),
  ADD CONSTRAINT `impresoras_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
