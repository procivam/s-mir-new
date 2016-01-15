<form name="additemform" method="post" onsubmit="return item_form(this)" enctype="multipart/form-data">
<table class="invisiblegrid" width="100%">
<tr>
<td width="100%">Название:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="100%">{editbox name="name"}</td>
</tr>

<tr>
<td width="100%">
<p>{hidden name="idcat" value="0"}</p>
</td>
</tr>

<tr>
<td width="100%">Пользователь:<sup style="color:gray">*</sup></td>
</tr>
<tr>
<td width="100%">
<select name="userid">
	<option value="0">не задан</option>
{foreach from=$form.users item="it"}
	<option value="{$it.id}"{if $it.id==$form.userid} selected{/if}>{$it.name} ({$it.login})</option>
{/foreach}
</select>
</td>
</tr>

</table>

<div class="box">
<table class="invisiblegrid" width="100%">
<tr><td width="120">Сумма:</td></tr>
<tr>
<td width="120">{editbox name="price" width="80px"} {$options.valute}</td>
</tr>
</table>
</div>

{include file="objcomp_fieldseditor_include.tpl"}
{hidden name="tab" value="items"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="additem"}
<div align="right" style="margin-top:10px">
<p style="float:left">
<label><input type="checkbox" name="active" checked>&nbsp;Активно</label>&nbsp;&nbsp;
</p>
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>