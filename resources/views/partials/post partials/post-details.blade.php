{{-- Left segment --}}
<div class="ui segment left-segment dark">
    <div class="ui move reveal">

        {{--  Score statistic  --}}
        <div class="visible content">
            <div class="ui red mini statistic score">
                <div class="value value_{{ $post->id }}">
                    @if ($post->score >= 1000)
                        {{ round($post->score/1000, 1) }}k
                    @else
                        {{ $post->score }}
                    @endif            
                </div>
            <div class="label">Votes</div>
            </div>
        </div>

        {{--  Like button  --}}
        <div class="hidden content">        
            <form action="/vote/{{ $post->id }}" method="post" postid="{{ $post->id }}">
                @csrf
                
                <input type="hidden" name="postid" value="{{ $post->id }}">    
                <button class="ui icon {{ $post->votes->where('user_id', auth()->id())->where('post_id', $post->id)->first() ? 'blue' : 'basic blue' }} button vote vote_type_{{ $post->id }}" style="margin: 2px 0 0 4px;">
                    <i class="thumbs up icon"></i>
                </button>
            </form>                                                                             
        </div>
    </div>    
</div>

{{--  Right segment  --}}
<div class="ui segment right-segment dark-test">
    <div class="ui grid">
        
        {{--  Title  --}}
        <div class="ten wide column">
            <a class="post-title" href="/posts/{{ $post->id }}" style="position: relative; top: 10px;">{{ str_limit($post->title, 40) }}</a>                                                                                                            
        </div>            

        {{--  Edit/Remove button  --}}
        <div class="six wide column">                                        
            @if ($post->user_id == auth()->id())                                              
                <a class="ui icon inverted red button trash_btn delete_{{ $post->id }}" style="float:right;">
                    <i class="trash icon"></i>
                </a>
                <a href="/posts/edit/{{ $post->id }}" class="ui icon blue edit_btn button" style="float:right;">
                    <i class="edit icon"></i>
                </a>                                                     
            @endif                                    
        </div>
    </div>
</div>