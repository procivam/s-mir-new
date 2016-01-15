{include file="_header.tpl"}

{if $rss}
<table class="grid">
<tr>
<th align="left" width="150">Раздел</th>
<th align="left">Ссылка</th>
<th width="16">&nbsp;</th>
</tr>
{section name=i loop=$rss}
<tr class="{cycle values="row0,row1"}">
<td width="150" nowrap><a href="javascript:geteditrssform({$rss[i].id})" title="Редактировать">{if $rss[i].section}{$rss[i].section}{else}Все{/if}</a></td>
<td><a href="{$rss[i].link}" target="_blank">{$rss[i].link}</a></td>
<td width="16"><a href="javascript:delrss({$rss[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
{/section}
</table>
{else}
<div class="box">Не созданы rss каналы.</div>
{/if}

<table class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddrssform()"}
</td>
</tr>
</table>

{include file="_footer.tpl"}