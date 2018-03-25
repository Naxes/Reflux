<div class="ui top fixed menu">
    <a href="/" class="ui icon item">
        <i class="home icon"></i>
    </a>
    <div class="right menu">                                    
        @if (Auth::check())
            <a href="/posts/create" class="ui icon item">
                <i class="pencil icon"></i>
            </a>
            <div class="ui right dropdown item">
                <div class="text">
                    <img src="{{ Auth::user()->gravatar }}" alt="avatar" style="margin-right: 0;">                                       
                    <i class="dropdown icon" style="margin-right: 0;"></i>
                </div>
                <div class="menu inverted">
                    <div class="header">Signed in as <u>{{ Auth::user()->name }}</u></div>
                    <div class="divider"></div>
                    <a href="/{{ Auth::user()->name }}" class="item">Your profile</a>                    
                    <div class="divider"></div>
                    <a href="/edit/{{ Auth::user()->name }}" class="item">Settings</a>
                    <div class="ui toggle checkbox input">                        
                        <input id="test_btn" type="checkbox" name="search">
                        <label>Night mode</label>
                    </div>
                    <a href="/logout" class="item">Sign out</a>        
                </div>   
            </div>
        @else
            <a href="/register" class="ui icon item">
                <i class="user plus icon"></i>
            </a>
            <a href="/login" class="ui icon item">
                <i class="sign in alternate icon"></i>
            </a>
        @endif                   
    </div>
</div>