<?php

/*
 * This file is part of PHP CS Fixer.
 * (c) php-team@yaochufa <php-team@yaochufa.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id?}', 'UserController@index')->middleware('checkRole:admin,name');

//use \app\Http\MiddleWare\CheckRole;
//Route::get('user/{id}', 'UserController@index')->middleware(CheckRole::class);

Route::resource('photos', 'PhotoController', ['except' => ['index', 'show'], 'names' => ['create' => 'photo.build']]);

//Route::resource('test', 'TestController', ['only' => ['index', 'create']]);
//Route::resource('test', 'TestController');

Route::match(['get', 'post'], 'test/upload', 'TestController@upload');

//Route::get('test/{name}/age/{age}', 'TestController@index');
Route::get('test/download', 'TestController@download');
Route::get('test', 'TestController@index');
Route::get('notify', 'TestController@notify');

Route::get('user/{id}/profile', function ($id) {
    echo 12313;
})->name('profile');

Route::resource('show', 'ShowController');

// 自动认证用户路由
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 手动认证用户路由设置（后台管理员登录认证）
/*Route::group(['middleware' => 'web'], function () {
    Route::any('admin/login', 'Admin\AuthController@login');
    Route::any('admin/logout', 'Admin\AuthController@logout');
    Route::any('admin/register', 'Admin\AuthController@register');
    Route::get('/admin', 'AdminController@index');
});*/

Route::match(['get', 'post'], 'product/create', 'ProductController@create');
Route::match(['get', 'post'], 'product/update', 'ProductController@update');

Route::match(['get', 'post'], 'order/create', 'OrderController@create');
Route::match(['get', 'post'], 'order/cancel', 'OrderController@cancel');
Route::match(['get'], 'order', 'OrderController@index');

Route::match(['get'], 'group/create', 'GroupController@create');
Route::match(['post'], 'group/save', 'GroupController@save')->name('groupsave');

Route::match(['get'], 'admin/login', 'Admin\LoginController@index');
Route::match(['post'], 'admin/auth', 'Admin\LoginController@auth')->name('auth');
Route::match(['get'], 'admin/logout', 'Admin\LoginController@logout')->name('logout');
