<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <vitaly.hohlov@gmail.com>
 * @package Plugins
 */
/**************************************************************************/

class Courier_Request extends A_Request
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
    $form = new A_Form("plugin_courier_add.tpl");
    $form->data['data']=array_pad(array(),6,array());
	if($section=getSectionByModule('shoplite'))
    $form->data['valute']=getOption($section,'valute');
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditForm()
  {
    $form = new A_Form("plugin_courier_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$form->data['data']=!empty($form->data['data'])?unserialize($form->data['data']):array();
    $form->data['data']=array_pad($form->data['data'],6,array());
	if($section=getSectionByModule('shoplite'))
    $form->data['valute']=getOption($section,'valute');
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

A::$REQUEST = new Courier_Request;