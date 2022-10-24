-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: mcq
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `mcq`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mcq` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `mcq`;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `ans_id` int NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) NOT NULL,
  `qns_id` int DEFAULT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Kangaroo',1),(2,'Hippopotamus',1),(3,'Rat',1),(4,'Kangaroo rat',1),(5,'Nerve Cell',2),(6,'Ovum',2),(7,'The egg of an Ostrich',2),(8,'None of the above',2),(9,'Liver',3),(10,'Skin',3),(11,'Spleen',3),(12,'Ovum',3),(13,'Nerve Cell',4),(14,'Skin',4),(15,'Spleen',4),(16,'None of the above',4),(17,'638',5),(18,'637',5),(19,'639',5),(20,'640',5),(21,'lkfdlasldasfl;k',16),(22,'sjdlkjsdlkf',17),(23,'lkdalfkal;sk',17),(24,';ldka;lfk;lk',17),(25,'l;dkalf;k;alkf;alskd;lf',17),(26,'8848',18),(27,'8868.48',18),(28,'8848.84',18),(29,'8848.86',18),(30,'Printed Document Format',19),(31,'Public Document Format',19),(32,'Published Document Format',19),(33,'Portable Document Format',19),(34,'American Standard Code for Inked Information',20),(35,'American Standard Code for Information Inked',20),(36,'Asian Standard Code for Information Interchange',20),(37,'American Standard Code for Information Interchange',20),(38,'Transmission Centric Protocol',21),(39,'Transfer Control Protocol',21),(40,'Transmission Control Process',21),(41,'Transmission Control Protocol',21),(42,'Algorithmic Protocol Interface',22),(43,'Adapter Protocol Interface',22),(44,'Accellerated Programming Interface',22),(45,'Application Programming Interface',22),(50,'Microcomputer',24),(51,'Mainframe computer',24),(52,'Mini Computer',24),(53,'super computer',24),(54,'1',25),(55,'1',25),(56,'1',25),(57,'1',25),(58,'1981',26),(59,'1980',26),(60,'1976',26),(61,'1995',26),(62,'first generation',27),(63,'second generation',27),(64,'third generation',27),(65,' fourth generation',27),(66,'Microcomputer',28),(67,'Mainframe computer',28),(68,'Mini Computer',28),(69,'super computer',28),(70,'Lead',29),(71,'Gold',29),(72,'Chromium',29),(73,'Silicon',29),(74,'',30),(75,'',30),(76,'asdf',30),(77,'',30),(78,'sfdl',31),(79,'',31),(80,'',31),(81,'',31),(82,'lkdflkjalkwfjl',32),(83,'lklkdflkask',32),(84,'lkdafjkljadslk',32),(85,'lkdalkfasjlks',32);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `fb_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`fb_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,'There is problem in Home page','Button is not align in center of the page and home page look bad.',1),(4,'yo message update garne try gareko hunxa ki nai check gareko','yo app php ma banneko ho kasto khatra\r\nlol',4),(6,'This is so good','Sathi le ta khatra garecha ta\r\n',11),(8,'dami dami','khatra xa tw application tw',9),(9,'','hawa questions haru',14),(12,'','Nice game... Keep it up≡ƒæì≡ƒÅ╗',23),(15,'Nice gamen2','there is no bug\r\n2',3);
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `qns_id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `ans_id` int DEFAULT NULL,
  PRIMARY KEY (`qns_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Which animal never drinks water in its entire life?',4),(2,'The largest cell is __________________',7),(3,'Which is the largest human cell?',12),(4,'_________________ is the longest cell.',13),(5,'There are _____ number of muscles in human.',19),(18,'What is height of Mount Everest',29),(19,'PDF stands for _______?',33),(20,'ASCII stands for ________?',37),(21,'TCP stands for ________?',41),(22,'API stands for  ________?',45),(27,'The use of multi programming started with which generation of computers?',65),(28,'What is CRAY?',69),(29,'IC chips used in computers are usually made of:',73);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scores` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `attemptNumQues` int NOT NULL,
  `marks` int DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` VALUES (1,5,4,3),(2,5,2,4),(3,5,5,4),(4,5,5,4),(5,5,3,4),(6,5,0,4),(7,5,2,4),(8,4,1,4),(9,5,1,4),(10,5,1,17),(11,5,5,18),(12,5,4,3),(13,5,1,19),(14,5,2,19),(15,5,4,4),(16,5,2,20),(17,5,3,20),(18,2,0,20),(19,5,3,11),(20,5,4,12),(21,5,4,12),(22,5,3,21),(23,5,1,22),(24,5,5,4),(25,5,4,4),(26,5,3,23),(27,5,5,3),(28,5,3,3),(29,5,5,3),(30,5,3,4),(31,5,3,4),(32,5,4,4),(33,5,4,4),(34,5,5,4),(35,5,5,4),(36,5,4,4),(37,5,5,4),(38,5,5,3),(39,5,4,3),(40,5,2,3),(41,5,2,3),(42,5,5,3),(43,4,3,3),(44,5,5,1),(45,5,4,3),(46,5,4,3),(47,5,5,3),(48,5,2,9),(49,5,2,9),(50,5,3,27);
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_player` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rohil','rohilprajapati@gmail.com','$2y$10$bS.j3CBfDO56mDRig6zuKuTROxJsy2d3GwThFxWYs3IhpjuIyhnNu',1,1),(2,'test','test','$2y$10$ZF6EQulSsJfsDOE.LHTBueroC254HTTs4JviL2tu1rZIa1XBU8NuC',0,1),(3,'hello','hello@gmail.com','$2y$10$f9aUmxBMXdOJSi/zIw9JFOiLXi6b5e9XFHIE0hWxAOnzTz3SEdfM6',1,1),(4,'test_player','test_player@gmail.com','$2y$10$m40xKGoPivkIhCrJIUHzOeW8cAObmhfcEDcDv2I1qFOCzyzojXIVS',0,1),(8,'test1','test1@gmail.com','$2y$10$kOj.VJ9oGLBBV6oguukYgudDosM1gn/ZjKaZDegaqNHhHws3jEisu',0,1),(9,'nhujan','nhujan@gmail.com','$2y$10$rbfOQuTHZhlFRc3.Qn2do.3xKMi0PVAYsQkHklQgNFEnoI5fUqsNO',0,1),(10,'test_admin','test_admin@gmail.com','$2y$10$lEuBVRdZ2eT8wvb3wmzCZe5FruWziBXG3oWBUPXQfIpPXwqiNkYH6',1,1),(11,'rajan_12','rajan.dotel11@gmail.com','$2y$10$7JPohot0TcZJADqzJiEG6eybNo2bq8oks7aocu5f.cNBC/O252Jme',0,1),(12,'aakash','aakash_shakya@hotmail.com','$2y$10$Xd2Q42QG7C2Sfo2dSkmUyeBsOI70rdrimZAnBLpjt8boHyupx/RiS',0,1),(13,'bozuko','alankhanal2001@gmail.com','$2y$10$VRPGbQQ/0VDgxTDEV3Lyv.MaRtp3IAjFrUzezwzaKaQc52YH7Ok/2',0,1),(14,'reiiynaa','reena_xtha@yahoo.com','$2y$10$.sVWl7XcbZ/V.4.l7GA2Q.Zb.FncMv/aJ0rXIQRNAfQV3WKqoQ9Li',0,1),(15,'samita','abcd@gmail.com','$2y$10$6z7Pq0j8AYucxNSi.SkA9O9Bhj2Vz3YZSnNEQhkqQIacwck6xB.AO',0,1),(16,'rabina','jabc@gmail.com','$2y$10$RsZGWD231e8NtL.7TO7jwu1yorH57ice16YDVmVb34EsEdNAhJXJe',0,1),(17,'Alu','rohil@gmail.com','$2y$10$chwAZCIhUvt2cK3/OsronOecT7OT/65KqR.w9ZIYm6mC5lZt1Djs.',0,1),(18,'tester','test@gmail.com','$2y$10$97vgWx/zpJ4V50nUSHrJ7Oko/7f2BGOERpAwInb71GF.55TVRxEPS',0,1),(19,'aman','aman123@gmail.com','$2y$10$nGodojAZSFqlC5UlxatOBulGUOOkw3kVDfxk2ekYdjRm/0xaJ9zMG',0,1),(20,'sachita','sachita@gmail.com','$2y$10$vBqgWGRHfKOCNGR.9mI19eCRsCIWf6rxMdpc8ZVXX66i4XspeIi/C',0,1),(21,'zisuzie','suziprajapati57@gmail.com','$2y$10$daPpDAV1FzrlgxJw89gwWui8E8OeSNkykhpDGz4M3zPdaPA5BnPdm',0,1),(22,'Simran','simranmaharjan58@yahoo.com','$2y$10$P0BNIPi6KG9QavvN7ub5A.ejnjHtAnbotDdsRrEk6cBYuQWxZNCVq',0,1),(23,'Gobigobii','anusha22@gmail.com','$2y$10$3ztmtnjjduTed8vyGoA1vOaK9AfyhGtH2W0wieFUBkLqV4RMy.GiG',0,1),(24,'admin','admin@gmail.com','$2y$10$cB2bSYGGPKmIsE3BBmYDyuSOsGTUTyOvv7kOQRm1SAi8A3aHQVXtK',1,1),(25,'dipankar','bca190633_dipankar@achsnepal.edu.np','$2y$10$0rkz0UihZAJ8F6j5ij.fWeBNyovHsxjSfXRSy9L2A96hBYneTb4r2',0,1),(27,'01697test','01697test@test.com','$2y$10$1whGw8H9FoiD8RLuf9uu5.YdczSevjqVElDjjmpp.E/AiKd32OZnW',0,1);
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

-- Dump completed on 2022-10-24 20:55:02
