{$site_name} - Заказ.
Ф.И.О.:  {$data.name|escape}
Контактный телефон:  {$data.phone|escape}
Е-mail: {$data.email|escape}
Адрес доставки: {$data.address|escape}
Комментарий к заказу: {$data.comments|escape}

Информация о заказе:
{section name=i loop=$basket}
{$smarty.section.i.iteration}. {$basket[i].data.name} - {$basket[i].count} шт. {$basket[i].sum} {$valute}
{/section}

Общая сумма заказа: {$all.sum} {$valute}

{if $courier}
Доставка: {$courier.fullname}
{/if}
