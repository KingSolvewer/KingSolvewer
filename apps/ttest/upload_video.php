<?php
/**
 * Created by PhpStorm.
 * @since: 2019-12-02 10:23:17
 * @package: upload_video.php
 */
//!empty($_SERVER) or die('服务器错误');
//$path = realpath(dirname($_SERVER['SCRIPT_FILENAME']));
//$html = $path . '/view/form/upload_video.html';
//is_file($html) or die('请求路径错误');
//
//if ('GET' === $_SERVER['REQUEST_METHOD']) {
//    include $html;
//} else {
//    var_dump($_FILES);
    is_uploaded_file($_FILES['file']['tmp_name']) or die('请上传视频');
    UPLOAD_ERR_OK === $_FILES['file']['error'] or die('上传失败');
    $dest_path = $_SERVER['DOCUMENT_ROOT'] . '/image/video/' . date('Y-m-d-H-i-s') .'.mp4';
    move_uploaded_file($_FILES['file']['tmp_name'], $dest_path) or die('上传失败');
    echo json_encode(['msg' => '上传成功']);
//}