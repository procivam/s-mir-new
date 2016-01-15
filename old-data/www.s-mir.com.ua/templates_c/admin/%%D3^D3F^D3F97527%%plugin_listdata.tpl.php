<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:57
         compiled from plugin_listdata.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'plugin_listdata.tpl', 3, false),array('function', 'cycle', 'plugin_listdata.tpl', 19, false),array('function', 'hidden', 'plugin_listdata.tpl', 44, false),array('function', 'button', 'plugin_listdata.tpl', 50, false),array('function', 'object', 'plugin_listdata.tpl', 59, false),array('block', 'tabpage', 'plugin_listdata.tpl', 5, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_tabcontrol(array('main' => "Записи",'fields' => "Редактор полей"), $this);?>


<?php $this->_tag_stack[] = array('tabpage', array('id' => 'main')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<form method="post">
<?php if ($this->_tpl_vars['listdata']): ?>
<table class="grid gridsort" width="100%">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="25">ID</th>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="listitemsbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['listdata']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="listitem_<?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="checkdata[]" value="<?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['id']; ?>
</td>
<td><a href="javascript:geteditform(<?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td width="20" align="center"><a href="javascript:deldata(<?php echo $this->_tpl_vars['listdata'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'listitemsbox\',{tag:\'table\',onUpdate: setlistitemsort});
</script>'; ?>

<?php else: ?>
<div class="box">Нет записей.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<td nowrap>
<?php if ($this->_tpl_vars['listdata']): ?>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="sortname">Сортировать</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php endif; ?>
</td>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Импорт",'onclick' => "getimportform()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddform()"), $this);?>

</td>
</tr>
</table>
</form>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'fields')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['fieldsbox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>