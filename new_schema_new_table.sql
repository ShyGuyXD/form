-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: new_schema
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `new_table` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
INSERT INTO `new_table` VALUES (1,'Емельяненко Матвей Сергееввич','eme@gmail.ru','hehehe'),(2,'vdf','$emeljanenko.matvej2005@gmail.com','234324'),(3,'Пальмина Екатерина Владимировна','katya@gmail.com','111111'),(5,'','',''),(6,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(7,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(8,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(9,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(10,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(11,'ыв','emeljanenko.matvej2005@gmail.com','234324'),(12,'ыв','emeljanenko.matvej2005@gmail.com','234324'),(13,'sssd','emeljanenko.matvej2005@gmail.com','234324'),(14,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(15,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(16,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(17,'выов','emeljanenko.matvej2005@gmail.com','234324'),(18,'выов','emeljanenko.matvej2005@gmail.com','234324'),(19,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(20,'vdf','emeljanenko.matvej2005@gmail.com','234324'),(21,'ыв','emeljanenko.matvej2005@gmail.com','234324'),(22,'ыв','emeljanenko.matvej2005@gmail.com','234324'),(23,'ыв выв','emeljanenko.matvej2005@gmail.com','234324'),(24,'ыв выв','emeljanenko.matvej2005@gmail.com','234324'),(25,'ыв','emeljanenko.matvej2005@gmail.com','234324'),(26,'ыв выв ыв','emeljanenko.matvej2005@gmail.com','234324'),(27,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','Mat123456!'),(28,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','234324!мМ'),(29,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','234324!vV'),(30,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','234324!vМ'),(31,'Ёу проверка валидации','emeljanenko.matvej2005@gmail.com','МАВв123456!'),(32,'Проверка валидации два','emeljanenko.matvej2005@gmail.com','ВЫОАВОЛЫВАЛДАЫ23авы!'),(33,'Проверка валидации три','emeljanenko.matvej2005@gmail.com','$2y$10$B4gLsL5J8P1lEEItr9yK4.JgxZIe.5DcNNJ6ss9/O0G0dROI9ftaO'),(34,'Проверка валидации три','emeljanenko.matvej2005@gmail.com','$2y$10$5QYDkKsb1/bYKB.mvYeS5.QeC.I/2R0qkapiUMLZMUdBK7BnL5t32'),(35,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','$2y$10$rGRIDG.xSVTmPpLzSEmQn.NvYktrlud4kGrxXT7JFc65vyLqtlWmq'),(36,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','$2y$10$t1NbffZfc9ATRkIIw.hSn.4B5zvDTKkNLZusognLepgR3Ga7eq8oq'),(37,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','$2y$10$7dGB8CTi3HqOL/Cm.y3ZmuwQPwtzLFIbdXigjrdKaje6ysPrWvp4G'),(38,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','$2y$10$yoLV2bWFtWAmNQ8vh8TRt.Gu3EhArv7gvOMvdQCbD9qaVg9Pvyj3m'),(39,'Пальмина Екатерина Владимировна','emeljanenko.matvej2005@gmail.com','$2y$10$j57miF8Kz1r9A1iCAVFD4uNKJj6r45CldeY5dmLbfJM2UF8si/fpK'),(40,'Пальмина Екатерина хк','emeljanenko.matvej2005@gmail.com','$2y$10$.EAL2vA7.5biR5PtLvly9ugd6l29Ulau88A/xGjqSaKeEQm1EfGRS'),(41,'Проверка валидации три','emeljanenko.matvej2005@gmail.com','$2y$10$eqcs/cvvnDKURYPjY/YXgePXws/wwXbcjzSXN7cB1WdUo6RrQSa52'),(42,'п п п','emeljanenko.matvej2005@gmail.com','$2y$10$ynJ4.H8s30F6NMyXnY2Pyu3iWBhurPExvwN5f6/w8k7icOSyApu..'),(43,'п п п','emeljanenko.matvej2005@gmail.com','$2y$10$f9n5BIx5KusF2qB0053NSu.aWytqOm/UgzydFY9RPzwsSSZmzOZsG'),(44,'Проверка валидации четыре','emeljanenko.matvej2005@gmail.com','$2y$10$uxjI96VoNHRypXZKlqXvjueDzpQ3hsw.bLZJUl.lklp8SBO7nqmgG'),(45,'Проверка валидации пять','katya@gmail.com','$2y$10$hYov8GWY.Vs.uQn2Rl3LsO4G.niFKKjqXVB4xBadx6ov0fPtTZdDy');
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-25 21:14:02
