/*Table structure for table `licitacao` */

DROP TABLE IF EXISTS `licitacao`;

CREATE TABLE `licitacao` (
  `licitacaoID` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) default NULL,
  `data` varchar(50) default NULL,
  `objeto` longtext,
  `pdf` varchar(255) default NULL,
  PRIMARY KEY  (`licitacaoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

