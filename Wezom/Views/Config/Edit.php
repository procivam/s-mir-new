<form id="myForm" class="rowSection validat" method="post" action="">
    <div class="form-actions" style="display: none;">
        <input class="submit btn btn-primary pull-right" type="submit" value="Отправить">
    </div>
    <?php if(count(\Core\Arr::get($groups, 'left', array()))): ?>
        <div class="col-md-<?php echo count(\Core\Arr::get($groups, 'right', array())) ? 7 : 12; ?>">
            <div class="widget">
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <ul class="liTabs t_wrap">
                            <?php foreach($groups['left'] AS $group): ?>
                                <?php if(\Core\Arr::get($result, $group->alias)): ?>
                                    <li class="t_item">
                                        <a class="t_link" href="#"><?php echo $group->name; ?></a>
                                        <div class="t_content">
                                            <?php foreach ($result[$group->alias] as $obj): ?>
                                                <?php echo \Core\View::tpl(array('obj' => $obj), 'Config/Row'); ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(count(\Core\Arr::get($groups, 'right', array()))): ?>
        <div class="col-md-<?php echo count(\Core\Arr::get($groups, 'left', array())) ? 5 : 12; ?>">
            <div class="widget">
                <div class="widgetContent">
                    <div class="form-vertical row-border">
                        <ul class="liTabs t_wrap">
                            <?php foreach($groups['right'] AS $group): ?>
                                <?php if(\Core\Arr::get($result, $group->alias)): ?>
                                    <li class="t_item">
                                        <a class="t_link" href="#"><?php echo $group->name; ?></a>
                                        <div class="t_content">
                                            <?php foreach ($result[$group->alias] as $obj): ?>
                                                <?php echo \Core\View::tpl(array('obj' => $obj), 'Config/Row'); ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</form>

<script>
    $(function(){
        var input;
        $('input[type="password"]').closest('div').addClass('input-group');
        $('.showPassword').on('click', function(){
            input = $(this).closest('div.input-group').find('input');
            if(input.attr('type') == 'password') {
                input.attr('type', 'text');
                $(this).text('Скрыть');
            } else {
                input.attr('type', 'password');
                $(this).text('Показать');
            }
        });
    });
</script>