<?php
/**
 * Create by PhpStorm
 * @since 2020-03-27 14-26-36
 * @package wateropacity.php
 * W-wsw
 */
// Load the stamp and the photo to apply the watermark to
$im = imagecreatefromjpeg('../image/2019-09-29.jpeg');

// First we create our stamp image manually from GD
$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
//imagestring($stamp, 15, 20, 20, 'libGD', 0x0000FF);
//imagestring($stamp, 13, 20, 40, '(c) 2007-9', 0x0000FF);

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

// Save the image to file and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

 