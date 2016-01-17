<table width="100%" border="0" class="leftmen">
    <tbody>
        <?php foreach ($result as $obj): ?>
            <tr>
                <td class="leftmen1">
                    <a href="<?php echo Core\HTML::link('products/'.$obj->alias, true); ?>">
                        <?php if(is_file(HOST.Core\HTML::media('images/catalog_tree/small/'.$obj->image))): ?>
                            <img src="<?php echo Core\HTML::media('images/catalog_tree/small/'.$obj->image); ?>"
                                 alt="<?php echo $obj->name; ?>" title="<?php echo $obj->name; ?>">
                        <?php else: ?>
                            <img src="<?php echo Core\HTML::media('pic/no-image-catalog_tree-small.png'); ?>">
                        <?php endif; ?>
                    </a>
                </td>
                <td class="leftmen2">
                    <a href="<?php echo Core\HTML::link('products/'.$obj->alias, true); ?>">
                        <span style="width:130px;"><?php echo $obj->name; ?></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
