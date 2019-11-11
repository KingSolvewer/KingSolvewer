<?php
!empty($_SERVER) or die('服务器错误');
$path = realpath(dirname($_SERVER['SCRIPT_FILENAME']));
$html = $path . '/view/form/upload.html';
is_file($html) or die('请求路径错误');

if ('GET' === $_SERVER['REQUEST_METHOD']) {
    include $html;
} else {
    var_dump($_FILES, $_REQUEST, $_POST);
    is_uploaded_file($_FILES['image']['tmp_name']) or die('请上传图片');
    UPLOAD_ERR_OK === $_FILES['image']['error'] or die('');
    $dest_path = $_SERVER['DOCUMENT_ROOT'] . '/image/' . date('Y-m-d') .'.jpeg';
    move_uploaded_file($_FILES['image']['tmp_name'], $dest_path) or die('上传失败');
}
