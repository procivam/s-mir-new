<ul class="sitemap">
    <?php foreach($pages[0] AS $obj): ?>
        <li><a href="<?php echo Core\HTML::link($obj->alias); ?>"><?php echo $obj->name; ?></a>
            <?php echo Core\View::tpl(array('result' => $pages, 'cur' => $obj->id, 'add' => ''), 'Sitemap/Recursive'); ?>
        </li>
    <?php endforeach; ?>
    <li><a href="<?php echo Core\HTML::link('products'); ?>">Каталог</a>
        <?php echo Core\View::tpl(array('result' => $groups, 'cur' => 0, 'add' => '/products'), 'Sitemap/Recursive'); ?>
    </li>
    <li><a href="<?php echo Core\HTML::link('news'); ?>">Новости</a>
        <?php if(count($news)): ?>
            <ul>
                <?php foreach($news AS $obj): ?>
                    <li><a href="<?php echo Core\HTML::link('news/'.$obj->alias); ?>"><?php echo $obj->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </li>
</ul>