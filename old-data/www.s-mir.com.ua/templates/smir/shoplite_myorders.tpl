{include file="_header.tpl"}

<h1>Мои заказы</h1>

{if $orders}
<table border="1">
<tr>
<th>№</th>
<th>Состав</th>
<th>Сумма</th>
<th>Статус</th>
</tr>
{section name=i loop=$orders}
<tr>
<td>{$orders[i].id}</td>
<td>
{section name=j loop=$orders[i].basket}
{$orders[i].basket[j].data.name} - {$orders[i].basket[j].count} шт.<br>
{/section}
</td>
<td>{$orders[i].sum} {$valute}</td>
<td>{if $orders[i].status>0}Обработан{else}Ожидает{/if}</td>
</tr>
{/section}
</table>
{object obj=$orders_pager}
{else}
<p>Нет данных.</p>
{/if}

{include file="_footer.tpl"}