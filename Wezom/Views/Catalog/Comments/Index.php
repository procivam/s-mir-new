<div class="rowSection">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetHeader" style="padding-bottom: 10px;">
                <form class="widgetContent filterForm" action="/wezom/<?php echo Core\Route::controller(); ?>/index" method="get">
                    <div class="col-md-2">
                        <label class="control-label">Название товара</label>
                        <div class="">
                            <div class="controls">
                                <input name="item_name" class="form-control" value="<?php echo Core\Arr::get($_GET, 'item_name', NULL); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Дата от</label>
                        <div class="">
                            <div class="controls">
                                <input name="date_s" class="form-control fPicker" value="<?php echo Core\Arr::get($_GET, 'date_s', NULL); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Дата до</label>
                        <div class="">
                            <div class="controls">
                                <input name="date_po" class="form-control fPicker" value="<?php echo Core\Arr::get($_GET, 'date_po', NULL); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Статус</label>
                        <div class="">
                            <div class="controls">
                                <select name="status" class="form-control">
                                    <option value="">Все</option>
                                    <option value="0" <?php echo Core\Arr::get($_GET, 'status', 2) == '0' ? 'selected' : ''; ?>>Неопубликованы</option>
                                    <option value="1" <?php echo Core\Arr::get($_GET, 'status') == '1' ? 'selected' : ''; ?>>Опубликованы</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label class="control-label" style="height:13px;"></label>
                        <div class="">
                            <div class="controls">
                                <input type="submit" class="btn btn-primary" value="Подобрать" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label class="control-label" style="height:19px;"></label>
                        <div class="">
                            <div class="controls">
                                <a href="/wezom/<?php echo Core\Route::controller(); ?>/index">
                                    <i class="fa-refresh"></i>
                                    <span class="hidden-xx">Сбросить</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="widget">
                <div class="widgetContent">
                    <table class="table table-striped table-hover checkbox-wrap ">
                        <thead>
                            <tr>
                                <th class="checkbox-head">
                                    <label><input type="checkbox"></label>
                                </th>
                                <th>IP</th>
                                <th>Товар</th>
                                <th>Имя</th>
                                <th>Город</th>
                                <th>Дата</th>
                                <th>Опубликовано?</th>
                                <th class="nav-column textcenter">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $result as $obj ): ?>
                                <tr data-id="<?php echo $obj->id; ?>">
                                    <td class="checkbox-column">
                                        <label><input type="checkbox"></label>
                                    </td>
                                    <td><?php echo $obj->ip ? $obj->ip : '<i class="color: #ccc;">( Администратор )</i>'; ?></td>
                                    <td>
                                        <?php if ( $obj->item_name ): ?>
                                            <a href="/wezom/items/edit/<?php echo $obj->catalog_id ?>" target="_blank"><?php echo $obj->item_name; ?></a>
                                        <?php else: ?>
                                            <i style="color: #aaa;">( Удален )</i>
                                        <?php endif ?>
                                    </td>
                                    <td><a href="/wezom/<?php echo Core\Route::controller(); ?>/edit/<?php echo $obj->id ?>"><?php echo $obj->name; ?></a></td>
                                    <td><?php echo $obj->city; ?></td>
                                    <td><?php echo $obj->date ? date('d.m.Y', $obj->date) : '---'; ?></td>
                                    <td width="45" valign="top" class="icon-column status-column">
                                        <?php echo Core\View::widget(array( 'status' => $obj->status, 'id' => $obj->id ), 'StatusList'); ?>
                                    </td>
                                    <td class="nav-column">
                                        <ul class="table-controls">
                                            <li>
                                                <a class="bs-tooltip dropdownToggle" href="javascript:void(0);" title="Управление"><i class="fa-cog size14"></i></a>
                                                <ul class="dropdownMenu pull-right">
                                                    <li>
                                                        <a href="/wezom/<?php echo Core\Route::controller(); ?>/edit/<?php echo $obj->id; ?>" title="Редактировать"><i class="fa-pencil"></i> Редактировать</a>
                                                    </li>
                                                    <li>
                                                        <a href="/wezom/items/edit/<?php echo $obj->catalog_id; ?>" title="Перейти к товару"><i class="fa-inbox"></i> Перейти к товару</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a onclick="return confirm('Это действие необратимо. Продолжить?');" href="/wezom/<?php echo Core\Route::controller(); ?>/delete/<?php echo $obj->id; ?>" title="Удалить"><i class="fa-trash-o text-danger"></i> Удалить</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php echo $pager; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<span id="parameters" data-table="<?php echo $tablename; ?>"></span>