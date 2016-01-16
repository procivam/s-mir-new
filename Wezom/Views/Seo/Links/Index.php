<div class="widgetHeader" style="padding-bottom: 10px;">
    <form class="widgetContent filterForm" action="/wezom/seo_links/index" method="get">
        <div class="col-md-2">
            <label class="control-label">Название</label>
            <div class="">
                <div class="controls">
                    <input name="name" class="form-control" value="<?php echo Core\Arr::get($_GET, 'name', NULL); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <label class="control-label">URL</label>
            <div class="">
                <div class="controls">
                    <input name="link" class="form-control" value="<?php echo Core\Arr::get($_GET, 'link', NULL); ?>">
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
                    <a href="/wezom/seo_links/index">
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
                            <td valign="middle" class="pagename-column">
                                <div class="clearFix">
                                    <div class="pull-left">
                                        <div class="pull-left">
                                            <div><a class="pageLinkEdit" href="<?php echo '/wezom/seo_links/edit/'.$obj->id; ?>"><?php echo $obj->name; ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden-xs" valign="middle">
                                <div><a href="<?php echo $obj->link; ?>" target="_blank"><?php echo $obj->link; ?></a></div>
                            </td>
                            <td width="45" valign="top" class="icon-column status-column">
                                <?php echo Core\View::widget(array( 'status' => $obj->status, 'id' => $obj->id ), 'StatusList'); ?>
                            </td> 
                            <td class="nav-column icon-column" valign="top">
                                <ul class="table-controls">
                                    <li>
                                        <a title="Управление ссылкой" href="javascript:void(0);" class="bs-tooltip dropdownToggle"><i class="fa-cog"></i> </a>
                                        <ul class="dropdownMenu pull-right">
                                            <li>
                                                <a title="Редактировать" href="<?php echo '/wezom/seo_links/edit/'.$obj->id; ?>"><i class="fa-pencil"></i> Редактировать ссылку</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a title="Удалить" onclick="return confirm('Это действие необратимо. Продолжить?');" href="<?php echo '/wezom/seo_links/delete/'.$obj->id; ?>"><i class="fa-trash-o text-danger"></i> Удалить ссылку</a>
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