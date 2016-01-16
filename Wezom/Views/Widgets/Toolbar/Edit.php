<div class="toolbar no-padding">
    <div class="btn-group">
        <?php if( Core\User::caccess() == 'edit' ): ?>
            <a title="Сохранить" href="#" data-value="save" class="btn btn-lg text-success bs-tooltip btn-save"><i class="fa-check"></i> <span class="hidden-xx">Сохранить</span></a>
            <?php if(!isset($noClose) || !$noClose): ?>
                <a title="Сохранить и закрыть" data-value="save-close" href="#" class="btn btn-lg text-warning bs-tooltip btn-save"><i class="fa-check"></i> <span class="hidden-xx">Сохранить и закрыть</span></a>
            <?php endif; ?>
            <?php if(!isset($noAdd) || !$noAdd): ?>
                <a title="Сохранить и добавить еще" data-value="save-add" href="#" class="btn btn-lg text-info bs-tooltip btn-save"><i class="fa-check"></i> <span class="hidden-xx">Сохранить и добавить еще</span></a>
            <?php endif; ?>
            <script>
                $('.toolbar').on('click', '.btn-save', function(e){
                    e.preventDefault();
                    var val = $(this).data('value');
                    var button = $('form#myForm input[type="submit"]');
                    button.after('<input name="button" type="hidden" value="' + val + '" />');
                    button.click();
                });
            </script>
        <?php endif; ?>
        <a title="Закрыть" href="<?php echo $list_link ? $list_link : '/wezom/' . Core\Route::controller() . '/index'; ?>" class="btn btn-lg text-danger bs-tooltip"><i class="fa-times-circle"></i> <span class="hidden-xx">Закрыть</span></a>
    </div>
</div>

