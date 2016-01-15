{include file="_header.tpl"}

{if $errors.doubleid}<div class="warning">Указанный идентификатор уже используется!</div>{/if}
{if $errors.doubledomain}<div class="warning">Сайт с указанным доменом уже создан в системе!</div>{/if}

<div>
{if $domains}
<form name="domainsform" method="post">
<table class="gridfix">
<tr>
<th width="20">&nbsp;</th>
<th align="left" width="160">Идентификатор</th>
<th align="left" width="220">Домен</th>
<th align="left">Название</th>
<th align="left">База данных</th>
<th width="100" align="left">Дата создания</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
<th width="20">&nbsp;</th>
</tr>
{section name=i loop=$domains}
<tr class="{cycle values="row0,row1"}">
<td width="20"><input type="checkbox" id="check{$smarty.section.i.index}" name="domaincheck[]" value="{$domains[i].id}"></td>
<td width="150"><a href="javascript:geteditdomainform({$domains[i].id})" title="Редактировать">{$domains[i].name}</a></td>
<td width="200"><a href="admin.php?mode=main&authcode={$system.authcode}&action=setdomain&domain={$domains[i].name}" title="Перейти к управлению">{$domains[i].domain}</a></td>
<td>{$domains[i].caption}</td>
<td>{$domains[i].base}</td>
<td>{$domains[i].date|date_format}</td>
<td width="20"><a href="{$domains[i].link}" target="_blank" title="Просмотр сайта"><img src="/templates/admin/images/browse.png" alt="Просмотр сайта"></a></td>
<td width="20">{if $domains[i].activate}<img src="/templates/admin/images/site_active_ok.png" width="15" height="15" alt="Лицензия A.CMS">{else}<img src="/templates/admin/images/site_active_no.png" width="15" height="15" alt="Без лицензии">{/if}</td>
<td width="20"><a href="javascript:deldomain({$domains[i].id})" title="Удалить"><img src="/templates/admin/images/del.png"  alt="Удалить"></a></td>
</tr>
{/section}
</table>
{object obj=$domains_pager}
{else}
<div class="box">Нет сайтов.</div>
{/if}
<table width="100%" class="actiongrid">
<tr>
{if $domains}
<td nowrap>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;
Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="import">Импорт конфигурации</option>
<option value="delete">Удалить</option>
</select>
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
</form>
</td>
{/if}
<td align="right" width="90%">
{button caption="Добавить" onclick="getadddomainform()"}
</td>
</tr>
</table>
</div>

{include file="_footer.tpl"}
