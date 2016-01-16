<?php
    namespace Wezom\Modules\Catalog\Controllers;

    use Core\Config;
    use Core\HTML;
    use Core\Image\Image;
    use Core\QB\DB;
    use Core\Route;
    use Core\Widgets;
    use Core\Message;
    use Core\Arr;
    use Core\Support;
    use Core\HTTP;
    use Core\View;
    use Core\Pager\Pager;

    use Wezom\Modules\Catalog\Models\Items AS Model;
    use Wezom\Modules\Catalog\Models\CatalogImages AS Images;
    use Wezom\Modules\Catalog\Models\Brands;
    use Wezom\Modules\Catalog\Models\Specifications;
    use Wezom\Modules\Catalog\Models\SpecificationsValues;
    use Wezom\Modules\Catalog\Models\Models;

    class Items extends \Wezom\Modules\Base {

        public $tpl_folder = 'Catalog/Items';
        public $page;
        public $limit;
        public $offset;

        function before() {
            parent::before();
            $this->_seo['h1'] = 'Товары';
            $this->_seo['title'] = 'Товары';
            $this->setBreadcrumbs('Товары', 'wezom/'.Route::controller().'/index');
            $this->page = (int) Route::param('page') ? (int) Route::param('page') : 1;
            $this->limit = (int) Arr::get($_GET, 'limit', Config::get('basic.limit_backend')) < 1 ?: Arr::get($_GET, 'limit', Config::get('basic.limit_backend'));
            $this->offset = ($this->page - 1) * $this->limit;
        }

        function testAction(){
            $this->_content = View::tpl(array(), $this->tpl_folder.'/Test');
        }
        function cropAction(){
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                $json = Arr::get($_POST, 'json', '[]');
                $data = json_decode($json, true);

                $image = Image::factory(HOST.HTML::bmedia('pic/test.jpg'));
                $image->crop($data['cropBox']['width'], $data['cropBox']['height'], $data['cropBox']['x'], $data['cropBox']['y']);
                $image->resize(220, 180);
                $image->save(HOST.'/test.jpg');

                HTML::preDie($data);
            }
            $this->_content = View::tpl(array(), $this->tpl_folder.'/Crop');
        }

        function indexAction () {
            $status = NULL;
            if ( isset($_GET['status']) && $_GET['status'] != '' ) { $status = Arr::get($_GET, 'status', 1); }
            $page = (int) Route::param('page') ? (int) Route::param('page') : 1;
            $count = Model::countRows($status);
            $result = Model::getRows($status, 'sort', 'ASC', $this->limit, ($page - 1) * $this->limit);
            $pager = Pager::factory( $page, $count, $this->limit )->create();
            $this->_toolbar = Widgets::get( 'Toolbar_List', array( 'add' => 1, 'delete' => 1 ) );
            $this->_content = View::tpl(
                array(
                    'result' => $result,
                    'tpl_folder' => $this->tpl_folder,
                    'tablename' => Model::$table,
                    'count' => $count,
                    'pager' => $pager,
                    'pageName' => $this->_seo['h1'],
                    'tree' => Support::getSelectOptions('Catalog/Items/Select', 'catalog_tree', Arr::get($_GET, 'parent_id')),
                ), $this->tpl_folder.'/Index');
        }

        function editAction () {
            $specArray = Arr::get( $_POST, 'SPEC', array() );
            if ($_POST) {
                $post = $_POST['FORM'];
                // Set default settings for some fields
                $post['status'] = Arr::get( $_POST, 'status', 0 );
                $post['new'] = Arr::get( $_POST, 'new', 0 );
                $post['top'] = Arr::get( $_POST, 'top', 0 );
                $post['sale'] = Arr::get( $_POST, 'sale', 0 );
                $post['available'] = Arr::get( $_POST, 'available', 0 );
                $post['cost'] = (int) Arr::get( $post, 'cost', 0 );
                $post['cost_old'] = (int) Arr::get( $post, 'cost_old', 0 );
                $post['brand_alias'] = Arr::get($post, 'brand_alias') ?: NULL;
                $post['model_alias'] = Arr::get($post, 'model_alias') ?: NULL;
                $post['sort'] = (int) Arr::get($post, 'sort');
                // Check form for rude errors
                if( Model::valid($post) ) {
                    $post['alias'] = Model::getUniqueAlias(Arr::get($post, 'alias'), Route::param('id'));
                    $res = Model::update($post, Route::param('id'));
                    if($res) {
                        Model::changeSpecificationsCommunications($specArray, Route::param('id'));
                        Message::GetMessage(1, 'Вы успешно изменили данные!');
                        if(Arr::get($_POST, 'button', 'save') == 'save-close') {
                            HTTP::redirect('wezom/'.Route::controller().'/index');
                        } else if(Arr::get($_POST, 'button', 'save') == 'save-add') {
                            HTTP::redirect('wezom/'.Route::controller().'/add');
                        } else {
                            HTTP::redirect('wezom/' . Route::controller() . '/edit/' . Route::param('id'));
                        }
                    } else {
                        Message::GetMessage(0, 'Не удалось изменить данные!');
                    }
                }
                $result = Arr::to_object($post);
            } else {
                $result = Model::getRow(Route::param('id'));
                $specArray = Model::getItemSpecificationsAliases(Route::param('id'));
            }
            $this->_toolbar = Widgets::get( 'Toolbar_Edit' );
            $this->_seo['h1'] = 'Редактирование';
            $this->_seo['title'] = 'Редактирование';
            $this->setBreadcrumbs('Редактирование', 'wezom/'.Route::controller().'/edit/'.Route::param('id'));
            $brands = Brands::getGroupRows($result->parent_id);
            $models = Models::getBrandRows($result->brand_alias);
            $specifications = Specifications::getGroupRows($result->parent_id);
            $specValues = SpecificationsValues::getRowsBySpecifications($specifications);
            $arr = array();
            foreach ($specValues as $obj) {
                $arr[$obj->specification_id][] = $obj;
            }
            $rel = DB::select('catalog.*', 'catalog_images.image')
                ->from('catalog')
                ->join('catalog_images', 'LEFT')->on('catalog.id', '=', 'catalog_images.catalog_id')->on('catalog_images.main', '=', DB::expr('1'))
                ->join('catalog_related')->on('catalog_related.with_id', '=', 'catalog.id')
                ->where('catalog_related.who_id', '=', Route::param('id'))
                ->find_all();
            $this->_content = View::tpl(
                array(
                    'obj' => $result,
                    'tpl_folder' => $this->tpl_folder,
                    'tree' => Support::getSelectOptions('Catalog/Items/Select', 'catalog_tree', $result->parent_id),
                    'brands' => $brands,
                    'models' => $models,
                    'specifications' => $specifications,
                    'specValues' => $arr,
                    'specArray' => $specArray,
                    'uploader' => View::tpl(array(), $this->tpl_folder.'/Upload'),
                    'related' => View::tpl(array('tree' => Support::getSelectOptions('Catalog/Items/Select', 'catalog_tree'), 'itemID' => Route::param('id'), 'items' => $rel), $this->tpl_folder.'/Related'),
                ), $this->tpl_folder.'/Form');
        }

        function addAction () {
            $specArray = Arr::get( $_POST, 'SPEC', array() );
            if ($_POST) {
                $post = $_POST['FORM'];
                // Set default settings for some fields
                $post['status'] = Arr::get( $_POST, 'status', 0 );
                $post['new'] = Arr::get( $_POST, 'new', 0 );
                $post['top'] = Arr::get( $_POST, 'top', 0 );
                $post['sale'] = Arr::get( $_POST, 'sale', 0 );
                $post['available'] = Arr::get( $_POST, 'available', 0 );
                $post['cost'] = (int) Arr::get( $post, 'cost', 0 );
                $post['cost_old'] = (int) Arr::get( $post, 'cost_old', 0 );
                $post['brand_alias'] = Arr::get($post, 'brand_alias') ?: NULL;
                $post['model_alias'] = Arr::get($post, 'model_alias') ?: NULL;
                $post['sort'] = (int) Arr::get($post, 'sort');
                // Check form for rude errors
                if( Model::valid($post) ) {
                    $post['alias'] = Model::getUniqueAlias(Arr::get($post, 'alias'));
                    $res = Model::insert($post);
                    if($res) {
                        Model::changeSpecificationsCommunications($specArray, $res);
                        Message::GetMessage(1, 'Вы успешно добавили данные!');
                        if(Arr::get($_POST, 'button', 'save') == 'save-close') {
                            HTTP::redirect('wezom/'.Route::controller().'/index');
                        } else if(Arr::get($_POST, 'button', 'save') == 'save-add') {
                            HTTP::redirect('wezom/'.Route::controller().'/add');
                        } else {
                            HTTP::redirect('wezom/' . Route::controller() . '/edit/' . $res);
                        }
                    } else {
                        Message::GetMessage(0, 'Не удалось добавить данные!');
                    }
                }
                $result = Arr::to_object($post);
                $parent_id = $result->parent_id;
                $models = Models::getBrandRows($result->brand_id);
            } else {
                $result = array();
                $models = array();
                $parent_id = 0;
            }
            $this->_toolbar = Widgets::get( 'Toolbar_Edit' );
            $this->_seo['h1'] = 'Добавление';
            $this->_seo['title'] = 'Добавление';
            $this->setBreadcrumbs('Добавление', 'wezom/'.Route::controller().'/add');
            $brands = Brands::getGroupRows($parent_id);
            $specifications = Specifications::getGroupRows($parent_id);
            $specValues = SpecificationsValues::getRowsBySpecifications($specifications);
            $arr = array();
            foreach ($specValues as $obj) {
                $arr[$obj->specification_id][] = $obj;
            }
            $this->_content = View::tpl(
                array(
                    'obj' => $result,
                    'tpl_folder' => $this->tpl_folder,
                    'tree' => Support::getSelectOptions('Catalog/Items/Select', 'catalog_tree', $parent_id),
                    'brands' => $brands,
                    'models' => $models,
                    'specifications' => $specifications,
                    'specValues' => $arr,
                    'specArray' => $specArray,
                    'uploader' => NULL,
                    'related' => NULL,
                ), $this->tpl_folder.'/Form');
        }

        function deleteAction() {
            $id = (int) Route::param('id');
            $page = Model::getRow($id);
            if(!$page) {
                Message::GetMessage(0, 'Данные не существуют!');
                HTTP::redirect('wezom/'.Route::controller().'/index');
            }
            $images = Images::getRows($id);
            foreach ( $images AS $im ) {
                Images::deleteImage($im->image);
            }
            Model::delete($id);
            Message::GetMessage(1, 'Данные удалены!');
            HTTP::redirect('wezom/'.Route::controller().'/index');
        }

    }