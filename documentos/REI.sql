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
-- Definition of table `pretendente`
--

DROP TABLE IF EXISTS `pretendente`;
CREATE TABLE `pretendente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pretendente`
--

/*!40000 ALTER TABLE `pretendente` DISABLE KEYS */;
INSERT INTO `pretendente` (`id`,`name`,`email`,`picture`,`updated_at`,`created_at`) VALUES 
 (1,'Thiago','thiago_spdvr@hotmail.com','1564660541.jpg','2019-08-01 08:55:43','2019-08-01 08:55:43');
/*!40000 ALTER TABLE `pretendente` ENABLE KEYS */;


--
-- Definition of table `voto`
--

DROP TABLE IF EXISTS `voto`;
CREATE TABLE `voto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pretendente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_voto_pretendente_idx` (`pretendente_id`),
  CONSTRAINT `fk_voto_pretendente` FOREIGN KEY (`pretendente_id`) REFERENCES `pretendente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voto`
--

/*!40000 ALTER TABLE `voto` DISABLE KEYS */;
/*!40000 ALTER TABLE `voto` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
