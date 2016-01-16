<?php if(\Core\User::god() || \Core\User::caccess() == 'edit'): ?>
    <div class="widget box">
        <div class="widgetHeader"><div class="widgetTitle"><i class="fa-reorder"></i>Добавить значение</div></div>
        <div class="widgetContent">
            <table class="table table-striped table-bordered table-hover checkbox-wrap">
                <thead>
                    <tr>
                        <th class="align-center">Название</th>
                        <th class="align-center">Алиас</th>
                        <th class="align-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-center"><input type="text" id="sName" data-trans="2" class="form-control translitSource" value="" /></td>
                        <td class="align-center input-group">
                            <input type="text" id="sAlias" data-trans="2" class="translitConteiner form-control" value="" />
                            <span class="input-group-btn">
                                <button class="btn translitAction" data-trans="2" type="button">Заполнить автоматически</button>
                            </span>
                        </td>
                        <td class="align-center">
                            <a title="Сохранить" id="sSave" href="#" class="btn btn-xs bs-tooltip liTipLink" style="white-space: nowrap; margin-top: 7px;">
                                <i class="fa-fixed-width">&#xf0c7;</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<div class="widget box">
    <div class="widgetHeader"><div class="widgetTitle"><i class="fa-reorder"></i>Список значений</div></div>
    <div class="widgetContent" id="sValuesList">
        <table class="table table-striped table-bordered table-hover checkbox-wrap" data-specification="<?php echo Core\Route::param('id'); ?>">
            <thead>
                <tr>
                    <th class="align-center">Название</th>
                    <th class="align-center">Алиас</th>
                    <th class="align-center">Статус</th>
                    <?php if(\Core\User::god() || \Core\User::caccess() == 'edit'): ?>
                        <th class="align-center"></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $list as $obj ): ?>
                    <tr data-id="<?php echo $obj->id; ?>">
                        <td class="align-center"><input <?php echo (\Core\User::god() || \Core\User::caccess() == 'edit') ?: 'disabled' ?> type="text" data-trans="<?php echo 'val-'.$obj->id; ?>" class="form-control sName translitSource" value="<?php echo $obj->name; ?>" /></td>
                        <td class="align-center <?php echo !(\Core\User::god() || \Core\User::caccess() == 'edit') ?: 'input-group' ?>">
                            <input class="form-control sAlias translitConteiner" data-trans="<?php echo 'val-'.$obj->id; ?>" type="text" value="<?php echo $obj->alias; ?>" <?php echo (\Core\User::god() || \Core\User::caccess() == 'edit') ?: 'disabled'; ?> />
                            <?php if(\Core\User::god() || \Core\User::caccess() == 'edit'): ?>
                                <span class="input-group-btn">
                                    <button class="btn translitAction" data-trans="<?php echo 'val-'.$obj->id; ?>" type="button">Заполнить автоматически</button>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="align-center">
                            <label class="ckbxWrap" style="top: 8px; left: 6px;">
                                <input class="sStatus" type="checkbox" value="1" <?php echo $obj->status ? 'checked' : ''; ?> <?php echo (\Core\User::god() || \Core\User::caccess() == 'edit') ?: 'disabled' ?> />
                            </label>
                        </td>
                        <?php if(\Core\User::god() || \Core\User::caccess() == 'edit'): ?>
                            <td class="align-center">
                                <a title="Сохранить изменения" href="#" class="sSave btn btn-xs bs-tooltip liTipLink" style="white-space: nowrap; margin-top: 7px;"><i class="fa-fixed-width">&#xf0c7;</i></a>
                                <a title="Удалить" href="#" class="sDelete btn btn-xs bs-tooltip liTipLink" style="white-space: nowrap; margin-top: 7px;"><i class="fa-trash-o"></i></a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="sParametersSimple" data-id="<?php echo Core\Route::param('id'); ?>"></div>


<!-- SCRIPT ZONE -->
<script>
    $(function(){
        if( $('#sParametersSimple').length ) {
            // Specification id
            var sID = $('#sParametersSimple').data('id');
            // Set checkbox
            var checkboxStart = function( el ) {
                var parent = el.parent();
                if(parent.is('label')){
                    if(el.prop('checked')){
                        parent.addClass('checked');
                    } else {
                        parent.removeClass('checked');
                    }
                }
            };
            // Generate a row from object
            var generateTR = function( obj ) {
                var html = '';
                html  = '<tr data-id="'+obj.id+'">';
                html += '<td class="align-center">';
                html += '<input type="text" class="form-control sName translitSource" data-trans="val-'+obj.id+'" value="'+obj.name+'" />';
                html += '</td>';
                html += '<td class="align-center input-group">';
                html += '<input class="form-control sAlias translitConteiner" data-trans="val-'+obj.id+'" type="text" value="'+obj.alias+'" />';
                html += '<span class="input-group-btn">' +
                        '<button class="btn translitAction" data-trans="val-'+obj.id+'" type="button">Заполнить автоматически</button>' +
                        '</span>';
                html += '</td>';
                html += '<td class="align-center"><label class="ckbxWrap" style="top: 8px; left: 6px;">';
                if ( parseInt( obj.status ) == 1 ) {
                    html += '<input class="sStatus" type="checkbox" value="1" checked />';
                } else {
                    html += '<input class="sStatus" type="checkbox" value="1" />';
                }
                html += '</label></td>';
                html += '<td class="align-center">';
                html += '<a title="Сохранить изменения" href="#" class="sSave btn btn-xs bs-tooltip liTipLink" style="white-space: nowrap; margin-top: 7px;"><i class="fa-fixed-width">&#xf0c7;</i></a>';
                html += '<a title="Удалить" href="#" class="sDelete btn btn-xs bs-tooltip liTipLink" style="white-space: nowrap; margin-top: 7px;"><i class="fa-trash-o"></i></a>';
                html += '</td>';
                html += '</tr>';
                return html;
            };
            // Add a row
            $('#sSave').on('click', function(e){
                e.preventDefault();
                loader($('#sValuesList'), 1);
                var name = $('#sName').val();
                var alias = $('#sAlias').val();
                $.ajax({
                    url: '/wezom/ajax/catalog/addSimpleSpecificationValue',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        specification_id: sID,
                        name: name,
                        alias: alias
                    },
                    success: function(data){
                        if( data.success ) {
                            var html = '';
                            if( data.result.length ) {
                                for( var i = 0; i < data.result.length; i++ ) {
                                    html += generateTR(data.result[i]);
                                }
                            }
                            $('#sValuesList tbody').html(html);
                            $('#sValuesList input[type=checkbox]').each(function(){ checkboxStart($(this)); });
                            $('#sValuesList input[type=checkbox]').on('change',function(){ checkboxStart($(this)); });
                            $('#sName').val('');
                            $('#sAlias').val('');
                        } else {
                            generate(data.error, 'warning');
                        }
                        loader($('#sValuesList'), 0);
                    }
                });
            });
            // Save a row
            $('#sValuesList').on('click', '.sSave', function(e){
                e.preventDefault();
                loader($('#sValuesList'), 1);
                var tr = $(this).closest('tr');
                var id = tr.data('id');
                var name = tr.find('.sName').val();
                var alias = tr.find('.sAlias').val();
                var status = 0;
                if( tr.find('.sStatus').parent().hasClass('checked') ) {
                    status = 1;
                }
                $.ajax({
                    url: '/wezom/ajax/catalog/editSimpleSpecificationValue',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        specification_id: sID,
                        name: name,
                        status: status,
                        id: id,
                        alias: alias
                    },
                    success: function(data){
                        if( data.success ) {
                            var html = '';
                            if( data.result.length ) {
                                for( var i = 0; i < data.result.length; i++ ) {
                                    html += generateTR(data.result[i]);
                                }
                            }
                            $('#sValuesList tbody').html(html);
                            $('#sValuesList input[type=checkbox]').each(function(){ checkboxStart($(this)); });
                            $('#sValuesList input[type=checkbox]').on('change',function(){ checkboxStart($(this)); });
                        } else {
                            generate(data.error, 'warning');
                        }
                        loader($('#sValuesList'), 0);
                    }
                });
            });
            // Delete a row
            $('#sValuesList').on('click', '.sDelete', function(e){
                e.preventDefault();
                loader($('#sValuesList'), 1);
                var tr = $(this).closest('tr');
                var id = tr.data('id');
                $.ajax({
                    url: '/wezom/ajax/catalog/deleteSpecificationValue',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id
                    },
                    success: function(data){
                        if( data.success ) {
                            tr.remove();
                        } else {
                            generate(data.error, 'warning');
                        }
                        loader($('#sValuesList'), 0);
                    }
                });
            });
        }
    });
</script>