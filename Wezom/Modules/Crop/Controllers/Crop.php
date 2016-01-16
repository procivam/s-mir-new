<?php
    namespace Wezom\Modules\Crop\Controllers;

    use Core\Config;
    use Core\Encrypt;
    use Core\HTML;
    use Core\Image\Image;
    use Core\Route;
    use Core\Widgets;
    use Core\Message;
    use Core\Arr;
    use Core\HTTP;
    use Core\View;
    use Core\Pager\Pager;

    use Wezom\Modules\Content\Models\Articles AS Model;

    class Crop extends \Wezom\Modules\Base {

        public $tpl_folder = 'Crop';

        function before() {
            parent::before();
            $this->_seo['h1'] = 'Обрезать фото';
            $this->_seo['title'] = 'Обрезать фото';
        }

        function indexAction () {
            $str = Encrypt::instance()->decode(Route::param('hash'));
            $arr = json_decode($str, true);
            if(count($arr) != 4) {
                return Config::error();
            }
            $_images = Config::get('images.'.$arr[0]);
            $images = array();
            $current = array();
            foreach($_images AS $key => $value) {
                if($value['crop'] && $value['path'] != 'original' && $value['width'] && $value['height']) {
                    $images[] = $value;
                    if($value['path'] == $arr[3]) {
                        $current = $value;
                    }
                }
            }
            if(!count($images) || !$current) {
                return Config::error();
            }

            $this->setBreadcrumbs('Вернуться', $arr[2]);
            $this->setBreadcrumbs('Обрезать фото');

            $filename = HTML::media('images/'.$arr[0].'/original/'.$arr[1]);
            if(!is_file(HOST.$filename)) {
                return Config::error();
            }

            $crop = HTML::media('images/'.$arr[0].'/'.$arr[3].'/'.$arr[1]);
            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                $json = Arr::get($_POST, 'json', '[]');
                $data = json_decode($json, true);
                $image = Image::factory(HOST.$filename);
                $image->crop($data['cropBox']['width'], $data['cropBox']['height'], $data['cropBox']['x'], $data['cropBox']['y']);
                $image->resize($current['width'], $current['height']);
                $image->save(HOST.$crop, Arr::get($data, 'quality', 100));
                die(json_encode(array(
                    'success' => true,
                )));
            }

            $this->_content = View::tpl(
                array(
                    'arr' => $arr,
                    'images' => $images,
                    'json' => json_encode($current),
                    'tpl_folder' => $this->tpl_folder,
                    'tablename' => Model::$table,
                    'pageName' => $this->_seo['h1'],
                    'image' => $filename,
                    'current' => $current,
                ), $this->tpl_folder.'/Index');
        }

    }