/*
|--------------------------------------------------------------------------
| Validation
|--------------------------------------------------------------------------
*/

/* Post Form */
$('.create-post-form')
  .form({
    fields: {                 
      title: {
        identifier: 'title',        
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a title'
          },
          {
            type   : 'maxLength[70]',
            prompt : 'Title must be <b><u>70 characters</u></b> or <b><u>less</u></b>'
          },
          {
            type   : 'regExp[^(?!.*[-+_@#$%^&£*.,]).+$]',
            prompt : 'Title <b><u>cannot</u></b> contain any <b><u>special characters</u></b>'
          }
        ]
      },
      tags: {
        identifier: 'tags[]',        
        rules: [
          {
            type   : 'empty',
            prompt : 'Post must contain <b><u>at least 1 tag</u></b>'
          },
          {
            type   : 'maxCount[5]',
            prompt : 'Post must contain <b><u>5 tags</u></b> or <b><u>less</u></b>'
          }       
        ]
      },             
    }
  })
;

/* Settings Form */
$('.settings-form')
  .form({
    fields: {                 
      name: {
        identifier: 'name',        
        rules : [
          {
            type   : 'empty',
            prompt : 'Please enter a username'
          },
          {            
            type   : 'maxLength[20]',            
            prompt : 'Name must be less than 20 characters'
          },
          {            
            type   : 'regExp[^(?!.*[-+_!@#$%^&£*.,?])(?!.*\\\s).+$]',            
            prompt : 'Userame must be <b><u>one word</u></b> and contain <b><u>no special characters</u></b> or <b><u>spaces</u></b>'
          }
        ]
      },
      email: {
        identifier : 'email',
        rules: [
          {
            type   : 'empty',
            type   : 'email',
            prompt : 'Please enter a valid e-mail'
          }
        ]
      },
      bio: {
        identifier : 'bio',
        rules: [
          {
            type   : 'maxLength[80]',
            prompt : 'Bio must be <b><u>80 characters</u></b> or <b><u>less</u></b>'
          }
        ]
      },
      url: {
        identifier : 'url',
        optional   : 'true',
        rules: [
          {            
            type   : 'regExp[^(?!https)(?!http)(?!.*[-+_!@#$%^&*,?])(?=.*[.])(?!.*[.]$).+$]',
            prompt : 'Please enter a valid URL: <b><u>www.example.com</u></b> | <b><u>example.com</u></b>'
          }
        ]
      }     
    }
  })
;