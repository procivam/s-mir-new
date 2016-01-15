<?php /* Smarty version 2.6.26, created on 2016-01-04 14:13:01
         compiled from files_images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'files_images.tpl', 26, false),array('function', 'image', 'files_images.tpl', 29, false),array('function', 'object', 'files_images.tpl', 38, false),array('function', 'hidden', 'files_images.tpl', 52, false),array('function', 'html_options', 'files_images.tpl', 64, false),array('function', 'button', 'files_images.tpl', 86, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['existsfile']): ?>
<div class="warning">Файл с таким именем уже существует!</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['cursection']): ?>
<h3><a href="<?php echo $this->_tpl_vars['cursectionlink']; ?>
" title="Перейти"><?php echo $this->_tpl_vars['cursection']; ?>
:</a></h3>
<?php endif; ?>

<?php if ($this->_tpl_vars['images']): ?>
<div id="imagesbox">
<form name="imagesform" method="post">
<table width="100%" class="grid">
<tr>
<th width="20">&nbsp;</th>
<th width="20">ID</th>
<th align="left" width="80">&nbsp;</th>
<th align="left" width="60">Размер</th>
<th align="left">Файл</th>
<th align="left">Описание</th>
<th align="left">Раздел</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['images']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
" name="checkimg[]" value="<?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="20"><?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['id']; ?>
</td>
<td align="center" width="80"><?php echo smarty_function_image(array('id' => $this->_tpl_vars['images'][$this->_sections['i']['index']]['id'],'width' => 80,'height' => 50,'popup' => true), $this);?>
</td>
<td align="left" width="60"><?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['width']; ?>
X<?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['height']; ?>
</td>
<td><a href="javascript:im_geteditform(<?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['basename']; ?>
</a></td>
<td><?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['caption']; ?>
</td>
<td nowrap><?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['section']; ?>
</td>
<td width="20"><a href="javascript:im_del(<?php echo $this->_tpl_vars['images'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" align="Удалить"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['images_pager']), $this);?>

<?php else: ?>
<div class="box">Нет изображений.</div>
<?php endif; ?>
<table class="actiongrid" width="100%">
<tr>
<?php if ($this->_tpl_vars['images']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<td nowrap>
<form method="get">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

Разделы:&nbsp;
<select name="idsec" onchange="this.form.submit()">
<option value="0">Все</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sections'],'selected' => $_GET['idsec']), $this);?>

</select>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<td nowrap>
<form name="rowsform" method="post">
Строк:
<select name="rows" onchange="this.form.submit()">
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
<script type="text/javascript">document.forms.rowsform.rows.value='<?php echo $this->_tpl_vars['rows']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setrows'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<?php endif; ?>
<td width="80%" align="right">
<?php echo smarty_function_button(array('caption' => "Загрузить",'onclick' => "im_getuploadform()"), $this);?>

</td>
</tr>
</table>
</div>
<div id="im_editbox"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>