/* ==========================================================================
   Preloader
   ========================================================================== */
$(window).on('load', function(){    
    $('#spinner').delay(200).fadeOut().queue(function(){
        $('#leftload').addClass('leftload');
        $('#rightload').addClass('rightload').delay(500).queue(function(){            
            $('#preloader').remove();
            $('body').removeClass('loading');
        });
    });    
});