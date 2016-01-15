{include file="_header.tpl"}

<h1>Корзина</h1>

{if $basket}

<form method="post">
<table width="100%" border="1">
<tr>
<td>Наименование товара</td>
<td>Кол-во</td>
<td>Цена</td>
<td>Удалить</td>
</tr>
{section name=i loop=$basket}
<tr>
<td>{$basket[i].data.name}</td>
<td><input type="text" name="count_{$basket[i].id}" value="{$basket[i].count}"></td>
<td>{$basket[i].sum} {$valute}</td>
<td><a href="{$basket[i].deletelink}">Удалить</a></td>
</tr>
{/section}
</table>

<p>Товаров в корзине: {$all.count}, на общую сумму: {$all.sum} {$valute}.</p>

<p align="right">
{submit caption="Пересчитать"}
{hidden name="action" value="recalcbasket"}
</p>

</form>


<a href="{$system.prevlink}">Вернуться</a><br>
<a href="{$orderlink}">Оформить заказ</a><br>

{else}
Корзина пуста.<br>
<a href="{$system.prevlink}">Вернуться</a><br>

{/if}

{include file="_footer.tpl"}