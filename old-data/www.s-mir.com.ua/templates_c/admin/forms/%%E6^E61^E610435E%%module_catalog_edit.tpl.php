<?php /* Smarty version 2.6.26, created on 2015-12-13 17:14:57
         compiled from module_catalog_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'module_catalog_edit.tpl', 8, false),array('function', 'treeselect', 'module_catalog_edit.tpl', 17, false),array('function', 'dateselect', 'module_catalog_edit.tpl', 18, false),array('function', 'fckeditor', 'module_catalog_edit.tpl', 23, false),array('function', 'textarea', 'module_catalog_edit.tpl', 25, false),array('function', 'tags', 'module_catalog_edit.tpl', 33, false),array('function', 'hidden', 'module_catalog_edit.tpl', 35, false),array('function', 'submit', 'module_catalog_edit.tpl', 65, false),array('function', 'button', 'module_catalog_edit.tpl', 66, false),array('modifier', 'date_format', 'module_catalog_edit.tpl', 63, false),)), $this); ?>
<form name="edititemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'name','text' => $this->_tpl_vars['form']['name']), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','width' => "80%",'max' => 100,'text' => $this->_tpl_vars['form']['urlname']), $this);?>
.html</td>
</tr>
<?php if ($this->_tpl_vars['options']['usecats'] && $this->_tpl_vars['form']['categories']): ?>
<tr>
<td width="70%">Категория:</td>
<td width="30%">&nbsp;&nbsp;<?php if ($this->_tpl_vars['options']['usedate']): ?>Дата:<?php endif; ?></td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_treeselect(array('name' => 'idcat','items' => $this->_tpl_vars['form']['categories'],'selected' => $this->_tpl_vars['form']['idcat'],'title' => "Выбор категории",'width' => "60%"), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php if ($this->_tpl_vars['options']['usedate']): ?><?php echo smarty_function_dateselect(array('name' => 'date','date' => $this->_tpl_vars['form']['date'],'usetime' => true), $this);?>
<?php endif; ?></td>
<?php endif; ?>
</table>
<p>Текст:</p>
<?php if ($this->_tpl_vars['options']['fckeditor']): ?>
<?php echo smarty_function_fckeditor(array('name' => 'content','height' => 400,'text' => $this->_tpl_vars['form']['content']), $this);?>

<?php else: ?>
<?php echo smarty_function_textarea(array('name' => 'content','rows' => 6,'text' => $this->_tpl_vars['form']['content']), $this);?>

<?php endif; ?>
<?php if (! $this->_tpl_vars['options']['autoanons']): ?>
<p>Аннотация:</p>
<p><?php echo smarty_function_textarea(array('name' => 'description','rows' => 3,'text' => $this->_tpl_vars['form']['description']), $this);?>
</p>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array('text' => $this->_tpl_vars['form']['tags']), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => $this->_tpl_vars['form']['tags']), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['useimages']): ?>
<p>Фото:</p>
<?php echo $this->_tpl_vars['form']['imagesbox']->getContent(); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usefiles']): ?>
<p>Прикрепленные файлы:</p>
<?php echo $this->_tpl_vars['form']['filesbox']->getContent(); ?>

<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "objcomp_fieldseditor_include.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if (! $this->_tpl_vars['options']['usecats'] || ! $this->_tpl_vars['form']['categories']): ?>
<?php if ($this->_tpl_vars['options']['usedate']): ?>
<p>Дата:</p>
<p><?php echo smarty_function_dateselect(array('name' => 'date','date' => $this->_tpl_vars['form']['date'],'usetime' => true), $this);?>
</p>
<?php endif; ?>
<?php echo smarty_function_hidden(array('name' => 'idcat','value' => 0), $this);?>

<?php endif; ?>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'edititem'), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Активно</label>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:applyitem(document.forms.edititemform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
<span id="applydate"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['mdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
</span>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>