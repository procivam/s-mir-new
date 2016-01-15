{include file="_header.tpl"}

{if $errors.doubleid}
<div class="warning">Указанный идентификатор уже используется!</div>
{/if}
<div>
{if $structures}
<form name="structuresform" method="post">
<table class="grid gridsort" width="100%">
<tr>
<th width="25">&nbsp;</th>
<th align="center" width="20">&nbsp;</th>
<th align="left" width="110">Идентификатор</th>
<th align="left">Название</th>
<th align="left" width="25%">Базовый плагин</th>
<th align="center" width="20">&nbsp;</th>
</tr>
</table>
<div id="structuresbox" class="gridsortbox">
{section name=i loop=$structures}
<table id="structure_{$structures[i].id}" class="grid gridsort" width="100%">
<tr class="{cycle values="row0,row1"}">
<td width="20"><input type="checkbox" id="check{$smarty.section.i.index}" name="checkstructure[]" value="{$structures[i].id}"></td>
<td width="20">{$structures[i].ico}</td>
<td width="110"><a href="javascript:geteditstructureform({$structures[i].id})" title="Редактировать">{$structures[i].name}</a></td>
<td><a href="admin.php?mode=structures&item={$structures[i].structure}" title="Перейти к управлению">{$structures[i].caption}</a></td>
<td width="25%">{$structures[i].modcaption}</td>
<td align="center" width="20"><a href="javascript:delstructure({$structures[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('structuresbox',{tag:'table',onUpdate: setstructuresort});
</script>{/literal}
{else}
<div class="box">Не созданы дополнения.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
{if $structures}
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="delete">Удалить</option>
</select>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
</form>
</td>
{/if}
<td align="right" width="80%">
{button caption="Добавить" onclick="getaddstructureform()"}
</td>
</tr>
</table>
</div>

{include file="_footer.tpl"}