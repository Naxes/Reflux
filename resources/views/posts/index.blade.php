@extends('layouts.master')

@section('content')
    {{-- Dynamic Content --}}
    <div class="ui grid">  
        
        {{-- Content sorting --}}
        <div class="sixteen wide column">
            <div class="ui vertical menu">
                <div class="ui dropdown item nav-dropdown sort-dropdown">
                    Sort by
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="ui icon search input">
                            <i class="search icon"></i>
                            <input type="text" placeholder="Search...">
                        </div>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="chart area icon"></i>
                            Metric
                        </div>                        
                        <a href="/?sort=top" class="item {{ request()->input('sort') == 'top' ? 'active' : '' }}">
                            <i class="heart red icon"></i>
                            Popular
                        </a>
                        <a href="/?sort=new" class="item {{ request()->input('sort') == 'new' ? 'active' : '' }}">
                            <i class="list blue ol icon"></i>
                            Newest
                        </a>
                        <a href="/?sort=old" class="item {{ request()->input('sort') == 'old' ? 'active' : '' }}">
                            <i class="archive violet icon"></i>
                            Oldest
                        </a>
                        <div class="divider"></div>
                        <div class="header">
                            <i class="tags icon"></i>
                            Tags
                        </div>
                        <div class="scrolling menu">
                            @foreach ($languages as $language)
                                @if (request()->input('search') == $language['name'])
                                    <a href="/?search={{ $language['name'] }}" class="item active">{{ $language['name'] }}</a> 
                                @else
                                    <a href="/?search={{ $language['name'] }}" class="item">{{ $language['name'] }}</a>
                                @endif 
                            @endforeach                                
                        </div>
                    </div>
                </div>                
            </div>    
        </div>

        @if ($posts->count())
            @foreach($posts as $post)
                <div class="sixteen wide column post_{{ $post->id }}" style="padding-top: .5rem;">
                    <div class="ui segments">
                        <div class="ui horizontal segments posts">
                            @include('partials.post partials.post-details')                        
                        </div>

                        {{-- Bottom segment --}}
                        <div class="ui segment">
                            <div class="ui grid">
                                <div class="eight wide computer only sixteen wide mobile column">
                                    <span class="secondary">submitted {{ $post->created_at->diffForHumans() }} by
                                        <a href="/{{ $post->user->name }}">{{ $post->user->name }}</a>
                                    </span>
                                    </br>
                                    <a href="/posts/{{ $post->id }}">{{ $post->comments->count() }} comments</a>
                                </div>
                                <div class="eight wide computer only column">                                
                                <div class="ui red labels" style="float:right; margin-top: 8px;">
                                    @foreach ($post->tags as $tag)
                                            <div class="ui label">{{ $tag->name }}</div>
                                    @endforeach
                                </div>
                                </div>
                            </div>                                               
                        </div>
                    </div>
                </div>            

                {{--  Delete modal  --}}            
                @include('partials.post partials.post-delete')
            @endforeach        
                    
            {{--  Pagination  --}}
            <div class="sixteen wide column">        
                {{ $posts->appends(request()->input())->links('partials.paginate') }}
            </div>
        @else
        <div class="sixteen wide column">
            <img src="/img/Reflux PostIt Icon.png" alt="No Likes Icon" class="ui tiny image centered">                    
            <h2 class="ui header centered">{{ $response }}</h2>
        </div>            
        @endif        
    </div>    
@endsection

@section('side-content')
       
@endsection