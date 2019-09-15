<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    //
    protected $fillable=[
        'user_id',
        'artist',
        'title'.
        'tag',
        'content',
        'Album',
        'featuring',
        'producer',
        'written_by',
        'release_date',
        'Album_art',
        'audio_link',
        'video_link'];




    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
