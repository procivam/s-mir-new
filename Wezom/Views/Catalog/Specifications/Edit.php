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
                        <label class="col-md-2 control-label" for="f_name">Наименование</label>
                        <div class="col-md-10">
                            <input class="form-control translitSource valid" id="f_name" data-trans="1" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="f_alias">
                            Алиас
                            <i class="fa-info-circle text-info bs-tooltip nav-hint" title="<b>Алиас (англ. alias - псевдоним)</b><br>Алиасы используются для короткого именования страниц. <br>Предположим, имеется страница с псевдонимом «<b>about</b>». Тогда для вывода этой страницы можно использовать или полную форму: <br><b>http://domain/?go=frontend&page=about</b><br>или сокращенную: <br><b>http://domain/about.html</b>"></i>
                        </label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input class="form-control translitConteiner valid" id="f_alias" data-trans="1" name="FORM[alias]" type="text" value="<?php echo $obj->alias; ?>" />
                                <span class="input-group-btn">
                                    <button class="btn translitAction" data-trans="1" type="button">Заполнить автоматически</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <?php if($obj->type_id != 1): ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="f_type">Тип</label>
                            <div class="col-md-10">
                                <div class="controls">
                                    <select class="form-control valid" id="f_type" name="FORM[type_id]">
                                        <?php foreach( $types as $type ): ?>
                                            <?php if($type->id != 1): ?>
                                                <option value="<?php echo $type->id; ?>" <?php echo $type->id == $obj->type_id ? 'selected' : ''; ?>><?php echo $type->name; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</form>

<?php if ($obj->type_id == 1): ?>
    <?php echo Core\View::tpl(array('list' => $list), 'Catalog/Specifications/ValuesColor'); ?>
<?php else: ?>
    <?php echo Core\View::tpl(array('list' => $list), 'Catalog/Specifications/ValuesSimple'); ?>
<?php endif ?>
