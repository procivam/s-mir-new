<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <admin@a-cms.ru>
 * @package Blocks
 */
/**************************************************************************/

/**
 * Блок "Магазин Lite: Корзина".
 *
 * <a href="http://wiki.a-cms.ru/blocks/shoplite_basket">Руководство</a>.
 */

class shoplite_basket_Block extends A_Block
{
/**
 * Формирование данных доступных в шаблоне.
 */

  function createData()
  {
	$basket=A_Session::get("shoplite_basket",array());

	$all=array('count'=>0,'oldsum'=>0,'sum'=>0,'discount'=>0);
	foreach($basket as $i=>$row)
	{ $row['data']['basketblock']=true;
	  $basket[$i]['data']=$row['data']=A::$OBSERVER->Modifier('shoplite_prepareValues',$row['section'],$row['data']);
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

	$this->Assign("basketlink",$this->sectionlink."basket.html");
	$this->Assign('valute',$this->options['valute']);
  }
}