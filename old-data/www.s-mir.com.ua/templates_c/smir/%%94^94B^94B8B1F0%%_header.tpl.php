<?php /* Smarty version 2.6.26, created on 2016-01-06 16:03:32
         compiled from _header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="title" content="<?php echo $this->_tpl_vars['title']; ?>
">
<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/css/skin.css">
<link rel="icon" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/favicon.ico" type="image/x-icon">

<!--[if lte IE 6]>
<![if gte IE 5.5]>
	<link rel="stylesheet" type="text/css" href="css/ie6.css"/>
	<script type="text/javascript" src="js/fixpng.js"></script>
<![endif]>
<![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css"/><![endif]-->
<script src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/jqueryCarus.js"></script> 

<script src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/notify/jquery.notification.js"></script>
<script src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/parsley.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/notify/jquery.notification.css">

<script src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/js/custom.js"></script>

<?php if ($_REQUEST['sendorder'] == 'ok'): ?><?php echo '
<script>
	jQuery(window).ready(function(){
		msg("Ваш заказ успешно отправлен, в ближайшее время с Вами свяжется менеджер.");
	});
</script>
'; ?>

<?php endif; ?>

<?php echo $this->_tpl_vars['meta']; ?>
</head>