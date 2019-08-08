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

--
-- Temporary table structure for view `vw_king`
--
DROP TABLE IF EXISTS `vw_king`;
DROP VIEW IF EXISTS `vw_king`;
CREATE TABLE `vw_king` (
  `votes` decimal(32,0),
  `candidate_id` int(11),
  `week_year` int(10) unsigned
);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`,`name`,`email`,`picture`,`updated_at`,`created_at`) VALUES 
 (31,'Thiago Bogoni Spindola','thiago_spdvr@hotmail.com','1565266477.jpg','2019-08-08 09:14:37','2019-08-08 09:14:37'),
 (32,'Thiago Spindola','tspindola@gmail.com','1565266610.jpg','2019-08-08 09:16:50','2019-08-08 09:16:50'),
 (33,'Arthur Valerio Barroso','arthur@gmail.com','1565266670.jpeg','2019-08-08 09:17:50','2019-08-08 09:17:50'),
 (34,'Matheus Laureano','matheus@gmail.com','1565266778.jpeg','2019-08-08 09:19:38','2019-08-08 09:19:38'),
 (35,'Matheus Spackoski','spack@gmail.com','1565266808.jpeg','2019-08-08 09:20:08','2019-08-08 09:20:08'),
 (36,'Paulo Roberto Barcelos','pr_barcelos@hotmail.com','1565266913.jpeg','2019-08-08 09:21:53','2019-08-08 09:21:53');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


--
-- Definition of table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_time_vote` time NOT NULL,
  `end_time_vote` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`,`start_time_vote`,`end_time_vote`) VALUES 
 (1,'10:00:00','16:30:00');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;


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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidate_date_unique` (`candidate_id`,`date`),
  CONSTRAINT `FK_king_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `king`
--

/*!40000 ALTER TABLE `king` DISABLE KEYS */;
INSERT INTO `king` (`id`,`votes`,`date`,`candidate_id`,`week_year`,`updated_at`,`created_at`) VALUES 
 (1,11,'2019-08-08',31,32,'2019-08-08 11:52:41','2019-08-08 11:52:41'),
 (2,10,'2019-08-07',31,32,'2019-08-08 14:31:17','2019-08-08 14:31:17'),
 (3,9,'2019-08-06',31,32,'2019-08-08 14:31:38','2019-08-08 14:31:38'),
 (4,10,'2019-08-08',32,32,'2019-08-08 14:32:27','2019-08-08 14:32:27'),
 (5,11,'2019-08-07',32,32,'2019-08-08 14:32:46','2019-08-08 14:32:46'),
 (6,12,'2019-08-06',32,32,'2019-08-08 14:33:12','2019-08-08 14:33:12'),
 (7,7,'2019-07-29',33,31,'2019-08-08 14:36:09','2019-08-08 14:36:09'),
 (8,6,'2019-07-30',33,31,'2019-08-08 14:36:09','2019-08-08 14:36:09'),
 (9,5,'2019-07-31',34,31,'2019-08-08 14:36:10','2019-08-08 14:36:10'),
 (10,8,'2019-07-29',34,31,'2019-08-08 14:36:10','2019-08-08 14:36:10'),
 (11,7,'2019-07-30',34,31,'2019-08-08 14:36:10','2019-08-08 14:36:10'),
 (12,6,'2019-07-31',35,31,'2019-08-08 14:36:10','2019-08-08 14:36:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` (`id`,`time_vote`,`week_year`,`candidate_id`,`updated_at`,`created_at`) VALUES 
 (104,'2019-08-08 09:42:28',32,31,'2019-08-08 09:42:28','2019-08-08 09:42:28'),
 (105,'2019-08-08 09:53:19',32,31,'2019-08-08 09:53:19','2019-08-08 09:53:19'),
 (106,'2019-08-08 09:53:57',32,31,'2019-08-08 09:53:57','2019-08-08 09:53:57'),
 (107,'2019-08-08 10:28:21',32,33,'2019-08-08 10:28:21','2019-08-08 10:28:21'),
 (108,'2019-08-08 10:30:44',32,33,'2019-08-08 10:30:44','2019-08-08 10:30:44'),
 (109,'2019-08-08 10:31:39',32,31,'2019-08-08 10:31:39','2019-08-08 10:31:39'),
 (110,'2019-08-08 10:32:10',32,33,'2019-08-08 10:32:10','2019-08-08 10:32:10'),
 (111,'2019-08-08 10:32:47',32,32,'2019-08-08 10:32:47','2019-08-08 10:32:47'),
 (112,'2019-08-08 10:33:26',32,32,'2019-08-08 10:33:26','2019-08-08 10:33:26'),
 (113,'2019-08-08 10:34:32',32,31,'2019-08-08 10:34:32','2019-08-08 10:34:32'),
 (114,'2019-08-08 10:34:46',32,31,'2019-08-08 10:34:46','2019-08-08 10:34:46'),
 (115,'2019-08-08 10:35:46',32,31,'2019-08-08 10:35:46','2019-08-08 10:35:46'),
 (116,'2019-08-08 10:37:40',30,31,'2019-08-08 10:37:40','2019-08-08 10:37:40'),
 (117,'2019-08-08 10:37:57',32,32,'2019-08-08 10:37:57','2019-08-08 10:37:57'),
 (118,'2019-08-08 10:39:14',32,31,'2019-08-08 10:39:14','2019-08-08 10:39:14'),
 (119,'2019-08-08 10:40:02',32,32,'2019-08-08 10:40:02','2019-08-08 10:40:02'),
 (120,'2019-08-08 10:40:13',32,33,'2019-08-08 10:40:13','2019-08-08 10:40:13'),
 (121,'2019-08-08 10:40:50',31,31,'2019-08-08 10:40:50','2019-08-08 10:40:50'),
 (122,'2019-08-08 11:34:42',31,35,'2019-08-08 11:34:42','2019-08-08 11:34:42'),
 (123,'2019-08-08 11:35:04',31,36,'2019-08-08 11:35:04','2019-08-08 11:35:04'),
 (124,'2019-08-08 11:35:11',31,31,'2019-08-08 11:35:11','2019-08-08 11:35:11');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;


--
-- Definition of view `vw_king`
--

DROP TABLE IF EXISTS `vw_king`;
DROP VIEW IF EXISTS `vw_king`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_king` AS select sum(`king`.`votes`) AS `votes`,`king`.`candidate_id` AS `candidate_id`,`king`.`week_year` AS `week_year` from `king` group by `king`.`candidate_id`,`king`.`week_year`;

--
-- Definition of view `vw_vote`
--

DROP TABLE IF EXISTS `vw_vote`;
DROP VIEW IF EXISTS `vw_vote`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_vote` AS select count(0) AS `qtd`,`vote`.`week_year` AS `week_year`,`vote`.`candidate_id` AS `candidate_id` from `vote` group by `vote`.`week_year`,`vote`.`candidate_id` order by `vote`.`week_year`,`qtd`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
