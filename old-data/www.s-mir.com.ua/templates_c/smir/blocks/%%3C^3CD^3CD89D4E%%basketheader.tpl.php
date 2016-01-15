<?php /* Smarty version 2.6.26, created on 2015-10-22 16:31:46
         compiled from basketheader.tpl */ ?>
<div class="cart">
	<a style="text-decoration:none" href="<?php if ($this->_tpl_vars['all']['count'] != 0): ?>/catalog/order.html<?php else: ?>javascript:void(0);<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['system']['tpldir']; ?>
/img/shopping-cart-cart.png">
	<h1>Ваша корзина</h1>
	<p><span class="amount"><?php echo $this->_tpl_vars['all']['count']; ?>
</span> товар - <span class="price"><?php echo $this->_tpl_vars['all']['sum']; ?>
</span><?php echo $this->_tpl_vars['valute']; ?>
</p>
	</a>
</div>