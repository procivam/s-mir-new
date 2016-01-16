<?php
    namespace Core;

    class ImageCache {

        protected $directory; // Cached images directory
        protected $imageSrc; // Path to original image
        protected $imageCache; // Path to cached image
        protected $imageSrcFullPath; // Full path to original image
        protected $imageCacheFullPath; // Full path to cached image
        protected $imageSrcSize; // Size of original image in bytes
        protected $imageCacheSize; // Size of cached image in bytes
        protected $imageMimeType; // Cached image mime type
        protected $imageExtension; // Cached image extension

        public $gdVersion = false; // Version of GD in host
        public $expired; // Expired time


        /**
         * @param null|string $directory *Optional - Directory to save current image cache
         */
        function __construct() {
            $this->expired = (float) Config::get('speed.cache_images');
            if($this->directory === NULL) {
                $this->directory = HOST.'/Cache/Images';
            } else {
                $this->directory = trim($this->directory, '/');
            }
            return $this;
        }


        /**
         * @param null|string $directory *Optional - Directory to save current image cache
         * @param null|string $cacheTime *Optional - Time for caching images in seconds. If null - forever, if zero - no cache at all
         * @return ImageCache
         */
        static function factory() {
            return new self();
        }


        /**
         * Cache the image
         * @param string $image - Path to image we need to cache
         * @return mixed
         */
        public function cache( $image ) {
            if(strpos(HOST, $image) === FALSE) {
                $this->imageSrc = '/'.trim($image, '/');
                $this->imageSrcFullPath = HOST.$this->imageSrc;
            } else {
                $this->imageSrcFullPath = $image;
                $this->imageSrc = '/'.trim(str_replace(HOST, '', $this->imageSrcFullPath), '/');
            }
            if(!$this->expired || !$this->checkGD()) {
                return $this->imageSrc;
            }
            $this->setImageMimeType();
            $this->setCachedFilename();
            $this->checkImageCreatedTime();
            if( is_file( $this->imageCacheFullPath ) ) {
                return $this->imageCache;
            }
            if( !$this->createCachedImage() ) {
                return $this->imageSrc;
            }
            $this->imageSrcSize = filesize( $this->imageSrcFullPath );
            $this->imageCacheSize = filesize( $this->imageCacheFullPath );
            if( $this->imageSrcSize < $this->imageCacheSize ) {
                unlink($this->imageCacheFullPath);
                copy($this->imageSrcFullPath, $this->imageCacheFullPath);
            }
            return $this->imageCache;
        }


        /**
         * Remove cached image if caching time expired
         */
        private function checkImageCreatedTime() {
            if($this->expired && is_file( $this->imageCacheFullPath )) {
                if(time() - filemtime($this->imageCacheFullPath) > $this->expired * 60 * 60) {
                    @unlink($this->imageCacheFullPath);
                }
            }
        }


        /**
         * Check host for GD supporting
         * @return float
         */
        private function checkGD() {
            $gd_info = gd_info();
            if( preg_match( '#bundled \((.+)\)$#i', $gd_info['GD Version'], $matches ) ) {
                return (boolean) $this->gdVersion = (float) $matches[1];
            }
            return (boolean) $this->gdVersion = (float) substr( $gd_info['GD Version'], 0, 3 );
        }


        /**
         * Get and save image mime type
         */
        private function setImageMimeType() {
            $im = getimagesize ( $this->imageSrcFullPath );
            $image_type = $im[2];
            if( ! $image_type ) {
                die( 'The file you supplied isn\'t a valid image.' );
            }
            $this->imageMimeType = image_type_to_mime_type( $image_type );
            $this->imageExtension = image_type_to_extension( $image_type, false );
        }


        /**
         * Generate cached image name and paths
         */
        private function setCachedFilename() {
            $this->imageCacheFullPath = $this->directory.'/'.md5( $this->imageSrc ).'.'.$this->imageExtension;
            $this->imageCache = '/'.trim(str_replace(HOST, '', $this->imageCacheFullPath), '/');
        }


        /**
         * Create cached image
         * @return bool - is image created
         */
        private function createCachedImage() {
            $image_size = getimagesize( $this->imageSrcFullPath );
            $image_width = $image_size[0];
            $image_height = $image_size[1];
            $file_mime_as_ext = end( @explode( '/', $this->imageMimeType ) );
            $image_destination_func = 'imagecreate';
            if( $this->gdVersion >= 2 ) {
                $image_destination_func = 'imagecreatetruecolor';
            }
            if( in_array( $file_mime_as_ext, array( 'gif', 'jpeg', 'png', 'jpg' ) ) ) {
                $image_src_func = 'imagecreatefrom' . $this->imageExtension;
            } else {
                die('The image you supply must have a .gif, .jpg/.jpeg, or .png extension.');
            }
            $image_src = @call_user_func( $image_src_func, $this->imageSrcFullPath );
            $image_destination = @call_user_func( $image_destination_func, $image_width, $image_height );
            if( $file_mime_as_ext === 'jpeg' ) {
                $background = imagecolorallocate( $image_destination, 255, 255, 255 );
                imagefill( $image_destination, 0, 0, $background );
            } elseif( in_array( $file_mime_as_ext, array( 'gif', 'png' ) ) ) {
                imagealphablending( $image_src, false );
                imagesavealpha( $image_src, true );
                imagealphablending( $image_destination, false );
                imagesavealpha( $image_destination, true );
            }
            imagecopy( $image_destination, $image_src, 0, 0, 0, 0, $image_width, $image_height );
            switch( $file_mime_as_ext ) {
                case 'jpeg':
                    $created = imagejpeg( $image_destination, $this->imageCacheFullPath, 85 );
                    break;
                case 'png':
                    $created = imagepng( $image_destination, $this->imageCacheFullPath, 8 );
                    break;
                case 'gif':
                    $created = imagegif( $image_destination, $this->imageCacheFullPath );
                    break;
                default:
                    return false;
            }
            imagedestroy( $image_src );
            imagedestroy( $image_destination );
            return $created;
        }

    }