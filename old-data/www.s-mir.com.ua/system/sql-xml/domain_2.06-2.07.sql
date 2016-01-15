ALTER TABLE `{domain}_comments` ADD `idker` int(11) NOT NULL default '0';
ALTER TABLE `{domain}_comments` ADD INDEX (`idker`);
UPDATE `{domain}_options` SET `name`='Доступный репозиторий',`var`='userep' WHERE `item`='' AND `var`='wizard';