<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
//生产文章的工厂
$factory->define(App\Model\Article::class,function(Faker\Generator $faker){
    //ger a radom user
    $user=\App\Model\User::inRandomOrder()->first();
    $cate=\App\Model\Cate::inRandomOrder()->first();

    return [
        'user_id'=>$user->id,
        'cate_id'=>$cate->id,
        'title'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'descr'=>$faker->sentence,
        'click_num'=>$faker->numberBetween($min = 0, $max = 1000),
        'content'=>$faker->paragraph,
    ];
});
//生产商品的工厂
$factory->define(App\Model\Goods::class,function(Faker\Generator $faker){
    //ger a radom user
    $press=\App\Model\Press::inRandomOrder()->first();
    $cate=\App\Model\Cate::inRandomOrder()->first();

    return [
        'press_id'=>$press->id,
        'cate_id'=>$cate->id,
        'gname'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
        'gauthor'=>$faker->name,
        'gDesc'=>$faker->text,
        'gPrise'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'gstock'=>$faker->numberBetween($min = 0, $max = 9000),
        'visitNum'=>$faker->numberBetween($min = 0, $max = 1000),
    ];
});

//生产评论的工厂
$factory->define(App\Model\Comment::class,function(Faker\Generator $faker){
    //ger a radom user
    $user=\App\Model\User::inRandomOrder()->first();
    $article=\App\Model\Article::inRandomOrder()->first();

    return [
        'user_id'=>$user->id,
        'cmtType'=>$faker->numberBetween($min = 0, $max = 1),
        'bmId'=>$article->id,
        'cmtContent'=>$faker->text,
    ];
});

//生产回复的工厂
$factory->define(App\Model\Replay::class,function(Faker\Generator $faker){
    //ger a radom user
    $user=\App\Model\User::inRandomOrder()->first();
    $comment=\App\Model\Comment::inRandomOrder()->first();

    return [
        'user_id'=>$user->id,
        'comment_id'=>$comment->id,
        'rplContent'=>$faker->text,
    ];
});