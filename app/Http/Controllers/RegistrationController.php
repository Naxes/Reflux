<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(
            request(),
            [
                'name'      => 'required|unique:users',
                'email'     => 'required|unique:users|email',
                'password'  => 'required|confirmed|min:6'
            ]
        );

        $user = User::create(
        [
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => Hash::make(request('password'))
        ]);

        auth()->login($user);

        return redirect('/');
    }
}
