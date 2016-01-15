{include file="_header.tpl"}

{if $errors.doubleid}
<div class="warning">Указанный идентификатор уже используется!</div>
{/if}
{if $langs}
<table class="grid gridsort">
<tr>
<th align="left" width="122">Идентификатор</th>
<th align="left">Название</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="langsbox" class="gridsortbox">
{section name=i loop=$langs}
<table id="lang_{$langs[i].id}" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td width="120"><a href="javascript:geteditlangform({$langs[i].id})" title="Редактировать">{$langs[i].name}</a></td>
<td>{$langs[i].caption}</td>
<td width="20">{if count($langs)>1}<a href="javascript:dellang({$langs[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a>{else}&nbsp;{/if}</td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('langsbox',{tag:'table',onUpdate: setlangssort});
</script>{/literal}
{else}
<div class="box">Не созданы языковые версии.</div>
{/if}
<table class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddlangform()"}
</td>
</tr>
</table>

{include file="_footer.tpl"}