<?php /* Smarty version 2.6.26, created on 2015-12-13 17:33:59
         compiled from block_search_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'hidden', 'block_search_edit.tpl', 1, false),array('function', 'editbox', 'block_search_edit.tpl', 4, false),)), $this); ?>
<?php echo smarty_function_hidden(array('name' => 'b_idsec','value' => $this->_tpl_vars['form']['idsec']), $this);?>

<?php if ($this->_tpl_vars['auth']->isExpert()): ?>
<p>Шаблон:</p>
<p><?php echo smarty_function_editbox(array('name' => 'b_template','text' => $this->_tpl_vars['form']['template'],'max' => 50,'width' => "20%"), $this);?>
</p>
<?php else: ?>
<?php echo smarty_function_hidden(array('name' => 'b_template','value' => $this->_tpl_vars['form']['template']), $this);?>

<?php endif; ?>