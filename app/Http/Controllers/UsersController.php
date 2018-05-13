<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use App\User;
use App\Post;
use App\Comment;
use App\Vote;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(Request $request, User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(6);

        $sort = $request->input('sort'); 
        switch ($sort) {
            case 'likes':
                $posts = Post::whereHas('votes', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->paginate(6);
                break;
            case 'comments':
                $comments = Comment::with('post')->where('user_id', $user->id)->paginate(6);
                break;
            default;
        }

        return view('profiles.show', compact('user', 'posts', 'comments'));
    }

    public function edit(User $user)
    {
        $countries = Storage::disk('local')->get('countries.json');
        $countries = json_decode($countries, true);

        if ($user->id != auth()->id()) {
            return redirect()->back();
        }
        return view('profiles.edit', compact('user', 'countries'));       
    }

    public function update(User $user)
    {        
        $this->validate(
            request(),
            [
                'name'     => 'required|max:20|regex:/^(?!.*[-+_!@#$%^&*.,?])(?!.*[\s]).+$/|unique:users,name,' . auth()->id(),
                'email'    => 'required|unique:users,email,' . auth()->id(),
                'bio'      => 'max:80',
                'url'      => 'nullable|regex:/^(?!https)(?!http)(?!.*[-+_!@#$%^&*,?])(?=.*[.])(?!.*[.]$).+$/'
            ]
        );

        $user = User::where('id', auth()->id())->update(
        [
            'name'     => request('name'),
            'email'    => request('email'),
            'bio'      => request('bio'),
            'url'      => request('url'),
            'location' => request('location')
        ]);

        return redirect('/');
    }
}
