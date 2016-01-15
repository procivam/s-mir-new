<?php /* Smarty version 2.6.26, created on 2015-12-13 17:34:18
         compiled from site_sections.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'site_sections.tpl', 31, false),array('function', 'hidden', 'site_sections.tpl', 63, false),array('function', 'html_options', 'site_sections.tpl', 74, false),array('function', 'button', 'site_sections.tpl', 85, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['options']['wizard']): ?>
<div class="note">
<a style="float:right" href="admin.php?mode=main&action=wizardoff&authcode=<?php echo $this->_tpl_vars['system']['authcode']; ?>
">[ отключить ]</a>
Создавать типовые разделы и страницы удобно в <a class="cp_link_headding" href="wizard.php?open=sections">режиме конструктора</a>.
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['errors']['doubleid']): ?>
<div class="warning">Некорректный идентификатор или его комбинация с языковой версией!</div>
<?php endif; ?>
<div>
<?php if ($this->_tpl_vars['sections']): ?>
<form name="sectionsform" method="post">
<table class="grid gridsort" width="100%">
<tr>
<th width="25">&nbsp;</th>
<th align="center" width="16">&nbsp;</th>
<th align="left" width="110">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="25%">Базовый модуль</th>
<th align="center" width="50">&nbsp;</th>
<th align="center" width="25">&nbsp;</th>
<?php if ($this->_tpl_vars['seo']): ?><th align="center" width="25">&nbsp;</th><?php endif; ?>
<th align="center" width="25">&nbsp;</th>
</tr>
</table>
<div id="sectionsbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['sections']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="section_<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort" width="100%">
<tr class="<?php if ($this->_tpl_vars['sections'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="20"><input type="checkbox" id="check<?php echo $this->_sections['i']['index']; ?>
" name="checksection[]" value="<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="16"><?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['ico']; ?>
</td>
<td width="110"><a href="javascript:geteditsectionform(<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td><a href="admin.php?mode=sections&item=<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['section']; ?>
" title="Перейти к управлению"><?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['caption']; ?>
</a></td>
<td width="25%"><?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['modcaption']; ?>
</td>
<td align="center" width="50"><?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['lang']; ?>
</td>
<td align="center" width="25"><a href="<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['link']; ?>
" target="_blank" title="Просмотр на сайте"><img src="/templates/admin/images/browse.png" alt="Просмотр на сайте"></a></td>
<?php if ($this->_tpl_vars['seo']): ?><td width="25" align="center"><a href="javascript:geturlseoform('<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['link']; ?>
')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td><?php endif; ?>
<td align="center" width="20"><a href="javascript:delsection(<?php echo $this->_tpl_vars['sections'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.png"  alt="Удалить"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'sectionsbox\',{tag:\'table\',onUpdate: setsectionsort});
</script>'; ?>

<?php else: ?>
<div class="box">Не созданы разделы.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['sections']): ?>
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

</form>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['sections']): ?>
<td nowrap>
<form name="optionsform" method="post">
Главный раздел:&nbsp;
<select name="value" onchange="document.forms.optionsform.submit()">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsform']['sections'],'selected' => $this->_tpl_vars['options']['mainsection']), $this);?>

</select>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['optionsform']['id']; ?>
">
<input type="hidden" name="mode" value="site">
<input type="hidden" name="item" value="sections">
<input type="hidden" name="action" value="save">
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<?php endif; ?>
<td align="right" width="60%">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddsectionform()"), $this);?>

</td>
</tr>
</table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>