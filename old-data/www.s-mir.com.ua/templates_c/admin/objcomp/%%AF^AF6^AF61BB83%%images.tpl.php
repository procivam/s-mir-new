<?php /* Smarty version 2.6.26, created on 2015-10-22 17:14:13
         compiled from images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'button', 'images.tpl', 3, false),)), $this); ?>
<div id="images_gridbox"></div>
<div id="images_mainbox" align="right">
<?php echo smarty_function_button(array('caption' => "Загрузить",'onclick' => "images_getupload()"), $this);?>

</div>
<div id="images_uploadbox" class="box" style="display:none">
<table class="invisiblegrid" width="100%">
<tr>
<td>Файл изображения:</td>
<td width="80%">Описание:</td>
</tr>
<tr>
<td><div id="images_filebox"></div></td>
<td width="80%"><input type="text" id="images_caption1" name="images_caption1" style="width:100%"></td>
</tr>
</table>
<div align="right" style="margin-top:10px">
<?php echo smarty_function_button(array('caption' => "Загрузить",'onclick' => "images_upload()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "images_cancel()"), $this);?>

</div>
</div>
<div id="images_editbox" class="box" style="display:none">
<table class="invisiblegrid" width="100%">
<tr>
<td>Заменить:</td>
<td width="80%">Описание:</td>
</tr>
<tr>
<td><div id="images_filebox2"></div></td>
<td width="80%"><input type="text" id="images_caption2" name="images_caption2" style="width:100%"></td>
</tr>
</table>
<div align="right" style="margin-top:10px">
<input type="hidden" id="images_id" name="images_id" value="0">
<?php echo smarty_function_button(array('caption' => "Сохранить",'onclick' => "images_save()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "images_cancel()"), $this);?>

</div>
</div>
<div id="images_messagebox" class="box" style="display:none" align="center"></div>
<?php if ($this->_tpl_vars['mainframe']): ?>
<script type="text/javascript">images_refresh();</script>
<?php endif; ?>