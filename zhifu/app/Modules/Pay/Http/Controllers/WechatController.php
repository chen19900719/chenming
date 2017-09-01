<?php

namespace App\Modules\Pay\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay;
use QrCode;

class WechatController extends Controller
{
    //

    public function index(){

        $config = ['appId' => 'wx6e023b7a4ee45709','appKey' => 'yb1JrmlcZY31qOnBk2bBZiOBnwl37eBn', 'mchId'=>'1271185801'];
        $wechat = Omnipay::gateway('wechat');
        $wechat->setAppId($config['appId']);
        $wechat->setMchId($config['mchId']);
        $wechat->setAppKey($config['appKey']);
        $params = array(
            'out_trade_no' => time(), // billing id in your system
            'notify_url' => env('WECHAT_NOTIFY_URL', url('pay/wechat/notify/async')), // URL for asynchronous notify
            'body' => '微信充值', // A simple description
            'total_fee' => 0.01, // Amount with less than 2 decimals places
            'fee_type' => 'CNY', // Currency name from ISO4217, Optional, default as CNY
        );
        $response = $wechat->purchase($params)->send();

        $img = QrCode::size('280')->generate($response->getRedirectUrl());
        return $img;
    }

    public function sync(){

    }

    public function async(){

        //获取微信回调参数
        //$arrNotify = \CommonClass::xmlToArray($GLOBALS['HTTP_RAW_POST_DATA']);
        $arrNotify = ['return_code' => 'SUCESS'];
        $content = '<xml>
                    <return_code><![CDATA[SUCCESS]]></return_code>
                    <return_msg><![CDATA[OK]]></return_msg>
                    </xml>';

        if ($arrNotify['result_code'] == 'SUCCESS' && $arrNotify['return_code'] = 'SUCCESS') {

            /**
            * 此处处理订单业务逻辑
            */

            //回复微信端请求成功
            return response($content)->header('Content-Type', 'text/xml');
        }


    }

}
