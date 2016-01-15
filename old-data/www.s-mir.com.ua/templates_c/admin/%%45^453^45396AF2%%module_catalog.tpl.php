<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:08
         compiled from module_catalog.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'module_catalog.tpl', 5, false),array('function', 'object', 'module_catalog.tpl', 19, false),array('function', 'treeselect', 'module_catalog.tpl', 26, false),array('function', 'help', 'module_catalog.tpl', 37, false),array('function', 'image', 'module_catalog.tpl', 54, false),array('function', 'download', 'module_catalog.tpl', 66, false),array('function', 'hidden', 'module_catalog.tpl', 92, false),array('function', 'button', 'module_catalog.tpl', 143, false),array('block', 'tabpage', 'module_catalog.tpl', 18, false),array('modifier', 'date_format', 'module_catalog.tpl', 38, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['options']['usecats']): ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'comm' => "Комментарии",'opt' => "Настройки"), $this);?>

<?php else: ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'opt' => "Настройки"), $this);?>

<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?>
<?php echo smarty_function_tabcontrol(array('items' => "Записи",'comm' => "Комментарии",'opt' => "Настройки"), $this);?>

<?php else: ?>
<?php echo smarty_function_tabcontrol(array('items' => "Записи",'opt' => "Настройки"), $this);?>

<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['options']['usecats']): ?>
<?php $this->_tag_stack[] = array('tabpage', array('id' => 'cat')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['treebox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'items')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['options']['usecats']): ?>
<div class="actionbox">
<form><?php echo smarty_function_treeselect(array('id' => 'artidcat','name' => 'idcat','items' => $this->_tpl_vars['categories'],'selected' => $_GET['idcat'],'emptytxt' => "Все категории",'title' => "Выбор категории",'onchange' => "runselectcat(this.form)",'width' => '320px'), $this);?>
</form>
</div>
<?php endif; ?>
<div id="itemsbox">
<?php if ($this->_tpl_vars['items']): ?>
<form name="itemsform" method="post">
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
<tr class="<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['active'] == 'Y'): ?>row0<?php else: ?>close<?php endif; ?>">
<td width="20"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><input id="check<?php echo $this->_sections['i']['index']; ?>
" type="checkbox" name="checkitem[]" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
"><input type="hidden" name="edititem[]" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><a href="javascript:getedititemform(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><b><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</b></a></td>
<?php if ($this->_tpl_vars['options']['usecats'] && ( ! $_GET['idcat'] || $this->_tpl_vars['childcats'] > 1 )): ?><td align="right" nowrap class="gray<?php if ($this->_sections['i']['first']): ?> first<?php endif; ?>"><span<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['catpath'] != $this->_tpl_vars['items'][$this->_sections['i']['index']]['category']): ?> <?php echo smarty_function_help(array('text' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['catpath']), $this);?>
<?php endif; ?>><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['category']; ?>
</span></td><?php endif; ?>
<td width="120" align="right" nowrap<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D %T") : smarty_modifier_date_format($_tmp, "%D %T")); ?>
</td>
<?php if ($this->_tpl_vars['sort'] == 'sort'): ?><td width="40"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><input type="text" name="sort_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" size="4" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['sort']; ?>
" style="width:35px"></td><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usevote']): ?><td width="60"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><img src="/templates/admin/images/star.gif" width="16" height="16" alt="Оценка" style="vertical-align:middle">&nbsp;<input type="text" name="vote_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" size="2" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['vote']; ?>
" style="width:35px"></td><?php endif; ?>
<td width="25" align="center"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
" target="_blank" title="Просмотр на сайте"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр на сайте"></a></td>
<?php if ($this->_tpl_vars['seo']): ?><td width="25" align="center"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><a href="javascript:geturlseoform('<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?><td width="25"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><a href="admin.php?mode=sections&item=<?php echo $this->_tpl_vars['system']['item']; ?>
<?php if ($_GET['idcat']): ?>&idcat=<?php echo $_GET['idcat']; ?>
<?php endif; ?>&tab=comm&iditemcomm=<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
<?php if ($_GET['page']): ?>&page=<?php echo $_GET['page']; ?>
<?php endif; ?>" title="Комментарии (<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['comments']; ?>
)"><img src="/templates/admin/images/comments.gif" width="16" height="16" alt="Комментарии (<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['comments']; ?>
)"></a></td><?php endif; ?>
<td width="25" align="center"<?php if ($this->_sections['i']['first']): ?> class="first"<?php endif; ?>><a href="javascript:delitem(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
<tr>
<?php $this->assign('colspan', 5); ?>
<?php if ($this->_tpl_vars['options']['usecats'] && ( ! $_GET['idcat'] || $this->_tpl_vars['childcats'] > 1 )): ?><?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?><?php endif; ?>
<?php if ($this->_tpl_vars['seo']): ?><?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?><?php endif; ?>
<?php if ($this->_tpl_vars['sort'] == 'sort'): ?><?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usevote']): ?><?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?><?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?><?php endif; ?>
<td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
">
<?php if ($this->_tpl_vars['options']['useimages']): ?><?php echo smarty_function_image(array('id' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['idimg'],'style' => "float:left;margin-right:5px;",'width' => 80,'height' => 50,'popup' => true), $this);?>
<?php endif; ?>
<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['description']; ?>

<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['tags'] || ( $this->_tpl_vars['options']['usefiles'] && $this->_tpl_vars['items'][$this->_sections['i']['index']]['idfile'] > 0 )): ?>
<div class="clear"></div>
<div class="box">
<div class="clear"></div>
<div style="float:left">
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
<div style="float:right">
<?php if ($this->_tpl_vars['options']['usefiles']): ?><?php echo smarty_function_download(array('data' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['files'],'title' => "Скачать",'size' => true,'dwnl' => true,'max' => 3), $this);?>
<?php endif; ?>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['items_pager']), $this);?>

<?php else: ?>
<div class="box">Нет данных.</div>
<?php endif; ?>
<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['items']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="save">-</option>
<option value="setactive">Включить</option>
<option value="setunactive">Отключить</option>
<?php if ($this->_tpl_vars['options']['usecats']): ?><option value="move">Переместить</option><?php endif; ?>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

</form>
</td>
<td nowrap>
<form name="sortform" method="post">
Сортировать по:
<select name="sort" onchange="this.form.submit()">
<option value="date DESC">дате вверх</option>
<option value="date">дате вниз</option>
<option value="name">названию вниз</option>
<option value="name DESC">названию вверх</option>
<?php if ($this->_tpl_vars['options']['usevote']): ?>
<option value="vote">оценке вниз</option>
<option value="vote DESC">оценке вверх</option>
<?php endif; ?>
<?php if ($this->_tpl_vars['options']['usecoments']): ?>
<option value="comments">комментариям вниз</option>
<option value="comments DESC">комментариям вверх</option>
<?php endif; ?>
<option value="sort">заданному порядку</option>
</select>
<script type="text/javascript">document.forms.sortform.sort.value='<?php echo $this->_tpl_vars['sort']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setsort'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

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
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setrows'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

</form>
</td>
<?php endif; ?>
<td width="60%" align="right">
<?php echo smarty_function_button(array('caption' => "Фильтр",'onclick' => "getfilterform()"), $this);?>

<?php if ($this->_tpl_vars['sort'] == 'sort' || $this->_tpl_vars['options']['usevote']): ?>
<?php echo smarty_function_button(array('caption' => "Сохранить",'onclick' => "document.forms.itemsform.submit()"), $this);?>

<?php endif; ?>
<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getadditemform()"), $this);?>

</td>
</tr>
</table>
</div>
<div id="filterbox"></div>
<?php if ($this->_tpl_vars['filter']): ?><script type="text/javascript">getfilterform()</script><?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['options']['usecomments']): ?>
<?php $this->_tag_stack[] = array('tabpage', array('id' => 'comm')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['commbox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'opt')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_tabcontrol(array('id' => 'opt','opt2' => "Опции",'fields' => "Редактор&nbsp;полей"), $this);?>

<?php $this->_tag_stack[] = array('tabpage', array('idtab' => 'opt','id' => 'opt2')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox1']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox2']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox3']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox4']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_tag_stack[] = array('tabpage', array('idtab' => 'opt','id' => 'fields')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['fieldsbox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>