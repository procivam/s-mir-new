{include file="_header.tpl"}

{tabcontrol main="Записи" fields="Редактор полей"}

{tabpage id="main"}
<form method="post">
{if $listdata}
<table class="grid gridsort" width="100%">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="25">ID</th>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="listitemsbox" class="gridsortbox">
{section name=i loop=$listdata}
<table id="listitem_{$listdata[i].id}" class="grid gridsort" width="100%">
<tr class="{cycle values="row0,row1"}">
<td width="20"><input type="checkbox" id="check{$smarty.section.i.index}" name="checkdata[]" value="{$listdata[i].id}"></td>
<td width="20">{$listdata[i].id}</td>
<td><a href="javascript:geteditform({$listdata[i].id})" title="Редактировать">{$listdata[i].name}</a></td>
<td width="20" align="center"><a href="javascript:deldata({$listdata[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('listitemsbox',{tag:'table',onUpdate: setlistitemsort});
</script>{/literal}
{else}
<div class="box">Нет записей.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td nowrap>
{if $listdata}
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="sortname">Сортировать</option>
<option value="delete">Удалить</option>
</select>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{/if}
</td>
<td align="right">
{button caption="Импорт" onclick="getimportform()"}
{button caption="Добавить" onclick="getaddform()"}
</td>
</tr>
</table>
</form>
{/tabpage}

{tabpage id="fields"}
{object obj=$fieldsbox}
{/tabpage}

{include file="_footer.tpl"}
