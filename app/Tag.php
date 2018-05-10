<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    /* Tag belongs to a post */
    public function post()
    {
        return $this->belongsTo(Post::class);
    } 
}
