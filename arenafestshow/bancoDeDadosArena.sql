/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.0.51a : Database - arena
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `arena`;

USE `arena`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `depoimentos` */

DROP TABLE IF EXISTS `depoimentos`;

CREATE TABLE `depoimentos` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(100) default NULL,
  `cidade` varchar(100) default NULL,
  `depoimento` longtext,
  `aprovado` varchar(20) default 'nao',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `depoimentos` */

insert  into `depoimentos`(`id`,`nome`,`cidade`,`depoimento`,`aprovado`) values (6,'Rodrigo','Rio','O técnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comissão técnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta está se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim'),(3,'Victor','Saquarema','O saquabloco com certeza é o melhor bloco de Saquarema, dancei, pulei, zuei muito no carnaval, recomendo a todos!\r\n','sim'),(4,'AStolfo','vila','vcvcvcvcv cvc vc vcv  c vcvcvcvc vcvcvc vcvc','sim'),(7,'Alfredo','Araruama','O técnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comissão técnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta está se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim'),(8,'Geralda','RB','O técnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comissão técnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta está se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim'),(9,'Joelma','bacaxa','O técnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comissão técnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta está se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim'),(10,'Nit','eroi','O técnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comissão técnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta está se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim'),(11,'asdasd','dasdas','O t&eacute;cnico Joel Santana revelou o apelido do lateral-esquerdo Juan entre os membros da comiss&atilde;o t&eacute;cnica do Flamengo. De forma carinhosa, o treinador afirmou que o atleta est&aacute; se especializando em cobrar faltas e que sabia que poderia acontecer um gol a qualquer momento (assista aos melhores momentos ao lado','sim');

/*Table structure for table `evento` */

DROP TABLE IF EXISTS `evento`;

CREATE TABLE `evento` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(100) collate latin1_general_ci default NULL,
  `descricao` longtext collate latin1_general_ci,
  `data` varchar(20) collate latin1_general_ci default NULL,
  `horario` varchar(20) collate latin1_general_ci default NULL,
  `local` varchar(100) collate latin1_general_ci default NULL,
  `endereco` varchar(100) collate latin1_general_ci default NULL,
  `atracoes` tinytext collate latin1_general_ci,
  `postosvendas` tinytext collate latin1_general_ci,
  `precos` varchar(200) collate latin1_general_ci default NULL,
  `informacao` varchar(200) collate latin1_general_ci default NULL,
  `banner` varchar(100) collate latin1_general_ci default NULL,
  `capa` varbinary(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `evento` */

insert  into `evento`(`id`,`titulo`,`descricao`,`data`,`horario`,`local`,`endereco`,`atracoes`,`postosvendas`,`precos`,`informacao`,`banner`,`capa`) values (4,'Lançamento DVD EVA','<font size=\"2\"><font face=\"Arial\"><font color=\"#666666\">E a terceira edi&ccedil;&atilde;o do Niter&oacute;i Folia foi um sucesso! Com Timbaladas e Babado Novo no s&aacute;bado e Asa de &Aacute;guia e Jammil e Uma Noites no domingo, Niter&oacute;i parou para o Niter&oacute;i Folia 2006 passar.<br /><br /></font><font color=\"#ffffff\">...</font></font></font><font size=\"2\"><font face=\"Arial, Helvetica, sans-serif\" color=\"#666666\">O primeiro dia de folia foi embalado pelo ritmo inconfund&iacute;vel da Timbalada e o carisma sem igual da l&iacute;der do Babado Novo, Claudia Leitte, que presenteou os foli&otilde;es com muito ax&eacute;. <br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" color=\"#ffffff\">...</font></font><font size=\"2\"><font face=\"Arial, Helvetica, sans-serif\" color=\"#666666\">No segundo dia, a chuva amea&ccedil;ou cair, mas logo entrou em cena o Rei da Rua, Durval L&eacute;lis, com o Asa de &Aacute;guia, seguido do ritmo fren&eacute;tico do Jammil e Uma Noites, que fizeram ferver o &uacute;ltimo dia do Niter&oacute;i Folia empolgando o p&uacute;blico que lotou a Praia de Piratininga.<br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" color=\"#ffffff\">...</font><font face=\"Arial, Helvetica, sans-serif\" color=\"#666666\">Agora, quem ficou com gostinho de quero mais, s&oacute; em 2007! A folia retorna a Niter&oacute;i na &uacute;nica micareta do Brasil na beira da praia, com quatro principais bandas de Ax&eacute;, em trios-el&eacute;tricos em movimento, uma super-estrutura de bares, banheiros, camarotes, pra&ccedil;a de alimenta&ccedil;&atilde;o, seguran&ccedil;a e muito mais... at&eacute; l&aacute;!</font></font>','15.11.07','15:00 horas','Arena Fest','Av. Saquarema 1000','<font size=\"2\"><font size=\"1\"><p>ABERTURA BANDA &Eacute; DO BABADO</p><p>BANDAMEL ao VIVO * direto da BAHIA *</p><p>DJ RONALDO * BACK TO BAHIA *</p><p>JULINHO DJ * REBOLA *</p><p>DAVID BRASIL * FM O DIA *</p><p>DJ DANADO * DAS MICARETAS *</p></font></font','<font size=\"1\"><p>BACAX&Aacute;: &Oacute;TICA VER&Atilde;O E &Oacute;TICA BRASIL</p><p>SAQUAREMA: VILA BEACH SURF</p><p>PRAIA DA VILA : SAQUASUCO</p><p>ARARUAMA: ARRAST&Atilde;O DAS SAND&Aacute;LIAS</p><font size=\"1\"><p>RIO BONITO : CICLE STAR</p><p>ICARA','2º lote - R$25,00','(22) 9997-7190','evento_2.jpg','eva.jpg'),(7,'Cabo Folia 2008',NULL,'23.11.07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'evento.jpg','cabo-folia.jpg'),(8,'Babado Elétrico',NULL,'12.11.07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'evento_3.jpg','babado.jpg'),(9,'Carnatal',NULL,'11.11.07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','carnatal.jpg');

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `id_foto` bigint(20) NOT NULL auto_increment,
  `id` bigint(20) default NULL,
  `descricao` varchar(50) collate latin1_general_ci default NULL,
  `arquivo` varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `fotos` */

insert  into `fotos`(`id_foto`,`id`,`descricao`,`arquivo`) values (1,2,'caioooo','foto3.jpg'),(2,2,'vamoavmaos','foto2.jpg'),(3,2,'Altas ondas','foto1.jpg'),(4,6,'vamoavmaos','news_cenoura_bronze.jpg'),(5,6,'Confira as Fotos','Aurora.jpg'),(6,6,NULL,'100_5436.JPG'),(7,6,NULL,'100_5404.JPG'),(8,6,NULL,'100_5423.JPG'),(9,6,NULL,'100_5435.JPG'),(10,6,NULL,'100_5482.JPG'),(11,6,NULL,'100_5478.JPG'),(12,6,NULL,'100_5461.JPG'),(13,6,NULL,'100_5473.JPG'),(14,6,NULL,'100_5481.JPG'),(15,6,NULL,'100_5476.JPG'),(16,NULL,NULL,'02.jpg'),(17,NULL,NULL,'03.jpg'),(18,NULL,NULL,'04.jpg'),(19,NULL,NULL,'05.jpg'),(20,NULL,NULL,'08.jpg'),(21,NULL,NULL,'09.jpg'),(22,NULL,NULL,'10.jpg'),(23,NULL,NULL,'11.jpg'),(24,NULL,NULL,'14.jpg'),(25,NULL,NULL,'15.jpg'),(26,NULL,NULL,'16.jpg'),(27,NULL,NULL,'17.jpg'),(28,6,NULL,'20.jpg'),(29,6,NULL,'21.jpg');

/*Table structure for table `galerias` */

DROP TABLE IF EXISTS `galerias`;

CREATE TABLE `galerias` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(50) collate latin1_general_ci default NULL,
  `data` varchar(10) collate latin1_general_ci default NULL,
  `descricao` varchar(100) collate latin1_general_ci default NULL,
  `imagem` varchar(100) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `galerias` */

insert  into `galerias`(`id`,`titulo`,`data`,`descricao`,`imagem`) values (7,'Em breve - Aguarde','10.11.07',NULL,'aguarde_3.jpg'),(6,'Saqua Axé 2007',NULL,'Confira as Fotos','capa_2.jpg'),(8,'Em breve - Aguarde','10.11.07',NULL,'aguarde_4.jpg'),(9,'Em breve - Aguarde','10.11.07',NULL,'aguarde_5.jpg');

/*Table structure for table `novidades` */

DROP TABLE IF EXISTS `novidades`;

CREATE TABLE `novidades` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(200) default NULL,
  `resumo` varchar(100) default NULL,
  `materia` longtext,
  `data` varchar(20) default NULL,
  `fonte` varchar(30) default NULL,
  `imagem` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `novidades` */

insert  into `novidades`(`id`,`titulo`,`resumo`,`materia`,`data`,`fonte`,`imagem`) values (3,'Em breve - Aguarde',NULL,'Em breve - Aguarde','10.11.07',NULL,'aguarde_2.jpg'),(4,'Em breve - Aguarde',NULL,'<p>Em breve - Aguarde</p>','10.11.07',NULL,'aguarde_1.jpg'),(5,'Em breve - Aguarde',NULL,'<p>Em Breve!</p>','10.11.07',NULL,'aguarde.jpg'),(6,'Saqua Axé 2007',NULL,'<strong><font size=\"4\"><p>ATEN&Ccedil;&Atilde;O MICARETEIROS!!!!</p></font></strong><p><strong><font size=\"2\" color=\"#ff0000\">A melhor micareta de Saquarema</font></strong></p><strong><em><font size=\"2\" color=\"#0000ff\"><p>15 de Novembro - FERIAD&Atilde;O NACIONAL as 15:Hs</p></font></em></strong><font size=\"2\"><strong><p>LOCAL: ARENA FEST * ANTIGA GARAGEM DA 1001 em SAQUAREMA - RJ *</p></strong><strong><p>ABERTURA DOS PORT&Otilde;ES: 15 HORAS</p></strong></font><strong><u><font size=\"4\" color=\"#ff0000\"><p>ATRA&Ccedil;&Otilde;ES:</p></font></u></strong><font size=\"1\"><p>ABERTURA BANDA &Eacute; DO BABADO</p><p>BANDAMEL ao VIVO * direto da BAHIA *</p><p>DJ RONALDO * BACK TO BAHIA *</p><p>JULINHO DJ * REBOLA *</p><p>DAVID BRASIL * FM O DIA *</p><p>DJ DANADO * DAS MICARETAS *</p><p>TRIO REBOLA BAHIA</p></font><strong><u><font size=\"5\" color=\"#0000ff\"><p>SUPER ABAD&Aacute;!!!</p></font></u></strong><font size=\"2\"><p>GARANTA J&Aacute; O SEU...</p><u><p><strong>PONTOS DE VENDA :</strong></p></u></font><font size=\"1\"><p>BACAX&Aacute;: &Oacute;TICA VER&Atilde;O E &Oacute;TICA BRASIL</p><p>SAQUAREMA: VILA BEACH SURF</p><p>PRAIA DA VILA : SAQUASUCO</p><p>ARARUAMA: ARRAST&Atilde;O DAS SAND&Aacute;LIAS</p><p>RIO BONITO : CICLE STAR</p><p>ICARAI &ndash; NITEROI : MATINATA</p></font><u><font size=\"2\" color=\"#ff0000\"><p><strong>1&ordm; LOTE ESGOTADO !!!GARANTA J&Aacute; O SEU... LIMITADO</strong></p></font></u><font size=\"2\"><p><strong>Mais informa&ccedil;&otilde;es: TEL : (22) 9997-7190</strong></p></font>','11.11.07',NULL,'no3.jpg'),(8,'Arena Fest ',NULL,'<p>Saquarema agora conta com uma super &aacute;rea de eventos, onde oferecer&aacute; muito conforto e seguran&ccedil;a para seus usu&aacute;rios.</p><p>A Arena Fest est&aacute; localizada na Avenida Saquarema no Porto da Ro&ccedil;a perto do Pedacinho C&eacute;u.<br /><br />Localizada&nbsp;no cora&ccedil;&atilde;o de Saquarema, facilitando o acesso para todos.</p>','10.11.07',NULL,'nov1.jpg'),(2,'Em breve - Aguarde',NULL,NULL,'10.11.07',NULL,'aguarde_2.jpg'),(9,'Primeiro Lote Esgotado',NULL,'<p>Primeiro Lote do Saqua Ax&eacute; est&aacute; esgotado!</p><p>Garanta logo o seu abad&aacute; antes que o segundo lote tamb&eacute;m acabe!<br />&nbsp;</p><p>Corra at&eacute; os pontos de venda e n&atilde;o fique de fora dessa super micareta!<br /><br /><br /><strong><u><font size=\"2\">PONTOS DE VENDA :</font></u></strong></p><strong><font size=\"1\"><p>BACAX&Aacute;: &Oacute;TICA VER&Atilde;O E &Oacute;TICA BRASIL</p><strong><p>SAQUAREMA: VILA BEACH SURF</p></strong><strong><p>PRAIA DA VILA : SAQUASUCO</p></strong><strong><p>ARARUAMA: ARRAST&Atilde;O DAS SAND&Aacute;LIAS</p></strong><strong><p>RIO BONITO : CICLE STAR</p></strong><strong><p>ICARAI &ndash; NITEROI : MATINATA</p></strong></font></strong>','12.11.07',NULL,'garanta.jpg');

/*Table structure for table `poller` */

DROP TABLE IF EXISTS `poller`;

CREATE TABLE `poller` (
  `ID` int(11) NOT NULL auto_increment,
  `pollerTitle` varchar(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `poller` */

insert  into `poller`(`ID`,`pollerTitle`) values (1,'O Que você está achando do site do Itaguaí Shopping Center?');

/*Table structure for table `poller_option` */

DROP TABLE IF EXISTS `poller_option`;

CREATE TABLE `poller_option` (
  `ID` int(11) NOT NULL auto_increment,
  `pollerID` int(11) default '1',
  `optionText` varchar(255) collate latin1_general_ci default NULL,
  `pollerOrder` int(11) default NULL,
  `defaultChecked` char(1) collate latin1_general_ci default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=571 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `poller_option` */

insert  into `poller_option`(`ID`,`pollerID`,`optionText`,`pollerOrder`,`defaultChecked`) values (569,1,'Regular',3,'0'),(570,1,'Ruim',4,'0'),(568,1,'Bom',2,'0'),(567,1,'Excelente',1,'1');

/*Table structure for table `poller_vote` */

DROP TABLE IF EXISTS `poller_vote`;

CREATE TABLE `poller_vote` (
  `ID` int(11) NOT NULL auto_increment,
  `optionID` int(11) default NULL,
  `ipAddress` varchar(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `poller_vote` */

insert  into `poller_vote`(`ID`,`optionID`,`ipAddress`) values (1,2,'127.0.0.1'),(2,1,'127.0.0.1'),(3,1,'127.0.0.1'),(4,1,'127.0.0.1'),(5,2,'127.0.0.1'),(6,1,'127.0.0.1'),(7,1,'127.0.0.1'),(8,1,'127.0.0.1'),(9,1,'127.0.0.1'),(10,4,'127.0.0.1'),(11,1,'127.0.0.1'),(12,1,'127.0.0.1'),(13,1,'127.0.0.1'),(14,1,'127.0.0.1'),(15,1,'127.0.0.1'),(16,1,'127.0.0.1'),(17,4,'127.0.0.1'),(18,4,'127.0.0.1'),(19,1,'127.0.0.1'),(20,2,'127.0.0.1'),(21,1,'127.0.0.1'),(22,2,'127.0.0.1'),(23,4,'127.0.0.1'),(24,4,'127.0.0.1'),(25,2,'127.0.0.1'),(26,1,'127.0.0.1'),(27,2,'127.0.0.1'),(28,2,'127.0.0.1'),(29,1,'127.0.0.1'),(30,1,'127.0.0.1'),(31,1,'127.0.0.1'),(32,1,'127.0.0.1'),(33,5,'127.0.0.1'),(34,1,'127.0.0.1'),(35,3,'127.0.0.1'),(36,3,'127.0.0.1'),(37,1,'127.0.0.1'),(38,2,'127.0.0.1'),(39,1,'127.0.0.1'),(40,1,'127.0.0.1'),(41,1,'127.0.0.1'),(42,5,'127.0.0.1'),(43,1,'127.0.0.1'),(44,10,'127.0.0.1'),(45,10,'127.0.0.1'),(46,10,'127.0.0.1'),(47,45,'127.0.0.1'),(48,12,'127.0.0.1'),(49,45,'127.0.0.1'),(50,45,'127.0.0.1'),(51,570,'127.0.0.1'),(52,567,'127.0.0.1'),(53,568,'127.0.0.1'),(54,569,'127.0.0.1'),(55,567,'127.0.0.1');

/*Table structure for table `promo` */

DROP TABLE IF EXISTS `promo`;

CREATE TABLE `promo` (
  `id` bigint(20) NOT NULL auto_increment,
  `titulo` varchar(200) character set latin1 default NULL,
  `materia` longtext character set latin1,
  `data` varchar(50) character set latin1 default NULL,
  `ganhadores` varchar(300) character set latin1 default NULL,
  `imagem` varchar(30) character set latin1 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `promo` */

insert  into `promo`(`id`,`titulo`,`materia`,`data`,`ganhadores`,`imagem`) values (3,'Em breve - Aguarde','Em breve - Aguarde','10.11.07',NULL,'aguarde_2.jpg'),(4,'Em breve - Aguarde','<p>Em breve - Aguarde</p>','10.11.07',NULL,'aguarde_1.jpg'),(5,'Em breve - Aguarde','<p>Em Breve!</p>','10.11.07',NULL,'aguarde.jpg'),(6,'Saqua Axé 2007','<strong><font size=\"4\"><p>ATEN&Ccedil;&Atilde;O MICARETEIROS!!!!</p></font></strong><p><strong><font size=\"2\" color=\"#ff0000\">A melhor micareta de Saquarema</font></strong></p><strong><em><font size=\"2\" color=\"#0000ff\"><p>15 de Novembro - FERIAD&Atilde;O NACIONAL as 15:Hs</p></font></em></strong><font size=\"2\"><strong><p>LOCAL: ARENA FEST * ANTIGA GARAGEM DA 1001 em SAQUAREMA - RJ *</p></strong><strong><p>ABERTURA DOS PORT&Otilde;ES: 15 HORAS</p></strong></font><strong><u><font size=\"4\" color=\"#ff0000\"><p>ATRA&Ccedil;&Otilde;ES:</p></font></u></strong><font size=\"1\"><p>ABERTURA BANDA &Eacute; DO BABADO</p><p>BANDAMEL ao VIVO * direto da BAHIA *</p><p>DJ RONALDO * BACK TO BAHIA *</p><p>JULINHO DJ * REBOLA *</p><p>DAVID BRASIL * FM O DIA *</p><p>DJ DANADO * DAS MICARETAS *</p><p>TRIO REBOLA BAHIA</p></font><strong><u><font size=\"5\" color=\"#0000ff\"><p>SUPER ABAD&Aacute;!!!</p></font></u></strong><font size=\"2\"><p>GARANTA J&Aacute; O SEU...</p><u><p><strong>PONTOS DE VENDA :</strong></p></u></font><font size=\"1\"><p>BACAX&Aacute;: &Oacute;TICA VER&Atilde;O E &Oacute;TICA BRASIL</p><p>SAQUAREMA: VILA BEACH SURF</p><p>PRAIA DA VILA : SAQUASUCO</p><p>ARARUAMA: ARRAST&Atilde;O DAS SAND&Aacute;LIAS</p><p>RIO BONITO : CICLE STAR</p><p>ICARAI &ndash; NITEROI : MATINATA</p></font><u><font size=\"2\" color=\"#ff0000\"><p><strong>1&ordm; LOTE ESGOTADO !!!GARANTA J&Aacute; O SEU... LIMITADO</strong></p></font></u><font size=\"2\"><p><strong>Mais informa&ccedil;&otilde;es: TEL : (22) 9997-7190</strong></p></font>','11.11.07',NULL,'no3.jpg'),(8,'Arena Fest ','<p>Saquarema agora conta com uma super &aacute;rea de eventos, onde oferecer&aacute; muito conforto e seguran&ccedil;a para seus usu&aacute;rios.</p><p>A Arena Fest est&aacute; localizada na Avenida Saquarema no Porto da Ro&ccedil;a perto do Pedacinho C&eacute;u.<br /><br />Localizada&nbsp;no cora&ccedil;&atilde;o de Saquarema, facilitando o acesso para todos.</p>','10.11.07',NULL,'nov1.jpg'),(2,'Em breve - Aguarde',NULL,'10.11.07',NULL,'aguarde_2.jpg'),(9,'Primeiro Lote Esgotado','<p>Primeiro Lote do Saqua Ax&eacute; est&aacute; esgotado!</p><p>Garanta logo o seu abad&aacute; antes que o segundo lote tamb&eacute;m acabe!<br />&nbsp;</p><p>Corra at&eacute; os pontos de venda e n&atilde;o fique de fora dessa super micareta!<br /><br /><br /><strong><u><font size=\"2\">PONTOS DE VENDA :</font></u></strong></p><strong><font size=\"1\"><p>BACAX&Aacute;: &Oacute;TICA VER&Atilde;O E &Oacute;TICA BRASIL</p><strong><p>SAQUAREMA: VILA BEACH SURF</p></strong><strong><p>PRAIA DA VILA : SAQUASUCO</p></strong><strong><p>ARARUAMA: ARRAST&Atilde;O DAS SAND&Aacute;LIAS</p></strong><strong><p>RIO BONITO : CICLE STAR</p></strong><strong><p>ICARAI &ndash; NITEROI : MATINATA</p></strong></font></strong>','12.11.07',NULL,'garanta.jpg'),(10,'Promoção Ressaca Saqua Axé','Preencha o formulário abaixo e concorra a um abadá.','04.11.07',NULL,''),(11,'Pontos de Vendas Saqua Axé','czxczxczxc','04.11.07',NULL,'resaca.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(30) default NULL,
  `senha` varchar(30) default NULL,
  `level` bigint(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nome`,`senha`,`level`) values (6,'leo','98391437',NULL),(7,'victor','victor',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
