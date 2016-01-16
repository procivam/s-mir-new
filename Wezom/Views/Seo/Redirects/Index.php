<div class="widgetHeader" style="padding-bottom: 10px;">
    <form class="widgetContent filterForm" action="/wezom/seo_redirects/index" method="get">
        <div class="col-md-2">
            <label class="control-label">URL с</label>
            <div class="">
                <div class="controls">
                    <input name="link_from" class="form-control" value="<?php echo Core\Arr::get($_GET, 'link_from', NULL); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="control-label">URL на</label>
            <div class="">
                <div class="controls">
                    <input name="link_to" class="form-control" value="<?php echo Core\Arr::get($_GET, 'link_to', NULL); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="control-label">Тип</label>
            <div class="">
                <div class="controls">
                    <select name="type" class="form-control">
                        <option value="">Все</option>
                        <option value="300" <?php echo Core\Arr::get($_GET, 'type') == 300 ? 'selected' : NULL; ?>>300 Multiple Choices</option>
                        <option value="301" <?php echo Core\Arr::get($_GET, 'type') == 301 ? 'selected' : NULL; ?>>301 Moved Permanently</option>
                        <option value="302" <?php echo Core\Arr::get($_GET, 'type') == 302 ? 'selected' : NULL; ?>>302 Moved Temporarily</option>
                        <option value="303" <?php echo Core\Arr::get($_GET, 'type') == 303 ? 'selected' : NULL; ?>>303 See Other</option>
                        <option value="304" <?php echo Core\Arr::get($_GET, 'type') == 304 ? 'selected' : NULL; ?>>304 Not Modified</option>
                        <option value="305" <?php echo Core\Arr::get($_GET, 'type') == 305 ? 'selected' : NULL; ?>>305 Use Proxy</option>
                        <option value="307" <?php echo Core\Arr::get($_GET, 'type') == 307 ? 'selected' : NULL; ?>>307 Temporary Redirect</option>
                    </select>
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
                    <a href="/wezom/seo_redirects/index">
                        <i class="fa-refresh"></i>
                        <span class="hidden-xx">Сбросить</span>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="dd pageList">
    <ol class="dd-list">
        <?php foreach ($result as $obj): ?>
            <li class="dd-item dd3-item" data-id="<?php echo $obj->id; ?>">
                <div class="dd3-content" style="padding-left: 0;">
                    <table>
                        <tr>
                            <td width="1%" class="checkbox-column">
                                <label><input type="checkbox" /></label>
                            </td>
                            <td class="hidden-xs" valign="middle">
                                <div><a href="<?php echo $obj->link_from; ?>" target="_blank"><?php echo $obj->link_from; ?></a></div>
                            </td>
                            <td class="hidden-xs" valign="middle">
                                <div><a href="<?php echo $obj->link_to; ?>" target="_blank"><?php echo $obj->link_to; ?></a></div>
                            </td>
                            <td><?php echo $obj->type; ?></td>
                            <td width="45" valign="top" class="icon-column status-column">
                                <?php echo Core\View::widget(array( 'status' => $obj->status, 'id' => $obj->id ), 'StatusList'); ?>
                            </td>
                            <td class="nav-column icon-column" valign="top">
                                <ul class="table-controls">
                                    <li>
                                        <a title="Управление перенаправлением" href="javascript:void(0);" class="bs-tooltip dropdownToggle"><i class="fa-cog"></i> </a>
                                        <ul class="dropdownMenu pull-right">
                                            <li>
                                                <a title="Редактировать" href="<?php echo '/wezom/seo_redirects/edit/'.$obj->id; ?>"><i class="fa-pencil"></i> Редактировать перенаправление</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a title="Удалить" onclick="return confirm('Это действие необратимо. Продолжить?');" href="<?php echo '/wezom/seo_redirects/delete/'.$obj->id; ?>"><i class="fa-trash-o text-danger"></i> Удалить перенаправление</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
    <?php echo $pager; ?>
</div>
<span id="parameters" data-table="<?php echo $tablename; ?>"></span>