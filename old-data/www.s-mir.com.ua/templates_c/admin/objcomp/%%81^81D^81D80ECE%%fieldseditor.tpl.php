<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:38
         compiled from fieldseditor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'fieldseditor.tpl', 17, false),array('function', 'button', 'fieldseditor.tpl', 36, false),)), $this); ?>
<?php if ($this->_tpl_vars['message'] == 'doublefield'): ?>
<div class="warning">Поле с таким именем уже существует!</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']): ?>
<table width="100%" class="grid gridsort">
<tr>
<th align="left" width="103">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="200">Тип</th>
<?php if ($this->_tpl_vars['usefill']): ?><th width="20">&nbsp;</th><?php endif; ?>
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
<?php if ($this->_tpl_vars['usefill']): ?><td width="20"><?php if ($this->_tpl_vars['fields'][$this->_sections['i']['index']]['fill'] == 'Y'): ?><img src="/templates/admin/images/checked2.gif" alt="Обязательно для заполнения" width="16" height="16"><?php else: ?>&nbsp;<?php endif; ?></td><?php endif; ?>
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