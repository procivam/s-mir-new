<?php
    namespace Wezom\Modules\Ajax\Controllers;

    use Core\Common;
    use Wezom\Modules\Catalog\Models\CatalogImages;
    use Core\Arr;
    use Core\HTML;
    use Core\QB\DB;
    use Core\View;
    use Core\Config;
    use Core\Files;

    class Catalog extends \Wezom\Modules\Ajax {

        public function setPositionAction() {
            $id = Arr::get($this->post, 'id');
            $sort = Arr::get($this->post, 'sort');
            Common::factory('catalog')->update(array('sort' => $sort), $id);
            $this->success();
        }

        /**
         * Get models list by brand id
         * $this->post['brand_id'] => brand ID
         */
        public function getModelsByBrandIDAction() {
            $brand_alias = Arr::get($this->post, 'brand_alias');
            $models = DB::select('id', 'name', 'alias')->from('models')->where('brand_alias', '=', $brand_alias)->order_by('name')->find_all();
            $options = array();
            foreach ($models as $model) {
                $options[] = array('name' => $model->name, 'id' => $model->id, 'alias' => $model->alias);
            }
            $this->success(array(
                'options' => $options,
            ));
        }


        /**
         * Get specifications list by group ID
         * $this->post['catalog_tree_id'] => group ID
         */
        public function getSpecificationsByCatalogTreeIDAction() {
            $catalog_tree_id = (int) Arr::get($this->post, 'catalog_tree_id');
            $result = DB::select('brands.*')->from('brands')
                ->join('catalog_tree_brands', 'LEFT')->on('catalog_tree_brands.brand_id', '=', 'brands.id')
                ->where('catalog_tree_brands.catalog_tree_id', '=', $catalog_tree_id)
                ->order_by('name')
                ->find_all();
            $brands = array();
            foreach ($result as $obj) {
                $brands[] = array('name' => $obj->name, 'id' => $obj->id, 'alias' => $obj->alias);
            }
            $_specifications = DB::select('specifications.name', 'specifications.id', 'specifications.alias', 'specifications.type_id')
                ->from('specifications')
                ->join('catalog_tree_specifications', 'LEFT')->on('catalog_tree_specifications.specification_id', '=', 'specifications.id')
                ->where('catalog_tree_specifications.catalog_tree_id', '=', $catalog_tree_id)
                ->order_by('specifications.name')
                ->find_all();
            $arr = array(0);
            $specifications = array();
            foreach($_specifications AS $s) {
                $arr[] = $s->id;
                $specifications[] = (array) $s;
            }
            $specValues = DB::select('specification_id', 'name', 'alias')
                ->from('specifications_values')
                ->where('specification_id', 'IN', $arr)
                ->order_by('name')
                ->find_all();
            $arr = array();
            foreach ($specValues as $obj) {
                $arr[$obj->specification_id][] = $obj;
            }

            $this->success(array(
                'brands' => $brands,
                'specifications' => $specifications,
                'specValues' => $arr,
            ));
        }


        /**
         * Add specification value
         * $this->post['name'] => specification value name
         * $this->post['alias'] => specification value alias
         * $this->post['specification_id'] => specification id
         */
        public function addSimpleSpecificationValueAction(){
            // Check data
            $name = Arr::get($this->post, 'name');
            $alias = Arr::get($this->post, 'alias');
            $specification_id = Arr::get($this->post, 'specification_id');
            if( !$name OR !$alias OR !$specification_id ) {
                $this->error(array(
                    'error' => 'Вы ввели не все данные',
                ));
            }
            // Get count of rows with the same alias and specification_id
            $count = DB::select(array(DB::expr('COUNT(specifications_values.id)'), 'count'))->from('specifications_values')
                ->where('specification_id', '=', $specification_id)
                ->where('alias', '=', $alias)
                ->count_all();
            // Error if such alias exists
            if( $count ) {
                $this->error(array(
                    'error' => 'Измените алиас. Такой уже есть',
                ));
            }
            // Trying to save data
            $result = Common::factory('specifications_values')->insert(array(
                'name' => $name,
                'alias' => $alias,
                'specification_id' => $specification_id,
                'status' => 1,
            ));
            // Error if failed saving
            if( !$result ) {
                $this->error(array(
                    'error' => 'Ошибка на сервере. Повторите попытку позднее',
                ));
            }
            // Get full list of values for current specification
            $result = DB::select()->from('specifications_values')->where('specification_id', '=', $specification_id)->order_by('name')->find_all();
            $arr = array();
            foreach( $result AS $obj ) {
                $arr[] = $obj;
            }
            // Answer
            $this->success(array(
                'result' => $arr,
            ));
        }


        /**
         * Edit specification value
         * $this->post['id'] => specification value ID
         * $this->post['status'] => specification value status
         * $this->post['name'] => specification value name
         * $this->post['alias'] => specification value alias
         * $this->post['specification_id'] => specification id
         */
        public function editSimpleSpecificationValueAction(){
            // Check data
            $name = Arr::get($this->post, 'name');
            $alias = Arr::get($this->post, 'alias');
            $status = Arr::get($this->post, 'status');
            $id = Arr::get($this->post, 'id');
            $specification_id = Arr::get($this->post, 'specification_id');
            if( !$name OR !$alias OR !$id OR !$specification_id ) {
                $this->error(array(
                    'error' => 'Вы ввели не все данные',
                ));
            }
            // Get count of rows with the same alias and specification_id
            $count = DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('specifications_values')
                ->where('specification_id', '=', $specification_id)
                ->where('alias', '=', $alias)
                ->where('id', '!=', $id)
                ->count_all();
            // Error if such alias exists
            if( $count ) {
                $this->error(array(
                    'error' => 'Измените алиас. Такой уже есть',
                ));
            }
            // Trying to save data
            $result = Common::factory('specifications_values')->update(array(
                'name' => $name,
                'alias' => $alias,
                'status' => $status,
            ), $id);
            // Error if failed saving
            if( !$result ) {
                $this->error(array(
                    'error' => 'Ошибка на сервере. Повторите попытку позднее',
                ));
            }
            // Get full list of values for current specification
            $result = DB::select()->from('specifications_values')->where('specification_id', '=', $specification_id)->order_by('name')->find_all();
            $arr = array();
            foreach( $result AS $obj ) {
                $arr[] = $obj;
            }
            // Answer
            $this->success(array(
                'result' => $arr,
            ));
        }


        /**
         * Delete specification value
         * $this->post['id'] => specification value ID
         */
        public function deleteSpecificationValueAction(){
            // Check data
            $id = Arr::get($this->post, 'id');
            if( !$id ) {
                $this->error(array(
                    'error' => 'Вы ввели не все данные',
                ));
            }
            // Trying to delete value
            $result = Common::factory('specifications_values')->delete($id);
            // Error if failed saving
            if( !$result ) {
                $this->error(array(
                    'error' => 'Ошибка на сервере. Повторите попытку позднее',
                ));
            }
            // Answer
            $this->success();
        }


        /**
         * Add specification value
         * $this->post['name'] => specification value name
         * $this->post['color'] => specification value color hex code
         * $this->post['alias'] => specification value alias
         * $this->post['specification_id'] => specification ID
         */
        public function addColorSpecificationValueAction(){
            // Check data
            $name = Arr::get($this->post, 'name');
            $color = Arr::get($this->post, 'color');
            $alias = Arr::get($this->post, 'alias');
            $specification_id = Arr::get($this->post, 'specification_id');
            if( !$name OR !$alias OR !$specification_id OR !preg_match('/^#[0-9abcdef]{6}$/', $color, $matches) ) {
                $this->error(array(
                    'error' => 'Вы ввели не все данные',
                ));
            }
            // Get count of rows with the same alias and specification_id
            $count = DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('specifications_values')->where('specification_id', '=', $specification_id)->where('alias', '=', $alias)->count_all();
            // Error if such alias exists
            if( $count ) {
                $this->error(array(
                    'error' => 'Измените алиас. Такой уже есть',
                ));
            }
            // Trying to save data
            $result = Common::factory('specifications_values')->insert(array(
                'name' => $name,
                'alias' => $alias,
                'specification_id' => $specification_id,
                'status' => 1,
                'color' => $color,
            ));
            // Error if failed saving
            if( !$result ) {
                $this->error(array(
                    'error' => 'Ошибка на сервере. Повторите попытку позднее',
                ));
            }
            // Get full list of values for current specification
            $result = DB::select()->from('specifications_values')->where('specification_id', '=', $specification_id)->order_by('name')->find_all();
            $arr = array();
            foreach( $result AS $obj ) {
                $arr[] = $obj;
            }
            // Answer
            $this->success(array(
                'result' => $arr,
            ));
        }


        /**
         * Edit specification value
         * $this->post['name'] => specification value name
         * $this->post['color'] => specification value color hex code
         * $this->post['alias'] => specification value alias
         * $this->post['specification_id'] => specification ID
         * $this->post['id'] => specification value ID
         */
        public function editColorSpecificationValueAction(){
            // Check data
            $name = Arr::get($this->post, 'name');
            $color = Arr::get($this->post, 'color');
            $alias = Arr::get($this->post, 'alias');
            $status = Arr::get($this->post, 'status');
            $id = Arr::get($this->post, 'id');
            $specification_id = Arr::get($this->post, 'specification_id');
            if( !$name OR !$alias OR !$id OR !$specification_id OR !preg_match('/^#[0-9abcdef]{6}$/', $color, $matches) ) {
                $this->error(array(
                    'error' => 'Вы ввели не все данные',
                ));
            }
            // Get count of rows with the same alias and specification_id
            $count = DB::select(array(DB::expr('COUNT(id)'), 'count'))->from('specifications_values')
                ->where('specification_id', '=', $specification_id)
                ->where('alias', '=', $alias)
                ->where('id', '!=', $id)
                ->count_all();
            // Error if such alias exists
            if( $count ) {
                $this->error(array(
                    'error' => 'Измените алиас. Такой уже есть',
                ));
            }
            // Trying to save data
            $result = DB::update('specifications_values')->set(array(
                'name' => $name,
                'alias' => $alias,
                'status' => $status,
                'color' => $color,
            ))->where('id', '=', $id)->execute();
            // Error if failed saving
            if( !$result ) {
                $this->error(array(
                    'error' => 'Ошибка на сервере. Повторите попытку позднее',
                ));
            }
            // Get full list of values for current specification
            $result = DB::select()->from('specifications_values')
                ->where('specification_id', '=', $specification_id)
                ->order_by('name')
                ->find_all();
            $arr = array();
            foreach( $result AS $obj ) {
                $arr[] = $obj;
            }
            // Answer
            $this->success(array(
                'result' => $arr,
            ));
        }


        /**
         * Switch flag between 0 & 1 (field "main" in this case)
         * $this->post['id'] => photo ID to work with
         */
        public function set_default_imageAction() {
            $id = (int) Arr::get($this->post, 'id');
            if (!$id) die('Error!');
            $obj = CatalogImages::getRow($id);
            if( $obj->main != 1 ) {
                DB::update( 'catalog_images' )->set( array( 'main' => 0 ) )->where( 'catalog_id', '=', $obj->catalog_id )->execute();
                CatalogImages::update(array('main' => 1), $id);
                Common::factory('catalog')->update(array('image' => $obj->image), $obj->catalog_id);
            }
            die(json_encode(array(
                'status' => true,
            )));
        }


        /**
         * Delete uploaded item photo
         * $this->post['id'] => ID from gallery images table in DB
         */
        public function delete_catalog_photoAction() {
            $id = (int) Arr::get($this->post, 'id');
            if (!$id) die('Error!');

            $image = DB::select('image')->from( 'catalog_images' )->where( 'id', '=', $id )->find()->image;
            DB::delete( 'catalog_images' )->where( 'id', '=', $id )->execute();

            Files::deleteImage('catalog', $image);

            die(json_encode(array(
                'status' => true,
            )));
        }


        /**
         * Sort photos in current album
         * $this->post['order'] => array with photos IDs in right order
         */
        public function sort_imagesAction() {
            $order = Arr::get($this->post, 'order');
            if (!is_array($order)) die('Error!');
            $updated = 0;
            foreach($order as $key => $value) {
                $value = (int) $value;
                $order = $key + 1;
                DB::update( 'catalog_images' )->set( array( 'sort' => $order ) )->where( 'id', '=', $value )->execute();
                $updated++;
            }
            die(json_encode(array(
                'updated' => $updated,
            )));
        }


        /**
         * Get item photos list
         */
        public function get_uploaded_imagesAction() {
            $arr = explode('/', Arr::get($_SERVER, 'HTTP_REFERER'));
            $id = (int) end($arr);
            if( !$id ) die('Error!');
            $images = DB::select()->from( 'catalog_images' )->where( 'catalog_id', '=', $id )->order_by('sort')->find_all();
            if ($images) {
                $show_images = View::tpl(array( 'images' => $images ), 'Catalog/Items/UploadedImages');
            } else {
                $show_images = 0;
            }
            die(json_encode(array(
                'images' => $show_images,
            )));
        }


        /**
         * Upload photo
         * $this->files['file'] => incoming image
         */
        public function upload_imagesAction() {
            if (empty($this->files['file'])) die('No File!');
            $arr = explode('/', Arr::get($_SERVER, 'HTTP_REFERER'));
            $id_good = (int) end($arr);

            $headers = HTML::emu_getallheaders();
            if(array_key_exists('Upload-Filename', $headers)) {
                //                $data = file_get_contents('php://input');
                $name = $headers['Upload-Filename'];
            } else {
                $name = $this->files['file']['name'];
            }

            $name = explode('.', $name);
            $ext = strtolower(end($name));

            if (!in_array($ext, Config::get('images.types'))) die('Not image!');

            $filename = Files::uploadImage('catalog');

            $has_main = DB::select(array(DB::expr('COUNT(id)'), 'count'))->from( 'catalog_images' )->where( 'catalog_id', '=', $id_good )->where( 'main', '=', 1 )->count_all();
            $data = array(
                'catalog_id' => $id_good,
                'image' => $filename,
            );
            if( !$has_main ) {
                $data['main'] = 1;
            }
            Common::factory('catalog_images')->insert($data);
            if($data['main']) {
                Common::factory('catalog')->update(array('image' => $filename), $id_good);
            }

            die(json_encode(array(
                'confirm' => true,
            )));
        }


        /**
         * Get one item information
         * $this->post['id'] => item ID
         */
        public function getItemAction() {
            $id = Arr::get($this->post, 'id', 0);
            $item = DB::select('catalog.id', 'catalog.name', 'catalog.cost', 'catalog.image', array('brands.id', 'brand_id'), array('brands.name', 'brand_name'))
                ->from('catalog')
                ->join('brands', 'LEFT')->on('brands.alias', '=', 'catalog.brand_alias')
                ->where('catalog.id', '=', $id)
                ->find();
            die(json_encode(array(
                'success' => true,
                'item' => array(
                    'id' => $item->id,
                    'link' => HTML::link('wezom/items/edit/'.$item->id),
                    'brand_link' => HTML::link('wezom/brands/edit/'.$item->brand_id),
                    'name' => $item->name,
                    'cost' => $item->cost,
                    'brand_id' => $item->brand_id,
                    'brand_name' => $item->brand_name,
                    'image' => is_file(HOST.HTML::media('images/catalog/medium/'.$item->image)) ? HTML::media('images/catalog/medium/'.$item->image) : NULL,
                    'image_big' => is_file(HOST.HTML::media('images/catalog/medium/'.$item->image)) ? HTML::media('images/catalog/big/'.$item->image) : NULL,
                ),
            )));
        }


        /**
         * Get items list by some parameters
         * $this->post['id'] => current item ID
         * $this->post['parent_id'] => search item group ID
         * $this->post['search'] => search item artikul or name (or part of it)
         */
        public function searchItemsAction() {
            $current_id = (int) Arr::get($this->post, 'id');
            $parent_id = (int) Arr::get($this->post, 'parent_id');
            $search = Arr::get($this->post, 'search');
            $limit = (int) Arr::get($this->post, 'limit', 1);
            $page = (int) Arr::get($this->post, 'page', 1);
            $offset = ($page - 1) * $limit;
            if( !$parent_id && !trim($search) ) {
                $this->error(array(
                    'items' => array(),
                ));
            }

            $sop = DB::select(array('with_id', 'id'))->from('catalog_related')->where('who_id', '=', $current_id)->find_all();
            $related = array();
            foreach ($sop as $key => $value) {
                $related[] = $value->id;
            }
            $related[] = $current_id;

            $result = DB::select('catalog.*')->from('catalog');
            if( $parent_id > 0 ) {
                $result->where('catalog.parent_id', '=', $parent_id);
            }
            if( trim($search) ) {
                $result
                    ->and_where_open()
                        ->or_where('catalog.name', 'LIKE', '%'.$search.'%')
                        ->or_where('catalog.artikul', 'LIKE', '%'.$search.'%')
                    ->and_where_close();
            }

            $result = $result
                ->where('catalog.id', 'NOT IN', $related)
                ->group_by('catalog.id')
                ->limit($limit)
                ->offset($offset)
                ->find_all();

            $count = DB::select(array(DB::expr('COUNT(DISTINCT catalog.id)'), 'count'))->from('catalog');
            if( $parent_id > 0 ) {
                $count->where('catalog.parent_id', '=', $parent_id);
            }
            if( trim($search) ) {
                $count
                    ->and_where_open()
                        ->or_where('catalog.name', 'LIKE', '%'.$search.'%')
                        ->or_where('catalog.artikul', 'LIKE', '%'.$search.'%')
                    ->and_where_close();
            }
            $count = $count
                ->where('catalog.id', 'NOT IN', $related)
                ->count_all();

            $items = array();
            foreach( $result AS $obj ) {
                $items[] = array(
                    'id' => $obj->id,
                    'cost' => $obj->cost,
                    'name' => $obj->name,
                    'image' => is_file(HOST.HTML::media('images/catalog/medium/'.$obj->image)) ? HTML::media('images/catalog/medium/'.$obj->image) : NULL,
                );
            }
            $this->success(array(
                'count' => $count,
                'items' => $items,
            ));
        }


        /**
         * Adding item to related for current item
         * $this->post['who_id'] => current item ID
         * $this->post['with_id'] => adding item ID
         */
        public function addItemToRelatedAction() {
            $who_id = (int) Arr::get($this->post, 'who_id');
            $with_id = (int) Arr::get($this->post, 'with_id');
            $row = DB::select('id')
                ->from('catalog_related')
                ->where('who_id', '=', $who_id)
                ->where('with_id', '=', $with_id)
                ->find();
            if($row) {
                die(json_encode(array(
                    'success' => false,
                    'msg' => 'Выбранный товар уже сопутствующий для текущего!',
                )));
            }
            Common::factory('catalog_related')->insert(array(
                'who_id' => $who_id,
                'with_id' => $with_id,
            ));
            die(json_encode(array(
                'success' => true,
            )));
        }


        /**
         * Remove item from current item related
         * $this->post['who_id'] => current item ID
         * $this->post['with_id'] => adding item ID
         */
        public function removeItemFromRelatedAction() {
            $who_id = Arr::get($this->post, 'who_id');
            $with_id = Arr::get($this->post, 'with_id');
            DB::delete('catalog_related')->where('who_id', '=', $who_id)->where('with_id', '=', $with_id)->execute();
            die(json_encode(array(
                'success' => true,
            )));
        }

    }