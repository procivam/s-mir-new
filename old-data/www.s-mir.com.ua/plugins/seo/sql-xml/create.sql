DROP TABLE IF EXISTS `{structure}`;
CREATE TABLE `{structure}` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(255) default '' NOT NULL,
  `title` varchar(255) default '' NOT NULL,
  `keywords` text default '' NOT NULL,
  `description` text default '' NOT NULL,
  `move` varchar(255) default '' NOT NULL,
  `notfound` enum('Y','N') default 'N' NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;