<?php
Route::group(['middleware' => 'auth','prefix' => 'Admin'],function(){
//主页路由
Route::get('Index','Admin\IndexController@index');

//用户管理
Route::resource('User','Admin\UserController');

//分类管理
Route::get('Cate/getCatesByPid/{id}','Admin\CateController@getCatesByPid');
Route::get('Cate/details/{id}','Admin\CateController@details');
Route::get('Cate/add/{id}','Admin\CateController@add');
Route::get('Cate/json/{id}','Admin\CateController@json');
Route::resource('Cate','Admin\CateController');

//文章管理
Route::get('Article/myArticle','Admin\ArticleController@myArticle');
Route::get('Article/verify/{id}','Admin\ArticleController@verify');
Route::get('Article/unVerify/{id}','Admin\ArticleController@unVerify');
Route::resource('Article','Admin\ArticleController');

//书籍管理
Route::get('sale/{id}','Admin\GoodsController@sale');
Route::get('unSale/{id}','Admin\GoodsController@unSale');
Route::get('new/{id}','Admin\GoodsController@new');
Route::get('unNew/{id}','Admin\GoodsController@unNew');
Route::get('hot/{id}','Admin\GoodsController@hot');
Route::get('unHot/{id}','Admin\GoodsController@unHot');
Route::resource('Goods','Admin\GoodsController');

//轮播图管理
Route::get('Banner/lock/{id}','Admin\BannerController@lock');
Route::get('Banner/active/{id}','Admin\BannerController@active');
Route::resource('Banner','Admin\BannerController');

//评论管理
Route::resource('Comment','Admin\CommentController');

//评论管理
Route::resource('Replay','Admin\ReplayController');
});