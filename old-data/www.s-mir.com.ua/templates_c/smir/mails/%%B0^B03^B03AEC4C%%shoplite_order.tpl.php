<?php /* Smarty version 2.6.26, created on 2015-11-17 13:30:12
         compiled from shoplite_order.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'shoplite_order.tpl', 2, false),)), $this); ?>
<?php echo $this->_tpl_vars['site_name']; ?>
 - Заказ.
Ф.И.О.:  <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

Контактный телефон:  <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

Е-mail: <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

Адрес доставки: <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

Комментарий к заказу: <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['comments'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>


Информация о заказе:
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['basket']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_sections['i']['iteration']; ?>
. <?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['data']['name']; ?>
 - <?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['count']; ?>
 шт. <?php echo $this->_tpl_vars['basket'][$this->_sections['i']['index']]['sum']; ?>
 <?php echo $this->_tpl_vars['valute']; ?>

<?php endfor; endif; ?>

Общая сумма заказа: <?php echo $this->_tpl_vars['all']['sum']; ?>
 <?php echo $this->_tpl_vars['valute']; ?>


<?php if ($this->_tpl_vars['courier']): ?>
Доставка: <?php echo $this->_tpl_vars['courier']['fullname']; ?>

<?php endif; ?>