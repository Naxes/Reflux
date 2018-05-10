/*
|--------------------------------------------------------------------------
| Auth Validation
|--------------------------------------------------------------------------
*/

/* Registration Form */
$(document).ready(function(){
  $('.register-form')
    .form({
      fields: {
        name: {
          identifier: 'name',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a username'
            }
          ]
        },
        email: {
          identifier: 'email',
          rules: [
            {
              type   : 'empty',
              type   : 'email',
              prompt : 'Please enter a valid email address'
            }            
          ]
        },           
        password: {
          identifier: 'password',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a password'
            },
            {
              type   : 'minLength[8]',
              prompt : 'Your password must be at least {ruleValue} characters'
            }
          ]
        },
        password_confirmation: {
          identifier: 'password_confirmation',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please confirm your password'
            },
            {
              type   : 'match[password]',
              prompt : 'Passwords do not match'
            }          
          ]
        },    
      }
    })
  ;
});

/* Login Form */
$(document).ready(function(){
  $('.login-form')
    .form({
      fields: {
        name: {
          identifier: 'name',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a username'
            }
          ]
        },
                  
        password: {
          identifier: 'password',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter a password'
            }            
          ]
        }           
      }
    })
  ;
});