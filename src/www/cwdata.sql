-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cwdata
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `impresoras`
--

DROP TABLE IF EXISTS `impresoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impresoras` (
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
  KEY `printermodel` (`printermodel`),
  CONSTRAINT `impresoras_ibfk_1` FOREIGN KEY (`printermodel`) REFERENCES `models` (`id`),
  CONSTRAINT `impresoras_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  CONSTRAINT `impresoras_ibfk_4` FOREIGN KEY (`printermother`) REFERENCES `impresoras` (`printernumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impresoras`
--

LOCK TABLES `impresoras` WRITE;
/*!40000 ALTER TABLE `impresoras` DISABLE KEYS */;
INSERT INTO `impresoras` VALUES (-100000,'Sin madre',NULL,NULL,-100000,NULL,NULL,1,'*Desconocido',NULL),(-99999,'Madre desconocida','','.1',-100000,2,'',1,'*Desconocido','/var/www/CWData/src/www/uploads/Circle-question.png'),(-10000,'Madre','16/05/2011','thingomati',-100000,28,'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE',1,'Asociación de Robótica de la UC3M','/var/www/cw_big_data/uploads/Madre-gen0-r1.jpg'),(-9999,'Padre','08/10/2011','thingomati',-100000,28,'http://www.iearobotics.com/wiki/index.php?title=Impresora_3D:MADRE',1,'Departamento de Ingeniería de Sistemas y Automática UC3M','/var/www/cw_big_data/uploads/320px-PADRE-1.jpg'),(-9998,'R1','19/05/2009','cupcake',-100000,28,'http://www.iearobotics.com/wiki/index.php?title=Makerbot_Cupcake:_R1',1,'Obijuan','/var/www/cw_big_data/uploads/R1-50.jpg'),(-9997,'MAF-1','22/04/2012','mosaic',-100000,28,'http://www.reprap.org/wiki/MakerGear_Mosaic_1:_MAF-1',1,'Miguel Angel de Frutos','/var/www/cw_big_data/uploads/MAF1.jpg'),(-9996,'Demiurgo','15/01/2012','thingomati',-100000,28,'http://www.reprap.org/wiki/Impresora_Progenitora:_Demiurgo',1,'Jon Goitia','/var/www/cw_big_data/uploads/Clon0-Demiurgo-6489.jpg'),(-9995,'3DGDAF','22/06/2012','replicator',-100000,28,'http://www.reprap.org/mediawiki/images/1/17/IMG_0472.jpg',1,'Grupo de Displays y Aplicaciones Fotónicas de la UC3M','/var/www/cw_big_data/uploads/IMG_0472.jpg'),(-9994,'UPM-MAKER','01/11/2011','thingomati',-100000,28,'http://www.iearobotics.com/wiki/index.php?title=MakerBot_Thing-o-Matic:_Robcib-Maker',1,'RobCib','/var/www/cw_big_data/uploads/Robcib-maker.jpg'),(-9993,'CADesigns','01/03/2011','thingomati',-100000,50,'www.cadesigns.es',1,'Carlos Monreal','/var/www/cw_big_data/uploads/Clon0-CADesigns.png'),(-9992,'Madalena','12/03/2011','cupcake',-100000,38,'',1,'Canarnova - Grupo de creación e innovación tecnológica de Canarias','/var/www/cw_big_data/uploads/Cupcake-madalena.jpg'),(-9991,'Xan','23/09/2012','printrbot plus',-100000,99,'',1,'Alejandro Martín','/var/www/cw_big_data/uploads/Clone0-Xan.jpg'),(-9990,'Plumabot-M','04/06/2012','replicator',-100000,28,'',1,'IES Juan de la Cierva','/var/www/cw_big_data/uploads/Clon0-Plumabot-M.jpg'),(-9989,'Pris','20/07/2012','printrbot plus lc',-100000,28,'',1,'Jose Hevia','/var/www/cw_big_data/uploads/Clone0-pris.jpg'),(-9988,'Micro','23/10/2012','printrbot jr',-100000,28,'',1,'Carlos García Saura','/var/www/cw_big_data/uploads/Clone0-pris1.jpg'),(-9987,'HORI','10/07/2012','replicator',-100000,28,'http://www.reprap.org/wiki/HORI',1,'Chris D. McCoy','/var/www/cw_big_data/uploads/Clon0-HORI.png'),(-9986,'UltiCO','15/07/2012','ultimaker',-100000,9,'',1,'Ivan Blasco','/var/www/cw_big_data/uploads/Clon0-UltiCo.jpg'),(-9985,'Deutecno-maker','15/12/2011','thingomati',-100000,5,'http://www.iearobotics.com/wiki/index.php?title=MakerBot_Thing-o-Matic:_Deutecno-Maker',1,'Deutecno, S.L','/var/www/cw_big_data/uploads/DeutecnoMAKER-1.jpg'),(-9984,'Magic Carpet','18/09/2013','printrbot jr',-100000,20,'',1,'Antonio Campos','/var/www/cw_big_data/uploads/Clon_0_Magic_carpet.jpg'),(-9983,'Plumabot-Gr','28/09/2012','replicator',-100000,18,'',1,'IES Virgen de las Nieves, Granada','/var/www/cw_big_data/uploads/Clon0-Plumabot-Gr.jpg'),(-9982,'Art-e-Facto','18/09/2013','repstrap',-100000,28,'',1,'Miguel Herranz','/var/www/cw_big_data/uploads/Art_e_Facto.jpg'),(1,'R2D2','24/12/2011','prusa mendel',-9998,28,'http://www.iearobotics.com/wiki/index.php?title=Prusa_Mendel:_R2D2',1,'Obijuan','/var/www/cw_big_data/uploads/Prusa-r2d2-clon.jpg'),(2,'Death Star','17/09/2013','prusa mendel',-10000,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Death_Star',1,'Fernando Salceda Álvarez','/var/www/cw_big_data/uploads/Clon-Deathstar_2012-01-07_1-r2.jpg'),(3,'Maese Artorius','01/01/2012','prusa mendel',-10000,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Maese_Artorius',1,'Arturo Vera García','/var/www/cw_big_data/uploads/Clon-maese-artorius.jpg'),(4,'Mardan','19/01/2012','prusa mendel',-10000,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Mardan',1,'Marco Esteban Illescas','/var/www/CWData/src/www/uploads/Clon-mardan1.jpg'),(5,'Halcón Milenario','27/01/2012','prusa mendel',-99999,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Halc%C3%B3n_Milenario',0,'Carlos García Saura','/var/www/CWData/src/www/uploads/Clon_halcon_milenario.png'),(6,'GLaDOS','02/02/2012','repstrap',-100000,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_GLaDOS',1,'Miguel Ángel Herranz','/var/www/CWData/src/www/uploads/Clon_GLaDOS.jpg'),(7,'PacleMAKER','07/02/2012','prusa mendel',-99999,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_PacleMAKER',1,'Pablo Clemente','/var/www/CWData/src/www/uploads/2012-02-07-paclemaker.jpg'),(8,'Sonny','07/02/2012','prusa mendel',-10000,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Sonny',1,'Daniel Gómez','/var/www/CWData/src/www/uploads/Clon-mardan2.jpg'),(9,'Johnny 5','25/02/2012','prusa mendel',-99999,3,'http://www.mbrobotics.es/Wiki/index.php?title=JOHNNY5',1,'Miguel Angel Berna Alberola (MABLACK )','/var/www/CWData/src/www/uploads/J52-r1.jpg'),(10,'Manuela','02/03/2012','prusa mendel',-99999,47,'http://www.reprap.org/wiki/Clone_wars:Impresora_Manuela',1,'Jose Luis del Olmo (Macnetic)','/var/www/cw_big_data/uploads/Jedi_manuela.jpg'),(11,'Debugger','28/02/2012','p2',-99999,99,'http://www.reprap.org/wiki/Clone_wars:Impresora_Debugger',1,'*Desconocido','/var/www/CWData/src/www/uploads/Clon_debugger_01-r1.jpg'),(12,'Fenix-bot','11/03/2012','p2',-99999,9,'http://www.reprap.org/wiki/Clone_wars:Impresora_Fenix-bot',1,'*Desconocido','/var/www/CWData/src/www/uploads/Fenix-bot_final_03.JPG'),(13,'R3','01/04/2012','p2',1,28,'http://www.iearobotics.com/wiki/index.php?title=Prusa_Mendel_Iteraci%C3%B3n_2:_R3',1,'Obijuan','/var/www/cw_big_data/uploads/R3-16.jpg'),(14,'AT-AT','12/04/2012','prusa mendel',-99999,99,'http://www.reprap.org/wiki/Clone_wars:Impresora_AT-AT',1,'Xavier Tamarit','/var/www/CWData/src/www/uploads/ATAT.jpg'),(15,'Ociorum/Bricolabs','13/04/2012','p2',-100000,15,'http://www.reprap.org/wiki/Clone_wars:_Impresora_Ociorum',1,'Asociación Ociorum','/var/www/CWData/src/www/uploads/IMG_1310.jpg'),(16,'Potato','15/04/2012','p2',-99999,28,'http://www.reprap.org/wiki/Clone_wars:_Impresora_Potato',1,'Santiago López','/var/www/CWData/src/www/uploads/Potato-r1.png'),(17,'Úterus','05/05/2012','p2',1,28,'http://www.reprap.org/wiki/Clone_wars:_Impresora_Uterus',1,'Coleóptero','/var/www/CWData/src/www/uploads/800px-Clon-17-uterus.jpg'),(18,'Han','06/05/2012','p2',1,99,'http://www.iearobotics.com/wiki/index.php?title=Prusa_Mendel_Iteraci%C3%B3n_2:_Han',1,'Andrés Prieto Moreno','/var/www/cw_big_data/uploads/Clon-18-han.png'),(19,'Black Misan','23/10/2011','prusa mendel',-99999,46,'http://www.reprap.org/wiki/Clone_Wars:_Impresora_Black_Misan',1,'Miguel Sánchez (misan)','/var/www/CWData/src/www/uploads/Misan1-r1.png'),(20,'Blue Misan','15/03/2012','p2',19,46,'http://www.reprap.org/wiki/Clone_Wars:_Impresora_Blue_Misan',1,'Miguel Sánchez (misan)','/var/www/CWData/src/www/uploads/Misan2-r3.png'),(21,'Ukraine','08/04/2012','printrbot',20,46,'http://www.reprap.org/wiki/Clone_wars:Impresora_Ukraine',1,'Miguel Sánchez (misan)','/var/www/CWData/src/www/uploads/Ukraine-r1.png'),(22,'Grifo','18/05/2012','p2',-99999,49,'http://www.reprap.org/wiki/Clone_wars:Impresora_Grifo',1,'Abraham Alvaro Jimenez y Nerea Alvaro Santos','/var/www/CWData/src/www/uploads/Clon-22-Grifo-r1.jpg'),(23,'The Clon UA','23/05/2012','p2',2,3,'http://www.reprap.org/wiki/Clone_wars:_The_Clone_UA/es',1,'Diego Viejo','/var/www/CWData/src/www/uploads/Clone-23-The_Clone_UA_Jedi.jpg'),(24,'Lucy','01/06/2013','printrbot',5,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Lucy',1,'Carlos García Saura','/var/www/CWData/src/www/uploads/Impresora_Lucy_2_Junio_20121.jpg'),(25,'TIE Fighter','11/06/2012','p2',2,28,'http://www.reprap.org/wiki/Clone_wars:_TIEFighter',1,'Fernando Salceda Álvarez','/var/www/CWData/src/www/uploads/Clon-25-Tiefighter.jpg'),(26,'Rewok','13/06/2012','printrbot',-9997,32,'http://www.reprap.org/wiki/Clone_wars:_Impresora_Rewok',1,'Miguel Angel de Frutos','/var/www/CWData/src/www/uploads/Clone-26-Rewok.png'),(27,'Shodan','17/06/2012','p2',13,28,'http://www.reprap.org/wiki/Clone_wars:_Impresora_SHODAN',1,'Jaime García (elgambitero)','/var/www/CWData/src/www/uploads/Clon-27-SHODAN.png'),(28,'Dédalo','19/06/2012','p2',-9999,28,'',1,'David Estévez Fernández','/var/www/CWData/src/www/uploads/200px-Clon-28-Dedalo.jpg'),(36,'Pepa','28/07/2012','p2',10,47,'http://www.reprap.org/wiki/Clone_Wars:_Impresora_Pepa',1,'Jose Ignacio Alonso','/var/www/cw_big_data/uploads/Clon-36-Pepa.jpg'),(39,'Daneel 3-law','11/08/2012','p2',10,50,'http://www.reprap.org/wiki/Clone_wars:Impresora_Daneel_3-law',1,'Asimov','/var/www/cw_big_data/uploads/Clone-39-Daneel_3-law_jedi.png'),(42,'R2-RELOADED','25/09/2013','p2',13,28,'http://www.iearobotics.com/wiki/index.php?title=Prusa_Mendel_Iteraci%C3%B3n_2:_R2-reloaded',1,'Obijuan','/var/www/cw_big_data/uploads/R2-Reloaded-decorada.png'),(43,'Tron','20/09/2013','p2',2,28,'',1,'Ramon Rivas, Edgar Salas y Guillermo Welch ','/var/www/cw_big_data/uploads/Clon-43-Tron.jpg'),(50,'C3PO','17/09/2012','printrbot',10,28,'',1,'Alvaro Lara','/var/www/cw_big_data/uploads/Clon-50-C3po.jpg'),(53,'Michaelmas','05/10/2012','p2',10,47,'http://www.reprap.org/wiki/Clone_wars:Impresora_Michaelmas',1,'Jose Luis del Olmo (Macnetic)','/var/www/cw_big_data/uploads/Clon-53-Michaelmas.jpg'),(59,'JJMachine','20/10/2012','p2',39,29,'',1,'JgemezCW y Jimmmenez','/var/www/cw_big_data/uploads/Clon-59-JJmachine.png'),(64,'Irohide','26/10/2012','p2',39,6,'http://imc9.blogspot.com.es/p/impresora-3d.html',1,'Ismael De Migel Cantero','/var/www/cw_big_data/uploads/Clon-64-Ironhide.jpg'),(72,'Terpsícore','11/11/2012','huxley',39,50,'http://www.reprap.org/wiki/Clone_wars:Impresora_Terpsicore',1,'Asimov','/var/www/cw_big_data/uploads/Clon-72-terpsicore.jpg'),(77,'Alcar','25/11/2012','p2',10,28,'http://www.reprap.org/wiki/M%C3%81S_INFORMACI%C3%93N',1,'Jose Sanchez Sanchez','/var/www/cw_big_data/uploads/Clone-77-alcar.jpg'),(81,'Neutronium','06/10/2012','p2',39,50,'',1,'DLabs','/var/www/cw_big_data/uploads/800px-Clon_81_Neutronium.jpg'),(90,'Ester Píscole','06/12/2012','p3_box',39,50,'http://www.reprap.org/wiki/Clone_wars:Impresora_EsterPiscole',1,'Asimov','/var/www/cw_big_data/uploads/500px-Clon-90-esterpiscole2.jpg'),(100,'Nazgul hijo de Manuela','28/12/2012','p2',10,20,'',1,'Ángel Andrés Lerena Pariente','/var/www/cw_big_data/uploads/Nazgul_hijo_de_manuela.jpg'),(101,'Nida','10/02/2013','p2',39,28,'http://reprap.org/wiki/User:JvitonCW',1,'JJViton','/var/www/cw_big_data/uploads/La_foto5.JPG'),(134,'Giskard','29/01/2013','p3_box',90,50,'',1,'Asimov','/var/www/cw_big_data/uploads/300px-Impresora_giskard.jpg'),(143,'Matriuska','10/02/2013','p2',39,9,'http://reprap.org/wiki/Clone_wars:Impresora_Matriuska',1,'Manuel Bocos','/var/www/cw_big_data/uploads/Matriuska_lcd.JPG'),(148,'Shmi Skywalker.','10/02/2013','p2',10,31,'',1,'Nicholas Dawe','/var/www/CWData/src/www/uploads/150px-Shmi_skywalker_b1.jpg'),(150,'MeMe','16/02/2013','p3_box',134,50,'www.farynozzle.com',1,'Carlos Monreal','/var/www/cw_big_data/uploads/MeMe.JPG'),(155,'Cazurra','20/09/2013','p2',2,24,'',1,'Jose Angel (jakolete)','/var/www/cw_big_data/uploads/20121130_201247.jpg'),(162,'Tramuntana3D','03/02/2013','p3_alu',90,17,'',1,'Lluís Vilarrúbies','/var/www/cw_big_data/uploads/Tramuntana3D.jpg'),(164,'Ariel','02/03/2013','p3_box',134,46,'',1,'Arturo Sancho','/var/www/cw_big_data/uploads/Ariel-i3_WEB.jpg'),(178,'Prusikito','22/03/2013','p2',10,28,'http://www.reprap.org/wiki/Clone_wars:_Impresora_Prusikito',1,'Fernando Murillo y Elena de Pedro','/var/www/cw_big_data/uploads/Prusikito.jpg'),(181,'VENTURPRINT','23/03/2013','p2',134,28,'',1,'Carlos Lamparero','/var/www/cw_big_data/uploads/Venturprint_Jedi2.jpg'),(185,'Gort','03/04/2013','p3_alu',17,28,'http://www.reprap.org/wiki/Clone_wars:Impresora_Gort/es',1,'Jose M. Martín','/var/www/CWData/src/www/uploads/515px-Gort_201309.jpg'),(215,'Bolisa','29/04/2013','p2',134,50,'',1,'Cipri Ballester','/var/www/cw_big_data/uploads/Bolisa.JPG'),(223,'TelarBot','07/06/2013','p2',90,50,'',1,'Julian Garcia','/var/www/cw_big_data/uploads/TelarBot1.jpg'),(225,'Imprusora Filosofal','18/06/2013','p3_alu',134,28,'',1,'Sergio MC','/var/www/cw_big_data/uploads/Imprusora_Filosofal.jpg'),(227,'Bender 1.0','29/06/2013','p2',134,21,'',1,'Iván Ramírez Beltrán','/var/www/cw_big_data/uploads/Bender_1.0_.JPG'),(235,'Solo','16/07/2013','p2',7,17,'http://www.reprap.org/wiki/Clone_wars:Impresora_J%26JSolo',1,'Josep Ponce [tra7montana]','/var/www/CWData/src/www/uploads/Solo_Construccio_043_Mirall_Thumb.jpg'),(244,'TalaPrusa','11/08/2013','p3_alu',-99999,45,'',1,'Antonio Navarro','/var/www/CWData/src/www/uploads/TalaPrusa.png'),(245,'K-9-YA','22/08/2013','p3_alu',64,9,'',1,'*Desconocido','/var/www/CWData/src/www/uploads/300px-K-9-YA.JPG');
/*!40000 ALTER TABLE `impresoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `models` (
  `id` varchar(30) NOT NULL,
  `human` text NOT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES ('.1','Desconocido',NULL),('cupcake','Cupcake',NULL),('huxley','Huxley',NULL),('mosaic','Makergear Mosaic',NULL),('p2','Prusa 2','http://reprap.org/wiki/Prusa_Mendel_(iteration_2)'),('p3_alu','Prusa 3 aluminio','http://reprap.org/wiki/Clone_wars:_Prusa_iteraci%C3%B3n_3_single_frame'),('p3_box','Prusa 3 box','http://www.reprap.org/wiki/Clone_wars:_Prusa_iteración_3'),('portabee','PortaBee',NULL),('printrbot','Printrbot',NULL),('printrbot 2','Printrbot 2',NULL),('printrbot jr','Printrbot jr',NULL),('printrbot plus','Printrbot plus',NULL),('printrbot plus lc','Printrbot plus LC',NULL),('printrbot simple','Printrbot simple',NULL),('prusa air','Prusa Air',NULL),('prusa air 2','Prusa Air 2',NULL),('prusa mendel','Prusa Mendel',NULL),('prusa mold','Prusa Mold','http://www.reprap.org/wiki/Clone_wars:_Prusa_Mold'),('replicator','Makerbot Replicator',NULL),('replicator2','Makerbot Replicator II',NULL),('repstrap','RepStrap',NULL),('rostock','Rostock','http://reprap.org/wiki/Rostock'),('thingomati','Makerbot Thing-o-Matic','http://www.makerbot.com/support/thingomatic/'),('ultimaker','Ultimaker',NULL);
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (2,'Albacete'),(3,'Alicante/Alacant'),(4,'Almería'),(1,'Araba/Álava'),(33,'Asturias'),(5,'Ávila'),(6,'Badajoz'),(7,'Balears, Illes'),(8,'Barcelona'),(48,'Bizkaia'),(9,'Burgos'),(10,'Cáceres'),(11,'Cádiz'),(39,'Cantabria'),(12,'Castellón/Castelló'),(51,'Ceuta'),(13,'Ciudad Real'),(14,'Córdoba'),(15,'Coruña, A'),(16,'Cuenca'),(20,'Gipuzkoa'),(17,'Girona'),(18,'Granada'),(19,'Guadalajara'),(21,'Huelva'),(22,'Huesca'),(23,'Jaén'),(24,'León'),(27,'Lugo'),(25,'Lleida'),(28,'Madrid'),(29,'Málaga'),(52,'Melilla'),(30,'Murcia'),(31,'Navarra'),(32,'Ourense'),(34,'Palencia'),(35,'Palmas, Las'),(36,'Pontevedra'),(26,'Rioja, La'),(37,'Salamanca'),(38,'Santa Cruz de Tenerife'),(40,'Segovia'),(41,'Sevilla'),(42,'Soria'),(43,'Tarragona'),(44,'Teruel'),(45,'Toledo'),(46,'Valencia/València'),(47,'Valladolid'),(49,'Zamora'),(50,'Zaragoza'),(99,'Otro');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(500) NOT NULL,
  `userurl` text,
  `useremail` text,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('*Desconocido',NULL,NULL),('Abraham Alvaro Jimenez y Nerea Alvaro Santos','',''),('Alberto Valero','',''),('Alejandro Martín','',''),('Alvaro Lara','',''),('Andrés Prieto Moreno','http://www.iearobotics.com/wiki/index.php?title=Andr%C3%A9s_Prieto-Moreno','andres@iearobotics.com'),('Ángel Andrés Lerena Pariente','',''),('Antonio Campos','',''),('Antonio Navarro','','antonio.navarro.es@gmail.com'),('Arturo Sancho','',''),('Arturo Vera García','',''),('Asimov','',''),('Asociación de Robótica de la UC3M','http://asrob.uc3m.es/',''),('Asociación Ociorum','http://www.ociorum.org/',''),('BLACK KNIGHT (Nuria y Vicente Almodovar)','http://almodovar.org.es/prusa',''),('Canarnova - Grupo de creación e innovación tecnológica de Canarias','http://canarnova.blogspot.com/',''),('Carlos García Saura','http://carlosgs.es/',''),('Carlos Lamparero','',''),('Carlos Monreal','',''),('Chris D. McCoy','http://www-bsac.eecs.berkeley.edu/~mccoy/',''),('Cipri Ballester','',''),('Coleóptero','',''),('Daniel Gómez','http://sites.google.com/site/danielgomezlendinez/',''),('David Estévez Fernández','dsquaredrobotics.com',''),('David Gonzalez (Ghosthawk)','',''),('Departamento de Ingeniería de Sistemas y Automática UC3M','http://www.uc3m.es/portal/page/portal/dpto_ing_sistemas_automatica',''),('Deutecno, S.L','http://www.deutecno.com/index2.html',''),('Diego Viejo','',''),('DLabs','',''),('Fernando Murillo y Elena de Pedro','',''),('Fernando Salceda Álvarez','',''),('Grupo de Displays y Aplicaciones Fotónicas de la UC3M','http://www.uc3m.es/portal/page/portal/grupos_investigacion/grupo_displays_aplicaciones_fotonicas',''),('IES Juan de la Cierva','',''),('IES Virgen de las Nieves, Granada','',''),('Ismael De Migel Cantero','',''),('Ivan Blasco','',''),('Iván Ramírez Beltrán','',''),('Jaime García (elgambitero)','',''),('JgemezCW y Jimmmenez','',''),('JJViton','',''),('Jon Goitia','',''),('Jose Angel (jakolete)','',''),('Jose Hevia','',''),('Jose Ignacio Alonso','',''),('Jose Luis del Olmo','www.3dorobotics.com','jdelolmo@3dorobotics.com'),('Jose Luis del Olmo (Macnetic)','',''),('Jose M. Martín','',''),('Jose Sanchez Sanchez','',''),('Josep Ponce [tra7montana]','','jrricastell@hotmail.com'),('Julian Garcia','',''),('Lluís Vilarrúbies','',''),('Manuel Bocos','',''),('Marco Esteban Illescas','',''),('Miguel Angel Berna Alberola (MABLACK )','http://www.mbrobotics.es/MbRobotics/Main.html',''),('Miguel Angel de Frutos','',''),('Miguel Ángel Herranz','',''),('Miguel Herranz','',''),('Miguel Sánchez (misan)','',''),('Nicholas Dawe','','mvx15@hotmail.com'),('Obijuan','http://www.iearobotics.com/wiki/index.php?title=Juan_Gonzalez:Main',''),('Pablo Clemente','',''),('Ramon Rivas, Edgar Salas y Guillermo Welch ','',''),('RobCib','http://www.robcib.etsii.upm.es/',''),('Santiago López','https://plus.google.com/108347194424547002289/about',''),('Sergio MC','',''),('Xavier Tamarit','https://plus.google.com/u/0/109869086151819488199/posts','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-27 17:06:34
