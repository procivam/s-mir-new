<?php /* Smarty version 2.6.26, created on 2015-12-13 17:32:13
         compiled from site_pages_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'site_pages_edit.tpl', 3, false),array('function', 'hidden', 'site_pages_edit.tpl', 4, false),array('function', 'submit', 'site_pages_edit.tpl', 10, false),array('function', 'button', 'site_pages_edit.tpl', 11, false),)), $this); ?>
<form name="pageeditform" method="post">
<p>Шаблон:<sup style="color:gray">*</sup></p>
<p><?php echo smarty_function_editbox(array('name' => 'template','width' => "40%",'text' => $this->_tpl_vars['form']['template']), $this);?>
</p>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'editpage'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>