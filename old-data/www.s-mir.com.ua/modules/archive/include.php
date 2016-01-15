<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "����� �������������"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Modules
 */
/**************************************************************************/

/**
 * ���������� � ����� �����.
 *
 * @param object &$treemap ������ ������ ����� �����.
 * @param string $section ������ ��������� ������������� �������.
 * @param string $caption �������� �������.
 */

function archive_createMap($treemap,$section,$caption)
{
  $treemap->items[$section] = new SiteMap_Box($caption,getSectionLink($section));
}

/**
 * ���������� ������� "�������� �������".
 *
 * @param string $section ������ ��������� ������������� �������.
 * @param array $params ��������� �������.
 */

function archive_createSection($section,$params)
{
  if($params['module']=='archive')
  { $ids=A::$DB->getCol("
    SELECT id FROM ".getDomain($section)."_sections
	WHERE module='catalog' AND (lang='".A::$LANG."' OR lang='all')");
    setOption($section,'sections',serialize($ids));
  }
  elseif($params['module']=='catalog')
  { if($archive=getSectionByModule('archive'))
    { $ids=getOption($archive,'sections');
      $ids=!empty($ids)?unserialize($ids):array();
      $ids[]=$params['id'];
      setOption($archive,'sections',serialize($ids));
    }
  }
}

A::$OBSERVER->AddHandler('CreateSection','archive_createSection');