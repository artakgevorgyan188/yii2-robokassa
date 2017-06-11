/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.48 : Database - yii2-robokassa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii2-robokassa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii2-robokassa`;

/*Table structure for table `sh_category` */

DROP TABLE IF EXISTS `sh_category`;

CREATE TABLE `sh_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`parent_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Data for the table `sh_category` */

insert  into `sh_category`(`id`,`parent_id`,`name`,`keywords`,`description`) values (1,0,'Sportswear',NULL,NULL),(2,0,'Mens','mens shoes','mens, shoes'),(3,0,'Womens','womens bluzes','bluzes for women`s'),(4,1,'Nike',NULL,NULL),(5,1,'Under Armour',NULL,NULL),(6,1,'Adidas',NULL,NULL),(7,1,'Puma',NULL,NULL),(8,1,'ASICS',NULL,NULL),(9,2,'Fendi',NULL,NULL),(10,2,'Guess',NULL,NULL),(11,2,'Valentino',NULL,NULL),(12,2,'Dior',NULL,NULL),(13,2,'Versace',NULL,NULL),(14,2,'Armani',NULL,NULL),(15,2,'Prada',NULL,NULL),(16,2,'Dolce and Gabbana',NULL,NULL),(17,2,'Chanel',NULL,NULL),(18,2,'Gucci',NULL,NULL),(19,3,'Fendi',NULL,NULL),(20,3,'Guess',NULL,NULL),(21,3,'Valentino',NULL,NULL),(22,3,'Dior',NULL,NULL),(23,3,'Versace',NULL,NULL),(24,0,'Kids',NULL,NULL),(25,0,'Fashion',NULL,NULL),(26,0,'Households',NULL,NULL),(27,0,'Interiors',NULL,NULL),(28,0,'Clothing',NULL,NULL),(29,0,'Bags','сумки ключевики','сумки описание'),(30,0,'Shoes',NULL,NULL),(31,6,'Shoes',NULL,NULL),(32,6,'Clothing',NULL,NULL),(33,6,'Symka',NULL,NULL),(34,31,'Lifestyle',NULL,NULL),(35,31,'Baseball',NULL,NULL),(36,32,'ПУХОВИК SUPERLIGHT',NULL,NULL),(37,32,'КУРТКА WHITE MOUNTAINEERING VARSITY',NULL,NULL),(38,32,'КУРТКА MÉLANGE',NULL,NULL),(39,31,'Soccer',NULL,NULL),(40,31,'Running',NULL,NULL),(41,31,'Scateboarding',NULL,NULL),(42,34,'SUPERSTAR FOUNDATION SHOES\r\n\r\n',NULL,NULL),(43,34,'STAN SMITH PRIMEKNIT SHOES',NULL,NULL),(44,34,'STAN SMITH PRIMEKNIT SHOES',NULL,NULL),(45,35,'ADIZERO AFTERBURNER 2.0 JRD CLEATS',NULL,NULL),(46,35,'BOOST ICON 2.0 JRD CLEATS',NULL,NULL),(47,39,'X TANGO 16.1 INDOOR SHOES',NULL,NULL),(48,39,'X TANGO 16.2 TURF SHOES',NULL,NULL),(49,39,'ACE TANGO 17+ PURECONTROL TURF SHOES',NULL,NULL),(50,39,'ACE TANGO 17.2 TURF SHOES',NULL,NULL),(51,40,'ALPHABOUNCE XENO M',NULL,NULL),(52,40,'RESPONSE BOOST TRAIL SHOES',NULL,NULL),(53,41,'BUSENITZ PUREBOOST SHOES',NULL,NULL),(54,41,'ADIEASE PREMIERE ADV X OFFICIAL SHOES',NULL,NULL),(55,41,'BUSENITZ PRO CLASSIFIED SHOES',NULL,NULL);

/*Table structure for table `sh_image` */

DROP TABLE IF EXISTS `sh_image`;

CREATE TABLE `sh_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `sh_image` */

insert  into `sh_image`(`id`,`filePath`,`itemId`,`isMain`,`modelName`,`urlAlias`,`name`) values (1,'Products/Product2/e11cd2.jpg',2,0,'Product','a8df863134-3',''),(2,'Products/Product2/031190.jpg',2,0,'Product','15db268f47-4',''),(3,'Products/Product2/de034e.jpg',2,0,'Product','e9c18c9f9c-5',''),(4,'Products/Product2/30aa34.jpg',2,0,'Product','55799e6f90-6',''),(5,'Products/Product2/5a4ee7.jpg',2,0,'Product','67c5649f31-7',''),(6,'Products/Product4/7978c9.jpg',4,0,'Product','69cab248c7-2',''),(7,'Products/Product4/6818e3.jpg',4,0,'Product','4dc5075e24-3',''),(8,'Products/Product4/310220.jpg',4,0,'Product','06f9e77bc4-4',''),(9,'Products/Product4/6fa0fd.jpg',4,0,'Product','c9b6c69ccd-5',''),(10,'Products/Product4/a05ee8.jpg',4,0,'Product','11d4ed22b8-6',''),(11,'Products/Product4/9d5949.jpg',4,0,'Product','a7738dbb93-7',''),(12,'Products/Product4/bce78b.jpg',4,0,'Product','67d812f00c-8',''),(13,'Products/Product4/68c56d.jpg',4,0,'Product','4858aa4b9e-9',''),(14,'Products/Product4/657c1d.jpg',4,0,'Product','7e27e7fd34-10',''),(15,'Products/Product4/fa08cf.jpg',4,1,'Product','0d1187e42e-1',''),(16,'Products/Product2/9df1fb.jpg',2,0,'Product','3a7b945a16-8',''),(17,'Products/Product2/6dc92f.jpg',2,0,'Product','e041604eda-9',''),(18,'Products/Product2/ddc87a.jpg',2,0,'Product','864d511a55-10',''),(19,'Products/Product2/7f6d48.jpg',2,0,'Product','430aa71529-11',''),(20,'Products/Product2/07471b.jpg',2,0,'Product','a3f69a1bd7-12',''),(21,'Products/Product2/80a25a.jpg',2,0,'Product','a4fc802b30-13',''),(22,'Products/Product2/1c5bf2.jpg',2,0,'Product','ebc71bf33d-14',''),(23,'Products/Product2/015959.jpg',2,0,'Product','af0a67f3ba-2',''),(24,'Products/Product2/585002.jpg',2,1,'Product','0c1f7ef511-1',''),(25,'Products/Product8/657ca6.jpg',8,1,'Product','f6d949b845-1',''),(26,'Products/Product9/e137bc.jpg',9,0,'Product','31bbeb2485-3',''),(27,'Products/Product9/4c8008.jpg',9,0,'Product','a28f5c1dfe-4',''),(28,'Products/Product9/b761f4.jpg',9,0,'Product','6dea6e0d3e-5',''),(29,'Products/Product9/70ae09.jpg',9,0,'Product','0531f40d0f-2',''),(30,'Products/Product9/304849.jpg',9,1,'Product','7a04b1917e-1',''),(31,'Products/Product9/d5b93e.jpg',9,NULL,'Product','e66ecce867-6',''),(32,'Products/Product9/86cfe5.jpg',9,NULL,'Product','319f97cd06-7',''),(33,'Products/Product7/feaac2.jpg',7,0,'Product','b9b018b4e1-2',''),(34,'Products/Product7/5db503.jpg',7,1,'Product','5ac7e71360-1',''),(35,'Products/Product7/319a06.jpg',7,NULL,'Product','95285e4a39-3',''),(36,'Products/Product7/df6c97.jpg',7,NULL,'Product','60958ffa7e-4',''),(37,'Products/Product3/964062.jpg',3,1,'Product','ba3b3f1b68-1',''),(38,'Products/Product3/e5a6c5.jpg',3,NULL,'Product','73b0cdf4b0-2',''),(39,'Products/Product3/a60db9.jpg',3,NULL,'Product','ca5d469f19-3',''),(40,'Products/Product3/b5374a.jpg',3,NULL,'Product','f8f91ab99d-4',''),(41,'Products/Product14/7c2a58.jpg',14,1,'Product','867a736715-1',''),(42,'Products/Product14/c7954a.jpg',14,NULL,'Product','09c1d76780-2',''),(43,'Products/Product14/3a2e2c.jpg',14,NULL,'Product','a08daafffe-3','');

/*Table structure for table `sh_migration` */

DROP TABLE IF EXISTS `sh_migration`;

CREATE TABLE `sh_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sh_migration` */

insert  into `sh_migration`(`version`,`apply_time`) values ('m000000_000000_base',1481314612),('m140622_111540_create_image_table',1481314637),('m140622_111545_add_name_to_image_table',1481314638);

/*Table structure for table `sh_news` */

DROP TABLE IF EXISTS `sh_news`;

CREATE TABLE `sh_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `sh_news` */

insert  into `sh_news`(`id`,`datetime`,`title`,`text`) values (1,'2016-12-19 03:27:35','news1',' Рады приветствовать вас на сайте Chitamarkt.ru. На наше сайте вы можете купить свежие и дешевые продукты без простаивания в очередях. Пока интернет магазине находиться в режиме тестирования, поэтому, он еще не наполнен товаром и не добавлены форма оплата товара на сайте. Однако, мы обещаем, что скоро все исправим.\r\n                        С уважением, Администрация '),(2,'2016-12-19 03:28:03','news2','Впервые в истории Forza фанаты автогонок получат возможность управлять самым известным во вселенной Halo наземным транспортом Warthog, о появлении которого в Forza Horizon 3 просили поклонники обеих игровых серий. Автомобиль M12S Warhog CST будет доступен для бесплатной загрузки в день релиза игры для всех, кто играл в Halo 5: Guardians или Halo: The Master Chief Collection на Xbox One. \r\n'),(3,'2016-12-19 03:42:32','news3','Легендарный дизайнер Кэйдзи Инафунэ и создатели Metroid Prime представляют ReCore — экшен-приключение, созданное для систем нового поколения. Ты в числе немногих выживших людей на планете, которую контролируют враждебно настроенные роботы, стремящиеся уничтожить тебя. Подружись с ватагой отважных роботов-компаньонов, каждый из которых обладает собственными уникальными способностями и силами. Командуй этим пестрым отрядом в ходе эпического приключения людей и роботов в таинственном и живом мире. В одиночку тебе не спасти человечество. Выживание начинается в Ядре.');

/*Table structure for table `sh_order` */

DROP TABLE IF EXISTS `sh_order`;

CREATE TABLE `sh_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `sh_order` */

insert  into `sh_order`(`id`,`created_at`,`updated_at`,`qty`,`sum`,`status`,`name`,`email`,`phone`,`address`) values (12,'2016-12-06 01:24:10','2016-12-25 23:52:04',4,291,'1','Vahagn','artakgev@mail.ru','056565','Abovyan'),(14,'2016-12-06 01:27:43','2016-12-08 01:27:43',9,492,'1','Alla','alla@gmail.com','099 36 25 68','Artashat'),(15,'2016-12-16 08:05:24','2016-12-09 17:56:16',9,492,'0','Karen','gev@mail.ru','056565','Abovyan'),(16,'2016-12-06 01:39:33','2016-12-06 01:39:33',9,492,'0','Marine','mara@gmail.com','056565695','Tbilisi'),(17,'2016-12-06 15:54:35','2016-12-06 15:54:35',14,275,'0','Alina','alina@mail.ru','087 65 36 25','Hrazdan'),(18,'2017-01-06 06:05:03','2016-12-09 02:27:24',2,76,'0','Marine','mszdvcssdvasvaad@mail.ru','056565','Artashat'),(19,'2016-12-06 16:15:24','2016-12-06 16:15:24',5,156,'0','Vahagn','vahagn505315v@mail.ru','096 36 52 58','Sevan'),(20,'2016-12-06 16:29:42','2016-12-06 16:29:42',3,76,'0','Arman','vahagn505315v@mail.ru','0565656356','Tbilisi'),(21,'2016-12-06 16:40:00','2016-12-06 16:40:00',2,156,'0','Marine','vahagn505315v@mail.ru','056565','Erevan Davtashen'),(22,'2016-12-06 16:44:24','2016-12-06 16:44:24',3,100,'0','Armine','vahagn505315v@mail.ru','0565656356','Aramus'),(23,'2016-12-07 18:54:47','2016-12-07 18:54:47',7,381,'0','Vahan','vahan@mail.ru','0885656356','Abovyan'),(24,'2016-12-10 18:10:55','2016-12-10 18:10:55',6,170,'0','Vahagn','vahagn505315v@mail.ru','056565','Erevan Davtashen'),(25,'2016-12-28 23:01:21','2016-12-28 23:01:21',1,20,'0','swegvs','vahagn505315v@mail.ru','sdvsd','dv'),(26,'2016-12-28 23:16:26','2016-12-28 23:16:26',1,56,'0','dfbf','vahagn505315v@mail.ru','sdv','dsv'),(27,'2016-12-28 23:57:31','2016-12-28 23:57:31',1,56,'0','&lt;p&gt;jjjj&lt;/p&gt;','vahagn505315v@mail.ru','sx','s');

/*Table structure for table `sh_order_items` */

DROP TABLE IF EXISTS `sh_order_items`;

CREATE TABLE `sh_order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sh_order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `sh_product` (`id`),
  CONSTRAINT `sh_order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `sh_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `sh_order_items` */

insert  into `sh_order_items`(`id`,`order_id`,`product_id`,`name`,`price`,`qty_item`,`sum_item`) values (1,12,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(2,12,12,'Золотистая кожаная сумка-тоут \'jet Set\' от Michael Michael Kors',205,1,205),(3,12,10,'Черный кожаный рюкзак \'Rhea\' с заклепками от Michael Michael Kors рюкзак \'Rhea\' с заклепками от Michael Michael Kors',15,2,30),(4,14,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,7,392),(5,14,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(6,14,7,'Кардиган Only ON 155585 Black Heather M',0,1,0),(7,15,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,7,392),(8,15,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(9,15,7,'Кардиган Only ON 155585 Black Heather M',0,1,0),(10,16,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,7,392),(11,16,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(12,16,7,'Кардиган Only ON 155585 Black Heather M',0,1,0),(13,17,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(14,17,8,'Брюки суперстретч',99,1,99),(15,17,5,'Блузка Kira Plastinina 17-16-17436598-SM-23 S',0,10,0),(16,17,3,'Блуза Mango 62305896-05-M Бежевая',20,1,20),(17,17,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(18,18,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(19,18,3,'Блуза Mango 62305896-05-M Бежевая',20,1,20),(20,19,5,'Блузка Kira Plastinina 17-16-17436598-SM-23 S',0,3,0),(21,19,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(22,19,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(23,20,3,'Блуза Mango 62305896-05-M Бежевая',20,1,20),(24,20,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(25,20,5,'Блузка Kira Plastinina 17-16-17436598-SM-23 S',0,1,0),(26,21,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(27,21,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(28,22,7,'Кардиган Only ON 155585 Black Heather M',0,1,0),(29,22,13,'Brown calf leather \'Jet Set Travel\' cross body bag from Michael Michael Kors',0,1,0),(30,22,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(31,23,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,2,112),(32,23,7,'Кардиган Only ON 155585 Black Heather M',0,1,0),(33,23,6,'Кардиган Levis Lcy Grey Heather M',100,1,100),(34,23,4,'Блуза Tom Tailor TT 25984564-05-M Зелёная',70,1,70),(35,23,5,'Блузка Kira Plastinina 17-16-17436598-SM-23 S',0,1,0),(36,23,8,'Брюки суперстретч',99,1,99),(37,24,4,'Блуза Tom Tailor TT 25984564-05-M Зелёная',70,1,70),(38,24,3,'Блуза Mango 62305896-05-M Бежевая',20,5,100),(39,25,3,'Блуза Mango 62305896-05-M Бежевая',20,1,20),(40,26,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56),(41,27,2,'Джинсы MR520 MR 227 200002 0115 29-34p Синие',56,1,56);

/*Table structure for table `sh_product` */

DROP TABLE IF EXISTS `sh_product`;

CREATE TABLE `sh_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `cart_img` varchar(255) DEFAULT 'no-image.png',
  `medium_img` varchar(255) DEFAULT 'no-image.png',
  `recommend_img` varchar(255) DEFAULT 'recommend1.jpg',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `stock` enum('0','1') NOT NULL DEFAULT '0',
  `rating` varchar(255) DEFAULT 'rating1.png',
  `recommend` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `sh_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sh_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `sh_product` */

insert  into `sh_product`(`id`,`category_id`,`name`,`content`,`price`,`keywords`,`description`,`img`,`cart_img`,`medium_img`,`recommend_img`,`hit`,`new`,`sale`,`stock`,`rating`,`recommend`) values (1,4,'Джинсы Garsia 244/32/856 28-32p Серо-синие','<p><strong><img alt=\"\" src=\"/web/upload/global/watermark.jpg\" style=\"float:right; height:120px; margin-left:10px; margin-right:10px; width:200px\" />Garcia 244/32/856 28-32p -&nbsp;</strong>У <strong>Garcia 244/32/856 28-32p</strong> не просто выбрать себе наряд, а все потому что выбор то огромен. Персонал всегда приветлив, всегда предложат несколько вариантов и тогда запросто можна выбрать оптимальный для вас</p>',10,'sumka','sumka','product1.jpg','one.png','4.jpg','recommend1.jpg','0','0','0','1','rating9.png','1'),(2,4,'Джинсы MR520 MR 227 200002 0115 29-34p Синие','<p>Джинсы MR520 MR 227 Хорошая, качественная и привлекательная внешне одежда не может не радовать, здесь сможет найти себе джинсовую одежку даже самый требовательный покупатель. По крайней мере я покупала пару раз одежду этой марки и мне понравилось, качество на высоком уровне и цены доступные.</p>',56,'','','product2.jpg','two.png','5.jpg','recommend2.jpg','1','0','0','1','rating8.png','0'),(3,9,'Блуза Mango 62305896-05-M Бежевая','<p>Блуза Mango 62305896-05-M Струящаяся ткань, с фактурной выделкой. Круглый вырез горловины. Рукава три четверти, завязываются шнурки. Спереди застежка на пуговицы.</p>',20,'','','product3.jpg','three.png','6.jpg','recommend3.jpg','1','1','1','0','rating11.png','1'),(4,21,'Блуза Tom Tailor TT 25984564-05-M Зелёная','<p>Испанский бренд модной одежды &quot;Mango&quot; родился в 1984 году в Барселоне, где и по сей день находится штаб-квартира компании. В том же городе появился и первый магазин</p>',70,'','','product4.jpg','three.png','7.jpg','recommend1.jpg','1','0','1','0','rating10.png','0'),(5,25,'Блузка Kira Plastinina 17-16-17436598-SM-23 S','Блузка Kira Plastinina с жабо выполнена из легкой ткани в горох. Модель прямого кроя. Детали: короткая планка и манжеты на пуговицах, длинные рукава.',0,NULL,NULL,'product5.jpg','one.png','8.jpg','recommend2.jpg','1','0','0','1','rating6.png','1'),(6,28,'Кардиган Levis Lcy Grey Heather M','Низкая посадка, узкая брючина, застежка на молнию. Ткань с добавлением эластана обеспечивает наилучшую посадку и сохранение формы.',100,NULL,NULL,'product6.jpg','three.png','1.jpg','recommend3.jpg','1','0','0','0','rating4.png','1'),(7,28,'Кардиган Only ON 155585 Black Heather M','',0,'','','no-image.png','no-image.png','no-image.png','recommend1.jpg','1','1','0','1','rating10.png','0'),(8,26,'Брюки суперстретч','',99,'','','no-image.png','no-image.png','11.jpg','recommend2.jpg','0','0','1','1','rating9.png','1'),(9,26,'Укороченные брюки суперстрейч','',0,'','','product1.jpg','one.png','3.jpg','recommend3.jpg','0','0','0','1','rating5.png','0'),(10,29,'Черный кожаный рюкзак \'Rhea\' с заклепками от Michael Michael Kors рюкзак \'Rhea\' с заклепками от Michael Michael Kors','Простата, инновационный стиль бренда ',15,NULL,NULL,'product3.jpg','one.png','1.jpg','recommend1.jpg','0','1','1','0','rating8.png','0'),(11,29,'Белая кожаная сумка-тоут \'Selma\' от Michael Michael Kors',NULL,200,NULL,NULL,'no-image.png','no-image.png','no-image.png','recommend1.jpg','0','0','1','0','rating9.png','0'),(12,29,'Золотистая кожаная сумка-тоут \'jet Set\' от Michael Michael Kors',NULL,205,NULL,NULL,'product5.jpg','three.png','9.jpg','recommend2.jpg','0','0','0','1','rating11.png','0'),(13,29,'Brown calf leather \'Jet Set Travel\' cross body bag from Michael Michael Kors',NULL,0,NULL,NULL,'no-image.png','two.png','3.jpg','recommend2.jpg','0','0','0','1','rating1.png','1'),(14,29,'Черная кожаная сумка-тоут \'Jet Set\' от Michael Michael Kors','',0,'','','no-image.png','one.png','11.jpg','recommend3.jpg','0','0','0','0','rating4.png','0');

/*Table structure for table `sh_user` */

DROP TABLE IF EXISTS `sh_user`;

CREATE TABLE `sh_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sh_user` */

insert  into `sh_user`(`id`,`username`,`password`,`auth_key`) values (1,'admin','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC','BPcGjOvEAcu2LLeK4QH4-b55YxCquIqz');

/*Table structure for table `sh_users` */

DROP TABLE IF EXISTS `sh_users`;

CREATE TABLE `sh_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `sh_users` */

insert  into `sh_users`(`id`,`first_name`,`last_name`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'Hovsepyan','Artak','user1','-uXtSPRqj3KnZ7GmwnlcYflBKdpOHi9q','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'admidnbf@mail.ru',10,1,'2016-12-29 00:02:37','2017-02-23 00:51:04'),(2,'Araqelyan','Hasmik','user2','sPDUqzIKByMt8uKXsnGUpXRty7yXJidr','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC ',NULL,'svsdv@mail.ru',10,1,'2016-12-29 00:11:20','2017-02-23 01:14:46'),(3,'Axajanyan','Alina','user3','xHT9v8he76xcXzkYpIS0Y_3T6Yfipc1K','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'adminfb@mail.ru',10,1,'2016-12-29 00:19:17','2017-02-23 01:14:48'),(4,'Hovsepyan ','Arman','user4','uAKYK1o0Kvmtu7II_FRiwHjpKd-C7bzQ','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'adminsrfdbnsrf@mail.ru',10,1,'2016-12-29 00:37:21','2017-02-23 01:14:50'),(5,'Alixanyan','Armine','user5','i2TOOOyMpEN9l-7snwPqyoWe9Q5MA1VH','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'adminvss@mail.ru',10,1,'2016-12-29 00:53:42','2017-02-23 01:14:51'),(6,'Hovhannisyan','Karen','user6','cOy7dIiWLrkM_gdg5IDtClv3JApFwhWB','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'admindv@mai.ru',10,1,'2016-12-29 00:54:10','2017-02-23 01:14:52'),(7,'Mkrtchyan','Zaruhi','user7','8kpylEIuwK2fB1OxJUOs_0PX6VTM2xBo','$2y$13$b1WxtdvYxahN2UfXaRJZpeeldHxjIpoWmK3C6tGrNKU21ryhMMsyC',NULL,'vahag505315v@mail.ru',10,1,'2017-02-23 00:43:56','2017-02-23 01:14:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
