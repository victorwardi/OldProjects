
DROP TABLE IF EXISTS `contato`;

CREATE TABLE `contato` (
  `idContato` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `telefone` varchar(50) default NULL,
  `cidade` varchar(255) default NULL,
  `uf` varchar(2) default NULL,
  `pais` varchar(255) default NULL,
  `chegada` varchar(255) default NULL,
  `partida` varchar(255) default NULL,
  `tipoAcomodacao` varchar(255) default NULL,
  `qtdAdulto` varchar(20) default NULL,
  `qtdCrianca` varchar(20) default NULL,
  `infoAdicionais` longtext,
  `resposta` longtext,
  `status` varchar(50) default 'n',
  PRIMARY KEY  (`idContato`)
) ENGINE=MyISAM AUTO_INCREMENT=14;

/*Data for the table `contato` */

insert  into `contato`(`idContato`,`nome`,`email`,`telefone`,`cidade`,`uf`,`pais`,`chegada`,`partida`,`tipoAcomodacao`,`qtdAdulto`,`qtdCrianca`,`infoAdicionais`,`resposta`,`status`) values (10,'Victoe','victor@saquabb.com.br','(22)2222-2222','222','MS','Brasil','10/02/2009','02/02/2009','Chalé Vip','01','0','dasdas',NULL,'respondida'),(8,'eu eu','victor@saquabb.com.br','(22)2222-2222','salal','DF','brasil','11/02/2009','19/02/2009','csxcascs','20','0','vsdvdsvsd',NULL,'n'),(11,'james','saquabb@hotmail.com','(33)3333-3333','saquabb','MS','Brasil','03/02/2009','17/02/2009','Chalé Geminado c/ Lareiria','19','19','sda',NULL,'n'),(13,'victor caetano','saquabb@hotmail.com','(21)2222-2222','squab','GO','Brasil','01/02/2009','02/02/2009','Chalé Vip Lua-de-Mel','18','07','dasdasda',NULL,'respondida');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `usuario` varchar(50) default NULL,
  `senha` varchar(25) default NULL,
  `level` varchar(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

/*Data for the table `user` */

insert  into `user`(`id`,`nome`,`usuario`,`senha`,`level`) values (1,'1','1','1',NULL),(2,NULL,'jameswardi','jw2009',NULL);