<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Vote;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function like(Post $post)
    {
        $vote = Vote::where('user_id', auth()->id())->where('post_id', $post->id)->first();
        if (!$vote) {
            Vote::create(
            [
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'type'    => 1
            ]);
            
            Post::where('id', $post->id)->increment('score', 1);
        } else {
            Post::where('id', $post->id)->decrement('score', 1);
            $vote->delete();                       
        }        

        return redirect('/');
    }    
}
