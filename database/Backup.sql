/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.6.51 : Database - animesite
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`animesite` /*!40100 DEFAULT CHARACTER SET utf8 */;

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
  `coverImage` text,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studio_id` (`studio_id`),
  CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `anime` */

insert  into `anime`(`id`,`title`,`desc`,`studio_id`,`releaseDate`,`ageLimit`,`coverImage`,`createDate`,`updateDate`) values 
(6,'Розовая пора моей школьной жизни сплошной обман','Хикигая Хачиман - прагматичный циник, считающий, что видит людей насквозь и что время школьной юности - не более чем пора плохо скрываемой лжи и неудач. Хикигая замыкается в себе, наотрез отказываясь поддерживать контакт с, по его мнению, недалёкими сверстниками, поэтому у него совсем нет друзей или любовного интереса. Но школа, как известно, не только учит, но ещё и воспитывает - Хачимана против его воли записывает в клуб, где он становится напарником красотки по имени Юкиношита Юкино. Вместе они, как самая настоящая команда SOS, делают то, о чём раньше Хикигая не мог и помыслить - помогают другим людям в решении их проблем.',9,'2013-06-01',16,'assets/img/posters/OreGairu.webp','2024-01-29 01:07:45',NULL),
(7,'Одинокий рокер','Застенчивая и малообщительная Хитори Гото мечтает стать популярным подростком и завести много друзей. Однажды девчонка увидела интервью знаменитого рокера, который объяснил зрителям, что в молодые годы испытывал чувство одиночества. Хитори увидела в музыканте родственную душу, а потому она решила пойти по стопам артиста. Девчонка быстро отыскала отцовскую гитару, которая пылилась в чулане. Талантливая Гото невзирая на трудности начала самостоятельно изучать игру на гитаре. После трёх лет обучения девушка достигла хороших результатов, но в общении со сверстниками ничего не изменилось. Хитори завела собственный канал на популярном портале, где собрала более тридцати тысяч зрителей. Однажды скромная девчонка в расстроенных чувствах отдыхала на скамейке, как вдруг к ней подошла незнакомка. Оказалось, что Нидзика Идзити состоит в рок-группе, которая должна вечером давать мини-концерт. Проблема была в том, что музыкантам не хватало гитариста, а потому они пригласили Хитори.',6,'2022-12-25',16,'assets/img/posters/bocchi_the_rock.jpg','2024-01-29 01:07:45',NULL),
(8,'Кей-он','Любите ли вы музыку? Начинающая гитаристка Юи Хирасава определённо да. Спасая школьный музыкальный клуб от закрытия, она собирает музыкальный коллектив, о котором давно мечтала, репетируя с бойкой барабанщицей Рицу, стеснительной бас-гитаристкой Мио, пианисткой Цумуги и позже присоединившейся крошкой Адзусой. Хотя, как сказать, репетируя - скорее попивая чай и болтая о девичьем, попутно выступая на концертах и раскрывая свой творческий потенциал. Как и «Lucky Star», «K-On!» можно отнести к классике повседневности, в центре которой будни группы старшеклассниц с их маленькими победами и поражениями, радостями и горестями. Но самое главное: это аниме про музыку и любовь к ней. Или к чаю… решайте сами!',10,'2009-06-26',16,'assets/img/posters/k-on.jpg','2024-01-29 01:07:45',NULL),
(9,'Атака титанов','Загнанное в угол человечество доживает свои последние дни под гнётом титанов - таинственных созданий, терроризирующих человеческую расу. Выжившие ютятся за стенами крупного поселения с собственным правительством, представляющим последний оплот централизованной власти в мире. Там же живёт и юноша по имени Эрен, проводя детство в относительной безопасности, пока не происходит событие из ряда вон: титаны прорываются в город, уничтожая всё на своём пути. После вторжения гигантов Эрен становится сиротой и клянётся уничтожить всех до единого титанов. На пути к своей цели он и его друзья вступают в отряд разведки, занимающийся вылазками за стену. Герой ещё не знает, сколько загадок в себе таит внешний мир.',7,'2013-09-29',18,'assets/img/posters/attack on titan.jpg','2024-01-29 01:07:45',NULL),
(10,'Добро пожаловать в класс превосходство','Старшая школа Кодо Икусэй – престижное учебное заведение с весьма неплохими показателями, где каждый ученик после выпуска гарантированно поступает в самый престижный институт и сможет найти работу. Ученикам дозволено ходить как они того пожелают: с любыми прическами, в любом виде, приносить с собой свои личные вещи. Каждому ученику при поступлении начисляют 100 очков (100000 йен), на которые они обязаны жить. Очки начисляются каждый месяц. На первый взгляд Кодо Икусэй – рай для любого ученика, но не так всё просто было. Очки начисляются за успеваемость в учебе, и в зависимости от ранга класса. В школе существует так называемая “эс-система”, по которой классы распределяются на ранги, по типу: D, C, B, A. Киётаки Аянокоджи – главный герой, который был направлен в класс D, в класс, куда управление школы “сливает” студентов с низкими способностями. Для того чтобы перейти на ранг выше, классу требуется набрать больше баллов на тесте, чем у класса что стоит на более высоком ранге, в таком случае класс, что превзошёл другой, станет на его место, а другой класс опуститься ниже.',11,'2017-01-01',16,'assets/img/posters/COTE.jpe','2024-01-29 01:07:45',NULL),
(11,'Сага о Винланде','Юный Торфинн вырос, слушая рассказы старых моряков, которые путешествовали по океану и достигли легендарного места Винланд. Говорят, что это теплое и плодородное место, где не будет необходимости сражаться – совсем не похожее на замерзшую деревню в Исландии, где он родился, и уж точно не похоже на его нынешнюю жизнь наемника. Война теперь его дом. Хотя его отец однажды сказал ему: «У тебя нет врагов, ни у кого нет. Нет никого, кому можно было бы причинить боль», когда он вырос, Торфинн понял, что нет ничего более далекого от истины. Война между Англией и датчанами с каждым годом обостряется. Смерть стала обычным явлением, и наемники-викинги наслаждаются каждым ее моментом. Союз с любой из сторон вызовет масштабное изменение баланса сил, и викинги будут рады сделать себе имя и забрать любую добычу, которую заработают на этом пути. Среди хаоса Торфинн должен отомстить и убить Аскеладда, человека, убившего его отца. Единственный рай для викингов, кажется, — это бушующая эпоха войны и смерти.',7,'2019-07-08',17,'assets/img/posters/saga_about_vinland.jpeg','2024-01-29 01:07:45',NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `anime_genre` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `comment` */

/*Table structure for table `episode` */

DROP TABLE IF EXISTS `episode`;

CREATE TABLE `episode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `episodeNumber` varchar(100) NOT NULL,
  `poster` text,
  `video` text,
  `isFilm` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `season_id` (`season_id`),
  CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `episode` */

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `genre` */

insert  into `genre`(`id`,`name`,`createDate`,`updateDate`) values 
(1,'Приключение','2023-09-11 12:39:56',NULL),
(2,'Комедия','2023-09-11 12:39:56',NULL),
(3,'Драма','2023-09-11 12:39:56',NULL),
(4,'Фентези','2023-09-11 12:39:56',NULL),
(5,'Романтика','2023-09-11 12:39:56',NULL),
(6,'Повседневность','2023-09-11 12:39:56',NULL),
(7,'Боевик','2023-09-11 12:39:56',NULL),
(8,'Сёнен','2023-09-11 12:39:56',NULL),
(9,'Исекай','2024-01-28 21:26:54',NULL),
(10,'Фантастика','2024-01-28 21:27:08',NULL),
(11,'Мистика','2024-01-28 21:27:23',NULL),
(12,'Детектив','2024-01-28 21:27:36',NULL),
(13,'Психология','2024-01-28 21:27:43',NULL),
(14,'Триллер','2024-01-28 21:27:51',NULL),
(15,'Сёдзё','2024-01-28 21:28:04',NULL),
(16,'Школа','2024-01-28 21:28:14',NULL),
(17,'Спорт','2024-01-28 21:28:19',NULL),
(18,'Меха','2024-01-28 21:28:26',NULL),
(19,'Музыка','2024-01-28 21:28:37',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `rating` */

/*Table structure for table `season` */

DROP TABLE IF EXISTS `season`;

CREATE TABLE `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anime_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `coverImage` text,
  `order` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `season_ibfk_1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE,
  CONSTRAINT `season_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `season` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `status` */

insert  into `status`(`id`,`name`,`createDate`,`updateDate`) values 
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `studio` */

insert  into `studio`(`id`,`name`,`createDate`,`updateDate`) values 
(1,'Mappa','2023-09-11 12:39:55',NULL),
(2,'TYO Animations','2023-09-11 12:39:55',NULL),
(3,'ufotable','2023-09-11 12:39:55',NULL),
(4,'A-1 Pictures','2023-09-11 12:39:55',NULL),
(5,'Aniplex','2023-09-11 12:39:55',NULL),
(6,'CloverWorks','2023-09-11 12:39:55',NULL),
(7,'Wit Studio','2023-09-11 12:39:55',NULL),
(8,'White Fox','2023-09-11 12:39:55',NULL),
(9,'Brain\'s Base','2024-01-28 21:49:09',NULL),
(10,'Kyoto Animation','2024-01-29 00:45:40',NULL),
(11,'Lerche','2024-01-29 00:55:01',NULL),
(12,'Madhouse Studios','2024-02-21 20:14:57',NULL),
(13,'8bit','2024-02-21 20:14:57',NULL),
(14,'Dogakobo','2024-02-21 20:14:57',NULL),
(15,'Studio Bind','2024-02-21 20:14:57',NULL),
(16,'Nexus','2024-02-21 20:14:57',NULL),
(17,'J.C. Staff','2024-02-21 20:14:57',NULL),
(18,'Silver Link','2024-02-21 20:14:57',NULL),
(19,'Sunrise','2024-02-21 20:14:57',NULL),
(20,'Studio Pierrot','2024-02-21 20:14:57',NULL),
(21,'Passione','2024-02-21 20:14:57',NULL),
(22,'P.A. Works','2024-02-21 20:14:57',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `passwordHash` varchar(32) NOT NULL,
  `profileImage` text,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
