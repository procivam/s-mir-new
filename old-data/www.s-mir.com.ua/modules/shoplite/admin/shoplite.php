<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2011 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Modules
 */
/**************************************************************************/

/**
 * Панель управления модуля "Магазин Lite".
 *
 * <a href="http://wiki.a-cms.ru/modules/shoplite">Руководство</a>.
 */

class ShopLiteModule_Admin extends A_MainFrame
{
/**
 * Конструктор.
 */

  function __construct()
  {
    parent::__construct("module_shoplite.tpl");

	$this->AddJScript("/modules/shoplite/admin/shoplite.js");
	$this->AddJScript("/system/objcomp/jscripts/files.js");
	$this->AddJScript("/system/objcomp/jscripts/images.js");
  }

/**
 * Маршрутизатор действий.
 */

  function Action($action)
  {
    switch($action)
    { case "additem": $res=$this->AddItem(); break;
  	  case "edititem": $res=$this->EditItem(); break;
	  case "delitem": $res=$this->DelItem(); break;
	  case "setsort": $res=$this->setSort(); break;
	  case "setrows": $res=$this->setRows(); break;
	  case "setfilter": $res=$this->setFilter(); break;
	  case "unfilter": $res=$this->unFilter(); break;
	  case "setactive": $res=$this->SetActive(); break;
	  case "setunactive": $res=$this->UnActive(); break;
	  case "setfavorite": $res=$this->SetFavorite(); break;
	  case "unfavorite": $res=$this->UnFavorite(); break;
	  case "setnew": $res=$this->SetNew(); break;
	  case "unnew": $res=$this->UnNew(); break;
	  case "delete": $res=$this->Delete(); break;
	  case "moveitems": $res=$this->MoveItems(); break;
	  case "copyitems": $res=$this->CopyItems(); break;
	  case "save": $res=$this->Save(); break;
	  case "settie": $res=$this->setTie(); break;
	  case "delorder": $res=$this->DelOrder(); break;
	  case "setrows2": $res=$this->setRows2(); break;
	  case "setstatus0": $res=$this->setStatus(0); break;
	  case "setstatus1": $res=$this->setStatus(1); break;
	  case "setstatus2": $res=$this->setStatus(2); break;
	  case "odelete": $res=$this->OrdersDelete(); break;
	  case "addcol": $res=$this->AddCol(); break;
	  case "delcol": $res=$this->DelCol(); break;
	  case "import": $res=$this->Import(); break;
	  case "export": $res=$this->Export(); break;
	}
	if(!empty($res))
	A::goUrl("admin.php?mode=sections&item=".SECTION,array('idcat','date','from','to','sum1','sum2','status','pay','tab','page','page1','page3'));
  }

/**
 * Обработчик действия: Установка способа сортировки.
 */

  function setSort()
  {
    A_Session::set(SECTION."_sort",$_REQUEST['sort']);
	setcookie(SECTION."_sort",$_REQUEST['sort'],time()+31104000);
	return true;
  }

/**
 * Обработчик действия: Установка количества строк на странице.
 */

  function setRows()
  {
	A_Session::set(SECTION."_rows",$_REQUEST['rows']);
	setcookie(SECTION."_rows",$_REQUEST['rows'],time()+31104000);
	return true;
  }

/**
 * Обработчик действия: Установка фильтра.
 */

  function setFilter()
  {
	$data=array();
    $data['active']=true;
    $data['name']=A::$DB->real_escape_string(strip_tags($_REQUEST['name']));
    $data['art']=A::$DB->real_escape_string(strip_tags($_REQUEST['art']));
    $data['price1']=!empty($_REQUEST['price1'])?(float)$_REQUEST['price1']:"";
	$data['price2']=!empty($_REQUEST['price2'])?(float)$_REQUEST['price2']:"";
	$data['isfavorite']=A::$DB->real_escape_string($_REQUEST['isfavorite']);
	$data['isnew']=A::$DB->real_escape_string($_REQUEST['isnew']);
	$data['content']=A::$DB->real_escape_string($_REQUEST['content']);
	$data['date']=isset($_REQUEST['date']);
	$data['date1']=(integer)$_REQUEST['from'];
	$data['date2']=(integer)$_REQUEST['to'];
	$data['status']=A::$DB->real_escape_string($_REQUEST['status']);
	$this->fieldseditor_setfilter($data);
	A_Session::set(SECTION."_filter",$data);
	return true;
  }

/**
 * Обработчик действия: Сброс фильтра.
 */

  function unFilter()
  {
    $data=array("active"=>false,"name"=>"","art"=>"","price1"=>"","price2"=>"","isfavorite"=>0,"isnew"=>0,"content"=>"","date"=>false,"status"=>0);
  	$date1=A::$DB->getOne("SELECT MIN(date) FROM ".SECTION."_catalog");
	$data['date1']=$date1>0?$date1:time();
	$data['date2']=time();
	$this->fieldseditor_unfilter($data);
	A_Session::set(SECTION."_filter",$data);
    return true;
  }

/**
 * Обработчик действия: Добавление товара.
 */

  function AddItem()
  {
    $_REQUEST['date']=time();
	$_REQUEST['name']=strip_tags($_REQUEST['name']);
	$_REQUEST['idcat']=(integer)$_REQUEST['idcat'];
	$_REQUEST['idcat1']=isset($_REQUEST['idcat1'])?(integer)$_REQUEST['idcat1']:0;
	$_REQUEST['idcat2']=isset($_REQUEST['idcat2'])?(integer)$_REQUEST['idcat2']:0;
	$_REQUEST['art']=trim($_REQUEST['art']);
	if(!empty($_REQUEST['art']) && A::$DB->existsRow("SELECT id FROM ".SECTION."_catalog WHERE art=?",$_REQUEST['art']))
    { $this->errors['doubleart']=true;
      return false;
    }
	if(empty($_REQUEST['urlname']) && !empty(A::$OPTIONS['idrule']))
    { $data=$_REQUEST;
      prepareValues(SECTION,$data);
      $litems=array();
	  $idrule=A::$OPTIONS['idrule'];
	  $idrule=explode("+",$idrule);
	  foreach($idrule as $fname)
	  if(!empty($data[$fname]))
	  $litems[]=getURLName($data[$fname]);
	  $_REQUEST['urlname']=implode(!empty($GLOBALS['A_URL_SEPARATOR'])?$GLOBALS['A_URL_SEPARATOR']:"_",$litems);
	}
	$_REQUEST['urlname']=getURLName($_REQUEST['name'],$_REQUEST['urlname'],SECTION."_catalog","idcat=".(integer)$_REQUEST['idcat']);
	$_REQUEST['price']=(float)str_replace(',','.',$_REQUEST['price']);
	$_REQUEST['oldprice']=(float)str_replace(',','.',$_REQUEST['oldprice']);
	$_REQUEST['iscount']=(integer)$_REQUEST['iscount'];
	$_REQUEST['active']=isset($_REQUEST['active'])?"Y":"N";
	$_REQUEST['favorite']=isset($_REQUEST['favorite'])?"Y":"N";
	$_REQUEST['new']=isset($_REQUEST['new'])?"Y":"N";
	$_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".SECTION."_catalog")+1;
	$_REQUEST['keywords']=getkeywords($_REQUEST['content']);
	if(A::$OPTIONS['autoanons'])
	$_REQUEST['description']=truncate($_REQUEST['content'],A::$OPTIONS['anonslen']);

    $dataset = new A_DataSet(SECTION."_catalog",true);
    $dataset->fields=array("date","idcat","idcat1","idcat2","name","art","tags","urlname","description","keywords","content","price","oldprice","iscount","favorite","new","active","sort");

    if(A::$OPTIONS['modprices'])
	{ $mprices=array();
	  for($i=1;$i<=10;$i++)
	  if(!empty($_REQUEST["mprice{$i}_text"]) && !empty($_REQUEST["mprice{$i}_price"]))
	  $mprices[]=array('name'=>$_REQUEST["mprice{$i}_text"],'price'=>(float)$_REQUEST["mprice{$i}_price"]);
	  if(count($mprices)>0)
	  { $_REQUEST['price']=$mprices[0]['price'];
	    $_REQUEST['mprices']=serialize($mprices);
	    $dataset->fields[]='mprices';
	  }
	}

    if($id=$dataset->Insert())
	{
	  for($i=1;$i<=5;$i++)
	  if(isset($_REQUEST["imagedescription$i"]))
	  UploadImage("image$i",$_REQUEST["imagedescription$i"],0,$id,$i);
	  for($i=1;$i<=5;$i++)
	  if(isset($_REQUEST["filedescription$i"]))
	  UploadFile("file$i",$_REQUEST["filedescription$i"],0,$id,$i);

	  $path=getTreePath(SECTION."_categories",$_REQUEST['idcat']," - ");
	  $name=!empty($path)?$path.' - '.$_REQUEST['name']:$_REQUEST['name'];

	  if($_REQUEST['active']=='Y')
	  A::$OBSERVER->Event('searchIndexUpdate',SECTION,array('id'=>$id,'name'=>$name,'content'=>$_REQUEST['content'],'tags'=>$_REQUEST['tags']));

	  self::updateCategoryItems($_REQUEST['idcat']);
	  self::updateCategoryItems($_REQUEST['idcat1']);
	  self::updateCategoryItems($_REQUEST['idcat2']);

	  unset($_POST['idcat']);

	  return $id;
	}
	else
	return false;
  }

/**
 * Обработчик действия: Изменение товара.
 */

  function EditItem()
  {
	$_REQUEST['date']=time();
	$_REQUEST['name']=strip_tags($_REQUEST['name']);
	$_REQUEST['idcat']=(integer)$_REQUEST['idcat'];
	$_REQUEST['idcat1']=isset($_REQUEST['idcat1'])?(integer)$_REQUEST['idcat1']:0;
	$_REQUEST['idcat2']=isset($_REQUEST['idcat2'])?(integer)$_REQUEST['idcat2']:0;
	$_REQUEST['art']=trim($_REQUEST['art']);
	if(!empty($_REQUEST['art']) && A::$DB->existsRow("SELECT id FROM ".SECTION."_catalog WHERE art=? AND id<>".(integer)$_REQUEST['id'],$_REQUEST['art']))
    { $this->errors['doubleart']=true;
      return false;
    }
    if(empty($_REQUEST['urlname']) && !empty(A::$OPTIONS['idrule']))
    { $data=$_REQUEST;
      prepareValues(SECTION,$data);
      $litems=array();
	  $idrule=A::$OPTIONS['idrule'];
	  $idrule=explode("+",$idrule);
	  foreach($idrule as $fname)
	  if(!empty($data[$fname]))
	  $litems[]=getURLName($data[$fname]);
	  $_REQUEST['urlname']=implode(!empty($GLOBALS['A_URL_SEPARATOR'])?$GLOBALS['A_URL_SEPARATOR']:"_",$litems);
	}
	$_REQUEST['urlname']=getURLName($_REQUEST['name'],$_REQUEST['urlname'],SECTION."_catalog","idcat=".(integer)$_REQUEST['idcat']." AND id<>".(integer)$_REQUEST['id']);
	$_REQUEST['price']=(float)str_replace(',','.',$_REQUEST['price']);
	$_REQUEST['oldprice']=(float)str_replace(',','.',$_REQUEST['oldprice']);
	$_REQUEST['iscount']=(integer)$_REQUEST['iscount'];
	$_REQUEST['active']=isset($_REQUEST['active'])?"Y":"N";
	$_REQUEST['favorite']=isset($_REQUEST['favorite'])?"Y":"N";
	$_REQUEST['new']=isset($_REQUEST['new'])?"Y":"N";
	$_REQUEST['keywords']=getkeywords($_REQUEST['content']);
	if(A::$OPTIONS['autoanons'])
	$_REQUEST['description']=truncate($_REQUEST['content'],A::$OPTIONS['anonslen']);

    $dataset = new A_DataSet(SECTION."_catalog",true);
    $dataset->fields=array("idcat","idcat1","idcat2","name","art","tags","urlname","description","keywords","content","price","oldprice","iscount","favorite","new","active");

    if(A::$OPTIONS['modprices'])
	{ $mprices=array();
	  for($i=1;$i<=10;$i++)
	  if(!empty($_REQUEST["mprice{$i}_text"]) && !empty($_REQUEST["mprice{$i}_price"]))
	  $mprices[]=array('name'=>$_REQUEST["mprice{$i}_text"],'price'=>(float)$_REQUEST["mprice{$i}_price"]);
	  if(count($mprices)>0)
	  { $_REQUEST['price']=$mprices[0]['price'];
	    $_REQUEST['mprices']=serialize($mprices);
	  }
	  else
	  $_REQUEST['mprices']="";
	  $dataset->fields[]='mprices';
	}

    if($row=$dataset->Update())
	{
	  $path=getTreePath(SECTION."_categories",$_REQUEST['idcat']," - ");
	  $name=!empty($path)?$path.' - '.$_REQUEST['name']:$_REQUEST['name'];

	  if($_REQUEST['active']=='Y')
	  A::$OBSERVER->Event('searchIndexUpdate',SECTION,array('id'=>$row['id'],'name'=>$name,'content'=>$_REQUEST['content'],'tags'=>$_REQUEST['tags']));
	  else
	  A::$OBSERVER->Event('searchIndexDelete',SECTION,array('id'=>$row['id']));

  	  if($_REQUEST['idcat']!=$row['idcat'])
	  { self::updateCategoryItems($_REQUEST['idcat']);
	    self::updateCategoryItems($row['idcat']);
	  }
	  if($_REQUEST['idcat1']!=$row['idcat1'])
	  { self::updateCategoryItems($_REQUEST['idcat1']);
	    self::updateCategoryItems($row['idcat1']);
	  }
	  if($_REQUEST['idcat2']!=$row['idcat2'])
	  { self::updateCategoryItems($_REQUEST['idcat2']);
	    self::updateCategoryItems($row['idcat2']);
      }

      unset($_POST['idcat']);
	  return true;
	}
	else
	return false;
  }

/**
 * Обработчик действия: Удаление товара.
 *
 * @param integer $id=0 Идентификатор товара.
 */

  function DelItem($id=0)
  {
	if($id>0)
	$_REQUEST['id']=$id;

	$dataset = new A_DataSet(SECTION."_catalog",true);
    if($row=$dataset->Delete())
	{ DelRegSectionItemImages(SECTION_ID,$row['id']);
	  DelRegSectionItemFiles(SECTION_ID,$row['id']);

	  A::$DB->execute("DELETE FROM ".DOMAIN."_comments WHERE idsec=".SECTION_ID." AND iditem=".$row['id']);
	  A::$OBSERVER->Event('searchIndexDelete',SECTION,array('id'=>$row['id']));

	  if($id==0)
	  { self::updateCategoryItems($row['idcat']);
	    self::updateCategoryItems($row['idcat1']);
	    self::updateCategoryItems($row['idcat2']);
	  }

	  return true;
	}
	else
	return false;
  }

/**
 * Обновление количества записей во всех категориях.
 *
 */

  function updateCItems($idcat=0,$mode=false)
  {
    $count=0;
	$subids=A::$DB->getCol("SELECT id FROM ".SECTION."_categories WHERE idker={$idcat} AND active='Y' ORDER BY sort");
	foreach($subids as $id)
	$count+=self::updateCItems($id,$mode);
	if($idcat>0)
	{ if($mode)
	  $count+=A::$DB->getOne("SELECT citems FROM ".SECTION."_categories WHERE id=$idcat AND active='Y'");
	  else
	  $count+=A::$DB->getCount(SECTION."_catalog","idcat={$idcat} AND active='Y'");
	  A::$DB->execute("UPDATE ".SECTION."_categories SET citems={$count} WHERE id={$idcat}");
	}
	return $count;
  }

/**
 * Обновление количества записей в категории.
 *
 * @param integer $idcat Идентификатор категории.
 */

  function updateCategoryItems($idcat)
  { static $cache=array();
    if($idcat>0 && !isset($cache[$idcat]))
	if($category=A::$DB->getRowById($idcat,SECTION."_categories"))
    { $count=A::$DB->getCount(SECTION."_catalog","(idcat={$idcat} OR idcat1={$idcat} OR idcat2={$idcat}) AND active='Y'");
      $subcount=A::$DB->getOne("SELECT SUM(citems) FROM ".SECTION."_categories WHERE idker={$idcat} AND active='Y'");
      $citems=$count+$subcount;
      $sub=$citems-$category['citems'];
      A::$DB->Update(SECTION."_categories",array('citems'=>$citems),"id=".$category['id']);
      while($category['idker']>0)
      if($category=A::$DB->getRowById($category['idker'],SECTION."_categories"))
      A::$DB->Update(SECTION."_categories",array('citems'=>$category['citems']+$sub),"id=".$category['id']);
      $cache[$idcat]=true;
    }
  }

/**
 * Обработчик события: Удаление ветки категорий.
 *
 * @param string $section Полный строковой идентификатор раздела.
 * @param array $params Параметры события.
 */

  function DeleteCategory($section,$params)
  {
    @set_time_limit(0);
	$idcat=(integer)$params['id'];
	A::$DB->query("
	SELECT id FROM ".SECTION."_catalog
	WHERE (idcat={$idcat} AND idcat1=0 AND idcat2=0)OR(idcat=0 AND idcat1={$idcat} AND idcat2=0)OR(idcat=0 AND idcat1=0 AND idcat2={$idcat})");
    while($row=A::$DB->fetchRow())
    self::DelItem($row['id']);
    A::$DB->free();
	self::updateCategoryItems($params['idker']);
  }

/**
 * Обработчик события: Перемещение категории.
 *
 * @param string $section Полный строковой идентификатор раздела.
 * @param array $params Параметры события.
 */

  function MoveCategory($section,$params)
  {
    self::updateCategoryItems($params['idker']);
	self::updateCategoryItems($params['idto']);
  }

/**
 * Обработчик события: Изменение активности категории.
 *
 * @param string $section Полный строковой идентификатор раздела.
 * @param array $params Параметры события.
 */

  function ActiveCategory($section,$params)
  {
	$idcat=!empty($params['id'])?(integer)$params['id']:0;
	$cats=array($idcat);
	if($idcat>0)
	{ getTreeSubItems(SECTION."_categories",$idcat,$cats);
	  $active=!empty($params['active'])&&$params['active']=='N'?'N':'Y';
	  $ids=A::$DB->getCol("
	  SELECT id FROM ".SECTION."_catalog WHERE idcat IN(".implode(",",$cats).")");
	  foreach($ids as $id)
	  { A::$DB->execute("UPDATE ".SECTION."_catalog SET active='{$active}' WHERE id=$id");
	    if($active=='N')
	    A::$OBSERVER->Event('searchIndexDelete',SECTION,array('id'=>$id));
	  }
    }
    foreach($cats as $idcat)
	self::updateCategoryItems($idcat);
  }

/**
 * Обработчик действия: Включение группы товаров.
 */

  function SetActive()
  {
    if(!empty($_REQUEST['checkitem']))
	{ $cats=array();
	  foreach($_REQUEST['checkitem'] as $id)
	  if($row=A::$DB->getRowById($id,SECTION."_catalog"))
	  { A::$DB->execute("UPDATE ".SECTION."_catalog SET active='Y' WHERE id=".(integer)$id);
	    $cats[$row['idcat']]=true;
	    $cats[$row['idcat1']]=true;
	    $cats[$row['idcat2']]=true;
	  }
	  $cats=array_keys($cats);
	  foreach($cats as $idcat)
	  self::updateCategoryItems($idcat);
	}
	return true;
  }

/**
 * Обработчик действия: Выключение группы товаров.
 */

  function UnActive()
  {
	if(!empty($_REQUEST['checkitem']))
	{ $cats=array();
	  foreach($_REQUEST['checkitem'] as $id)
	  if($row=A::$DB->getRowById($id,SECTION."_catalog"))
	  { A::$DB->execute("UPDATE ".SECTION."_catalog SET active='N' WHERE id=".(integer)$id);
	    A::$OBSERVER->Event('searchIndexDelete',SECTION,array('id'=>(integer)$id));
	    $cats[$row['idcat']]=true;
	    $cats[$row['idcat1']]=true;
	    $cats[$row['idcat2']]=true;
	  }
	  $cats=array_keys($cats);
	  foreach($cats as $idcat)
	  self::updateCategoryItems($idcat);
	}
	return true;
  }

/**
 * Обработчик действия: Установка метки "Спецпредложение" для группы товаров.
 */

  function SetFavorite()
  {
    if(!empty($_REQUEST['checkitem']))
	foreach($_REQUEST['checkitem'] as $id)
	A::$DB->execute("UPDATE ".SECTION."_catalog SET favorite='Y' WHERE id=".(integer)$id);
	return true;
  }

/**
 * Обработчик действия: Снятие метки "Спецпредложение" для группы товаров.
 */

  function UnFavorite()
  {
    if(!empty($_REQUEST['checkitem']))
	foreach($_REQUEST['checkitem'] as $id)
	A::$DB->execute("UPDATE ".SECTION."_catalog SET favorite='N' WHERE id=".(integer)$id);
	return true;
  }

/**
 * Обработчик действия: Установка метки "Новинка" для группы товаров.
 */

  function SetNew()
  {
    if(!empty($_REQUEST['checkitem']))
	foreach($_REQUEST['checkitem'] as $id)
	A::$DB->execute("UPDATE ".SECTION."_catalog SET new='Y' WHERE id=".(integer)$id);
	return true;
  }

/**
 * Обработчик действия: Снятие метки "Новинка" для группы товаров.
 */

  function UnNew()
  {
    if(!empty($_REQUEST['checkitem']))
	foreach($_REQUEST['checkitem'] as $id)
	A::$DB->execute("UPDATE ".SECTION."_catalog SET new='N' WHERE id=".(integer)$id);
	return true;
  }

/**
 * Обработчик действия: Удаление группы товаров.
 */

  function Delete()
  {
    if(!empty($_REQUEST['checkitem']))
	{ $cats=array();
	  foreach($_REQUEST['checkitem'] as $id)
	  if($row=A::$DB->getRowById($id,SECTION."_catalog"))
	  { $this->DelItem($id);
	    $cats[$row['idcat']]=true;
	    $cats[$row['idcat1']]=true;
	    $cats[$row['idcat2']]=true;
	  }
	  $cats=array_keys($cats);
	  foreach($cats as $idcat)
	  self::updateCategoryItems($idcat);
	}
	return true;
  }

/**
 * Обработчик действия: Перемещение группы товаров.
 */

  function MoveItems()
  {
	$idto=(integer)$_REQUEST['idto'];
	$cats=array();

	if(!empty($_REQUEST['checkitem']))
	foreach($_REQUEST['checkitem'] as $id)
	if($data=A::$DB->getRowById($id,SECTION."_catalog"))
	{ if($data['idcat']==$idto) continue;

	  $update=array();
	  $update['idcat']=$idto;

	  if(!empty(A::$OPTIONS['idrule']))
      { prepareValues(SECTION,$data);
        $litems=array();
	    $idrule=A::$OPTIONS['idrule'];
	    $idrule=explode("+",$idrule);
	    foreach($idrule as $fname)
	    if(!empty($data[$fname]))
	    $litems[]=getURLName($data[$fname]);
	    $data['urlname']=implode(!empty($GLOBALS['A_URL_SEPARATOR'])?$GLOBALS['A_URL_SEPARATOR']:"_",$litems);
	  }

	  $update['urlname']=getURLName($data['name'],$data['urlname'],SECTION."_catalog","idcat={$idto}");
	  A::$DB->Update(SECTION."_catalog",$update,"id=".(integer)$id);

	  $path=getTreePath(SECTION."_categories",$idto," - ");
	  $name=!empty($path)?$path.' - '.$data['name']:$data['name'];

	  if($data['active']=='Y')
	  A::$OBSERVER->Event('searchIndexUpdate',SECTION,array('id'=>$id,'name'=>$name,'content'=>$data['content'],'tags'=>$data['tags']));

      $cats[$data['idcat']]=true;
	}

	$cats=array_keys($cats);
    foreach($cats as $idcat)
	self::updateCategoryItems($idcat);
	self::updateCategoryItems($idto);

	return true;
  }

/**
 * Обработчик действия: Копирование группы товаров.
 */

  function CopyItems()
  {
	if(!isset($_REQUEST['checkitem'])) return false;

	$idcat=(integer)$_REQUEST['idcat'];
	$count=(integer)$_REQUEST['count'];
	$path=getTreePath(SECTION."_categories",$idcat," - ");

	foreach($_REQUEST['checkitem'] as $id)
	if($data=A::$DB->getRowById($id,SECTION."_catalog"))
	{ $images=A::$DB->getAll("
	  SELECT * FROM ".DOMAIN."_images
	  WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$id));
	  $files=A::$DB->getAll("
	  SELECT * FROM ".DOMAIN."_files
	  WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$id));
	  $data['idcat']=$idcat;
	  unset($data['id']);

	  $urlname=$data['urlname'];

	  for($i=1;$i<=$count;$i++)
	  {
	    if(mb_strlen($urlname)<=98)
	    $data['urlname']=$urlname.sprintf("%02d",$i);
	    else
	    $data['urlname']=preg_replace("/[a-zA-Z0-9-_]{2}$/i",sprintf("%02d",$i),$urlname);
	    $data['urlname']=getURLName($data['name'],$data['urlname'],SECTION."_catalog","idcat={$idcat}");

	    if($newid=A::$DB->Insert(SECTION."_catalog",$data))
	    { foreach($images as $image)
	      { unset($image['id']);
	        $image['iditem']=$newid;
	        $newpath=preg_replace("/\.([a-z0-9]+)$/i","_$i.\\1",$image['path']);
	        copyfile($image['path'],$newpath);
	        $image['path']=$newpath;
	        A::$DB->Insert(DOMAIN."_images",$image);
	      }
	      foreach($files as $file)
	      { unset($file['id']);
	        $file['iditem']=$newid;
	        $newpath=preg_replace("/\.([a-z0-9]+)$/i","_$i.\\1",$file['path']);
	        copyfile($file['path'],$newpath);
	        $file['path']=$newpath;
	        A::$DB->Insert(DOMAIN."_files",$file);
	      }
	    }
	    $name=!empty($path)?$path.' - '.$data['name']:$data['name'];
	    if($data['active']=='Y')
	    A::$OBSERVER->Event('searchIndexUpdate',SECTION,array('id'=>$id,'name'=>$name,'content'=>$data['content'],'tags'=>$data['tags']));
	  }
	}

	self::updateCategoryItems($idcat);
	return true;
  }

/**
 * Обработчик действия: Сохранение групповых значений.
 */

  function Save()
  {
	$sort=A_Session::get(SECTION."_sort",isset($_COOKIE[SECTION.'_sort'])?$_COOKIE[SECTION.'_sort']:A::$OPTIONS['sort']);
	if(isset($_REQUEST['edititem']))
    foreach($_REQUEST['edititem'] as $id)
	if($row=A::$DB->getRowById($id,SECTION."_catalog"))
	{ $data=array();
	  if($sort=='sort')
	  $data['sort']=isset($_REQUEST['sort_'.$id])?(integer)$_REQUEST['sort_'.$id]:0;
	  $data['price']=isset($_REQUEST['price_'.$id])?(float)str_replace(',','.',$_REQUEST['price_'.$id]):0;
	  if(A::$OPTIONS['onlyavailable'])
	  $data['iscount']=isset($_REQUEST['iscount_'.$id])?(integer)$_REQUEST['iscount_'.$id]:0;
	  if(isset($_REQUEST['vote_'.$id]))
	  { $vote=$row['cvote']>0?round($row['svote']/$row['cvote'],2):0;
	    $_REQUEST['vote_'.$id]=(float)$_REQUEST['vote_'.$id];
	    if($_REQUEST['vote_'.$id]!=$vote)
		{ if(empty($_REQUEST['vote_'.$id]))
		  { $data['cvote']=0;
	        $data['svote']=0;
		  }
		  else
		  { for($cvote=1;$cvote<100;$cvote++)
		    { $svote=$_REQUEST['vote_'.$id]*$cvote;
		      if($svote==round($svote,0))
			  { $data['cvote']=$cvote;
		        $data['svote']=$svote;
			    break;
			  }
		    }
		  }
		}
	  }
	  A::$DB->Update(SECTION."_catalog",$data,"id=".(integer)$id);
	}
	return true;
  }

/**
 * Обработчик действия: Установка сопутствующих товаров.
 */

  function setTie()
  {
	$data=A::$DB->getRowById($_REQUEST['id'],SECTION."_catalog");
	$ties = !empty($data['ties'])?unserialize($data['ties']):array();
	$oldties = $ties;

	if(isset($_REQUEST['opencategory']))
	foreach($_REQUEST['opencategory'] as $id)
	if(!empty($ties[$id]))
	$ties[$id]=array();

	if(isset($_REQUEST['checkgood']))
	foreach($_REQUEST['checkgood'] as $id)
	{ $grow=A::$DB->getRowById($id,SECTION."_catalog");
      $ties[$grow['idcat']][]=$id;
	  $sties=!empty($grow['ties'])?unserialize($grow['ties']):array();
	  if(empty($sties[$data['idcat']]) || !in_array($_REQUEST['id'],$sties[$data['idcat']]))
	  $sties[$data['idcat']][]=$data['id'];
	  A::$DB->Update(SECTION."_catalog",array('ties'=>serialize($sties)),"id=$id");
	}

	$ties=serialize($ties);
	A::$DB->Update(SECTION."_catalog",array('ties'=>$ties),"id={$data['id']}");

	foreach($oldties as $idcat=>$ties)
	foreach($ties as $id)
	if(empty($_REQUEST['checkgood']) || !in_array($id,$_REQUEST['checkgood']))
	{ $grow=A::$DB->getRowById($id,SECTION."_catalog");
	  $sties=!empty($grow['ties'])?unserialize($grow['ties']):array();
	  if(isset($sties[$data['idcat']]) && in_array($_REQUEST['id'],$sties[$data['idcat']]))
	  { $i=array_search($_REQUEST['id'],$sties[$data['idcat']]);
	    unset($sties[$data['idcat']][$i]);
	  }
	  A::$DB->Update(SECTION."_catalog",array('ties'=>serialize($sties)),"id=$id");
	}

	return true;
  }

/**
 * Обработчик действия: Удаление заказа.
 */

  function DelOrder()
  {
    A::$DB->execute("DELETE FROM ".SECTION."_orders WHERE id=".(integer)$_REQUEST['id']);
	return true;
  }

/**
 * Обработчик действия: Установка количества строк в таблице заказов.
 */

  function setRows2()
  {
	A_Session::set(SECTION."_rows2",$_REQUEST['rows']);
	return true;
  }

/**
 * Обработчик действия: Установка статуса заказа.
 */

  function setStatus($status)
  {
    if(isset($_REQUEST['checkorder']))
	foreach($_REQUEST['checkorder'] as $id)
	if($row=A::$DB->getRowById($id,SECTION."_orders"))
	{ A::$DB->execute("UPDATE ".SECTION."_orders SET status={$status} WHERE id=".(integer)$id);
	  if($status==2 && A::$OPTIONS['onlyavailable'])
	  { $basket=!empty($row['basket'])?unserialize($row['basket']):array();
	    foreach($basket as $brow)
        A::$DB->execute("UPDATE ".SECTION."_catalog SET iscount=iscount-{$brow['count']} WHERE id={$brow['data']['id']}");
      }
	}
	return true;
  }

/**
 * Обработчик действия: Удаление группы заказов.
 */

  function OrdersDelete()
  {
    if(isset($_REQUEST['checkorder']))
	foreach($_REQUEST['checkorder'] as $id)
	A::$DB->execute("DELETE FROM ".SECTION."_orders WHERE id=".(integer)$id);
	return true;
  }

/**
 * Обработчик действия: Добавление столбца в структуру импорта.
 */

  function AddCol()
  {
	$fields=array();
	for($i=0;$i<3;$i++)
	$fields['category'.$i]=array('field'=>'category'.$i,'name'=>'Категория ур.'.($i+1),'type'=>'string');
	$fields['name']=array('field'=>'name','name'=>'Название','type'=>'string');
	$fields['content']=array('field'=>'content','name'=>'Описание','type'=>'string');
	$fields['description']=array('field'=>'description','name'=>'Аннотация','type'=>'text');
	$fields['art']=array('field'=>'art','name'=>'Артикул','type'=>'string');
	$fields['mprice']=array('field'=>'mprice','name'=>'Модификатор','type'=>'mprice');
	$fields['price']=array('field'=>'price','name'=>'Цена','type'=>'float');
	$fields['oldprice']=array('field'=>'oldprice','name'=>'Прошлая цена','type'=>'float');
	$fields['iscount']=array('field'=>'iscount','name'=>'Количество','type'=>'int');
	$fields['active']=array('field'=>'active','name'=>'Активен','type'=>'bool');
	$fields['favorite']=array('field'=>'favorite','name'=>'Спецпредложение','type'=>'bool');
    $fields['new']=array('field'=>'new','name'=>'Новинка','type'=>'bool');
    $fields['tags']=array('field'=>'tags','name'=>'Теги','type'=>'string');
	for($i=0;$i<3;$i++)
	$fields['idimg'.$i]=array('field'=>'idimg'.$i,'name'=>'Фото '.($i+1),'type'=>'image');
	for($i=0;$i<3;$i++)
	$fields['idfile'.$i]=array('field'=>'idfile'.$i,'name'=>'Файл '.($i+1),'type'=>'file');
	$sort=A_Session::get(SECTION."_sort",isset($_COOKIE[SECTION.'_sort'])?$_COOKIE[SECTION.'_sort']:A::$OPTIONS['sort']);
	if($sort=='sort')
	$fields['sort']=array('field'=>'sort','name'=>'Порядок','type'=>'int');
	A::$DB->query("SELECT * FROM ".DOMAIN."_fields WHERE item='".SECTION."' AND type<>'file' AND type<>'image' AND type<>'date' ORDER BY sort");
    while($row=A::$DB->fetchRow())
	{ if($row['type']=='format') $row['type']='text';
	  $fields[$row['field']]=array('field'=>$row['field'],'name'=>$row['name_'.DEFAULTLANG],'type'=>$row['type']);
	}
	A::$DB->free();

    $_REQUEST['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".SECTION."_cols")+1;
    $_REQUEST['caption']=$fields[$_REQUEST['field']]['name'];
	$_REQUEST['type']=$fields[$_REQUEST['field']]['type'];

	$dataset = new A_DataSet(SECTION."_cols");
    $dataset->fields=array("id","field","caption","type","sort");
    return $dataset->Insert();
  }

/**
 * Обработчик действия: Удаление столбца в структуре импорта.
 */

  function DelCol()
  {
  	$dataset = new A_DataSet(SECTION."_cols");
    return $dataset->Delete();
  }

/**
 * Обработчик действия: Импорт каталога.
 */

  function Import()
  {
    @set_time_limit(0);

    require_once "Structures/DataGrid.php";
    require_once "Structures/DataGrid/DataSource/Excel.php";
	require_once "Structures/DataGrid/DataSource/CSV.php";
	require_once('Image/Transform.php');

	mk_dir("files/".DOMAIN."/tmp");
    clearDir("files/".DOMAIN."/tmp");

    if(isset($_FILES['file']['tmp_name']) && file_exists($_FILES['file']['tmp_name']))
    { $path_parts=pathinfo($_FILES['file']['name']);
	  $ext=preg_replace("/[^a-z0-9]+/i","",mb_strtolower($path_parts['extension']));
	  if($ext=='xls' || $ext=='csv' || $ext=='gz')
	  { if($ext=='gz')
        { if(extractArchive($_FILES['file']['tmp_name'],"files/".DOMAIN."/tmp"))
		  { $sourcefile1=preg_replace("/tar\.gz$/i","xls",$_FILES['file']['name']);
		    $sourcefile2=preg_replace("/tar\.gz$/i","csv",$_FILES['file']['name']);
			if(is_file("files/".DOMAIN."/tmp/$sourcefile1"))
			{ $sourcefile="files/".DOMAIN."/tmp/$sourcefile1";
			  $ext="xls";
			}
			elseif(is_file("files/".DOMAIN."/tmp/$sourcefile2"))
			{ $sourcefile="files/".DOMAIN."/tmp/$sourcefile2";
			  $content=@file_get_contents($sourcefile);
			  if($content && !mb_check_encoding($content,'UTF-8'))
			  file_put_contents($sourcefile,mb_convert_encoding($content,'UTF-8','Windows-1251'));
			  $ext="csv";
			}
			else
			return false;
		  }
		  else
		  return false;
		}
		elseif($ext=='csv')
		{ $sourcefile=$_FILES['file']['tmp_name'];
		  $content=@file_get_contents($sourcefile);
		  if($content && !mb_check_encoding($content,'UTF-8'))
		  file_put_contents($sourcefile,mb_convert_encoding($content,'UTF-8','Windows-1251'));
		}
		else
		$sourcefile=$_FILES['file']['tmp_name'];

		if(!empty($_REQUEST['clear']))
		switch($_REQUEST['clear'])
		{ case 1:
		    A::$DB->execute("TRUNCATE ".SECTION."_categories");
		  case 2:
		    A::$DB->execute("TRUNCATE ".SECTION."_catalog");
	        A::$DB->execute("DELETE FROM ".DOMAIN."_images WHERE idsec=".SECTION_ID." AND iditem>0");
		    A::$DB->execute("DELETE FROM ".DOMAIN."_files WHERE idsec=".SECTION_ID." AND iditem>0");
		    A::$DB->execute("DELETE FROM ".DOMAIN."_comments WHERE idsec=".SECTION_ID);
		    A_SearchEngine::getInstance()->deleteSection(SECTION_ID);
		    break;
		}

		A::$OPTIONS['imgpath']=!empty(A::$OPTIONS['imgpath'])?preg_replace("/[^a-zA-Z0-9-_\/]/i","",A::$OPTIONS['imgpath']):"ifiles";
		A::$OPTIONS['filepath']=!empty(A::$OPTIONS['filepath'])?preg_replace("/[^a-zA-Z0-9-_\/]/i","",A::$OPTIONS['filepath']):"ifiles";

		$categories=array();
		$fields=array();
		$cfiles=array();
		A::$DB->query("SELECT * FROM ".SECTION."_cols ORDER BY sort");
		$i=0;
		while($row=A::$DB->fetchRow())
		{ if($row['type']=='select'||$row['type']=='mselect')
		  { if($row['idvar']=A::$DB->getOne("SELECT property FROM ".DOMAIN."_fields WHERE item='".SECTION."' AND field='{$row['field']}'"))
		    { if(isset($vars[$row['idvar']]))
		      $row['vars']=&$vars[$row['idvar']];
			  else
			  { $row['vars']=array();
		        $_vars=loadList($row['idvar']);
	            foreach($_vars as $key=>$name)
	            $row['vars'][$key]=is_array($name)?$name['name']:$name;
	            $vars[$row['idvar']]=&$row['vars'];
	          }
	        }
		  }
		  $row['id']=$i++;
		  if(preg_match("/^category[0-9]{1}$/i",$row['field']))
		  $categories[$row['field']]=$row;
		  elseif($row['type']=='image' || $row['type']=='file')
		  $cfiles[$row['field']]=$row;
		  else
		  $fields[$row['field']]=$row;
		}
		A::$DB->free();

		if($ext=='xls')
		{ $datasource = new Structures_DataGrid_DataSource_Excel();
		  $datasource->bind($sourcefile);
		}
		elseif($ext=='csv')
		{ $datasource = new Structures_DataGrid_DataSource_CSV();
		  $datasource->bind($sourcefile,array('delimiter'=>';','enclosure' =>'"'));
		}
		else
		return false;

        $datagrid = new Structures_DataGrid();
        $datagrid->bindDataSource($datasource);

        A::$DB->caching=false;

        $prevgoods=A::$DB->getCount(SECTION."_catalog","active='Y'");
        $curgoods=0;
		$arts=array();
		$catn=array();
		$catr=array();
        $cats=array();
		$i=0;

		$gsort=A::$DB->getOne("SELECT MAX(sort) FROM ".SECTION."_catalog")+1;

		foreach($datagrid->recordSet as $row)
        { $i++;
		  if($i==1) continue;
		  if(empty($row)) continue;

		  if($ext=='xls')
		  { $trow=array();
		    foreach($row as $j=>$value)
		    if(!empty($value))
			$trow[$j-1]=$value;
			$row=$trow;
		  }

		  $idcat=0;
		  for($j=0;$j<3;$j++)
		  if(isset($categories['category'.$j]) && !empty($row[$categories['category'.$j]['id']]))
		  { if($cname=strip_tags(trim($row[$categories['category'.$j]['id']])))
		    { $ch=md5($idcat.'|'.$cname);
			  if(isset($catn[$ch]))
			  $idcat=$catn[$ch];
			  elseif($_idcat=A::$DB->getOne("SELECT id FROM ".SECTION."_categories WHERE idker={$idcat} AND name=?",$cname))
			  $idcat=$catn[$ch]=$_idcat;
			  else
			  { if(!isset($catr[$idcat]))
				$catr[$idcat]=A::$DB->getRowById($idcat,SECTION."_categories");
			    $category=array();
			    $category['name']=$cname;
			    $category['urlname']=getURLName($cname);
			    $category['idker']=$idcat;
			    $category['level']=isset($catr[$idcat]['level'])?$catr[$idcat]['level']+1:0;
			    $category['sort']=A::$DB->getOne("SELECT MAX(sort) FROM ".SECTION."_categories WHERE idker={$idcat}")+1;
			    $idcat=$catn[$ch]=A::$DB->Insert(SECTION."_categories",$category);
			  }
			}
		  }

		  if($idcat==0 && empty($row[$fields['art']['id']])) continue;

		  $data=array();
		  $data['date']=time();
		  if($idcat>0)
  	      { $data['idcat']=$idcat;
  	        if(!isset($cats[$idcat]))
  	        $cats[$idcat]=1;
  	        else
  	        $cats[$idcat]++;
  	      }
  	      $data['idcat1']=0;
  	      $data['idcat2']=0;

		  foreach($fields as $field=>$frow)
		  if(!isset($_REQUEST['iempty']) || !empty($row[$frow['id']]))
		  switch($frow['type'])
		  { default:
		      $data[$field]=!empty($row[$frow['id']])?trim($row[$frow['id']]):"";
			  break;
			case 'int':
			  $data[$field]=!empty($row[$frow['id']])?(integer)$row[$frow['id']]:0;
			  break;
			case 'float':
			  $data[$field]=!empty($row[$frow['id']])?(float)str_replace(',','.',$row[$frow['id']]):0;
			  break;
		    case 'select':
			  if(!empty($row[$frow['id']]))
			  { if(isset($frow['vars']))
			    { $row[$frow['id']]=trim($row[$frow['id']]);
				  $key=array_search($row[$frow['id']],$frow['vars']);
			      if(empty($key) && !empty($row[$frow['id']]))
			      { $key=addToList($frow['idvar'],$row[$frow['id']]);
			        $fields[$field]['vars'][$key]=$frow['vars'][$key]=$row[$frow['id']];
			      }
			      if(!empty($key))
			      $data[$field]=$key;
			    }
			  }
			  break;
			case 'mselect':
			  if(!empty($row[$frow['id']]))
			  { if(isset($frow['vars']))
			    { $row[$frow['id']]=explode(',',$row[$frow['id']]);
			      $data[$field]=array();
			      foreach($row[$frow['id']] as $value)
			      { $value=trim($value);
				    $key=array_search($value,$frow['vars']);
			        if(empty($key) && !empty($value))
			        { $key=addToList($frow['idvar'],$value);
			          $fields[$field]['vars'][$key]=$frow['vars'][$key]=$value;
			        }
			        if(!empty($key))
			        $data[$field][]=sprintf("%04d",$key);
			      }
			      $data[$field]=implode(",",$data[$field]);
				}
			  }
			  break;
		    case 'bool':
			  $data[$field]=!empty($row[$frow['id']])&&$row[$frow['id']]!='N'?"Y":"N";
			  break;
		  }

		  if(isset($data['name']))
		  $data['name']=strip_tags(trim($data['name']));

		  if(!empty(A::$OPTIONS['idrule']))
          { $_data=$data;
            prepareValues(SECTION,$_data);
            $litems=array();
	        $idrule=A::$OPTIONS['idrule'];
	        $idrule=explode("+",$idrule);
	        foreach($idrule as $fname)
	        if(!empty($_data[$fname]))
	        $litems[]=getURLName($_data[$fname]);
	        $data['urlname']=implode(!empty($GLOBALS['A_URL_SEPARATOR'])?$GLOBALS['A_URL_SEPARATOR']:"_",$litems);
	      }
	      elseif(!empty($data['art']))
		  $data['urlname']=getURLName($data['art']);
	      if(empty($data['urlname']))
		  $data['urlname']=getURLName($data['name']);

		  if(!empty($data['content']) && empty($data['description']))
	      $data['description']=truncate($data['content'],A::$OPTIONS['anonslen']);

		  if(!empty($data['art']))
		  { $grow=A::$DB->getRow("SELECT id,mprices FROM ".SECTION."_catalog WHERE art=? LIMIT 0,1",$data['art']);
		    if(A::$OPTIONS['usecats'])
			{ if(!empty($arts[$data['art']]) && !empty($data['idcat']))
		      { if($arts[$data['art']]<3)
		        { $data['idcat'.$arts[$data['art']]]=$data['idcat'];
		          unset($data['idcat']);
		        }
		        $arts[$data['art']]++;
		      }
		      else
		      $arts[$data['art']]=1;
		    }
		  }
	      else
		  $grow=A::$DB->getRow("SELECT id,mprices FROM ".SECTION."_catalog WHERE idcat=? AND name=? LIMIT 0,1",array($data['idcat'],$data['name']));

		  if($grow)
		  { $id=$grow['id'];
		    $mprices=!empty($grow['mprices'])?unserialize($grow['mprices']):array();
		  }
		  else
		  $id=0;

		  if($id)
		  { if(isset($fields['mprice']) && !empty($data['mprice']))
		    { $inm=false;
			  foreach($mprices as $mp)
			  if($mp['name']==trim($data['mprice']))
			  { $inm=true;
			    break;
			  }
			  if(!$inm)
			  $mprices[]=array('name'=>$data['mprice'],'price'=>!empty($data['price'])?$data['price']:'');
		      $data['mprices']=serialize($mprices);
			  unset($data['price']);
			  $cats[$idcat]--;
			  $curgoods--;
		    }
		    if(isset($data['mprice']))
		    unset($data['mprice']);
			A::$DB->Update(SECTION."_catalog",$data,"id=$id");
			$images=A::$DB->getAssoc("SELECT sort,id,path FROM ".DOMAIN."_images
			WHERE idsec=".SECTION_ID." AND iditem=$id");
			$images=array_values($images);
			$files=A::$DB->getAssoc("SELECT sort,id,path FROM ".DOMAIN."_files
			WHERE idsec=".SECTION_ID." AND iditem=$id");
			$files=array_values($files);
			$curgoods++;
		  }
		  elseif(!empty($data['idcat']))
		  { if(isset($fields['mprice']) && !empty($data['mprice']))
		    { $mprices=array(array('name'=>$data['mprice'],'price'=>!empty($data['price'])?$data['price']:''));
		      $data['mprices']=serialize($mprices);
		    }
		    if(isset($data['mprice']))
		    unset($data['mprice']);
		    if(empty($data['name']))
			continue;
			$data['sort']=$gsort++;
		    $id=A::$DB->Insert(SECTION."_catalog",$data);
			$images=array();
			$files=array();
			$curgoods++;
		  }
		  else
		  continue;

		  foreach($cfiles as $field=>$frow)
		  if(!empty($row[$frow['id']]))
		  switch($frow['type'])
		  { case 'image':
			  $row[$frow['id']]=preg_replace("/[^a-zA-Zа-яА-Я0-9-_.]/iu","",$row[$frow['id']]);
			  $path0=A::$AUTH->isSuperAdmin()?"ifiles/".$row[$frow['id']]:"";
			  $path1="files/".DOMAIN."/".A::$OPTIONS['imgpath']."/".$row[$frow['id']];
		      $path2="files/".DOMAIN."/reg_images/".$row[$frow['id']];
		      $path=is_file($path0)?$path0:(is_file($path1)?$path1:(is_file($path2)?$path2:""));
			  if($path)
			  { preg_match("/^idimg([0-9]+)$/i",$field,$mathes);
			    $sort=$mathes[1];
				if(!isset($images[$sort]) || $images[$sort]['path']!=$path)
				{ $image=array();
		          $image['path']=$path;
		          $image['name']=basename($row[$frow['id']]);
	              $image['mime']=getMimeByFile($row[$frow['id']]);
	              $image['caption']=!empty($data['name'])?$data['name']:"";
                  $it = Image_Transform::factory('GD');
                  $it->load($path);
		          $image['width']=$it->img_x;
	              $image['height']=$it->img_y;
		          $image['idsec']=SECTION_ID;
				  $image['iditem']=$id;
				  $image['sort']=$sort;
				  if(isset($images[$sort]))
				  A::$DB->Update(DOMAIN."_images",$image,"id=".$images[$sort]['id']);
				  else
		          A::$DB->Insert(DOMAIN."_images",$image);
				}
			  }
		      break;
			case 'file':
		      $row[$frow['id']]=preg_replace("/[^a-zA-Zа-яА-Я0-9-_.]/iu","",$row[$frow['id']]);
			  $path0=A::$AUTH->isSuperAdmin()?"ifiles/".$row[$frow['id']]:"";
			  $path1="files/".DOMAIN."/".A::$OPTIONS['filepath']."/".$row[$frow['id']];
		      $path2="files/".DOMAIN."/reg_files/".$row[$frow['id']];
		      $path=is_file($path0)?$path0:(is_file($path1)?$path1:(is_file($path2)?$path2:""));
			  if($path)
			  { preg_match("/^idfile([0-9]+)$/i",$field,$mathes);
			    $sort=$mathes[1];
				if(!isset($files[$sort]) || $files[$sort]['path']!=$path)
				{ $file=array();
		          $file['path']=$path;
		          $file['name']=basename($row[$frow['id']]);
	              $file['mime']=getMimeByFile($row[$frow['id']]);
	              $file['caption']=!empty($data['name'])?$data['name']:"";
		          $file['idsec']=SECTION_ID;
				  $file['iditem']=$id;
				  $file['sort']=$sort;
				  $file['size']=filesize($path);
				  $file['dwnl']=0;
				  if(isset($files[$sort]))
				  A::$DB->Update(DOMAIN."_files",$file,"id=".$files[$sort]['id']);
				  else
		          A::$DB->Insert(DOMAIN."_files",$file);
				}
			  }
		      break;
		  }
        }

        if($prevgoods>0 && $prevgoods!=$curgoods)
		$this->updateCItems();
		else
		{ A::$DB->Update(SECTION."_categories",array('citems'=>0));
		  foreach($cats as $id=>$count)
		  A::$DB->Update(SECTION."_categories",array('citems'=>$count),"id=$id");
		  $this->updateCItems(0,true);
		}

		A::$CACHE->resetSection(SECTION);

		delDir("files/".DOMAIN."/tmp");

	    return true;
	  }
	}
	return false;
  }

  private function getCategories(&$values,$id=0,$parents=array())
  {
    A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker={$id} ORDER BY sort");
	while($row=A::$DB->fetchRow())
    { $parents[$row['level']]=$row['name'];
	  $values[$row['id']]=array('name'=>$row['name'],'idker'=>$row['idker'],'parents'=>$parents);
      $this->getCategories($values,$row['id'],$parents);
    }
	A::$DB->free();
  }

/**
 * Обработчик действия: Экспорт каталога.
 */

  function Export()
  {
    @set_time_limit(0);

	mk_dir("files/".DOMAIN."/tmp");
	clearDir("files/".DOMAIN."/tmp");

    require_once "Structures/DataGrid.php";
	require_once "Structures/DataGrid/DataSource/Array.php";
    require_once "Structures/DataGrid/Renderer/CSV.php";

	$categories=array();
	$fields=array();
	$all=array();
	A::$DB->query("SELECT * FROM ".SECTION."_cols ORDER BY sort");
	$i=0;
	while($row=A::$DB->fetchRow())
	{ if($row['type']=='select'||$row['type']=='mselect')
	  { if($row['idvar']=A::$DB->getOne("SELECT property FROM ".DOMAIN."_fields WHERE item='".SECTION."' AND field=?",$row['field']))
	    { $row['vars']=loadList($row['idvar']);
	      foreach($row['vars'] as $j=>$name)
	      if(is_array($name) && isset($name['name']))
	      $row['vars'][$j]=$name['name'];
	    }
	  }
	  $row['id']=$i++;
	  $all[$row['field']]=$row;
	  if(preg_match("/^category([0-9]{1})$/i",$row['field'],$matches))
	  { $row['level']=$matches[1];
	    $categories[$row['field']]=$row;
	  }
	  else
	  $fields[$row['field']]=$row;
	}
	A::$DB->free();

	$renderer = new Structures_DataGrid_Renderer_CSV();
	$renderer->setOptions(array(
	'delimiter'=>';',
	'enclosure'=>'"',
	'saveToFile'=>true,
	'useQuotes'=>true,
	'filename'=>"files/".DOMAIN."/tmp/".DOMAIN."_".getName(SECTION).".csv"));
	$renderer->init();

	$datasource = new Structures_DataGrid_DataSource_Array();
	$datagrid = new Structures_DataGrid();
	$datagrid->bindDataSource($datasource);
	$datagrid->attachRenderer(&$renderer);

	$i=0;
	$header=array();
    foreach($all as $field=>$frow)
    $header[$i++]=array('field'=>$field,'label'=>mb_convert_encoding($frow['caption'],"Windows-1251","UTF-8"));
	$renderer->buildHeader($header);

	$cats=array();
	$this->getCategories($cats);

	$i=0;
	foreach($cats as $id=>$category)
	{
	  A::$DB->query("SELECT * FROM ".SECTION."_catalog WHERE idcat=$id ORDER BY name");
	  while($row=A::$DB->fetchRow())
	  { $crow=array();

		for($j=0;$j<count($all);$j++)
		$crow[$j]="";

		foreach($categories as $field=>$frow)
		if(isset($category['parents'][$frow['level']]))
		$crow[$frow['id']]=mb_convert_encoding($category['parents'][$frow['level']],"Windows-1251","UTF-8");

		foreach($fields as $field=>$frow)
		switch($frow['type'])
		{ default:
			$crow[$frow['id']]=isset($row[$field])?mb_convert_encoding($row[$field],"Windows-1251","UTF-8"):'';
			break;
		  case 'select':
		    $crow[$frow['id']]=!empty($frow['vars'][$row[$field]])?mb_convert_encoding($frow['vars'][$row[$field]],"Windows-1251","UTF-8"):"";
			break;
		  case 'mselect':
		    $row[$field]=explode(',',$row[$field]);
		    foreach($row[$field] as $j=>$value)
		    $row[$field][$j]=!empty($frow['vars'][(integer)$value])?mb_convert_encoding($frow['vars'][(integer)$value],"Windows-1251","UTF-8"):"";
            $crow[$frow['id']]=implode(', ',$row[$field]);
			break;
		  case 'float':
		    $crow[$frow['id']]=round($row[$field],2);
			break;
		  case 'image';
		    if(preg_match("/^idimg([0-9]+)$/i",$field,$mathes))
			{ $sort=$mathes[1];
			  $images=A::$DB->getCol("SELECT path FROM ".DOMAIN."_images WHERE idsec=".SECTION_ID." AND iditem=".$row['id']." ORDER BY sort");
			  $crow[$frow['id']] = isset($images[$sort]) ? basename($images[$sort]) : "";
			}
			break;
		  case 'file';
		    if(preg_match("/^idfile([0-9]+)$/i",$field,$mathes))
			{ $sort=$mathes[1];
			  $files=A::$DB->getCol("SELECT path FROM ".DOMAIN."_files WHERE idsec=".SECTION_ID." AND iditem=".$row['id']." ORDER BY sort");
			  $crow[$frow['id']] = isset($files[$sort]) ? basename($files[$sort]) : "";
			}
			break;
		}

		if(isset($fields['mprice']) && isset($fields['price']))
		{ $mprices=!empty($row['mprices'])?unserialize($row['mprices']):array();
          foreach($mprices as $mp)
          { $crow[$fields['mprice']['id']]=mb_convert_encoding($mp['name'],"Windows-1251","UTF-8");
            $crow[$fields['price']['id']]=(float)$mp['price'];
            $renderer->buildRow($i++,$crow);
          }
          if(empty($mprices))
          $renderer->buildRow($i++,$crow);
		}
		else
		$renderer->buildRow($i++,$crow);
	  }
	  A::$DB->free();
	}

    $renderer->render();
	$renderer->finalize();

	if(filesize($file="files/".DOMAIN."/tmp/".DOMAIN."_".getName(SECTION).'.csv')>1024*2000)
	return outArchive("files/".DOMAIN."/tmp/".DOMAIN."_".getName(SECTION).".tar.gz",$file);
	else
	{ require_once('HTTP/Download.php');
	  $params=array('file'=>$file,'contenttype'=>'text/csv','contentdisposition'=>array(HTTP_DOWNLOAD_ATTACHMENT,basename($file)));
      HTTP_Download::staticSend($params,false);
	}
  }

/**
 * Формирование условия SQL запроса по текущим фильтрам.
 *
 * @return string
 */

  function getFilter()
  {
	$data=A_Session::get(SECTION."_filter",array());
	$where=array();
	if($data['active'])
	{ if(!empty($data['name']))
	  $where[]="c.name LIKE '%{$data['name']}%'";
	  if(!empty($data['content']))
	  $where[]="c.content LIKE '%{$data['content']}%'";
	  if(!empty($data['art']))
	  $where[]="c.art LIKE '{$data['art']}%'";
	  if(!empty($data['price1']))
	  $where[]="c.price>={$data['price1']}";
	  if(!empty($data['price2']))
	  $where[]="c.price<={$data['price2']}";
	  if(!empty($data['isfavorite']))
	  $where[]="c.favorite='{$data['isfavorite']}'";
	  if(!empty($data['isnew']))
	  $where[]="c.new='{$data['isnew']}'";
	  if($data['date'])
	  $where[]="c.date>={$data['date1']} AND c.date<={$data['date2']}";
	  if(!empty($data['status']))
	  $where[]="c.active='{$data['status']}'";
	  $where=$this->adminfilter(implode(" AND ",$where),$data,'c.');
	}
    return $where;
  }

/**
 * Формирование данных доступных в шаблоне.
 */

  function createData()
  {
	if(!A_Session::is_set(SECTION."_filter"))
    $this->unFilter();

    $fields=A::$DB->getFields(SECTION."_orders");
    if(!in_array('pay',$fields))
    A::$DB->execute("ALTER TABLE `".SECTION."_orders` ADD `pay` int(11) NOT NULL default '0'");

	$categories=A::$DB->getAll("SELECT id,idker,name FROM ".SECTION."_categories ORDER BY level,sort");
	$this->Assign("categories",$categories);

	if(!empty($_GET['idcat']))
	{ $this->Assign("category",A::$DB->getRowById($_GET['idcat'],SECTION."_categories"));
	  $idcat=(integer)$_GET['idcat'];
	  $childcats=array($idcat);
	  getTreeSubItems(SECTION."_categories",$idcat,$childcats);
	  $where="(c.idcat IN(".implode(",",$childcats).") OR c.idcat1 IN(".implode(",",$childcats).") OR c.idcat2 IN(".implode(",",$childcats)."))";
	  $this->Assign("childcats",$childcats=count($childcats));
	}
	else
	$where="";

	if($filter=$this->getFilter())
	$where=!empty($where)?"{$where} AND {$filter}":$filter;

	$this->Assign("treebox",new A_CategoriesTree("items"));

	$rows=A_Session::get(SECTION."_rows",isset($_COOKIE[SECTION.'_rows'])?$_COOKIE[SECTION.'_rows']:20);
	$sort=escape_order_string(A_Session::get(SECTION."_sort",isset($_COOKIE[SECTION.'_sort'])?$_COOKIE[SECTION.'_sort']:A::$OPTIONS['sort']));

	$items=array();
	$pager = new A_Pager($rows);
	$pager->tab="items";
    $pager->query("
	SELECT c.*,c.svote/c.cvote AS vote,cc.name AS category
	FROM ".SECTION."_catalog AS c
	LEFT JOIN ".SECTION."_categories AS cc ON cc.id=c.idcat
	".(!empty($where)?" WHERE $where":"")."
	ORDER BY $sort");
    while($row=$pager->fetchRow())
    { $row['link']=shoplite_createItemLink($row['id'],SECTION);
	  $row['catpath']="";
	  if(empty($_GET['idcat']) || $childcats>1)
	  $row['catpath'].=getTreePath(SECTION."_categories",$row['idcat']);
	  if(!empty($row['idcat1']))
	  $row['catpath'].='<br>'.getTreePath(SECTION."_categories",$row['idcat1']);
	  if(!empty($row['idcat2']))
	  $row['catpath'].='<br>'.getTreePath(SECTION."_categories",$row['idcat2']);
	  $row['vote']=round($row['vote'],2);
	  if(A::$OPTIONS['useimages'])
	  { $row['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
	    $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
	  }
	  if(A::$OPTIONS['usefiles'])
	  { $row['files']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_files WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
	    $row['idfile']=isset($row['files'][0]['id'])?$row['files'][0]['id']:0;
	  }
	  $items[]=$row;
	}
	$pager->free();

	$this->Assign("items",$items);
	$this->Assign("items_pager",$pager);

	$this->Assign("rows",$rows);
	$this->Assign("sort",$sort);
	$this->Assign("filter",!empty($filter));

	if(A::$OPTIONS['usecomments'])
	$this->Assign("commbox",new A_CommentsEditor(SECTION."_catalog"));

	$rows=(integer)A_Session::get(SECTION."_rows2",20);

	$idpays=A::$DB->getCol("SELECT DISTINCT pay FROM ".SECTION."_orders ORDER BY pay");
	$pays=array();
	foreach($idpays as $idpay)
	$pays[$idpay]=function_exists('pay_getname')?pay_getname($idpay):"Наличные";
	$pays=array_unique($pays);
	$this->Assign("pays",$pays);
	$where=array();
	if(isset($_GET['date']))
	{ if(!empty($_GET['from']))
	  $where[]="date>=".(integer)$_GET['from'];
	  if(!empty($_GET['to']))
	  $where[]="date<=".(integer)$_GET['to'];
	}
	if(!empty($_GET['sum1']))
	$where[]="sum>=".(integer)$_GET['sum1'];
	if(!empty($_GET['sum2']))
	$where[]="sum<=".(integer)$_GET['sum2'];
	if(isset($_GET['status']) && $_GET['status']>=0)
	$where[]="status=".(integer)$_GET['status'];
	if(isset($_GET['pay']) && $_GET['pay']>=0)
	$where[]="pay=".(integer)$_GET['pay'];
	$where=implode(" AND ",$where);

	$orders=array();
	$pager2 = new A_Pager($rows);
	$pager2->tab="orders";
	$pager2->query("SELECT * FROM ".SECTION."_orders ".($where?"WHERE {$where}":"")." ORDER BY status,date DESC");
    while($row=$pager2->fetchRow())
    { $row['pay']=function_exists('pay_getname')?pay_getname($row['pay']):"Наличные";
      $row['sum']=round($row['sum'],2);
	  $orders[]=$row;
    }
    $pager2->free();

    $this->Assign("orders",$orders);
	$this->Assign("orders_pager",$pager2);
	$this->Assign("rows2",$rows);

	$this->Assign("optbox1",new A_OptionsBox("Внешний вид на сайте:",array("idgroup"=>1)));
	$this->Assign("optbox2",new A_OptionsBox("Файлы:",array("idgroup"=>2)));
	$this->Assign("optbox3",new A_OptionsBox("Заказ:",array("idgroup"=>3)));
	$this->Assign("optbox4",new A_OptionsBox("Комментирование и голосование:",array("idgroup"=>4)));
	$this->Assign("optbox5",new A_OptionsBox("Дополнительно:",array("idgroup"=>5)));

	$this->Assign("fieldsbox",new A_FieldsEditor(SECTION."_catalog",array('tab'=>'opt','tab_opt'=>'fields'),false,true));

	$types=array(
	'string'=>'Строка',
	'int'=>'Целое число',
	'float'=>'Дробное число',
	'bool'=>'Логический (Да/Нет)',
	'text'=>'Текст',
	'select'=>'Значение из списка',
	'mselect'=>'Множество значений из списка',
	'mprice'=>'Модификатор цены',
	'image'=>'Изображение',
	'file'=>'Файл');

	$nums=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$cols=array();
    A::$DB->query("SELECT * FROM ".SECTION."_cols ORDER BY sort");
    while($row=A::$DB->fetchRow())
	{ $row['num']=array_shift($nums);
	  $row['type']=isset($types[$row['type']])?$types[$row['type']]:$row['type'];
	  $cols[]=$row;
	}
	A::$DB->free();
	$this->Assign("cols",$cols);
  }
}

A::$OBSERVER->AddHandler('DeleteCategory',array('ShopLiteModule_Admin','DeleteCategory'));
A::$OBSERVER->AddHandler('MoveCategory',array('ShopLiteModule_Admin','MoveCategory'));
A::$OBSERVER->AddHandler('ActiveCategory',array('ShopLiteModule_Admin','ActiveCategory'));

A::$MAINFRAME = new ShopLiteModule_Admin;