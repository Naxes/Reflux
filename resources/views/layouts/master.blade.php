<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/tinymce.min.js') }}"></script>    
    <title>Reflux</title>    
</head>
<body class="loading">
    @yield('footer')

    {{--  Preloader  --}}
    <div id="preloader" class="ui stackable centered aligned grid" style="margin-right: 0;">
        <div id="leftload"></div>
        <div id="spinner"></div>        
        <div id="rightload"></div>
    </div>
        
    {{-- Navigation menu --}}
    @include('layouts.menu') 

    {{--  Left and right content  --}}       
    <div class="ui grid stackable container">        
        <div class="row" style="padding-top: 50px;">
            <div class="twelve wide computer sixteen wide mobile column" id="sticky">

                {{--  Dynamic content  --}}
                @yield('content')
            </div>
            <div class="four wide column computer only">

                {{--  Side menu  --}}
                @include('layouts.side-menu')
            </div>
        </div>
    </div>
    
    
    <script src="{{ asset('js/prism.js') }}"></script>    
    <script src="{{ asset('js/app.js')}}"></script>  
</body>
</html>