{{-- Left segment --}}
<div class="ui segment left-segment dark">
    <i class="comment icon" style="margin: 10px 0 0 0px;"></i>          
</div>
    
{{--  Right segment  --}}
<div class="ui segment right-segment dark-test" style="display: block;">
    <div class="ui grid">                    
        <div class="sixteen wide column">
            <span>
                <b><a href="/{{ $user->name }}">{{ $comment->user->name }}</a></b>
                <span class="secondary">commented on </span>
                <a href="/posts/{{ $comment->post->id }}" class="primary-link">{{ str_limit($comment->post->title, 30) }}</a>
            </span>
            <br>
            <span class="secondary">Posted by: 
                <a href="/{{ $comment->post->user->name }}" class="primary-link">{{ $comment->post->user->name }}</a>
            </span>
        </div>                         
    </div>
</div>

