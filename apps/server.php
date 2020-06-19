<?php
/**
 * Create by PhpStorm
 * @since 2020-05-18 21-56-00
 * @package server.php
 * @author wangshaowu
 */


$http = new Swoole\Http\Server("0.0.0.0", 9501);
echo '<pre>';

print_r($http);

echo "\r\n";
exit;
$http->on('request', function ($request, $response) {
    var_dump($request->get, $request->post);
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});

$http->start();