<?php /* Smarty version 2.6.26, created on 2016-01-04 14:10:16
         compiled from objcomp_categoriestree_move.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'treeselect', 'objcomp_categoriestree_move.tpl', 4, false),array('function', 'hidden', 'objcomp_categoriestree_move.tpl', 10, false),array('function', 'submit', 'objcomp_categoriestree_move.tpl', 15, false),array('function', 'button', 'objcomp_categoriestree_move.tpl', 16, false),)), $this); ?>
<form name="movecatform" method="post" onsubmit="return movecat(this)">
<p>Куда:</p>
<?php if ($this->_tpl_vars['form']['idker'] > 0): ?>
<p><?php echo smarty_function_treeselect(array('name' => 'idto','selected' => -1,'items' => $this->_tpl_vars['form']['categories'],'emptytxt' => "Корень",'title' => "Выбор категории"), $this);?>
</p>
<?php else: ?>
<p><?php echo smarty_function_treeselect(array('name' => 'idto','selected' => -1,'items' => $this->_tpl_vars['form']['categories'],'emptytxt' => "",'title' => "Выбор категории"), $this);?>
</p>
<?php endif; ?>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['id']; ?>
">
<input type="hidden" name="tab" value="cat">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'obj_action','value' => 'ct_move'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<div align="right" style="margin-top:10px">
<?php echo smarty_function_submit(array('caption' => 'OK'), $this);?>

<?php echo smarty_function_button(array('caption' => "Отмена",'onclick' => "Windows.closeAll()"), $this);?>

</div>
</form>