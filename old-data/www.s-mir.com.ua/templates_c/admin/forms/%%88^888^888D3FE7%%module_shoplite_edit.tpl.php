<?php /* Smarty version 2.6.26, created on 2015-10-22 17:14:13
         compiled from module_shoplite_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'module_shoplite_edit.tpl', 8, false),array('function', 'treeselect', 'module_shoplite_edit.tpl', 17, false),array('function', 'fckeditor', 'module_shoplite_edit.tpl', 28, false),array('function', 'textarea', 'module_shoplite_edit.tpl', 30, false),array('function', 'tags', 'module_shoplite_edit.tpl', 38, false),array('function', 'hidden', 'module_shoplite_edit.tpl', 40, false),array('function', 'submit', 'module_shoplite_edit.tpl', 96, false),array('function', 'button', 'module_shoplite_edit.tpl', 97, false),array('modifier', 'date_format', 'module_shoplite_edit.tpl', 94, false),)), $this); ?>
<form name="edititemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'name','text' => $this->_tpl_vars['form']['name']), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','max' => 100,'width' => "90%",'text' => $this->_tpl_vars['form']['urlname']), $this);?>
</td>
</tr>
<tr>
<td width="70%">Категория:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Артикул:</td>
</tr>
<tr>
<td width="70%">
<p><?php echo smarty_function_treeselect(array('name' => 'idcat','items' => $this->_tpl_vars['form']['categories'],'selected' => $this->_tpl_vars['form']['idcat'],'title' => "Выбор категории",'width' => "70%"), $this);?>
</p>
<?php if ($this->_tpl_vars['options']['usecats']): ?>
<p><?php echo smarty_function_treeselect(array('id' => 'treecat1','name' => 'idcat1','items' => $this->_tpl_vars['form']['categories'],'selected' => $this->_tpl_vars['form']['idcat1'],'title' => "Выбор категории",'width' => "70%"), $this);?>
</p>
<p><?php echo smarty_function_treeselect(array('id' => 'treecat2','name' => 'idcat2','items' => $this->_tpl_vars['form']['categories'],'selected' => $this->_tpl_vars['form']['idcat2'],'title' => "Выбор категории",'width' => "70%"), $this);?>
</p>
<?php endif; ?>
</td>
<td width="30%" valign="top">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'art','max' => 30,'width' => "90%",'text' => $this->_tpl_vars['form']['art']), $this);?>
</td>
</tr>
</table>
<p>Текст:</p>
<?php if ($this->_tpl_vars['options']['fckeditor']): ?>
<?php echo smarty_function_fckeditor(array('name' => 'content','height' => 250,'toolbar' => 'Medium','text' => $this->_tpl_vars['form']['content']), $this);?>

<?php else: ?>
<?php echo smarty_function_textarea(array('name' => 'content','rows' => 6,'text' => $this->_tpl_vars['form']['content']), $this);?>

<?php endif; ?>
<?php if (! $this->_tpl_vars['options']['autoanons']): ?>
<p>Аннотация:</p>
<p><?php echo smarty_function_textarea(array('name' => 'description','rows' => 3,'text' => $this->_tpl_vars['form']['description']), $this);?>
</p>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array('text' => $this->_tpl_vars['form']['tags']), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => $this->_tpl_vars['form']['tags']), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['useimages']): ?>
<p>Фото:</p>
<?php echo $this->_tpl_vars['form']['imagesbox']->getContent(); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usefiles']): ?>
<p>Прикрепленные файлы:</p>
<?php echo $this->_tpl_vars['form']['filesbox']->getContent(); ?>

<?php endif; ?>
<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Цена:</td><td width="120">Прошлая цена:</td><td><?php if ($this->_tpl_vars['options']['onlyavailable']): ?>Количество:<?php else: ?>&nbsp;<?php endif; ?></td><td>&nbsp;</td></tr>
<tr>
<td width="120"><?php echo smarty_function_editbox(array('name' => 'price','width' => '80px','text' => $this->_tpl_vars['form']['price']), $this);?>
 <?php echo $this->_tpl_vars['options']['valute']; ?>
</td>
<td width="120"><?php echo smarty_function_editbox(array('name' => 'oldprice','width' => '80px','text' => $this->_tpl_vars['form']['oldprice']), $this);?>
 <?php echo $this->_tpl_vars['options']['valute']; ?>
</td>
<td><?php if ($this->_tpl_vars['options']['onlyavailable']): ?><?php echo smarty_function_editbox(array('name' => 'iscount','width' => '80px','text' => $this->_tpl_vars['form']['iscount']), $this);?>
<?php else: ?><?php echo smarty_function_hidden(array('name' => 'iscount','value' => $this->_tpl_vars['form']['iscount']), $this);?>
<?php endif; ?></td>
<td>
<?php if ($this->_tpl_vars['options']['modprices']): ?>
<a class="cp_link_headding" href="javascript:getmpricesform()" style="float:right">Модификаторы цены</a>
<div id="mpricesbox" style="display:none">
<div id="mprices">
<table width="600">
<tr>
<td align="left"><h3 style="margin:0px">Название</h3></td>
<td align="left" width="80"><h3 style="margin:0px">Цена</h3></td>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['form']['mprices']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr>
<td><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['mprices'][$this->_sections['i']['index']]['textname'],'text' => $this->_tpl_vars['form']['mprices'][$this->_sections['i']['index']]['textvalue']), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => $this->_tpl_vars['form']['mprices'][$this->_sections['i']['index']]['pricename'],'text' => $this->_tpl_vars['form']['mprices'][$this->_sections['i']['index']]['pricevalue']), $this);?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
</div>
</div>
<?php endif; ?>
</td>
</tr>
</table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "objcomp_fieldseditor_include.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'edititem'), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active"<?php if ($this->_tpl_vars['form']['active'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Активно</label>&nbsp;&nbsp;
<label><input type="checkbox" name="favorite"<?php if ($this->_tpl_vars['form']['favorite'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Спецпредложение</label>&nbsp;&nbsp;
<label><input type="checkbox" name="new"<?php if ($this->_tpl_vars['form']['new'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Новинка</label>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:applyitem(document.forms.edititemform)" title="Сохранить не закрывая"><img src="/templates/admin/images/save.gif" width="16" height="16" style="vertical-align:middle"></a>
<span id="applydate"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
&nbsp;&nbsp;</span>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>