<div class="dd pageList" id="myNest" data-depth="1">
    <ol class="dd-list">
        <?php foreach ($result as $obj): ?>
            <li class="dd-item dd3-item" data-id="<?php echo $obj->id; ?>">
                <div title="Переместить строку" class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">
                    <table>
                        <tr>
                            <td class="column-drag" width="1%"></td>
                            <td width="1%" class="checkbox-column">
                                <label><input type="checkbox" /></label>
                            </td>
                            <td valign="top" class="pagename-column">
                                <div class="clearFix">
                                    <div class="pull-left">
                                        <div class="pull-left">
                                            <div><a class="pageLinkEdit" href="<?php echo '/wezom/'.Core\Route::controller().'/edit/'.$obj->id; ?>"><?php echo $obj->name; ?></a></div>
                                            <div class="size11 nowrap">(<span class="gray">URL:</span> <?php echo $obj->url; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="45" valign="top" class="icon-column status-column">
                                <?php echo Core\View::widget(array( 'status' => $obj->status, 'id' => $obj->id ), 'StatusList'); ?>
                            </td> 
                            <td class="nav-column icon-column" valign="top">
                                <ul class="table-controls">
                                    <li>
                                        <a title="Управление" href="javascript:void(0);" class="bs-tooltip dropdownToggle"><i class="fa-cog"></i> </a>
                                        <ul class="dropdownMenu pull-right">
                                            <li>
                                                <a title="Редактировать" href="<?php echo '/wezom/'.Core\Route::controller().'/edit/'.$obj->id; ?>"><i class="fa-pencil"></i> Редактировать</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a title="Удалить" onclick="return confirm('Это действие необратимо. Продолжить?');" href="<?php echo '/wezom/'.Core\Route::controller().'/delete/'.$obj->id; ?>"><i class="fa-trash-o text-danger"></i> Удалить</a>
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
</div>
<span id="parameters" data-table="<?php echo $tablename; ?>"></span>
<input type="hidden" id="myNestJson">