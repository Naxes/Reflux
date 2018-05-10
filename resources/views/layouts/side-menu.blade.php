<div class="ui grid">
    @if ($user)    
        <div class="sixteen wide column">            
            <div class="ui sticky user-info">            
                <div class="ui card">                   
                    <div class="image">
                        <img src="{{ $user->gravatar }}" alt="avatar">
                    </div>
                    <div class="content">
                        <a href="/{{ $user->name }}" class="header">{{ $user->name }}</a>                        
                        <div class="meta">
                            <span>Joined {{ $user->created_at->toFormattedDateString() }}</span>
                        </div>                        
                        <div class="description">{{ $user->bio }}</div>
                    </div>
                    <div class="extra content">
                        <i class="upload icon"></i>
                        {{ $user->post->count() }} submissions
                    </div>                    
                </div>
                <div class="ui divider"></div>
                <div class="ui card">                    
                    <div class="content">
                        <div class="description">
                            <div class="ui list">
                                @if ($user->location !== null)
                                    <div class="item">
                                        <i class="marker icon"></i>
                                        <div class="content">
                                            {{ $user->location }}
                                        </div>
                                    </div>
                                @endif
                                <div class="item">
                                    <i class="mail icon"></i>
                                    <div class="content">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </div>
                                </div>
                                @if ($user->url !== null)
                                    <div class="item">
                                        <i class="linkify icon"></i>
                                        <div class="content">
                                            <a href="http://{{ $user->url }}" target="_blank">{{ $user->url }}</a>
                                        </div>
                                    </div>
                                @endif                               
                            </div>
                        </div>
                    </div>
                </div>                                                         
            </div>
        </div>                        
    @else
        <div class="sixteen wide column">
            <div class="ui sticky user-signup">
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