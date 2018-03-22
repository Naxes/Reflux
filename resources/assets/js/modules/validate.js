$(document).ready(function(){
  $('.ui.form')
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
              prompt : 'Please enter your email address'
            },
            {
              type   : 'email',
              prompt : 'Please enter a valid email'
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
              type   : 'minLength[6]',
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