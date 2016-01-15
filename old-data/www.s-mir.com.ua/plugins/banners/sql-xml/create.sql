DROP TABLE IF EXISTS `{structure}_categories`;
CREATE TABLE `{structure}_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `idcat` int(11) NOT NULL default '0',
  `date` enum('Y','N') NOT NULL default 'N',
  `date1` int(11) NOT NULL default '0',
  `date2` int(11) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `filepath` varchar(150) NOT NULL default '',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `url` varchar(150) NOT NULL default '',
  `target` varchar(20) NOT NULL default '',
  `text` text NOT NULL default '',
  `showurl` text NOT NULL default '',
  `show` blob default NULL,
  `views` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  `type` enum('image','flash','text') default 'text',
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `idcat` (`idcat`),
  KEY `views` (`views`),
  KEY `clicks` (`clicks`),
  KEY `sort` (`sort`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;