<?php /* Smarty version 2.6.26, created on 2015-12-21 18:46:11
         compiled from system_domains.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'system_domains.tpl', 22, false),array('function', 'object', 'system_domains.tpl', 35, false),array('function', 'hidden', 'system_domains.tpl', 50, false),array('function', 'button', 'system_domains.tpl', 57, false),array('modifier', 'date_format', 'system_domains.tpl', 28, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doubleid']): ?><div class="warning">Указанный идентификатор уже используется!</div><?php endif; ?>
<?php if ($this->_tpl_vars['errors']['doubledomain']): ?><div class="warning">Сайт с указанным доменом уже создан в системе!</div><?php endif; ?>

<div>
<?php if ($this->_tpl_vars['domains']): ?>
<form name="domainsform" method="post">
<table class="gridfix">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="160">Идентификатор</th>
<th align="left" width="220">Домен</th>
<th align="left">Название</th>
<th align="left">База данных</th>
<th width="100" align="left">Дата создания</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['domains']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" name="domaincheck[]" value="<?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="150"><a href="javascript:geteditdomainform(<?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td width="200"><a href="admin.php?mode=main&authcode=<?php echo $this->_tpl_vars['system']['authcode']; ?>
&action=setdomain&domain=<?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['name']; ?>
" title="Перейти к управлению"><?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['domain']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['caption']; ?>
</td>
<td><?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['base']; ?>
</td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['domains'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
<td width="20"><a href="<?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['link']; ?>
" target="_blank" title="Просмотр сайта"><img src="/templates/admin/images/browse.png" alt="Просмотр сайта"></a></td>
<td width="20"><?php if ($this->_tpl_vars['domains'][$this->_sections['i']['index']]['activate']): ?><img src="/templates/admin/images/site_active_ok.png" width="15" height="15" alt="Лицензия A.CMS"><?php else: ?><img src="/templates/admin/images/site_active_no.png" width="15" height="15" alt="Без лицензии"><?php endif; ?></td>
<td width="20"><a href="javascript:deldomain(<?php echo $this->_tpl_vars['domains'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.png"  alt="Удалить"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['domains_pager']), $this);?>

<?php else: ?>
<div class="box">Нет сайтов.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['domains']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="import">Импорт конфигурации</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<?php endif; ?>
<td align="right" width="90%">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getadddomainform()"), $this);?>

</td>
</tr>
</table>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>