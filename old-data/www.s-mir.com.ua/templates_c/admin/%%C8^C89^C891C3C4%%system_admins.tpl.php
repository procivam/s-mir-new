<?php /* Smarty version 2.6.26, created on 2016-01-04 13:58:47
         compiled from system_admins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'system_admins.tpl', 17, false),array('function', 'object', 'system_admins.tpl', 27, false),array('function', 'button', 'system_admins.tpl', 31, false),array('modifier', 'date_format', 'system_admins.tpl', 20, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doublelogin']): ?>
<div class="warning">Указанный логин уже используется!</div>
<?php endif; ?>

<table class="grid">
<tr>
<th align="left" width="220">Логин</th>
<th align="left">Имя</th>
<th align="left" width="120">Последний визит</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr class="<?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="220"><a href="javascript:geteditadminform(<?php echo $this->_tpl_vars['admins'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['admins'][$this->_sections['i']['index']]['login']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['admins'][$this->_sections['i']['index']]['name']; ?>
</td>
<td width="120"><?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['dauth']): ?><?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['dauth'] >= time()): ?>на сайте<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['admins'][$this->_sections['i']['index']]['dauth'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
<?php endif; ?><?php else: ?>не было<?php endif; ?></td>
<td width="20"><?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['issuperadmin']): ?><img src="/templates/admin/images/star.gif" width="16" height="16" alt="Суперадминистратор"><?php else: ?>&nbsp;<?php endif; ?></td>
<td width="20"><?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['isadmin']): ?><img src="/templates/admin/images/admin.gif" width="16" height="16" alt="Администратор"><?php else: ?><img src="/templates/admin/images/user.gif" width="16" height="16" alt="Модератор"><?php endif; ?></td>
<td width="20"><?php if ($this->_tpl_vars['admins'][$this->_sections['i']['index']]['id'] != $this->_tpl_vars['auth']->id): ?><a href="javascript:deladmin(<?php echo $this->_tpl_vars['admins'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a><?php else: ?>&nbsp;<?php endif; ?></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['admins_pager']), $this);?>

<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddadminform()"), $this);?>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>