<table width="100%" class="mainnews">
    <tbody>
    <tr>
        <?php foreach($result as $obj): ?>
            <td class="mainnews1">
                <p class="mainnewsnazv">
                    <a href="<?php echo Core\HTML::link('news/'.$obj->alias); ?>"><?php echo $obj->name; ?></a>
                </p>
                <div class="wTxt"><?php echo Core\Text::limit_words(strip_tags($obj->text), 50, '...'); ?></div>
            </td>
        <?php endforeach; ?>
    </tr>
    <tr>
        <td>
            <p class="mainnew-readmore">Полезно почитать <a href="<?php echo Core\HTML::link('news'); ?>">Читать все</a></p>
        </td>
    </tr>
    <tr>
        <td colspan="10" class="ban6"></td>
    </tr>
    </tbody>
</table>