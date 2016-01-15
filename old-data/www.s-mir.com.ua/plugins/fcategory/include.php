<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function fcategory_prepareForm($template,$data)
{
  if(MODE=='sections' && ($template=='objcomp_categoriestree_add.tpl' || $template=='objcomp_categoriestree_edit.tpl'))
  { if(!$structure=getStructureByPlugin('fcategory'))
    return $data;
    $data['fields']=array();
    A::$DB->query("SELECT * FROM {$structure} WHERE idsec=".SECTION_ID." ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { if($row['type']=="select"||$row['type']=="mselect")
      { $options=loadList($row['property']);
	    $row['options']=array();
	    foreach($options as $id=>$name)
	    if(is_array($name))
	    { if(isset($name['name']))
	      $row['options'][$id]=$name['name'];
	    }
	    else
	    $row['options'][$id]=$name;
      }
	  if($row['type']=="mselect")
      { $row['value']=isset($data[$row['field']])?explode(",",$data[$row['field']]):array();
	    foreach($row['value'] as $i=>$value)
	    $row['value'][$i]=(integer)$value;
      }
	  else
      $row['value']=isset($data[$row['field']])?$data[$row['field']]:"";
	  if($row['type']=="float")
      $row['value']=round($row['value'],2);
      $data['fields'][]=$row;
    }
    A::$DB->free();
  }
  return $data;
}

A::$OBSERVER->AddModifier('prepareForm','fcategory_prepareForm');

function fcategory_dataset_prepare($dataset)
{
  if($structure=getStructureByPlugin('fcategory'))
  { A::$DB->query("SELECT * FROM {$structure} WHERE idsec=".SECTION_ID." ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { switch($row['type'])
      { case "int":
          $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?(integer)$_REQUEST[$row['field']]:0;
          $dataset->fields[]=$row['field'];
		  break;
        case "select":
		  $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?(integer)$_REQUEST[$row['field']]:0;
		  $options=loadList($row['property']);
		  if(!isset($options[$_REQUEST[$row['field']]]) && !empty($_REQUEST[$row['field']."_txt"]))
	      { if($string=trim($_REQUEST[$row['field']."_txt"]))
	        { if($plugin=getPluginByStructure($row['property']))
	          { if(function_exists("{$plugin}_add"))
	            $_REQUEST[$row['field']]=call_user_func("{$plugin}_add",$row['property'],$string);
	          }
	        }
	      }
		  $dataset->fields[]=$row['field'];
		  break;
		case "mselect":
	      if(!empty($_REQUEST[$row['field']]) && is_array($_REQUEST[$row['field']]))
	      { $values=array();
		    foreach($_REQUEST[$row['field']] as $sid)
		    $values[]=sprintf("%04d",(integer)$sid);
		    $_REQUEST[$row['field']]=implode(",",$values);
		  }
		  else
		  $_REQUEST[$row['field']]="";
		  $dataset->fields[]=$row['field'];
	      break;
        case "float":
	      $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?(float)$_REQUEST[$row['field']]:0;
	      $dataset->fields[]=$row['field'];
	      break;
        case "bool":
	      $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?"Y":"N";
	      $dataset->fields[]=$row['field'];
	      break;
		case "date":
		  $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?(integer)$_REQUEST[$row['field']]:mktime(0,0,0,(integer)$_REQUEST[$row['field'].'Month'],(integer)$_REQUEST[$row['field'].'Day'],(integer)$_REQUEST[$row['field'].'Year']);
		  $dataset->fields[]=$row['field'];
		  break;
		case "string":
	    case "text":
	    case "format":
	      $_REQUEST[$row['field']]=isset($_REQUEST[$row['field']])?trim($_REQUEST[$row['field']]):"";
	      $dataset->fields[]=$row['field'];
	      break;
	    case "image":
		  if(empty(A::$REGFILES))
		  A::$REGFILES=getSectionByModule('pages');
		  if(empty($dataset->data) || empty($_REQUEST['parent_id']))
	      $_REQUEST[$row['field']]=UploadImage($row['field'],!empty($_REQUEST['name'])?$_REQUEST['name']:"");
	      else
	      { $_REQUEST[$row['field']]=UploadImage($row['field'],!empty($_REQUEST['name'])?$_REQUEST['name']:"",$dataset->data[$row['field']]);
			if(isset($_REQUEST[$row['field'].'_del']))
	        { DelRegImage($dataset->data[$row['field']]);
	          $_REQUEST[$row['field']]=0;
	        }
	      }
	      $dataset->fields[]=$row['field'];
	      break;
	    case "file":
		  if(empty(A::$REGFILES))
		  A::$REGFILES=getSectionByModule('pages');
	      if(empty($dataset->data) || empty($_REQUEST['parent_id']))
	      $_REQUEST[$row['field']]=UploadFile($row['field'],!empty($_REQUEST['name'])?$_REQUEST['name']:"");
	      else
	      { $_REQUEST[$row['field']]=UploadFile($row['field'],!empty($_REQUEST['name'])?$_REQUEST['name']:"",$dataset->data[$row['field']]);
	        if(isset($_REQUEST[$row['field'].'_del']))
	        { DelRegFile($dataset->data[$row['field']]);
	          $_REQUEST[$row['field']]=0;
	        }
	      }
	      $dataset->fields[]=$row['field'];
	      break;
      }
    }
    A::$DB->free();
  }
}

function fcategory_prepareValues($section,$data)
{ static $structure=null;
  static $fields=array();
  static $sections=array();
  if(is_null($structure))
  $structure=getStructureByPlugin('fcategory');
  if(!$structure)
  return $data;
  if(isset($sections[$section]))
  $idsec=$sections[$section];
  else
  $idsec=$sections[$section]=getSectionId($section);
  if(!isset($fields[$idsec]))
  { $fields[$idsec]=A::$DB->getAssoc("SELECT f.field,f.* FROM {$structure} AS f WHERE f.idsec=$idsec ORDER BY sort");
	foreach($fields[$idsec] as $field=>$row)
    if($row['type']=="select"||$row['type']=="mselect")
    $fields[$idsec][$field]['options']=loadList($row['property']);
  }
  $data['fields']=array();
  foreach($fields[$idsec] as $field=>$row)
  if(isset($data[$field]))
  { switch($row['type'])
    { case 'select':
	    $data[$field.'_id']=$data[$field];
		$data[$field]=isset($row['options'][$data[$field]])?$row['options'][$data[$field]]:"";
        break;
      case 'mselect':
  	    $values=explode(",",$data[$field]);
	    $options=array();
	    foreach($values as $i=>$value)
	    { $value=(integer)$value;
	      if(isset($row['options'][$value]))
	      { $options[$value]=$row['options'][$value];
	        $values[$i]=is_array($row['options'][$value])?$row['options'][$value]['name']:$row['options'][$value];
	      }
	      else
	      $values[$i]="";
	    }
	    $data[$field]=implode(", ",$values);
	    $data[$field.'_options']=$options;
        break;
      case 'bool':
        $data[$field.'_id']=$data[$field];
        switch($data[$field])
		{ case 'Y': $data[$field]="Да"; break;
		  case 'N': $data[$field]="Нет"; break;
		  default: $data[$field]="";
		}
    }
    $data['fields'][]=array('field'=>$field,'name'=>$row['name'],'value'=>is_array($data[$field])?$data[$field]['name']:$data[$field]);
  }
  return $data;
}

A::$OBSERVER->AddModifier('fcategory_prepareValues','fcategory_prepareValues');