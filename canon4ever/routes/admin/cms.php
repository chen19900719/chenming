<?php
Route::group(['prefix' => 'cms', 'namespace' => 'Cms', 'as' => 'cms.'], function () {
    //友情链接
    Route::group(['prefix' => 'link'], function () {
        Route::delete('destroy_checked', 'LinkController@destroy_checked')->name('link.destroy_checked');
        Route::patch('sort_order', 'LinkController@sort_order')->name('link.sort_order');
        Route::patch('is_something', 'LinkController@is_something')->name('link.is_something');
    });
    Route::resource('link', 'LinkController');

    //栏目管理
    Route::group(['prefix' => 'category'], function () {
        Route::patch('sort_order', 'CategoryController@sort_order')->name('category.sort_order');
        Route::patch('is_something', 'CategoryController@is_something')->name('category.is_something');
    });
    Route::resource('category', 'CategoryController');

    //文章管理
    Route::group(['prefix' => 'article'], function () {
        Route::delete('destroy_checked', 'ArticleController@destroy_checked')->name('article.destroy_checked');
        Route::patch('is_something', 'ArticleController@is_something')->name('article.is_something');

        //回收站
        Route::get('trash', 'ArticleController@trash')->name('article.trash');
        Route::get('/{article}/restore', 'ArticleController@restore')->name('article.restore');
        Route::delete('/{article}/force_destroy', 'ArticleController@force_destroy')->name('article.force_destroy');
        Route::delete('force_destroy_checked', 'ArticleController@force_destroy_checked')->name('article.force_destroy_checked');
        Route::post('restore_checked', 'ArticleController@restore_checked')->name('article.restore_checked');
    });

    Route::resource('article', 'ArticleController');
});