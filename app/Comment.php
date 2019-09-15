<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    protected $fillable=['user_id','comment','lyric_id'];

    //
    public function lyric(){
        return $this->belongsTo('App\Lyrics');
    }
}
