<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:05
         compiled from categoriestree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'object', 'categoriestree.tpl', 2, false),array('function', 'button', 'categoriestree.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['treebox']->object->items): ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['treebox']), $this);?>

<?php else: ?>
<div class="box">Нет категорий</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddcatform(-1,-1,-1)"), $this);?>

</td>
</tr>
</table>
<script type="text/javascript">tc_sortable();</script>