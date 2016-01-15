<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Vars_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_vars.tpl");

	$this->AddJScript("/plugins/vars/admin/vars.js");
  }

  function Action($action)
  {
    $res=false;
    switch($action)
    { case "add": $res=$this->Add(); break;
	  case "edit": $res=$this->Edit(); break;
	  case "del": $res=$this->Del(); break;
	  case "addurl": $res=$this->AddUrl(); break;
	  case "editurl": $res=$this->EditUrl(); break;
	  case "delurl": $res=$this->DelUrl(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM,array('idv','tab'));
  }

  function Add()
  {
	$_REQUEST['name']=preg_replace("/[^a-zA-Z0-9_-]/i","",$_REQUEST['name']);
	$_REQUEST['caption']=strip_tags($_REQUEST['caption']);
	if($_REQUEST['mode']=isset($_REQUEST['vmode'])?1:0)
	$_REQUEST['value']=$_REQUEST['valuetxt'];

	if(empty($_REQUEST['name']) || A::$DB->existsRow("SELECT id FROM ".DOMAIN."_options WHERE name=?",$_REQUEST['name']) ||
	A::$DB->existsRow("SELECT id FROM ".STRUCTURE." WHERE name=?",$_REQUEST['name']))
	{ $this->errors['doubleopt']=true;
	  return false;
	}

	$_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE)+1;

    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","caption","value","mode","sort");
    return $dataset->Insert();
  }

  function Edit()
  {
	$_REQUEST['name']=preg_replace("/[^a-zA-Z0-9_-]/i","",$_REQUEST['name']);
	$_REQUEST['caption']=strip_tags($_REQUEST['caption']);
	if($_REQUEST['mode']=isset($_REQUEST['vmode'])?1:0)
	$_REQUEST['value']=$_REQUEST['valuetxt'];

	if(empty($_REQUEST['name']) || A::$DB->existsRow("SELECT id FROM ".DOMAIN."_options WHERE name=?",$_REQUEST['name']) ||
	A::$DB->existsRow("SELECT id FROM ".STRUCTURE." WHERE name=? AND id<>".(integer)$_REQUEST['id'],$_REQUEST['name']))
	{ $this->errors['doubleopt']=true;
	  return false;
	}

    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","caption","mode","value");
    return $dataset->Update();
  }

  function Del()
  {
    $dataset = new A_DataSet(STRUCTURE);
    return $dataset->Delete();
  }

  function AddUrl()
  {
	if($url="/".preg_replace("/^\//i","",preg_replace("/^http:\/\/[a-zA-Z0-9._-]+/i","",trim(urldecode($_REQUEST['url'])))))
	{ if(!empty($_REQUEST['id']))
	  foreach($_REQUEST['id'] as $id)
	  if($var=A::$DB->getRowById($id,STRUCTURE))
	  { $data=!empty($var['data'])?unserialize($var['data']):array();
	    $data[$url]=!empty($_REQUEST[$var['name']])?$_REQUEST[$var['name']]:"";
	    A::$DB->Update(STRUCTURE,array('data'=>serialize($data)),"id=".$var['id']);
	  }
      return true;
	}
	else
	return false;
  }

  function EditUrl()
  {
    if($url="/".preg_replace("/^\//i","",preg_replace("/^http:\/\/[a-zA-Z0-9._-]+/i","",trim(urldecode($_REQUEST['url'])))))
	{ if(!empty($_REQUEST['id']))
	  foreach($_REQUEST['id'] as $id)
	  if($var=A::$DB->getRowById($id,STRUCTURE))
	  { $data=!empty($var['data'])?unserialize($var['data']):array();
	    if(isset($data[$_REQUEST['prevurl']]))
	    unset($data[$_REQUEST['prevurl']]);
		$data[$url]=!empty($_REQUEST[$var['name']])?$_REQUEST[$var['name']]:"";
	    A::$DB->Update(STRUCTURE,array('data'=>serialize($data)),"id=".$var['id']);
	  }
      return true;
	}
	else
	return false;
  }

  function DelUrl()
  {
    $ids=!empty($_REQUEST['id'])?array((integer)$_REQUEST['id']):A::$DB->getCol("SELECT id FROM ".STRUCTURE);
    foreach($ids as $id)
	if($var=A::$DB->getRowById($id,STRUCTURE))
	{ $data=!empty($var['data'])?unserialize($var['data']):array();
	  if(isset($data[$url=trim(urldecode($_REQUEST['url']))]))
	  unset($data[$url]);
	  ksort($data);
	  A::$DB->Update(STRUCTURE,array('data'=>serialize($data)),"id=".$var['id']);
	}
    $_GET['idv']=$_REQUEST['id'];
	return true;
  }

  function createData()
  {
	$vars=array();
	$urls=array();
  	A::$DB->query("SELECT * FROM ".STRUCTURE." ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ if(empty($_GET['idv']))
	  { $data=!empty($row['data'])?unserialize($row['data']):array();
	    foreach($data as $url=>$value)
	    $urls[$url]=$value;
	  }
	  $vars[]=$row;
	}
	A::$DB->free();
	$this->Assign("vars",$vars);


	if(!empty($_GET['idv']))
	{ if($var=A::$DB->getRowById($_GET['idv'],STRUCTURE))
      { $this->Assign("var",$var);
        $data=!empty($var['data'])?unserialize($var['data']):array();
        foreach($data as $url=>$value)
	    $urls[$url]=$value;
      }
	}

	ksort($urls);
	$this->Assign("urls",$urls);
  }
}

A::$MAINFRAME = new Vars_Admin;