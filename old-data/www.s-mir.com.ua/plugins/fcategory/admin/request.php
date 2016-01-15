<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class FCategory_Request extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "getaddform": $this->getAddForm(); break;
	  case "geteditform": $this->getEditForm(); break;
	  case "setsort": $this->setSort(); break;
    }
  }

  function getAddForm()
  {
    $idsec=(integer)A_Session::get(STRUCTURE,0);
	$form = new A_Form("plugin_fcategory_add.tpl");
	$form->data['vars']=array();

	A::$DB->query("SELECT * FROM ".DOMAIN."_structures ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $_item=DOMAIN."_structure_".$row['name'];
	  if(function_exists($row['plugin'].'_loadlist'))
      $form->data['vars'][$_item]=$row['caption'];
	}
	A::$DB->free();

	A::$DB->query("SELECT * FROM ".DOMAIN."_sections WHERE id<>$idsec ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $_item=DOMAIN."_".$row['lang']."_".$row['name'];
	  if(function_exists($row['module'].'_loadlist'))
      $form->data['vars'][$_item]=$row['caption'];
	}
	A::$DB->free();

	$this->RESULT['html']=$form->getContent();
  }

  function getEditForm()
  {
    $idsec=(integer)A_Session::get(STRUCTURE,0);
	$form = new A_Form("plugin_fcategory_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$form->data['vars']=array();

	A::$DB->query("SELECT * FROM ".DOMAIN."_structures ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $_item=DOMAIN."_structure_".$row['name'];
	  if(function_exists($row['plugin'].'_loadlist'))
      $form->data['vars'][$_item]=$row['caption'];
	}
	A::$DB->free();

	A::$DB->query("SELECT * FROM ".DOMAIN."_sections WHERE id<>$idsec ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $_item=DOMAIN."_".$row['lang']."_".$row['name'];
	  if(function_exists($row['module'].'_loadlist'))
      $form->data['vars'][$_item]=$row['caption'];
	}
	A::$DB->free();

	$this->RESULT['html']=$form->getContent();
  }

  function setSort()
  {
    $sort=!empty($_POST['sort'])?explode(",",$_POST['sort']):array();
	$i=1;
	foreach($sort as $id)
	A::$DB->Update(STRUCTURE,array('sort'=>$i++),"id=".(integer)$id);
  }
}

A::$REQUEST = new FCategory_Request;