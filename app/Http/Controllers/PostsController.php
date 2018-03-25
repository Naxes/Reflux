<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Vote;
use App\Comment;
use App\Tag;
use Auth;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {        
        $user = User::where('id', auth()->id())->first();                
        $posts = Post::latest()->paginate(5);        
        
        if (!$posts->count()) {
            abort(404);
        }

        return view('posts.index', compact('user', 'posts', 'tags'));
    }

    public function show(Post $post)
    {
        $user = User::where('id', $post->user_id)->first();
        $comments = Comment::with('replies')->where('post_id', $post->id)->where('parent_id')->get();                                        
        
        return view('posts.show', compact('user', 'post', 'comments'));
    }

    public function create()
    {
        $user = User::where('id', auth()->id())->first();
        return view('posts.create', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate(
            request(),
            [
                'title'  => 'required|max:50',                
                'body'   => 'required',
                'tags'   => 'required'  
            ]
        );

        $post = Post::create(
        [
            'title'   => request('title'),            
            'body'    => request('body'),                                    
            'score'   => 0,
            'user_id' => auth()->id()
        ]);
                
        $tags = $request->input('tags');
        foreach ($tags as $tag) {
            Tag::create(
            [
                'post_id' => $post->id,
                'name'    => $tag
            ]);
        }

        return redirect('/');
    }

    public function edit(Post $post)
    {
        $user = User::where('id', auth()->id())->first();        

        if($post->user_id !== auth()->id()) {
            return redirect('/');
        }

        return view('posts.edit', compact('user', 'post'));
    }

    public function update(Post $post)
    {
        $this->validate(
            request(),
            [                                
                'body' => 'required',                       
            ]
        );

        $post = Post::where('id', $post->id)->where('user_id', auth()->id())->update(
        [                        
            'body' => request('body')            
        ]);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $this->validate(
            request(),
            [
                'post_title' => 'required',
                Rule::in([$post->title])             
            ]
        );

        Post::where('id', $post->id)->where('user_id', auth()->id())->delete();
        Vote::where('post_id', $post->id)->delete();
        Tag::where('post_id', $post->id)->delete();      

        return redirect()->back();
    }
}
