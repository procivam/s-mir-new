<?

function resizeImage2($image_from,$image_to, $fitwidth=450,$fitheight=450,$quality=100) {
global $php_inc;
$os=$originalsize=getimagesize($image_from);
if($originalsize[2]!=2 && $originalsize[2]!=3 && $originalsize[2]!=6 && ($originalsize[2]<9 or $originalsize[2]>12)) {
return false;
}

$h=getimagesize($image_from);

$fh = $h[0]*$fitheight/$fitwidth;
$fw = $h[1]*$fitwidth/$fitheight;

$fwd = 0;
$fhd = 0;

if($fw>$h[0]) $fw = $h[0]; else $fwd = ($h[0] - $fw)/2;
if($fh>$h[1]) $fh = $h[1]; else $fhd = ($h[1] - $fh)/2;

// print $fh.' '.$fw;

if($os[2]==2 or ($os[2]>=9 && $os[2]<=12))$i = ImageCreateFromJPEG($image_from);
if($os[2]==3)
{
	$i=ImageCreateFromPng($image_from);
	imagesavealpha($i, true);
	$o = ImageCreateTrueColor($fitwidth, $fitheight);
	imagesavealpha($o, true);
	$transPng=imagecolorallocatealpha($o,0,0,0,127); 
	imagefill($o, 0, 0, $transPng);
}
else
	$o = ImageCreateTrueColor($fitwidth, $fitheight);

// print_r($h);
imagecopyresampled($o, $i, 0, 0, $fwd, $fhd, $fitwidth, $fitheight, $fw, $fh);
///////////////////////////////////////////////////////////
if(isset($_GET['w'])){
$watermark = imagecreatefrompng('wm.png');   
$watermark_width = imagesx($watermark);
$watermark_height = imagesy($watermark);  

//если что-то пойдёт не так
if ($i === false) {
	print('err');
    return false;
}
//$size = getimagesize($image_from);
$size[0] = imagesx($o);
$size[1] = imagesy($o); 
// помещаем водяной знак на изображение
$dest_x = ($size[0]-$size[0]*0.05)-$watermark_width;
$dest_y = $size[1]*0.05;

imagealphablending($o, true);
imagealphablending($watermark, true);
// создаём новое изображение
imagecopy($o, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
//imagejpeg($image);
// освобождаем память
//imagedestroy($image);
imagedestroy($watermark); 
}
//////////////////////////////////////////////////////////////
if($os[2]==3)
	imagepng($o);
else
	imagejpeg($o, $image_to, $quality);
	
//chmod($image_to,0777);
imagedestroy($o);
imagedestroy($i);
return 2;


}
$img='';
header('Content-type: image/jpeg');
resizeImage2("".$_GET['filename'],$img,$_GET['width'],$_GET['height']);
//imagejpeg($img);
exit;
?>
