# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.3.14-MariaDB-1:10.3.14+maria~bionic)
# Database: step4_db
# Generation Time: 2019-05-23 20:14:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS step4_db;

CREATE DATABASE step4_db;

USE step4_db;

# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `password`, `first_name`, `last_name`, `email`, `birthdate`, `added`)
VALUES
	(1,'$2y$12$EwrEukYkvNelHo5NXg/VuuP3c78CbHLegwDhaQ9dei0Cj7cr2yz0G','Vesta','Hermann','bartell.murl@example.org','1976-05-22','2019-05-23 20:00:33'),
	(2,'$2y$12$9rT.J57CMvZ5U0HSMc3u8uZTa0pYZmOErijbtfZ6sYU5ASPpKvm7a','Leopoldo','Willms','koepp.veronica@example.net','1986-12-09','2019-05-23 20:00:38'),
	(3,'$2y$12$1ngwBWFFIN2NXaOXCZT2B.jMOYEYQxE8VGoRxnAoV0YA0v29.z5t.','Kitty','Adams','xjohns@example.org','2005-03-27','2019-05-23 20:00:40'),
	(4,'$2y$17$EWsYPIcWMPcJE5eitDOVgeuN7YSrZJLAc0mUHNG0vZ/Ta3ORwJ7.G','Kacey','Schinner','lgrimes@example.com','2015-10-04','2019-05-23 20:02:02'),
	(5,'$2y$17$xlbEH8a/OWGqo01FpM.P5OMuLjsAHoN6a8Zw1wb9Y3F.zGAOYpE/.','Edmond','Rippin','weissnat.eliza@example.net','1996-08-03','2019-05-23 20:02:13'),
	(6,'$2y$17$72QqDs6ikAxKCsaRbBTKpeFAQ8xL7E6HEmbOmmsR.48qqn7lN6b.u','Casey','Upton','keira.rice@example.org','1999-08-26','2019-05-23 20:02:27'),
	(7,'$2y$17$QI5wvguMlsLgbiBzSwXAYeO55S6v/q/SLeZugijrnWFCiASPFccCq','Lora','Heathcote','major55@example.com','1972-12-17','2019-05-23 20:02:27'),
	(8,'$2y$17$DGcw9EFJ45BndtdkVOz0HugKLe5x04AlPmmO5AN9b1wKQLQrjFXZW','Abbey','Sanford','cbailey@example.com','2003-09-01','2019-05-23 20:02:37'),
	(9,'$2y$17$J.kU03iHCMIJ9rIqn8Lo.uZWXwmwljzmjFd8LejHdJb4Vb6JKRZUi','Frederick','Raynor','jbaumbach@example.net','2010-12-06','2019-05-23 20:02:47'),
	(10,'$2y$17$InGdWYLjIek0rkE3aYuiluUxW13t7Lc3d8pclUq.QRn.HOqbD/SR6','Adelia','Conroy','fcarroll@example.org','1971-09-06','2019-05-23 20:02:57'),
	(11,'$2y$17$6tSrZ9xYKuTCgnMXpxPl2Oiw6aI4WAacAA3v69EN6w8/k49KV1xuO','Jaron','Cartwright','iwindler@example.net','2004-05-16','2019-05-23 20:03:06'),
	(12,'$2y$17$bqHkkxnHIIVvqvDeLv3wQ.j6AgxiUvMu3JU0AqKgNVK.rMLL41R4i','Maci','Schowalter','collier.allen@example.com','2014-12-22','2019-05-23 20:03:16'),
	(13,'$2y$17$EKxMoNvbWnuXo/Lg7OhJFOv.B0.qrVMBA73dAOGZD622f0CP3o6bS','Enrico','White','nathen.schultz@example.org','2005-05-03','2019-05-23 20:03:26'),
	(14,'$2y$17$XVObV43LR6/ZH/.w0aPtOuck6pqz8wDH.2/qEhw9ViVkXT9qpqwUG','Shea','Corkery','hegmann.keely@example.com','1972-05-15','2019-05-23 20:03:35'),
	(15,'$2y$17$YliF2d127PN51VFTL.FynOMOPZP36OwyLLzCCvWVtS5Okkhq6gVpe','Enid','Baumbach','eveline.konopelski@example.org','1987-08-30','2019-05-23 20:03:46'),
	(16,'$2y$17$tAKwb3FTIra0x4sX7oS74.IMEEPpD169jV9BYhvburWavvGQn5tJ6','Fabiola','Predovic','jaren62@example.com','2014-05-03','2019-05-23 20:03:55'),
	(17,'$2y$17$PgVBQMW7xjs1a7HCCBaL4O6gqyavpsQ6UDum9X5bdIp0p3UZu3kru','Sammie','Marquardt','judah.hickle@example.org','2014-12-05','2019-05-23 20:14:06');

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration_versions`;

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;

INSERT INTO `migration_versions` (`version`, `executed_at`)
VALUES
	('20190523194439','2019-05-23 19:44:55'),
	('20190523194459','2019-05-23 19:45:08'),
	('20190523194732','2019-05-23 19:47:38'),
	('20190523200013','2019-05-23 20:00:30');

/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
