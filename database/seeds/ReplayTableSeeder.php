<?php

use Illuminate\Database\Seeder;

class ReplayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Model\Replay::class,500)->create();
    }
}
