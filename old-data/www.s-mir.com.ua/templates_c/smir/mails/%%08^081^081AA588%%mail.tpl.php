<?php /* Smarty version 2.6.26, created on 2015-11-17 13:09:20
         compiled from mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mail.tpl', 7, false),array('modifier', 'nl2br', 'mail.tpl', 7, false),)), $this); ?>
<?php echo $this->_tpl_vars['site_name']; ?>
 - <?php echo $this->_tpl_vars['section_name']; ?>
.
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
<?php if ($this->_tpl_vars['field']['type'] == 'bool'): ?>
<b><?php echo $this->_tpl_vars['field']['name']; ?>
</b>:<?php if ($this->_tpl_vars['field']['value'] == 'Y'): ?>Да<?php else: ?>Нет<?php endif; ?><br>
<?php elseif ($this->_tpl_vars['field']['type'] == 'text'): ?>
<b><?php echo $this->_tpl_vars['field']['name']; ?>
</b>:<br>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['field']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br>
<?php elseif ($this->_tpl_vars['field']['type'] != 'file'): ?>
<b><?php echo $this->_tpl_vars['field']['name']; ?>
</b>: <?php echo ((is_array($_tmp=$this->_tpl_vars['field']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>