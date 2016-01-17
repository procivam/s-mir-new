<ul class="cat_ul">
    <?php foreach( $result as $obj ): ?>
        <li>
            <a href="<?php echo Core\HTML::link('products/'.$obj->alias, true); ?>">
                <div class="img_block_cat">
                    <?php if( is_file(HOST.Core\HTML::media('images/catalog_tree/medium/'.$obj->image)) ): ?>
                        <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/catalog_tree/medium/'.$obj->image)); ?>"
                             alt="<?php echo $obj->name; ?>" title="<?php echo $obj->name; ?>" width="196">
                    <?php else: ?>
                        <img src="<?php echo Core\HTML::media('pic/no-image.png'); ?>" alt="" width="196" height="154">
                    <?php endif; ?>
                </div>
            </a>
            <a href="<?php echo Core\HTML::link('catalog/'.$obj->alias, true); ?>">
                <span><?php echo $obj->name; ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php echo $pager; ?>