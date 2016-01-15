<?php /* Smarty version 2.6.26, created on 2015-12-18 14:19:46
         compiled from plugin_seo_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'plugin_seo_edit.tpl', 3, false),array('function', 'textarea', 'plugin_seo_edit.tpl', 7, false),array('function', 'hidden', 'plugin_seo_edit.tpl', 12, false),array('function', 'submit', 'plugin_seo_edit.tpl', 21, false),array('function', 'button', 'plugin_seo_edit.tpl', 22, false),)), $this); ?>
<form name="editform" method="post" onsubmit="return seo_form(this)">
<p>URL:<sup style="color:gray">*</sup></p>
<p><?php echo smarty_function_editbox(array('name' => 'url','text' => $this->_tpl_vars['form']['url']), $this);?>
</p>
<p>title:</p>
<p><?php echo smarty_function_editbox(array('name' => 'title','text' => $this->_tpl_vars['form']['title']), $this);?>
</p>
<p>keywords:</p>
<p><?php echo smarty_function_textarea(array('name' => 'keywords','rows' => 4,'text' => $this->_tpl_vars['form']['keywords']), $this);?>
</p>
<p>description:</p>
<p><?php echo smarty_function_textarea(array('name' => 'description','rows' => 4,'text' => $this->_tpl_vars['form']['description']), $this);?>
</p>
<p>Перенаправление (301):</p>
<p><?php echo smarty_function_editbox(array('name' => 'move','text' => $this->_tpl_vars['form']['move']), $this);?>
</p>
<?php echo smarty_function_hidden(array('name' => 'id','value' => $this->_tpl_vars['form']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'edit'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="notfound"<?php if ($this->_tpl_vars['form']['notfound'] == 'Y'): ?> checked<?php endif; ?>>&nbsp;Страница удалена (404)</label>
</p>
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>