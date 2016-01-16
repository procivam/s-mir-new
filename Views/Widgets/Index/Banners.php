<ul class="under_slider">
    <?php foreach ( $result as $obj ): ?>
        <li>
            <?php if (is_file(HOST.Core\HTML::media('images/banners/'.$obj->image))): ?>
                <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/banners/'.$obj->image)); ?>" alt="">
            <?php endif; ?>
            <div class="under_text">
                <p><?php echo $obj->small; ?></p>
                <p><?php echo $obj->big; ?></p>
                <br />
                <?php if ( $obj->url ): ?>
                    <a href="<?php echo $obj->url; ?>" class="slide_but"><span>подробнее</span></a>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>