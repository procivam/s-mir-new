<div class="rowSection">
    <div class="col-md-12">
        <div class="widget">
            <div class="widgetHeader" style="padding-bottom: 10px;">
                <form class="widgetContent filterForm" action="/wezom/statistic/items" method="get">
                    <div class="col-md-2">
                        <label class="control-label">Артикул</label>
                        <div class="">
                            <div class="controls">
                                <input name="artikul" class="form-control" value="<?php echo Core\Arr::get($_GET, 'artikul', NULL); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Группа</label>
                        <div class="">
                            <div class="controls">
                                <select name="parent_id" class="form-control">
                                    <option value="">Все</option>
                                    <?php echo $tree; ?>
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
                    <div class="col-md-1 stable105">
                        <label class="control-label" style="height:19px;"></label>
                        <div class="">
                            <div class="controls">
                                <a href="/wezom/statistic/items">
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
                            <th>Артикул</th>
                            <th>Наименование</th>
                            <th>Стоимость</th>
                            <th>Просмотров</th>
                            <th>Заказов</th>
                            <th>Поледний заказ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ( $result as $obj ): ?>
                            <tr data-id="<?php echo $obj->id; ?>">
                                <td><a href="<?php echo \Core\HTML::link('wezom/items/edit/'.$obj->id); ?>"><?php echo $obj->artikul; ?></a></td>
                                <td><a href="<?php echo \Core\HTML::link('wezom/items/edit/'.$obj->id); ?>"><?php echo $obj->name; ?></a></td>
                                <td><?php echo (int) $obj->cost; ?> грн</td>
                                <td><?php echo (int) $obj->views; ?></td>
                                <td><?php echo (int) $obj->orders_count; ?> / <?php echo (int) $obj->orders_count_items; ?> шт</td>
                                <td>
                                    <?php if($obj->orders_last_id): ?>
                                        <a href="<?php echo \Core\HTML::link('wezom/orders/edit/'.$obj->orders_last_id); ?>"><?php echo date('d.m.Y, H:i', $obj->orders_last); ?></a>
                                    <?php else: ?>
                                        ----
                                    <?php endif; ?>
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