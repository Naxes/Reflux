@extends('layouts.master')

@section('content')
    <div class="ui grid" style="padding-top: 8px;">        
        @foreach($posts as $post)
            <div class="sixteen wide column post_{{ $post->id }}" style="padding-top: .5rem;">
                <div class="ui segments">
                    <div class="ui horizontal segments posts">
                        @include('partials.post')                        
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
                               <div class="ui red labels" style="float:right;">
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
            @include('partials.delete-post')
        @endforeach        
                   
        {{--  Pagination  --}}
        <div class="sixteen wide column">
            {{ $posts->links('partials.paginate') }}
        </div>
    </div>    
@endsection

@section('side-content')
       
@endsection