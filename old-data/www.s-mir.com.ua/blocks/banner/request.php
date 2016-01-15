<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Blocks
 */
/**************************************************************************/

/**
 * Серверная сторона AJAX настройки блока "Баннер".
 *
 * <a href="http://wiki.a-cms.ru/blocks/banner">Руководство</a>.
 */

class banner_BlockRequest extends A_Request
{
/**
 * Маршрутизатор действий.
 */

  function Action($action)
  {
    switch($action)
    { case "add": $this->Add(); break;
	  case "edit": $this->Edit(); break;
	  case "getcategories": $this->getCategories(); break;
	}
  }

/**
 * Обработчик действия: Отдает форму добавления.
 */

  function Add()
  {
	$form = new A_Form("block_banner_add.tpl");
	$form->data['structures']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='banners' ORDER BY sort");
	if($structure=getStructureById(key($form->data['structures'])))
	$form->data['categories']=A::$DB->getAssoc("SELECT id,name FROM {$structure}_categories ORDER BY sort");
	$this->RESULT['html']=$form->getContent();
  }

/**
 * Обработчик действия: Отдает форму редактирования.
 */

  function Edit()
  {
	$form = new A_Form("block_banner_edit.tpl");
	$block=A::$DB->getRowById($_POST['id'],DOMAIN."_blocks");
	$form->data=!empty($block['params'])?unserialize($block['params']):array();
	$form->data['structures']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_structures WHERE plugin='banners' ORDER BY sort");
	if($structure=getStructureById($form->data['idstr']))
	$form->data['categories']=A::$DB->getAssoc("SELECT id,name FROM {$structure}_categories ORDER BY sort");
	$this->RESULT['html']=$form->getContent();
  }

  private function getCategories()
  {
    $structure=getStructureById($_POST['idstr']);
    $categories=A::$DB->getAssoc("SELECT id,name FROM {$structure}_categories ORDER BY sort");
	$this->RESULT['ids']=array();
	$this->RESULT['names']=array();
	foreach($categories as $id=>$name)
	{ $this->RESULT['ids'][]=$id;
	  $this->RESULT['names'][]=$name;
	}
  }
}

A::$REQUEST = new banner_BlockRequest;