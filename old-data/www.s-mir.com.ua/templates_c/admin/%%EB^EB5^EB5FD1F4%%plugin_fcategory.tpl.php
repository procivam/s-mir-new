<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:01
         compiled from plugin_fcategory.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'plugin_fcategory.tpl', 9, false),array('function', 'html_options', 'plugin_fcategory.tpl', 12, false),array('function', 'cycle', 'plugin_fcategory.tpl', 36, false),array('function', 'button', 'plugin_fcategory.tpl', 54, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['idsec']): ?>
<table class="actiongrid">
<tr>
<td>
<form method="get">
<p>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<select name="idsec" onchange="this.form.submit()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sections'],'selected' => $this->_tpl_vars['idsec']), $this);?>

</select>
</p>
</form>
</td>
</tr>
</table>

<?php if ($this->_tpl_vars['errors']['doublefield']): ?>
<div class="warning">Поле с таким именем уже существует!</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['fields']): ?>
<table width="100%" class="grid gridsort">
<tr>
<th align="left" width="103">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="200">Тип</th>
<th width="23">&nbsp;</th>
</tr>
</table>
<div id="fieldsbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<table id="field_<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['id']; ?>
" width="100%" class="grid gridsort">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="100"><a href="javascript:geteditfieldform(<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['field']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="200"><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['type']; ?>
</td>
<td width="20"><a href="javascript:delfield(<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'fieldsbox\',{tag:\'table\',onUpdate: setfieldssort});
</script>'; ?>

<?php else: ?>
<div class="box">Нет дополнительных полей.</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddfieldform()"), $this);?>

</td>
</tr>
</table>
<?php else: ?>
<div class="box">Не найдены разделы использующие категории.</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>