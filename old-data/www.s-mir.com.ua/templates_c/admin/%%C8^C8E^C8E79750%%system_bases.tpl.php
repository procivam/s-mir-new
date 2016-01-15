<?php /* Smarty version 2.6.26, created on 2016-01-08 13:50:21
         compiled from system_bases.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editbox', 'system_bases.tpl', 7, false),array('function', 'submit', 'system_bases.tpl', 8, false),array('function', 'hidden', 'system_bases.tpl', 10, false),array('function', 'cycle', 'system_bases.tpl', 47, false),array('function', 'button', 'system_bases.tpl', 64, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h3>Главная база данных:</h3>
<div class="box">
<form method="post">
<h3 style="float:right">
Лимит сайтов на одну БД:&nbsp;&nbsp;<?php echo smarty_function_editbox(array('name' => 'bdlimit','width' => '30','text' => $this->_tpl_vars['options']['bdlimit']), $this);?>

<?php echo smarty_function_submit(array('caption' => "Сохранить"), $this);?>

</h3>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => 'system'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => 'bases'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'save'), $this);?>

</form>
<table>
<tr><td>Хост / Название:</td><td><b><?php echo $this->_tpl_vars['mainbase']['name']; ?>
</b></td></tr>
<tr><td>Сайты:</td><td><b><?php echo $this->_tpl_vars['mainbase']['sites']; ?>
</b></td></tr>
<tr><td>Таблицы:</td><td><b><?php echo $this->_tpl_vars['mainbase']['tables']; ?>
</b></td></tr>
<tr><td>Размер:</td><td><b><?php echo $this->_tpl_vars['mainbase']['size']; ?>
</b></td></tr>
</table>
</div>

<?php if ($this->_tpl_vars['errors']['doublebase']): ?>
<div class="warning">Указанная база уже добавлена!</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['errors']['noconnect']): ?>
<div class="warning">Ошибка подключения к БД: <?php echo $this->_tpl_vars['errors']['noconnect']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['errors']['existssites']): ?>
<div class="warning">На выбранной базе установлены сайты, нельзя удалить.</div>
<?php endif; ?>

<h3>Дополнительные базы данных:</h3>
<?php if ($this->_tpl_vars['bases']): ?>
<table class="grid">
<tr>
<th align="left">Хост / Название</th>
<th align="left" width="80">Сайты</th>
<th align="left" width="80">Таблицы</th>
<th align="left" width="80">Размер</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['bases']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['bases'][$this->_sections['i']['index']]['close']): ?>
<tr class="close">
<?php else: ?>
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<?php endif; ?>
<td><a href="javascript:geteditbaseform(<?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['name']; ?>
</a></td>
<td width="80"><?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['sites']; ?>
</td>
<td width="80"><?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['tables']; ?>
</td>
<td width="80"><?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['size']; ?>
</td>
<td width="20"><a href="javascript:delbase(<?php echo $this->_tpl_vars['bases'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php else: ?>
<div class="box">Нет дополнительных баз данных.</div>
<?php endif; ?>

<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddbaseform()"), $this);?>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>