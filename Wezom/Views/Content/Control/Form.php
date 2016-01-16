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
                        <label class="control-label">Название</label>
                        <div class="">
                            <b class="red"><?php echo $obj->name; ?></b>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Контент</label>
                        <div class="">
                            <textarea class="tinymceEditor form-control" rows="20" name="FORM[text]"><?php echo $obj->text; ?></textarea>
                        </div>
                    </div>
                    <?php if($obj->alias == 'contacts'): ?>
                        <div class="form-group">
                            <label class="control-label" for="f_map">Карта</label>
                            <div class="">
                                <textarea id="f_map" class="form-control" rows="7" name="FORM[other]"><?php echo $obj->other; ?></textarea>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="widget">
            <div class="widgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Мета-данные
                </div>
            </div>
        
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <div class="form-group">
                        <label class="control-label" for="f_h1">
                            Заголовок страницы (h1)
                            <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="Рекомендуется, чтобы тег h1 содержал ключевую фразу, которая частично или полностью совпадает с title" style="white-space: nowrap;"></i>
                        </label>
                        <div class="">
                            <input id="f_h1" class="form-control" name="FORM[h1]" type="text" value="<?php echo $obj->h1; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_title">
                            title
                            <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="<p>Значимая для продвижения часть заголовка должна быть не более 12 слов</p><p>Самые популярные ключевые слова должны идти в самом начале заголовка и уместиться в первых 50 символов, чтобы сохранить привлекательный вид в поисковой выдаче.</p><p>Старайтесь не использовать в заголовке следующие знаки препинания – . ! ? – </p>" style="white-space: nowrap;"></i>
                        </label>
                        <div class="">
                            <input id="f_title" class="form-control" type="text" name="FORM[title]" value="<?php echo $obj->title; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_keywords">Ключевые слова (keywords)</label>
                        <div class="">
                            <textarea id="f_keywords" class="form-control" name="FORM[keywords]" rows="5"><?php echo $obj->keywords; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="f_description">Описание (description)</label>
                        <div class="">
                            <textarea id="f_description" class="form-control" name="FORM[description]" rows="5"><?php echo $obj->description; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>