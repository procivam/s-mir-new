DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `data` blob default NULL,
  `sort` int(11) NOT NULL default 0,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;