<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <vitaly.hohlov@gmail.com>
 * @package Plugins
 */
/**************************************************************************/

function cfields_getfields($idcat,$section)
{ static $cfields=null;
  static $fields=array();

  if(isset($fields[$section][$idcat]))
  return $fields[$section][$idcat];

  if(is_null($cfields))
  { $cfields=getTextOption(getStructureByPlugin('cfields'),'cfields');
    $cfields=!empty($cfields)?unserialize($cfields):array();
    $cfields=isset($cfields[$section])?$cfields[$section]:$cfields;
  }

  $cpath[]=$idcat;
  if($idcat>0)
  { $catrow=A::$DB->getRowById($idcat,$section."_categories");
    $cpath[]=$catrow['idker'];
	while($catrow=A::$DB->getRowById($catrow['idker'],$section."_categories"))
	{ $cpath[]=$catrow['idker'];
	  if($catrow['idker']==0)
	  break;
	}
  }

  $fields[$section][$idcat]=array();
  foreach($cpath as $idc)
  if(!empty($cfields[$idc]))
  foreach($cfields[$idc] as $field)
  $fields[$section][$idcat][$field]=1;

  return $fields[$section][$idcat];
}

function cfields_prepareForm($template,$data)
{
  if(in_array($template,array('module_catalog_add.tpl','module_catalog_edit.tpl','module_shoplite_add.tpl','module_shoplite_edit.tpl')))
  {
    $fields=cfields_getfields($data['idcat'],SECTION);

    foreach($data['fields'] as $i=>$row)
    if(!isset($fields[$row['field']]))
    unset($data['fields'][$i]);

    $data['fields']=array_values($data['fields']);
  }

  return $data;
}

A::$OBSERVER->AddModifier('prepareForm','cfields_prepareForm');

function cfields_prepareValues($section,$data)
{
  $fields=cfields_getfields($data['idcat'],$section);

  foreach($data['fields'] as $i=>$row)
  if(!isset($fields[$row['field']]))
  unset($data['fields'][$i]);

  $data['fields']=array_values($data['fields']);

  return $data;
}

A::$OBSERVER->AddModifier('catalog_prepareValues','cfields_prepareValues');
A::$OBSERVER->AddModifier('shoplite_prepareValues','cfields_prepareValues');

function cfields_showCompare($template)
{
  if(defined('MODULE') && MODULE=='shoplite' && A::$MAINFRAME->page=='compare')
  {
    $vars=A::$MAINFRAME->get_template_vars();

    $idc=array();
    foreach($vars['items'] as $row)
    $idc[]=$row['idcat'];
    $idc=array_unique($idc);

	$fields=array();
	foreach($idc as $idcat)
	{ $_fields=cfields_getfields($idcat,SECTION);
	  foreach($_fields as $field=>$value)
	  $fields[$field]=isset($fields[$field])?$fields[$field]+$value:$value;
	}
	foreach($fields as $field=>$value)
	if($value<count($idc))
	unset($fields[$field]);

	foreach($vars['fields'] as $field=>$caption)
    if(!isset($fields[$field]))
    unset($vars['fields'][$field]);

    A::$MAINFRAME->Assign('fields',$vars['fields']);
  }
}

A::$OBSERVER->AddHandler('ShowPage','cfields_showCompare');

function cfields_ShowBlock($block,$data)
{
  if($block=='shoplite_filters')
  {
	$section=MODULE=='shoplite'?SECTION:getSectionByModule('shoplite');
	$idcat=MODULE=='shoplite'?A::$MAINFRAME->idcat:0;

	$fields=getFields($section);
	$_fields=cfields_getfields($idcat,$section);

	$filters=$data['object']->get_template_vars('filters');
	foreach($filters as $i=>$filter)
	{ if(isset($fields[$filter['field']]) && !isset($_fields[$filter['field']]))
	  unset($filters[$i]);
	}
	$data['object']->Assign("filters",array_values($filters));
  }
}

A::$OBSERVER->AddHandler('ShowBlock','cfields_ShowBlock');