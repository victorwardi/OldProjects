/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.0.51a : Database - sisintsocordas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `sisintsocordas`;

USE `sisintsocordas`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `enderecoID` bigint(20) NOT NULL auto_increment,
  `rua` varchar(255) default NULL,
  `numero` varchar(40) default NULL,
  `bairro` varchar(200) default NULL,
  `complemento` varchar(255) default NULL,
  `municipio` varchar(255) default NULL,
  `uf` varchar(2) default NULL,
  `cep` varchar(9) default NULL,
  PRIMARY KEY  (`enderecoID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
