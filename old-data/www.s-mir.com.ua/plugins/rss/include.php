<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function rss_showpage($template)
{
  if(A_MODE==A_MODE_FRONT)
  { $rss=array();
	$structures=getStructuresByPlugin('rss');
    foreach($structures as $structure)
	{ A::$DB->query("SELECT * FROM {$structure}");
      while($row=A::$DB->fetchRow())
	  { $section=getSectionById($row['idsec']);
	    $lang=getLang($section);
	    $lang=$lang!=DEFAULTLANG?$lang."/":"";
	    $link="http://".DOMAINNAME."/{$lang}getfile/".getName($structure)."/".getName($section).".rss";
	    if($row['idcat']>0)
	    $link.="?idcat=".$row['idcat'];
	    $rss[]=$link;
	  }
	  A::$DB->free();
	}
	A::$MAINFRAME->Assign("rss",$rss);
  }
}

A::$OBSERVER->AddHandler('ShowPage','rss_showpage');