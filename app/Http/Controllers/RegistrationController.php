<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

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
                'name'      => 'required|unique:users|max:20|regex:/^(?!.*[-+_!@#$%^&*.,?])(?!.*[\s]).+$/',
                'email'     => 'required|unique:users|email',
                'password'  => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-+_!@#$%^&*.,?]).+$/'
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