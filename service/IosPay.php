<?php
/**
 * Create by PhpStorm
 * @since 2020-05-21 17-42-29
 * @package IosPay.php
 * @author wangshaowu
 */


class IosPay
{
    // 正式环境
    public static $product = [
        'url' => 'https://buy.itunes.apple.com/verifyReceipt',
        'ahead_time' => 180,
        'audit_status' => true,
    ];

    // 沙盒测试
    public static $sandbox = [
        'url' => 'https://sandbox.itunes.apple.com/verifyReceipt',
        'ahead_time' => 60,
        'audit_status' => false,
    ];

    public static $sandboxCurl = "https://sandbox.itunes.apple.com/verifyReceipt";
    public static $formalityCurl = "https://buy.itunes.apple.com/verifyReceipt";

    protected $errorMessage = [
        21000 => 'App Store不能读取你提供的JSON对象',
        21002 => 'receipt-data域的数据有问题',
        21003 => 'receipt无法通过验证',
        21004 => '提供的shared secret不匹配你账号中的shared secret',
        21005 => 'receipt服务器当前不可用',
        21006 => 'receipt合法，但是订阅已过期。服务器接收到这个状态码时，receipt数据仍然会解码并一起发送',
        21007 => 'receipt是Sandbox receipt，但却发送至生产系统的验证服务',
        21008 => 'receipt是生产receipt，但却发送至Sandbox环境的验证服务',
    ];

    /**
     * 公共请求接口
     * @access public
     * @static
     * @param array $encodeStr 苹果支付参数
     * @param string $url 请求的链接
     * @throws BaseException
     * @since 2020-05-21 18:01:04
     */
    public static function request(array $encodeStr, $url)
    {
        // 苹果返回的数据
        $checkData = static::send($encodeStr, $url);
        if (0 !== intval($checkData['status'])) {
            // 这里做日志记录，请求苹果失败

            throw new Exception("请求苹果失败");
        }
        return $checkData;
    }

    /**
     * 获取最新的订单记录
     * @access public
     * @static
     * @param array $ios_data
     * @param array $req
     * @since 2020-05-21 18:30:29
     */
    public static function getLastOrder(array $ios_data, array $req)
    {
        // 签名校验成功,修改订单状态
        $order = $ios_data['receipt']['in_app'];//所有的订单的信息
        // 排序
        $last_purchase_date = array_column($order, 'purchase_date_ms');
        array_multisort($last_purchase_date, SORT_DESC, $order);
        // 最新订单
        $last_order = $order[0];

        // 验证订单是否一致
        if ($last_order['transaction_id'] != $req["transaction_id"]) {
            // 这里做日志记录，订单有误

            throw new Exception("订单有误");
        }

        return $last_order;
    }

    /**
     * 向苹果服务器请求
     * @access public
     * @param array $encodeStr 苹果收据及密码
     * @param string $url 请求的链接，正式环境的链接，或是沙盒测试的练级
     * @return array
     * @since 2020-03-24 16:10:32
     */
    protected static function send(array $encodeStr,$url)
    {
        $ch = curl_init();

        $encodeStr =  json_encode($encodeStr);
//        $encodeStr ="{'receipt-data':".$encodeStr['receipt'].",'password':".$data['password']."}";
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 0);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodeStr);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($ch);
        curl_close($ch);
        $resut = (Array)json_decode($output,true);
        return $resut;
    }

}
