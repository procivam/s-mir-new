<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Seo_Request extends A_Request
{
  function Action($action)
  {
    switch($action)
    { case "getaddform": $this->getAddForm(); break;
	  case "geteditform": $this->getEditForm(); break;
	  case "geturlform": $this->getUrlForm(); break;
	  case "saveurl": $this->saveUrl(); break;
    }
  }

  function getAddForm()
  {
    $form = new A_Form("plugin_seo_add.tpl");
	$this->RESULT['html'] = $form->getContent();
  }

  function getEditForm()
  {
    $form = new A_Form("plugin_seo_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],STRUCTURE);
	$this->RESULT['html'] = $form->getContent();
  }

  function getUrlForm()
  {
    $form = new A_Form("plugin_seo_url.tpl");
	if($_POST['url'])
	$form->data=A::$DB->getRow("SELECT * FROM ".STRUCTURE." WHERE url=?",$_POST['url']);
	$form->data['url']=$_POST['url'];
	$this->RESULT['html'] = $form->getContent();
  }

  function saveUrl()
  {
    $data=array();
	$PURL=parse_url(trim($_POST['url']));
    if($data['url']=urldecode($PURL['path']))
    { $data['title']=strip_tags(trim($_POST['title']));
	  $data['keywords']=strip_tags(trim($_POST['keywords']));
	  $data['description']=strip_tags(trim($_POST['description']));
	  $MURL=parse_url(trim($_POST['move']));
	  $data['move']=!empty($MURL['host'])?"http://".$MURL['host']:"";
	  if(!empty($MURL['path']))
      $data['move'].=urldecode($MURL['path']);
      $data['notfound']=isset($_POST['notfound'])?'Y':'N';
	  if($id=A::$DB->getOne("SELECT id FROM ".STRUCTURE." WHERE url=?",$data['url']))
	  A::$DB->Update(STRUCTURE,$data,"id=$id");
	  else
	  A::$DB->Insert(STRUCTURE,$data);
    }
	$this->RESULT['result'] = true;
  }
}

A::$REQUEST = new Seo_Request;