<?php /* Smarty version 2.6.26, created on 2016-01-06 17:15:18
         compiled from site_import.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'site_import.tpl', 26, false),array('function', 'submit', 'site_import.tpl', 31, false),array('function', 'hidden', 'site_import.tpl', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
function goimport(form)
{ if(form.importmode[0].checked && form.importfile.value.length==0)
  { alert(\'Укажите загружаемый файл!\'); return false; }
  if(form.importmode[1].checked && form.importpath.value.length==0)
  { alert(\'Укажите путь к файлу!\'); return false; }
  if(confirm(\'Вы действительно хотите импортировать конфигурацию?\'))
  { showLoading();
    return true;
  }
  else
  return false;
}
</script>
'; ?>


<div class="box" style="width:800px">
<form method="post" enctype="multipart/form-data" onsubmit="return goimport(this)">
<h3>Импорт:</h3>
<p style="margin-top:5px;"><label><input id="im1" type="radio" name="importmode" value="1" checked>&nbsp;Загрузить архив:</label></p>
<p style="margin-top:5px;"><input type="file" name="importfile" onchange="$('im1').checked=true;"></p>
<p style="margin-top:5px;"><label><input id="im2" type="radio" name="importmode" value="2">&nbsp;Путь к файлу на сервере:</label></p>
<p style="margin-top:5px;"><?php echo smarty_function_editbox(array('name' => 'importpath','width' => "40%",'onchange' => "$('im2').checked=true;"), $this);?>
</p>
<input type="hidden" name="mode" value="site">
<input type="hidden" name="item" value="import">
<input type="hidden" name="action" value="import">
<div align="right" style="margin:5px;margin-top:10px;">
<?php echo smarty_function_submit(array('caption' => "Импорт"), $this);?>

</div>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</div>

<div class="box" style="width:800px;margin-top:15px;">
<form method="post">
<h3>Экспорт:</h3>
<p><label><input type="checkbox" name="bd" checked>&nbsp;База данных</label></p>
<p><label><input type="checkbox" name="theme" checked>&nbsp;Тема дизайна</label></p>
<p><label><input type="checkbox" name="files">&nbsp;Пользовательские файлы</label></p>
<p><label><input type="checkbox" name="extensions">&nbsp;Используемые расширения</label></p>
<p><label><input type="radio" name="type" value="zip"<?php if ($this->_tpl_vars['usezip']): ?> checked<?php else: ?> disabled<?php endif; ?>>&nbsp;zip</label>&nbsp;&nbsp;
<label><input type="radio" name="type" value="gz"<?php if (! $this->_tpl_vars['usezip']): ?> checked<?php endif; ?>>&nbsp;gz</label></p>
<input type="hidden" name="mode" value="site">
<input type="hidden" name="item" value="import">
<input type="hidden" name="action" value="export">
<div align="right" style="margin:5px;margin-top:10px;">
<?php echo smarty_function_submit(array('caption' => "Экспорт"), $this);?>

</div>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>