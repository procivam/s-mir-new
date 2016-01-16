<?php
    namespace Core;

    use \Core\Image\Image;

    class Files {

        /**
         *  Upload image
         *  @param string $mainFolder - name of th block in Config/images.php
         *  @return string            - filename
         */
        public static function uploadImage($mainFolder, $name = 'file') {
            if( !Arr::get( $_FILES[$name], 'name' ) ) {
                return false;
            }
            $need = Config::get('images.'.$mainFolder);
            if( !$need ) {
                return false;
            }
            $ext = end( explode('.', $_FILES[$name]['name']) );
            $filename = md5($_FILES[$name]['name'].'_'.$mainFolder.time()).'.'.$ext;
            foreach( $need AS $one ) {
                $size = getimagesize($_FILES[$name]['tmp_name']);
                $path = HOST.HTML::media('/images/'.$mainFolder.'/'.Arr::get($one, 'path'));
                Files::createFolder($path, 0777);
                $file = $path.'/'.$filename;
                $image = Image::factory($_FILES[$name]['tmp_name']);
                if( $size[0] > Arr::get($one, 'width') || $size[1] > Arr::get($one, 'height') ) {
                    if( Arr::get($one, 'resize') ){
                        $image->resize(Arr::get($one, 'width'), Arr::get($one, 'height'), Image::INVERSE);
                    }
                    if( Arr::get($one, 'crop') ){
                        $image->crop(Arr::get($one, 'width'), Arr::get($one, 'height'));
                    }
                }
                if( Arr::get($one, 'watermark') ){
                    $watermark = Image::factory(HOST.HTML::media('pic/logo.png'));
                    $watermark->resize(ceil($image->width * 0.5), NULL, Image::INVERSE);
                    $image->watermark($watermark, $image->width - ceil($image->width * 0.5) - 20, $image->height - $watermark->height - 20);
                }
                $image->save($file, Arr::get($one, 'quality', 100));
            }
            return $filename;
        }

        /**
         * @param $folder - папка, в которую будет происходить сохранение файла TODO тут позже дописать в каком формате нужно передавать файл
         * @param string $name - имя файла в глобальной переменной FILES
         */
        public static function uploadFile($folder,$name="file"){
            if( !Arr::get( $_FILES[$name], 'name' ) ) {
                return false;
            }
            $old_name = Arr::get( $_FILES[$name], 'name');
            $old_name = explode(".",$old_name);
            if(!$old_name[1]){
                return false;
            }

            $file_name = md5(rand(1000000,9999999).time()).".".$old_name[1];

            Files::createFolder(HOST.$folder, 0777);

            move_uploaded_file(Arr::get( $_FILES[$name], 'tmp_name' ) , HOST.$folder."/".$file_name);

            return $file_name;
        }


        /**
         *  Delete image
         *  @param string $mainFolder - name of th block in Config/images.php
         *  @param string $filename   - name of the file we delete
         *  @return bool
         */
        public static function deleteImage($mainFolder, $filename) {
            $need = Config::get('images.'.$mainFolder);
            if( !$need ) {
                return false;
            }
            foreach( $need AS $one ) {
                $file = HOST.HTML::media('/images/'.$mainFolder.'/'.Arr::get($one, 'path').'/'.$filename);
                @unlink($file);
            }
            return true;
        }


        /**
         *  Create folder with some rights (544 as default)
         *  @param string $path   - path to the dir
         *  @param string $rights - rights for the folder
         *  @return bool
         */
        public static function createFolder($path, $rights = 0544) {
            $path = str_replace(HOST, '', $path);
            $arr = explode('/', trim($path, '/'));
            $p = array();
            foreach($arr AS $folder) {
                $p[] = $folder;
                $dir = HOST.'/'.implode('/', $p);
                echo $dir.'-'.(int) (!file_exists($dir) || !is_dir($dir)).'<br>';
                if(!file_exists($dir) || !is_dir($dir)) {
                    mkdir($dir, $rights);
                } else {
                    chmod($dir, $rights);
                }
            }
            return true;
        }

    }