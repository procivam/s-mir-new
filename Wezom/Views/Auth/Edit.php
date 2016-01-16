<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetContent">
                <div class="form-horizontal row-border">

                    <div class="form-actions" style="display: none;">
                        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_name">Имя</label>
                        <div class="col-md-10">
                            <input id="f_name" class="form-control valid" type="text" name="name" value="<?php echo $obj->name; ?>"/>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label class="col-md-2 control-label">E-Mail</label>-->
<!--                        <div class="col-md-10">-->
<!--                            <input class="form-control" type="text" name="email" value="--><?php //echo $obj->email; ?><!--"/>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_login">Логин</label>
                        <div class="col-md-10">
                            <input class="form-control valid" id="f_login" type="text" name="login" value="<?php echo $obj->login; ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_old_password">Старый пароль</label>
                        <div class="col-md-10">
                            <input class="form-control valid" id="f_old_password" type="password" name="password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_password">Новый пароль</label>
                        <div class="col-md-10">
                            <input class="form-control valid" id="f_password" type="password" name="new_password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_confirm_password">Подтвердите пароль</label>
                        <div class="col-md-10">
                            <input class="form-control valid" id="f_confirm_password" type="password" name="confirm_password" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>