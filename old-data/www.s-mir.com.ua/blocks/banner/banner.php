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
 * Блок "Баннер".
 *
 * <a href="http://wiki.a-cms.ru/blocks/banner">Руководство</a>.
 */

class banner_Block extends A_Block
{
/**
 * Формирование данных доступных в шаблоне.
 */

  function createData()
  { static $banners=array();
    static $purl=null;

    if(is_null($purl))
    $purl=parse_url(urldecode(getenv('REQUEST_URI')));

	$time=time();
	$this->params['idcat']=(integer)$this->params['idcat'];
	$unp=$this->structure.'|'.$this->params['idcat'].'|'.$this->params['random'];

	if(!isset($banners[$unp]))
	$banners[$unp]=A::$DB->_getAll("
	SELECT * FROM {$this->structure}
	WHERE idcat={$this->params['idcat']} AND active='Y' AND (date='N' OR (date='Y' AND date1<$time AND date2>$time))
	ORDER BY ".(!empty($this->params['random'])?"RAND()":"sort"));

	foreach($banners[$unp] as $i=>$row)
	{ $show=empty($row['show']) && empty($row['showurl']);
	  if(!$show && !empty($row['show']))
	  { $row['show']=unserialize($row['show']);
	    if(in_array(SECTION_ID,$row['show']))
	    $show=true;
	  }
	  if(!$show && !empty($row['showurl']))
	  { $row['showurl']=explode("\n",$row['showurl']);
		foreach($row['showurl'] as $url)
	    if(!$show)
		{ $puri=parse_url(trim($url));
		  if(empty($puri['path']) || mb_strpos($purl['path'],$puri['path'])===0)
          $show=true;
          if($show && !empty($puri['query']))
          { parse_str($puri['query'],$query);
			if($query)
			foreach($query as $name=>$value)
			if(!isset($_GET[$name]) || (is_array($value) && !in_array($_GET[$name],$value) ) || (!is_array($value) && $_GET[$name]!=$value))
			$show=false;
          }
        }
	  }
	  if($show)
	  { $banner=$row;
	    unset($banners[$unp][$i]);
	    break;
	  }
	}

	if(!empty($banner))
    { $banner['link']="/getfile/".getName($this->structure)."/click/?id=".$banner['id'];
	  $this->Assign("banner",$banner);
	  A::$DB->_execute("UPDATE {$this->structure} SET views=views+1 WHERE id=".$banner['id']);
	}
	else
	$this->template="";
  }
}