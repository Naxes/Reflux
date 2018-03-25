<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /* Post belongs to a user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Post has many votes */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /* Post has many comments */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /* Post has many tags */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
