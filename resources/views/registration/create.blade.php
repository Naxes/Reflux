@extends('layouts.auth')

@section('content')
    <div class="ui stackable centered aligned grid" style="position: relative; top: 50%; transform: translateY(-50%);">
        <div class="row">
            <div class="four wide column"></div>
            <div class="four wide column">
                <a href="/">
                    <img src="/img/Reflux Register Icon.png" alt="Login Icon" class="ui centered tiny image">              
                </a>                
                <div class="ui divider"></div>                              
                <h2 class="ui header teal centered">Register an account</h2>
                <div class="ui segment raised">
                    <form action="/register" method="post" class="ui form register-form">
                        @csrf

                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="name" placeholder="Username" autocomplete="off">
                            </div>                                                        
                        </div>
                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="mail icon"></i>
                                <input type="email" name="email" placeholder="E-mail address" autocomplete="off">
                            </div>                                                        
                        </div>
                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Password" autocomplete="off">
                            </div>                                                        
                        </div>
                        <div class="field">                        
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password_confirmation" placeholder="Confirm password" autocomplete="off">
                            </div>                                                        
                        </div>
                        <button class="ui teal fluid button" type="submit">Register</button>                        
                        <div class="ui error message"></div>
                    </form>
                </div>
                <div class="ui segment raised center aligned">
                    <p>Have an account? <a href="/login">Log-in</a></p>
                </div>                
            </div>
            <div class="four wide column"></div>
        </div>
    </div>
@endsection