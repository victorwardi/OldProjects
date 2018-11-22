

/*Table structure for table `questoes` */

DROP TABLE IF EXISTS `questoes`;

CREATE TABLE `questoes` (
  `questaoID` bigint(20) NOT NULL auto_increment,
  `de` varchar(200) default NULL,
  `para` varchar(200) default NULL,
  `titulo` varchar(255) default NULL,
  `discussao` longtext,
  `status` varchar(200) default NULL,
  PRIMARY KEY  (`questaoID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;



/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(30) default NULL,
  `senha` varchar(30) default NULL,
  `level` bigint(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 ;

/*Data for the table `user` */

insert  into `user`(`id`,`nome`,`senha`,`level`) values (1,'victor','v1i2c3t4o5r6',NULL);
insert  into `user`(`id`,`nome`,`senha`,`level`) values (2,'igor','i1g2o3r4',NULL);


