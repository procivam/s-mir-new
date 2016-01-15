<?php /* Smarty version 2.6.26, created on 2015-10-22 16:34:45
         compiled from block_html_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fckeditor', 'block_html_edit.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_fckeditor(array('name' => 'b_content','height' => 250,'toolbar' => 'Medium','text' => $this->_tpl_vars['form']['content']), $this);?>