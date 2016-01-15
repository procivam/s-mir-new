<?php /* Smarty version 2.6.26, created on 2015-12-13 17:31:59
         compiled from site_pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'site_pages.tpl', 8, false),array('function', 'html_options', 'site_pages.tpl', 13, false),array('function', 'cycle', 'site_pages.tpl', 28, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['pages']): ?>
<table width="100%" class="actiongrid">
<tr>
<td nowrap>
<form method="get">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

Разделы:&nbsp;
<select name="idsec" onchange="this.form.submit()">
<option value="0">Все</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sections'],'selected' => $_GET['idsec']), $this);?>

</select>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
</tr>
</table>
<div id="pagesbox">
<table class="grid" width="100%">
<tr>
<th width="20">&nbsp;</th>
<th align="left">Раздел - Страница</th>
<th align="left" width="220">Шаблон</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<td width="20"><img src="/templates/admin/images/template.gif" width="16" height="16"></td>
<td><a href="javascript:geteditpageform(<?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['section']; ?>
 - <?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="220"><a href="javascript:edittpl('<?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['template']; ?>
')" title="Редактировать"><?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['template']; ?>
</a></td>
</tr>
<?php endfor; endif; ?>
</table>
</div>
<?php else: ?>
<div class="box">Нет данных.</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>