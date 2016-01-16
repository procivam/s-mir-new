<?php
    namespace Wezom\Modules\Catalog\Models;

    use Core\QB\DB;
    use Core\Message;
    use Core\Arr;

    use Wezom\Modules\Catalog\Models\CatalogTreeBrands AS CTB;
    use Wezom\Modules\Catalog\Models\CatalogTreeSpecifications AS CTS;

    class Groups extends \Core\Common {

        public static $table = 'catalog_tree';
        public static $image = 'catalog_tree';
        public static $rules = array(
            'name' => array(
                array(
                    'error' => 'Название группы товаров не может быть пустым!',
                    'key' => 'not_empty',
                ),
            ),
            'alias' => array(
                array(
                    'error' => 'Алиас не может быть пустым!',
                    'key' => 'not_empty',
                ),
                array(
                    'error' => 'Алиас должен содержать только латинские буквы в нижнем регистре, цифры, "-" или "_"!',
                    'key' => 'regex',
                    'value' => '/^[a-z0-9\-_]*$/',
                ),
            ),
        );


        public static function countKids($id) {
            $result = DB::select(array(DB::expr('COUNT(id)'), 'count'))
                ->from('catalog_tree')
                ->where('parent_id', '=', $id);
            return $result->count_all();
        }


        public static function countItems($id) {
            $result = DB::select(array(DB::expr('COUNT(id)'), 'count'))
                ->from('catalog')
                ->where('parent_id', '=', $id);
            return $result->count_all();
        }


        /**
         * Add communications brands - groups
         * @param mixed $groupBrands - integer brand id | array brand ids
         * @param integer $id - group id from catalog_tree table
         * @return bool
         */
        public static function changeBrandsCommunications($groupBrands, $id) {
            CTB::delete($id, 'catalog_tree_id');
            if( !$groupBrands ) {
                return false;
            }
            if( !is_array($groupBrands) ) {
                $groupBrands = array($groupBrands);
            }
            foreach ($groupBrands as $brand_id) {
                CTB::insert(array(
                    'catalog_tree_id' => $id,
                    'brand_id' => $brand_id,
                ));
            }
            return true;
        }


        /**
         * Add communications specifications - groups
         * @param mixed $groupSpec - integer specification id | array specification ids
         * @param
         * @return bool
         */
        public static function changeSpecificationsCommunications($groupSpec, $id) {
            CTS::delete($id, 'catalog_tree_id');
            if( !$groupSpec ) {
                return false;
            }
            if( !is_array($groupSpec) ) {
                $groupSpec = array($groupSpec);
            }
            foreach ($groupSpec as $specification_id) {
                CTS::insert(array(
                    'catalog_tree_id' => $id,
                    'specification_id' => $specification_id,
                ));
            }
            return true;
        }


        /**
         * Get brands ids that belongs to group with ID = $id
         * @param integer $id - group id from catalog_tree table
         * @return array
         */
        public static function getGroupBrandsIDS($id) {
            $groupBrands = array();
            $res = CTB::getRows($id);
            foreach ($res as $obj) {
                $groupBrands[] = $obj->brand_id;
            }
            return $groupBrands;
        }


        /**
         * Get specifications ids that belongs to group with ID = $id
         * @param integer $id - group id from catalog_tree table
         * @return array
         */
        public static function getGroupSpecificationsIDS($id) {
            $groupSpec = array();
            $res = CTS::getRows($id);
            foreach ($res as $obj) {
                $groupSpec[] = $obj->specification_id;
            }
            return $groupSpec;
        }

    }