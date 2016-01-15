<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:38
         compiled from module_pages_grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_pages_grid.tpl', 21, false),array('function', 'object', 'module_pages_grid.tpl', 36, false),array('modifier', 'date_format', 'module_pages_grid.tpl', 26, false),)), $this); ?>
<div>
<h3><?php echo $this->_tpl_vars['form']['title']; ?>
</h3>
<table class="grid gridsort">
<tr>
<th align="left" width="20">&nbsp;</th>
<th align="left" width="25">&nbsp;</th>
<th align="left">Название</th>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?><th align="left" width="120">Шаблон</th><?php endif; ?>
<th align="left" width="100">Дата</th>
<th align="left" width="25"></th>
<th align="left" width="25"></th>
<?php if ($this->_tpl_vars['form']['seo']): ?><th align="left" width="27"></th><?php endif; ?>
<th align="left" width="28"></th>
<th align="left" width="30"></th>
</tr>
</table>
<?php if (! $this->_tpl_vars['form']['sub']): ?><div id="pagesgridbox" class="gridsortbox"><?php endif; ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['form']['sub'] && $this->_sections['i']['iteration'] == 2): ?><div id="pagesgridbox" class="gridsortbox"><?php endif; ?>
<table id="pd_<?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort">
<tr class="<?php if (! $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['active'] || $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="20"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['0']; ?>
</td>
<td width="20"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['1']; ?>
</td>
<td><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['2']; ?>
</td>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?><td width="120"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['3']; ?>
</td><?php endif; ?>
<td width="100"><?php if ($this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['4']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['4'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
<?php else: ?>&nbsp;<?php endif; ?></td>
<td width="25" align="center"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['5']; ?>
</td>
<td width="25" align="center"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['6']; ?>
</td>
<?php if ($this->_tpl_vars['form']['seo'] && $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['6'] != '&nbsp;'): ?><td width="25" align="center"><a href="javascript:geturlseoform('<?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['link']; ?>
')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td><?php endif; ?>
<td width="25" align="center"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['7']; ?>
</td>
<td width="25" align="center"><?php echo $this->_tpl_vars['form']['pages'][$this->_sections['i']['index']]['8']; ?>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['form']['pager']), $this);?>

</div>