<div class="ui grid">
    @if (Auth::check())    
        <div class="sixteen wide column">            
            <div class="ui sticky">
                {{--  Note
                The border around the card is
                actually a box shadow  --}}
                <div class="ui card">                   
                    <div class="image">
                        <img src="{{ Auth::user()->gravatar }}" alt="avatar">
                    </div>
                    <div class="content">
                        <a class="header">{{ Auth::user()->name }}</a>
                        <div class="meta">
                            <span>Joined {{ Auth::user()->created_at->toFormattedDateString() }}</span>
                        </div>
                        <div class="description">
                            Users description will go here.
                        </div>
                    </div>
                    <div class="extra content">
                        <i class="upload icon"></i>
                        {{ Auth::user()->post->count() }} submissions
                    </div>
                </div>                
            </div>
        </div>                
    @else
        <div class="sixteen wide column">
            <div class="ui sticky">
                <a href="/register" class="ui fluid teal button">Sign up</a>
                </br>
                <a href="/login" class="ui fluid teal basic button">Log-in</a>
            </div>
        </div>        
    @endif
    <script>
        $('.ui.sticky')
            .sticky({
                offset       : 76,                                
                context      : '#sticky'
            })
        ;   
    </script>      
</div>