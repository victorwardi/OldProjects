/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.0.51a : Database - vbs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `vbs`;

USE `vbs`;

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `id_marca` bigint(20) NOT NULL auto_increment,
  `nome` varchar(200) default NULL,
  `foto` varchar(255) default NULL,
  PRIMARY KEY  (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Table structure for table `propaganda` */

DROP TABLE IF EXISTS `propaganda`;

CREATE TABLE `propaganda` (
  `id_propaganda` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `link` varchar(255) default NULL,
  `imagem` varchar(255) default NULL,
  PRIMARY KEY  (`id_propaganda`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id_tipo` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  PRIMARY KEY  (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
