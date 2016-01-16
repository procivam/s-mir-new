<div class=" jcarousel-skin-tango">
    <div id="mycarousel">
        <div>
            <ul class="jcarousel-list">
                <?php foreach($result as $obj): ?>
                    <li class="jcarousel-item">
                        <div class="slidetext wTxt">
                            <?php echo $obj->text; ?>
                        </div>
                        <?php if($obj->url): ?>
                            <a href="<?php echo $obj->url; ?>">
                        <?php else: ?>
                            <span>
                        <?php endif; ?>
                            <?php if(is_file(HOST.Core\HTML::media('images/slider/big/'.$obj->image))): ?>
                                <img src="<?php echo Core\HTML::media('images/slider/big/'.$obj->image); ?>"
                                     alt="<?php echo $obj->name; ?>" title="<?php echo $obj->name; ?>">
                            <?php endif; ?>
                            </span>
                        <?php if($obj->url): ?>
                            </a>
                        <?php else: ?>
                            </span>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="jcarousel-prev"></div>
        <div class="jcarousel-next"></div>
    </div>
</div>
