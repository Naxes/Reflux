@extends('layouts.master')

@section('content')
    <br>
    <div class="sixteen wide computer sixteen wide mobile column">
        <h3 class="ui header">Edit a Post</h3>  
        <div class="ui divider"></div>          
        <form action="/posts/{{ $post->id }}" method="post" class="ui form">
            @method('patch')
            @csrf
            
            <div class="ui raised clearing segment">
                <h3 class="ui header">{{ $post->title }}</h3>                                                     
                <div class="field">                        
                    <div class="ui input">                                      
                        <textarea class="mce_field" name="body" placeholder="Text">
                            {{ $post->body }}
                        </textarea>
                    </div>                                                        
                </div>                       
                <button class="ui blue button right floated" type="submit">Update</button>
                <a href="/" class="ui button right floated">Cancel</a>
                <div class="ui error message"></div>
            </div>            
        </form>    
    </div>
    <div class="five wide column computer only"></div>    
@endsection