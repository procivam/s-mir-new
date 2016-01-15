<?php /* Smarty version 2.6.26, created on 2016-01-08 13:52:30
         compiled from rep_extensions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'rep_extensions.tpl', 13, false),array('function', 'cycle', 'rep_extensions.tpl', 48, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_mheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="mainpanel">




<div id="overview_tab" class="overview_tab">

<h2 style="margin-top:10px;margin-bottom:10px;"></h2>

<form method="get">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => 'rep'), $this);?>

<select name="item" onchange="this.form.type[0].value=0;this.form.type.value=0;this.form.submit();" style="width:180px">
<option value="extensions" selected>Расширения</option>
<?php if ($this->_tpl_vars['system']['domain']): ?><option value="sites">Готовые сайты</option><?php endif; ?>
</select>
&nbsp;&nbsp;
<select name="type" onchange="this.form.submit()" style="width:180px">
<option value="1"<?php if ($this->_tpl_vars['type'] == 1): ?> selected<?php endif; ?>>Модули</option>
<option value="2"<?php if ($this->_tpl_vars['type'] == 2): ?> selected<?php endif; ?>>Плагины</option>
<option value="3"<?php if ($this->_tpl_vars['type'] == 3): ?> selected<?php endif; ?>>Блоки</option>
</select>
</form>

<?php if ($this->_tpl_vars['errors']['invalid']): ?>
<div class="warning">Не удалось установить расширение.</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['noload']): ?>
<div class="warning">Не удалось загрузить даннные.</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['items']): ?>
<div>
<form method="post">
<table class="grid" style="margin-top:20px">
<tr>
<th width="20">&nbsp;</th>
<th width="120" align="left">Идентификатор</th>
<th width="220" align="left">Название</th>
<th align="left">Описание</th>
<th width="60" align="left">Версия</th>
<th width="60" align="left">Система</th>
<th width="80">&nbsp;</th>
<th width="80">&nbsp;</th>
</tr>
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
<tr class="<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['exists']): ?>group1<?php else: ?><?php echo smarty_function_cycle(array('values' => 'row0,row1'), $this);?>
<?php endif; ?>">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="files[]" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['type']; ?>
_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
</td>
<td><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</td>
<td><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>
</td>
<td><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['version']; ?>
</td>
<td><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['system']; ?>
</td>
<td align="center"><a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['info']; ?>
" target="_blank" title="Подробнее">Подробнее</a></td>
<td align="center"><?php if (! $this->_tpl_vars['items'][$this->_sections['i']['index']]['exists']): ?><a href="admin.php?mode=rep&item=extensions&action=install&file=<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['type']; ?>
_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
&type=<?php echo $this->_tpl_vars['type']; ?>
&authcode=<?php echo $this->_tpl_vars['system']['authcode']; ?>
" title="Установить">Установить</a><?php else: ?>Установлено<?php endif; ?></td>
</tr>
<?php endfor; endif; ?>
</table>
<table class="actiongrid">
<tr>
<td>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="install">Установить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => 'rep'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => 'extensions'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'type','value' => $this->_tpl_vars['type']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
</tr>
</table>
</div>
<?php else: ?>
<div class="box" style="margin-top:20px">Нет данных.</div>
<?php endif; ?>

</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_mfooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>