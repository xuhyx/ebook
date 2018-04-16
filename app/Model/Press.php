<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    //
    protected $table = 'presses';

    public function goods(){
        return $this->hasMany(Goods::class,'press_id');
    }
}
