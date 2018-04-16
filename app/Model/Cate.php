<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = 'cates';

    /**
     * 建立一对多关联
     */
    public function article(){
        return $this->hasMany(Article::class,'cate_id');
    }

    public function goods(){
        return $this->hasMany(Goods::class,'cate_id');
    }
}
