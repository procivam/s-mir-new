<?php /* Smarty version 2.6.26, created on 2015-12-13 17:36:23
         compiled from site_sections_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'site_sections_edit.tpl', 8, false),array('function', 'html_options', 'site_sections_edit.tpl', 25, false),array('function', 'hidden', 'site_sections_edit.tpl', 30, false),array('function', 'image', 'site_sections_edit.tpl', 59, false),array('function', 'submit', 'site_sections_edit.tpl', 80, false),array('function', 'button', 'site_sections_edit.tpl', 81, false),)), $this); ?>
<form name="editsectionform" method="post" onsubmit="return section_editform(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'caption','text' => $this->_tpl_vars['form']['caption']), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','width' => "90%",'max' => 100,'text' => $this->_tpl_vars['form']['urlname']), $this);?>
</td>
</tr>
</table>
<table width="100%" class="invisiblegrid">
<tr>
<td width="120">Идентификатор:<sup style="color:gray">*</sup></td>
<?php if (count ( $this->_tpl_vars['form']['languages'] ) > 1): ?><td width="100">Язык:</td><?php endif; ?>
<td>&nbsp;</td>
</tr>
<tr>
<td width="120">
<?php echo smarty_function_editbox(array('name' => 'name','max' => 50,'width' => "95%",'text' => $this->_tpl_vars['form']['name']), $this);?>
&nbsp;
</td>
<?php if (count ( $this->_tpl_vars['form']['languages'] ) > 1): ?>
<td width="100">
<select name="lang" onchange="sellang(this.value)" style="width:100%">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['form']['slanguages'],'selected' => $this->_tpl_vars['form']['lang']), $this);?>

<option value="all"<?php if ($this->_tpl_vars['form']['lang'] == 'all'): ?> selected<?php endif; ?>>Общий</option>
</select>
</td>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'lang','value' => $this->_tpl_vars['form']['lang']), $this);?>

<?php endif; ?>
<td>&nbsp;</td>
</tr>
</table>
<p><a class="cp_link_headding" href="javascript:togglepbox('sectionpbox')">Дополнительно</a></p>
<div id="sectionpbox" style="display:none">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['languages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="lang_<?php echo $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['name']; ?>
"<?php if ($this->_tpl_vars['form']['lang'] != 'all' && $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['name'] != $this->_tpl_vars['form']['lang']): ?> style="display:none"<?php endif; ?>>
<?php if (count ( $this->_tpl_vars['form']['languages'] ) > 1): ?>
<h3><div id="tlang_<?php echo $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['name']; ?>
"<?php if ($this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['name'] == $this->_tpl_vars['form']['lang']): ?> style="display:none"<?php endif; ?>><?php echo $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['caption']; ?>
</div></h3>
<div class="box">
<?php else: ?>
<h3></h3>
<div>
<?php endif; ?>
<p>Название на сайте:</p>
<p><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['_caption']['field'],'text' => $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['_caption']['value'],'max' => 100,'width' => "40%"), $this);?>
</p>
<p>Заголовок (title):</p>
<p><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['_title']['field'],'text' => $this->_tpl_vars['form']['languages'][$this->_sections['i']['index']]['_title']['value']), $this);?>
</p>
</div>
</div>
<?php endfor; endif; ?>
<?php if ($this->_tpl_vars['auth']->isSuperAdmin()): ?>
<p>Изображение:</p>
<?php if ($this->_tpl_vars['form']['idimg'] > 0): ?>
<table width="100%" class="invisiblegrid">
<tr>
<td width="80" align="center">
<?php echo smarty_function_image(array('id' => $this->_tpl_vars['form']['idimg'],'width' => 80,'height' => 80,'popup' => true), $this);?>

</td>
<td valign="top">
<p>Заменить:</p>
<p><input type="file" name="image"></p>
<p><label><input type="checkbox" name="imagedel">&nbsp;Удалить</label></p>
</td>
</tr>
</table>
<?php else: ?>
<p><input type="file" name="image"></p>
<?php endif; ?>
<?php endif; ?>
</div>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'edit'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left"><label><input type="checkbox" name="active" value="Y" <?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?>checked<?php endif; ?>>&nbsp;Активен</label>&nbsp;&nbsp;<label><input type="checkbox" name="icon" value="Y" <?php if ($this->_tpl_vars['form']['icon'] == 'Y'): ?>checked<?php endif; ?>>&nbsp;Иконка на главной панели</label>&nbsp;&nbsp;<label><input type="checkbox" name="menu" value="Y" <?php if ($this->_tpl_vars['form']['menu'] == 'Y'): ?>checked<?php endif; ?>>&nbsp;Меню панели</label></p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>