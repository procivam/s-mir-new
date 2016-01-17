<div class="header">
    <div class="header_inner">
        <?php if(Core\Route::controller() == 'index'): ?>
            <span class="logo">
                <img src="<?php echo Core\HTML::media('pic/logo.png'); ?>">
            </span>
        <?php else: ?>
            <a href="<?php echo Core\HTML::link(); ?>" class="logo">
                <img src="<?php echo Core\HTML::media('pic/logo.png'); ?>">
            </a>
        <?php endif; ?>

        <div class="poisk">
            <form action="<?php echo Core\HTML::link('search'); ?>" method="get">
                <input id="inp1" name="query" type="text" size="15" class="toggle-inputs"
                       value="<?php echo isset($_GET['query']) ? urldecode($_GET['query']) : 'Что ищите?'; ?>">
                <input id="inp2" type="image" src="<?php echo Core\HTML::media('pic/loopa.png'); ?>">
            </form>
        </div>
        <div class="phone-wrapp">
            <a href="tel:<?php echo filter_var(Core\Config::get('static.phone'), FILTER_SANITIZE_NUMBER_INT); ?>"
               style="color: rgb(0, 0, 255);"><?php echo Core\Config::get('static.phone'); ?></a>
        </div>
        <div style="text-align: right;">
            <strong>
                <span style="color: rgb(0, 0, 255);"> s-mir.com.ua&nbsp; </span>
            </strong>
        </div>

        <div class="cart">
            <a href="<?php echo Core\HTML::link('cart'); ?>">
                <img src="<?php echo Core\HTML::media('pic/shopping-cart-cart.png'); ?>">
                <span class="cart-text">Ваша корзина</span>
                <p><span class="amount" id="topCartCount"><?php echo $countItemsInTheCart; ?></span> шт. - <span class="price" id="topCartAmount"><?php echo $totalCartAmount; ?></span>грн.</p>
            </a>
        </div>
        <div class="clearfix"></div>

        <ul class="topmen">
            <?php foreach ( $contentMenu as $obj ): ?>
                <li><a href="<?php echo Core\HTML::link($obj->url); ?>"><?php echo $obj->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
