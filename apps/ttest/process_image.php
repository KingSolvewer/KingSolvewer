<?php
/**
 * Create by PhpStorm
 * @since 2020-03-27 13-15-33
 * @package process_image.php
 * W-wsw
 */

header("Content-type: image/png");
$string = $_GET['text'];

$path = "../image/6.png";
$im     = imagecreatefrompng($path);
$orange = imagecolorallocate($im, 0, 0, 0);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 16, $px, 20, $string, $orange);
imagepng($im);
imagedestroy($im);
