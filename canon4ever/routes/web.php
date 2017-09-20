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

/**
 * wechat
 */
Route::group(['namespace' => 'Wechat', 'domain' => env('WECHAT_DOMAIN')], function () {
    //支付成功回调
    Route::post('order/notify', 'OrderController@notify');

    //微信商城
    Route::group(['middleware' => ['wechat.oauth', 'wechat']], function () {
        require 'wechat/shop.php';
    });
});

/**
 * font-end
 */
Route::group(['namespace' => 'Home', 'domain' => env('HOME_DOMAIN')], function () {
    require 'home/index.php';
});

/**
 * back-end
 */
Route::group(['domain' => env('ADMIN_DOMAIN')], function () {
    //登录注册
    Auth::routes();

    Route::group(['middleware' => ['auth', 'sidebar', 'role'], 'namespace' => 'Admin'], function () {

        //后台首页
        Route::get('/', 'HomeController@index')->name('admin.index');

        //系统
        require 'admin/system.php';

        //官网
        require 'admin/cms.php';

        //广告
        require 'admin/ads.php';

        //学生
        require 'admin/crm.php';

        //商城
        require 'admin/shop.php';

        //微信
        require 'admin/wechat.php';
    });
});