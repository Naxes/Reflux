<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $this->validate(
        request(),
        [
            'comment' => 'required'
        ]
        );

        if (request('parent') != null) {
            Comment::create([
                'user_id'   => auth()->id(),
                'post_id'   => $post->id,
                'parent_id' => request('parent'),
                'comment'   => request('comment')
            ]);
        } else {
            Comment::create([
                'user_id'   => auth()->id(),
                'post_id'   => $post->id,                
                'comment'   => request('comment')
            ]);
        }
        
        return redirect('/posts/'.$post->id);
    }
}
