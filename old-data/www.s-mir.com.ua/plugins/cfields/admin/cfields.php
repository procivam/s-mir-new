<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <vitaly.hohlov@gmail.com>
 * @package Plugins
 */
/**************************************************************************/

class CFields_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_cfields.tpl");
  }

  function Action($action)
  {
    $res=false;
    switch($action)
    { case "save": $res=$this->Save(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM,array('idcat'));
  }

  function Save()
  {
    if($section=preg_replace("/[^a-zA-Z0-9_-]/i","",A_Session::get(STRUCTURE,"")))
    { $idcat=!empty($_GET['idcat'])?(integer)$_GET['idcat']:0;
	  $cfields=getTextOption(STRUCTURE,'cfields');
      $cfields=!empty($cfields)?unserialize($cfields):array();
      $fields=!empty($_POST['checkfield'])?$_POST['checkfield']:array();
      $cfields[$section][$idcat]=$fields;
      if(empty($cfields[$section][$idcat]))
      unset($cfields[$section][$idcat]);
	  setTextOption(STRUCTURE,'cfields',serialize($cfields));
	  return true;
	}
	else
	return false;
  }

  function createData()
  {
	$sections=array();
	A::$DB->query("SELECT * FROM ".DOMAIN."_sections WHERE module='shoplite' OR module='catalog' ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $_section=DOMAIN."_".$row['lang']."_".$row['name'];
	  if(getFields($_section))
	  $sections[$_section]=$row['caption'];
	}
	A::$DB->free();
	$this->Assign("sections",$sections);

	if(!empty($_GET['section']))
	{ $_section=preg_replace("/[^a-zA-Z0-9_-]/i","",$_GET['section']);
	  if(isset($sections[$_section]))
	  { $section=$_section;
	    setcookie(STRUCTURE,$_GET['section'],time()+31104000);
	  }
	}

	if(empty($section))
	$section=preg_replace("/[^a-zA-Z0-9_-]/i","",A_Session::get(STRUCTURE,isset($_COOKIE[STRUCTURE])?$_COOKIE[STRUCTURE]:key($sections)));

	A_Session::set(STRUCTURE,$section);

	$this->Assign("section",$section);

	if(empty($section))	return;

	$categories=A::$DB->getAll("SELECT id,idker,name FROM {$section}_categories ORDER BY level,sort");
	$this->Assign("categories",$categories);

	$idcat=!empty($_GET['idcat'])?(integer)$_GET['idcat']:0;

	$_cfields=getTextOption(STRUCTURE,'cfields');
    $_cfields=!empty($_cfields)?unserialize($_cfields):array();
    if(!isset($_cfields[$section]))
    $_cfields[$section]=$_cfields;
	$_cfields=!empty($_cfields[$section][$idcat])?$_cfields[$section][$idcat]:array();

	$cfields=cfields_getfields($idcat,$section);
	foreach($cfields as $field=>$value)
	if(in_array($field,$_cfields))
	unset($cfields[$field]);

	$fields=array();
	A::$DB->query("SELECT * FROM ".DOMAIN."_fields WHERE item='{$section}' ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $row['disabled']=isset($cfields[$row['field']]);
	  $row['checked']=in_array($row['field'],$_cfields)||$row['disabled'];
	  $row['caption']=$row['name_'.LANG];
	  $fields[]=$row;
	}
	A::$DB->free();

	$this->Assign("fields",$fields);
  }
}

A::$MAINFRAME = new CFields_Admin;