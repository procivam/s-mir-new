<?php /* Smarty version 2.6.26, created on 2015-10-22 16:34:42
         compiled from site_blocks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'site_blocks.tpl', 30, false),array('function', 'hidden', 'site_blocks.tpl', 110, false),array('function', 'button', 'site_blocks.tpl', 116, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['options']['wizard']): ?>
<div class="note">
<a style="float:right" href="admin.php?mode=main&action=wizardoff&authcode=<?php echo $this->_tpl_vars['system']['authcode']; ?>
">[ отключить ]</a>
Создавать типовые блоки удобно в <a class="cp_link_headding" href="wizard.php?open=blocks">режиме конструктора</a>.
</div>
<?php endif; ?>
<div>
<?php if ($this->_tpl_vars['blocks']): ?>
<form name="blocksform" method="post">
<table class="grid gridsort" width="100%">
<tr>
<th width="25">&nbsp;</th>
<th width="20">&nbsp;</th>
<th align="left">Название</th>
<th align="left" width="20%">Базовый блок</th>
<th align="left" width="100">Идентификатор</th>
<th align="left" width="100">Позиция</th>
<th align="left" width="60">Создается</th>
<th align="left" width="20">&nbsp;</th>
<th align="left" width="25">&nbsp;</th>
<th align="left" width="25">&nbsp;</th>
</tr>
</table>
<?php if ($this->_tpl_vars['leftblocks']): ?>
<div id="leftblocks" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['leftblocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="block_<?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php if ($this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="20"><input type="checkbox" id="check<?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['index']; ?>
" name="checkblock[]" value="<?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><img src="/templates/admin/images/icons/block.gif" width="16" height="16"></td>
<td><a href="javascript:geteditblockform(<?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="20%"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['block']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['align']; ?>
</td>
<td width="60"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['show']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['lang']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['tpl']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['leftblocks'][$this->_sections['i']['index']]['del']; ?>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'leftblocks\',{tag:\'table\',onUpdate: setblocksort});
</script>'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['rightblocks']): ?>
<div id="rightblocks" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['rightblocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="block_<?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php if ($this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="20"><input type="checkbox" id="check<?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['index']; ?>
" name="checkblock[]" value="<?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><img src="/templates/admin/images/icons/block.gif" width="16" height="16"></td>
<td><a href="javascript:geteditblockform(<?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="20%"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['block']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['align']; ?>
</td>
<td width="60"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['show']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['lang']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['tpl']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['rightblocks'][$this->_sections['i']['index']]['del']; ?>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'rightblocks\',{tag:\'table\',onUpdate: setblocksort});
</script>'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['freeblocks']): ?>
<div id="freeblocks" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['freeblocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="block_<?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php if ($this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="20"><input type="checkbox" id="check<?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['index']; ?>
" name="checkblock[]" value="<?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><img src="/templates/admin/images/icons/block.gif" width="16" height="16"></td>
<td><a href="javascript:geteditblockform(<?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="20%"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['block']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="100"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['align']; ?>
</td>
<td width="60"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['show']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['lang']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['tpl']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['freeblocks'][$this->_sections['i']['index']]['del']; ?>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'freeblocks\',{tag:\'table\',onUpdate: setblocksort});
</script>'; ?>

<?php endif; ?>
<?php else: ?>
<div class="box">Не созданы блоки.</div>
<?php endif; ?>
<table class="actiongrid" width="100%">
<tr>
<?php if ($this->_tpl_vars['blocks']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="setactive">Включить</option>
<option value="setunactive">Отключить</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</td>
<?php endif; ?>
<td align="right" width="60%">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddblockform()"), $this);?>

</td>
</tr>
</table>
<?php if ($this->_tpl_vars['blocks']): ?></form><?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>