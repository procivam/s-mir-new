{include file="_header.tpl"}

<h1>Сравнение</h1>

{if $items}

<table>
<tr>
<th>Название</th>
{section name=i loop=$items}
<td><a href="{$items[i].link}">{$items[i].name}</a></td>
{/section}
</tr>
<tr>
<th>Фото</th>
{section name=i loop=$items}
<td align="center">
<a href="{$items[i].link}">{image data=$items[i].images height=160 width="160" popup=true}</a><br>
<a href="{$items[i].tobasketlink}">В корзину</a><br>
<a href="{$items[i].deletelink}">Удалить</a>
</td>
{/section}
</tr>
<tr>
<th>Цена</th>
{section name=i loop=$items}
<td>{$items[i].price} {$valute}</td>
{/section}
</tr>
{foreach from=$fields key=field item=caption}
<tr>
<th>{$caption}</th>
{section name=i loop=$items}
<td>{$items[i].$field}</td>
{/section}
</tr>
{/foreach}
</table>

{else}
Нет товаров для сравнения.<br>
{/if}

<p><a href="{$system.prevlink}">Вернуться</a></p>

{include file="_footer.tpl"}