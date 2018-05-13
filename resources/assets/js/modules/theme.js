/*
|--------------------------------------------------------------------------
| Theme
|--------------------------------------------------------------------------
*/

function checkTheme(theme) {        
    if (theme == 1) {
        $('body').addClass('night-body');
        $('.search-input').addClass('night-font');
        $('.primary-link').addClass('night-font');
        $('#test_btn').attr('checked', 'checked');        
        $('.ui').not('.ui.button, .ui.card, .ui.search')
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
        $('.trash_btn').removeAttr('data-variation');
        $('.edit_btn').removeAttr('data-variation');      
    } else {
        $('body').removeClass('night-body');
        $('.search-input').removeClass('night-font');
        $('.primary-link').removeClass('night-font');
        $('.ui').not('.ui.button, .ui.card, .ui.search')
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
        $('.trash_btn').attr('data-variation', 'inverted');
        $('.edit_btn').attr('data-variation', 'inverted');
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