<?php
/**
 * Created by PhpStorm.
 * @since: 2019-10-26 19:34:13
 * @package: multi_upload.php
 */
$path = realpath(__DIR__);

$hmtl = $path . '/view/form/multi_upload.html';

if ('GET' === $_SERVER['REQUEST_METHOD']) {
    include $hmtl;
} else {
    var_dump('$_FILE => ', $_FILES);
    var_dump('$_POST => ', $_POST);
    var_dump('$_REQUEST => ', $_REQUEST);
}
