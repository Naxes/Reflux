/*
|--------------------------------------------------------------------------
| Preloader
|--------------------------------------------------------------------------
*/

$(window).on('load', function(){    
    $('#spinner').fadeOut().queue(function(){
        $('#leftload').addClass('leftload');
        $('#rightload').addClass('rightload').delay(500).queue(function(){            
            $('#preloader').remove();
            $('body').removeClass('loading');
        });
    });    
});