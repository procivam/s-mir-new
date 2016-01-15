<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function seo_ShowPage($template)
{
  if(A_MODE==A_MODE_FRONT && $structure=getStructureByPlugin('seo'))
  { $PURL=parse_url(urldecode(getenv('REQUEST_URI')));
    if($PURL['path'])
    { if($row=A::$DB->getRow("SELECT * FROM {$structure} WHERE url=?",$PURL['path']))
	  { if($row['title'])
	    A::$MAINFRAME->Assign('title',$row['title']);
	    if($row['keywords'])
		A::$MAINFRAME->Assign('keywords',$row['keywords']);
		if($row['description'])
	    A::$MAINFRAME->Assign('description',$row['description']);
      }
    }
  }
}

A::$OBSERVER->AddHandler('ShowPage','seo_ShowPage');

function seo_CreateAdminFrame($item)
{
  if((MODE=='site' || MODE=='sections') && $structure=getStructureByPlugin('seo'))
  { A::$MAINFRAME->AddJScript("/plugins/seo/admin/seo.js");
    A::$MAINFRAME->AddJVar("SEOSTRUCTURE",$structure);
    A::$MAINFRAME->Assign("seo",$structure);
  }
}

A::$OBSERVER->AddHandler('CreateAdminFrame','seo_CreateAdminFrame');

if(A_MODE==A_MODE_FRONT && $structure=getStructureByPlugin('seo'))
{ if($urls=A::$DB->getAssoc("SELECT url,move,notfound FROM {$structure} WHERE move<>'' OR notfound='Y'"))
  { $PURL=parse_url(urldecode(getenv('REQUEST_URI')));
    if(isset($urls[$PURL['path']]))
    { if($urls[$PURL['path']]['notfound']=='Y')
	  A::NotFound();
	  elseif($urls[$PURL['path']]['move'])
	  A::goUrl($urls[$PURL['path']]['move'],null,true);
    }
  }
}