<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class banners_Statistic extends A_Statistic
{
  function createData()
  {
	$this->Assign("categories_count",A::$DB->getOne("SELECT COUNT(*) FROM {$this->structure}_categories"));
	if($row=A::$DB->getRow("SELECT COUNT(*) AS count,SUM(views) AS views, SUM(clicks) AS clicks FROM {$this->structure}"))
	{ $this->Assign("banners_count",$row['count']);
	  $this->Assign("views_sum",$row['views']);
	  $this->Assign("clicks_sum",$row['clicks']);
	}
  }
}