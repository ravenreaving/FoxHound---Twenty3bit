/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.1.19-MariaDB : Database - db_foxhound
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_foxhound` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_foxhound`;

/*Table structure for table `tb_browser` */

DROP TABLE IF EXISTS `tb_browser`;

CREATE TABLE `tb_browser` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `browser_id` int(11) DEFAULT NULL,
  `browser_name` varchar(255) DEFAULT NULL,
  `b_picurl` text,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_browser` */

insert  into `tb_browser`(`bid`,`browser_id`,`browser_name`,`b_picurl`) values 
(1,1,'Firefox','assets/images/mozilla.png'),
(2,2,'Chrome','assets/images/chrome.png');

/*Table structure for table `tb_location` */

DROP TABLE IF EXISTS `tb_location`;

CREATE TABLE `tb_location` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `loc_id` int(11) DEFAULT NULL,
  `loc_name` varchar(255) DEFAULT NULL,
  `loc_picurl` text,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_location` */

insert  into `tb_location`(`lid`,`loc_id`,`loc_name`,`loc_picurl`) values 
(1,1,'\"Vancouver, Canada\"','assets/images/canada.png'),
(2,2,'\"London, UK\"','assets/images/london.png'),
(3,3,'\"Sydney, Australia\"','assets/images/australia.png'),
(4,4,'\"Dallas, USA\"','assets/images/usa.png'),
(5,5,'\"Mumbai, India\"','assets/images/india.png'),
(6,6,'\"Sao Paulo, Brazil\"',NULL);

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `pword` text,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_users` */

insert  into `tb_users`(`userid`,`fname`,`lname`,`uname`,`pword`) values 
(1,'Raven','Reaving','raven.reaving','aa96cc5aaeb290abb274d57b70d29c746b3e33f7'),
(2,'Eloisa','Santos','eloisasantos','1737231e7a91cf21b08706529a3ad2957d4e1ed3');

/*Table structure for table `tb_webreport` */

DROP TABLE IF EXISTS `tb_webreport`;

CREATE TABLE `tb_webreport` (
  `repid` int(11) NOT NULL AUTO_INCREMENT,
  `rep_testid` text,
  `rep_webid` int(11) DEFAULT NULL,
  `rep_weburl` text,
  `rep_option` int(11) DEFAULT NULL,
  `rep_pageloadtime` double DEFAULT NULL,
  `rep_pagespeedscore` double DEFAULT NULL,
  `rep_yslow` double DEFAULT NULL,
  `rep_lastreport` datetime DEFAULT NULL,
  `rep_pdf` text,
  `rep_screenshot` text,
  PRIMARY KEY (`repid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_webreport` */

insert  into `tb_webreport`(`repid`,`rep_testid`,`rep_webid`,`rep_weburl`,`rep_option`,`rep_pageloadtime`,`rep_pagespeedscore`,`rep_yslow`,`rep_lastreport`,`rep_pdf`,`rep_screenshot`) values 
(9,'eNPt1ley ',6,'https://www.sss.gov.ph/ ',NULL,34220,45,48,'2017-02-11 05:46:12','r ',''),
(10,'6u9tnimd ',6,'https://www.sss.gov.ph/ ',NULL,14440,45,48,'2017-02-13 11:54:27','r ','');

/*Table structure for table `tb_websites` */

DROP TABLE IF EXISTS `tb_websites`;

CREATE TABLE `tb_websites` (
  `webid` int(11) NOT NULL AUTO_INCREMENT,
  `weburl` text,
  `web_loc` int(11) DEFAULT NULL,
  `web_browser` int(11) DEFAULT NULL,
  PRIMARY KEY (`webid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_websites` */

insert  into `tb_websites`(`webid`,`weburl`,`web_loc`,`web_browser`) values 
(6,'https://www.sss.gov.ph/',5,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
