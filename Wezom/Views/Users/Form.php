<form id="myForm" class="rowSection validat" method="post" action="" enctype="multipart/form-data" data-id="<?php echo $obj->id; ?>">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="col-md-<?php echo $obj->id ? 7 : 12; ?>">
        <div class="widget box">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Личные данные
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-vertical row-border">
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
                        <div class="rowSection">
                            <div class="col-md-4 form-group">
                                <label class="control-label" for="f_last_name">Фамилия</label>
                                <input id="f_last_name" class="form-control" name="FORM[last_name]" type="text" value="<?php echo $obj->last_name; ?>" />
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="control-label" for="f_name">Имя</label>
                                <input id="f_name" class="form-control valid" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="control-label" for="f_middle_name">Отчество</label>
                                <input id="f_middle_name" class="form-control" name="FORM[middle_name]" type="text" value="<?php echo $obj->middle_name; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="rowSection">
                            <div class="col-md-6 form-group">
                                <label class="control-label" for="f_email">E-Mail</label>
                                <input id="f_email" class="form-control translitSource valid" name="FORM[email]" type="text" value="<?php echo $obj->email; ?>" />
                            </div>
                            <?php if( \Core\Route::param('id') ): ?>
                                <div class="col-md-6 form-group">
                                    <label class="control-label" for="f_password">
                                        Пароль
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="Если нет необходимости менять пароль, просто оставьте это поле пустым, тогда он не изменится" style="white-space: nowrap;"></i>
                                    </label>
                                    <input id="f_password" class="form-control" name="password" type="password" />
                                </div>
                            <?php else: ?>
                                <div class="col-md-6 form-group">
                                    <label class="control-label" for="f_password">Пароль</label>
                                    <input id="f_password" class="form-control valid" name="password" type="password" />
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <label class="control-label" for="f_phone">Номер телефона</label>
                            <input id="f_phone" class="form-control" name="FORM[phone]" type="text" value="<?php echo $obj->phone; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if( $obj->id ): ?>
        <div class="col-md-5">
            <div class="widget">
                <div class="widgetContent">
                    <ul class="anyClass accordion harmonica">
                        <li><a href="#" class="btn harFull harClose">Социальные сети</a>
                            <ul class="">
                                <div>
                                    <table class="table table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Сеть</th>
                                            <th>UID</th>
                                            <th>Имя</th>
                                            <th>Фамилия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if( !sizeof($socials) ): ?>
                                            <tr style="background-color: #F3F3C3;">
                                                <td colspan="4">Пользователь не прикрепил ни одной социальной сети</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach( $socials AS $key => $value ): ?>
                                                <tr>
                                                    <td><?php echo $value->network; ?></td>
                                                    <td><a href="<?php echo $value->profile; ?>" target="_blank"><?php echo $value->uid; ?></a></td>
                                                    <td><?php echo $value->first_name ?: '----'; ?></td>
                                                    <td><?php echo $value->last_name ?: '----'; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="widget withButtons">
                <a href="<?php echo \Core\HTML::link('wezom/orders/index?uid='.\Core\Route::param('id')); ?>" class="btn bs-tooltip" title="Посмотреть список заказов этого пользователя">Заказы (<?php echo $count_orders; ?>)</a>
                <a href="<?php echo \Core\HTML::link('auth-like-regular-user/'.\Core\Encrypt::instance()->encode(\Core\Route::param('id'))); ?>" target="_blank" class="btn btn-warning bs-tooltip" title="Авторизоваться на сайте как этот пользователь">Авторизоваться</a>
                <a id="sendThePassword" data-id="<?php echo \Core\Route::param('id'); ?>" class="btn btn-info bs-tooltip" title="Сгенерировать и выслать новый пароль на почту">Выслать пароль</a>
            </div>

            <div class="widget">
                <div class="pageInfo alert alert-info">
                    <div class="rowSection">
                        <div class="col-md-6"><strong>IP</strong></div>
                        <div class="col-md-6"><?php echo $obj->ip; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Дата создания аккаунта</strong></div>
                        <div class="col-md-6"><?php echo $obj->created_at ? date('d.m.Y H:i:s', $obj->created_at) : '---'; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Дата последней авторизации</strong></div>
                        <div class="col-md-6"><?php echo $obj->last_login ? date('d.m.Y H:i:s', $obj->last_login) : '---'; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Количество авторизаций на сайте</strong></div>
                        <div class="col-md-6"><?php echo (int) $obj->logins; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Общее количество заказов</strong></div>
                        <div class="col-md-6"><?php echo $count_orders; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Количество выполненых заказов</strong></div>
                        <div class="col-md-6"><?php echo $count_good_orders; ?></div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Стоимость выполненых заказов</strong></div>
                        <div class="col-md-6"><?php echo $amount_good_orders; ?> грн</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</form>

<div id="sendThePasswordForm" style="display: none;">
    <div class="form-group">
        <label class="control-label">Пароль</label>
        <div class="">
            <div class="input-group">
                <input class="form-control" id="f_code" name="password" type="text" />
                <span class="input-group-btn">
                    <button class="btn codeAction" type="button">Сгенерировать автоматически</button>
                </span>
            </div>
            <p class="red">Если оставить поле пустым, на E-Mail пользователя отправится случайно сгенерированнывй пароль и узнать его будет возможно только лишь от самого пользователя!</p>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('body').on('click', '.codeAction', function(){
            var it = $(this);
            $.ajax({
                url: '/wezom/ajax/generateCode',
                type: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if(data.success) {
                        $('#f_code').val(data.code);
                    }
                }
            });
        });
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
    });
</script>