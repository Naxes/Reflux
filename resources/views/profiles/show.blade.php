@extends('layouts.master')

@section('content')
    @if (Auth::check() && $user->id == Auth::user()->id)
        <h3 class="ui header">Your profile</h3>  
    @else
        <h3 class="ui header">{{ $user->name }}'s profile</h3>                
    @endif
    <div class="ui divider"></div>
    <div class="ui grid" style="padding-top: 8px;">
        @if (Auth::check() && $user->id == Auth::user()->id)
            <div class="sixteen wide column">
                <div class="ui three item pointing menu">
                    <a href="/{{ Auth::user()->name }}" class="item {{ request()->input('sort') == '' ? 'active' : '' }}">Your posts</a>
                    <a href="/{{ Auth::user()->name }}?sort=likes" class="item {{ request()->input('sort') == 'likes' ? 'active' : '' }}">Your likes</a>
                    <a href="/{{ Auth::user()->name }}?sort=comments" class="item {{ request()->input('sort') == 'comments' ? 'active' : '' }}">Your comments</a>
                </div>    
            </div>
        @else
            <div class="sixteen wide column">
                <div class="ui three item pointing menu">
                    <a href="/{{ $user->name }}" class="item {{ request()->input('sort') == '' ? 'active' : '' }}">{{ $user->name }}'s posts</a>
                    <a href="/{{ $user->name }}?sort=likes" class="item {{ request()->input('sort') == 'likes' ? 'active' : '' }}">{{ $user->name }}'s likes</a>
                    <a href="/{{ $user->name }}?sort=comments" class="item {{ request()->input('sort') == 'comments' ? 'active' : '' }}">{{ $user->name }}'s comments</a>
                </div>    
            </div>
        @endif               
        @foreach($posts as $post)
            <div class="eight wide computer only sixteen wide mobile column post_{{ $post->id }}" style="padding-top: .5rem;">
                <div class="ui segments">
                    <div class="ui horizontal segments posts">
                        @switch(request()->input('sort'))
                            @case('likes')
                                
                                @break                                            
                            @default
                                @include('partials.post-details') 
                        @endswitch                                              
                    </div>

                    {{-- Bottom segment --}}
                    <div class="ui segment">
                        <span class="secondary">submitted {{ $post->created_at->diffForHumans() }} by
                            <a href="/{{ $post->user->name }}">{{ $post->user->name }}</a>
                        </span>
                        </br>
                        <a href="/posts/{{ $post->id }}">{{ $post->comments->count() }} comments</a>
                    </div>
                </div>
            </div>           

            {{--  Delete modal  --}}            
            @include('partials.delete-post')
        @endforeach
                   
        {{--  Pagination  --}}
        <div class="sixteen wide column">
            {{ $posts->appends(request()->input())->links('partials.paginate') }}
        </div>
    </div>
@endsection