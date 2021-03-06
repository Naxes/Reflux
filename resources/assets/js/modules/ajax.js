/*
|--------------------------------------------------------------------------
| Voting
|--------------------------------------------------------------------------
*/


/* General Like/Unlike */
$('.vote').click(function(e){    
    e.preventDefault();
    e.stopPropagation();

    var form = $(this.form);
    var formData = form.serializeArray(),
        formObj = {}; 

    /* Form data */
    $(formData).each(function(i, val){
        formObj[val.name] = val.value;
    });
    
    $.ajax({
        type : 'POST',
        url : form.attr('action'),
        data : formData,

        /* Toggle button color */
        success : function(data){                        
            $(this).toggleClass('basic ' + 'blue ' + 'blue');                        
            $('.value_' + formObj['postid']).load(' .value_' + formObj['postid']);
                            
        }.bind(this),

        /* Redirect to login if not authenticated */
        error : function(){
            window.location.href = "/login";
        }
    });
});


/* Profile Unlike */
$('.unvote').click(function(e){    
    e.preventDefault();
    e.stopPropagation();

    var form = $(this.form);
    var formData = form.serializeArray(),
        formObj = {}; 

    /* Form data */
    $(formData).each(function(i, val){
        formObj[val.name] = val.value;
    });
    
    $.ajax({
        type : 'POST',
        url : form.attr('action'),
        data : formData,

        /* Toggle button color */
        success : function(data){                                                            
            $('.post_' + formObj['postid']).remove();            
                            
        }.bind(this),

        /* Redirect to login if not authenticated */
        error : function(){
            window.location.href = "/login";
        }
    });
});

/* Profile Delete */
$('.delete_small').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    var form = $(this.form);
    var formData = form.serializeArray(),
        formObj = {};

    /* Form data */
    $(formData).each(function (i, val) {
        formObj[val.name] = val.value;
    });

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,
 
        success: function success(data) {
            $('.post_' + formObj['postid']).remove();
            $('.ui.mini.modal').modal('hide');
        }
    });
});

