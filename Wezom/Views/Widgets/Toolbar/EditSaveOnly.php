<?php if( Core\User::caccess() == 'edit' ): ?>
    <div class="toolbar no-padding">
        <div class="btn-group">
            <a title="Сохранить" href="#" class="btn btn-lg text-success bs-tooltip btn-save"><i class="fa-check"></i> <span class="hidden-xx">Сохранить</span></a>
        </div>
    </div>

    <script>
        $('.toolbar').on('click', '.btn-save', function(e){
            e.preventDefault();
            $('form#myForm input[type="submit"]').click();
        });
    </script>
<?php endif; ?>