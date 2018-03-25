@if ($comments->count())
    <div class="sixteen wide column" style="margin-bottom: 50px;">
            <h3 class="ui header">Comments</h3>
            <div class="ui divider"></div>
            <br>
        <div class="ui grid" id="comments_section">        
            <div class="ui threaded comments">            
                @foreach ($comments as $comment)
                    <div class="comment">
                        <a class="avatar">
                            <img src="{{ $comment->user->gravatar }}" alt="avatar">
                        </a>
                        <div class="content">
                            <a href="/{{ $comment->user->name }}" class="author">{{ $comment->user->name }}</a>
                            <div class="metadata">
                                <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="text">{!!$comment->comment!!}</div>
                            <div class="actions">
                                <a>Reply</a>
                            </div>
                        </div>

                        {{--  Replies  --}}
                        @if ($comment->replies->count())
                            <div class="comments">
                                @if ($comment->replies)
                                    @foreach ($comment->replies as $reply)
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="{{ $reply->user->gravatar }}" alt="avatar">
                                        </a>
                                        <div class="content">
                                            <a href="/{{ $reply->user->name }}" class="author">{{ $reply->user->name }}</a>
                                            <div class="metadata">
                                                <span class="date">{{ $reply->created_at->diffForHumans() }}</span>
                                            </div>
                                            <div class="text">{!!$reply->comment!!}</div>
                                            <div class="actions">
                                                <a>Reply</a>
                                            </div>                                       
                                        </div>                                                                            
                                    </div>  
                                    @endforeach
                                @endif                            
                            </div> 
                        @endif                                                                      
                    </div>
                @endforeach                                              
            </div>                          
        </div>            
    </div>
@endif