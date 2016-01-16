<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetContent">
                <div class="form-horizontal row-border">
                    <div class="form-actions" style="display: none;">
                        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Отметить как прочитанное</label>
                        <div class="col-md-10">
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
                    <?php if ($obj->created_at): ?>
                        <div class="form-group">
                            <label style="padding-top:0;" class="col-md-2 control-label">Дата</label>
                            <div class="col-md-10">
                                <?php echo date( 'd.m.Y H:i:s', $obj->created_at ); ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label style="padding-top:0;" class="col-md-2 control-label">Имя</label>
                        <div class="col-md-10">
                            <?php echo $obj->name; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="padding-top:0;" class="col-md-2 control-label">Номер телефона</label>
                        <div class="col-md-10">
                            <a href="tel:<?php echo $obj->phone; ?>"><?php echo $obj->phone; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>