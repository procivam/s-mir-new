<form action="" method="get" class="products-filter">
    <div class="small_filter" id="catalogSort" data-uri="<?php echo str_replace( '/page/'.Core\Route::param('page'), '', Core\Arr::get($_SERVER, 'REQUEST_URI') ); ?>" data-get="<?php echo Core\Route::controller() == 'search' ? 'query='.Core\Arr::get($_GET, 'query') : ''; ?>">
        <?php if(count($brands)): ?>
            <table width="30%" border="0">
                <tbody>
                    <tr>
                        <td class="topblok1">
                            <div class="rel"><a href="#" class="link"><span>Производитель</span></a>
                                <br>
                                <div class="window" style="display: none;">
                                    <ul>
                                        <?php foreach($brands as $obj): ?>
                                            <li>
                                                <label for="brand-<?php echo $obj->alias ?>"><?php echo $obj->name; ?>
                                                    <input type="radio" name="brand" value="<?php echo $obj->alias; ?>"
                                                       id="brand-<?php echo $obj->alias ?>"
                                                        <?php echo isset($_GET['brand']) && $_GET['brand'] == $obj->alias ? 'checked' : null ?>>
                                                </label>
                                            </li>
                                        <?php endforeach;
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </td>
                        <td></td><td></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <p class="byline"></p>
        <table width="100%" border="0">
            <tbody>
                <tr>
                    <td class="sort1">Сортировать по: &nbsp;<span>Цене</span></td>
                    <td class="sort2">
                        <label class="but_down <?php echo !isset($_GET['sort']) || $_GET['sort'] == 'price-desc' ? 'active' : null ?>"
                               for="price-desc">
                            <input type="radio" name="sort" value="price-desc" id="price-desc" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'price-desc' ? 'checked' : null ?>">
                        </label>
                        <label class="but_up <?php echo isset($_GET['sort']) && $_GET['sort'] == 'price-asc' ? 'active' : null ?>" for="price-asc">
                            <input type="radio" name="sort" value="price-asc" id="price-asc" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'price-asc' ? 'checked' : null ?>>
                        </label>
                    </td>

                    <td class="sort5"><span>Наименованию</span></td>
                    <td class="sort2">
                        <label class="but_down <?php echo isset($_GET['sort']) && $_GET['sort'] == 'name-asc' ? 'active' : null ?>" for="name-asc">
                            <input type="radio" name="sort" value="name-asc" id="name-asc" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'name-asc' ? 'checked' : null ?>>
                        </label>
                        <label class="but_up <?php echo isset($_GET['sort']) && $_GET['sort'] == 'name-desc' ? 'active' : null ?>" for="name-desc">
                            <input type="radio" name="sort" value="name-desc" id="name-desc" <?php echo isset($_GET['sort']) && $_GET['sort'] == 'name-desc' ? 'checked' : null ?>>
                        </label>
                    </td>
                    <td>
                        <ul class="pagesort">
                            <li class="<?php echo !isset($_GET['at-page']) || Core\Config::get('basic.limit') == $_GET['at-page'] ? 'active' : null ?>">
                                <label  for="at-page-<?php echo Core\Config::get('basic.limit')?>">
                                    <?php echo Core\Config::get('basic.limit')?>
                                    <input type="radio" name="at-page" value="<?php echo Core\Config::get('basic.limit')?>"
                                           id="at-page-<?php echo Core\Config::get('basic.limit')?>"
                                        <?php echo isset($_GET['at-page']) && $_GET['at-page'] == Core\Config::get('basic.limit') ? 'checked' : null ?>>
                                </label>
                            </li>
                            <li class="<?php echo isset($_GET['at-page']) && Core\Config::get('basic.limit')*2 == $_GET['at-page'] ? 'active' : null ?>">
                                <label for="at-page-<?php echo Core\Config::get('basic.limit')*2?>">
                                    <?php echo Core\Config::get('basic.limit')*2?>
                                    <input type="radio" name="at-page" value="<?php echo Core\Config::get('basic.limit')*2?>"
                                           id="at-page-<?php echo Core\Config::get('basic.limit')*2?>"
                                        <?php echo isset($_GET['at-page']) && $_GET['at-page'] == Core\Config::get('basic.limit')*2 ? 'checked' : null ?>>
                                </label>
                            </li>
                        </ul>
                        <span class="srt">Показывать по:</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="h50"></p>
    </div>
</form>

<script>
    $(function(){
        $('.products-filter input').on('change', function(){
            $(this).closest('form').submit();
        });
    });
</script>