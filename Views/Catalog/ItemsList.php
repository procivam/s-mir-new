<?php echo Core\Widgets::get('CatalogSort', array('category' => $category, 'brands' => $brands)); ?>
<?php if( !count($result) ): ?>
    <p>По заданым параметрам товаров нет</p>
<?php else: ?>
    <ul class="product-list">
        <?php foreach( $result as $obj ): ?>
            <?php echo Core\View::tpl(array('obj' => $obj), 'Catalog/ListItemTemplate'); ?>
        <?php endforeach; ?>
    </ul>
    <?php echo $pager; ?>
<?php endif; ?>