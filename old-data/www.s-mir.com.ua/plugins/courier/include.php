<?php
/**
 * @project Astra.CMS
 * @link http://a-cms.ru/
 * @copyright 2010 "Астра Вебтехнологии"
 * @author Vitaly Hohlov <vitaly.hohlov@gmail.com>
 * @package Plugins
 */
/**************************************************************************/

function courier_getPrice($sum,$data)
{
  $data=!empty($data)?unserialize($data):array();
  foreach($data as $row)
  if($sum>=(integer)$row['from'] && (!$row['to'] || ((integer)$row['to']>0 && $sum<(integer)$row['to'])))
  return round((integer)$row['price']+($sum*(integer)$row['per']/100),2);
  return 0;
}

function courier_ShowBasket($template)
{
  if(A_MODE==A_MODE_FRONT && MODULE=='shoplite' )
  {
    if(!$structure=getStructureByPlugin('courier'))
    return;

	/*$all=A::$MAINFRAME->get_template_vars('all');
	if(empty($all['count']))
	return;*/

	$couriers=$_couriers=array();
    A::$DB->query("SELECT * FROM {$structure} ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['price']=courier_getPrice($all['sum'],$row['data']);
	  $row['fullname']=$row['name'].' ('.($row['price']>0?$row['price']." ".A::$OPTIONS['valute']:"Бесплатно").')';
	  $couriers[$row['id']]=$row['fullname'];
	  $_couriers[$row['id']]=$row;
    }
    A::$DB->free();

    if(empty($couriers))
    return;

	$idcourier=A_Session::get(SECTION.'_courier',key($couriers));

	if(isset($_couriers[$idcourier]))
	{ if(!empty($_couriers[$idcourier]['price']))
	  { $all['subcouriersum']=$all['sum'];
	    $all['sum']+=$_couriers[$idcourier]['price'];
        A::$MAINFRAME->Assign("all",$all);
      }

      A::$MAINFRAME->Assign("courier",$_couriers[$idcourier]);
	}

	A::$MAINFRAME->Assign("couriers",$couriers);
  }
}

A::$OBSERVER->AddHandler('ShowPage','courier_ShowBasket');

function courier_RecalcBasket($action)
{
  if(A_MODE==A_MODE_FRONT && MODULE=='shoplite' && $action=='recalcbasket')
  {
    if(!empty($_REQUEST['courier']))
    A_Session::set(SECTION.'_courier',(integer)$_REQUEST['courier']);
  }
}

A::$OBSERVER->AddHandler('Action','courier_RecalcBasket');

function courier_ShowOrder($template)
{
  if(A_MODE==A_MODE_FRONT && MODULE=='shoplite' && A::$MAINFRAME->page=='order')
  {
    if(!$structure=getStructureByPlugin('courier'))
    return;

    $all=A::$MAINFRAME->get_template_vars('all');
    if(empty($all['count']))
	return;

	$couriers=array();
    A::$DB->query("SELECT * FROM {$structure} ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['price']=courier_getPrice($all['sum'],$row['data']);
	  $row['fullname']=$row['name'].' ('.($row['price']>0?$row['price']." ".A::$OPTIONS['valute']:"Бесплатно").')';
	  $couriers[$row['id']]=$row;
    }
    A::$DB->free();

    if(empty($couriers))
    return;

	$idcourier=A_Session::get(SECTION.'_courier',key($couriers));

	if(isset($couriers[$idcourier]))
	{ if(!empty($couriers[$idcourier]['price']))
	  { $all['subcouriersum']=$all['sum'];
	    $all['sum']+=$couriers[$idcourier]['price'];
        A::$MAINFRAME->Assign("all",$all);
      }
      A::$MAINFRAME->Assign("courier",$couriers[$idcourier]);
	}
  }
}

A::$OBSERVER->AddHandler('ShowPage','courier_ShowOrder');

function courier_ShowBlock($block,$data)
{
  if($block=='shoplite_basket')
  {
    if(!$structure=getStructureByPlugin('courier'))
    return;

	$all=$data['object']->get_template_vars('all');
	$valute=$data['object']->get_template_vars('valute');
	if(empty($all['count']))
	return;

    $couriers=array();
    A::$DB->query("SELECT * FROM {$structure} ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['price']=courier_getPrice($all['sum'],$row['data']);;
	  $row['fullname']=$row['name'].' ('.($row['price']>0?$row['price']." ".$valute:"Бесплатно").')';
	  $couriers[$row['id']]=$row;
    }
    A::$DB->free();

    if(empty($couriers))
    return;

    $idcourier=A_Session::get($data['object']->section.'_courier',key($couriers));

	if(isset($couriers[$idcourier]))
	{ if(!empty($couriers[$idcourier]['price']))
	  { $all['subcouriersum']=$all['sum'];
	    $all['sum']+=$couriers[$idcourier]['price'];
	    $data['object']->Assign("all",$all);
	  }
      $data['object']->Assign("courier",$couriers[$idcourier]);
	}
  }
}

A::$OBSERVER->AddHandler('ShowBlock','courier_ShowBlock');

function courier_SendOrder($template,$data)
{
  if(A_MODE==A_MODE_FRONT && MODULE=='shoplite' && ($template==A::$OPTIONS['mail_toadmin'] || $template==A::$OPTIONS['mail_touser']))
  {
    if(!$structure=getStructureByPlugin('courier'))
    return;

	$all=$data['object']->get_template_vars('all');
	if(empty($all['count']))
	return;

    $couriers=array();
    A::$DB->query("SELECT * FROM {$structure} ORDER BY sort");
    while($row=A::$DB->fetchRow())
    { $row['price']=courier_getPrice($all['sum'],$row['data']);
	  $row['fullname']=$row['name'].' ('.($row['price']>0?$row['price']." ".A::$OPTIONS['valute']:"Бесплатно").')';
	  $couriers[$row['id']]=$row;
    }
    A::$DB->free();

    if(empty($couriers))
    return;

    $idcourier=A_Session::get(SECTION.'_courier',key($couriers));

	if(isset($couriers[$idcourier]))
	{ if(!empty($couriers[$idcourier]['price']))
	  { $all['subcouriersum']=$all['sum'];
	    $all['sum']+=$couriers[$idcourier]['price'];
	    $data['object']->Assign("all",$all);
	  }
      $data['object']->Assign("courier",$couriers[$idcourier]);
	}
  }
}

A::$OBSERVER->AddHandler('SendMail','courier_SendOrder');