<?php
    namespace Wezom\Modules\User\Models;

    use Core\Config;
    use Core\Arr;
    use Core\Message;
    use Core\QB\DB;
    use Core\Route;

    class Users extends \Core\Common {

        public static $table = 'users';
        public static $filters = array(
            'name' => array(
                'table' => NULL,
                'action' => 'LIKE',
            ),
            'email' => array(
                'table' => NULL,
                'action' => 'LIKE',
            ),
            'phone' => array(
                'table' => NULL,
                'action' => 'LIKE',
            ),
        );
        public static $rules = array(
            'name' => array(
                array(
                    'error' => 'Имя не может быть пустым!',
                    'key' => 'not_empty',
                ),
            ),
            'email' => array(
                array(
                    'error' => 'Поле "E-Mail" введено некорректно!',
                    'key' => 'email',
                ),
            ),
        );
        public static function valid($post) {
            if( Route::param('id') ) {
                if(DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('users')->where('email', '=', Arr::get($post, 'email'))->where('id', '!=', Route::param('id'))->count_all()) {
                    Message::GetMessage(0, 'Указанный E-Mail уже занят!');
                    return FALSE;
                }
            } else {
                if(DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('users')->where('email', '=', Arr::get($post, 'email'))->count_all()) {
                    Message::GetMessage(0, 'Указанный E-Mail уже занят!');
                    return FALSE;
                }
            }
            if(Arr::get($_POST, 'password') || !Route::param('id')) {
                if(mb_strlen(Arr::get($_POST, 'password'), 'UTF-8') < Config::get('main.password_min_length') ) {
                    Message::GetMessage(0, 'Пароль должен быть не короче '.Config::get('main.password_min_length').' символов!');
                    return FALSE;
                }
            }
            return parent::valid($post);
        }

        public static function getForOrder($id) {
            $user = DB::select(
                'users.*',
                array(DB::expr('COUNT(DISTINCT orders.id)'), 'orders'),
                array(DB::expr('SUM(orders_items.cost * orders_items.count)'), 'amount'),
                array(DB::expr('SUM(orders_items.count)'), 'count_items')
            )
                ->from('users')
                ->join('orders')->on('orders.user_id', '=', 'users.id')
                ->join('orders_items')->on('orders_items.order_id', '=', 'orders.id')
                ->where('users.id', '=', $id)
                ->where('orders.status', '=', 1);
            return $user->find();
        }

        public static function getRows($status = NULL, $sort = NULL, $type = NULL, $limit = NULL, $offset = NULL) {
            $result = DB::select()->from(static::$table)->where('role_id', '=', 1);
            $result = parent::setFilter($result);
            if( $status !== NULL ) {
                $result->where(static::$table.'.status', '=', $status);
            }
            if( $sort !== NULL ) {
                if( $type !== NULL ) {
                    $result->order_by($sort, $type);
                } else {
                    $result->order_by($sort);
                }
            }
            if( $limit !== NULL ) {
                $result->limit($limit);
                if( $offset !== NULL ) {
                    $result->offset($offset);
                }
            }
            return $result->find_all();
        }

        public static function countRows($status = NULL) {
            $result = DB::select(array(DB::expr('COUNT('.static::$table.'.id)'), 'count'))->from(static::$table)->where('role_id', '=', 1);
            $result = parent::setFilter($result);
            if( $status !== NULL ) {
                $result->where(static::$table.'.status', '=', $status);
            }
            return $result->count_all();
        }

    }