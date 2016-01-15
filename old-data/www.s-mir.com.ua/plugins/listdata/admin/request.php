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
    { case "getaddform": $this->getAddForm(); break;
	  case "geteditform": $this->getEditForm(); break;
	  case "getimportform": $this->getImportForm(); break;
	  case "setsort": $this->setSort(); break;
    }
  }

  function getAddForm()
  {
    $form = new A_Form("plugin_listdata_add.tpl");
	$form->data['languages']=array();
	foreach(A::$LANGUAGES as $key=>$name)
	$form->data['languages'][]=array("field"=>"name_$key","caption"=>$name);
	$form->fieldseditor_addprepare();
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditForm()
  {
    $form = new A_Form("plugin_listdata_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$form->data['languages']=array();
	foreach(A::$LANGUAGES as $key=>$name)
	$form->data['languages'][]=array("field"=>"name_$key","caption"=>$name,"value"=>$form->data['name_'.$key]);
	$form->fieldseditor_editprepare();
	$this->RESULT['html'] = $form->getContent();
  }

  function getImportForm()
  {
    $form = new A_Form("plugin_listdata_import.tpl");
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

A::$REQUEST = new ListData_Request;