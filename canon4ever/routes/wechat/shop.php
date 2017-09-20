<?php
/*
 * 微商城
 */

//用户授权
Route::get('/', 'IndexController@index');

//搜索
Route::get('/search', 'ProductController@search');

Route::group(['prefix' => 'product'], function () {
    //商品分类
    Route::get('category', 'ProductController@category');

    //商品详情
    Route::get('{id}', 'ProductController@show');

    //商品列表
    Route::get('/', 'ProductController@index');
});

//购物车
Route::group(['prefix' => 'cart'], function () {
    Route::post('/', 'CartController@store');
    Route::get('/', 'CartController@index');
    Route::delete('/', 'CartController@destroy');
    Route::patch('/', 'CartController@change_num');
});

//订单
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

//服务
Route::group(['prefix' => 'customer'], function () {
    Route::get('/', 'CustomerController@index');
});

//地址管理
Route::group(['prefix' => 'address'], function () {
    //管理地址
    Route::get('/manage', 'AddressController@manage');
    //改变默认地址
    Route::patch('/', 'AddressController@default_address');
});
Route::resource('address', 'AddressController');

