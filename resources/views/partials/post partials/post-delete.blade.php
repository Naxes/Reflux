<div class="ui mini modal delete_modal {{ $post->id }}">
    <div class="header">Danger Zone</div>
    <div class="content">
        <p>This action will permanently delete the <b>{{ $post->title }}</b> post. Type the name of the post to confirm.</p>        
    </div>
    <div class="actions">                    
        <form class="ui form" id="delete_form" action="/posts/{{ $post->id }}" method="post">
            @method('delete') @csrf
            <input type="hidden" name="postid" value="{{ $post->id }}">
            
            <div class="ui grid">
                <div class="ten wide column">
                    <div class="field">
                        <input id="post_title_{{ $post->id }}" name="post_title" type="text" autocomplete="off">                        
                    </div>
                </div>
                <div class="six wide column">
                    <button class="ui red fluid button delete">Delete</button>    
                </div> 
            </div>                                       
        </form>
    </div>
</div>

<script>
$('.delete_{{ $post->id }}').click(function(){        
    /* Show modal */
    $('.ui.mini.modal.delete_modal.{{ $post->id }}')
        .modal('setting', 'transition', 'vertical flip')
        .modal('show');

    /* Hide popup text */
    $('.trash_btn').popup('hide');    
});
</script>
    
<script>
    $('.delete').prop('disabled', true)    
    $('#post_title_{{ $post->id }}').on('keyup keypress', function(e){
        /* Disable enter key */
        if (e.keyCode == 13) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        /* Check equals to post title */
        if ($(this).val() == '{{ $post->title }}') {
            $('.delete').prop('disabled', false)
        } else {
            $('.delete').prop('disabled', true)
        }
    });
</script>