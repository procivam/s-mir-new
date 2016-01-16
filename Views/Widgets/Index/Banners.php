<table width="100%" class="ban">
    <tbody>
        <tr>
            <?php foreach ( $result as $key => $obj ): ?>
                <td>
                    <a href="<?php echo $obj->url ? $obj->url : '#' ?>" target="_blank" title="<?php echo $obj->name; ?>">
                        <?php if (is_file(HOST.Core\HTML::media('images/banners/'.$obj->image))): ?>
                            <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/banners/'.$obj->image)); ?>"
                                 alt="<?php echo $obj->text; ?>" title="<?php echo $obj->text; ?>" width="197" height="155">
                        <?php endif; ?>
                    </a>
                </td>
                <td>
                    <p class="bannazv<?php echo $key + 1; ?>"><?php echo $obj->text; ?></p>
                </td>
                <?php echo $key + 1 == 1 ? '<td class="ban2">&nbsp;</td>' : ''; ?>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="10" class="ban6"></td>
        </tr>
    </tbody>
</table>
