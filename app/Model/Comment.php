<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function article(){
        return $this->belongsTo(Article::class,'bmId');
    }
    public function goods(){
        return $this->belongsTo(Goods::class,'bmId');
    }
    public function replay(){
        return $this->hasMany(Replay::class,'comment_id');
    }
}
