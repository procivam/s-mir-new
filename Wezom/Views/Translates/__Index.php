<form id="myForm" class="rowSection validat" method="post" action="" enctype="multipart/form-data" style="margin-bottom: 20px;">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div class="form-actions" style="display: none;">
                        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
                    </div>
                    <div class="widgetContent">
                        <ul class="liTabs t_wrap">
                            <?php foreach( $languages AS $_key => $lang ): ?>
                                <?php $public = \Core\Arr::get($result, $_key, array()); ?>
                                <li class="t_item">
                                    <a class="t_link" href="#"><?php echo $lang['name']; ?></a>
                                    <div class="t_content">
                                        <?php foreach( $public AS $key => $value ): ?>
                                            <div class="form-group">
                                                <label class="control-label"><?php echo $key; ?></label>
                                                <div class="">
                                                    <input class="form-control valid" name="<?php echo $_key; ?>[<?php echo $key; ?>]" type="text" value="<?php echo $value; ?>" />
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>