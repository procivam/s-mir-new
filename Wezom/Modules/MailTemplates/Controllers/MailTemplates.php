<?php
    namespace Wezom\Modules\MailTemplates\Controllers;

    use Core\Route;
    use Core\Widgets;
    use Core\Message;
    use Core\Arr;
    use Core\HTTP;
    use Core\Common;
    use Core\View;
    use Core\QB\DB;

    class MailTemplates extends \Wezom\Modules\Base {

        public $tpl_folder = 'MailTemplates';
        public $model;

        function before() {
            parent::before();
            $this->_seo['h1'] = 'Шаблоны писем';
            $this->_seo['title'] = 'Шаблоны писем';
            $this->setBreadcrumbs('Шаблоны писем', 'wezom/'.Route::controller().'/index');
            $this->model = Common::factory('mail_templates');
        }

        function indexAction () {
            $result = DB::select()->from('mail_templates')->where('show', '=', 1)->order_by('sort')->find_all();
            $this->_filter = Widgets::get( 'Filter_Pages' );
            $this->_toolbar = Widgets::get( 'Toolbar_List' );
            $this->_content = View::tpl(
                array(
                    'result' => $result,
                    'tpl_folder' => $this->tpl_folder,
                    'tablename' => $this->model->table(),
                ),$this->tpl_folder.'/Index');
        }

        function editAction () {
            if ($_POST) {
                $post = $_POST['FORM'];
                $post['status'] = Arr::get( $_POST, 'status', 0 );
                $res = $this->model->update($post, Route::param('id'));
                if($res) {
                    Message::GetMessage(1, 'Вы успешно изменили данные!');
                    HTTP::redirect('wezom/'.Route::controller().'/edit/'.Route::param('id'));
                } else {
                    Message::GetMessage(0, 'Не удалось изменить данные!');
                }
                $result = Arr::to_object($post);
            } else {
                $result = $this->model->getRow(Route::param('id'));
            }
            $this->_toolbar = Widgets::get( 'Toolbar_Edit', array('noAdd' => true) );
            $this->_seo['h1'] = 'Редактирование';
            $this->_seo['title'] = 'Редактирование';
            $this->setBreadcrumbs('Редактирование', 'wezom/'.Route::controller().'/edit/'.(int) Route::param('id'));
            $this->_content = View::tpl(
                array(
                    'obj' => $result,
                    'tpl_folder' => $this->tpl_folder,
                ), $this->tpl_folder.'/Form');
        }

    }