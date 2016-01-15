{include file="_header.tpl"}

<h1>Прайс</h1>

{section name=i loop=$categories}
{if $categories[i].items}
<h3>{$categories[i].name}</h3>
<table width="100%" border="1">
<tr>
<th>Название</th>
<th>Цена</th>
<th>В наличии</th>
<th>&nbsp;</th>
</tr>
{section name=j loop=$categories[i].items}
<tr>
<td>{$categories[i].items[j].name}</td>
<td>{$categories[i].items[j].price}</td>
<td>{if $categories[i].items[j].available}Да{else}Нет{/if}</td>
<td><a href="{$categories[i].items[j].tobasketlink}">В корзину</a></td>
</tr>
{/section}
</table>
{/if}
{/section}

{include file="_footer.tpl"}