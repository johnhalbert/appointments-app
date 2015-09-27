CREATE DATABASE  IF NOT EXISTS `appointments` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `appointments`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: localhost    Database: appointments
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_datetime` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tasks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointments_users_idx` (`user_id`),
  CONSTRAINT `fk_appointments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (5,'2015-06-24 13:00:00','2015-06-12 14:27:31','2015-06-12 14:27:31',1,'tesing'),(6,'2015-06-10 03:00:00','2015-06-12 14:29:42','2015-06-12 14:29:42',1,'dsafasdf'),(8,'0000-00-00 00:00:00','2015-06-12 14:53:00','2015-06-12 15:53:50',1,'Red belt testing'),(9,'2015-06-02 13:00:00','2015-06-12 15:11:14','2015-06-12 15:11:14',1,'Testing'),(10,'2015-07-01 01:00:00','2015-06-12 15:20:42','2015-06-12 15:20:42',2,'testing'),(11,'2015-06-13 19:00:00','2015-06-12 15:56:40','2015-06-12 15:57:42',1,'Refreshing again!'),(12,'2015-06-12 23:00:00','2015-06-12 15:58:10','2015-06-12 16:32:05',1,'Yes, again!'),(14,'2015-06-19 13:01:00','2015-06-12 15:59:24','2015-06-12 15:59:24',3,'testing again!'),(15,'2015-06-19 01:01:00','2015-06-12 16:08:13','2015-06-12 16:08:13',3,'test'),(16,'2015-06-24 01:03:00','2015-06-12 16:27:22','2015-06-12 16:27:22',1,'Here again, a test.'),(17,'2015-06-12 23:00:00','2015-06-12 16:30:03','2015-06-12 16:30:03',1,'testing');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John','john@john.com','2017-01-01 00:00:00','ae2b1fca515949e5d54fb22b8ed95575','2015-06-12 14:27:19','2015-06-12 14:27:19'),(2,'James','james@james.com','2010-10-29 00:00:00','ae2b1fca515949e5d54fb22b8ed95575','2015-06-12 15:20:24','2015-06-12 15:20:24'),(3,'New','new@person.com','2005-01-04 00:00:00','ae2b1fca515949e5d54fb22b8ed95575','2015-06-12 15:58:52','2015-06-12 15:58:52'),(4,'John Smith','john@smith.com','1990-01-01 00:00:00','ae2b1fca515949e5d54fb22b8ed95575','2015-06-12 16:32:45','2015-06-12 16:32:45');
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

-- Dump completed on 2015-06-12 16:36:08
