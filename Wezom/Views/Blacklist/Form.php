<form id="myForm" class="rowSection validat" method="post" action="" enctype="multipart/form-data">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="col-md-12">
        <div class="widget box">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Основные данные
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div class="form-group">
                        <label class="control-label">Опубликовано</label>
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
                            <div class="col-md-6 form-group">
                                <label class="control-label" for="f_ip">IP</label>
                                <div class="">
                                    <input id="f_ip" class="form-control valid" name="FORM[ip]" type="text" value="<?php echo $obj->ip; ?>" />
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="control-label" for="f_date">Дата</label>
                                <div class="">
                                    <input id="f_date" type="text" name="FORM[date]" value="<?php echo $obj->date ? date('d.m.Y', $obj->date) : NULL; ?>" class="myPicker form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <label class="control-label" for="f_comment">Комментарий</label>
                            <div class="">
                                <textarea id="f_comment" class="form-control" name="FORM[comment]" rows="10"><?php echo $obj->comment; ?></textarea>
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
    });
</script>