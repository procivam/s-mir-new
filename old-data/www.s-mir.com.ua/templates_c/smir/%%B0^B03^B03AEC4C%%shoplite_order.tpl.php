<?php /* Smarty version 2.6.26, created on 2015-11-17 11:27:40
         compiled from shoplite_order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'shoplite_order.tpl', 7, false),array('function', 'captcha', 'shoplite_order.tpl', 46, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="inerfon">
<div class="main shoppingCart">
<div class="header">
	<div class="header_inner">
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

	</div>
</div>
<div class="wrapper">
	<div class="alpfainer">
		<h1>Оформление заказа</h1>

		<ul class="pathTo">
			<li class="toIndex"><a href="/">Главная</a>&nbsp;></li>
			<li>Корзина</li>
		</ul>

		<form method="post" data-parsley-validate>
			<p class="p5"><input id="inp3" name="name" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">имя</p>   
			<p class="p5"><input id="inp3" name="phone" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">Телефон</p>
			<p class="p5"><input id="inp3" name="email" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">E-mail</p>
			<p class="p5">
			Способ доставки
			</p>
			 
			<p class="p5">
			 </p>
			<table width="100%" border="0">
				<tbody>
					<tr>
						<td class="td6"><textarea name="comments" id="inp4"></textarea></td>
						<td class="td8_2">Примечание</td>
					</tr>
				</tbody>
			</table>
				<p></p>
			<table width="100%" border="0" class="tb2">
				<tbody>
					<tr>
						<td class="td6"><input id="inp5" type="text" size="10" name="captcha" value="" class="toggle-inputs" parsley-required="true"></td>
						<td class="td7"><?php echo smarty_function_captcha(array('width' => '75','height' => '25'), $this);?>
</td>
						<td>Введите код </td>
					</tr>
				</tbody>
			</table>
				<br>	
			<input type="hidden" name="action" value="order">
			<input name="savebutton" class="inerlink2" type="submit" value="Отправить" style="width:120px">
		</form>
	</div>

	<img src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/alphaline1-vertical.jpg" class="divider">

	<div class="listContainer" id="basket-items">
		<ol class="cartlist">
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['basket']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<li class="item">
				<img src="/<?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['data']['images'][0]['path']; ?>
">
				<span class="name"><?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['data']['name']; ?>
</span>
				<div class="counter">
					<img class="left" src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/counter-left.png">
											<input style="border: medium none;text-align: center;width: 20px;" class="amount" type="text" name="count_<?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['count']; ?>
">
					<img class="right" src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/counter-right.png">
				</div>
				<p><span class="price"><?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['sum']; ?>
</span>&nbsp;<?php echo $this->_tpl_vars['valute']; ?>
</p>
			</li>
			<?php endfor; endif; ?>
		</ol>

		<p class="overall">Всего&nbsp;:&nbsp;<span class="price"><?php echo $this->_tpl_vars['all']['sum']; ?>
</span>&nbsp;<span class="uah"><?php echo $this->_tpl_vars['valute']; ?>
</span></p>
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