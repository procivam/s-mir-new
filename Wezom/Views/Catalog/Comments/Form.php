<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="rowSection">
        <div class="col-md-6">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Основный данные
                    </div>
                </div>
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <div class="widgetContent" style="min-height: 150px;">
                            <div id="itemPlace" class="form-vertical row-border">
                                <?php if(is_file(HOST.\Core\HTML::media('images/catalog/big/'.$item->image))): ?>
                                    <a rel="lightbox" href="<?php echo \Core\HTML::media('images/catalog/big/'.$item->image); ?>">
                                        <img class="someImage" src="<?php echo \Core\HTML::media('images/catalog/medium/'.$item->image); ?>">
                                    </a>
                                <?php endif; ?>
                                <div class="someBlock">
                                    <a target="_blank" href="/wezom/items/edit/<?php echo $item->id; ?>"><?php echo $item->name; ?></a>
                                </div>
                                <div class="someBlock">
                                    <b>Бренд:</b> <a target="_blank" href="/wezom/brands/edit/<?php echo $item->brand_id; ?>">Nike</a>
                                </div>
                                <div class="someBlock">
                                    <b>Цена:</b> <?php echo $item->cost; ?> грн
                                </div>
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
                                <label class="control-label" for="f_city">Город</label>
                                <div class="">
                                    <input class="form-control valid" id="f_city" type="text" name="FORM[city]" value="<?php echo $obj->city; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="f_text">Сообщение</label>
                                <div class="">
                                    <textarea name="FORM[text]" id="f_text" rows="10" class="valid form-control"><?php echo str_replace('<br />', "", $obj->text); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="catalog_id" value="<?php echo $item->id; ?>" id="orderItemId" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget box loadedBox" id="orderItemsBlock">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Изменить товар
                    </div>
                </div>
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <div id="orderItemsBlock">
                            <div class="form-group" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <select data-name="parent_id" class="form-control">
                                        <option value="0"> - Не выбрано - </option>
                                        <?php echo $tree; ?>
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <input data-name="search" class="form-control" type="text" placeholder="Начните вводить название или артикул товара" />
                                </div>
                            </div>
                            <div class="widgetContent" style="min-height: 150px;">
                                <div id="orderItemsList" class="form-vertical row-border" data-id="<?php echo \Core\Route::param('id'); ?>" data-limit="5">
                                    <p class="relatedMessage">Выберите группу или начните писать название товара или артикул в поле для ввода расположенном выше. После чего на этом месте появится список товаров</p>
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
        };;
        pickerInit('.myPicker');
    });
</script>