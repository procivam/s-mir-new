<table width="100%" border="0">
    <tbody><tr>
        <td class="wh1 gallery">
            <?php foreach( $images as $key => $im ): ?>
                <?php if( !is_file(HOST.Core\HTML::media('images/catalog/big/'.$im->image))) continue; ?>
                <?php if($key == 0): ?>
                    <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/catalog/big/'.$im->image)); ?>" width="373" alt="<?php echo $obj->name; ?>"/>
                <?php endif; ?>
                <a href="<?php echo Core\HTML::media('images/catalog/original/'.$im->image); ?>" rel="prettyPhoto[gallery1]">
                    <img src="<?php echo \Core\ImageCache::factory()->cache(Core\HTML::media('images/catalog/small/'.$im->image)); ?>" width="125" alt="">
                </a>
            <?php endforeach; ?>
        </td>
        <td class="wh2">
            <p class="bannazv5"><?php echo $obj->name; ?></p>
            <?php if ($obj->sale): ?>
                <div class="old_price2">
                    <span><?php echo $obj->cost_old; ?></span> грн
                </div>
            <?php endif ?>
            <p class="price"><b>грн..</b> <?php echo $obj->cost; ?>.- </p>
            <p class="wline1"></p>
            <a href="#" class="bye addToCart" data-id="<?php echo $obj->id; ?>">Купить</a>
            <p class="otstup25"></p>
        </td>
    </tr>
    </tbody></table>

<p class="wline2"></p>

<div class="tabshift">
    <?php if(trim(strip_tags($obj->text))): ?>
        <a rel="tabsulator1" href="javascript:void(0);">Описание</a>
    <?php endif; ?>

    <?php if(trim(strip_tags($obj->characteristics))): ?>
        <a rel="tabsulator2" href="javascript:void(0);">Характеристики</a>
    <?php endif; ?>

    <?php if(trim(strip_tags($obj->gallery))): ?>
        <a rel="tabsulator3" href="javascript:void(0);">Строчки</a>
    <?php endif; ?>

    <?php if(trim(strip_tags($obj->equipment))): ?>
        <a rel="tabsulator4" href="javascript:void(0);">Комплектация</a>
    <?php endif; ?>
</div>


<?php if(trim(strip_tags($obj->text))): ?>
    <div class="tabsulators" id="tabsulator1">
        <?php echo $obj->text; ?>
    </div>
<?php endif; ?>

<?php if(trim(strip_tags($obj->characteristics))): ?>
    <div class="tabsulators" id="tabsulator2">
        <?php echo $obj->characteristics; ?>
    </div>
<?php endif; ?>

<?php if(trim(strip_tags($obj->gallery))): ?>
    <div class="tabsulators" id="tabsulator3" style="display:none;">
        <?php echo $obj->gallery; ?>
    </div>
<?php endif; ?>

<?php if(trim(strip_tags($obj->equipment))): ?>
    <div class="tabsulators" id="tabsulator4" style="display:none;">
        <?php echo $obj->equipment; ?>
    </div>
<?php endif; ?>

<script>
    $(function(){
        var rel = $('.tabshift a:first').addClass('active').attr('rel');
        $('.tabsulators').hide();
        $('#'+rel).show();
    });
</script>

<?php echo Core\Widgets::get('Item_SocialReviews'); ?>
