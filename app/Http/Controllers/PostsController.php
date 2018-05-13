<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Storage;
use App\User;
use App\Post;
use App\Vote;
use App\Comment;
use App\Tag;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(Request $request)
    {      
        /* Languages JSON */      
        $languages = Storage::disk('local')->get('languages.json');
        $languages = json_decode($languages, true);

        /* User and posts */
        $user = User::where('id', auth()->id())->first();        
        $posts = Post::latest()->paginate(5);
        
        /* Request inputs */
        $search = $request->input('search');
        $sort = $request->input('sort');

        /* Default if no results */
        $response = "Doesn't look anything to me...";

        /* Retrieve posts based on search input */
        if ($search) {
            $posts = Post::where('title', 'like', '%'.$search.'%')->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            })->paginate(5);

            $response = "No results!";
        }

        /* Retrieve posts based on sort metric */
        switch ($sort) {
            case 'top':
                $posts = Post::orderBy('score', 'desc')->paginate(5);
                break;
            case 'new':
                $posts = Post::latest()->paginate(5);
                break;
            case 'old':
                $posts = Post::orderBy('created_at', 'asc')->paginate(5);            
                break;
            default:            
        }        

        return view('posts.index', compact('user', 'posts', 'languages', 'response'));
    }

    public function show(Post $post)
    {
        $user = User::where('id', $post->user_id)->first();
        $comments = Comment::with('replies')->where('post_id', $post->id)->where('parent_id')->paginate(20); 

        if (!$post->exists()) {
            return redirect('/');
        }

        return view('posts.show', compact('user', 'post', 'comments'));
    }

    public function create()
    {
        $languages = Storage::disk('local')->get('languages.json');
        $languages = json_decode($languages, true);
        $user = User::where('id', auth()->id())->first();

        return view('posts.create', compact('user', 'languages'));
    }

    public function store(Request $request)
    {
        $this->validate(
            request(),
            [
                'title'  => 'required|max:70|regex:/^(?!.*[-+_@#$%^&*.,]).+$/',                
                'body'   => 'required',
                'tags'   => 'required|array|min:1|max:5'  
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
        Comment::where('post_id', $post->id)->delete();
        Vote::where('post_id', $post->id)->delete();
        Tag::where('post_id', $post->id)->delete();      
        
        return redirect('/');
    }
}