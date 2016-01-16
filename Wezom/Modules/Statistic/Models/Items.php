<?php
    namespace Wezom\Modules\Statistic\Models;

    use Core\QB\DB;

    class Items extends \Core\Common {

        public static $table = 'catalog';
        public static $filters = array(
            'artikul' => array(
                'table' => NULL,
                'action' => 'LIKE',
            ),
            'parent_id' => array(
                'table' => NULL,
                'action' => '=',
            ),
        );


        public static function getRows($limit = NULL, $offset = NULL, $filter = true) {
            $result = DB::select(
                'catalog.id', 'catalog.views', 'catalog.artikul', 'catalog.name', 'catalog.cost',
                array(DB::expr('COUNT(DISTINCT orders.id)'), 'orders_count'),
                array(DB::expr('SUM(orders_items.count)'), 'orders_count_items'),
                array(DB::expr('MAX(orders.created_at)'), 'orders_last'),
                array(DB::expr('MAX(orders.id)'), 'orders_last_id')
            )
                ->from('catalog')
                ->join('orders_items', 'LEFT')->on('catalog.id', '=', 'orders_items.catalog_id')
                ->join('orders', 'LEFT')->on('orders_items.order_id', '=', 'orders.id');
            if( $filter ) {
                $result = static::setFilter($result);
            }
            $result->group_by('catalog.id');
            $result->order_by('orders_count', 'DESC');
            $result->order_by('orders_count_items', 'DESC');
            $result->order_by('orders_last', 'DESC');
            $result->order_by('catalog.views', 'DESC');
            $result->order_by('catalog.id', 'DESC');
            if( $limit !== NULL ) {
                $result->limit($limit);
                if( $offset !== NULL ) {
                    $result->offset($offset);
                }
            }
            return $result->find_all();
        }

    }