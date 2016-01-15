<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class ListData_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_listdata.tpl");

	$this->AddJScript("/plugins/listdata/admin/listdata.js");
  }

  function Action($action)
  { $res=false;

	switch($action)
    { case "add": $res=$this->Add(); break;
	  case "edit": $res=$this->Edit(); break;
	  case "del": $res=$this->Del(); break;
	  case "import": $res=$this->Import(); break;
	  case "delete": $res=$this->Delete(); break;
	  case "sortname": $res=$this->SortName(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM);
  }

  function Add()
  {
	$_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE)+1;

    $dataset = new A_DataSet(STRUCTURE,true);
    $dataset->fields=array("sort");

	foreach(A::$LANGUAGES as $key=>$name)
	{ $_REQUEST["name_$key"]=trim($_REQUEST["name_$key"]);
	  $dataset->fields[]="name_$key";
	}

    return $dataset->Insert();
  }

  function Edit()
  {
    $dataset = new A_DataSet(STRUCTURE,true);
    $dataset->fields=array("name");

	foreach(A::$LANGUAGES as $key=>$name)
	{ $_REQUEST["name_$key"]=trim($_REQUEST["name_$key"]);
	  $dataset->fields[]="name_$key";
	}

    return $dataset->Update();
  }

  function Import()
  {
    require_once "Structures/DataGrid.php";
    require_once "Structures/DataGrid/DataSource/Excel.php";
	require_once "Structures/DataGrid/DataSource/CSV.php";
	require_once('Image/Transform.php');

	A::$REGFILES=getSectionByModule('pages');

	mk_dir("files/".DOMAIN."/tmp");
    clearDir("files/".DOMAIN."/tmp");

	if(isset($_FILES['file']['tmp_name']) && file_exists($_FILES['file']['tmp_name']))
    { $path_parts=pathinfo($_FILES['file']['name']);
	  $ext=preg_replace("/[^a-z0-9]+/i","",mb_strtolower($path_parts['extension']));
	  if($ext=='xls' || $ext=='csv')
	  { if($ext=='csv')
		{ $sourcefile=$_FILES['file']['tmp_name'];
		  $content=@file_get_contents($sourcefile);
		  if($content && !mb_check_encoding($content,'UTF-8'))
		  file_put_contents($sourcefile,mb_convert_encoding($content,'UTF-8','Windows-1251'));
		}
		else
		$sourcefile=$_FILES['file']['tmp_name'];

		if($ext=='xls')
		{ $datasource = new Structures_DataGrid_DataSource_Excel();
		  $datasource->bind($sourcefile);
		}
		elseif($ext=='csv')
		{ $datasource = new Structures_DataGrid_DataSource_CSV();
		  $datasource->bind($sourcefile,array('delimiter'=>';','enclosure' =>'"'));
		}
		else
		return false;

        $datagrid = new Structures_DataGrid();
        $datagrid->bindDataSource($datasource);

        if(isset($_REQUEST['clear']))
		A::$DB->execute("TRUNCATE ".STRUCTURE);

		$sort=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE)+1;
		$list=array();

		foreach($datagrid->recordSet as $row)
        { if(empty($row)) continue;

		  if($ext=='xls')
		  { $trow=array();
		    foreach($row as $j=>$value)
		    if(!empty($value))
			$trow[$j-1]=$value;
			$row=$trow;
		  }

	      $data=array();

	      if(!empty($row[0]))
		  $data['name_'.LANG]=trim($row[0]);
		  else
		  continue;

          $j=1;
		  A::$DB->query("SELECT * FROM ".DOMAIN."_fields WHERE item='".STRUCTURE."' ORDER BY sort");
	      while($frow=A::$DB->fetchRow())
		  { switch($frow['type'])
		    { default:
		        $data[$frow['field']]=!empty($row[$j])?trim($row[$j]):"";
			    break;
			  case 'int':
			    $data[$frow['field']]=!empty($row[$j])?(integer)$row[$j]:0;
			    break;
			  case 'float':
			    $data[$frow['field']]=!empty($row[$j])?(float)$row[$j]:0;
			    break;
		      case 'select':
			    if(!empty($row[$j]))
			    { if(!isset($list[$frow['property']]))
				  $list[$frow['property']]=loadList($frow['property']);
				  $row[$j]=trim($row[$j]);
 				  $key=array_search($row[$j],$list[$frow['property']]);
			      if(empty($key) && !empty($row[$j]))
			      { $key=addToList($frow['property'],$row[$j]);
			        $list[$frow['property']][$key]=$row[$j];
			      }
			      if(!empty($key))
			      $data[$frow['field']]=$key;
			    }
			    break;
			  case 'mselect':
 			    if(!empty($row[$j]))
			    { if(!isset($list[$frow['property']]))
				  $list[$frow['property']]=loadList($frow['property']);
			      $row[$j]=explode(',',$row[$j]);
			      $data[$frow['field']]=array();
			      foreach($row[$j] as $value)
			      { $value=trim($value);
				    $key=array_search($value,$list[$frow['property']]);
			        if(empty($key) && !empty($value))
			        { $key=addToList($frow['idvar'],$value);
			          $list[$frow['property']][$key]=$value;
			        }
			        if(!empty($key))
			        $data[$frow['field']][]=sprintf("%04d",$key);
			      }
			      $data[$frow['field']]=implode(",",$data[$frow['field']]);
			    }
			    break;
		      case 'bool':
			    $data[$frow['field']]=!empty($row[$j])&&$row[$j]!='N'?"Y":"N";
			    break;
			  case 'image':
			    $row[$j]=preg_replace("/[^a-zA-Zа-яА-Я0-9-_.]/iu","",$row[$j]);
				if(is_file($path="ifiles/".$row[$j]))
				$data[$frow['field']]=RegisterImage($path,$data['name_'.LANG]);
		        break;
		      case 'file':
			    $row[$j]=preg_replace("/[^a-zA-Zа-яА-Я0-9-_.]/iu","",$row[$j]);
				if(is_file($path="ifiles/".$row[$j]))
				$data[$frow['field']]=RegisterFile($path,$data['name_'.LANG]);
		        break;

		    }
		    $j++;
		  }
		  A::$DB->free();

		  $data['sort']=$sort++;

		  A::$DB->Insert(STRUCTURE,$data);
		}
		return true;
	  }
	}
	return false;
  }

  function Del($id=0)
  {
	if($id>0)
	$_REQUEST['id']=$id;

    if(!isset($_REQUEST['id'])) return false;

    $dataset = new A_DataSet(STRUCTURE);
    return $dataset->Delete();
  }

  function Delete()
  {
    if(isset($_REQUEST['checkdata']))
	foreach($_REQUEST['checkdata'] as $id)
	$this->Del($id);
	return true;
  }

  function SortName()
  {
    if(isset($_REQUEST['checkdata']))
	{ $values=array();
	  $sort=array();
	  foreach($_REQUEST['checkdata'] as $id)
	  { $row=A::$DB->getRowById($id,STRUCTURE);
	    $sort[]=$row['sort'];
	    $values[]=$row;
	  }
	  $values=array_multisort_key($values,'name_'.LANG);
	  foreach($values as $i=>$row)
	  A::$DB->execute("UPDATE ".STRUCTURE." SET sort=".$sort[$i]." WHERE id=".$row['id']);
	}
	return true;
  }

  function createData()
  {
    $fields=A::$DB->getFields(STRUCTURE);
    foreach(A::$LANGUAGES as $key=>$caption)
	if(!in_array('name_'.$key,$fields))
	A::$DB->execute("ALTER TABLE ".STRUCTURE." ADD `name_{$key}` varchar(150) DEFAULT NULL");

	$listdata = array();
  	A::$DB->query("SELECT * FROM ".STRUCTURE." ORDER BY sort");
	while($row=A::$DB->fetchRow())
	{ $row['name']=$row['name_'.LANG];
	  $listdata[]=$row;
	}
	A::$DB->free();

	$this->Assign("listdata",$listdata);

	$this->Assign("fieldsbox",new A_FieldsEditor(STRUCTURE,"fields",false,false));
  }
}

A::$MAINFRAME = new ListData_Admin;