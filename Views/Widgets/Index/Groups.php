<table width="100%" border="1">
    <tbody>
        <tr>
            <?php $i = 0; ?>
            <?php foreach($result as $key => $obj): ?>
                <td class="tdblock">
                    <div class="block" rel="<?php echo Core\HTML::media('pic/fonkv'.(++$i > 4 ? $i = 1 : $i).'.jpg'); ?>">
                        <a href="<?php echo Core\HTML::link('products/'.$obj->alias); ?>">
                            <?php if(is_file(HOST.Core\HTML::media('images/catalog_tree/small/'.$obj->image))): ?>
                                <img src="<?php echo Core\HTML::media('images/catalog_tree/small/'.$obj->image); ?>"
                                     alt="<?php echo $obj->name; ?>" title="<?php echo $obj->name; ?>">
                            <?php else: ?>
                                <img src="<?php echo Core\HTML::media('pic/no-image-catalog_tree-small.png'); ?>">
                            <?php endif; ?>
                            <span><?php echo $obj->name; ?></span>
                        </a>
                    </div>
                </td>
                <?php if (++$key % 5 == 0 && $key != 0): ?>
                    </tr><tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    </tbody>
</table>
