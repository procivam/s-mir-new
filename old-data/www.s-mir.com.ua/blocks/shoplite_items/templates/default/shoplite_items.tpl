{section name=i loop=$items}
{image id=$items[i].idimg width=80 height=80 align="left"}
<h4><a href="{$items[i].link}">{$items[i].name}</a></h4>
<p>{$items[i].description}</p>
<p>Цена: {$items[i].price} {$valute} , <a href="{$items[i].tobasketlink}">В корзину</a></p>
<div class="clear"></div>
{/section}