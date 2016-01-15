<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Vars_Request extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "getaddform": $this->getAddForm(); break;
	  case "geteditform": $this->getEditForm(); break;
	  case "getaddurlform": $this->getAddURLForm(); break;
	  case "getediturlform": $this->getEditURLForm(); break;
	  case "setsort": $this->setSort(); break;
    }
  }

  function getAddForm()
  {
    $form = new A_Form("plugin_vars_add.tpl");
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditForm()
  {
    $form = new A_Form("plugin_vars_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$this->RESULT['html'] = $form->getContent();
  }

  function getAddURLForm()
  {
    $form = new A_Form("plugin_vars_addurl.tpl");
	$form->data['items']=A::$DB->getAll("SELECT * FROM ".STRUCTURE.(!empty($_POST['id'])?" WHERE id=".(integer)$_POST['id']:""));
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditURLForm()
  {
    $form = new A_Form("plugin_vars_editurl.tpl");
    $form->data['url']=$_POST['url'];
    $form->data['items']=A::$DB->getAll("SELECT * FROM ".STRUCTURE.(!empty($_POST['id'])?" WHERE id=".(integer)$_POST['id']:""));
    foreach($form->data['items'] as $i=>$row)
	{ $data=!empty($row['data'])?unserialize($row['data']):array();
	  $form->data['items'][$i]['value']=isset($data[$_POST['url']])?$data[$_POST['url']]:"";
    }
	$this->RESULT['html'] = $form->getContent();
  }

  function setSort()
  {
    $sort=!empty($_POST['sort'])?explode(",",$_POST['sort']):array();
	$i=1;
	foreach($sort as $id)
	A::$DB->Update(STRUCTURE,array('sort'=>$i++),"id=".(integer)$id);
  }
}

A::$REQUEST = new Vars_Request;