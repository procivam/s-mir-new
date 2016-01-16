<?php
    // Uncomment next row if multilang needs
    // require_once 'Plugins/I18n/I18n.php';

    // Autoload
    function autoload($className) {
        if(strpos($className, 'PHPExcel') !== FALSE || strpos($className, 'Minify') !== FALSE) {
            if( $className == 'PHPExcel' ) {
                $className = 'PHPExcel_PHPExcel';
            }
            $fileName = HOST.'/Plugins/'.str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';
            if(file_exists($fileName)) {
                require_once $fileName;
                return false;
            }
        }
        // If I18n
        $arr = explode('\\', $className);
        if (end($arr) == 'I18n') { return false; }
        // else
        $className = ltrim($className, '\\');
        $fileName  = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';
        require $fileName;
    }
    spl_autoload_register('autoload');