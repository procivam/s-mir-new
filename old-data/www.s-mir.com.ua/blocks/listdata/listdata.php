<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Blocks
 */
/**************************************************************************/

class listdata_Block extends A_Block
{
  function createData()
  {
	switch($type=getPluginByStructure($this->structure))
	{ case 'listdata':
	    $sort=!empty($this->params['random'])?'RAND()':'sort';
	    $limit=!empty($this->params['rows'])?" LIMIT 0,".(integer)$this->params['rows']:"";
		$list=A::$DB->getAll("SELECT * FROM {$this->structure} ORDER BY {$sort}{$limit}");
        foreach($list as $i=>$row)
		$list[$i]['name']=$row['name_'.A::$LANG];
		break;
	  case 'listnum':
	    $sort=!empty($this->params['random'])?'RAND()':'num';
	    $limit=!empty($this->params['rows'])?" LIMIT 0,".(integer)$this->params['rows']:"";
		$list=A::$DB->getAll("SELECT * FROM {$this->structure} ORDER BY {$sort}{$limit}");
        foreach($list as $i=>$row)
		$list[$i]['name']=$row['num'];
		break;
	  case 'liststr':
	    $sort=!empty($this->params['random'])?'RAND()':'name';
	    $limit=!empty($this->params['rows'])?" LIMIT 0,".(integer)$this->params['rows']:"";
	    $list=A::$DB->getAll("SELECT * FROM {$this->structure} ORDER BY {$sort}{$limit}");
		break;
	}
	$this->Assign("list",$list);
  }
}