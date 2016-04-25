CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `fips` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `states_name_unique` (`name`),
  UNIQUE KEY `states_code_unique` (`code`),
  KEY `states_country_id_foreign` (`country_id`),
  CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'California','CA','06',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(2,'Indiana','IN','18',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(3,'Puerto Rico','PR','72',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(4,'Virginia','VA','51',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(5,'Kentucky','KY','21',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(6,'Georgia','GA','13',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(7,'Pennsylvania','PA','42',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(8,'Alabama','AL','01',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(9,'Louisiana','LA','22',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(10,'Mississippi','MS','28',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(11,'South Carolina','SC','45',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(12,'Maine','ME','23',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(13,'Wisconsin','WI','55',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(14,'Arkansas','AR','05',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(15,'New Mexico','NM','35',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(16,'Texas','TX','48',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(17,'Illinois','IL','17',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(18,'Kansas','KS','20',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(19,'Maryland','MD','24',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(20,'North Dakota','ND','38',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(21,'Idaho','ID','16',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(22,'North Carolina','NC','37',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(23,'New Jersey','NJ','34',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(24,'Ohio','OH','39',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(25,'South Dakota','SD','46',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(26,'Washington','WA','53',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(27,'Nebraska','NE','31',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(28,'Iowa','IA','19',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(29,'Connecticut','CT','09',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(30,'Massachusetts','MA','25',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(31,'Vermont','VT','50',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(32,'Utah','UT','49',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(33,'West Virginia','WV','54',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(34,'Montana','MT','30',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(35,'New York','NY','36',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(36,'Oklahoma','OK','40',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(37,'Michigan','MI','26',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(38,'Wyoming','WY','56',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(39,'Oregon','OR','41',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(40,'Missouri','MO','29',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(41,'New Hampshire','NH','33',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(42,'Minnesota','MN','27',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(43,'Alaska','AK','02',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(44,'Tennessee','TN','47',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(45,'Colorado','CO','08',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(46,'Rhode Island','RI','44',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(47,'Guam','GU','66',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(48,'Arizona','AZ','04',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(49,'Hawaii','HI','15',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(50,'Florida','FL','12',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(51,'Nevada','NV','32',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(52,'Delaware','DE','10',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(53,'District of Columbia','DC','11',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(54,'Virgin Islands','VI','78',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(55,'Palau','PW','70',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(56,'American Samoa','AS','60',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22'),(57,'Northern Mariana Islands','MP','69',1,NULL,'2016-04-25 09:23:22','2016-04-25 09:23:22');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-25 20:49:08
