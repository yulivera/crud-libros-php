-- MySQL dump 10.13  Distrib 5.7.24, for Win32 (AMD64)
--
-- Host: localhost    Database: crud_libro_simple
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcat` int(12) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (5,'Informatica'),(6,'Novela'),(7,'Fantasia'),(8,'Infantil'),(9,'Misterio'),(10,'Clasico');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `idcategoria` int(12) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `fecha` int(4) DEFAULT NULL,
  `portada` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`idcategoria`),
  CONSTRAINT `FK_libro_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (59,'El arte de ser un desastre','Jennifer Mccartney',' Netus interdum a, tellus sodales? Natoque dignissim porttitor venenatis est vulputate.',6,'Larense',2017,'img/6f31fe01dded0cbed785b19969c27200.jpg'),(60,'El misterio de las cuatro cartas','Sophie Hannah',' Netus interdum a, tellus sodales? Natoque dignissim porttitor venenatis est vulputate.',7,'Espasa',2017,'img/177ac3cc6c6552cc046feb04d4f7eef8.jpg'),(61,'El monje que vendio su ferrari','Robin Sharma','Vitae erat, feugiat odio magna. Lacus suscipit vestibulum et sociosqu dolor nam mi.',8,'Debolsillo',2015,'img/80cce15186567f5f0ae8db0563677840.jpg'),(62,'La reina roja','Victoria Aveyard','Mollis netus, risus ut mi morbi posuere convallis. Enim felis morbi sociosqu quisque.',9,'Gran Travesia',2018,'img/43b392db53d91dc30951d1fcf3d794d7.jpg'),(63,'Los lunes en el Ritz','Nerea Riesgo','Mollis netus, risus ut mi morbi posuere convallis. Enim felis morbi sociosqu quisque. ',6,'Espasa',2018,'img/c11127f4694c6e74923dffdba7d423b2.jpg'),(64,'El tren de los Huerfanos','Chistina Baker Kline','Mollis netus, risus ut mi morbi posuere convallis. Enim felis morbi sociosqu quisque. ',9,'BN.',2019,'img/c025b7bf776777fc47d961e920b25fc2.jpg'),(65,'Aqui dentro siempre llueve','Chris Pueyo','Mollis netus, risus ut mi morbi posuere convallis. Enim felis morbi sociosqu quisque. ',7,'Destino',2012,'img/5d0b5276204b41b2e607ac6e9f5dd882.jpg'),(66,'Brilla todo lo que puedas','Sara Rattaro','Vitae erat, feugiat odio magna. Lacus suscipit vestibulum et sociosqu dolor nam mi.',6,'Duomo',2019,'img/06805ff889e37adb5f772c1213735928.jpg'),(68,'Cien aÃ±os de soledad','Gabriel Garcia Marquez','Vitae erat, feugiat odio magna. Lacus suscipit vestibulum et sociosqu dolor nam mi.',10,'Debolsillo',2017,'img/669528a5cbae57c0439f168fd90b93cb.jpg'),(71,'Ciudades de papel','John Green','Mollis netus, risus ut mi morbi posuere convallis. Enim felis morbi sociosqu quisque.\r\nfelis morbi sociosqu quisque.felis morbi sociosqu quisque.felis morbi sociosqu quisque.felis morbi sociosqu quisque.',7,'Nube de Tinta',2020,'img/32d997ae60a7ae11a4fd4f3541007d1c.jpg');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2005-01-01  2:11:12
