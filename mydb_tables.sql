-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: lab10
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

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
-- Table structure for table `yogacards`
--

DROP TABLE IF EXISTS `yogacards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yogacards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picname` varchar(20) NOT NULL,
  `englishname` varchar(30) NOT NULL,
  `sanskritname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yogacards`
--

LOCK TABLES `yogacards` WRITE;
/*!40000 ALTER TABLE `yogacards` DISABLE KEYS */;
INSERT INTO `yogacards` VALUES (1,'1.jpg','Downward-Facing-Tree','Adho-Mukha-Vrksasana'),(2,'2.jpg','Formation-of-a-Bow','Adho-Mukha-Vrksasana'),(3,'3.jpg','Boat-Pose','Navasana'),(4,'4.jpg','Serpent-Vishnu-Slept-On','Anantasana'),(5,'5.jpg','Half-Lotus-pose','Ardha-Padmasana'),(6,'6.jpg','Backbend-salute','Sun-Salutation'),(7,'7.jpg','Bow-Pose','Dhanurasana'),(8,'8.jpg','Yogic-Sleep-Pose','Yoganidrasana'),(9,'9.jpg','Side-Headstand','Parsva-Sirsasana'),(19,'10.jpg','Revolved-Camel-Pose','Parivartta-Ustrasana'),(20,'11.jpg','Warriror1','Virabhadrasana'),(21,'12.jpg','Standing-Forward-Bend','Uttanasana'),(22,'13.jpg','Reclining-Hero-Pose','SuptaVirasana'),(23,'14.jpg','Large-Pit-Or-Hollow','Tadakasana'),(24,'15.jpg','Mountain','Tadasana'),(25,'16.jpg','Reclining-Angle-Pose','Supta-Konasana'),(26,'17.jpg','Downward-Facing-Staff','Adho-Mukha-Dandasana'),(27,'18.jpg','Revolving-Half-Lotus','Parivrtta-Ardha-Padmasana'),(28,'19.jpg','Supported-Pigeon-Pose','Salamba-Kapotasana'),(29,'20.jpg','Revolved-Knee-Head','Parivrtta-Janu-Sirsasana');
/*!40000 ALTER TABLE `yogacards` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-27 15:22:50
