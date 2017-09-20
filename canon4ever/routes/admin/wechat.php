<?php
Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat', 'as' => 'wechat.'], function () {
    //微信自定义菜单
    Route::group(['prefix' => 'menu'], function () {
        Route::get('edit', 'MenuController@edit')->name('menu.edit');
        Route::put('update', 'MenuController@update')->name('menu.update');
        Route::delete('destroy', 'MenuController@destroy')->name('menu.destroy');
    });
});