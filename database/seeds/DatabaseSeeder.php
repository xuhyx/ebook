<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(ReplayTableSeeder::class);
    }
}
