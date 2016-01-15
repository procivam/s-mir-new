DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `idsec` int(11) NOT NULL default '0',
  `idcat` int(11) NOT NULL default '0',
  `rows` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
