<form id="myForm" class="rowSection validat" method="post" action="" enctype="multipart/form-data">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="col-md-12">
        <div class="widget box">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Основные данные
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div class="form-group">
                        <label class="control-label">Опубликовано</label>
                        <div class="">
                            <label class="checkerWrap-inline">
                                <input name="status" value="0" type="radio" <?php echo (!$obj->status AND $obj) ? 'checked' : ''; ?>>                            
                                Нет
                            </label>
                            <label class="checkerWrap-inline">
                                <input name="status" value="1" type="radio" <?php echo ($obj->status OR !$obj) ? 'checked' : ''; ?>>
                                Да
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_name">Название</label>
                        <div class="">
                            <input id="f_name" class="form-control translitSource valid" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_url">Ссылка</label>
                        <div class="">
                            <input id="f_url" class="form-control translitSource" name="FORM[url]" type="text" value="<?php echo $obj->url; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <div class="">
                            <?php if (is_file( HOST . Core\HTML::media('images/slider/big/'.$obj->image) )): ?>
                                <a href="<?php echo Core\HTML::media('images/slider/big/'.$obj->image); ?>" rel="lightbox">
                                    <img src="<?php echo Core\HTML::media('images/slider/small/'.$obj->image); ?>" />
                                </a>
                                <br />
                                <a class="otherLink" href="/wezom/<?php echo Core\Route::controller(); ?>/delete_image/<?php echo $obj->id; ?>">Удалить изображение</a>
                                <br />
                                <a href="<?php echo \Core\General::crop('slider', 'small', $obj->image); ?>">Редактировать</a>
                            <?php else: ?>
                                <input type="file" name="file" />
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>