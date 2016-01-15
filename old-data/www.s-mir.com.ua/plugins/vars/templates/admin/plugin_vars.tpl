{include file="_header.tpl"}

{if $errors.doubleopt}
<div class="warning">Переменная с таким именем уже существует!</div>
{/if}

{if $vars}
{tabcontrol vars="Переменные" urls="Условия"}
{else}
{tabcontrol vars="Переменные"}
{/if}

{tabpage id="vars"}
{if $vars}
<table class="grid gridsort">
<tr>
<th align="left" width="102">Идентификатор</th>
<th align="left" width="222">Название</th>
<th align="left">Значение</th>
<th align="left" width="80">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
</table>
<div id="varsbox" class="gridsortbox">
{section name=i loop=$vars}
<table id="var_{$vars[i].id}" class="grid gridsort">
<tr class="{cycle values="row0,row1"}">
<td width="100"><a href="javascript:geteditform({$vars[i].id})" title="Редактировать">{$vars[i].name}</a></td>
<td width="220">{$vars[i].caption}</td>
<td>{$vars[i].value}</td>
<td width="80"><a href="admin.php?mode=structures&item={$system.item}&idv={$vars[i].id}&tab=urls">Условия</a></td>
<td width="20" align="center"><a href="javascript:delopt({$vars[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
</table>
{/section}
</div>
{literal}<script type="text/javascript">
Sortable.create('varsbox',{tag:'table',onUpdate: setvarsort});
</script>{/literal}
{else}
<div class="box">Нет переменных.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddform()"}
</td>
</tr>
</table>
{/tabpage}

{if $vars}
{tabpage id="urls"}
<div class="actionbox">
<form method="get">
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
<select name="idv" onchange="this.form.submit()">
<option value="0">Все переменные</option>
{section name=i loop=$vars}
<option value="{$vars[i].id}"{if $vars[i].id==$var.id} selected{/if}>{$vars[i].caption}</option>
{/section}
</select>
{hidden name="tab" value="urls"}
</form>
</div>
{if $urls}
<table class="grid">
<tr>
<th align="left">URL</th>
<th align="left">Значение</th>
<th width="20">&nbsp;</th>
</tr>
{foreach from=$urls key=url item=value}
<tr class="{cycle values="row0,row1"}">
<td><a href="javascript:getediturlform('{$url}')" title="Редактировать">{$url}</a></td>
<td>{$value}</td>
<td width="20" align="center"><a href="javascript:delurl('{$url}')" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
{/foreach}
</table>
{else}
<div class="box">Нет условий.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddurlform()"}
</td>
</tr>
</table>
{/tabpage}
{/if}

{include file="_footer.tpl"}
