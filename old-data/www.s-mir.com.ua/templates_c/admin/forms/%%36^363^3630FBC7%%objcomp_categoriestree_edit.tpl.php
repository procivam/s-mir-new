<?php /* Smarty version 2.6.26, created on 2015-10-24 11:15:40
         compiled from objcomp_categoriestree_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'objcomp_categoriestree_edit.tpl', 8, false),array('function', 'fckeditor', 'objcomp_categoriestree_edit.tpl', 15, false),array('function', 'image', 'objcomp_categoriestree_edit.tpl', 22, false),array('function', 'tags', 'objcomp_categoriestree_edit.tpl', 36, false),array('function', 'hidden', 'objcomp_categoriestree_edit.tpl', 38, false),array('function', 'submit', 'objcomp_categoriestree_edit.tpl', 49, false),array('function', 'button', 'objcomp_categoriestree_edit.tpl', 50, false),)), $this); ?>
<form name="editcatform" method="post" onsubmit="return cat_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'name','text' => $this->_tpl_vars['form']['name']), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','width' => "90%",'max' => 100,'text' => $this->_tpl_vars['form']['urlname']), $this);?>
</td>
</tr>
</table>
<p><a class="cp_link_headding" href="javascript:togglepbox('<?php echo $this->_tpl_vars['system']['item']; ?>
_catpbox')">Дополнительно</a></p>
<div id="<?php echo $this->_tpl_vars['system']['item']; ?>
_catpbox" style="display:none">
<p>Описание:</p>
<p><?php echo smarty_function_fckeditor(array('name' => 'description','toolbar' => 'Medium','height' => 200,'text' => $this->_tpl_vars['form']['description']), $this);?>
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "objcomp_fieldseditor_include.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<p>Изображение:</p>
<?php if ($this->_tpl_vars['form']['idimg']): ?>
<table width="100%" class="invisiblegrid">
<tr>
<td width="80" align="center">
<?php echo smarty_function_image(array('id' => $this->_tpl_vars['form']['idimg'],'width' => 80,'height' => 80,'popup' => true), $this);?>

</td>
<td valign="top">
<p>Заменить:</p>
<p><input type="file" name="catimage"></p>
<p><label><input type="checkbox" name="imagedel">&nbsp;Удалить</label></p>
</td>
</tr>
</table>
<?php else: ?>
<p><input type="file" name="catimage"></p>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array('text' => $this->_tpl_vars['form']['tags']), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => $this->_tpl_vars['form']['tags']), $this);?>

<?php endif; ?>
</div>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['id']; ?>
">
<input type="hidden" name="tab" value="cat">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'obj_action','value' => 'ct_edit'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Активно</label></p>
<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>