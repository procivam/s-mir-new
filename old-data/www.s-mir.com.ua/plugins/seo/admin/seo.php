<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Seo_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_seo.tpl");

	$this->AddJScript("/plugins/seo/admin/seo.js");
  }

  function Action($action)
  {
    $res=false;
    switch($action)
    { case "add": $res=$this->Add(); break;
	  case "edit": $res=$this->Edit(); break;
	  case "del": $res=$this->Del(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM,array('page'));
  }

  function Add()
  {
    $PURL=parse_url(trim($_REQUEST['url']));
    $_REQUEST['url']=urldecode($PURL['path']);

    if(empty($_REQUEST['url']))
    return false;

	if(A::$DB->existsRow("SELECT id FROM ".STRUCTURE." WHERE url=?",$_REQUEST['url']))
	{ $this->errors['doubleurl']=true;
	  return false;
	}

	$_REQUEST['title']=strip_tags(trim($_REQUEST['title']));
	$_REQUEST['keywords']=strip_tags(trim($_REQUEST['keywords']));
	$_REQUEST['description']=strip_tags(trim($_REQUEST['description']));
    $MURL=parse_url(trim($_REQUEST['move']));
    $_REQUEST['move']=!empty($MURL['host'])?"http://".$MURL['host']:"";
    if(!empty($MURL['path']))
    $_REQUEST['move'].=urldecode($MURL['path']);
    $_REQUEST['notfound']=isset($_REQUEST['notfound'])?'Y':'N';

    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("url","title","keywords","description","move","notfound");
    return $dataset->Insert();
  }

  function Edit()
  {
	$PURL=parse_url(trim($_REQUEST['url']));
    $_REQUEST['url']=urldecode($PURL['path']);

    if(empty($_REQUEST['url']))
    return false;

	if(A::$DB->existsRow("SELECT id FROM ".STRUCTURE." WHERE url=? AND id<>".(integer)$_REQUEST['id'],$_REQUEST['url']))
	{ $this->errors['doubleurl']=true;
	  return false;
	}

	$_REQUEST['title']=strip_tags(trim($_REQUEST['title']));
	$_REQUEST['keywords']=strip_tags(trim($_REQUEST['keywords']));
	$_REQUEST['description']=strip_tags(trim($_REQUEST['description']));
	$MURL=parse_url(trim($_REQUEST['move']));
    $_REQUEST['move']=!empty($MURL['host'])?"http://".$MURL['host']:"";
    if(!empty($MURL['path']))
    $_REQUEST['move'].=urldecode($MURL['path']);
    $_REQUEST['notfound']=isset($_REQUEST['notfound'])?'Y':'N';

    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("url","title","keywords","description","move","notfound");
    return $dataset->Update();
  }

  function Del()
  {
    $dataset = new A_DataSet(STRUCTURE);
    return $dataset->Delete();
  }

  function createData()
  {
    $pages = array();
	$pager = new A_Pager(20);
  	$pager->query("SELECT * FROM ".STRUCTURE." ORDER BY url");
	while($row=$pager->fetchRow())
	$pages[]=$row;
	$pager->free();

	$this->Assign("pages",$pages);
	$this->Assign("pages_pager",$pager);
  }
}

A::$MAINFRAME = new Seo_Admin;