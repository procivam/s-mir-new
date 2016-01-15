{include file="_header.tpl"}

{if $idsec}
<table class="actiongrid">
<tr>
<td>
<form method="get">
<p>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
<select name="idsec" onchange="this.form.submit()">
{html_options options=$sections selected=$idsec}
</select>
</p>
</form>
</td>
</tr>
</table>

{if $errors.doublefield}
<div class="warning">Поле с таким именем уже существует!</div>
{/if}

{if $fields}
<table width="100%" class="grid gridsort">
<tr>
<th align="left" width="103">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="200">Тип</th>
<th width="23">&nbsp;</th>
</tr>
</table>
<div id="fieldsbox" class="gridsortbox">
{section name=i loop=$fields}
<table id="field_{$fields[i].id}" width="100%" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td width="100"><a href="javascript:geteditfieldform({$fields[i].id})" title="Редактировать">{$fields[i].field}</a></td>
<td>{$fields[i].name}</td>
<td width="200">{$fields[i].type}</td>
<td width="20"><a href="javascript:delfield({$fields[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('fieldsbox',{tag:'table',onUpdate: setfieldssort});
</script>{/literal}
{else}
<div class="box">Нет дополнительных полей.</div>
{/if}
<table class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddfieldform()"}
</td>
</tr>
</table>
{else}
<div class="box">Не найдены разделы использующие категории.</div>
{/if}

{include file="_footer.tpl"}
