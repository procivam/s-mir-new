<?php /* Smarty version 2.6.26, created on 2015-10-22 17:14:03
         compiled from module_shoplite_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'module_shoplite_add.tpl', 8, false),array('function', 'treeselect', 'module_shoplite_add.tpl', 17, false),array('function', 'fckeditor', 'module_shoplite_add.tpl', 28, false),array('function', 'textarea', 'module_shoplite_add.tpl', 30, false),array('function', 'tags', 'module_shoplite_add.tpl', 38, false),array('function', 'hidden', 'module_shoplite_add.tpl', 40, false),array('function', 'submit', 'module_shoplite_add.tpl', 162, false),array('function', 'button', 'module_shoplite_add.tpl', 163, false),)), $this); ?>
<form name="additemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="70%">Название:<sup style="color:gray">*</sup></td>
<td width="30%">&nbsp;&nbsp;Идентификатор (URL):</td>
</tr>
<tr>
<td width="70%"><?php echo smarty_function_editbox(array('name' => 'name'), $this);?>
</td>
<td width="30%">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'urlname','max' => 100,'width' => "90%"), $this);?>
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
<p><?php echo smarty_function_treeselect(array('id' => 'treecat1','name' => 'idcat1','items' => $this->_tpl_vars['form']['categories'],'title' => "Выбор категории",'width' => "70%"), $this);?>
</p>
<p><?php echo smarty_function_treeselect(array('id' => 'treecat2','name' => 'idcat2','items' => $this->_tpl_vars['form']['categories'],'title' => "Выбор категории",'width' => "70%"), $this);?>
</p>
<?php endif; ?>
</td>
<td width="30%" valign="top">&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'art','max' => 30,'width' => "90%"), $this);?>
</td>
</tr>
</table>
<p>Текст:</p>
<?php if ($this->_tpl_vars['options']['fckeditor']): ?>
<?php echo smarty_function_fckeditor(array('name' => 'content','height' => 250,'toolbar' => 'Medium'), $this);?>

<?php else: ?>
<?php echo smarty_function_textarea(array('name' => 'content','rows' => 6), $this);?>

<?php endif; ?>
<?php if (! $this->_tpl_vars['options']['autoanons']): ?>
<p>Аннотация:</p>
<p><?php echo smarty_function_textarea(array('name' => 'description','rows' => 3), $this);?>
</p>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usetags']): ?>
<p>Теги (через запятую):</p>
<p><?php echo smarty_function_tags(array(), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'tags','value' => ""), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['options']['useimages']): ?>
<div class="box">
<div id="imageitems1">
<table class="invisiblegrid" width="100%">
<tr>
<td>Фото 1:</td>
<td width="80%">Описание 1:</td>
</tr>
<tr>
<td><input type="file" name="image1"></td>
<td width="80%"><input type="text" name="imagedescription1" style="width:100%"></td>
</tr>
</table>
</div>
<div id="imageitems2"></div>
<div id="imageitems3"></div>
<div id="imageitems4"></div>
<div id="imageitems5"></div>
<p><a href="javascript:additemimage()" title="Добавить"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить"></a></p>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usefiles']): ?>
<p>Прикрепленные файлы:</p>
<div class="box">
<div id="fileitems1">
<table class="invisiblegrid" width="100%">
<tr>
<td>Файл 1:</td>
<td width="80%">Описание 1:</td>
</tr>
<tr>
<td><input type="file" name="file1"></td>
<td width="80%"><input type="text" name="filedescription1" style="width:100%"></td>
</tr>
</table>
</div>
<div id="fileitems2"></div>
<div id="fileitems3"></div>
<div id="fileitems4"></div>
<div id="fileitems5"></div>
<p><a href="javascript:additemfile()" title="Добавить"><img src="/templates/admin/images/add.gif" width="16" height="16" alt="Добавить"></a></p>
</div>
<?php endif; ?>
<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Цена:</td><td width="120">Прошлая цена:</td><td><?php if ($this->_tpl_vars['options']['onlyavailable']): ?>Количество:<?php else: ?>&nbsp;<?php endif; ?></td><td>&nbsp;</td></tr>
<tr>
<td width="120"><?php echo smarty_function_editbox(array('name' => 'price','width' => '80px'), $this);?>
 <?php echo $this->_tpl_vars['options']['valute']; ?>
</td>
<td width="120"><?php echo smarty_function_editbox(array('name' => 'oldprice','width' => '80px'), $this);?>
 <?php echo $this->_tpl_vars['options']['valute']; ?>
</td>
<td><?php if ($this->_tpl_vars['options']['onlyavailable']): ?><?php echo smarty_function_editbox(array('name' => 'iscount','width' => '80px','text' => '1'), $this);?>
<?php else: ?><?php echo smarty_function_hidden(array('name' => 'iscount','value' => 1), $this);?>
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
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice1_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice1_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice2_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice2_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice3_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice3_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice4_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice4_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice5_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice5_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice6_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice6_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice7_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice7_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice8_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice8_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice9_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice9_price'), $this);?>
</td>
</tr>
<tr>
<td><?php echo smarty_function_editbox(array('name' => 'mprice10_text'), $this);?>
</td>
<td width="80"><?php echo smarty_function_editbox(array('name' => 'mprice10_price'), $this);?>
</td>
</tr>
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
<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'additem'), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active" checked>&nbsp;Активно</label>&nbsp;&nbsp;
<label><input type="checkbox" name="favorite">&nbsp;Спецпредложение</label>&nbsp;&nbsp;
<label><input type="checkbox" name="new">&nbsp;Новинка</label>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>