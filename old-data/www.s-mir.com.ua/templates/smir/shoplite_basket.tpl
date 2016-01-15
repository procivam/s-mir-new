<ol class="cartlist">
{section name=i loop=$basket}
<li class="item">
	<img src="/{$basket[i].data.images[0].path}">
	<span class="name">{$basket[i].data.name}</span>
	<div class="counter">
		<img class="left" src="{$system.tpldir}/img/counter-left.png">
			{*<span data-id="{$basket[i].id}" class="amount">{$basket[i].count}</span>*}
		<input style="border: medium none;text-align: center;width: 20px;" class="amount" type="text" name="count_{$basket[i].id}" value="{$basket[i].count}">
		<img class="right" src="{$system.tpldir}/img/counter-right.png">
	</div>
	<p><span class="price">{$basket[i].sum}</span>&nbsp;{$valute}</p>
</li>
{/section}
</ol>
<p class="overall">Всего&nbsp;:&nbsp;<span class="price">{$all.sum}</span>&nbsp;<span class="uah">{$valute}</span></p>