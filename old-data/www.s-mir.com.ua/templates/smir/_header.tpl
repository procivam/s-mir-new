<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>{$title}</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="title" content="{$title}">
<meta name="keywords" content="{$keywords}">
<meta name="description" content="{$description}">
<link rel="stylesheet" href="{$system.tpldir}/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="{$system.tpldir}/css/skin.css">
<link rel="icon" href="{$system.tpldir}/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="{$system.tpldir}/img/favicon.ico" type="image/x-icon">

<!--[if lte IE 6]>
<![if gte IE 5.5]>
	<link rel="stylesheet" type="text/css" href="css/ie6.css"/>
	<script type="text/javascript" src="js/fixpng.js"></script>
<![endif]>
<![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css"/><![endif]-->
<script src="{$system.tpldir}/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="{$system.tpldir}/js/jqueryCarus.js"></script> 

<script src="{$system.tpldir}/js/notify/jquery.notification.js"></script>
<script src="{$system.tpldir}/js/parsley.js"></script>
<link rel="stylesheet" type="text/css" href="{$system.tpldir}/js/notify/jquery.notification.css">

<script src="{$system.tpldir}/js/custom.js"></script>

{if $smarty.request.sendorder=='ok'}{literal}
<script>
	jQuery(window).ready(function(){
		msg("Ваш заказ успешно отправлен, в ближайшее время с Вами свяжется менеджер.");
	});
</script>
{/literal}
{/if}

{$meta}</head>
