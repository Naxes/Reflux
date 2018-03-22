<div class="ui top fixed menu">
    <a href="/" class="ui icon item">
        <i class="home icon"></i>
    </a>
    <div class="right menu">        
        <a href="/posts/create" class="ui icon item">            
            <i class="pencil icon"></i>            
        </a>
        <a id="test_btn" class="ui icon item">            
            <i class="moon icon"></i>            
        </a>       
        @if (Auth::check())
            <a href="/logout" class="ui icon item">            
                <i class="sign out alternate icon"></i>            
            </a>
        @endif                   
    </div>
</div>