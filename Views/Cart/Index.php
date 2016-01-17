<div class="listContainer wBasket" id="basket-items">
    <?php if( count($cart) ): ?>
        <ol class="cartlist">
            <?php $amount = 0; ?>
            <?php foreach( $cart as $key => $item ): ?>
                <?php $obj = Core\Arr::get( $item, 'obj' ); ?>
                <?php if( $obj ): ?>
                    <li class="item wb_item" data-id="<?php echo $obj->id; ?>" data-count="<?php echo Core\Arr::get($item, 'count', 1) ?>"
                        data-price="<?php echo $obj->cost; ?>">
                        <?php if( is_file(HOST.Core\HTML::media('images/catalog/medium/'.$obj->image)) ): ?>
                            <a href="<?php echo Core\HTML::link($obj->alias.'/p'.$obj->id); ?>" class="wbLeave">
                                <img src="<?php echo Core\HTML::media('images/catalog/medium/'.$obj->image); ?>" />
                            </a>
                        <?php endif; ?>

                        <span class="name"><?php echo $obj->name; ?></span>

                        <div class="counter wb_amount">
                            <img class="left" data-spin="minus" class="editCountItem"
                                 src="<?php echo Core\HTML::media('pic/counter-left.png')?>">

                            <input style="border: medium none;text-align: center;width: 20px;" class="amount editCountItem"
                                   type="text" value="<?php echo Core\Arr::get($item, 'count', 1); ?>">

                            <img class="right" data-spin="plus" class="editCountItem"
                                 src="<?php echo Core\HTML::media('pic/counter-right.png') ?>">
                        </div>
                        <p class="wb_price_totl"><span class="price"><?php echo $obj->cost * Core\Arr::get($item, 'count', 1); ?></span>&nbsp;грн.</p>
                        <span class="wb_del">x</span>
                    </li>
                    <?php $amount += $obj->cost * Core\Arr::get($item, 'count', 1); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
        <p class="overall wb_total">Всего&nbsp;:&nbsp;<span class="price" id="topCartAmount"><?php echo $amount; ?></span>&nbsp;<span class="uah">грн.</span></p>
    <?php else: ?>
        <p class="emptyCartBlock">Ваша корзина пуста. <a href="<?php echo Core\HTML::link('products'); ?>">Начните делать покупки прямо сейчас!</a></p>
    <?php endif; ?>
</div>