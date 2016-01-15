<?php /* Smarty version 2.6.26, created on 2015-10-23 02:53:03
         compiled from shoplite_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'shoplite_main.tpl', 7, false),array('function', 'object', 'shoplite_main.tpl', 31, false),array('function', 'image', 'shoplite_main.tpl', 62, false),array('modifier', 'cat', 'shoplite_main.tpl', 25, false),)), $this); ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="inerfon">
<div class="main">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "order.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="header"><div class="header_inner">
   	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "logo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php echo smarty_function_block(array('id' => 'search'), $this);?>

		<?php echo smarty_function_block(array('id' => 'tel'), $this);?>

		<?php echo smarty_function_block(array('id' => 'basketheader'), $this);?>

        <div class="clearfix"></div>
       <?php echo smarty_function_block(array('id' => 'menu'), $this);?>


    </div></div>

	<div class="content clearfix">	
		<div class="wrapper">
<div class="left-col">	
<?php echo smarty_function_block(array('id' => 'cat_list'), $this);?>


</div>
<div class="middle-col">
    <div class="right-col">
<div class="zag clearfix">
<?php if ($_GET['query']): ?>
	<?php $this->assign('q', ((is_array($_tmp="&query=")) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['query']) : smarty_modifier_cat($_tmp, $_GET['query']))); ?>
	<p class="p1">Поиск</p>
<?php else: ?>
    <p class="p1">Каталог</p>
<?php endif; ?>
    
	<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['navigation']), $this);?>

	
</div>        

<p class="byline"></p>    
<table width="100%" border="0">
  <tr>
   
    <td class="sort1">Сортировать по: &nbsp;<span <?php if ($_SESSION['smir_ru_shoplite_csort'] == 'price desc' || $_SESSION['smir_ru_shoplite_csort'] == 'price asc'): ?>class="blu"<?php endif; ?>>Цене</span></td>
    <td class="sort2"><a href="?sort=price desc<?php if ($_GET['rows']): ?>&rows=<?php echo $_GET['rows']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['q']; ?>
" class="but_down <?php if ($_SESSION['smir_ru_shoplite_csort'] == 'price desc'): ?> active <?php endif; ?>"></a><a href="?sort=price asc<?php if ($_GET['rows']): ?>&rows=<?php echo $_GET['rows']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['q']; ?>
" class="but_up<?php if ($_SESSION['smir_ru_shoplite_csort'] == 'price asc'): ?> active <?php endif; ?>"></a></td>
    <td class="sort3">Рейтингу</td>
    <td class="sort2"><a href="" class="but_down"></a><a href="" class="but_up"></a></td>
    <td class="sort5"><span <?php if ($_SESSION['smir_ru_shoplite_csort'] == 'name desc' || $_SESSION['smir_ru_shoplite_csort'] == 'name asc'): ?>class="blu"<?php endif; ?>>Наименованию</span></td>
    <td class="sort2"><a href="?sort=name asc<?php if ($_GET['rows']): ?>&rows=<?php echo $_GET['rows']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['q']; ?>
" class="but_down <?php if ($_SESSION['smir_ru_shoplite_csort'] == 'name asc'): ?> active <?php endif; ?>"></a><a href="?sort=name desc<?php if ($_GET['rows']): ?>&rows=<?php echo $_GET['rows']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['q']; ?>
" class="but_up <?php if ($_SESSION['smir_ru_shoplite_csort'] == 'name desc'): ?> active <?php endif; ?>"></a></td>
    <td>
  <ul class="pagesort">
    <li <?php if (! $_GET['rows'] || $_GET['rows'] == 9): ?>class="active"<?php endif; ?>><a href="?rows=9<?php echo $this->_tpl_vars['q']; ?>
">9</a></li>
    <li <?php if ($_GET['rows'] == 12): ?>class="active"<?php endif; ?>><a href="?rows=12<?php echo $this->_tpl_vars['q']; ?>
">12</a></li>
  </ul>
	<span class="srt">Показывать по:</span>
    </td>
  </tr>
</table>
<p class="h50"></p>
    
<table width="100%" border="0">
  <tr>
  <?php $this->assign('k', 0); ?>
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
  <?php $this->assign('k', $this->_tpl_vars['k']+1); ?>
	  <td class="mach1">
    	<a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
"><?php echo smarty_function_image(array('data' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['images'],'width' => 196,'height' => 176), $this);?>
</a>
	    <a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</a>
        <?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>

        <p class="price"><b><?php echo $this->_tpl_vars['valute']; ?>
.</b> <?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['price']; ?>
.- </p>
		<a href="?action=addbasket&id=<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" class="bye">Купить</a>
    </td>
    <td class="mach2">&nbsp;</td>
	<?php if ($this->_tpl_vars['k'] == 3 || $this->_tpl_vars['k'] == 6): ?>
		</tr>
		<tr><td colspan="9" class="mach3"></td></tr>
		<tr>
		<?php if ($this->_tpl_vars['k'] == 6): ?><?php $this->assign('k', 0); ?><?php endif; ?>
	<?php endif; ?>
  <?php endfor; endif; ?>
  </tr>
</table>
<p class="linebot3"></p>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['items_pager']), $this);?>


        
    </div>
</div>       
        


		</div>	
	</div>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
</body>
</html>