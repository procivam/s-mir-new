{include file="_header.tpl"}

<h1>{$section_name}</h1>

<p>Ваш заказ №{$order.id} отправлен.</p>

<h3>Информация:</h3>
<p>
{section name=i loop=$basket}
{$basket[i].data.name} - {$basket[i].count} шт. {$basket[i].sum} {$valute}<br>
{/section}
</p>
<p>Общая сумма заказа: {$all.sum} {$valute}</p>

{include file="_footer.tpl"}