<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Blocks
 */
/**************************************************************************/

class listdata_BlockRequest extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "add": $this->Add(); break;
	  case "edit": $this->Edit(); break;
	}
  }

  function Add()
  {
	$form = new A_Form("block_listdata_add.tpl");
	$form->data['structures']=array();
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='listdata' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='listnum' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='liststr' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$this->RESULT['html']=$form->getContent();
  }

  function Edit()
  {
	$form = new A_Form("block_listdata_edit.tpl");
	$block=A::$DB->getRowById($_POST['id'],DOMAIN."_blocks");
	$form->data=!empty($block['params'])?unserialize($block['params']):array();
	$form->data['structures']=array();
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='listdata' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='listnum' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$list=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='liststr' ORDER BY sort");
	foreach($list as $id=>$name)
	$form->data['structures'][$id]=$name;
	$this->RESULT['html']=$form->getContent();
  }
}

A::$REQUEST = new listdata_BlockRequest;