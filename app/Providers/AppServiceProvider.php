<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\User;
use App\Model\Article;
use App\Model\Cate;
use App\Model\Goods;
use App\Model\Banner;
use App\Model\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Schema::defaultStringLength(191);

        //获取用户总数
        $userCount=User::count();

        //获取文章总数
        $articleCount=Article::count();

        //获取分类总数
        $cateCount=Cate::count();

        //获取书籍总数
        $goodsCount=Goods::count();

        //获取轮播图图片总数
        $bannerCount=Banner::count();

        //共享数据条目数
        view()->share('userCount',$userCount);

        view()->share('articleCount',$articleCount);

        view()->share('cateCount',$cateCount);

        view()->share('goodsCount',$goodsCount);

        view()->share('bannerCount',$bannerCount);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
