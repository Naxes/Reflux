<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded = [];

    /* Vote belongs to a user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Vote belongs to a post */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
