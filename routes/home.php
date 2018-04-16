<?php
Route::group(['prefix' => 'Home'],function(){
    //主页路由
    Route::resource('/Index','Home\IndexController');
});