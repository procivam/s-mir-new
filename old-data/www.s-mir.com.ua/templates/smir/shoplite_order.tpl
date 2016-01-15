{include file="_header.tpl"}
<body class="inerfon">
<div class="main shoppingCart">
<div class="header">
	<div class="header_inner">
		{include file="logo.tpl"}
        {block id = "search"}
		{block id = "tel"}	    
		{block id="basketheader"}
		<div class="clearfix"></div>
		{block id ="menu"}
	</div>
</div>
<div class="wrapper">
	<div class="alpfainer">
		<h1>Оформление заказа</h1>

		<ul class="pathTo">
			<li class="toIndex"><a href="/">Главная</a>&nbsp;></li>
			<li>Корзина</li>
		</ul>

		<form method="post" data-parsley-validate>
			<p class="p5"><input id="inp3" name="name" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">имя</p>   
			<p class="p5"><input id="inp3" name="phone" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">Телефон</p>
			<p class="p5"><input id="inp3" name="email" type="text" size="10" value="" class="toggle-inputs" parsley-required="true">E-mail</p>
			<p class="p5">
			Способ доставки
			</p>
			 
			<p class="p5">
			 </p>
			<table width="100%" border="0">
				<tbody>
					<tr>
						<td class="td6"><textarea name="comments" id="inp4"></textarea></td>
						<td class="td8_2">Примечание</td>
					</tr>
				</tbody>
			</table>
				<p></p>
			<table width="100%" border="0" class="tb2">
				<tbody>
					<tr>
						<td class="td6"><input id="inp5" type="text" size="10" name="captcha" value="" class="toggle-inputs" parsley-required="true"></td>
						<td class="td7">{captcha width="75" height="25"}</td>
						<td>Введите код </td>
					</tr>
				</tbody>
			</table>
				<br>	
			<input type="hidden" name="action" value="order">
			<input name="savebutton" class="inerlink2" type="submit" value="Отправить" style="width:120px">
		</form>
	</div>

	<img src="{$system.tpldir}/img/alphaline1-vertical.jpg" class="divider">

	<div class="listContainer" id="basket-items">
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
	</div>
</div>

{include file="_footer.tpl"}

</div>
</body>
</html>