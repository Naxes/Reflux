<div class="ui top fixed menu">
    <a href="/" class="ui item">
        <i class="home icon"></i>
    </a>
    <div class="right menu">
        <div class="ui right aligned category search item">
            <form action="/" method="get" class="ui form">
                <div class="ui transparent icon input">                
                    <input class="prompt search-input" name="search" type="text" placeholder="Search">
                    <i class="search link icon"></i>
                </div>
            </form>            
        </div>                                    
        @if (Auth::check())
            <a href="/posts/create" class="ui icon item">
                <i class="pencil icon"></i>
            </a>
            <div class="ui right dropdown item nav-dropdown">
                <div class="text">
                    <img src="{{ Auth::user()->gravatar }}" alt="avatar" style="margin-right: 0;">                                       
                    <i class="dropdown icon" style="margin-right: 0;"></i>
                </div>
                <div class="menu">
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
            <div class="ui right dropdown item nav-dropdown">
                <div class="text">
                    <i class="dropdown icon" style="margin-right: 0;"></i>
                </div>
                <div class="menu">
                    <div class="header">Menu</div>                    
                    <div class="divider"></div>
                    <a href="/register" class="item">Register</a>
                    <a href="/login" class="item">Sign in</a>
                    <div class="divider"></div>                    
                    <div class="ui toggle checkbox input">                        
                        <input id="test_btn" type="checkbox" name="search">
                        <label>Night mode</label>
                    </div>                            
                </div>   
            </div>            
        @endif                   
    </div>
</div>