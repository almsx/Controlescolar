-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: SistemaCE
-- ------------------------------------------------------
-- Server version	5.1.49-3

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
-- Table structure for table `Alumnos`
--

DROP TABLE IF EXISTS `Alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrealumno` varchar(40) NOT NULL,
  `apellidopaterno` varchar(40) NOT NULL,
  `apellidomaterno` varchar(40) NOT NULL,
  `numerocontrol` varchar(40) NOT NULL,
  `grado` varchar(40) NOT NULL,
  `grupo` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumnos`
--

LOCK TABLES `Alumnos` WRITE;
/*!40000 ALTER TABLE `Alumnos` DISABLE KEYS */;
INSERT INTO `Alumnos` VALUES (20,'carlos alberto','luebbert','mendoza','26271190','1','a'),(21,'efrain','antono','ramirez','26271191','1','a'),(19,'oscar','lozoya','segura','26271189','1','a'),(22,'Eduardo','Saint','Martin','26271192','6','b'),(23,'Esteban','Arce','Atlante','26271193','8','b'),(24,'Martin','Perez','Diaz','26271195','8','b'),(26,'Carlos','Diaz','Gonzalez','26271196','9','B');
/*!40000 ALTER TABLE `Alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctos`
--

DROP TABLE IF EXISTS `Doctos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docto1` varchar(20) NOT NULL DEFAULT 'no',
  `docto2` varchar(20) NOT NULL DEFAULT 'no',
  `docto3` varchar(20) NOT NULL DEFAULT 'no',
  `docto4` varchar(20) NOT NULL DEFAULT 'no',
  `docto5` varchar(20) NOT NULL DEFAULT 'no',
  `docto6` varchar(20) NOT NULL DEFAULT 'no',
  `docto7` varchar(20) NOT NULL DEFAULT 'no',
  `docto8` varchar(20) NOT NULL DEFAULT 'no',
  `docto9` varchar(20) NOT NULL DEFAULT 'no',
  `doctoa` varchar(20) NOT NULL DEFAULT 'no',
  `idAlumno` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlumno` (`idAlumno`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctos`
--

LOCK TABLES `Doctos` WRITE;
/*!40000 ALTER TABLE `Doctos` DISABLE KEYS */;
INSERT INTO `Doctos` VALUES (33,'no','no','no','no','no','no','no','no','no','no',24),(31,'jose','jose','jose','jose','jose','jose','jose','jose','jose','jose',22),(32,'no','no','no','no','no','no','no','no','no','no',23),(30,'no','no','no','no','no','no','no','no','no','no',21),(29,'no','no','no','no','no','no','no','no','no','no',20),(27,'ya','ya','ya','ya','ya','ya','ya','ya','ya','ya',22),(34,'no','no','no','no','no','no','no','no','no','no',25);
/*!40000 ALTER TABLE `Doctos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-30 15:40:01
