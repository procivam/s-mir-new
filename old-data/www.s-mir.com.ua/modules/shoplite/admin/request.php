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
 * Серверная сторона AJAX панели управления модуля "Магазин Lite".
 *
 * <a href="http://wiki.a-cms.ru/modules/shoplite">Руководство</a>.
 */

class ShopLiteModule_Request extends A_Request
{
/**
 * Маршрутизатор действий.
 */

  function Action($action)
  {
    switch($action)
    { case "getadditemform": $this->getAddForm(); break;
	  case "getedititemform": $this->getEditForm(); break;
	  case "getmoveitemsform": $this->getMoveItemsForm(); break;
	  case "getcopyitemsform": $this->getCopyItemsForm(); break;
	  case "getfilterform": $this->getFilterForm(); break;
	  case "gettiesform": $this->getTiesForm(); break;
	  case "getgoods": $this->getGoods(); break;
	  case "getorderform": $this->getOrderForm(); break;
	  case "getaddcolform": $this->getAddColForm(); break;
	  case "getimportform": $this->getImportForm(); break;
	  case "setimportsort": $this->setImportSort(); break;
	  case "applyitem": $this->applyItem(); break;
    }
  }

/**
 * Обработчик действия: Отдает форму добавления товара.
 */

  function getAddForm()
  {
    $form = new A_Form("module_shoplite_add.tpl");
	$form->data['idcat']=(integer)$_POST['idcat'];
	$form->data['categories']=A::$DB->getAll("SELECT id,idker,name FROM ".SECTION."_categories ORDER BY level,sort");
	$form->fieldseditor_addprepare();
	$this->RESULT['html'] = $form->getContent();
  }

/**
 * Обработчик действия: Отдает форму редактирования товара.
 */

  function getEditForm()
  {
    $form = new A_Form("module_shoplite_edit.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],SECTION."_catalog");
	$form->data['categories']=A::$DB->getAll("SELECT id,idker,name FROM ".SECTION."_categories ORDER BY level,sort");
	$form->data['price']=round($form->data['price'],2);
	$form->data['oldprice']=round($form->data['oldprice'],2);
	$form->fieldseditor_editprepare();
	$form->data['filesbox'] = new A_Files((integer)$_POST['id']);
	$form->data['imagesbox'] = new A_Images((integer)$_POST['id']);
	$i=1;
	$mprices=!empty($form->data['mprices'])?unserialize($form->data['mprices']):array();
    $form->data['mprices']=array();
	foreach($mprices as $mp)
	{ $form->data['mprices'][]=array(
	  'textname'=>"mprice{$i}_text",
	  'textvalue'=>$mp['name'],
	  'pricename'=>"mprice{$i}_price",
	  'pricevalue'=>$mp['price']);
	  $i++;
	}
	for(;$i<=10;$i++)
	$form->data['mprices'][]=array(
	'textname'=>"mprice{$i}_text",
	'textvalue'=>"",
	'pricename'=>"mprice{$i}_price",
	'pricevalue'=>"");
	$this->RESULT['html'] = $form->getContent();
  }

/**
 * Обработчик действия: Отдает форму перемещения товаров.
 */

  function getMoveItemsForm()
  {
    if(empty($_POST['items'])) return;
    $form = new A_Form("module_shoplite_move.tpl");
	$form->data['idcat']=$_POST['idcat'];
	$form->data['items']=array_values($_POST['items']);
	$form->data['categories']=A::$DB->getAll("SELECT id,idker,name FROM ".SECTION."_categories ORDER BY level,sort");
	if(count($form->data['categories'])>0)
	$this->RESULT['html']=$form->getContent();
	else
	$this->RESULT['html']=AddLabel("Нет вариантов перемещения.");
  }

/**
 * Обработчик действия: Отдает форму копирования товаров.
 */

  function getCopyItemsForm()
  {
    if(empty($_POST['items'])) return;
    $form = new A_Form("module_shoplite_copy.tpl");
	$form->data['idcat']=$_POST['idcat'];
	$form->data['items']=array_values($_POST['items']);
	$form->data['categories']=A::$DB->getAll("SELECT id,idker,name FROM ".SECTION."_categories ORDER BY level,sort");
	if(count($form->data['categories'])>0)
	$this->RESULT['html']=$form->getContent();
	else
	$this->RESULT['html']=AddLabel("Нет вариантов копирования.");
  }

/**
 * Обработчик действия: Отдает форму фильтров.
 */

  function getFilterForm()
  {
    $data=A_Session::get(SECTION."_filter",array());
	$form = new A_Form("module_shoplite_filter.tpl");
	$form->data['idcat']=$_POST['idcat'];
	$form->data['name']=$data['name'];
	$form->data['art']=$data['art'];
	$form->data['content']=$data['content'];
	$form->data['price1']=$data['price1'];
	$form->data['price2']=$data['price2'];
	$form->data['isfavorite']=$data['isfavorite'];
	$form->data['isnew']=$data['isnew'];
	$form->data['date']=$data['date'];
	$form->data['from']=$data['date1'];
	$form->data['to']=$data['date2'];
	$form->data['statuss']=array(0=>"Не выбрано","Y"=>"Активные","N"=>"Неактивные");
	$form->data['status']=$data['status'];
	$form->fieldseditor_filterprepare($data);
	$frame = new A_Frame("default_form.tpl","Фильтр",$form);
	$this->RESULT['html'] = $frame->getContent();
  }

  private function getCategories(&$values,$id,$owner="")
  {
    A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker=$id ORDER BY sort");
	if(A::$DB->numRows())
	{ if(!empty($owner))
	  $owner.="&nbsp;&raquo;&nbsp;";
	  while($row=A::$DB->fetchRow())
      { $values[$row['id']]=$owner.$row['name'];
        $this->getCategories($values,$row['id'],$owner.$row['name']);
      }
	}
	A::$DB->free();
  }

/**
 * Обработчик действия: Отдает форму сопутствующих товаров.
 */

  function getTiesForm()
  {
    $form = new A_Form("module_shoplite_tie.tpl");

	$form->data=A::$DB->getRowById($_POST['id'],SECTION."_catalog");
	$ties=!empty($form->data['ties'])?unserialize($form->data['ties']):array();

    $cats=array();
	$categories=array();
	$this->getCategories($cats,0);
	foreach($cats as $id=>$name)
	if(A::$DB->getCount(SECTION."_catalog","idcat=$id")>0)
	$categories[]=array('id'=>$id,'name'=>$name,'noempty'=>!empty($ties[$id]));
	$form->data['categories']=$categories;

	$this->RESULT['title'] = $form->data['name'].' - Сопутствующие';
    $this->RESULT['html'] = $form->getContent();
  }

/**
 * Обработчик действия: Отдает фрагмент списка сопутствующих товаров.
 */

  function getGoods()
  {
    if($_POST['idgood']>0)
	$ties=A::$DB->getOne("SELECT ties FROM ".SECTION."_catalog WHERE id=".(integer)$_POST['idgood']);

	$ties=!empty($ties)?unserialize($ties):array();

	$items=array();
	A::$DB->query("SELECT id,idcat,name FROM ".SECTION."_catalog
	WHERE idcat=".(integer)$_POST['id']." AND id<>".(integer)$_POST['idgood']." ORDER BY name");
	while($row=A::$DB->fetchRow())
	{ $row['checked']=isset($ties[$row['idcat']]) && in_array($row['id'],$ties[$row['idcat']]);
	  $items[]=$row;
	}
	A::$DB->free();

	if(count($items)>0)
	{ $grid = new A_Grid(3);
	  $grid->width=array("33%","33%","33%");
	  $rows=count($items)/3;
	  for($i=0;$i<$rows;$i++)
	  $grid->AddRow(array());

	  $u=0;
	  for($j=0;$j<3;$j++)
	  { for($i=0;$i<$rows;$i++,$u++)
	    if(isset($items[$u]))
	    $grid->SetCell($i,$j,"<label><input type=\"checkbox\" name=\"checkgood[]\" value=\"".$items[$u]['id']."\"".($items[$u]['checked']?" checked":"").">&nbsp;".$items[$u]['name']."</label>");
	  }

	  $this->RESULT['html']=$grid->getContent();
	}
	else
	$this->RESULT['html']=AddLabel("Нет записей.");
  }

/**
 * Обработчик действия: Отдает форму с текстом заказа.
 */

  function getOrderForm()
  { $form = new A_Form("module_shoplite_order.tpl");
	$form->data=A::$DB->getRowById($_POST['id'],SECTION."_orders");
	$this->RESULT['title']="Информация о заказе №{$_POST['id']}";
	$this->RESULT['html']=$form->getContent();
  }

/**
 * Обработчик действия: Отдает форму добавления столбца в структуру импорта.
 */

  function getAddColForm()
  {
    $form = new A_Form("module_shoplite_addcol.tpl");

	$cols=A::$DB->getCol("SELECT field FROM ".SECTION."_cols");

	$form->data['fields']=array();

	for($i=0;$i<3;$i++)
	if(!in_array('category'.$i,$cols))
	$form->data['fields'][]=array('field'=>'category'.$i,'name'=>'Категория ур.'.($i+1),'type'=>'string');
	if(!in_array('name',$cols))
	$form->data['fields'][]=array('field'=>'name','name'=>'Название','type'=>'string');
	if(!in_array('content',$cols))
	$form->data['fields'][]=array('field'=>'content','name'=>'Описание','type'=>'text');
	if(!in_array('description',$cols))
	$form->data['fields'][]=array('field'=>'description','name'=>'Аннотация','type'=>'text');
	if(!in_array('art',$cols))
	$form->data['fields'][]=array('field'=>'art','name'=>'Артикул','type'=>'string');
	if(A::$OPTIONS['modprices']==1 && !in_array('mprice',$cols))
	$form->data['fields'][]=array('field'=>'mprice','name'=>'Модификатор','type'=>'mprice');
	if(!in_array('price',$cols))
	$form->data['fields'][]=array('field'=>'price','name'=>'Цена','type'=>'float');
	if(!in_array('oldprice',$cols))
	$form->data['fields'][]=array('field'=>'oldprice','name'=>'Прошлая цена','type'=>'float');
	if(A::$OPTIONS['onlyavailable']==1 && !in_array('iscount',$cols))
	$form->data['fields'][]=array('field'=>'iscount','name'=>'Количество','type'=>'int');
	if(!in_array('active',$cols))
	$form->data['fields'][]=array('field'=>'active','name'=>'Активен','type'=>'bool');
	if(!in_array('favorite',$cols))
	$form->data['fields'][]=array('field'=>'favorite','name'=>'Спецпредложение','type'=>'bool');
	if(!in_array('new',$cols))
	$form->data['fields'][]=array('field'=>'new','name'=>'Новинка','type'=>'bool');
	if(A::$OPTIONS['usetags']==1 && !in_array('tags',$cols))
	$form->data['fields'][]=array('field'=>'tags','name'=>'Теги','type'=>'string');

	A::$DB->query("SELECT * FROM ".DOMAIN."_fields WHERE item='".SECTION."' AND type<>'file' AND type<>'image' AND type<>'date' ORDER BY sort");
    while($row=A::$DB->fetchRow())
    if(!in_array($row['field'],$cols))
	{ if($row['type']=='format') $row['type']='text';
	  $form->data['fields'][]=array('field'=>$row['field'],'name'=>$row['name_'.DEFAULTLANG],'type'=>$row['type']);
	}
	A::$DB->free();

	if(A::$OPTIONS['useimages'])
	{ for($i=0;$i<3;$i++)
	  if(!in_array('idimg'.$i,$cols))
	  $form->data['fields'][]=array('field'=>'idimg'.$i,'name'=>'Фото '.($i+1),'type'=>'image');
	}

	if(A::$OPTIONS['usefiles'])
	{ for($i=0;$i<3;$i++)
	  if(!in_array('idfile'.$i,$cols))
	  $form->data['fields'][]=array('field'=>'idfile'.$i,'name'=>'Файл '.($i+1),'type'=>'file');
	}

	$sort=A_Session::get(SECTION."_sort",isset($_COOKIE[SECTION.'_sort'])?$_COOKIE[SECTION.'_sort']:A::$OPTIONS['sort']);
	if($sort=='sort')
	$form->data['fields'][]=array('field'=>'sort','name'=>'Порядок','type'=>'int');

	if(count($form->data['fields'])>0)
	$this->RESULT['html'] = $form->getContent();
	else
	$this->RESULT['html'] = AddLabel("Все поля уже заданы!");
  }

/**
 * Обработчик действия: Отдает форму импорта каталога.
 */

  function getImportForm()
  {
    $form = new A_Form("module_shoplite_import.tpl");
	$this->RESULT['html'] = $form->getContent();
  }

/**
 * Обработчик действия: Сортировка столбцов.
 */

  function setImportSort()
  {
    $sort=!empty($_POST['sort'])?explode(",",$_POST['sort']):array();
	$i=1;
	foreach($sort as $id)
	A::$DB->Update(SECTION."_cols",array('sort'=>$i++),"id=".(integer)$id);
  }

  function applyItem()
  {
    $this->RESULT['result']=false;

	$row=A::$DB->getRowById($_REQUEST['id'],SECTION."_catalog");
	if(!$row)
	return false;

	require_once("modules/shoplite/admin/shoplite.php");

	if(ShopLiteModule_Admin::EditItem())
    { $this->RESULT['date']=date("d.m.Y H:i",$_REQUEST['date']);
	  $this->RESULT['result']=true;
	}
  }
}

A::$REQUEST = new ShopLiteModule_Request;