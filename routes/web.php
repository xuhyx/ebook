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

Route::get('/', function () {
    return redirect('/Home/Index');
});

Auth::routes();

//主页路由
Route::get('/home', 'HomeController@index')->name('home');


//后台路由
@include_once ('admin.php');

//前台路由
@include_once ('home.php');

