ALTER TABLE `{structure}` ADD `move` varchar(255) default '' NOT NULL;
ALTER TABLE `{structure}` ADD `notfound` enum('Y','N') default 'N' NOT NULL;