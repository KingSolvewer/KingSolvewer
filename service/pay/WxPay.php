<?php
/**
 * 微信支付封装控制器类
 *  主要目的是：当调取支付时直接
 * Class WxPay
 * @package app\pay\controller
 */

namespace org\pay;

use think\Db;

class WxPay
{
    public $Notify_url;
    public function __construct()
    {
        ini_set('date.timezone', 'Asia/Shanghai');
        //微信支付SDK
        require_once "lib/WxPay.Api.php";
        require_once "lib/WxPay.Notify.php";
        require_once "lib/WxPay.Data.php";
    }


    /**
     * 下单拉起支付数据
     * @param $order_number
     * @param $total_fee
     * @param $appid_set
     * @return bool|\成功时返回，其他抛异常
     * @throws \WxPayException
     */
    public function _wxUnifiedOrder($order_number, $total_fee, $appid_set = [])
    {
        $total_fee = $total_fee *100;//转换 单位为分
        $input = new \WxPayUnifiedOrder();
        $input->SetAppid($appid_set['appid']);
        $input->SetMch_id($appid_set['mechid']);
        $input->SetBody($appid_set['name']);
        $input->SetAttach($appid_set['service_name']);
        $input->SetOut_trade_no($order_number);
        $input->SetTotal_fee($total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetNotify_url($this->Notify_url);
        $input->SetTrade_type("APP");

        $result = \WxPayApi::unifiedOrder($input);

        // Log::record('----------------------------------------------------微信下单：'.json_encode($result), Log::DEBUG);
        if($result['return_code']!='SUCCESS'){
            $msg = "统一下单失败";
            return false;
        }
        if (!array_key_exists("appid", $result) ||
            !array_key_exists("mch_id", $result) ||
            !array_key_exists("prepay_id", $result)
        ) {
            $msg = "统一下单失败";
            return false;
        }
        return $result;
    }

    /**
     * @param $respt
     * @return \签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    public function wxMakeSign($respt)
    {
        $input = new \WxPayNotifyReply();
        $input->SetData("appid", $respt["appId"]);
        $input->SetData("partnerid", $respt['partnerId']);
        $input->SetData("noncestr", $respt['nonceStr']);
        $input->SetData("prepayid", $respt['prepayId']);
        $input->SetData("timestamp", $respt['timeStamp']);
        $input->SetData("package", $respt['packageValue']);
        $sign = $input->MakeSign();
        return $sign;

    }

    /**
     * @return \产生的随机字符串
     */
    public function getNonceStr()
    {
        $getNonceStr=  \WxPayApi::getNonceStr();
        return $getNonceStr;
    }


    /**
     * 支付成功回调，给微信服务器发送信息
     * @param $type
     * @return string
     * @throws \WxPayException
     */
    public function sendCodeAndMsg($type)
    {
        $input = new \WxPayNotifyReply();
        if($type==1){
            //成功
            $input->SetReturn_code('SUCCESS');
            $input->SetReturn_msg('OK');
        }else{
            //失败
            $input->SetReturn_code('FAIL');
        }
        \WxPayApi::replyNotify($input->ToXml());
        return $input->ToXml();
        exit;
    }


    /**
     * 微信支付数据回调
     * @return array|bool
     * @throws \WxPayException
     */
    public function wxNotify($appid_set = [])
    {
        //获取通知的数据
       $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
      // $result=json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        //如果返回成功则验证签名
        try {
            $WxPayResults=new \WxPayResults();
            $result=$WxPayResults::Init($xml);
        } catch (WxPayException $e) {
            $msg = $e->errorMessage();
            return false;
        }
        //Log::record('微信回调结果：----------'.json_encode($result), Log::DEBUG);
        if (!array_key_exists("transaction_id", $result)) {
            $msg = "输入参数不正确";
            return false;
        }
        if (!array_key_exists("out_trade_no", $result)) {
            $msg = "输入参数不正确";
            return false;
        }

        //查询订单，判断订单真实性
        if (!$this->wxOrderQuery($result["out_trade_no"], $appid_set)) {
            $msg = "订单查询失败";
            return false;
        }

        return $result;
    }


    /**
     * 微信支付订单查询
     * @param $order_number
     * @return bool
     * @throws \WxPayException
     */
    public function wxOrderQuery($order_number, $appid_set = [])
    {
        if ($order_number) {
            $input = new \WxPayOrderQuery();

            $input->SetAppid($appid_set['appid']);
            $input->SetMch_id($appid_set['mechid']);
            $input->SetOut_trade_no($order_number);
            $result = \WxPayApi::orderQuery($input);
        }
        if ($result['return_code'] == 'SUCCESS' && $result['total_fee']!='') {
            return $result['trade_state']==='SUCCESS'; ///交易状态：SUCCESS—支付成功  //REFUND—转入退款 //NOTPAY—未支付 //CLOSED—已关闭 //REVOKED—已撤销（刷卡支付） //USERPAYING--用户支付中  //PAYERROR--支付失败(其他原因，如银行返回失败)
        }
        return false;
    }

}