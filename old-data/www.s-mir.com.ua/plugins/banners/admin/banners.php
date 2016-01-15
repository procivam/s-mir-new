<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Plugins
 */
/**************************************************************************/

class Banners_Admin extends A_MainFrame
{
  function __construct()
  {
    parent::__construct("plugin_banners.tpl");

	$this->AddJScript("/plugins/banners/admin/banners.js");
  }

  function Action($action)
  {
    $res=false;
    switch($action)
    { case "addcat": $res=$this->AddCategory(); break;
	  case "editcat": $res=$this->EditCategory(); break;
	  case "delcat": $res=$this->DelCategory(); break;
	  case "addbanner": $res=$this->AddBanner(); break;
	  case "editbanner": $res=$this->EditBanner(); break;
	  case "delbanner": $res=$this->DelBanner(); break;
	  case "setrows": $res=$this->setRows(); break;
	  case "setsort": $res=$this->setSort(); break;
	  case "seton": $res=$this->setOn(); break;
	  case "setoff": $res=$this->setOff(); break;
	  case "reset": $res=$this->Reset(); break;
	  case "delete": $res=$this->Delete(); break;
	}
    if($res)
	A::goUrl("admin.php?mode=structures&item=".ITEM,array('idcat','tab','page'));
  }

  function setSort()
  {
    A_Session::set(STRUCTURE."_sort",A::$DB->real_escape_string($_REQUEST['sort']));
	setcookie(STRUCTURE."_sort",A::$DB->real_escape_string($_REQUEST['sort']),time()+31104000);
	return true;
  }

  function setRows()
  {
	A_Session::set(STRUCTURE."_rows",(integer)$_REQUEST['rows']);
	setcookie(STRUCTURE."_rows",(integer)$_REQUEST['rows'],time()+31104000);
	return true;
  }

  function AddCategory()
  {
    $_REQUEST['name']=strclear($_REQUEST['name']);
	$_REQUEST["sort"]=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE."_categories")+1;

    $dataset = new A_DataSet(STRUCTURE."_categories");
    $dataset->fields=array("name","sort");
    return $dataset->Insert();
  }

  function EditCategory()
  {
    $_REQUEST['name']=strclear($_REQUEST['name']);
    $dataset = new A_DataSet(STRUCTURE."_categories");
    $dataset->fields=array("name");
    return $dataset->Update();
  }

  function DelCategory()
  {
    $dataset = new A_DataSet(STRUCTURE."_categories");
    if($row=$dataset->Delete())
	{ A::$DB->execute("DELETE FROM ".STRUCTURE." WHERE idcat=".$row["id"]);
	  return true;
	}
	else
	return false;
  }

  function AddBanner()
  {
	$dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","idcat","url","showurl","target","text","width","height","sort","active");

	$_REQUEST['name']=strclear($_REQUEST['name']);
	$_REQUEST["sort"]=A::$DB->getOne("SELECT MAX(sort) FROM ".STRUCTURE)+1;
	$_REQUEST['active']=isset($_REQUEST['active'])?'Y':'N';
	$_REQUEST['url']=urldecode($_REQUEST['url']);

	if(isset($_REQUEST['showall']))
	$_REQUEST['showurl']="";
	elseif($_REQUEST['showurl'])
	{ $showurls=explode("\n",$_REQUEST['showurl']);
	  foreach($showurls as $i=>$url)
	  if($url=urldecode($url))
	  $showurls[$i]=$url;
	  else
	  unset($showurls[$i]);
	  $_REQUEST['showurl']=implode("\n",$showurls);
	}

	if(isset($_REQUEST['date']))
	{ $_REQUEST['date']="Y";
	  array_push($dataset->fields,"date","date1","date2");
	}

	if(!isset($_REQUEST['showall']) && !empty($_REQUEST['show']))
	{ $_REQUEST['show']=serialize($_REQUEST['show']);
	  array_push($dataset->fields,"show");
	}

	$banner_ext=array("gif","jpg","jpeg","png","swf");
	if(isset($_FILES['bannerfile']['tmp_name']) && file_exists($_FILES['bannerfile']['tmp_name']))
    {
	  $ext=$basename="";
	  escapeFileName($_FILES['bannerfile']['name'],$ext,$basename);
	  $basename=translit($basename);

	  if(in_array($ext,$banner_ext))
	  {
		mk_dir($path="files/".DOMAIN."/rek_images");

	    $_REQUEST["filepath"]=$path."/{$basename}.{$ext}";

		$i=1;
		while(is_file($_REQUEST["filepath"]))
	    $_REQUEST["filepath"]=$path."/{$basename}_".sprintf("%02d",$i++).".{$ext}";

		copyfile($_FILES['bannerfile']['tmp_name'],$_REQUEST["filepath"]);

		$_REQUEST["type"]=$ext=="swf"?"flash":"image";

		array_push($dataset->fields,"filepath","type");

		if($_REQUEST["type"]=="image")
		{ require_once('Image/Transform.php');

	      $it = Image_Transform::factory('GD');
          $it->load($_FILES['bannerfile']['tmp_name']);

		  $_REQUEST["width"]=$it->img_x;
		  $_REQUEST["height"]=$it->img_y;
		}
	  }
	}

    return $dataset->Insert();
  }

  function EditBanner()
  {
	$dataset = new A_DataSet(STRUCTURE);
    $dataset->fields=array("name","idcat","url","showurl","date","target","text","width","height","show","active");

	$_REQUEST['name']=strclear($_REQUEST['name']);
	$_REQUEST['idcat']=$_REQUEST['idcat2'];
	$_REQUEST['active']=isset($_REQUEST['active'])?'Y':'N';
	$_REQUEST['url']=urldecode($_REQUEST['url']);

	if(isset($_REQUEST['showall']))
	$_REQUEST['showurl']="";
	elseif($_REQUEST['showurl'])
	{ $showurls=explode("\n",$_REQUEST['showurl']);
	  foreach($showurls as $i=>$url)
	  if($url=urldecode($url))
	  $showurls[$i]=$url;
	  else
	  unset($showurls[$i]);
	  $_REQUEST['showurl']=implode("\n",$showurls);
	}

	if(isset($_REQUEST['date']))
	{ $_REQUEST['date']="Y";
	  array_push($dataset->fields,"date1","date2");
	}
	else
	$_REQUEST['date']="N";

	if(!isset($_REQUEST['showall']))
	$_REQUEST['show']=!empty($_REQUEST['show'])?serialize($_REQUEST['show']):"";
	else
	$_REQUEST['show']="";

	$banner_ext=array("gif","jpg","jpeg","png","swf");
	if(isset($_FILES['bannerfile']['tmp_name']) && file_exists($_FILES['bannerfile']['tmp_name']))
    {
      $ext=$basename="";
	  escapeFileName($_FILES['bannerfile']['name'],$ext,$basename);
	  $basename=translit($basename);

	  if(in_array($ext,$banner_ext))
	  {
		delfile($dataset->data['filepath']);

	    mk_dir($path="files/".DOMAIN."/rek_images");

	    $_REQUEST["filepath"]=$path."/{$basename}.{$ext}";

		$i=1;
		while(is_file($_REQUEST["filepath"]))
	    $_REQUEST["filepath"]=$path."/{$basename}_".sprintf("%02d",$i++).".{$ext}";

		copyfile($_FILES['bannerfile']['tmp_name'],$_REQUEST["filepath"]);

		$_REQUEST["type"]=$ext=="swf"?"flash":"image";
		array_push($dataset->fields,"filepath","type");

		if($_REQUEST["type"]=="image")
		{ require_once('Image/Transform.php');

	      $it = Image_Transform::factory('GD');
          $it->load($_FILES['bannerfile']['tmp_name']);

		  $_REQUEST["width"]=$it->img_x;
		  $_REQUEST["height"]=$it->img_y;
		}
	  }
	}

    return $dataset->Update();
  }

  function DelBanner($id=0)
  {
    if($id>0) $_REQUEST['id']=$id;

	$dataset = new A_DataSet(STRUCTURE);
    if($row=$dataset->Delete())
	{ delfile($row['filepath']);
	  return true;
	}
	else
	return false;
  }

  function Delete()
  {
    if(isset($_REQUEST['checkban']))
	foreach($_REQUEST['checkban'] as $id)
	$this->DelBanner($id);
	return true;
  }

  function setOn()
  {
    if(isset($_REQUEST['checkban']))
	foreach($_REQUEST['checkban'] as $id)
	A::$DB->execute("UPDATE ".STRUCTURE." SET active='Y' WHERE id=".(integer)$id);
	return true;
  }

  function setOff()
  {
    if(isset($_REQUEST['checkban']))
	foreach($_REQUEST['checkban'] as $id)
	A::$DB->execute("UPDATE ".STRUCTURE." SET active='N' WHERE id=".(integer)$id);
	return true;
  }

  function Reset()
  {
    if(isset($_REQUEST['checkban']))
	foreach($_REQUEST['checkban'] as $id)
	A::$DB->execute("UPDATE ".STRUCTURE." SET views=0,clicks=0 WHERE id=".(integer)$id);
	return true;
  }

  function createData()
  {
	$categories=array();
    A::$DB->query("SELECT * FROM ".STRUCTURE."_categories ORDER BY sort");
    while($row=A::$DB->fetchRow())
	{ $row['count']=A::$DB->getCount(STRUCTURE,"idcat=".$row['id']);
	  $row['selected']=isset($_GET['idcat']) && $_GET['idcat']==$row['id'];
	  $categories[]=$row;
	}
	A::$DB->free();

	$this->Assign("categories",$categories);

	if(empty($_GET['tab']) && !empty($_COOKIE[STRUCTURE.'_idcat']))
	{ $_GET['idcat']=(integer)$_COOKIE[STRUCTURE.'_idcat'];
	  $_REQUEST['tab']="banners";
	}

    if(!empty($_GET['idcat']))
	{
	  if($row=A::$DB->getRowById($idcat=(integer)$_GET['idcat'],STRUCTURE."_categories"))
	  {
	    $this->Assign("category",$row);

	    $rows=(integer)A_Session::get(STRUCTURE."_rows",isset($_COOKIE[STRUCTURE.'_rows'])?$_COOKIE[STRUCTURE.'_rows']:10);

		$banners = array();
		$pager = new A_Pager($rows);
		$pager->tab="banners";
  	    $pager->query("
		SELECT * FROM ".STRUCTURE."
		WHERE idcat=$idcat
		ORDER BY ".A_Session::get(STRUCTURE."_sort",isset($_COOKIE[STRUCTURE.'_sort'])?A::$DB->real_escape_string($_COOKIE[STRUCTURE.'_sort']):"sort"));
	    while($row=$pager->fetchRow())
	    { $row['link']="http://".DOMAINNAME."/getfile/".SNAME."/click/?id=".$row['id'];
		  $row['close']=$row['active']=='N' || ($row['date']=='Y' && !($row['date1']<time() && time()<$row['date2']));
		  $banners[]=$row;
		}
		$pager->free();

	    $this->Assign("banners",$banners);
		$this->Assign("banners_pager",$pager);

		setcookie(STRUCTURE."_idcat",$idcat,time()+31104000);
	  }
	  else
	  setcookie(STRUCTURE."_idcat",0,time()-3600);
	}

	$this->Assign("sort",A_Session::get(STRUCTURE."_sort",isset($_COOKIE[STRUCTURE.'_sort'])?A::$DB->real_escape_string($_COOKIE[STRUCTURE.'_sort']):"sort"));
	$this->Assign("rows",A_Session::get(STRUCTURE."_rows",isset($_COOKIE[STRUCTURE.'_rows'])?$_COOKIE[STRUCTURE.'_rows']:10));
  }
}

A::$MAINFRAME = new Banners_Admin;