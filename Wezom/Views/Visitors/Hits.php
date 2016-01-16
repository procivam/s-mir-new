<div class="rowSection">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetHeader" style="padding-bottom: 10px;">
                <form class="widgetContent filterForm" action="/wezom/<?php echo Core\Route::controller(); ?>/index" method="get">
                    <div class="col-md-2">
                        <label class="control-label">IP</label>
                        <div class="">
                            <div class="controls">
                                <input name="ip" class="form-control" value="<?php echo Core\Arr::get($_GET, 'ip', NULL); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Ответ сервера</label>
                        <div class="">
                            <div class="controls">
                                <select name="status" class="form-control">
                                    <option value="">Все</option>
                                    <?php foreach ($answers as $key => $value): ?>
                                        <option value="<?php echo $value->status; ?>" <?php echo $value->status == \Core\Arr::get($_GET, 'status') ? 'selected' : NULL; ?>><?php echo $value->status; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Устройство</label>
                        <div class="">
                            <div class="controls">
                                <select name="device" class="form-control">
                                    <option value="">Все</option>
                                    <?php foreach ($devices as $key => $value): ?>
                                        <option value="<?php echo $value->device; ?>" <?php echo $value->device == \Core\Arr::get($_GET, 'device') ? 'selected' : NULL; ?>><?php echo $value->device; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Сортировать</label>
                        <div class="">
                            <div class="controls">
                                <select name="sort" class="form-control">
                                    <option value="updated_at-desc">По дате последнего обновления Я -> А</option>
                                    <option value="updated_at-asc" <?php echo \Core\Arr::get($_GET, 'sort') == 'updated_at-asc' ? 'selected' : NULL; ?>>По дате последнего обновления А -> Я</option>
                                    <option value="created_at-desc" <?php echo \Core\Arr::get($_GET, 'sort') == 'created_at-desc' ? 'selected' : NULL; ?>>По дате первого посещения Я -> А</option>
                                    <option value="created_at-asc" <?php echo \Core\Arr::get($_GET, 'sort') == 'created_at-asc' ? 'selected' : NULL; ?>>По дате первого посещения А -> Я</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Выводить по</label>
                        <div class="">
                            <div class="controls">
                                <select name="limit" class="form-control">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php $number = $i * Core\Config::get('basic.limit_backend'); ?>
                                        <option value="<?php echo $number; ?>" <?php echo Core\Arr::get($_GET, 'limit', Core\Config::get('basic.limit_backend')) == $number ? 'selected' : ''; ?>><?php echo $number; ?></option>
                                    <?php endfor; ?>
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
                    <table class="table table-striped table-hover checkbox-wrap">
                        <thead>
                            <tr>
                                <th>IP</th>
                                <th>URL</th>
                                <th>Ответ сервера</th>
                                <th>Устройство</th>
                                <th>Дата посещения</th>
                                <th>Дата последнего обновления страницы</th>
                                <th>Всего обновлений страницы</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $result as $obj ): ?>
                                <tr data-id="<?php echo $obj->id; ?>">
                                    <td><a href="<?php echo '/wezom/visitors/index?ip='.$obj->ip; ?>"><?php echo $obj->ip; ?></a></td>
                                    <td><a href="<?php echo $obj->url; ?>" target="_blank"><?php echo $obj->url; ?></a></td>
                                    <td><?php echo $obj->status; ?></td>
                                    <td><span class="dashed" title="<?php echo $obj->useragent; ?>"><?php echo $obj->device; ?></span></td>
                                    <td><?php echo date('d.m.Y H:i:s', $obj->created_at); ?></td>
                                    <td><?php echo date('d.m.Y H:i:s', $obj->updated_at); ?></td>
                                    <td><?php echo $obj->counter; ?></td>
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