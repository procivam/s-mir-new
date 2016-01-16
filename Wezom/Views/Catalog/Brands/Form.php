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
                    <ul class="liTabs t_wrap">
                        <li class="t_item">
                            <a class="t_link" href="#">Основные данные</a>
                            <div class="t_content">
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
                                    <label class="control-label" for="f_name">Наименование</label>
                                    <div class="">
                                        <input class="form-control translitSource valid" id="f_name" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_alias">
                                        Псевдоним заголовка (Алиас)
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint" title="<b>Алиас (англ. alias - псевдоним)</b><br>Алиасы используются для короткого именования страниц. <br>Предположим, имеется страница с псевдонимом «<b>about</b>». Тогда для вывода этой страницы можно использовать или полную форму: <br><b>http://domain/?go=frontend&page=about</b><br>или сокращенную: <br><b>http://domain/about.html</b>"></i>
                                    </label>
                                    <div class="">
                                        <div class="input-group">
                                            <input class="form-control translitConteiner valid" id="f_alias" name="FORM[alias]" type="text" value="<?php echo $obj->alias; ?>" />
                                            <span class="input-group-btn">
                                                <button class="btn translitAction" type="button">Заполнить автоматически</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="t_item">
                            <a class="t_link" href="#">Мета-данные</a>
                            <div class="t_content">
                                <div class="form-group">
                                    <label class="control-label" for="f_h1">
                                        Заголовок страницы (h1)
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="Рекомендуется, чтобы тег h1 содержал ключевую фразу, которая частично или полностью совпадает с title" style="white-space: nowrap;"></i>
                                    </label>
                                    <div class="">
                                        <input class="form-control" name="FORM[h1]" id="f_h1" type="text" value="<?php echo $obj->h1; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_title">
                                        title
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="<p>Значимая для продвижения часть заголовка должна быть не более 12 слов</p><p>Самые популярные ключевые слова должны идти в самом начале заголовка и уместиться в первых 50 символов, чтобы сохранить привлекательный вид в поисковой выдаче.</p><p>Старайтесь не использовать в заголовке следующие знаки препинания – . ! ? – </p>" style="white-space: nowrap;"></i>
                                    </label>
                                    <div class="">
                                        <input class="form-control" type="text" id="f_title" name="FORM[title]" value="<?php echo $obj->title; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_keywords">Ключевые слова (keywords)</label>
                                    <div class="">
                                        <textarea class="form-control" name="FORM[keywords]" id="f_keywords" rows="5"><?php echo $obj->keywords; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_description">Описание (description)</label>
                                    <div class="">
                                        <textarea class="form-control" name="FORM[description]" id="f_description" rows="5"><?php echo $obj->description; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">SEO текст</label>
                                    <div class="">
                                        <textarea class="tinymceEditor form-control" style="height: 350px;" name="FORM[text]"><?php echo $obj->text; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>