/*Table structure for table `comissao` */

DROP TABLE IF EXISTS `comissao`;

CREATE TABLE `comissao` (
  `comissaoID` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `texto` tinytext,
  PRIMARY KEY  (`comissaoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `lei` */

DROP TABLE IF EXISTS `lei`;

CREATE TABLE `lei` (
  `leiID` bigint(20) NOT NULL auto_increment,
  `numero` varchar(50) default NULL,
  `descricao` tinytext,
  `lei` longtext,
  `data` varchar(150) default NULL,
  `imagem` varchar(255) default NULL,
  `pdf` varchar(255) default NULL,
  PRIMARY KEY  (`leiID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

/*Table structure for table `mesadiretora` */

DROP TABLE IF EXISTS `mesadiretora`;

CREATE TABLE `mesadiretora` (
  `MesaID` bigint(20) NOT NULL auto_increment,
  `presidente` varchar(255) default NULL,
  `fotoPresidente` varchar(255) default NULL,
  `vicePresidente` varchar(255) default NULL,
  `fotoVicePresidente` varchar(255) default NULL,
  `secretario1` varchar(255) default NULL,
  `fotoSecretario1` varchar(255) default NULL,
  `secretario2` varchar(255) default NULL,
  `fotoSecretario2` varchar(255) default NULL,
  PRIMARY KEY  (`MesaID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

