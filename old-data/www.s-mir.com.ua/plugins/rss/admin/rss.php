<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class RSS_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_rss.tpl");

	$this->AddJScript("/plugins/rss/admin/rss.js");
  }

  function Action($action)
  {
    $res=false;
    switch($action)
    { case "addrss": $res=$this->AddRSS(); break;
	  case "editrss": $res=$this->EditRSS(); break;
	  case "delrss": $res=$this->DelRSS(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM);
  }

  function AddRSS()
  {
	$dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("idsec","idcat","rows");
    return $dataset->Insert();
  }

  function EditRSS()
  {
    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("idsec","idcat","rows");
    return $dataset->Update();
  }

  function DelRSS()
  {
	$dataset = new A_DataSet(STRUCTURE);
    return $dataset->Delete();
  }

  function createData()
  {
	$rss=array();
    A::$DB->query("
	SELECT r.*,s.caption AS section
	FROM ".STRUCTURE." AS r
	LEFT JOIN ".DOMAIN."_sections AS s ON s.id=r.idsec
	ORDER BY r.id");
    while($row=A::$DB->fetchRow())
	{ if($section=getSectionById($row['idsec']))
	  { $lang=getLang($section);
	    $lang=$lang!=DEFAULTLANG?$lang."/":"";
	    $sname=getName($section);
	  }
	  else
	  $lang=$sname="";
	  $row['link']="http://".DOMAINNAME."/{$lang}getfile/".getName(STRUCTURE).($sname?"/{$sname}.rss":"/");
	  if($row['idcat']>0)
	  $row['link'].="?idcat=".$row['idcat'];
	  $rss[]=$row;
	}
	A::$DB->free();

	$this->Assign("rss",$rss);
  }
}

A::$MAINFRAME = new RSS_Admin;