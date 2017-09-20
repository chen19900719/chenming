<?php
Route::group(['prefix' => 'crm', 'namespace' => 'Crm', 'as' => 'crm.'], function () {
    Route::get('/', 'HomeController@index')->name('index');

    //学生管理
    Route::group(['prefix' => 'student'], function () {
        Route::get('search', 'StudentController@search')->name('student.search');
        Route::patch('is_something', 'StudentController@is_something')->name('student.is_something');
    });
    Route::resource('student', 'StudentController');

    //分组管理
    Route::group(['prefix' => 'category'], function () {
        Route::patch('sort_order', 'TeamController@sort_order')->name('team.sort_order');
        Route::get('index_list', 'TeamController@index_list')->name('team.index_list');
    });
    Route::resource('team', 'TeamController');
});