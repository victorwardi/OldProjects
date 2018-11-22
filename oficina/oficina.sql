/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.0.51a : Database - oficina
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `oficina`;

USE `oficina`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id` bigint(20) NOT NULL auto_increment,
  `dia` varchar(10) default NULL,
  `semana` varchar(10) default NULL,
  `mes` varchar(10) default NULL,
  `titulo` varchar(255) default NULL,
  `descricao` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

insert  into `agenda`(`id`,`dia`,`semana`,`mes`,`titulo`,`descricao`) values (1,'02','DOM','ABR','Fotos do Passeio Ecologico','jakjhas askjhda ajshaj ahhs js hsue jska ha');

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `id_foto` bigint(20) NOT NULL auto_increment,
  `id` bigint(20) default NULL,
  `descricao` varchar(50) collate latin1_general_ci default NULL,
  `arquivo` varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `fotos` */

insert  into `fotos`(`id_foto`,`id`,`descricao`,`arquivo`) values (30,10,NULL,'IMG_0945.jpg'),(31,10,NULL,'IMG_0981.jpg'),(32,10,NULL,'IMG_0918.jpg'),(33,10,NULL,'IMG_1017_1.jpg'),(34,10,NULL,'IMG_1013.jpg'),(35,10,NULL,'IMG_0979.jpg'),(36,10,NULL,'IMG_0962.jpg'),(37,10,NULL,'IMG_0977.jpg'),(38,10,NULL,'IMG_0986.jpg'),(39,10,NULL,'IMG_1008.jpg'),(40,10,NULL,'IMG_0961.jpg'),(41,10,NULL,'IMG_1011.jpg'),(42,10,NULL,'IMG_0975.jpg'),(43,10,NULL,'IMG_1028.jpg'),(44,10,NULL,'IMG_0994.jpg'),(45,NULL,NULL,'Copacabana (2)_1.jpg'),(46,NULL,NULL,'Copacabana (10).jpg'),(47,NULL,NULL,'Copacabana (47).jpg'),(48,NULL,NULL,'Copacabana (23).jpg'),(49,NULL,NULL,'Copacabana (52).jpg'),(50,NULL,NULL,'Copacabana (16).jpg');

/*Table structure for table `fotos_ex` */

DROP TABLE IF EXISTS `fotos_ex`;

CREATE TABLE `fotos_ex` (
  `id_foto` bigint(20) NOT NULL auto_increment,
  `id` bigint(20) default NULL,
  `descricao` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `arquivo` varchar(60) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `fotos_ex` */

insert  into `fotos_ex`(`id_foto`,`id`,`descricao`,`arquivo`) values (30,10,NULL,'IMG_0945.jpg'),(31,10,NULL,'IMG_0981.jpg'),(32,10,NULL,'IMG_0918.jpg'),(33,10,NULL,'IMG_1017_1.jpg'),(34,10,NULL,'IMG_1013.jpg'),(35,10,NULL,'IMG_0979.jpg'),(36,10,NULL,'IMG_0962.jpg'),(37,10,NULL,'IMG_0977.jpg'),(38,10,NULL,'IMG_0986.jpg'),(39,10,NULL,'IMG_1008.jpg'),(40,10,NULL,'IMG_0961.jpg'),(41,10,NULL,'IMG_1011.jpg'),(42,10,NULL,'IMG_0975.jpg'),(43,10,NULL,'IMG_1028.jpg'),(44,10,NULL,'IMG_0994.jpg'),(45,13,NULL,'Copacabana.jpg'),(46,13,NULL,'Copacabana (1).jpg'),(47,13,NULL,'Copacabana (2).jpg'),(48,13,NULL,'Copacabana (3).jpg'),(49,13,'dede fake 360 air','amor.jpg');

/*Table structure for table `galeria_ex` */

DROP TABLE IF EXISTS `galeria_ex`;

CREATE TABLE `galeria_ex` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `data` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `descricao` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `imagem` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `turma` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `galeria_ex` */

insert  into `galeria_ex`(`id`,`titulo`,`data`,`descricao`,`imagem`,`turma`) values (11,'Fotos do Passeio Ecologico','12/09/08','muitas fotos dos alunos','ur.jpg','101'),(12,'Fotos do Passeio Turistico','12/09/08',NULL,'desktop.jpg','301'),(13,'Festa americana',NULL,NULL,'re1.jpg','301');

/*Table structure for table `galerias` */

DROP TABLE IF EXISTS `galerias`;

CREATE TABLE `galerias` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `data` varchar(10) character set latin1 collate latin1_general_ci default NULL,
  `descricao` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `imagem` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `pagina` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `galerias` */

insert  into `galerias`(`id`,`titulo`,`data`,`descricao`,`imagem`,`pagina`) values (7,'Em breve - Aguarde','10.11.07',NULL,'IMG_0931.jpg',NULL),(6,'Saqua Axé 2007',NULL,'Confira as Fotos','IMG_1017.jpg',NULL),(8,'Em breve - Aguarde','10.11.07',NULL,'3D9Ufl5w.jpg',NULL),(9,'Em breve - Aguarde','10.11.07',NULL,'je.jpg',NULL),(10,'Teste de sistema adminstrativo','14/02/09','dsasdasdas','Imagem_009.jpg',NULL),(11,'Fotos do Passeio Ecologico','12/09/08','muitas fotos dos alunos','ur.jpg','101'),(12,'Fotos do Passeio Turistico','12/09/08',NULL,'desktop.jpg','301'),(13,'Festa americana',NULL,NULL,'re1.jpg','301');

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(200) default NULL,
  `resumo` varchar(255) default NULL,
  `materia` longtext,
  `data` varchar(20) default NULL,
  `fonte` varchar(100) default NULL,
  `imagem` varchar(255) default NULL,
  `pagina` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `noticias` */

insert  into `noticias`(`id`,`titulo`,`resumo`,`materia`,`data`,`fonte`,`imagem`,`pagina`) values (2,'Teste de sistema adminstrativo','Este é o resumo da noticiad','asdadada das as da diooashda ;asdl aa,djasd i adsi \r\ndkjadk hkh d','14/02/09','divulgaçao','folder_1.jpg','lalala'),(3,'Teste de sistema adminstrativo',NULL,'1-  Como moramos em Niterói, e temos picos realmente bons para a prática do body boarding, aqui o que posso dizer é que vivemos intensamente o esporte, pois além de ter altas ondas aqui também temos excelentes bodyboarders, Itacoatiara sempre rola altas todo ano e temos o Shock, Ilha da mãe , sossego, enfim várias ondas e todas bem ocas ideal para evoluir e estender os limites, considero Niterói a capital do Bodyboarding pois tem uma grande história do esporte na cidade, o primeiro campeonato realizado no Brasil foi aqui, vários atletas que se destacaram no cenário brasileiro e internacional lapidaram seu estilo e evoluíram em Itacoatiara.','14/02/09','divulgaçao',NULL,NULL),(4,'Teste de sistema adminstrativo',NULL,'1-  Como moramos em Niterói, e temos picos realmente bons para a prática do body boarding, aqui o que posso dizer é que vivemos intensamente o esporte, pois além de ter altas ondas aqui também temos excelentes bodyboarders, Itacoatiara sempre rola altas todo ano e temos o Shock, Ilha da mãe , sossego, enfim várias ondas e todas bem ocas ideal para evoluir e estender os limites, considero Niterói a capital do Bodyboarding pois tem uma grande história do esporte na cidade, o primeiro campeonato realizado no Brasil foi aqui, vários atletas que se destacaram no cenário brasileiro e internacional lapidaram seu estilo e evoluíram em Itacoatiara.','10/04/08','vc',NULL,NULL),(5,'Teste de sistema adm',NULL,'1- Como moramos em Niter&oacute;i, e temos picos realmente bons para a pr&aacute;tica do body boarding, aqui o que posso dizer &eacute; que vivemos intensamente o esporte, pois al&eacute;m de ter altas ondas aqui tamb&eacute;m temos excelentes bodyboarders, Itacoatiara sempre rola altas todo ano e temos o Shock, Ilha da m&atilde;e , sossego, enfim v&aacute;rias ondas e todas bem ocas ideal para evoluir e estender os limites, considero Niter&oacute;i a capital do Bodyboarding pois tem uma grande hist&oacute;ria do esporte na cidade, o primeiro campeonato realizado no Brasil foi aqui, v&aacute;rios atletas que se destacaram no cen&aacute;rio brasileiro e internacional lapidaram seu estilo e evolu&iacute;ram em Itacoatiara.','10/04/08','vc','agua.jpg',NULL),(7,'lala',NULL,'dasdasd','14/02/09',NULL,'abada_1.jpg',NULL),(8,'Programação do Evento',NULL,'czcxzczxcz','14/02/09','czxczx','flyer_1.jpg',NULL);

/*Table structure for table `pagina` */

DROP TABLE IF EXISTS `pagina`;

CREATE TABLE `pagina` (
  `id` bigint(20) NOT NULL auto_increment,
  `pagina` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pagina` */

insert  into `pagina`(`id`,`pagina`) values (1,'index'),(2,'AconteceNaOficina');

/*Table structure for table `turma` */

DROP TABLE IF EXISTS `turma`;

CREATE TABLE `turma` (
  `id_turma` bigint(20) NOT NULL auto_increment,
  `turma` varchar(100) character set latin1 collate latin1_general_ci default NULL,
  `sala` varchar(40) character set latin1 collate latin1_general_ci default NULL,
  `professor` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `turno` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_turma`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `turma` */

insert  into `turma`(`id_turma`,`turma`,`sala`,`professor`,`turno`) values (1,'101','11','Alfredo Gustavo','manhã'),(2,'201','22','Cristina Rocha','tarde'),(3,'301','33','Marcos Rocha','noite'),(4,'102',NULL,'Clara Almeida',NULL),(5,'31',NULL,'Célia Almeida',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `usuario` varchar(50) default NULL,
  `senha` varchar(25) default NULL,
  `level` varchar(2) default NULL,
  `email` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nome`,`usuario`,`senha`,`level`,`email`) values (1,'victor','victor','123','1','victor@saquabb.com.br'),(2,'rafael','rafael','rafabada',NULL,NULL);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL auto_increment,
  `nome` varchar(200) collate latin1_general_ci default NULL,
  `email` varchar(200) collate latin1_general_ci default NULL,
  `senha` varchar(100) collate latin1_general_ci default NULL,
  `turma` varchar(50) collate latin1_general_ci default NULL,
  `serie` varchar(50) collate latin1_general_ci default NULL,
  `foto` varchar(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nome`,`email`,`senha`,`turma`,`serie`,`foto`) values (1,'Victor Caetano','victor@saquabb.com.br','12345','301','1','victor.jpg'),(2,'Ursula Paes','ursula@saquabb.com.br','12345','201','2','ursula.jpg'),(3,'Carlos','carlos@saquabb.com.br','12345','301','3',NULL),(4,'Rodrigo Alfredo','rodrigo@saquabb.com.br','12345','101',NULL,'victor.jpg'),(5,'Renata Correa','renata@mail.com','12345','101',NULL,'renata.jpg'),(6,'Caetana P. S Wardi','caetana@mail.com','123','101',NULL,'ursula e juju_1.jpg'),(7,'Joelma santos','js@mail.com','123','102',NULL,'ursula e juju.jpg'),(8,'Jr almeida','jr@mail.com','123','201',NULL,'Montanhas azuis.jpg');

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id_video` bigint(20) NOT NULL auto_increment,
  `id` bigint(20) default NULL,
  `descricao_video` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `video` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `capa` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_video`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `videos` */

insert  into `videos`(`id_video`,`id`,`descricao_video`,`video`,`capa`) values (50,13,NULL,'16M.wmv','Copacabana (46).jpg'),(48,0,NULL,'Sem T_tulo.wmv',''),(47,13,NULL,'safadeza.wmv',''),(45,13,NULL,'claudia.avi','claudia.jpg'),(46,13,'Claudia Leitte','Filme.wmv','claudia_1.jpg');

/*Table structure for table `videos_ex` */

DROP TABLE IF EXISTS `videos_ex`;

CREATE TABLE `videos_ex` (
  `id_video` bigint(20) NOT NULL auto_increment,
  `id` bigint(20) default NULL,
  `descricao_video` varchar(50) character set latin1 collate latin1_general_ci default NULL,
  `video` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  `capa` varchar(255) character set latin1 collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_video`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `videos_ex` */

insert  into `videos_ex`(`id_video`,`id`,`descricao_video`,`video`,`capa`) values (30,10,NULL,'IMG_0945.jpg',NULL),(31,10,NULL,'IMG_0981.jpg',NULL),(32,10,NULL,'IMG_0918.jpg',NULL),(33,10,NULL,'IMG_1017_1.jpg',NULL),(51,12,NULL,'16M_1.wmv','ursula e juju_2.jpg'),(50,13,NULL,'16M.wmv',''),(48,0,NULL,'Sem T_tulo.wmv',''),(47,13,NULL,'safadeza.wmv',''),(45,13,NULL,'claudia.avi','claudia.jpg'),(46,13,'Claudia Leitte','Filme.wmv','claudia_1.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
