<?php
    namespace Wezom\Modules\Orders\Models;

    use Core\QB\DB;
    use Core\Arr;
    use Core\Message;
    use Core\Route;

    class OrdersItems extends \Core\Common {

        public static $table = 'orders_items';
        public static $rules = array(
            'id' => array(
                array(
                    'error' => 'Нельзя добавить товар несуществующему заказу!',
                    'key' => 'digits',
                ),
            ),
            'catalog_id' => array(
                array(
                    'error' => 'Нужно выбрать товар для добавления!',
                    'key' => 'digits',
                ),
            ),
            'count' => array(
                array(
                    'error' => 'Укажите количество товара больше 0!',
                    'key' => 'digits',
                ),
            ),
        );

        public static function getRows($order_id) {
            $cart = DB::select('catalog.*', static::$table.'.count', array(static::$table.'.cost', 'price'))
                ->from(static::$table)
                ->join('catalog', 'LEFT')->on(static::$table.'.catalog_id', '=', 'catalog.id')
                ->where(static::$table.'.order_id', '=', $order_id);
            return $cart->find_all();
        }


        public static function getSame($order_id, $catalog_id) {
            $cart = DB::select('catalog.*', static::$table.'.count', static::$table.'.id')
                ->from(static::$table)
                ->join('catalog', 'LEFT')->on(static::$table.'.catalog_id', '=', 'catalog.id')
                ->where(static::$table.'.order_id', '=', $order_id)
                ->where(static::$table.'.catalog_id', '=', $catalog_id);
            return $cart->find();
        }

    }