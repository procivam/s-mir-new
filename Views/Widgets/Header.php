<header class="wHeader">
    <div class="wSize">
        <div class="head_top">
            <div class="fll">
                <ul>
                    <li><a href="<?php echo Core\HTML::link(); ?>"><div class="gl"></div></a></li>
                    <?php foreach ( $contentMenu as $obj ): ?>
                        <li><a href="<?php echo Core\HTML::link($obj->url); ?>"><?php echo $obj->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="flr">
                <div class="block_p">
                    <a href="tel:<?php echo Core\Config::get( 'static.phone' ); ?>?call" class="head_phone"><?php echo Core\Config::get( 'static.phone' ); ?></a>
                    <a href="#enterReg2" class="call_back enterReg2"><span>ОБРАТНЫЙ ЗВОНОК</span></a>
                </div>
            </div>
            <div class="flc">
                <!-- <a href="<?php // echo Core\HTML::link(); ?>"><img src="<?php // echo Core\HTML::media('pic/logo.png'); ?>" alt=""></a> -->
            </div>
        </div>
        <div class="head_center">
            <div class="fll">
                <ul class="soc_seti">
                    <li><a href="<?php echo Core\Config::get( 'socials.vk'); ?>" class="circle_seti" target="_blank"><span class="img_seti"></span><div class="name_seti"></div><div class="name_seti"></div></a></li>
                    <li><a href="<?php echo Core\Config::get( 'socials.fb'); ?>" class="circle_seti" target="_blank"><span class="img_seti"></span><div class="name_seti"></div><div class="name_seti"></div></a></li>
                    <li><a href="<?php echo Core\Config::get( 'socials.instagram'); ?>" class="circle_seti" target="_blank"><span class="img_seti"></span><div class="name_seti"></div><div class="name_seti"></div></a></li>
                </ul>
            </div>
            <div class="flr">
                <?php if ( !$user ): ?>
                    <a href="#enterReg" class="enter enterReg"><span>Вход</span></a>
                <?php else: ?>
                    <a href="<?php echo Core\HTML::link('account'); ?>" class="basket enter"><span>Кабинет</span></a>
                    <a href="<?php echo Core\HTML::link('account/logout'); ?>" class="basket"><span>Выход</span></a>
                <?php endif ?>
                <a href="<?php echo Core\HTML::link('cart'); ?>" class="basket"><span>Корзина</span></a>
                <a href="#orderBasket" class="basket_img wb_edit_init wb_butt"><div class="paket"></div><span class="paket_in"></span><span id="topCartCount"><?php echo $countItemsInTheCart; ?></span></a>
            </div>
            <?php echo Core\Widgets::get( 'Info' ); ?>
        </div>
        <div class="head_bot">
            <?php echo Core\Widgets::get( 'CatalogMenuTop' ); ?>
            <div class="lupa"></div>
            <div class="poisk_block">
                <form action="<?php echo Core\HTML::link('search'); ?>" method="GET">
                    <input type="text" name="query" placeholder="Поиск по сайту">
                    <input type="submit" value="искать">
                </form>
            </div>
        </div>
    </div>
</header>