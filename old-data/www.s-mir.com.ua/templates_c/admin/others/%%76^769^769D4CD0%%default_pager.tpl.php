<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:58
         compiled from default_pager.tpl */ ?>
<?php if ($this->_tpl_vars['pagelinks']): ?>
<table class="grid" style="margin-top:3px;margin-bottom:3px;">
<tr>
<th align="center">
<?php if ($this->_tpl_vars['prevlink']): ?>
<span class="pagenav"><a href="<?php echo $this->_tpl_vars['prevlink']; ?>
" title="Предыдущая">&laquo;</a></span>
<?php endif; ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['pagelinks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['pagelinks'][$this->_sections['i']['index']]['selected']): ?>
<span class="pagenav"><b><?php echo $this->_tpl_vars['pagelinks'][$this->_sections['i']['index']]['name']; ?>
</b></span>
<?php else: ?>
<span class="pagenav"><a href="<?php echo $this->_tpl_vars['pagelinks'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['pagelinks'][$this->_sections['i']['index']]['name']; ?>
</a></span>
<?php endif; ?>
<?php endfor; endif; ?>
<?php if ($this->_tpl_vars['nextlink']): ?>
<span class="pagenav"><a href="<?php echo $this->_tpl_vars['nextlink']; ?>
" title="Следующая">&raquo;</a></span>
<?php endif; ?>
</th>
</tr>
</table>
<?php endif; ?>