<?php
    namespace Modules\Search\Controllers;

    use Core\Route;
    use Core\View;
    use Core\Arr;
    use Core\Config;
    use Core\Pager\Pager;

    use Modules\Content\Models\Control;
    use Modules\Catalog\Models\Items;
    
    class Search extends \Modules\Base {

        public $current;
        public $page = 1;
        public $sort;
        public $type;
        public $limit;
        public $offset;
        public $model;

        public function before() {
            parent::before();
            $this->current = Control::getRow(Route::controller(), 'alias', 1);
            if( !$this->current ) {
                return Config::error();
            }
            $this->setBreadcrumbs( $this->current->name, $this->current->alias );
            $this->_template = 'Catalog';
            $this->page = !(int) Route::param('page') ? 1 : (int) Route::param('page');
            $this->limit = (int) Arr::get($_GET, 'per_page') ? (int) Arr::get($_GET, 'per_page') : Config::get('basic.limit');
            $this->offset = ($this->page - 1) * $this->limit;
            $this->sort = in_array(Arr::get($_GET, 'sort'), array('name', 'created_at', 'cost')) ? Arr::get($_GET, 'sort') : 'sort';
            $this->type = in_array(strtolower(Arr::get($_GET, 'type')), array('asc', 'desc')) ? strtoupper(Arr::get($_GET, 'type')) : 'ASC';
        }

        // Search list
        public function indexAction() {
            if( Config::get('error') ) {
                return false;
            }
            // Seo
            $this->_seo['h1'] = $this->current->h1;
            $this->_seo['title'] = $this->current->title;
            $this->_seo['keywords'] = $this->current->keywords;
            $this->_seo['description'] = $this->current->description;
            // Check query
            $query = $this->escapeQuery();
            if( !$query ) {
                return $this->_content = $this->noResults();
            }
            // Get items list
            $result = Items::searchRows($query, $this->sort, $this->type, $this->limit, $this->offset);
            // Check for empty list
            if( !count($result) ) {
                return $this->_content = $this->noResults();
            }
            // Count of parent groups
            $count = Items::countSearchRows($query);
            // Generate pagination
            $pager = Pager::factory($this->page, $count, $this->limit)->create();
            // Render page
            $this->_content = View::tpl( array('result' => $result, 'pager' => $pager), 'Catalog/ItemsList' );
        }


        // This we will show when no results
        public function noResults() {
            return '<p>По Вашему запросу ничего не найдено!</p>';
        }


        public function escapeQuery() {
            $query = Arr::get($_GET, 'query');
            $query = strip_tags($query);
            $query = addslashes($query);
            return trim($query);
        }

    }