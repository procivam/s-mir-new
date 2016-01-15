<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class ListData_Request extends A_Request
{
  function Action($action)
  {
	switch($action)
    { case "loadlist": $this->loadList(); break;
    }
  }

  function loadList()
  {
    $list=loadList(STRUCTURE);
    $this->RESULT['list']=array();
	if(!empty($_POST['field']) && isset($_POST['value']))
	{ foreach($list as $id=>$row)
	  if(!empty($row[$_POST['field']]) && $row[$_POST['field']]==$_POST['value'])
      $this->RESULT['list'][]=array('id'=>$id,'name'=>is_array($row)?$row['name']:$row);
    }
	else
	{ foreach($list as $id=>$row)
	  $this->RESULT['list'][]=array('id'=>$id,'name'=>is_array($row)?$row['name']:$row);
	}
  }
}

A::$REQUEST = new ListData_Request;