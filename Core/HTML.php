<?php
    namespace Core;
    
    class HTML {


        /**
         * @var  array  preferred order of attributes
         */
        public static $attribute_order = array
        (
            'action',
            'method',
            'type',
            'id',
            'name',
            'value',
            'href',
            'src',
            'width',
            'height',
            'cols',
            'rows',
            'size',
            'maxlength',
            'rel',
            'media',
            'accept-charset',
            'accept',
            'tabindex',
            'accesskey',
            'alt',
            'title',
            'class',
            'style',
            'selected',
            'checked',
            'readonly',
            'disabled',
        );


        /**
         * @var  boolean  use strict XHTML mode?
         */
        public static $strict = TRUE;


        /**
         *  Generate good link. Usefull in multilang sites
         *  @param  string $link - link
         *  @return string       - good link
         */
        public static function link( $link = '', $http = false ) {
            $link = trim($link, '/');
            if(strpos($link, 'http://') !== false) {
                return $link;
            }
            if ($link == 'index') { $link = ''; }
            if (class_exists('I18n')) {
                if (!$link) {
                    if (\I18n::$default_lang !== \I18n::$lang) {
                        return '/'.\I18n::$lang;
                    }
                } else {
                    $link = \I18n::$lang.'/'.$link;
                }
            }
            if($http) {
                return 'http://'.$_SERVER['HTTP_HOST'].'/'.trim($link, '/');
            }
            return '/'.trim($link, '/');
        }


        /**
         *  Generate breadcrumbs from array
         *  @param  array  $bread - array with names and links
         *  @return string        - breadcrumbs HTML
         */
        public static function breadcrumbs( $bread ) {
            if (count($bread) <= 1) { return ''; }
            $last = $bread[ count($bread) - 1 ];
            unset($bread[ count($bread) - 1 ]);
            $html = '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
            foreach ($bread as $value) {
                $html .= '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="'.HTML::link($value['link']).'">'.$value['name'].'</a></span>';
            }
            $html .= '<span typeof="v:Breadcrumb" class="curr">'.$last['name'].'</span>';
            $html .= '</div>';
            return $html;
        }


        /**
         *  Generate breadcrumbs from array for wezom
         *  @param  array  $bread - array with names and links
         *  @return string        - breadcrumbs HTML
         */
        public static function backendBreadcrumbs( $bread ) {
            if (count($bread) <= 1) { return ''; }
            $last = $bread[ count($bread) - 1 ];
            unset($bread[ count($bread) - 1 ]);
            if (!count($bread)) { return ''; }
            $first = $bread[0];
            unset($bread[0]);
            $html = '<div class="crumbs"><ul class="breadcrumb">';
            $html .= '<li><i class="fa-home"></i><a href="'.HTML::link($first['link']).'">&nbsp;'.$first['name'].'</a></li>';
            foreach ($bread as $value) {
                $html .= '<li><a href="'.HTML::link($value['link']).'">&nbsp;'.$value['name'].'</a></li>';
            }
            $html .= '<li class="current" style="color: #949494 !important;">&nbsp;'.$last['name'].'</li>';
            $html .= '</ul></div>';
            return $html;
        }


        /**
         * Create path to media in frontend
         * @param  string $filename - path to file
         * @return string
         */
        public static function media( $file, $http = false ) {
            if($http) {
                return 'http://'.$_SERVER['HTTP_HOST'].'/Media/'.trim($file, '/');
            }
            return '/Media/' . trim($file, '/');
        }


        /**
         * Images cache
         * @param  string $filename - path to file
         * @return string
         */
        public static function image( $file, $cache = false ) {
            if($cache) {
                return ImageCache::factory()->cache(static::media($file));
            }
            return static::media($file);
        }


        /**
         * Create path to media in wezom
         * @param  string $filename - path to file
         * @return string
         */
        public static function bmedia( $file ) {
            return APPLICATION.'/Media/' . trim($file, '/');
        }


        /**
         * Put die after <pre>
         * @param mixed $object - what we want to <pre>
         */
        public static function preDie( $object ) {
            echo '<pre>';
            print_r($object);
            echo '</pre>';
            die;
        }


        /**
         * Emulation of php function getallheaders()
         */
        public static function emu_getallheaders() {
            foreach($_SERVER as $h=>$v)
            if(ereg('HTTP_(.+)',$h,$hp))
                $headers[$hp[1]]=$v;
            return $headers;
        }


        /**
         * Convert special characters to HTML entities. All untrusted content
         * should be passed through this method to prevent XSS injections.
         *
         *     echo HTML::chars($username);
         *
         * @param   string  $value          string to convert
         * @param   boolean $double_encode  encode existing entities
         * @return  string
         */
        public static function chars($value, $double_encode = TRUE) {
            return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8', $double_encode);
        }


        /**
         * Creates a style sheet link element.
         *
         *     echo HTML::style('media/css/screen.css');
         *
         * @param   string  $file       file name
         * @param   array   $attributes default attributes
         * @param   mixed   $protocol   protocol to pass to URL::base()
         * @param   boolean $index      include the index page
         * @return  string
         * @uses    URL::base
         * @uses    HTML::attributes
         */
        public static function style($file, array $attributes = NULL, $protocol = 'http')
        {
            if (strpos($file, '://') === FALSE)
            {
                // Add the base URL
                $file = $protocol.'://'.$_SERVER['HTTP_HOST'].'/'.trim(HTML::link($file), '/');
            }

            // Set the stylesheet link
            $attributes['href'] = $file;

            // Set the stylesheet rel
            $attributes['rel'] = empty($attributes['rel']) ? 'stylesheet' : $attributes['rel'];

            // Set the stylesheet type
            $attributes['type'] = 'text/css';

            return '<link'.HTML::attributes($attributes).' />';
        }


        /**
         * Creates a script link.
         *
         *     echo HTML::script('media/js/jquery.min.js');
         *
         * @param   string  $file       file name
         * @param   array   $attributes default attributes
         * @param   mixed   $protocol   protocol to pass to URL::base()
         * @param   boolean $index      include the index page
         * @return  string
         * @uses    URL::base
         * @uses    HTML::attributes
         */
        public static function script($file, array $attributes = NULL, $protocol = 'http')
        {
            if (strpos($file, '://') === FALSE)
            {
                // Add the base URL
                $file = $protocol.'://'.$_SERVER['HTTP_HOST'].'/'.trim(HTML::link($file), '/');
            }

            // Set the script link
            $attributes['src'] = $file;

            // Set the script type
            $attributes['type'] = 'text/javascript';

            return '<script'.HTML::attributes($attributes).'></script>';
        }


        /**
         * Compiles an array of HTML attributes into an attribute string.
         * Attributes will be sorted using HTML::$attribute_order for consistency.
         *
         *     echo '<div'.HTML::attributes($attrs).'>'.$content.'</div>';
         *
         * @param   array   $attributes attribute list
         * @return  string
         */
        public static function attributes(array $attributes = NULL)
        {
            if (empty($attributes))
                return '';

            $sorted = array();
            foreach (HTML::$attribute_order as $key)
            {
                if (isset($attributes[$key]))
                {
                    // Add the attribute to the sorted list
                    $sorted[$key] = $attributes[$key];
                }
            }

            // Combine the sorted attributes
            $attributes = $sorted + $attributes;

            $compiled = '';
            foreach ($attributes as $key => $value)
            {
                if ($value === NULL)
                {
                    // Skip attributes that have NULL values
                    continue;
                }

                if (is_int($key))
                {
                    // Assume non-associative keys are mirrored attributes
                    $key = $value;

                    if ( ! HTML::$strict)
                    {
                        // Just use a key
                        $value = FALSE;
                    }
                }

                // Add the attribute key
                $compiled .= ' '.$key;

                if ($value OR HTML::$strict)
                {
                    // Add the attribute value
                    $compiled .= '="'.HTML::chars($value).'"';
                }
            }

            return $compiled;
        }


        /**
         * Compress html page
         * @param $html
         * @param boolean $insolently
         * @return mixed
         */
        public static function compress($html, $insolently = false) {
            if((int) Config::get('speed.compress') || $insolently) {
                $html = preg_replace('/[\r\n\t]+/', ' ', $html);
                $html = preg_replace('/[\s]+/', ' ', $html);
                $html = preg_replace("/\> \</", "><", $html);
                $html = preg_replace("/\<!--[^\[*?\]].*?--\>/", "", $html);
            }
            return $html;
        }

    }