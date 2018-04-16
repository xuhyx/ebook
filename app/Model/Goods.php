<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table = 'goods';

    /**
     * 建立一对关联
     */
    public function cate(){
        return $this->belongsTo(Cate::class,'cate_id');
    }

    public function press(){
        return $this->belongsTo(Press::class,'press_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'bmId');
    }
}
