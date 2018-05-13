/*
|--------------------------------------------------------------------------
| Dropdowns
|--------------------------------------------------------------------------
*/

/* Navigation dropdown */
$('.nav-dropdown')
  .dropdown({
    action: 'select'
  })
;

/* Sort dropdown */
$('.ui.dropdown.sort-dropdown')
  .dropdown({
    action: function (text, value, element) {
      element.click()
    }
  })

/* Tag selection dropdown */
$('#tags')
  .dropdown()
;

/* Location dropdown */
$('#location')
  .dropdown()
;