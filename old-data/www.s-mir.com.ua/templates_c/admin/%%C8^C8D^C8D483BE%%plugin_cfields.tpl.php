<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:00
         compiled from plugin_cfields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'plugin_cfields.tpl', 12, false),array('function', 'html_options', 'plugin_cfields.tpl', 15, false),array('function', 'treeselect', 'plugin_cfields.tpl', 20, false),array('function', 'cycle', 'plugin_cfields.tpl', 34, false),array('function', 'submit', 'plugin_cfields.tpl', 44, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '<script type="text/javascript">
function runselectcat(form)
{ goactionurl(\'admin.php?mode=structures&item=\'+ITEM+\'&idcat=\'+form.idcat.value);
}
</script>'; ?>


<div class="actionbox">
<form method="get">
<p style="float:right">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<select name="section" onchange="this.form.submit()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sections'],'selected' => $this->_tpl_vars['section']), $this);?>

</select>
</p>
</form>
<?php if ($this->_tpl_vars['section']): ?>
<form><?php echo smarty_function_treeselect(array('id' => 'cfidcat','name' => 'idcat','items' => $this->_tpl_vars['categories'],'selected' => $_GET['idcat'],'emptytxt' => "Все категории",'title' => "Выбор категории",'onchange' => "runselectcat(this.form)",'section' => $this->_tpl_vars['section'],'width' => '320px'), $this);?>
</form>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['section']): ?>
<?php if ($this->_tpl_vars['fields']): ?>
<form method="post">
<table class="grid">
<tr>
<th width="20">&nbsp;</th>
<th width="120" align="left">Поле</th>
<th align="left">Название</th>
</tr>
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
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="checkfield[]" value="<?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['field']; ?>
"<?php if ($this->_tpl_vars['fields'][$this->_sections['i']['index']]['checked']): ?> checked<?php endif; ?><?php if ($this->_tpl_vars['fields'][$this->_sections['i']['index']]['disabled']): ?> disabled<?php endif; ?>></td>
<td width="120"><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['field']; ?>
</td>
<td><?php echo $this->_tpl_vars['fields'][$this->_sections['i']['index']]['caption']; ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

</td>
</tr>
</table>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'save'), $this);?>

</form>
<?php else: ?>
<div class="box">Не найдены дополнительные поля.</div>
<?php endif; ?>


<?php else: ?>
<div class="box">Не найдены каталоги с дополнительными полями.</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>