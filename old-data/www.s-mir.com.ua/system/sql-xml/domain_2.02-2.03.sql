ALTER TABLE `{domain}_options` ADD `superonly` enum('Y','N') NOT NULL default 'N';

INSERT INTO `{domain}_options` (`name`,`var`,`value`,`type`) VALUES ('Упрощенный визуальный редактор','fckmini','0','bool');
INSERT INTO `{domain}_options` (`name`,`var`,`value`,`type`) VALUES ('Код счетчиков','codecounters','','text');

UPDATE `{domain}_options` SET `type`='text',`options`=`value` WHERE `item`='' AND `var`='siteclosetext';

ALTER TABLE `{domain}_comments` CHANGE `message` `bbcode` text default NULL;
ALTER TABLE `{domain}_comments` ADD `message` text default NULL;