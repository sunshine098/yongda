/*
SQLyog v10.2 
MySQL - 5.5.28 : Database - yongda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yongda` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yongda`;

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `sess_id` char(32) NOT NULL DEFAULT '',
  `sess_data` text,
  `last_modified` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `session` */

insert  into `session`(`sess_id`,`sess_data`,`last_modified`) values ('h9r8e0ss09pr6c1k2mdt0vpjp3','',1426823266),('rqkg932slmlh4u9jg2v7qqn486','randomString|s:4:\"VMQ8\";isLogin|s:3:\"yes\";',1426823283);

/*Table structure for table `yd_admin` */

DROP TABLE IF EXISTS `yd_admin`;

CREATE TABLE `yd_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(20) NOT NULL DEFAULT '' COMMENT '登陆账号',
  `admin_password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `last_login` int(11) NOT NULL DEFAULT '0' COMMENT '上线时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `yd_admin` */

insert  into `yd_admin`(`admin_id`,`admin_name`,`admin_password`,`last_login`) values (1,'admin','928a06191c4290a8ad9096fca7007bec',0),(2,'admin2','d5378b014191bbfa83cf978b60b46082',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
