<form id="myForm" class="rowSection validat" method="post" action="" data-action="blog">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="rowSection">
        <div class="col-md-6">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Основные данные
                    </div>
                </div>
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <div class="widgetContent" style="min-height: 150px;">
                            <div id="itemPlace" class="form-vertical row-border">
                                <?php if(is_file(HOST.\Core\HTML::media('images/blog/big/'.$item->image))): ?>
                                    <a rel="lightbox" href="<?php echo \Core\HTML::media('images/blog/big/'.$item->image); ?>">
                                        <img class="someImage" src="<?php echo \Core\HTML::media('images/blog/small/'.$item->image); ?>">
                                    </a>
                                <?php endif; ?>
                                <div class="someBlock">
                                    <a target="_blank" href="/wezom/blog/edit/<?php echo $item->id; ?>"><?php echo $item->name; ?></a>
                                </div>
                                <?php if( $item->rubric ): ?>
                                    <div class="someBlock">
                                        <b>Рубрика:</b> <?php echo $item->rubric; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if( $item->date ): ?>
                                    <div class="someBlock">
                                        <b>Дата публикации:</b> <?php echo date('d.m.Y', $item->date); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="clear"></div>
                            <div class="form-group">
                                <label class="control-label">Опубликован</label>
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
                                <label class="control-label" for="f_date">Дата</label>
                                <div class="">
                                    <input class="form-control valid myPicker" id="f_date" type="text" name="FORM[date]" value="<?php echo date('d.m.Y', $obj->date); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="f_name">Имя</label>
                                <div class="">
                                    <input class="form-control valid" id="f_name" type="text" name="FORM[name]" value="<?php echo $obj->name; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="f_text">Сообщение</label>
                                <div class="">
                                    <textarea name="FORM[text]" id="f_text" rows="10" class="valid form-control"><?php echo $obj->text; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="f_date_answer">Дата ответа администратора</label>
                                <div class="">
                                    <input class="form-control myPicker2" id="f_date_answer" type="text" name="FORM[date_answer]" value="<?php echo $obj->date_answer ? date('d.m.Y', $obj->date_answer) : NULL; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="f_text">Ответ администратора</label>
                                <div class="">
                                    <textarea name="FORM[answer]" id="f_text" rows="10" class="form-control"><?php echo $obj->answer; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="blog_id" value="<?php echo $item->id; ?>" id="orderItemId" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget box loadedBox" id="orderItemsBlock">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Указать запись из блога
                    </div>
                </div>
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <div id="orderItemsBlock">
                            <div class="form-group" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <select data-name="blog_id" class="form-control">
                                        <option value="0"> - Не выбрано - </option>
                                        <?php foreach( $rubrics AS $key => $value ): ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <input data-name="search" class="form-control" type="text" placeholder="Начните вводить название записи" />
                                </div>
                            </div>
                            <div class="widgetContent" style="min-height: 150px;">
                                <div id="orderItemsList" class="form-vertical row-border" data-id="<?php echo \Core\Route::param('id'); ?>" data-limit="16">
                                    <p class="relatedMessage">Выберите рубрику или начните писать название записи в блоге в поле для ввода расположенном выше. После чего на этом месте появится список отфильтрованных записей</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(function(){
        var pickerInit = function( selector ) {
            var date = $(selector).val();
            $(selector).datepicker({
                showOtherMonths: true,
                selectOtherMonths: false
            });
            $(selector).datepicker('option', $.datepicker.regional['ru']);
            var dateFormat = $(selector).datepicker( "option", "dateFormat" );
            $(selector).datepicker( "option", "dateFormat", 'dd.mm.yy' );
            $(selector).val(date);
        };
        pickerInit('.myPicker');
        pickerInit('.myPicker2');
    });
</script>