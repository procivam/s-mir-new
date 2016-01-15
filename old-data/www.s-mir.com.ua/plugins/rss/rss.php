<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

$srow=null;

if(!empty($A_FILENAME))
{ if(preg_match("/([^.]+)\.rss$/",$A_FILENAME,$match))
  { $sname=$match[1];
    $srow=A::$DB->getRow("
    SELECT * FROM ".DOMAIN."_sections
    WHERE name='".$match[1]."' AND (lang='".LANG."' OR lang='all')");
  }
  if(!$srow) die();
}

if($srow)
{ $section=DOMAIN."_".$srow['lang']."_".$srow['name'];
  $idsec=$srow['id'];
  $idcat=!empty($_GET['idcat'])?(integer)$_GET['idcat']:0;
}
else
{ $idsec=0;
  $idcat=0;
}

$rssrow=A::$DB->getRow("SELECT * FROM ".STRUCTURE." WHERE idsec={$idsec} AND idcat={$idcat}");

if(!$rssrow) die();

require_once("modules/catalog/include.php");

require_once 'XML/Serializer.php';

$options = array(
XML_SERIALIZER_OPTION_XML_DECL_ENABLED=>true,
XML_SERIALIZER_OPTION_XML_ENCODING=>"utf-8",
XML_SERIALIZER_OPTION_INDENT      => "\t",
XML_SERIALIZER_OPTION_LINEBREAKS  => "\n",
XML_SERIALIZER_OPTION_ROOT_NAME   => 'rss',
XML_SERIALIZER_OPTION_ROOT_ATTRIBS => array('version'=>'2.0'),
XML_SERIALIZER_OPTION_DEFAULT_TAG => 'item'
);

$serializer = new XML_Serializer($options);

$data = array(
'channel' => array(
'title' => A::$OPTIONS['sitename_'.LANG].($srow?" - ".$srow['caption_'.LANG]:""),
'link'  => "http://".DOMAINNAME.($srow?getSectionLink($section):""),
'description' => A::$OPTIONS['sitename_'.LANG],
'pubDate' => date('r')));

if($srow)
{ A::$DB->queryLimit("
  SELECT a.*,c.name AS category
  FROM {$section}_catalog AS a
  LEFT JOIN {$section}_categories AS c ON c.id=a.idcat
  WHERE a.active='Y' ".($idcat>0?" AND a.idcat={$idcat}":"")."
  ORDER BY date DESC",0,$rssrow['rows']);
  while($row=A::$DB->fetchRow())
  { $item=array(
    'title'=>$row['name'],
    'link'=>"http://".DOMAINNAME.catalog_createItemLink($row['id'],$section),
    'pubDate'=>date("r",$row['date']),
    'description'=>strip_tags($row['description']));
    if(!empty($row['category']))
    $item['category']=$row['category'];
    $data['channel'][]=$item;
  }
  A::$DB->free();
}
else
{ $items=array();
  $sections=getSectionsByModule('catalog');
  foreach($sections as $section)
  { A::$DB->queryLimit("
    SELECT a.*,c.name AS category
    FROM {$section}_catalog AS a
    LEFT JOIN {$section}_categories AS c ON c.id=a.idcat
    WHERE a.active='Y'
    ORDER BY date DESC",0,$rssrow['rows']);
    while($row=A::$DB->fetchRow())
    { $row['link']=catalog_createItemLink($row['id'],$section);
	  $items[]=$row;
    }
	A::$DB->free();
  }
  $items=array_multisort_key($items,'date',SORT_DESC);
  $items=array_slice($items,0,$rssrow['rows']);
  foreach($items as $row)
  { $item=array(
    'title'=>$row['name'],
    'link'=>"http://".DOMAINNAME.$row['link'],
    'pubDate'=>date("r",$row['date']),
    'description'=>strip_tags($row['description']));
    if(!empty($row['category']))
    $item['category']=$row['category'];
    $data['channel'][]=$item;
  }
}

$serializer->serialize($data);

header("Content-type: text/xml; charset=utf-8");

die($serializer->getSerializedData());