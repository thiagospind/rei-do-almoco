-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.27-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema rei
--

CREATE DATABASE IF NOT EXISTS rei;
USE rei;

--
-- Temporary table structure for view `vw_vote`
--
DROP TABLE IF EXISTS `vw_vote`;
DROP VIEW IF EXISTS `vw_vote`;
CREATE TABLE `vw_vote` (
  `qtd` bigint(21),
  `week_year` int(10) unsigned,
  `candidate_id` int(11)
);

--
-- Temporary table structure for view `vw_votes`
--
DROP TABLE IF EXISTS `vw_votes`;
DROP VIEW IF EXISTS `vw_votes`;
CREATE TABLE `vw_votes` (
  `qtd` bigint(21),
  `week_year` int(10) unsigned,
  `candidate_id` int(11)
);

--
-- Definition of table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`,`name`,`email`,`picture`,`updated_at`,`created_at`) VALUES 
 (19,'Teste da Silva Sauro 1','tspindola@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (20,'Teste da Silva Sauro 2','thiago_spdvr@hotmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (21,'Teste da Silva Sauro 3','tspindola1@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (22,'Teste da Silva Sauro 4','tspindola2@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (23,'Teste da Coelhão Sauro 5','tspindola3@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (24,'Teste da Coelhão Sauro 6','tspindola4@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (25,'Teste da Silva Coelhão 7','tspindola5@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (26,'Teste da Silva Coelhão 8','tspindola6@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (27,'Teste da Silva Sauro Coelhão 9','tspindola7@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (28,'Teste da Silva Sauro Coelhão 10','tspindola8@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (29,'Teste da Silva Sauro Cruz11','tspindola9@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21'),
 (30,'Teste da Silva Sauro Cruz 12','tspindola10@gmail.com','1565012062.jpg','2019-08-07 14:47:21','2019-08-07 14:47:21');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


--
-- Definition of table `king`
--

DROP TABLE IF EXISTS `king`;
CREATE TABLE `king` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `votes` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `week_year` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidate_date_unique` (`candidate_id`,`date`),
  CONSTRAINT `FK_king_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `king`
--

/*!40000 ALTER TABLE `king` DISABLE KEYS */;
/*!40000 ALTER TABLE `king` ENABLE KEYS */;


--
-- Definition of table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_vote` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `week_year` int(10) unsigned NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_candidate_id` (`candidate_id`),
  CONSTRAINT `fk_candidate_id` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` (`id`,`time_vote`,`week_year`,`candidate_id`,`updated_at`,`created_at`) VALUES 
 (62,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (63,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (64,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (65,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (66,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (67,'2019-08-06 14:52:55',31,19,'2019-08-07 14:52:55','2019-08-07 14:52:55'),
 (68,'2019-08-06 14:54:04',31,20,'2019-08-07 14:54:04','2019-08-07 14:54:04'),
 (69,'2019-08-06 14:54:04',31,20,'2019-08-07 14:54:04','2019-08-07 14:54:04'),
 (70,'2019-08-06 14:54:04',31,20,'2019-08-07 14:54:04','2019-08-07 14:54:04'),
 (71,'2019-08-06 14:54:04',31,20,'2019-08-07 14:54:04','2019-08-07 14:54:04'),
 (72,'2019-08-06 14:54:22',31,21,'2019-08-07 14:54:22','2019-08-07 14:54:22'),
 (73,'2019-08-06 14:54:22',31,21,'2019-08-07 14:54:22','2019-08-07 14:54:22'),
 (74,'2019-08-06 14:54:22',31,21,'2019-08-07 14:54:22','2019-08-07 14:54:22'),
 (75,'2019-08-06 14:54:49',31,22,'2019-08-07 14:54:49','2019-08-07 14:54:49'),
 (76,'2019-08-06 14:54:49',31,22,'2019-08-07 14:54:49','2019-08-07 14:54:49'),
 (77,'2019-08-06 14:54:57',31,23,'2019-08-07 14:54:57','2019-08-07 14:54:57'),
 (78,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (79,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (80,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (81,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (82,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (83,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (84,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (85,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (86,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (87,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (88,'2019-07-31 14:56:38',30,20,'2019-08-07 14:56:38','2019-08-07 14:56:38'),
 (89,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (90,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (91,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (92,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (93,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (94,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (95,'2019-07-31 14:57:22',30,19,'2019-08-07 14:57:22','2019-08-07 14:57:22'),
 (96,'2019-07-31 14:57:59',30,21,'2019-08-07 14:57:59','2019-08-07 14:57:59'),
 (97,'2019-07-31 14:57:59',30,21,'2019-08-07 14:57:59','2019-08-07 14:57:59'),
 (98,'2019-07-31 14:57:59',30,21,'2019-08-07 14:57:59','2019-08-07 14:57:59'),
 (99,'2019-07-31 14:57:59',30,21,'2019-08-07 14:57:59','2019-08-07 14:57:59'),
 (100,'2019-07-31 14:57:59',30,21,'2019-08-07 14:57:59','2019-08-07 14:57:59'),
 (101,'2019-07-31 14:58:12',30,22,'2019-08-07 14:58:12','2019-08-07 14:58:12'),
 (102,'2019-07-31 14:58:12',30,22,'2019-08-07 14:58:12','2019-08-07 14:58:12'),
 (103,'2019-07-31 14:58:12',30,22,'2019-08-07 14:58:12','2019-08-07 14:58:12');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;


--
-- Definition of view `vw_vote`
--

DROP TABLE IF EXISTS `vw_vote`;
DROP VIEW IF EXISTS `vw_vote`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vote` AS select count(0) AS `qtd`,`vote`.`week_year` AS `week_year`,`vote`.`candidate_id` AS `candidate_id` from `vote` group by `vote`.`week_year`,`vote`.`candidate_id` order by `vote`.`week_year`,`qtd`;

--
-- Definition of view `vw_votes`
--

DROP TABLE IF EXISTS `vw_votes`;
DROP VIEW IF EXISTS `vw_votes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_votes` AS select count(0) AS `qtd`,`vote`.`week_year` AS `week_year`,`vote`.`candidate_id` AS `candidate_id` from `vote` group by `vote`.`week_year`,`vote`.`candidate_id` order by `vote`.`week_year`,`qtd`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
