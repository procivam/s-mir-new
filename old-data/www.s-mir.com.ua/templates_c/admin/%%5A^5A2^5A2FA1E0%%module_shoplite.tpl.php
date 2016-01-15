<?php /* Smarty version 2.6.26, created on 2015-10-22 16:40:05
         compiled from module_shoplite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'tabcontrol', 'module_shoplite.tpl', 9, false),array('function', 'object', 'module_shoplite.tpl', 22, false),array('function', 'treeselect', 'module_shoplite.tpl', 27, false),array('function', 'cycle', 'module_shoplite.tpl', 51, false),array('function', 'image', 'module_shoplite.tpl', 53, false),array('function', 'popup', 'module_shoplite.tpl', 53, false),array('function', 'help', 'module_shoplite.tpl', 58, false),array('function', 'hidden', 'module_shoplite.tpl', 94, false),array('function', 'button', 'module_shoplite.tpl', 150, false),array('function', 'dateselect', 'module_shoplite.tpl', 177, false),array('function', 'editbox', 'module_shoplite.tpl', 178, false),array('function', 'html_options', 'module_shoplite.tpl', 187, false),array('function', 'submit', 'module_shoplite.tpl', 190, false),array('block', 'tabpage', 'module_shoplite.tpl', 21, false),array('modifier', 'round', 'module_shoplite.tpl', 60, false),array('modifier', 'date_format', 'module_shoplite.tpl', 214, false),array('modifier', 'number', 'module_shoplite.tpl', 217, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['errors']['doubleart']): ?>
<div class="warning">Товар с указанным артикулом уже существует в каталоге!</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['options']['usecomments']): ?>
<?php if ($this->_tpl_vars['options']['useorder']): ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'comm' => "Комментарии",'orders' => "Заказы",'import' => "Импорт/Экспорт",'opt' => "Настройки"), $this);?>

<?php else: ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'comm' => "Комментарии",'import' => "Импорт/Экспорт",'opt' => "Настройки"), $this);?>

<?php endif; ?>
<?php else: ?>
<?php if ($this->_tpl_vars['options']['useorder']): ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'orders' => "Заказы",'import' => "Импорт/Экспорт",'opt' => "Настройки"), $this);?>

<?php else: ?>
<?php echo smarty_function_tabcontrol(array('cat' => "Категории",'items' => "Записи",'import' => "Импорт/Экспорт",'opt' => "Настройки"), $this);?>

<?php endif; ?>
<?php endif; ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'cat')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['treebox']), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'items')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div class="actionbox">
<form><?php echo smarty_function_treeselect(array('id' => 'shopidcat','name' => 'idcat','items' => $this->_tpl_vars['categories'],'selected' => $_GET['idcat'],'emptytxt' => "Все категории",'title' => "Выбор категории",'onchange' => "runselectcat(this.form)",'width' => '320px'), $this);?>
</form>
</div>

<div id="itemssgridbox">
<?php if ($this->_tpl_vars['items']): ?>
<form name="itemsform" method="post">
<table width="100%" class="gridfix">
<tr>
<th width="25">&nbsp;</th>
<?php if ($this->_tpl_vars['options']['useimages']): ?><th width="20">&nbsp;</th><?php endif; ?>
<th align="left">Название</th>
<?php if (! $_GET['idcat'] || $this->_tpl_vars['childcats'] > 1): ?><th align="left">Категория</th><?php endif; ?>
<th width="100" align="left">Артикул</th>
<th width="110" align="left">Цена</th>
<?php if ($this->_tpl_vars['options']['onlyavailable']): ?><th width="50" align="left">Колич.</th><?php endif; ?>
<?php if ($this->_tpl_vars['sort'] == 'sort'): ?><th width="50" align="left">Поряд.</th><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usevote']): ?><th align="left" width="40">Оцен.</th><?php endif; ?>
<th width="25">&nbsp;</th>
<?php if ($this->_tpl_vars['seo']): ?><th width="25">&nbsp;</th><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?><th width="25">&nbsp;</th><?php endif; ?>
<th width="25">&nbsp;</th>
<th width="25">&nbsp;</th>
</tr>
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
<tr class="<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['active'] == 'Y'): ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php else: ?>close<?php endif; ?>">
<td width="25"><input id="check<?php echo $this->_sections['i']['index']; ?>
" type="checkbox" name="checkitem[]" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
"><input type="hidden" name="edititem[]" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
"></td>
<?php if ($this->_tpl_vars['options']['useimages']): ?><td width="20"><?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['idimg']): ?><?php ob_start(); ?><?php echo smarty_function_image(array('id' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['idimg'],'width' => 150), $this);?>
<?php $this->_smarty_vars['capture']['gimage'] = ob_get_contents(); ob_end_clean(); ?><img src="/templates/admin/images/image.gif" width="16" height="16" <?php echo smarty_function_popup(array('text' => $this->_smarty_vars['capture']['gimage'],'fgcolor' => "#F3FCFF",'width' => 150,'bgcolor' => "#86BECD",'left' => true), $this);?>
><?php else: ?>&nbsp;<?php endif; ?></td><?php endif; ?>
<td><a href="javascript:getedititemform(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Редактировать"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['name']; ?>
</a>
<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['favorite'] == 'Y'): ?>&nbsp;<img src="/templates/admin/images/star.gif" width="16" height="16" alt="Лидер"><?php endif; ?>
<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['new'] == 'Y'): ?>&nbsp;<img src="/templates/admin/images/new.gif" width="16" height="16" alt="Новинка"><?php endif; ?>
</td>
<?php if (! $_GET['idcat'] || $this->_tpl_vars['childcats'] > 1): ?><td class="gray"><span<?php if ($this->_tpl_vars['items'][$this->_sections['i']['index']]['catpath'] != $this->_tpl_vars['items'][$this->_sections['i']['index']]['category']): ?> <?php echo smarty_function_help(array('text' => $this->_tpl_vars['items'][$this->_sections['i']['index']]['catpath'],'width' => 450), $this);?>
<?php endif; ?>><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['category']; ?>
</span></td><?php endif; ?>
<td width="100"><?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['art']; ?>
</td>
<td align="left" width="110" nowrap><nobr><input type="text" name="price_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" style="width:80px" size="8" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['i']['index']]['price'])) ? $this->_run_mod_handler('round', true, $_tmp, 2) : round($_tmp, 2)); ?>
"><span class="gray">&nbsp;<?php echo $this->_tpl_vars['options']['valute']; ?>
</span></nobr></td>
<?php if ($this->_tpl_vars['options']['onlyavailable']): ?><td align="left" width="50" nowrap><input type="text" name="iscount_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" size="4" style="width:40px" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['iscount']; ?>
"></td><?php endif; ?>
<?php if ($this->_tpl_vars['sort'] == 'sort'): ?><td align="left" width="50"><input type="text" name="sort_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" size="4" style="width:40px" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['sort']; ?>
"></td><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usevote']): ?><td width="40"><input type="text" name="vote_<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
" size="4" style="width:30px" value="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['vote']; ?>
"></td><?php endif; ?>
<td width="25" align="center"><a href="<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
" target="_blank" title="Просмотр на сайте"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр на сайте"></a></td>
<?php if ($this->_tpl_vars['seo']): ?><td width="25" align="center"><a href="javascript:geturlseoform('<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['link']; ?>
')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td><?php endif; ?>
<?php if ($this->_tpl_vars['options']['usecomments']): ?><td width="25" align="center"><a href="admin.php?mode=sections&item=<?php echo $this->_tpl_vars['system']['item']; ?>
<?php if ($_GET['idcat']): ?>&idcat=<?php echo $_GET['idcat']; ?>
<?php endif; ?>&tab=comm&iditemcomm=<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
<?php if ($_GET['page']): ?>&page=<?php echo $_GET['page']; ?>
<?php endif; ?>" title="Комментарии (<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['comments']; ?>
)"><img src="/templates/admin/images/comments.gif" alt="Комментарии (<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['comments']; ?>
)" width="16" height="16"></a></td><?php endif; ?>
<td width="25" align="center"><a href="javascript:gettiesform(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Сопутствующие"><img src="/templates/admin/images/links.gif" width="16" height="16" alt="Сопутствующие"></a></td>
<td width="25" align="center"><a href="javascript:delitem(<?php echo $this->_tpl_vars['items'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['items_pager']), $this);?>

<?php else: ?>
<div class="box">Не найдены товары.</div>
<?php endif; ?>

<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['items']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;:&nbsp;</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)" style="width:120px">
<option value="save">-</option>
<option value="setactive">Включить</option>
<option value="setunactive">Отключить</option>
<option value="move">Переместить</option>
<option value="copy">Копировать</option>
<option value="setfavorite">Установить спецпредложение</option>
<option value="unfavorite">Снять спецпредложение</option>
<option value="setnew">Установить новинку</option>
<option value="unnew">Снять новинку</option>
<option value="delete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

</form>
</td>
<td nowrap>
<form name="sortform" method="post">
 по
<select name="sort" onchange="this.form.submit()">
<option value="date DESC">дате вверх</option>
<option value="date">дате вниз</option>
<option value="name">названию вниз</option>
<option value="name DESC">названию вверх</option>
<option value="price">цене вниз</option>
<option value="price DESC">цене вверх</option>
<option value="iscount">количеству вниз</option>
<option value="iscount DESC">количеству вверх</option>
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

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

</form>
</td>
<td nowrap>
<form name="rowsform" method="post">
строк:
<select name="rows" onchange="this.form.submit()">
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="0">Все</option>
</select>
<script type="text/javascript">document.forms.rowsform.rows.value='<?php echo $this->_tpl_vars['rows']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'items'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setrows'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

</form>
</td>
<?php endif; ?>
<td align="right" width="80%">
<?php if ($this->_tpl_vars['items']): ?>
<?php echo smarty_function_button(array('caption' => "Фильтр",'onclick' => "getfilterform()"), $this);?>

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

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'orders')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<table class="actiongrid">
<tr>
<td>
<form name="statdateform" method="get">
<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<input type="checkbox" name="date"<?php if ($_GET['date']): ?> checked<?php endif; ?>>
с &nbsp;<?php echo smarty_function_dateselect(array('name' => 'from','date' => $_GET['from'],'onchange' => "this.form.date.checked=true"), $this);?>
&nbsp;по&nbsp;<?php echo smarty_function_dateselect(array('name' => 'to','date' => $_GET['to'],'maxtime' => true,'onchange' => "this.form.date.checked=true"), $this);?>

&nbsp;сумма от <?php echo smarty_function_editbox(array('name' => 'sum1','width' => '60px','text' => $_GET['sum1']), $this);?>
 до <?php echo smarty_function_editbox(array('name' => 'sum2','width' => '60px','text' => $_GET['sum2']), $this);?>

&nbsp;<select name="status">
<option value="-1">-</option>
<option value="0"<?php if (isset ( $_GET['status'] ) && $_GET['status'] == 0): ?> selected<?php endif; ?>>Не обработано</option>
<option value="1"<?php if ($_GET['status'] == 1): ?> selected<?php endif; ?>>Оплачено</option>
<option value="2"<?php if ($_GET['status'] == 2): ?> selected<?php endif; ?>>Отправлено</option>
</select>
&nbsp;<select name="pay">
<option value="-1">-</option>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['pays'],'selected' => $_GET['pay']), $this);?>

</select>
<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'orders'), $this);?>

<?php echo smarty_function_submit(array('caption' => "Фильтр",'width' => '80'), $this);?>

<?php echo smarty_function_button(array('caption' => "Сбросить",'width' => '80','onclick' => "document.location='admin.php?mode=sections&item='+ITEM+'&tab=orders'"), $this);?>

</form>
</td>
</tr>
</table>
<?php if ($this->_tpl_vars['orders']): ?>
<form name="ordersform" method="post">
<table width="100%" class="gridfix">
<tr>
<th width="25">&nbsp;</th>
<th align="left" width="40">№</th>
<th width="120" align="left">Дата</th>
<th align="left">Сообщение</th>
<th align="left" width="80">Колич.</th>
<th align="left" width="120">Сумма</th>
<th align="left" width="120">Статус</th>
<th align="left">Способ оплаты</th>
<th width="20">&nbsp;</th>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['orders']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr class="<?php if ($this->_tpl_vars['orders'][$this->_sections['i']['index']]['status'] == 1): ?>group2<?php elseif ($this->_tpl_vars['orders'][$this->_sections['i']['index']]['status'] == 2): ?>group1<?php else: ?><?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
<?php endif; ?>">
<td width="25"><input id="ocheck<?php echo $this->_sections['i']['index']; ?>
" type="checkbox" name="checkorder[]" value="<?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['id']; ?>
"></td>
<td width="40"><?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['id']; ?>
</td>
<td width="120" nowrap><?php echo ((is_array($_tmp=$this->_tpl_vars['orders'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %T") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %T")); ?>
</td>
<td><a href="javascript:getorderform(<?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['id']; ?>
)" title="Просмотр">Просмотр</a></td>
<td align="left" width="80" nowrap><?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['count']; ?>
</td>
<td align="left" width="100" class="gray" nowrap><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orders'][$this->_sections['i']['index']]['sum'])) ? $this->_run_mod_handler('round', true, $_tmp, 2) : round($_tmp, 2)))) ? $this->_run_mod_handler('number', true, $_tmp) : smarty_modifier_number($_tmp)); ?>
 <?php echo $this->_tpl_vars['options']['valute']; ?>
</td>
<td width="120"><?php if ($this->_tpl_vars['orders'][$this->_sections['i']['index']]['status'] == 1): ?>Оплачено<?php elseif ($this->_tpl_vars['orders'][$this->_sections['i']['index']]['status'] == 2): ?>Отправлено<?php else: ?>Нeобработано<?php endif; ?></td>
<td><?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['pay']; ?>
</td>
<td width="20" align="center"><a href="javascript:delorder(<?php echo $this->_tpl_vars['orders'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
<?php endfor; endif; ?>
</table>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['orders_pager']), $this);?>

<?php else: ?>
<div class="box">Не найдены заказы.</div>
<?php endif; ?>

<table width="100%" class="actiongrid">
<tr>
<?php if ($this->_tpl_vars['orders']): ?>
<td nowrap>
<label><input type="checkbox" onclick="checkall2(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction2(this.value,this.form)">
<option value="">-</option>
<option value="setstatus0">Необработано</option>
<option value="setstatus1">Оплачено</option>
<option value="setstatus2">Отправлено</option>
<option value="odelete">Удалить</option>
</select>
<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'orders'), $this);?>

</form>
</td>
<td nowrap>
<form name="rowsform2" method="post">
Строк:
<select name="rows" onchange="this.form.submit()">
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="0">Все</option>
</select>
<script type="text/javascript">document.forms.rowsform2.rows.value='<?php echo $this->_tpl_vars['rows2']; ?>
';</script>
<?php echo smarty_function_hidden(array('name' => 'action','value' => 'setrows2'), $this);?>

<?php echo smarty_function_hidden(array('name' => 'authcode','value' => $this->_tpl_vars['system']['authcode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'mode','value' => $this->_tpl_vars['system']['mode']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'item','value' => $this->_tpl_vars['system']['item']), $this);?>

<?php echo smarty_function_hidden(array('name' => 'tab','value' => 'orders'), $this);?>

</form>
</td>
<?php endif; ?>
<td width="80%" align="right">&nbsp;</td>
</tr>
</table>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'import')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['cols']): ?>
<h3>Столбцы в файле:</h3>

<table class="grid gridsort">
<tr>
<th align="left" width="22">№</th>
<th align="left">Название</th>
<th align="left" width="200">Тип</th>
<th width="24">&nbsp;</th>
</tr>
</table>
<div id="importbox" class="gridsortbox">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cols']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table id="col_<?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['id']; ?>
" class="grid gridsort">
<tr class="<?php echo smarty_function_cycle(array('values' => "row0,row1"), $this);?>
">
<td width="20" id="colname<?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['num']; ?>
</td>
<td><?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['caption']; ?>
</td>
<td width="200"><?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['type']; ?>
</td>
<td width="20"><a href="javascript:delcol(<?php echo $this->_tpl_vars['cols'][$this->_sections['i']['index']]['id']; ?>
)" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
</table>
<?php endfor; endif; ?>
</div>
<?php echo '<script type="text/javascript">
Sortable.create(\'importbox\',{tag:\'table\',onUpdate: setimportsort});
</script>'; ?>

<?php else: ?>
<div class="box">Не задана структура данных.</div>
<?php endif; ?>
<table class="actiongrid">
<tr>
<td align="right">
<?php echo smarty_function_button(array('caption' => "Импорт",'onclick' => "getimportform()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Экспорт",'onclick' => "runexport()"), $this);?>

<?php echo smarty_function_button(array('caption' => "Добавить",'onclick' => "getaddcolform()"), $this);?>

</td>
</tr>
</table>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tabpage', array('id' => 'opt')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

<?php echo smarty_function_tabcontrol(array('id' => 'opt','opt2' => "Опции",'fields' => "Редактор&nbsp;полей"), $this);?>


<?php $this->_tag_stack[] = array('tabpage', array('idtab' => 'opt','id' => 'opt2')); $_block_repeat=true;smarty_block_tabpage($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox1']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox2']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox3']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox4']), $this);?>

<?php echo smarty_function_object(array('obj' => $this->_tpl_vars['optbox5']), $this);?>

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