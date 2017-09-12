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

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'manage', 'middleware' => ['manageauth', 'rolePermission']], function () {
    Route::get('/article/delete/{id}', 'ArticleController@delete')->name('ArticleDelete');
    Route::get('/article', 'ArticleController@articleList')->name('ArticleList');
    Route::get('/article/create', 'ArticleController@create')->name('ArticleCreate');
    Route::post('/article/create', 'ArticleController@create')->name('ArticleStore');
    Route::get('/article/edit/{id}', 'ArticleController@edit')->name('ArticleEdit');
    Route::post('/article/edit/{id}', 'ArticleController@edit')->name('ArticleUpdate');
    Route::get('/', 'ManageController@index')->name('ManageIndex');
    Route::get('/addRole', 'RoleController@addRole');
    Route::get('/addPermission', 'RoleController@addPermission');
    Route::get('/addRolePermission', 'RoleController@addRolePermission');
    Route::get('/checkPermission', 'RoleController@checkPermission');
    //用户列表
    Route::get('/manageList', 'ManageController@manageList')->name('ManageList');
    //角色列表
    Route::get('/roleList', 'ManageController@roleList')->name('RoleList');
    Route::get('/role/addRole', 'ManageController@addRole')->name('RoleCreate');
    Route::post('/role/addRole', 'ManageController@addRole')->name('RoleStore');

    Route::get('/role/editRole/{id}', 'ManageController@editRole')->name('RoleEdit');
    Route::post('/role/editRole/{id}', 'ManageController@editRole')->name('RoleUpdate');

    //新增用户
    Route::get('/addManage', 'ManageController@addManage')->name('ManageCreate');
    Route::post('/addManage', 'ManageController@addManage')->name('ManageStore');
    //编辑用户
    Route::get('/editManage/{id}', 'ManageController@editManage')->name('ManageEdit');
    Route::post('/editManage/{id}', 'ManageController@editManage')->name('ManageUpdate');
    //菜单权限管理
    Route::get('/menuPermission', 'ManageController@menuPermission');
    Route::get('/menuPermissionAdd', 'ManageController@addMenuPermission');
    Route::post('/menuPermissionAdd', 'ManageController@addMenuPermission');

    Route::get('/editMenuPermission/{id}', 'ManageController@editMenuPermission');
    Route::post('/editMenuPermission/{id}', 'ManageController@editMenuPermission');
    Route::get('/deletePermission/{id}', 'ManageController@deletePermission');
});
