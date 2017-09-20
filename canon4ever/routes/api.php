<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//移动端接口
Route::group(['domain' => env('MOBILE_DOMAIN'), 'namespace' => 'Api\Mobile', 'middleware' => ['cors', 'auth:api']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/product/category', 'ProductController@category');
    Route::get('/product/list', 'ProductController@index');
    Route::get('/product/view', 'ProductController@show');
    Route::post('/pass/register', 'CustomerController@register');
    Route::post('/pass/servicelogin', 'CustomerController@serviceLogin');

    //购物车
    Route::group(['prefix' => 'cart'], function () {
        Route::post('/', 'CartController@store');
        Route::get('/', 'CartController@index');
        Route::delete('/', 'CartController@destroy');
        Route::patch('/', 'CartController@change_num');
    });

    Route::group(['prefix' => 'order'], function () {
        //下单
        Route::get('checkout', 'OrderController@checkout');

        //生成订单,支付
        Route::post('/', 'OrderController@store');
        Route::get('pay/{id}', 'OrderController@pay');

        //删除订单
        Route::delete('{id}', 'OrderController@destroy');

        //我的订单
        Route::get('{id}', 'OrderController@show');

        //首页
        Route::get('/', 'OrderController@index');
    });


    Route::group(['prefix' => 'address'], function () {
        //管理地址
        Route::get('/manage', 'AddressController@manage');
        //改变默认地址
        Route::patch('/', 'AddressController@default_address');
    });
    Route::resource('address', 'AddressController');
});

Route::group(['domain' => env('ADMIN_DOMAIN'), 'namespace' => 'Api'], function () {

    //后端echarts接口
    Route::group(['domain' => env('ADMIN_DOMAIN')], function () {
        //商城
        Route::get('sales_count', 'VisualizationController@sales_count');
        Route::get('sales_amount', 'VisualizationController@sales_amount');
        Route::get('top', 'VisualizationController@top');
        Route::get('sales_area', 'VisualizationController@sales_area');

        //会员性别统计
        Route::get('sex_count', 'VisualizationController@sex_count');

        //会员省份统计
        Route::get('customer_province', 'VisualizationController@customer_province');

        //Crm系统
        Route::get('students_count', 'VisualizationController@students_count');
        Route::get('find_us', 'VisualizationController@find_us');
        Route::get('pay_type', 'VisualizationController@pay_type');
        Route::get('avg_salary', 'VisualizationController@avg_salary');
    });

    //微信接口
    Route::group(['domain' => env('WECHAT_DOMAIN')], function () {
        Route::any('wechat', 'WechatController@serve');
    });
});