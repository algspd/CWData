-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 12:18 PM
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
('.1', 'Desconocido', NULL),
('cupcake', 'Cupcake', NULL),
('huxley', 'Huxley', NULL),
('mosaic', 'Makergear Mosaic', NULL),
('p2', 'Prusa 2', 'http://reprap.org/wiki/Prusa_Mendel_(iteration_2)'),
('p3_alu', 'Prusa 3 aluminio', 'http://reprap.org/wiki/Clone_wars:_Prusa_iteraci%C3%B3n_3_single_frame'),
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
('thingomati', 'Makerbot Thing-o-Matic', 'http://www.makerbot.com/support/thingomatic/'),
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
(50, 'Zaragoza'),
(99, 'Otro');

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
('*Desconocido', NULL, NULL),
('Alberto Valero', '', ''),
('Alejandro Martín', '', ''),
('Antonio Campos', '', ''),
('Arturo Vera García', '', ''),
('Asimov', '', ''),
('Asociación de Robótica de la UC3M', 'http://asrob.uc3m.es/', ''),
('Canarnova - Grupo de creación e innovación tecnológica de Canarias', 'http://canarnova.blogspot.com/', ''),
('Carlos García Saura', 'http://carlosgs.es/', ''),
('Carlos Monreal', '', ''),
('Chris D. McCoy', 'http://www-bsac.eecs.berkeley.edu/~mccoy/', ''),
('Departamento de Ingeniería de Sistemas y Automática UC3M', 'http://www.uc3m.es/portal/page/portal/dpto_ing_sistemas_automatica', ''),
('Deutecno, S.L', 'http://www.deutecno.com/index2.html', ''),
('Fernando Salceda Álvarez', '', ''),
('Grupo de Displays y Aplicaciones Fotónicas de la UC3M', 'http://www.uc3m.es/portal/page/portal/grupos_investigacion/grupo_displays_aplicaciones_fotonicas', ''),
('IES Juan de la Cierva', '', ''),
('IES Virgen de las Nieves, Granada', '', ''),
('Ivan Blasco', '', ''),
('Jon Goitia', '', ''),
('Jose Hevia', '', ''),
('Miguel Angel de Frutos', '', ''),
('Miguel Herranz', '', ''),
('Obijuan', 'http://www.iearobotics.com/wiki/index.php?title=Juan_Gonzalez:Main', ''),
('RobCib', 'http://www.robcib.etsii.upm.es/', '');

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
