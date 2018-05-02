@extends('layouts.master')

@section('content')
    <div class="ui grid" style="padding-top: 8px;">                                
        <div class="sixteen wide computer sixteen wide mobile column" style="padding-top: .5rem;">
            <div class="ui segments">
                <div class="ui horizontal segments posts">
                    @include('partials.post-details')                   
                </div>
                
                {{-- Bottom segment --}}
                <div class="ui segment">
                    <p class="secondary">submitted {{ $post->created_at->diffForHumans() }} by <a href="/{{ $post->user->name }}">{{ $post->user->name }}</a></p>                    
                    <p>{!!$post->body!!}</p>                    
                    <a href="/posts/{{ $post->id }}" class="teal">{{ $post->comments->count() }} comments</a>
                </div>                

                {{--  Delete modal  --}}            
                @include('partials.delete-post')

                {{--  Comments field  --}}
                <div class="ui clearing segment">                    
                    @if (Auth::check())
                        <form action="/posts/{{ $post->id }}/comments" method="post" id="comment_form" class="ui form">
                            @csrf
                                                            
                            <div class="field">                        
                                <div class="ui input">                                      
                                    <textarea class="mce_field" name="comment" id="body"></textarea>
                                </div>                                                        
                            </div>                                                                                    
                            <button class="ui blue button right floated" type="submit">Save</button>                            
                            <div class="ui error message"></div>
                        </form>
                    @else
                        <div class="ui warning message">
                            <a href="/register" class="ui green button">Sign up for free</a>
                            <b>to contribute to the conversation.</b> Already have an account?
                            <a href="/login">Sign in to comment</a>
                        </div>
                    @endif                      
                </div>                            
            </div>
        </div>

        {{--  Comments section --}}
        @include('partials.comments')       
    </div>             
@endsection