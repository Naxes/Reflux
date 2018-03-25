<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /* Set slug to users name */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /* User has many posts */
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    /* User has many votes */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /* User has many comments */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /* Gravatar based on users hashed email */
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=259&d=retro";
    }
}
