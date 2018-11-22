
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
