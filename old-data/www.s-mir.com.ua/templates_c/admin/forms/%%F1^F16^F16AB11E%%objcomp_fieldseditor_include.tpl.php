<?php /* Smarty version 2.6.26, created on 2015-10-22 17:14:03
         compiled from objcomp_fieldseditor_include.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'objcomp_fieldseditor_include.tpl', 4, false),array('function', 'dateselect', 'objcomp_fieldseditor_include.tpl', 14, false),array('function', 'textarea', 'objcomp_fieldseditor_include.tpl', 17, false),array('function', 'fckeditor', 'objcomp_fieldseditor_include.tpl', 20, false),array('function', 'combobox', 'objcomp_fieldseditor_include.tpl', 23, false),array('function', 'html_checkboxes', 'objcomp_fieldseditor_include.tpl', 27, false),array('function', 'image', 'objcomp_fieldseditor_include.tpl', 35, false),array('function', 'download', 'objcomp_fieldseditor_include.tpl', 48, false),)), $this); ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'string'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'max' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['property'],'text' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'],'width' => "40%"), $this);?>
</p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'int' || $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'float'): ?>
<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'] != 'userid'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'max' => 10,'width' => 70,'text' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value']), $this);?>
</p>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'bool'): ?>
<p><label><input type="checkbox" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
"<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
</label></p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'date'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_dateselect(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'date' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value']), $this);?>
</p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'text'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_textarea(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'rows' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['property'],'text' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value']), $this);?>
</p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'format'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_fckeditor(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'height' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['property'],'text' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'],'toolbar' => 'Basic'), $this);?>
</p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'select'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<p><?php echo smarty_function_combobox(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'options' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['options'],'selected' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'],'size' => 35), $this);?>
</p>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'mselect'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<div class="box">
<?php echo smarty_function_html_checkboxes(array('name' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field'],'options' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['options'],'checked' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'],'separator' => ", "), $this);?>

</div>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'image'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:</p>
<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'] > 0): ?>
<table width="100%" class="invisiblegrid">
<tr>
<td width="80" align="center">
<?php echo smarty_function_image(array('id' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'],'width' => 80,'height' => 80,'popup' => true), $this);?>

</td>
<td valign="top">
<p>Заменить:</p>
<p><input type="file" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
" style="width:40%"></p>
<p><label><input type="checkbox" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
_del">&nbsp;Удалить</label></p>
</td>
</tr>
</table>
<?php else: ?>
<p><input type="file" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
" style="width:40%"></p>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['type'] == 'file'): ?>
<p><?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['name']; ?>
:&nbsp;<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'] > 0): ?><?php echo smarty_function_download(array('id' => $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value']), $this);?>
&nbsp;&nbsp;<label><input type="checkbox" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
_del">&nbsp;Удалить</label><?php endif; ?></p>
<?php if ($this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['value'] > 0): ?>
<p>Заменить:</p>
<?php endif; ?>
<p><input type="file" name="<?php echo $this->_tpl_vars['form']['fields'][$this->_sections['i']['index']]['field']; ?>
" style="width:40%"></p>
<?php endif; ?>
<?php endfor; endif; ?>