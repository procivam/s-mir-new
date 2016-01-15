<?php /* Smarty version 2.6.26, created on 2015-12-13 17:14:16
         compiled from plugin_courier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'plugin_courier.tpl', 16, false),array('function', 'button', 'plugin_courier.tpl', 34, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (! $this->_tpl_vars['shopassoc']): ?>
<div class="box">Не найден раздел магазина.</div>
<?php else: ?>
<?php if ($this->_tpl_vars['items']): ?>
<table class="grid gridsort">
<tr>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="itemsbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="item_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td><a href="javascript:geteditform(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td width="20" align="center">
<a href="javascript:delcourier(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'itemsbox\',{tag:\'table\',onUpdate: setsort});
</script>'; ?>

<?php else: ?>
<div class="box">Нет записей.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddform()"), $this);?>

</td>
</tr>
</table>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>