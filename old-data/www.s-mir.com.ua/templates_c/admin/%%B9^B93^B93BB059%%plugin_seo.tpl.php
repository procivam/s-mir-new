<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:58
         compiled from plugin_seo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'plugin_seo.tpl', 17, false),array('function', 'object', 'plugin_seo.tpl', 25, false),array('function', 'button', 'plugin_seo.tpl', 32, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doubleurl']): ?>
<div class="warning">Запись с таким URL уже существует!</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['pages']): ?>
<form method="post">
<table class="grid">
<tr>
<th align="left">URL</th>
<th align="left">TITLE</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
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
<td><a href="javascript:geteditseoform(<?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['url']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['title']; ?>
</td>
<td width="20" align="center"><a href="http://<?php echo $this->_tpl_vars['domain']; ?>
<?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['url']; ?>
" target="_blank" title="Просмотр"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр"></a></td>
<td width="20" align="center"><a href="javascript:delurlseo(<?php echo $this->_tpl_vars['pages'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['pages_pager']), $this);?>

<?php else: ?>
<div class="box">Нет записей.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить URL",'onclick' => "getaddseoform()"), $this);?>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>