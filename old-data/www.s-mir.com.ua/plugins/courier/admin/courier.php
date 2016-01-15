<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <vitaly.hohlov@gmail.com>
 * @package Plugins
 */
/**************************************************************************/

class Courier_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_courier.tpl");

	$this->AddJScript("/plugins/courier/admin/courier.js");
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
	A::goUrl("admin.php?mode=structures&item=".ITEM);
  }

  function Add()
  {
	$data=array();
	for($i=0;$i<=6;$i++)
	if(!empty($_REQUEST["price$i"]) || !empty($_REQUEST["per$i"]))
	$data[]=array(
	'from'=>!empty($_REQUEST["from$i"])?(integer)$_REQUEST["from$i"]:"",
	'to'=>!empty($_REQUEST["to$i"])?(integer)$_REQUEST["to$i"]:"",
	'price'=>!empty($_REQUEST["price$i"])?(integer)$_REQUEST["price$i"]:0,
    'per'=>!empty($_REQUEST["per$i"])?(integer)$_REQUEST["per$i"]:0);

    $_REQUEST['name']=trim($_REQUEST['name']);
    $_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE)+1;
    $_REQUEST['data']=serialize($data);

	$dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","data","sort");
    return $dataset->Insert();
  }

  function Edit()
  {
	$data=array();
	for($i=0;$i<=6;$i++)
	if(!empty($_REQUEST["price$i"]) || !empty($_REQUEST["per$i"]))
	$data[]=array(
	'from'=>!empty($_REQUEST["from$i"])?(integer)$_REQUEST["from$i"]:"",
	'to'=>!empty($_REQUEST["to$i"])?(integer)$_REQUEST["to$i"]:"",
	'price'=>!empty($_REQUEST["price$i"])?(integer)$_REQUEST["price$i"]:0,
    'per'=>!empty($_REQUEST["per$i"])?(integer)$_REQUEST["per$i"]:0);

    $_REQUEST['name']=trim($_REQUEST['name']);
    $_REQUEST['data']=serialize($data);

    $dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","data");
    return $dataset->Update();
  }

  function Del()
  {
    $dataset = new A_DataSet(STRUCTURE);
    return $dataset->Delete();
  }

  function createData()
  {
	if($section=getSectionByModule('shoplite'))
	$this->Assign("valute",getOption($section,'valute'));

	$this->Assign('shopassoc',!empty($section));

	$items = array();
  	A::$DB->query("SELECT * FROM ".STRUCTURE." ORDER BY sort");
	while($row=A::$DB->fetchRow())
	$items[]=$row;
	$this->Assign("items",$items);
  }
}

A::$MAINFRAME = new Courier_Admin;