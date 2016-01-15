<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function listdata_loadlist($item)
{
  $advc=A::$DB->getCount(A::$DOMAIN."_fields","item='$item'");
  $lang=A::$LANG;
  if($advc>0)
  { $list=A::$DB->getAssoc("SELECT * FROM {$item} ORDER BY sort");
    foreach($list as $i=>$row)
    { $list[$i]['name']=$row['name_'.$lang];
      prepareValues($item,$list[$i]);
    }
  }
  else
  $list=A::$DB->getAssoc("SELECT id,name_{$lang} AS name FROM {$item} ORDER BY sort");
  return $list;
}

function listdata_add($item,$name)
{
  $data=array('name_'.A::$LANG=>$name,'sort'=>A::$DB->getOne("SELECT MAX(sort) FROM {$item}")+1);
  return A::$DB->Insert($item,$data);
}