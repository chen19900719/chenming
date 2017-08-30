<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function add()
    {
        //curl模拟post提交数据
        $url = "http://project.dev/test.php";
        $data = '12345';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Content-Length:' . strlen($data)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function map()
    {
        return view('admin.map');
    }

    public function address()
    {
        $mapArr[0] = array('x' => '116.417854', 'y' => '39.921988', 'name' => '地址：北京市东城区王府井大街88号乐天银泰百货八层');
        $mapArr[1] = array('x' => '114.316', 'y' => '30.581', 'name' => '地址：湖北省武汉市');
        $mapArr[2] = array('x' => '116.412222', 'y' => '39.912345', 'name' => '北京市东城区正义路甲5号');
        $data = [
            'mapArr' => $mapArr,
        ];
        return $data;

    }
}
