-- MySQL dump 10.13  Distrib 8.0.17, for macos10.14 (x86_64)
--
-- Host: localhost    Database: Shelfish_development
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `ar_internal_metadata`
--

DROP TABLE IF EXISTS `ar_internal_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ar_internal_metadata` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ar_internal_metadata`
--

LOCK TABLES `ar_internal_metadata` WRITE;
/*!40000 ALTER TABLE `ar_internal_metadata` DISABLE KEYS */;
INSERT INTO `ar_internal_metadata` VALUES ('environment','development','2019-10-07 13:46:28','2019-10-07 13:46:28');
/*!40000 ALTER TABLE `ar_internal_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `book_id` int(11) NOT NULL,
  `author_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `name_idx` (`author_name`),
  CONSTRAINT `id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (124,'Charles Dickens'),(125,'Charles Dickens'),(126,'Charles Dickens'),(127,'Charles Dickens'),(128,'Charles Dickens'),(129,'Charles Dickens'),(115,'Hunter S. Thompson'),(116,'Hunter S. Thompson'),(117,'Hunter S. Thompson'),(118,'Hunter S. Thompson'),(119,'John Steinbeck'),(120,'John Steinbeck'),(121,'John Steinbeck'),(122,'John Steinbeck'),(123,'John Steinbeck'),(110,'Mark Twain'),(111,'Mark Twain'),(112,'Mark Twain'),(113,'Mark Twain'),(114,'Mark Twain'),(101,'Stephen King'),(102,'Stephen King'),(103,'Stephen King'),(104,'Stephen King'),(105,'Stephen King'),(106,'Stephen King'),(107,'Stephen King'),(108,'Stephen King'),(109,'Stephen King'),(130,'Virginia Woolf'),(131,'Virginia Woolf'),(132,'Virginia Woolf'),(133,'Virginia Woolf');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `publisher_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `idx_books_publisher_name` (`publisher_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'AA','AA'),(2,'Title','Some Guy'),(3,'Title A','Some other guy'),(101,'Carrie','Doubleday'),(102,'The Shining','Doubleday'),(103,'The Stand','Doubleday'),(104,'The Dead Zone','Viking Press'),(105,'Firestarter','Viking Press'),(106,'Cujo','Viking Press'),(107,'Pet Sematary','Doubleday'),(108,'IT','Viking Press'),(109,'Needful Things','Viking Press'),(114,'Merry Tales','Charles L. Webster'),(116,'The Rum Diary','Simon & Schuster'),(117,'The Great Shark Hunt','Summit Books'),(118,'The Proud Highway','Ballantine Books'),(119,'Of Mice and Men','Covici Friede'),(120,'The Grapes of Wrath','Viking Press'),(121,'The Pearl','Viking Press'),(122,'East of Eden','Viking Press'),(123,'Cannery Row','Viking Press'),(124,'A Christmas Carol','Chapman & Hall'),(125,'Great Expectations','Chapman & Hall'),(126,'Oliver Twist','Viking Press'),(127,'David Copperfield','Bradbury & Evans'),(128,'Hard Times','Bradbury & Evans'),(129,'Bleak House','Bradbury & Evans'),(130,'The Waves','Hogarth Press'),(131,'To the Lighthouse','Hogarth Press'),(132,'Three Guineas','Hogarth Press'),(133,'The Voyage Out','Duckworth');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrowers`
--

DROP TABLE IF EXISTS `borrowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrowers` (
  `card_no` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `unpaid_dues` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1018 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowers`
--

LOCK TABLES `borrowers` WRITE;
/*!40000 ALTER TABLE `borrowers` DISABLE KEYS */;
INSERT INTO `borrowers` VALUES (1000,'user','Tyler Killgore','621 South College','9195865351',0.00),(1001,'user','Evan Holmberg','326 Racine Dr.','9199018497',0.00),(1002,'admin','librarian','555 Oleander Dr.','9104255245',0.00),(1003,'user','user','1 user st.','9104255246',7.00),(1006,'user','AA','A Street','9193432312',0.00),(1007,'user','B','B St','8121713732',0.00);
/*!40000 ALTER TABLE `borrowers` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `borrowers_AFTER_INSERT` AFTER INSERT ON `borrowers` FOR EACH ROW UPDATE unpaid_dues
SET unpaid_dues=0.00 
where 
unpaid_dues=Null */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(20) DEFAULT NULL,
  `branch_address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1001,'Main Branch','321 River St.'),(1002,'Research Branch','250 Racine Dr.'),(1003,'Columbus Branch','118 Market St.');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copies`
--

DROP TABLE IF EXISTS `copies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copies` (
  `book_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `copy_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copies`
--

LOCK TABLES `copies` WRITE;
/*!40000 ALTER TABLE `copies` DISABLE KEYS */;
INSERT INTO `copies` VALUES (101,1001,17),(102,1002,0),(103,1003,1),(104,1001,2),(105,1002,3),(106,1001,4),(107,1003,1),(108,1003,3),(109,1002,4),(110,1001,4),(111,1003,6),(112,1002,2),(113,1003,2),(114,1001,4),(115,1001,2),(116,1002,1),(117,1001,1),(118,1002,6),(119,1001,7),(120,1002,6),(121,1001,4),(122,1003,3),(123,1001,2),(124,1003,1),(125,1001,5),(126,1002,1),(127,1003,1),(128,1001,4),(129,1001,6),(130,1002,7),(131,1001,5),(132,1003,4),(133,1003,3);
/*!40000 ALTER TABLE `copies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loans` (
  `book_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `card_no` int(11) DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `date_return` date DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES (101,1001,1007,'2019-11-15','2019-11-29',NULL);
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `loans_AFTER_INSERT` AFTER INSERT ON `loans` FOR EACH ROW UPDATE loans 
SET date_out=current_date() where date_out=null; */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `prolific_writers`
--

DROP TABLE IF EXISTS `prolific_writers`;
/*!50001 DROP VIEW IF EXISTS `prolific_writers`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `prolific_writers` AS SELECT 
 1 AS `name`,
 1 AS `number_of_books_in_library`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publishers` (
  `name` varchar(35) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  KEY `name` (`name`),
  CONSTRAINT `name` FOREIGN KEY (`name`) REFERENCES `books` (`publisher_name`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishers`
--

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
INSERT INTO `publishers` VALUES ('American Publishing Company','83 North Kerr','9106665252'),('Ballantine Books','833 Market St.','9109100901'),('Bradbury & Evans','100 Wrightsville Ave.','9103990010'),('Chapman & Hall','423 Melba Dr.','9156561589'),('Charles L. Webster','400 March Ct.','9199029498'),('Chatto & Windus','32 South Kerr Drive','6982334878'),('Covici Friede','822 Market St.','8339101234'),('Doubleday','800 George Dr.','9191234567'),('Duckworth','98 Library St.','7789324542'),('Hogarth Press','455 Jarvis St.','2529748754'),('James R. Osgood','300 March Ct.','5554651565'),('Random House','42 South Kerr Drive','6108733873'),('Simon & Schuster','500 Melba Dr.','4521983298'),('Summit Books','342 South College','9190566506'),('Viking Press','200 Bill Road','9556871546');
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema_migrations`
--

DROP TABLE IF EXISTS `schema_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schema_migrations` (
  `version` varchar(255) NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema_migrations`
--

LOCK TABLES `schema_migrations` WRITE;
/*!40000 ALTER TABLE `schema_migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `schema_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `top_ten_most_wanted`
--

DROP TABLE IF EXISTS `top_ten_most_wanted`;
/*!50001 DROP VIEW IF EXISTS `top_ten_most_wanted`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top_ten_most_wanted` AS SELECT 
 1 AS `name`,
 1 AS `unpaid_dues`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'Shelfish_development'
--
/*!50003 DROP PROCEDURE IF EXISTS `getNames` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getNames`()
begin
select name from borrowers;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_all_books` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_books`( )
BEGIN
SELECT  * FROM books;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `prolific_writers`
--

/*!50001 DROP VIEW IF EXISTS `prolific_writers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `prolific_writers` AS select `authors`.`author_name` AS `name`,count(0) AS `number_of_books_in_library` from `authors` group by `name` order by `number_of_books_in_library` desc limit 5 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `top_ten_most_wanted`
--

/*!50001 DROP VIEW IF EXISTS `top_ten_most_wanted`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top_ten_most_wanted` AS select `borrowers`.`name` AS `name`,`borrowers`.`unpaid_dues` AS `unpaid_dues` from `borrowers` where (`borrowers`.`unpaid_dues` > 0) order by `borrowers`.`unpaid_dues` desc limit 10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-25  7:56:23
