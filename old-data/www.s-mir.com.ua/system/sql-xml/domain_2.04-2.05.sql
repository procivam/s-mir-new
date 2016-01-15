ALTER TABLE `{domain}_comments` ADD `iduser` int(11) NOT NULL default '0';
ALTER TABLE `{domain}_comments` ADD INDEX (`iduser`);
ALTER TABLE `{domain}_comments` ADD `active` enum('Y','N') NOT NULL default 'Y';
ALTER TABLE `{domain}_comments` ADD INDEX (`active`);