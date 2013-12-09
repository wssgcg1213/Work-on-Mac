<?php
	$text1 = $_GET['text1'];
	$text2 = $_GET['text2'];
	$text3 = $_GET['text3'];
$file = "http://test.treeforests.com/forfun/ori.jpg";
$image = imagecreatefromjpeg($file);

$red = imagecolorallocate($image,0xFF,0x00,0x00);
$font = "f.ttf";
imagettftext($image, 35, 0, 100, 290, $red, $font, $text1);
imagettftext($image, 35, 0, 100, 575, $red, $font, $text2);
imagettftext($image, 35, 0, 100, 870, $red, $font, $text3);
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);