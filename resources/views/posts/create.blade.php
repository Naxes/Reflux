@extends('layouts.master')

@section('content')
<br>
<div class="sixteen wide computer sixteen wide mobile column">
    <h3 class="ui header">Create a Post</h3>  
    <div class="ui divider"></div>          
    <form action="/posts" method="post" class="ui create-post-form form">
        @csrf
        
        <div class="ui raised clearing segment">
            <div class="ui grid">
                <div class="eight wide column">
                    <div class="field">                        
                        <div class="ui input">                    
                            <input id="title" type="text" name="title" placeholder="Title (70 characters)" autocomplete="off">
                        </div>                                                        
                    </div>    
                </div>
                <div class="eight wide column">
                    <div class="field">                                                
                        <select id="tags" name="tags[]" multiple="" class="ui multiple search selection dropdown">
                            <option value="">Tag Post (5 max)</option>
                            
                            @foreach ($languages as $language)
                                <option value="{{ $language['name'] }}">{{ $language['name'] }}</option>
                            @endforeach
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
        </div>
        <div class="ui error message"></div>
    </form>    
</div>
<div class="five wide column computer only"></div>    
@endsection