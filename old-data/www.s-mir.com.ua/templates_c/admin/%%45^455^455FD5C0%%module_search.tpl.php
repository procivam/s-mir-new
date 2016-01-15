<?php /* Smarty version 2.6.26, created on 2015-12-13 17:19:23
         compiled from module_search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'module_search.tpl', 3, false),array('function', 'hidden', 'module_search.tpl', 10, false),array('function', 'editbox', 'module_search.tpl', 12, false),array('function', 'html_options', 'module_search.tpl', 15, false),array('function', 'submit', 'module_search.tpl', 17, false),array('function', 'button', 'module_search.tpl', 24, false),array('function', 'image', 'module_search.tpl', 50, false),array('function', 'object', 'module_search.tpl', 64, false),array('block', 'tabpage', 'module_search.tpl', 5, false),array('modifier', 'date_format', 'module_search.tpl', 22, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_tabcontrol(array('search' => "Поиск",'opt' => "Настройки"), $this);?>


<?php $this->_tag_stack[] = array('tabpage', array('id' => 'search')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<table class="actiongrid">
<tr>
<td>
<form method="get">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_editbox(array('name' => 'query','width' => '200','text' => $_GET['query']), $this);?>

<select name="idsec">
<option value="0">Все разделы</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['sections'],'selected' => $_GET['idsec']), $this);?>

</select>
<?php echo smarty_function_submit(array('caption' => "Искать"), $this);?>

</form>
</td>
<td width="170" align="right">Доступно материалов: <b><?php echo $this->_tpl_vars['indexall']; ?>
</b></td>
<?php if ($this->_tpl_vars['indexdate']): ?>
<td width="210" align="right">Дата обновления: <b><?php echo ((is_array($_tmp=$this->_tpl_vars['indexdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
</b></td>
<?php endif; ?>
<td width="125" align="right"><?php echo smarty_function_button(array('caption' => "Проиндексировать",'onclick' => "getindexform()"), $this);?>
</td>
</tr>
</table>

<?php if ($this->_tpl_vars['tags']): ?>
<div class="box">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['tags']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['tags'][$this->_sections['i']['index']]['tag'] == $_GET['tag']): ?>
<b style="font-size:<?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['cluster']*10+100; ?>
%"><?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['tag']; ?>
(<?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['count']; ?>
)</b> 
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['link']; ?>
" style="font-size:<?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['cluster']*10+100; ?>
%"><?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['tag']; ?>
(<?php echo $this->_tpl_vars['tags'][$this->_sections['i']['index']]['count']; ?>
)</a> 
<?php endif; ?>
<?php endfor; endif; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['items']): ?>
<table width="100%" class="gridfix">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr class="row0">
<td>
<b><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['num']; ?>
.</b>
<a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</a></td>
</tr>
<tr class="row1">
<td>
<?php echo smarty_function_image(array('id' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['idimg'],'style' => "float:left;margin-right:5px;",'width' => 80,'height' => 50,'popup' => true), $this);?>

<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>

<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['tags']): ?>
<div class="clear"></div>
<div class="box" align="left">
<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['items'][$this->_sections['i']['index']]['tags']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
<a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['tags'][$this->_sections['j']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['tags'][$this->_sections['j']['index']]['name']; ?>
</a><?php if (! $this->_sections['j']['last']): ?>, <?php endif; ?>
<?php endfor; endif; ?>
</div>
<?php endif; ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['items_pager']), $this);?>

<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'opt')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 