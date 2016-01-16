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
                        <label class="control-label" for="f_name">E-Mail</label>
                        <div class="">
                            <input id="f_name" class="form-control" name="FORM[email]" type="text" value="<?php echo $obj->email; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_name">Имя</label>
                        <div class="">
                            <input id="f_name" class="form-control valid" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_date">Дата</label>
                        <div class="">
                            <input id="f_date" type="text" name="FORM[date]" value="<?php echo strtotime($obj->date) ? $obj->date : ($obj->date ? date('d.m.Y', $obj->date) : date('d.m.Y')); ?>" class="myPicker valid form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Отзыв</label>
                        <div class="">
                            <textarea class="form-control valid" rows="10" name="FORM[text]"><?php echo $obj->text; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_date_answer">Дата ответа администратора</label>
                        <div class="">
                            <input class="form-control myPicker2" id="f_date_answer" type="text" name="FORM[date_answer]" value="<?php echo $obj->date_answer ? date('d.m.Y', $obj->date_answer) : NULL; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_text">Ответ администратора</label>
                        <div class="">
                            <textarea name="FORM[answer]" id="f_text" rows="10" class="form-control"><?php echo $obj->answer; ?></textarea>
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
        pickerInit('.myPicker2');
    });
</script>