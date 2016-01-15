{include file="_header.tpl"}

{if $errors.doubleart}
<div class="warning">Товар с указанным артикулом уже существует в каталоге!</div>
{/if}

{if $options.usecomments}
{if $options.useorder}
{tabcontrol cat="Категории" items="Записи" comm="Комментарии" orders="Заказы" import="Импорт/Экспорт" opt="Настройки"}
{else}
{tabcontrol cat="Категории" items="Записи" comm="Комментарии" import="Импорт/Экспорт" opt="Настройки"}
{/if}
{else}
{if $options.useorder}
{tabcontrol cat="Категории" items="Записи" orders="Заказы" import="Импорт/Экспорт" opt="Настройки"}
{else}
{tabcontrol cat="Категории" items="Записи" import="Импорт/Экспорт" opt="Настройки"}
{/if}
{/if}

{tabpage id="cat"}
{object obj=$treebox}
{/tabpage}

{tabpage id="items"}
<div class="actionbox">
<form>{treeselect id="shopidcat" name="idcat" items=$categories selected=$smarty.get.idcat emptytxt="Все категории" title="Выбор категории" onchange="runselectcat(this.form)" width="320px"}</form>
</div>

<div id="itemssgridbox">
{if $items}
<form name="itemsform" method="post">
<table width="100%" class="gridfix">
<tr>
<th width="25">&nbsp;</th>
{if $options.useimages}<th width="20">&nbsp;</th>{/if}
<th align="left">Название</th>
{if !$smarty.get.idcat || $childcats>1}<th align="left">Категория</th>{/if}
<th width="100" align="left">Артикул</th>
<th width="110" align="left">Цена</th>
{if $options.onlyavailable}<th width="50" align="left">Колич.</th>{/if}
{if $sort=='sort'}<th width="50" align="left">Поряд.</th>{/if}
{if $options.usevote}<th align="left" width="40">Оцен.</th>{/if}
<th width="25">&nbsp;</th>
{if $seo}<th width="25">&nbsp;</th>{/if}
{if $options.usecomments}<th width="25">&nbsp;</th>{/if}
<th width="25">&nbsp;</th>
<th width="25">&nbsp;</th>
</tr>
{section name=i loop=$items}
<tr class="{if $items[i].active=="Y"}{cycle values="row0,row1"}{else}close{/if}">
<td width="25"><input id="check{$smarty.section.i.index}" type="checkbox" name="checkitem[]" value="{$items[i].id}"><input type="hidden" name="edititem[]" value="{$items[i].id}"></td>
{if $options.useimages}<td width="20">{if $items[i].idimg}{capture name=gimage}{image id=$items[i].idimg width=150}{/capture}<img src="/templates/admin/images/image.gif" width="16" height="16" {popup text=$smarty.capture.gimage fgcolor="#F3FCFF" width=150 bgcolor="#86BECD" left=true}>{else}&nbsp;{/if}</td>{/if}
<td><a href="javascript:getedititemform({$items[i].id})" title="Редактировать">{$items[i].name}</a>
{if $items[i].favorite=="Y"}&nbsp;<img src="/templates/admin/images/star.gif" width="16" height="16" alt="Лидер">{/if}
{if $items[i].new=="Y"}&nbsp;<img src="/templates/admin/images/new.gif" width="16" height="16" alt="Новинка">{/if}
</td>
{if !$smarty.get.idcat || $childcats>1}<td class="gray"><span{if $items[i].catpath!=$items[i].category} {help text=$items[i].catpath width=450}{/if}>{$items[i].category}</span></td>{/if}
<td width="100">{$items[i].art}</td>
<td align="left" width="110" nowrap><nobr><input type="text" name="price_{$items[i].id}" style="width:80px" size="8" value="{$items[i].price|round:2}"><span class="gray">&nbsp;{$options.valute}</span></nobr></td>
{if $options.onlyavailable}<td align="left" width="50" nowrap><input type="text" name="iscount_{$items[i].id}" size="4" style="width:40px" value="{$items[i].iscount}"></td>{/if}
{if $sort=='sort'}<td align="left" width="50"><input type="text" name="sort_{$items[i].id}" size="4" style="width:40px" value="{$items[i].sort}"></td>{/if}
{if $options.usevote}<td width="40"><input type="text" name="vote_{$items[i].id}" size="4" style="width:30px" value="{$items[i].vote}"></td>{/if}
<td width="25" align="center"><a href="{$items[i].link}" target="_blank" title="Просмотр на сайте"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр на сайте"></a></td>
{if $seo}<td width="25" align="center"><a href="javascript:geturlseoform('{$items[i].link}')" title="SEO оптимизация"><img src="/templates/admin/images/addpage.gif" width="16" height="16"></a></td>{/if}
{if $options.usecomments}<td width="25" align="center"><a href="admin.php?mode=sections&item={$system.item}{if $smarty.get.idcat}&idcat={$smarty.get.idcat}{/if}&tab=comm&iditemcomm={$items[i].id}{if $smarty.get.page}&page={$smarty.get.page}{/if}" title="Комментарии ({$items[i].comments})"><img src="/templates/admin/images/comments.gif" alt="Комментарии ({$items[i].comments})" width="16" height="16"></a></td>{/if}
<td width="25" align="center"><a href="javascript:gettiesform({$items[i].id})" title="Сопутствующие"><img src="/templates/admin/images/links.gif" width="16" height="16" alt="Сопутствующие"></a></td>
<td width="25" align="center"><a href="javascript:delitem({$items[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
{/section}
</table>
{object obj=$items_pager}
{else}
<div class="box">Не найдены товары.</div>
{/if}

<table width="100%" class="actiongrid">
<tr>
{if $items}
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
{hidden name="authcode" value=$system.authcode}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="items"}
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
{if $options.usevote}
<option value="vote">оценке вниз</option>
<option value="vote DESC">оценке вверх</option>
{/if}
{if $options.usecoments}
<option value="comments">комментариям вниз</option>
<option value="comments DESC">комментариям вверх</option>
{/if}
<option value="sort">заданному порядку</option>
</select>
<script type="text/javascript">document.forms.sortform.sort.value='{$sort}';</script>
{hidden name="action" value="setsort"}
{hidden name="authcode" value=$system.authcode}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="items"}
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
<script type="text/javascript">document.forms.rowsform.rows.value='{$rows}';</script>
{hidden name="tab" value="items"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setrows"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
</form>
</td>
{/if}
<td align="right" width="80%">
{if $items}
{button caption="Фильтр" onclick="getfilterform()"}
{button caption="Сохранить" onclick="document.forms.itemsform.submit()"}
{/if}
{button caption="Добавить" onclick="getadditemform()"}
</td>
</tr>
</table>
</div>

<div id="filterbox"></div>
{if $filter}<script type="text/javascript">getfilterform()</script>{/if}
{/tabpage}

{if $options.usecomments}
{tabpage id="comm"}
{object obj=$commbox}
{/tabpage}
{/if}

{tabpage id="orders"}
<table class="actiongrid">
<tr>
<td>
<form name="statdateform" method="get">
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
<input type="checkbox" name="date"{if $smarty.get.date} checked{/if}>
с &nbsp;{dateselect name="from" date=$smarty.get.from onchange="this.form.date.checked=true"}&nbsp;по&nbsp;{dateselect name="to" date=$smarty.get.to maxtime=true onchange="this.form.date.checked=true"}
&nbsp;сумма от {editbox name="sum1" width="60px" text=$smarty.get.sum1} до {editbox name="sum2" width="60px" text=$smarty.get.sum2}
&nbsp;<select name="status">
<option value="-1">-</option>
<option value="0"{if isset($smarty.get.status) && $smarty.get.status==0} selected{/if}>Не обработано</option>
<option value="1"{if $smarty.get.status==1} selected{/if}>Оплачено</option>
<option value="2"{if $smarty.get.status==2} selected{/if}>Отправлено</option>
</select>
&nbsp;<select name="pay">
<option value="-1">-</option>
{html_options options=$pays selected=$smarty.get.pay}
</select>
{hidden name="tab" value="orders"}
{submit caption="Фильтр" width="80"}
{button caption="Сбросить" width="80" onclick="document.location='admin.php?mode=sections&item='+ITEM+'&tab=orders'"}
</form>
</td>
</tr>
</table>
{if $orders}
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
{section name=i loop=$orders}
<tr class="{if $orders[i].status==1}group2{elseif $orders[i].status==2}group1{else}{cycle values="row0,row1"}{/if}">
<td width="25"><input id="ocheck{$smarty.section.i.index}" type="checkbox" name="checkorder[]" value="{$orders[i].id}"></td>
<td width="40">{$orders[i].id}</td>
<td width="120" nowrap>{$orders[i].date|date_format:"%d.%m.%Y %T"}</td>
<td><a href="javascript:getorderform({$orders[i].id})" title="Просмотр">Просмотр</a></td>
<td align="left" width="80" nowrap>{$orders[i].count}</td>
<td align="left" width="100" class="gray" nowrap>{$orders[i].sum|round:2|number} {$options.valute}</td>
<td width="120">{if $orders[i].status==1}Оплачено{elseif $orders[i].status==2}Отправлено{else}Нeобработано{/if}</td>
<td>{$orders[i].pay}</td>
<td width="20" align="center"><a href="javascript:delorder({$orders[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
{/section}
</table>
{object obj=$orders_pager}
{else}
<div class="box">Не найдены заказы.</div>
{/if}

<table width="100%" class="actiongrid">
<tr>
{if $orders}
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
{hidden name="authcode" value=$system.authcode}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="orders"}
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
<script type="text/javascript">document.forms.rowsform2.rows.value='{$rows2}';</script>
{hidden name="action" value="setrows2"}
{hidden name="authcode" value=$system.authcode}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="orders"}
</form>
</td>
{/if}
<td width="80%" align="right">&nbsp;</td>
</tr>
</table>
{/tabpage}

{tabpage id="import"}
{if $cols}
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
{section name=i loop=$cols}
<table id="col_{$cols[i].id}" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td width="20" id="colname{$cols[i].id}">{$cols[i].num}</td>
<td>{$cols[i].caption}</td>
<td width="200">{$cols[i].type}</td>
<td width="20"><a href="javascript:delcol({$cols[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('importbox',{tag:'table',onUpdate: setimportsort});
</script>{/literal}
{else}
<div class="box">Не задана структура данных.</div>
{/if}
<table class="actiongrid">
<tr>
<td align="right">
{button caption="Импорт" onclick="getimportform()"}
{button caption="Экспорт" onclick="runexport()"}
{button caption="Добавить" onclick="getaddcolform()"}
</td>
</tr>
</table>
{/tabpage}

{tabpage id="opt"}

{tabcontrol id="opt" opt2="Опции" fields="Редактор&nbsp;полей"}

{tabpage idtab="opt" id="opt2"}
{object obj=$optbox1}
{object obj=$optbox2}
{object obj=$optbox3}
{object obj=$optbox4}
{object obj=$optbox5}
{/tabpage}

{tabpage idtab="opt" id="fields"}
{object obj=$fieldsbox}
{/tabpage}

{/tabpage}

{include file="_footer.tpl"}
