<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    //
    protected $table = 'replays';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
}
