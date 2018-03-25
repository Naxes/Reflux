<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    /* Comment belongs to a user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Comment belongs to a post */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /* Comment has many of itself */
    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
