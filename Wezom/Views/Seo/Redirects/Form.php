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
                        <label class="col-md-2 control-label">Ссылка с</label>
                        <div class="col-md-10">
                            <input class="form-control link" type="text" name="FORM[link_from]" value="<?php echo str_replace('http://'.Core\Arr::get($_SERVER, 'HTTP_HOST').'/', '', $obj->link_from); ?>"/>
                            <div class="thisLink"><span class="mainLink"><?php echo 'http://'.Core\Arr::get($_SERVER, 'HTTP_HOST'); ?></span><span class="samaLink"></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ссылка на</label>
                        <div class="col-md-10">
                            <input class="form-control link" type="text" name="FORM[link_to]" value="<?php echo str_replace('http://'.Core\Arr::get($_SERVER, 'HTTP_HOST').'/', '', $obj->link_to); ?>"/>
                            <div class="thisLink"><span class="mainLink"><?php echo 'http://'.Core\Arr::get($_SERVER, 'HTTP_HOST'); ?></span><span class="samaLink"></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Тип</label>
                        <div class="col-md-10">
                            <select name="FORM[type]" class="form-control">
                                <?php for($i = 300; $i <= 305; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php echo $obj->type == $i ? 'selected' : NULL; ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                                <option value="307" <?php echo $obj->type == 307 ? 'selected' : NULL; ?>>307</option>
                            </select>
                        </div>
                    </div>
                    <div class="widgetContent" style="min-height: 150px;">
                        <div class="relatedMessage form-vertical row-border">
                            <p>Список перенаправлений</p>
                            <ul>
                                <li>300 — Multiple Choices («множество выборов»)</li>
                                <li>301 — Moved Permanently («перемещено навсегда»)</li>
                                <li>302 — Moved Temporarily («перемещено временно»)</li>
                                <li>303 — See Other (смотреть другое)</li>
                                <li>304 — Not Modified (не изменялось)</li>
                                <li>305 — Use Proxy («использовать прокси»)</li>
                                <li>307 — Temporary Redirect («временное перенаправление»)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    function generate_link(it) {
        var link = it.val();
        if(link != '') {
            if(link[0] != '/') {
                link = '/' + link;
            }
        }
        it.parent().find('.samaLink').text(link);
    }
    $(document).ready(function(){
        $('input.link').each(function(){
            generate_link($(this));
        });
        $('body').on('keyup', '.link', function(){ generate_link($(this)); });
        $('body').on('change', '.link', function(){ generate_link($(this)); });
    });
</script>