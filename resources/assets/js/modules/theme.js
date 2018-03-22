/* ==========================================================================
   Day/Night mode
   ========================================================================== */

function checkTheme(theme) {        
    if (theme == 1) {
        $('body').addClass('night-body');
        $('.ui').not('.ui.button, .ui.card')
            .addClass('inverted');
        $('.visible.content, .ui.card').addClass('night-bg');        
        $('.ui.card').addClass('night-shadow')
            .children('.content')
            .addClass('night-font')
            .children()
            .addClass('night-font');
        $('.comment').children('.content')
            .children()
            .addClass('night-font')
            .children()
            .addClass('night-font');       
        $('.post-title').addClass('night-title');
    } else {
        $('body').removeClass('night-body');
        $('.ui').not('.ui.button, .ui.card')
            .removeClass('inverted');
        $('.visible.content, #leftload, #rightload, .ui.card').removeClass('night-bg');
        $('.ui.card').removeClass('night-shadow')
            .children('.content')
            .removeClass('night-font')
            .children().
            removeClass('night-font');
        $('.comment').children('.content')
            .children()
            .removeClass('night-font')
            .children()
            .removeClass('night-font');       
        $('.post-title').removeClass('night-title');
    }
}

$(document).ready(function(){
    var theme = localStorage.getItem('theme');                
    checkTheme(theme);        

    /* Set theme on click */
    $('#test_btn').on('click', function(){
        theme ^= true;
        localStorage.setItem('theme', theme);            
        checkTheme(theme);
    });
});