<?php /* Smarty version 2.6.26, created on 2015-12-13 17:18:59
         compiled from objcomp_optionsbox_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'objcomp_optionsbox_edit.tpl', 9, false),array('function', 'dateselect', 'objcomp_optionsbox_edit.tpl', 12, false),array('function', 'editbox', 'objcomp_optionsbox_edit.tpl', 14, false),array('function', 'hidden', 'objcomp_optionsbox_edit.tpl', 23, false),)), $this); ?>
<form name="editoptform" method="post" onsubmit="this.bsave.click()">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td>
<?php if ($this->_tpl_vars['form']['type'] == 'bool'): ?>
<input type="checkbox" name="value"<?php if ($this->_tpl_vars['form']['value'] == 1): ?> checked<?php endif; ?>>
<?php elseif ($this->_tpl_vars['form']['type'] == 'select'): ?>
<select name="value">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['selectvars'],'selected' => $this->_tpl_vars['form']['value']), $this);?>

</select>
<?php elseif ($this->_tpl_vars['form']['type'] == 'date'): ?>
<?php echo smarty_function_dateselect(array('name' => 'date','date' => $this->_tpl_vars['form']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_editbox(array('name' => 'value','text' => $this->_tpl_vars['form']['value']), $this);?>

<?php endif; ?>
</td>
<td width="150" align="center">
<input type="button" class="submit" name="bsave" value="Сохранить" onclick="saveopt(<?php echo $this->_tpl_vars['form']['id']; ?>
,<?php echo $this->_tpl_vars['form']['idgroup']; ?>
,'<?php echo $this->_tpl_vars['form']['type']; ?>
')" style="width:70px">
<input type="button" class="button" value="Отмена" onclick="cancelopt(<?php echo $this->_tpl_vars['form']['id']; ?>
,<?php echo $this->_tpl_vars['form']['idgroup']; ?>
)" style="width:70px">
</td>
</tr>
</table>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>