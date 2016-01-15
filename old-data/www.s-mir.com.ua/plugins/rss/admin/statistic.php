<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class rss_Statistic extends A_Statistic
{
  function createData()
  {
    $this->Assign("rss_count",A::$DB->getOne("SELECT COUNT(*) FROM {$this->structure}"));
  }
}