<?php /* Smarty version 2.6.26, created on 2015-10-22 16:39:19
         compiled from plugin_banners.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'plugin_banners.tpl', 4, false),array('function', 'cycle', 'plugin_banners.tpl', 21, false),array('function', 'button', 'plugin_banners.tpl', 38, false),array('function', 'object', 'plugin_banners.tpl', 99, false),array('function', 'hidden', 'plugin_banners.tpl', 115, false),array('block', 'tabpage', 'plugin_banners.tpl', 9, false),array('modifier', 'date_format', 'plugin_banners.tpl', 60, false),array('modifier', 'escape', 'plugin_banners.tpl', 76, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['category']): ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'banners' => "Баннеры"), $this);?>

<?php else: ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории"), $this);?>

<?php endif; ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'cat')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['categories']): ?>
<table class="grid gridsort">
<tr>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="categoriesbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="cat_<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td><a href="admin.php?mode=<?php echo $this->_tpl_vars['system']['mode']; ?>
&item=<?php echo $this->_tpl_vars['system']['item']; ?>
&tab=banners&idcat=<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['id']; ?>
" title="Выбрать"><?php if ($this->_tpl_vars['categories'][$this->_sections['i']['index']]['selected']): ?><b><?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['name']; ?>
 (<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['count']; ?>
)</b><?php else: ?><?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['name']; ?>
 (<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['count']; ?>
)<?php endif; ?></a></td>
<td width="20"><a href="javascript:geteditcatform(<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><img src="/templates/admin/images/edit.gif" width="16" height="16" alt="Редактировать"></a></td>
<td width="20"><a href="javascript:delcat(<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'categoriesbox\',{tag:\'table\',onUpdate: setcategorysort});
</script>'; ?>

<?php else: ?>
<div class="box">Нет категорий.</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddcatform()"), $this);?>

</td>
</tr>
</table>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['category']): ?>
<?php $this->_tag_stack[] = array('tabpage', array('id' => 'banners')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div>
<table class="grid gridsort">
<tr><th align="left"><?php echo $this->_tpl_vars['category']['name']; ?>
:</th></tr>
</table>
<?php if ($this->_tpl_vars['banners']): ?>
<form name="bannersform" method="post">
<div id="bannersbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['banners']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="banner_<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['id']; ?>
" width="100%" class="grid gridsort">
<?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['close']): ?><tr class="close"><?php else: ?><tr class="row0"><?php endif; ?>
<td><input id="check<?php echo $this->_sections['i']['index']; ?>
" type="checkbox" name="checkban[]" value="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['id']; ?>
">&nbsp;<a href="javascript:geteditbannerform(<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><b><?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['name']; ?>
</b></a><?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['width'] && $this->_tpl_vars['banners'][$this->_sections['i']['index']]['height']): ?> (<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['width']; ?>
X<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['height']; ?>
)<?php endif; ?></td>
<td align="right" nowrap>
<div class="gray">
<?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['date'] == 'Y'): ?>
Период показа с <?php echo ((is_array($_tmp=$this->_tpl_vars['banners'][$this->_sections['i']['index']]['date1'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
 по <?php echo ((is_array($_tmp=$this->_tpl_vars['banners'][$this->_sections['i']['index']]['date2'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
 |
<?php endif; ?>
Показов: <b><?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['views']; ?>
</b><?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['type'] != 'flash' || $this->_tpl_vars['banners'][$this->_sections['i']['index']]['clicks']): ?> | Кликов: <b><?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['clicks']; ?>
<?php endif; ?></b>
</div>
</td>
<td width="20" align="center" valign="top"><a href="javascript:delbanner(<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
<tr class="row1">
<td colspan="3">
<?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['filepath']): ?>
<?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['type'] == 'image'): ?>
<img src="/<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['filepath']; ?>
" width="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['width']; ?>
" height="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['height']; ?>
" style="float:left;margin-right:5px;">
<?php elseif ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['type'] == 'flash'): ?>
<embed src="/<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['filepath']; ?>
" width="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['width']; ?>
" height="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['height']; ?>
" quality="high" type="application/x-shockwave-flash" pluginspace="http://www.macromedia.com/go/getflashplayer" style="float:left;margin-right:5px;">
<?php endif; ?>
<?php endif; ?>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['banners'][$this->_sections['i']['index']]['text'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
<?php if ($this->_tpl_vars['banners'][$this->_sections['i']['index']]['url']): ?>
<table class="invisiblegrid">
<tr>
<td colspan="2">
<tr>
<td>Целевой URL:</td>
<td><a href="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['url']; ?>
</a></td>
</tr>
<tr>
<td>Служебный URL:</td>
<td><a href="<?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['banners'][$this->_sections['i']['index']]['link']; ?>
</a></td>
</tr>
</table>
<?php endif; ?>
</td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php if ($this->_tpl_vars['sort'] == 'sort'): ?><?php echo '<script type="text/javascript">
Sortable.create(\'bannersbox\',{tag:\'table\',onUpdate: setbannersort});
</script>'; ?>
<?php endif; ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['banners_pager']), $this);?>

<?php else: ?>
<div class="box">Нет баннеров в категории.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['banners']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="seton">Включить</option>
<option value="setoff">Выключить</option>
<option value="reset">Сбросить статистику</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'banners'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'idcat','value' => $this->_tpl_vars['category']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<td nowrap>
<form name="sortform" method="post">
Сортировать по:
<select name="sort" onchange="this.form.submit()">
<option value="sort">заданному порядку</option>
<option value="views">показам вниз</option>
<option value="views DESC">показам вверх</option>
<option value="clicks">кликам вниз</option>
<option value="clicks DESC">кликам вверх</option>
</select>
<script type="text/javascript">document.forms.sortform.sort.value='<?php echo $this->_tpl_vars['sort']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'banners'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'idcat','value' => $this->_tpl_vars['category']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setsort'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<td nowrap>
<form name="rowsform" method="post">
На странице:
<select name="rows" onchange="this.form.submit()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="0">Все</option>
</select>
<script type="text/javascript">document.forms.rowsform.rows.value='<?php echo $this->_tpl_vars['rows']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'banners'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'idcat','value' => $this->_tpl_vars['category']['id']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setrows'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<?php endif; ?>
<td align="right" width="80%">
<input type="button" class="button" value="Добавить" onclick="getaddbannerform(<?php echo $this->_tpl_vars['category']['id']; ?>
)" style="width:120px">
</td>
</tr>
</table>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>