<form name="filterform" method="post">
<p>ID:</p>
<p>{editbox name="id" text=$form.id width="60"}</p>
<p>Полное имя:</p>
<p>{editbox name="name" text=$form.name width="20%"}</p>
<p>Логин:</p>
<p>{editbox name="login" text=$form.login width="20%"}</p>
<p>e-mail:</p>
<p>{editbox name="email" text=$form.email width="20%"}</p>
{if $options.usebalance}
<p>Баланс ({$options.valute}):</p>
<p>
от&nbsp;{editbox name="balance1" max=12 width=70 text=$form.balance1}
до&nbsp;{editbox name="balance2" max=12 width=70 text=$form.balance2}
</p>
{/if}
{if $form.groups}
<p>Группа:</p>
<p>
<select name="idgroup">
<option value="0">Не выбрано</option>
{html_options options=$form.groups selected=$form.idgroup}
</select>
</p>
{/if}
{include file="objcomp_fieldseditor_includefilter.tpl"}
<p>Дата регистрации:</p>
<p><input type="checkbox" name="date"{if $form.date} checked{/if}>
от &nbsp;{dateselect name="from" date=$form.from onchange="this.form.date.checked=true"}
&nbsp;
до &nbsp;{dateselect name="to" date=$form.to maxtime=true onchange="this.form.date.checked=true"}
</p>
<p>Статус:</p>
<p>
<select name="status">
{html_options options=$form.statuss selected=$form.status}
</select>
</p>
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="setfilter"}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="tab" value="users"}
<div align="right" style="margin-top:10px">
{submit caption="Применить"}
{button caption="Сбросить" onclick="this.form.elements.action.value='unfilter'; this.form.submit();"}
{button caption="Отмена" onclick="cancelfilter()"}
</div>
</form>