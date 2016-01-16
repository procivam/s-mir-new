<table align="left" border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th></th>
        <th>Артикул</th>
        <th>Товар</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Итог</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach( $cart as $obj ): ?>
        <tr>
            <td>
                <?php if( is_file(HOST.Core\HTML::media('images/catalog/medium/'.$obj->image)) ): ?>
                    <img src="<?php echo Core\HTML::link('Media/images/catalog/small/'.$obj->image, true); ?>" width="80" />
                <?php endif; ?>
            </td>
            <td><?php echo $obj->artikul; ?></td>
            <td>
                <?php echo $obj->name; ?>
                <br>
                Размер: <?php echo $obj->size_name; ?>
                <br>
                Цвет: <?php echo $obj->color_name; ?>
            </td>
            <td><?php echo $obj->price; ?> грн.</td>
            <td><?php echo $obj->count; ?></td>
            <td><?php echo $obj->count * $obj->price; ?> грн.</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>