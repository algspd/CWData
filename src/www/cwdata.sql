-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 02:01 AM
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
(-10000, 'Madre', '16/05/2011', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE', 1, 'Asociación de Robótica de la UC3M', '/var/www/cw_big_data/uploads/Madre-gen0-r1.jpg'),
(-9999, 'Padre', '08/10/2011', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE', 1, 'Departamento de Ingeniería de Sistemas y Automática UC3M', '/var/www/cw_big_data/uploads/320px-PADRE-1.jpg'),
(-9998, 'R1', '19/05/2009', 'cupcake', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=Makerbot_Cupcake:_R1', 1, 'Obijuan', '/var/www/cw_big_data/uploads/R1-50.jpg'),
(-9997, 'MAF-1', '22/04/2012', 'mosaic', -100000, 28, 'http://www.reprap.org/wiki/MakerGear_Mosaic_1:_MAF-1', 1, 'Miguel Angel de Frutos', '/var/www/cw_big_data/uploads/MAF1.jpg'),
(-9996, 'Demiurgo', '15/01/2012', 'thingomati', -100000, 28, 'http://www.reprap.org/wiki/Impresora_Progenitora:_Demiurgo', 1, 'Jon Goitia', '/var/www/cw_big_data/uploads/Clon0-Demiurgo-6489.jpg'),
(-9995, '3DGDAF', '22/06/2012', 'replicator', -100000, 28, 'http://www.reprap.org/mediawiki/images/1/17/IMG_0472.jpg', 1, 'Grupo de Displays y Aplicaciones Fotónicas de la UC3M', '/var/www/cw_big_data/uploads/IMG_0472.jpg'),
(-9994, 'UPM-MAKER', '01/11/2011', 'thingomati', -100000, 28, 'http://www.iearobotics.com/wiki/index.php?title=MakerBot_Thing-o-Matic:_Robcib-Maker', 1, 'RobCib', '/var/www/cw_big_data/uploads/Robcib-maker.jpg'),
(-9993, 'CADesigns', '01/03/2011', 'thingomati', -100000, 50, '', 1, 'Carlos Monreal', '/var/www/cw_big_data/uploads/Clon0-CADesigns.png'),
(-9992, 'Madalena', '12/03/2011', 'cupcake', -100000, 38, '', 1, 'Canarnova - Grupo de creación e innovación tecnológica de Canarias', '/var/www/cw_big_data/uploads/Cupcake-madalena.jpg'),
(-9991, 'Xan', '23/09/2012', 'printrbot plus', -100000, 99, '', 1, 'Alejandro Martín', '/var/www/cw_big_data/uploads/Clone0-Xan.jpg'),
(-9990, 'Plumabot-M', '04/06/2012', 'replicator', -100000, 28, '', 1, 'IES Juan de la Cierva', '/var/www/cw_big_data/uploads/Clon0-Plumabot-M.jpg'),
(-9989, 'Pris', '20/07/2012', 'printrbot plus lc', -100000, 28, '', 1, 'Jose Hevia', '/var/www/cw_big_data/uploads/Clone0-pris.jpg'),
(-9988, 'Micro', '23/10/2012', 'printrbot jr', -100000, 28, '', 1, 'Carlos García Saura', '/var/www/cw_big_data/uploads/Clone0-pris1.jpg'),
(-9987, 'HORI', '10/07/2012', 'replicator', -100000, 28, 'http://www.reprap.org/wiki/HORI', 1, 'Chris D. McCoy', '/var/www/cw_big_data/uploads/Clon0-HORI.png'),
(-9986, 'UltiCO', '15/07/2012', 'ultimaker', -100000, 9, '', 1, 'Ivan Blasco', '/var/www/cw_big_data/uploads/Clon0-UltiCo.jpg'),
(-9985, 'Deutecno-maker', '15/12/2011', 'thingomati', -100000, 5, 'http://www.iearobotics.com/wiki/index.php?title=MakerBot_Thing-o-Matic:_Deutecno-Maker', 1, 'Deutecno, S.L', '/var/www/cw_big_data/uploads/DeutecnoMAKER-1.jpg'),
(-9984, 'Magic Carpet', '18/09/2013', 'printrbot jr', -100000, 20, '', 1, 'Antonio Campos', '/var/www/cw_big_data/uploads/Clon_0_Magic_carpet.jpg'),
(-9983, 'Plumabot-Gr', '28/09/2012', 'replicator', -100000, 18, '', 1, 'IES Virgen de las Nieves, Granada', '/var/www/cw_big_data/uploads/Clon0-Plumabot-Gr.jpg'),
(-9982, 'Art-e-Facto', '18/09/2013', 'repstrap', -100000, 28, '', 1, 'Miguel Herranz', '/var/www/cw_big_data/uploads/Art_e_Facto.jpg'),
(-5, 'R1', '19/05/2009', 'cupcake', -100000, 28, '', 1, 'Obijuan', '/var/www/cw_big_data/uploads/Madre-gen0-r1.jpg'),
(1, 'R2D2', '24/12/2011', 'prusa mendel', -9998, 28, 'http://www.iearobotics.com/wiki/index.php?title=Prusa_Mendel:_R2D2', 1, 'Obijuan', '/var/www/cw_big_data/uploads/Prusa-r2d2-clon.jpg'),
(2, 'Death Star', '17/09/2013', 'prusa mendel', -10000, 28, 'http://www.reprap.org/wiki/Clone_wars:Impresora_Death_Star', 1, 'Fernando Salceda Álvarez', '/var/www/cw_big_data/uploads/Clon-Deathstar_2012-01-07_1-r2.jpg'),
(3, 'Maese Artorius', '01/01/2012', 'prusa mendel', -10000, 28, 'http://www.reprap.org/wiki/Clone_wars:Impresora_Maese_Artorius', 1, 'Arturo Vera García', '/var/www/cw_big_data/uploads/Clon-maese-artorius.jpg');

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
