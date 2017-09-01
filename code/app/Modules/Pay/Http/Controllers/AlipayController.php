<?php

namespace App\Modules\Pay\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use Input;
class AlipayController extends Controller
{
    //

    public function index(){
        // 创建支付单。
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo(time());
        $alipay->setTotalFee(0.01);
        $alipay->setSubject('程序猿');
        $alipay->setBody('新产品上线，买个程序猿杀了祭天');

        $alipay->setQrPayMode('1'); //该设置为可选，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

    /**
     * 阿里支付同步回调函数
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sync(){
        // 验证请求。
        if (! app('alipay.web')->verify()) {
            Log::notice('Alipay return query data verification fail.', [
                'data' => Request::getQueryString()
            ]);
            return view('alipay.failure');
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify get data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);
                break;
        }

        return view('alipay.success');
    }

    /**
     * 阿里支付异步回调函数
     *
     * @return Mix
     */
    public function async(){
        echo "Alipay notify async success~";
    }
}
