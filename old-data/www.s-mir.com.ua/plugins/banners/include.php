<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function banners_createStructure($structure,$params)
{
  if($params['plugin']=='banners')
  mk_dir("files/".DOMAIN."/rek_images");
}

A::$OBSERVER->AddHandler('CreateStructure','banners_createStructure');