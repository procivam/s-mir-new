<form name="filterform" method="post">
<p>Название:</p>
<p>{editbox name="name" text=$form.name width="20%"}</p>
<p>Описание:</p>
<p>{editbox name="content" text=$form.content width="20%"}</p>
<p>Артикул:</p>
<p>{editbox name="art" text=$form.art width="20%"}</p>
<p>Цена:</p>
<p>
от&nbsp;{editbox name="price1" max=12 width=70 text=$form.price1}
до&nbsp;{editbox name="price2" max=12 width=70 text=$form.price2}
</p>
<table class="invisiblegrid" cellspacing="2">
<tr>
<td>Статус:</td>
<td>Спецпредложение:</td>
<td>Новинка:</td>
</tr>
<tr>
<td>
<select name="status" style="width:100%">
{html_options options=$form.statuss selected=$form.status}
</select>
</td>
<td>
<select name="isfavorite" style="width:100%">
<option value="0">Не выбрано</option>
<option value="Y"{if $form.isfavorite==="Y"} selected{/if}>Да</option>
<option value="N"{if $form.isfavorite==="N"} selected{/if}>Нет</option>
</select>
</td>
<td>
<select name="isnew" style="width:100%">
<option value="0">Не выбрано</option>
<option value="Y"{if $form.isnew==="Y"} selected{/if}>Да</option>
<option value="N"{if $form.isnew==="N"} selected{/if}>Нет</option>
</select>
</td>
</tr>
</table>
{include file="objcomp_fieldseditor_includefilter.tpl"}
<p>Дата:</p>
<p><input type="checkbox" name="date"{if $form.date} checked{/if}>
от &nbsp;{dateselect name="from" date=$form.from onchange="this.form.date.checked=true"}
&nbsp;
до &nbsp;{dateselect name="to" date=$form.to maxtime=true onchange="this.form.date.checked=true"}
</p>
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setfilter"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="items"}
<div align="right" style="margin-top:10px">
{submit caption="Применить"}
{button caption="Сбросить" onclick="this.form.elements.action.value='unfilter'; this.form.submit();"}
{button caption="Отмена" onclick="cancelfilter()"}
</div>
</form>