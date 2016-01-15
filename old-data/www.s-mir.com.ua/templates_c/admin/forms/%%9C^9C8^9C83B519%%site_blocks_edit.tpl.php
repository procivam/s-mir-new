<?php /* Smarty version 2.6.26, created on 2015-10-22 16:34:45
         compiled from site_blocks_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'site_blocks_edit.tpl', 4, false),array('function', 'html_options', 'site_blocks_edit.tpl', 24, false),array('function', 'hidden', 'site_blocks_edit.tpl', 32, false),array('function', 'cycle', 'site_blocks_edit.tpl', 54, false),array('function', 'submit', 'site_blocks_edit.tpl', 77, false),array('function', 'button', 'site_blocks_edit.tpl', 78, false),)), $this); ?>
<form name="editblockform" method="post" onsubmit="return block_form(this)" enctype="multipart/form-data">
<p>Название:<sup style="color:gray">*</sup></p>
<p>
<?php echo smarty_function_editbox(array('name' => 'caption','width' => "40%",'text' => $this->_tpl_vars['form']['caption']), $this);?>

</p>
<table width="100%" class="invisiblegrid">
<tr>
<td width="150">Расположение:<sup style="color:gray">*</sup></td>
<td width="150">Идентификатор:</td>
<td width="150">Шаблон обрамления:</td>
<td width="150">Иконка для раздела:</td>
<td><?php if (count ( $this->_tpl_vars['form']['slanguages'] ) > 1): ?>Языковая версия:<?php else: ?>&nbsp;<?php endif; ?></td>
</tr>
<tr>
<td>
<select name="align" onchange="selalign(this.form,this.value)" style="width:100%">
<option value="left"<?php if ($this->_tpl_vars['form']['align'] == 'left'): ?> selected<?php endif; ?>>слева</option>
<option value="right"<?php if ($this->_tpl_vars['form']['align'] == 'right'): ?> selected<?php endif; ?>>справа</option>
<option value="free"<?php if ($this->_tpl_vars['form']['align'] == 'free'): ?> selected<?php endif; ?>>заданное</option>
</select>
</td>
<td width="150"><?php echo smarty_function_editbox(array('name' => 'name','max' => 50,'text' => $this->_tpl_vars['form']['name']), $this);?>
</td>
<td width="150"><?php echo smarty_function_editbox(array('name' => 'frame','text' => $this->_tpl_vars['form']['frame'],'max' => 50), $this);?>
</td>
<td width="150"><select name="itemeditor" style="width:100%"><option value="">Не выбрано</option><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['items'],'selected' => $this->_tpl_vars['form']['itemeditor']), $this);?>
</select></td>
<td>
<?php if (count ( $this->_tpl_vars['form']['slanguages'] ) > 1): ?>
<select name="lang" onchange="sellang(<?php echo $this->_tpl_vars['form']['id']; ?>
,this.value)">
<option value="all"<?php if ($this->_tpl_vars['form']['lang'] == 'all'): ?> selected<?php endif; ?>>Все</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['slanguages'],'selected' => $this->_tpl_vars['form']['lang']), $this);?>

</select>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'lang','value' => $this->_tpl_vars['form']['lang']), $this);?>

<?php endif; ?>
</td>
</tr>
</table>
<p>Базовый блок:<sup style="color:gray">*</sup></p>
<p>
<select name="block" onchange="onchangetype_edit(<?php echo $this->_tpl_vars['form']['id']; ?>
,this.value,'<?php echo $this->_tpl_vars['form']['block']; ?>
')">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['blocks'],'selected' => $this->_tpl_vars['form']['block']), $this);?>

</select>
</p>
<div id="optionsbox" class="blockopt"></div>
<div id="showoptions"<?php if ($this->_tpl_vars['form']['align'] == 'free'): ?> style="display:none"<?php endif; ?>>
<p><label><input type="checkbox" name="check_showall" value="Y"<?php if ($this->_tpl_vars['form']['showall'] == 'Y'): ?> checked<?php endif; ?> onclick="showallcheck(this.checked)">&nbsp;Создается всегда</label></p>
<div id="showoptions2"<?php if ($this->_tpl_vars['form']['showall'] == 'Y'): ?> style="display:none"<?php endif; ?>>
<?php if ($this->_tpl_vars['form']['sections']): ?>
<table width="100%" class="grid">
<tr>
<th align="left" width="100" style="font-size:11">Раздел</th>
<th align="left" style="font-size:11">Страницы</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['sections']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<td width="100" nowrap><?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['caption']; ?>
</td>
<td style="font-size:10">
<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
<label><input type="checkbox" name="showcheck[]" value="<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['pages'][$this->_sections['j']['index']]['page']; ?>
"<?php if ($this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['pages'][$this->_sections['j']['index']]['checked']): ?> checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['pages'][$this->_sections['j']['index']]['caption']; ?>
</label>
<?php if (! $this->_sections['j']['last']): ?>, <?php endif; ?>
<?php endfor; else: ?>
<input type="checkbox" name="showcheck[]" value="<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['checked']): ?> checked<?php endif; ?>>
<?php endif; ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
<?php endif; ?>
</div>
</div>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'edit'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Активен</label>&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="checkicon"<?php if ($this->_tpl_vars['form']['icon'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Иконка на главной панели</label></p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>