<?php if(\Core\User::god() || \Core\User::caccess() == 'edit'): ?>
    <div class="rowSection">
        <div class="col-md-7">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Добавить сопутствующий товар
                    </div>
                </div>
                <div class="widgetContent" id="relatedItemsBlock">
                    <div class="form-vertical row-border">
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
                            <div id="relatedList" class="form-vertical row-border" data-item="<?php echo $itemID; ?>" data-limit="5">
                                <p class="relatedMessage">Выберите группу или начните писать название товара или артикул в поле для ввода расположенном выше. После чего на этом месте появится список товаров</p>
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
                        Сопутствующие товары
                    </div>
                </div>
                <div class="widgetContent" id="relatedItemsBlock">
                    <div class="form-vertical row-border">
                        <div class="widgetContent" style="min-height: 150px;">
                            <div class="form-vertical row-border listSimilar">
                                <?php foreach($items as $item): ?>
                                    <div class="relatedItem active" data-id="<?php echo $item->id; ?>">
                                        <?php if (is_file(HOST.\Core\HTML::media('images/catalog/medium/'.$item->image))): ?>
                                            <img src="<?php echo \Core\HTML::media('images/catalog/medium/'.$item->image); ?>" />
                                        <?php endif ?>
                                        <div class="relatedName"><?php echo $item->name; ?><br><?php echo $item->cost; ?> грн</div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="rowSection">
        <div class="col-md-12">
            <div class="widget box loadedBox">
                <div class="widgetHeader myWidgetHeader">
                    <div class="widgetTitle">
                        <i class="fa-file"></i>
                        Сопутствующие товары
                    </div>
                </div>
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <div class="widgetContent" style="min-height: 150px;">
                            <div class="form-vertical row-border listSimilar">
                                <?php foreach($items as $item): ?>
                                    <div class="relatedItem2 active" data-id="<?php echo $item->id; ?>">
                                        <?php if (is_file(HOST.\Core\HTML::media('images/catalog/medium/'.$item->image))): ?>
                                            <img src="<?php echo \Core\HTML::media('images/catalog/medium/'.$item->image); ?>" />
                                        <?php endif ?>
                                        <div class="relatedName"><?php echo $item->name; ?><br><?php echo $item->cost; ?> грн</div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
