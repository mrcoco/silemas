-- MySQL dump 10.13  Distrib 5.1.45, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: asisten
-- ------------------------------------------------------
-- Server version	5.1.45

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
-- Table structure for table `asisten`
--

DROP TABLE IF EXISTS `asisten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asisten` (
  `id_jadwal` char(6) NOT NULL DEFAULT '',
  `npm` char(10) NOT NULL DEFAULT '',
  `id_subject` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_jadwal`,`npm`,`id_subject`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asisten`
--

LOCK TABLES `asisten` WRITE;
/*!40000 ALTER TABLE `asisten` DISABLE KEYS */;
INSERT INTO `asisten` VALUES ('2010-1','0806335076','IKI10830'),('2010-1','1205000509','IKI30500'),('2010-1','1205000509','IKI30810');
/*!40000 ALTER TABLE `asisten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth` (
  `name` varchar(128) NOT NULL DEFAULT '',
  `role` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`,`role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

LOCK TABLES `auth` WRITE;
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES ('lapr50','piket');
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `id` char(6) NOT NULL,
  `description` text,
  `current` tinyint(1) DEFAULT NULL,
  `kurikulum` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES ('2010-1','Jadwal Piket Semester Genap 2010',1,'01.00.12.01-2009');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piket`
--

DROP TABLE IF EXISTS `piket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piket` (
  `id_jadwal` char(6) NOT NULL DEFAULT '',
  `npm` char(10) NOT NULL DEFAULT '',
  `id_subject` char(8) NOT NULL DEFAULT '',
  `day` enum('SUN','MON','TUE','WED','THU','FRI','SAT') NOT NULL DEFAULT 'SUN',
  `hour` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jadwal`,`npm`,`id_subject`,`day`,`hour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piket`
--

LOCK TABLES `piket` WRITE;
/*!40000 ALTER TABLE `piket` DISABLE KEYS */;
/*!40000 ALTER TABLE `piket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` char(8) NOT NULL DEFAULT '',
  `kurikulum` char(16) NOT NULL DEFAULT '',
  `description` text,
  PRIMARY KEY (`id`,`kurikulum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES ('IKI10600','01.00.12.01-2009','Matematika Diskret I'),('IKI10830','01.00.12.01-2009','Desain dan Pemrograman Berorientasi Objek'),('IKI30500','01.00.12.01-2009','Grafika Komputer'),('IKI30810','01.00.12.01-2009','Pemrograman Fungsional');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-16 16:53:17
