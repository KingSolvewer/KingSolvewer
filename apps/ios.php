<?php
/**
 * Create by PhpStorm
 * @since 2020-06-18 18-09-00
 * @package ios.php
 * @author wangshaowu
 */
// uid = 1  order_id = 8
require_once __DIR__ . '/../service/IosPay.php';
$pdo = new PDO('mysql:dbname=weapp_offline;host=localhost', 'root');
$pdoStatement = $pdo->query("select `*` from `my_huihua_vip_ios` where `uid` = 1 and `order_id` = 13");
$result = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//$result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

$result = $result[0];

echo '<pre>';

var_dump($result);

echo "\r\n";
//exit;

$encodeStr = [
    'receipt-data' => $result['receipt'],
    'password' => 'e6b57c21f5f04eedaaf077a775b40081',
];
$url = 'https://sandbox.itunes.apple.com/verifyReceipt';

// 数据请求
$ios_data = IosPay::request($encodeStr, $url);

// 获取最新的订单记录
$last_order = IosPay::getLastOrder($ios_data, $result);


// 更新订单
$time = time();
$pdoStatement = $pdo->prepare("update `my_huihua_vip_ios` set `expires_time` = {$time} where `uid` = 1 and `order_id` = 13");
$result = $pdoStatement->execute();


//var_dump($res);
