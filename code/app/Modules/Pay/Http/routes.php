<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'pay'], function() {
	Route::get('/', function() {
		dd('This is the Pay module index page.');
	});
    Route::get('/alipay', 'AlipayController@index');
    Route::get('/alipay/notify/sync', 'AlipayController@sync');
    Route::get('/alipay/notify/async', 'AlipayController@async');

    Route::get('/wechat', 'WechatController@index');
    Route::get('/wechat/notify/sync', 'WechatController@sync');
    Route::get('/wechat/notify/async', 'WechatController@async');

});
