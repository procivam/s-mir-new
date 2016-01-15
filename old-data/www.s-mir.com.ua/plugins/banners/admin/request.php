<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Banners_Request extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "getaddcatform": $this->getAddCategoryForm(); break;
	  case "geteditcatform": $this->getEditCategoryForm(); break;
	  case "getaddbannerform": $this->getAddBannerForm(); break;
	  case "geteditbannerform": $this->getEditBannerForm(); break;
	  case "setcatsort": $this->setCategorySort(); break;
	  case "setbansort": $this->setBannerSort(); break;
    }
  }

  function getAddCategoryForm()
  {
    $form = new A_Form("plugin_banners_cat_add.tpl");
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditCategoryForm()
  {
    $form = new A_Form("plugin_banners_cat_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE."_categories");
	$this->RESULT['html'] = $form->getContent();
  }

  function getAddBannerForm()
  {
	$form = new A_Form("plugin_banners_add.tpl");
    $form->data['categories']=A::$DB->getAssoc("SELECT id,name FROM ".STRUCTURE."_categories ORDER BY sort");
	$form->data['idcat']=(integer)$_POST['idcat'];

	$form->data['sections']=array();
	A::$DB->query("SELECT * FROM ".DOMAIN."_sections ORDER BY sort");
	while($row=A::$DB->fetchRow())
	$form->data['sections'][]=array('id'=>$row['id'],'caption'=>$row['caption']);
	A::$DB->free();

	$this->RESULT['html'] = $form->getContent();
  }

  function getEditBannerForm()
  {
    $form = new A_Form("plugin_banners_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$form->data['categories']=A::$DB->getAssoc("SELECT id,name FROM ".STRUCTURE."_categories ORDER BY sort");

	$form->data['showall']=empty($form->data['show'])&&empty($form->data['showurl']);
	$show=!empty($form->data['show'])?unserialize($form->data['show']):array();

	$form->data['sections']=array();
	A::$DB->query("SELECT * FROM ".DOMAIN."_sections ORDER BY sort");
	while($row=A::$DB->fetchRow())
	$form->data['sections'][]=array('id'=>$row['id'],'caption'=>$row['caption'],'checked'=>in_array($row['id'],$show));
	A::$DB->free();

	$this->RESULT['html'] = $form->getContent();
  }

  function setCategorySort()
  {
	$sort=!empty($_POST['sort'])?explode(",",$_POST['sort']):array();
	$i=1;
	foreach($sort as $id)
	A::$DB->Update(STRUCTURE."_categories",array('sort'=>$i++),"id=".(integer)$id);
  }

  function setBannerSort()
  {
    $rows=(integer)A_Session::get(STRUCTURE."_rows",isset($_COOKIE[STRUCTURE.'_rows'])?$_COOKIE[STRUCTURE.'_rows']:10);
    $page=!empty($_POST['page'])?(integer)$_POST['page']:0;
    $sort=!empty($_POST['sort'])?explode(",",$_POST['sort']):array();
	$i=$rows*$page+1;
	foreach($sort as $id)
	A::$DB->Update(STRUCTURE,array('sort'=>$i++),"id=".(integer)$id);
  }
}

A::$REQUEST = new Banners_Request;