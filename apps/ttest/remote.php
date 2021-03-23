<?php
/**
 * Create by PhpStorm
 * @since 2021-03-15 19:02:48
 * @package remote.php
 * @author wangshaowu
 */

var_dump(check_remote_file_exists('http://sucai.58100.com//data/upload/images/201612/148233867583057.jpg'));
var_dump(check_remote_file_exists('http://sucai.58100.com//data/upload/images/202008/159780754339169.jpg'));

//判断远程文件
function check_remote_file_exists($url)
{
    $curl = curl_init($url);
// 不取回数据
    curl_setopt($curl, CURLOPT_NOBODY, true);
// 发送请求
    $result = curl_exec($curl);
    $found = false;
// 如果请求没有发送失败
    if ($result !== false) {
// 再检查http响应码是否为200
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($statusCode == 200) {
            $found = true;
        }
    }
    curl_close($curl);

    return $found;
}

exit;