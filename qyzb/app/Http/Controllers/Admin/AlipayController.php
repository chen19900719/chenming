<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Omnipay\Omnipay;
use Latrell\Alipay;
use Toplan\PhpSms\Sms;
use Excel;
use Storage;


class AlipayController extends Controller
{

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    public function pay()
    {
        // 创建支付单。
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo('order_id');
        $alipay->setTotalFee('order_price');
        $alipay->setSubject('goods_name');
        $alipay->setBody('goods_description');

        $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。

        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

    /**
     * 异步通知
     */
    public function webNotify()
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => Request::instance()->getContent()
            ]);
            return 'fail';
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);
                break;
        }

        return 'success';
    }

    /**
     * 同步通知
     */
    public function webReturn()
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay return query data verification fail.', [
                'data' => Request::getQueryString()
            ]);
            return view('alipay.fail');
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

    public function send()
    {
        $mobile = '18108611687';
        if ($mobile) {
            $code = rand(1000, 9999);
            $templates = [
                'Alidayu' => 'SMS_68210264',
            ];
            $params = [
                'code' => $code,
                'product' => 'alidayu'
            ];
            $content = '你注册的手机验证码为' . $code;
            $status = Sms::make()->to($mobile)->template($templates)->data($params)->send();
        }
        return $status;
    }

    public function export()
    {
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];
        Excel::create('学生成绩', function ($excel) use ($cellData) {
            $excel->sheet('score', function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->store('xlsx')->export('xlsx');
    }

    public function import()
    {
        $filePath = storage_path('exports') . '/学生成绩.csv';
        Excel::load($filePath, function($reader) {
            $results = $reader->get();
            dd($results);
        });


    }

}
