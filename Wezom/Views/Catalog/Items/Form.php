<form id="myForm" class="rowSection validat" method="post" action="" enctype="multipart/form-data">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <div class="col-md-7">
        <div class="widget box">
            <div class="widgetContent">
                <div class="form-vertical row-border">
                    <ul class="liTabs t_wrap">
                        <li class="t_item">
                            <a class="t_link" href="#">Основные данные</a>
                            <div class="t_content">
                                <div class="form-group">
                                    <div class="rowSection">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <label class="control-label">Новинка</label>
                                            <div class="">
                                                <label class="checkerWrap-inline">
                                                    <input name="new" value="0" type="radio" <?php echo !$obj->new ? 'checked' : ''; ?>>
                                                    Нет
                                                </label>
                                                <label class="checkerWrap-inline">
                                                    <input name="new" value="1" type="radio" <?php echo $obj->new ? 'checked' : ''; ?>>
                                                    Да
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Популярный товар</label>
                                            <div class="">
                                                <label class="checkerWrap-inline">
                                                    <input name="top" value="0" type="radio" <?php echo !$obj->top ? 'checked' : ''; ?>>
                                                    Нет
                                                </label>
                                                <label class="checkerWrap-inline">
                                                    <input name="top" value="1" type="radio" <?php echo $obj->top ? 'checked' : ''; ?>>
                                                    Да
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rowSection">
                                        <div class="col-md-6 form-group">
                                            <label class="control-label" for="parent_id">
                                                Группа
                                                <i class="fa-info-circle text-info bs-tooltip nav-hint" title="<b>При изменении группы товара меняется набор характеристик!</b>"></i>
                                            </label>
                                            <div class="">
                                                <div class="controls">
                                                    <select class="form-control valid" id="parent_id" name="FORM[parent_id]">
                                                        <option value="">Не выбрано</option>
                                                        <?php echo $tree; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="control-label" for="f_sort">
                                                Позиция
                                                <i class="fa-info-circle text-info bs-tooltip nav-hint" title="<b>Поле определяет позицию товара среди других в списках</b>"></i>
                                            </label>
                                            <div class="">
                                                <input class="form-control" id="f_sort" name="FORM[sort]" type="text" value="<?php echo $obj->sort; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_artikul">Артикул</label>
                                    <div class="">
                                        <input class="form-control" id="f_artikul" name="FORM[artikul]" type="text" value="<?php echo $obj->artikul; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_name">Название</label>
                                    <div class="">
                                        <input class="form-control translitSource valid" id="f_name" name="FORM[name]" type="text" value="<?php echo $obj->name; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_alias">
                                        Алиас
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
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label class="control-label">Акция</label>
                                        <div class="">
                                            <label class="checkerWrap-inline">
                                                <input name="sale" value="0" type="radio" <?php echo !$obj->sale ? 'checked' : ''; ?>>
                                                Нет
                                            </label>
                                            <label class="checkerWrap-inline">
                                                <input name="sale" value="1" type="radio" <?php echo $obj->sale ? 'checked' : ''; ?>>
                                                Да
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <label class="control-label">Наличие</label>
                                        <div class="">
                                            <label class="checkerWrap-inline">
                                                <input name="available" value="0" type="radio" <?php echo ($obj && $obj->available == 0) ? 'checked' : ''; ?>>
                                                Нет в наличии
                                            </label>
                                            <label class="checkerWrap-inline">
                                                <input name="available" value="1" type="radio" <?php echo (!$obj || $obj->available == 1) ? 'checked' : ''; ?>>
                                                Есть в наличии
                                            </label>
                                            <label class="checkerWrap-inline">
                                                <input name="available" value="2" type="radio" <?php echo ($obj && $obj->available == 2) ? 'checked' : ''; ?>>
                                                Под заказ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group costField">
                                    <label class="control-label" for="f_cost">Цена</label>
                                    <div class="">
                                        <input class="form-control valid" id="f_cost" name="FORM[cost]" type="tel" value="<?php echo $obj->cost; ?>" />
                                    </div>
                                </div>
                                <div class="form-group hiddenCostField" <?php echo !$obj->sale ? 'style="display:none;"' : ''; ?>>
                                    <label class="control-label" for="f_old_cost">Старая цена</label>
                                    <div class="">
                                        <input class="form-control" id="f_old_cost" name="FORM[cost_old]" type="tel" value="<?php echo $obj->cost_old; ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Описание</label>
                                    <div class="">
                                        <textarea class="tinymceEditor form-control" rows="20" name="FORM[text]"><?php echo $obj->text; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Характеритики</label>
                                    <div class="">
                                        <textarea class="tinymceEditor form-control" rows="20" name="FORM[characteristics]"><?php echo $obj->characteristics; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Строчки</label>
                                    <div class="">
                                        <textarea class="tinymceEditor form-control" rows="20" name="FORM[gallery]"><?php echo $obj->gallery; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Комплектация</label>
                                    <div class="">
                                        <textarea class="tinymceEditor form-control" rows="20" name="FORM[equipment]"><?php echo $obj->equipment; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="t_item">
                            <a class="t_link" href="#">Мета-данные</a>
                            <div class="t_content">
                                <div style="font-weight: bold; margin-bottom: 10px;"><span class="red">Внимание!</span> Незаполненные данные будут подставлены по <a href="<?php echo \Core\HTML::link('wezom/seo_templates/edit/2'); ?>" target="_blank">шаблону</a></div>
                                <div class="form-group">
                                    <label class="control-label" for="f_h1">
                                        Заголовок страницы (H1)
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="Рекомендуется, чтобы тег h1 содержал ключевую фразу, которая частично или полностью совпадает с title" style="white-space: nowrap;"></i>
                                    </label>
                                    <div class="">
                                        <input id="f_h1" class="form-control" name="FORM[h1]" type="text" value="<?php echo $obj->h1; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_title">
                                        Title
                                        <i class="fa-info-circle text-info bs-tooltip nav-hint liTipLink" title="<p>Значимая для продвижения часть заголовка должна быть не более 12 слов</p><p>Самые популярные ключевые слова должны идти в самом начале заголовка и уместиться в первых 50 символов, чтобы сохранить привлекательный вид в поисковой выдаче.</p><p>Старайтесь не использовать в заголовке следующие знаки препинания – . ! ? – </p>" style="white-space: nowrap;"></i>
                                    </label>
                                    <div class="">
                                        <input id="f_title" class="form-control" type="text" name="FORM[title]" value="<?php echo $obj->title; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_keywords">Ключевые слова (Keywords)</label>
                                    <div class="">
                                        <textarea id="f_keywords" class="form-control" name="FORM[keywords]" rows="5"><?php echo $obj->keywords; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="f_description">Описание (Description)</label>
                                    <div class="">
                                        <textarea id="f_description" class="form-control" name="FORM[description]" rows="5"><?php echo $obj->description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="widget">
            <div class="widgetHeader myWidgetHeader">
                <div class="widgetTitle">
                    <i class="fa-reorder"></i>
                    Характеристики
                </div>
            </div>
            <div class="widgetContent">
                <div class="form-group">
                    <label class="control-label" for="brand_alias">Бренд</label>
                    <div class="">
                        <div class="controls">
                            <select class="form-control" id="brand_alias" name="FORM[brand_alias]">
                                <option value="0">Нет</option>
                                <?php foreach( $brands as $brand ): ?>
                                    <option value="<?php echo $brand->alias; ?>" <?php echo $brand->alias == $obj->brand_alias ? 'selected' : ''; ?>><?php echo $brand->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="model_alias">Модель</label>
                    <div class="">
                        <div class="controls">
                            <select class="form-control" id="model_alias" name="FORM[model_alias]">
                                <option value="0">Нет</option>
                                <?php foreach( $models as $model ): ?>
                                    <option value="<?php echo $model->alias; ?>" <?php echo $model->alias == $obj->model_alias ? 'selected' : ''; ?>><?php echo $model->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-vertical row-border" id="specGroup">
                    <?php foreach ($specifications as $spec): ?>
                        <?php if (count($specValues[$spec->id])): ?>
                            <div class="form-group">
                                <label class="control-label"><?php echo $spec->name; ?></label>
                                <div class="<?php echo $spec->type_id == 3 ? 'multiSelectBlock' : NULL; ?>">
                                    <div class="controls">
                                        <?php if ($spec->type_id == 3): ?>
                                            <select class="form-control" name="SPEC[<?php echo $spec->alias; ?>][]" multiple>
                                                <?php foreach( $specValues[$spec->id] as $value ): ?>
                                                    <option value="<?php echo $value->alias; ?>" <?php echo (isset($specArray[$spec->alias]) AND in_array($value->alias, $specArray[$spec->alias])) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php endif ?>
                                        <?php if ($spec->type_id == 2 OR $spec->type_id == 1): ?>
                                            <select class="form-control" name="SPEC[<?php echo $spec->alias; ?>]">
                                                <option value="0">Нет</option>
                                                <?php foreach( $specValues[$spec->id] as $value ): ?>
                                                    <option value="<?php echo $value->alias; ?>" <?php echo (isset($specArray[$spec->alias]) AND $specArray[$spec->alias] == $value->alias) ? 'selected' : ''; ?>><?php echo $value->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</form>

<?php echo $uploader; ?>
<?php echo $related; ?>

<script>
    $(function(){
        $('input[name="sale"]').on('change', function(){
            var val = parseInt( $(this).val() );
            if( val ) {
                var cost = $('input[name="FORM[cost]"]').val();
                var cost_old = $('input[name="FORM[cost_old]"]').val();
                $('input[name="FORM[cost]"]').val(cost_old);
                $('input[name="FORM[cost_old]"]').val(cost);
                $('.hiddenCostField').show();
            } else {
                var cost = $('input[name="FORM[cost]"]').val();
                var cost_old = $('input[name="FORM[cost_old]"]').val();
                $('input[name="FORM[cost]"]').val(cost_old);
                $('input[name="FORM[cost_old]"]').val(cost);
                $('.hiddenCostField').hide();
            }
        });

        $('#parent_id').on('change', function(){
            var catalog_tree_id = $(this).val();
            $.ajax({
                url: '/wezom/ajax/catalog/getSpecificationsByCatalogTreeID',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    catalog_tree_id: catalog_tree_id
                },
                success: function(data){
                    var i = 0;
                    var j = 0;
                    var val;
                    var html = '<option value="0">Нет</option>';
                    $('#model_alias').html(html);
                    for(i = 0; i < data.brands.length; i++) {
                        html += '<option value="' + data.brands[i].alias + '">' + data.brands[i].name + '</option>';
                    }
                    $('#brand_alias').html(html);
                    html = '';
                    for(i = 0; i < data.specifications.length; i++) {
                        var spec = data.specifications[i];
                        if( data.specValues[spec.id] ) {
                            var values = data.specValues[spec.id];
                            html += '<div class="form-group"><label class="control-label">'+spec.name+'</label>';
                            if( parseInt( spec.type_id ) == 3 ) {
                                html += '<div class="multiSelectBlock"><div class="controls">';
                                html += '<select class="form-control" name="SPEC['+spec.alias+'][]" multiple="10" style="height:150px;">';
                                for( j = 0; j < values.length; j++ ) {
                                    val = values[j];
                                    html += '<option value="'+val.alias+'">'+val.name+'</option>';
                                }
                                html += '</select>';
                                html += '</div></div>';
                            }
                            if( parseInt( spec.type_id ) == 2 || parseInt( spec.type_id ) == 1 ) {
                                html += '<div class=""><div class="controls">';
                                html += '<select class="form-control" name="SPEC['+spec.alias+']">';
                                html +='<option value="0">Нет</option>';
                                for( j = 0; j < values.length; j++ ) {
                                    val = values[j];
                                    html += '<option value="'+val.alias+'">'+val.name+'</option>';
                                }
                                html += '</select>';
                                html += '</div></div>';
                            }
                            html += '</div>';
                        }
                    }
                    $('#specGroup').html(html);
                    multi_select();
                }
            });
        });

        $('#brand_alias').on('change', function(){
            var brand_alias = $(this).val();
            $.ajax({
                url: '/wezom/ajax/catalog/getModelsByBrandID',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    brand_alias: brand_alias
                },
                success: function(data){
                    var html = '<option value="0">Нет</option>';
                    for(var i = 0; i < data.options.length; i++) {
                        html += '<option value="' + data.options[i].alias + '">' + data.options[i].name + '</option>';
                    }
                    $('#model_alias').html(html);
                }
            });
        });
    });
</script>