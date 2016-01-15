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
 * Модуль "Магазин Lite".
 *
 * <a href="http://wiki.a-cms.ru/modules/shoplite">Руководство</a>.
 */

class ShopLiteModule extends A_MainFrame
{
/**
 * Идентификатор активной категории.
 */

  public $idcat=0;

/**
 * Данные активной категории.
 */

  public $category;

/**
 * Идентификатор активного товара.
 */

  public $iditem=0;

/**
 * Данные активного товара.
 */

  public $itemdata;

/**
 * Маршрутизатор URL.
 *
 * @param array $uri Элементы полного пути URL.
 */

  function Router($uri)
  {
  foreach($uri as $param)
  if(preg_match("/^([^.]+)\.html$/",$param,$match))
    { if($this->idcat==0)
    switch($match[1])
    { case "basket": $this->page="basket"; return;
      case "order": $this->page="order"; return;
      case "message": $this->page="message"; return;
    case "price": $this->page="price"; return;
    case "compare": $this->page="compare"; return;
    case "myorders": $this->page="myorders"; return;
    case "favorites": $_GET['favorite']=1; $this->page="result"; return;
    case "news": $_GET['new']=1; $this->page="result"; return;
      }
      if($match[1]=='result')
      { $this->page="result";
      return;
    }
    if($this->itemdata=A::$DB->getRow("SELECT * FROM ".SECTION."_catalog WHERE idcat={$this->idcat} AND urlname='{$match[1]}' AND active='Y'"))
    $this->iditem=$this->itemdata['id'];
    else
    A::NotFound();
    break;
    }
  else
    { if($this->category=A::$DB->getRow("SELECT * FROM ".SECTION."_categories WHERE idker={$this->idcat} AND urlname='{$param}' AND active='Y'"))
      $this->idcat=$this->category['id'];
    else
      A::NotFound();
    }

  if($this->iditem>0)
  $this->page="page";
  elseif($this->idcat>0)
  $this->page="category";
  else
  $this->page="main";
  }

/**
 * Маршрутизатор действий.
 */

  function Action($action)
  {

    switch($action)
  { case "addbasket": $this->AddBasket(); break;
    case "delbasket": $this->DelBasket();  break;
    case "recalcbasket": $this->RecalcBasket(); break;
    case "clearbasket": $this->ClearBasket(); break;
    case "addcompare": $this->AddCompare(); break;
    case "delcompare": $this->DelCompare(); break;
    case "clearcompare": $this->ClearCompare(); break;
    case "order": $this->Order(); break;
    case "addvote": $this->AddVote(); break;
    case "addcomment": $this->AddComment(); break;
  }
  }

/**
 * Обработчик действия: Добавление в корзину.
 */

  function AddBasket($adder=true)
  {
  if(empty($_REQUEST['id']))
  return false;

  if(isset($_GET['not']))
  unset($_GET['not']);

  if(empty(A::$OPTIONS['useorder']))
  A::goUrl(shoplite_createItemLink($_REQUEST['id'],SECTION));

  $basket=A_Session::get("shoplite_basket",array());

  if($grow=A::$DB->getRowById($_REQUEST['id'],SECTION."_catalog"))
  {
    $grow['category']=getTreePath(SECTION."_categories",$grow['idcat']);
    $grow['link']=shoplite_createItemLink($grow['id'],SECTION);
    $grow['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$grow['id'];

    unset($grow['content']);

    if(A::$OPTIONS['useimages'])
    { $grow['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$grow['id']));
      $grow['idimg']=isset($grow['images'][0]['id'])?$grow['images'][0]['id']:0;
    }
    if(A::$OPTIONS['modprices'])
    { $grow['mprices']=!empty($grow['mprices'])?unserialize($grow['mprices']):array();
      $grow['mprice_options']=array();
      foreach($grow['mprices'] as $i=>$mp)
      $grow['mprice_options'][$i]=$mp['name'];
      }

      prepareValues(SECTION,$grow);

    $count=!empty($_REQUEST['count'])?(integer)$_REQUEST['count']:1;

    if(A::$OPTIONS['onlyavailable'] && $count>$grow['iscount'])
    { $count=$grow['iscount'];
      $_GET['not']=1;
    if($count<1)
      A::goUrl($grow['link']);
    }

    $advars=false;
    $dynamic=array();
    foreach($_REQUEST as $key=>$value)
    if(!empty($grow[$key.'_options'][$value]))
    { $grow[$key]=$grow[$key.'_options'][$value];
      $dynamic[$key]=$value;
      $advars=true;
    }

    if(isset($dynamic['mprice']) && !empty($grow['mprices'][$dynamic['mprice']]['price']))
    $grow['price']=$grow['mprices'][$dynamic['mprice']]['price'];

      $new=true;
    foreach($basket as $i=>$row)
    if($row['section']==SECTION && $row['data']['id']==$grow['id'] && (!$advars || $dynamic==$row['dynamic']))
      { //$basket[$i]['count']+=$count;     ///розкоментить
      $new=false;
    }

    if($new)
    $basket[]=array('section'=>SECTION,'data'=>$grow,'count'=>$count,'dynamic'=>$dynamic);

    foreach($basket as $i=>$row)
    { $basket[$i]['id']=$i;
      $basket[$i]['oldsum']=$row['data']['oldprice']*$row['count'];
      $basket[$i]['sum']=$row['data']['price']*$row['count'];
    }
  }

  A_Session::set("shoplite_basket",$basket);
  if($adder==true){
   /* if(!empty($_REQUEST['silent']) )*/
      A::goPrevUrl();
   /* else
      A::goUrl(getSectionLink(SECTION)."basket.html",array('not'));*/
  }
  }

/**
 * Обработчик действия: Удаление позиции из корзины.
 */

  function DelBasket()
  {
  if(!isset($_REQUEST['id']))
  return false;

  $basket=A_Session::get("shoplite_basket",array());

  $_REQUEST['id']=(integer)$_REQUEST['id'];

  if(isset($basket[$_REQUEST['id']]))
    unset($basket[$_REQUEST['id']]);

  $basket=array_values($basket);

  A_Session::set("shoplite_basket",$basket);

  A::goUrl(getSectionLink(SECTION)."basket.html");
  }

/**
 * Обработчик действия: Пересчет итоговых сумм для позиций в корзине.
 */

  function RecalcBasket()
  {
  $basket=A_Session::get("shoplite_basket",array());

  if(isset($_GET['not']))
  unset($_GET['not']);

  foreach($basket as $i=>$row)
  { if(isset($_REQUEST['count_'.$i]))
    { $basket[$i]['count']=(integer)$_REQUEST['count_'.$i];
      if(A::$OPTIONS['onlyavailable'] && $basket[$i]['count']>$row['data']['iscount'])
      { $basket[$i]['count']=$row['data']['iscount'];
      $_GET['not']=1;
      }
    }
    if($basket[$i]['count']<1)
    unset($basket[$i]);
    else
    { foreach($row['dynamic'] as $key=>$value)
      if(isset($_REQUEST[$key.'_'.$i]))
      { if(!empty($row['data'][$key.'_options'][$value]))
      $basket[$i]['data'][$key]=$row['data'][$key.'_options'][$value];
      else
      $basket[$i]['data'][$key]="";
        $basket[$i]['dynamic'][$key]=(integer)$_REQUEST[$key.'_'.$i];
      if(isset($basket[$i]['dynamic']['mprice']) && !empty($row['data']['mprices'][$basket[$i]['dynamic']['mprice']]['price']))
        $basket[$i]['data']['price']=$row['data']['mprices'][$basket[$i]['dynamic']['mprice']]['price'];
      }
    }
  }

  foreach($basket as $i=>$row)
  { $basket[$i]['id']=$i;
    $basket[$i]['oldsum']=$row['data']['oldprice']*$row['count'];
    $basket[$i]['sum']=$row['data']['price']*$row['count'];
  }

  $basket=array_values($basket);

    A_Session::set("shoplite_basket",$basket);

  A::goUrl(getSectionLink(SECTION)."basket.html",array('not'));
  }

/**
 * Обработчик действия: Очистка корзины.
 */

  function ClearBasket()
  {
    A_Session::unregister("shoplite_basket");

  A::goUrl(getSectionLink(SECTION)."basket.html");
  }

/**
 * Обработчик действия: Добавление товара для сравнения.
 */

  function AddCompare()
  {
  if(empty($_REQUEST['id']))
  return false;

  $compare=A_Session::get(SECTION."_compare",array());

  if($grow=A::$DB->getRowById($_REQUEST['id'],SECTION."_catalog"))
  {
    $grow['category']=getTreePath(SECTION."_categories",$grow['idcat']);
    $grow['link']=shoplite_createItemLink($grow['id'],SECTION);
    $grow['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$grow['id'];

    if(A::$OPTIONS['useimages'])
    { $grow['images']=A::$DB->getAll("
      SELECT id,caption,path,width,height FROM ".DOMAIN."_images
      WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$grow['id']));
      $grow['idimg']=isset($grow['images'][0]['id'])?$grow['images'][0]['id']:0;
    }

      prepareValues(SECTION,$grow);

    $compare[$grow['id']]=$grow;
  }

  A_Session::set(SECTION."_compare",$compare);

    if(count($compare)>1)
    A::goUrl(getSectionLink(SECTION)."compare.html");
    else
  A::goPrevUrl();
  }

/**
 * Обработчик действия: Удаление товара из сравнения.
 */

  function DelCompare()
  {
  if(empty($_REQUEST['id']))
  return false;

  $compare=A_Session::get(SECTION."_compare",array());

  $_REQUEST['id']=(integer)$_REQUEST['id'];

  if(isset($compare[$_REQUEST['id']]))
    unset($compare[$_REQUEST['id']]);

  A_Session::set(SECTION."_compare",$compare);

  A::goUrl(getSectionLink(SECTION)."compare.html");
  }

/**
 * Обработчик действия: Очистка списка сравнения.
 */

  function ClearCompare()
  {
    A_Session::unregister(SECTION."_compare");

  A::goUrl(getSectionLink(SECTION)."compare.html");
  }

/**
 * Обработчик действия: Заказ.
 */

  function Order()
  {
  if(empty($_REQUEST['captcha']) || md5(strtolower($_REQUEST['captcha']))!=A_Session::get('captcha'))
  { $this->errors['captcha']=true;
    return false;
  }
  A_Session::unregister('captcha');

///////////////////////////////////////////////////////////////////////
  if(isset($_REQUEST['id'])){
    $_REQUEST['count']=1;
    $this->AddBasket(false);
  }
///////////////////////////////////////////////////////////////////////

  if(empty(A::$OPTIONS['useorder']))
  A::goUrl(getSectionLink(SECTION));

  $basket=A_Session::get("shoplite_basket",array());
  $all=array('count'=>0,'oldsum'=>0,'sum'=>0,'discount'=>0);
  foreach($basket as $i=>$brow)
  { $basket[$i]['data']=$brow['data']=A::$OBSERVER->Modifier('shoplite_prepareValues',$brow['section'],$brow['data']);
    $basket[$i]['id']=$i;
    $basket[$i]['oldsum']=$brow['oldsum']=$brow['data']['oldprice']*$brow['count'];
    $basket[$i]['sum']=$brow['sum']=$brow['data']['price']*$brow['count'];
    $basket[$i]['discount']=$brow['discount']=!empty($brow['data']['discount'])?$brow['data']['discount']*$brow['count']:0;
    foreach($brow['dynamic'] as $key=>$value)
    $basket[$i]['data'][$key]=!empty($brow['data'][$key.'_options'][$value])?$brow['data'][$key.'_options'][$value]:"";
    $all['count']+=$brow['count'];
    $all['oldsum']+=$brow['oldsum'];
    $all['sum']+=$brow['sum'];
    $all['discount']+=$brow['discount'];
  }

  $basket=A::$OBSERVER->Modifier('shoplite_orderBasket',SECTION,$basket);

  $order=array(
  'date'=>time(),
  'userdata'=>serialize($_REQUEST),
  'basket'=>serialize($basket),
  'count'=>$all['count'],
  'sum'=>$all['sum'],
  'pay'=>!empty($_REQUEST['pay'])?(integer)$_REQUEST['pay']:0);

  if(A::$AUTH->isLogin())
  $order['iduser']=A::$AUTH->id;

  $order['id']=A::$DB->Insert(SECTION."_orders",$order);
  $order['pay']=function_exists('pay_getname')?pay_getname($order['pay']):"Наличные";

  $mail = new A_Mail(A::$OPTIONS['mail_toadmin']);
  if(!empty($_REQUEST['email']))
  $mail->setFrom($_REQUEST['email'],!empty($_REQUEST['name'])?$_REQUEST['name']:'');
  $mail->Assign("order",$order);
  $mail->Assign('basket',$basket);
  $mail->Assign('all',$all);
    $mail->Assign("data",$_REQUEST);
  $mail->Assign("valute",A::$OPTIONS['valute']);
  $mail->send(A::$OPTIONS['email']);

  $content=preg_replace("/\r/","",$mail->fetch($mail->template));
  $content=preg_replace("/^[^\n]*\n/i","",$content);
  A::$DB->Update(SECTION."_orders",array('content'=>$content),"id=".$order['id']);

  if(!empty($_REQUEST['email']) && !empty(A::$OPTIONS['mail_touser']))
  { $mail = new A_Mail(A::$OPTIONS['mail_touser']);
    $mail->Assign("order",$order);
    $mail->Assign('basket',$basket);
    $mail->Assign('all',$all);
      $mail->Assign("data",$_REQUEST);
    $mail->Assign("valute",A::$OPTIONS['valute']);
    $mail->send($_REQUEST['email']);
  }

  A_Session::set(SECTION."_idorder",$order['id']);
  A_Session::unregister("shoplite_basket");

  if($section=getSectionByModule('robopay'))
    A::goUrl(getSectionLink($section));
  elseif($section=getSectionByModule('pay'))
  { if(!empty($_REQUEST['pay']))
    A::goUrl(getSectionLink($section));
  }
  else
  A::goUrl(getSectionLink(SECTION)."?sendorder=ok");
  }

/**
 * Обработчик действия: Оценивание товара.
 */

  function AddVote()
  {
  if(!A_Session::get(SECTION."_vote_".$this->iditem,false))
  { if($vote=(integer)$_REQUEST['vote'])
    { A::$DB->execute("UPDATE ".SECTION."_catalog SET cvote=cvote+1,svote=svote+{$vote} WHERE id=".$this->iditem);
      A_Session::set(SECTION."_vote_".$this->iditem,true);
      A::goUrl(shoplite_createItemLink($this->iditem,SECTION));
    }
  }

  return false;
  }

/**
 * Обработчик действия: Комментирование товара.
 */

  function AddComment()
  {
  if(empty($_REQUEST['captcha']) || md5(strtolower($_REQUEST['captcha']))!=A_Session::get('captcha'))
  { $this->errors['captcha']=true;
    return false;
  }
  A_Session::unregister('captcha');

    $data=array();
    $data['date']=time();
  $data['idsec']=SECTION_ID;
  $data['iduser']=A::$AUTH->id;
  $data['iditem']=$this->iditem;
  $data['name']=strip_tags($_REQUEST['name']);
    $data['bbcode']=$_REQUEST['message'];
    $data['message']=parse_bbcode($data['bbcode']);
    $data['active']=A::$OPTIONS['cactive']?'N':'Y';

  if(empty($data['name']) || empty($data['message']))
  return false;

    if($id=A::$DB->Insert(DOMAIN."_comments",$data))
  {
    $count=A::$DB->getCount(DOMAIN."_comments","idsec=".SECTION_ID." AND iditem={$this->iditem}");
    A::$DB->execute("UPDATE ".SECTION."_catalog SET comments={$count} WHERE id={$this->iditem}");

    $link=shoplite_createItemLink($this->iditem,SECTION);

    if(!empty(A::$OPTIONS['cemail']))
    { if(!empty(A::$OPTIONS['commenttpl']))
    {
      $item=A::$DB->getRowById($this->iditem,SECTION."_catalog");
        $item['link']="http://".HOSTNAME.$link;
        $mail = new A_Mail(A::$OPTIONS['commenttpl'],"html");
      $mail->Assign("item",$item);
      $mail->Assign("comment",$data);
        $mail->send(A::$OPTIONS['cemail']);
    }
    }

    if(A::$OPTIONS['cactive'])
    A::goUrl($link.'?newcomment=1');
    else
    A::goUrl($link);
  }
  else
  return false;
  }

/**
 * Формирование данных доступных в шаблоне активного типа.
 */

  function createData()
  {
  switch($this->page)
  { default:
    case "main": $this->MainPage(); break;
    case "category": $this->CategoryPage(); break;
    case "page": $this->ItemPage(); break;
    case "result": $this->ResultPage(); break;
    case "basket": $this->BasketPage(); break;
    case "order": $this->OrderPage(); break;
    case "message": $this->MessagePage(); break;
    case "price": $this->PricePage(); break;
    case "compare": $this->ComparePage(); break;
    case "myorders": $this->MyOrdersPage(); break;
  }

  $this->Assign("valute",A::$OPTIONS['valute']);
  $this->Assign("basketlink",getSectionLink(SECTION)."basket.html");
  $this->Assign("pricelink",getSectionLink(SECTION)."price.html");
  $this->Assign("comparelink",getSectionLink(SECTION)."compare.html");
  $this->Assign("orderlink",getSectionLink(SECTION)."order.html");
  }

/**
 * Добавление полного пути категории в строку навигации.
 *
 * @param integer $id Идентификатор категории.
 */

  function AddNavCategories($id)
  {
    if($id)
  { if($row=A::$DB->getRow("SELECT id,idker,name FROM ".SECTION."_categories WHERE id=".(integer)$id))
    { $this->title=$row['name'].(!empty($this->title)?" - ".$this->title:"");
      $this->AddNavCategories($row['idker']);
      $this->AddNavigation($row['name'],shoplite_createCategoryLink($row['id'],SECTION));
    }
  }
  }

/**
 * Формирование данных доступных в шаблоне главной страницы раздела.
 */

  function MainPage()
  {
    $this->supportCached();
  
  $items=array();
  if($_GET['rows'])
    $rows=$_GET['rows'];
  else
    $rows=9;
  
  if($_GET['query'])
  {
    $search = "AND `name` LIKE '%".$_GET['query']."%'";
    
  }  
  if(!empty($_REQUEST['sort']))
  A_Session::set(SECTION.'_csort',$_REQUEST['sort']);
  if(!empty($_REQUEST['rows']))
  A_Session::set(SECTION.'_crows',$_REQUEST['rows']);

  $sort=escape_order_string(A_Session::get(SECTION.'_csort',!empty(A::$OPTIONS['mysort'])?A::$OPTIONS['mysort']:A::$OPTIONS['sort']));
  $rows=(integer)A_Session::get(SECTION.'_crows',A::$OPTIONS['crows']);
  $pager = new A_Pager($rows);
  $pager->query("SELECT *,svote/cvote AS vote FROM ".SECTION."_catalog WHERE active='Y' ".$search." ORDER BY {$sort}");
  while($row=$pager->fetchRow())
    { $row['link']=shoplite_createItemLink($row['id'],SECTION);
    $row['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$row['id'];
    $row['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$row['id'];
    $row['category']=getTreePath(SECTION."_categories",$row['idcat']);
    $row['vote']=round($row['vote'],2);
    $row['available']=$row['iscount']>0;
    if(A::$OPTIONS['useimages'])
    { $row['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
    }
    if(A::$OPTIONS['usefiles'])
    { $row['files']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_files WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      foreach($row['files'] as $i=>$data)
      { $row['files'][$i]['link']=(LANG==DEFAULTLANG?"":"/".LANG)."/getfile/".$data['id']."/".$data['name'];
        $row['files'][$i]['size']=sizestring($data['size']);
      }
      $row['idfile']=isset($row['files'][0]['id'])?$row['files'][0]['id']:0;
    }
    if(A::$OPTIONS['modprices'])
    { $mprices=!empty($row['mprices'])?unserialize($row['mprices']):array();
      $row['mprices']=array();
      foreach($mprices as $i=>$mp)
      $row['mprices'][]=array('id'=>$i,'name'=>$mp['name'],'price'=>$mp['price']);
      }
      if(A::$OPTIONS['usetags'])
    $row['tags']=A_SearchEngine::getInstance()->convertTags($row['tags']);
    prepareValues(SECTION,$row);
      $row=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$row);
      $items[]=$row;
    }

  $this->Assign("items",$items);
  $this->Assign("items_pager",$pager);
  
  $levels=A::$DB->getOne("SELECT MAX(level) FROM ".SECTION."_categories WHERE active='Y'");
  $this->Assign("levels",$levels);

  $categories=array();
    A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker=0 AND active='Y' ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['link']=shoplite_createCategoryLink($row['id'],SECTION);
    $row['subcategories']=array();
      if($levels)
    { A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker={$row['id']} AND active='Y' ORDER BY sort");
      while($subrow=A::$DB->fetchRow())
      { $subrow['link']=shoplite_createCategoryLink($subrow['id'],SECTION);
        $row['subcategories'][]=$subrow;
      }
      A::$DB->free();
    }
    $categories[]=$row;
    }
  A::$DB->free();
  $this->Assign("categories",$categories);

  $this->AddNavigation(SECTION_NAME);
  }

  private function childCategories($id)
  {
  $idc=A::$DB->getCol("SELECT id FROM ".SECTION."_categories WHERE idker={$id} AND active='Y'");
  $idr=array($id);
  foreach($idc as $id)
    $idr=array_merge($idr,$this->childCategories($id));
  return $idr;
  }

  private function activeCategory($id)
  { static $cache=array();
  if(isset($cache[$id]))
  return $cache[$id];
  elseif($row=A::$DB->getRowById($id,SECTION."_categories"))
  { if($row['active']=='N')
    return $cache[$id]='N';
    elseif($row['idker']>0)
    return $cache[$id]=$this->activeCategory($row['idker']);
    else
    return $cache[$id]='Y';
  }
  else
  return $cache[$id]='N';
  }

/**
 * Формирование данных доступных в шаблоне страницы категории.
 */

  function CategoryPage()
  {

    $this->supportCached();
    $this->addCacheParam_Get('page');

    if(A::$OPTIONS['usetags'])
  $this->category['tags']=A_SearchEngine::getInstance()->convertTags($this->category['tags']);
  $this->category=A::$OBSERVER->Modifier('fcategory_prepareValues',SECTION,$this->category);
  $this->Assign("category",$this->category);
  
  if (isset($_GET['filterdel']) && isset($_GET['namedel']))
  {
    $fdel = $_GET['filterdel'];
    $ndel = $_GET['namedel'];
    $ar = A_Session::get(SECTION."_filters");
    foreach ($ar[$fdel] as $key => $value)
    if ($value==$ndel)
      unset($ar[$fdel][$key]);
    A_Session::set(SECTION.'_filters',$ar);
  }
  if ($_GET['filters']=="no")
  {
    A_Session::unregister(SECTION."_filters");
  }
  
  $idcat = $this->category['id'];
    
    // new
  $child_cat = A::$DB->getAll("SELECT id FROM ".SECTION."_categories WHERE idker='$idcat'");
    
    $add_query = '';
    if($child_cat){
      foreach($child_cat as $child_id){
        $child_ = $child_id['id'];
        $add_query = $add_query." OR idcat='$child_'";
      }
    }
    
    // END new
    
  $test = A::$DB->getAll("SELECT id FROM ".SECTION."_catalog WHERE idcat='$idcat'".$add_query);
    

  if($test)
  {

    foreach ($this->category['fields'] as $key => $value)
    {
      if($value['field']!='cat')
      {
      $q=array();

      if (strlen($value['value'])==4)
      {
        $k = $value['field'];  

        $all=A::$DB->getAll("SELECT ".$k." FROM ".SECTION."_catalog WHERE idcat='$idcat'".$add_query." group by ".$k);

        foreach ($all as $v)
          if($v[$k]!="")
            $q['value'][]=$v[$k];
        $q['name']=$value['name'];
        $q['id']=$k;
        $qq[]=$q;
      }
      }
    }  
  }

   
    
  $this->Assign("filters", $qq);
  if(isset($_GET['fvalue']) && isset($_GET['fname']))
  {
    $ar = A_Session::get(SECTION."_filters");
    $fieldname = $_GET['fname'];
    $ar[$fieldname][] = $_GET['fvalue'];
    $ar[$fieldname]=array_unique($ar[$fieldname]);
    A_Session::set(SECTION.'_filters',$ar);
  }
  
  if(A_Session::get(SECTION."_filters"))
  {
    $myfilter='';
    $ar = A_Session::get(SECTION."_filters");
    foreach ($ar as $key => $value)
    {
      if(is_array($value))
      {  
        $f=false;
        foreach ($value as $k => $v)
        {
          if($f!=true)
          {
            $myfilter.=" AND ".$key." = '".$v."'"; 
            $f=true;
            $filterOn[]=$v;
          }
          else
          {
            $myfilter.=" OR ".$key." = '".$v."'"; 
            $filterOn[]=$v;
          }
          
        }
      }
      else
      {
        $myfilter.=" AND ".$key." = '".$value."'"; 
      }
    }
  }  
    $this->Assign("filterOn", $filterOn);

  $categories=array();
    A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker={$this->idcat} AND active='Y' ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['link']=shoplite_createCategoryLink($row['id'],SECTION);
    $row['subcategories']=array();
      A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker={$row['id']} AND active='Y' ORDER BY sort");
    while($subrow=A::$DB->fetchRow())
    { $subrow['link']=shoplite_createCategoryLink($subrow['id'],SECTION);
      $row['subcategories'][]=$subrow;
    }
    A::$DB->free();
    $categories[]=$row;
    }
  A::$DB->free();
  $this->Assign("categories",$categories);

  if(!empty($_REQUEST['sort']))
  A_Session::set(SECTION.'_csort',$_REQUEST['sort']);
  if(!empty($_REQUEST['rows']))
  A_Session::set(SECTION.'_crows',$_REQUEST['rows']);

  $sort=escape_order_string(A_Session::get(SECTION.'_csort',!empty(A::$OPTIONS['mysort'])?A::$OPTIONS['mysort']:A::$OPTIONS['sort']));
  $rows=(integer)A_Session::get(SECTION.'_crows',A::$OPTIONS['crows']);

  $this->Assign("rows",$rows);
  $this->Assign("sort",$sort);

  if(A::$OPTIONS['childview'])
  { $childcats=$this->childCategories($this->idcat);
    $where="(idcat IN(".implode(",",$childcats).") OR idcat1 IN(".implode(",",$childcats).") OR idcat2 IN(".implode(",",$childcats).")) AND active='Y'";
  }
  else
  $where="(idcat={$this->idcat} OR idcat1={$this->idcat} OR idcat2={$this->idcat}) AND active='Y'";

  $fields=array(
  'name'=>'string',
  'content'=>'string',
  'tags'=>'string',
  'art'=>'string',
  'date'=>'int',
  'price'=>'int',
  'favorite'=>'bool',
  'new'=>'bool');

  $where=$this->frontfilter($where,$fields);

  $items=array();
  $pager = new A_Pager($rows);
  $pager->query("SELECT *,svote/cvote AS vote FROM ".SECTION."_catalog WHERE {$where} ".$myfilter." ORDER BY {$sort}");
  if($pager->allcount<1)
  {
    A_Session::unregister(SECTION."_filters");
    $pager->query("SELECT *,svote/cvote AS vote FROM ".SECTION."_catalog WHERE {$where} ORDER BY {$sort}");
  }
  while($row=$pager->fetchRow())
    { $row['link']=shoplite_createItemLink($row['id'],SECTION);
    $row['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$row['id'];
    $row['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$row['id'];
    $row['category']=getTreePath(SECTION."_categories",$row['idcat']);
    $row['vote']=round($row['vote'],2);
    $row['available']=$row['iscount']>0;
    if(A::$OPTIONS['useimages'])
    { $row['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
    }
    if(A::$OPTIONS['usefiles'])
    { $row['files']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_files WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      foreach($row['files'] as $i=>$data)
      { $row['files'][$i]['link']=(LANG==DEFAULTLANG?"":"/".LANG)."/getfile/".$data['id']."/".$data['name'];
        $row['files'][$i]['size']=sizestring($data['size']);
      }
      $row['idfile']=isset($row['files'][0]['id'])?$row['files'][0]['id']:0;
    }
    if(A::$OPTIONS['modprices'])
    { $mprices=!empty($row['mprices'])?unserialize($row['mprices']):array();
      $row['mprices']=array();
      foreach($mprices as $i=>$mp)
      $row['mprices'][]=array('id'=>$i,'name'=>$mp['name'],'price'=>$mp['price']);
      }
      if(A::$OPTIONS['usetags'])
    $row['tags']=A_SearchEngine::getInstance()->convertTags($row['tags']);
    prepareValues(SECTION,$row);
      $row=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$row);
      $items[]=$row;
    }



  $this->Assign("items",$items);
  $this->Assign("items_pager",$pager);

  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  $this->AddNavCategories($this->category['idker']);
  $this->AddNavigation($this->category['name']);

  $this->title=$this->category['name'].(!empty($this->title)?" - ".$this->title:"");
  $this->description=$this->category['description'];
  }

/**
 * Формирование данных доступных в шаблоне детальной страницы товара.
 */

  function ItemPage()
  {
  $this->supportCached();

  if($this->idcat>0)
  { $this->category['link']=shoplite_createCategoryLink($this->category['id'],SECTION);
    if(A::$OPTIONS['usetags'])
    $this->category['tags']=A_SearchEngine::getInstance()->convertTags($this->category['tags']);
    $this->category=A::$OBSERVER->Modifier('fcategory_prepareValues',SECTION,$this->category);
    $this->Assign("category",$this->category);
  }

  $itemdata=$this->itemdata;

  if(A::$OPTIONS['useimages'])
  { $itemdata['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$itemdata['id']));
    $itemdata['idimg']=isset($itemdata['images'][0]['id'])?$itemdata['images'][0]['id']:0;
  }

  if(A::$OPTIONS['usefiles'])
  { $itemdata['files']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_files WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$this->iditem));
    foreach($itemdata['files'] as $i=>$data)
    { $itemdata['files'][$i]['link']=(LANG==DEFAULTLANG?"":"/".LANG)."/getfile/".$data['id']."/".$data['name'];
      $itemdata['files'][$i]['size']=sizestring($data['size']);
    }
    $itemdata['idfile']=isset($itemdata['files'][0]['id'])?$itemdata['files'][0]['id']:0;
  }

    if(A::$OPTIONS['modprices'])
  { $mprices=!empty($itemdata['mprices'])?unserialize($itemdata['mprices']):array();
    $itemdata['mprices']=array();
    foreach($mprices as $i=>$mp)
    $itemdata['mprices'][]=array('id'=>$i,'name'=>$mp['name'],'price'=>$mp['price']);
    }

    if(A::$OPTIONS['usetags'])
  $itemdata['tags']=A_SearchEngine::getInstance()->convertTags($itemdata['tags']);

    prepareValues(SECTION,$itemdata);
  $itemdata=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$itemdata);

  $itemdata['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$itemdata['id'];
  $itemdata['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$itemdata['id'];
  $itemdata['vote']=$itemdata['cvote']>0?round($itemdata['svote']/$itemdata['cvote'],2):0;
  $itemdata['available']=$itemdata['iscount']>0;
  
  $x = A::$DB->getAll("SELECT * FROM ".DOMAIN."_structure_har");
  //print_r($x);
  foreach ($x as $value)
    foreach ($itemdata['fields'] as $k => $value2)
      if ($value['name_ru']==$value2['name'])
        $itemdata['fields'][$k]['h']=$value['h'];
  
    $this->Assign("item",$itemdata);

  $itemdata['ties']=!empty($itemdata['ties'])?unserialize($itemdata['ties']):array();
  $ties=array();
  foreach($itemdata['ties'] as $idcat=>$items)
  foreach($items as $id)
  if($row=A::$DB->getRowById($id,SECTION."_catalog"))
  { $row['link']=shoplite_createItemLink($row['id'],SECTION);
    $row['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$row['id'];
    $row['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$row['id'];
    $row['category']=getTreePath(SECTION."_categories",$row['idcat']);
    $row['available']=$row['iscount']>0;
    $row['images']=A::$DB->getAll("
    SELECT id,caption,path,width,height FROM ".DOMAIN."_images
    WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
    $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
    prepareValues(SECTION,$row);
    $row=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$row);
    $ties[]=$row;
  }

  $this->Assign("ties",$ties);

  if(A::$OPTIONS['usecomments'])
  { $comments=array();
    A::$DB->query("SELECT * FROM ".DOMAIN."_comments WHERE idsec=".SECTION_ID." AND iditem={$this->iditem} AND active='Y' ORDER BY date");
    while($row=A::$DB->fetchRow())
    { if($row['iduser']>0 && A::$AUTH->section)
      { if($row['user']=A::$DB->getRowById($row['iduser'],A::$AUTH->section))
        prepareValues(A::$AUTH->section,$row['user']);
      }
      $comments[]=$row;
    }
    A::$DB->free();
    $this->Assign("comments",$comments);

    $form=array();
     $form['name']=!empty($_REQUEST['name'])?$_REQUEST['name']:(A::$AUTH->isLogin()?A::$AUTH->data['name']:"");
    $form['message']=!empty($_REQUEST['message'])?$_REQUEST['message']:"";
    $this->Assign("form",$form);

    $this->Assign("captcha",$captcha=substr(time(),rand(0,6),4));
    A_Session::set("captcha",md5($captcha));
  }

  if(A::$OPTIONS['usevote'])
    { $this->Assign("isvote",A_Session::get(SECTION."_vote_".$this->iditem,false));
      $this->addCacheParam_Session(SECTION."_vote_".$this->iditem);
    }

  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  if(isset($this->category))
  $this->AddNavCategories($this->category['id']);

    $this->title=$this->itemdata['name'].(!empty($this->title)?" - ".$this->title:"");
  if(!empty($this->itemdata['keywords']))
  $this->keywords=$this->itemdata['keywords'];
    $this->description=$this->itemdata['description'];
  }

/**
 * Формирование данных доступных в шаблоне страницы результатов поиска.
 */

  function ResultPage()
  {
  if(!empty($_REQUEST['sort']))
  A_Session::set(SECTION.'_rsort',$_REQUEST['sort']);
  if(!empty($_REQUEST['rows']))
  A_Session::set(SECTION.'_rrows',$_REQUEST['rows']);

  $sort=escape_order_string(A_Session::get(SECTION.'_rsort',!empty(A::$OPTIONS['mysort'])?A::$OPTIONS['mysort']:A::$OPTIONS['sort']));
  $rows=(integer)A_Session::get(SECTION.'_rrows',A::$OPTIONS['rrows']);

  $this->Assign("rows",$rows);
  $this->Assign("sort",$sort);

  $_GET['filter']=1;

  $fields=array('name'=>'string','content'=>'string','tags'=>'string','art'=>'string','date'=>'int','price'=>'int','favorite'=>'bool','new'=>'bool');

  $where=$this->frontfilter('',$fields);

  if(!empty($_GET['idcat']))
  { if(is_array($_GET['idcat']))
    { $where2=array();
      foreach($_GET['idcat'] as $idcat)
      { if($idcats=$this->childCategories((integer)$idcat))
        $where2[]="(idcat IN(".implode(",",$idcats).") OR idcat1 IN(".implode(",",$idcats).") OR idcat2 IN(".implode(",",$idcats)."))";
      }
      $where.=" AND (".implode(" OR ",$where2).")";
    }
    elseif(empty($this->idcat))
    { if($this->category=A::$DB->getRowById($_GET['idcat'],SECTION."_categories"))
        A::goUrl(shoplite_createCategoryLink($this->category['id'],SECTION).'result.html?'.getenv('QUERY_STRING'));
      }
  }

  if($this->category)
  { $this->category['link']=shoplite_createCategoryLink($this->category['id'],SECTION);
    if(A::$OPTIONS['usetags'])
    $this->category['tags']=A_SearchEngine::getInstance()->convertTags($this->category['tags']);
    $this->category=A::$OBSERVER->Modifier('fcategory_prepareValues',SECTION,$this->category);
    $this->Assign("category",$this->category);
    if($idcats=$this->childCategories($this->idcat))
    $where.=" AND (idcat IN(".implode(",",$idcats).") OR idcat1 IN(".implode(",",$idcats).") OR idcat2 IN(".implode(",",$idcats)."))";
  }

  $items=array();
  $pager = new A_Pager($rows);
  $pager->query("SELECT *,svote/cvote AS vote  FROM ".SECTION."_catalog WHERE active='Y'{$where} ORDER BY {$sort}");
  while($row=$pager->fetchRow())
    { $row['link']=shoplite_createItemLink($row['id'],SECTION);
    $row['tobasketlink']=getSectionLink(SECTION)."?action=addbasket&id=".$row['id'];
    $row['tocomparelink']=getSectionLink(SECTION)."?action=addcompare&id=".$row['id'];
    $row['category']=getTreePath(SECTION."_categories",$row['idcat']);
    $row['vote']=round($row['vote'],2);
    $row['available']=$row['iscount']>0;
    if(A::$OPTIONS['useimages'])
    { $row['images']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_images WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      $row['idimg']=isset($row['images'][0]['id'])?$row['images'][0]['id']:0;
    }
    if(A::$OPTIONS['usefiles'])
    { $row['files']=A::$DB->getAll("SELECT * FROM ".DOMAIN."_files WHERE idsec=? AND iditem=? ORDER BY sort",array(SECTION_ID,$row['id']));
      foreach($row['files'] as $i=>$data)
      { $row['files'][$i]['link']=(LANG==DEFAULTLANG?"":"/".LANG)."/getfile/".$data['id']."/".$data['name'];
        $row['files'][$i]['size']=sizestring($data['size']);
      }
      $row['idfile']=isset($row['files'][0]['id'])?$row['files'][0]['id']:0;
    }
    if(A::$OPTIONS['modprices'])
    { $mprices=!empty($row['mprices'])?unserialize($row['mprices']):array();
      $row['mprices']=array();
      foreach($mprices as $i=>$mp)
      $row['mprices'][]=array('id'=>$i,'name'=>$mp['name'],'price'=>$mp['price']);
      }
      if(A::$OPTIONS['usetags'])
    $row['tags']=A_SearchEngine::getInstance()->convertTags($row['tags']);
    prepareValues(SECTION,$row);
      $row=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$row);
      $items[]=$row;
    }

  $this->Assign("items",$items);
  $this->Assign("items_pager",$pager);

  $data=$pars=array();
  foreach($_GET as $field=>$value)
  if(!empty($value))
  { if(is_array($value))
    { $p=array();
      foreach($value as $val)
      $p[]="{$field}[]=".(integer)$val;
    $pars[$field]=implode("&",$p);
      $data[$field]=implode(",",$value);
    }
    else
    { $pars[$field]="{$field}=".urlencode($value);
      $data[$field]=$value;
    }
  }
  prepareValues(SECTION,$data);
  $filters=array();
  A::$DB->query("SELECT * FROM ".DOMAIN."_fields WHERE item='".SECTION."' ORDER BY sort");
  while($row=A::$DB->fetchRow())
  if(!empty($data[$row['field']]))
  $filters[]=array(
  'field'=>$row['field'],
  'caption'=>$row['name_'.A::$LANG],
  'value'=>$data[$row['field']],
  'link'=>getSectionLink(SECTION)."result.html?".$pars[$row['field']]);
  A::$DB->free();
  $this->Assign("filters",$filters);

  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  $this->AddNavCategories($this->idcat);
  }

/**
 * Формирование данных доступных в шаблоне страницы корзины.
 */

  function BasketPage()
  {
  if(empty(A::$OPTIONS['useorder']))
  A::goUrl(getSectionLink(SECTION));

  $basket=A_Session::get("shoplite_basket",array());

  $all=array('count'=>0,'oldsum'=>0,'sum'=>0,'discount'=>0);
  foreach($basket as $i=>$row)
  { $basket[$i]['data']=$row['data']=A::$OBSERVER->Modifier('shoplite_prepareValues',$row['section'],$row['data']);
    $basket[$i]['id']=$i;
    $basket[$i]['oldsum']=$row['oldsum']=$row['data']['oldprice']*$row['count'];
    $basket[$i]['sum']=$row['sum']=$row['data']['price']*$row['count'];
    $basket[$i]['discount']=$row['discount']=!empty($row['data']['discount'])?$row['data']['discount']*$row['count']:0;
    $basket[$i]['deletelink']=getSectionLink(SECTION)."?action=delbasket&id=$i";
    $all['count']+=$row['count'];
    $all['oldsum']+=$row['oldsum'];
    $all['sum']+=$row['sum'];
    $all['discount']+=$row['discount'];
  }
  $this->Assign('basket',$basket);
  $this->Assign('all',$all);

  $this->prevc=false;
  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }

/**
 * Формирование данных доступных в шаблоне страницы заказа.
 */

  function OrderPage()
  {
  if(empty(A::$OPTIONS['useorder']))
  A::goUrl(getSectionLink(SECTION));

  $basket=A_Session::get("shoplite_basket",array());

  $all=array('count'=>0,'oldsum'=>0,'sum'=>0,'discount'=>0);
  foreach($basket as $i=>$row)
  { $basket[$i]['data']=$row['data']=A::$OBSERVER->Modifier('shoplite_prepareValues',$row['section'],$row['data']);
    $basket[$i]['id']=$i;
    $basket[$i]['oldsum']=$row['oldsum']=$row['data']['oldprice']*$row['count'];
    $basket[$i]['sum']=$row['sum']=$row['data']['price']*$row['count'];
    $basket[$i]['discount']=$row['discount']=!empty($row['data']['discount'])?$row['data']['discount']*$row['count']:0;
    $all['count']+=$row['count'];
    $all['oldsum']+=$row['oldsum'];
    $all['sum']+=$row['sum'];
    $all['discount']+=$row['discount'];
  }

  $this->Assign('basket',$basket);
  $this->Assign('all',$all);
  $this->Assign("form",!empty($_POST)?$_POST:(A::$AUTH->isLogin()?A::$AUTH->data:array()));

  $this->Assign("captcha",$captcha=substr(time(),rand(0,6),4));
  A_Session::set("captcha",md5($captcha));

  $this->prevc=false;
    $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }

/**
 * Формирование данных доступных в шаблоне страницы сообщения.
 */

  function MessagePage()
  {
    if($idorder=A_Session::get(SECTION."_idorder",0))
    { if($order=A::$DB->getRowById($idorder,SECTION."_orders"))
      { $order['basket']=!empty($order['basket'])?@unserialize($order['basket']):array();
    $order['userdata']=!empty($order['userdata'])?@unserialize($order['userdata']):array();
    $all=array('count'=>0,'oldsum'=>0,'sum'=>0,'discount'=>0);
    foreach($order['basket'] as $i=>$row)
    { $all['count']+=$row['count'];
        $all['oldsum']+=$row['oldsum'];
        $all['sum']+=$row['sum'];
        $all['discount']+=$row['discount'];
      }
    $this->Assign("order",$order);
        $this->Assign("basket",$order['basket']);
        $this->Assign("data",$order['userdata']);
        $this->Assign('all',$all);
      }
    }

  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }

  function getCategories(&$values,$id=0,$owner="")
  {
    if(!empty($owner)) $owner.="&nbsp;&raquo;&nbsp;";
  A::$DB->query("SELECT * FROM ".SECTION."_categories WHERE idker={$id} AND active='Y' ORDER BY sort");
  while($row=A::$DB->fetchRow())
    { $row['name']=$owner.$row['name'];
    $values[]=$row;
      $this->getCategories($values,$row['id'],$row['name']);
    }
  A::$DB->free();
  }

/**
 * Формирование данных доступных в шаблоне страницы полного списка товаров.
 */

  function PricePage()
  {
    $this->supportCached();

  $categories=array();
  $this->getCategories($categories);

  $baselink=getSectionLink(SECTION);
  $sort=!empty($_GET['sort'])?preg_replace("/[^a-z0-1_]+/i","",$_GET['sort']):(!empty(A::$OPTIONS['mysort'])?A::$OPTIONS['mysort']:A::$OPTIONS['sort']);

  foreach($categories as $i=>$catrow)
  { $categories[$i]['items']=array();
    A::$DB->query("
    SELECT * FROM ".SECTION."_catalog
    WHERE idcat={$catrow['id']} AND active='Y'
    ORDER BY {$sort}");
    while($row=A::$DB->fetchRow())
    { $row['tobasketlink']=$baselink."?action=addbasket&id=".$row['id'];
      $row['tocomparelink']=$baselink."?action=addcompare&id=".$row['id'];
    $row['available']=$row['iscount']>0;
    prepareValues(SECTION,$row);
        $row=A::$OBSERVER->Modifier('shoplite_prepareValues',SECTION,$row);
    $categories[$i]['items'][]=$row;
    }
    A::$DB->free();
  }
  $this->Assign("categories",$categories);

    $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }

/**
 * Формирование данных доступных в шаблоне страницы сравнения.
 */

  function ComparePage()
  {
  $compare=A_Session::get(SECTION."_compare",array());

  foreach($compare as $id=>$row)
  $compare[$id]['deletelink']=getSectionLink(SECTION)."?action=delcompare&id={$id}";

  $this->Assign('items',array_values($compare));
  $this->Assign('fields',getFields(SECTION));

  $this->prevc=false;
  $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }

/**
 * Формирование данных доступных в шаблоне страницы "мои заказы".
 */

  function MyOrdersPage()
  {
    if(!A::$AUTH->isLogin())
    A::goUrl(getSectionLink(SECTION));

    $orders=array();
  $pager = new A_Pager(20);
  $pager->tab="orders";
  $pager->query("SELECT * FROM ".SECTION."_orders WHERE iduser=? ORDER BY date DESC",A::$AUTH->id);
    while($row=$pager->fetchRow())
    { if($section=getSectionByModule('robopay'))
    $row['paylink']=getSectionLink($section)."?action=pay&code=".md5($section.$row['date']);
    $row['pay']=function_exists('pay_getname')?pay_getname($row['pay']):"Наличные";
    $row['basket']=!empty($row['basket'])?unserialize($row['basket']):array();
      $row['sum']=round($row['sum'],2);
    $orders[]=$row;
    }
    $pager->free();

    $this->Assign("orders",$orders);
    $this->Assign("orders_pager",$pager);

    $this->AddNavigation(SECTION_NAME,getSectionLink(SECTION));
  }
}

if(A::$CACHE->page)
A::$CACHE->page->restore();

A::$MAINFRAME = new ShopLiteModule;