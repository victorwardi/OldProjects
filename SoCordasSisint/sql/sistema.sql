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

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `clienteID` int(11) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `razaoSocial` varchar(255) default NULL,
  `cnpj` varchar(20) default NULL,
  `inscricaoEstadual` varchar(20) default NULL,
  `tel01` varchar(13) default NULL,
  `tel02` varchar(13) default NULL,
  `fax` varchar(13) default NULL,
  `celular` varchar(13) default NULL,
  `email` varchar(100) default NULL,
  `responsavel` varchar(200) default NULL,
  `rua` varchar(255) default NULL,
  `numero` int(10) default NULL,
  `bairro` varchar(255) default NULL,
  `complemento` varchar(255) default NULL,
  `municipio` varchar(255) default NULL,
  `UF` varchar(2) default NULL,
  `CEP` varchar(9) default NULL,
  PRIMARY KEY  (`clienteID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`clienteID`,`nome`,`razaoSocial`,`cnpj`,`inscricaoEstadual`,`tel01`,`tel02`,`fax`,`celular`,`email`,`responsavel`,`rua`,`numero`,`bairro`,`complemento`,`municipio`,`UF`,`CEP`) values (1,'So Cordas','Só Cordas Representacoes LTDA','000010101/00001-00','090902092','(22)2655-2575','(22)26655-897',NULL,NULL,'socordas@saquarema.com.br','Douglas Sthel Wardi','1',49,'porto da roca',NULL,'Saquarema','RJ','28990-000'),(2,'Victor caetano','212121','1212121212','-','(12)2121-2121','(99)9999-9999','(00)0000-0000','(88)8888-8888','vi@mail.com','Victor','13',1212,'jacone','-','bacaxa','RJ','29900-000'),(12,'XPTO','victor.ltda','111111111111','11111111','1111111','111111112','222222','2222222','222222','22222222','222222',NULL,NULL,NULL,NULL,NULL,NULL),(14,'Tabajara','Tabajara futebol clube',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Victor Caetano ','Victor Caetano PSW LTDA.','106.517.197-80','989.010.101','(22)3385-3987','(09)3409-8305','(34)3530-3450','(34)5035-3453','victor@saquabb.com.br','Victor Caetano','Theophilo Dávila',49,'Porto da Roça',NULL,'Saquarema','RJ','28900-000'),(16,'Matepesca','Matepesca LTDA','0000000000000000','0000000000000','(21)2222-2222','(21)2222-2222','(21)2222-2222','(21)2121-2121','mail@mail.com.br','Mauricio','-',10,'centro','Mercado São Pedro','Niterói','RJ','00000-000'),(17,'lala','lala latda','109.980.980-000','191.089.090','(22)2222-2222','(22)2222-2222','(22)2222-2222','(22)2222-2222','mail@mail.com.br','Thomás','x',0,'10','-','10','BA','55555-555');

/*Table structure for table `fabrica` */

DROP TABLE IF EXISTS `fabrica`;

CREATE TABLE `fabrica` (
  `fabricaID` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `razaoSocial` varchar(255) default NULL,
  `cnpj` varchar(50) default NULL,
  `inscricaoEstadual` varchar(50) default NULL,
  `tel1` varchar(50) default NULL,
  `tel2` varchar(50) default NULL,
  `fax` varchar(50) default NULL,
  `email` varchar(200) default NULL,
  `site` varchar(200) default NULL,
  `responsavel` varchar(255) default NULL,
  `rua` varchar(255) default NULL,
  `numero` int(10) default NULL,
  `bairro` varchar(255) default NULL,
  `complemento` varchar(255) default NULL,
  `municipio` varchar(255) default NULL,
  `UF` varchar(2) default NULL,
  `CEP` varchar(9) default NULL,
  PRIMARY KEY  (`fabricaID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `fabrica` */

insert  into `fabrica`(`fabricaID`,`nome`,`razaoSocial`,`cnpj`,`inscricaoEstadual`,`tel1`,`tel2`,`fax`,`email`,`site`,`responsavel`,`rua`,`numero`,`bairro`,`complemento`,`municipio`,`UF`,`CEP`) values (1,'Anzois Mendes',NULL,NULL,NULL,'22 2222 2222','22 2222 2222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Epoxiglass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'LM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Empresas Pessim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Varas Guarani',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Corda Fios',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'SK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Epoxiglass',NULL,NULL,NULL,'(11)2122-2222','(11)0909-0000','(21)2121-2312','epoxi@mail.com.br','www.epoxiglass.com.br','Wanderley',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Anzois Mendes','00000000','00000000/0000-00','oooooo','(22)9221-2123','(21)3123-1231','(11)2312-3123','aas@mail.xom','-','Wilson/Ana','X',10,'34','sa','123','BA','00000-000'),(10,'Corda Fios','Corda Fios LTDA.','00000000/0000-00','000000000','(00)0000-0000','(00)0000-0000','(00)0000-0000','vendas@cordafios.com.br','www.cordafios.com.br','Carlos / Alda','-',0,'-','-','-','BA','00000-000'),(11,'Varas Guarani','Varas Guarani SA.','00000000/0000-00','0000','(13)0000-0000','(00)0000-0000','(00)0000-0000','email@varas.com.br','-','Roberto','X',0,'X','-','-','SP','00000-000');

/*Table structure for table `itempedido` */

DROP TABLE IF EXISTS `itempedido`;

CREATE TABLE `itempedido` (
  `itemID` bigint(20) NOT NULL auto_increment,
  `pedidoID` bigint(20) default NULL,
  `produtoID` bigint(20) default NULL,
  `quantidade` float(10,2) default '0.00',
  `descontoReal` float(10,2) default '0.00',
  `descontoPorCento` float(10,2) default '0.00',
  `total` float(10,2) default '0.00',
  PRIMARY KEY  (`itemID`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

/*Data for the table `itempedido` */

insert  into `itempedido`(`itemID`,`pedidoID`,`produtoID`,`quantidade`,`descontoReal`,`descontoPorCento`,`total`) values (1,2,2,2.00,NULL,NULL,NULL),(2,0,NULL,NULL,NULL,NULL,NULL),(3,0,NULL,NULL,NULL,NULL,NULL),(4,NULL,1,1.00,1.00,1.00,NULL),(5,NULL,11,11.00,11.00,11.00,NULL),(6,NULL,2222,100000000.00,222222.00,2222.00,NULL),(7,16,1,10.00,NULL,NULL,NULL),(8,16,4,4.00,NULL,NULL,NULL),(9,16,3,NULL,NULL,NULL,NULL),(10,16,5,NULL,NULL,NULL,NULL),(11,16,9,NULL,NULL,NULL,NULL),(12,16,1,NULL,NULL,NULL,NULL),(13,16,2,NULL,NULL,NULL,NULL),(14,16,3,NULL,NULL,NULL,NULL),(15,16,4,NULL,NULL,NULL,NULL),(16,16,5,NULL,NULL,NULL,NULL),(17,16,1,1.00,NULL,NULL,NULL),(18,16,10,5.00,NULL,NULL,NULL),(19,16,98,56.00,NULL,NULL,NULL),(20,16,12,5.00,NULL,NULL,NULL),(21,16,1,10.00,5.00,0.00,50.00),(22,16,NULL,NULL,NULL,NULL,NULL),(23,16,2,32323.00,2323.00,23.00,222.00),(24,1,3,0.00,1.00,0.00,17.52),(25,1,NULL,NULL,NULL,NULL,NULL),(26,1,7,0.00,0.00,10.00,162.00),(27,1,6,0.00,0.00,90.00,8.45),(28,1,2,80.00,0.00,56.00,305.18),(29,1,5,0.00,0.00,0.00,0.00),(30,1,5,70.00,0.00,0.00,599.20),(31,1,5,7.00,0.00,0.00,59.92),(32,1,5,90.00,0.00,0.00,770.40),(33,1,5,70.00,0.00,0.00,599.20),(34,1,4,12.00,0.00,0.00,168.84),(35,1,4,8.00,0.00,0.00,112.56),(36,1,4,40.00,0.00,0.00,562.80),(37,1,3,10.00,0.00,0.00,97.60),(38,1,7,5.00,0.00,0.00,150.00),(39,1,3,40.00,0.00,0.00,390.40),(40,1,2,0.00,0.00,0.00,0.00),(41,1,7,40.00,0.00,0.00,1200.00),(42,1,3,5.00,0.00,0.00,48.80),(43,1,1,5.00,0.00,0.00,54.50),(44,0,3,6.00,0.00,0.00,58.56),(45,1,1,1.00,0.00,0.00,10.90),(46,0,7,2.00,0.00,0.00,60.00),(47,0,6,3.00,0.00,0.00,50.70),(48,0,2,80.00,0.00,0.00,693.60),(49,0,4,20.00,0.00,0.00,281.40),(50,0,6,5.00,0.00,0.00,84.50),(51,1,7,50.00,0.00,0.00,1500.00),(52,2,5,7.00,0.00,0.00,59.92),(53,0,3,0.00,0.00,0.00,0.00),(54,1,4,0.00,0.00,0.00,0.00),(55,1,3,0.00,0.00,0.00,0.00),(56,1,3,0.00,0.00,0.00,0.00),(57,1,3,0.00,0.00,0.00,0.00),(58,1,4,0.00,0.00,0.00,0.00),(59,1,7,0.00,0.00,0.00,0.00),(60,1,7,0.00,0.00,0.00,0.00),(61,1,3,0.00,0.00,0.00,0.00),(62,1,NULL,NULL,NULL,NULL,NULL),(63,1,NULL,NULL,NULL,NULL,NULL),(64,1,NULL,NULL,NULL,NULL,NULL),(65,1,7,0.00,0.00,0.00,0.00),(66,1,7,0.00,0.00,0.00,0.00),(67,1,7,0.00,0.00,0.00,0.00),(68,1,7,0.00,0.00,0.00,0.00),(69,1,7,0.00,0.00,0.00,0.00),(70,1,NULL,NULL,NULL,NULL,NULL),(71,1,4,4.00,0.00,0.00,56.28),(72,1,6,2.00,0.00,0.00,33.80),(73,16,5,40.00,0.00,0.00,342.40),(74,16,7,6.00,0.00,0.00,180.00),(75,16,6,30.00,0.00,0.00,507.00),(76,18,7,12.00,0.00,0.00,360.00),(77,18,5,24.00,0.00,0.00,205.44),(78,18,6,45.00,0.00,0.00,760.50),(79,22,3,0.00,0.00,0.00,0.00),(80,22,3,0.00,0.00,0.00,0.00),(81,22,3,0.00,0.00,0.00,0.00),(82,22,3,0.00,0.00,0.00,0.00),(83,22,3,0.00,0.00,0.00,0.00),(84,22,3,0.00,0.00,0.00,0.00),(85,22,3,0.00,0.00,0.00,0.00),(86,28,2,0.00,0.00,0.00,0.00),(87,28,2,0.00,0.00,0.00,0.00),(88,28,2,0.00,0.00,0.00,0.00),(89,28,2,0.00,0.00,0.00,0.00),(90,28,2,0.00,0.00,0.00,0.00),(91,28,2,0.00,0.00,0.00,0.00),(92,28,2,0.00,0.00,0.00,0.00),(93,28,2,0.00,0.00,0.00,0.00),(94,28,2,0.00,0.00,0.00,0.00),(95,28,2,0.00,0.00,0.00,0.00),(96,28,2,0.00,0.00,0.00,0.00),(97,29,2,7.00,0.00,0.00,60.69),(98,29,4,10.00,0.00,0.00,140.70),(99,29,2,70.00,0.00,0.00,606.90),(100,30,1,0.00,0.00,0.00,0.00),(101,30,3,0.00,0.00,0.00,0.00),(102,30,4,0.00,0.00,0.00,0.00),(103,30,1,0.00,0.00,0.00,0.00);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `pedidoID` bigint(20) NOT NULL auto_increment,
  `numeroPedido` bigint(20) default NULL,
  `clienteID` bigint(20) default NULL,
  `fabricaID` bigint(20) default NULL,
  `data` varchar(30) default NULL,
  PRIMARY KEY  (`pedidoID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `pedido` */

insert  into `pedido`(`pedidoID`,`numeroPedido`,`clienteID`,`fabricaID`,`data`) values (1,1,1,1,'10/10/2008'),(2,2,1,1,'12/10/09'),(3,1,2,2,NULL),(4,2,1,2,NULL),(5,3,1,2,NULL),(6,NULL,NULL,NULL,'20/11/2008'),(7,1,NULL,NULL,'20/11/2008'),(8,4,14,2,'20/11/2008'),(9,3,1,1,'20/11/2008'),(10,1,14,4,'20/11/2008'),(11,2,14,4,'20/11/2008'),(12,3,14,4,'20/11/2008'),(13,1,14,6,'20/11/2008'),(14,4,14,4,'20/11/2008'),(15,1,NULL,NULL,NULL),(16,4,14,1,'20/11/2008'),(17,2,14,6,'27/11/2008'),(18,5,1,1,'28/11/2008'),(19,5,14,2,'28/11/2008'),(20,6,1,1,'28/11/2008'),(21,5,14,4,'28/11/2008'),(22,7,14,1,'28/11/2008'),(23,6,1,4,'2/12/2008'),(24,8,1,1,'2/12/2008'),(25,9,1,1,'2/12/2008'),(26,7,14,4,'2/12/108'),(27,10,14,1,'2/12/108'),(28,11,14,1,'2/12/2008'),(29,12,1,1,'4/12/2008'),(30,13,15,1,'7/1/2009'),(31,14,15,1,'7/1/2009');

/*Table structure for table `produto` */

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `produtoID` bigint(20) NOT NULL auto_increment,
  `fabricaID` bigint(20) default NULL,
  `unidade` varchar(10) default NULL,
  `nome` varchar(255) default NULL,
  `preco` float(10,2) default '0.00',
  PRIMARY KEY  (`produtoID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `produto` */

insert  into `produto`(`produtoID`,`fabricaID`,`unidade`,`nome`,`preco`) values (1,1,'cnt','anzol1',10.90),(2,1,'cnt','anzol2',8.67),(3,1,'cnt','anzol3',9.76),(4,1,'und','bicheiro',14.07),(5,2,'cnj','resina e endurecedor 250g',8.56),(6,2,'cnj','resina e endurecedor 500g',16.90),(7,2,'cnj','resina e endurecedor 1000g',30.00),(8,9,'CX','Caixa de anzol',100.00),(9,9,'CNJ','anzol bicheiro',10.00);

/*Table structure for table `transportadora` */

DROP TABLE IF EXISTS `transportadora`;

CREATE TABLE `transportadora` (
  `transportadoraID` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `razaoSocial` varchar(255) default NULL,
  `cnpj` varchar(50) default NULL,
  `inscricaoEstadual` varchar(50) default NULL,
  `tel1` varchar(50) default NULL,
  `tel2` varchar(50) default NULL,
  `fax` varchar(50) default NULL,
  `email` varchar(200) default NULL,
  `site` varchar(200) default NULL,
  `responsavel` varchar(255) default NULL,
  `rua` varchar(255) default NULL,
  `numero` int(10) default NULL,
  `bairro` varchar(255) default NULL,
  `complemento` varchar(255) default NULL,
  `municipio` varchar(255) default NULL,
  `UF` varchar(2) default NULL,
  `CEP` varchar(9) default NULL,
  PRIMARY KEY  (`transportadoraID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `transportadora` */

insert  into `transportadora`(`transportadoraID`,`nome`,`razaoSocial`,`cnpj`,`inscricaoEstadual`,`tel1`,`tel2`,`fax`,`email`,`site`,`responsavel`,`rua`,`numero`,`bairro`,`complemento`,`municipio`,`UF`,`CEP`) values (2,'Epoxiglass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'LM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Empresas Pessim',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Varas Guarani',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Corda Fios',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'SK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Epoxiglass',NULL,NULL,NULL,'(11)2122-2222','(11)0909-0000','(21)2121-2312','epoxi@mail.com.br','www.epoxiglass.com.br','Wanderley',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'Anzois Mendes',NULL,NULL,NULL,'(22)9221-2123','(21)3123-1231','(11)2312-3123',NULL,NULL,'Wilson/Ana',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `uf` */

DROP TABLE IF EXISTS `uf`;

CREATE TABLE `uf` (
  `UF` varchar(2) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `uf` */

insert  into `uf`(`UF`) values ('RJ'),('ES'),('BA'),('SP'),('MG'),('RS'),('MA');

/*Table structure for table `un` */

DROP TABLE IF EXISTS `un`;

CREATE TABLE `un` (
  `UN` varchar(4) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `un` */

insert  into `un`(`UN`) values ('KG'),('PÇ'),('PÇ'),('CX'),('CNT'),('RL'),('CRT'),('CNJ'),('BB');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
