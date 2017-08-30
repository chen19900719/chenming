<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['domain' => '{service}.qyzb.app'], function () {
    Route::get('/ccc/laravelacademy', function ($service) {
        return "Write FROM {$service}.qyzb.app";
    });
    Route::get('/update/laravelacademy', function ($service) {
        return "Update FROM {$service}.qyzb.app";
    });
});

Route::get('/qq_api/callback', 'TestController@qqlogin');
Route::get('/weixinweb_api/callback', 'TestController@weixinlogin');


Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('/qqlogin', 'TestController@qqlogin');
        Route::get('/qq', 'TestController@qq');
        Route::get('/weixin', 'TestController@weixin');
        Route::get('/weixin/callback', 'TestController@weixinlogin');

        Route::get('/', 'IndexController@index');
        Route::get('add', 'IndexController@add');
        //支付宝支付处理
        Route::get('alipay/pay', 'AlipayController@pay');

        Route::get('excel/export', 'AlipayController@export');
        Route::get('excel/import', 'AlipayController@import');
        //支付后跳转页面
        Route::post('alipay/webNotify', 'AlipayController@webNotify');
        Route::post('alipay/webReturn', 'AlipayController@webReturn');
        Route::get('alipay/send', 'AlipayController@send');

        //部门
        Route::get('/department', 'DepartmentController@index');
        Route::get('/department/create', 'DepartmentController@create');
        Route::post('/department/create', 'DepartmentController@create');
        Route::get('/department/departmentadd/{id}', 'DepartmentController@department_add');

        //ajax上传图片
        Route::post('/upload', 'UploadController@upload');
        //上传附件
        Route::post('/uploadFile', 'UploadController@uploadFile');
        Route::get('/fileDownload/{id}', 'UploadController@fileDownload');
        Route::get('/fileDelete', 'UploadController@fileDelete');

        //任务中心
        Route::get('/task', 'TaskController@index');//首页
        Route::get('/task/create', 'TaskController@create');//新增
        Route::post('/task/store', 'TaskController@store');//存储任务
        Route::get('/task/edit/{id}', 'TaskController@edit');//新增
        //地图资源
        Route::get('/map', 'IndexController@map');
        Route::get('/address', 'IndexController@address');

    });

});


Route::get('/home', 'HomeController@index')->name('home');
