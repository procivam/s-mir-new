<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:23
         compiled from plugin_banners_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'plugin_banners_edit.tpl', 3, false),array('function', 'html_options', 'plugin_banners_edit.tpl', 5, false),array('function', 'image', 'plugin_banners_edit.tpl', 12, false),array('function', 'textarea', 'plugin_banners_edit.tpl', 38, false),array('function', 'dateselect', 'plugin_banners_edit.tpl', 55, false),array('function', 'hidden', 'plugin_banners_edit.tpl', 59, false),array('function', 'submit', 'plugin_banners_edit.tpl', 70, false),array('function', 'button', 'plugin_banners_edit.tpl', 71, false),)), $this); ?>
<form name="editbannerform" method="post" onsubmit="return banner_form(this)" enctype="multipart/form-data">
<p>Название:</p>
<p><?php echo smarty_function_editbox(array('name' => 'name','max' => 100,'width' => "60%",'text' => $this->_tpl_vars['form']['name']), $this);?>
</p>
<p>Категория:</p>
<p><select name="idcat2"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['categories'],'selected' => $this->_tpl_vars['form']['idcat']), $this);?>
</select></p>
<p>Файл изображения или flash:</p>
<?php if ($this->_tpl_vars['form']['filepath']): ?>
<table width="100%" class="invisiblegrid">
<tr>
<?php if ($this->_tpl_vars['form']['type'] != 'flash'): ?>
<td width="80" height="80" align="center">
<?php echo smarty_function_image(array('src' => $this->_tpl_vars['form']['filepath'],'width' => 80), $this);?>

</td>
<?php endif; ?>
<td valign="top">
<?php if ($this->_tpl_vars['form']['type'] == 'flash'): ?><p><a href="/<?php echo $this->_tpl_vars['form']['filepath']; ?>
" target="_blank">/<?php echo $this->_tpl_vars['form']['filepath']; ?>
</a></p><?php endif; ?>
<p>Заменить:</p>
<p><input type="file" name="bannerfile" style="width:40%"></p>
</td>
</tr>
</table>
<?php else: ?>
<p><input type="file" name="bannerfile" style="width:50%"></p>
<?php endif; ?>
<table class="invisiblegrid">
<tr>
<td>Ширина:</td>
<td></td>
<td>Высота:</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'width','width' => '70','text' => $this->_tpl_vars['form']['width']), $this);?>
</td>
<td>X</td>
<td><?php echo smarty_function_editbox(array('name' => 'height','width' => '70','text' => $this->_tpl_vars['form']['height']), $this);?>
</td>
</tr>
</table>
<p>Текст:</p>
<?php echo smarty_function_textarea(array('name' => 'text','rows' => 4,'text' => $this->_tpl_vars['form']['text']), $this);?>

<p>Целевая ссылка:</p>
<p><?php echo smarty_function_editbox(array('name' => 'url','text' => $this->_tpl_vars['form']['url'],'width' => "50%"), $this);?>

<select name="target">
<option value="_blank"<?php if ($this->_tpl_vars['form']['target'] == '_blank'): ?> selected<?php endif; ?>>В новом окне</option>
<option value="_self"<?php if ($this->_tpl_vars['form']['target'] == '_self'): ?> selected<?php endif; ?>>В текущем окне</option>
</select></p>
<p><label><input type="checkbox" name="showall"<?php if ($this->_tpl_vars['form']['showall']): ?> checked<?php endif; ?> onclick="showallcheck(this.checked)">&nbsp;Для всех разделов</label></p>
<div id="showoptions" class="box"<?php if ($this->_tpl_vars['form']['showall']): ?> style="display:none"<?php endif; ?>>
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
<label><input type="checkbox" name="show[]" value="<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['id']; ?>
"<?php if ($this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['checked']): ?> checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['form']['sections'][$this->_sections['i']['index']]['caption']; ?>
</label><?php if (! $this->_sections['i']['last']): ?>,  <?php endif; ?>
<?php endfor; endif; ?>
<p>По адресам (URL по строкам):</p>
<p><?php echo smarty_function_textarea(array('name' => 'showurl','rows' => 3,'text' => $this->_tpl_vars['form']['showurl']), $this);?>

</div>
<p>Период показа:</p>
<p><input type="checkbox" name="date"<?php if ($this->_tpl_vars['form']['date'] == 'Y'): ?> checked<?php endif; ?>>
с <?php echo smarty_function_dateselect(array('name' => 'date1','date' => $this->_tpl_vars['form']['date1'],'onchange' => "this.form.date.checked=true"), $this);?>

&nbsp;
по <?php echo smarty_function_dateselect(array('name' => 'date2','date' => $this->_tpl_vars['form']['date2'],'maxtime' => true,'onchange' => "this.form.date.checked=true"), $this);?>

</p>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'idcat','value' => $this->_tpl_vars['form']['idcat']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'banners'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'editbanner'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Включен</label>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>