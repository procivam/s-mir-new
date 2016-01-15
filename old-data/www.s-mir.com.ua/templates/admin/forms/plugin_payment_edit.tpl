<form name="editform" method="post" onsubmit="return courier_form(this)">
<p>Название:</p>
<p>{editbox name="name" width="60%" text=$form.name}</p>
<p>% наценки:</p>
<p>{editbox name="value" width="60%" text=$form.value}</p>
{*
<table class="invisiblegrid">
<tr>
<td>При сумме заказа от:</td>
<td>до:</td>
<td>Цена доставки:</td>
<td>+ % суммы заказа:</td>
</tr>
{section name=i loop=$form.data}
<tr>
<td><input type="text" name="from{$smarty.section.i.index}" style="width:100%" value="{$form.data[i].from}"></td>
<td><input type="text" name="to{$smarty.section.i.index}" style="width:100%" value="{$form.data[i].to}"></td>
<td><input type="text" name="price{$smarty.section.i.index}" style="width:100%" value="{$form.data[i].price}"></td>
<td><input type="text" name="per{$smarty.section.i.index}" style="width:100%" value="{$form.data[i].per}"></td>
</tr>
{/section}
</table>
*}
{hidden name="id" value=$form.id}
{hidden name="mode" value=$system.mode}
{hidden name="item" value=$system.item}
{hidden name="authcode" value=$system.authcode}
{hidden name="action" value="edit"}
<div align="right" style="margin-top:10px">
{submit caption="OK"}
{button caption="Отмена" onclick="Windows.closeAll()"}
</div>
</form>