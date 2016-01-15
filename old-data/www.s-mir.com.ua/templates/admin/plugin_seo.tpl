{include file="_header.tpl"}

{if $errors.doubleurl}
<div class="warning">Запись с таким URL уже существует!</div>
{/if}

{if $pages}
<form method="post">
<table class="grid">
<tr>
<th align="left">URL</th>
<th align="left">TITLE</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
{section name=i loop=$pages}
<tr class="{cycle values="row0,row1"}">
<td><a href="javascript:geteditseoform({$pages[i].id})" title="Редактировать">{$pages[i].url}</a></td>
<td>{$pages[i].title}</td>
<td width="20" align="center"><a href="http://{$domain}{$pages[i].url}" target="_blank" title="Просмотр"><img src="/templates/admin/images/browse.gif" width="16" height="16" alt="Просмотр"></a></td>
<td width="20" align="center"><a href="javascript:delurlseo({$pages[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
{/section}
</table>
{object obj=$pages_pager}
{else}
<div class="box">Нет записей.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить URL" onclick="getaddseoform()"}
</td>
</tr>
</table>

{include file="_footer.tpl"}
