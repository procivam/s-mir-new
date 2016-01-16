<form id="myForm" class="rowSection validat" method="post" action="" data-action="users">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widgetContent">
                <div class="form-horizontal row-border">
                    <div id="itemPlace" class="form-vertical row-border">
                        <?php if( $item ): ?>
                            <div class="someBlock">
                                <a target="_blank" href="/wezom/users/edit/<?php echo $item->id; ?>"><?php echo $item->last_name.' '.$item->name.' '.$item->middle_name; ?></a>
                            </div>
                            <div class="someBlock"><b>E-Mail:</b> <a href="mailto:<?php echo $item->email; ?>"><?php echo $item->email; ?></a></div>
                            <div class="someBlock"><b>Номер телефона:</b> <?php echo $item->phone; ?></div>
                        <?php else: ?>
                            <p class="relatedMessage">Если нужно привязать конкретного пользователя под заказ, найдите и выберите его в списке справа!</p>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="last_name">Фамилия</label>
                        <div class="col-md-10">
                            <input id="last_name" class="form-control valid" type="text" name="last_name" value="<?php echo $obj->last_name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_name">Имя</label>
                        <div class="col-md-10">
                            <input id="f_name" class="form-control valid" type="text" name="name" value="<?php echo $obj->name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="middle_name">Отчество</label>
                        <div class="col-md-10">
                            <input id="middle_name" class="form-control" type="text" name="middle_name" value="<?php echo $obj->middle_name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="phone">Номер телефона</label>
                        <div class="col-md-10">
                            <input id="phone" class="form-control valid" type="text" name="phone" value="<?php echo $obj->phone; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_email">E-Mail</label>
                        <div class="col-md-10">
                            <input id="f_email" class="form-control valid email" type="text" name="email" value="<?php echo $obj->email; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_payment">Способ оплаты</label>
                        <div class="col-md-10">
                            <select id="f_payment" name="payment" class="form-control">
                                <?php foreach ($payment as $id => $name): ?>
                                    <option value="<?php echo $id; ?>" <?php echo $obj->payment == $id ? 'selected' : ''; ?>><?php echo $name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_delivery">Способ доставки</label>
                        <div class="col-md-10">
                            <select id="f_delivery" name="delivery" class="form-control">
                                <?php foreach ($delivery as $id => $name): ?>
                                    <option value="<?php echo $id; ?>" <?php echo $obj->delivery == $id ? 'selected' : ''; ?>><?php echo $name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $item->id; ?>" id="orderItemId" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget box loadedBox" id="orderItemsBlock">
            <div class="widgetHeader myWidgetHeader">
                <div class="widgetTitle">
                    <i class="fa-file"></i>
                    Указать пользователя
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div id="orderItemsBlock" class="usersSearchBlock">
                        <div class="form-group" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <input data-name="search" class="form-control" type="text" placeholder="Начните вводить название ФИО или ID нужного пользователя" />
                            </div>
                        </div>
                        <div class="widgetContent" style="min-height: 150px;">
                            <div id="orderItemsList" class="form-vertical row-border" data-id="<?php echo \Core\Route::param('id'); ?>" data-limit="16">
                                <p class="relatedMessage">Начните писать ФИО или ID пользователя в поле для ввода расположенном выше. После чего на этом месте появится список отфильтрованных записей</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
