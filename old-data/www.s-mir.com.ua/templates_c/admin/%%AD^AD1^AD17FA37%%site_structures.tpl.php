<?php /* Smarty version 2.6.26, created on 2015-12-21 18:41:03
         compiled from site_structures.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'site_structures.tpl', 22, false),array('function', 'hidden', 'site_structures.tpl', 49, false),array('function', 'button', 'site_structures.tpl', 56, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doubleid']): ?>
<div class="warning">Указанный идентификатор уже используется!</div>
<?php endif; ?>
<div>
<?php if ($this->_tpl_vars['structures']): ?>
<form name="structuresform" method="post">
<table class="grid gridsort" width="100%">
<tr>
<th width="25">&nbsp;</th>
<th align="center" width="20">&nbsp;</th>
<th align="left" width="110">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="25%">Базовый плагин</th>
<th align="center" width="20">&nbsp;</th>
</tr>
</table>
<div id="structuresbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['structures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="structure_<?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="checkstructure[]" value="<?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['ico']; ?>
</td>
<td width="110"><a href="javascript:geteditstructureform(<?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td><a href="admin.php?mode=structures&item=<?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['structure']; ?>
" title="Перейти к управлению"><?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="25%"><?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['modcaption']; ?>
</td>
<td align="center" width="20"><a href="javascript:delstructure(<?php echo $this->_tpl_vars['structures'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'structuresbox\',{tag:\'table\',onUpdate: setstructuresort});
</script>'; ?>

<?php else: ?>
<div class="box">Не созданы дополнения.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['structures']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<?php endif; ?>
<td align="right" width="80%">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddstructureform()"), $this);?>

</td>
</tr>
</table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>