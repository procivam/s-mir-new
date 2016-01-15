DROP TABLE IF EXISTS `{domain}_languages`;
CREATE TABLE `{domain}_languages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(10) NOT NULL default '',
  `caption` varchar(50) NOT NULL default '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_options`;
CREATE TABLE `{domain}_options` (
  `id` int(11) NOT NULL auto_increment,
  `idgroup` int(11) NOT NULL default '0',
  `item` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `var` varchar(50) NOT NULL default '',
  `value` varchar(250) NOT NULL default '',
  `type` varchar(10) NOT NULL default 'string',
  `options` text default NULL,
  `refresh` enum('Y','N') NOT NULL default 'N',
  `superonly` enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY  (`id`),
  KEY `idgroup` (`idgroup`),
  KEY `var` (`var`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_blocks`;
CREATE TABLE `{domain}_blocks` (
  `id` int(11) NOT NULL auto_increment,
  `item` varchar(50) NOT NULL default '',
  `itemeditor` varchar(50) NOT NULL default '',
  `block` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `caption` varchar(100) NOT NULL default '',
  `align` enum('left','right','free') default 'left',
  `frame` varchar(50) NOT NULL default '',
  `lang` varchar(10) NOT NULL default '',
  `params` blob default NULL,
  `show` blob default NULL,
  `active` enum('Y','N') NOT NULL default 'Y',
  `icon` enum('Y','N') NOT NULL default 'N',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `name` (`caption`),
  KEY `align` (`align`,`sort`),
  KEY `block` (`block`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_files`;
CREATE TABLE `{domain}_files` (
  `id` int(11) NOT NULL auto_increment,
  `idsec` int(11) NOT NULL default '0',
  `iditem` int(11) NOT NULL default '0',
  `caption` varchar(150) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `path` varchar(150) NOT NULL default '',
  `mime` varchar(100) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  `dwnl` int(11) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idsec` (`idsec`),
  KEY `iditem` (`iditem`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_images`;
CREATE TABLE `{domain}_images` (
  `id` int(11) NOT NULL auto_increment,
  `idsec` int(11) NOT NULL default '0',
  `iditem` int(11) NOT NULL default '0',
  `caption` varchar(150) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `path` varchar(150) NOT NULL default '',
  `mime` varchar(100) NOT NULL default '',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idsec` (`idsec`),
  KEY `iditem` (`iditem`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_sections`;
CREATE TABLE `{domain}_sections` (
  `id` int(11) NOT NULL auto_increment,
  `module` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `urlname` varchar(100) NOT NULL default '',
  `caption` varchar(100) NOT NULL default '',
  `lang` varchar(10) NOT NULL default '',
  `active` enum('Y','N') NOT NULL default 'Y',
  `icon` enum('Y','N') NOT NULL default 'Y',
  `menu` enum('Y','N') NOT NULL default 'Y',
  `idimg` int(11) NOT NULL default '0',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `namelang` (`name`,`lang`),
  KEY `urlname` (`urlname`),
  KEY `module` (`module`),
  KEY `active` (`active`),
  KEY `icon` (`icon`),
  KEY `menu` (`menu`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_structures`;
CREATE TABLE `{domain}_structures` (
  `id` int(11) NOT NULL auto_increment,
  `itemeditor` varchar(50) NOT NULL default '',
  `plugin` varchar(50) NOT NULL default '',
  `name` varchar(50) NOT NULL default '',
  `caption` varchar(100) NOT NULL default '',
  `icon` enum('Y','N') NOT NULL default 'Y',
  `menu` enum('Y','N') NOT NULL default 'Y',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `plugin` (`plugin`),
  KEY `icon` (`icon`),
  KEY `menu` (`menu`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_templates`;
CREATE TABLE `{domain}_templates` (
  `id` int(11) NOT NULL auto_increment,
  `idsec` int(11) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `caption` varchar(100) NOT NULL default '',
  `template` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `idsec` (`idsec`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_fields`;
CREATE TABLE `{domain}_fields` (
  `id` int(11) NOT NULL auto_increment,
  `item` varchar(50) NOT NULL default '',
  `field` varchar(20) NOT NULL default '',
  `type` varchar(10) NOT NULL default 'string',
  `property` varchar(50) NOT NULL default '',
  `search` enum('Y','N') NOT NULL default 'N',
  `fill` enum('Y','N') NOT NULL default 'N',
  `nofront` enum('Y','N') NOT NULL default 'N',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `item` (`item`),
  KEY `sort` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `{domain}_comments`;
CREATE TABLE `{domain}_comments` (
  `id` int(11) NOT NULL auto_increment,
  `date` int(11) NOT NULL default '0',
  `idsec` int(11) NOT NULL default '0',
  `idker` int(11) NOT NULL default '0',
  `iditem` int(11) NOT NULL default '0',
  `iduser` int(11) NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `bbcode` text default NULL,
  `message` text default NULL,
  `active` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  KEY `date` (`date`),
  KEY `idsec` (`idsec`),
  KEY `idker` (`idker`),
  KEY `iditem` (`iditem`),
  KEY `iduser` (`iduser`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `{domain}_options` VALUES (1,0,'','Главный раздел','mainsection','','string','','N','N');
INSERT INTO `{domain}_options` VALUES (2,0,'','Название сайта','sitename_ru','Название сайта','string','','N','N');
INSERT INTO `{domain}_options` VALUES (3,0,'','Заголовок сайта','sitetitle_ru','Заголовок сайта','string','','N','N');
INSERT INTO `{domain}_options` VALUES (4,0,'','Обратный адрес для отправляемых писем','mailsfrom','','string','','N','N');
INSERT INTO `{domain}_options` VALUES (5,0,'','Переадресовывать на хост','gohost','','string','','N','N');
INSERT INTO `{domain}_options` VALUES (6,0,'','Направлять на главную, если страница не найдена','404gomain','0','bool','','N','N');
INSERT INTO `{domain}_options` VALUES (7,0,'','Доступный репозиторий','userep','1','bool','','N','Y');
INSERT INTO `{domain}_options` VALUES (8,0,'','Экспертный режим','adminmode','1','bool','','N','Y');
INSERT INTO `{domain}_options` VALUES (9,0,'','Закрытый режим','siteclose','0','bool','','N','N');
INSERT INTO `{domain}_options` VALUES (10,0,'','Текст','siteclosetext','Сайт временно закрыт','text','','N','N');
INSERT INTO `{domain}_options` VALUES (11,0,'','Транслитерация идентификаторов URL','transurl','1','bool','','N','Y');
INSERT INTO `{domain}_options` VALUES (12,0,'','Код счетчиков','codecounters','','text','','N','N');
INSERT INTO `{domain}_options` VALUES (13,0,'','Код своих мета тегов','codemeta','','text','','N','N');

INSERT INTO `{domain}_languages` VALUES (1, 'ru', 'Русский', 1);

ALTER TABLE `{domain}_sections` ADD `caption_ru` VARCHAR(100) NOT NULL default '';
ALTER TABLE `{domain}_sections` ADD `title_ru` VARCHAR(255) NOT NULL default '';
ALTER TABLE `{domain}_fields` ADD `name_ru` VARCHAR(100) NOT NULL default '';