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
                                            <a href="?<?php echo 'brand='.$obj->alias.(Core\Arr::get($_GET, 'sort') ? '&sort='.$_GET['sort'] : '').(Core\Arr::get($_GET, 'at_page') ? '&at_page='.$_GET['at_page'] : ''); ?>"><?php echo $obj->name; ?></a>
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
                    <a href="?<?php echo (Core\Arr::get($_GET, 'brand') ? 'brand='.$_GET['brand'].'&' : '').
                        (Core\Arr::get($_GET, 'sort') ? 'sort='.$_GET['sort'].'&' : '').
                        (Core\Arr::get($_GET, 'at_page') ? 'at_page='.$_GET['at_page'].'&' : ''); ?>" class="but_down"></a>
                    <a href="?<?php echo (Core\Arr::get($_GET, 'brand') ? 'brand='.$_GET['brand'].'&' : '').
                        (Core\Arr::get($_GET, 'sort') ? 'sort='.$_GET['sort'].'&' : '').
                        (Core\Arr::get($_GET, 'at_page') ? 'at_page='.$_GET['at_page'].'&' : ''); ?>" class="but_down"" class="but_up"></a>
                </td>

                <td class="sort3">Рейтингу</td>
                <td class="sort2">
                    <a href="" class="but_down"></a>
                    <a href="" class="but_up"></a>
                </td>

                <td class="sort5"><span>Наименованию</span></td>
                <td class="sort2">
                    <a href="?sort=name asc" class="but_down "></a>
                    <a href="?sort=name desc" class="but_up "></a>
                </td>
                <td>
                    <ul class="pagesort">
                        <li class="active"><a href="?rows=9">9</a></li>
                        <li><a href="?rows=12">12</a></li>
                    </ul>
                    <span class="srt">Показывать по:</span>
                </td>
            </tr>
        </tbody>
    </table>
    <p class="h50"></p>
</div>



<div class="small_filt" id="catalogSort" data-uri="<?php echo str_replace( '/page/'.Core\Route::param('page'), '', Core\Arr::get($_SERVER, 'REQUEST_URI') ); ?>" data-get="<?php echo Core\Route::controller() == 'search' ? 'query='.Core\Arr::get($_GET, 'query') : ''; ?>">
    <div class="small_filt1">
        <p>выводить ПО:</p>
        <select name="per_page" id="select1">
            <?php $limit = Core\Config::get('basic.limit'); ?>
            <?php for( $i = Core\Config::get('basic.limit'); $i < Core\Config::get('basic.limit') * 5; $i += Core\Config::get('basic.limit') ): ?>
                <option value="<?php echo $i; ?>" <?php echo Core\Arr::get($_GET, 'per_page') == $i ? 'selected' : ''; ?>><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
        <p>на странице</p>
    </div>
    <div class="small_filt2">
        <p>сортировать:</p>
        <select name="sort" id="select2">
            <option value="">Не сортировать</option>
            <option value="cost" data-type="desc" <?php echo (Core\Arr::get($_GET, 'sort') == 'cost' AND Core\Arr::get($_GET, 'type') == 'desc') ? 'selected' : ''; ?>>От дорогих к бютжетным</option>
            <option value="cost" data-type="asc" <?php echo (Core\Arr::get($_GET, 'sort') == 'cost' AND Core\Arr::get($_GET, 'type') == 'asc') ? 'selected' : ''; ?>>От бютжетных к дорогим</option>
            <option value="created_at" data-type="desc" <?php echo (Core\Arr::get($_GET, 'sort') == 'created_at' AND Core\Arr::get($_GET, 'type') == 'desc') ? 'selected' : ''; ?>>От новых моделей к старым</option>
            <option value="created_at" data-type="asc" <?php echo (Core\Arr::get($_GET, 'sort') == 'created_at' AND Core\Arr::get($_GET, 'type') == 'asc') ? 'selected' : ''; ?>>От старых моделей к новым</option>
            <option value="name" data-type="asc" <?php echo (Core\Arr::get($_GET, 'sort') == 'name' AND Core\Arr::get($_GET, 'type') == 'asc') ? 'selected' : ''; ?>>По названию от А до Я</option>
            <option value="name" data-type="desc" <?php echo (Core\Arr::get($_GET, 'sort') == 'name' AND Core\Arr::get($_GET, 'type') == 'desc') ? 'selected' : ''; ?>>По названию от Я до А</option>
        </select>
    </div>
</div>

<script>
    $(function(){
        $('#catalogSort select').on('change', function(){
            // Get clear uri
            var uri = $('#catalogSort').data('uri');
            arr = uri.split('?');
            uri = arr[0];
            // Get parameter for search controller
            var old = $('#catalogSort').data('get');
            // Create get parameters
            var get = [];
            if (old) {
                get.push(old);
            }
            $('#catalogSort select').each(function(){
                if( $(this).attr('name') == 'per_page' ) {
                    get.push('per_page=' + $(this).val());
                }
                if( $(this).attr('name') == 'sort' && $(this).val() ) {
                    get.push('sort=' + $(this).val());
                    get.push('type=' + $(this).find('option:selected').data('type'));
                }
            });
            // Create link
            if( get.length ) {
                get = get.join('&');
                uri += '?' + get;
            }
            // Relocate
            window.location.href = uri;
        });
    });
</script>