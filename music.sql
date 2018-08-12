-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: music
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'piano'),(2,'rock'),(3,'lyric');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'2018-04-03 00:00:00','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.'),(2,2,'2017-09-01 00:00:00','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.'),(28,2,'2018-08-10 08:49:31','123344'),(29,2,'2018-08-10 08:49:53','123344'),(30,2,'2018-08-10 09:01:47','123344');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `music_to_categories`
--

DROP TABLE IF EXISTS `music_to_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `music_to_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `music_to_categories`
--

LOCK TABLES `music_to_categories` WRITE;
/*!40000 ALTER TABLE `music_to_categories` DISABLE KEYS */;
INSERT INTO `music_to_categories` VALUES (1,1,2),(2,1,3),(3,2,3),(4,3,1),(5,3,3),(6,4,2),(7,5,3);
/*!40000 ALTER TABLE `music_to_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musics`
--

DROP TABLE IF EXISTS `musics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` mediumtext,
  `banner_url` varchar(200) DEFAULT NULL,
  `widget_url` varchar(200) DEFAULT NULL,
  `youtube_url` varchar(200) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `score_num` int(11) DEFAULT NULL,
  `singer_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musics`
--

LOCK TABLES `musics` WRITE;
/*!40000 ALTER TABLE `musics` DISABLE KEYS */;
INSERT INTO `musics` VALUES (1,'Croatian Rhapsody ','2018-08-01 00:00:00','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','./img/dimash.jpg','/StarMusic/img/li.jpg','https://www.youtube.com/embed/3aTEjyzWKFQ',100,20,'Maksim Mrvica'),(2,'Croatian Rhapsody','2018-08-01 13:00:00','This is a totally random paragraph that doesnt actually mean anything, and is really talking about the random paragraph, there isnt much to worry sbout because its just a random paragraph, don’t worry, everything will be ok when random paragraph is by ...','./img/li_banner.jpg','/StarMusic/img/li.jpg','https://www.youtube.com/embed/3aTEjyzWKFQ',90,20,'Maksim Mrvica'),(3,'Croatian Rhapsody','2018-08-01 13:00:00','This is a totally random paragraph that doesnt actually mean anything, and is really talking about the random paragraph, there isnt much to worry sbout because its just a random paragraph, don’t worry, everything will be ok when random paragraph is by ...','./img/lin.png','/StarMusic/img/li.jpg','https://www.youtube.com/embed/3aTEjyzWKFQ',80,20,'Maksim Mrvica'),(4,'Croatian','2018-08-01 13:00:00','This is a totally random paragraph that doesnt actually mean anything, and is really talking about the random paragraph, there isnt much to worry sbout because its just a random paragraph, don’t worry, everything will be ok when random paragraph is by ...','./img/mbanner.png','/StarMusic/img/li.jpg','https://www.youtube.com/embed/3aTEjyzWKFQ',75,20,'Maksim Mrvica'),(5,'Croatian Rhapsody','2018-08-01 13:00:00','This is a totally random paragraph that doesnt actually mean anything, and is really talking about the random paragraph, there isnt much to worry sbout because its just a random paragraph, don’t worry, everything will be ok when random paragraph is by ...','./img/mbanner.png','/StarMusic/img/li.jpg','https://www.youtube.com/embed/3aTEjyzWKFQ',70,20,'rrr');
/*!40000 ALTER TABLE `musics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'music'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-11 23:41:49
