{include file="_header.tpl"}

{if $category}
{tabcontrol cat="Категории" banners="Баннеры"}
{else}
{tabcontrol cat="Категории"}
{/if}

{tabpage id="cat"}
{if $categories}
<table class="grid gridsort">
<tr>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="categoriesbox" class="gridsortbox">
{section name=i loop=$categories}
<table id="cat_{$categories[i].id}" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td><a href="admin.php?mode={$system.mode}&item={$system.item}&tab=banners&idcat={$categories[i].id}" title="Выбрать">{if $categories[i].selected}<b>{$categories[i].name} ({$categories[i].count})</b>{else}{$categories[i].name} ({$categories[i].count}){/if}</a></td>
<td width="20"><a href="javascript:geteditcatform({$categories[i].id})" title="Редактировать"><img src="/templates/admin/images/edit.gif" width="16" height="16" alt="Редактировать"></a></td>
<td width="20"><a href="javascript:delcat({$categories[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('categoriesbox',{tag:'table',onUpdate: setcategorysort});
</script>{/literal}
{else}
<div class="box">Нет категорий.</div>
{/if}
<table class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddcatform()"}
</td>
</tr>
</table>
{/tabpage}

{if $category}
{tabpage id="banners"}
<div>
<table class="grid gridsort">
<tr><th align="left">{$category.name}:</th></tr>
</table>
{if $banners}
<form name="bannersform" method="post">
<div id="bannersbox" class="gridsortbox">
{section name=i loop=$banners}
<table id="banner_{$banners[i].id}" width="100%" class="grid gridsort">
{if $banners[i].close}<tr class="close">{else}<tr class="row0">{/if}
<td><input id="check{$smarty.section.i.index}" type="checkbox" name="checkban[]" value="{$banners[i].id}">&nbsp;<a href="javascript:geteditbannerform({$banners[i].id})" title="Редактировать"><b>{$banners[i].name}</b></a>{if $banners[i].width && $banners[i].height} ({$banners[i].width}X{$banners[i].height}){/if}</td>
<td align="right" nowrap>
<div class="gray">
{if $banners[i].date=="Y"}
Период показа с {$banners[i].date1|date_format} по {$banners[i].date2|date_format} |
{/if}
Показов: <b>{$banners[i].views}</b>{if $banners[i].type!="flash" || $banners[i].clicks} | Кликов: <b>{$banners[i].clicks}{/if}</b>
</div>
</td>
<td width="20" align="center" valign="top"><a href="javascript:delbanner({$banners[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
<tr class="row1">
<td colspan="3">
{if $banners[i].filepath}
{if $banners[i].type=="image"}
<img src="/{$banners[i].filepath}" width="{$banners[i].width}" height="{$banners[i].height}" style="float:left;margin-right:5px;">
{elseif $banners[i].type=="flash"}
<embed src="/{$banners[i].filepath}" width="{$banners[i].width}" height="{$banners[i].height}" quality="high" type="application/x-shockwave-flash" pluginspace="http://www.macromedia.com/go/getflashplayer" style="float:left;margin-right:5px;">
{/if}
{/if}
<p>{$banners[i].text|escape}</p>
{if $banners[i].url}
<table class="invisiblegrid">
<tr>
<td colspan="2">
<tr>
<td>Целевой URL:</td>
<td><a href="{$banners[i].url}" target="_blank">{$banners[i].url}</a></td>
</tr>
<tr>
<td>Служебный URL:</td>
<td><a href="{$banners[i].link}" target="_blank">{$banners[i].link}</a></td>
</tr>
</table>
{/if}
</td>
</tr>
</table>
{/section}
</div>
{if $sort=='sort'}{literal}<script type="text/javascript">
Sortable.create('bannersbox',{tag:'table',onUpdate: setbannersort});
</script>{/literal}{/if}
{object obj=$banners_pager}
{else}
<div class="box">Нет баннеров в категории.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
{if $banners}
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="seton">Включить</option>
<option value="setoff">Выключить</option>
<option value="reset">Сбросить статистику</option>
<option value="delete">Удалить</option>
</select>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="banners"}
{hidden name="idcat" value=$category.id}
{hidden name="authcode" value=$system.authcode}
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
<script type="text/javascript">document.forms.sortform.sort.value='{$sort}';</script>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="banners"}
{hidden name="idcat" value=$category.id}
{hidden name="action" value="setsort"}
{hidden name="authcode" value=$system.authcode}
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
<script type="text/javascript">document.forms.rowsform.rows.value='{$rows}';</script>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="banners"}
{hidden name="idcat" value=$category.id}
{hidden name="action" value="setrows"}
{hidden name="authcode" value=$system.authcode}
</form>
</td>
{/if}
<td align="right" width="80%">
<input type="button" class="button" value="Добавить" onclick="getaddbannerform({$category.id})" style="width:120px">
</td>
</tr>
</table>
</div>
{/tabpage}
{/if}

{include file="_footer.tpl"}
