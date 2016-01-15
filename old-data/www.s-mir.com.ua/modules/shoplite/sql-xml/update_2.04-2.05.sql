ALTER TABLE `{section}_catalog` ADD `idcat1` int(11) NOT NULL default '0';
ALTER TABLE `{section}_catalog` ADD INDEX (`idcat1`);

ALTER TABLE `{section}_catalog` ADD `idcat2` int(11) NOT NULL default '0';
ALTER TABLE `{section}_catalog` ADD INDEX (`idcat2`);

INSERT INTO `{domain}_options` (`item`,`idgroup`,`name`,`var`,`value`,`type`)
VALUES ('{section}',5,'Использовать несколько категорий для товара','usecats','0','bool');

UPDATE `{domain}_options` SET `idgroup`=5,`name`='Строгий учет количества' WHERE `item`='{section}' AND `var`='onlyavailable';