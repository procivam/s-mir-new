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
                        <label class="col-md-2 control-label" for="f_h1">H1</label>
                        <div class="col-md-10">
                            <input id="f_h1" class="form-control valid" type="text" name="FORM[h1]" value="<?php echo $obj->h1; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_title">Title</label>
                        <div class="col-md-10">
                            <input id="f_title" class="form-control valid" type="text" name="FORM[title]" value="<?php echo $obj->title; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_description">Description</label>
                        <div class="col-md-10">
                            <textarea id="f_description" class="form-control" name="FORM[description]" rows="10"><?php echo $obj->description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_keywords">Keywords</label>
                        <div class="col-md-10">
                            <textarea id="f_keywords" class="form-control" name="FORM[keywords]" rows="10"><?php echo $obj->keywords; ?></textarea>
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
                <?php if ( $obj->id == 1 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Название группы</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Текст со страницы группы</strong></div>
                        <div class="col-md-6">{{content}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Текст со страницы группы (N первых символов включая пробелы, но с вырезанными HTML тегами)</strong></div>
                        <div class="col-md-6">{{content:N}}</div>
                    </div>
                <?php endif ?>
                <?php if ( $obj->id == 2 ): ?>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование товара</strong></div>
                        <div class="col-md-6">{{name}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование группы товара</strong></div>
                        <div class="col-md-6">{{group}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование бренда товара</strong></div>
                        <div class="col-md-6">{{brand}}</div>
                    </div>
                    <div class="rowSection">
                        <div class="col-md-6"><strong>Наименование модели товара</strong></div>
                        <div class="col-md-6">{{model}}</div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</form>