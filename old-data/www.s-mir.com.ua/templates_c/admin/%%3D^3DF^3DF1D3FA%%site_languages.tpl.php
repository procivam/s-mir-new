<?php /* Smarty version 2.6.26, created on 2016-01-06 17:15:16
         compiled from site_languages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'site_languages.tpl', 17, false),array('function', 'button', 'site_languages.tpl', 34, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doubleid']): ?>
<div class="warning">Указанный идентификатор уже используется!</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['langs']): ?>
<table class="grid gridsort">
<tr>
<th align="left" width="122">Идентификатор</th>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="langsbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="lang_<?php echo $this->_tpl_vars['langs'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="120"><a href="javascript:geteditlangform(<?php echo $this->_tpl_vars['langs'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['langs'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['langs'][$this->_sections['i']['index']]['caption']; ?>
</td>
<td width="20"><?php if (count ( $this->_tpl_vars['langs'] ) > 1): ?><a href="javascript:dellang(<?php echo $this->_tpl_vars['langs'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a><?php else: ?>&nbsp;<?php endif; ?></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'langsbox\',{tag:\'table\',onUpdate: setlangssort});
</script>'; ?>

<?php else: ?>
<div class="box">Не созданы языковые версии.</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddlangform()"), $this);?>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>