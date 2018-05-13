/*
|--------------------------------------------------------------------------
| Auth Validation
|--------------------------------------------------------------------------
*/

/* Defaults */
$.fn.form.settings.defaults = {
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
    identifier : 'email',
    rules: [
      {
        type   : 'empty',
        type   : 'email',
        prompt : 'Please enter a valid e-mail'
      }
    ]
  }  
};

/* Registration Form */
$('.register-form')
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
      password: {
        identifier: 'password',        
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a password'
          },
          {            
            type   : 'regExp[^(?=.*[a-z])(?=.*[A-Z])(\\\w{10})(?=.*\\\d)(?=.*[-+_!@#$%^&£*.,?]).+$]',
            prompt : 'Your password must be <b><u>at least 10 characters</u></b>, and include a <b><u>lowercase</u></b>, <b><u>uppercase</u></b>, <b><u>numeric</u></b>, and <b><u>special character</u></b>'
          }
        ]
      },
      password_confirmation: {
        identifier: 'password_confirmation',        
        rules: [          
          {
            type   : 'match[password]',
            prompt : 'Passwords do not match'
          }          
        ]
      },    
    }
  })
;


/* Login Form */
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
