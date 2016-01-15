<?php /* Smarty version 2.6.26, created on 2015-12-13 17:08:34
         compiled from block_links_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'block_links_edit.tpl', 3, false),array('function', 'hidden', 'block_links_edit.tpl', 5, false),array('function', 'html_options', 'block_links_edit.tpl', 33, false),)), $this); ?>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<p>Шаблон:</p>
<p><?php echo smarty_function_editbox(array('name' => 'b_template','text' => $this->_tpl_vars['form']['template'],'max' => 50,'width' => "20%"), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'b_template','value' => $this->_tpl_vars['form']['template']), $this);?>

<?php endif; ?>
<p>Cсылки:</p>
<div class="box">
<table id="lheader" class="grid"<?php if (! $this->_tpl_vars['form']['links']): ?> style="display:none"<?php endif; ?>>
<tr>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<th align="left" width="25" nowrap style="font-size:10px">ур<sup style="font-size:10px">2</sup></th>
<?php endif; ?>
<th align="left" width="20%" style="font-size:11px">Выбрать</th>
<th align="left" width="30%" style="font-size:11px">Название</th>
<th align="left" style="font-size:11px">Ссылка</th>
<th align="left" width="60" style="font-size:11px">ID</th>
<th align="left" width="20" style="font-size:11px">&nbsp;</th>
<th align="left" width="20" style="font-size:11px">&nbsp;</th>
</tr>
</table>
<div id="b_links">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['links']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="link<?php echo $this->_sections['i']['index']; ?>
">
<table width="100%">
<tr>
<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<td width="25"><input type="checkbox" id="b_sub<?php echo $this->_sections['i']['index']; ?>
" name="b_sub[]" value="<?php echo $this->_sections['i']['index']; ?>
"<?php if ($this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['sub']): ?> checked<?php endif; ?>></td>
<?php endif; ?>
<td width="20%">
<select name="b_slink<?php echo $this->_sections['i']['index']; ?>
" onchange="links_select(<?php echo $this->_sections['i']['index']; ?>
,this.value)" style="width:100%">
<option value="0">---</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['alllinks'],'selected' => $this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['link']), $this);?>

</select>
</td>
<td width="30%"><input type="text" name="b_caption<?php echo $this->_sections['i']['index']; ?>
" maxlength="50" style="width:100%" value="<?php echo $this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['name']; ?>
"></td>
<td><input type="text" name="b_link<?php echo $this->_sections['i']['index']; ?>
" maxlength="100" style="width:100%" value="<?php echo $this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['link']; ?>
"></td>
<td width="60">
<input type="text" name="b_id<?php echo $this->_sections['i']['index']; ?>
" maxlength="20" style="width:100%" value="<?php echo $this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['id']; ?>
">
<input type="hidden" name="b_section<?php echo $this->_sections['i']['index']; ?>
" value="<?php echo $this->_tpl_vars['form']['links'][$this->_sections['i']['index']]['section']; ?>
"></td>
</td>
<td width="20"><a href="javascript:links_insert(<?php echo $this->_sections['i']['index']; ?>
)" title="Вставить"><img src="/templates/admin/images/add.gif" width="16" height="16"></a></td>
<td width="20"><a href="javascript:links_del(<?php echo $this->_sections['i']['index']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
</table>
</div>
<?php endfor; endif; ?>
</div>
<table width="100%">
<tr>
<td>Импорт (xls):&nbsp;<input type="file" name="xlsfile"></td>
<td width="20"><a href="javascript:links_addlink()" title="Добавить"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить"></a></td>
<td width="20">&nbsp;</td>
</tr>
</table>
</div>
<?php echo smarty_function_hidden(array('name' => 'b_count','value' => $this->_tpl_vars['form']['count']), $this);?>