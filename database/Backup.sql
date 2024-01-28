/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.27-MariaDB : Database - animesite
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`animesite` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `animesite`;

/*Table structure for table `anime` */

DROP TABLE IF EXISTS `anime`;

CREATE TABLE `anime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `desc` text NOT NULL,
  `studio_id` int(11) NOT NULL,
  `releaseDate` date NOT NULL,
  `ageLimit` int(2) NOT NULL,
  `coverImage` text DEFAULT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studio_id` (`studio_id`),
  CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `anime` */

insert  into `anime`(`id`,`title`,`desc`,`studio_id`,`releaseDate`,`ageLimit`,`coverImage`,`createDate`,`updateDate`) values 
(1,'Attack on Titan','text',1,'2012-01-12',18,'assets/img/posters/attack on titan.jpg','2023-09-11 12:39:56',NULL),
(2,'Tokio ghoul','description',3,'2015-10-25',18,'assets/img/posters/tokyo ghoul.jpg','2023-09-11 12:39:56',NULL),
(3,'Bocchi the Rock','description',6,'2020-09-14',16,'assets/img/posters/bocchi_the_rock.jpg','2023-09-11 12:39:56',NULL),
(4,'Demon slayer','description',3,'2019-07-19',16,'assets/img/posters/demon_slayer.jpg','2023-09-11 12:39:56',NULL),
(5,'One peice','description',2,'2019-07-19',16,'assets/img/posters/van pis.jpg','2023-09-11 12:39:56',NULL);

/*Table structure for table `anime_genre` */

DROP TABLE IF EXISTS `anime_genre`;

CREATE TABLE `anime_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `genre_id` (`genre_id`),
  CONSTRAINT `anime_genre_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  CONSTRAINT `anime_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `anime_genre` */

insert  into `anime_genre`(`id`,`anime_id`,`genre_id`,`createDate`,`updateDate`) values 
(1,1,1,'2023-09-11 12:39:56',NULL),
(2,1,3,'2023-09-11 12:39:56',NULL),
(3,2,1,'2023-09-11 12:39:56',NULL),
(4,2,3,'2023-09-11 12:39:56',NULL),
(5,3,2,'2023-09-11 12:39:56',NULL),
(6,4,1,'2023-09-11 12:39:56',NULL),
(7,4,2,'2023-09-11 12:39:56',NULL),
(8,4,3,'2023-09-11 12:39:56',NULL),
(9,5,1,'2023-09-11 12:39:56',NULL),
(10,5,2,'2023-09-11 12:39:56',NULL),
(11,5,7,'2023-09-11 12:39:56',NULL),
(12,5,8,'2023-09-11 12:39:56',NULL);

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `anime_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `comment` */

insert  into `comment`(`id`,`text`,`anime_id`,`user_id`,`parent_id`,`createDate`,`updateDate`) values 
(1,'0',1,2,NULL,'2023-09-21 09:14:23',NULL),
(2,'comment text comment text comment text comment text comment text comment text comment text comment text comment text comment text comment text comment text comment text comment text ',1,2,NULL,'2023-09-21 09:15:31',NULL),
(3,'asdasdasdasdasd',1,1,NULL,'2023-09-25 10:58:33',NULL),
(4,'123123 asdasdasdasdasdasd',1,1,NULL,'2023-09-25 10:59:31',NULL),
(5,'asdubasdubasdubasd asdasdasdasdasd;ams;dams;dmka;skdmna;skdnmlaksndlaskndl kasndlaksndlkasn dlknasld knaslkdnlasknd;laknsmdas',1,1,NULL,'2023-09-25 11:01:21',NULL);

/*Table structure for table `episode` */

DROP TABLE IF EXISTS `episode`;

CREATE TABLE `episode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `episodeNumber` varchar(100) NOT NULL,
  `poster` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `isFilm` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `season_id` (`season_id`),
  CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `episode` */

insert  into `episode`(`id`,`season_id`,`title`,`episodeNumber`,`poster`,`video`,`isFilm`,`order`,`createDate`,`updateDate`) values 
(1,1,'','1','assets/img/posters/attack on titan.jpg',NULL,0,1,'2023-09-18 09:41:59',NULL),
(2,1,'','2','assets/img/posters/attack on titan.jpg',NULL,0,2,'2023-09-18 09:44:13',NULL),
(3,1,'','3','assets/img/posters/attack on titan.jpg',NULL,0,3,'2023-09-18 09:51:30',NULL),
(4,1,'','4','assets/img/posters/attack on titan.jpg',NULL,0,4,'2023-09-18 09:52:43',NULL),
(5,3,'Фильм 1','1','assets/img/posters/attack on titan.jpg',NULL,1,1,'2023-09-18 10:14:23',NULL),
(6,3,'Фильм 2','2','assets/img/posters/attack on titan.jpg',NULL,1,2,'2023-09-18 10:16:59',NULL),
(7,4,'Бесконечный поезд','1',NULL,NULL,1,1,'2023-09-23 10:00:12',NULL),
(8,5,'Фильм 1','1','assets/img/posters/van pis.jpg',NULL,1,1,'2023-09-23 10:00:02',NULL);

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `genre` */

insert  into `genre`(`id`,`name`,`createDate`,`updateDate`) values 
(1,'Приключение','2023-09-11 12:39:56',NULL),
(2,'Комедия','2023-09-11 12:39:56',NULL),
(3,'Драма','2023-09-11 12:39:56',NULL),
(4,'Фентези','2023-09-11 12:39:56',NULL),
(5,'Романтика','2023-09-11 12:39:56',NULL),
(6,'Повседневность','2023-09-11 12:39:56',NULL),
(7,'Боевик','2023-09-11 12:39:56',NULL),
(8,'Сёнен','2023-09-11 12:39:56',NULL);

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` int(2) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `rating` */

insert  into `rating`(`id`,`rate`,`anime_id`,`user_id`,`createDate`,`updateDate`) values 
(1,10,1,2,'2023-09-11 12:39:57',NULL),
(2,9,1,3,'2023-09-11 12:39:57',NULL),
(3,10,1,1,'2023-09-11 12:39:57',NULL),
(4,10,3,1,'2023-09-11 12:39:57',NULL),
(5,9,3,2,'2023-09-11 12:39:57',NULL),
(6,8,3,3,'2023-09-11 12:39:57',NULL),
(7,7,2,2,'2024-01-28 14:21:57',NULL),
(8,3,4,2,'2024-01-28 14:21:57',NULL),
(9,7,5,2,'2024-01-28 14:21:57',NULL),
(10,7,2,1,'2024-01-28 14:21:57',NULL),
(11,3,4,1,'2024-01-28 14:21:57',NULL),
(12,7,5,1,'2024-01-28 14:21:57',NULL),
(13,7,2,3,'2024-01-28 14:21:57',NULL),
(14,3,4,3,'2024-01-28 14:21:57',NULL),
(15,7,5,3,'2024-01-28 14:21:57',NULL);

/*Table structure for table `season` */

DROP TABLE IF EXISTS `season`;

CREATE TABLE `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `coverImage` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `season_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  CONSTRAINT `season_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `season` */

insert  into `season`(`id`,`anime_id`,`status_id`,`title`,`coverImage`,`order`,`createDate`,`updateDate`) values 
(1,1,2,'1 сезон',NULL,0,'2023-09-18 09:36:44',NULL),
(2,1,2,'2 сезон',NULL,1,'2023-09-18 09:37:48',NULL),
(3,1,2,'Фильмы',NULL,2,'2023-09-18 09:38:29',NULL),
(4,4,2,'бесконечный поезд',NULL,2,'2023-09-23 09:53:00',NULL),
(5,5,2,'Фильмы',NULL,2,'2023-09-23 09:56:22',NULL);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `creationDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `status` */

insert  into `status`(`id`,`name`,`creationDate`,`updateDate`) values 
(1,'Онгоинг','2024-01-28 19:25:53',NULL),
(2,'Закончился','2024-01-28 19:28:11',NULL),
(3,'анонс','2024-01-28 19:28:25',NULL);

/*Table structure for table `studio` */

DROP TABLE IF EXISTS `studio`;

CREATE TABLE `studio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `studio` */

insert  into `studio`(`id`,`name`,`createDate`,`updateDate`) values 
(1,'Mappa','2023-09-11 12:39:55',NULL),
(2,'TYO Animations','2023-09-11 12:39:55',NULL),
(3,'ufotable','2023-09-11 12:39:55',NULL),
(4,'A-1 Pictures','2023-09-11 12:39:55',NULL),
(5,'Aniplex','2023-09-11 12:39:55',NULL),
(6,'CloverWorks','2023-09-11 12:39:55',NULL),
(7,'Wit Studio','2023-09-11 12:39:55',NULL),
(8,'White Fox','2023-09-11 12:39:55',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `passwordHash` varchar(32) NOT NULL,
  `profileImage` text DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`login`,`passwordHash`,`profileImage`,`isAdmin`,`createDate`,`updateDate`) values 
(1,'azer','azer','827ccb0eea8a706c4c34a16891f84e7b',NULL,1,'2023-09-11 12:39:55',NULL),
(2,'Akmalkhon','ak47','01cfcd4f6b8770febfb40cb906715822',NULL,1,'2023-09-11 12:39:55',NULL),
(3,'yagonchiz','abcde','e2fc714c4727ee9395f324cd2e7f331f',NULL,0,'2023-09-11 12:39:55','2023-09-24 21:45:02'),
(4,'1','2','eccbc87e4b5ce2fe28308fd9f2a7baf3',NULL,0,'2023-09-14 11:51:44',NULL),
(8,'1','1222','c4ca4238a0b923820dcc509a6f75849b',NULL,0,'2023-09-14 12:19:45',NULL),
(9,'1','111222','c4ca4238a0b923820dcc509a6f75849b',NULL,0,'2023-09-15 08:29:14',NULL),
(10,'Zidan','Kohai','11119b85d4579ad402a68fadfce8f515',NULL,0,'2024-01-24 04:39:14',NULL),
(12,'Zayniddin','zidankohai@gmail.com','d8829f76e2fa11294376ae97fc9ee951',NULL,0,'2024-01-26 21:32:17',NULL),
(15,'asdasd','asdasd','a8f5f167f44f4964e6c998dee827110c',NULL,0,'2024-01-26 21:39:06',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
