<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'articles';

    /**
     * 建立一对关联
     */
    public function cates(){
        return $this->belongsTo(Cate::class,'cate_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'bmId');
    }
}
