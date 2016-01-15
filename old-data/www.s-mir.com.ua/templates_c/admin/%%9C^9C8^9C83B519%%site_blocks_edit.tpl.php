<?php /* Smarty version 2.6.26, created on 2015-10-24 11:25:20
         compiled from site_blocks_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'site_blocks_edit.tpl', 9, false),array('function', 'submit', 'site_blocks_edit.tpl', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

<table class="form">
<tr><th class="title">Настройка блока</th></tr>
<tr>
<td class="place">
<form name="editblockform" method="post" enctype="multipart/form-data">
<div id="optionsbox" class="blockopt"></div>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['block']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'block','value' => $this->_tpl_vars['block']['block']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'editblock'), $this);?>

<div align="right" style="margin-top:10px">
<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

<input type="button" class="button" value="Отмена" onclick="document.location='<?php echo $this->_tpl_vars['bprevurl']; ?>
'" style="width:120px">
</div>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
</tr>
</table>
<script type="text/javascript">onchangetype_edit(<?php echo $this->_tpl_vars['block']['id']; ?>
,'<?php echo $this->_tpl_vars['block']['block']; ?>
','<?php echo $this->_tpl_vars['block']['block']; ?>
')</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 