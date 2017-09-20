<?php
Route::get('/', 'IndexController@index');
Route::get('category/{article_id}', 'IndexController@category');
Route::get('article/{article_id}', 'IndexController@article');