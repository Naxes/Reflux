/*
|--------------------------------------------------------------------------
| TinyMCE editor
|--------------------------------------------------------------------------
*/

tinymce.init({
    selector: '.mce_field',    
    menubar: false,
    branding: false,
    plugins: 'codesample',            
    codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},        
        {text: 'CSS', value: 'css'},
        {text: 'JavaScript', value: 'javascript'}
    ],
    codesample_dialog_height: 400,
    codesample_dialog_width: 400,
    toolbar: 'undo redo | styleselect | bold italic | blockquote | codesample'
});