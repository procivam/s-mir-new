<?php /* Smarty version 2.6.26, created on 2015-12-13 17:47:08
         compiled from system_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'system_options.tpl', 11, false),array('function', 'submit', 'system_options.tpl', 25, false),array('function', 'hidden', 'system_options.tpl', 27, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="box" style="width:800px">
<form method="post">
<p><label><input type="checkbox" name="autoupdate"<?php if ($this->_tpl_vars['options']['autoupdate']): ?> checked<?php endif; ?>>&nbsp;Проверять наличие обновлений</label></p>
<p><label><input type="checkbox" name="debugmode"<?php if ($this->_tpl_vars['options']['debugmode']): ?> checked<?php endif; ?>>&nbsp;Режим отладки</label></p>
<p><label><input type="checkbox" name="smartysecurity"<?php if ($this->_tpl_vars['options']['smartysecurity']): ?> checked<?php endif; ?>>&nbsp;Защищенный режим Smarty</label></p>
<p><label><input type="checkbox" name="smtp_use"<?php if ($this->_tpl_vars['options']['smtp_use']): ?> checked<?php endif; ?> onclick="$('smtpbox').style.display=this.checked?'':'none';">&nbsp;SMTP для отправки писем</label></p>
<div id="smtpbox" class="box"<?php if (! $this->_tpl_vars['options']['smtp_use']): ?> style="display:none"<?php endif; ?>>
<table>
<tr><td>Хост:</td><td><?php echo smarty_function_editbox(array('name' => 'smtp_host','width' => '200','text' => $this->_tpl_vars['options']['smtp_host']), $this);?>
</td></tr>
<tr><td>Порт:</td><td><?php echo smarty_function_editbox(array('name' => 'smtp_port','width' => '50','text' => $this->_tpl_vars['options']['smtp_port']), $this);?>
</td></tr>
<tr><td>Авторизация:</td><td><input type="checkbox" name="smtp_auth"<?php if ($this->_tpl_vars['options']['smtp_auth']): ?> checked<?php endif; ?> onclick="$('smtpl').style.display=$('smtpp').style.display=this.checked?'':'none';"></td></tr>
<tr id="smtpl"<?php if (! $this->_tpl_vars['options']['smtp_auth']): ?> style="display:none"<?php endif; ?>><td>Логин:</td><td><?php echo smarty_function_editbox(array('name' => 'smtp_login','width' => '120','text' => $this->_tpl_vars['options']['smtp_login']), $this);?>
</td></tr>
<tr id="smtpp"<?php if (! $this->_tpl_vars['options']['smtp_auth']): ?> style="display:none"<?php endif; ?>><td>Пароль:</td><td><?php echo smarty_function_editbox(array('name' => 'smtp_password','width' => '120','text' => $this->_tpl_vars['options']['smtp_password']), $this);?>
</td></tr>
</table>
</div>
<p><label><input type="radio" name="caching" value="0"<?php if ($this->_tpl_vars['options']['caching'] == 0): ?> checked<?php endif; ?>>&nbsp;Без кэширования</label></p>
<p><label><input type="radio" name="caching" value="1"<?php if ($this->_tpl_vars['options']['caching'] == 1): ?> checked<?php endif; ?>>&nbsp;Кэширование в файлах</label></p>
<p><label><input type="radio" name="caching" value="2"<?php if ($this->_tpl_vars['options']['caching'] == 2): ?> checked<?php endif; ?><?php if (! $this->_tpl_vars['memcache']): ?> disabled<?php endif; ?>>&nbsp;Кэширование в memcached</label></p>
<input type="hidden" name="mode" value="system">
<input type="hidden" name="item" value="options">
<input type="hidden" name="action" value="save">
<div align="right" style="margin:5px;margin-top:10px;">
<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

</div>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>