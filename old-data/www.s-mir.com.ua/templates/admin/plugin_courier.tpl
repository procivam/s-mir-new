{include file="_header.tpl"}

{if !$shopassoc}
<div class="box">Не найден раздел магазина.</div>
{else}
{if $items}
<table class="grid gridsort">
<tr>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="itemsbox" class="gridsortbox">
{section name=i loop=$items}
<table id="item_{$items[i].id}" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td><a href="javascript:geteditform({$items[i].id})" title="Редактировать">{$items[i].name}</a></td>
<td width="20" align="center">
<a href="javascript:delcourier({$items[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a>
</td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('itemsbox',{tag:'table',onUpdate: setsort});
</script>{/literal}
{else}
<div class="box">Нет записей.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddform()"}
</td>
</tr>
</table>
{/if}

{include file="_footer.tpl"}
