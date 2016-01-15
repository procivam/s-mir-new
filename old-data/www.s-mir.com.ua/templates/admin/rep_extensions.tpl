{include file="_mheader.tpl"}

<div class="mainpanel">




<div id="overview_tab" class="overview_tab">

<h2 style="margin-top:10px;margin-bottom:10px;"></h2>

<form method="get">
{hidden name="mode" value="rep"}
<select name="item" onchange="this.form.type[0].value=0;this.form.type.value=0;this.form.submit();" style="width:180px">
<option value="extensions" selected>Расширения</option>
{if $system.domain}<option value="sites">Готовые сайты</option>{/if}
</select>
&nbsp;&nbsp;
<select name="type" onchange="this.form.submit()" style="width:180px">
<option value="1"{if $type==1} selected{/if}>Модули</option>
<option value="2"{if $type==2} selected{/if}>Плагины</option>
<option value="3"{if $type==3} selected{/if}>Блоки</option>
</select>
</form>

{if $errors.invalid}
<div class="warning">Не удалось установить расширение.</div>
{/if}
{if $noload}
<div class="warning">Не удалось загрузить даннные.</div>
{/if}

{if $items}
<div>
<form method="post">
<table class="grid" style="margin-top:20px">
<tr>
<th width="20">&nbsp;</th>
<th width="120" align="left">Идентификатор</th>
<th width="220" align="left">Название</th>
<th align="left">Описание</th>
<th width="60" align="left">Версия</th>
<th width="60" align="left">Система</th>
<th width="80">&nbsp;</th>
<th width="80">&nbsp;</th>
</tr>
{section name=i loop=$items}
<tr class="{if $items[i].exists}group1{else}{cycle values='row0,row1'}{/if}">
<td width="20"><input type="checkbox" id="check{$smarty.section.i.index}" name="files[]" value="{$items[i].type}_{$items[i].id}"></td>
<td>{$items[i].id}</td>
<td>{$items[i].name}</td>
<td>{$items[i].description}</td>
<td>{$items[i].version}</td>
<td>{$items[i].system}</td>
<td align="center"><a href="{$items[i].info}" target="_blank" title="Подробнее">Подробнее</a></td>
<td align="center">{if !$items[i].exists}<a href="admin.php?mode=rep&item=extensions&action=install&file={$items[i].type}_{$items[i].id}&type={$type}&authcode={$system.authcode}" title="Установить">Установить</a>{else}Установлено{/if}</td>
</tr>
{/section}
</table>
<table class="actiongrid">
<tr>
<td>
<label><input type="checkbox" onclick="checkall(this.checked)">&nbsp;Отмеченные:</label>&nbsp;
<select name="action" onchange="runaction(this.value,this.form)">
<option value="">-</option>
<option value="install">Установить</option>
</select>
{hidden name="mode" value="rep"}
{hidden name="item" value="extensions"}
{hidden name="type" value=$type}
{hidden name="authcode" value=$system.authcode}
</form>
</td>
</tr>
</table>
</div>
{else}
<div class="box" style="margin-top:20px">Нет данных.</div>
{/if}

</div>
</div>

{include file="_mfooter.tpl"}