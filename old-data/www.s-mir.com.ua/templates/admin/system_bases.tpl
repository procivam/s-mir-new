{include file="_header.tpl"}

<h3>Главная база данных:</h3>
<div class="box">
<form method="post">
<h3 style="float:right">
Лимит сайтов на одну БД:&nbsp;&nbsp;{editbox name="bdlimit" width="30" text=$options.bdlimit}
{submit caption="Сохранить"}
</h3>
{hidden name="mode" value="system"}
{hidden name="item" value="bases"}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="save"}
</form>
<table>
<tr><td>Хост / Название:</td><td><b>{$mainbase.name}</b></td></tr>
<tr><td>Сайты:</td><td><b>{$mainbase.sites}</b></td></tr>
<tr><td>Таблицы:</td><td><b>{$mainbase.tables}</b></td></tr>
<tr><td>Размер:</td><td><b>{$mainbase.size}</b></td></tr>
</table>
</div>

{if $errors.doublebase}
<div class="warning">Указанная база уже добавлена!</div>
{/if}
{if $errors.noconnect}
<div class="warning">Ошибка подключения к БД: {$errors.noconnect}</div>
{/if}
{if $errors.existssites}
<div class="warning">На выбранной базе установлены сайты, нельзя удалить.</div>
{/if}

<h3>Дополнительные базы данных:</h3>
{if $bases}
<table class="grid">
<tr>
<th align="left">Хост / Название</th>
<th align="left" width="80">Сайты</th>
<th align="left" width="80">Таблицы</th>
<th align="left" width="80">Размер</th>
<th width="20">&nbsp;</th>
</tr>
{section name=i loop=$bases}
{if $bases[i].close}
<tr class="close">
{else}
<tr class="{cycle values="row0,row1"}">
{/if}
<td><a href="javascript:geteditbaseform({$bases[i].id})" title="Редактировать">{$bases[i].name}</a></td>
<td width="80">{$bases[i].sites}</td>
<td width="80">{$bases[i].tables}</td>
<td width="80">{$bases[i].size}</td>
<td width="20"><a href="javascript:delbase({$bases[i].id})" title="Удалить"><img src="/templates/admin/images/del.gif" width="16" height="16" alt="Удалить"></a></td>
</tr>
{/section}
</table>
{else}
<div class="box">Нет дополнительных баз данных.</div>
{/if}

<table class="actiongrid">
<tr>
<td align="right">
{button caption="Добавить" onclick="getaddbaseform()"}
</td>
</tr>
</table>

{include file="_footer.tpl"}
