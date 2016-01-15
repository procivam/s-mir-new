<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

if(!empty($_GET['id']))
{
  if($row=A::$DB->getRowById($_GET['id'],STRUCTURE))
  { A::$DB->execute("UPDATE ".STRUCTURE." SET clicks=clicks+1 WHERE id=".(integer)$_GET['id']);
	A::goUrl($row['url']);
  }
}