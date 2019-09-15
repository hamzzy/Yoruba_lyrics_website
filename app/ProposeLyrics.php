<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposeLyrics extends Model
{
    protected $fillable = [
        'lyrics_id', 'lyrics','user_id', 'reason',
    ];

}
