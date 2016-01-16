<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetContent">
                <div class="form-horizontal row-border">
                    <div class="form-actions" style="display: none;">
                        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Опубликовано</label>
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
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_email">E-Mail</label>
                        <div class="col-md-10">
                            <input id="f_email" class="form-control valid" type="text" name="FORM[email]" value="<?php echo $obj->email; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>