<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

session_start();
include "config.php";

// generate 5 digit random number
//$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
$alphanum = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghijkmnopqrstuvwxyz";

// generate the verication code
$rand = substr(str_shuffle($alphanum), 0, 6);

//$rand = rand(10000, 99999);

// create the hash for the random number and put it in the session
$_SESSION['imagehash'] = sha1($rand);

// create the image
$image = imagecreate(206, 90);

// set the background image
$bgColor = imagecolorallocate ($image, 193, 206, 142);

// set the text color
$textColor = imagecolorallocate ($image, 64, 88, 0);
$textShadowColor1 = imagecolorallocate ($image, 148, 138, 64);
$textShadowColor2 = imagecolorallocate ($image, 148, 138, 64);

$font = '.'.$fontsdir.'FreeSans.ttf';
imagettftext($image, 23, rand(10000, 99999) % 6, 37, 47, $textShadowColor1, $font,
             substr(str_shuffle($alphanum), 0, 6));
imagettftext($image, 23, rand(10000, 99999) % -6, 53, 63, $textShadowColor2, $font, 
             substr(str_shuffle($alphanum), 0, 6));
imagettftext($image, 23, 
             (rand(10000, 99999) & 1) ? -(rand(10000, 99999) % 13) : (rand(10000, 99999) % 13),
             45, 55, $textColor, $font, substr($rand, 0, 3));
imagettftext($image, 23, 
             (rand(10000, 99999) & 1) ? (rand(10000, 99999) % 13) : (rand(10000, 99999) % 13),
             115, 55, $textColor, $font, substr($rand, 3, 6));


// write the random number
//imagestring ($image, 5, 28, 13, $rand, $textColor);
// Add some shadow to the text
//imagestring ($image, 5, 24, 8, $rand, $textShadowColor);

// send several headers to make sure the image is not cached

// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// always modified
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");

// send the content type header so the image is displayed properly
header('Content-type: image/jpeg');

// send the image to the browser
imagejpeg($image);

// destroy the image to free up the memory
imagedestroy($image);
?>
