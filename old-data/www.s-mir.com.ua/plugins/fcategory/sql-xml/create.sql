DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `idsec` int(11) NOT NULL default '0',
  `field` varchar(20) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `type` varchar(10) NOT NULL default 'string',
  `property` varchar(50) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idsec` (`idsec`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;