<?php
    namespace Core;
    
    class View {

        public static function tpl($array, $tpl) {
            return View::show_tpl($array, $tpl.'.php');
        }


        public static function widget($array, $tpl) {
            return View::show_tpl($array, 'Widgets/'.$tpl.'.php');
        }


        static function show_tpl($tpl_data, $name_file) {
            ob_start();
            extract($tpl_data, EXTR_SKIP);
            if ( !Config::get('error') ) {
                include(HOST.APPLICATION.'/Views/'.$name_file);
            } else {
                include(HOST.'/Views/'.$name_file);
            }
            return ob_get_clean();
        }


        static function core($data, $name_file) {
            ob_start();
            extract($data, EXTR_SKIP);
            include(HOST.'/Core/'.$name_file.'.php');
            return ob_get_clean();
        }

    }