@extends('layouts.master')

@section('content')

    {{-- Profile Header --}}
    @if (Auth::check() && $user->id == Auth::user()->id)
        <h3 class="ui header">Your profile</h3>  
    @else
        <h3 class="ui header">{{ $user->name }}'s profile</h3>                
    @endif
    <div class="ui divider"></div>

    {{-- Profile Tabs --}}
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
        
        @if (request()->input('sort') == 'comments')

            {{-- Comments --}}
            @if ($comments->count())
                @foreach ($comments as $comment)
                    <div class="eight wide computer only sixteen mobile column">
                        <div class="ui segments">
                            <div class="ui horizontal segments posts">
                                @include('partials.comments-profile')
                            </div>
                            <div class="ui segment">
                                <div class="ui grid">
                                    <div class="sixteen wide column">
                                        <div class="ui comments">
                                            <div class="comment">
                                                <div class="avatar">
                                                    <img src="{{ $comment->user->gravatar }}" alt="avatar">
                                                </div>
                                                <div class="content">
                                                    <a href="/{{ $comment->user->name }}" class="author">{{ $comment->user->name }}</a>
                                                    <div class="metadata">
                                                        <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <div class="text">{!!str_limit($comment->comment, 50)!!}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                @endforeach    
            @else
                <div class="sixteen wide column">
                        <img src="/img/Reflux Comment Icon.png" alt="No Comments Icon" class="ui tiny image centered">                    
                        <h2 class="ui header centered">{{ Auth::user() == $user ? "No comments to show!" : "$user->name hasn't liked anything!" }}</h2> 
                </div>
            @endif

            {{--  Comments Pagination  --}}
            <div class="sixteen wide column">
                {{ $comments->appends(request()->input())->links('partials.paginate') }}
            </div>
        @else
        
            @if ($posts->count())
                {{-- Posts --}}
                @foreach($posts as $post)       
                    <div class="eight wide computer only sixteen wide mobile column post_{{ $post->id }}" style="padding-top: .5rem;">
                        <div class="ui segments">
                            <div class="ui horizontal segments posts">
                                @switch(request()->input('sort'))
                                    @case('likes')
                                        @if ($user == Auth::user())
                                            @include('partials.post partials.post-unlike')
                                        @else
                                            @include('partials.post partials.post-small')
                                        @endif                                
                                        @break                                
                                    @default
                                        @include('partials.post partials.post-small') 
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
                    @include('partials.post partials.post-delete-small')
                @endforeach
            @else                
                <div class="sixteen wide column">
                    @switch(request()->input('sort'))
                        @case('likes')
                            <img src="/img/Reflux NoLike Icon.png" alt="No Likes Icon" class="ui tiny image centered">                    
                            <h2 class="ui header centered">{{ Auth::user() == $user ? "You haven't liked anything!" : "$user->name hasn't liked anything!" }}</h2>                               
                            @break                                
                        @default
                            <img src="/img/Reflux PostIt Icon.png" alt="No Posts Icon" class="ui tiny image centered">                    
                            <h2 class="ui header centered">{{ Auth::user() == $user ? "You haven't posted anything!" : "$user->name hasn't liked anything!" }}</h2>
                    @endswitch                                         
                </div>            
            @endif

            {{--  Posts Pagination  --}}
            <div class="sixteen wide column">
                {{ $posts->appends(request()->input())->links('partials.paginate') }}
            </div>
        @endif                   
    </div>
@endsection