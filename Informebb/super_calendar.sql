CREATE DATABASE `calendar`;

USE `calendar`;

CREATE TABLE `events` (
	`num` bigint(20) NOT NULL auto_increment,
	`heading` varchar(45) NOT NULL default '',
	`date` datetime NOT NULL default '0000-00-00 00:00:00',
	`body` text NOT NULL,
	PRIMARY KEY  (`num`)
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `events` (
	`heading`, `date`, `body`
) VALUES (
	'A great event!', NOW(), 'The world has never seen such a great event happening here today! This is just a sample event, you can delete it now.'
);