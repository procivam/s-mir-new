<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="col-md-7">
        <div class="widget box">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Основные данные
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div class="form-actions" style="display: none;">
                        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Наименование шаблона</label>
                        <div class="red" style="font-weight: bold;">
                            <?php echo $obj->name; ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Опубликовано</label>
                        <div class="">
                            <label class="checkerWrap-inline">
                                <input name="status" value="0" type="radio" <?php echo !$obj->status ? 'checked' : ''; ?>>                            
                                Нет
                            </label>
                            <label class="checkerWrap-inline">
                                <input name="status" value="1" type="radio" <?php echo $obj->status ? 'checked' : ''; ?>>
                                Да
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label" for="f_theme">Тема</label>
                        <div class="">
                            <input id="f_theme" class="form-control translitSource valid" name="FORM[subject]" type="text" value="<?php echo $obj->subject; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Шаблон</label>
                        <div class="">
                            <textarea class="tinymceEditor form-control" rows="20" name="FORM[text]"><?php echo $obj->text; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="widget">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Переменные
                </div>
            </div>
            <div class="pageInfo alert alert-info">
                <div class="rowSection">
                    <div class="col-md-6"><strong>Доменное имя сайта</strong></div>
                    <div class="col-md-6">{{site}}</div>
                </div>
                <?php if( $obj->id != 15 && $obj->id != 20 && $obj->id != 21 && $obj->id != 26 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>IP</strong></div>
                        <div class="col-md-6">{{ip}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Текущая дата в формате dd.mm.YYYY</strong></div>
                        <div class="col-md-6">{{date}}</div>
                    </div>
                <?php endif; ?>
                <?php if ( $obj->id == 1 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>E-Mail</strong></div>
                        <div class="col-md-6">{{email}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Текст сообщения</strong></div>
                        <div class="col-md-6">{{text}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 2 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка для отмены рассылки</strong></div>
                        <div class="col-md-6">{{link}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>E-Mail</strong></div>
                        <div class="col-md-6">{{email}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 3 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Номер телефона</strong></div>
                        <div class="col-md-6">{{phone}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 4 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка для подтверждения</strong></div>
                        <div class="col-md-6">{{link}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 5 OR $obj->id == 6 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Новый пароль для входа</strong></div>
                        <div class="col-md-6">{{password}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 7 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Город</strong></div>
                        <div class="col-md-6">{{city}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Текст коментария</strong></div>
                        <div class="col-md-6">{{text}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование товара</strong></div>
                        <div class="col-md-6">{{item_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар на сайте</strong></div>
                        <div class="col-md-6">{{link}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар в админ-панели</strong></div>
                        <div class="col-md-6">{{link_admin}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 8 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Указанный номер телефона</strong></div>
                        <div class="col-md-6">{{phone}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование товара</strong></div>
                        <div class="col-md-6">{{item_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар на сайте</strong></div>
                        <div class="col-md-6">{{link}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар в админ-панели</strong></div>
                        <div class="col-md-6">{{link_admin}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 9 OR $obj->id == 10 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>E-Mail</strong></div>
                        <div class="col-md-6">{{email}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Вопрос</strong></div>
                        <div class="col-md-6">{{question}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование товара</strong></div>
                        <div class="col-md-6">{{item_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар на сайте</strong></div>
                        <div class="col-md-6">{{link}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на товар в админ-панели</strong></div>
                        <div class="col-md-6">{{link_admin}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 11 OR $obj->id == 12 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Телефон</strong></div>
                        <div class="col-md-6">{{phone}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>E-mail</strong></div>
                        <div class="col-md-6">{{email}}</div>
                    </div>
<!--                    <div class="rowSection">-->
<!--                        <div class="col-md-6"><strong>Способ оплаты</strong></div>-->
<!--                        <div class="col-md-6">{{payment}}</div>-->
<!--                    </div>-->
<!--                    <div class="rowSection">-->
<!--                        <div class="col-md-6"><strong>Способ доставки (с номером склада, если нужно)</strong></div>-->
<!--                        <div class="col-md-6">{{delivery}}</div>-->
<!--                    </div>-->
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Список заказаных товаров</strong></div>
                        <div class="col-md-6">{{items}}</div>
                    </div>
<!--                    <div class="rowSection">-->
<!--                        <div class="col-md-6"><strong>Ссылка на заказ в кабинете пользователя</strong></div>-->
<!--                        <div class="col-md-6">{{link_user}}</div>-->
<!--                    </div>-->
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Ссылка на заказ в админ-панели</strong></div>
                        <div class="col-md-6">{{link_admin}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 15 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Номер заказа</strong></div>
                        <div class="col-md-6">{{id}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Фамилия</strong></div>
                        <div class="col-md-6">{{last_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Отчество</strong></div>
                        <div class="col-md-6">{{middle_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Список заказаных товаров</strong></div>
                        <div class="col-md-6">{{items}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Стоимость товаров</strong></div>
                        <div class="col-md-6">{{amount}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Скидка</strong></div>
                        <div class="col-md-6">{{discount}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Стоимость заказа с учетом скидки</strong></div>
                        <div class="col-md-6">{{real_amount}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 20 || $obj->id == 21 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Имя, указанное при заказе</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Фамилия, указанное при заказе</strong></div>
                        <div class="col-md-6">{{last_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Отчество, указанное при заказе</strong></div>
                        <div class="col-md-6">{{middle_name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Номер заказа</strong></div>
                        <div class="col-md-6">{{id}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Сумма заказа</strong></div>
                        <div class="col-md-6">{{amount}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 26 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>E-Mail</strong></div>
                        <div class="col-md-6">{{email}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Пароль</strong></div>
                        <div class="col-md-6">{{password}}</div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</form>