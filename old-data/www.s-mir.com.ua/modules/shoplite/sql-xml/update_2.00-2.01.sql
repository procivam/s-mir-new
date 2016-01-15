UPDATE `{domain}_options` SET `var`='mail_touser'
WHERE `item`='{section}' AND `idgroup`=3 AND `var`='shoplite_touser';

INSERT INTO `{domain}_templates` (idsec,name,caption,template)
VALUES ('{section_id}','compare','Страница сравнения','shoplite_compare.tpl');