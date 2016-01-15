<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Blocks
 */
/**************************************************************************/

/**
 * Блок "Магазин Lite: Список товаров".
 *
 * <a href="http://wiki.a-cms.ru/blocks/shoplite_items">Руководство</a>.
 */

class shoplite_items_Block extends A_Block
{
/**
 * Специальная обработка параметров блока.
 *
 * @return array
 */

  function prepareParams()
  {
    $params=array();
	foreach($_REQUEST as $name=>$value)
	if(preg_match("/^b_(.+)$/i",$name,$matches))
	{ if(($matches[1]=='mysort' || $matches[1]=='myfilter') && !A::$AUTH->isSuperAdmin())
	  continue;
	  $params[$matches[1]]=$value;
	}
	return $params;
  }

/**
 * Формирование данных доступных в шаблоне.
 */

  function createData()
  { static $useitems=array();

	if($this->params['sort']!=5)
	$this->supportCached();

	$this->params['idcat']=(integer)$this->params['idcat'];
	$this->params['rows']=(integer)$this->params['rows'];

	if($this->params['idcat'])
	{ $catrow=A::$DB->getRowById($this->params['idcat'],"{$this->section}_categories");
	  $catrow['link']=shoplite_createCategoryLink($this->params['idcat'],$this->section);
	  $this->Assign("category",$catrow);
	}

	if($this->section==SECTION && A::$MAINFRAME->iditem)
	$useitems[]=A::$MAINFRAME->iditem;

	if(!empty($this->params['mysort']))
	$sort=$this->params['mysort'];
	else
	switch($this->params['sort'])
	{ case 1: $sort="name"; break;
	  case 2: $sort="price DESC"; break;
	  case 3: $sort="price"; break;
	  case 4: $sort="sort"; break;
	  case 5: $sort="RAND()"; break;
	}

	$where=array();

	if($this->params['idcat'])
	{ $idcat=$this->params['idcat'];
	  $childcats=array($idcat);
	  getTreeSubItems($this->section."_categories",$idcat,$childcats);
	  $where[]="(idcat IN(".implode(",",$childcats).") OR idcat1 IN(".implode(",",$childcats).") OR idcat2 IN(".implode(",",$childcats)."))";
	}

	switch($this->params['filter'])
	{ case 1:
	    $where[]="favorite='Y'";
		break;
	  case 2:
	    $where[]="new='Y'";
		break;
	}

	if(!empty($this->params['myfilter']))
	$where[]=$this->params['myfilter'];

	if($useitems && !empty($this->params['nodouble']))
	$where[]="NOT id IN(".implode(',',$useitems).")";

	$sql="
	SELECT * FROM {$this->section}_catalog
	WHERE active='Y'".(!empty($where)?" AND ".implode(" AND ",$where):"")."
	ORDER BY $sort";

	if($this->params['rows'])
	A::$DB->queryLimit($sql,0,$this->params['rows']);
	else
	A::$DB->query($sql);

    $items=array();
	while($row=A::$DB->fetchRow())
    { if($this->params['idcat']==0)
	  $row['category']=getTreePath($this->section."_categories",$row['idcat']);
	  $row['link']=shoplite_createItemLink($row['id'],$this->section);
	  $row['tobasketlink']=getSectionLink($this->section)."?action=addbasket&id=".$row['id'];
	  $row['vote']=$row['cvote']>0?round($row['svote']/$row['cvote'],2):0;
	  $row['available']=$row['iscount']>0;
	  if($this->options['useimages'])
	  { $row['images']=A::$DB->getAll("
	    SELECT * FROM ".getDomain($this->section)."_images
	    WHERE idsec=? AND iditem=? ORDER BY sort",array($this->section_id,$row['id']));
	    $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
	  }
	  if($this->options['usefiles'])
	  { $row['files']=A::$DB->getAll("
	    SELECT * FROM ".getDomain($this->section)."_files
	    WHERE idsec=? AND iditem=? ORDER BY sort",array($this->section_id,$row['id']));
	    foreach($row['files'] as $i=>$data)
	    { $row['files'][$i]['link']=(LANG==DEFAULTLANG?"":"/".LANG)."/getfile/".$data['id']."/".$data['name'];
	      $row['files'][$i]['size']=sizestring($data['size']);
	    }
	    $row['idfile']=isset($row['files'][0]['id'])?$row['files'][0]['id']:0;
	  }
	  if($this->options['modprices'])
	  { $mprices=!empty($row['mprices'])?unserialize($row['mprices']):array();
	    $row['mprices']=array();
	    foreach($mprices as $i=>$mp)
	    $row['mprices'][]=array('id'=>$i,'name'=>$mp['name'],'price'=>$mp['price']);
      }
      if($this->options['usetags'])
	  $row['tags']=A_SearchEngine::getInstance()->convertTags($row['tags']);
      prepareValues($this->section,$row);
      $row=A::$OBSERVER->Modifier('shoplite_prepareValues',$this->section,$row);
      $useitems[]=$row['id'];
      $items[]=$row;
    }
	A::$DB->free();

	$this->Assign("items",$items);
	$this->Assign("items_count",count($items));

	$this->Assign('valute',$this->options['valute']);
  }
}