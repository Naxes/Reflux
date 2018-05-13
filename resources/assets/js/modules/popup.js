/*
|--------------------------------------------------------------------------
| Popups
|--------------------------------------------------------------------------
*/

/* Delete Popup */
$('.trash_btn')
  .popup({
    position: 'right center',
    content : 'Remove Post'
  })
;

$('.edit_btn')
  .popup({
    position: 'left center',
    content : 'Edit Post'
  })
;