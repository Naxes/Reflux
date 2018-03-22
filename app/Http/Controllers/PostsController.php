<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Vote;
use App\Comment;
use Auth;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {        
        $posts = Post::latest()->paginate(5);
        
        if (!$posts->count()) {
            abort(404);
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = Comment::with('replies')->where('post_id', $post->id)->where('parent_id')->get();                                           
        
        return view('posts.show', compact('post', 'comments'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(
            request(),
            [
                'title' => 'required',                
                'body'  => 'required'        
            ]
        );

        $post = Post::create(
        [
            'title'   => request('title'),            
            'body'    => request('body'),                        
            'score'   => 0,
            'user_id' => auth()->id()
        ]);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $this->validate(
            request(),
            [
                'post_title' => 'required|in:'.$post->title                
            ]
        );

        Post::where('id', $post->id)->where('user_id', auth()->id())->delete();
        Vote::where('post_id', $post->id)->delete();        

        return redirect()->back();
    }
}
