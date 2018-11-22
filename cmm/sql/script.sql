/* 
Script SQL - Site: Camara Municipal de Managartiba
Autor: Victor Caetano
*/

/*Table structure for table `acontecenacamara` */

DROP TABLE IF EXISTS `acontecenacamara`;

CREATE TABLE `acontecenacamara` (
  `fotoID` bigint(20) NOT NULL auto_increment,
  `descricao` varchar(255) default NULL,
  `arquivo` varchar(255) default NULL,
  PRIMARY KEY  (`fotoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `fotoID` bigint(20) NOT NULL auto_increment,
  `galeriaID` bigint(20) default NULL,
  `descricao` varchar(255) default NULL,
  `arquivo` varchar(255) default NULL,
  PRIMARY KEY  (`fotoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `fotosvereadores` */

DROP TABLE IF EXISTS `fotosvereadores`;

CREATE TABLE `fotosvereadores` (
  `fotoID` bigint(20) NOT NULL auto_increment,
  `vereadorID` bigint(20) default NULL,
  `descricao` varchar(255) default NULL,
  `imagem` varchar(255) default NULL,
  PRIMARY KEY  (`fotoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `galerias` */

DROP TABLE IF EXISTS `galerias`;

CREATE TABLE `galerias` (
  `galeriaID` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `data` varchar(10) default NULL,
  `descricao` varchar(255) default NULL,
  `imagem` varchar(255) default NULL,
  PRIMARY KEY  (`galeriaID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `inscricao` */

DROP TABLE IF EXISTS `inscricao`;

CREATE TABLE `inscricao` (
  `inscricaoID` bigint(20) NOT NULL auto_increment,
  `numero` varchar(50) default NULL,
  `descricao` tinytext,
  `justificativa` longtext,
  `dataIndicacao` varchar(50) default NULL,
  `data` varchar(50) default NULL,
  `autor` varchar(255) default NULL,
  PRIMARY KEY  (`inscricaoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `lei` */

DROP TABLE IF EXISTS `lei`;

CREATE TABLE `lei` (
  `leiID` bigint(20) NOT NULL auto_increment,
  `numero` varchar(50) default NULL,
  `descricao` tinytext,
  `lei` longtext,
  `data` varchar(150) default NULL,
  PRIMARY KEY  (`leiID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `novidades` */

DROP TABLE IF EXISTS `novidades`;

CREATE TABLE `novidades` (
  `noticiaID` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(200) default NULL,
  `resumo` varchar(255) default NULL,
  `materia` longtext,
  `data` varchar(20) default NULL,
  `foto1` varchar(255) default NULL,
  `foto2` varchar(255) default NULL,
  PRIMARY KEY  (`noticiaID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `novidadesvereadores` */

DROP TABLE IF EXISTS `novidadesvereadores`;

CREATE TABLE `novidadesvereadores` (
  `novidadeId` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `materia` longtext,
  `data` varchar(20) default NULL,
  `vereadorID` varchar(20) default NULL,
  `imagem` varchar(255) default NULL,
  PRIMARY KEY  (`novidadeId`)
) ENGINE=MyISAM AUTO_INCREMENT=1;


/*Table structure for table `vereadores` */

DROP TABLE IF EXISTS `vereadores`;

CREATE TABLE `vereadores` (
  `vereadorID` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `apelido` varchar(255) default NULL,
  `partido` varchar(200) default NULL,
  `aniversario` varchar(50) default NULL,
  `participacaoNaCamara` text,
  `homenageados` text,
  `telefoneGabinete` varchar(50) default NULL,
  `telefone` varbinary(50) default NULL,
  `site` varchar(200) default NULL,
  `email` varchar(200) default NULL,
  `foto` varchar(255) default NULL,
  `login` varchar(200) default NULL,
  `senha` varchar(100) default NULL,
  PRIMARY KEY  (`vereadorID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

