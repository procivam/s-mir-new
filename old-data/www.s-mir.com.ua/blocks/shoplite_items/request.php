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
 * Серверная сторона AJAX настройки блока "Магазин Lite: Список товаров".
 *
 * <a href="http://wiki.a-cms.ru/blocks/shoplite_items">Руководство</a>.
 */

class shoplite_items_BlockRequest extends A_Request
{
/**
 * Маршрутизатор действий.
 */

  function Action($action)
  {
    switch($action)
    { case "add": $this->Add(); break;
	  case "edit": $this->Edit(); break;
	}
  }

/**
 * Обработчик действия: Отдает форму добавления.
 */

  function Add()
  {
	$form = new A_Form("block_shoplite_items_add.tpl");
	$form->data['sections']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_sections WHERE module='shoplite' ORDER BY sort");
	$section=getSectionById(key($form->data['sections']));
	$form->data['categories']=array();
	$this->getCategories($section,$form->data['categories'],0);
	$this->RESULT['html']=$form->getContent();
  }

/**
 * Обработчик действия: Отдает форму редактирования.
 */

  function Edit()
  {
	$form = new A_Form("block_shoplite_items_edit.tpl");
	$block=A::$DB->getRowById($_POST['id'],DOMAIN."_blocks");
	$form->data=!empty($block['params'])?unserialize($block['params']):array();
	$form->data['sections']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_sections WHERE module='shoplite' ORDER BY sort");
	$section=getSectionById($form->data['idsec']);
	$form->data['categories']=array();
	$this->getCategories($section,$form->data['categories'],0);
	$this->RESULT['html']=$form->getContent();
  }

  function getCategories($section,&$values,$id,$owner="")
  {
    A::$DB->query("SELECT * FROM {$section}_categories WHERE idker=$id ORDER BY sort");
	if(A::$DB->numRows())
	{ if(!empty($owner))
	  $owner.=" > ";
	  while($row=A::$DB->fetchRow())
      { $values[$row['id']]=$owner.$row['name'];
        $this->getCategories($section,$values,$row['id'],$owner.$row['name']);
      }
	}
	A::$DB->free();
  }
}

A::$REQUEST = new shoplite_items_BlockRequest;