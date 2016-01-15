DROP TABLE IF EXISTS `{section}_categories`;
CREATE TABLE `{section}_categories` (
  `id` int(11) NOT NULL auto_increment,
  `idker` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  `idimg` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `urlname` varchar(100) NOT NULL default '',
  `description` text NOT NULL default '',
  `tags` text NOT NULL default '',
  `citems` int(11) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  KEY `idker` (`idker`),
  KEY `level` (`level`),
  KEY `name` (`name`),
  KEY `urlname` (`urlname`),
  KEY `sort` (`sort`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{section}_catalog`;
CREATE TABLE `{section}_catalog` (
  `id` int(11) NOT NULL auto_increment,
  `date` int(11) NOT NULL default '0',
  `idcat` int(11) NOT NULL default '0',
  `idcat1` int(11) NOT NULL default '0',
  `idcat2` int(11) NOT NULL default '0',
  `name` varchar(150) NOT NULL default '',
  `urlname` varchar(100) NOT NULL default '',
  `art` varchar(50) NOT NULL default '',
  `content` text NOT NULL default '',
  `keywords` text NOT NULL default '',
  `description` text NOT NULL default '',
  `tags` text NOT NULL default '',
  `comments` int(11) NOT NULL default '0',
  `cvote` int(11) NOT NULL default '0',
  `svote` int(11) NOT NULL default '0',
  `price` decimal(10,2) NOT NULL default '0.00',
  `oldprice` decimal(10,2) NOT NULL default '0.00',
  `iscount` int(11) NOT NULL default '1',
  `favorite` enum('Y','N') NOT NULL default 'N',
  `new` enum('Y','N') NOT NULL default 'N',
  `ties` blob default NULL,
  `mprices` blob default NULL,
  `sort` int(11) NOT NULL default '0',
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  KEY `date` (`date`),
  KEY `idcat` (`idcat`),
  KEY `idcat1` (`idcat1`),
  KEY `idcat2` (`idcat2`),
  KEY `name` (`name`),
  KEY `art` (`art`),
  KEY `urlname` (`urlname`),
  KEY `sort` (`sort`),
  KEY `price` (`price`),
  KEY `favorite` (`favorite`),
  KEY `new` (`new`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{section}_orders`;
CREATE TABLE `{section}_orders` (
  `id` int(11) NOT NULL auto_increment,
  `date` int(11) NOT NULL default '0',
  `iduser` int(11) NOT NULL default '0',
  `content` text default NULL,
  `userdata` blob default NULL,
  `basket` longblob default NULL,
  `count` int(11) NOT NULL default '0',
  `sum` decimal(10,2) NOT NULL default '0.00',
  `status` int(11) NOT NULL default '0',
  `pay` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `date` (`date`),
  KEY `iduser` (`iduser`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{section}_cols`;
CREATE TABLE `{section}_cols` (
  `id` int(11) NOT NULL auto_increment,
  `field` varchar(50) default NULL,
  `type` varchar(10) default 'string',
  `caption` varchar(100) default NULL,
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `{section}_cols` VALUES (1,'category0','string','Категория ур.1',1);
INSERT INTO `{section}_cols` VALUES (2,'name','string','Название',2);
INSERT INTO `{section}_cols` VALUES (3,'content','string','Описание',3);
INSERT INTO `{section}_cols` VALUES (4,'price','float','Цена',4);
INSERT INTO `{section}_cols` VALUES (5,'idimg0','image','Фото 1',5);