<?php if( Core\User::caccess() == 'edit' ): ?>
    <div class="toolbar no-padding">
        <div class="btn-group">
            <?php if ( $add ): ?>
                <a href="/wezom/<?php echo Core\Route::controller(); ?>/add" class="btn btn-lg"><i class="fa-plus"></i> Создать</a>
            <?php endif ?>
            <?php if ( $delete ): ?>
                <a title="Удалить" href="#" class="btn btn-lg text-warning bs-tooltip delete-items"><i class="fa-fixed-width">&#xf00d;</i> <span class="hidden-xx">Удалить</span></a>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>