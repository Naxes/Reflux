@extends('layouts.auth')

@section('content')
    <div class="ui stackable centered aligned grid" style="position: relative; top: 50%; transform: translateY(-50%);">
        <div class="row">
            <div class="four wide column"></div>
            <div class="four wide column">
                <h1 class="ui header teal centered">Log-in to your account</h1>
                <div class="ui segment raised">
                    <form action="/login" method="post" class="ui form">
                        @csrf

                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="name" placeholder="Username" autocomplete="off">
                            </div>                                                        
                        </div>                       
                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Password" autocomplete="off">
                            </div>                                                        
                        </div>
                        <button class="fluid ui teal button" type="submit">Login</button>
                        <div class="ui error message"></div>
                    </form>
                </div>
                <div class="ui segment raised center aligned">
                    <p>New? <a href="/register">Sign Up</a></p>
                </div>
            </div>
            <div class="four wide column"></div>
        </div>
    </div>
@endsection