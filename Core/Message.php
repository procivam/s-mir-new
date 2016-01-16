<?php
    namespace Core;
    use Core\QB\DB;

/*
* core_2011
*/

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------

class Message {

	static function GetMessage ($type, $message, $time = 3500) {
        $message = addslashes($message);
        switch($type){
            case 1:
                $type='success';
                break;
            case 2:
                $type='danger';
                break;
            case 3:
                $type='info';
                break;
            default:
                $type='warning';
        }
//        if( APPLICATION ) {
//            $_SESSION['GLOBAL_MESSAGE'] = '<script type="text/javascript">$(document).ready(function(){$(document).alert2({message: "'.$message.'",headerCOntent: false,footerContent: false,typeMessage: "'.$type.'"});';
//            if( $time ) {
//                $_SESSION['GLOBAL_MESSAGE'] .= 'setTimeout(function(){$.magnificPopup.close();}, '.$time.');';
//            }
//            $_SESSION['GLOBAL_MESSAGE'] .= '});</script>';
//        } else {
            $_SESSION['GLOBAL_MESSAGE'] = '<script type="text/javascript">$(document).ready(function(){generate("'.$message.'", "'.$type.'", '.(int) $time.');});</script>';
//        }
	}	
	
	static function GetMessage2 ($message, $time = 3500) {
//        if( APPLICATION ) {
//            $_SESSION['GLOBAL_MESSAGE'] = '<script type="text/javascript">$(document).ready(function(){$(document).alert2({message: "'.$message.'",headerCOntent: false,footerContent: false,typeMessage: "false"});';
//            if( $time ) {
//                $_SESSION['GLOBAL_MESSAGE'] .= 'setTimeout(function(){$.magnificPopup.close();}, '.$time.');';
//            }
//            $_SESSION['GLOBAL_MESSAGE'] .= '});</script>';
//        } else {
            $_SESSION['GLOBAL_MESSAGE'] = '<script type="text/javascript">$(document).ready(function(){generate("'.$message.'", "info", '.(int) $time.');});</script>';
//        }
	}
	
}