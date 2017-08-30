<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Toplan\PhpSms\Sms;
use Socialite;
use Illuminate\Support\Facades\Log;
use Omnipay\Omnipay;
use Endroid\QrCode\QrCode;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use EasyWeChat;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobile = '18108611687';
        $code = rand(1000, 9999);
        $templates = [
            'Aliyun' => 'SMS_75990443',
        ];
        $tempData = [
            'code' => $code,
            'product' => '云通信服务'
        ];
        $status = Sms::make()->to($mobile)->template($templates)->data($tempData)->send();
        return $status;

    }

    public function test()
    {
        Redis::pipeline(function ($pipe) {
            for ($i = 0; $i < 1000; $i++) {
                $pipe->set("key:$i", $i);
            }
            dd($pipe);
            die;
        });

    }

    public function qq()
    {
//        return Socialite::with('qq')->redirect();
        $clientId = env('QQ_KEY');
        $clientSecret = env('QQ_SECRET');
        $redirectUrl = env('QQ_REDIRECT_URI');
        $config = new \SocialiteProviders\Manager\Config($clientId, $clientSecret, $redirectUrl);
        return Socialite::with('qq')->setConfig($config)->redirect();

    }

    public function qqlogin()
    {
        $user = Socialite::driver('qq')->user();
        $accessTokenResponseBody = $user->accessTokenResponseBody;
        dd($user);
        exit;
    }

    public function weixin()
    {
        return Socialite::with('weixinweb')->redirect();
    }

    public function weixinlogin()
    {
        $user = Socialite::driver('weixinweb')->user();
        dd($user);
        die;
    }

    public function weibo()
    {
        return Socialite::with('weibo')->redirect();
    }
    public function weibologin()
    {
        $user = Socialite::driver('weibo')->user();
        dd($user);
        die;
    }

    //支付宝支付
    public function pay()
    {
        $alipay = app('alipay.web');
//        $alipay->setkey('123');
//        $alipay->setNotifyUrl('321');
        $alipay->setOutTradeNo('E000233203123');
        $alipay->setTotalFee('0.01');
        $alipay->setSubject('小米5s');
        $alipay->setBody('商品：支付宝支付测试');

        $alipay->setQrPayMode('5'); //该设置为可选1-5，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

    /**
     * 支付宝支付异步通知
     * 异步通知
     */
    public function webNotify(Request $request)
    {
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => $request->instance()->getContent()
            ]);
            return 'fail';
        }
// 判断通知类型。
        switch ($request->input('trade_status', '')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => $request->input('out_trade_no', ''),
                    'trade_no' => $request->input('trade_no', '')
                ]);
                break;
        }
        return 'success';
    }

    /**
     * 支付宝支付同步通知
     * 同步通知
     */
    public function webReturn(Request $request)
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('支付宝返回查询数据验证失败。', [
                'data' => $request->getQueryString()
            ]);
            return view('alipayfail');
        }
// 判断通知类型。
        switch ($request->input('trade_status', '')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('支付宝通知获得数据验证成功。', [
                    'out_trade_no' => $request->input('out_trade_no', ''),
                    'trade_no' => $request->input('trade_no', '')
                ]);
                break;
        }
        return 123;
    }

    public function weixinpay()
    {
        $gateway = Omnipay::create('WechatPay_Native');
        $gateway->setAppId('wx6e023b7a4ee45709'); ///微信 APPid
        $gateway->setMchId('1271185801');  //微信商户 ID
        $gateway->setApiKey('yb1JrmlcZY31qOnBk2bBZiOBnwl37eBn');  //微信支付 key
        $order = [
            'body' => 'The test order',
            'out_trade_no' => date('YmdHis') . mt_rand(1000, 9999),
            'total_fee' => 1, //=0.01
            'spbill_create_ip' => '127.0.0.1',
            'fee_type' => 'CNY',
            'notify_url' => url('order/pay/wechat/notify'),
        ];

        $request = $gateway->purchase($order);
        $response = $request->send();
//available methods
        $response->isSuccessful();

        $response->getData(); //For debug
        $response->getAppOrderData(); //For WechatPay_App

        $response->getJsOrderData(); //For WechatPay_Js

        $response->getCodeUrl(); //For Native Trade Type
//        $img = QrCode::setSize('280')->generate($response->getCodeUrl());
        $qrCode = new QrCode($response->getCodeUrl());
        header('Content-Type: ' . $qrCode->getContentType());

        $img = $qrCode->writeString();
        echo $img;
        die;


        return view('wechatpay')->with('img', $img);

    }

    public function weixinreturn(Request $request)
    {
        $gateway = Omnipay::create('WechatPay');
        $gateway->setAppId('wx6e023b7a4ee45709');
        $gateway->setMchId('1271185801');
        $gateway->setApiKey('yb1JrmlcZY31qOnBk2bBZiOBnwl37eBn');

        $response = $gateway->completePurchase([
            'request_params' => file_get_contents('php://input')
        ])->send();
        Log::debug('测试微信支付成功12');
        if ($response->isPaid()) {
            //pay success
            Log::debug('测试微信支付成功2345');
            var_dump($response->getRequestData());
        } else {
            //pay fail
        }
    }

    public function easypay()
    {
        $attributes = [
            'trade_type' => 'JSAPI', // JSAPI，NATIVE，APP...
            'body' => 'iPad mini 16G 白色',
            'detail' => 'iPad mini 16G 白色',
            'out_trade_no' => '1217752501201407033233368018',
            'total_fee' => 5388,
            'notify_url' => 'http://www.kppw.cn/order/pay/wechat/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址，我就没有在这里配，因为在.env内已经配置了。
            // ...
        ];
// 创建订单
        $order = new Order($attributes);
        $payment = EasyWeChat::payment();
        $result = $payment->prepare($order);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS') {
            //生产那个订单后的逻辑
            \Log::info('生成订单号..' . $data->order_guid);
            //这一块是以ajax形式返回到页面上。
            //用户的体验就是点击【确认支付】，验证码以弹层页面出来了（没错，还需要一个好用的弹层js）。
            $ajax_data = [
                'html' => json_encode(\QrCode::size(250)->generate($result['code_url'])),
                'out_trade_no' => $data->order_guid,
                'price' => $data->price
            ];
            return $ajax_data;
        } else {
            return back()->withErrors('生成订单错误！');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
