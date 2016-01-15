<?php /* Smarty version 2.6.26, created on 2015-10-24 11:15:11
         compiled from module_pages_editpage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'module_pages_editpage.tpl', 8, false),array('function', 'fckeditor', 'module_pages_editpage.tpl', 13, false),array('function', 'tags', 'module_pages_editpage.tpl', 19, false),array('function', 'hidden', 'module_pages_editpage.tpl', 21, false),array('function', 'submit', 'module_pages_editpage.tpl', 37, false),array('function', 'button', 'module_pages_editpage.tpl', 38, false),array('modifier', 'date_format', 'module_pages_editpage.tpl', 35, false),)), $this); ?>
<form name="editpageform" action="" method="post" onsubmit="return editpage_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%" style="margin-bottom:5px">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'name','text' => $this->_tpl_vars['form']['name']), $this);?>
</td>
<td>&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','width' => "80%",'max' => 100,'text' => $this->_tpl_vars['form']['urlname']), $this);?>
.html</td>
</tr>
</table>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<?php echo smarty_function_fckeditor(array('name' => 'content','height' => 450,'text' => $this->_tpl_vars['form']['content']), $this);?>

<?php else: ?>
<?php echo smarty_function_fckeditor(array('name' => 'content','height' => 500,'text' => $this->_tpl_vars['form']['content']), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array('text' => $this->_tpl_vars['form']['tags']), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => $this->_tpl_vars['form']['tags']), $this);?>

<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "objcomp_fieldseditor_include.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<p>Шаблон страницы:</p>
<p><?php echo smarty_function_editbox(array('name' => 'template','max' => 50,'text' => $this->_tpl_vars['form']['template'],'width' => "20%"), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'template','value' => $this->_tpl_vars['form']['template']), $this);?>

<?php endif; ?>
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Активно</label>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if ($this->_tpl_vars['form']['usemap']): ?><label><input type="checkbox" name="inmap"<?php if ($this->_tpl_vars['form']['inmap'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;В карте сайта</label>&nbsp;&nbsp;&nbsp;&nbsp;<?php else: ?><?php echo smarty_function_hidden(array('name' => 'inmap','value' => 1), $this);?>
<?php endif; ?>
<a href="javascript:applypage(document.forms.editpageform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
<span id="applydate"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
</span>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'page','value' => $this->_tpl_vars['system']['page']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'editpage'), $this);?>

</form>