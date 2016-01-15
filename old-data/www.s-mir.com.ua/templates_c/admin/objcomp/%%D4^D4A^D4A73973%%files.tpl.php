<?php /* Smarty version 2.6.26, created on 2015-10-22 17:14:13
         compiled from files.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'button', 'files.tpl', 3, false),array('function', 'help', 'files.tpl', 25, false),array('function', 'html_options', 'files.tpl', 29, false),)), $this); ?>
<div id="files_gridbox"></div>
<div id="files_mainbox" align="right">
<?php echo smarty_function_button(array('caption' => "Выбрать",'onclick' => "files_getregister()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Загрузить",'onclick' => "files_getupload()"), $this);?>

</div>
<div id="files_uploadbox" class="box" style="display:none">
<table class="invisiblegrid" width="100%">
<tr>
<td>Файл:</td>
<td width="80%">Описание:</td>
</tr>
<tr>
<td><div id="files_filebox"></div></td>
<td width="80%"><input type="text" id="files_caption1" name="files_caption1" style="width:100%"></td>
</tr>
</table>
<div align="right" style="margin-top:10px">
<?php echo smarty_function_button(array('caption' => "Загрузить",'onclick' => "files_upload()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "files_cancel()"), $this);?>

</div>
</div>
<div id="files_registerbox" class="box" style="display:none">
<table class="invisiblegrid" width="100%">
<tr>
<td width="20%"><span <?php echo smarty_function_help(array('text' => "Файлы загруженные в каталог /ifiles/"), $this);?>
>Файл:</span></td>
<td width="80%">Описание:</td>
</tr>
<tr>
<td width="20%"><select id="files_path" name="files_path" style="width:100%"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['files']), $this);?>
</select></td>
<td width="80%"><input type="text" id="files_caption2" name="files_caption2" style="width:100%"></td>
</tr>
</table>
<div align="right" style="margin-top:10px">
<?php echo smarty_function_button(array('caption' => "Выбрать",'onclick' => "files_register()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "files_cancel()"), $this);?>

</div>
</div>
<div id="files_editbox" class="box" style="display:none">
<table class="invisiblegrid" width="100%">
<tr>
<td>Заменить:</td>
<td width="80%">Описание:</td>
</tr>
<tr>
<td><div id="files_filebox2"></div></td>
<td width="80%"><input type="text" id="files_caption3" name="files_caption3" style="width:100%"></td>
</tr>
</table>
<div align="right" style="margin-top:10px">
<input type="hidden" id="files_id" name="files_id" value="0">
<?php echo smarty_function_button(array('caption' => "Сохранить",'onclick' => "files_save()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "files_cancel()"), $this);?>

</div>
</div>
<div id="files_messagebox" class="box" style="display:none" align="center"></div>
<?php if ($this->_tpl_vars['mainframe']): ?>
<script type="text/javascript">files_refresh();</script>
<?php endif; ?>
