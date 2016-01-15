<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class FCategory_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_fcategory.tpl");

	$this->AddJScript("/plugins/fcategory/admin/fcategory.js");
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
	A::goUrl("admin.php?mode=structures&item=".ITEM,array('ids'));
  }

  function existsindex($table,$key)
  {
    $index=A::$DB->getIndex($table);
    return in_array($key,$index);
  }

  function Add()
  {
    $idsec=(integer)A_Session::get(STRUCTURE,0);
	if($section=getSectionById($idsec))
	$table=$section."_categories";
	else
	return false;

	$_REQUEST['field']=substr(strtolower(preg_replace("/[^a-zA-Z0-9_]+/i","",$_REQUEST['field'])),0,20);
	if(empty($_REQUEST['field'])) return false;

    $fields=A::$DB->getFields($table);
	if(in_array($_REQUEST['field'],$fields))
	{ $this->errors['doublefield']=true;
	  return false;
	}

    $_REQUEST['idsec']=$idsec;
    $_REQUEST['name']=strclear($_REQUEST['name']);
	$_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE." WHERE idsec='{$idsec}'")+1;

	$dataset = new A_DataSet(STRUCTURE);
	$dataset->fields=array("idsec","field","name","type","sort");

	switch($_REQUEST['type'])
	{ case "string":
	    if(empty($_REQUEST['length']) || !is_numeric($_REQUEST['length']))
		$_REQUEST['property']=50;
		else
		$_REQUEST['property']=$_REQUEST['length'];
		$dataset->fields[]="property";
		break;
	  case "bool":
		$_REQUEST['property']=!empty($_REQUEST['booldef'])?$_REQUEST['booldef']:0;
		$dataset->fields[]="property";
		break;
	  case "text":
	    if(empty($_REQUEST['rows']) || !is_numeric($_REQUEST['rows']))
		$_REQUEST['property']=5;
		else
		$_REQUEST['property']=$_REQUEST['rows'];
		$dataset->fields[]="property";
		break;
	  case "format":
	    if(empty($_REQUEST['height']) || !is_numeric($_REQUEST['height']))
		$_REQUEST['property']=200;
		else
		$_REQUEST['property']=$_REQUEST['height'];
		$dataset->fields[]="property";
		break;
	  case "select":
	  case "mselect":
	    if(empty($_REQUEST['idvar']))
		return false;
		$_REQUEST['property']=$_REQUEST['idvar'];
		$dataset->fields[]="property";
		break;
	}

	if($dataset->Insert())
	{ $field=$_REQUEST['field'];
	  switch($_REQUEST['type'])
	  { case "string":
	      $length=$_REQUEST['property'];
		  A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` VARCHAR($length) DEFAULT '' NOT NULL");
		  break;
		case "int":
		case "date":
		  A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "image":
		case "file":
	      A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  break;
		case "float":
		  A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` DECIMAL(10,2) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "bool":
	      A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` ENUM('Y','N') DEFAULT 'N' NOT NULL");
	      A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "text":
		case "format":
	      A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` TEXT DEFAULT '' NOT NULL");
		  break;
		case "select":
		  A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "mselect":
		  A::$DB->execute("ALTER TABLE `{$table}` ADD `{$field}` text DEFAULT '' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD FULLTEXT (`{$field}`)");
		  break;
	  }
	  return true;
	}
	else
	return false;
  }

  function Edit()
  {
    $idsec=(integer)A_Session::get(STRUCTURE,0);
	if($section=getSectionById($idsec))
	$table=$section."_categories";
	else
	return false;

	$_REQUEST['field']=substr(strtolower(preg_replace("/[^a-zA-Z0-9_]+/i","",$_REQUEST['field'])),0,20);
	if(empty($_REQUEST['field'])) return false;

    $row=A::$DB->getRowById($_REQUEST['id'],STRUCTURE);

	$fields=A::$DB->getFields($table);
	if($_REQUEST['field']!=$row['field'] && in_array($_REQUEST['field'],$fields))
	{ $this->errors['doublefield']=true;
	  return false;
	}

	$_REQUEST['name']=strclear($_REQUEST['name']);

	$dataset = new A_DataSet(STRUCTURE);
	$dataset->fields=array("field","name","type");

	switch($_REQUEST['type'])
	{ case "string":
	    if(empty($_REQUEST['length']) || !is_numeric($_REQUEST['length']))
		$_REQUEST['property']=50;
		else
		$_REQUEST['property']=$_REQUEST['length'];
		$dataset->fields[]="property";
		break;
	  case "bool":
		$_REQUEST['property']=!empty($_REQUEST['booldef'])?$_REQUEST['booldef']:0;
		$dataset->fields[]="property";
		break;
	  case "text":
	    if(empty($_REQUEST['rows']) || !is_numeric($_REQUEST['rows']))
		$_REQUEST['property']=5;
		else
		$_REQUEST['property']=$_REQUEST['rows'];
		$dataset->fields[]="property";
		break;
	  case "format":
	    if(empty($_REQUEST['height']) || !is_numeric($_REQUEST['height']))
		$_REQUEST['property']=200;
		else
		$_REQUEST['property']=$_REQUEST['height'];
		$dataset->fields[]="property";
		break;
	  case "select":
	  case "mselect":
	    if(empty($_REQUEST['idvar']))
		return false;
		$_REQUEST['property']=$_REQUEST['idvar'];
		$dataset->fields[]="property";
		break;
	}
	if($row=$dataset->Update())
	{ $field=$_REQUEST['field'];
	  if($this->existsindex($table,$row['field']))
	  A::$DB->execute("ALTER TABLE `{$table}` DROP INDEX `{$row['field']}`");
	  switch($_REQUEST['type'])
	  { case "string":
	      $length=$_REQUEST['property'];
		  A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` VARCHAR($length) DEFAULT '' NOT NULL");
		  break;
		case "int":
		case "date":
		  A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "image":
		case "file":
	      A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  break;
		case "float":
		  A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` DECIMAL(10,2) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "bool":
	      A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` ENUM('Y','N') DEFAULT 'N' NOT NULL");
	      A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "text":
		case "format":
	      A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` TEXT DEFAULT '' NOT NULL");
		  break;
		case "select":
		  A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` INT(11) DEFAULT '0' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD INDEX (`{$field}`)");
		  break;
		case "mselect":
		  A::$DB->execute("ALTER TABLE `{$table}` CHANGE `{$row['field']}` `{$field}` text DEFAULT '' NOT NULL");
		  A::$DB->execute("ALTER TABLE `{$table}` ADD FULLTEXT (`{$field}`)");
		  break;
	  }
	  return true;
	}
	else
	return false;
  }

  function Del()
  {
    $idsec=(integer)A_Session::get(STRUCTURE,0);
	if($section=getSectionById($idsec))
	$table=$section."_categories";
	else
	return false;

	$dataset = new A_DataSet(STRUCTURE);
	if($row=$dataset->Delete())
	{ A::$DB->execute("ALTER TABLE `{$table}` DROP `{$row['field']}`");
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
	if($row['module']=='shoplite' || getOption(DOMAIN."_".$row['lang']."_".$row['name'],'usecats'))
	$sections[$row['id']]=$row['caption'];
	A::$DB->free();
	$this->Assign("sections",$sections);

	if(!empty($_GET['idsec']))
	{ $idsec=(integer)$_GET['idsec'];
	  if(isset($sections[$idsec]))
	  setcookie(STRUCTURE,$idsec,time()+31104000);
	}

	if(empty($idsec))
	$idsec=A_Session::get(STRUCTURE,isset($_COOKIE[STRUCTURE])?$_COOKIE[STRUCTURE]:key($sections));

	if(isset($sections[$idsec]))
	{ A_Session::set(STRUCTURE,$idsec);
	  $this->Assign("idsec",$idsec);
	}
	elseif($sections)
	{ A_Session::set(STRUCTURE,$idsec=key($sections));
	  $this->Assign("idsec",$idsec);
	}
	else
	return;

    $types=array(
	'string'=>'Строка',
	'int'=>'Целое число',
	'float'=>'Дробное число',
	'bool'=>'Логический (Да/Нет)',
	'date'=>'Дата',
	'text'=>'Текст',
	'format'=>'Форматированный текст',
	'select'=>'Значение из списка',
	'mselect'=>'Множество значений из списка',
	'image'=>'Изображение',
	'file'=>'Файл');

	$fields=array();
	A::$DB->query("SELECT * FROM ".STRUCTURE." WHERE idsec=$idsec ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $row['type']=isset($types[$row['type']])?$types[$row['type']]:"";
	  $fields[]=$row;
	}

	$this->Assign("fields",$fields);
  }
}

A::$MAINFRAME = new FCategory_Admin;