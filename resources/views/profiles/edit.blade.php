@extends('layouts.master')

@section('content')
    <h3 class="ui header">Public profile</h3>
    <div class="ui divider"></div>
    <form action="/edit/{{ $user->name }}" method="post" class="ui settings-form form">
        @method('patch')
        @csrf
        
        <div class="ui raised clearing segment">
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">
                        <label for="name">Name</label>                 
                        <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" autocomplete="off">                                                                                
                    </div>    
                </div>
                <div class="eight wide column">
                    <div class="field">
                        <label for="email">Email</label>                 
                        <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="johndoe@example.com" autocomplete="off">                                                                                
                    </div>    
                </div>
                <div class="eight wide column">
                    <div class="field">
                        <label for="url">URL</label>                 
                        <input id="url" type="text" name="url" value="{{ Auth::user()->url }}" placeholder="example.com" autocomplete="off">                                                                                
                    </div>    
                </div>
                <div class="eight wide column">
                    <div class="field">
                        <label for="location">Location</label>                 
                        <div id="location" class="ui search selection dropdown">
                            <input type="hidden" name="location" value="{{ Auth::user()->location }}" autocomplete="off">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Country</div>
                            <div class="menu">
                                @foreach ($countries as $country)
                                    <div class="item" data-value="{{ $country['name'] }}">{{ $country['name'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>    
                </div>  
            </div>    
            <br>                                      
            <div class="field">                        
                <label for="bio">Bio</label>                                     
                <textarea name="bio" placeholder="Tell us about yourself! (80 characters)">{{ Auth::user()->bio }}</textarea>                
            </div>                                 
            <button class="ui blue button right floated" type="submit">Save</button>
            <a href="/" class="ui button right floated">Cancel</a>            
        </div>            
        <div class="ui error message"></div>
    </form>    
@endsection