-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `entity_album`
--

DROP TABLE IF EXISTS `entity_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_album` (
  `id_album` int(10) NOT NULL,
  `album` varchar(100) DEFAULT NULL,
  `id_artist` varchar(100) DEFAULT NULL,
  `id_media` varchar(100) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_album`
--

LOCK TABLES `entity_album` WRITE;
/*!40000 ALTER TABLE `entity_album` DISABLE KEYS */;
INSERT INTO `entity_album` VALUES (1,'The Dead Poet\'s Department','1','1',2024),(2,'Superache','2','1',2022),(3,'The Dead Poet\'s Department','1','2',2024),(4,'Bloom','3','1',2018),(5,'30','4','1',2022),(6,'Guts','5','2',2022),(7,'What Was I Made For','6','2',2023);
/*!40000 ALTER TABLE `entity_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_product`
--

DROP TABLE IF EXISTS `entity_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `artist` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_product`
--

LOCK TABLES `entity_product` WRITE;
/*!40000 ALTER TABLE `entity_product` DISABLE KEYS */;
INSERT INTO `entity_product` VALUES (1,'The Tortured Poets Department',30.99,23,'Taylor Swift\'s newest album (CD)','products/ttpd_cd.png','Taylor Swift'),(2,'Superache',23.99,15,'Conan Gray\'s album (CD)','products/superache_cd.png','Conan Gray'),(3,'The Tortured Poets Department',35.99,10,'Taylor Swift\'s newest album (Vinyl)','products/ttpd_vinyl.png','Taylor Swift'),(4,'Bloom',23.99,45,NULL,'products/bloom_cd.png','Troye Sivan'),(5,'30',40.99,34,'Adele\'s Latest Album','products/30_cd.png','Adele'),(6,'Guts',20.99,90,NULL,'products/guts_vinyl.png','Olivia Rodrigo'),(7,'What Was I Made For',26.99,24,NULL,'products/wwimf_vinyl.png','Billie Eillish');
/*!40000 ALTER TABLE `entity_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entity_user`
--

DROP TABLE IF EXISTS `entity_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entity_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entity_user`
--

LOCK TABLES `entity_user` WRITE;
/*!40000 ALTER TABLE `entity_user` DISABLE KEYS */;
INSERT INTO `entity_user` VALUES (8,'vivienne','addy','vivienne@gmail.com','ed42785ca24ae8fa2d9fd131401e44c3c86519ae','2024-06-04 22:54:43'),(9,'brittany','hailee','brit@gmail.com','aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d','2024-06-04 23:03:03'),(10,'caroline','anne','carol@gmail.com','28b92b56ee64b92ebb72d865f172ef00c708df83','2024-06-04 23:05:37'),(11,'ariana','venti','ariana@gmail.com','7158a9e0f8e84a0a74ed148e0f652dfbd4913a18','2024-06-04 23:14:46'),(12,'mickey','mouse','mickey@gmail.com','1313994e55ed4bbe79d2b04e4529ee2f4ac288f5','2024-06-05 06:42:53'),(13,'minnie','mouse','minnie@gmail.com','1313994e55ed4bbe79d2b04e4529ee2f4ac288f5','2024-06-05 06:44:57'),(14,'donald','duck','donald@gmail.com','1313994e55ed4bbe79d2b04e4529ee2f4ac288f5','2024-06-05 06:47:55'),(15,'daisy','duck','daisy@gmail.com','1313994e55ed4bbe79d2b04e4529ee2f4ac288f5','2024-06-05 11:58:50'),(16,'hailee','chan','hailee@gmail.com','aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d','2024-06-05 11:59:50'),(17,'dragon','chan','dragon@gmail.com','af8978b1797b72acfff9595a5a2a373ec3d9106d','2024-06-05 13:20:58'),(18,'kevin','malone','kevin@gmail.com','af8978b1797b72acfff9595a5a2a373ec3d9106d','2024-06-08 13:20:00'),(19,'lisa','juan','lisa@gmail.com','c4ed14e2020dd45edb57b5fba2f40dd93952505e','2024-06-09 17:30:39'),(20,'aurelia','juan','acai@gmail.com','3cd1217f22d52905d2cd7013dcce7905737043da','2024-06-09 18:01:03'),(21,'kara','gless','kara123@gmail.com','8e690c185c1bcdb96603af3860ea537621b2b52f','2024-06-09 18:35:49');
/*!40000 ALTER TABLE `entity_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_artist`
--

DROP TABLE IF EXISTS `enum_artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_artist` (
  `id_artist` int(10) NOT NULL,
  `artist_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_artist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_artist`
--

LOCK TABLES `enum_artist` WRITE;
/*!40000 ALTER TABLE `enum_artist` DISABLE KEYS */;
INSERT INTO `enum_artist` VALUES (1,'Taylor Swift'),(2,'Conan Gray'),(3,'Troye Sivan'),(4,'Adele'),(5,'Olivia Rodrigo'),(6,'Billie Eillish');
/*!40000 ALTER TABLE `enum_artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enum_media`
--

DROP TABLE IF EXISTS `enum_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enum_media` (
  `id_type` int(10) NOT NULL,
  `media` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enum_media`
--

LOCK TABLES `enum_media` WRITE;
/*!40000 ALTER TABLE `enum_media` DISABLE KEYS */;
INSERT INTO `enum_media` VALUES (1,'CD'),(2,'Vinyl');
/*!40000 ALTER TABLE `enum_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_album_product`
--

DROP TABLE IF EXISTS `xref_album_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_album_product` (
  `id_xref_album_product` int(10) NOT NULL,
  `id_product` int(10) DEFAULT NULL,
  `id_album` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_xref_album_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_album_product`
--

LOCK TABLES `xref_album_product` WRITE;
/*!40000 ALTER TABLE `xref_album_product` DISABLE KEYS */;
INSERT INTO `xref_album_product` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7);
/*!40000 ALTER TABLE `xref_album_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xref_artist_album`
--

DROP TABLE IF EXISTS `xref_artist_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xref_artist_album` (
  `id_album` int(10) NOT NULL,
  `id_artist` int(10) DEFAULT NULL,
  `id_media` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xref_artist_album`
--

LOCK TABLES `xref_artist_album` WRITE;
/*!40000 ALTER TABLE `xref_artist_album` DISABLE KEYS */;
INSERT INTO `xref_artist_album` VALUES (1,1,1),(2,2,1),(4,3,1),(5,4,1),(6,5,2),(7,6,2);
/*!40000 ALTER TABLE `xref_artist_album` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-09 21:31:47
