<div class="cart">
	<a style="text-decoration:none" href="{if $all.count!=0}/catalog/order.html{else}javascript:void(0);{/if}"><img src="{$system.tpldir}/img/shopping-cart-cart.png">
	<h1>Ваша корзина</h1>
	<p><span class="amount">{$all.count}</span> товар - <span class="price">{$all.sum}</span>{$valute}</p>
	</a>
</div>