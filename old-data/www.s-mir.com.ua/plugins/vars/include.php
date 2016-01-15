<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

function vars_CreateMainFrame($template)
{
  if(A_MODE==A_MODE_FRONT)
  { $structures=getStructuresByPlugin('vars');
    $requesturi=urldecode(getenv('REQUEST_URI'));
	foreach($structures as $structure)
    { A::$DB->query("SELECT name,value,data FROM $structure");
      while($row=A::$DB->fetchRow())
      { A::$OPTIONS[$row['name']]=$row['value'];
	    if($data=!empty($row['data'])?unserialize($row['data']):array())
        { ksort($data);
		  foreach($data as $url=>$value)
          if(mb_strpos($requesturi,$url)===0)
	      A::$OPTIONS[$row['name']]=$value;
	    }
      }
    }
  }
}

A::$OBSERVER->AddHandler('CreateMainFrame','vars_CreateMainFrame');