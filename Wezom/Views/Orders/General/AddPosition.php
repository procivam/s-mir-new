<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="rowSection">
        <div class="col-md-7">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Добавить товар в заказ
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
        <div class="col-md-5">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Выбранный товар
                    </div>
                </div>
                <div class="widgetContent" id="orderItemsBlock">
                    <div class="form-vertical row-border">
                        <div class="widgetContent" style="min-height: 150px;">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="f_count">Количество</label>
                                <div class="col-md-10">
                                    <input id="f_count" class="form-control valid" type="number" min="0" max="" name="count" value="1" />
                                </div>
                            </div>
                            <div class="form-vertical row-border" id="itemPlace">
                                <p class="relatedMessage">Еще не выбран ни один товар!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="catalog_id" value="" id="orderItemId" />
            </div>
        </div>
    </div>
</form>