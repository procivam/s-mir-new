<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class RSS_Request extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "getaddrssform": $this->getAddRSSForm(); break;
	  case "geteditrssform": $this->getEditRSSForm(); break;
	  case "getcategories": $this->getCategories(); break;
    }
  }

  function getCats($section,&$values,$id,$owner="")
  {
    A::$DB->query("SELECT * FROM {$section}_categories WHERE idker=$id ORDER BY sort");
	if(A::$DB->numRows()>0)
	{ if(!empty($owner))
	  $owner.=" > ";
	  while($row=A::$DB->fetchRow())
      { $values[$row['id']]=$owner.$row['name'];
        $this->getCats($section,$values,$row['id'],$owner.$row['name']);
      }
	}
	A::$DB->free();
  }

  function getAddRSSForm()
  {
    $form = new A_Form("plugin_rss_add.tpl");
	$form->data['sections']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_sections WHERE module='catalog'");
	$form->data['categories']=array();
	if($form->data['sections'])
	$this->RESULT['html'] = $form->getContent();
	else
	$this->RESULT['html'] = AddLabel("Не найдены разделы материалов.");
  }

  function getEditRSSForm()
  {
    $form = new A_Form("plugin_rss_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$form->data['sections']=A::$DB->getAssoc("SELECT id,caption FROM ".DOMAIN."_sections WHERE module='catalog'");
	$form->data['categories']=array();
	if($form->data['sections'])
	{ if($section=getSectionById($form->data['idsec']))
	  $this->getCats($section,$form->data['categories'],0);
	  $this->RESULT['html'] = $form->getContent();
	}
	else
	$this->RESULT['html'] = AddLabel("Не найдены разделы материалов.");
  }

  function getCategories()
  {
    $this->RESULT['ids']=array();
	$this->RESULT['names']=array();
	if($section=getSectionById($_POST['id']))
	{ $categories=array();
	  $this->getCats($section,$categories,0);
	  foreach($categories as $id=>$name)
	  { $this->RESULT['ids'][]=$id;
	    $this->RESULT['names'][]=$name;
	  }
	}
  }
}

A::$REQUEST = new RSS_Request;