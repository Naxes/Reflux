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
                        <span class="secondary">submitted {{ $post->created_at->diffForHumans() }} by
                            <a href="/">{{ $post->user->name }}</a>
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
            {{ $posts->links('partials.paginate') }}
        </div>
    </div>    
@endsection