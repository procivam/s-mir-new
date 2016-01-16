<?php
    namespace Wezom\Modules\User\Controllers;

    use Core\Encrypt;
    use Core\HTTP;
    use Core\User;
    use Core\Arr;
    use Core\Message;
    use Core\View;
    use Core\Route;
    use Core\Widgets;
    use Core\QB\DB;
    use Core\Common;

    class Auth extends \Wezom\Modules\Base {
        
        protected $password_length = 5;

        function before() {
            parent::before();
            $this->_seo['title'] = 'Админ-панель';
        }

        function loginAction () {
            $this->_template = 'Auth';
            if( User::admin() ) {
                HTTP::redirect( 'wezom/index' );
            }
            $this->_content = View::tpl( array(), 'Auth/Login' );
        }

        function editAction () {
            if( !User::admin() ) {
                HTTP::redirect( 'wezom/'.Route::controller().'/login' );
            }

            $user = User::info();

            if( $_POST ) {
                $post = $_POST;
                if( 
                    strlen( Arr::get( $post, 'password' ) ) < $this->password_length OR
                    strlen( Arr::get( $post, 'new_password' ) ) < $this->password_length OR
                    strlen( Arr::get( $post, 'confirm_password' ) ) < $this->password_length OR
                    !User::factory()->check_password( Arr::get( $post, 'password' ), $user->password ) OR
                    Arr::get( $post, 'new_password' ) != Arr::get( $post, 'confirm_password' )
                ) {
                    Message::GetMessage( 0, 'Вы что-то напутали с паролями!' );
                    HTTP::redirect( 'wezom/'.Route::controller().'/edit' );
                }
                if( !strlen( trim( Arr::get( $post, 'name' ) ) ) ) {
                    Message::GetMessage( 0, 'Имя не может быть пустым!' );
                    HTTP::redirect( 'wezom/'.Route::controller().'/edit' );
                }
                if( !strlen( trim( Arr::get( $post, 'login' ) ) ) ) {
                    Message::GetMessage( 0, 'Логин не может быть пустым!' );
                    HTTP::redirect( 'wezom/'.Route::controller().'/edit' );
                }
                $count = DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('users')->where( 'id', '!=', $user->id )->where( 'login', '=', Arr::get( $post, 'login' ) )->count_all();
                if( $count ) {
                    Message::GetMessage( 0, 'Пользователь с таким логином уже существует!' );
                    HTTP::redirect( 'wezom/'.Route::controller().'/edit' );
                }

                $data = array(
                    'name' => Arr::get( $post, 'name' ),
                    'login' => Arr::get( $post, 'login' ),
                    'password' => User::factory()->hash_password( Arr::get( $post, 'new_password' ) ),
                );
                Common::factory('users')->update($data, $user->id);
                Message::GetMessage( 1, 'Вы успешно изменили данные!' );
                HTTP::redirect( 'wezom/'.Route::controller().'/edit' );
            }

            $this->_toolbar = Widgets::get( 'Toolbar/EditSaveOnly' );
            $this->_seo['h1'] = 'Мой профиль';
            $this->_seo['title'] = 'Редактирование личных данных';
            $this->setBreadcrumbs('Мой профиль', 'wezom/'.Route::controller().'/'.Route::action());
            $this->_content = View::tpl( array( 'obj' => $user ), 'Auth/Edit' );
        }

        function logoutAction() {
            if( !User::factory()->_admin ) {
                HTTP::redirect( 'wezom/'.Route::controller().'/login' );
            }
            User::factory()->logout();
            if($_SERVER['HTTP_REFERER']) {
                HTTP::redirect( 'wezom/'.Route::controller().'/login?ref='.Encrypt::instance()->encode($_SERVER['HTTP_REFERER']) );
            } else {
                HTTP::redirect( 'wezom/'.Route::controller().'/login' );
            }
        }
    }