-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: coaching
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `coureur`
--

DROP TABLE IF EXISTS `coureur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coureur` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `ville` varchar(60) DEFAULT NULL,
  `vma` float DEFAULT NULL,
  `rp10` varchar(10) DEFAULT NULL,
  `rpsemi` varchar(10) DEFAULT NULL,
  `commentaire` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coureur`
--

LOCK TABLES `coureur` WRITE;
/*!40000 ALTER TABLE `coureur` DISABLE KEYS */;
INSERT INTO `coureur` VALUES (1,'Morgan',30,'Boulogne',18.7,'37:20','1:19:00','poulain le plus rapide, potentiel +++\r\nA les plus beaux yeux du monde\r\nEt les fesses les plus belles'),(2,'GB1',NULL,NULL,16.6,'41:00','1:35:00','traileur confirmé - résiste à la distance et aux dénivelés'),(3,'thomas',NULL,NULL,16.5,'41:00',NULL,'blessé - en cours de reprise'),(4,'lucie',29,'Boulogne',18.3,'pouetssss','1:25:55','coachette'),(5,'philou',NULL,NULL,14.5,NULL,'1:50:00','vaut 1h45 env sur semi - essayer 10km'),(6,'olivier',NULL,NULL,17,NULL,NULL,'part toujours trop vite ');
/*!40000 ALTER TABLE `coureur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Ecotrail de Paris','Hauts-de-Seine (92)'),(2,'Course verte des trois pignons','Fontainebleau(78)'),(3,'Trail de l\'hippodrome','Yffiniac(22)'),(4,'Foulees du 8e','Paris 8e'),(5,'Foulees du 14e','Paris 14e'),(6,'Semi de Paris','Paris'),(7,'La course révolutionnaire de Crosne','Crosne (91)'),(8,'Courir pour le plaisir','Vincennes (92)'),(9,'Courses du Luxembourg','Paris 6e'),(10,'Trail Volodalen','Lac de Vouglans (Jura)'),(11,'Foulees du 12e','Vincennes'),(12,'Foulees du 19e','Paris 19e'),(13,'Foulees vertes de clamart','Clamart (92)'),(14,'Courir ensemble  Handicap International','Boulogne (92)');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edition`
--

DROP TABLE IF EXISTS `edition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edition` (
  `id` int(20) NOT NULL,
  `id_course` int(20) NOT NULL,
  `distance` float NOT NULL,
  `denivele` int(10) DEFAULT NULL,
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `commentaire` text,
  `nb_participants` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_course` (`id_course`),
  CONSTRAINT `edition_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edition`
--

LOCK TABLES `edition` WRITE;
/*!40000 ALTER TABLE `edition` DISABLE KEYS */;
INSERT INTO `edition` VALUES (1,1,19.2,450,'Hauts-de-Seine (92)','2016-03-19','Départ : meudon\r\nArrivée : St Cloud\r\nNb participants : env 3000\r\nParcours génial 100% forêt',0),(2,2,10,NULL,'Fontainebleau(78)','2016-03-06','Course nature assez exigente vu le terrain (sable)\r\nParcours superbe et organisation simple et efficace.\r\nUne des courses à refaire !',0),(3,3,13,200,'Yffiniac(22)','2016-03-26',NULL,0),(4,4,10,NULL,'Paris 8e','2016-01-31','Sous la flotte sur les pavées...\r\nLes GB en force !',0),(5,5,10,NULL,'Paris 14e','2016-01-17','Beaucoup de relances, un parcours assez varié et pas tout plat..',0),(6,6,21.125,NULL,'Paris','2016-03-06',NULL,0),(7,7,17.89,NULL,'Crosne (91)','2015-10-18','Deux boucles, de bonnes côtes bien cassantes\r\nBonne ambiance',0),(8,8,10,0,'Vincennes (92)','2015-12-13','Deux boucles dans le bois de vincennes sur les grandes allées. \r\n',0),(9,9,10,NULL,'Paris 6e','2015-09-27','Des p\'tits tours de Luxembourg\r\nCourse symbolique --> <3',0),(10,10,17,400,'Lac de Vouglans (Jura)','2015-08-01','Une grande boucle autour du lac. Super beau et parcours exigeant !\r\nOrganisé par Cyrille et Volodalen',0),(11,11,10,0,'Vincennes','2015-06-21','Deux boucles dans le bois de vincennes avec arrivée dans le vélodrome',0),(12,12,10,100,'Paris 19e','2015-05-24','Deux boucles avec passage dans les buttes Chaumont. Assez physique mais ambiance conviviale ',0),(13,13,10,100,'Clamart (92)','2015-05-17','Deux boucles mi-forêt mi-route avec une belle côte à mi-parcours. \r\nSympa et convivial',0),(14,14,10,NULL,'Boulogne (92)','2015-05-10','Parcours assez roulant avec du faux plat montant. Beaucoup de monde',0);
/*!40000 ALTER TABLE `edition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `site` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Entrainement','Prochain entraînement','Rendez-vous sur la piste de LENGLEN ce jeudi à 19h. Programme de la séance : fractionnés longs (reprise en douceur)','2016-05-16',''),(2,'Compétition','Prochaine compète !','Pour ceux que ca intéresse, les 10km de l\'héxagone le 26 juin, à boulogne du côté de la porte d\'Auteuil.','2016-05-16','www.topchrono.biz'),(3,'Résultats ','Résultats la Dinardaise','Sous le soleil breton, face à la cité Corsaire, ce sont plus de 400 coureurs qui se sont élancés sur la boucle de 10km au départ de la plage de l\'Ecluse.\r\nCoachette se classe deuxième en 40min30 après un départ à la traîne et une remontée difficile...','2016-05-15',NULL),(4,'Résultats','Résultats Trail des lavoirs','Un sacré défi attendait notre GB1 ce dimanche. Dans la vallée de Chevreuse, notre traileur de choc a englouti sans flancher 54 km bien vallonnés en moins de 7 heures ! Une belle leçon de tenacité. Bravo champion !','2016-05-01',NULL),(5,'Entrainement','Entrainement côtes','Proposition pour les matinaux courageux : sortie ce mercredi à Lenglen avec travail de côtes.\r\n','2016-04-26',NULL),(6,'Autre','Un peu de lecture','Sortie aujourd\'hui d\'un nouveau livre sur la nutrition du sportif.\r\nEcrit, entre autres, par Axel Heulin, un copain à moi qui exerce en tant que nutritionniste à l\'INSEP depuis quelques années.\r\nLe livre est bien construit, les photos sympas et les infos de qualité.\r\n','2016-04-28',NULL),(7,'Entrainement','Qui pour des fractionnés demain ?','Demain soir, rdv 19h30 sur la piste pour une séance de fractionnés courts pour ceux que ça tente !','2016-04-11',NULL),(8,'Résultats','Résultats 10km du bois de boulogne','Plus de 4000 participants se sont partagé les chemins et routes du bois de Boulogne ce matin. Sur un 10km relativement plat, Coachette signe un 39\'15 et une deuxième place, loin derrière la première qui boucle la course en moins de 38min ! ','2016-04-30','www.topchrono.biz'),(9,'Résultats','Résultats Ecotrail de Paris','Une belle journée riche en émotions pour nos coureurs hier !\r\nMorgan et Coachette participaient aux 18km (19,2 finalement...), qu\'ils bouclent respectivement en 1h27 et 1h30\r\n\r\nChristian s\'élançait, lui, sur le 80 km ! \r\nPour sa première participation à une telle distance, il finit très honorablement en 10h01min, sans souffrir outre mesure. Un grand bravo pour cette perf !','2016-03-07',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultats_courses`
--

DROP TABLE IF EXISTS `resultats_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultats_courses` (
  `idcoureur` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  `chrono` time DEFAULT NULL,
  `classement` varchar(100) DEFAULT NULL,
  `commentaire` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`idcoureur`,`idcourse`),
  KEY `id_course_fk` (`idcourse`),
  CONSTRAINT `id_coureur_fk` FOREIGN KEY (`idcoureur`) REFERENCES `coureur` (`id`),
  CONSTRAINT `id_course_fk` FOREIGN KEY (`idcourse`) REFERENCES `edition` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultats_courses`
--

LOCK TABLES `resultats_courses` WRITE;
/*!40000 ALTER TABLE `resultats_courses` DISABLE KEYS */;
INSERT INTO `resultats_courses` VALUES (1,1,'01:28:00','24','Bonne gestion de course. Bonnes sensations. Très bon classement vu la prépa et la distance et vu le départ 3e vague. Bravo !'),(1,2,'00:40:15','7','Bonne gestion de course, super chrono et classement !'),(1,3,'01:00:00','10','Accomagnait coachette'),(1,4,'00:38:12','43','Gêné par les crampons sur les pavés mouillés !'),(1,5,'00:38:29','167','Chrono non représentatif because avec lulu'),(1,6,'01:20:05','100','Excellente performance - de la marge pour le prochain'),(1,9,'00:39:10','22','Accompagnement lulu'),(1,10,'01:30:10','16','Course en duo avec Lulu\r\nDébut de la randonnée dans le Jura'),(1,13,'00:38:10','81',''),(4,1,'01:30:57','1','Bonne gestion de course. Podium inespéré, 2e femme un peu verte - hihi\r\nCourse préférée ++'),(4,2,'00:42:51','1',NULL),(4,3,'01:00:00','1e FEMME','trail super dur'),(4,4,'00:39:50','2',NULL),(4,5,'00:38:58','3','Dans le dur ++ mais rp depuis plus d\'un an..\r\nCourue avec Morgan <3'),(4,7,'01:13:37','2eF - 1eSF','Bonne gestion de course, bon souvenir\r\nSuper tv :P'),(4,8,'00:39:20','2eF - 1eSF','Parcours plus roulant et moins boueux. Sensations correctes'),(4,9,'00:40:11','2eF - 1eSF','Gd père papa et maman en supporters (dernière course de grand-père..)'),(4,10,'01:31:02','2eF - 2eSF','Super course et magnifique parcours \r\nSuper panier souvenir !\r\nDébut de la randonnée dans le Jura !'),(4,11,'00:40:48','4eF - 1eSF',NULL),(4,12,'00:40:51','1eF','Accompagnée de Morgan\r\nBonnes sensations et plutôt bonne gestion'),(4,13,'00:41:05','2eF - 2eSF','Beaucoup aimé le parcours'),(4,14,'00:40:00','2eF - 2eSF','Dans le dur ++ pour doubler sveltana :D'),(5,6,'01:51:54','14341','Gêné par une douleur au genou dès le premier km.. par représentatif du niveau réel');
/*!40000 ALTER TABLE `resultats_courses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-24 12:44:32
