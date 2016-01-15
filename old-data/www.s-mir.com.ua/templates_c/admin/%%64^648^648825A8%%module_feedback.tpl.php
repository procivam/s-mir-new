<?php /* Smarty version 2.6.26, created on 2015-12-13 17:03:27
         compiled from module_feedback.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'module_feedback.tpl', 3, false),array('function', 'button', 'module_feedback.tpl', 14, false),array('function', 'cycle', 'module_feedback.tpl', 36, false),array('function', 'object', 'module_feedback.tpl', 82, false),array('function', 'hidden', 'module_feedback.tpl', 92, false),array('block', 'tabpage', 'module_feedback.tpl', 5, false),array('modifier', 'date_format', 'module_feedback.tpl', 76, false),array('modifier', 'strip_tags', 'module_feedback.tpl', 77, false),array('modifier', 'truncate', 'module_feedback.tpl', 77, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_tabcontrol(array('page' => "Страница",'arch' => "Архив сообщений",'opt' => "Настройки"), $this);?>


<?php $this->_tag_stack[] = array('tabpage', array('id' => 'page')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<h3>Текст:</h3>
<div class="box">
<?php if ($this->_tpl_vars['maincontent']): ?><?php echo $this->_tpl_vars['maincontent']; ?>
<?php else: ?><i>Нет текста.</i><?php endif; ?>
<div class="clear"></div>
</div>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Изменить",'onclick' => "geteditpageform()"), $this);?>

</td>
</tr>
</table>

<h3>Форма:</h3>
<?php if ($this->_tpl_vars['errors']['doublefield']): ?>
<div class="warning">Поле с таким именем уже существует!</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['fields']): ?>
<table width="100%" class="grid gridsort">
<tr>
<th align="left" width="102">Название</th>
<th align="left">Описание</th>
<th align="left" width="200">Тип</th>
<th width="20">&nbsp;</th>
<th width="25">&nbsp;</th>
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
<td width="100">
<a href="javascript:geteditfieldform(<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['field']; ?>
</a>
</td>
<td><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="200"><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['type']; ?>
</td>
<td width="20"><?php if ($this->_tpl_vars['fields'][$this->_sections['i']['index']]['fill'] == 'Y'): ?><img src="/templates/admin/images/checked2.gif" alt="Обязательно для заполнения" width="16" height="16"><?php else: ?>&nbsp;<?php endif; ?></td>
<td width="20"><a href="javascript:delfield(<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'fieldsbox\',{tag:\'table\',onUpdate: setfieldsort});
</script>'; ?>

<?php else: ?>
<div class="box">Нет созданых полей.</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddfieldform()"), $this);?>

</td>
</tr>
</table>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'arch')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['arch']): ?>
<form method="post">
<table class="grid">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="120">Дата</th>
<th align="left">Сообщение</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['arch']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="checkarch[]" value="<?php echo $this->_tpl_vars['arch'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="120"><?php echo ((is_array($_tmp=$this->_tpl_vars['arch'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
</td>
<td><a href="javascript:getarchmessageform(<?php echo $this->_tpl_vars['arch'][$this->_sections['i']['index']]['id']; ?>
)"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arch'][$this->_sections['i']['index']]['message'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 120) : smarty_modifier_truncate($_tmp, 120)); ?>
</a></td>
<td width="20"><a href="javascript:delarch(<?php echo $this->_tpl_vars['arch'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['arch_pager']), $this);?>

<table width="100%" class="actiongrid">
<tr>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'arch'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
</tr>
</table>
<?php else: ?>
<div class="box">Нет сообщений.</div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'opt')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>