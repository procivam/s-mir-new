DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `caption` varchar(150) default NULL,
  `value` text default NULL,
  `mode` int(11) NOT NULL default 0,
  `sort` int(11) NOT NULL default 0,
  `data` blob default NULL,
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;