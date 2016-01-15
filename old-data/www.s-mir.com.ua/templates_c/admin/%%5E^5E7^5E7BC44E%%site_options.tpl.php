<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:05
         compiled from site_options.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'site_options.tpl', 8, false),array('function', 'textarea', 'site_options.tpl', 44, false),array('function', 'submit', 'site_options.tpl', 66, false),array('function', 'hidden', 'site_options.tpl', 70, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="box" style="width:800px">
<form name="siteform" method="post">
<table width="100%" cellspacing="5">
<tr>
<td width="250">Название сайта:</td>
<td><?php echo smarty_function_editbox(array('name' => 'sitename','text' => $this->_tpl_vars['sitename']), $this);?>
</td>
</tr>
<tr>
<td>Заголовок сайта (title):</td>
<td><?php echo smarty_function_editbox(array('name' => 'sitetitle','text' => $this->_tpl_vars['sitetitle']), $this);?>
</td>
</tr>
<tr>
<td>Лицензионный ключ:</td>
<td><?php echo smarty_function_editbox(array('name' => 'code','text' => $this->_tpl_vars['code']), $this);?>
</td>
</tr>
<tr>
<td>Обратный адрес для отправляемых писем:</td>
<td><?php echo smarty_function_editbox(array('name' => 'mailsfrom','text' => $this->_tpl_vars['options']['mailsfrom']), $this);?>
</td>
</tr>
<tr>
<td>Переадресация на хост:</td>
<td><?php echo smarty_function_editbox(array('name' => 'gohost','text' => $this->_tpl_vars['options']['gohost']), $this);?>
</td>
</tr>
<tr>
<td><label for="404gomain">На главную если страница не найдена:</label></td>
<td><input id="404gomain" type="checkbox" name="404gomain"<?php if ($this->_tpl_vars['options']['404gomain']): ?> checked<?php endif; ?>></td>
</tr>
<tr>
<td><label for="userep">Доступный репозиторий:</label></td>
<td><input id="userep" type="checkbox" name="userep"<?php if ($this->_tpl_vars['options']['userep']): ?> checked<?php endif; ?>></td>
</tr>
<tr>
<td><label for="transurl">Транслитерация идентификаторов URL:</label></td>
<td><input id="transurl" type="checkbox" name="transurl"<?php if ($this->_tpl_vars['options']['transurl']): ?> checked<?php endif; ?>></td>
</tr>
<tr>
<td><label for="siteclose">Закрытый режим:</label></td>
<td><input id="siteclose" type="checkbox" name="siteclose"<?php if ($this->_tpl_vars['options']['siteclose']): ?> checked<?php endif; ?>></td>
</tr>
<tr>
<td>Текст для закрытого режима:</td>
<td><?php echo smarty_function_textarea(array('name' => 'siteclosetext','rows' => 2,'text' => $this->_tpl_vars['options']['siteclosetext']), $this);?>
</td>
</tr>
<tr>
<td>Код счетчиков:</td>
<td><?php echo smarty_function_textarea(array('name' => 'codecounters','rows' => 3,'text' => $this->_tpl_vars['options']['codecounters']), $this);?>
</td>
</tr>
<tr>
<td>Код своих мета тегов:</td>
<td><?php echo smarty_function_textarea(array('name' => 'codemeta','rows' => 3,'text' => $this->_tpl_vars['options']['codemeta']), $this);?>
</td>
</tr>
<?php if ($this->_tpl_vars['auth']->isSuperAdmin()): ?>
<tr>
<td><label for="resetcache">Сбросить кэш:</label></td>
<td><input id="resetcache" type="checkbox" name="resetcache"></td>
</tr>
<tr>
<td><label for="cleartpl">Перекомпилировать шаблоны:</label></td>
<td><input id="cleartpl" type="checkbox" name="cleartpl"></td>
</tr>
<?php endif; ?>
<tr>
<td align="right" colspan="2">
<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

</td>
</tr>
</table>
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'save'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>