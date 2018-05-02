<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Vote;

class UsersController extends Controller
{

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
            default;
        }

        return view('profiles.show', compact('user', 'posts'));
    }

    public function edit()
    {
        $user = User::where('id', auth()->id())->first();

        return view('profiles.edit', compact('user'));       
    }

    public function update(User $user)
    {        
        $this->validate(
            request(),
            [
                'name'     => 'required|unique:users,name,' . auth()->id(),
                'email'    => 'required|unique:users,email,' . auth()->id(),
                'bio'      => 'max:80',
                'location' => 'max:25' 
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
