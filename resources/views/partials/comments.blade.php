@if ($comments->count())    
    <div class="sixteen wide column" style="margin-bottom: 50px;">
        <h3 class="ui header">Comments</h3>
        <div class="ui divider"></div>
        <div class="ui segment">
            <div class="ui grid" id="comments_section" style="padding: 10px;">
                <div class="sixteen wide column">
                    <div class="ui comments">            
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
                                        @if (Auth::check())
                                            <a class="reply_button_{{ $comment->id }}">Reply</a>
                                        @else
                                            <a href="/login">Reply</a>
                                        @endif                                        
                                    </div>
                                    <form action="/posts/{{ $post->id }}/comments" method="post" class="ui reply form reply_form_{{ $comment->id }}" style="display:none;">
                                        @csrf
                                                                        
                                        <div class="field">                        
                                            <div class="ui input">
                                                <input type="hidden" name="parent" value="{{ $comment->id }}">                                      
                                                <textarea name="comment" id="body" placeholder="What are your thoughts?"></textarea>
                                            </div>                                                        
                                        </div>                                                                                    
                                        <button class="ui blue button right floated" type="submit">Add Reply</button>
                                        <br>                            
                                        <div class="ui error message"></div>
                                    </form> 
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
                                                        @if (Auth::check())
                                                            <a class="reply_button_{{ $reply->id }}">Reply</a>
                                                        @else
                                                            <a href="/login">Reply</a>
                                                        @endif
                                                    </div>
                                                    <form action="/posts/{{ $post->id }}/comments" method="post" class="ui reply form reply_form_{{ $reply->id }}" style="display:none;">
                                                        @csrf
                                                                                        
                                                        <div class="field">                        
                                                            <div class="ui input">
                                                                <input type="hidden" name="parent" value="{{ $reply->parent_id }}">
                                                                <textarea name="comment" id="body" placeholder="What are your thoughts?"></textarea>
                                                            </div>                                                        
                                                        </div>                                                                                    
                                                        <button class="ui blue button right floated" type="submit">Add Reply</button>
                                                        <br><br>                            
                                                        <div class="ui error message"></div>
                                                    </form>                                                                                     
                                                </div>                                                                            
                                            </div>
                                            <script>
                                                $('.reply_button_{{ $reply->id }}').click(function(){
                                                    $('.reply_form_{{ $reply->id }}').toggle();
                                                });
                                            </script> 
                                            @endforeach
                                        @endif                            
                                    </div> 
                                @endif                                                                      
                            </div>                            
                            <script>
                                $('.reply_button_{{ $comment->id }}').click(function(){
                                    $('.reply_form_{{ $comment->id }}').toggle();
                                });
                            </script>
                        @endforeach                                              
                    </div>                   
                </div>                                                               
            </div>            
        </div>

        {{--  Comments Pagination  --}}
        <div class="sixteen wide column">
            {{ $comments->appends(request()->input())->links('partials.paginate') }}
        </div>
    </div>           
@endif