<?php /* Smarty version 2.6.26, created on 2016-01-04 14:10:21
         compiled from objcomp_categoriestree_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'objcomp_categoriestree_add.tpl', 8, false),array('function', 'fckeditor', 'objcomp_categoriestree_add.tpl', 18, false),array('function', 'tags', 'objcomp_categoriestree_add.tpl', 24, false),array('function', 'hidden', 'objcomp_categoriestree_add.tpl', 26, false),array('function', 'submit', 'objcomp_categoriestree_add.tpl', 39, false),array('function', 'button', 'objcomp_categoriestree_add.tpl', 40, false),)), $this); ?>
<form name="addcatform" method="post" onsubmit="return cat_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'name'), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','max' => 100,'width' => "90%"), $this);?>
</td>
</tr>
</table>
<?php if ($this->_tpl_vars['form']['id'] > 0): ?>
<p><label><input type="checkbox" name="subitem" checked>&nbsp;Подуровень</label></p>
<?php endif; ?>
<p><a class="cp_link_headding" href="javascript:togglepbox('<?php echo $this->_tpl_vars['system']['item']; ?>
_catpbox')">Дополнительно</a></p>
<div id="<?php echo $this->_tpl_vars['system']['item']; ?>
_catpbox" style="display:none">
<p>Описание:</p>
<p><?php echo smarty_function_fckeditor(array('name' => 'description','toolbar' => 'Medium','height' => 200), $this);?>
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "objcomp_fieldseditor_include.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<p>Изображение:</p>
<p><input type="file" name="catimage"></p>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array(), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => ""), $this);?>

<?php endif; ?>
</div>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['id']; ?>
">
<input type="hidden" name="idker" value="<?php echo $this->_tpl_vars['form']['idker']; ?>
">
<input type="hidden" name="level" value="<?php echo $this->_tpl_vars['form']['level']; ?>
">
<input type="hidden" name="tab" value="cat">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'obj_action','value' => 'ct_add'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active" checked>&nbsp;Активно</label></p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>