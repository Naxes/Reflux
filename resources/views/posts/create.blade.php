@extends('layouts.master')

@section('content')
<div class="sixteen wide computer sixteen wide mobile column">
    <h3 class="ui header">Create a Post</h3>  
    <div class="ui divider"></div>          
    <form action="/posts" method="post" class="ui form">
        @csrf
        
        <div class="ui raised clearing segment">
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">                        
                        <div class="ui input">                    
                            <input id="title" type="text" name="title" placeholder="Title" autocomplete="off">
                        </div>                                                        
                    </div>    
                </div>
                <div class="eight wide column">
                    <div class="field">                                                
                        <select id="tags" name="tags" multiple="" class="ui multiple search selection dropdown">
                            <option value="">Tag Post</option>
                            <option value="markup">HTML/XML</option>
                            <option value="css">CSS</option>
                            <option value="javascript">JavaScript</option>                                
                        </select>                                                      
                    </div>    
                </div>   
            </div>    
            <br>                                      
            <div class="field">                        
                <div class="ui input">                                      
                    <textarea class="mce_field" name="body" placeholder="Text"></textarea>
                </div>                                                        
            </div>                       
            <button class="ui blue button right floated" type="submit">Submit</button>
            <a href="/" class="ui button right floated">Cancel</a>
            <div class="ui error message"></div>
        </div>            
    </form>    
</div>
<div class="five wide column computer only"></div>    
@endsection