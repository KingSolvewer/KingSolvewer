<?php
$url = 'http://weappchat.com/debug.php?r=huihua/upload/upload';
$params['type'] = "image";
// $url = "https://api.weixin.qq.com/cgi-bin/media/uploadimg";

// 拼接后为 url?access_token=xxx&type=image
$url = $url.'&'.http_build_query($params);

// 相对于网站的图片的绝对路径
// $filename = "/path/sample.png";

// 图片在服务器上的真是路径，如果是前端上传的，可以另行获取，这里使用的是网站上的图片作为测试
$real_path = dirname(__DIR__) . '/image/image1.jpg';

// 图片data
$file_data = array("image"=> new \CURLFile($real_path));

// 发送请求
$res = post($url, $file_data, false);
var_dump($res);


function post($url, $data = [], $json_encode=true) {
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    if ($data != null) {
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        if(gettype($data)==="string") {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else {
            if ($json_encode) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
            } else {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
        }
    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 300); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $res = curl_exec($curl); // 执行操作
    curl_close($curl);

    $data = json_decode($res, true);
    if($data==NULL) {
        return $res;
    }
    else {
        return $data;
    }
}