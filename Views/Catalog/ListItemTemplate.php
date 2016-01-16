<li class="list-item">
    <a href="<?php echo Core\HTML::link($obj->alias.'/p'.$obj->id); ?>" class="img_tovar">
        <?php if( is_file(HOST.Core\HTML::media('images/catalog/medium/'.$obj->image)) ): ?>
            <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/catalog/medium/'.$obj->image)); ?>" alt="<?php echo $obj->name; ?>">
        <?php else: ?>
            <img src="<?php echo Core\HTML::media('pic/no-photo.png'); ?>" alt="">
        <?php endif ?>
        <?php #echo Core\Support::addItemTag($obj); ?>
    </a>

    <a href="<?php echo Core\HTML::link($obj->alias.'/p'.$obj->id); ?>" class="tovar_name"><span><?php echo $obj->name; ?></span></a>
    <p class="short-desc"><?php echo $obj->short_text; ?></p>
    <?php if( $obj->sale ): ?>
        <div class="old_price">грн.. <span><?php echo $obj->cost_old; ?>.-</span></div>
    <?php endif; ?>
    <div class="tovar_price">грн.. <span><?php echo $obj->cost; ?>.-</span></div>

    <a href="<?php echo Core\HTML::link($obj->alias.'/p'.$obj->id); ?>" data-id="<?php echo $obj->id; ?>" class="bye addToCart"><span>Купить</span></a>
</li>
