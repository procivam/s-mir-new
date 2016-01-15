<?php /* Smarty version 2.6.26, created on 2015-12-13 17:18:30
         compiled from module_feedback_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'module_feedback_edit.tpl', 3, false),array('function', 'html_options', 'module_feedback_edit.tpl', 61, false),array('function', 'hidden', 'module_feedback_edit.tpl', 70, false),array('function', 'submit', 'module_feedback_edit.tpl', 78, false),array('function', 'button', 'module_feedback_edit.tpl', 79, false),)), $this); ?>
<form name="editfieldform" method="post" onsubmit="return field_form(this)">
<p>Идентификатор:<sup style="color:gray">*</sup></p>
<p><?php echo smarty_function_editbox(array('name' => 'field','max' => 20,'width' => 100,'text' => $this->_tpl_vars['form']['field']), $this);?>
</p>
<p>Название:<sup style="color:gray">*</sup></p>
<p><?php echo smarty_function_editbox(array('name' => 'name','max' => 100,'width' => "60%",'text' => $this->_tpl_vars['form']['name']), $this);?>
</p>
<p>Тип:<sup style="color:gray">*</sup></p>
<p>
<select name="type" onchange="fieldseltype(this.value)">
<option value="string"<?php if ($this->_tpl_vars['form']['type'] == 'string'): ?> selected<?php endif; ?>>Строка</option>
<option value="int"<?php if ($this->_tpl_vars['form']['type'] == 'int'): ?> selected<?php endif; ?>>Целое число</option>
<option value="float"<?php if ($this->_tpl_vars['form']['type'] == 'float'): ?> selected<?php endif; ?>>Дробное число</option>
<option value="bool"<?php if ($this->_tpl_vars['form']['type'] == 'bool'): ?> selected<?php endif; ?>>Логический (Да/Нет)</option>
<option value="date"<?php if ($this->_tpl_vars['form']['type'] == 'date'): ?> selected<?php endif; ?>>Дата</option>
<option value="text"<?php if ($this->_tpl_vars['form']['type'] == 'text'): ?> selected<?php endif; ?>>Текст</option>
<?php if ($this->_tpl_vars['form']['full']): ?>
<option value="select"<?php if ($this->_tpl_vars['form']['type'] == 'select'): ?> selected<?php endif; ?>>Значение из списка</option>
<option value="mselect"<?php if ($this->_tpl_vars['form']['type'] == 'mselect'): ?> selected<?php endif; ?>>Множество значений из списка</option>
<?php else: ?>
<option value="select" style="color:red" disabled title="Доступно только в полной версии">Значение из списка</option>
<option value="mselect" style="color:red" disabled title="Доступно только в полной версии">Множество значений из списка</option>
<?php endif; ?>
<option value="file"<?php if ($this->_tpl_vars['form']['type'] == 'file'): ?> selected<?php endif; ?>>Файл</option>
</select>
</p>
<div id="field_typestringbox"<?php if ($this->_tpl_vars['form']['type'] != 'string'): ?> style="display:none"<?php endif; ?>>
<p>Длина:<sup style="color:gray">*</sup></p>
<?php if ($this->_tpl_vars['form']['type'] == 'string'): ?>
<p><?php echo smarty_function_editbox(array('name' => 'length','width' => '50','max' => 3,'text' => $this->_tpl_vars['form']['property']), $this);?>
</p>
<?php else: ?>
<p><?php echo smarty_function_editbox(array('name' => 'length','width' => '50','max' => 3,'text' => '50'), $this);?>
</p>
<?php endif; ?>
</div>
<div id="field_typeboolbox"<?php if ($this->_tpl_vars['form']['type'] != 'bool'): ?> style="display:none"<?php endif; ?>>
<p>По умолчанию:&nbsp;
<?php if ($this->_tpl_vars['form']['type'] == 'bool'): ?>
<label><input type="radio" name="booldef" value="1"<?php if ($this->_tpl_vars['form']['property']): ?> checked<?php endif; ?>>&nbsp;Да</label>&nbsp;&nbsp;<label><input type="radio" name="booldef" value="0"<?php if (! $this->_tpl_vars['form']['property']): ?> checked<?php endif; ?>>&nbsp;Нет</label></p>
<?php else: ?>
<label><input type="radio" name="booldef" value="1">&nbsp;Да</label>&nbsp;&nbsp;<label><input type="radio" name="booldef" value="0" checked>&nbsp;Нет</label></p>
<?php endif; ?>
</div>
<div id="field_typetextbox"<?php if ($this->_tpl_vars['form']['type'] != 'text'): ?> style="display:none"<?php endif; ?>>
<p>Высота редактора (строки):<sup style="color:gray">*</sup></p>
<?php if ($this->_tpl_vars['form']['type'] == 'text'): ?>
<p><?php echo smarty_function_editbox(array('name' => 'rows','width' => '50','max' => 3,'text' => $this->_tpl_vars['form']['property']), $this);?>
</p>
<?php else: ?>
<p><?php echo smarty_function_editbox(array('name' => 'rows','width' => '50','max' => 3,'text' => '5'), $this);?>
</p>
<?php endif; ?>
</div>
<div id="field_typeformatbox"<?php if ($this->_tpl_vars['form']['type'] != 'format'): ?> style="display:none"<?php endif; ?>>
<p>Высота редактора (пиксели):<sup style="color:gray">*</sup></p>
<?php if ($this->_tpl_vars['form']['type'] == 'format'): ?>
<p><?php echo smarty_function_editbox(array('name' => 'height','width' => '50','max' => 3,'text' => $this->_tpl_vars['form']['property']), $this);?>
</p>
<?php else: ?>
<p><?php echo smarty_function_editbox(array('name' => 'height','width' => '50','max' => 3,'text' => '200'), $this);?>
</p>
<?php endif; ?>
</div>
<div id="field_typeselectbox"<?php if ($this->_tpl_vars['form']['type'] != 'select' && $this->_tpl_vars['form']['type'] != 'mselect'): ?> style="display:none"<?php endif; ?>>
<p>
<select name="idvar">
<?php if ($this->_tpl_vars['form']['type'] == 'select' || $this->_tpl_vars['form']['type'] == 'mselect'): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['vars'],'selected' => $this->_tpl_vars['form']['property']), $this);?>

<option value="">+Создать список+</option>
<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['vars']), $this);?>

<option value="">+Создать список+</option>
<?php endif; ?>
</select>
</p>
</div>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'page'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'fld_edit'), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="fill"<?php if ($this->_tpl_vars['form']['fill'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Обязательно для заполнения.</label></p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>