<?php
Route::group(['prefix' => 'system', 'namespace' => 'System', 'as' => 'system.'], function () {
    // 清除缓存
    Route::get('cache', 'CacheController@index')->name('cache.index');
    Route::delete('cache', 'CacheController@destroy')->name('cache.destroy');

    // 系统设置
    Route::group(['prefix' => 'config'], function () {
        Route::get('/', 'ConfigController@edit')->name('config.edit');
        Route::put('/', 'ConfigController@update')->name('config.update');
    });

    // 上传
    Route::group(['prefix' => 'photo'], function () {
        Route::post('upload_icon', 'PhotoController@upload_icon')->name('photo.upload_icon');
        Route::post('upload', 'PhotoController@upload')->name('photo.upload');
    });

    // 用户权限
    Route::patch('permission/sort_order', 'PermissionController@sort_order')->name('permission.sort_order');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
});